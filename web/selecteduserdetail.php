<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = floatval($_POST['amount']);

    // Get sender details
    $sql = "SELECT * FROM user WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $from);
    mysqli_stmt_execute($stmt);
    $sender_result = mysqli_stmt_get_result($stmt);
    $sender = mysqli_fetch_assoc($sender_result);
    mysqli_stmt_close($stmt);

    // Get receiver details
    $sql = "SELECT * FROM user WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $to);
    mysqli_stmt_execute($stmt);
    $receiver_result = mysqli_stmt_get_result($stmt);
    $receiver = mysqli_fetch_assoc($receiver_result);
    mysqli_stmt_close($stmt);

    // Validation
    if ($amount <= 0) {
        echo '<div class="alert alert-danger">Amount must be positive</div>';
    } elseif ($amount > $sender['balance']) {
        echo '<div class="alert alert-danger">Insufficient balance</div>';
    } else {
        // Begin transaction
        mysqli_begin_transaction($connection);
        
        try {
            // Deduct from sender
            $new_sender_balance = $sender['balance'] - $amount;
            $sql = "UPDATE user SET balance=? WHERE id=?";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "di", $new_sender_balance, $from);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            // Add to receiver
            $new_receiver_balance = $receiver['balance'] + $amount;
            $sql = "UPDATE user SET balance=? WHERE id=?";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "di", $new_receiver_balance, $to);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            // Record transaction
            $sql = "INSERT INTO transaction(sender, receiver, balance) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "ssd", $sender['name'], $receiver['name'], $amount);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            // Commit transaction
            mysqli_commit($connection);
            
            echo '<div class="alert alert-success alert-dismissible fade show">
                    Transaction successful!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
            echo '<script>setTimeout(function(){ window.location="transactionhistory.php"; }, 1500);</script>';
        } catch (Exception $e) {
            mysqli_rollback($connection);
            echo '<div class="alert alert-danger">Transaction failed: '.$e->getMessage().'</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <title>Transfer Money | Treasury Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .transfer-card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            background: white;
        }
        .user-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 10px;
            padding: 20px;
        }
        .form-select, .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }
        .btn-transfer {
            background-color: #4e73df;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-transfer:hover {
            background-color: #2e59d9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="transfer-card p-4 p-md-5">
                    <h2 class="text-center mb-4"><i class="fas fa-exchange-alt me-2"></i>Transfer Money</h2>
                    
                    <?php
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM user WHERE id=?";
                    $stmt = mysqli_prepare($connection, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $sid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $user = mysqli_fetch_assoc($result);
                    mysqli_stmt_close($stmt);
                    ?>
                    
                    <div class="user-info mb-5">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5>Sender Details</h5>
                                <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Account Balance</h5>
                                <p class="display-6 text-primary">$<?php echo number_format($user['balance'], 2); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <form method="post" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="to" class="form-label">Transfer To</label>
                            <select class="form-select form-select-lg" id="to" name="to" required>
                                <option value="" disabled selected>Select Recipient</option>
                                <?php
                                $sql = "SELECT * FROM user WHERE id != ?";
                                $stmt = mysqli_prepare($connection, $sql);
                                mysqli_stmt_bind_param($stmt, "i", $sid);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].' (Balance: $'.number_format($row['balance'], 2).')</option>';
                                }
                                mysqli_stmt_close($stmt);
                                ?>
                            </select>
                            <div class="invalid-feedback">Please select a recipient</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="amount" class="form-label">Amount ($)</label>
                            <input type="number" step="0.01" class="form-control form-control-lg" id="amount" name="amount" required>
                            <div class="invalid-feedback">Please enter a valid amount</div>
                        </div>
                        
                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-transfer btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Transfer Money
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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