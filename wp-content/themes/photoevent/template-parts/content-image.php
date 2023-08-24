<!-- Image pour la galerie -->

<?php

$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');

// Récupération de l'attribut ALT de l'image mise en avant pour une meilleure accessibilité
$thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

// Récupérer la référence de l'article
$article_reference = get_field('reference');

// Récupération de la catégorie de l'article
$categories = get_terms(array(
    'taxonomy' => 'categories',
    'hide_empty' => false,
));

?>


<div class="gallery-pic resize-pic">
    <div class="gallery-img">
        <img id="img-full" class="img-full" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_alt; ?>"
            title="" data-src-full="<?php the_post_thumbnail_url() ?>">
        <div class="gallery-icons-hover">
            <a href="#">
                <img class="icon-full"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png"
                    alt="Icône plein écran" />
            </a>
            <a href="<?php echo get_post_permalink(); ?>">
                <img class="icon-eye" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png"
                    alt="Icône oeil" />
            </a>

            <div class="gallery-data" data-year=<?php $post_date = get_the_date('Y');
                echo $post_date; ?>>
                <p class="gallery-reference"><?php echo $article_reference;?></p>
                <p class="gallery-category"><?php echo the_terms(get_the_ID(), 'categorie', false); ?></p>
            </div>
        </div>
    </div>
</div>