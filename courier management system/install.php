<?php
require_once __DIR__ . '/includes/config.php';

if (!is_dir(dirname(DB_FILE))) {
    mkdir(dirname(DB_FILE), 0755, true);
}

if (file_exists(DB_FILE)) {
    echo "Database already exists in data/database.sqlite\n";
    exit;
}

$pdo = new PDO('sqlite:' . DB_FILE);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT NOT NULL,
    branch TEXT DEFAULT '',
    created_at TEXT NOT NULL
)");

$pdo->exec("CREATE TABLE customers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    mobile TEXT NOT NULL,
    address TEXT NOT NULL,
    created_at TEXT NOT NULL
)");

$pdo->exec("CREATE TABLE couriers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    consignment_no TEXT NOT NULL UNIQUE,
    sender_name TEXT NOT NULL,
    sender_city TEXT NOT NULL,
    receiver_name TEXT NOT NULL,
    receiver_city TEXT NOT NULL,
    weight TEXT NOT NULL,
    service_type TEXT NOT NULL,
    status TEXT NOT NULL,
    branch TEXT NOT NULL,
    customer_id INTEGER,
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL,
    FOREIGN KEY(customer_id) REFERENCES customers(id)
)");

$adminPassword = password_hash('password123', PASSWORD_DEFAULT);
$agentPassword = password_hash('agentpass', PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO users (name, email, password, role, branch, created_at) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute(['Admin User', 'admin@example.com', $adminPassword, 'admin', '', date('Y-m-d H:i:s')]);
$stmt->execute(['Agent User', 'agent@example.com', $agentPassword, 'agent', 'Karachi', date('Y-m-d H:i:s')]);

echo "Installation complete. You can now run the application with: php -S localhost:8000\n";
