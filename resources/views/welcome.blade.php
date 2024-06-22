@extends('layout')
@section('title', 'HomePage')
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
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 50.23%, #262522 98.64%), url(img/stress2.jpg);
        height: 65vh;
        background-size: cover;
        background-position: 69%;

        /* position: fixed; */
    }

    .banner-text p{
        border-top: 30px;
        padding-top: 12%;
        padding-right: 10%;
        font-size: 40px;
        display: grid;
        justify-content: right;
        justify-items: right;
        font-family: "Plus Jakarta Sans", sans-serif;
        align-items: center;
        font-weight: bold;
        color: var(--bg-color);
    }
    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

/* BAGIAN ARTIKEL */

    .articles{
        margin: 40px 60px 0px 60px;
        display: grid;
        height: 80vh;
    }

    .articles .title-article{
        display: flex;
        justify-content: flex-end;
        padding-bottom: 30px;
    }

    .articles .title-article p{
        font-family: "Crimson Pro", serif;
        font-size: 35px;
        font-weight: 600;
        color: var(--text-color);
    }

    .article-session {
        display: flex;
        justify-content: space-between;
    }

    .article-session img{
        width: 130%;
        height: 35%;
        /* object-fit: cover; */
    }

    .article-div {
        padding: 42px 60px;
    }

    .article-div p{
        color: var(--text-color);
        font-size: 18px;
    }

    .article-div .subtitle-article{
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 20px;
    }

    .info-button {
        padding-top: 40px;
    }

    .info-button button {
        width: 110px;
        height: 40px;
        border-radius: 15px;
        background-color: var(--bg-color);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: var(--main-color);
        border-color: var(--main-color);
        border-style: solid;
        border-width: 2px;
        cursor: pointer;
    }

    .info-button button:hover {
        background-color: var(--main-color);
        color: var(--bg-color);
        transition: .2s;
    }

/* BAGIAN STRESS TEST */

    .stress-test{
        margin: 0px 60px 60px 60px;
        display: grid;
        height: 80vh;
        overflow: hidden;
    }

    .stress-test .title-stress{
        display: flex;
        justify-content: flex-start;
        padding-bottom: 30px;
    }

    .stress-test .title-stress p{
        font-family: "Crimson Pro", serif;
        font-size: 35px;
        font-weight: 600;
        color: var(--text-color);
    }

    .stress-session {
        display: flex;
        justify-content: space-between;
        height: 50vh;
    }

    .stress-session img{
        width: 160%;
        height: 130%;
        /* object-fit: cover; */
    }

    .stress-div {
        padding: 42px 60px;
        display: grid;
        row-gap: 0;
        /* justify-self: end; */
    }

    .stress-div p{
        color: var(--text-color);
        font-size: 18px;
        text-align: right;
    }

    .stress-div .subtitle-stress{
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 20px;
    }

    .info-button {
        padding-top: 40px;
        justify-self: end;
    }

    .info-button button {
        width: 110px;
        height: 40px;
        border-radius: 15px;
        background-color: var(--bg-color);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: var(--main-color);
        border-color: var(--main-color);
        border-style: solid;
        border-width: 2px;
        cursor: pointer;
    }

    .info-button button:hover {
        background-color: var(--main-color);
        color: var(--bg-color);
        transition: .2s;
    }

    footer {
        height: 25vh;
        background-color: #8BD7D2;
    }

    .footer {
        display: flex;
        color: var(--text-color);
        font-weight:500;
        padding: 50px 70px;
        justify-content: space-between;
        align-items: center;
    }

    .footer img{
        width: 20%;
    }

</style>

<div class="container">
    <div class="banner">
        {{-- <img src="img/stress2.jpg" alt="" class="banner-img"> --}}
        <div class="banner-text">
            <p>
                Stress could <br> be dangerous!
            </p>
        </div>
    </div>
    <div class="articles">
        <div class="title-article">
            <p>Health Article</p>
        </div>
        <div class="article-session">
            <img src="img/stress2.jpg" alt="">
            <div class="article-div">
                <p class="subtitle-article">How to handle stress?</p>
                <p>
                    Stress is a normal psychological and physical reaction to the demands of life. A small amount of stress can be good, motivating you to perform well. But many challenges daily, such as sitting in traffic, meeting deadlines and paying bills, can push you beyond your ability to cope.
                </p>
                <div class="info-button">
                    <a href="{{route('articles.index')}}">
                        <button id="articleButton">
                            more
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="stress-test">
        <div class="stress-session">
            <div class="stress-div">
                <p class="subtitle-stress">How stress are you?</p>
                <p>
                    Stress is a normal psychological and physical reaction to the demands of life. A small amount of stress can be good, motivating you to perform well. But many challenges daily, such as sitting in traffic, meeting deadlines and paying bills, can push you beyond your ability to cope.
                </p>
                <div class="info-button">
                    <a href="{{route('stresspage')}}">
                        <button>take a test</button>
                    </a>
                </div>
            </div>
            <img src="img/stress4.jpg" alt="">
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

