<?php
/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<?php
/* Start the Loop  - Section photo + info */
while ( have_posts() ) :
	the_post();
?>
<div>
    <ul class="info-pic">
        <div class="info part">
            <li>
                <h2 class="title-pic"> <?php echo the_title(); ?></h2>
            </li>
            <li>
                <p class="info-margin">RÉFÉRENCE : <?php echo get_field('reference'); ?></p>
            </li>
            <li>
                <p class="info-margin">CATÉGORIE : <?php the_terms(get_the_ID(), 'categorie'); ?></p>
            </li>
            <li>
                <p class="info-margin">FORMAT : <?php the_terms(get_the_ID(), 'format'); ?></p>
            </li>
            <li>
                <p class="info-margin">TYPE : <?php echo get_field('type'); ?></p>
            </li>
            <li>
                <p class="info-margin">ANNÉE : <?php echo get_the_date('Y'); ?></p>
            </li>
        </div>

        <div class='gallery-img part'>
            <?php get_template_part( 'template-parts/content', "image"); ?>
        </div>
    </ul>
</div>

<?php
endwhile; // End of the loop.
?>

<?php get_footer(); ?>