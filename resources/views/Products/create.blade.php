@extends('layouts.app')
@section('content')
    <header>
        <h1>Crear Producto</h1>
    </header>

    <main class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Nombre del Producto</label>
                <input type="text" id="name" name="name" placeholder="Ej: Laptop Gamer" required>
            </div>

            <div>
                <label for="price">Precio</label>
                <input type="number" id="price" name="price" placeholder="Ej: 1200" required>
            </div>

            <div>
                <label for="brand">Marca</label>
                <input type="text" id="brand" name="brand" placeholder="Ej: ASUS, HP, Samsung" required>
            </div>

            <div>
                <label for="category">Categoría</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>-- Selecciona una categoría --</option>
                    <option value="laptops">Laptops</option>
                    <option value="smartphones">Smartphones</option>
                    <option value="accesorios">Accesorios</option>
                    <option value="audio">Audio</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <div>
                <label for="description">Descripción</label>
                <textarea id="description" name="description" placeholder="Agrega una descripción del producto..." required></textarea>
            </div>

            <div>
                <label for="image">Imagen</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn">Guardar Producto</button>
            <a href="index.html" class="back">← Volver a la lista de productos</a>
        </form>
    </main>
@endsection
