<?php
$currentScript = basename($_SERVER['SCRIPT_NAME']);
?>
<div class="admin-sidebar">
    <h2>Admin Menu</h2>
    <nav class="admin-sidebar-nav">
        <a class="<?php echo $currentScript === 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">Dashboard</a>
        <a class="<?php echo $currentScript === 'new_courier.php' ? 'active' : ''; ?>" href="new_courier.php">New Courier</a>
        <a class="<?php echo $currentScript === 'view_couriers.php' ? 'active' : ''; ?>" href="view_couriers.php">View Couriers</a>
        <a class="<?php echo $currentScript === 'manage_customers.php' ? 'active' : ''; ?>" href="manage_customers.php">Customers</a>
        <a class="<?php echo $currentScript === 'manage_agent.php' ? 'active' : ''; ?>" href="manage_agent.php">Agents</a>
        <a class="<?php echo $currentScript === 'shipment_history.php' ? 'active' : ''; ?>" href="shipment_history.php">Shipment History</a>
        <a class="<?php echo $currentScript === 'download_report.php' ? 'active' : ''; ?>" href="download_report.php">Download Report</a>
        <a class="<?php echo $currentScript === 'send_sms_from_to.php' ? 'active' : ''; ?>" href="send_sms_from_to.php">Send SMS</a>
        <a class="<?php echo $currentScript === 'send_delivery_sms.php' ? 'active' : ''; ?>" href="send_delivery_sms.php">Delivery SMS</a>
        <a class="<?php echo $currentScript === 'delete_courier.php' ? 'active' : ''; ?>" href="delete_courier.php">Delete Courier</a>
    </nav>
</div>
