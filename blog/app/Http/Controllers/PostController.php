<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        //obtient le message demandé, s'il est publié.
        $post = Post::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        //obtient toutes les catégories
        $categories = Category::all();

        //obtient tous les tags
        $tags = Tag::all();

        //obtient les 5 derniers messages
        $recent_posts = Post::query()
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $related_posts = Post::query()->where('is_published',true)->whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name'));
        })->where('id', '!=', $post->id)->take(3)->get();

        //assigner les variables à la vue
        return view('post', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts,
        ]);


    }
}
