<!DOCTYPE html>
<html>

<head>
    <title>Laravel Project</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <style>
        .custom-row {
            width: 60%;
            background-color: white;
        }

        @media (max-width: 576px) {
            .custom-row {
                width: 100%;
                font-size: smaller;
            }
        }

        .c1 {
            width: 30%;
        }

        @media (max-width: 576px) {
            .c1 {
                width: 80%;
            }
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


    @if (session('success'))

    <div class="alert alert-primary">
    {{session('success')}}
    </div>
    
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- <h5 align="center" style="font-weight: bold; color: blue; font-size: 40px; margin-top: 5%;">MeeTuP</h5> -->

    <div class="container" align="center">
        <div class="row custom-row" style="border: 1px solid blue; border-radius: 10px;">
            <div class="col-10 col-sm-11" style="padding: 10px 0;">Log in to continue?</div>
            <div class="col-2 col-sm-1 bg-primary" style="border-radius: 0 10px 10px 0; padding-top: 10px;">
                <i class="bi bi-box-arrow-in-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="container c1 shadow bg-white py-3" style="margin-top: 2%;">
        <p align="center">Log Into MeeTuP</p>
        <div>
            <p style="font-size: 15px; background-color: #F7E0B9; padding: 10px;" align="center">You must log in to
                continue</p>
        </div>
        <form action="loginKaro" method="post" enctype="multipart/form-data">
            @csrf

            <div style="padding-left: 30px;">
                <input type="text" placeholder="Enter moblie or email" name="username"
                    style="width: 95%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color:#F9F2F1">
            </div>

            <div class="error-message">
                @if ($errors->has('username'))


                    {{$errors->first('username')}}

                @endif

            </div>

            <div class="my-3" style="padding-left: 30px;">
                <input type="password" name="password" placeholder="Enter your password"
                    style="width: 95%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px;background-color:#F9F2F1">
            </div>

            <div class="error-message">
                @if ($errors->has('password'))


                    {{$errors->first('password')}}

                @endif

                @if ($errors->has('login'))


                    {{$errors->first('login')}}

                @endif


                
            </div>
            <div style="padding-left: 30px;">
                <input type="submit" value="Login" name="submit"
                    style="width: 90%; border: 1px solid #C6C4C2; color: white; padding: 5px; border-radius: 10px; background-color: #2D48EE;">
            </div>
        </form>
        <br>
        <a href="{{URL::to('/forgot')}}"><span style="color: blue;">Forgot Account?</span></a>
        <hr>
        <span>Don't have an account? <button class=" border-0 text-white"
                style="background-color:green; padding:5px 10px;border-radius:10px;" data-toggle="modal"
                data-target="#exampleModal">
                Sign Up
            </button>
        </span>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content px-3">

                <div class="">
                    <h5 class="modal-title" style="margin:5% 0% 2% 5%" id="exampleModalLabel">Sign Up <br><span
                            style="font-size:20px;font-weight:lighter;">To connect the world!!</span></h5>

                </div>
                <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div style="padding-left: 30px;">
                        <input type="text" value="{{ old('username1') }}" placeholder="Enter Your mobile or email"
                            name="username1"
                            style="width: 90%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color: #F9F2F1">
                        <div class="error-message">
                            @error('username1')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <div>
                                <input type="text" value="{{ old('first_name') }}" placeholder="First name"
                                    name="first_name"
                                    style="width:98%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color: #F9F2F1">
                            </div>
                            <div class="error-message">
                                @error('first_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div>
                                <input type="text" value="{{ old('surname1') }}" placeholder="Surname" name="surname1"
                                    style="width:98%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color: #F9F2F1">
                            </div>
                            <div class="error-message">
                                @error('surname1')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <p style="font-size:smaller">Date of birth</p>

                    <div class="row">
                        <div class="col-4">
                            <input type="number" value="{{ old('day') }}" name="day" placeholder="day"
                                style="width:80px">
                            <div class="error-message">
                                @error('day')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <input type="number" value="{{ old('month') }}" name="month" placeholder="month"
                                style="width:80px">
                            <div class="error-message">
                                @error('month')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <input type="number" value="{{ old('year') }}" name="year" placeholder="year"
                                style="width:80px">
                            <div class="error-message">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>
                    <p style="font-size:smaller">Gender</p>

                    <div class="row">
                        <div class="col-5 col-sm-4">
                            Male&nbsp;&nbsp;<input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                        </div>
                        <div class="col-6 col-sm-4">
                            Female&nbsp;&nbsp;<input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                        </div>
                        <div class="col-6 col-sm-4">
                            Other&nbsp;&nbsp;<input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                        </div>
                        <div class="error-message">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <br>
                    <p style="font-size:smaller">Hobbies</p>

                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <input type="checkbox" name="hobbies[]" value="games" id="games" {{ in_array('games', old('hobbies', [])) ? 'checked' : '' }}> Games
                        </div>
                        <div class="col-5 col-sm-4">
                            <input type="checkbox" name="hobbies[]" value="dancingsinging" id="dancingsinging" {{ in_array('dancingsinging', old('hobbies', [])) ? 'checked' : '' }}> Dancing & Singing
                        </div>
                        <div class="col-5 col-sm-4">
                            <input type="checkbox" name="hobbies[]" value="other" id="other" {{ in_array('other', old('hobbies', [])) ? 'checked' : '' }}> Other
                        </div>
                    </div>
                    <div class="error-message">
                        @error('hobbies')
                            {{ $message }}
                        @enderror
                    </div>

                    <p style="font-size:smaller">Profile Picture:</p>
                    <input type="file" name="profile_picture">
                    <div class="error-message">
                        @error('profile_picture')
                            {{ $message }}
                        @enderror
                    </div>
                    <br>
                    <div style="padding-left: 30px;" class="my-3">
                        <input type="password" placeholder="Create new Password" value="{{ old('newpassword') }}"
                            name="newpassword"
                            style="width: 85%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color: #F9F2F1">
                        <div class="error-message">
                            @error('newpassword')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div style="padding-left: 30px; margin-bottom:20px">
                        <input type="password" placeholder="Re-type password" value="{{ old('confirmpassword') }}"
                            name="confirmpassword"
                            style="width: 85%; border: 1px solid #C6C4C2; padding: 5px; border-radius: 10px; background-color: #F9F2F1">
                        <div class="error-message">
                            @error('confirmpassword')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->has('username1') || $errors->has('newpassword') || $errors->has('confirmpassword') || $errors->has('first_name') || $errors->has('surname') || $errors->has('gender') || $errors->has('day') || $errors->has('month') || $errors->has('year'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            });
        </script>
    @endif


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>