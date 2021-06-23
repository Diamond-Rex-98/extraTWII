@extends('layouts.app')
@section('content')
<div class="container">

	<form action="{{ url('peliculas') }}" method="post" enctype="multipart/form-data">
		@csrf
		@include('peliculas.form',['modo'=>'Crear']);
	</form>
</div>