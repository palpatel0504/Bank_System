<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History | Treasury Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .history-card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            background: white;
            padding: 30px;
        }
        .table thead th {
            background-color: #4e73df;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.1);
        }
        .badge-sent {
            background-color: #e74a3b;
            color: white;
        }
        .badge-received {
            background-color: #1cc88a;
            color: white;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="history-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-history me-2"></i>Transaction History</h2>
                <a href="transfermoney.php" class="btn btn-primary">
                    <i class="fas fa-exchange-alt me-1"></i> New Transfer
                </a>
            </div>
            
            <div class="table-responsive">
                <table id="transactionsTable" class="table table-hover table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                        $sql = "SELECT * FROM transaction ORDER BY datetime DESC";
                        $result = mysqli_query($connection, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>'.$row['sno'].'</td>
                                    <td>'.$row['sender'].'</td>
                                    <td>'.$row['receiver'].'</td>
                                    <td>$'.number_format($row['balance'], 2).'</td>
                                    <td>'.date('M j, Y g:i A', strtotime($row['datetime'])).'</td>
                                    <td><span class="badge rounded-pill bg-success">Completed</span></td>
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
            $('#transactionsTable').DataTable({
                responsive: true,
                order: [[0, 'desc']],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search transactions...",
                }
            });
        });
    </script>
</body>
</html>