<?php
    include '../includes/db.php'; 

    // Handle delete
    if (isset($_GET['delete'])) {
        $id = (int) $_GET['delete'];
        $sql = "DELETE FROM packages WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Package deleted successfully');
                    window.location.href = 'manage-packages.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting package: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-packages.php';
                  </script>";
        }
        exit();
    }

    // Handle add package
    if (isset($_POST['add_package'])) {
        $title       = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price       = mysqli_real_escape_string($conn, $_POST['price']);
        $duration    = mysqli_real_escape_string($conn, $_POST['duration']);
        $location    = mysqli_real_escape_string($conn, $_POST['location']);

        // Image upload
        // $image = '';
        // if (!empty($_FILES['image']['name'])) {
        //     $image = time() . '_' . basename($_FILES['image']['name']); // unique filename
        //     $tmp_name = $_FILES['image']['tmp_name'];
        //     move_uploaded_file($tmp_name, "uploads/$image");
        // }

        $sql = "INSERT INTO packages (title, description, price, duration, location) 
                VALUES ('$title', '$description', '$price', '$duration', '$location')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Package added successfully');
                    window.location.href = 'manage-packages.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error adding package: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-packages.php';
                  </script>";
        }
        exit();
    }

    // Handle edit package
    if (isset($_POST['edit_package'])) {
        $id          = (int) $_POST['edit_id'];
        $title       = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price       = mysqli_real_escape_string($conn, $_POST['price']);
        $duration    = mysqli_real_escape_string($conn, $_POST['duration']);
        $location    = mysqli_real_escape_string($conn, $_POST['location']);
        // $current_img = $_POST['current_image'] ?? '';

        // Image upload (keep old if none uploaded)
        // $image = $current_img;
        // if (!empty($_FILES['image']['name'])) {
        //     $image = time() . '_' . basename($_FILES['image']['name']);
        //     $tmp_name = $_FILES['image']['tmp_name'];
        //     move_uploaded_file($tmp_name, "uploads/$image");
        // }

        $sql = "UPDATE packages SET title='$title', description='$description', price='$price', duration='$duration', 
                    location='$location' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Package updated successfully');
                    window.location.href = 'manage-packages.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating package: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-packages.php';
                  </script>";
        }
        exit();
    }

    // Fetch packages
    $sql = "SELECT * FROM packages";
    $packages = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel - Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
        }

        .table img {
            border-radius: 8px;
        }

        .btn-space {
            margin-right: 5px;
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php include '../includes/admin-header.php'; ?>

    <div class="container mt-5 py-5">

        <!-- Add New Package Card -->
        <div class="card mb-5 shadow-sm">
            <div class="card-header">
                <h4><i class="fas fa-plus-circle me-2"></i>Add New Package</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter package title"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="e.g., 5 Days" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter location"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Write a short description" required></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="add_package" class="btn btn-success mt-3">
                                <i class="fas fa-save me-2"></i>Add Package
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- All Packages Table -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4><i class="fas fa-boxes me-2"></i>All Packages</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($packages)): ?>
                        <tr>
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <?= $row['title'] ?>
                            </td>
                            <td>Rs
                                <?= $row['price'] ?>
                            </td>
                            <td>
                                <?= $row['duration'] ?>
                            </td>
                            <td>
                                <?= $row['location'] ?>
                            </td>
                            <td>
                                <!-- Edit Button triggers modal -->
                                <button class="btn btn-sm btn-warning btn-space" data-bs-toggle="modal"
                                    data-bs-target="#editModal<?= $row['id'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel<?= $row['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form method="POST" enctype="multipart/form-data" action="manage-packages.php">
                                            <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $row['id'] ?>"><i
                                                            class="fas fa-edit me-2"></i>Edit Package</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" name="title" class="form-control"
                                                                value="<?= htmlspecialchars($row['title']) ?>" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Price ($)</label>
                                                            <input type="number" step="0.01" name="price"
                                                                class="form-control"
                                                                value="<?= htmlspecialchars($row['price']) ?>" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Duration</label>
                                                            <input type="text" name="duration" class="form-control"
                                                                value="<?= htmlspecialchars($row['duration']) ?>"
                                                                required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Location</label>
                                                            <input type="text" name="location" class="form-control"
                                                                value="<?= htmlspecialchars($row['location']) ?>"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Image</label>
                                                            <input type="file" name="image" class="form-control">
                                                            <?php if (!empty($row['images'])): ?>
                                                            <img src="uploads/<?= htmlspecialchars($row['images']) ?>"
                                                                alt="Current Image" class="img-thumbnail mt-2"
                                                                style="max-width:100px;">
                                                            <input type="hidden" name="current_image"
                                                                value="<?= htmlspecialchars($row['images']) ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="edit_package" class="btn btn-primary"><i
                                                            class="fas fa-save me-2"></i>Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <a href="manage-packages.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this package?')"><i class="fas fa-trash-alt"></i>
                                    Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($packages->num_rows == 0): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No packages found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>