<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Nom : " . $_SESSION['nom'] . "<br>";
    echo "Prénom : " . $_SESSION['prenom'] . "<br>";
    echo "Formation : " . $_SESSION['formation'] . "<br>";
    echo "Âge : " . $_SESSION['age'] . "<br>";
    echo "Email : " . $_SESSION['email'] . "<br>";
} else {
    echo "Aucune session : vous êtes déconnecté.";
}