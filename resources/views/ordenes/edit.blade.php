@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1>Agregar una orden</h1>
		<br>
		<div>	
			<form class="flex flex-col w-full" method="POST" action="{{ route('ordenes.store') }}">
				@csrf
				<div class="form-group">    
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $orden->nombre) }}"/>
					@error('nombre')
					<p class="text-danger text-xs italic mt-4">{{ $message }}</p>
					@enderror
				</div>			
				<div class="form-group">    
					<label for="nit">Nit:</label>
					<input type="text" name="nit" class="form-control @error('nit') is-invalid @enderror" value="{{ old('nit', $orden->nit) }}"/>
					@error('nit')
					<p class="text-danger text-xs italic mt-4">{{ $message }}</p>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">					
					Agregar
				</button>
				<a rel="button" href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
			</form>
		</div>
	</div>
</div>
@endsection