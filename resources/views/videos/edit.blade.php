@extends('layouts.app')

@section('title', 'Video tahrirlash')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Video tahrirlash</h1>
    <form action="{{ route('videos.update', $video->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('title')
                {{ $message }}
            @enderror
            <label for="title" class="form-label">Video Sarlavhasi</label>
            <input type="text" class="form-control" name="title" value="{{ $video->title }}" required>
        </div>
        <div class="mb-3">
            @error('url')
                {{ $message }}
            @enderror
            <label for="url" class="form-label">Video URL</label>
            <input type="url" class="form-control" name="url" value="{{ $video->url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Yangilash</button>
        <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection
