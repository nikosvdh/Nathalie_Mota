<?php

// branchement des fichiers CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style("style_footer", get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style("style_typo", get_template_directory_uri() . '/assets/css/typo.css');
    wp_enqueue_style("style_contact", get_template_directory_uri() . '/assets/css/contact.css');
    wp_enqueue_style("style_single", get_template_directory_uri() . '/assets/css/single-photo.css');
    wp_enqueue_style("style_home", get_template_directory_uri() . '/assets/css/template-home.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');

// branchement des fichiers JS
function photoevent_enqueue_scripts() {
    wp_enqueue_script('jquery'); // chargement de jQuery intégré à WP
    wp_enqueue_script('script.js', get_template_directory_uri() . '/assets/js/script.js', '', '', true);
    wp_enqueue_script('contact-script.js', get_template_directory_uri() . '/assets/js/contact-script.js', '', '', true);
    wp_enqueue_script('filters-script.js', get_template_directory_uri() . '/assets/js/filters-script.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_scripts');

// ajout script de la modale
function script_modal()
{
    wp_enqueue_script('contact-script');
    wp_localize_script('contact-script', 'custom_data', array(
        'ref' => get_field('reference')
    ));
}
add_action('wp_enqueue_scripts', 'script_modal');