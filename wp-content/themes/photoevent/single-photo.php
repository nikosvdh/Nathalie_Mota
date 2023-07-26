<?php
/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<?php
/* Start the Loop - PHOTO */
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

<!-- CTA CONTACT -->

<div class="is-interested">
    <div class="is-interested-text-button">
        <p class="is-interested-text">Cette photo vous intéresse ?</p>
        <button class="button">Contact</button>
    </div>

    <div class="is-interested-slider">
        <?php
		$previousPhoto = get_previous_post();
		$nextPhoto = get_next_post();
		?>

        <div class="is-interested-arrows">
            <?php if (!empty($previousPhoto)) {
				$previousThumbnail = get_the_post_thumbnail_url($previousPhoto->ID);
				$previousLink = get_permalink($previousPhoto); ?>
            <a href="<?php echo $previousLink; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_left.png"
                    alt="Flèche vers la gauche" />
            </a>
            <?php } else { ?>
            <img style="opacity:0; cursor: auto;"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_left.png"
                alt="Flèche vers la gauche" />
            <?php }
			if (!empty($nextPhoto)) {
				$nextThumbnail = get_the_post_thumbnail_url($nextPhoto->ID);
				$nextLink = get_permalink($nextPhoto); ?>
            <a href="<?php echo $nextLink; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_right.png"
                    alt="Flèche vers la droite" />
            </a>
            <?php } else { ?>
            <img style="opacity:0; cursor: auto;"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_right.png"
                alt="Flèche vers la droite" />
            <?php } ?>
        </div>
        <div class="img-container">
            <div>
                <?php
				if (isset($previousThumbnail) && !empty($previousThumbnail)) {
					// Afficher l'image suivante
					echo '<img class="previous-img" src="' . $previousThumbnail . '" alt="affichage de la photo précédente" />';
				} else {
					// Afficher un message d'erreur ou une image par défaut
					echo '<p></p>';
				}
				?>
            </div>
            <div>
                <?php
				if (isset($nextThumbnail) && !empty($nextThumbnail)) {
					// Afficher l'image suivante
					echo '<img class= "next-img" src="' . $nextThumbnail . '" alt="affichage de la photo suivante" />';
				} else {
					// Afficher un message d'erreur ou une image par défaut
					echo '<p></p>';
				}
				?> </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>