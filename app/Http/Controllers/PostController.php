<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostStoreRequest $request)  // Use PostStoreRequest for validation
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function show(string $id)
    {
        $post = Post::with('comments')->findOrFail($id); 
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function update(PostUpdateRequest $request, string $id)  // Use PostUpdateRequest for validation
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy(string $id)
    {
        $post = Post::with('comments')->findOrFail($id);
        $post->delete();
        $post->comments()->delete();
        return redirect()->route('posts.index');
    }
    public function addComment(CommentRequest $request, string $postId)
    {
        $post = Post::findOrFail($postId);
        $post->comments()->create([
            'user_name' => $request->user_name,
            'body' => $request->body 
        ]);
        return redirect()->route('posts.show', $postId);
    }
    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }
}