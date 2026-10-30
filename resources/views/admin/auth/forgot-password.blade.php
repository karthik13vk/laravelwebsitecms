
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #f2f1fa;
            font-family: Arial, sans-serif;
        }
        .reset-card {
            width: min(430px, 92%);
            padding: 34px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 12px 35px rgba(35, 25, 90, .10);
        }
    </style>
</head>
<body>

<div class="reset-card">
    <h3>Forgot Password?</h3>
    <p class="text-muted mb-4">
        Password recovery needs a configured reset process.
        Contact your system administrator for assistance.
    </p>

    <a href="{{ route('admin.login') }}"
       class="btn btn-primary w-100">Back to Login</a>
</div>

</body>
</html>
