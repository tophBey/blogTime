@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Category</h1>
</div>   



@if (session()->has('addSuccess'))
  <div class="alert alert-success col-md-8">
    {{ session('addSuccess') }}
  </div>
  @endif

<a href="/dashboard/category/create" class="btn btn-success mb-3 py-2"><i class="fa-solid fa-plus"></i> Create Category</a>

<div class="table-responsive small col-md-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
             
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $category )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/dashboard/category/{{$category->id}}" class="btn btn-info ">
                    <i class="fa-regular fa-eye"></i>
                </a>
                <a href="/dashboard/category/{{$category->id}}/edit" class="btn btn-secondary ">
                <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <form action="/dashboard/category/{{$category->id}}" method="POST" class="d-inline">
                  @method('delete')
                @csrf
                  <button type="submit" class="btn btn-danger border-0">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
               
              </td>
            </tr> 
            @empty
                <p>Belum Ada Kategori</p>
            @endforelse
           
          
          </tbody>
        </table>
      </div>
@endsection