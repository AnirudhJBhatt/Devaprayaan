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
?>

<!doctype html>
<html lang="en">
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

<body>
    <!-- Header/Navbar -->
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
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item">
                        <!-- Open modal instead of redirect -->
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="#">My Bookings</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        Dark mode toggle button
                        <button class="dark-toggle-btn" id="darkModeToggle" aria-label="Toggle dark mode">
                            <span class="icon-sun"><i class="fas fa-sun"></i></span>
                            <span class="icon-moon"><i class="fas fa-moon"></i></span>
                        </button>
                    </li> -->
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
                            <input type="text" class="form-control" name="username" placeholder="Enter mobile number" required>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
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
                    <small>Don’t have an account? <a href="signup.php" class="fw-semibold">Sign up</a></small>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Banner Carousel -->
    <div id="bannerCarousel" class="carousel slide pt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('assets/images/banner1.jpg');">
                <div class="carousel-caption text-center">
                    <h3 data-aos="fade-up">Travel & Adventures</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Discover amazing places at exclusive deals.</p>
                    <!-- <a class="btn btn-light mt-3" href="#tours">Explore More</a> -->
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('assets/images/banner2.jpg');">
                <div class="carousel-caption text-center">
                    <h3 data-aos="fade-up">Your Journey Begins</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Take advantage of this amazing exclusive offers.</p>
                    <!-- <a class="btn btn-light mt-3" href="#tours">Explore More</a> -->
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('assets/images/banner3.jpg');">
                <div class="carousel-caption text-center">
                    <h3 data-aos="fade-up">Love and Travel</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Discover amazing places at exclusive deals.</p>
                    <!-- <a class="btn btn-light mt-3" href="#tours">Explore More</a> -->
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Tours Section -->
    <section id="tours" class="container py-5">
        <div class="text-center mb-5">
            <p>Featured tours</p>
            <h3>Most Popular Tours</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From $39.00</span>
                    <img src="assets/images/s1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From $39.00</span>
                    <img src="assets/images/s2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From $39.00</span>
                    <img src="assets/images/s3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From $69.00</span>
                    <img src="https://source.unsplash.com/400x300/?dubai,travel" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dubai – Stunning Places</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> 5th Avenue, London</p>
                        <div class="mb-2">
                            <span class="text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span>4.5</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 15 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>

</html>