<?php

// branchement du fichier CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style("style_footer", get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style("style_typo", get_template_directory_uri() . '/assets/css/typo.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');