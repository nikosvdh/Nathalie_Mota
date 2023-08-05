<div class="lightbox active">
    <button class="close-lightbox"> <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox_crossmark.png"
            alt="Croix pour fermer la modale" /></button>
    <button class="previous-pic-lightbox"> <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox_arrow_left.png"
            alt="Flèche vers la gauche" /> </button>
    <button class="next-pic-lightbox"> <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox_arrow_right.png"
            alt="Flèche vers la droite" />
    </button>

    <div class="lightbox-div">
        <div>
            <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>"
                class="post-thumbnail" />
            <div>
                <p class="lightbox-reference"></p>
                <p class="lightbox-category"></p>
            </div>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </div>
</div>