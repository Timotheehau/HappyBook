<?php

    include_once './partials/header.php';
?>

        <input type="text" id="searchInput" placeholder="Entrez le titre du livre" class="input-dark red">
            <select id="categorySelect" class="input-dark blue">
                <option value="">Toutes catégories</option>
                <option value="fiction">Fiction</option>
                <option value="history">Histoire</option>
                <option value="technology">Technologie</option>
                <option value="art">Art</option>
                <option value="science">Science</option>
                <option value="religion">Religion</option>
                <option value="travel">Voyages</option>
                <option value="cooking">Cuisine</option>
                <option value="children">Jeunesse</option>
            </select>
 
            <button onclick="searchBooks()" class="search-btn">Rechercher</button>
        </div>
 
        <div id="results" class="results-grid"></div>
        <a href="login"></a>
    </div>

<?php
    include_once './partials/footer.php';
?>