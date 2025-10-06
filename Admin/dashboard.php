<?php
    include '../includes/db.php'; // DB connection
    session_start();
    if($_SESSION['Role'] != 'Admin'){ 
        header("Location: ../login.php"); exit(); 
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel - Packages</title>
</head>

<body>

    <!-- Header -->
    <?php include '../includes/admin-header.php'; ?>

    <section class="container my-5 py-5">

        <!-- Dashboard Stats -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow stats-card">
                    <div class="card-body">
                        <h6 class="text-muted">Total Packages</h6>
                        <h3>120</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow stats-card">
                    <div class="card-body">
                        <h6 class="text-muted">Total Bookings</h6>
                        <h3>540</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow stats-card">
                    <div class="card-body">
                        <h6 class="text-muted">Revenue</h6>
                        <h3>₹2.5M</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow stats-card">
                    <div class="card-body">
                        <h6 class="text-muted">Users</h6>
                        <h3>850</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example Table -->
        <div class="card shadow mb-4">
            <div class="card-header bg-white fw-bold">Recent Transactions</div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rahul Sharma</td>
                            <td>Kedarnath Yatra</td>
                            <td>₹15,000</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>01 Sep 2025</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Priya Singh</td>
                            <td>Badrinath Yatra</td>
                            <td>₹12,500</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>30 Aug 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>