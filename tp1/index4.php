<?php
$note = 14.5; 
if ($note < 10) {
    echo "<p>Note : $note -> Ajourné</p>";
} elseif ($note >= 10 && $note < 12) {
    echo "<p>Note : $note -> Passable</p>";
} elseif ($note >= 12 && $note < 14) {
    echo "<p>Note : $note -> Assez bien</p>";
} elseif ($note >= 14 && $note < 16) {
    echo "<p>Note : $note -> Bien</p>";
} else {
    echo "<p>Note : $note -> Très bien</p>";
}
?>