@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Crear Producto</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" class="form-control" name="price" step="0.01" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @error('brand')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-static mb-3">
                                <label for="brand" class="ms-0">Marca</label>
                                <select class="form-control" id="brand" name="brand">
                                    <option value="" disabled selected>Selecciona una marca</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-static mb-3">
                                <label for="category" class="ms-0">Categoría</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="" disabled selected>Selecciona una categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ url('/products') }}" class="btn btn-outline-secondary">
                            ← Volver
                        </a>
                        <button type="submit" class="btn btn-lg bg-gradient-dark">
                            Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection