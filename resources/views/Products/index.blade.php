@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('public/style.css') }}">

<div class="container-fluid px-0">

    {{-- Header --}}
    <div class="bg-gradient-primary text-white py-5 mb-4 d-flex align-items-center justify-content-center">
        <div class="container">
            <h1 class="display-4 fw-bold text-center mb-2">Nuestros Productos</h1>
        </div>
    </div>

    <div class="container">

        {{-- Filtro --}}
        <div class="row mb-5">
            <div class="col-12 px-0">
                <div class="card shadow-lg border-0 rounded-4 overflow-visible w-100">
                    <div class="card-body p-4">
                        <div class="row gy-4 align-items-center">

                            <div class="col-lg-8 col-md-7 w-100">
                                <label class="form-label fw-bold text-dark mb-3 fs-5 d-block">
                                    <i class="fas fa-filter me-2"></i>Filtrar por categoría:
                                </label>

                                <form method="GET" action="{{ url('/') }}" class="row g-3 align-items-end">
                                    <div class="col-md-8">
                                        <select name="category" class="form-select form-select-lg border-2">
                                            <option value="">Todas las categorías</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 d-grid d-md-flex gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                            <i class="fas fa-search"></i>
                                        </button>

                                        @if (request('category'))
                                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        @endif
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Productos --}}
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card product-card h-100 shadow border-0 rounded-3">
                        <div class="card-img-wrapper position-relative">
                            <img src="https://images.unsplash.com/photo-1607082350899-7e105aa886ae?auto=format&fit=crop&w=800&q=80"
                                class="card-img-top"
                                alt="{{ $product->name }}"
                                style="height: 250px; object-fit: cover;">

                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-primary px-3 py-2 fs-6 rounded-pill">
                                    {{ $product->category->name ?? 'General' }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-dark mb-3">{{ $product->name }}</h5>

                            <p class="card-text text-muted flex-grow-1 mb-4">
                                {{ Str::limit($product->description, 120) }}
                            </p>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="price h4 text-success fw-bold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>

                                    <small class="text-muted">
                                        <i class="fas fa-tag me-1"></i>
                                        {{ $product->brand->name ?? 'Genérica' }}
                                    </small>
                                </div>

                                <a href="{{ url('products/' . $product->id . '/' . ($product->category->name ?? 'general')) }}"
                                    class="btn btn-primary w-100 py-2 fs-5">
                                    <i class="fas fa-eye me-2"></i>Ver Detalles
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-search fa-4x text-muted mb-4"></i>
                            <h3 class="text-muted mb-3">No se encontraron productos</h3>
                            <p class="text-muted mb-4">No hay productos que coincidan con tu búsqueda.</p>

                            @if (request('category'))
                                <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-times me-2"></i>Quitar filtros
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            @endforelse
        </div>

        {{-- Paginación --}}
        @if ($products->hasPages())
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav>
                        <ul class="pagination pagination-lg">
                            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        @endif

    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .product-card {
        transition: .3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Paginación */
    .page-link {
        border-radius: 8px !important;
        margin: 0 3px;
        font-weight: 600;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: #667eea;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
