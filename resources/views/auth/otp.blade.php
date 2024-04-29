<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>OTP Verification</title>
</head>
<body>

    <div class="container pt-5">
    <h2>OTP Verification</h2>
    <p>Please enter the OTP sent to your mail.</p>

        <form action="{{url('auth/newpass')}}" class="was-validated" method="POST">
            @csrf

            <div class="form-group row">
                <input type="text" class="form-control" id="otp" placeholder="Enter Otp" name="otp" required>
                <br><br>
                <button class="btn btn-primary" type="submit"> Verify Otp</button>
            </div>
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
