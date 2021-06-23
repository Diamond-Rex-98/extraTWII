@extends('layouts.app')
@section('content')
<div class="container">
<div class="alert alert-success" role="alert">
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismissible="alert" aria-tablrt="close">
	<span aria-hidden="true">&times;</span>
</button>
@endif
</div>
<a href="{{ url('peliculas/create') }}" class="btn btn-success">Registrar Nueva Película</a>/
<table class="table table-light">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Título</th>
			<th>Portada</th>
			<th>Estudio</th>
			<th>Género</th>
			<th>Año</th>
			<th>Director</th>
			<th>Aciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($peliculas as $pelicula)
		<tr>
			<td>{{ $peliculas->id }}</td>
			<td>{{ $peliculas->Titulo }}</td>
			<td>
				<img class="img-thumbnail img-fluid" src="{{ assets('storage').'/'.$peliculas->Portada }}" width="100" alt="">
				<!-- {{ $peliculas->Portada }} -->
			</td>
			<td>{{ $peliculas->Estudio }}</td>
			<td>{{ $peliculas->Género }}</td>
			<td>{{ $peliculas->Año }}</td>
			<td>{{ $peliculas->Director }}</td>
			<td>
				<a href="{{ url('/peliculas/'.$peliculas2->id.'/edit' }}" class="btn btn-warning">
				Editar 
			</a>
				| 
				<form action="{{ url/('/peliculas/'.peliculas->id) }}" class="d-line" method="post">
					@csrf
					{{ method_field('DELETE') }}
					<input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $peliculas->links !!}
</div>
@ensection