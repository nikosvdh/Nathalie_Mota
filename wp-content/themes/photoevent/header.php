<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Logo">
            </a>
            <div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'main',
                // 'container' => false,
                    'menu_class' => 'navbar'
                ]);
                ?>
            </div>
        </div>
    </header>
    <?php wp_body_open(); ?>