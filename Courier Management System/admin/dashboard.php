<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Courier Management System</title>
    <link rel="stylesheet" href="admin-sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        /* Top Bar */

        .top-bar {
            background: #e31e24;
            color: #fff;
            padding: 8px 0;
            font-size: 14px;
        }

        .top-bar a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        /* Header */

        .navbar {
            background: #071c2d;
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 28px;
            font-weight: 700;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            margin: 0 12px;
        }

        .track-btn {
            background: #e31e24;
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .track-btn:hover {
            background: #c71a1f;
            color: #fff;
        }

        /* Hero */

        .hero {
            height: 90vh;
            background: url('warehouse-bg.svg') center center/cover no-repeat;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            padding-top: 140px;
        }

        .hero-content h1 {
            font-size: 75px;
            font-weight: 800;
        }

        .hero-content h2 {
            font-size: 70px;
            font-weight: 300;
            color: transparent;
            -webkit-text-stroke: 2px #fff;
        }

        .hero-content p {
            width: 500px;
            margin-top: 20px;
        }

        /* Side Service Menu */

        .service-menu {
            position: absolute;
            right: 70px;
            top: 180px;
            z-index: 2;
        }

        .service-item {
            background: #111;
            color: #fff;
            padding: 20px 30px;
            width: 200px;
            border-bottom: 1px solid rgba(255, 255, 255, .2);
            transition: 0.3s;
            cursor: pointer;
        }

        .service-item:hover {
            background: #e31e24;
        }

        .service-item.active {
            background: #e31e24;
        }

        /* Delivery Boy */

        .delivery-boy {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 250px;
        }

        /* Contact Info */

        .info-box {
            color: #fff;
            display: flex;
            gap: 40px;
        }

        .info-box i {
            color: #e31e24;
            margin-right: 8px;
        }

        /* Portal Links */

        .portal-links {
            padding: 60px 0;
            background: #f8f9fa;
            text-align: center;
        }

        .portal-link {
            background: #fff;
            border: 2px solid #e31e24;
            color: #e31e24;
            padding: 20px 40px;
            margin: 10px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: 0.3s;
        }

        .portal-link:hover {
            background: #e31e24;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Top Bar -->

    <div class="top-bar">
        <div class="container d-flex justify-content-between">
            <div>
                <a href="#"><i class="fa-solid fa-envelope"></i> couriermanagementsystem@gmail.com</a>
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

            <a class="navbar-brand" href="../index.php">
                <i class="fa-solid fa-truck-fast text-danger"></i>
                Courier Management
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="login.php" class="track-btn">
                Admin Logout
            </a>

        </div>
    </nav>

    <main class="admin-layout">
        <?php include '../includes/admin_sidebar.php'; ?>
        <div class="admin-content">

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
                        Support<br>
                        admin@mail.com
                    </div>

                    <div>
                        <i class="fa-solid fa-phone"></i>
                        Phone Number<br>
                        +92 300 1234567
                    </div>
                </div>

                <h1>Admin</h1>
                <h2>Portal</h2>

                <p>
                    Manage couriers, track shipments, handle customer accounts,
                    and access comprehensive logistics administration tools.
                </p>

            </div>

            <!-- Service Menu -->



            <!-- Delivery Boy -->

            
        </section>

        <!-- Portal Links -->

        <section class="portal-links">
            <div class="container">
                <h3 class="mb-5" style="color:#071c2d;">Admin Functions</h3>

                <a href="login.php" class="portal-link">
                    <i class="fa-solid fa-sign-in-alt"></i> Login
                </a>

                <a href="manage_couriers.php" class="portal-link">
                    <i class="fa-solid fa-box"></i> Manage Couriers
                </a>

                <a href="manage_customers.php" class="portal-link">
                    <i class="fa-solid fa-users"></i> Manage Customers
                </a>

                <a href="manage_agent.php" class="portal-link">
                    <i class="fa-solid fa-user-tie"></i> Manage Agents
                </a>

                <a href="shipment_history.php" class="portal-link">
                    <i class="fa-solid fa-clock-rotate-left"></i> Shipment History
                </a>

                <a href="download_report.php" class="portal-link">
                    <i class="fa-solid fa-file-download"></i> Download Report
                </a>
            </div>
        </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin-sidebar.js"></script>
</body>
</html>

<?php
include("../includes/dbconnect.php");

?>