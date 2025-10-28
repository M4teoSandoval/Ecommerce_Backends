@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('public/style.css') }}">
    <main class="login-container">
        <div class="login-card">
            <h2>Crear Producto</h2>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre del Producto</label>
                    <input type="text" id="name" name="name" placeholder="Ej: Laptop Gamer" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Precio</label>
                    <input type="number" id="price" name="price" placeholder="Ej: 1200" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label fw-semibold">Marca</label>
                    <input type="text" id="brand" name="brand" placeholder="Ej: ASUS, HP, Samsung" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold">Categoría</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>-- Selecciona una categoría --</option>
                        <option value="laptops">Laptops</option>
                        <option value="smartphones">Smartphones</option>
                        <option value="accesorios">Accesorios</option>
                        <option value="audio">Audio</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Descripción</label>
                    <textarea id="description" name="description" placeholder="Agrega una descripción del producto..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Imagen</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn-orange mt-2">Guardar Producto</button>

                <div class="text-muted">
                    <a href="{{ url('/products') }}">← Volver a la lista de productos</a>
                </div>
            </form>
        </div>
    </main>
@endsection
