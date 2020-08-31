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
		<h1>Construir Menu</h1>  
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<!-- <img src="{{ asset('img/test-img.jpg') }}" class="card-img-top" alt="..."> -->
					<div class="card-header">	
							<div class="float-left">
								<h5>{{$menu->nombre}}</h5>
							</div>
							<div class="float-right">
								<h5 class="text-right"><span class="badge badge-pill badge-danger">Q. @convert($menu->costo)</span></h5>
							</div>
							<div class="clearfix"></div>
						<p class="card-text">{{$menu->descripcion}}</p>
					</div>
					<div class="card-body">
					<h6>Elementos</h6>
					<ul class="list-group list-group-flush">
						@foreach($menu->items as $item)
						<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">{{ $item->elemento->nombre }}</h5>
								<small>Q. @convert($item->elemento->costo)</small>
							</div>
							<p class="mb-1">{{ $item->elemento->descripcion }}</p>
						</div>
						@endforeach
					</ul>
					</div>
					<div class="card-body">
						<a href="{{ route('menus.index')}}" class="btn btn-secondary">Regresar</a>  
						<a href="{{ route('menus.edit', $menu)}}" class="btn btn-primary">Editar</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="list-group">
					@foreach($elementos as $elemento)
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">{{ $elemento->nombre }}</h5>
							<small>Q. @convert($elemento->costo)</small>
						</div>
						<p class="mb-1">{{ $elemento->descripcion }}</p>
						<small>Donec id elit non mi porta.</small>
						<form action="{{ route('menus.attach', $menu)}}" method="post">
							@csrf
							@method('PUT')
							<input type="hidden" name="elemento_id" value="{{$elemento->id}}">
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
					@endforeach					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection