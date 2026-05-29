<?php
require_once __DIR__ . '/includes/auth.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;

    if (!check_required(['name', 'mobile', 'address'], $_POST)) {
        flash('All fields are required.', 'danger');
    } elseif ($id) {
        $update = db()->prepare('UPDATE customers SET name = ?, mobile = ?, address = ? WHERE id = ?');
        $update->execute([$name, $mobile, $address, $id]);
        flash('Customer updated successfully.', 'success');
        redirect('customers.php');
    } else {
        $insert = db()->prepare('INSERT INTO customers (name, mobile, address, created_at) VALUES (?, ?, ?, ?)');
        $insert->execute([$name, $mobile, $address, date('Y-m-d H:i:s')]);
        flash('Customer added successfully.', 'success');
        redirect('customers.php');
    }
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    db()->prepare('DELETE FROM customers WHERE id = ?')->execute([$id]);
    flash('Customer deleted.', 'success');
    redirect('customers.php');
}

$customer = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = db()->prepare('SELECT * FROM customers WHERE id = ?');
    $stmt->execute([$id]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
}

$customers = db()->query('SELECT * FROM customers ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Manage Customers</h2>
    <section class="panel-half">
        <h3><?php echo $customer ? 'Edit Customer' : 'Add Customer'; ?></h3>
        <form method="post" class="form-grid">
            <?php if ($customer): ?>
                <input type="hidden" name="id" value="<?php echo e($customer['id']); ?>">
            <?php endif; ?>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="<?php echo e($customer['name'] ?? ''); ?>" required>

            <label for="mobile">Mobile</label>
            <input id="mobile" name="mobile" type="text" value="<?php echo e($customer['mobile'] ?? ''); ?>" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" required><?php echo e($customer['address'] ?? ''); ?></textarea>

            <button class="button" type="submit"><?php echo $customer ? 'Save Customer' : 'Add Customer'; ?></button>
        </form>
    </section>
</section>

<section class="panel">
    <h3>Customer Records</h3>
    <?php if (empty($customers)): ?>
        <p>No customers created yet.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $row): ?>
                <tr>
                    <td><?php echo e($row['id']); ?></td>
                    <td><?php echo e($row['name']); ?></td>
                    <td><?php echo e($row['mobile']); ?></td>
                    <td><?php echo e($row['address']); ?></td>
                    <td>
                        <a class="small-button" href="customers.php?edit=<?php echo e($row['id']); ?>">Edit</a>
                        <a class="small-button danger" href="customers.php?delete=<?php echo e($row['id']); ?>" onclick="return confirmAction('Delete this customer?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
