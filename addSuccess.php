<?php
include 'config/pdo.php';
require_once 'partials/header.php';

// Récupérer les données de l'URL
$name = $_GET['name'];
$author = $_GET['author'];
$category = $_GET['category'];
$synopsis = $_GET['description'];

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO books (name, author, category, synopsis) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $author, $category, $synopsis]);

var_dump($stmt);

// if ($pdo->execute($sql) === TRUE) {
//     echo "Données insérées avec succès dans la base de données.";
// } else {
//     echo "Erreur lors de l'insertion des données : " . $pdo->error;
// }

// Fermer la connexion à la base de données
// $pdo->close();
?>