@extends('template.main')

@section('container')

<h1 class="mb-5 mt-5 pt-4 text-center">{{ $subtitle }}</h1>

<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif

                <!-- jika ada user query -->
                @if (request('author'))
                    <input type="hidden" name="author" value="{{request('author')}}">
                @endif
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari kata.." aria-label="Recipient's username"
                        aria-describedby="button-addon2" name="search" value="{{ request('search') }}" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- cek ada postingan atau tidak -->
@if ($posts->count())
    <div class="card mb-4 text-center">
        <img src="{{ asset('img') . '/' . $posts[0]->category->name . '.jpg'}}" class="card-img-top" alt="gambarnya lucak:("
            width="1100" height="600">
        <div class="card-body">
            <h3 class="card-title"><a class="text-decoration-none text-dark"
                    href="{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
            <small class="text-muted">
                <p>By <a class="text-decoration-none"
                        href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                    in
                    <a class="text-decoration-none"
                        href="/posts?category={{ $posts[0]->category->slug}}">{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </p>
            </small>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a class="text-decoration-none btn btn-primary mb-3" href="/posts/{{$posts[0]->slug}}">Read More</a>
        </div>
    </div>

    <!-- batas kondisi pengecekan -->


    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-white">
                            <div class="position-absolute px-2 py-2 text-white"
                                style=" background-color: rgba(153, 7, 237, 0.5); min-width: 40%; border-radius: 3px; height: 45px; font-size: 18px; text-align: center;">
                                {{ $post->category->name }}
                            </div>
                        </a>
                        <img src="{{ asset('img') . '/' . $post->category->name . '.jpg'}}" width="350" height="350"
                            class="card-img-top" alt="{{$post->category->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <small class="text-muted">
                                <p>By <a class="text-decoration-none"
                                        href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </small>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- when post not found -->
@else
    <p class="text-center fs-2 text-danger">Postingan <b>{{ request('search') }}</b> Tidak ditemukan</p>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card text-bg-dark">
                <img src="{{ asset('img') . '/' . 'not-found.png'}}" class="card-img" alt="404" width="250" height="450">
                <div class="card-img-overlay py-0 px-0">
                    <h5 class="card-title text-danger text-center py-2" style="background-color: rgba(255,0,0,0.5)">404 Not Found</h5>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>



@endsection