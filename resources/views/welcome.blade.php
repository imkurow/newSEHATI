@extends('layout')
@section('title', 'HomePage')
@section('content')


<style>

    body{
        background: white;
    }
    .container{
        width: 100%;
        height: 100vh;
        background-color: rgb(255, 255, 255);
    }

    .banner{
        width: 100%;
        background-image: url(img/stress1.jpg);
        height: 65vh;

        background-size: cover;
        background-position: 69%;
        
        /* position: fixed; */
    }

    .banner-text p{
        border-top: 30px;
        padding-top: 15%;
        padding-right: 10%;
        font-size: 25px;
        display: grid;
        justify-content: right;
        justify-items: right;
        font-family: "Plus Jakarta Sans", sans-serif;
        align-items: center;
        font-weight: bold;
        color: rgb(44, 44, 44);
        font-size: 30%;
    }
    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .articles{
        position: relative;
        left: 75%;
        top: 10%;
        font-size: 20px;
        font-weight: bold;  
    }
</style>

<div class="container">
    <div class="banner">
        {{-- <img src="img/stress1.jpg" alt="" class="banner-img"> --}}
        <div class="banner-text">
            <p>
                Stress could be dangerous!
            </p>
        </div>
    </div>
    <div class="articles">
        <p>Health Article</p>
    </div>
</div>

@endsection

