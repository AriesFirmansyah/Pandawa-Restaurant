@extends('template/loginTemplate')
@section('title', 'Log in')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .body {
            height:100%;
            background-repeat: no-repeat; 
            background-image: url("storage/assets/login.jpg");
            background-size:cover;
            background-position: 30%;
            opacity: 0.8
        }
        .logo {
            height: 200px;
            width: 100%;
            padding: 20px;
            padding-bottom: 0px
        }
        .leftside, .rightside {
            height: 100vh;
            width: 100%;
        }
        .leftside {
            height:100%;
            background-repeat: no-repeat; 
            background-image: url("storage/assets/login.jpg");
            background-size:cover;
            background-position: 30%;
            opacity: 0.8
        }
        .rightside {
            padding: 20px
        }
    </style>
@section('body')
<div>
    <div class="row g-0">
        <div class="col-lg-8 g-0">
            <div class="leftside">
            </div>
        </div>
        <div class="col-lg-4 col-md-12 g-0">
            <div class="rightside">
                <div class="container">
                  <div class="col-12">
                    @if (session('status'))
                        <div id="status" class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                      <img src="storage/assets/logo.png" alt="logo" class="logo ">
                      <div style="margin-left: 20px">
                        <h1 class="mt-4"><b>Sign in</b></h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="mb-3 mt-4">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Sign In
                                    </button>
                                    <a href="/" class="btn btn-primary mt-2">
                                        Back to Home
                                    </a> 
                                </div>
                            <p>Belum punya akun? yuk <a href="/SignUp">sign up.</a></p>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection