<?php
    include '../includes/db.php'; 
    session_start();
    if($_SESSION['Role'] != 'Admin'){ 
        header("Location: ../login.php"); 
        exit(); 
    }

    // Handle delete user
    if (isset($_GET['delete'])) {
        $id = (int) $_GET['delete'];
        $sql = "DELETE FROM users WHERE User_ID = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('User deleted successfully');
                    window.location.href = 'manage-users.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting user: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-users.php';
                  </script>";
        }
        exit();
    }

    // Handle add user
    if (isset($_POST['add_user'])) {
        $name     = mysqli_real_escape_string($conn, $_POST['name']);
        $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
        $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure password hash

        $sql = "INSERT INTO users (name, gender, phone, email, password) 
                VALUES ('$name', '$gender', '$phone', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('User added successfully');
                    window.location.href = 'manage-users.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error adding user: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-users.php';
                  </script>";
        }
        exit();
    }

    // Handle edit user
    if (isset($_POST['edit_user'])) {
        $id       = (int) $_POST['edit_id'];
        $name     = mysqli_real_escape_string($conn, $_POST['name']);
        $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
        $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $_POST['current_password'];

        $sql = "UPDATE users 
                SET name='$name', gender='$gender', phone='$phone', email='$email', password='$password' 
                WHERE User_ID=$id";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('User updated successfully');
                    window.location.href = 'manage-users.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating user: " . mysqli_error($conn) . "');
                    window.location.href = 'manage-users.php';
                  </script>";
        }
        exit();
    }

    // Fetch users
    $sql = "SELECT * FROM users";
    $users = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel - Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 0.5rem; }
        .card-header { background-color: #007bff; color: #fff; font-weight: 500; }
        .btn-space { margin-right: 5px; }
        .form-label { font-weight: 500; }
    </style>
</head>

<body>

    <?php include '../includes/admin-header.php'; ?>

    <div class="container mt-5 py-5">

        <!-- Add New User -->
        <div class="card mb-5 shadow-sm">
            <div class="card-header">
                <h4><i class="fas fa-user-plus me-2"></i>Add New User</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender</label><br>
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Female" required class="ms-3"> Female
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="add_user" class="btn btn-success mt-3">
                                <i class="fas fa-save me-2"></i>Add User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4><i class="fas fa-users me-2"></i>All Users</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($users)): $i=1?>
                        <tr>
                            <td><?= $row['User_ID'] ?></td>
                            <td><?= htmlspecialchars($row['Name']) ?></td>
                            <td><?= htmlspecialchars($row['Gender']) ?></td>
                            <td><?= htmlspecialchars($row['Phone']) ?></td>
                            <td><?= htmlspecialchars($row['Email']) ?></td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-warning btn-space" data-bs-toggle="modal"
                                    data-bs-target="#editModal<?= $row['User_ID'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $row['User_ID'] ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <form method="POST" action="manage-users.php">
                                            <input type="hidden" name="edit_id" value="<?= $row['User_ID'] ?>">
                                            <input type="hidden" name="current_password" value="<?= $row['password'] ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="<?= htmlspecialchars($row['Name']) ?>" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Gender</label><br>
                                                            <input type="radio" name="gender" value="Male" <?= $row['Gender']=='Male'?'checked':'' ?>> Male
                                                            <input type="radio" name="gender" value="Female" <?= $row['Gender']=='Female'?'checked':'' ?> class="ms-3"> Female
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Phone</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                value="<?= htmlspecialchars($row['Phone']) ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="<?= htmlspecialchars($row['Email']) ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Password (leave blank to keep same)</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="edit_user" class="btn btn-primary">
                                                        <i class="fas fa-save me-2"></i>Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Delete -->
                                <a href="manage-users.php?delete=<?= $row['User_ID'] ?>" class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Delete this user?')">
                                   <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($users->num_rows == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No users found.</td>
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
