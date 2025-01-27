@extends('template.main')

@section('container')

<h1 class="mb-5 pt-5">Post Categories</h1>

<div class="container">
    <div class="row">
    @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="card text-bg-dark">
                <a href="/posts?category={{ $category->slug }}" class="text-white">
                <img src="{{ asset('img') . '/' . $category->name . '.jpg'}}" class="card-img" alt="...">
                
                <div class="card-img-overlay">
                    <h5 class="card-title">{{ $category->name }}</h5>
                </div>
                </a>
            </div>
        </div>
     @endforeach
    </div>

    <a class="btn btn-primary mb-3 mt-5" href="/posts">Kembali</a>
</div>


@endsection