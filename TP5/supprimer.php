`
<?php

require_once __DIR__ . '/connexion.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Méthode non autorisée.");
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    exit("Identifiant invalide.");
}


$sql = "SELECT id FROM etudiants WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

$etudiant = $stmt->fetch();

if (!$etudiant) {
    exit("Aucun étudiant trouvé avec cet identifiant.");
}


$sql = "DELETE FROM etudiants WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);


if ($stmt->rowCount() > 0) {
    header("Location: liste.php?message=supprime");
    exit;
} else {
    echo "La suppression a échoué.";
}

?>
