<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
    include '../includes/admin_sidebar.php';
    
?>
    <h2>Admin - Send Delivery SMS</h2>
    <form method="post" action="#">
        <label for="consignment">Consignment Number</label>
        <input type="text" id="consignment" name="consignment" required>
        <label for="message">Delivery Message</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button class="button" type="submit">Send Delivery SMS</button>
    </form>
<?php include '../includes/footer.php'; ?>