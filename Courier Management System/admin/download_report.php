<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';

    include '../includes/admin_sidebar.php';
?>
    <h2>Admin - Download Report for Shipment</h2>
    <form method="post" action="#">
        <label for="report_type">Report Type</label>
        <select id="report_type" name="report_type">
            <option value="daily">Daily</option>
            <option value="monthly">Monthly</option>
            <option value="custom">Custom Range</option>
        </select>
        <label for="from_date">From Date</label>
        <input type="date" id="from_date" name="from_date">
        <label for="to_date">To Date</label>
        <input type="date" id="to_date" name="to_date">
        <button class="button" type="submit">Download Report</button>
    </form>
<?php include '../includes/footer.php'; ?>