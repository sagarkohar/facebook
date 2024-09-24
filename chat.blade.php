<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Chat container styling */
        .chat-container {
            background-color: #fff;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Chat header styling */
        .chat-header {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            background-color: #f7f7f7;
        }

        /* Chat box styling */
        .chat-box {
            padding: 20px;
            flex-grow: 1;
            max-height: 400px;
            /* Set a fixed height for the chat box */
            overflow-y: auto;
            /* Enable vertical scrolling */
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Message styling */
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 10px;
            position: relative;
        }

        /* Received message styling */
        .message.received {
            background-color: #e4e6eb;
            align-self: flex-start;
        }

        /* Sent message styling */
        .message.sent {
            background-color: #0084ff;
            color: #fff;
            align-self: flex-end;
        }

        /* Message time styling */
        .message .time {
            font-size: 0.75em;
            color: #777;
            position: absolute;
            bottom: -15px;
            right: 10px;
        }

        /* Chat input styling */
        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
            padding: 10px;
            background-color: #f7f7f7;
        }

        /* Message input field styling */
        #message-input {
            flex-grow: 1;
            border: none;
            padding: 10px;
            border-radius: 20px;
            background-color: #f0f2f5;
        }

        /* Send button styling */
        #send-button {
            background-color: #0084ff;
            border: none;
            padding: 10px 15px;
            border-radius: 20px;
            color: #fff;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Chat container -->
        <div class="chat-container">
            <!-- Chat header -->
            <div class="chat-header">
                <h2>Chat with Friends</h2>
            </div>
            <!-- Chat box -->
            <div class="chat-box">
                <!-- Example of received message -->
                <div class="message received">
                    <p>Hello! How are you?</p>
                    <span class="time">10:30 AM</span>
                </div>
                <!-- Example of sent message -->
                <div class="message sent">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="time">10:31 AM</span>
                </div>
                <!-- Add more messages as needed -->
                <div class="message received">
                    <p>Hello! How are you?</p>
                    <span class="time">10:30 AM</span>
                </div>
                <div class="message sent">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="time">10:31 AM</span>
                </div>
                <div class="message received">
                    <p>Hello! How are you?</p>
                    <span class="time">10:30 AM</span>
                </div>
                <div class="message sent">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="time">10:31 AM</span>
                </div>
                <div class="message received">
                    <p>Hello! How are you?</p>
                    <span class="time">10:30 AM</span>
                </div>
                <div class="message sent">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="time">10:31 AM</span>
                </div>
                <div class="message received">
                    <p>Hello! How are you?</p>
                    <span class="time">10:30 AM</span>
                </div>
                <div class="message sent">
                    <p>I'm good, thanks! How about you?</p>
                    <span class="time">10:31 AM</span>
                </div>
            </div>
            <!-- Chat input -->
            <div class="chat-input">
                <input type="text" placeholder="Type a message..." id="message-input" class="form-control">
                <button id="send-button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</body>

</html>
