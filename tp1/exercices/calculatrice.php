<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculateur Simple</title>
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
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Calculateur</h2>
        <form method="get">
            <label for="a">Nombre 1 ($a) :</label>
            <input type="number" step="any" id="a" name="a" required>

            <label for="b">Nombre 2 ($b) :</label>
            <input type="number" step="any" id="b" name="b" required>

            <button type="submit">Calculer</button>
        </form>

        <?php
        if (isset($_GET['a']) && isset($_GET['b'])) {
            $a = $_GET['a'];
            $b = $_GET['b'];

            $somme = $a + $b;
            $difference = $a - $b;
            $produit = $a * $b;

            echo "<hr>";
            echo "<h3>Résultats :</h3>";
            echo "<p><strong>Somme :</strong> $somme</p>";
            echo "<p><strong>Différence :</strong> $difference</p>";
            echo "<p><strong>Produit :</strong> $produit</p>";

            if ($b != 0) {
                $quotient = $a / $b;
                $reste = $a % $b;
                echo "<p><strong>Quotient :</strong> $quotient</p>";
                echo "<p><strong>Reste :</strong> $reste</p>";
            } else {
                echo "<p class='error'><strong>Quotient et Reste :</strong> Erreur ! Division par zéro impossible.</p>";
            }
        }
        ?>
    </div>

</body>
</html>