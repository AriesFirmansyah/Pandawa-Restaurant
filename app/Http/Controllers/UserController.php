<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Database;

class UserController extends Controller
{
    public function index() {
        $menuMakanan = Database::all();
        return view('index', ['menu' => $menuMakanan]);
    }
    public function about() {
        $about = \App\Models\Database::all();
        return view('about', ['about' => $about]);
    }
    public function mahasiswa() {
        // $mahasiswa = DB::table('datamahasiswa')->get(); 

        $mahasiswa = \App\Models\Database::all();
        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    public function login() {
        return view('login');
    }
    public function signup() {
        return view('sign_up');
    }
    public function menu() {
        $menu = \App\Models\Database::all();
        return view('menu', ['menu' => $menu]);
    }
    public function contact() {
        $contact = \App\Models\Database::all();
        return view('contact', ['contact' => $contact]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Database  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Database $id)
    {
        return $id;
    }
}
