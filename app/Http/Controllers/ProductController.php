<?php

namespace App\Http\Controllers;

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
        return view('Products.create');
    }
}
