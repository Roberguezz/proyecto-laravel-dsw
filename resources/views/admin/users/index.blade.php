@extends('adminlte::page')

@section('title', 'Gestión de Usuarios')

@section('content_header')
<h1>Lista de Usuarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- Aquí arriba SOLO el botón de crear --}}
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Usuario
        </a>
    </div>

    {{-- Mensajes de Feedback --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-2">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-2">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            {{-- AQUÍ es donde el botón "Ver" funciona, porque aquí $user SÍ existe --}}
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-eye"></i> Ver
                            </a>

                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro?')">
                                    <i class="fas fa-trash"></i> Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop