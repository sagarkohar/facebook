<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Sidebar Styles */
        .sidebar1 {
            margin-top: 100px;
            /* Top margin for spacing */
            width: 20%;
            /* Sidebar width */
            padding: 20px;
            /* Padding inside the sidebar */
            background-color: #E6EEF7;
            /* Background color */
            position: fixed;
            /* Fixed position on the right */
            right: 0;
            /* Align to the right edge */
            top: 0;
            /* Align to the top edge */
            height: 80%;
            /* Full height */
            overflow-y: auto;
            /* Enable vertical scrolling */


            -ms-overflow-style: none;
            /* Hide scrollbar in IE and Edge */
            scrollbar-width: none;
            /* Hide scrollbar in Firefox */
        }


        .section {
            margin-bottom: 20px;
            overflow: hidden;
            ;
            /* Margin between sections */
        }

        .section h2 {
            font-size: 16px;
            /* Font size for section titles */
            margin-bottom: 10px;
            /* Space below section titles */
        }

        .friend-request,
        .birthday,
        .contact {
            display: flex;
            /* Flexbox layout */
            align-items: center;
            /* Center items vertically */
            margin-bottom: 10px;
            /* Margin below each item */
            padding: 10px;
            /* Padding inside each item */
        }

        .friend-request:hover,
        .birthday:hover,
        .contact:hover {
            background-color: #BEC1C4;
            /* Background color on hover */
            border-radius: 20px;
            /* Rounded corners on hover */
            cursor: pointer;
            /* Pointer cursor on hover */
        }

        .contacts-section {
            max-height: 400px;
            /* Fixed height for the contacts section */
            overflow-y: auto;
            /* Enable vertical scrolling */
            -ms-overflow-style: none;
            /* Hide scrollbar in IE and Edge */
            scrollbar-width: none;
            /* Hide scrollbar in Firefox */
        }

        .friend-request img,
        .contact img {
            border-radius: 50%;
            /* Circle images */
            width: 40px;
            /* Width of images */
            height: 40px;
            /* Height of images */
            margin-right: 10px;
            /* Space between image and text */
        }

        .friend-request button {
            margin-left: auto;
            /* Push button to the right */
            padding: 5px 10px;
            /* Padding inside buttons */
        }

        .online-indicator {
            width: 10px;
            /* Width of online indicator */
            height: 10px;
            /* Height of online indicator */
            background-color: green;
            /* Green color for online status */
            border-radius: 50%;
            /* Circle indicator */
            margin-left: auto;
            /* Push indicator to the right */
        }
    </style>
</head>

<body>
    <div class="sidebar1 text-black" style="font-weight:400">
        <!-- Friend Requests Section -->

        @php
            $friendId = \App\Models\MyFriend::where("friend", auth()->user()->id)->where("status", "pending")->value("me");
            $firstname = \App\Models\Registeration::where("id", $friendId)->value("firstname");
        @endphp

        @if ($firstname != null)
            <!-- Your HTML code here -->


            <div class="section">
                <h2>Friend Requests</h2>
                <div class="friend-request p-2">
                    <a href="/friends" style="text-decoration:none;color:black">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{URL::to('/')}}/images/{{ \App\Models\Registeration::where("id", \App\Models\MyFriend::where("friend", auth()->user()->id)->where("status", "pending")->get()->value("me"))->get()->value("profile_picture")}}"
                                    alt="Profile Picture">
                            </div>
                            <div class="col-8">

                                <div class="row">
                                    <a href="/friends" style="text-decoration:none;color:black">
                                        <p style="font-size:20px;">
                                            {{ \App\Models\Registeration::where("id", \App\Models\MyFriend::where("friend", auth()->user()->id)->where("status", "pending")->get()->value("me"))->get()->value("firstname")}}
                                        </p>

                                        <p style="font-size:10px;">
                                            20 Mutual Friends
                                        </p>
                                    </a>
                                </div>
                                <a href="/friends" style="text-decoration:none;color:black">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn-primary border-0">Confirm</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="border-0"
                                                style="background-color:#ABBACC;color:white;">Delete</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif


        <!-- Birthdays Section -->
        <div class="section">
            <h2>Birthdays</h2>
            <div class="birthday">
                <img src="{{URL::to('/')}}/images/logos/giftbox.png"
                    style="border-radius: 10%;width: 40px;height: 40px; margin-right: 10px;" alt="Profile Picture">
                <span><span style="font-size:larger">Sagar Prajapati</span> and 5 others have birthdays today.</span>
            </div>
        </div>

        <!-- Contacts Section -->
        <div class="section contacts-section">
            <h2>Contacts</h2>
            <div class="contact">
                <img src="{{URL::to('/')}}/images/default.png" alt="Profile Picture">
                <span>Mike Smith</span>
                <div class="online-indicator"></div>
            </div>
            <!-- Add more contacts as needed -->
        </div>

        <!-- Group Contacts Section -->
        <div class="section contacts-section">
            <h2>Group Conversations</h2>
            <div class="contact">
                <img src="{{URL::to('/')}}/images/default.png" alt="Profile Picture">
                <span>Mike Smith</span>
                <div class="online-indicator"></div>
            </div>
            <!-- Add more group contacts as needed -->
        </div>
    </div>
</body>

</html>