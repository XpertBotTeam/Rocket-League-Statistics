<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>


    <div class="container">
        <div class="box">
            <h1>Login</h1>
            <form action="{{ route('login-user') }}" method="POST">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="user">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" id="username" placeholder="Email Address"
                        value="{{ old('email') }}" />
                    <i class="fas fa-unlock-alt"></i>
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>

                <div class="login-btn">
                    <button class="btn">LOGIN</button>
                    <p class="signup">Don't have an account ?
                        <a href="/register">
                            <span style="cursor: pointer;">Sign up</span>
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
