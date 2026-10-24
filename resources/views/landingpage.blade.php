@extends('layouts.app')

@section('title', 'Landing Page - Activity 9')

@section('content')
<div class="container">
    <div class="jumbotron bg-white border shadow-sm text-center py-5">
        <p class="text-uppercase text-primary font-weight-bold mb-2">Actividad 9</p>
        <h1 class="display-4 font-weight-bold">Landing Page</h1>
        <p class="lead text-muted mx-auto" style="max-width: 720px;">
            Sistema académico de autenticación desarrollado con Laravel 7.
            Regístrate o inicia sesión para acceder al Dashboard protegido.
        </p>

        @guest
            <div class="mt-4">
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-primary btn-lg" href="{{ route('register') }}">Register</a>
            </div>
        @else
            <div class="mt-4">
                <a class="btn btn-primary btn-lg" href="{{ route('dashboard') }}">Ir al Dashboard</a>
            </div>
        @endguest
    </div>
</div>
@endsection
