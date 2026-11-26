<?php
session_start();

// Initialisation de la liste d'étudiants en session si elle n'existe pas encore
if (!isset($_SESSION["etudiants"])) {
    $_SESSION["etudiants"] = [
        [
            "nom" => "Ahmed",
            "prenom" => "Ben Ali",
            "age" => 20,
            "formation" => "Informatique",
            "moyenne" => 15.5
        ],
        [
            "nom" => "Amira",
            "prenom" => "Trabelsi",
            "age" => 21,
            "formation" => "Génie Logiciel",
            "moyenne" => 9.2
        ],
        [
            "nom" => "Youssef",
            "prenom" => "Mansouri",
            "age" => 19,
            "formation" => "Réseaux",
            "moyenne" => 14.0
        ]
    ];
}

// Détermination de la section active
$page =$_GET["page"] ?? "liste";
if (!in_array($page, ["liste", "ajouter", "rechercher"], true)) {
    $page = "liste";
}

// Fonction utilitaire pour déterminer le résultat
function getResultat(float $moyenne): string
{
    return $moyenne >= 10 ? "Admis" : "Ajourné";
}

$erreurs = [];$succes = "";
$ancien = [
    "nom" => "",
    "prenom" => "",
    "age" => "",
    "formation" => "",
    "moyenne" => ""
];

// Traitement du formulaire d'ajout (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST" && $page === "ajouter") {
    $ancien["nom"] = trim($_POST["nom"] ?? "");
    $ancien["prenom"] = trim($_POST["prenom"] ?? "");
    $ancien["age"] = trim($_POST["age"] ?? "");
    $ancien["formation"] = trim($_POST["formation"] ?? "");
    $ancien["moyenne"] = trim($_POST["moyenne"] ?? "");

    if ($ancien["nom"] === "") {
        $erreurs[] = "Le nom est obligatoire.";
    }

    if ($ancien["prenom"] === "") {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    $ageVal = filter_var($ancien["age"], FILTER_VALIDATE_INT, [
        "options" => ["min_range" => 15, "max_range" => 100]
    ]);
    if ($ageVal === false) {$erreurs[] = "L'âge doit être un entier valide (entre 15 et 100 ans).";
    }

    if ($ancien["formation"] === "") {
        $erreurs[] = "La formation est obligatoire.";
    }

    $moyenneVal = is_numeric($ancien["moyenne"]) ? (float) $ancien["moyenne"] : null;
    if ($moyenneVal === null || is_nan($moyenneVal) \vert{}\vert{}$moyenneVal < 0 || $moyenneVal > 20) {$erreurs[] = "La moyenne doit être un nombre compris entre 0 et 20.";
    }

    if (empty($erreurs)) {$_SESSION["etudiants"][] = [
            "nom" => $ancien["nom"],
            "prenom" => $ancien["prenom"],
            "age" => (int) $ageVal,
            "formation" => $ancien["formation"],
            "moyenne" => round($moyenneVal, 2) ];$succes = "L'étudiant a été ajouté avec succès.";
        $ancien = [
            "nom" => "",
            "prenom" => "",
            "age" => "",
            "formation" => "",
            "moyenne" => ""
        ];
    }
}

// Traitement de la recherche (GET)
$rechercheNom = trim($_GET["nom"] ?? "");
$resultatsRecherche = [];

if ($page === "rechercher" && $rechercheNom !== "") {
    foreach ($_SESSION["etudiants"] as $etudiant) {
        if (stripos($etudiant["nom"], $rechercheNom) !== false) {
            $resultatsRecherche[] =$etudiant;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.5; }
        nav a {
            display: inline-block;
            padding: 8px 14px;
            margin-right: 8px;
            text-decoration: none;
            border: 1px solid #333;
            color: #333;
            background: #f5f5f5;
        }
        nav a.actif { background: #333; color: #fff; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th { background: #efefef; }
        .form-group { margin-bottom: 12px; }
        label { display: inline-block; width: 130px; font-weight: bold; }
        .erreurs { color: #a91e1e; background: #fdeaea; padding: 10px; border: 1px solid #e0a0a0; margin-bottom: 15px; }
        .succes { color: #165b25; background: #e8f7ec; padding: 10px; border: 1px solid #9ad3a8; margin-bottom: 15px; }
        .admis { color: #165b25; font-weight: bold; }
        .ajourne { color: #a91e1e; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Gestion des étudiants</h1>

    <nav>
        <a href="index.php?page=liste" class="<?= $page === "liste" ? "actif" : "" ?>">[ Liste des étudiants ]</a>
        <a href="index.php?page=ajouter" class="<?= $page === "ajouter" ? "actif" : "" ?>">[ Ajouter un étudiant ]</a>
        <a href="index.php?page=rechercher" class="<?= $page === "rechercher" ? "actif" : "" ?>">[ Rechercher un étudiant ]</a>
    </nav>

    <hr>

    <?php if ($page === "liste"): ?>
        <h2>Liste des étudiants</h2>
        <?php if (empty($_SESSION["etudiants"])): ?>
            <p>Aucun étudiant enregistré.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Âge</th>
                        <th>Formation</th>
                        <th>Moyenne</th>
                        <th>Résultat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["etudiants"] as $etudiant): ?>
                        <?php $resultat = getResultat((float)$etudiant["moyenne"]); ?>
                        <tr>
                            <td><?= htmlspecialchars($etudiant["nom"]) ?></td>
                            <td><?= htmlspecialchars($etudiant["prenom"]) ?></td>
                            <td><?= htmlspecialchars((string) $etudiant["age"]) ?></td>
                            <td><?= htmlspecialchars($etudiant["formation"]) ?></td>
                            <td><?= htmlspecialchars(number_format((float) $etudiant["moyenne"], 2)) ?></td>
                            <td class="<?= $resultat === "Admis" ? "admis" : "ajourne" ?>">
                                <?= htmlspecialchars($resultat) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>