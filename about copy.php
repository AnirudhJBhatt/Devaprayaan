<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-header {
            font-size: 0.875rem;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            padding: 0.6rem 1rem;
        }

        li a:hover {
            color: #ffc107 !important;
        }

        .navbar {
            font-size: 0.95rem;
        }

        footer {
            background-color: rgba(78, 84, 200, 0.95);
        }

        footer a {
            color: #fff;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #ffc107;
            text-decoration: none;
        }

        .social-icon i {
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .social-icon i:hover {
            color: #ffc107;
        }

        #carouselbanner .carousel-item {
            height: 90vh;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        #carouselbanner .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.55);
        }
    </style>
</head>

<body>
    <!-- Top Header -->
    <div class="bg-white border-bottom py-2 top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo + Title -->
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/50" alt="Logo" class="me-2">
                <div>
                    <h6 class="mb-0 fw-bold">Devaprayaan Tours and Travels</h6>
                </div>
            </div>

            <!-- Right Options -->
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-primary px-3">Login</button>
                <button class="btn btn-sm btn-primary px-3">Register</button>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(78, 84, 200, 0.95);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav w-100 mb-2 mb-lg-0 d-flex">
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <!-- <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Individual/HUF</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link text-white" href="#">About Us</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link text-white" href="#">Tours</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link text-white" href="#">Gallery</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link text-white" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content  -->
    <main class="flex-grow-1">
        <div id="carouselbanner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h1 class="mb-4">About Us</h1>
            <p>Welcome to Devaprayaan Tours and Travels! We are dedicated to providing exceptional travel experiences tailored to your needs. Our team of experienced professionals is here to assist you in planning your perfect getaway, whether it's a relaxing beach vacation, an adventurous trek, or a cultural exploration.</p>
            <p>At Devaprayaan, we believe that travel is not just about the destination but also about the journey. We strive to make every step of your travel experience seamless and enjoyable. From booking flights and accommodations to arranging tours and activities, we handle all the details so you can focus on making memories.</p>
            <p>Our commitment to customer satisfaction is unwavering. We work with trusted partners and suppliers to ensure that you receive the best services at competitive prices. Your safety and comfort are our top priorities, and we go above and beyond to exceed your expectations.</p>
            <p>Thank you for choosing Devaprayaan Tours and Travels. We look forward to helping you explore the world and create unforgettable experiences!</p>
        </div>
    </main>
    <!-- Footer -->
    <footer class="py-3 text-light mt-auto">
        <div class="container text-center">
            <h6 class="text-uppercase fw-bold mb-4">Contact Info</h6>
            <div class="d-flex flex-wrap justify-content-center gap-4 mb-3">
                <span><i class="fas fa-map-marker-alt me-2"></i>5th Avenue, #06 lane street, NY - 62617</span>
                <span><i class="fas fa-phone me-2"></i><a href="tel:+1212344567">+1 (21) 234 4567</a></span>
                <span><i class="fas fa-envelope me-2"></i><a href="mailto:info@example.com">info@example.com</a></span>
            </div>
            <div class="mt-3">
                <a href="#" class="me-2 social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-instagram"></i></a>
            </div>
            <hr class="border-light">
            <small>© 2025 <span class="fw-bold">Devaprayaan Tours and Travels</span>. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
