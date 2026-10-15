<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil étudiant</title>
</head>
<body>
    <?php
    $prenom = "Adem";
    $nom = "Moussa";
    $age = 20;
    $formation = "Informatique";
    $annee = "2eme annee";
    $moyenne = 14.5;

    if ($moyenne >= 10) {
        $resultat = "Année validée";
    } else {
        $resultat = "Année non validée";
    }
    ?>

    <h1>Profil étudiant</h1>
    <p>Nom complet : <?php echo $prenom . " " . $nom; ?></p>
    <p>Âge : <?php echo $age; ?> ans</p>
    <p>Formation : <?php echo $formation; ?></p>
    <p>Année : <?php echo $annee; ?></p>
    <p>Moyenne : <?php echo $moyenne; ?></p>
    <p>Résultat : <?php echo $resultat; ?></p>
</body>
</html>