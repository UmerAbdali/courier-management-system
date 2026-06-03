<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
?>
    <h2>Agent Login</h2>
    <form method="post" action="#">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button class="button" type="submit">Login</button>
    </form>
    <nav>
        <a href="new_courier.php">New Courier</a> |
        <a href="view_couriers.php">View Courier Details</a>
    </nav>
<?php include '../includes/footer.php'; ?>
