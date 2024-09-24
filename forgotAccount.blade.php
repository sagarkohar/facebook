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
</head>

<body>

  @include('beforelogin/links')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-2">
          <div class="card-body text-center">
            <h2 class="card-title mb-4">Find Your Account</h2>
            <p class="card-text mb-4">Please enter your email or phone number</p>
            <form action="/recovery" method="post">
              @csrf
              <div class="form-group">
                <input type="text" name="emailornumber" class="form-control" placeholder="Email or Phone Number">
              </div>

              <div class="error-message">
                @if ($errors->has('emailornumber'))


          {{$errors->first('emailornumber')}}

        @endif
              </div>
              <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
            <a href="{{URL::to('/')}}"><button class="btn mt-3 btn-secondary btn-block">Back to Login</button></a>

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