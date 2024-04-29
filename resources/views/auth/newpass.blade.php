<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>New Password</title>
</head>
<body>

    <form  action="{{url('auth/login')}}" class="was-validated" method="POST">
        @csrf

    <div class="container mt-3">
        <h3>Password</h3>

    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="pwd" class="form-label">New Password:</label>
        <input type="new password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        <div class="valid-feedback">Valid.</div>
      </div>

      <button style="margin-right: 20px;" type="submit" class="btn btn-primary"> Submit </button>
      <br><br>
        @if ($error = session('error'))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
</body>
</html>
