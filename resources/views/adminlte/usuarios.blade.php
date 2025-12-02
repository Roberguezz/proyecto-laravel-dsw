@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('adminlte.usuarios.store') }}">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label>Confirmar Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
@stop
