@extends('blocks.table')

@section('data')
<thead>
		<tr role="row">
			<th>Name</th>
			<th>Application Key</th>
			<th></th>
		</tr>
</thead>
	<tbody>
		@foreach ($apps as $myapp)
			<tr role="row" id="{{$table}}_{{$myapp->id}}">
				<td><a href="/apps/{{ $myapp->id }}">{{ $myapp->name }}</a></td>
				<td>{{ $myapp->key }}</td>
				<td>
					@include('blocks.delete_row', ['modid'=>$myapp->id])
				</td>
			</tr>
		@endforeach
	</tbody>
@endsection