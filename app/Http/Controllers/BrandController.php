<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brands.create');
    }
    public function store(Request $request)
    {

        Brand::create([
            'name' => $request->get('name')
        ]);
        return redirect()->route('admin.brands.table');
    }


    function table()
    {
        $brands = Brand::withCount('products')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.brands.table', [
            'brands' => $brands
        ]);
    }

    public function destroy(Brand $brand)
    {
        try {
            $productCount = $brand->products()->count();

            if ($productCount > 0) {
                // Buscar una marca por defecto
                $defaultBrand = Brand::where('name', 'Sin marca')->first();

                if (!$defaultBrand) {
                    // Crear marca por defecto si no existe
                    $defaultBrand = Brand::create(['name' => 'Sin marca']);
                }

                // Asignar productos a la marca por defecto
                $brand->products()->update(['brand_id' => $defaultBrand->id]);

                $brand->delete();

                return redirect()->route('admin.brands.table')
                    ->with('warning', "Marca eliminada. $productCount productos fueron asignados a 'Sin marca'.");
            }

            // Si no hay productos, eliminar directamente
            $brand->delete();

            return redirect()->route('admin.brands.table')
                ->with('success', 'Marca eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.brands.table')
                ->with('error', 'Error al eliminar la marca: ' . $e->getMessage());
        }
    }
}
