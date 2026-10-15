<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice</title>
</head>
<body>
    <h1>Calculatrice simple</h1>

    <form method="get">
        <p><label>Nombre 1 : <input type="number" step="any" name="a"></label></p>
        <p><label>Nombre 2 : <input type="number" step="any" name="b"></label></p>
        <button type="submit">Calculer</button>
    </form>

    <?php
    if (isset($_GET['a']) && isset($_GET['b']) && $_GET['a'] !== '' && $_GET['b'] !== '') {
        $a = (float) $_GET['a'];
        $b = (float) $_GET['b'];

        echo "<p>Somme : " . ($a + $b) . "</p>";
        echo "<p>Différence : " . ($a - $b) . "</p>";
        echo "<p>Produit : " . ($a * $b) . "</p>";

        if ($b == 0) {
            echo "<p>Quotient : impossible (division par zéro)</p>";
            echo "<p>Reste : impossible (division par zéro)</p>";
        } else {
            echo "<p>Quotient : " . ($a / $b) . "</p>";
            echo "<p>Reste : " . fmod($a, $b) . "</p>";
        }
    }
    ?>
</body>
</html>