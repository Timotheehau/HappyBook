<?php  

include './config/pdo.php';
require_once 'partials/header.php';

// On vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    // On vérifie si les champs sont vides
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        
        if ($password === $confirm) {
        
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            
                $hash = password_hash($password, PASSWORD_DEFAULT);

                //Vérifier si le nom et l'email ne sont pas déjà en BDD
                $sql = "INSERT INTO users(email, password) VALUES(?, ?)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$email, $hash]);
                if ($result) {
                    header('Location: profile.php');
                    ob_end_flush();
                }
            } else {
                // On écrit notre requete préparée
                $sql = "INSERT INTO users(email, password) VALUES(? , ?)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$email, $hash]);
       
                // Si notre execute s'est bien déroulé on redirige vers une page de succès
                if ($result) {
                    header('Location: profile.php');
                    ob_end_flush();
                // Sinon on affiche l'erreur en question
                } else {
                    $error = "Erreur lors de l'ajout : " . print_r($stmt->errorInfo());
                }
            }
            } else {
                $error = "L'email n'est pas au bon format";
            }
        } else {
            $error = 'Les mots de passe ne correspondent pas';
        }
    } else {
        $error = 'Veuillez remplir tous les champs';
    }

 // Si notre execute s'est bien déroulé on redirige vers la page de succès

?>

<form method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="confirm" placeholder="Confirmer le mot de passe">
    <button type="submit">S'inscrire</button>
    <?php if (isset($error)) { ?>
        <p><?= $error ?></p>
    <?php } ?>
</form>

<?php
require_once 'partials/footer.php';
?>