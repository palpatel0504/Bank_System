<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money | Treasury Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .users-card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            background: white;
            padding: 30px;
        }
        .table thead th {
            background-color: #4e73df;
            color: white;
        }
        .btn-action {
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
        .balance-badge {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="users-card">
            <h2 class="mb-4"><i class="fas fa-users me-2"></i>Customer Accounts</h2>
            <p class="text-muted mb-4">Select a customer to initiate a transfer</p>
            
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($connection, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td><span class="balance-badge bg-light text-dark">$'.number_format($row['balance'], 2).'</span></td>
                                    <td>
                                        <a href="selecteduserdetail.php?id='.$row['id'].'" class="btn btn-action btn-primary">
                                            <i class="fas fa-exchange-alt me-1"></i> Transfer
                                        </a>
                                    </td>
                                  </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search customers...",
                }
            });
        });
    </script>
</body>
</html>