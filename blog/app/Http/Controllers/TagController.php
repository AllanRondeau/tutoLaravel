<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __invoke($slug)
    {
        //obtient la tag par rapport au slug
        $tag = Tag::query()
            ->where('slug', $slug)
            ->firstOrFail();

        //obtient les articles publié en fonction du tag
        $posts = $tag->posts()
            ->where('published',true)
            ->orderBy('id','desc')
            ->get();

        //obtient tous les articles
        $categories = Category::all();

        //obtient tous les tags
        $tags = Tag::all();

        //obtient les 5 articles récents
        $recent_posts = Post::query()
            ->where('published',true)
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        //assigner les variables à la vue
        return view('tag', [
            'tag' => $tag,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ]);
    }
}
