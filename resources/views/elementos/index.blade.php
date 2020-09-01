@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">

		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}  
		</div>
		@endif
	</div>
	<div class="col-sm-12">
		<h1>Elementos</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('elementos.create')}}" class="btn btn-primary">Nuevo elemento</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Descripcion</td>
					<td>Sin costo</td>
					<td>Costo</td>
					<td colspan="3" style="width: 25%">Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($elementos as $elemento)
				<tr>
					<td>{{$elemento->id}}</td>
					<td>{{$elemento->nombre}}</td>
					<td>{{$elemento->descripcion}}</td>
					<td>{{$elemento->sin_costo ? 'Si': 'No'}}</td>					
					<td>Q. @convert($elemento->costo)</td>
					<td>
						<a href="{{ route('elementos.edit',$elemento->id)}}" class="btn btn-primary">Editar</a>
					</td>
					<td>
						<form action="{{ route('elementos.destroy', $elemento->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Borrar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection