<table class="table table-bordered">
<thead>
	<tr>
		<td>Action</td>
		<td>Nama</td>
		<td>Email</td>
		<td>Role</td>
	</tr>
</thead>
<tbody>
	@foreach($users as $user)
		<tr>
			<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['backend.users.destroy', $user->id]]) !!}
    				<a href="{{ route('backend.users.edit', $user->id ) }}" class="btn btn-xs btn-default">
    					<i class="fa fa-edit"></i>
    				</a>
    				@if($user->id == config('cms.default_user_id'))
							<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
								<i class="fa fa-times"></i>
							</button>
						@else

		    				<button onclick="return confirm('Apa kamu yakin?')" type="submit" class="btn btn-xs btn-danger">
		    					<i class="fa fa-times"></i>
		    				</button>
    				@endif
    			{!! Form::close() !!}
			</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>-</td>
		</tr>
	@endforeach
</tbody>
</table>