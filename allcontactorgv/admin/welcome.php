<h1 style="color: #2271b1"><?php esc_html_e( 'Данные организации', 'allcontactorgv' ); ?></h1>
<div class="container">
    <?php settings_errors(); ?>
    <form action="options.php" method="POST">
        <?php
            settings_fields('allcontactorgv_settings');
            do_settings_sections('allcontactorgv_settings');
            submit_button();
        ?>
    </form>
</div>