<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul de la moyenne</title>
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
        .mention {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Calcul de la moyenne</h2>
        <form method="get">
            <label for="note1">Note 1 :</label>
            <input type="number" step="0.01" min="0" max="20" id="note1" name="note1" required>

            <label for="note2">Note 2 :</label>
            <input type="number" step="0.01" min="0" max="20" id="note2" name="note2" required>

            <label for="note3">Note 3 :</label>
            <input type="number" step="0.01" min="0" max="20" id="note3" name="note3" required>

            <button type="submit">Calculer</button>
        </form>

        <?php
        if (isset($_GET['note1']) && isset($_GET['note2']) && isset($_GET['note3'])) {
            $note1 = $_GET['note1'];
            $note2 = $_GET['note2'];
            $note3 = $_GET['note3'];
            $moyenne = ($note1 + $note2 + $note3) / 3;
            
            $moyenneArrondie = number_format($moyenne, 2);
            echo "<hr>";
            echo "<h3>Résultat :</h3>";
            echo "<p><strong>Moyenne :</strong> $moyenneArrondie / 20</p>";
            echo "<p><strong>Appréciation :</strong> <span class='mention'>";
            if ($moyenne < 10) {
                echo "Insuffisant";
            } elseif ($moyenne >= 10 && $moyenne < 12) {
                echo "Passable";
            } elseif ($moyenne >= 12 && $moyenne < 14) {
                echo "Assez bien";
            } elseif ($moyenne >= 14 && $moyenne < 16) {
                echo "Bien";
            } else {
                echo "Très bien";
            }

            echo "</span></p>";
        }
        ?>
    </div>

</body>
</html>