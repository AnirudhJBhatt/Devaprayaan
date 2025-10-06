<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Your Tour - Devaprayaan Tours</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- AOS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <?php
    // Dummy package data (replace with DB later)
    $packages = [
        1 => [
            "title" => "Discovery Best Tours",
            "price" => "3500",
            "duration" => "10 Days",
            "location" => "Central Park West NY, USA",
            "image" => "assets/images/s1.jpg"
        ],
        2 => [
            "title" => "Adventure Mountain Trek",
            "price" => "5500",
            "duration" => "7 Days",
            "location" => "Himalayas, India",
            "image" => "assets/images/s2.jpg"
        ]
    ];

    $id = $_GET['id'] ?? 1;
    $package = $packages[$id] ?? $packages[1];
  ?>

  <!-- Hero Banner -->
  <section class="text-white text-center d-flex align-items-center justify-content-center" 
           style="background: url('<?php echo $package['image']; ?>') center/cover no-repeat; height: 50vh; position: relative;">
    <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);"></div>
    <div class="position-relative z-1">
      <h1 class="fw-bold" data-aos="fade-up">Book Your Tour</h1>
      <p data-aos="fade-up" data-aos-delay="200"><?php echo $package['title']; ?> - Rs <?php echo $package['price']; ?></p>
    </div>
  </section>

  <!-- Booking Section -->
  <section class="container py-5">
    <div class="row g-5">
      
      <!-- Package Summary -->
      <div class="col-lg-4" data-aos="fade-right">
        <div class="card shadow-lg border-0">
          <img src="<?php echo $package['image']; ?>" class="card-img-top" alt="Package Image">
          <div class="card-body text-center">
            <h4><?php echo $package['title']; ?></h4>
            <p><i class="fas fa-map-marker-alt"></i> <?php echo $package['location']; ?></p>
            <h5 class="text-success">Rs <?php echo $package['price']; ?></h5>
            <p><i class="far fa-clock"></i> <?php echo $package['duration']; ?></p>
          </div>
        </div>
      </div>

      <!-- Booking Form -->
      <div class="col-lg-8" data-aos="fade-left">
        <div class="card shadow-lg border-0 p-4">
          <h3 class="mb-4">Traveler Information</h3>
          <form action="submit-booking.php" method="POST">
            <input type="hidden" name="package_id" value="<?php echo $id; ?>">

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-user"></i> Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-phone"></i> Phone</label>
                <input type="text" name="phone" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-users"></i> Number of Travelers</label>
                <input type="number" name="travelers" class="form-control" min="1" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-calendar"></i> Travel Date</label>
                <input type="date" name="date" class="form-control" required>
              </div>
              <div class="col-12">
                <label class="form-label"><i class="fas fa-comment-dots"></i> Special Requests</label>
                <textarea name="message" rows="3" class="form-control"></textarea>
              </div>
            </div>

            <div class="mt-4 text-center">
              <button type="submit" class="btn btn-primary btn-lg w-100">
                <i class="fas fa-paper-plane"></i> Submit Booking
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true });
  </script>
</body>
</html>
