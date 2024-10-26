@extends('layouts.app')

@section('title', 'Post Tafsilotlari')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Post Tafsilotlari</h1>
    <div class="card mb-5">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Post sarlavhasi: {{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Tahrirlash</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">O'chirish</button>
            </form>
        </div>
    </div>

    <!-- Comment Section -->
    <div class="comments-section">
        <h4 class="mt-4">Izoh qoldirish</h4>
        <form action="{{ route('posts.addComment', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_name" class="form-label">Ismingiz</label>
                <input type="text" class="form-control" name="user_name">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Izohingiz</label>
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>

        <h2>Izohlar</h2>
        @foreach ($comments as $comment)
            <div class="comment mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user_name }}</h5>
                        <p class="card-text">{{ $comment->body }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        <form action="{{ route('posts.destroyComment', $comment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection