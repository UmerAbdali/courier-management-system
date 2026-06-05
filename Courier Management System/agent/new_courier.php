<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
    
?>
    <h2>Agent - New Courier</h2>
    <form method="post" action="#">
        <label for="consignment">Consignment Number</label>
        <input type="text" id="consignment" name="consignment" required>
        <label for="sender">Sender Name</label>
        <input type="text" id="sender" name="sender" required>
        <label for="receiver">Receiver Name</label>
        <input type="text" id="receiver" name="receiver" required>
        <label for="destination">Destination</label>
        <input type="text" id="destination" name="destination" required>
        <button class="button" type="submit">Create Courier</button>
    </form>
<?php include '../includes/footer.php'; ?>