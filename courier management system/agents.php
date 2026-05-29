<?php
require_once __DIR__ . '/includes/auth.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $branch = trim($_POST['branch'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!check_required(['name', 'email', 'branch', 'password'], $_POST)) {
        flash('All fields are required.', 'danger');
    } else {
        $stmt = db()->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            flash('Email is already in use.', 'danger');
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = db()->prepare('INSERT INTO users (name, email, password, role, branch, created_at) VALUES (?, ?, ?, ?, ?, ?)');
            $insert->execute([$name, $email, $hash, 'agent', $branch, date('Y-m-d H:i:s')]);
            flash('Agent created successfully.', 'success');
            redirect('agents.php');
        }
    }
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = db()->prepare('DELETE FROM users WHERE id = ? AND role = ?');
    $stmt->execute([$id, 'agent']);
    flash('Agent removed.', 'success');
    redirect('agents.php');
}

$agents = db()->query('SELECT * FROM users WHERE role = "agent" ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Manage Agents</h2>
    <section class="panel-half">
        <h3>Create Agent</h3>
        <form method="post" class="form-grid">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>

            <label for="branch">Branch</label>
            <input id="branch" name="branch" type="text" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>

            <button class="button" type="submit">Create Agent</button>
        </form>
    </section>
</section>

<section class="panel">
    <h3>Agent List</h3>
    <?php if (empty($agents)): ?>
        <p>No agents created yet.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agents as $agent): ?>
                <tr>
                    <td><?php echo e($agent['id']); ?></td>
                    <td><?php echo e($agent['name']); ?></td>
                    <td><?php echo e($agent['email']); ?></td>
                    <td><?php echo e($agent['branch']); ?></td>
                    <td><?php echo e($agent['created_at']); ?></td>
                    <td>
                        <a class="small-button danger" href="agents.php?delete=<?php echo e($agent['id']); ?>" onclick="return confirmAction('Delete this agent?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
