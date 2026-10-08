<?php
for ($i = 1; $i <= 20; $i++) {
    echo "$i ";
}
?>
<?php
for ($i = 2; $i <= 20; $i += 2) {
    if ($i % 2 == 0) { echo $i; }
}
?>
<?php
for ($i = 1; $i <= 10; $i++) {
    $resultat = 5 * $i;
    echo "5 x $i = $resultat<br>";
}
?>
<?php
for ($i = 10; $i >= 1; $i--) {
    echo "$i ";
}
?>