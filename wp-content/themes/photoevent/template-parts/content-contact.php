<?php
// contenu de la fenêtre modale (image, bouton de fermeture et formulaire de contact)
?>

<div id="myModal" class="modal open">
    <div class="modal-content">
        <img class="img-contact" src="<?php echo get_template_directory_uri(); ?>'/assets/images/contact.png'"
            alt="contact">

        <span class="close"></span>
        <p><?php
            $shortcode_output = do_shortcode('[wpforms id="22"]');
            echo $shortcode_output;
            ?>
        </p>
    </div>
</div>