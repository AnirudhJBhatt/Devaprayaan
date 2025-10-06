<?php
session_start();
// if(!isset($_SESSION['User_ID'])){
//     header("Location: login.php");
//     exit();
// }

include '../includes/db.php'; // Database connection

$generated = false;
$passengers = [];
$total_amount = 0;
$fare_per_passenger = 3500;
$booking_ref = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $User_ID = $_SESSION['User_ID'];

    // Collect form data
    $customer_name = $_POST['customer_name'] ?? '';
    $customer_email = $_POST['customer_email'] ?? '';
    $booking_ref = $_POST['booking_ref'] ?? uniqid('BK'); // auto generate if blank
    $booking_date = $_POST['booking_date'] ?? date('Y-m-d H:i:s');

    $package_title = $_POST['package_title'] ?? '';
    $package_location = $_POST['package_location'] ?? '';
    $package_duration = $_POST['package_duration'] ?? '';

    // Passenger details arrays
    $passenger_names = $_POST['passenger_name'] ?? [];
    $passenger_ages = $_POST['age'] ?? [];
    $passenger_genders = $_POST['gender'] ?? [];
    $passenger_phones = $_POST['phone'] ?? [];

    // Save package into `packages` table
    $stmt = $conn->prepare("INSERT INTO packages (title, location, duration, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $package_title, $package_location, $package_duration, $fare_per_passenger);
    $stmt->execute();
    $package_id = $stmt->insert_id;
    $stmt->close();

    // Save booking in `bookings` table
    foreach($passenger_names as $i => $name){
        if(trim($name) === '') continue;

        $stmt = $conn->prepare("INSERT INTO bookings (booking_ref, user_id, package_id, passenger_name, age, gender, phone, booked_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siississ", $booking_ref, $User_ID, $package_id, $name, $passenger_ages[$i], $passenger_genders[$i], $passenger_phones[$i], $booking_date);
        $stmt->execute();
        $stmt->close();

        $passengers[] = [
            'passenger_name' => htmlspecialchars($name),
            'age' => htmlspecialchars($passenger_ages[$i]),
            'gender' => htmlspecialchars($passenger_genders[$i]),
            'phone' => htmlspecialchars($passenger_phones[$i])
        ];
    }

    $total_amount = count($passengers) * $fare_per_passenger;
    $generated = true;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manual Receipt Generator - Devaprayaan Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .receipt-card { border-radius: 12px; margin-top: 20px; }
        .receipt-header { background: #0d6efd; color: white; border-top-left-radius: 12px; border-top-right-radius: 12px; }
        .receipt-footer { font-size: 0.9rem; color: #6c757d; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
<div class="container my-5">

    <h2 class="mb-4">Manual Receipt Generator</h2>

    <form method="POST" class="mb-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Customer Email</label>
                <input type="email" class="form-control" name="customer_email" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Booking Reference</label>
                <input type="text" class="form-control" name="booking_ref" placeholder="Leave blank to auto-generate">
            </div>
            <div class="col-md-6">
                <label class="form-label">Booking Date</label>
                <input type="datetime-local" class="form-control" name="booking_date" value="<?= date('Y-m-d\TH:i') ?>">
            </div>
        </div>

        <h5 class="mb-3">Package Information</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Package Title</label>
                <input type="text" class="form-control" name="package_title" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="package_location" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Duration</label>
                <input type="text" class="form-control" name="package_duration" required>
            </div>
        </div>

        <h5 class="mb-3">Passenger Details</h5>
        <div id="passenger-container">
            <div class="row mb-2 passenger-row">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="passenger_name[]" placeholder="Name" required>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="age[]" placeholder="Age" required>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="gender[]" required>
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="phone[]" placeholder="Phone" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-passenger">Remove</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-passenger">Add Passenger</button>
        <br>
        <button type="submit" class="btn btn-primary">Generate & Save Receipt</button>
    </form>

    <?php if($generated && count($passengers) > 0): ?>
    <div class="card shadow receipt-card">
        <div class="card-header text-center receipt-header py-4">
            <h2 class="mb-0">Booking Receipt</h2>
            <p class="mb-0">Devaprayaan Tours</p>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> <?= htmlspecialchars($customer_name) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($customer_email) ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Booking Details</h5>
                    <p><strong>Booking Reference:</strong> <?= htmlspecialchars($booking_ref) ?></p>
                    <p><strong>Booking Date:</strong> <?= date("d M Y, h:i A", strtotime($booking_date)) ?></p>
                    <p><strong>Passengers:</strong> <?= count($passengers) ?></p>
                </div>
            </div>

            <h5 class="mb-3">Package Information</h5>
            <table class="table table-bordered">
                <tr><th>Package Name</th><td><?= htmlspecialchars($package_title) ?></td></tr>
                <tr><th>Location</th><td><?= htmlspecialchars($package_location) ?></td></tr>
                <tr><th>Duration</th><td><?= htmlspecialchars($package_duration) ?></td></tr>
            </table>

            <h5 class="mb-3">Passenger Details</h5>
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>SL</th><th>Name</th><th>Age</th><th>Gender</th><th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($passengers as $i => $p): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $p['passenger_name'] ?></td>
                        <td><?= $p['age'] ?></td>
                        <td><?= $p['gender'] ?></td>
                        <td><?= $p['phone'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h5 class="mb-3">Fare Summary</h5>
            <div class="d-flex justify-content-between mb-2">
                <span>Fare per Passenger:</span><span>₹<?= $fare_per_passenger ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>GST:</span><span>₹0</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total Amount:</span><span class="text-success">₹<?= $total_amount ?></span>
            </div>
        </div>
        <div class="card-footer text-center receipt-footer">
            <p>Thank you for booking with Devaprayaan Tours. We wish you a pleasant journey!</p>
        </div>
    </div>
    <div class="text-center mt-4 no-print">
        <button class="btn btn-outline-primary" onclick="window.print()">Print Receipt</button>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('add-passenger').addEventListener('click', function(){
    let container = document.getElementById('passenger-container');
    let row = container.querySelector('.passenger-row').cloneNode(true);
    row.querySelectorAll('input').forEach(input => input.value = '');
    row.querySelector('select').value = '';
    container.appendChild(row);
});

document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove-passenger')){
        let row = e.target.closest('.passenger-row');
        let container = document.getElementById('passenger-container');
        if(container.children.length > 1){
            container.removeChild(row);
        }
    }
});
</script>
</body>
</html>
