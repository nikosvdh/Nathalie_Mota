<?php

// branchement des fichiers CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style("style_footer", get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style("style_typo", get_template_directory_uri() . '/assets/css/typo.css');
    wp_enqueue_style("style_contact", get_template_directory_uri() . '/assets/css/contact.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');

// branchement des fichiers JS
function photoevent_enqueue_scripts() {
    wp_enqueue_script('jquery'); // chargement de jQuery intégré à WP
    wp_enqueue_script('script.js', get_template_directory_uri() . '/assets/js/script.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_scripts');