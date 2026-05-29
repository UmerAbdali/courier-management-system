<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
refresh_user();
$user = current_user();

$counts = ['total' => 0, 'booked' => 0, 'in_progress' => 0, 'delivered' => 0];
$params = [];
$where = '1=1';

if ($user['role'] === 'agent') {
    $where = 'branch = ?';
    $params[] = $user['branch'];
}

$totalStmt = db()->prepare("SELECT COUNT(*) FROM couriers WHERE $where");
$totalStmt->execute($params);
$counts['total'] = $totalStmt->fetchColumn();

foreach (['Booked', 'In Progress', 'Delivered'] as $status) {
    $statusStmt = db()->prepare("SELECT COUNT(*) FROM couriers WHERE $where AND status = ?");
    $statusStmt->execute(array_merge($params, [$status]));
    $key = strtolower(str_replace(' ', '_', $status));
    $counts[$key] = $statusStmt->fetchColumn();
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo e($user['name']); ?>. Role: <?php echo e(ucfirst($user['role'])); ?></p>
    <?php if ($user['role'] === 'agent'): ?>
        <p>Branch: <?php echo e($user['branch']); ?></p>
    <?php endif; ?>
</section>

<section class="panel stats-grid">
    <div class="stat-card">
        <h3>Total Shipments</h3>
        <p><?php echo e($counts['total']); ?></p>
    </div>
    <div class="stat-card">
        <h3>Booked</h3>
        <p><?php echo e($counts['booked']); ?></p>
    </div>
    <div class="stat-card">
        <h3>In Progress</h3>
        <p><?php echo e($counts['in_progress']); ?></p>
    </div>
    <div class="stat-card">
        <h3>Delivered</h3>
        <p><?php echo e($counts['delivered']); ?></p>
    </div>
</section>

<section class="panel action-grid">
    <?php if ($user['role'] !== 'user'): ?>
        <a class="card" href="courier.php?action=new">New Courier</a>
    <?php endif; ?>
    <?php if ($user['role'] === 'admin'): ?>
        <a class="card" href="agents.php">Manage Agents</a>
        <a class="card" href="customers.php">Manage Customers</a>
    <?php endif; ?>
    <a class="card" href="report.php">Download Reports</a>
    <a class="card" href="track.php">Track Consignment</a>
</section>

<?php require_once __DIR__ . '/includes/footer.php';
