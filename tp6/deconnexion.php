<?php
require_once __DIR__ . '/auth.php';
protegerPage();
$_SESSION = [];
session_unset();
session_destroy();
header("Location: connexion.php");
exit;