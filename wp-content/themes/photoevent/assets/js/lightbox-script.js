// On définit les variables pour stocker les éléments du DOM afin de les manipuler (sélection de la lightbox et du bouton close)
let lightboxModal = document.querySelector('.lightbox');
let closeButtonLightbox = document.querySelector('.close-lightbox');
const lightbox = document.querySelector('.lightbox');
let dataList = []; // tableau pour stocker les datas relatives aux photos

// OUVERTURE DE LA LIGHTBOX
// On s'assure que le script s'initialise correctement et ré-attache les event listeners quand la requête AJAX est terminée.
documentReady();
jQuery(document).ajaxComplete(function() {
    dataList = []; // on vide les tableaux pour recommencer
    IconFullList = [];
    documentReady(); // recharge l'événement document ready pour rebrancher les événements au click
})
   
// FONCTIONS
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
        const reference = galleryData.querySelector(".gallery-reference").textContent;
        const category = galleryData.querySelector(".gallery-category").textContent;
    
        dataList.push({
            reference: reference,
            category: category,
        });
    });

    // FERMETURE DE LA LIGHTBOX

    function closeLightbox() {
        lightboxModal.style.display = "none";
    }

    closeButtonLightbox.addEventListener("click", closeLightbox);

    // récupération de la référence et de la catégorie de la photo
    var iconFullList = document.querySelectorAll(".icon-full");

    // Lorsque l'un des boutons est cliqué
    iconFullList.forEach(function (button, position) {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            // Enregistrer l'index du bouton cliqué pour la navigation
            const reference = dataList[position].reference;
            const category = dataList[position].category;

            lightbox.querySelector(".lightbox-reference").textContent = reference;
            lightbox.querySelector(".lightbox-category").textContent = category;
            lightbox.setAttribute("data-current-index", position); // navigation
        });
    });

    // FLÈCHES DE NAVIGATION DE LA LIGHTBOX
    lightbox
        .querySelector(".previous-pic-lightbox")
        .addEventListener("click", function (e) {
            e.stopPropagation(); // On évite la fermeture de la lightbox en empêchant la propagation de l'événement au clic aux éléments parents
            var currentIndex = parseInt(lightbox.getAttribute("data-current-index"));
            var previousPic = iconFullList[currentIndex - 1];
            if (previousPic) {
                previousPic.click();
                lightbox.setAttribute("data-current-index", currentIndex - 1);
            }
        });

    lightbox
        .querySelector(".next-pic-lightbox")
        .addEventListener("click", function (e) {
            e.stopPropagation();
            var currentIndex = parseInt(lightbox.getAttribute("data-current-index"));
            var nextPic = iconFullList[currentIndex + 1];
            if (nextPic) {
                nextPic.click();
                lightbox.setAttribute("data-current-index", currentIndex + 1);
            }
        });
}