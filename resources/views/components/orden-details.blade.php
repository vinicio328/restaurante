<div class="card my-1">
	<div class="card-header">
		@if($esMenu)
		<div class="float-left">
			<h5>{{$menu->nombre}}</h5>
		</div>
		<div class="float-right">
			<h5 class="text-right"><span class="badge badge-pill badge-danger">Q. @convert($item->precio)</span>				
				<form class="d-inline form-inline" action="{{ route('ordens.detach', $orden)}}" method="post">
					@csrf
					@method('PUT')
					<input type="hidden" name="elemento_id" value="{{ $item->id}}">
					<input type="hidden" name="elemento_type" value="menu">
					<button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"  class="btn"><span class="fa fa-trash"></span></button>
				</form>
			</h5>
		</div>
		<div class="clearfix"></div>
		<p class="card-text">{{$menu->descripcion}}</p>
		@else 
		<div class="float-left">
			<h5>{{$elemento->nombre}}</h5>
		</div>
		<div class="float-right">
			<h5 class="text-right"><span class="badge badge-pill badge-danger">Q. @convert($elemento->costo)</span>
				<form class="d-inline form-inline" action="{{ route('ordens.detach', $orden)}}" method="post">
					@csrf
					@method('PUT')
					<input type="hidden" name="elemento_id" value="{{ $item->id}}">
					<input type="hidden" name="elemento_type" value="elemento">
					<button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"  class="btn"><span class="fa fa-trash"></span></button>
				</form>
			</h5>
		</div>
		<div class="clearfix"></div>
		<p class="card-text">{{$elemento->descripcion}}</p>		
		@endif
	</div>
	@if($item && $item->children->count() > 0)
	<div class="card-body">
		
		<h6>Elementos</h6>
		<ul class="list-group list-group-flush">
			@foreach($item->children as $elementoMenu)
			<div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">{{ $elementoMenu->elemento->nombre }}</h5>
					<small>Q. @convert($elementoMenu->precio)</small>
				</div>
				<p class="mb-1">{{ $elementoMenu->elemento->descripcion }}</p>
				<div class="row">					
					<div class="col-10">
						<form action="" class="form-inline">
						<div class="form-group">
							<label for="cantidad">Cantidad</label>
								<input disabled class="form-control mx-sm-3" name="cantidad" type="number" min="1" value="{{$elementoMenu->cantidad}}">
						</div>
						</form>
					</div>
					<div class="col-2">
						<a href="{{ route('ordens.ordenitems.edit', [$orden, $elementoMenu]) }}" data-toggle="tooltip" data-placement="top" title="Cambiar"  class="btn"><span class="fa fa-exchange-alt"></span></a>
					</div>
				</div>
			</div>
			@endforeach	
		</ul>
	</div>
	@endif

</div>