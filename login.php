<?php

include './config/pdo.php';
include_once 'partials/header.php';
ob_start();

?>
<!-- form -->

<form action="" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button type="submit">Se connecter</button>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch();
                
            if ($result) {
                // MDP récupéré depuis la BDD, donc la version hachée
                $hash = $result['password'];

                if (password_verify($password, $hash)) {
                
                    $_SESSION['user'] = $result;
                    $_SESSION['user']['logged'] = true;
                    header('Location: index.php');
                    echo 'Vous êtes connecté';
                    ob_end_flush();
                } else {
                    $error = "Le mot de passe est incorrect";
                }
            } else {
                $error = "L'email n'existe pas en BDD";
            }
        } else {
            $error = "L'email n'est pas au bon format";
        }
    }
}