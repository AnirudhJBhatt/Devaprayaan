<?php
    include '../includes/db.php'; // DB connection
    session_start();
    if($_SESSION['Role'] != 'Admin'){ 
        header("Location: ../login.php"); 
        exit(); 
    }

    // Fetch all bookings grouped by booking_ref
    $query = "
        SELECT b.booking_ref, b.package_id, p.title AS package_title, b.user_id,
            COUNT(b.id) AS passenger_count
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        GROUP BY b.booking_ref
    ";
    $result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking History - Devaprayaan Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .card { border-radius: 12px; }
        .table thead th { background-color: #0d6efd; color: white; }
        .btn-receipt { font-size: 0.9rem; }
    </style>
</head>
<body>
<?php include '../includes/admin-header.php'; ?>

<section class="container my-5 py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Booking History</h2>
        <p class="text-muted">Review your past bookings and view receipts.</p>
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Booking Ref</th>
                            <th>Package</th>
                            <!-- <th>Date</th> -->
                            <th>Passengers</th>
                            <th>Total Fare</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 0;
                        $fare_per_passenger = 3500;
                        while ($row = mysqli_fetch_assoc($result)): 
                            $i++;
                            $booking_ref = $row['booking_ref'];
                            $passenger_count = $row['passenger_count'];
                            $total_fare = $passenger_count * $fare_per_passenger;

                            // Fetch passenger names
                            $passengers_sql = "SELECT passenger_name FROM bookings WHERE booking_ref='$booking_ref'";
                            $passengers_result = mysqli_query($conn, $passengers_sql);
                            $passenger_names = [];
                            while($p = mysqli_fetch_assoc($passengers_result)){
                                $passenger_names[] = $p['passenger_name'];
                            }
                            $passenger_summary = implode(', ', $passenger_names);
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($booking_ref); ?></td>
                            <td><?php echo htmlspecialchars($row['package_title']); ?></td>
                            <!-- <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td> -->
                            <td><?php echo $passenger_count . " (" . htmlspecialchars($passenger_summary) . ")"; ?></td>
                            <td class="text-success">₹<?php echo $total_fare; ?></td>
                            <td>
                                <a href="receipt.php?booking_ref=<?php echo $booking_ref; ?>" class="btn btn-sm btn-success">
                                    View Receipt
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($i == 0): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No bookings found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
