<?php 

function postImages($authorId) {
	return DB::table('users')
			->select('users.*', DB::raw('count(posts.id) as total'))
			->join('posts', 'posts.author_id', '=', 'users.id')
			->where('posts.author_id', $authorId)
			->groupBy('posts.author_id')
			->get();
}
