<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Agents - Logistics Transport</title>
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
.dashboard-container{
    padding:40px 20px;
    max-width:1200px;
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
                <li class="nav-item"><a class="nav-link" href="index.php">Admin Portal</a></li>
                <li class="nav-item"><a class="nav-link" href="create_agent.php">Create Agent</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="dashboard-container">
    <div class="dashboard-header">
        <div class="dashboard-header-info">
            <h2><i class="fa-solid fa-user-tie"></i> Manage Agents</h2>
            <p>Update or delete agent records in the system</p>
        </div>
        <a href="create_agent.php" class="header-btn"><i class="fa-solid fa-plus"></i> Add Agent</a>
    </div>
    <div class="table-card">
        <table class="table">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-user"></i> Agent Name</th>
                    <th><i class="fa-solid fa-map-marker"></i> Branch</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Agent A</td>
                    <td>Downtown</td>
                    <td>
                        <button class="action-btn"><i class="fa-solid fa-edit"></i> Edit</button>
                        <button class="action-btn"><i class="fa-solid fa-trash"></i> Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Agent B</td>
                    <td>Uptown</td>
                    <td>
                        <button class="action-btn"><i class="fa-solid fa-edit"></i> Edit</button>
                        <button class="action-btn"><i class="fa-solid fa-trash"></i> Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include("../includes/dbconnect.php");

?>