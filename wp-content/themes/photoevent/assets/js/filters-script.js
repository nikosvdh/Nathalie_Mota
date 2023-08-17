(function($) {
    $(document).ready(function() {
        // PAGINATION PAGE D'ACCUEIL
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
                    // console.log(res);
                    $('.gallery-container').append(res);
                },
                error: function(res) {
                   // console.log('Error');
                }
            });
        });

        // FILTRES PAGE D'ACCUEIL
        // On ajoute un event listener à chaque Selects pour détecter les changements au niveau de ces Selects 
        $('#categories, #formats, #sort-by-date').on('change', function(event) {
            // On récupère les valeurs des 3 filtres
            let category = $('#categories')
            let selectedCategory = category.find('option:selected').val();

            let format = $('#formats')
            let selectedFormat = format.find('option:selected').val();

            let sortByDate = $('#sort-by-date').find('option:selected').val();

            // On lance la requête AJAX
            $.ajax({
                url: 'wp-admin/admin-ajax.php',
                method: 'POST',
                data: {
                    action: 'filters_images', // Quand un changement est détecté la requête AJAX est lancée : on appelle la fonction "filters_images" située dans functions.php
                    selectedCategory: selectedCategory,
                    selectedFormat: selectedFormat,
                    orderDirection: sortByDate
                },
                success: function(res) {
                    // console.log(res);
                    $('.gallery-container').html(res); // on met à jour la gallerie
                },
                error: function(res) {
                    // console.log(res);
                }
            });
        });
    });
})(jQuery);


// Remplacement du dropdown HTML standard par le dropdown Select2 pour personnalisation
jQuery(document).ready(function($) {
    // on initialise Select2 
    $('#categories, #formats, #sort-by-date').select2({
        theme: 'custom-select2',
        width: '100%' // largeur de 100% pour que le dropdown corresponde à la largeur de l'input
    });
});

jQuery(document).ready(function($) {
    // Sélectionnez le troisième champ select
    var $thirdSelect = $('#sort-by-date');
  
    // Ajoutez une classe CSS personnalisée au conteneur Select2 du troisième select
    $thirdSelect.next('.select2-container').addClass('sort-by-date-container');
  
    // Déplacez le champ select vers la droite en ajoutant des styles CSS à la classe personnalisée
    $('.sort-by-date-container .select2-selection').css({
      'float': 'right',
      'width': '100%'
    });
});


jQuery(document).ready(function($) {
    // Écoutez l'événement de changement sur le Select2
    $('#categories, #formats, #sort-by-date').on('change', function() {
        var selectedValue = $(this).val();
        var arrow = $(this).closest('.filter-column').find('.select2-selection__arrow');
      
        if (selectedValue && selectedValue !== 'all') {
            arrow.addClass('flipped'); // Ajoutez la classe lorsqu'un filtre est sélectionné
        } else {
            arrow.removeClass('flipped'); // Retirez la classe si aucun filtre n'est sélectionné
            //console.log('Class removed'); // Check if class is removed
        }
    });
});


