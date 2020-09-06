	@if($esMenu)
	<tr>
		<td>
			{{$menu->id}}
		</td>
		<td></td>
		<td>
			{{$menu->nombre}}
		</td>
		<td>Q. @convert($item->precio)</td>
	</tr>
	@else 
	<tr>
		<td>
			{{$elemento->id}}
		</td>
		<td></td>
		<td>
			{{$elemento->nombre}}
		</td>
		<td>Q. @convert($item->precio)</td>
	</tr>
	@endif
	@if($item && $item->children->count() > 0)


	@foreach($item->children as $elementoMenu)
	<tr>
		<td></td>
		<td>
			{{$elementoMenu->elemento->id}}
		</td>
		<td>
			{{ $elementoMenu->elemento->nombre }}
		</td>
		<td>
			Q. @convert($elementoMenu->precio)
		</td>
	</tr>
	@endforeach	
	@endif
