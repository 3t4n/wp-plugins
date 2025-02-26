<?php 

    add_action( 'admin_init','RSFFCF7_load_plugin', 11 );
    function RSFFCF7_load_plugin() {
        if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
            add_action( 'admin_notices','RSFFCF7_install_error');
        }
    }

  	function RSFFCF7_install_error() {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        ?>
        <div class="error">
            <p>
                <?php _e( 'This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=contact+form+7">Contact Form 7</a> plugin installed and activated.', 'range-slider-field-for-contact-form-7' ); ?>
            </p>
        </div>
        <?php
  	}
