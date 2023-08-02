// SCRIPT POUR DÉPLACER LE LIEN "CONTACT" DANS LE MENU PRINCIPAL
// on empêche que le script soit exécuté avant que le bouton "CONTACT" ne soit rendu dans le DOM en encapsulant le script dans une fonction et en l'exécutant lorsque le document est prêt à l'aide de l'événement "DOMContentLoaded"
document.addEventListener("DOMContentLoaded", function () { 
(function($) {
      
// Sélection du bouton et de la nav
var button = document.getElementById("myBtn");
var menuDiv = document.querySelector(".navbar");
      
// Déplacement du bouton dans l'ul
menuDiv.appendChild(button);


// SCRIPT POUR OUVRIR/FERMER LE MENU BURGER

// Récupération du bouton du menu et de la liste des liens
const menuBtn = document.querySelector('.menu-toggle')
const menu = document.querySelector('.open_nav')

// Quand l'utilisateur clique sur le bouton, la liste des liens s'ouvre ou se ferme
menuBtn.addEventListener('click', function() {
  menu.classList.toggle('open')
  menuBtn.classList.toggle('open-nav')
})


// Fermeture du menu
function toggleMenu () {  
    const navbar = document.querySelector('.main-navigation')
    const burger = document.querySelector('.menu-toggle')
    
    burger.addEventListener('click', () => {    
      navbar.classList.toggle('closing')
    })
  }
  toggleMenu()


// MISE EN PLACE DE L'APPARITION DE LA MINIATURE DE LA PHOTO AU SURVOL DES FLÈCHES
// Récupération des éléments
let leftArrow = document.querySelector('.arrow_left')
let rightArrow  = document.querySelector('.arrow_right')
let previousImg = document.querySelector('.previous-img')
let nextImg = document.querySelector('.next-img')

if (nextImg && previousImg) {
  nextImg.style.opacity = 0
  previousImg.style.opacity = 0
} 

// Ajout des événements au survol des flèches
showSliderPictures(leftArrow, previousImg)
showSliderPictures(rightArrow, nextImg)

function showSliderPictures(arrow, image) {
  if (arrow) {
    arrow.addEventListener('mouseover', function() {
      image.style.opacity = '1'
    })
    arrow.addEventListener('mouseout', function() {
      image.style.opacity = '0'
    })
  }
}
})(jQuery); 
})


// PAGINATION PAGE D'ACCUEIL

jQuery(document).ready(function($) {
  let currentPage = 1;
  $('#load-more').on('click', function(event) { // Ajout d'un event listener au clic
      currentPage++; // on incrémente de 1 à chaque clique sur le bouton qui porte cet ID
      $.ajax({ // On envoie une requête AJAX vers le serveur de type POST à l'URL
          url: 'wp-admin/admin-ajax.php', // Use the global ajaxurl variable provided by WordPress
          method: 'POST',
          data: {
              action: 'weichie_load_more',
              paged: currentPage,
          },
          success: function(res) { // on ajoute la page suivante des publications à l'élément qui porte la classe "gallery-container".
              console.log(res);
              $('.gallery-container').append(res);
          },
          error: function(res) {
              console.log('Error');
          }
      });
  });
})

