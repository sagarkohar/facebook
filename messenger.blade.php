<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            width: 40%;
            margin-top: 60px;
            background-color: white;
            overflow-y: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
            max-height: 650px;
            z-index: 0;
        }

        .stories {
            display: flex;
            margin-bottom: 20px;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }

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

        .story img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .upload_section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 10px;

        }

        .posts {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .post {
            margin-bottom: 20px;
            border-top: 1px solid #9EA0A2;
            ;
            border-bottom: 1px solid #9EA0A2;
            ;
            padding: 10px 2px;
            margin-bottom: 50px;
            border-radius: 5%;
            padding: 1%;



        }

        .post-header {
            display: flex;
            align-items: center;
            background-color: ;
            margin-bottom: 10px;
        }

        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-content {
            margin-bottom: 10px;
            height: 700px;
            width: 100%;
            padding-left: 10%;
            border-radius: 5%;
            border-bottom: 1px solid #9EA0A2;

        }

        .post-footer {
            display: flex;
            justify-content: space-between;
        }

        .post-footer button {
            color: black;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: transparent;
        }

        .online-indicator1 {
            width: 15px;
            height: 15px;
            background-color: blue;
            border-radius: 50%;
            margin-left: auto;
        }

        .c{
            width: 90%;
            margin-left: 10%;
        }
        .c:hover {
            background-color: #BEC1C4;
            border-radius: 20px;
            cursor: pointer;
        }


        .chats{
             max-height: 470px;
            /* Set a fixed height for the contacts section */
            overflow-y: auto;
            /* Enable vertical scrolling */
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            
        }
    </style>
</head>

<body>


    @include('afterlogin/navbar');

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3">
                @include('afterlogin/left_side')

            </div>

            <div class="col-lg-6">
                <div class="container py-3">
                    <h2>Chats</h2>

                    <div class="col-md-6 d-flex justify-content-start">
                        <div class="input-group" style="width:300px;height:40px;">
                            <div class="form-outline d-flex align-items-center" data-mdb-input-init>
                                <button type="button" id="searchicon2" class="btn btn border-0" data-mdb-ripple-init>
                                    <i class="fas fa-search"></i>
                                </button>
                                <input type="search" name="search" onfocus="hide()" onblur="showKaro()"
                                    class="form-control border-0 " placeholder="Search here"
                                    style="border-radius:20px;background-color:#E6EEF7">
                            </div>
                        </div>
                    </div>

                    <input type="button" class="border-0" value="Inbox" name=""
                        style="border-radius:20px;background-color:#E6EEF7;padding:5px;font-size:20px;margin:10px;color:blue;"
                        id="">


                    <div class="chats" >
                        <a href="/message" style="text-decoration:none;">
                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p style="color:black">hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div></a>
                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row c">
                            <div class="col-3">
                                <div class="contact">
                                    <img src="{{URL::to('/')}}/images/user.jpg" alt="Profile Picture">
                                    <div class="online-indicator" style="margin-left:0"></div>
                                </div>
                            </div>
                            <div class="col-7">
                                <h3>Shiv sagar kohar</h3>
                                <p>hi ham facebook banaithan</p>
                            </div>
                            <div class="col-2">
                                <div class="contact">
                                    <div class="online-indicator1" style="margin-left:0"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                @include('afterlogin/right_side');

            </div>
        </div>
    </div>
    </div>


    <!-- To hide and show search icon -->

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