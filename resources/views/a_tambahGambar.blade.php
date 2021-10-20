@extends('template/menuAdmin')

@section('title', 'Tambah Gambar')

@section('styles')
@section('body')
<div class="content-wrapper bg-success">
    <section class="content-header">
      <div class="container-fluid">
        <div class="col-md-12 d-flex flex-row bg-warning title" style="border-radius:10px">
          <h1 style="padding-bottom: 10px;">Tambah Gambar</h1>
        </div>
      </div>
    </section>
  
    <div class="container">
        <form method="POST" action="/tambahGambar" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Masukan Gambar</label>
                <input class="form-control @error('kategori') is-invalid @enderror" value="{{ old('gambar') }}" required autocomplete="kategori" type="file" id="formFile" name="gambar">
            </div>
            <button type="submit" class="btn btn-warning">
                Tambah gambar
            </button>
        </form>
    </div>
</div>



@endsection