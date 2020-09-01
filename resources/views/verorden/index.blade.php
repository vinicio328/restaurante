@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">		
		@role('mostrador')
		<h1 align="center" >Ordenes Por Entregar </h1>
		@else
		<h1 align="center" >Ordenes Pendientes</h1>
		@endrole
		<div class="row">
			@foreach($ordens as $orden)
			<div class="card col-md-4 mx-2 my-2 @if($orden->estado == 'En Proceso') border-success @endif">
				<div class="card-body">			
					<div class="page-header">
						<div class="float-left">
							Orden No. {{ $orden->id }}
						</div>
						<div class="float-right">
							<p class="text-right">
								<span class="badge badge-pill badge-primary">
									{{$orden->created_at->diffForHumans()}}
								</span>
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<h6 class="card-subtitle mb-2 text-muted">{{ $orden->nombre }} | {{ $orden->nit }}</h6>
					<p class="card-text">Estado: {{ $orden->estado }}</p>
				</div>
				<ul class="list-group list-group-flash">
				</ul>
				<div class="card-body">
					<div class="row">							
						@role('mostrador')
						<div class="col-sm-4 px-1">
							<form action="{{ route('verorden.update', $orden)}}" method="post">
								@csrf
								@method('PUT')
								<input type="hidden" name="estado" value=4>
								<button class="btn btn-primary" type="submit">Completado</button>
							</form>
						</div>	
						@else
						<div class="col-sm-4 px-1">
							<form action="{{ route('verorden.update', $orden)}}" method="post">
								@csrf
								@method('PUT')
								<input type="hidden" name="estado" value=2>
								<button class="btn btn-primary" type="submit">En Proceso</button>
							</form>
						</div>
						<div class="col-sm-4 px-1">
							<form action="{{ route('verorden.update', $orden)}}" method="post">
								@csrf
								@method('PUT')
								<input type="hidden" name="estado" value=3>
								<button class="btn btn-primary" type="submit">Completado</button>
							</form>
						</div>
						<div class="col-sm-4 px-1">
							<form action="{{ route('verorden.update', $orden)}}" method="post">
								@csrf
								@method('PUT')
								<input type="hidden" name="estado" value=5>
								<button class="btn btn-danger" type="submit">Cancelar</button>
							</form>
						</div>
						@endrole	
					</div>
				</div>
			</div>
			@endforeach
			@if ($ordens->count() == 0) 
				<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">No hay ordenes :'(</h5>
					</div>
				</div>
			@endif

		</div>
	</div>
</div>
@endsection