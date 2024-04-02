<?php

require_once 'partials/header.php';
include './config/pdo.php';

?>

<h2>Liste de favoris</h2>

<div class="liFav">

    <?php
    $sql = "SELECT * FROM books";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll();

    foreach ($books as $book) {
        echo '<div class="book">';
        echo '<h2>' . $book['title'] . '</h2>';
        echo '<p>' . $book['author'] . '</p>';
        echo '<p>' . $book['category'] . '</p>';
        echo '<p>' . $book['summary'] . '</p>';
        echo '<p>' . $book['published_at'] . '</p>';
        echo '<p>' . $book['pages'] . '</p>';
        echo '<p>' . $book['language'] . '</p>';
        echo '<p>' . $book['isbn'] . '</p>';
        echo '<p>' . $book['price'] . '</p>';
        echo '<p>' . $book['stock'] . '</p>';
        echo '<p>' . $book['image'] . '</p>';
        echo '</div>';
    }
    ?>

</div>

<?php
require_once 'partials/footer.php';
?>