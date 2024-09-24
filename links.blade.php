<!DOCTYPE html>
<html>

<head>
    <title>Laravel Project</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

        <style>
            .error-message{
                color: red;
            }
        </style>
    
</head>

<body style="background-color:#E4ECFB">
    <div class="meetup container-fluid bg-primary mb-5 text-white text-center py-3">
        <h1>MeeTuP</h1>
    </div>


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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>