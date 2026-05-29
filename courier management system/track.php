<?php
require_once __DIR__ . '/includes/auth.php';

$consignmentNo = trim($_GET['consignment_no'] ?? '');
$courier = null;

if ($consignmentNo !== '') {
    $stmt = db()->prepare('SELECT * FROM couriers WHERE consignment_no = ?');
    $stmt->execute([$consignmentNo]);
    $courier = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$courier) {
        flash('No shipment found with the provided consignment number.', 'danger');
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Track Consignment</h2>
    <form method="get" class="form-grid">
        <label for="consignment_no">Consignment Number</label>
        <input id="consignment_no" name="consignment_no" type="text" value="<?php echo e($consignmentNo); ?>" required>
        <button class="button" type="submit">Track</button>
    </form>
</section>

<?php if ($courier): ?>
<section class="panel">
    <h3>Shipment Status</h3>
    <table class="detail-table">
        <tr><th>Consignment No</th><td><?php echo e($courier['consignment_no']); ?></td></tr>
        <tr><th>Sender</th><td><?php echo e($courier['sender_name']); ?> (<?php echo e($courier['sender_city']); ?>)</td></tr>
        <tr><th>Receiver</th><td><?php echo e($courier['receiver_name']); ?> (<?php echo e($courier['receiver_city']); ?>)</td></tr>
        <tr><th>Service Type</th><td><?php echo e($courier['service_type']); ?></td></tr>
        <tr><th>Status</th><td><?php echo e($courier['status']); ?></td></tr>
        <tr><th>Branch</th><td><?php echo e($courier['branch']); ?></td></tr>
        <tr><th>Updated At</th><td><?php echo e($courier['updated_at']); ?></td></tr>
    </table>
    <a class="button" href="print.php?id=<?php echo e($courier['id']); ?>" target="_blank">Print Status</a>
</section>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php';
