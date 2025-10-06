<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | Devaprayaan Tours and Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: url('assets/images/banner3.jpg') no-repeat center center/cover;
            min-height: 100vh;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-4">
            <i class="fas fa-user-plus fa-3x text-success mb-2"></i>
            <h3 class="fw-bold">Sign Up</h3>
        </div>

        <form>
            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Enter full name" required>
                </div>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Enter email" required>
                </div>
            </div>
            <!-- Username -->
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Choose a username" required>
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
            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Re-enter password" required>
                </div>
            </div>
            <!-- Signup button -->
            <button type="submit" class="btn btn-success w-100">Create Account</button>
        </form>

        <div class="text-center mt-3">
            <small>Already have an account? <a href="login.html" class="fw-semibold">Login</a></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>