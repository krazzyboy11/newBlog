<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index()
    {
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
        return view("blog.index", compact('posts','categories'));
    }
    public function category(Category $category)
    {
        $categoryName = $category->title;
        /*$categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();*/
        /*$posts = Post::with('author')
            ->latestFirst()
            ->published()
            ->where('category_id', $id)
            ->simplePaginate($this->limit);*/
        $posts = $category->posts()->with('author')->latestFirst()->published()->simplePaginate($this->limit);

        return view("blog.index", compact('posts','categoryName'));
    }
    public function author(User $author){

        $authorName = $author->name;
        /*$categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();*/
        /*$posts = Post::with('author')
            ->latestFirst()
            ->published()
            ->where('category_id', $id)
            ->simplePaginate($this->limit);*/
        $posts = $author->posts()->with('category')->latestFirst()->published()->simplePaginate($this->limit);

        return view("blog.index", compact('posts','authorName'));
    }

    public function show(Post $post)
    {
        $post->increment('view_count');
        /*$viewCount = $post->view_count + 1;
        $post->update(['view_count' => $viewCount]);*/
        return view("blog.show", compact('post'));
    }
}
