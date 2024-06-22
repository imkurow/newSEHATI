@extends('templayout')
@section('title', 'Registration')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Plus Jakarta Sans", sans-serif;

    }

    body{
        min-height: 100vh;
        display: grid;
        align-items: center;
        justify-content: center;
        background-color: #8BD7D2;
        color: #012622;
        padding: 0 20px;
    }

    .logo-class {
        display: grid;
        height: 1vh;
    }

    .logo-class img {
        width: 20%;
        justify-self: center;
    }

    .container{
        position: relative;
        max-width: 700px;
        width: 800px;
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .login-form{
        margin-left: 20px;
        margin-right: 20px;
    }

    .title{
        text-align: center;
        font-size: 30px;
        font-weight: 800;
    }

    .container .login-form{
        margin-top: 30px;
    }
    .login-form .field{
        width: 100%;
        margin-top: 20px;

    }

    .login-form .field input{
        position: relative;
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 90%;
        margin-top: 8px;
        border-radius: 17px;
        background-color: rgba(227, 227, 227, 0.56);
        border: 1px solid white;
        padding: 0 15px;
    }

    .login-form .rightfield{
        display: flex;
        column-gap: 15px;

    }

    @media screen and (max-width: 500px){
        .login-form .rightfield{
            flex-wrap: wrap;
        }
    }
    .paragraf{
        margin-top: 10px;
        text-align: center;
    }

    .login-form :where(.gender-option, .genderfield){
        display: flex;
        align-items: center;
        column-gap: 30px;

    }

    .login-form .genderfield{
        column-gap: 5px;
        cursor: pointer;
    }

    .login-form :where(.genderfield input, .genderfield label){
        cursor: pointer;
    }

    .login-form .gender-box{
        margin-top: 20px;
        margin-left: 15px;
        width: 95%;
    }

    .gender-box h3{
        color: rgb(119, 116, 116);
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;
    }

    .login-form button:hover{
        background-color: rgb(24, 248, 174);
    }

    .login-form button{
        height: 55px;
        width: 100%;
        background-color: #1abc9c;
        font-weight: 600;
        border: none;
        font-size: 1.2rem;
        color: white;
        margin-top: 30px;
        cursor: pointer;
        border-radius: 15px;
        transition: all 0.2s ease;
    }

    .login-form .signup-link{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .errormsg{
        margin-top: 10px;
        text-align: center;
        color: red;
    }

    .errormsg .alert-alert-success{
        color: green;
    }



</style>
    <section class="logo-class">
        <img src="img/Logo2.svg" alt="">
    </section>
    <section class="container">
        <form action="{{route('registration.post')}}" method="POST" class="login-form">
            @csrf
            <div class="all-form">
                <div id="border-form">
                    <div class="title">
                        <p>
                            Sign Up
                        </p>
                    </div>
                    <div class="paragraf">
                        <p>Staying healthy just got simpler, just sign up!</p>
                    </div>

                    <div class="rightfield">
                        <div class="field">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" placeholder="Full Name" name="name">
                        </div>
                        <div class="field">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="rightfield">

                        <div class="field">
                            <label class="form-label"></label>
                            <input type="text" class="form-control"  name="dob" onfocus="(this.type ='date')" placeholder="Date of Birth" >
                        </div>

                        <div class="field">
                            <label class="form-label"></label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>

                    <div class="rightfield">
                        <div class="gender-box">
                            <h3>Gender</h3>
                            <div class="gender-option">
                                <div class="genderfield">
                                    <input type="radio" id="Male" value="Male" name="sex">
                                    <label class="check-male">Male</label>
                                </div>

                                <div class="genderfield">
                                    <input type="radio" id="Female" value="Female" name="sex">
                                    <label class="check-female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>


                    {{-- BUAT FORM REGIST MANUAL --}}
                    <div class="errormsg">
                        @if ($errors->any())
                            <div class="error">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                            </div>
                        @endif

                        @if (session()->has('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                        @if (session()->has('success'))
                        <div class="alert-alert-success">{{session('success')}}</div>
                        @endif

                    </div>


                    <button type="submit" class="submit-button">Sign Up</button>
                    <div class="signup-link">
                        <p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
                    </div>
                </div>
            </div>
          </form>
    </section>
@endsection

