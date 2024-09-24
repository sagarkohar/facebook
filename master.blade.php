<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Container styling */
        .container {
            width: 50%;
            margin-top: 60px;
            overflow-y: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
            max-height: 650px;
            z-index: 0;
        }

        /* Stories section styling */
        .stories {
            display: flex;
            margin-bottom: 20px;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }

        /* Individual story styling */
        .story {
            width: 600px;
            height: 300px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
            display: flex;
            justify-content: center;
        }

        /* Story image styling */
        .story img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* Upload section styling */
        .upload_section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 10px;
        }

        /* Posts section styling */
        .posts {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Individual post styling */
        .post {
            margin-bottom: 20px;
            border-top: 1px solid #9EA0A2;
            border-bottom: 1px solid #9EA0A2;
            padding: 10px 2px;
            margin-bottom: 50px;
            border-radius: 5%;
            padding: 1%;
        }

        /* Post header styling */
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        /* Post header image styling */
        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Post content styling */
        .post-content {
            margin-bottom: 10px;
            height: 700px;
            width: 100%;
            padding-left: 10%;
            border-radius: 5%;
            border-bottom: 1px solid #9EA0A2;
        }

        /* Post footer styling */
        .post-footer {
            display: flex;
            justify-content: space-between;
        }

        /* Post footer button styling */
        .post-footer button {
            color: black;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: transparent;
        }
    </style>
</head>

<body>

    <!-- Include the navbar -->
    @include('afterlogin/navbar')
    <br>


    <div class="container-fluid">

        <div class="row">
            <!-- Left side content -->
            <div class="col-lg-3">
                @include('afterlogin/left_side')
            </div>

            <!-- Main content -->
            <div class="col-lg-6">
                @yield("content")
            </div>

            <!-- Right side content -->
            <div class="col-lg-3">
                @include('afterlogin/right_side')
            </div>
        </div>
    </div>
    </div>
</body>

</html>