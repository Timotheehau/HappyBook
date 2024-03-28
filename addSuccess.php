<?php
include 'config/pdo.php';
require_once 'partials/header.php';

// Récupérer les données de l'URL
$name = $_GET['name'];
$author = $_GET['author'];
$category = $_GET['category'];
$synopsis = $_GET['description'];

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO books (name, author, category, synopsis) VALUES ('$name', '$author', '$category', '$synopsis)";

if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès dans la base de données.";
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>