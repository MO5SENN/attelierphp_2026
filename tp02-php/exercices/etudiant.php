<?php
require_once "fonctions.php";

$etudiants = [
    ["nom" => "Khediri", "prenom" => "Ahmed", "age" => 20, "moyenne" => 14.5],
    ["nom" => "Ali", "prenom" => "Sami", "age" => 21, "moyenne" => 11.5],
    ["nom" => "Ben Salah", "prenom" => "Nour", "age" => 19, "moyenne" => 16.0],
    ["nom" => "Trabelsi", "prenom" => "Amine", "age" => 22, "moyenne" => 8.5],
    ["nom" => "Gharbi", "prenom" => "Mariem", "age" => 20, "moyenne" => 13.0],
    ["nom" => "Jaziri", "prenom" => "Yassine", "age" => 21, "moyenne" => 9.0]
];

$nombreEtudiants = count($etudiants);
$moyenneClasse = calculerMoyenneClasse($etudiants);
$nombreAdmis = compterAdmis($etudiants);
$meilleur = trouverMeilleurEtudiant($etudiants);

// Gestion de la recherche via formulaire GET
$etudiantRecherche = null;
if (isset($_GET['nomRecherche']) && !empty($_GET['nomRecherche'])) {
    $etudiantRecherche = rechercherEtudiant($etudiants, $_GET['nomRecherche']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Tableau de Bord - Gestion des Étudiants</h1>

    <ul>
        <li><strong>Nombre d'étudiants :</strong> <?php echo $nombreEtudiants; ?>[cite: 13]</li>
        <li><strong>Moyenne de la classe :</strong> <?php echo round($moyenneClasse, 2); ?>[cite: 13]</li>
        <li><strong>Nombre d'admis :</strong> <?php echo $nombreAdmis; ?>[cite: 13]</li>
        <?php if ($meilleur): ?>
            <li><strong>Meilleur étudiant :</strong> <?php echo $meilleur['prenom'] . " " . $meilleur['nom'] . " (" . $meilleur['moyenne'] . ")"; ?></li>
        <?php endif; ?>
    </ul>

    <form method="GET" action="">
        <label>Rechercher par nom : </label>
        <input type="text" name="nomRecherche" value="<?php echo isset($_GET['nomRecherche']) ? htmlspecialchars($_GET['nomRecherche']) : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>

    <?php if (isset($_GET['nomRecherche'])): ?>
        <h3>Résultat de la recherche :</h3>
        <?php if ($etudiantRecherche !== null): ?>
            <p><?php echo $etudiantRecherche['prenom'] . " " . $etudiantRecherche['nom'] . " - Moyenne : " . $etudiantRecherche['moyenne'] . " (" . determinerResultat($etudiantRecherche['moyenne']) . ")"; ?></p>
        <?php else: ?>
            <p>Étudiant introuvable.</p>
        <?php endif; ?>
    <?php endif; ?>

   
    <h2>Liste des Étudiants</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Âge</th>
            <th>Moyenne</th>
            <th>Résultat</th>
            <th>Appréciation</th>
        </tr>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?php echo $etudiant['nom']; ?></td>
                <td><?php echo $etudiant['prenom']; ?></td>
                <td><?php echo $etudiant['age']; ?></td>
                <td><?php echo $etudiant['moyenne']; ?></td>
                <td><?php echo determinerResultat($etudiant['moyenne']); ?></td>
                <td><?php echo appreciation($etudiant['moyenne']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>