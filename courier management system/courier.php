<?php
require_once __DIR__ . '/includes/auth.php';
require_role(['admin', 'agent']);
refresh_user();
$user = current_user();

$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = ['consignment_no', 'sender_name', 'sender_city', 'receiver_name', 'receiver_city', 'weight', 'service_type', 'status'];
    if (!check_required($fields, $_POST)) {
        flash('Please fill all required fields.', 'danger');
        redirect('courier.php?action=' . ($id ? 'edit&id=' . $id : 'new'));
    }

    $data = array_map('trim', $_POST);
    $branch = $user['role'] === 'agent' ? $user['branch'] : trim($data['branch']);
    if ($branch === '') {
        $branch = 'Unknown';
    }

    if ($action === 'new') {
        $stmt = db()->prepare('INSERT INTO couriers (consignment_no, sender_name, sender_city, receiver_name, receiver_city, weight, service_type, status, branch, customer_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $data['consignment_no'],
            $data['sender_name'],
            $data['sender_city'],
            $data['receiver_name'],
            $data['receiver_city'],
            $data['weight'],
            $data['service_type'],
            $data['status'],
            $branch,
            $data['customer_id'] ?: null,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
        ]);
        flash('Courier created successfully.', 'success');
        redirect('courier.php');
    }
    if ($action === 'edit' && $id) {
        $stmt = db()->prepare('SELECT * FROM couriers WHERE id = ?');
        $stmt->execute([$id]);
        $courier = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$courier) {
            flash('Courier not found.', 'danger');
            redirect('courier.php');
        }
        if ($user['role'] === 'agent' && $courier['branch'] !== $user['branch']) {
            flash('You can only edit consignments for your branch.', 'danger');
            redirect('courier.php');
        }

        $stmt = db()->prepare('UPDATE couriers SET consignment_no = ?, sender_name = ?, sender_city = ?, receiver_name = ?, receiver_city = ?, weight = ?, service_type = ?, status = ?, branch = ?, customer_id = ?, updated_at = ? WHERE id = ?');
        $stmt->execute([
            $data['consignment_no'],
            $data['sender_name'],
            $data['sender_city'],
            $data['receiver_name'],
            $data['receiver_city'],
            $data['weight'],
            $data['service_type'],
            $data['status'],
            $branch,
            $data['customer_id'] ?: null,
            date('Y-m-d H:i:s'),
            $id
        ]);
        flash('Courier updated successfully.', 'success');
        redirect('courier.php');
    }
}

if ($action === 'delete' && $id) {
    $stmt = db()->prepare('SELECT * FROM couriers WHERE id = ?');
    $stmt->execute([$id]);
    $courier = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($courier && ($user['role'] !== 'agent' || $courier['branch'] === $user['branch'])) {
        $delete = db()->prepare('DELETE FROM couriers WHERE id = ?');
        $delete->execute([$id]);
        flash('Courier deleted successfully.', 'success');
    } else {
        flash('Courier not found or access denied.', 'danger');
    }
    redirect('courier.php');
}

$branchQuery = '';
$params = [];
if ($user['role'] === 'agent') {
    $branchQuery = 'WHERE branch = ?';
    $params[] = $user['branch'];
}
$stmt = db()->prepare('SELECT * FROM couriers ' . $branchQuery . ' ORDER BY created_at DESC');
$stmt->execute($params);
$couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$customerOptions = db()->query('SELECT id, name FROM customers ORDER BY name')->fetchAll(PDO::FETCH_ASSOC);

$courier = null;
if ($action === 'edit' && $id) {
    $stmt = db()->prepare('SELECT * FROM couriers WHERE id = ?');
    $stmt->execute([$id]);
    $courier = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user['role'] === 'agent' && $courier && $courier['branch'] !== $user['branch']) {
        flash('You can only edit consignments for your branch.', 'danger');
        redirect('courier.php');
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Courier Management</h2>
    <div class="button-group">
        <a class="button" href="courier.php?action=new">Add Shipment</a>
        <a class="button secondary" href="courier.php">View Shipments</a>
    </div>
</section>

<?php if ($action === 'new' || ($action === 'edit' && $courier)): ?>
<section class="panel">
    <h3><?php echo $action === 'new' ? 'New Courier' : 'Update Courier'; ?></h3>
    <form method="post" class="form-grid">
        <label for="consignment_no">Consignment No.</label>
        <input id="consignment_no" name="consignment_no" type="text" value="<?php echo e($courier['consignment_no'] ?? ''); ?>" required>

        <label for="sender_name">Sender Name</label>
        <input id="sender_name" name="sender_name" type="text" value="<?php echo e($courier['sender_name'] ?? ''); ?>" required>

        <label for="sender_city">Sender City</label>
        <input id="sender_city" name="sender_city" type="text" value="<?php echo e($courier['sender_city'] ?? ''); ?>" required>

        <label for="receiver_name">Receiver Name</label>
        <input id="receiver_name" name="receiver_name" type="text" value="<?php echo e($courier['receiver_name'] ?? ''); ?>" required>

        <label for="receiver_city">Receiver City</label>
        <input id="receiver_city" name="receiver_city" type="text" value="<?php echo e($courier['receiver_city'] ?? ''); ?>" required>

        <label for="weight">Weight</label>
        <input id="weight" name="weight" type="text" value="<?php echo e($courier['weight'] ?? ''); ?>" required>

        <label for="service_type">Service Type</label>
        <select id="service_type" name="service_type" required>
            <?php foreach (['Standard', 'Express', 'Overnight'] as $service): ?>
                <option value="<?php echo e($service); ?>" <?php echo isset($courier['service_type']) && $courier['service_type'] === $service ? 'selected' : ''; ?>><?php echo e($service); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <?php foreach (['Booked', 'In Progress', 'Delivered'] as $status): ?>
                <option value="<?php echo e($status); ?>" <?php echo isset($courier['status']) && $courier['status'] === $status ? 'selected' : ''; ?>><?php echo e($status); ?></option>
            <?php endforeach; ?>
        </select>

        <?php if ($user['role'] === 'admin'): ?>
            <label for="branch">Branch</label>
            <input id="branch" name="branch" type="text" value="<?php echo e($courier['branch'] ?? ''); ?>" required>
        <?php endif; ?>

        <label for="customer_id">Customer</label>
        <select id="customer_id" name="customer_id">
            <option value="">No customer</option>
            <?php foreach ($customerOptions as $customer): ?>
                <option value="<?php echo e($customer['id']); ?>" <?php echo isset($courier['customer_id']) && $courier['customer_id'] == $customer['id'] ? 'selected' : ''; ?>><?php echo e($customer['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <button class="button" type="submit"><?php echo $action === 'new' ? 'Create Courier' : 'Save Changes'; ?></button>
    </form>
</section>
<?php endif; ?>

<section class="panel">
    <h3>Shipments</h3>
    <?php if (empty($couriers)): ?>
        <p>No courier records found.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Consignment</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Branch</th>
                <th>Status</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couriers as $row): ?>
                <tr>
                    <td><?php echo e($row['id']); ?></td>
                    <td><?php echo e($row['consignment_no']); ?></td>
                    <td><?php echo e($row['sender_name']); ?>, <?php echo e($row['sender_city']); ?></td>
                    <td><?php echo e($row['receiver_name']); ?>, <?php echo e($row['receiver_city']); ?></td>
                    <td><?php echo e($row['branch']); ?></td>
                    <td><?php echo e($row['status']); ?></td>
                    <td><?php echo e($row['updated_at']); ?></td>
                    <td>
                        <a class="small-button" href="courier.php?action=edit&id=<?php echo e($row['id']); ?>">Edit</a>
                        <a class="small-button danger" href="courier.php?action=delete&id=<?php echo e($row['id']); ?>" onclick="return confirmAction('Delete this courier?');">Delete</a>
                        <a class="small-button" href="print.php?id=<?php echo e($row['id']); ?>" target="_blank">Print</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php';
