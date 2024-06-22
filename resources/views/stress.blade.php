@extends('layout')
@section('title', 'StressTest')
@section('content')


<style>
    @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&display=swap');
    :root{
        --main-color: #00BD9D;
        --second-color: #8BD7D2;
        --text-color: #012622;
        --bg-color: #FFFBFA;
    }

    body{
        background: var(--bg-color);
    }

    .container{
        width: 100%;
        /* height: 100vh; */
        /* background-color: var(--main-color); */
    }

    .banner{
        width: 100%;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0.23%, #262522 98.64%), url(img/stress3.jpg);
        height: 100vh;
        background-size: cover;
        background-position: 69%;
        display: grid;
        align-items: center;
        /* position: fixed; */
    }

    .banner-text {
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .banner-text p{
        border-top: 30px;
        font-size: 40px;
        font-family: "Plus Jakarta Sans", sans-serif;
        text-align: center;
        color: var(--bg-color);
    }

    .banner-text .text1 {
        font-size: 35px;
        font-weight: 600;
    }

    .banner-text .text2 {
        padding-top: 7%;
        font-size: 20px;
        font-weight: 400;
    }

    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info-button {
        padding-top: 40px;
        justify-self: center;
        align-self: center;
    }

    .info-button button {
        width: 120px;
        height: 40px;
        border-radius: 15px;
        background-color: var(--main-color);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: var(--bg-color);
        border-style: none;
        border-width: 2px;
        cursor: pointer;
        transition: .2s;
    }

    .info-button button:hover {
        background-color: #07DBB7;
        box-shadow: #07DBB7
        color: var(--bg-color);
        box-shadow: 0px 0px 15px 0px #07DBB7;
        /* width: 115px;
        height: 45px; */
        transition: .2s;
    }

    footer {
        /* height: 25vh; */
        background-color: #8BD7D2;
    }

    .footer {
        display: flex;
        color: var(--text-color);
        font-weight:500;
        padding: 30px 60px;
        justify-content: space-between;
        align-items: center;
    }

    .footer img{
        width: 15%;
    }

</style>

<div class="container">
    <div class="banner">
        {{-- <img src="img/stress2.jpg" alt="" class="banner-img"> --}}
        <div class="banner-text">
            <p class="text1">
                How you feelin right now?
            </p>
            <p class="text2">
                let us know if we can help
            </p>
            <div class="info-button">
                    <button>take a test</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer">
            <img src="img/Logo2.svg" alt="">
            <p>SEHATI Health Care Company - Jl. Rasuna Said</p>
        </div>
    </footer>
</div>

@endsection

