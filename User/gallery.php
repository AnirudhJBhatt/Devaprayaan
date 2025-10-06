<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery | Devaprayaan Tours and Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .gallery-img {
            border-radius: 1rem;
            transition: transform 0.3s, box-shadow 0.3s;
            object-fit: cover;
            height: 220px;
            width: 100%;
        }
        .gallery-img:hover {
            transform: scale(1.04);
            box-shadow: 0 8px 32px rgba(78, 84, 200, 0.18);
        }
        .gallery-card {
            border: none;
            background: transparent;
        }
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.45);
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0 0 1rem 1rem;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include '../includes/user-header.php'; ?>

    <!-- Gallery Grid -->
    <section class="container py-5">
        <div class="container text-center my-5">
            <h1 class="display-5 fw-bold mb-3">Gallery</h1>
        </div>
        <div class="row g-4">
            <!-- Gallery Item -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s1.jpg" alt="Gallery 1" class="gallery-img">
                    <div class="gallery-overlay">Central Park West NY, USA</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s2.jpg" alt="Gallery 2" class="gallery-img">
                    <div class="gallery-overlay">Dubai – Stunning Places</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s3.jpg" alt="Gallery 3" class="gallery-img">
                    <div class="gallery-overlay">Italy – Enquiry Form Only</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s4.jpg" alt="Gallery 4" class="gallery-img">
                    <div class="gallery-overlay">Switzerland – Zurich</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s5.jpg" alt="Gallery 5" class="gallery-img">
                    <div class="gallery-overlay">America – Lake Tahoe</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/s6.jpg" alt="Gallery 6" class="gallery-img">
                    <div class="gallery-overlay">Paris – Eiffel Tower</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/about.jpg" alt="Gallery 7" class="gallery-img">
                    <div class="gallery-overlay">Travel Memories</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card gallery-card position-relative overflow-hidden">
                    <img src="../assets/images/about2.jpg" alt="Gallery 8" class="gallery-img">
                    <div class="gallery-overlay">Adventure Moments</div>
                </div>
            </div>
            <!-- Add more images as needed -->
        </div>
    </section>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

</body>
</html>