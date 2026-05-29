<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function flash($message = null, $type = 'success') {
    if ($message === null) {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }

    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
}

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function check_required(array $fields, array $data) {
    foreach ($fields as $field) {
        if (trim($data[$field] ?? '') === '') {
            return false;
        }
    }
    return true;
}
