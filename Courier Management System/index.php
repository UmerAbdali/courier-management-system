<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Courier Management System</title>

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
}

/* Top Bar */

.top-bar{
    background:#e31e24;
    color:#fff;
    padding:8px 0;
    font-size:14px;
}

.top-bar a{
    color:#fff;
    text-decoration:none;
    margin-right:20px;
}

/* Header */

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

.track-btn{
    background:#e31e24;
    color:#fff;
    border:none;
    padding:10px 25px;
    border-radius:4px;
}

/* Hero */

.hero{
    height:90vh;
    background:url('https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?q=80&w=2070') center center/cover no-repeat;
    position:relative;
}

.hero::before{
    content:'';
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.55);
}

.hero-content{
    position:relative;
    z-index:2;
    color:#fff;
    padding-top:140px;
}

.hero-content h1{
    font-size:75px;
    font-weight:800;
}

.hero-content h2{
    font-size:70px;
    font-weight:300;
    color:transparent;
    -webkit-text-stroke:2px #fff;
}

.hero-content p{
    width:500px;
    margin-top:20px;
}

/* Side Service Menu */

.service-menu{
    position:absolute;
    right:70px;
    top:180px;
    z-index:2;
}

.service-item{
    background:#111;
    color:#fff;
    padding:20px 30px;
    width:180px;
    border-bottom:1px solid rgba(255,255,255,.2);
}

.service-item.active{
    background:#e31e24;
}

/* Delivery Boy */

.delivery-boy{
    position:absolute;
    left:0;
    bottom:0;
    width:250px;
}

/* Contact Info */

.info-box{
    color:#fff;
    display:flex;
    gap:40px;
}

.info-box i{
    color:#e31e24;
    margin-right:8px;
}

</style>
</head>
<body>

<!-- Top Bar -->

<div class="top-bar">
    <div class="container d-flex justify-content-between">
        <div>
            <a href="#"><i class="fa-solid fa-envelope"></i> couriermangementsystem@gmail.com</a>
            <a href="#"><i class="fa-solid fa-phone"></i> +92 300 1234567</a>
        </div>

        <div>
            English |
            USD
        </div>
    </div>
</div>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-truck-fast text-danger"></i>
            Courier Management System
        </a>

        <button class="navbar-toggler bg-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Portal
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <li><a class="dropdown-item" href="admin/adminlogin.php">Admin Login</a></li>
                        <li><a class="dropdown-item" href="agent/agentlogin.php">Agent Login</a></li>
                        <li><a class="dropdown-item" href="user/user_register.php">User Register</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">News</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>

            <a href="user/track_consignment.php" class="track-btn">
                TRACK YOUR SHIPMENT
            </a>

        </div>
    </div>
</nav>

<!-- Hero Section -->

<section class="hero">

    <div class="container hero-content">

        <div class="info-box mb-4">
            <div>
                <i class="fa-solid fa-clock"></i>
                Opening Hours<br>
                09:00 - 18:00
            </div>

            <div>
                <i class="fa-solid fa-envelope"></i>
                Drop A Line<br>
                couriermangementsystem@gmail.com
            </div>

            <div>
                <i class="fa-solid fa-phone"></i>
                Phone Number<br>
                +92 300 1234567
            </div>
        </div>

        <h1>Courier</h1>
        <h2>Management System</h2>

        <p>
            Professional cargo and transportation services with
            fast delivery, air freight, road freight and logistics
            management solutions.
        </p>

    </div>

    <!-- Service Menu -->

    <div class="service-menu">

        <div class="service-item">
            Air Freight
        </div>

        <div class="service-item active">
            Road Freight
        </div>

        <div class="service-item">
            Fast Delivery
        </div>

    </div>

    <!-- Delivery Boy -->

   

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

