<?php
require_once __DIR__ . '/config.php';

function db() {
    static $pdo;

    if ($pdo) {
        return $pdo;
    }

    if (!file_exists(DB_FILE)) {
        die('Database file not found. Run install.php first.');
    }

    $pdo = new PDO('sqlite:' . DB_FILE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
