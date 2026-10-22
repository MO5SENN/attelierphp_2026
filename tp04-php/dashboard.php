<?php
require_once 'fonctions.php';
protegerPage();

$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changement_mdp'])) {
    $ancien = $_POST['ancien_mdp'] ?? '';
    $nouveau = $_POST['nouveau_mdp'] ?? '';
    $user = $_SESSION['username'];

    if (password_verify($ancien, $_SESSION['users'][$user])) {
        if (strlen($nouveau) >= 6) {
            $_SESSION['users'][$user] = password_hash($nouveau, PASSWORD_DEFAULT);
            $message = "Mot de passe modifie avec succees.";
        } else {
            $message = "Le nouveau mot de passe doit faire au moins 6 caractères.";
        }
    } else {
        $message = "Ancien mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Tableau de bord</h1>
    <p>Utilisateur connecte : <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>

    <h3>Gestion des etudiants</h3>
    <ul>
        <li><a href="ajouter.php">Ajouter un etudiant</a></li>
        <li><a href="rechercher.php">Rechercher un etudiant</a></li>
        <li><a href="logout.php">Se deconnecter</a></li>
    </ul>

    <hr>
    <h4>Bonus : Modifier mon mot de passe</h4>
    <?php if ($message): ?>
        <p><em><?= htmlspecialchars($message) ?></em></p>
    <?php endif; ?>
    <form method="POST">
        <input type="hidden" name="changement_mdp" value="1">
        <label>Ancien mot de passe :</label><br>
        <input type="password" name="ancien_mdp" required><br>
        <label>Nouveau mot de passe :</label><br>
        <input type="password" name="nouveau_mdp" required><br><br>
        <button type="submit">Changer le mot de passe</button>
    </form>
</body>
</html>