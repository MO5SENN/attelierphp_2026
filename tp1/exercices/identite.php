<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte d'identité</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 20px; }
        .carte {
            width: 360px;
            background: #fff;
            border: 2px solid #2c3e50;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }
        .carte h2 {
            margin: 0 0 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #2c3e50;
            color: #2c3e50;
        }
        .carte p { margin: 8px 0; }
        .carte strong { color: #2c3e50; }
    </style>
</head>
<body>
    <h1>Carte d'identité numérique</h1>

    <form method="get">
        <p><label>Nom : <input type="text" name="nom"></label></p>
        <p><label>Prénom : <input type="text" name="prenom"></label></p>
        <p><label>Date de naissance : <input type="date" name="naissance"></label></p>
        <p><label>Ville : <input type="text" name="ville"></label></p>
        <p><label>Profession : <input type="text" name="profession"></label></p>
        <button type="submit">Générer la carte</button>
    </form>

    <?php
    if (isset($_GET['nom'], $_GET['prenom'], $_GET['naissance'], $_GET['ville'], $_GET['profession'])
        && $_GET['nom'] !== '') {

        $nom = htmlspecialchars($_GET['nom']);
        $prenom = htmlspecialchars($_GET['prenom']);
        $naissance = htmlspecialchars($_GET['naissance']);
        $ville = htmlspecialchars($_GET['ville']);
        $profession = htmlspecialchars($_GET['profession']);

        echo "<div class='carte'>";
        echo "<h2>CARTE D'IDENTITÉ</h2>";
        echo "<p><strong>Nom :</strong> $nom</p>";
        echo "<p><strong>Prénom :</strong> $prenom</p>";
        echo "<p><strong>Né(e) le :</strong> $naissance</p>";
        echo "<p><strong>Ville :</strong> $ville</p>";
        echo "<p><strong>Profession :</strong> $profession</p>";
        echo "</div>";
    }
    ?>
</body>
</html>