<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', function () {
    return 'List Products';
});



Route::get('/products/{id}/{category?}', function ($id, $category = null) {

    if ($category != null){
        return 'Detail Products: ' . $id . ". with category: " . $category;
        
    }
    else{

        return 'Detail Products: ' . $id;

        

    }
    
});