<?php
session_start();
if(!isset($_SESSION['User_ID'])){ 
    header("Location: login.php"); 
    exit(); 
}
$User_ID = $_SESSION['User_ID'];
include '../includes/db.php';

// Fetch all transactions of this user, including package info
$query = "
    SELECT t.*, b.package_id, p.title AS package_title
    FROM transactions t
    LEFT JOIN bookings b ON t.booking_ref = b.booking_ref
    LEFT JOIN packages p ON b.package_id = p.id
    WHERE t.user_id = '$User_ID'
    GROUP BY t.id
    ORDER BY t.transaction_date DESC
";
$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Transaction History - Devaprayaan Tours</title>
    <style>
        body { background: #f8f9fa; }
        .card { border-radius: 12px; }
        .table thead th { background-color: #0d6efd; color: white; }
        .btn-receipt { font-size: 0.85rem; }
    </style>
</head>
<body>
<?php include '../includes/user-header.php'; ?>

<section class="container my-5 py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Transaction History</h2>
        <p class="text-muted">View all your payments and transactions.</p>
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
                            <th>Amount (₹)</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)):
                            $i++;
                            $status_class = $row['status'] == 'Completed' ? 'text-success' : ($row['status'] == 'Pending' ? 'text-warning' : 'text-danger');
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($row['booking_ref']); ?></td>
                            <td><?php echo htmlspecialchars($row['package_title'] ?? 'N/A'); ?></td>
                            <td class="text-success"><?php echo number_format($row['amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                            <td><span class="<?php echo $status_class; ?>"><?php echo $row['status']; ?></span></td>
                            <td><?php echo date("d M Y, h:i A", strtotime($row['transaction_date'])); ?></td>
                            <td>
                                <?php if($row['status'] == 'Completed'): ?>
                                <a href="receipt.php?booking_ref=<?php echo htmlspecialchars($row['booking_ref']); ?>" 
                                   class="btn btn-sm btn-success">View Receipt</a>
                                <?php else: ?>
                                <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($i == 0): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">No transactions found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include '../includes/footer.php'; ?>
</body>
</html>
