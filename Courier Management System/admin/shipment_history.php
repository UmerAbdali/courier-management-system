<?php
// Admin shipment history page (static demo content)
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Shipment History - Courier Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../includes/sidebar-shared.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{background:#f4f7fb;}
.navbar{background:#071c2d;}
.navbar-brand{color:#fff!important;font-weight:700;}
.navbar-nav .nav-link{color:#fff!important;}
.page-header{padding:80px 0 40px;text-align:center;color:#071c2d;}
.card{border:none;border-radius:16px;box-shadow:0 25px 50px rgba(0,0,0,0.08);}
.table thead{background:#e31e24;color:#fff;}
.table tbody tr:hover{background:rgba(227,30,36,0.08);}
.btn-primary{background:#e31e24;border-color:#e31e24;}
.btn-primary:hover{background:#c71a1f;border-color:#c71a1f;}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fa-solid fa-truck-fast text-danger"></i>
            Courier Management
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
       
    </div>
</nav>
<div class="admin-layout">
    <?php include '../includes/admin_sidebar.php'; 
    include("../includes/dbconnect.php"); 
    ?>
    <div class="admin-content">
        <section class="page-header">
    <div class="container">
        <h1>Shipment History</h1>
        <p class="lead">View courier movements, delivery status, and historical consignment details from the admin portal.</p>
    </div>
</section>
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Consignment ID</th>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Status</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ADM-9001</td>
                                <td>Hassan Ali</td>
                                <td>Fatima Zahra</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>2026-06-01</td>
                            </tr>
                            <tr>
                                <td>#ADM-9002</td>
                                <td>Ayesha Qureshi</td>
                                <td>Omar Siddiqui</td>
                                <td><span class="badge bg-warning text-dark">In Transit</span></td>
                                <td>2026-06-02</td>
                            </tr>
                            <tr>
                                <td>#ADM-9003</td>
                                <td>Bilal Khan</td>
                                <td>Sara Khan</td>
                                <td><span class="badge bg-info text-dark">Out for Delivery</span></td>
                                <td>2026-06-03</td>
                            </tr>
                            <tr>
                                <td>#ADM-9004</td>
                                <td>Maria Ahmad</td>
                                <td>Ali Raza</td>
                                <td><span class="badge bg-danger">Delayed</span></td>
                                <td>2026-06-01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <a href="download_report.php" class="btn btn-primary">
                        <i class="fa-solid fa-file-download"></i> Export History
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

