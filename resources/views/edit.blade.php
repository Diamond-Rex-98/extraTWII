@extends('layouts.app')
@section('content')
<div class="container">
	@include('peliculas.form',['modo'=>'Editar']);
	<form action="{{ url('/peliculas/.$peliculas->id') }}" method="post" enctype="multipart/form-data">
		@csrf
		{{ method_field('PATCH') }}
		@include('peliculas.form')
	</form>
</div>