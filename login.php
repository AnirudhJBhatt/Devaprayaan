<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Devaprayaan Tours and Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: url('assets/images/banner2.jpg') no-repeat center center/cover;
            min-height: 100vh;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-2">
            <i class="fas fa-user-circle fa-3x text-primary mb-2"></i>
            <h3 class="fw-bold">Login</h3>
        </div>

        <form>
            <!-- Mobile -->
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Enter mobile number" required>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Enter password" required>
                </div>
            </div>
            <!-- Forgot password -->
            <div class="mb-3 text-end">
                <a href="forgot-password.html" class="text-decoration-none">Forgot password?</a>
            </div>
            <!-- Login button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>Don’t have an account? <a href="signup.html" class="fw-semibold">Sign up</a></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>