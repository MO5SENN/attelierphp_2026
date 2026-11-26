<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/connexion_bdd.php';

protegerPage();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    exit("Identifiant invalide.");
}

$sql = "SELECT * FROM etudiants WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$etudiant = $stmt->fetch();

if (!$etudiant) {
    exit("Étudiant introuvable.");
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nom === '' || $prenom === '' || $email === '') {
        $erreur = "Veuillez remplir tous les champs.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Adresse email invalide.";

    } else {

        $sql = "UPDATE etudiants
                SET nom = :nom,
                    prenom = :prenom,
                    email = :email
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'id' => $id
        ]);

        header("Location: etudiants.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
</head>
<body>

<h1>Modifier un étudiant</h1>

<p><a href="etudiants.php">Retour à la liste</a></p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<?php if ($erreur !== ''): ?>
    <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<form method="POST">

    <label>Nom :</label>
    <input type="text" name="nom"
           value="<?= htmlspecialchars($etudiant['nom']) ?>" required>
    <br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom"
           value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>
    <br><br>

    <label>Email :</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($etudiant['email']) ?>" required>
    <br><br>

    <button type="submit">Modifier</button>

</form>

</body>
</html>