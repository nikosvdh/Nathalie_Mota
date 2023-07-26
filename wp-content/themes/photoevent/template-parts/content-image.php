<!-- Galerie Single -->

<?php

$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');

// Récupération de l'attribut alt de l'image
$thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

// Récupération du titre du post
$article_title = get_the_title();

// Récupération des catégories du post
$categories = get_terms(array(
    'taxonomy' => 'categories',
    'hide_empty' => false,
));

?>


<div class="gallery-pic">
    <div class="gallery-img">
        <img id="img-full" class="img-full" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_alt; ?>"
            title="<?php echo $article_title; ?>" data-src-full="<?php the_post_thumbnail_url() ?>">
        <div>
            <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png"
                    alt="Icône plein écran" />
            </a>
            <a href="<?php echo get_post_permalink(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="Icône oeil" />
            </a>

            <div data-date=<?php $post_date = get_the_date('Y');
                echo $post_date; ?>>
                <p><?php echo $article_title; ?></p>
                <p><?php echo the_terms(get_the_ID(), 'categories', false); ?></p>
            </div>
        </div>
    </div>
</div>