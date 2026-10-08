<?php
$etudiants = ["Ahmed", "Sami", "Nour", "Amine"];
echo $etudiants[0];
// activite 3
<?php
foreach ($etudiants as $etudiant) {
echo "<p>$etudiant</p>";
}
//activite 4
<?php
$etudiants = ["Ahmed", "Sami", "Nour", "Amine", "Karim"]; 
$etudiants[] = "Yassine";                               
array_pop($etudiants);                                   

echo "<p>Nombre final d'étudiants : " . count($etudiants) . "</p>"; 

foreach ($etudiants as $etudiant) {
    echo "<p>$etudiant</p>";
}
// activite 5
<?php
$etudiants = ["Ahmed", "Sami", "Nour", "Amine"];
$nomRecherche = "Sami";

if (in_array($nomRecherche, $etudiants)) {
    echo "Étudiant trouvé";
} else {
    echo "Étudiant non trouvé";
}

// activite 6
<?php
$etudiant = [
    "nom" => "Khediri",
    "prenom" => "Ahmed",
    "age" => 20,
    "formation" => "Informatique",
    "moyenne" => 14.5,
    "telephone" => "12345678", 
    "ville" => "Tunis",         
    "niveau" => "2ème année"    
];

echo "<p>Nom : " . $etudiant['nom'] . "</p>";
echo "<p>Prénom : " . $etudiant['prenom'] . "</p>";
echo "<p>Âge : " . $etudiant['age'] . "</p>";
echo "<p>Formation : " . $etudiant['formation'] . "</p>";
echo "<p>Moyenne : " . $etudiant['moyenne'] . "</p>";
echo "<p>Téléphone : " . $etudiant['telephone'] . "</p>";
echo "<p>Ville : " . $etudiant['ville'] . "</p>";
echo "<p>Niveau : " . $etudiant['niveau'] . "</p>";

//activte 7

<?php
$etudiants = [
    [
        "nom" => "Khediri",
        "prenom" => "Ahmed",
        "age" => 20,
        "moyenne" => 14.5
    ],
    [
        "nom" => "Ali",
        "prenom" => "Sami",
        "age" => 21,
        "moyenne" => 11.5
    ],
    [
        "nom" => "Ben Salah",
        "prenom" => "Nour",
        "age" => 19,
        "moyenne" => 16
    ]
];

// Affichage avec foreach
foreach ($etudiants as $etudiant) {
    echo "<p>" . $etudiant['prenom'] . " " . $etudiant['nom'] . " - Moyenne : " . $etudiant['moyenne'] . "</p>";
}

// activite 8
<?php
$etudiants = [
    ["nom" => "Khediri", "prenom" => "Ahmed", "age" => 20, "moyenne" => 14.5],
    ["nom" => "Ali", "prenom" => "Sami", "age" => 21, "moyenne" => 11.5],
    ["nom" => "Ben Salah", "prenom" => "Nour", "age" => 19, "moyenne" => 16]
];
?>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Âge</th>
        <th>Moyenne</th>
    </tr>
    <?php foreach ($etudiants as $etudiant): ?>
        <tr>
            <td><?php echo $etudiant['nom']; ?></td>
            <td><?php echo $etudiant['prenom']; ?></td>
            <td><?php echo $etudiant['age']; ?></td>
            <td><?php echo $etudiant['moyenne']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

// activite 9

<?php

function afficherBonjour() {
    echo "Bonjour !";
}
afficherBonjour();


function afficherBonjourNom($nom) {
    echo "Bonjour $nom <br>";
}

afficherBonjourNom("Ahmed");
afficherBonjourNom("Nour");

// activite 10

<?php
function additionner($a, $b) {
    return $a + $b;
}

$resultat = additionner(10, 20);
echo $resultat; 

// activite 11

<?php
function calculerMoyenne($note1, $note2, $note3) {
    return ($note1 + $note2 + $note3) / 3;
}


echo calculerMoyenne(12, 14, 16); 

// activite 12

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

// activite 13

<?php
function afficherEtudiant($etudiant) {
    echo "<p>Nom : " . $etudiant['nom'] . "</p>";
    echo "<p>Prénom : " . $etudiant['prenom'] . "</p>";
    echo "<p>Âge : " . $etudiant['age'] . "</p>";
    echo "<p>Moyenne : " . $etudiant['moyenne'] . "</p>";
    echo "<p>Résultat : " . determinerResultat($etudiant['moyenne']) . "</p>";
    echo "<p>Appréciation : " . appreciation($etudiant['moyenne']) . "</p>";
}

// activite 14

<?php
function calculerMoyenneClasse($etudiants) {
    $somme = 0;
    foreach ($etudiants as $etudiant) {
        $somme += $etudiant["moyenne"];
    }
    return $somme / count($etudiants);
}

// Activite 15

<?php
function rechercherEtudiant($etudiants, $nom) {
    foreach ($etudiants as $etudiant) {
        if ($etudiant["nom"] === $nom) {
            return $etudiant;
        }
    }
    return null;
}

// Test de recherche
$etudiantTrouve = rechercherEtudiant($etudiants, "Khediri");
if ($etudiantTrouve !== null) {
    afficherEtudiant($etudiantTrouve);
} else {
    echo "Étudiant introuvable.";
}

//
<?php
function obtenirAdmis($etudiants) {
    $admis = [];
    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 10) {
            $admis[] = $etudiant;
        }
    }
    return $admis;
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

