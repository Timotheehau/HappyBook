<?php

$dsn = "mysql:dbname=ebooks;host=localhost;";


try {
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $pdo = new PDO($dsn, "root", "", $options); 
}
catch (PDOException $error) {
    echo 'Connexion échouée : ' . $error->getMessage();
}