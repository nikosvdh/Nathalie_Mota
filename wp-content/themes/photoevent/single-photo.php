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
                <p class="info-margin">CATÉGORIE : <?php echo get_the_terms(get_the_ID(), 'categorie')[0]->name; ?></p>
            </li>
            <li>
                <p class="info-margin">FORMAT : <?php echo get_the_terms(get_the_ID(), 'format') [0]->name; ?></p>
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

<!-- IS INTERESTED + CTA -->

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
                <img class="arrow arrow_left"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_left.png"
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
                <img class="arrow arrow_right"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_right.png"
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
					// Afficher l'image précédente
					echo '<img class="previous-img" src="' . $previousThumbnail . '" alt="afficher la photo précédente" />';
				} else {
					// Afficher un message d'erreur ?
					echo '<p></p>';
				}
				?>
            </div>

            <div>
                <?php
				if (isset($nextThumbnail) && !empty($nextThumbnail)) {
					// Afficher l'image suivante
					echo '<img class= "next-img" src="' . $nextThumbnail . '" alt="afficher la photo suivante" />';
				} else {
					// Afficher un message d'erreur ?
					echo '<p></p>';
				}
				?>
            </div>
        </div>
    </div>

</div>

<!-- Photos apparentées -->

<div class="gallery">
    <h3 class="you-may-also-like">VOUS AIMEREZ AUSSI</h3>
    <div class="gallery-container">
        <?php
           
		$category = strip_tags(get_the_term_list($post->ID, 'categorie'));
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$morePics = new WP_Query(array(
			'post_type' => 'photo',
			'post__not_in' => array(get_the_ID()),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 2,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'categorie',
					'field' => 'slug',
					'terms' => $category,
				),
			),

		));

		$countPictures = $morePics->post_count;
		if ($countPictures > 0) {
			show_gallery($morePics);
		} else {
			echo '<p>Il n\'y a pas d\'autres photos dans cette catégorie.</p>';
		}
        
		?>
    </div>
</div>

<div class="button-container">
    <a href="<?php echo home_url('/'); ?>">
        <button class="button all-pics-button">Toutes les photos</button>
    </a>
</div>


<?php get_footer(); ?>