@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">		
			@if($elemento->exists)
			<h1>Editar elemento: {{$elemento->nombre}}</h1>
			<br>
			<div>	
				<form class="flex flex-col w-full" method="POST" action="{{ route('elementos.update',$elemento) }}">
					@method('put')
			@else
			<h1>Agregar un elemento</h1>
			<br>
			<div>	
				<form class="flex flex-col w-full" method="POST" action="{{ route('elementos.store') }}">
			@endif
				@csrf
				<div class="form-group">    
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $elemento->nombre) }}"/>
                    @error('nombre')
                    <p class="text-danger text-xs italic mt-4">{{ $message }}</p>
                    @enderror
				</div>

				<div class="form-group">
					<label for="descripcion">Descripcion:</label>
					<textarea name="descripcion" id="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $elemento->descripcion)}}</textarea>
					@error('descripcion')
                    <p class="text-danger text-xs italic mt-4">{{ $message }}</p>
                    @enderror
				</div>      
				<div class="form-check">					
					<input type="checkbox" name="sin_costo" class="form-check-input @error('descripcion') is-invalid @enderror" id="sin_costo" value="1" {{ !old()?$elemento->sin_costo:old('sin_costo')?' checked':'' }}>
				    <label class="form-check-label" for="sin_costo">Sin costo</label>
				    @error('sin_costo')
                    <p class="text-danger text-xs italic mt-4">{{ $message }}</p>
                    @enderror
			  	</div>
			  	<div class="form-group">    
			  		<label for="costo">Costo:</label>
			  		<input type="number" min="1" step="any"  name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $elemento->costo) }}"/>
			  		@error('costo')
			  		<p class="text-danger text-xs italic mt-4">{{ $message }}</p>
			  		@enderror
			  	</div>
				<button type="submit" class="btn btn-primary">
					@if($elemento->exists)
					Actualizar
					@else
					Agregar
					@endif
				</button>
				<a rel="button" href="{{ route('elementos.index') }}" class="btn btn-secondary">Cancelar</a>
			</form>
	  </div>
	</div>
</div>
@endsection