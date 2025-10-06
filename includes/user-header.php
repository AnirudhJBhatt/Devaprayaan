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
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
 
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../user/dashboard.php">Devaprayaan Tours and Travels</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="../user/dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../user/booking.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="../user/booking.php">Tours</a></li>
                <li class="nav-item"><a class="nav-link" href="../user/gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="../user/contact.php">Contact Us</a></li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg me-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../user/user-profile.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="../user/booking-history.php">My Bookings</a></li>
                        <li><a class="dropdown-item" href="../user/transaction-history.php">My Transactions</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="../logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
