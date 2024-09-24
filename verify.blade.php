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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the OTP expiration time from the server (passed from backend)
            var expirationTime = {{ session('otp_expiration_time') }} * 1000; // Convert to milliseconds

            // Calculate the remaining time
            var now = new Date().getTime();
            var timeLeft = expirationTime - now;

            // Function to update the countdown every second
            function updateCountdown() {
                timeLeft -= 1000; // Decrease time left by 1 second

                // Calculate minutes and seconds left
                var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);


                document.getElementById("countdown").style.fontWeight = "bold";

                // Display the result in the element with id="countdown"
                document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

                // If the count down is finished, display an expired message
                if (timeLeft < 0) {
                    clearInterval(countdownInterval);
                    document.getElementById("countdown").innerHTML = "Expired";



                }
            }

            // Update the countdown every 1 second
            var countdownInterval = setInterval(updateCountdown, 1000);

            // Initial call to display countdown immediately
            updateCountdown();
        });
    </script>
</head>

<body>

    @include('beforelogin/links')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-2">
                    <div class="card-body text-center">
                        <p class="card-text mb-4">Please enter OTP code sent on your email or phone number</p>
                        <form action="{{URL::to('/')}}/resetpassword">
                            <div class="form-group">
                                <input type="number" name="otp" class="form-control" placeholder="Email OTP code">
                            </div>
                            <div class="error-message">
                                @if ($errors->has('otp'))

                                    {{  $errors->first('otp')}}
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verify</button>
                        </form>
                        <div class="d-flex mt-1">
                            <a href="{{URL::to('/')}}">Back to
                                Login</a>

                            @if (!session('registerationData'))
                                <a href="/resend/{" style="margin-left:190px;">Resend</a>

                            @endif
                            <a href="/resend" style="margin-left:190px;">Resend</a>

                        </div>

                        <p>The OTP will expire in <span id="countdown"></span>.
                        </p>


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