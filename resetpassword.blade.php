<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Facebook</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
            text-align: center;
        }

        .footer a {
            color: #4267B2;
            text-decoration: none;
            margin: 0 10px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body style="background-color:#E4ECFB">

    <div class="meetup container-fluid bg-primary mb-5 text-white text-center py-3">
        <h1>MeeTuP</h1>
    </div>
    <div class="container text-center">
        <h2 class="h4 mb-3">Reset Your Password</h2>
        <p class="mb-4">Enter a new password for your account.</p>
        <form action="/resetPassword" method="post">
            @csrf
            <div class="form-group">
                <input type="password" name="new_password" class="form-control" id="newPassword"
                    placeholder="New Password">
            </div>

            <div class="error-message">
                @if ($errors->has("new_password"))
                    {{$errors->first("new_password")}}


                @endif
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" id="confirmPassword"
                    placeholder="Confirm New Password">
            </div>


            <div class="error-message">
                @if ($errors->has("confirm_password"))
                    {{$errors->first("confirm_password")}}


                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>