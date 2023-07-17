<?php

// branchement du fichier CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/assets/css/header.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');