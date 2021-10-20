@extends('template/menuAdmin')

@section('title', 'Admin')

@section('styles')
<style>
  .gambarPromo{
    width: 150px;
    height: 150px;
  }
  .title{
    padding-top: 15px;
    padding-bottom: 15px;
  }
  .makanan {
    padding-bottom: 10px;
    border-bottom: 3px solid #272525
  }
  .makananImage {
    max-width: 180px;
  }
  .font {
    font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold
  }
  .colorwhite {
    color: aliceblue
  }
  .colorblack {
    color: black
  }
</style>
@section('body')
<div class="content-wrapper bg-success">
    <section class="content-header">
      <div class="container-fluid">
        <div class="col-md-12 d-flex flex-row bg-warning title" style="border-radius:10px">
          <h1 style="padding-bottom: 10px;">Tambah Data</h1>
        </div>
      </div>
    </section>
  
    <div class="container">
        <form method="POST" action="/tambahData" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-4">
                <label for="nama" class="form-label">Nama</label>
                <input id="nama" placeholder="Nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input id="harga" placeholder="Harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('nama') }}" required autocomplete="harga">
            </div>
            <div class="mb-3">
                <label for="diskon" class="form-label">Diskon</label>
                <input id="diskon" placeholder="Diskon (%)" type="number" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon') }}" required autocomplete="diskon">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input id="kategori" placeholder="Kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" required autocomplete="kategori">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Masukan Gambar</label>
                <input class="form-control @error('kategori') is-invalid @enderror" value="{{ old('gambar') }}" required autocomplete="kategori" type="file" id="formFile" name="gambar">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea id="keterangan" placeholder="Keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">
                Tambah data
            </button>
        </form>
    </div>
</div>



@endsection