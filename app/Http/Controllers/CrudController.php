<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function view()
    {
        return view('layout.layout');
    }

    public function index()
    {
        $posts = Post::query()->get();
        return view('post.index', ['posts' => $posts]);

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        $post = new Post(array(
            'title' => $title,
            'body' => $body
        ));
        $post->save();
        return redirect()->route('posts.id', ['id' => $post->id]);

    }

    public function show($id)
    {
        $id = Post::findOrFail($id);
        return view('post.show', ['id' => $id]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        Post::findOrFail($id)->update($request->all());
        return redirect('view');
    }

    public function destroy($id)
    {
        Post::find($id)->delete($id);
        return redirect('view');
    }
}
