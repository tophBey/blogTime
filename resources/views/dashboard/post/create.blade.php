@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Postingan</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/post" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukan judul" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukan judul" required disabled readonly>
        </div>
        <div class="mb-3">

            <label for="slug" class="form-label">Category</label>

            <select class="form-select" name="category_id">
                <option selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
               
            </select>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Body</label>

            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary px-3 py-2">Submit</button>
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