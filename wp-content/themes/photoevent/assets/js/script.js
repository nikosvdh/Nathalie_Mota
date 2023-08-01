// SCRIPT POUR DÉPLACER LE LIEN "CONTACT" DANS LE MENU PRINCIPAL
// on empêche que le script soit exécuté avant que le bouton "CONTACT" ne soit rendu dans le DOM en encapsulant le script dans une fonction et en l'exécutant lorsque le document est prêt à l'aide de l'événement "DOMContentLoaded"
document.addEventListener("DOMContentLoaded", function () { 
  (function($) {
      
      // Sélection du bouton et de la nav
      var button = document.getElementById("myBtn");
      var menu = document.querySelector(".navbar");
      
      // Déplacement du bouton dans l'ul
      menu.appendChild(button);
  })(jQuery);
});


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
