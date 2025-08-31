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

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Header/Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Tours Section -->
    <section id="tours" class="container py-5">
        <div class="text-center mb-5 mt-5">
            <p>Featured tours</p>
            <h3>Most Popular Tours</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From Rs 3500</span>
                    <img src="assets/images/s1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="package-details.php?id=1" class="btn btn-primary btn-sm">Book <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From Rs 3500</span>
                    <img src="assets/images/s2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Book <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From Rs 3500</span>
                    <img src="assets/images/s3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discovery Best Tours</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Central Park West NY, USA</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="far fa-clock"></i> 10 Days</small>
                            <a href="#" class="btn btn-primary btn-sm">Book <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 position-relative">
                    <span class="price-badge">From Rs 69.00</span>
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
                            <a href="#" class="btn btn-primary btn-sm">Book <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        // Dark mode toggle logic
        const toggleBtn = document.getElementById('darkModeToggle');
        const body = document.body;

        // Save preference in localStorage
        function setDarkMode(on) {
            if (on) {
                body.classList.add('dark-mode');
                localStorage.setItem('devaprayaan-dark', '1');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('devaprayaan-dark', '0');
            }
        }

        // On load: check preference or system
        (function () {
            const saved = localStorage.getItem('devaprayaan-dark');
            if (saved === '1' || (saved === null && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                setDarkMode(true);
            }
        })();

        toggleBtn.addEventListener('click', function () {
            setDarkMode(!body.classList.contains('dark-mode'));
        });
    </script>
</body>

</html>