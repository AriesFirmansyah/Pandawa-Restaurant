@extends('template/menuAdmin')

@section('title', 'Admin')

@section('styles')
  <style>
  .adminTitle{
    text-align: center;
  }
  </style>

@section('body')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Home</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="jumbotron">
    <h1 class="display-4">Selamat Datang, Admin!</h1>
    <p class="lead">Selamat datang di halaman menu admin! 
      Gunakanlah sistem ini untuk kepentingan penjualan dan pemasaran produk. 
      Tingkatkan pelayanan, fitur, dan tampilan untuk kenyamanan user!<br><br>
      ~Tim Pandawa Restaurant</p>
    <hr class="my-4">
    <p>Ingin beralih ke halaman user?</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="/" role="button">Switch ke Halaman User</a>
    </p>
  </div>
</div>

@endsection
