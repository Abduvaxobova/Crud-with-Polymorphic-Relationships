@extends('layouts.app')
@section('title', 'Yangi Post Qo\'shish')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Yangi Post Qo'shish</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            @error('title')
            {{$message}}
            @enderror
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            @error('content')
                {{$message}}
            @enderror
            <label for="content" class="form-label">Mazmun</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection