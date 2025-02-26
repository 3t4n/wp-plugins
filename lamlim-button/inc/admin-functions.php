<?php

if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'lmlm_create_menu' );
  add_action( 'admin_init', 'register_mysettings' );
}

// create custom plugin settings menu
//add_action('admin_menu', 'lmlm_create_menu');
function lmlm_create_menu() {

	//create new top-level menu
	add_menu_page(__('Lamlim Plugin Settings','lmlm'), __('Lamlim Settings','lmlm'), 'manage_options', __FILE__, 'lmlm_settings_page',LMLM_IMAGES_URL.'/icon16.png');
}

function register_mysettings(){
	//register our settings	
	register_setting( 'lmlm_settings_group', 'lmlm_options' );
}
//*/

function lmlm_settings_page() {
	global $lmlm_options;

?>
<div class="wrap">
<h2><?php _e('Lamlim Button', 'lmlm') ?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'lmlm_settings_group' ); ?>
    <?php do_settings_sections( 'lmlm_settings_group' ); ?>

							<div>
								
								<h3><?php _e( 'Visibility', 'lmlm' ); ?></h3>
								
								<table>
									<tr valign="top">
										<td>
											<?php _e( 'What types of pages should the button appear on?', 'lmlm' ); ?>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_home_page" name="lmlm_options[display_home_page]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_home_page'] ); ?> />
											<label for="display_home_page"><?php _e( 'Home Page (or Latest Posts Page)', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_front_page" name="lmlm_options[display_front_page]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_front_page'] ); ?> />
											<label for="display_front_page"><?php _e( 'Front Page (different from Home Page only if set in Settings > Reading)', 'lmlm' ); ?></label>
										</td>
									</tr>					
									<tr valign="top">
										<td>
											<input id="display_posts" name="lmlm_options[display_posts]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_posts'] ); ?> />
											<label for="display_posts"><?php _e( 'Individual Posts', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_pages" name="lmlm_options[display_pages]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_pages'] ); ?> />
											<label for="display_pages"><?php _e( 'WordPress Static "Pages"', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_archives" name="lmlm_options[display_archives]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_archives'] ); ?> />
											<label for="display_archives"><?php _e( 'Archives (includes Category, Tag, Author and date-based pages)', 'lmlm' ); ?></label>
										</td>
									</tr>
								</table>
							</div>
								
							<div>
								
								<h3><?php _e( 'Placement', 'lmlm' ); ?></h3>
								
								<table>
									<tr valign="top">
										<td>
											<?php _e( 'Where on each page should the button appear?', 'lmlm' ); ?>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_above_content" name="lmlm_options[display_above_content]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_above_content'] ); ?> />
											<label for="display_above_content"><?php _e( 'Above Content', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_below_content" name="lmlm_options[display_below_content]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_below_content'] ); ?> />
											<label for="display_below_content"><?php _e( 'Below Content', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input id="display_on_post_excerpts" name="lmlm_options[display_on_post_excerpts]" type="checkbox" value="1"
												<?php checked( (bool)$lmlm_options['display_on_post_excerpts'] ); ?> />
											<label for="display_on_post_excerpts"><?php _e( 'On Post Excerpts', 'lmlm' ); ?></label>
										</td>
									</tr>
									
								</table>
							</div>
								
							<div>
								
								<h3><?php _e( 'Alignment', 'lmlm' ); ?></h3>
									<table>
										<tr valign="top">
											<td>
											<input type="radio" id="align_right" value="0" name="lmlm_options[align]"
												<?php checked( $lmlm_options['align']==0 ); ?> />
											<label for="align_right"><?php _e( 'Right', 'lmlm' ); ?></label>
											</td>
										</tr>
										<tr valign="top">
										<td>
											<input type="radio" id="align_center" value="1" name="lmlm_options[align]"
												<?php checked( $lmlm_options['align']==1 ); ?> />
											<label for="align_center"><?php _e( 'Center', 'lmlm' ); ?></label>
										</td>
										</tr>
										<tr valign="top">
										<td>
											<input type="radio" id="align_left" value="2" name="lmlm_options[align]"
												<?php checked( $lmlm_options['align']==2 ); ?> />
											<label for="align_left"><?php _e( 'Left', 'lmlm' ); ?></label>
										</td>
										</tr>
								</table>
							</div>
							
							<div>
								
								<h3><?php _e( 'Click Action', 'lmlm' ); ?></h3>
								
								<table>
									<tr valign="top">
										<td>
											<?php _e( 'What to do after the visitor clicks on the button?', 'lmlm' ); ?>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input type="radio" id="user_selected" value="user_selected" name="lmlm_options[button_style]"
												<?php checked( $lmlm_options['button_style']=='user_selected' ); ?> />
											<label for="user_selected"><?php _e( 'Let the visitor selects an image', 'lmlm' ); ?></label>
										</td>
									</tr>
									<tr valign="top">
										<td>
											<input type="radio" id="pre_selected" value="pre_selected" name="lmlm_options[button_style]"
												<?php checked( $lmlm_options['button_style']=='pre_selected' ); ?> />
											<label for="pre_selected"><?php _e( 'Use the first image of the Post', 'lmlm' ); ?></label>
										</td>
									</tr>
									
								</table>
							</div>
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>