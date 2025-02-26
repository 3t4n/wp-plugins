<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <div class="notice gwlautoimage--notice">
        <div>
            <h3><?php esc_html_e( 'Auto Image Description Generator', 'autoimage' ); ?></h3>
            <p>Here's a link to the documentation for the plugin. This will help you learn more about its features and how to use it.</p>
			<div class="e-notice__actions">
				<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/auto-image-description-generator/doc/" class="e-button--cta cta-secondary" target="_blank"><span>Documentation</span></a>
            </div>
			<p class="e-note">For any feedback or queries regarding this plugin, please contact our <a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Support team</a>.</p>
        </div>
    </div>
    

    <form method="post" action="options.php">
        <?php
        // This prints out all hidden setting fields
        settings_fields('gwl_autoimage_option_group');
        do_settings_sections('gwl-autoimage-settingpage');
        submit_button();
        ?>
    </form>
</div>