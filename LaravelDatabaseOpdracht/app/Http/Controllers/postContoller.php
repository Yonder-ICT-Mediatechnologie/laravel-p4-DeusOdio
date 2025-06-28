<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class postContoller extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect('/home');
    }

    public function deletePost(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        
        $post->delete();
        return redirect('/myPost')->with('success', 'Post deleted successfully!');
    }

    public function showEditForm(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('edit', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $incomingFields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect('/myPost')->with('success', 'Post updated successfully!');
    }
}
