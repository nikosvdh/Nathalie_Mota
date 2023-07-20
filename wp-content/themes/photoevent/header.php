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
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Logo">
            </a>
            <div class="nav-desktop">
                <?php wp_nav_menu([
                    'theme_location' => 'main',
                    'menu_class' => 'navbar'
                ]); ?>
                <li><a href="#" class="menu-item modal-js" id="myBtn" data-toggle="modal" role="button">CONTACT</a>
                </li>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation navbar">
            <div class="menu-mobile">
                <button class="menu-toggle close" aria-controls="primary-menu" aria-expanded="false">
                    <div class="line line_one"></div>
                    <div class="line line_two"></div>
                    <div class="line line_three"></div>
                </button>
            </div>
            <ul class="open_nav close_nav navbar-links">
                <?php wp_nav_menu([
                    'theme_location' => 'main',
                    'menu_class' => 'navbar-burger'
                ]); ?>
                <li class="menu-item nav-item"><a href="#" id="myBtn" class="modal-js" data-toggle="modal"
                        role="button">CONTACT</a></li>
            </ul>
        </nav>

    </header>
    <?php wp_body_open(); ?>