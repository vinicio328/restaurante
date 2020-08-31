@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 align="center" >Ordenes Pendientes</h1>
		<div class="row">
		@foreach($ordens as $orden)
		<div class="card col-md-4 mx-2 my-2">
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
				<a href="#" class="btn btn-primary">En Progeso</a>
				<a href="#" class="btn btn-primary">Completado</a>
				<a href="#" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		@endforeach
		</div>
	</div>
</div>
@endsection