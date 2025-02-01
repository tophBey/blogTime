@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Postingan</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" placeholder="Masukan judul" required value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" disabled readonly value="{{old('slug')}}">
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
                    @if(old('category_id') == $category->id)
                        <option value="{{$category->id}}" selected>{{ $category->name }}</option>

                    @else
                         <option value="{{$category->id}}" >{{ $category->name }}</option>
                    @endif
                @endforeach
               
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Input Gambar</label>
            <img  alt="" class="img-preview img-fluid mb-3">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <div class="invalid-feedback">
                    <h4>{{ $message }}</h4>
                </div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{old('body')}}">
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


    function previewImage(){
        const oFReader = new FileReader()

        const image =document.getElementById('image')
        const imagePreview =document.querySelector('.img-preview')

        imagePreview.style.display = 'block'

        oFReader.readAsDataURL(image.files[0])
        oFReader.onload = function(oFREvent){
            imagePreview.src = oFREvent.target.result
        }

    }
    

</script>


@endsection