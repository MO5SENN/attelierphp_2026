<?php
session_start();

$_SESSION['nom'] = "Ahmed";
$_SESSION['prenom'] = "Ali";
$_SESSION['formation'] = "Informatique";
$_SESSION['age'] = 21;
$_SESSION['email'] = "ahmed.ali@example.com";
?>
<!DOCTYPE html>
<html lang="fr">
<head><title>Profil</title></head>
<body>
    <p>Nom : <?= htmlspecialchars($_SESSION['nom']) ?></p>
    <p>Prenom : <?= htmlspecialchars($_SESSION['prenom']) ?></p>
    <p>Formation : <?= htmlspecialchars($_SESSION['formation']) ?></p>
    <p>age : <?= htmlspecialchars($_SESSION['age']) ?> ans</p>
    <p>Email : <?= htmlspecialchars($_SESSION['email']) ?></p>
</body>
</html>