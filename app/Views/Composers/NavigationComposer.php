<?php 
namespace App\Views\Composers;

use Illuminate\View\View;
use App\Post;
use App\Category;

class NavigationComposer
{
	public function compose(View $view)
	{
		$this->composeCategories($view);

		$this->composePopularPosts($view);
	}

	public function composeCategories(View $view)
	{
		$categories = Category::with(['posts' => function($query) {
            $query->published();
        }])->orderBy('title', 'acs')->get();

     	$view->with('categories', $categories);
	}

	public function composePopularPosts(View $view)
	{
		$popularPosts = Post::published()->popular()->take(3)->get();

        $view->with('popularPosts', $popularPosts);
	}
}

