@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Postingan</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/post/{{$post->id}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" placeholder="Masukan judul" required value="{{old('title', $post->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" disabled readonly value="{{old('slug', $post->slug)}}">
            @error('slug')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
        </div>
        <div class="mb-3">

            <label for="category_id" class="form-label">Category</label>

            @error('category_id')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror

            <select class="form-select" name="category_id">
                <option selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    @if(old('category_id', $post->category_id) == $category->id)
                        <option value="{{$category->id}}" selected>{{ $category->name }}</option>

                    @else
                         <option value="{{$category->id}}" >{{ $category->name }}</option>
                    @endif
                @endforeach
               
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{old('body', $post->body)}}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary px-3 py-2">Update</button>
        </div>
    </form>
</div>

<script>
    const title = document.getElementById('title')
    const slug = document.getElementById('slug')

    title.addEventListener('change', function(){
        fetch(`/dashboard/post/createSlug?title=${title.value}`)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })
</script>


@endsection