<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasury Bank Financial</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            padding: 5rem 0;
            border-radius: 0 0 20px 20px;
        }
        .feature-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #4e73df;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .bank-logo {
            height: 60px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <img src="logo.jpg" alt="Treasury Bank" class="bank-logo">
            <h1 class="display-4 fw-bold mb-4">Welcome to Treasury Bank</h1>
            <p class="lead mb-5">Secure, reliable, and convenient banking solutions for everyone</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Create User -->
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="feature-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Create User</h3>
                        <p class="text-muted">Set up new customer accounts with ease</p>
                        <a href="createuser.php" class="btn btn-primary mt-3">Get Started</a>
                    </div>
                </div>
                
                <!-- Transfer Money -->
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="feature-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Transfer Money</h3>
                        <p class="text-muted">Fast and secure money transfers between accounts</p>
                        <a href="transfermoney.php" class="btn btn-primary mt-3">Make Transfer</a>
                    </div>
                </div>
                
                <!-- Transaction History -->
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center">
                        <div class="feature-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3>Transaction History</h3>
                        <p class="text-muted">View complete transaction records</p>
                        <a href="transactionhistory.php" class="btn btn-primary mt-3">View History</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© <?php echo date('Y'); ?> Treasury Bank Financial. All rights reserved.</p>
            <p class="text-muted small mb-0">Made by Jenish, Pal, Riya </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>