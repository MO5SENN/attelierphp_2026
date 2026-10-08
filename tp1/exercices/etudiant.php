<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 450px;
        }
        h2 {
            color: #333;
            text-align: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 5px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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

    <div class="container">
        <h2>Saisie des informations</h2>
        <form method="get">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" required>

            <label for="formation">Formation :</label>
            <input type="text" id="formation" name="formation" required>

            <label for="moyenne">Moyenne :</label>
            <input type="number" step="0.01" id="moyenne" name="moyenne" required>

            <button type="submit">Valider</button>
        </form>

        <?php
        if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['age']) && isset($_GET['formation']) && isset($_GET['moyenne'])) {
            
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $age = $_GET['age'];
            $formation = $_GET['formation'];
            $moyenne = $_GET['moyenne'];

            echo "<hr>";
            echo "<h2>FICHE ÉTUDIANT</h2>";
            echo "<p><strong>Nom :</strong> $nom</p>";
            echo "<p><strong>Prénom :</strong> $prenom</p>";
            echo "<p><strong>Âge :</strong> $age ans</p>";
            echo "<p><strong>Formation :</strong> $formation</p>";
            echo "<p><strong>Moyenne :</strong> $moyenne</p>";
            
            echo "<p><strong>Résultat :</strong> ";
            if ($moyenne >= 10) {
                echo "<span class='valide'>Année validée</span>";
            } else {
                echo "<span class='non-valide'>Année non validée</span>";
            }
            echo "</p>";
        }
        ?>
    </div>

</body>
</html>