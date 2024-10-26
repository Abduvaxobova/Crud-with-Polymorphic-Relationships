@extends('layouts.app')

@section('title', 'Yangi video qo\'shish')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Yangi video qo'shish</h1>
    <form action="{{ route('videos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            @error('title')
                {{ $message }}
            @enderror
            <label for="title" class="form-label">Video Sarlavhasi</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            @error('url')
                {{ $message }}
            @enderror
            <label for="url" class="form-label">Video URL</label>
            <input type="url" class="form-control" name="url">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection
