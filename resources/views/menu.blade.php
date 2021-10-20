@extends('template/mainTemplate')
@section('title', 'Menu')
@section('styles')
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap');
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .makanan {
          padding-bottom: 10px;
        }
        .makananImage {
          max-width: 80px;
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
<div>
  <div class="bg-success bg-gradient pb-5" style="text-align: center;">
    <div class="col-md-3 bg-warning bg-gradient p-4" style="border-bottom-right-radius: 40px">
      <h1>MENU</h1>
    </div>
    <h1 class="font pt-5">MAKANAN</h1>
    <div class="container-fluid">
      <div class="row bg-dark bg-gradient pb-5">
        @foreach ($menu as $data)
          @if ($data->kategori == "Makanan" || $data->kategori == "Rekomendasi")
            <div class="d-flex mt-5 col-md-6 makanan colorwhite" data-aos="fade-right">
              <img class="makananImage font" src="storage/assets/{{ $data->gambar}}" alt="">
              <div style="padding-left: 30px; text-align:left">
                <h5 class="font" style="text-transform: capitalize">{{ $data->nama }}</h5>
                <h6 class="font"> {{ $data->keterangan }}</h6>
                <div class="d-flex" style="padding-top: 10px">
                  <h6 class="font">HARGA : Rp.{{ $data->harga }}</h6>
                  @guest
                    <a href="menu/{{$data->id}}" type="button" class="btn btn-warning font" style="margin-top:-7px;margin-left:15px">
                      <b> PESAN </b>
                    </a>
                  @else
                    @if (auth()->user()->level == "user")
                    <a href="menu/{{$data->id}}" type="button" class="btn btn-warning font" style="margin-top:-7px;margin-left:15px">
                      <b> PESAN </b>
                    </a>
                    @endif
                  @endguest
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="bg-danger bg-gradient pb-5" style="text-align: center">
    <h1 class="font pt-5">MINUMAN</h1>
    <div class="container">
      <div class="row bg-light bg-gradient pb-5" style="border-radius: 25px">
        @foreach ($menu as $data)
          @if ($data->kategori == "Minuman")
            <div class="d-flex mt-5 col-md-6 makanan colorblack" data-aos="fade-left">
              <img class="makananImage font" src="storage/assets/{{ $data->gambar}}" alt="">
              <div style="padding-left: 30px; text-align:left">
                <h5 class="font" style="text-transform: capitalize">{{ $data->nama }}</h5>
                <h6 class="font"> {{ $data->keterangan }}</h6>
                <div class="d-flex" style="padding-top: 10px">
                  <h6 class="font">HARGA : Rp.{{ $data->harga }}</h6>
                  @guest
                    <a href="menu/{{$data->id}}" type="button" class="btn btn-warning font" style="margin-top:-7px;margin-left:15px">
                      <b> PESAN </b>
                    </a>
                  @else
                    @if (auth()->user()->level == "user")
                    <a href="menu/{{$data->id}}" type="button" class="btn btn-warning font" style="margin-top:-7px;margin-left:15px">
                      <b> PESAN </b>
                    </a>
                    @endif
                  @endguest
                  
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="bg-warning bg-gradient pb-5" style="text-align: center">
    <h1 class="font pt-5">DISKON & PROMO</h1>
    <div class="container">
      <div class="row bg-success bg-gradient pb-5" style="border-radius: 25px">
        @foreach ($menu as $data)
          @if ($data->kategori == "Diskon" || $data->kategori == "Promo")
            <div class="d-flex mt-5 col-md-6 makanan colorwhite" data-aos="fade-right">
              <img class="makananImage font" src="storage/assets/{{ $data->gambar}}" alt="">
              <div style="padding-left: 30px; text-align:left">
                <h5 class="font" style="text-transform: capitalize">{{ $data->nama }}</h5>
                <h6 class="font"> {{ $data->keterangan }}</h6>
                <div class="d-flex" style="padding-top: 10px">
                  <h6 class="font">HARGA : Rp {{ $data->harga }}</h6>
                  <a href="menu/{{$data->id}}" type="button" class="btn btn-warning font" style="margin-top:-7px;margin-left:15px">
                    <b> PESAN </b>
                  </a>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection