<?php

/**
 * Template Name: template page accueil
 */
?>

<?php get_header(); ?>


<!-- HERO -->

<div class="hero">
    <h1 class="site-title"><?php the_title() ?></h1>

    <?php 
    // Affichage d'une image aléatoire à partir des articles de type "photo"
    query_posts(
        array(
            'post_type' => 'photo',
            'showposts' => 1,
            'orderby' => 'rand',
        )
    ); 
    ?>
    <?php 
    if (have_posts()) :
        while (have_posts()) :
            the_post(); 
            ?>
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
    <?php
        endwhile;
    endif; 
    ?>
</div>


<!-- PICTURES LIST  -->

<div class="post-list">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $gallery = new WP_Query(array(
        'post_type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 8,
        'paged' => $paged,
    ));

    show_gallery($gallery, false);
?>
</div>


<!-- PAGINATION-->

<div class="button-container">
    <a id="load-more" href="#!"><button class="button">Charger plus</button></a>
</div>

<?php get_footer(); ?>