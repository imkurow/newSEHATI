<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        body {
            background: dodgerblue;
        }
        header {
            background: #FFFBFA;
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            position: fixed;
        }


        header .logo {
            /* background-image: url(img/Logo.jpg); */
            background-position: center;
            background-size:10%;
            height: 4vh;
            /* font-size: 30px;
            text-transform: uppercase; */
        }

        header nav{
            text-align: center;
        }
        header nav ul {
            display: flex;
        }
        header nav ul li a {
            display: inline-block;
            font-weight: 500;
            font-size: 15px;
            color: #00BD9D;
            padding: 5px 0;
            margin: 0 10px;
            border: 3px solid transparent;
            transition: 0.2s;
        }
        header nav ul li a:hover,
        header nav ul li a.active {
            color: black;
        }

        .profile button {
            width: 100px;
            height: 40px;
            border-radius: 100px;
            background-color: #E8FBF7;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 15px;
            color: #262522;
            border-color: #012622;
            border-style: solid;
            border-width: 1.2px;
            cursor: pointer;
        }

        .profile button:hover {
            background-color: #A8ECE1;
            transition: .2s;
        }

        .hamburger {
            cursor: pointer;
            display: none;
        }
        .hamburger div {
            width: 30px;
            height: 3px;
            margin: 5px 0;
            background: #000;
        }
        @media only screen and (max-width: 900px) {
            header {
                padding: 0 30px;
            }
        }
        @media only screen and (max-width: 700px) {
            .hamburger {
                display: block;
            }
            header nav {
                position: absolute;
                width: 100%;
                left: -100%;
                top: 70px;
                width: 100%;
                background: #fff;
                padding: 30px;
                transition: 0.3s;
            }
            header #nav_check:checked ~ nav {
                left: 0;
            }
            header nav ul {
                display: block;
            }
            header nav ul li a {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/Logo2.svg" alt="">
        </div>
        <div class="nav-container">
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('articles.index')}}">Article</a>
                    </li>
                    <li>
                        <a href="{{route('stresspage')}}">Stress Test</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="profile">
            <button>Sign in</button>
        </div>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
</body>
</html>
