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
								<div class="row">
									<div class="col-10">
										<form action="{{ route('menus.updateitem', $menu)}}" method="post" class="form-inline">
											@csrf
											@method('PUT')
											<input type="hidden" name="elemento_id" value="{{ $item->id}}">
											<div class="form-group">
												<label for="cantidad">Cantidad</label>
												<input class="form-control mx-sm-3" name="cantidad" type="number" min="1" value="{{$item->cantidad}}">
											</div>
											<div class="form-group">
												<button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar"  class="btn"><span class="fa fa-check"></span></button>
											</div>
										</form>
									</div>
									<div class="col">
										<form action="{{ route('menus.detach', $menu)}}" method="post">
											@csrf
											@method('PUT')
											<input type="hidden" name="elemento_id" value="{{ $item->elemento->id}}">
											<button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"  class="btn"><span class="fa fa-trash"></span></button>
										</form>

									</div>
								</div>
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
					@if ($elementos->count() == 0) 
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">No hay elementos disponibles</h5>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection