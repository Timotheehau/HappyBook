<?php
require_once 'partials/header.php';
?>

<div class="profile-card">
    <div class="left">

    </div>
    <div class="right">
        
        <h2>Informations</h2>
        <hr>
        <section class="infos">
            <div class="email">
                <h3>Email</h3>
                <p>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo $_SESSION['user']['email'];
                    }
                    ?>
                </p>
            </div>
        </section>

</div>

<?php
require_once 'partials/footer.php';
?>