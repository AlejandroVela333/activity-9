@extends('layouts.app')

@section('title', 'Dashboard - Activity 9')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <p class="text-uppercase text-success font-weight-bold mb-2">Sesión autenticada</p>
                    <h1 class="h2 font-weight-bold">Dashboard</h1>
                    <p class="lead text-muted mb-4">
                        Bienvenido, {{ Auth::user()->name }}. Esta vista está protegida y solo puede ser consultada por usuarios registrados.
                    </p>
                    <a class="btn btn-outline-secondary" href="{{ route('landingpage') }}">Volver al Landing Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
