<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Logo">
            </a>
            <nav>
                <ul class="navbar">
                    <?php wp_nav_menu([
                    'theme_location' => 'main',
                    'menu_class' => 'navbar'
                ]); ?>
                    <li><a href="#" class="menu-item" id="button">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php wp_body_open(); ?>