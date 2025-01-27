@extends('template.main')

@section('container')
<div class="content mt-4 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Register <i class="fa-solid fa-user"></i></h3>
                                <p class="mb-4 text-muted">Buat akun Blogmu</p>
                            </div>
                            <form action="/register" method="post">
                            <div class="form-group mb-3">
                                @csrf
                                    <label for="nama" class="mb-2"><b>Nama</b></label>
                                    <input type="text" class="form-control  @error('name')is-invalid @enderror" id="nama" placeholder="Name" autocomplete="off" required name="name" value="{{old('name')}}">
                                    @error('name')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="mb-2"><b>Username</b></label>
                                    <input type="text" class="form-control  @error('username')is-invalid @enderror" id="username" placeholder="Username" autocomplete="off" required name="username" value="{{old('username')}}">
                                    @error('username')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="mb-2"><b>Email</b></label>
                                    <input type="email" class="form-control mb-3 @error('email')is-invalid @enderror" id="email" placeholder="Email" autocomplete="off" required name="email" value="{{old('email')}}">
                                    @error('email')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="mb-2"><b>Password</b></label>
                                    <input type="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" autocomplete="off" required name="password" value="{{old('password')}}">
                                    @error('password')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <input type="submit" value="Register" class="btn btn-block btn-primary">
                            </form>
                            <small class="d-block mt-4">Sudah punya akun? Login di <a href="/login" class="text-decoration-none">sini</a>
                                </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 contents">
                        <img src="img/register.png" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

@endsection

