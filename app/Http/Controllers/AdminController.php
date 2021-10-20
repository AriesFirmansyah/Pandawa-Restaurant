<?php

namespace App\Http\Controllers;
use \App\Models\Database;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        return view('adminIndex');
    }
    public function promo(){
        $menuMakanan = Database::all();
        return view('a_promo', ['menu' => $menuMakanan]);
    }
    public function rekomendasi(){
        $menuMakanan = Database::all();
        return view('a_rekomendasi', ['menu' => $menuMakanan]);
    }
    public function diskon(){
        $menuMakanan = Database::all();
        return view('a_diskon', ['menu' => $menuMakanan]);
    }
    public function menu(){
        $menuMakanan = Database::all();
        return view('a_menu', ['menu' => $menuMakanan]);
    }
    public function tambahdata(){
        $menuMakanan = Database::all();
        return view('a_tambahdata', ['menu' => $menuMakanan]);
    }
    public function tambahGambar(){
        return view('a_tambahGambar');
    }
    public function dotambahGambar(Request $request){
        $request->validate([
            'gambar' => 'required',
        ]);
        $gambar = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('/assets', $gambar);

        return redirect('/tambahGambar')->with('status', "Gambar berhasil ditambahkan!");
    }
    public function dotambah(Request $request){
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'kategori' => 'required',
            'gambar' => 'required',
            'keterangan' => 'required',
        ]);
        $gambar = $request->file('gambar')->getClientOriginalName();
        $addData = new Database();
        $addData->nama = $request->nama;
        $addData->harga = $request->harga;
        $addData->diskon = $request->diskon;
        $addData->gambar =  $gambar;
        $addData->keterangan = $request->keterangan;
        $addData->kategori = $request->kategori;
        $request->file('gambar')->storeAs('/assets', $gambar);
        $addData->save();

        return redirect('/admin')->with('status', "Menu berhasil ditambahkan!");
    }
    public function menuEdit(Request $data)
    {   
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Database::where('id', $data->id)
                ->update([
                    'nama' => $data->nama,
                    'harga' => $data->harga,
                    'diskon' => $data->diskon,
                    'gambar' => $data->gambar,
                    'keterangan' => $data->keterangan,
                    'kategori' => $data->kategori,
                ]);
        
        return redirect('/adminMenu')->with('status', "Menu berhasil diupdate!");
    }
    public function editrekomendasi(Request $data)
    {   
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Database::where('id', $data->id)
                ->update([
                    'nama' => $data->nama,
                    'harga' => $data->harga,
                    'diskon' => $data->diskon,
                    'gambar' => $data->gambar,
                    'keterangan' => $data->keterangan,
                    'kategori' => $data->kategori,
                ]);
        
        return redirect('/adminRekomendasi')->with('status', "Menu berhasil diupdate!");
    }
    public function editpromo(Request $data)
    {   
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Database::where('id', $data->id)
                ->update([
                    'nama' => $data->nama,
                    'harga' => $data->harga,
                    'diskon' => $data->diskon,
                    'gambar' => $data->gambar,
                    'keterangan' => $data->keterangan,
                    'kategori' => $data->kategori,
                ]);
        
        return redirect('/adminPromo')->with('status', "Menu berhasil diupdate!");
    }
    public function editdiskon(Request $data)
    {   
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Database::where('id', $data->id)
                ->update([
                    'nama' => $data->nama,
                    'harga' => $data->harga,
                    'diskon' => $data->diskon,
                    'gambar' => $data->gambar,
                    'keterangan' => $data->keterangan,
                    'kategori' => $data->kategori,
                ]);
        
        return redirect('/adminDiskon')->with('status', "Menu berhasil diupdate!");
    }
    public function destroy(Database $data)
    {
        Database::destroy($data->id);
        return redirect('/adminMenu')->with('status', "Menu berhasil dihapus!");
    }
    public function deletediskon(Database $data)
    {
        Database::destroy($data->id);
        return redirect('/adminDiskon')->with('status', "Menu berhasil dihapus!");
    }
    public function deleterekomendasi(Database $data)
    {
        Database::destroy($data->id);
        return redirect('/adminRekomendasi')->with('status', "Menu berhasil dihapus!");
    }
    public function deletepromo(Database $data)
    {
        Database::destroy($data->id);
        return redirect('/adminPromo')->with('status', "Menu berhasil dihapus!");
    }

    
}
