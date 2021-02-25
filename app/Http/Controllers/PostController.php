<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();

        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->usuario()->associate($request->user());
        $post->save();

        return redirect('/post');
    }

    public function editar(Post $post)
    {
        // Gate::authorize('actualizar-post', $post);
        // abort_if($request->user()->cannot('update', $post), 403);
        $this->authorize('update', $post);

        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        // Gate::authorize('actualizar-post', $post);

        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->save();

        return redirect('/post');
    }
}
