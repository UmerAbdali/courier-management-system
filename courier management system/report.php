<?php
require_once __DIR__ . '/includes/auth.php';
require_role(['admin', 'agent']);
refresh_user();
$user = current_user();

$start = trim($_GET['start_date'] ?? '');
$end = trim($_GET['end_date'] ?? '');
$city = trim($_GET['city'] ?? '');

$where = [];
$params = [];
if ($user['role'] === 'agent') {
    $where[] = 'branch = ?';
    $params[] = $user['branch'];
}
if ($start !== '') {
    $where[] = 'date(created_at) >= date(?)';
    $params[] = $start;
}
if ($end !== '') {
    $where[] = 'date(created_at) <= date(?)';
    $params[] = $end;
}
if ($city !== '') {
    $where[] = '(sender_city = ? OR receiver_city = ?)';
    $params[] = $city;
    $params[] = $city;
}

$sql = 'SELECT * FROM couriers';
if ($where) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
}
$sql .= ' ORDER BY created_at DESC';
$stmt = db()->prepare($sql);
$stmt->execute($params);
$couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="shipment-report.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Consignment No', 'Sender', 'Sender City', 'Receiver', 'Receiver City', 'Status', 'Branch', 'Created At']);
    foreach ($couriers as $row) {
        fputcsv($output, [$row['consignment_no'], $row['sender_name'], $row['sender_city'], $row['receiver_name'], $row['receiver_city'], $row['status'], $row['branch'], $row['created_at']]);
    }
    exit;
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Shipment Reports</h2>
    <form method="get" class="form-grid">
        <label for="start_date">Start Date</label>
        <input id="start_date" name="start_date" type="date" value="<?php echo e($start); ?>">

        <label for="end_date">End Date</label>
        <input id="end_date" name="end_date" type="date" value="<?php echo e($end); ?>">

        <label for="city">City</label>
        <input id="city" name="city" type="text" value="<?php echo e($city); ?>">

        <button class="button" type="submit">Filter</button>
        <button class="button secondary" name="export" type="submit" value="csv">Download CSV</button>
    </form>
</section>

<section class="panel">
    <h3>Report Results</h3>
    <?php if (empty($couriers)): ?>
        <p>No shipments found for the selected filters.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Consignment No</th>
                <th>Sender City</th>
                <th>Receiver City</th>
                <th>Status</th>
                <th>Branch</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couriers as $row): ?>
                <tr>
                    <td><?php echo e($row['id']); ?></td>
                    <td><?php echo e($row['consignment_no']); ?></td>
                    <td><?php echo e($row['sender_city']); ?></td>
                    <td><?php echo e($row['receiver_city']); ?></td>
                    <td><?php echo e($row['status']); ?></td>
                    <td><?php echo e($row['branch']); ?></td>
                    <td><?php echo e($row['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
