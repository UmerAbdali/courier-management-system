<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
?>
    <h2>Agent - Download Report from Branch</h2>
    <form method="post" action="#">
        <label for="branch">Branch</label>
        <input type="text" id="branch" name="branch" required>
        <label for="date">Report Date</label>
        <input type="date" id="date" name="date">
        <button class="button" type="submit">Download Branch Report</button>
    </form>
<?php include '../includes/footer.php'; ?>
