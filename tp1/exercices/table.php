<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Table de multiplication</title>
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
            max-width: 400px;
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
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Table de multiplication</h2>
        <form method="get">
            <label for="nombre">Saisir un nombre :</label>
            <input type="number" id="nombre" name="nombre" required>
            <button type="submit">Afficher la table</button>
        </form>

        <?php
        if (isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];
            echo "<hr>";
            echo "<h3>Table de : $nombre</h3>";
            echo "<table>";
            echo "<tr><th>Opération</th><th>Résultat</th></tr>";
            
            for ($i = 1; $i <= 10; $i++) {
                $resultat = $nombre * $i;
                echo "<tr><td>$nombre x $i</td><td>$resultat</td></tr>";
            }
            
            echo "</table>";
        }
        ?>
    </div>

</body>
</html>