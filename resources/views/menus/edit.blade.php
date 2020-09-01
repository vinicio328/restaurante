@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">		
			@if($menu->exists)
			<h1>Editar menu: {{$menu->nombre}}</h1>
			<br>
			<div>	
				<form class="flex flex-col w-full" method="POST" action="{{ route('menus.update',$menu) }}">
					@method('put')
			@else
			<h1>Agregar un menu</h1>
			<br>
			<div>	
				<form class="flex flex-col w-full" method="POST" action="{{ route('menus.store') }}">
			@endif
				@csrf
				<div class="form-group">    
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $menu->nombre) }}"/>
                    @error('nombre')
                    <p class="text-danger text-xs italic mt-4">{{ $message }}</p>
                    @enderror
				</div>

				<div class="form-group">
					<label for="descripcion">Descripcion:</label>
					<textarea name="descripcion" id="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $menu->descripcion)}}</textarea>
					@error('descripcion')
                    <p class="text-danger text-xs italic mt-4">{{ $message }}</p>
                    @enderror
				</div>				
			  	<div class="form-group">    
			  		<label for="costo">Costo:</label>
			  		<input type="number" min="1" step="any"  name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $menu->costo) }}"/>
			  		@error('costo')
			  		<p class="text-danger text-xs italic mt-4">{{ $message }}</p>
			  		@enderror
			  	</div>
				<button type="submit" class="btn btn-primary">
					@if($menu->exists)
					Actualizar
					@else
					Agregar
					@endif
				</button>
				<a rel="button" href="{{ route('menus.index') }}" class="btn btn-secondary">Cancelar</a>
			</form>
	  </div>
	</div>
</div>
@endsection