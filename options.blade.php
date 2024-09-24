<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Facebook</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .option {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .option:hover {
            background-color: #f0f2f5;
        }
    </style>
</head>

<body>
@include('beforelogin/links')

    <div class="container col-100 col-sm-50 col-lg-25 col-md-25 my-5">
        <h3 class="text-center">Reset Your Password</h3>
        <hr>
        <p class="text-center">How would you like to receive the OTP code to reset your password?</p>

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4" style="padding-left:90px;">
                <div style="width:80px;"><img src="{{URL::to('/')}}/images/{{$user->profile_picture}}" alt=""
                        style="width:90%; border-radius:100%;height:80px;"></div>
                {{$user->username}}

            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="option border-0">
                    <a href="{{URL::to('/')}}/otp/{{$user->username}}">
                        <div class="d-flex align-items-center">
                            <span class="mr-3">📧</span>
                            <span>Send Code via Email ({{$user->username}})</span>
                        </div>
                    </a>
                </div>
                <div class="option border-0">
                    <a href="{{URL::to('/')}}/otp">
                        <div class="d-flex align-items-center">
                            <span class="mr-3">📱</span>
                            <span>Send Code via SMS (+91 ***-***-1234)</span>
                        </div>
                    </a>
                </div>
                <div class="option border-0">
                    <a href="{{URL::to('/')}}">
                        <div class="d-flex align-items-center">
                            <span class="mr-3">🔒</span>
                            <span>Back To Login</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>