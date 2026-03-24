@extends('adminlte::page')

@section('title', 'Detalles del Usuario')

@section('content_header')
<h1>Perfil de: {{ $user->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Información Completa</h3>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID de sistema:</dt>
            <dd class="col-sm-9">{{ $user->id }}</dd>

            <dt class="col-sm-3">Nombre:</dt>
            <dd class="col-sm-9">{{ $user->name }}</dd>

            <dt class="col-sm-3">Correo Electrónico:</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>

            <dt class="col-sm-3">Fecha de alta:</dt>
            <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i') }}</dd>

            <dt class="col-sm-3">Última actualización:</dt>
            <dd class="col-sm-9">{{ $user->updated_at->diffForHumans() }}</dd>
        </dl>
    </div>
    <div class="card-footer">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editar datos</a>
    </div>
</div>
@stop