<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
</head>
<body>
    <h1>Gestion simplifiée des étudiants</h1>

    <form method="get">
        <p><label>Nom : <input type="text" name="nom"></label></p>
        <p><label>Prénom : <input type="text" name="prenom"></label></p>
        <p><label>Âge : <input type="number" name="age"></label></p>
        <p><label>Formation : <input type="text" name="formation"></label></p>
        <p><label>Moyenne : <input type="number" step="0.01" name="moyenne"></label></p>
        <button type="submit">Valider</button>
    </form>

    <?php
    if (isset($_GET['nom']) && isset($_GET['moyenne'])) {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $age = $_GET['age'];
        $formation = $_GET['formation'];
        $moyenne = (float) $_GET['moyenne'];

        if ($moyenne >= 10) {
            $resultat = "Admis";
        } else {
            $resultat = "Ajourné";
        }

        echo "<hr>";
        echo "<h2>FICHE ÉTUDIANT</h2>";
        echo "<p>Nom : $nom</p>";
        echo "<p>Prénom : $prenom</p>";
        echo "<p>Âge : $age</p>";
        echo "<p>Formation : $formation</p>";
        echo "<p>Moyenne : $moyenne</p>";
        echo "<p>Résultat : $resultat</p>";
        echo "<hr>";
    }
    ?>
</body>
</html>