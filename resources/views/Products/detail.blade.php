@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('public/style.css') }}">
    <header>
    <h1>Detalle del Producto</h1>
  </header>

  <main class="container">
    <div class="product-image">
      <img src="https://dlcdnwebimgs.asus.com/gain/47be2296-5fde-4c9b-b262-8c6b8879a020/" alt="Producto">
    </div>

    <div class="product-details">
      <h2> {{$id}}</h2>
      <div class="category">Categoría: {{$category}}</div>
      <p class="description">
        Este es un producto tecnológico innovador que ofrece un excelente rendimiento 
        y diseño moderno. Ideal para quienes buscan calidad y funcionalidad en un solo dispositivo.
      </p>
      <div class="price">$999</div>
      <a href="#" class="btn">Añadir al Carrito</a><br>
      <a  href="/products" class="back">← Volver a la lista de productos</a>
    </div>
  </main>

@endsection
    
