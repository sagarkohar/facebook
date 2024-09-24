<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Main container styling */
        .container {
            width: 40%; /* Set width of the container */
            margin-top: 60px; /* Space from the top */
            background-color: white; /* Background color */
            overflow-y: auto; /* Enable vertical scrolling if needed */
            -ms-overflow-style: none; /* Hide scrollbar in IE and Edge */
            scrollbar-width: none; /* Hide scrollbar in Firefox */
            max-height: 650px; /* Maximum height of the container */
            z-index: 0; /* Ensure it is behind other elements */
        }

        /* Stories section styling */
        .stories {
            display: flex; /* Use flexbox layout */
            margin-bottom: 20px; /* Margin below the stories section */
            overflow-x: auto; /* Enable horizontal scrolling */
            -ms-overflow-style: none; /* Hide scrollbar in IE and Edge */
            scrollbar-width: none; /* Hide scrollbar in Firefox */
        }

        /* Individual story styling */
        .story {
            width: 600px; /* Width of each story */
            height: 300px; /* Height of each story */
            background-color: white; /* Background color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
            margin-right: 10px; /* Space between stories */
            display: flex; /* Use flexbox layout */
            justify-content: center; /* Center content horizontally */
        }

        .story img {
            width: 50px; /* Width of the image */
            height: 50px; /* Height of the image */
            border-radius: 50%; /* Circle image */
        }

        /* Upload section styling */
        .upload_section {
            background-color: white; /* Background color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
            padding: 20px; /* Padding inside the section */
            margin-bottom: 10px; /* Space below the section */
        }

        /* Posts section styling */
        .posts {
            background-color: white; /* Background color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
            padding: 20px; /* Padding inside the section */
        }

        /* Individual post styling */
        .post {
            margin-bottom: 20px; /* Margin below each post */
            border-top: 1px solid #9EA0A2; /* Top border */
            border-bottom: 1px solid #9EA0A2; /* Bottom border */
            padding: 10px 2px; /* Padding inside each post */
            border-radius: 5%; /* Rounded corners */
            padding: 1%; /* Padding inside each post */
        }

        /* Post header styling */
        .post-header {
            display: flex; /* Use flexbox layout */
            align-items: center; /* Center items vertically */
            margin-bottom: 10px; /* Space below the header */
        }

        .post-header img {
            width: 40px; /* Width of the profile image */
            height: 40px; /* Height of the profile image */
            border-radius: 50%; /* Circle profile image */
            margin-right: 10px; /* Space between image and text */
        }

        /* Post content styling */
        .post-content {
            margin-bottom: 10px; /* Space below the content */
            height: 700px; /* Fixed height for content */
            width: 100%; /* Full width */
            padding-left: 10%; /* Padding on the left */
            border-radius: 5%; /* Rounded corners */
            border-bottom: 1px solid #9EA0A2; /* Bottom border */
        }

        /* Post footer styling */
        .post-footer {
            display: flex; /* Use flexbox layout */
            justify-content: space-between; /* Space between footer elements */
        }

        .post-footer button {
            color: black; /* Text color for buttons */
            border: none; /* No border */
            padding: 5px 10px; /* Padding inside buttons */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            background-color: transparent; /* Transparent background */
        }

        /* Online indicator styling */
        .online-indicator1 {
            width: 15px; /* Width of the indicator */
            height: 15px; /* Height of the indicator */
            background-color: blue; /* Blue color for online status */
            border-radius: 50%; /* Circle indicator */
            margin-left: auto; /* Push to the right */
        }

        /* Styling for hover effect on elements with class "c" */
        .c {
            width: 90%; /* Width of elements with class "c" */
            margin-left: 10%; /* Center alignment */
        }

        .c:hover {
            background-color: #BEC1C4; /* Background color on hover */
            border-radius: 20px; /* Rounded corners on hover */
            cursor: pointer; /* Pointer cursor on hover */
        }

        /* Chats section styling */
        .chats {
            max-height: 470px; /* Maximum height for chats section */
            overflow-y: auto; /* Enable vertical scrolling */
            -ms-overflow-style: none; /* Hide scrollbar in IE and Edge */
            scrollbar-width: none; /* Hide scrollbar in Firefox */
        }
    </style>
</head>

<body>

    <!-- Navbar inclusion -->
    @include('afterlogin/navbar')

    <div class="container-fluid">

        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-3">
                @include('afterlogin/left_side')
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-6">
                @include('afterlogin/chat')
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-3">
                @include('afterlogin/right_side')
            </div>
        </div>
    </div>

    <!-- JavaScript to hide/show search icon -->
    <script>
        function hide() {
            document.getElementById('searchicon2').style.display = 'none';
        }
        function showKaro() {
            document.getElementById('searchicon2').style.display = 'block';
        }
    </script>
</body>

</html>
