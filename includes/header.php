<?php
    include 'includes/db.php';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE Phone='$username' AND Password='$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) < 0) {
            echo "<script>alert('Invalid username or password');</script>";
        }
        else{
            session_start();
            if($row['Role'] =='Admin'){
                $_SESSION['Role'] = $row['Role'];
                header("Location: ./admin/dashboard.php");
            }
            else{
                $_SESSION['User_ID'] = $row['User_ID'];
                header("Location: ./user/dashboard.php");
            }            
        }
    }
    
    if(isset($_POST['signup'])) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $checkquery = "SELECT * FROM users WHERE Phone='$phone'";
        if(mysqli_num_rows(mysqli_query($conn, $checkquery)) > 0){
            echo "<script>alert('Mobile number already registered. Try with another number');</script>";
        }
        else{
            $query = "INSERT INTO users (Name, Gender, Phone, Email, Password, Role) VALUES ('$name', '$gender', '$phone', '$email', '$password', 'User')";
            if(mysqli_query($conn, $query)){
                echo "<script>alert('Registration successful');</script>";
            }
            else{
                echo "<script>alert('Registration failed');</script>";
            }
        }
    }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devaprayaan Tours and Travels</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- AOS (Animate on Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Devaprayaan Tours and Travels</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="booking.php">Tours</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item">
                    <!-- Open modal instead of redirect -->
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card shadow-lg p-4 border-0">
                    <div class="text-center mb-2">
                        <i class="fas fa-user-circle fa-3x text-primary mb-2"></i>
                        <h3 class="fw-bold">Login</h3>
                    </div>

                    <form method="POST" action="">
                        <!-- Mobile -->
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Enter mobile number" required>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Enter password"
                                    required>
                            </div>
                        </div>
                        <!-- Forgot password -->
                        <div class="mb-3 text-end">
                            <a href="forgot-password.php" class="text-decoration-none">Forgot password?</a>
                        </div>
                        <!-- Login button -->
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <small>Don’t have an account?
                            <a href="#" class="fw-semibold" data-bs-toggle="modal" data-bs-target="#signupModal"
                                data-bs-dismiss="modal">Sign up</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card shadow-lg p-4 border-0">
                    <div class="text-center mb-2">
                        <i class="fas fa-user-plus fa-3x text-success mb-2"></i>
                        <h3 class="fw-bold">Create Account</h3>
                    </div>

                    <form method="POST" action="">
                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Enter your full name"
                                    required>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" required>
                                    <label class="form-check-label" for="genderOther">Other</label>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" name="phone" placeholder="Enter mobile number"
                                    required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Enter email"
                                    required>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Create a password" required>
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password"
                                    placeholder="Confirm password" required>
                            </div>
                        </div>
                        <!-- Signup button -->
                        <button type="submit" name="signup" class="btn btn-success w-100">Sign Up</button>
                    </form>

                    <div class="text-center mt-3">
                        <small>Already have an account?
                            <a href="#" class="fw-semibold" data-bs-toggle="modal" data-bs-target="#loginModal"
                                data-bs-dismiss="modal">Login</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>