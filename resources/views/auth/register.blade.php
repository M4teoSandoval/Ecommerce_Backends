@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg border-0 p-4" style="width: 420px; border-radius: 16px;">
            <div class="text-center mb-3">
                <div
                    style="width: 120px; height: 120px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/unab_2.png') }}" alt="UNAB Logo"
                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div> 
                <h4 class="mt-3 fw-bold text-dark">Registro de Usuario</h4>
                <p class="text-muted small mb-4">Crea tu cuenta para acceder al sistema</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre completo</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required placeholder="Ejemplo: Juan Pérez">
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo institucional</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required placeholder="usuario@unab.edu.co">
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label fw-semibold">Confirmar contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-orange w-100 mb-3">Registrarse</button>

                <div class="text-center">
                    <p class="mb-0 small">¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">Inicia sesión aquí</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
