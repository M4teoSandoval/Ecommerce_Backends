<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {

        Category::create([
            'name' => $request->get('name')
        ]);
        return redirect()->route('admin.categories.table');
    }

    
    function table()
    {
        $categories = Category::withCount('products')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.categories.table', [
            'categories' => $categories
        ]);
    }

    public function destroy(Category $category)
    {
        try {
            // Verificar si la categoría tiene productos asociados
            $productCount = $category->products()->count();

            if ($productCount > 0) {
                // Si hay productos, actualizarlos a categoría nula y luego eliminar
                $category->products()->update(['category_id' => null]);

                $category->delete();

                return redirect()->route('admin.categories.table')
                    ->with('warning', "Categoría eliminada. $productCount productos quedaron sin categoría asignada.");
            }

            // Si no hay productos, eliminar directamente
            $category->delete();

            return redirect()->route('admin.categories.table')
                ->with('success', 'Categoría eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.table')
                ->with('error', 'Error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}
