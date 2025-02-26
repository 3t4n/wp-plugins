<div class="wrap">
    <form action="options.php" method="post">
        <?php
        settings_fields(Attr4ce_Constants::OPTION_GROUP);
        do_settings_sections(Attr4ce_Constants::PAGE);
        ?>

        <?php
        wp_nonce_field('acme-settings-save', 'acme-custom-message');
        submit_button(__('Save Changes'));
        ?>
    </form>
</div>