@extends('template/menuAdmin')

@section('title', 'Rekomendasi')

@section('styles')
<style>
  .gambarRekomendasi{
    width: 150px;
    height: 150px;
  }

  .cardRekomendasi{
    height: 230px;
  }

  .title{
    padding-top: 15px;
    padding-bottom: 15px;
    border-radius: 10px;
  }
</style>
@section('body')
    <div class="content-wrapper bg-success">
      <section class="content-header">
        <div class="container-fluid" style="text-align:center; font-weight:bold;">
            <div class="col-md-12 bg-warning title mb-2">
              <h1 style="color:black;">Rekomendasi Menu Makanan</h1>
            </div>
        </div>
      </section>

      <div class="container">
        <div class="row bg-warning" style="padding-top:15px;">
          @foreach ($menu as $data)
            @if ($data->kategori == "Rekomendasi")
              <div class="col-md-6" data-aos="fade-right">
                <div class="card d-flex flex-row bg-dark cardRekomendasi">
                  <img src="{{asset("storage/assets/$data->gambar")}}" alt="menu" class="gambarRekomendasi" alt="diskon">
                  <div class="infoRekomendasi mt-2 ml-1">
                    <h6>{{ $data->nama }}</h6>
                    <h6>{{ $data->keterangan }}</h6>
                    <h6 style="margin-top:10px; padding-right: 10px">Harga : Rp {{ $data->harga }}</h6>
                    <button data-bs-toggle="modal" data-bs-target="#editData{{ $data->id }}" type="button" class="btn btn-primary" style="border-radius: 25px;">Edit</button>
                    <form action="/adminRekomendasi/{{ $data->id }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button type="Submit" class="btn btn-danger" style="border-radius: 25px;">Delete</button>
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
                      <form action="/adminRekomendasi/edit/{{ $data->id }}" method="POST">
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