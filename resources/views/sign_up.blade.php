@extends('template/loginTemplate')
@section('title', 'Sign Up')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        body {
            height:100%;
            background-repeat: no-repeat; 
            background-image: url("storage/assets/login.jpg");
            background-size:cover;
            background-position: 30%;
            background-attachment: fixed;
        }
        .signup {
            border-radius: 2px;
        }
        .logo {
            height: 200px;
            width: 100%;
            padding-bottom: 30px;
        }
    </style>
@section('body')
<div class="container">
    <div class="container">
        <div class="row" style="padding-bottom: 20px">
          <div class="col-12 signup mt-3 p-md-5 pt-3 bg-warning" style="padding-bottom: 20px" >
            <img src="storage/assets/logo.png" alt="logo" class="logo ">
            <h1><b>Sign Up</b></h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3 mt-4">
                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input placeholder="First Name" id="email" type="text" class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <input placeholder="Last Name" type="text" class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <input placeholder="Tanggal Lahir" type="date" class="form-control" name="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <input placeholder="Jenis Kelamin" type="text" class="form-control" name="jenisKelamin">
                </div>
                <div class="mb-3">
                    <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="g-recaptcha" data-sitekey="6Ldf2oAaAAAAAAPCxLnpCyZ1-toLmJhfyPt4qQiG"></div>
                @if(Session::has('g-recaptcha-response'))
                <p class="alert {{Session::get('alert-class', 'alert-info' )}}">
                {{Session::get('g-recaptcha-response')}}
                </p>
                @endif

                <br/>
               <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">
                        Sign Up
                    </button>
                    <a href="/" class="btn btn-primary mt-2">
                        Back to Home
                    </a> 
                </div>
                <p>Sudah punya akun? yuk <a href="/Login">log in.</a></p>
               

                </div>
            </form>
            
          </div>
        </div>
    </div>
</div>

@endsection