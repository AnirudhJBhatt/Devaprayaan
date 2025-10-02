<?php
    session_start();
    if(!isset($_SESSION['User_ID'])){ 
        header("Location: ../index.php"); 
        exit(); 
    }

    $User_ID = $_SESSION['User_ID'];
    include '../includes/db.php';
    $query = "SELECT * FROM users WHERE User_ID = '$User_ID'";
    $run = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($run);

    if (isset($_POST['edit_profile'])) {
        $id       = (int) $_POST['edit_id'];
        $name     = mysqli_real_escape_string($conn, $_POST['name']);
        $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
        $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE users SET name='$name', gender='$gender', phone='$phone', email='$email', password='$password' 
                WHERE User_ID=$id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('User updated successfully');
                    window.location.href = 'user-profile.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating user: " . mysqli_error($conn) . "');
                    window.location.href = 'user-profile.php';
                  </script>";
        }
        exit();
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User Profile - Devaprayaan Tours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .card {
            border-radius: 12px;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .btn-edit {
            background-color: #0d6efd;
            color: #fff;
            border: none;
        }

        .btn-edit:hover {
            background-color: #0b5ed7;
        }

        .profile-row {
            margin-bottom: 10px;
        }

        .profile-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include '../includes/user-header.php'; ?>

    <main class="flex-grow-1">
        <div class="container mt-5 py-5">
            <div class="card shadow-lg border-0 rounded-3 p-4">
                <div class="card-body">
                    <!-- Profile Header -->
                    <h3 class="text-center mb-4 text-primary">
                        <i class="fas fa-user-circle me-2"></i> User Profile
                    </h3>

                    <!-- Profile Details -->
                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="fw-bold text-muted">Name:</span>
                        <span><?= htmlspecialchars($user['Name']); ?></span>
                    </div>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="fw-bold text-muted">Gender:</span>
                        <span><?= htmlspecialchars($user['Gender']); ?></span>
                    </div>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="fw-bold text-muted">Phone No:</span>
                        <span><?= htmlspecialchars($user['Phone']); ?></span>
                    </div>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="fw-bold text-muted">Email:</span>
                        <span><?= htmlspecialchars($user['Email']); ?></span>
                    </div>

                    <!-- Edit Button -->
                    <div class="text-center mt-4">
                        <button class="btn btn-warning px-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-2"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="">
                        <input type="hidden" name="edit_id" value="<?= $User_ID ?>">
                        <input type="hidden" name="current_password" value="<?= $user['password'] ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['Name']) ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label><br>
                                        <input type="radio" name="gender" value="Male" <?= $user['Gender']=='Male'?'checked':'' ?>> Male
                                        <input type="radio" name="gender" value="Female" <?= $user['Gender']=='Female'?'checked':'' ?> class="ms-3"> Female
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['Phone']) ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['Email']) ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control" value="<?= htmlspecialchars($user['Password']) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="edit_profile" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </main>

    <?php include '../includes/footer.php'; ?>
</body>

</html>