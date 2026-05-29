<?php
require_once __DIR__ . '/includes/auth.php';

if (is_logged_in()) {
    redirect('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        flash('Email and password are required.', 'danger');
    } elseif (login_user($email, $password)) {
        flash('Login successful.', 'success');
        redirect('dashboard.php');
    } else {
        flash('Invalid credentials.', 'danger');
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="panel">
    <h2>Login</h2>
    <form action="login.php" method="post" class="form-grid">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <button class="button" type="submit">Login</button>
    </form>
    <p>New user? <a href="register.php">Register here</a>.</p>
</section>
<?php require_once __DIR__ . '/includes/footer.php';
