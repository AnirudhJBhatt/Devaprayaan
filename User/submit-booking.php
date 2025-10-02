<?php
    session_start();
    if(!isset($_SESSION['User_ID'])){ 
        header("Location: login.php"); exit(); 
    }
    $User_ID = $_SESSION['User_ID'] ?? null;
    include '../includes/db.php';

    $names = $ages = $genders = $phones = [];
    $package_id = 1;
    $fare_per_passenger = 3500;
    $total_amount = 0;
    $saved = false;
    $package = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $package_id = $_POST['package_id'] ?? '';
        $names = $_POST['name'] ?? [];
        $ages = $_POST['age'] ?? [];
        $genders = $_POST['gender'] ?? [];
        $phones = $_POST['phone'] ?? [];

        $total_amount = count($names) * $fare_per_passenger;

        // Fetch package details
        if (!empty($package_id)) {
            $pkg_sql = "SELECT * FROM packages WHERE id = '$package_id' LIMIT 1";
            $pkg_result = mysqli_query($conn, $pkg_sql);
            if ($pkg_result && mysqli_num_rows($pkg_result) > 0) {
                $package = mysqli_fetch_assoc($pkg_result);
            }
        }

        if (isset($_POST['proceed_to_pay'])) {
            // Generate booking reference in format BK_DDMMYYXX where XX is a serial no for the day
            $today = date('dmy');
            $prefix = "BK_{$today}";
            // Get the max serial for today
            $result = mysqli_query($conn, "SELECT booking_ref FROM bookings WHERE booking_ref LIKE '{$prefix}%' ORDER BY booking_ref DESC LIMIT 1");
            $serial = 1;
            if ($row = mysqli_fetch_assoc($result)) {
                $last_ref = $row['booking_ref'];
                $last_serial = intval(substr($last_ref, -2));
                $serial = $last_serial + 1;
            }
            $booking_ref = $prefix . str_pad($serial, 2, '0', STR_PAD_LEFT);
            foreach ($names as $i => $name) {
                $n = mysqli_real_escape_string($conn, $name);
                $a = mysqli_real_escape_string($conn, $ages[$i]);
                $g = mysqli_real_escape_string($conn, $genders[$i]);
                $p = mysqli_real_escape_string($conn, $phones[$i]);

                $sql = "INSERT INTO bookings (booking_ref, package_id, user_id, passenger_name, age, gender, phone)
                        VALUES ('$booking_ref', '$package_id', '$User_ID', '$n', '$a', '$g', '$p')";
                mysqli_query($conn, $sql);
            }
            header("Location: receipt.php?booking_ref=" . $booking_ref);
            exit();
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Summary - Devaprayaan Tours</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2d9d6ef63.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include '../includes/user-header.php'; ?>

<section class="container mt-5 py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Booking Summary</h2>
        <p class="text-muted">Review package details, passenger details, and total fare before proceeding to payment.</p>
    </div>

    <div class="row g-4">
        <!-- Package Details Card -->
        <?php if ($package): ?>
        <div class="col-md-6">
            <div class="card h-100 shadow">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-box-open"></i> Package Details
                </div>
                <div class="card-body">
                    <p><strong>Package Name:</strong> <?php echo htmlspecialchars($package['title']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($package['location']); ?></p>
                    <p><strong>Duration:</strong> <?php echo htmlspecialchars($package['duration']); ?></p>
                    <p><strong>Base Price:</strong> <i class="fas fa-indian-rupee-sign"></i> <?php echo htmlspecialchars($package['price']); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Passenger Details Card -->
        <div class="col-md-6">
            <div class="card h-100 shadow">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-users"></i> Passenger Details
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($names as $i => $name): ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo htmlspecialchars($name); ?></td>
                                        <td><?php echo htmlspecialchars($ages[$i]); ?></td>
                                        <td><?php echo htmlspecialchars($genders[$i]); ?></td>
                                        <td><?php echo htmlspecialchars($phones[$i]); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->

    <!-- Fare Summary Card -->
    <form action="" method="POST" class="mt-4"> 
        <input type="hidden" name="package_id" value="<?php echo htmlspecialchars($package_id); ?>">

        <?php foreach ($names as $i => $name): ?>
            <input type="hidden" name="name[]" value="<?php echo htmlspecialchars($name); ?>">
            <input type="hidden" name="age[]" value="<?php echo htmlspecialchars($ages[$i]); ?>">
            <input type="hidden" name="gender[]" value="<?php echo htmlspecialchars($genders[$i]); ?>">
            <input type="hidden" name="phone[]" value="<?php echo htmlspecialchars($phones[$i]); ?>">
        <?php endforeach; ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <i class="fas fa-receipt"></i> Fare Summary
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Number of Passengers:</span>
                            <span><?php echo count($names); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Fare per Passenger:</span>
                            <span><i class="fas fa-indian-rupee-sign"></i> <?php echo $fare_per_passenger; ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>GST:</span>
                            <span><i class="fas fa-indian-rupee-sign"></i> 0</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-2">
                            <span>Total Fare:</span>
                            <span class="text-success"><i class="fas fa-indian-rupee-sign"></i> <?php echo $total_amount; ?></span>
                        </div>
                        <?php if(count($names) > 3): ?>
                            <div class="alert alert-info py-1 text-center mb-0" style="font-size:0.9rem;">
                                <i class="fas fa-gift"></i> Group booking offer may apply! Contact us for discounts.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success btn-lg w-100" name="proceed_to_pay">
                            <i class="fas fa-credit-card"></i> Proceed to Pay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    <!-- Booking Confirmation Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-check-circle"></i> Booking Confirmed</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="fs-5">Your booking has been successfully confirmed!</p>
                    <p>Total Fare: <strong class="text-success"><i class="fas fa-indian-rupee-sign"></i> <?php echo $total_amount; ?></strong></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($saved): ?>
<script>
    window.onload = function() {
        var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
        bookingModal.show();
    }
</script>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>
</body>
</html>
