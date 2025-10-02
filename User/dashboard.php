<?php
    session_start();
    $User_ID = $_SESSION['User_ID'] ?? null;
    include '../includes/db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devaprayaan Tours and Travels</title>
</head>

<body>
    <!-- Header/Navbar -->
    <?php include '../includes/user-header.php'; ?>
    
    <!-- Banner Carousel -->
    <div id="bannerCarousel" class="carousel slide pt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('../assets/images/Tirumala.jpeg');">
                <div class="carousel-caption text-center">
                    <h3 data-aos="fade-up">Travel & Adventures</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Discover amazing places at exclusive deals.</p>
                    <!-- <a class="btn btn-light mt-3" href="#tours">Explore More</a> -->
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('../assets/images/Varanasi-image.jpg');">
                <div class="carousel-caption text-center">
                    <h3 data-aos="fade-up">Your Journey Begins</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Take advantage of this amazing exclusive offers.</p>
                    <!-- <a class="btn btn-light mt-3" href="#tours">Explore More</a> -->
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('../assets/images/Dwaraka.jpeg');">
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

    <?php include '../includes/footer.php'; ?>
</body>

</html>