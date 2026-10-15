<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>

    <form method="get">
        <label for="nom">Votre nom :</label>
        <input type="text" id="nom" name="nom">
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if (isset($_GET['nom'])) {
        $nom = $_GET['nom'];
        echo "<p>Bonjour $nom !</p>";
    }
    ?>
</body>
</html>