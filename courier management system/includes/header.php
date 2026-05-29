<?php
require_once __DIR__ . '/auth.php';
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(APP_NAME); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <div class="container nav-wrap">
        <a class="brand" href="index.php"><?php echo e(APP_NAME); ?></a>
        <nav>
            <a href="index.php">Home</a>
            <?php if ($user): ?>
                <a href="dashboard.php">Dashboard</a>
                <?php if ($user['role'] !== 'user'): ?>
                    <a href="courier.php">Couriers</a>
                <?php endif; ?>
                <?php if ($user['role'] === 'admin'): ?>
                    <a href="agents.php">Agents</a>
                    <a href="customers.php">Customers</a>
                <?php endif; ?>
                <a href="report.php">Reports</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="container">
    <?php $flash = flash(); if ($flash): ?>
        <div class="flash <?php echo e($flash['type']); ?>"><?php echo e($flash['message']); ?></div>
    <?php endif; ?>
