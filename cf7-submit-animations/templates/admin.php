<div class="wrap">
    <h1><?php _e('Contact Form 7 Submit Animations','cf7-submit-animations'); ?></h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('cf7_submit_animations_settings');
        do_settings_sections('cf7_submit_animations');
        submit_button();
        ?>
    </form>


</div>