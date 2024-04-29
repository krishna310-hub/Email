<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h3>Admin Login</h3>
  <p>Try to enter using the login</p>

  <form  action="{{ route('loginData') }}" class="was-validated" method="POST">
    @csrf

    <div class="mb-3 mt-3">
      <label for="uname" class="form-label">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <div class="valid-feedback">Valid.</div>
    </div>

    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
        <div class="valid-feedback">Valid.</div>
      </div>

    <div class="mb-3">
      <label for="pwd" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
      <div class="valid-feedback">Valid.</div>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="myCheck"  name="remember" required>
      <label class="form-check-label" for="myCheck">Remember me</label>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Check this checkbox to remember me</div>
    </div>

  <button style="margin-right: 20px;" type="submit" class="btn btn-primary">Submit</button>

    <a style="margin-right: 100px;" href="{{ route('register') }}"> Register </a>

    <a style="margin-right: 100px;" href="{{ route('forgot') }}"> Forgot password </a>
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

