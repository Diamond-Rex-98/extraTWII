<h1>{{ $modo }}</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{ url('peliculas') }}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
	<label for="Título">Título</label>
	<input type="text" name="Título" value="{{ isset($peliculas->Título)?$peliculas->Título:old('Título') }}" id="Título">
	</div>
	@if(isset($peliculas->Portada))
	<!--<label for="Portada">Portada</label>
	 {{ $peliculas->Portada }} -->
	<img class="img-thumbnail img-fluid" src="{{ assets('storage').'/'.$peliculas->Portada:old('Portada') }}" width="100" alt="">
	@endif
	<input type="file" name="Portada"  value="" id="Portada">
	<div class="form-group">
	<label for="Estudio">Estudio</label>
	<input type="text" name="Estudio" value="{{ isset($peliculas->Estudio)?$peliculas->Estudio:old('Estudio') }}" id="Estudio">
	</div>
	<div class="form-group">
	<label for="Género">Género</label>
	<input type="text" name="Género" value="{{ isset($peliculas->Género)?$peliculas->Género:old('Género') }}" id="Género">
	</div>
	<div class="form-group">
	<label for="Año">Año</label>
	<input type="text" name="Año" value="{{ isset($peliculas->Año)?$peliculas->Año:old('Año') }}" id="Año">
	</div>
	<div class="form-group">
	<label for="Director">Director</label>
	<input type="text" name="Director" value="{{ isset($peliculas->Director)?$peliculas->Director:old('Director') }}" id="Director">
	</div>
	<label for="Enviar">Enviar</label>
	<input class="btn btn-success" type="submit" value="{{ $modo }} Datos" name="Enviar" id="Enviar">
	<a class="btn btn-primary" href="{{ url('peliculas/create') }}">Regresar</a>
	<br>
</form>