<?php
    include '../includes/db.php'; // DB connection
    session_start();
    if($_SESSION['Role'] != 'Admin'){ 
        header("Location: ../login.php"); 
        exit(); 
    }

    $booking_ref = $_GET['booking_ref'] ?? null;

    if(!$booking_ref) die("Invalid Booking Request.");

    // Fetch all passengers for this booking reference
    $sql = "SELECT b.*, p.title, p.location, p.duration, p.price, u.name, u.email
            FROM bookings b
            JOIN packages p ON b.package_id = p.id
            JOIN users u ON b.user_id = u.user_id
            WHERE b.booking_ref = '$booking_ref'";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    $passengers = [];
    while($row = mysqli_fetch_assoc($result)) {
        $passengers[] = $row;
    }

    if(count($passengers) == 0) die("Booking not found.");

    // Package and customer details (same for all passengers)
    $package = $passengers[0];
    $fare_per_passenger = 3500;
    $total_amount = count($passengers) * $fare_per_passenger;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Receipt - Devaprayaan Tours</title>
    <style>
        body { background: #f8f9fa; }
        .receipt-card { border-radius: 12px; }
        .receipt-header { background: #0d6efd; color: white; border-top-left-radius: 12px; border-top-right-radius: 12px; }
        .receipt-footer { font-size: 0.9rem; color: #6c757d; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<?php include '../includes/user-header.php'; ?>

<div class="container my-5">
    <div class="card shadow receipt-card">
        <div class="card-header text-center receipt-header py-4">
            <h2 class="mb-0">Booking Receipt</h2>
            <p class="mb-0">Devaprayaan Tours</p>
        </div>
        <div class="card-body p-4">
            <!-- Customer Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($package['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($package['email']); ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Booking Details</h5>
                    <p><strong>Booking Reference:</strong> <?php echo htmlspecialchars($booking_ref); ?></p>
                    <p><strong>Booking Date:</strong> <?php echo date("d M Y, h:i A", strtotime($package['booked_at'])); ?></p>
                    <p><strong>Passengers:</strong> <?php echo count($passengers); ?></p>
                </div>
            </div>

            <!-- Package Info -->
            <h5 class="mb-3">Package Information</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Package Name</th>
                    <td><?php echo htmlspecialchars($package['title']); ?></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><?php echo htmlspecialchars($package['location']); ?></td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td><?php echo htmlspecialchars($package['duration']); ?></td>
                </tr>
            </table>

            <!-- Passenger Info -->
            <h5 class="mb-3">Passenger Details</h5>
            <div class="table-responsive">
            <table class="table table-striped">
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
                <?php foreach($passengers as $i => $p): ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo htmlspecialchars($p['passenger_name']); ?></td>
                        <td><?php echo htmlspecialchars($p['age']); ?></td>
                        <td><?php echo htmlspecialchars($p['gender']); ?></td>
                        <td><?php echo htmlspecialchars($p['phone']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>

            <!-- Fare Info -->
            <h5 class="mb-3">Fare Summary</h5>
            <div class="d-flex justify-content-between mb-2">
                <span>Fare per Passenger:</span>
                <span>₹<?php echo $fare_per_passenger; ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>GST:</span>
                <span>₹0</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total Amount:</span>
                <span class="text-success">₹<?php echo $total_amount; ?></span>
            </div>
        </div>
        <div class="card-footer text-center receipt-footer">
            <p>Thank you for booking with Devaprayaan Tours. We wish you a pleasant journey!</p>
        </div>
    </div>

    <!-- Print Button -->
    <div class="text-center mt-4 no-print">
        <button class="btn btn-outline-primary" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i> Back
        </button>
        <button class="btn btn-outline-primary" onclick="window.print()">
            <i class="fas fa-print"></i> Print Receipt
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a2d9d6ef63.js" crossorigin="anonymous"></script>
<?php include '../includes/footer.php'; ?>
</body>
</html>
