<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 3.5
 */
function dsnp_render_submenu_page() {

    // After settings updated
    if ( isset( $_GET['settings-updated'] ) ) {

        // Successful message
        ?>
            <div id="message" class="updated">
                <p><?php _e( 'Custom functions updated successfully.', DSNP_TEXT ); ?></p>
            </div>
        <?php
    }

    // Error message
    $error = get_option( 'dsnp_error' );
    if ( $error == '1' ) :
        ?>
            <div id="message" class="error">
                <p>
                    <?php _e( 'Sorry, but your code causes a "Fatal error", so it is not applied!', DSNP_TEXT ); ?><br/>
                    <?php _e( 'Please, check the code and try again.', DSNP_TEXT ); ?>
                </p>
            </div>
        <?php
    endif;

	// Page
	?>
	<div class="wrap">
		<h1><?php _e( 'Dessky Snippets', DSNP_TEXT ); ?></h1>
		
		<div class="notice notice-info">
                <p>If you need more custom coding you should check our <a href="https://dessky.com/services/" target="_blank">WordPress Customization Service</a>.</p>
		</div>

        <div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
            
            <!-- FORM -->
                <div id="post-body-content">
                    <div class="meta-box-sortabless">

                        <form name="dsnp-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'dsnp_settings_group' ); ?>

                            <?php
                                // Declare variables
                                $options = get_option( 'dsnp_settings' );
                                $content = isset( $options['dsnp-content'] ) && !empty( $options['dsnp-content'] ) ? $options['dsnp-content'] : '/* Enter Your PHP Code Here */';
                                $disable = isset( $options['disable'] ) && !empty( $options['disable'] ) && $options['disable'] == "on" ? 'checked' : ' ';
                            ?>
                                        
                                <textarea name="dsnp_settings[dsnp-content]" id="dsnp_settings[dsnp-content]" ><?php echo htmlentities( $content ); ?></textarea>
                                <label for="dsnp_settings[disable]">
                                <input type="checkbox" name="dsnp_settings[disable]" id="dsnp_settings[disable]" <?php echo $disable; ?> >
                                  Disable snippets</label>

                            <?php submit_button( __( 'Save Changes', DSNP_TEXT ), 'primary', 'submit', true ); ?>

                        </form>

                    </div>
                </div>
            <!-- END-FORM -->
            
            <!-- SIDEBAR -->
            <div id="postbox-container-1" class="postbox-container">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">
                            <p><?php _e( 'This plugin allows you to easily and safely add your custom functions (PHP code) to your website.', DSNP_TEXT ); ?></p>
                            <p><?php _e( 'To use it, enter your custom functions, then click "Save Changes". It\'s that simple!', DSNP_TEXT ); ?></p>

                </div>
            </div>
            <!-- END-SIDEBAR -->
	       </div>
        </div>

	</div>
	<?php
}