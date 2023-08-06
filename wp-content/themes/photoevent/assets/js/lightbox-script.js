// On définit les variables pour stocker les éléments du DOM afin de les manipuler (sélection de la lightbox et du bouton close)
let lightboxModal = document.querySelector('.lightbox');
let closeButtonLightbox = document.querySelector('.close-lightbox');
const lightbox = document.querySelector('.lightbox');
let dataList = []; // tableau pour stocker les datas relatives aux photos

// OUVERTURE DE LA LIGHTBOX
documentReady();

// Quand la requête AJAX termine 
jQuery(document).ajaxComplete(function() {
    dataList = []; // on vide les tableaux pour recommencer
    IconFullList = [];
    documentReady(); // recharge l'événement document ready pour rebrancher les événements au click
})
   
// FONCTIONS UTILISÉES CI-DESSUS
// Fonction appelée initialement et à chaque fois que la requête AJAX se termine (encapsule le code à exécuter lorsque le document est prêt).
function documentReady() {
    jQuery(document).ready(function ($) { // méthode jQuery qui attend que le document HTML soit complètement chargé avant d'exécuter la fonction init.
        init($);
    });
}

function init($) {
    // Écouteur d'événement au clic sur l'élément avec la classe gallery-img
    $(".gallery-pic").on("click", ".gallery-img", function (e) {
     // On vérifie si la cible du clic est un élément avec la classe icon-full
     if ($(e.target).hasClass("icon-full")) {
       let modal = document.querySelector(".lightbox");
       let imgSelected = e.target
         .closest(".gallery-img")
         .querySelector("#img-full");
       let imgModal = lightboxModal.querySelector(".lightbox-div img");
 
       imgModal.src = imgSelected.src;
       imgModal.alt = imgSelected.alt;
       modal.style.display = "block";
       modal.classList.add("active");
     }
   });
 
   document.querySelectorAll(".gallery-data").forEach((galleryData) => {
     // on récupère les infos de la photo
     const title = galleryData.querySelector(".gallery-title").textContent;
     const category = galleryData.querySelector(".gallery-category").textContent;
     const year = galleryData.getAttribute("data-year");
 
     dataList.push({
       title: title,
       category: category,
       year: year,
     });
   });
}