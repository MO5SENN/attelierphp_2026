<?php
$etudiants = [
    [
        "nom" => "Ahmed",
        "prenom" => "Ben Ali",
        "filiere" => "Informatique",
        "moyenne" => 15.5
    ],
    [
        "nom" => "Amira",
        "prenom" => "Trabelsi",
        "filiere" => "Génie Logiciel",
        "moyenne" => 16.8
    ],
    [
        "nom" => "Youssef",
        "prenom" => "Mansouri",
        "filiere" => "Réseaux",
        "moyenne" => 14.2
    ],
    [
        "nom" => "Salma",
        "prenom" => "Gharbi",
        "filiere" => "Data Science",
        "moyenne" => 17.1
    ]
];

$recherche = isset($_GET["nom"]) ? trim($_GET["nom"]) : "";
$resultats = [];

if ($recherche !== "") {
    foreach ($etudiants as $etudiant) {
        // Recherche insensible à la casse (ex: "ahmed" ou "Ahmed")
        if (stripos($etudiant["nom"], $recherche) !== false) {
            $resultats[] = $etudiant;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'un étudiant</title>
</head>
<body>
    <h1>Recherche d'un étudiant</h1>

    <form method="GET" action="">
        <label for="nom">Nom de l'étudiant :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($recherche) ?>" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php if ($recherche !== ""): ?>
        <h2>Résultats pour « <?= htmlspecialchars($recherche) ?> »</h2>

        <?php if (count($resultats) > 0): ?>
            <ul>
                <?php foreach ($resultats as $etudiant): ?>
                    <li>
                        <strong><?= htmlspecialchars($etudiant["nom"]) ?> <?= htmlspecialchars($etudiant["prenom"]) ?></strong>
                        — Filière : <?= htmlspecialchars($etudiant["filiere"]) ?>
                        — Moyenne : <?= htmlspecialchars($etudiant["moyenne"]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun étudiant trouvé avec ce nom.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>