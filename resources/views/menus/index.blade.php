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
		<h1>Menus</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('menus.create')}}" class="btn btn-primary">Nuevo menu</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Descripcion</td>
					<td>Costo</td>
					<td colspan="3" style="width: 25%">Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($menus as $menu)
				<tr>
					<td>{{$menu->id}}</td>
					<td>{{$menu->nombre}}</td>
					<td>{{$menu->descripcion}}</td>		
					<td>Q. @convert($menu->costo)</td>
					<td>
						<a href="{{ route('menus.edit', $menu->id)}}" class="btn btn-primary">Editar</a>
					</td>
					<td>
						<a href="{{ route('menus.show', $menu->id)}}" class="btn btn-primary">Detalles</a>
					</td>
					<td>
						<form action="{{ route('menus.destroy', $menu->id)}}" method="post">
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