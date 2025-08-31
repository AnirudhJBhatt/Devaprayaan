<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'] ?? '';
    $names = $_POST['name'] ?? [];
    $ages = $_POST['age'] ?? [];
    $genders = $_POST['gender'] ?? [];
    $phones = $_POST['phone'] ?? [];
    $saved = false;

    $fare_per_passenger = 3500;
    $total_amount = count($names) * $fare_per_passenger;

    if (isset($_POST['proceed_to_pay'])) {
        foreach ($names as $i => $name) {
            $n = mysqli_real_escape_string($conn, $name);
            $a = mysqli_real_escape_string($conn, $ages[$i]);
            $g = mysqli_real_escape_string($conn, $genders[$i]);
            $p = mysqli_real_escape_string($conn, $phones[$i]);

            $sql = "INSERT INTO bookings (package_id, passenger_name, age, gender, phone)
                    VALUES ('$package_id', '$n', '$a', '$g', '$p')";
            mysqli_query($conn, $sql);
        }
        $saved = true;
    }

} else {
    echo "Invalid request!";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Summary - Devaprayaan Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<?php include 'includes/header.php'; ?>

<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Booking Summary</h2>
        <p class="text-muted">Review passenger details and total fare before proceeding to payment.</p>
    </div>

    <!-- Passenger Details Card -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-users"></i> Passenger Details
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
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

   <!-- Fare Summary Card -->
    <div class="card shadow mb-4" style="max-width: 500px; margin:auto;">
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
                <span><i class="fas fa-indian-rupee-sign"></i> <?php echo $fare_per_passenger; ?></span>
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
            <button type="submit" name="proceed_to_pay" class="btn btn-success btn-lg w-100">
                <i class="fas fa-credit-card"></i> Proceed to Pay
            </button>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
