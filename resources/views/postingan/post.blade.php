@extends('template.main')

@section('container')

<h1 class="mb-5 mt-5 pt-5">Halaman Blog {{ $posts->author->username }}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <h1>{{ $posts->title }}</h1>
                <p>By
                    <a href="/posts?author={{$posts->author->username}}" class="text-decoration-none">
                        {{ $posts->author->name }}
                    </a> In
                    <a class="text-decoration-none"
                        href="/posts?category={{$posts->category->slug}}">{{ $posts->category->name }}</a>
                </p>
                
                <img src="{{ asset('img') . '/' . $posts->category->name . '.jpg'}}" alt="{{$posts->category->name}}" width="100%" height="500" class="mb-4">
                {!! $posts->body !!}
                <br>
                <!-- {{ $posts->body }} -->
            <a href="/posts" class="mb-5 btn btn-primary">Kembali</a>
        </div>
    </div>
</div>





@endsection