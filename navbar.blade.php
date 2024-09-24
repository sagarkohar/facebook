<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-like Navigation Bar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        /* Navbar styling */
        .navbar {
            background-color: #fff;
            color: black;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* Navbar brand and link styling */
        .navbar-brand,
        .nav-link,
        .form-control {
            color: #6D7073 !important;
        }

        /* Navbar brand specific styling */
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        /* Search input field color */
        .form-control {
            color: green;
        }

        /* Navigation icons size */
        .nav-icon {
            font-size: 25px;
        }

        /* Profile picture styling */
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Justify content between for navbar collapse */
        .navbar-collapse {
            justify-content: space-between;
        }

        /* Styling for search input group */
        .input-group .form-outline {
            background-color: #E6EEF7;
            border-radius: 20px;
            width: 100%;
        }

        /* Remove dropdown arrow for profile picture */
        .di::after {
            display: none;
        }

        /* Notification badge styling */
        .notification {
            position: relative;
            display: inline-block;
        }

        .notification .badge {
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
        }

        /* Dropdown menu styling */
        .dropdown-menu,
        .comments {
            width: 300px;
            max-height: 400px;
            overflow: hidden;
            /* overflow-y: auto; */
        }

        .comments::-webkit-scrollbar {
            display: none;
            /* Hides the scrollbar */
        }

        /* Ensure dropdown item text wraps correctly */
        .dropdown-item {
            white-space: normal;
        }

        /* Success message styling */
        .success {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid green;
            border-radius: 5px;
        }

        .success-green {
            background-color: #d4edda;
            color: #155724;
        }

        .error-message {
            color: red;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if there are any error messages
            var errorMessage = document.querySelector('.error-message');

            if (errorMessage && errorMessage.innerText.trim() !== '') {
                // Show the error message
                errorMessage.style.display = 'block';

                // Hide the error message after 2 seconds
                setTimeout(function () {
                    errorMessage.style.display = 'none';
                }, 2000); // 2000 milliseconds = 2 seconds
            }
        });
    </script>

</head>



<body style="background-color:#E6EEF7">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <!-- Logo -->
        <a class="" style="font-size:30px;font-weight:700" href="/successlogin" id="logo">MeetUp</a>
        <!-- Toggler Button for smaller screens -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="row w-100">
                <!-- Search Bar -->
                <div class="col-md-4 d-flex justify-content-start">
                    <div class="input-group" style="width:300px;height:40px;">
                        <div class="form-outline d-flex align-items-center" data-mdb-input-init>
                            <!-- Search Icon -->
                            <button type="button" id="searchicon" class="btn btn border-0" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                            <!-- Search Input Field -->
                            <input type="search" name="search" class="form-control border-0 " onfocus="remove()"
                                onblur="show()" placeholder="Search here"
                                style="border-radius:20px;background-color:#E6EEF7">
                        </div>
                    </div>
                </div>

                <!-- Navigation Icons -->
                <div class="col-md-4 d-flex justify-content-center">
                    <!-- Home Icon -->
                    <a class="nav-link" href="/successlogin"><i class="fas fa-home nav-icon"></i></a>
                    <!-- Video Icon -->
                    <a class="nav-link" style="margin-top:-5px;color:#E6EEF7" href="#"><img
                            src="{{URL::to('/')}}/images/logos/vieos.png" alt="i"></a>
                    <!-- Friends Icon -->
                    <a class="nav-link" href="/friends"><i class="fas fa-user-friends nav-icon"></i></a>
                    <!-- Groups Icon -->
                    <a class="nav-link" href="#"><i class="fas fa-users nav-icon"></i></a>
                    <!-- Marketplace Icon -->
                    <a class="nav-link" href="#"><i class="fas fa-store nav-icon"></i></a>
                </div>

                <!-- Profile and Notifications -->
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle di" href="{{URL::to('/')}}/profile" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{URL::to('/')}}/images/{{auth()->user()->profile_picture ?? 'default.jpg'}}"
                                alt="Profile" class="profile-pic">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right i" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Logout</a>

                        </div>
                    </div>
                    <!-- Notification Dropdown -->
                    <div class="notification dropdown">
                        <a class="nav-link dropdown-toggle di" href="#" id="notificationDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                            <!-- Notification Items -->
                            <a class="dropdown-item" href="#">
                                <strong>John Doe</strong> liked your post.
                                <br><small class="text-muted">2 minutes ago</small>
                            </a>
                            <a class="dropdown-item" href="#">
                                <strong>Mary Smith</strong> commented on your photo.
                                <br><small class="text-muted">5 minutes ago</small>
                            </a>
                            <a class="dropdown-item" href="#">
                                <strong>Robert Brown</strong> sent you a friend request.
                                <br><small class="text-muted">10 minutes ago</small>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="#">
                                View all notifications
                            </a>
                        </div>
                    </div>
                    <!-- Messenger Icon -->
                    <a class="nav-link" href="/messanger"><i class="fas fa-envelope nav-icon"></i></a>
                </div>
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="success success-green">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Hide the search icon and logo when the search input is focused
        function remove() {
            document.getElementById('searchicon').style.display = 'none';
            document.getElementById('logo').style.display = 'none';
        }

        // Show the search icon and logo when the search input loses focus
        function show() {
            document.getElementById('searchicon').style.display = 'inline';
            document.getElementById('logo').style.display = 'inline';
        }
    </script>
</body>

</html>