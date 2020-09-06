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
		<h1>Cambiar Elemento</h1>  
		<div class="row">
			<div class="col-sm-6">
				<div class="card">					
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
						<div class="card">
							<div class="card-header">
							<div class="float-left">
								<h5>{{$ordenItem->elemento->nombre}}</h5>
							</div>
							<div class="float-right">
								<h5 class="text-right"><span class="badge badge-pill badge-danger">Q. @convert($ordenItem->precio)</span>
								</h5>
							</div>
							<div class="clearfix"></div>
							<p class="card-text">{{$ordenItem->elemento->descripcion}}</p>		
							</div>
						</div>
					</div>
					<div class="card-body">
						<a href="{{ route('ordens.show', $orden)}}" class="btn btn-secondary">Regresar</a> 						
					</div>
				</div>
			</div>
			<div class="col-sm-6">				
				<h5>Elementos Disponibles</h5>
				<div class="list-group" style="max-height: 400px; overflow-y: auto;">
					@foreach($elementos as $elemento)
					<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">{{ $elemento->nombre }}</h5>
							<small>Q. @convert($elemento->costo)</small>
						</div>
						<p class="mb-1">{{ $elemento->descripcion }}</p>
						<form action="{{ route('ordens.ordenitems.update', [$orden, $ordenItem])}}" method="post">
							@csrf
							@method('PUT')
							<input type="hidden" name="elemento_id" value="{{$elemento->id}}">
							<button class="btn btn-primary" type="submit">Cambiar</button>
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