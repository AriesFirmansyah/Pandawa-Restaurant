@extends('template/mainTemplate')
@section('title', 'Contact')
@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap%27');

        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }

        body {
            background-image:  url("/storage/assets/bgcontact.png");
            font-family: 'Comfortaa', cursive;
            background-size: cover;
            background-attachment: fixed;
        }

        .contactTitle{
            background-color: orange;
            font-family: 'Comfortaa', cursive;
            font-size: 60px;
            text-align: right;
            border-bottom-left-radius: 80px
        }

        .contactBody{
            color: white;
            font-size: 20;
            text-align: right;
        }

        .contactIcon{
            width: 100%;
        }
    </style>
@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 offset-md-5 contactTitle" data-aos="fade-right">
                CONTACT US
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mt-4 offset-md-5 contactBody" >
            <p style="text-align: justify" data-aos="fade-left">
                Pandawa Restaurant kini hadir dalam bentuk website yang memudahkan para customer 
                untuk melakukan pemesanan dan melihat promo menu yang tersedia di Pandawa Restaurant. 
                Kami terus berusaha mengembangkan website dan fitur-fitur kami demi kenyamanan para customer kami.
            </p> 
            <br><br>
            <p style="text-align: justify" data-aos="fade-right">
                Bila anda menemukan kesulitan atau masalah, mohon beri tahu kami melalui contact yang tersedia. 
                Kami akan berusaha memperbaiki/membantu masalah anda dengan segera. Laporan anda akan sangat 
                membantu membuat website kami lebih baik. Salam Pandawa!
            </p>
            
            <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 offset-md-5 mb-5" data-aos="fade-left">
                <img src="{{asset("storage/assets/contacticon1.png")}}" class="contactIcon">
            </div>
        </div>
    </div>

@endsection