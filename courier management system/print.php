<?php
require_once __DIR__ . '/includes/auth.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (!$id) {
    flash('Invalid shipment ID.', 'danger');
    redirect('index.php');
}

$stmt = db()->prepare('SELECT * FROM couriers WHERE id = ?');
$stmt->execute([$id]);
$courier = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$courier) {
    flash('Shipment not found.', 'danger');
    redirect('index.php');
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel print-panel">
    <h2>Shipment Printout</h2>
    <table class="detail-table">
        <tr><th>Consignment No</th><td><?php echo e($courier['consignment_no']); ?></td></tr>
        <tr><th>Sender</th><td><?php echo e($courier['sender_name']); ?>, <?php echo e($courier['sender_city']); ?></td></tr>
        <tr><th>Receiver</th><td><?php echo e($courier['receiver_name']); ?>, <?php echo e($courier['receiver_city']); ?></td></tr>
        <tr><th>Weight</th><td><?php echo e($courier['weight']); ?></td></tr>
        <tr><th>Service Type</th><td><?php echo e($courier['service_type']); ?></td></tr>
        <tr><th>Status</th><td><?php echo e($courier['status']); ?></td></tr>
        <tr><th>Branch</th><td><?php echo e($courier['branch']); ?></td></tr>
        <tr><th>Created At</th><td><?php echo e($courier['created_at']); ?></td></tr>
        <tr><th>Updated At</th><td><?php echo e($courier['updated_at']); ?></td></tr>
    </table>
    <button class="button" onclick="window.print();">Print</button>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
