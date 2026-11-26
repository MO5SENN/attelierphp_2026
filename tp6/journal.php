<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/connexion_bdd.php';

protegerAdmin();

$sql = "SELECT id, username, role, derniere_connexion
        FROM utilisateurs
        ORDER BY derniere_connexion DESC";

$stmt = $pdo->query($sql);
$utilisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Journal de connexion</title>
</head>
<body>

<h1>Journal de connexion</h1>

<p><a href="dashboard.php">Retour au tableau de bord</a></p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Rôle</th>
            <th>Dernière connexion</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($utilisateurs as $u): ?>
        <tr>
            <td><?= (int) $u['id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td><?= htmlspecialchars($u['derniere_connexion'] ?? 'Jamais connecté') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>