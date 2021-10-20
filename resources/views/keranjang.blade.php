@extends('template/mainTemplate')

@section('title', 'Cart')

@section('styles')
@section('script')
<script>

  </script>    
@endsection

@section('body')
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <table id="productTable" class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Pesanan</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Harga</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Hapus</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach ($data as $pesanan)
                <tr>
                  <th scope="row" class="">
                    <div class="p-2">
                      <img src="storage/assets/{{ $pesanan->gambar}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> 
                            {{ $pesanan->nama }}
                        </h5>
                        <span class="text-muted font-weight-normal font-italic d-block">
                          Kategori: {{ $pesanan->kategori }}
                        </span>
                        <input type="hidden" value="{{ $jumlah += $pesanan->harga }}">
                      </div>
                    </div>
                  </th>
                  <td class="align-middle"><strong id="harga">Rp {{ $pesanan->harga }}</strong></td>
                  <form action="/keranjang/{{ $pesanan->id }}" method="post">
                    @method('delete')
                    @csrf
                  <td class="align-middle"><button type="submit" class="btn btn-danger">HAPUS</button></td>
                  </form> 
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>
      
      
        <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total harga : Rp {{$jumlah}},-</strong>
                <h5 class="font-weight-bold"></h5>
              </li>
          </div>
          <form action="/keranjang/checkout" method="post">
            @csrf
            <button type="submit" class="btn btn-success rounded-pill py-2 btn-block">Procceed to checkout</button>
          </form> 
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>



</script>

      
@endsection