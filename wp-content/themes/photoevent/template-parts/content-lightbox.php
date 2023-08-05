<div>
    <button> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/crossmark.png"
            alt="Croix pour fermer la modale" /></button>
    <button> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox_arrow_left.png"
            alt="Flèche vers la gauche" /> </button>
    <button><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox_arrow_right.png"
            alt="Flèche vers la droite" />
    </button>

    <div>
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