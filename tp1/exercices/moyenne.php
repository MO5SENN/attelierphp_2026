<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul de la moyenne</title>
</head>
<body>
    <h1>Calcul de la moyenne</h1>

    <form method="get">
        <p><label>Note 1 : <input type="number" step="any" name="note1"></label></p>
        <p><label>Note 2 : <input type="number" step="any" name="note2"></label></p>
        <p><label>Note 3 : <input type="number" step="any" name="note3"></label></p>
        <button type="submit">Calculer</button>
    </form>

    <?php
    if (
        isset($_GET['note1'], $_GET['note2'], $_GET['note3'])
        && $_GET['note1'] !== ''
        && $_GET['note2'] !== ''
        && $_GET['note3'] !== ''
    ) {
        $note1 = (float) $_GET['note1'];
        $note2 = (float) $_GET['note2'];
        $note3 = (float) $_GET['note3'];

        $moyenne = ($note1 + $note2 + $note3) / 3;

        if ($moyenne < 10) {
            $appreciation = "Insuffisant";
        } elseif ($moyenne < 12) {
            $appreciation = "Passable";
        } elseif ($moyenne < 14) {
            $appreciation = "Assez bien";
        } elseif ($moyenne < 16) {
            $appreciation = "Bien";
        } else {
            $appreciation = "Très bien";
        }

        echo "<h2>Résultat</h2>";
        echo "<p>Moyenne : " . round($moyenne, 2) . "</p>";
        echo "<p>Appréciation : $appreciation</p>";
    }
    ?>
</body>
</html>