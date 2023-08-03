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


// FILTRES PAGE D'ACCUEIL
jQuery(document).ready(function($) {
    // On attache un Event listener à chaque selects pour changer le filtre
    $('#categories, #formats, #sort-by-date').on('change', function() {
        // On récupère les valeurs des filtres
        let category = $('#categories')
        let selectedCategory = category.find('option:selected').val();

        let format = $('#formats')
        let selectedFormat = format.find('option:selected').val();

        let sortByDate = $('#sort-by-date').find('option:selected').val();

        // On lance la requête AJAX
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            method: 'POST',
            data: {
                action: 'filters_images', // On appelle l'action située dans functions.php
                selectedFormat: selectedFormat,
                selectedCategory: selectedCategory,
                orderDirection: sortByDate
            },
            success: function(res) {
               // console.log(res)
                $('.gallery-container').html(res); // on met à jour la gallerie

            },
            error: function(res) {
                // console.log(res)
            }
        });
    });
})