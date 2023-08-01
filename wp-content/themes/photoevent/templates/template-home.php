<?php

/**
 * Template Name: template page accueil
 */
?>

<?php get_header(); ?>


<!-- hero -->

<div>
    <h1 class="site-title"><?php the_title() ?></h1>

    <?php 
    // Affichage d'une image aléatoire à partir des articles de type "photo"
    query_posts(
        array(
            'post_type' => 'photo',
            'showposts' => 1,
            'orderby' => 'rand',
        )
    ); ?>
    <?php if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>"> <?php
        endwhile;
        endif; ?>
</div>