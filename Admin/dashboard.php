<?php
include '../includes/db.php'; // DB connection

// Handle delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM packages WHERE id=$id");
    header('Location: admin_panel.php');
}

// Handle add package
if(isset($_POST['add_package'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $location = $_POST['location'];
    $highlights = $_POST['highlights'];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/$image");

    $conn->query("INSERT INTO packages (title, description, price, duration, location, images, highlights) VALUES ('$title','$description','$price','$duration','$location','$image','$highlights')");
    header('Location: admin_panel.php');
}

// Fetch packages
$packages = $conn->query("SELECT * FROM packages");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel - Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?php include '../includes/admin-header.php'; ?>

<div class="container py-5 mt-5">
    <h2 class="mb-4">Add New Package</h2>
    <form method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Highlights</label>
            <textarea name="highlights" class="form-control"></textarea>
        </div>
        <button type="submit" name="add_package" class="btn btn-primary">Add Package</button>
    </form>

    <h2 class="mb-4">All Packages</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Location</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $packages->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['title'] ?></td>
                <td>$<?= $row['price'] ?></td>
                <td><?= $row['duration'] ?></td>
                <td><?= $row['location'] ?></td>
                <td><img src="uploads/<?= $row['images'] ?>" width="80"></td>
                <td>
                    <a href="edit_package.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="admin_panel.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this package?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
