<?php
require_once 'partials/header.php';
?>

<div class="profile-card">

        <h2>Informations</h2>
        <hr>
        <section class="infos">
            <div class="email">
                <h3>Email</h3>
                <h1 class="email_user">
                    <?php
                    if (isset($_SESSION['users'])) {
                        echo $_SESSION['users']['email'];
                    }
                    ?>
                </h1>
                <img src="./pictures\Maya.PNG" alt="" id="picture_client">
                <input type="text" placeholder="Titre" class="title">
                    
            </div>
        </section>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>