<?php 
    include '../includes/header.php'; 
    include '../includes/dbconnect.php';
?>
    <h2>Admin - Send SMS (From / To)</h2>
    <form method="post" action="#">
        <label for="from">From</label>
        <input type="text" id="from" name="from" required>
        <label for="to">To</label>
        <input type="text" id="to" name="to" required>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button class="button" type="submit">Send SMS</button>
    </form>
<?php include '../includes/footer.php'; ?>

