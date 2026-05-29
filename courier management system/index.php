<?php
require_once __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <h1>Courier Management System</h1>
    <p>Manage consignments, agents, customers, reports, and track shipments online.</p>
    <?php if (!is_logged_in()): ?>
        <div class="button-group">
            <a class="button" href="login.php">Login</a>
            <a class="button secondary" href="register.php">Register as User</a>
        </div>
    <?php else: ?>
        <div class="button-group">
            <a class="button" href="dashboard.php">Go to Dashboard</a>
        </div>
    <?php endif; ?>
</section>

<section class="panel">
    <h2>Track Your Consignment</h2>
    <form action="track.php" method="get" class="form-grid">
        <label for="consignment_no">Consignment Number</label>
        <input id="consignment_no" name="consignment_no" type="text" required>
        <button class="button" type="submit">Track</button>
    </form>
</section>

<section class="panel features">
    <div>
        <h3>Admin Module</h3>
        <ul>
            <li>Login and manage system</li>
            <li>Create and update courier bills</li>
            <li>Manage agents and customers</li>
            <li>Download shipment reports</li>
        </ul>
    </div>
    <div>
        <h3>Agent Module</h3>
        <ul>
            <li>Branch-level courier management</li>
            <li>View courier status by branch</li>
            <li>Download branch reports</li>
        </ul>
    </div>
    <div>
        <h3>User Module</h3>
        <ul>
            <li>Register and login</li>
            <li>Track consignment number</li>
            <li>View and print shipment status</li>
        </ul>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php';
