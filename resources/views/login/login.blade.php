@extends('template.main')

@section('container')
<div class="content mt-4 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/login.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">


                            <!-- pesan message success -->
                            @if (session()->has('success'))
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </symbol>
                                </svg>

                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <!-- batas message -->


                            <h3>Sign In <i class="fa-solid fa-user"></i></h3>
                            <p class="mb-4 text-muted">Login Ke akun Blogmu</p>
                        </div>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username" class="mb-2"><b>Username</b></label>
                                <input type="text" class="form-control mb-3 @error('name')is-invalid @enderror" id="username" placeholder="Username"
                                    autocomplete="off" required name="username" >
                                    @error('name')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password" class="mb-2"><b>Password</b></label>
                                <input type="password" class="form-control @error('name')is-invalid @enderror" id="password" placeholder="Password"
                                    autocomplete="off" required name="password">
                                    @error('password')
                                        <small class="invalid-feedback mb-1">{{ $message }}</small>
                                    @enderror
                            </div>
                            <input type="submit" value="Login" class="btn btn-block btn-primary">
                        </form>
                        <small class="d-block mt-4">Belum Punya Akun? daftar di <a href="/register"
                                class="text-decoration-none">sini</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection