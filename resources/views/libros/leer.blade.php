@extends('layouts.app')
@section('content')
<h1>Listado de Libros</h1>
<form method="GET" action="{{ route('libros.leer') }}" class="mb-3 d-flex" role="search">
    <input type="text" name="busqueda" class="form-control me-2" placeholder="Buscar libro o autor..." value="{{ request('busqueda') }}">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Autor</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($libros as $libro)
      <tr>
        <td>{{  $libro->nombre  }}</td>
        <td>{{  $libro->descripcion  }}</td>
        <td>{{ $libro->autor ? $libro->autor->nombre : '' }}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $libro->id }}">Actualizar</button>
          @include('libros.actualizar')
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $libro->id }}">Eliminar</button>
          @include('libros.eliminar', ['libro' => $libro])  
        </td>  
      </tr>
     @endforeach
  </tbody>
</table>
@if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif  
@endsection
