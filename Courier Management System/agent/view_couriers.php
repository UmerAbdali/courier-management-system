<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
  
?>
    <h2>Agent - View All Courier Details</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Consignment</th><th>Sender</th><th>Receiver</th><th>Destination</th><th>Status</th></tr>
        <tr><td>CN101</td><td>Anna Lee</td><td>Mark Brown</td><td>Chicago</td><td>Delivered</td></tr>
    </table>

<?php include '../includes/footer.php'; ?>