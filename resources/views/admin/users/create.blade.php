@extends('adminlte::page')

@section('title', __('Nuevo Usuario'))

@section('content_header')
<h1>{{ __('Crear Nuevo Usuario') }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Mostramos errores de validación si los hay --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Guardar Usuario') }}</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
        </form>
    </div>
</div>
@stop