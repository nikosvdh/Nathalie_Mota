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

// Affichage des photos apparentées de la single page

function show_gallery($ajaxposts)
{
    while ($ajaxposts->have_posts()) :
        $ajaxposts->the_post();

        // Récupération de l'image mise en avant dans le post

        get_template_part('template-parts/content', 'image');

    endwhile;
}