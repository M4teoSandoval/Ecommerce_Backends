@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('public/style.css') }}">
    <header>
    <h1 class="index-title">Lista de Productos</h1>
  </header>

  <main class="container">
    <div class="card">
      <img src="https://dlcdnwebimgs.asus.com/gain/47be2296-5fde-4c9b-b262-8c6b8879a020/" alt="Laptop">
      <div class="card-body">
        <h3>Laptop Gamer</h3>
        <p>Potente laptop para gaming con procesador de última generación.</p>
        <div class="price">$1,200</div>
        <a href="/products/Asus tuf gaming F15/Laptop" class="btn">Ver Detalles</a>
      </div>
    </div>

    <div class="card">
      <img src="https://imagenes.elpais.com/resizer/v2/3D3VU4M4CRCSPD3QDSLR7UZJ7A.jpg?auth=8bb47a65ca7bbf8530a838f407baafb616652c5ca3b60bdbad1a6244b586ee2f&width=1200" alt="Smartphone">
      <div class="card-body">
        <h3>Smartphone</h3>
        <p>Teléfono inteligente con cámara de alta resolución y batería duradera.</p>
        <div class="price">$800</div>
        <a href="/products/Iphone 16/Smartphone" class="btn">Ver Detalles</a>
      </div>
    </div>

    <div class="card">
      <img src="https://i.blogs.es/385d90/_eln6316/1366_2000.jpeg" alt="Headphones">
      <div class="card-body">
        <h3>Audífonos</h3>
        <p>Audífonos inalámbricos con cancelación de ruido y sonido premium.</p>
        <div class="price">$200</div>
        <a href="/products/Airpods Pro 2 generacion/Audio" class="btn">Ver Detalles</a>
      </div>
    </div>
  </main>
@endsection

