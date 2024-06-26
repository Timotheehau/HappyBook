function searchBooks() {
    const searchInput = document.querySelector("#searchInput").value;
    const category = document.querySelector("#categorySelect").value;

    let url = `https://www.googleapis.com/books/v1/volumes?q=`;

    if (searchInput) {
        url += `intitle:${searchInput}`;
    }

    if (category) {
        url += `+subject:${category}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            displayResults(data);
        })
        .catch(error => {
            console.error("Erreur lors de la recherche :", error);
        });
}

function displayResults(data) {
    const resultsDiv = document.querySelector("#results");
    resultsDiv.innerHTML = "";

    if (data.items && data.items.length > 0) {
        console.log(data.items);
        data.items.forEach(item => {
            const cardDiv = document.createElement("div");
            cardDiv.classList.add("card");

            const title = item.volumeInfo.title;
            const authors = item.volumeInfo.authors ? item.volumeInfo.authors.join(", ") : "Auteur inconnu";
            const categories = item.volumeInfo.categories ? item.volumeInfo.categories.join(", ") : "Catégorie inconnue";
            const thumbnail = item.volumeInfo.imageLinks ? item.volumeInfo.imageLinks.thumbnail : "https://via.placeholder.com/128x196?text=Image+non+disponible";
            const description = item.volumeInfo.description ? item.volumeInfo.description : "Pas de description disponible";

            const bookDiv = document.createElement("div");
            bookDiv.innerHTML = `
                <h3>${title}</h3>
                <img src="${thumbnail}" alt="${title}" style="width: 128px; height: 196px;">
                <p>Auteur(s): ${authors}</p>
                <p>Catégorie(s): ${categories}</p>
                <button class='details'>Détails</button>
                <p style='display:none'>${description}</p>          
                `;
                const favBtn = document.createElement('button');
                favBtn.classList.add('favorite');
                favBtn.textContent = 'Ajouter aux favoris';
                bookDiv.appendChild(favBtn);
                
                favBtn.addEventListener('click', (e) => {
                    console.log(e.target)
                    alert('Ajouté aux favoris !');
                    sendData(item)


                });
                cardDiv.appendChild(bookDiv);
                resultsDiv.appendChild(cardDiv);
        })

        const details = document.querySelectorAll('.details')
        details.forEach(detail => {
            detail.addEventListener('click', () => {
                const description = detail.nextElementSibling;
                description.style.display = description.style.display === 'none' ? 'block' : 'none';
            });
        }); 

        function sendData(item) {
            let name = item.volumeInfo.title;
            let author = item.volumeInfo.authors;
            let category = item.volumeInfo.categories;
            let description = item.volumeInfo.description;
            
            location.href = `addSuccess.php?name=${name}&author=${author}&category=${category}&description=${description}`;
            
        }
    } else {
        resultsDiv.innerHTML = "<p>Aucun livre trouvé.</p>";
    }
}
window.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        searchBooks()
    }
})


// Favoris
// document.addEventListener('DOMContentLoaded', () => {
//     alert('Bienvenue sur le site de recherche de livres !');
// })


// Le client va pouvoir ajouter une image à son profil

// un utilisateur pet changer son image de profil
// un utilisateur peut changer son nom
// un utilisateur peut changer son email
// un utilisateur peut changer son mot de passe
// un utilisateur peut changer son adresse
// un utilisateur peut changer son numéro de téléphone
// un utilisateur peut changer sa date de naissance
// un utilisateur peut changer son genre
// un utilisateur peut changer son statut

// un utilisateur peut ajouter un livre à ses favoris
// un utilisateur peut supprimer un livre de ses favoris
// un utilisateur peut voir la liste de ses favoris

function changeProfileImage(imageUrl) {
    // Code to change the user's profile image
    // You can use the imageUrl parameter to update the user's profile image
    // For example, you can update the image source of the profile image element with the new imageUrl
    const profileImage = document.getElementById("#picture_client");
    profileImage.src = imageUrl;
    profileImage.addEventListener('click', () => {
        alert('Image de profil modifiée !');
    });

}

// Example usage:
// changeProfileImage("https://example.com/new-profile-image.jpg");

