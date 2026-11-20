<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Gestion des étudiants</h1>
        <p>Bienvenue dans notre application de gestion des étudiants.</p>
    </header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="liste.php">Liste des étudiants</a>
        <a href="ajouter.php">Ajouter un étudiant</a>
        <a href="rechercher.php">Rechercher un étudiant</a>
    </nav>

    <main>
        <h2>Page d'accueil</h2>

        <p>Choisissez une opération :</p>

        <div class="menu">

            <a href="liste.php" class="carte">
                <h3>Liste</h3>
                <p>Afficher tous les étudiants</p>
            </a>

            <a href="ajouter.php" class="carte">
                <h3>Ajouter</h3>
                <p>Ajouter un nouvel étudiant</p>
            </a>

            <a href="rechercher.php" class="carte">
                <h3>Rechercher</h3>
                <p>Rechercher un étudiant par son nom</p>
            </a>

        </div>
    </main>

    <footer>
        <p>Gestion des étudiants - 2026</p>
    </footer>

</body>
</html>