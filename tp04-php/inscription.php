<?php
require_once 'fonctions.php';

$erreurs = [];
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validations
    if (empty($username)) {
        $erreurs[] = "Le nom d'utilisateur est obligatoire.";
    } elseif (isset($_SESSION['users'][$username])) {
        $erreurs[] = "Ce nom d'utilisateur existe déjà.";
    }

    if (strlen($password) < 6) {
        $erreurs[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    if ($password !== $confirm_password) {
        $erreurs[] = "Les deux mots de passe ne correspondent pas.";
    }

    // Enregistrement
    if (empty($erreurs)) {
        $_SESSION['users'][$username] = password_hash($password, PASSWORD_DEFAULT);
        $succes = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <?php if (!empty($erreurs)): ?>
        <ul style="color:red;">
            <?php foreach ($erreurs as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if ($succes): ?>
        <p style="color:green;"><?= htmlspecialchars($succes) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nom d'utilisateur :</label><br>
        <input type="text" name="username" required><br><br>
        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>
        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="confirm_password" required><br><br>
        <button type="submit">S'inscrire</button>
    </form>
    <p><a href="login.php">Deja inscrit ? Connexion</a></p>
</body>
</html>