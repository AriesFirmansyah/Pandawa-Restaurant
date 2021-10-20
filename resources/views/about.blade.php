@extends('template/mainTemplate')

@section('title', 'About Us')

@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .about {
            padding: 50
        }
        .fontabout {
            font-family: 'Comfortaa', cursive;
        }
        .gambar {
            max-height: 450px;
            
        }
    </style>

@section('body')
<div class="jumbotron fontabout">
    
    <div class="about" style="background-color: chocolate" data-aos="zoom-in">
        <h1 class="display-3 text-center" style="color: white">About Us</h1>
    </div>
    <br><br>
    <div class="container mb-5 text-center">
        <h1>Pendiri Pandawa Restaurant</h1>
        <div class="mt-5" data-aos="flip-up">
            <div class="card" 
                style="border-radius: 30px; max-width: 300px;
                left: 0; right: 0; margin-left: auto; margin-right: auto;">
                    <img src="{{asset("storage/assets/aris.png")}}" class="card-img-top gambar" alt="Aries" style="border-top-right-radius: 30px; border-top-left-radius: 30px;">
                    <div class="card-body">
                        <p class="fs-5">Aries Firmansyah</p>
                        <p class="fs-6">(Admin)</p>
                    </div>
            </div>
        </div>
    </div>
    
            
</div>
@endsection