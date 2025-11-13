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
            $productCount = $category->products()->count();

            if ($productCount > 0) {
                // Buscar una categoría por defecto (ej: "Sin categoría")
                $defaultCategory = Category::where('name', 'Sin categoría')->first();

                if (!$defaultCategory) {
                    // Crear categoría por defecto si no existe
                    $defaultCategory = Category::create(['name' => 'Sin categoría']);
                }

                // Asignar productos a la categoría por defecto
                $category->products()->update(['category_id' => $defaultCategory->id]);

                $category->delete();

                return redirect()->route('admin.categories.table')
                    ->with('warning', "Categoría eliminada. $productCount productos fueron asignados a 'Sin categoría'.");
            }

            $category->delete();

            return redirect()->route('admin.categories.table')
                ->with('success', 'Categoría eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.table')
                ->with('error', 'Error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}
