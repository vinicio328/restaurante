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
		<h1>Construir Orden</h1>  
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<!-- <img src="{{ asset('img/test-img.jpg') }}" class="card-img-top" alt="..."> -->
					<div class="card-header">	
						<div class="float-left">
							<h5>{{$orden->nombre}}</h5>
						</div>
						<div class="float-right">
							<h5 class="text-right"><span class="badge badge-pill badge-danger">Q. @convert($orden->total)</span></h5>
						</div>
						<div class="clearfix"></div>
						<p class="card-text">{{$orden->nombre }} | {{$orden->nit}}</p>
					</div>
					<div class="card-body">
						@foreach($items as $item)
							<x-orden-details :item="$item" :orden="$orden"></x-orden-details>
						@endforeach
					</div>
					<div class="card-body">
						<a href="{{ route('home')}}" class="btn btn-secondary">Regresar</a> 
						<a href="{{ route('ordens.index')}}" class="btn btn-primary">Facturar</a> 
						<form class="d-inline" action="{{ route('ordens.mover', $orden)}}" method="post">
							@csrf
							@method('PUT')
							<button class="btn btn-primary" type="submit">Mandar a cocina</button>
						</form> 
						<form class="d-inline" action="{{ route('ordens.destroy', $orden)}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Cancelar</button>
						</form> 
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h5>Menus</h5>
				<div class="list-group" style="max-height: 400px; overflow-y: auto;">
					@foreach($menus as $menu)
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">{{ $menu->nombre }}</h5>
							<small>Q. @convert($menu->costo)</small>
						</div>
						<p class="mb-1">{{ $menu->descripcion }}</p>
						<form action="{{ route('ordens.attach', $orden)}}" method="post">
							@csrf
							@method('PUT')
							<input type="hidden" name="elemento_type" value="menu">
							<input type="hidden" name="elemento_id" value="{{$menu->id}}">
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
					@endforeach		
					@if ($menus->count() == 0) 
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">No hay menus disponibles</h5>
						</div>
					</div>
					@endif
				</div>
				<br>
				<h5>Elementos</h5>
				<div class="list-group" style="max-height: 400px; overflow-y: auto;">
					@foreach($elementos as $elemento)
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">{{ $elemento->nombre }}</h5>
							<small>Q. @convert($elemento->costo)</small>
						</div>
						<p class="mb-1">{{ $elemento->descripcion }}</p>
						<form action="{{ route('ordens.attach', $orden)}}" method="post">
							@csrf
							@method('PUT')
							<input type="hidden" name="elemento_type" value="elemento">
							<input type="hidden" name="elemento_id" value="{{$elemento->id}}">
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
					@endforeach		
					@if ($elementos->count() == 0) 
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">No hay elementos disponibles</h5>
						</div>
					</div>
					@endif
				</div>
				<br>
				
			</div>
		</div>
	</div>
</div>
@endsection