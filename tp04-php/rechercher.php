<?php
require_once 'fonctions.php';
protegerPage(); // 

$resultats = [];
$recherche = trim($_GET['q'] ?? '');

if (!empty($recherche) && file_exists('etudiants.txt')) {
    $lignes = file('etudiants.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lignes as $ligne) {
        if (stripos($ligne, $recherche) !== false) {
            $resultats[] = $ligne;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un etudiant</title>
</head>
<body>
    <h2>Rechercher un etudiant</h2>
    <p><a href="dashboard.php">Retour au tableau de bord</a></p>

    <form method="GET">
        <input type="text" name="q" value="<?= htmlspecialchars($recherche) ?>" placeholder="Nom ou prenom..." required>
        <button type="submit">Rechercher</button>
    </form>

    <?php if (!empty($recherche)): ?>
        <h3>Resultats pour  <?= htmlspecialchars($recherche) ?> » :</h3>
        <?php if (empty($resultats)): ?>
            <p>Aucun etudiant trouve.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($resultats as $res): ?>
                    <li><?= htmlspecialchars($res) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>