<?php
$nom = "Ali";
$age = 20;
$formation = "Informatique";
$annee = "2ème année";
$moyenne = 14.5; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 5px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        .valide {
            color: green;
            font-weight: bold;
        }
        .non-valide {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Profil étudiant</h2>
        <p><strong>Nom complet :</strong> <?php echo "$prenom $nom"; ?></p>
        <p><strong>Âge :</strong> <?php echo "$age ans"; ?></p>
        <p><strong>Formation :</strong> <?php echo $formation; ?></p>
        <p><strong>Année :</strong> <?php echo $annee; ?></p>
        <p><strong>Moyenne :</strong> <?php echo $moyenne; ?></p>
        
        <p>
            <strong>Résultat :</strong> 
            <?php 
            if ($moyenne >= 10) {
                echo "<span class='valide'>Année validée</span>";
            } else {
                echo "<span class='non-valide'>Année non validée</span>";
            }
            ?>
        </p>
    </div>

</body>
</html>