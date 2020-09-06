<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>FACTURA</title>        
	<style>
		th, td {
  border-bottom: 1px solid #ddd;
}
		table {
			width: 100%;
		}

		th {
			height: 50px;
			text-align: left;
		}
	</style>
</head>
<body>
	<h1 align="center">FACTURA</h1>
	<strong>Numero de Factura:</strong>
	<a>{{$orden->id}}</a>
	<br>
	<strong>Fecha:</strong>
	<a>{{$orden->created_at}}</a>
	<br>
	<strong>Nombre del cliente:</strong>
	<a>{{ $orden->nombre }}</a>
	<br>
	<strong>NIT:</strong>
	<a>{{$orden->nit}}</a>
	<br>
	<div align="center">
		<table>
			<thead >
				<tr>
					<th width="10%">Codigo</th>
					<th width="5%"></th>
					<th>Descripcion</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<x-factura-details :item="$item" :orden="$orden"></x-factura-details>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>TOTAL</td>
					<td>Q. @convert($orden->total)</td>
				</tr>
			</tbody>

		</table>
	</div>


</body>
</html>