<?php
function determinerResultat($moyenne) {
    if ($moyenne >= 10) {
        return "Admis";
    }
    return "Ajourné";
}

function appreciation($moyenne) {
    if ($moyenne < 10) {
        return "Insuffisant";
    } elseif ($moyenne < 12) {
        return "Passable";
    } elseif ($moyenne < 14) {
        return "Assez bien";
    } elseif ($moyenne < 16) {
        return "Bien";
    }
    return "Très bien";
}

function calculerMoyenneClasse($etudiants) {
    if (count($etudiants) === 0) return 0;
    $somme = 0;
    foreach ($etudiants as $etudiant) {
        $somme += $etudiant["moyenne"];
    }
    return $somme / count($etudiants);
}

function compterAdmis($etudiants) {
    $compte = 0;
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 10) {
            $compte++;
        }
    }
    return $compte;
}

function rechercherEtudiant($etudiants, $nom) {
    foreach ($etudiants as $etudiant) {
        if (strcasecmp($etudiant["nom"], $nom) === 0) {
            return $etudiant;
        }
    }
    return null;
}

function filtrerParMoyenne($etudiants, $moyenneMinimale) {
    $resultat = [];
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= $moyenneMinimale) {
            $resultat[] = $etudiant;
        }
    }
    return $resultat;
}

function trouverMeilleurEtudiant($etudiants) {
    if (count($etudiants) === 0) return null;
    $meilleur = $etudiants[0];
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] > $meilleur["moyenne"]) {
            $meilleur = $etudiant;
        }
    }
    return $meilleur;
}
function plusFaibleMoyenne($etudiants) {
    if (count($etudiants) === 0) return null;
    $min = $etudiants[0]["moyenne"];
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] < $min) {
            $min = $etudiant["moyenne"];
        }
    }
    return $min;
}

function nombreEtudiantsSuperieur14($etudiants) {
    $c = 0;
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 14) {
            $c++;
        }
    }
    return $c;
}

function pourcentageAdmis($etudiants) {
    if (count($etudiants) === 0) return 0;
    return (compterAdmis($etudiants) / count($etudiants)) * 100;
}