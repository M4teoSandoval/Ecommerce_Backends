<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return view('Products.index');
    }

    function detail($id,  $category = null)
    {
        if ($category != null) {
            return view('Products.detail', [
                'id' => $id,
                'category' => $category
            ]);
        } else {
            return view('Products.detail', compact('id','category'));
        }
    }

    function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

    

        return view('Products.create',[
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
