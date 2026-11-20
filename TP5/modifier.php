```php
<?php

require_once __DIR__ . '/connexion.php';



$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    exit("Identifiant invalide.");
}


$sql = "SELECT id, nom, prenom, age, formation, moyenne
        FROM etudiants
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

$etudiant = $stmt->fetch();

if (!$etudiant) {
    exit("Étudiant introuvable.");
}


$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer les nouvelles valeurs
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $age = $_POST['age'] ?? '';
    $formation = trim($_POST['formation'] ?? '');
    $moyenne = $_POST['moyenne'] ?? '';

    
    if (
        $nom === '' ||
        $prenom === '' ||
        $formation === '' ||
        filter_var($age, FILTER_VALIDATE_INT) === false ||
        !is_numeric($moyenne) ||
        $age < 16 ||
        $age > 100 ||
        $moyenne < 0 ||
        $moyenne > 20
    ) {
        $message = "Données invalides.";

    } else {

       
        $sql = "UPDATE etudiants
                SET nom = :nom,
                    prenom = :prenom,
                    age = :age,
                    formation = :formation,
                    moyenne = :moyenne
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

       
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'formation' => $formation,
            'moyenne' => $moyenne,
            'id' => $id
        ]);

        $message = "Étudiant modifié avec succès !";

        
        $stmt = $pdo->prepare(
            "SELECT id, nom, prenom, age, formation, moyenne
             FROM etudiants
             WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);
        $etudiant = $stmt->fetch();
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

    <?php if ($message !== ''): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST">

        <label for="nom">Nom :</label>
        <input
            type="text"
            id="nom"
            name="nom"
            value="<?= htmlspecialchars($etudiant['nom']) ?>"
            required
        >

        <br><br>

        <label for="prenom">Prénom :</label>
        <input
            type="text"
            id="prenom"
            name="prenom"
            value="<?= htmlspecialchars($etudiant['prenom']) ?>"
            required
        >

        <br><br>

        <label for="age">Âge :</label>
        <input
            type="number"
            id="age"
            name="age"
            min="16"
            max="100"
            value="<?= (int) $etudiant['age'] ?>"
            required
        >

        <br><br>

        <label for="formation">Formation :</label>
        <input
            type="text"
            id="formation"
            name="formation"
            value="<?= htmlspecialchars($etudiant['formation']) ?>"
            required
        >

        <br><br>

        <label for="moyenne">Moyenne :</label>
        <input
            type="number"
            id="moyenne"
            name="moyenne"
            min="0"
            max="20"
            step="0.01"u
            value="<?= htmlspecialchars((string) $etudiant['moyenne']) ?>"
            required
        >

        <br><br>

        <button type="submit">Enregistrer les modifications</button>

    </form>

    <br>

    <a href="liste.php">Retour à la liste</a>

</body>
</html>
```