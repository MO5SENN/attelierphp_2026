<?php

require_once __DIR__ . '/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Récupérer les valeurs
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $age = $_POST['age'] ?? '';
    $formation = trim($_POST['formation'] ?? '');
    $moyenne = $_POST['moyenne'] ?? '';

  
    if (
        $nom === '' ||
        $prenom === '' ||
        $formation === '' ||
        !is_numeric($age) ||
        !is_numeric($moyenne) ||
        $age < 16 ||
        $age > 100 ||
        $moyenne < 0 ||
        $moyenne > 20
    ) {
        exit("Données invalides.");
    }

    try {

        
        $sql = "INSERT INTO etudiants
        (nom, prenom, age, formation, moyenne)
        VALUES (:nom, :prenom, :age, :formation, :moyenne)";

        $stmt = $pdo->prepare($sql);

        // 4. Exécuter la requête
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
            ':formation' => $formation,
            ':moyenne' => $moyenne
        ]);

        
        echo "Étudiant ajouté avec succès !";

    } catch (PDOException $e) {

      
        echo "Erreur lors de l'ajout de l'étudiant.";
    }
}
?>