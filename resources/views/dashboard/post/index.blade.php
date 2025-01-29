@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Post</h1>
</div>     

<a href="/dashboard/post/create" class="btn btn-success mb-3 py-2"><i class="fa-solid fa-plus"></i> Buat Postingan</a>

<div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
             
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="/dashboard/post/{{$post->id}}" class="btn btn-info ">
                    <i class="fa-regular fa-eye"></i>
                </a>
                <a href="" class="btn btn-secondary ">
                <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="/dashboard/post/{{$post->id}}" class="btn btn-danger ">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr> 
            @empty
                <p>Belum Ada Postingan</p>
            @endforelse
           
          
          </tbody>
        </table>
      </div>
@endsection