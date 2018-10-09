<?php
/**
 * Created by PhpStorm.
 * User: kk
 * Date: 10/9/2018
 * Time: 2:12 PM
 */
namespace App\Views\Composers;
use App\Category;
use App\Post;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view){
        $this->composerCategories($view);
        $this->composerPopularPosts($view);

    }

    private function composerCategories(View $view)
    {
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $view->with('categories', $categories);
    }

    private function composerPopularPosts(View $view)
    {
        $popularPosts = Post::published()->popular()->take(3)->get();
        $view->with('popularPosts',$popularPosts);
    }
}
