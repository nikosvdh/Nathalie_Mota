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

// format des images
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

        // Récupération de l'image mise en avant dans le post

        get_template_part('template-parts/content', 'image');

    endwhile;
}


// REQUÊTE AJAX POUR CHARGER PLUS DE CONTENU SUR LA PAGE D'ACCUEIL (PAGINATION)

function weichie_load_more()
{
    $paged = $_POST['paged']; // On récupère avec la méthode POST, la valeur de "paged" qui a été envoyée depuis la requête AJAX (page actuelle du contenu à récupérer)

    // on récupère les publications de type "photo"
    $ajaxposts = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 8, // 16 post donc 2 pages
        'paged' => $paged,
        'order' => 'DESC', // du plus récent au plus ancien
        'orderby' => ['date' => 'DESC', 'ID' => 'ASC'] // On trie par date de manière décroissante et ensuite par ID de manière croissante pour résoudre les éventuelles égalités
    ]);

    $response = ''; // on initialise la variable qu'on utilisera pour stocket le code HTML des images

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