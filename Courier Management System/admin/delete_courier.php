<?php 
    include '../includes/header.php'; 
    
 include '../includes/admin_sidebar.php'; 
include("../includes/dbconnect.php");
?>
    <h2>Admin - Delete Courier</h2>
    <form method="post" action="#">
        <label for="consignment">Consignment Number</label>
        <input type="text" id="consignment" name="consignment" required>
        <button class="button" type="submit">Delete Courier</button>
    </form>
<?php include '../includes/footer.php'; ?>