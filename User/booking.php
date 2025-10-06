<?php
    // session_start();
    // if (!isset($_SESSION['user_id'])) {
    //     header("Location: login.php");
    //     exit();
    // }

    // $user_id = $_SESSION['user_id'];
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

    <!-- Tours Section -->
    <section id="tours" class="container py-5">
        <div class="text-center mb-5 mt-5">
            <p>Featured tours</p>
            <h3>Most Popular Tours</h3>
        </div>
        <div class="row g-4">
            <?php
            include '../includes/db.php';
            $sql = "SELECT * FROM packages";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3" data-aos="zoom-in">
                    <div class="card h-100 position-relative">
                        <span class="price-badge">Rs <?php echo htmlspecialchars($row['price']); ?></span>
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['location']); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small><i class="far fa-clock"></i> <?php echo htmlspecialchars($row['duration']); ?></small>
                                <a href="package-details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Book <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            else:
            ?>
                <div class="col-12">
                    <p class="text-center">No packages found.</p>
                </div>
            <?php
            endif;

            // Close connection
            mysqli_close($conn);
            ?>
    </section>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>
</body>
</html>
