<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon premier programme PHP</title>
</head>
<body>
    <h1>Bienvenue dans mon application PHP</h1>

    <?php
    $nom = "Ali";
    $prenom = "Ahmed";
    $formation = "Informatique";
    $niveau = "Licence";
    $annee = "2025/2026";
    ?>

    <p>Nom : <?php echo $nom; ?></p>
    <p>Prenom : <?php echo $prenom; ?></p>
    <p>Formation : <?php echo $formation; ?></p>
    <p>Niveau : <?php echo $niveau; ?></p>
    <p>Annee universitaire : <?php echo $annee; ?></p>
</body>
</html>