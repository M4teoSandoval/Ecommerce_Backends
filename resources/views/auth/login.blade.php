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
                <h4 class="mt-3 fw-bold text-dark">Sistema de Gestión Universitaria</h4>
                <p class="text-muted small mb-4">Inicia sesión para acceder a tu cuenta</p>
            </div>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus placeholder="usuario@unab.edu.co">
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required placeholder="********">
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Recordar mis datos</label>
                </div>

                <button type="submit" class="btn btn-orange w-100 mb-3">Ingresar</button>

                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="text-decoration-none small text-primary" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
