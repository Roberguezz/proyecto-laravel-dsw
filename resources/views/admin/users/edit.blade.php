@extends('adminlte::page')

@section('title', __('Editar Usuario'))

@section('content_header')
<h1>{{ __('Editar Usuario') }}: {{ $user->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- ¡VITAL! Sin esto Laravel no sabrá que es una actualización --}}

            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group mt-4">
                <label for="password">{{ __('Contraseña') }} ({{ __('Dejar en blanco para no cambiar') }})</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">{{ __('Actualizar Usuario') }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</div>
@stop