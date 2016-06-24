@extends('blocks.table')

@section('data')
<thead>
		<tr role="row">
			<th>Object</th>
			<th>Size (bytes)</th>
			<th></th>
		</tr>
</thead>
	<tbody>
		@foreach ($objects as $object)
			<tr role="row" id="{{$table}}_{{$object->id}}">
				<td>
					<a href="/objects/{{ $object->id }}">{{ $object->name }}</a>
				</td>
				<td>{{ strlen($object->data) }}</td>
				<td>
					@include('blocks.delete_row', ['modid'=>$object->id])
				</td>
			</tr>
		@endforeach
	</tbody>
@endsection