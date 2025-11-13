@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('public/style.css') }}">

<div class="container py-4">

    {{-- Migas de pan --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-light p-3 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}?category={{ $product->category_id }}">
                    {{ $product->category->name ?? 'Categoría' }}
                </a>
            </li>
            <li class="breadcrumb-item active fw-bold">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-4">

        {{-- Imagen --}}
        <div class="col-md-6">
            <div class="product-image-container shadow-sm rounded-4 overflow-hidden">
                <img 
                    src="https://images.unsplash.com/photo-1607082350899-7e105aa886ae?auto=format&fit=crop&w=800&q=80"
                    alt="{{ $product->name }}"
                    class="img-fluid"
                >
            </div>
        </div>

        {{-- Información --}}
        <div class="col-md-6">

            <h1 class="fw-bold mb-2">{{ $product->name }}</h1>

            <div class="text-muted mb-2">
                <i class="fas fa-tag me-1 text-primary"></i>
                Marca: <strong>{{ $product->brand->name ?? 'No especificada' }}</strong>
            </div>

            <div class="text-muted mb-3">
                <i class="fas fa-layer-group me-1 text-primary"></i>
                Categoría: <strong>{{ $product->category->name ?? 'No especificada' }}</strong>
            </div>

            <h3 class="text-success fw-bold mb-4">
                ${{ number_format($product->price, 2) }}
            </h3>

            <h5 class="fw-semibold">Descripción</h5>
            <p class="text-secondary fs-5">{{ $product->description }}</p>

            <div class="mt-4 d-flex gap-3 flex-wrap">
                <button class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-shopping-cart me-2"></i>Agregar al Carrito
                </button>

                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg px-4">
                    <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
                </a>
            </div>

        </div>
    </div>
</div>

<style>
/* Caja de la imagen */
.product-image-container {
    max-height: 500px;
}
.product-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Ajuste general para sombras y bordes redondeados */
.rounded-4 {
    border-radius: 1rem !important;
}
.shadow-sm {
    box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
}
</style>

@endsection
