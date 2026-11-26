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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "DELETE FROM etudiants WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: etudiants.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un étudiant</title>
</head>
<body>

<h1>Supprimer un étudiant</h1>

<p><a href="etudiants.php">Retour à la liste</a></p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<p>
    Voulez-vous vraiment supprimer l'étudiant
    <strong>
        <?= htmlspecialchars($etudiant['nom']) ?>
        <?= htmlspecialchars($etudiant['prenom']) ?>
    </strong> ?
</p>

<form method="POST">
    <button type="submit">Confirmer la suppression</button>
    <a href="etudiants.php">Annuler</a>
</form>

</body>
</html>