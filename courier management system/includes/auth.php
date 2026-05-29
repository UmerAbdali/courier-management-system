<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function login_user($email, $password) {
    $stmt = db()->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        return true;
    }

    return false;
}

function logout_user() {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}

function current_user() {
    return $_SESSION['user'] ?? null;
}

function is_logged_in() {
    return !empty($_SESSION['user']);
}

function require_login() {
    if (!is_logged_in()) {
        flash('Please log in to continue.', 'warning');
        redirect('login.php');
    }
}

function require_role($roles) {
    require_login();
    $user = current_user();
    $allowed = (array) $roles;

    if (!in_array($user['role'], $allowed, true)) {
        flash('Access denied.', 'danger');
        redirect('index.php');
    }
}

function refresh_user() {
    if (is_logged_in()) {
        $stmt = db()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_SESSION['user']['id']]);
        $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

function branch_for_user() {
    $user = current_user();
    return $user['role'] === 'agent' ? $user['branch'] : null;
}
