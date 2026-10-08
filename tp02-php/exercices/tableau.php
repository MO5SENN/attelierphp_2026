<?php
$notes = [12, 15, 9, 14, 16];

function calculerSomme($notes) {
    return array_sum($notes);
}

function calculerMoyenneNotes($notes) {
    if (count($notes) === 0) return 0;
    return calculerSomme($notes) / count($notes);
}

function trouverMaximum($notes) {
    return max($notes);
}

function trouverMinimum($notes) {
    return min($notes);
}

function compterNotesSuperieures($notes) {
    $compte = 0;
    foreach ($notes as $note) {
        if ($note >= 10) {
            $compte++;
        }
    }
    return $compte;
}