<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\PostController;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }
    public function create()
    {
        return view('videos.create'); 
    }
    public function store(StoreVideoRequest $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->url = $request->url;
        $video->save();
        return redirect()->route('videos.index');
    }
    public function show($id)
    {
        $video = Video::with('comments')->findOrFail($id);
        return view('videos.show', compact('video'));
    }
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video')); 
    }
    public function update(UpdateVideoRequest $request, string $id)
    {
        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->url = $request->url;
        $video->save();
        return redirect()->route('videos.index');
    }
    public function destroy(string $id)
    {
        $video = Video::with('comments')->findOrFail($id);
        $video->delete();
        $video->comments()->delete();
        return redirect()->route('videos.index');
    }
    public function addComment(CommentRequest $request, string $videoId)
    {
        $video = Video::findOrFail($videoId);
        $video->comments()->create([
            'user_name' => $request->user_name,
            'body' => $request->body 
        ]);
        return redirect()->route('videos.show', $videoId);
    }
    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }
}