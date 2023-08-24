<?php
require_once('assets/inc/assets.php');

function register_my_menus()
{
    register_nav_menus(
        array(
            'main' => __('Menu principal'),
            'footer' => __('Bas de page'),
        )
    );
}
add_action('after_setup_theme', 'register_my_menus');

function photoevent_supports()
{
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    // ajout de la gestion du menu
    add_theme_support('menus');
    // ajout du logo dans le customizer
    add_theme_support('custom-logo');
    add_theme_support('html5');  
}
add_action('after_setup_theme', 'photoevent_supports');

// Taxonomies

$terms = get_terms(array(
    'taxonomy'   => 'post_tag',
    'hide_empty' => false,
));

// Format des images de la galerie
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
    add_image_size('custom-size', 500, 500, true);
}

// Affichage des photos apparentées single et page d'accueil

function show_gallery($ajaxposts)
{
    while ($ajaxposts->have_posts()) :
        $ajaxposts->the_post();

        // récupération de l'image du post

        get_template_part('template-parts/content', 'image');

    endwhile;
}


// REQUÊTE AJAX POUR FILTRER LES IMAGES

function showTaxonomies($taxonomy)
{
    if ($terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'orderby' => 'name'
    ))) {
        foreach ($terms as $term) {
            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
    }
}

function filters_images()
{
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => $_POST['orderDirection'],
        'tax_query' => array(
            array(
                'relation' => 'AND',
                $_POST['selectedCategory'] != "all" ?
                    array(
                        'taxonomy' => 'categorie', // as in CPT UI
                        'field' => 'slug',
                        'terms' => $_POST['selectedCategory'],
                    )
                    : '',
                $_POST['selectedFormat'] != "all" ?
                    array(
                        'taxonomy' => 'format', // as in CPT UI
                        'field' => 'slug',
                        'terms' => $_POST['selectedFormat'],
                    )
                    : '',
            ),
        ),
    );

    $query = new WP_Query($args);
    show_gallery($query, true);

    wp_die();

    wp_reset_query(); // on réinitialise la requête
    wp_reset_postdata(); // on réinitialise les données

    $response = ob_get_clean(); // on récupère le contenu de la mise en mémoire tampon

    echo $response;
    exit;
}
add_action('wp_ajax_nopriv_filters_images', 'filters_images');
add_action('wp_ajax_filters_images', 'filters_images');


// Branchement de Select2
function select2_enqueue_scripts() 
{
    wp_enqueue_style ( 
      'select2',  
      'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' 
    );
  
    wp_enqueue_script ( 
      'select2',  
      'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', 
      array('jquery'), 
      '4.1.0-rc.0', 
      true 
    );
}
add_action( 'wp_enqueue_scripts', 'select2_enqueue_scripts' );


// REQUÊTE AJAX POUR CHARGER PLUS DE CONTENU SUR LA PAGE D'ACCUEIL (PAGINATION)

function weichie_load_more()
{
    $paged = $_POST['paged']; // On récupère avec la méthode POST, la valeur de "paged" qui a été envoyée depuis la requête AJAX (page actuelle du contenu à récupérer)

    // on récupère les publications de type "photo"
    $ajaxposts = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 12, // 16 post au total
        'paged' => $paged,
        'order' => 'DESC', // du plus récent au plus ancien
        'orderby' => ['date' => 'DESC', 'ID' => 'ASC'] // On trie par date de manière décroissante et ensuite par ID de manière croissante pour résoudre les éventuelles égalités
    ]);

    $response = ''; // on initialise la variable qu'on utilisera pour stocker le code HTML des images

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .=  get_template_part('template-parts/content', 'image');
        endwhile;
    } else {
        $response = '';
    }

    echo $response; // on affiche le contenu récupéré
    exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more'); // utilisateur connecté
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more'); // utilisateur anonyme


// On évite les pb de chargement en désactivant la mise en cache des requêtes
function weichie_disable_ajax_cache()
{
    if (defined('DOING_AJAX') && DOING_AJAX) {
        define('DONOTCACHEPAGE', true);
    }
}
add_action('init', 'weichie_disable_ajax_cache');