<?php
session_start();
if (isset($_SESSION['nom'])){
    echo "bienvenue dans votre espace prive";
}else{
    echo "Acces refuse  ";
}
?>