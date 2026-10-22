<?php
session_start();

$_SESSION['nom'] = "Ahmed";
$_SESSION['prenom'] = "Ali";
$_SESSION['formation'] = "Informatique";
$_SESSION['age'] = 18;
$_SESSION['email'] = "ademmoussa289@gmail.com";

echo "Session créée.";