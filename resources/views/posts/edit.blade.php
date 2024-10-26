@extends('layouts.app')

@section('title', 'Postni Tahrirlash')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Postni Tahrirlash</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="content" class="form-label">Mazmun</label>
            <textarea class="form-control" name="content" rows="3">{{ $post->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Yangilash</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection
