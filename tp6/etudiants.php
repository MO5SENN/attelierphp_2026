<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/connexion_bdd.php';

protegerPage();

$sql = "SELECT * FROM etudiants";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
</head>
<body>

<h1>Gestion des étudiants</h1>

<p><a href="dashboard.php">Retour au tableau de bord</a></p>
<p><a href="ajouter.php">Ajouter un étudiant</a></p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($etudiants as $e): ?>
        <tr>
            <td><?= (int) $e['id'] ?></td>
            <td><?= htmlspecialchars($e['nom']) ?></td>
            <td><?= htmlspecialchars($e['prenom']) ?></td>
            <td><?= htmlspecialchars($e['email']) ?></td>
            <td>
                <a href="modifier.php?id=<?= (int) $e['id'] ?>">Modifier</a>
                |
                <a href="supprimer.php?id=<?= (int) $e['id'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>