<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Account</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #1877f2;
            border: none;
        }

        .btn-primary:hover {
            background-color: #165bb4;
        }
    </style>
</head>

<body>

    @include('beforelogin/links')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h5 align="center" style="font-weight: bold; color: blue; font-size: 40px; margin-top: 5%;">
                    MeeTuP</h5>

                <div class="card p-2">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">


                                <a href="{{URL::to('/')}}/images/{{$d->profile_picture}}">
                                    <div class="" style="width:70px;height:90px;">
                                        <img src="{{URL::to('/')}}/images/{{$d->profile_picture}}" width="100%;"
                                            height="80px;" style="border-radius:100%;" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-2"></div>
                        </div>

                        <p class="card-text">Log in as {{$d->firstname}} {{$d->lastname}}</span></p>
                        <p style="font-size:15px;">{{$d->username}} <a href="{{URL::to('/')}}"><span>&nbsp;Not
                                    you?</span></a></p>
                        <form method="post" action="/loginKaro">

                            @csrf
                            <input type="hidden" placeholder="Enter moblie or email" value="{{$d->username}}"
                                name="username"
                                style="width: 95%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color:#F9F2F1">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Log IN</button><br>
                        </form>

                        <button class="btn btn-secondary btn-block" onclick="ask()">Try Another
                            Way</button>

                            <p onclick="fp()" style="color:blue; mouse:pointer">Forgot password?</p>


                        <script>
                            function ask() {
                                var op = confirm("Are you sure, is this your account ?");

                                if (op)
                                    window.location.href = "{{URL::to('/')}}/reset"
                            }

                            function fp()
                            {
                                var op=confirm("We will send OTP on {{$d->username}} to reset your password");

                                if(op)
                            {
                                window.location.href="{{URL::to('/')}}/resend";
                            }
                            }
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>