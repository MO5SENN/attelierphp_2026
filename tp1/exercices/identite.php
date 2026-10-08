<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte d'identité numérique</title>
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
            margin-bottom: 20px;
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
        /* Style de la carte d'identité */
        .id-card {
            width: 400px;
            background: linear-gradient(135deg, #007BFF, #00c6ff);
            color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .id-card h3 {
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.5);
            padding-bottom: 8px;
            margin-top: 0;
            letter-spacing: 1px;
        }
        .id-content p {
            font-size: 16px;
            margin: 8px 0;
        }
        .id-content span {
            font-weight: bold;
            background: rgba(0,0,0,0.15);
            padding: 2px 6px;
            border-radius: 4px;
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

            <label for="naissance">Date de naissance :</label>
            <input type="date" id="naissance" name="naissance" required>

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>

            <label for="profession">Profession :</label>
            <input type="text" id="profession" name="profession" required>

            <button type="submit">Générer la carte</button>
        </form>

        <?php
        if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['naissance']) && isset($_GET['ville']) && isset($_GET['profession'])) {
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $naissance = $_GET['naissance'];
            $ville = $_GET['ville'];
            $profession = $_GET['profession'];

            echo "<br>";
            echo "<div class='id-card'>";
            echo "<h3>CARTE D'IDENTITÉ NUMÉRIQUE</h3>";
            echo "<div class='id-content'>";
            echo "<p><strong>Nom :</strong> <span>$nom</span></p>";
            echo "<p><strong>Prénom :</strong> <span>$prenom</span></p>";
            echo "<p><strong>Date de naissance :</strong> <span>$naissance</span></p>";
            echo "<p><strong>Ville :</strong> <span>$ville</span></p>";
            echo "<p><strong>Profession :</strong> <span>$profession</span></p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>