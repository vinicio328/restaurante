@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1>Restaurante</h1>
</div>
<div class="container">
	<div class="card-deck mb-3 text-center">
		@role('administrator')
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Elementos</h4>
			</div>
			<div class="card-body">             
				<p>
					Administre los elementos, los elementos son los alimentos individuales
				</p>
				<a href="{{ route('elementos.index') }}" class="btn btn-lg btn-block btn-primary">Administrar</a>
			</div>
		</div>
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Menus</h4>
			</div>
			<div class="card-body">
				<p>
					Administre los menus disponibles, armandolos con los elementos. 
				</p>
				<a href="{{ route('menus.index') }}" class="btn btn-lg btn-block btn-primary">Administrar</a>
			</div>
		</div> 
		@endrole
		@role('cajero')
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Ordenes</h4>
			</div>
			<div class="card-body">
				<p>
					Cree nuevas ordenes, añada menus, añada extras, personalice elementos. 
				</p>
				<a  href="{{ route('ordenes.create') }}"class="btn btn-lg btn-block btn-primary">Crear orden</a>
			</div>
		</div>
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Ordenes Pendientes</h4>
			</div>
			<div class="card-body">
				<p>
					Cambie de estado ordenes que no han sido completadas. 
				</p>
				<a href="{{ route('verorden.index') }}" class="btn btn-lg btn-block btn-primary">Ver ordenes pendientes</a>
			</div>
		</div>
		@endrole

		@role('mostrador')
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Ordenes</h4>
			</div>
			<div class="card-body">
				<p>
					Administre las ordenes que han sido completas en la cocina y estan listas para ser entregadas.
				</p>
				<a class="btn btn-lg btn-primary" href="{{ route('verorden.index') }}">Ver ordenes completas</a>
			</div>
		</div>
		@endrole

		@role('cocinero')
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Ordenes</h4>
			</div>
			<div class="card-body">
				<p>
					Administre las ordenes que han sido creadas, marquelas "En Proceso" o envialas al área de entrega.
				</p>
				<a class="btn btn-lg btn-primary" href="{{ route('verorden.index') }}">Ver ordenes pendientes</a>
			</div>
		</div>
		@endrole

	</div>
</div>

@endsection
