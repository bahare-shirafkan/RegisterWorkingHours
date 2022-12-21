<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Niconne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style-login.css')}}">
    <title>Login Form</title>
</head>

<body>
    <div class="container">
        <div class="image">
            <h1>Welcome To <span>CodeFun</span></h1>
        </div>
        <div class="content">
            <form action="{{route('login-store')}}" method="post">
                <h1>Login</h1>
                @if(isset($error_validation))
                <h5 style="color: red;">{{$error_validation}}</h5>
                @endif
                @csrf
                <div class="form-group">
                    <!-- <label for="">UserName</label> -->
                    <br>
                    <input type="text" class="form-control" name="email" id="txt" aria-describedby="helpId" placeholder="UserName">

                </div>
                <div class="form-group">
                    <!-- <label for="">Password</label> -->
                    <br>
                    <input type="password" class="form-control" name="password" id="txt" placeholder="Password">
                </div>
                <a class="fp" href="index.html">Forgot Password?</a>
                <br>
                <input type="submit" value="Login" class="btn">
            </form>
        </div>
    </div>
</body>

</html>