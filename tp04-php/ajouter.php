<?php
require_once 'fonctions.php';
protegerPage(); 

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    
    if (!empty($nom) && !empty($prenom)) {
        
        $etudiant = "Nom: " . htmlspecialchars($nom) . ", Prenom: " . htmlspecialchars($prenom) . "\n";
        file_put_contents('etudiants.txt', $etudiant, FILE_APPEND);
        $message = "etudiant ajoute avec succes !";
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un etudiant</title>
</head>
<body>
    <h2>Ajouter un etudiant</h2>
    <p><a href="dashboard.php"> Retour au tableau de bord</a></p>
0
    <?php if ($message): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>
        <label>Prenom :</label><br>
        <input type="text" name="prenom" required><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>