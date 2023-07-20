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

// hook "nav_menu_css_class" pour ajouter des classes CSS personnalisées aux éléments de menu
// Fonction pour ajouter une classe personnalisée à l'élément de menu
function custom_menu_item_classes($classes, $item, $args) {
    // Ajouter la classe "custom-menu-item" à l'élément de menu
    $classes[] = 'custom-menu-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_item_classes', 10, 3);