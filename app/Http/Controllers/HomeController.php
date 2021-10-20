<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Database;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $menuMakanan = Database::all();
        return view('index', ['menu' => $menuMakanan]);
    }
}
