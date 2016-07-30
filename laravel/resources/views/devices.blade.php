@extends('blocks.table')

@include('errors.app')

@section('data')
<thead>
		<tr role="row">
			<th>Name</th>
			<th></th>
		</tr>
</thead>
	<tbody>
		@foreach ($rows as $v)
			<tr role="row" id="{{$table}}_{{$v->id}}">
				<td>
					<a href="/devices/{{ $v->id }}">{{ $v->user_name }}</a>
				</td>
				<td>
					@include('blocks.deactive_device', ['modid'=>$v->id, 'name'=>$v->user_name])
					@include('blocks.delete_row', ['modid'=>$v->id])
				</td>
			</tr>
		@endforeach
	</tbody>
@endsection