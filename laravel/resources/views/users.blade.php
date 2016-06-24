@extends('blocks.table')

@section('data')
<thead>
		<tr role="row">
			<th>User</th>
			<th>Member Since</th>
			<th></th>
		</tr>
</thead>
	<tbody>
		@foreach ($users as $user)
			<tr role="row" id="{{$table}}_{{$user->id}}">
				<td>
					<img src="http://www.gravatar.com/avatar/{{ md5($user->email) }}?s=20" height="20" width="20">&nbsp;
					<a href="/users/{{ $user->id }}">{{ $user->name }}</a>
				</td>
				<td>{{ date('M. Y', strtotime($user->created_at)) }}</td>
				<td>
					@if ($user->id != $app->request->user()->id)
					@include('blocks.delete_row', ['modid'=>$user->id])
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
@endsection