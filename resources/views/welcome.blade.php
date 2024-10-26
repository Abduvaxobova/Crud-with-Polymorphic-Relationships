@extends('layouts.app')
@section('title', 'Bosh Sahifa')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <!-- Post-lar CRUD tugmasi -->
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Post-lar CRUD</h5>
                        <p class="card-text">Post-larni boshqarish (qo'shish, tahrirlash, o'chirish).</p>
                        <a href="/posts" class="btn btn-primary">Post-lar</a>
                    </div>
                </div>
            </div>

            <!-- Video-larni CRUD tugmasi -->
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Video-larni CRUD</h5>
                        <p class="card-text">Video-larni boshqarish (qo'shish, tahrirlash, o'chirish).</p>
                        <a href="/videos" class="btn btn-primary">Video-larni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection