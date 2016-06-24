@extends('blocks.table')

@include('errors.app')

@section('data')
<thead>
		<tr role="row">
			<th></th>
			<th>VIN</th>
			<th>Year</th>
			<th>Make</th>
			<th>Model</th>
			<th></th>
		</tr>
</thead>
	<tbody>
		@foreach ($vehicles as $v)
			<tr role="row" id="{{$table}}_{{$v->id}}">
				<td><img src="{{$v->img_url}}" style="width: 100px; border-radius: 5px; margin: 0 auto; display: block;" /></td>
				<td>{{$v->vin}}</td>
				<td>{{$v->year}}</td>
				<td>{{$v->make}}</td>
				<td>{{$v->model}}</td>
				<td>
					@include('blocks.delete_row', ['modid'=>$v->id])
				</td>
			</tr>
		@endforeach
	</tbody>
@endsection