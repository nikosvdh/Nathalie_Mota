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

<section class="gallery">

    <div class="filters-container">
        <!-- Fonction pour récupéter et afficher les catégories -->

        <?php function showCategories($taxonomy)
        {
            if ($terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'orderby' => 'name'
            ))) {
                foreach ($terms as $term) {
                    echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                }
            }
        }

        ?>

        <div class="category-format-filters">

            <!-- Filter Categories -->

            <div>
                <form class="filter-column">
                    <select id="categories">
                        <option value="all" hidden></option>
                        <option value="all" selected>CATÉGORIES</option>
                        <?php
                        $categories = get_terms(array(
                            "taxonomy" => "categorie",
                            "hide_empty" => false,
                        ));
                        foreach ($categories as $categorie) {
                            echo '<option value="' . $categorie->slug . '">' . $categorie->name . '</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>

            <!-- Filter Formats -->

            <div class="formats-filter">
                <form class="filter-column">
                    <select id="formats">
                        <option value="all" hidden></option>
                        <option value="all" selected>FORMATS</option>
                        <?php
                        $formats = get_terms(array(
                            "taxonomy" => "format",
                            "hide_empty" => false,
                        ));
                        foreach ($formats as $format) {
                            echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
                        }
                        ?>
                    </select>
                </form>

            </div>

        </div>

        <!-- Filter Sort By Date -->

        <div>
            <form class="filter-column">
                <select id="sort-by-date">
                    <option value="all" hidden></option>
                    <option value="all" selected>TRIER PAR</option>
                    <option value="DESC">Les plus récentes</option>
                    <option value="ASC">Les plus anciennes</option>
                </select>
        </div>
        </form>
    </div>
    </div>


    <!-- PICTURES LIST  -->

    <div class="gallery-container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $gallery = new WP_Query(array(
            'post_type' => 'photo',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 12,
            'paged' => $paged,
        ));

        show_gallery($gallery, false);
    ?>
    </div>


    <!-- PAGINATION-->

    <div class="button-container">
        <a id="load-more" data-current-index="1" href="#!"><button class="button">Charger plus</button></a>
    </div>
</section>

<?php get_footer(); ?>