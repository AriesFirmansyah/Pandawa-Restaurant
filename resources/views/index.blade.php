@extends('template/mainTemplate')
@section('title', 'Index')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .bg-white {
          background-color: aliceblue
        }
        .makanan {
          max-width: 100%;
        }
        .center {
          text-align: center;
        }
        .imgdiskon {
          max-width: 100%;
        }
        .radius {
          border-radius: 90px
        }
        .rekomendasi {
          font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
          font-weight: bold;
          font-size: 14px
        }
        .colorwhite {
          color: aliceblue
        }
    </style>
@section('body')
<div style="background-color: aliceblue">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <a href="#diskon">
              <img src="storage/assets/carousel1.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
          <div class="carousel-item" data-bs-interval="5000" >
            <a href="#diskon">
              <img src="storage/assets/carousel2.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    
      <div class="container" data-aos="zoom-in">
        <br><br>
        <div class="container" data-aos="zoom-in">
          <h1 class="center">Promo Hari Ini</h1>
          <div class="row" style="text-align: center">
            @foreach ($menu as $data)
            @if ($data->kategori == "Promo")
            <div class="col-md-6 ">
              <a href="/menu">
              <img src="storage/assets/{{$data->gambar}}" class="imgdiskon" alt="diskon">
            </a>
          </div>
          @endif
          @endforeach
        </div>    
      </div>
    
      
      <div class="center" data-aos="fade-right">
        <br><br><br><br>
        <h1>Rekomendasi Menu Makanan</h1>
        <div class="row">
          @foreach ($menu as $data)
            @if ($data->kategori == "Rekomendasi")
              <div class="col-sm-6" >
                <div class="card mb-3 bg-dark colorwhite" style="max-width:550px; border-radius: 100px;">
                  <div class="row g-0">
                    <div class="col-md-4" style="">
                      <img class="makanan" src="storage/assets/{{ $data->gambar }}" alt="..." style="padding-left:9px;padding-top:20px;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body" style="text-align: left;margin-left:23px">
                        <h5 class="card-title rekomendasi">{{ $data->nama }}</h5>
                        <p class="card-text" style="margin: 0; font-size: 12px">{{ $data->keterangan }}</p>
                        <div class="d-flex" style="margin-top: 10px">
                          <p class="card-text rekomendasi"><b>HARGA : Rp {{ $data->harga }}</b></p>
                          @guest
                            <div style="margin-top: -5px; margin-left: 9px">
                              <a class="btn btn-warning rekomendasi" href="keranjang/{{$data->id}}" role="button" style="border-radius: 20px"><b>PESAN</b></a>
                            </div>
                          @else
                            @if (auth()->user()->level == "user")
                            <div style="margin-top: -5px; margin-left: 9px">
                              <a class="btn btn-warning rekomendasi" href="keranjang/{{$data->id}}" role="button" style="border-radius: 20px"><b>PESAN</b></a>
                            </div>
                            @endif
                          @endguest
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            @endif
            
          @endforeach
          <div class="col-12">
            <a class="btn btn-warning rekomendasi" href="menu" role="button" style="border-radius: 40px;font-size:22px"><b>Lihat semua menu</b></a>
          </div>
        </div>
      </div>

      <br><br><br><br>
      <div data-bs-spy="scroll" data-aos="flip-up">
          <div id="diskon" class="container" data-aos="flip-up">
            <h1 class="center">Diskon Bulanan</h1>
            <div class="row" style="text-align: center">
              @foreach ($menu as $data)
                @if ($data->kategori == "Diskon")
                <div class="col-md-6 radius" >
                  <div class="card bg-dark bg-gradient radius" style="border-radius: 110px;">
                    <div class="card-body" style="">
                      <a href="/menu">
                        <img src="storage/assets/{{$data->gambar}}" class="imgdiskon radius" alt="...">
                      </a>
                    </div>
                  </div>
                </div>
                @endif
              @endforeach
            </div>
                  
          </div>
      </div>
      <br><br><br>
    </div>
</div>

@endsection