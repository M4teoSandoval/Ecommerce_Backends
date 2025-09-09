<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return 'Hola mundo';
    }

    function detail($id,  $category = null)
    {
        if ($category != null) {
            return 'Detail Products: ' . $id . ". with category: " . $category;
        } else {
            return 'Detail Products: ' . $id;
        }
    }

    function create()
    {
        return "FORM FOR CREATE PRODUCTS";
    }
}
