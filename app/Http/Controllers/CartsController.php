<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Database;
use Symfony\Component\VarDumper\Cloner\Data;

class CartsController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Cart::all();
        $jumlah = 0;
        return view('keranjang', compact('data', 'jumlah'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Database $data)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Database $data)
    {
        $pesanan = new Cart;
        $pesanan->nama = $data->nama;
        $pesanan->harga = $data->harga;
        $pesanan->diskon = $data->diskon;
        $pesanan->gambar = $data->gambar;
        $pesanan->keterangan = $data->keterangan;
        $pesanan->kategori = $data->kategori;

        $pesanan->save();

        return redirect('/')->with('status', "Pesanan telah ditambahkan ke keranjang!");
    }
    public function pesanMenu(Database $data)
    {
        $pesanan = new Cart;
        $pesanan->nama = $data->nama;
        $pesanan->harga = $data->harga;
        $pesanan->diskon = $data->diskon;
        $pesanan->gambar = $data->gambar;
        $pesanan->keterangan = $data->keterangan;
        $pesanan->kategori = $data->kategori;

        $pesanan->save();

        return redirect('/menu')->with('status', "Pesanan telah ditambahkan ke keranjang!");
    }

    public function checkout(Cart $data) {
        // foreach ($data->id as $hapus) {
        //     Cart::destroy($hapus);
        // }
        Cart::whereNotNull('id')->delete();
        return redirect('/keranjang')->with('status', "Checkout Berhasil!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Database $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $data)
    {
        Cart::destroy($data->id);
        return redirect('/keranjang');
    }
}
