<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Forgot password</title>
</head>

<body>

    <form action="{{url('auth/otp')}}" class="was-validated" method="POST">
    @csrf

    <div class="container pt-5">

        <h3>Forgot Password</h3>
        <p>Enter the mail and recover your password</p>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>

          <button class="btn btn-light" type="submit" > Get OTP </button>
          <br><br>
         @if ($error = session('error'))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        </form>

      </div>

</body>
</html>
