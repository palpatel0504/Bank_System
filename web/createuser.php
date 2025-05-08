<?php
include 'config.php'; // Include the connection to the database

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get user input and sanitize it
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $balance = floatval($_POST['balance']);
    
    // Validate email and balance
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Invalid email format</div>';
    } elseif ($balance < 0) {
        echo '<div class="alert alert-danger">Balance cannot be negative</div>';
    } else {
        // SQL query to insert user data into the database
        $sql = "INSERT INTO user (name, email, balance) VALUES ('$name', '$email', '$balance')";

        // Execute the query
        if (mysqli_query($connection, $sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show">
                    <strong>Success!</strong> User created successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
            echo '<script>setTimeout(function(){ window.location="transfermoney.php"; }, 1500);</script>';
        } else {
            echo '<div class="alert alert-danger">Error: '.mysqli_error($connection).'</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User | Treasury Bank</title>
    <!-- Modern Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .user-card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .user-card:hover {
            transform: translateY(-5px);
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .btn-bank {
            background-color: #4e73df;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-bank:hover {
            background-color: #2e59d9;
            color: white;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="user-card p-4 p-md-5 mb-5">
                    <h2 class="text-center mb-4">Create New User Account</h2>
                    
                    <form method="post" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                            <div class="invalid-feedback">Please enter the user's name</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                            <div class="invalid-feedback">Please enter a valid email</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="balance" class="form-label">Initial Balance ($)</label>
                            <input type="number" step="0.01" class="form-control form-control-lg" id="balance" name="balance" required>
                            <div class="invalid-feedback">Please enter a valid amount</div>
                        </div>
                        
                        <div class="d-grid gap-3 d-md-flex justify-content-md-center mt-5">
                            <button type="submit" name="submit" class="btn btn-bank btn-lg me-md-3">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-undo me-2"></i>Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
