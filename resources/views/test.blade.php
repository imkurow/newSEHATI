@extends('layout')
@section('title', 'Stress Test')
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

    .q-session {
        width: 100%;
        background-color: var(--bg-color);
        height: 100vh;
        background-size: cover;
        background-position: 69%;
        display: grid;
        align-items: center;
        /* position: fixed; */
    }

    .question1 {
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .question1 p{
        border-top: 30px;
        font-size: 40px;
        font-family: "Plus Jakarta Sans", sans-serif;
        text-align: center;
        color: var(--text-color);
    }

    .question1 .text1 {
        font-size: 20px;
        font-weight: 400;
    }

    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .options {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 38px;
        margin: 30px 0;
    }

    .option {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 2px solid;
        cursor: pointer;
    }

    .option.red1 {
        border-color: #f44336;
        width: 45px;
        height: 45px;
    }

    .option.red2 {
        border-color: #f44336;
    }

    .option.yellow3 {
        border-color: #ffeb3b;
        width: 32px;
        height: 32px;
    }

    .option.green4 {
        border-color: #4caf50;
    }

    .option.green5 {
        border-color: #4caf50;
        width: 45px;
        height: 45px;
    }

    .option.selected {
        background-color: grey;
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
    <div class="q-session">
        <div class="question1">
            <p class="text1">
                Seberapa sering Anda merasa cemas atau gelisah dalam seminggu terakhir?
            </p>
            <div class="options">
                <div class="option red1" data-value="1"></div>
                <div class="option red2" data-value="2"></div>
                <div class="option yellow3" data-value="3"></div>
                <div class="option green4" data-value="4"></div>
                <div class="option green5" data-value="5"></div>
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

