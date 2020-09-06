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
		<h1>Estudiantes</h1>    
		 
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Numero de Factura</td>
					<td>Nombre Cliente</td>
					<td>Nit</td>
					<td>Carnet</td>
					<td colspan="3" style="width: 30%">Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($estudiantes as $estudiante)
				<tr>
					<td>{{$estudiante->id}}</td>
					<td>{{$estudiante->nombres}} {{$estudiante->apellidos}}</td>
					<td>{{$estudiante->email}}</td>
					<td>{{$estudiante->carnet}}</td>
					
					
					<td>
						<a href="{{ route('descargarpdf',$estudiante->id)}}" class="btn btn-primary">Boleta</a>
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection