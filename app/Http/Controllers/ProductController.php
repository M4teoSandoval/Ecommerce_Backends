<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        // Obtener categorías para el filtro
        $categories = Category::all();

        // Consulta base de productos con relaciones
        $query = Product::with(['brand', 'category'])
            ->orderBy('id', 'desc');

        // Aplicar filtro por categoría si existe
        if (request()->has('category') && request('category') != '') {
            $query->where('category_id', request('category'));
        }

        // Paginar resultados
        $products = $query->paginate(9);

        return view('Products.index', compact('products', 'categories'));
    }

    function detail($id, $category = null)
    {
        $product = Product::with(['brand', 'category'])->findOrFail($id);

        return view('Products.detail', compact('product'));
    }

    function create()
    {
        $brands = Brand::all();
        $categories = Category::all();



        return view('Products.create', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999999.99',
            'brand' => 'required|exists:brand,id',
            'category' => 'required|exists:categories,id',
        ]);

        // Crear un nuevo producto con los datos validados
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->brand_id = $validatedData['brand'];
        $product->category_id = $validatedData['category'];
        $product->save();

        // Redirigir a una página de éxito o mostrar un mensaje
        return redirect()->route('admin.products.table')->with('success', 'Producto creado exitosamente.');
    }

    function table()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('Products.table', [
            'products' => $products
        ]);
    }

    function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('admin.products.table')
                ->with('success', 'Producto eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.products.table')
                ->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }
}
