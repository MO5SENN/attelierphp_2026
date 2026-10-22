<?php
require_once 'fonctions.php';

session_unset();
session_destroy();

header("Location: login.php");
exit;