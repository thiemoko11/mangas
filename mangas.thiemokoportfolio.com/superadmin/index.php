<?php
include "../configuration.php";
require "header.php";
?>


<?php

$host = 'localhost';
$dbname = 'mangas';
$username = 'root';
$password = 'thiemoko11';

try {
    // Créer une nouvelle instance PDO pour la connexion
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurer PDO pour générer des erreurs en cas de problème
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit;
}

// Récupérer les membres
$query = "SELECT id, prenom, nom, pseudonyme, courriel, avatar, date_inscription, date_naissance, statut FROM membre";
$stmt = $pdo->prepare($query);
$stmt->execute();
$membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Membres</title>
    <style>
        /* Centrer le texte du body */
        body {
            text-align: center;
        }

        /* Style du tableau */
        table {
            width: 80%; /* Limiter la largeur du tableau */
            margin: 20px auto; /* Centrer le tableau horizontalement */
            border-collapse: collapse;
        }

        /* Style des cellules du tableau */
        th, td {
            padding: 8px;
            text-align: left; /* Les titres et les cellules seront alignés à gauche */
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        /* Style des images des avatars */
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* Centrer le titre */
        h1 {
            text-align: center;
        }

        /* Définir la largeur des colonnes ID et Nom */
        th:nth-child(1), td:nth-child(1) {
            width: 10%; /* Ajuste cette valeur selon tes besoins */
        }

        th:nth-child(3), td:nth-child(3) {
            width: 15%; /* Ajuste cette valeur selon tes besoins */
        }

        /* Optionnel : Égaliser la taille des autres colonnes pour mieux gérer l'espace */
        th:nth-child(2), td:nth-child(2),
        th:nth-child(4), td:nth-child(4),
        th:nth-child(5), td:nth-child(5),
        th:nth-child(6), td:nth-child(6),
        th:nth-child(7), td:nth-child(7),
        th:nth-child(8), td:nth-child(8) {
            width: 12%; /* Ajuste cette valeur si tu veux contrôler l'espace entre les autres colonnes */
        }
    </style>
</head>
<body>

<h1>Gestion des Membres</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Pseudonyme</th>
            <th>Email</th>
            <th>Avatar</th>
            <th>Date d'inscription</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Afficher les informations de chaque membre
        foreach ($membres as $membre) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($membre['id']) . "</td>";
            echo "<td>" . htmlspecialchars($membre['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($membre['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($membre['pseudonyme']) . "</td>";
            echo "<td>" . htmlspecialchars($membre['courriel']) . "</td>";
            // Si un avatar est défini, afficher l'image, sinon afficher un avatar par défaut
            if ($membre['avatar']) {
                echo "<td><img src='uploads/avatars/" . htmlspecialchars($membre['avatar']) . "' alt='Avatar'></td>";
            } else {
                echo "<td><img src='uploads/avatars/default.png' alt='Avatar'></td>";
            }
            echo "<td>" . htmlspecialchars($membre['date_inscription']) . "</td>";
            echo "<td>" . htmlspecialchars($membre['statut']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>







           
