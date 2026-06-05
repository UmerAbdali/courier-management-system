<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Couriers - Logistics Transport</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../includes/sidebar-shared.css">
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}
body{
    overflow-x:hidden;
    background:#f8f9fa;
}
.navbar{
    background:#071c2d;
}
.navbar-brand{
    color:#fff !important;
    font-size:28px;
    font-weight:700;
}
.navbar-nav .nav-link{
    color:#fff !important;
    margin:0 12px;
}
.dashboard-container{
    padding:40px 20px;
    max-width:1300px;
    margin:0 auto;
}
.dashboard-header{
    background:#fff;
    border-radius:8px;
    padding:30px;
    margin-bottom:30px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.dashboard-header-info h2{
    color:#071c2d;
    margin-bottom:10px;
    font-weight:700;
}
.dashboard-header-info p{
    color:#666;
    margin:0;
}
.header-btn{
    background:#e31e24;
    color:#fff;
    border:none;
    padding:10px 20px;
    border-radius:4px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}
.header-btn:hover{
    background:#c71a1f;
    color:#fff;
}
.table-card{
    background:#fff;
    border-radius:8px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    overflow:hidden;
}
.table-card table{
    margin:0;
}
.table-card th{
    background:#071c2d;
    color:#fff;
    border:none;
    font-weight:700;
    padding:15px;
}
.table-card td{
    padding:15px;
    border-bottom:1px solid #eee;
    color:#333;
}
.table-card tr:last-child td{
    border-bottom:none;
}
.table-card tr:hover{
    background:#f8f9fa;
}
.status-badge{
    padding:6px 12px;
    border-radius:20px;
    font-weight:600;
    font-size:12px;
}
.status-pending{
    background:#fff3cd;
    color:#856404;
}
.status-transit{
    background:#d1ecf1;
    color:#0c5460;
}
.status-delivered{
    background:#d4edda;
    color:#155724;
}
.action-btn{
    background:#e31e24;
    color:#fff;
    border:none;
    padding:8px 15px;
    border-radius:4px;
    cursor:pointer;
    font-weight:600;
    margin-right:5px;
    transition:0.3s;
}
.action-btn:hover{
    background:#c71a1f;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="fa-solid fa-truck-fast text-danger"></i>
            Courier Management
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="new_courier.php">New Courier</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="admin-layout">
    <?php include '../includes/admin_sidebar.php';
    include("../includes/dbconnect.php");
     ?>
    <div class="admin-content">
        <div class="dashboard-container">
    <div class="dashboard-header">
        <div class="dashboard-header-info">
            <h2><i class="fa-solid fa-boxes-stacked"></i> View All Couriers</h2>
            <p>Monitor all courier shipments and their current status</p>
        </div>
        <a href="new_courier.php" class="header-btn"><i class="fa-solid fa-plus"></i> New Courier</a>
    </div>
    <div class="table-card">
        <table class="table">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-barcode"></i> Consignment</th>
                    <th><i class="fa-solid fa-user"></i> Sender</th>
                    <th><i class="fa-solid fa-user"></i> Receiver</th>
                    <th><i class="fa-solid fa-location-dot"></i> Destination</th>
                    <th><i class="fa-solid fa-info-circle"></i> Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CN001</td>
                    <td>John Doe</td>
                    <td>Jane Smith</td>
                    <td>New York</td>
                    <td><span class="status-badge status-transit">In Transit</span></td>
                    <td>
                        <button class="action-btn"><i class="fa-solid fa-edit"></i> Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>CN002</td>
                    <td>Alice Brown</td>
                    <td>Bob Wilson</td>
                    <td>Los Angeles</td>
                    <td><span class="status-badge status-delivered">Delivered</span></td>
                    <td>
                        <button class="action-btn"><i class="fa-solid fa-edit"></i> Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 

?>