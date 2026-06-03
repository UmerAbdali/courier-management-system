<?php
// User account settings page (static demo content)
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Settings - Logistics Transport</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{background:#f4f7fb;}
.navbar{background:#071c2d;}
.navbar-brand{color:#fff!important;font-weight:700;}
.navbar-nav .nav-link{color:#fff!important;}
.page-header{padding:80px 0 40px;text-align:center;color:#071c2d;}
.card{border:none;border-radius:16px;box-shadow:0 25px 50px rgba(0,0,0,0.08);}
.form-control:focus{border-color:#e31e24;box-shadow:0 0 0 .2rem rgba(227,30,36,.25);}
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
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="track_consignment.php">Track</a></li>
                <li class="nav-item"><a class="nav-link" href="shipment_history.php">History</a></li>
                <li class="nav-item"><a class="nav-link" href="view_status.php">Status</a></li>
            </ul>
            <a href="login.php" class="btn btn-primary">User Login</a>
        </div>
    </div>
</nav>
<section class="page-header">
    <div class="container">
        <h1>Account Settings</h1>
        <p class="lead">Manage your profile details, contact information, and delivery preferences.</p>
    </div>
</section>
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <form>
                    <div class="mb-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="Ayesha Khan">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" value="ayesha.khan@example.com">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="+92 300 1234567">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Delivery Address</label>
                        <textarea class="form-control" rows="3">House 21, Street 10, DHA Phase 5, Karachi</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Preferred Notifications</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailAlerts" checked>
                            <label class="form-check-label" for="emailAlerts">Email alerts</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="smsAlerts">
                            <label class="form-check-label" for="smsAlerts">SMS alerts</label>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include("../includes/dbconnect.php");

?>