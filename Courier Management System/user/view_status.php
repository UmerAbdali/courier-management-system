<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Status - Logistics Transport</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
.status-container{
    display:flex;
    min-height:calc(100vh - 80px);
    align-items:center;
    justify-content:center;
    padding:40px 20px;
}
.status-card{
    background:#fff;
    border-radius:8px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    padding:50px 40px;
    width:100%;
    max-width:480px;
}
.status-card h2{
    color:#071c2d;
    margin-bottom:10px;
    font-weight:700;
}
.status-card p{
    color:#666;
    margin-bottom:30px;
    font-size:14px;
}
.form-group{
    margin-bottom:20px;
}
.form-group label{
    color:#071c2d;
    font-weight:600;
    margin-bottom:8px;
    display:block;
}
.form-group input{
    width:100%;
    padding:12px 15px;
    border:1px solid #ddd;
    border-radius:4px;
    font-size:14px;
    transition:0.3s;
}
.form-group input:focus{
    border-color:#e31e24;
    outline:none;
    box-shadow:0 0 0 3px rgba(227,30,36,0.1);
}
.status-btn{
    background:#e31e24;
    color:#fff;
    border:none;
    padding:12px 20px;
    border-radius:4px;
    font-weight:600;
    cursor:pointer;
    width:100%;
    margin-top:10px;
    transition:0.3s;
}
.status-btn:hover{
    background:#c71a1f;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="fa-solid fa-truck-fast text-danger"></i>
            Logistik
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">User Portal</a></li>
                <li class="nav-item"><a class="nav-link" href="track_consignment.php">Track</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="status-container">
    <div class="status-card">
        <h2><i class="fa-solid fa-eye"></i> View Status</h2>
        <p>Check the detailed status of your shipment</p>
        <form method="post" action="#">
            <div class="form-group">
                <label for="consignment">Consignment Number</label>
                <input type="text" id="consignment" name="consignment" placeholder="e.g., CNS123456" required>
            </div>
            <button class="status-btn" type="submit"><i class="fa-solid fa-binoculars"></i> View Status</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include("../includes/dbconnect.php");

?>