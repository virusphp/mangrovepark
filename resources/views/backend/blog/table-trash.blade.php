<table class="table table-bordered">
<thead>
	<tr>
		<td>Action</td>
		<td>Title</td>
		<td>Author</td>
		<td>Category</td>
		<td>Date</td>
	</tr>
</thead>
<tbody>
	@foreach($posts as $post)
		<tr>
			<td>
					{!! Form::open(['style' => 'display:inline-block','method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
    				<button title="restore" class="btn btn-xs btn-default">
    					<i class="fa fa-refresh"></i>
    				</button>
    				{!! Form::close() !!}
					{!! Form::open(['style' => 'display:inline-block','method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]) !!}
    				<button title="Delete Permanent" onclick="return confirm('Apa kamu yakin ingin menghapus permanent.?')" type="submit" class="btn btn-xs btn-danger">
    					<i class="fa fa-times"></i>
    				</button>
    			{!! Form::close() !!}
			</td>
			<td>{{ $post->title }}</td>
			<td>{{ $post->author->name }}</td>
			<td>{{ $post->category->title }}</td>
			<td>
				<abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
			</td>
		</tr>
	@endforeach
</tbody>
</table>