<?php
require_once __DIR__ . '/includes/auth.php';

if (is_logged_in()) {
    redirect('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm_password'] ?? '');

    if (!check_required(['name', 'email', 'password', 'confirm_password'], $_POST)) {
        flash('All fields are required.', 'danger');
    } elseif ($password !== $confirm) {
        flash('Passwords do not match.', 'danger');
    } else {
        $stmt = db()->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt->execute([$email]);

        if ($stmt->fetchColumn() > 0) {
            flash('Email already registered.', 'danger');
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = db()->prepare('INSERT INTO users (name, email, password, role, branch, created_at) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$name, $email, $hash, 'user', '', date('Y-m-d H:i:s')]);
            flash('Registration successful. You can now login.', 'success');
            redirect('login.php');
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Register as User</h2>
    <form action="register.php" method="post" class="form-grid">
        <label for="name">Full Name</label>
        <input id="name" name="name" type="text" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <label for="confirm_password">Confirm Password</label>
        <input id="confirm_password" name="confirm_password" type="password" required>

        <button class="button" type="submit">Register</button>
    </form>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
