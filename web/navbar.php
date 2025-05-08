<?php include 'config.php'; ?>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
            <i class="fas fa-university me-2"></i>
            Treasury Bank
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createuser.php"><i class="fas fa-user-plus me-1"></i> Create User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transfermoney.php"><i class="fas fa-exchange-alt me-1"></i> Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactionhistory.php"><i class="fas fa-history me-1"></i> History</a>
                </li>
            </ul>
        </div>
    </div>
</nav>