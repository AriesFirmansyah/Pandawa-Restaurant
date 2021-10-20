@extends('template/menuAdmin')

@section('title', 'Promo')

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
      <div class="container-fluid" style="text-align:center; font-weight:bold;">
        <div class="col-md-12 bg-warning title mb-2" style="border-radius:10px;">
          <h1 style="padding-bottom: 10px; color:black;">Promo Hari Ini</h1>
        </div>
      </div>
    </section>

    
    <div class="container-fluid bg-warning" style="text-align: center;">
      <div class="row  pb-5">
        @foreach ($menu as $data)
          @if ($data->kategori == "Promo")
            <div class="d-flex mt-5 col-md-12 makanan colorblack" data-aos="fade-right">
              <img class="makananImage font" src="{{asset("storage/assets/$data->gambar")}}" alt="menu">
              <div style="padding-left: 30px; text-align:left">
                <h5 class="font" style="text-transform: capitalize">{{ $data->nama }}</h5>
                <h6 class="font"> {{ $data->keterangan }}</h6>
                <h6 class="font">HARGA : Rp {{ $data->harga }}</h6>
                <h6 class="font">DISKON : {{ $data->diskon }}%</h6>
                <h6 class="font">KATEGORI : {{ $data->kategori }}</h6>
                <div>
                  <button data-bs-toggle="modal" data-bs-target="#editData{{ $data->id }}" type="button" class="btn btn-primary mt-2" style="border-radius: 25px">
                    Edit
                  </button>
                  <form action="/adminPromo/{{ $data->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger  mt-2" style="border-radius: 25px">
                      Delete
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editData{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="text-align: left">
                    <form action="/adminPromo/edit/{{ $data->id }}" method="POST">
                      @method('patch')
                      @csrf
                      <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" class="form-control" id="id" value="{{ $data->id }}" disabled>
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $data->id }}">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $data->nama }}" required autocomplete="nama" name="nama" id="nama">
                      </div>
                      <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" value="{{ $data->harga }}" required autocomplete="harga" name="harga" id="harga">
                      </div>
                      <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon (%)</label>
                        <input type="number" class="form-control @error('diskon') is-invalid @enderror" value="{{ $data->diskon }}" required autocomplete="diskon" name="diskon" id="diskon">
                      </div>
                      <div class="mb-3">
                        <label for="keterangan" class="form-label">Gambar (Source)</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" value="{{ $data->gambar }}" required autocomplete="gambar" type="file" id="formFile" name="gambar">
                      </div>
                      <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" required autocomplete="keterangan" name="keterangan" id="keterangan">{{ $data->keterangan }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" value="{{ $data->kategori }}" required autocomplete="kategori" name="kategori" id="kategori">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
@endsection