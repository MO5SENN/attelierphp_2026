<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/connexion_bdd.php';

protegerPage();

$erreur = '';
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ancien = $_POST['ancien'] ?? '';
    $nouveau = $_POST['nouveau'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    $sql = "SELECT password_hash FROM utilisateurs WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_SESSION['user_id']]);

    $utilisateur = $stmt->fetch();

    if (!$utilisateur || !password_verify($ancien, $utilisateur['password_hash'])) {
        $erreur = "Ancien mot de passe incorrect.";
    } elseif (strlen($nouveau) < 8) {
        $erreur = "Le mot de passe doit contenir au moins 8 caractères.";
    } elseif ($nouveau !== $confirmation) {
        $erreur = "Les mots de passe ne correspondent pas.";
    } else {
        $hash = password_hash($nouveau, PASSWORD_DEFAULT);

        $sql = "UPDATE utilisateurs SET password_hash = :hash
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'hash' => $hash,
            'id' => $_SESSION['user_id']
        ]);

        $succes = "Mot de passe modifié avec succès.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
</head>
<body>

<h1>Mon profil</h1>

<p><a href="dashboard.php">Retour au tableau de bord</a></p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<?php if ($erreur !== ''): ?>
    <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<?php if ($succes !== ''): ?>
    <p style="color:green;"><?= htmlspecialchars($succes) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Ancien mot de passe :</label>
    <input type="password" name="ancien" required>
    <br><br>

    <label>Nouveau mot de passe :</label>
    <input type="password" name="nouveau" required>
    <br><br>

    <label>Confirmation :</label>
    <input type="password" name="confirmation" required>
    <br><br>

    <button type="submit">Modifier le mot de passe</button>
</form>

</body>
</html>