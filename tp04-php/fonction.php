<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        'admin' => password_hash('123456', PASSWORD_DEFAULT)
    ];
}

function estConnecte(): bool {
    return isset($_SESSION['connecte']) && $_SESSION['connecte'] === true;
}

function protegerPage(): void {
    if (!estConnecte()) {
        header("Location: login.php");
        exit;
    }
}