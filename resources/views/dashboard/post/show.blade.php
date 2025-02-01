@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <h1>{{ $post->title }}</h1>
                <p>By
                    <a href="/posts?author={{$post->author->username}}" class="text-decoration-none">
                        {{ $post->author->name }}
                    </a> In
                    <a class="text-decoration-none"
                        href="/posts?category={{$post->category->slug}}">{{ $post->category->name }}</a>
                </p>
                @if ($post->image)
                     <img src="{{ asset( 'storage') . '/' . $post->image}}" alt="{{$post->category->name}}" width="100%" height="500" class="mb-4">

                @else
                    <img src="{{ asset( 'img') . '/' . $post->category->name . '.jpg'}}" alt="{{$post->category->name}}" width="100%" height="500" class="mb-4">

                @endif
                {!! $post->body !!}
                <br>
            <a href="/dashboard/post" class="mb-5 btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

@endsection