<?php
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
?>

	<div class="wrap">
    <h1>Awesome Photo Gallery - <?php _e( 'Settings', 'apg' ); ?></h1>

	<div class="apg-highlight">
		<p><?php _e( 'Welcome in the settings screen for Awesome Photo Gallery. Here you can change a lot of things settings, like the album thumbnail display and thumbnail size. ', 'apg' ); ?>
		<p><?php if( \APG\Core\Helper::is_premium() === false ) {
				printf( __( 'When you\'re looking for more functionality and premium support, take a look at <a href="%s" target="_blank">Awesome Photo Gallery Premium</a>.', 'apg' ),
					"https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings" );
			} else{
				_e('Thank you for using our premium version, you are now enabled to use the filmstrip, share buttons, lightbox designs and a lot more. Do you have questions? Please contact our support department!','apg');
			}?></p>
	</div>

    <form method="post" action="<?php echo admin_url('edit.php?post_type=apg_photo_albums&page=apg_settings'); ?>" enctype="multipart/form-data">
        <?php wp_nonce_field( 'apg_photo_settings_nonce', 'apg_photo_settings_nonce' ); ?>

        <div id="apg-tabs">
	        <div class="apg-tabs-wrap">
		        <ul class="nav-tab-wrapper">
			        <li><a href="#apg-tabs-general" class="nav-tab nav-tab-active"><?php _e('General', 'apg'); ?></a></li>
			        <li><a href="#apg-tabs-album" class="nav-tab"><?php _e('Album', 'apg'); ?></a></li>
			        <li><a href="#apg-tabs-slideshow"  class="nav-tab"><?php _e('Slideshow', 'apg'); ?></a></li>
			        <li><a href="#apg-tabs-analytics" class="nav-tab" id="apg-tabs-analyticsb"><?php _e('Analytics', 'apg'); ?></a></li>
			        <li><a href="#apg-tabs-addon-share-buttons" class="nav-tab apg-premium-span-tab"><?php _e( 'Share buttons', 'apg' ); ?> <span class="apg-premium">Premium</span></a></li>
			        <li><a href="#apg-tabs-lightbox" class="nav-tab apg-premium-span-tab"><?php _e( 'Lightbox', 'apg' ); ?> <span class="apg-premium">Premium</span></a></li>
			        <li><a href="#apg-tabs-album-addons" class="nav-tab" id="apg-tabs-licenses"><?php _e('License keys', 'apg'); ?></a></li>
		        </ul>
	        </div>
            <div id="apg-tabs-general">
                <h3><?php _e('General','apg'); ?></h3>
	            <p><i><?php _e( 'Note: You can change the look and feel of the thumbnails on the "Album" tab.' ); ?></i></p>

                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Album thumbnail display', 'apg' ); ?></th>
                        <td>
                            <div style="float:left; width: 170px; text-align:center;">
                                <label><input type="radio" name="apg_settings[gallery]" value="col-2"<?php if( $this->template['settings']['gallery'] === 'col-2' ): echo ' checked="checked"'; endif; ?> /> <?php _e( '2 Column', 'apg' ); ?><br />
                                    <img src="<?php echo plugins_url('assets/backend/images/col-2.png', APG_ROOT_PATH); ?>" alt="2 column" width="80%" /></label>
                            </div>
                            <div style="float:left; width: 170px; text-align:center;">
                                <label><input type="radio" name="apg_settings[gallery]" value="col-3"<?php if( $this->template['settings']['gallery'] === 'col-3' ): echo ' checked="checked"'; endif; ?> /> <?php _e( '3 Column', 'apg' ); ?><br />
                                    <img src="<?php echo plugins_url('assets/backend/images/col-3.png', APG_ROOT_PATH); ?>" alt="3 column" width="80%" /></label>
                            </div>
                            <div style="float:left; width: 170px; text-align:center;">
                                <label><input type="radio" name="apg_settings[gallery]" value="col-4"<?php if( $this->template['settings']['gallery'] === 'col-4' ): echo ' checked="checked"'; endif; ?> /> <?php _e( '4 Column', 'apg' ); ?><br />
                                    <img src="<?php echo plugins_url('assets/backend/images/col-4.png', APG_ROOT_PATH); ?>" alt="4 column" width="80%" /></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Thumbnail size (pixels)', 'apg' ); ?></th>
                        <td>
                            <label><input type="radio" name="apg_settings[thumb_size]" value="50"<?php if( $this->template['settings']['thumb_size'] === 50 ): echo ' checked="checked"'; endif; ?> /> 50 x 50</label><br />
                            <label><input type="radio" name="apg_settings[thumb_size]" value="75"<?php if( $this->template['settings']['thumb_size'] === 75 ): echo ' checked="checked"'; endif; ?> /> 75 x 75</label><br />
                            <label><input type="radio" name="apg_settings[thumb_size]" value="100"<?php if( $this->template['settings']['thumb_size'] === 100 ): echo ' checked="checked"'; endif; ?> /> 100 x 100</label><br />
                            <label><input type="radio" name="apg_settings[thumb_size]" value="125"<?php if( $this->template['settings']['thumb_size'] === 125 ): echo ' checked="checked"'; endif; ?> /> 125 x 125</label><br />
                            <label><input type="radio" name="apg_settings[thumb_size]" value="150"<?php if( $this->template['settings']['thumb_size'] === 150 ): echo ' checked="checked"'; endif; ?> /> 150 x 150</label><br />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Show album description', 'apg' ); ?></th>
                        <td>
                            <select name="apg_settings[album_description]">
                                <option value="before"<?php if( $this->template['settings']['album_description'] === 'before' ): echo ' selected="selected"'; endif; ?>><?php _e('Before album thumbnails', 'apg'); ?></option>
                                <option value="after"<?php if( $this->template['settings']['album_description'] === 'after' ): echo ' selected="selected"'; endif; ?>><?php _e('After album thumbnails', 'apg'); ?></option>
                            </select>
                        </td>
                    </tr>
                </table>

                <h3><?php _e( 'Advanced settings', 'apg' ); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Frontend APG Stylesheet', 'apg' ); ?></th>
                        <td>
                            <p><label><input type="checkbox" name="apg_settings[disable_frontend_css]" value="1"<?php if( $this->template['settings']['disable_frontend_css'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Disable frontend Awesome Photo Gallery CSS', 'apg'); ?></label></p>
                            <p><i><?php _e( 'Note: If you check this box some functionality may not work as expected.', 'apg' ); ?></i></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Frontend APG Javascript', 'apg' ); ?></th>
                        <td>
                            <p><label><input type="checkbox" name="apg_settings[disable_frontend_js]" value="1"<?php if( $this->template['settings']['disable_frontend_js'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Disable frontend Awesome Photo Gallery JS', 'apg'); ?></label></p>
                            <p><i><?php _e( 'Note: If you check this box some functionality may not work as expected.', 'apg' ); ?></i></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apg-tabs-album" style="position: relative;">
                <h3><?php _e('Album overview & thumbnails','apg'); ?></h3>

	            <table class="form-table">
		            <tr>
			            <th scope="row"><?php _e('Thumbnail shadow', 'apg' ); ?></th>
			            <td>
				            <p><label><input type="checkbox" name="apg_settings[enable_thumb_shadow]" value="1"<?php if( $this->template['settings']['enable_thumb_shadow'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Enable a thumbnail shadow', 'apg'); ?></label></p>
			            </td>
		            </tr>
		            <tr>
			            <th scope="row"><?php _e('Shadow color', 'apg' ); ?></th>
			            <td>
				            <p><label><input type="text" class="apg-color-field" name="apg_settings[thumb_shadow_color]" value="<?php if( isset( $this->template['settings']['thumb_shadow_color'] ) ): echo $this->template['settings']['thumb_shadow_color']; else: echo 'e7e7e7'; endif; ?>"></label></p>
			            </td>
		            </tr>
		            <tr>
			            <th scope="row"><?php _e('Shadow thickness', 'apg' ); ?></th>
			            <td>
				            <p><label><input type="number" name="apg_settings[thumb_shadow_width]" value="<?php if( isset( $this->template['settings']['thumb_shadow_width'] ) ): echo (int) $this->template['settings']['thumb_shadow_width']; else: echo 2; endif; ?>"></label>px</p>
				            <p><i><?php _e( 'Note: Set the thickness in pixels', 'apg' ); ?></i></p>
			            </td>
		            </tr>
		            <tr>
			            <th scope="row"><?php _e('Thumbnail border width', 'apg' ); ?></th>
			            <td>
				            <p><label><input type="number" name="apg_settings[thumb_border_width]" id="thumb_border_width" value="<?php if( isset( $this->template['settings']['thumb_border_width'] ) ): echo (int) $this->template['settings']['thumb_border_width']; else: echo 1; endif; ?>"></label>px</p>
				            <p><i><?php _e( 'Note: Set the border width in pixels', 'apg' ); ?></i></p>
			            </td>
		            </tr>
		            <tr>
			            <th scope="row"><?php _e('Thumbnail border color', 'apg' ); ?></th>
			            <td>
				            <p><label><input type="text" class="apg-color-field" id="thumb_border_color" name="apg_settings[thumb_border_color]" value="<?php if( isset( $this->template['settings']['thumb_border_color'] ) ): echo $this->template['settings']['thumb_border_color']; else: echo 'e7e7e7'; endif; ?>"></label></p>
			            </td>
		            </tr>
	            </table>

                <h3><?php _e('Album archive settings','apg'); ?></h3>
                <p><a href="<?php echo get_post_type_archive_link( 'apg_photo_albums' ); ?>" class="button" target="_blank"><?php _e('View your albums archive', 'apg'); ?></a></p>
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Amount of thumbnails', 'apg' ); ?></th>
                        <td><select name="apg_settings[archive_limit]"><?php $values = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ); ?>
                                <?php foreach( $values as $v ){
                                    if( (int) $this->template['settings']['archive_limit'] === $v ) {
                                        echo '<option value="' . $v . '" selected="selected">' . sprintf( _n( '%s photo', '%s photo\'s', $v, 'apg' ), $v ) . '</option>';
                                    }
                                    else {
                                        echo '<option value="' . $v . '">' . sprintf(_n('%s photo', '%s photo\'s', $v, 'apg'), $v) . '</option>';
                                    }
                                } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apg-tabs-slideshow">
                <h3><?php _e('Slideshow','apg'); ?></h3>
                <table class="form-table">
                    <tr>
	                    <th scope="row"><?php _e('Enable slideshow', 'apg' ); ?></th>
	                    <td>
		                    <p><label><input type="checkbox" name="apg_settings[enable_slideshow]" value="1"<?php if( $this->template['settings']['enable_slideshow'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Enable the slideshow in the photo galleries', 'apg'); ?></label></p>
	                    </td>
                    </tr>
                    <tr>
	                    <th scope="row"><?php _e('Timeout between pictures', 'apg' ); ?></th>
	                    <td>
		                    <p><label><input type="number" name="apg_settings[slideshow_timeout]" value="<?php if( isset( $this->template['settings']['slideshow_timeout'] ) ): echo (int) $this->template['settings']['slideshow_timeout']; else: echo 3; endif; ?>"></label></p>
		                    <p><i><?php _e( 'Note: Set the amount of seconds between the pictures.', 'apg' ); ?></i></p>
	                    </td>
                    </tr>
	                <tr>
		                <th scope="row"><?php _e('Auto start slideshow', 'apg' ); ?></th>
		                <td>
			                <p><label><input type="checkbox" name="apg_settings[slideshow_autostart]" value="1"<?php if( $this->template['settings']['slideshow_autostart'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Start the slideshow immediately when the photo viewer is opened', 'apg'); ?></label></p>
		                </td>
	                </tr>
                </table>
	            <p><strong><?php _e('You can enable the filmstrip on the Lightbox tab.', 'apg'); ?></strong></p>
	            <p><br /></p>
            </div>
	        <div id="apg-tabs-addon-share-buttons">
		        <h3><?php _e('Share buttons', 'apg'); ?></h3>

		        <?php
		        if( \APG\Core\Helper::is_premium() === false ) { ?>
			        <div class="card">
				        <img src="<?php echo plugins_url('assets/backend/images/manage_share.png', APG_ROOT_PATH); ?>" align="left" height="185" style="margin-right: 10px;" />

				        <h2><?php _e( 'Get the share buttons', 'apg' ); ?></h2>

				        <p><?php _e( 'This is one of the premium features for Awesome Photo Gallery. In order to activate this functionality with premium support and updates, you need to order and download it at our webshop.', 'apg' ); ?></p>

				        <p><a href="https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings" target="_blank" class="button"><?php _e('Get it now', 'apg'); ?> &raquo;</a></p>
			        </div>
		        <?php } else {
		            do_action( 'apg_premium_share_buttons' );
		        } ?>
		        </table>
	        </div>
	        <div id="apg-tabs-lightbox">
		        <h3><?php _e('Lightbox', 'apg'); ?></h3>

		        <?php
		        if( \APG\Core\Helper::is_premium() === false ) { ?>
			        <div class="card">
				        <img src="<?php echo plugins_url('assets/backend/images/manage_lightbox.png', APG_ROOT_PATH); ?>" align="left" height="185" style="margin-right: 10px;" />

				        <h2><?php _e( 'Change the lightbox', 'apg' ); ?></h2>

				        <p><?php _e( 'This is one of the premium features for Awesome Photo Gallery. In order to activate this functionality with premium support and updates, you need to order and download it at our webshop.', 'apg' ); ?></p>

				        <p><a href="https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings" target="_blank" class="button button-primary"><?php _e('Get it now', 'apg'); ?> &raquo;</a></p>
			        </div>
		        <?php } else {
		            do_action( 'apg_premium_lightbox' );
		        } ?>

		        <h3><?php _e('Filmstrip','apg'); ?></h3>
		        <?php
		        if( \APG\Core\Helper::is_premium() === false ) { ?>
			        <div class="card">
				        <img src="<?php echo plugins_url('assets/backend/images/filmstrip.png', APG_ROOT_PATH); ?>" align="left" height="185" style="margin-right: 10px;" />

				        <h2><?php _e( 'Enable the filmstrip', 'apg' ); ?></h2>

				        <p><?php _e( 'This is one of the premium features for Awesome Photo Gallery. In order to activate this functionality with premium support and updates, you need to order and download it at our webshop.', 'apg' ); ?></p>

				        <p><a href="https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings" target="_blank" class="button"><?php _e('Get it now', 'apg'); ?> &raquo;</a></p>
			        </div>
		        <?php } else {
			        do_action( 'apg_premium_slideshow_filmstrip' );
		        } ?>
	        </div>
	        <div id="apg-tabs-analytics">
		        <h3><?php _e('Google Analytics','apg'); ?></h3>
		        <p><?php printf( __( 'The Google Analytics tracking could be enabled when you\'ve also installed %sAwesome Google Analytics%s. This is a free plugin, which could be downloaded from the WordPress.org repository.', 'aga'), '<a href="https://wordpress.org/plugins/awesome-google-analytics" target="_blank">', '</a>' ); ?></p>
		        <?php if( $this->template['installed_aga'] ): ?>
		        <table class="form-table">
			        <tr>
				        <th scope="row"><?php _e('UA tracking code', 'apg' ); ?></th>
				        <td>
					        <p><label><?php echo esc_attr( $this->template['ga_ua_code'] ); ?></label> <a href="<?php echo admin_url('admin.php?page=aga_googleanalytics'); ?>" class="button"><?php _e('Change','aga'); ?></a></p>
				        </td>
			        </tr>
			        <tr>
				        <th scope="row"><?php _e('Enable event tracking', 'apg' ); ?></th>
				        <td>
					        <p><label><input type="checkbox" name="apg_settings[google_analytics_event]" value="1"<?php if( $this->template['settings']['google_analytics_event'] === true ): echo ' checked="checked"'; endif; ?>> <?php _e('Enable the Google Analytics event tracking in the photo galleries', 'apg'); ?></label></p>
				        </td>
			        </tr>
		        </table>
		        <?php else: ?>
			        <p><i><?php _e( 'Awesome Google Analytics is not installed. Please download and activate that plugin first!' ); ?></i> <a href="https://wordpress.org/plugins/awesome-google-analytics" target="_blank" class="button"><?php _e('Download plugin', 'aga'); ?></a> </p>
		        <?php endif; ?>
		        <p><br /></p>
	        </div>
            <div id="apg-tabs-album-addons">
	            <h3 class="apg-title dashicons-before"><?php _e('License keys', 'apg'); ?></h3>
                <?php foreach( $this->template['settings']['extensions'] as $key => $extension ) : ?>
                    <div class="apg-license-block">
                        <h3 class="apg-title dashicons-before"><?php echo esc_attr( $extension['metadata']['name'] ); ?></h3>

                        <?php
                        if( isset( $this->template['settings']['licenses'][ $extension['metadata']['product_code'] ] ) ) {
                            $license = esc_attr( $this->template['settings']['licenses'][ $extension['metadata']['product_code'] ]['key'] );
                            $status  = $this->template['settings']['licenses'][$extension['metadata']['product_code']]['status'];
                        }
                        else{
                            $license = '';
                            $status  = 'installed';
                        }
                        ?>
                        <table class="form-table">
                            <tr>
                                <th scope="row"><label for="siteurl"><?php _e('Current status'); ?></label></th>
                                <td>
                                    <?php if( $status === 'disabled' ): ?>
                                    <span class="apg-addon-status apg-addon-disabled"><?php _e('Disabled', 'apg'); ?></span>
                                    <?php elseif( $status === 'expired' ): ?>
                                    <span class="apg-addon-status apg-addon-disabled"><?php _e('Expired', 'apg'); ?></span>
                                    <?php elseif( $status === 'blocked' ): ?>
                                    <span class="apg-addon-status apg-addon-disabled"><?php _e('Blocked', 'apg'); ?></span>
                                    <?php elseif( $status === 'active' ): ?>
                                    <span class="apg-addon-status apg-addon-enabled"><?php _e('Active', 'apg'); ?></span>
                                    <?php else: ?>
                                    <span class="apg-addon-status apg-addon-installed"><?php _e('Installed', 'apg'); ?></span> <i><?php _e( 'Please enter a valid license key to get updates and support for this add-on.', 'apg' ); ?></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="siteurl"><?php _e('Enter license key', 'apg'); ?></label></th>
                                <td><input name="apg_settings[licenses][<?php echo esc_attr( $extension['metadata']['product_code'] ); ?>]" type="text" id="licenses[<?php echo esc_attr( $extension['metadata']['product_code'] ); ?>]" value="<?php echo $license; ?>" class="regular-text code" autocomplete="off" /></td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; if( count( $this->template['settings']['extensions'] ) == 0 ) {
	                echo '<p>' . __('Please download and upload your premium version first, before you can activate the license key.', 'apg' ) . '</p>'; ?>
	                <div class="card">
		                <img src="<?php echo plugins_url('assets/icon-256x256.png', APG_ROOT_PATH); ?>" align="left" height="200" style="margin-right: 10px;" />

		                <h2><?php _e( 'Install Premium now', 'apg' ); ?></h2>

		                <p><?php _e( 'This is one of the premium features for Awesome Photo Gallery. In order to activate this functionality with premium support and updates, you need to order and download it at our webshop.', 'apg' ); ?></p>

		                <p><a href="https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_settings" target="_blank" class="button button-primary"><?php _e('Get it now', 'apg'); ?> &raquo;</a></p>
	                </div>
                <?php } ?>
            </div>
        </div>



        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save settings', 'apg'); ?>" /></p>
    </form>

</div>

<?php if( ( $open_tab = filter_input(INPUT_GET, 'open') ) && ! empty( $open_tab ) ): ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#<?php echo esc_attr( $open_tab ); ?>').click();
    });
</script>
<?php endif; ?>