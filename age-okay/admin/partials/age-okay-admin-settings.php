<?php

/**
 * Settings page
 *
 * Provides an admin area view for the plugin. This file is used to markup the admin-facing Settings page in the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 * @see        class Age_Okay_Admin method partials_age_okay_settings
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin/partials
 */

$this->shared->settings = get_option( 'age_okay_settings', array() );
$this->shared->settings = array_merge( $this->shared->settings, get_option( 'age_okay_settings_all', array() ) );
if ( empty( $this->shared->settings['enabled'] ) ) {
	$this->shared->settings['enabled'] = false;
}
// create empty arrays if empty to stop in_array errors
if ( empty( $this->shared->settings['only_types'] ) ) {
	$this->shared->settings['only_types'] = array();
}
if ( empty( $this->shared->settings['only_pid'] ) ) {
	$this->shared->settings['only_pid'] = array();
}
if ( empty( $this->shared->settings['except_types'] ) ) {
	$this->shared->settings['except_types'] = array();
}
if ( empty( $this->shared->settings['except_pid'] ) ) {
	$this->shared->settings['except_pid'] = array();
}
// get all public post types
foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $object ) {
	if ( $object->name != 'attachment' ) {
		$post_types[$object->name] = $object->label;
	}
}
?>
<div class="wrap">
	<h2></h2>
	<div id='age_okay_wrap'>
		<h1 class="wp-heading-inline">Age Okay - <?php _e( 'Settings', 'age-okay' );?></h1>
		<div class='age_okay_settings'>
			<div class='age_okay_form_group'>
				<label class='age_okay_form_label'>
					<span><?php _e( 'How to display?', 'age-okay' );?></span>
				</label>
				<ul class='age_okay_settings_list'>
					<li><b><?php _e( 'Settings', 'age-okay' );?></b> - <?php _e( "Use the 'where to display?' form below", 'age-okay' );?></li>
					<li class='age_okay_red'><span class='age_okay_tooltip'><b><?php _e( 'Filter', 'age-okay' );?></b> - <?php _e( "use 'age_okay_filter' in your code to overwrite the display settings.", 'age-okay' );?><br><?php _e( 'Usage:', 'age-okay' );?> add_filter( 'age_okay_filter', function(){ return null;} );<br><?php _e( 'Return values:', 'age-okay' );?><br><?php _e( '(bool) true - show the verification screen', 'age-okay' );?><br><?php _e( '(bool) false - do not show the verification screen', 'age-okay' );?><br><?php _e( '(NULL) null - use the settings page to decide whether to show or not', 'age-okay' );?><span class="age_okay_tooltip_text"><?php _e( 'Available in PRO', 'age-okay' );?></span></span></li>
					<li class='age_okay_red'><span class='age_okay_tooltip'><b><?php _e( 'Shortcode', 'age-okay' );?></b> - <?php _e( 'place [age_okay] in your content to display the verification screen, or [age_okay hide=true] to hide it.', 'age-okay' );?><br><?php _e( 'Will override any settings and filters.', 'age-okay' );?><span class="age_okay_tooltip_text"><?php _e( 'Available in PRO', 'age-okay' );?></span></span></li>
				</ul>
				<label class='age_okay_form_label'>
					<span><?php _e( 'Where to display?', 'age-okay' );?></span>
				</label>
				<label class='age_okay_form_label'>
					<input type='radio' name='enabled' value='disabled' <?php echo ( $this->shared->settings['enabled'] == false ? 'checked' : '' );?> /> <span><?php _e( 'Disabled', 'age-okay' );?></span>
				</label>
				<label class='age_okay_form_label'>
					<input type='radio' name='enabled' value='all' <?php echo ( $this->shared->settings['enabled'] == 'all' ? 'checked' : '' );?> /> <span><?php _e( 'Sitewide', 'age-okay' );?></span>
				</label>
				<label class='age_okay_form_label'>
					<input type='radio' name='enabled' value='only' <?php echo ( $this->shared->settings['enabled'] == 'only' ? 'checked' : '' );?> /> <span><?php _e( 'Show only on:', 'age-okay' );?></span>
				</label>
				<label class='age_okay_form_label'>
					<input type='radio' name='enabled' value='except' <?php echo ( $this->shared->settings['enabled'] == 'except' ? 'checked' : '' );?> /> <span><?php _e( 'All except:', 'age-okay' );?></span>
				</label>
			</div>
			<div class='age_okay_enabled age_okay_enabled_only <?php echo ( $this->shared->settings['enabled'] == 'only' ? '' : 'age_okay_hidden' );?>'>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'By type:', 'age-okay' );?></span>
					</label>
					<label class='age_okay_form_label'>
						<input type='checkbox' name='only_home' value='true' <?php echo ( !empty( $this->shared->settings['only_home'] ) ? 'checked' : '' );?> /> <span><?php _e( 'Home', 'age-okay' );?></span>
					</label>
					<?php
					foreach ( $post_types as $key => $val ) {
						?>
						<label class='age_okay_form_label'>
							<input type='checkbox' name='only_types[]' value='<?php echo $key;?>' <?php echo ( in_array( $key, $this->shared->settings['only_types'] ) ? 'checked' : '' );?> /> <span><?php echo $val;?></span>
						</label>
						<?php
					}
					?>
				</div>
				<!--<select>
				<?php
				/*foreach ( get_pages( array( 'sort_column' => 'post_title', 'hierarchical' => 1, 'post_type' => 'page' ) ) as $val ) {
					echo '<option value="'.$val->ID.'">'.$val->post_title.' ('.$val->post_name.')</option>';
				}*/
				?>
				</select>-->
				<?php
				// loop through post types
				foreach ( $post_types as $key => $name ) {
					$posts = get_posts( array( 'posts_per_page' => -1, 'orderby' => 'title', 'post_type' => $key ) );
					if ( !empty( $posts ) ) {
					$selected = array();
					?>
					<div class='age_okay_form_group'>
						<label class='age_okay_form_label'>
							<span><?php _e( 'By', 'age-okay' ); echo ' '.$name;?></span>
							<select class='age_okay_post_select' data-type='only_pid'>
								<option value=''></option>
								<?php
								// create dropdowns for the post types and elements for selected values
								foreach ( $posts as $val ) {
									if ( in_array( $val->ID, $this->shared->settings['only_pid'] ) ) {
										$selected[] = '<span data-target="aop_'.$val->ID.'">'.esc_html( $val->post_title ).'<span class="age_okay_post_remove">X</span><input type="hidden" name="only_pid[]" value="'.$val->ID.'" /></span>';
										echo '<option value="'.$val->ID.'" data-name="'.esc_attr( $val->post_title ).'" disabled>'.esc_html( $val->post_title ).' ('.esc_html( $val->post_name ).')</option>';
									} else {
										echo '<option value="'.$val->ID.'" data-name="'.esc_attr( $val->post_title ).'">'.esc_html( $val->post_title ).' ('.esc_html( $val->post_name ).')</option>';
									}
								}
								$selected = implode( '', $selected );
								?>
							</select>
							<div class='age_okay_post_holder'><?php echo $selected;?></div>
						</label>
					</div>
					<?php
					}
				}
				?>
				<div class='age_okay_form_group age_okay_red'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'By ID:', 'age-okay' );?> <sup>&#10102;</sup><span class="age_okay_tooltip_text"><!--<?php _e( 'Click enter key to add. Numbers only.', 'age-okay' );?>--><?php _e( 'Available in PRO', 'age-okay' );?></span></span>
						<input type='text' data-type='only_cid' disabled style='background:#bdbdbd;' />
						<div class='age_okay_post_holder'>
						</div>
						<!--<textarea name='only_id' rows='5' placeholder='4,8,15,16,23,42'><?php //echo ( !empty( $this->shared->settings['only_id'] ) ? implode( ',', $this->shared->settings['only_id'] ) : '' );?></textarea>-->
					</label>
				</div>
				<div class='age_okay_form_group age_okay_red'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'By URL:', 'age-okay' );?> <sup>&#10103;</sup><span class="age_okay_tooltip_text"><!--<?php _e( 'Click enter key to add. Match all or part of URL. Read more in documentation settings section.', 'age-okay' );?>--><?php _e( 'Available in PRO', 'age-okay' );?></span></span>
						<input type='text' data-type='only_url' disabled style='background:#bdbdbd;' />
						<div class='age_okay_post_holder'>
						</div>
						<!--<textarea name='only_url' rows='5' placeholder='/products/,basket'><?php //echo ( !empty( $this->shared->settings['only_url'] ) ? implode( ',', $this->shared->settings['only_url'] ) : '' );?></textarea>-->
					</label>
				</div>
			</div>
			<div class='age_okay_enabled age_okay_enabled_except <?php echo ( $this->shared->settings['enabled'] == 'except' ? '' : 'age_okay_hidden' );?>'>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'By type:', 'age-okay' );?></span>
						<label class='age_okay_form_label'>
							<input type='checkbox' name='except_home' value='true' <?php echo ( !empty( $this->shared->settings['except_home'] ) ? 'checked' : '' );?> /> <span><?php _e( 'Home', 'age-okay' );?></span>
						</label>
						<?php
						foreach ( $post_types as $key => $val ) {
							?>
							<label class='age_okay_form_label'>
								<input type='checkbox' name='except_types[]' value='<?php echo $key;?>' <?php echo ( in_array( $key, $this->shared->settings['except_types'] ) ? 'checked' : '' );?> /> <span><?php echo $val;?></span>
							</label>
							<?php
						}
						?>
					</label>
				</div>
				<?php
				// loop through post types
				foreach ( $post_types as $key => $name ) {
					$posts = get_posts( array( 'posts_per_page' => -1, 'orderby' => 'title', 'post_type' => $key ) );
					if ( !empty( $posts ) ) {
					$selected = array();
					?>
					<div class='age_okay_form_group'>
						<label class='age_okay_form_label'>
							<span><?php _e( 'By', 'age-okay' ); echo ' '.$name;?></span>
							<select class='age_okay_post_select' data-type='except_pid'>
								<option value=''></option>
								<?php
								// create the dropdowns for the post types and elements for selected values
								foreach ( $posts as $val ) {
									if ( in_array( $val->ID, $this->shared->settings['except_pid'] ) ) {
										$selected[] = '<span data-target="aop_'.$val->ID.'">'.esc_html( $val->post_title ).'<span class="age_okay_post_remove">X</span><input type="hidden" name="except_pid[]" value="'.$val->ID.'" /></span>';
										echo '<option value="'.$val->ID.'" data-name="'.esc_attr( $val->post_title ).'" disabled>'.esc_html( $val->post_title ).' ('.esc_html( $val->post_name ).')</option>';
									} else {
										echo '<option value="'.$val->ID.'" data-name="'.esc_attr( $val->post_title ).'">'.esc_html( $val->post_title ).' ('.esc_html( $val->post_name ).')</option>';
									}
								}
								$selected = implode( '', $selected );
								?>
							</select>
							<div class='age_okay_post_holder'><?php echo $selected;?></div>
						</label>
					</div>
					<?php
					}
				}
				?>
				<div class='age_okay_form_group age_okay_red'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'By ID:', 'age-okay' );?> <sup>&#10102;</sup><span class="age_okay_tooltip_text"><!--<?php _e( 'Click enter key to add. Numbers only.', 'age-okay' );?>--><?php _e( 'Available in PRO', 'age-okay' );?></span></span>
						<input type='text' data-type='except_cid' disabled style='background:#bdbdbd' />
						<div class='age_okay_post_holder'>
						</div>
						<!--<textarea name='except_id' rows='5' placeholder='4,8,15,16,23,42'><?php //echo ( !empty( $this->shared->settings['except_id'] ) ? implode( ',', $this->shared->settings['except_id'] ) : '' );?></textarea>-->
					</label>
				</div>
				<div class='age_okay_form_group age_okay_red'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'By URL:', 'age-okay' );?> <sup>&#10103;</sup><span class="age_okay_tooltip_text"><!--<?php _e( 'Click enter key to add. Match all or part of URL. Read more in documentation settings section.', 'age-okay' );?>--><?php _e( 'Available in PRO', 'age-okay' );?></span></span>
						<input type='text' data-type='except_url' disabled style='background:#bdbdbd' />
						<div class='age_okay_post_holder'>
						</div>
						<!--<textarea name='except_url' rows='5' placeholder='/products/,basket'><?php //echo ( !empty( $this->shared->settings['except_url'] ) ? implode( ',', $this->shared->settings['except_url'] ) : '' );?></textarea>-->
					</label>
				</div>
			</div>
			<input type='hidden' name='action' value='age_okay_settings_save' />
			<input type='hidden' id='settings_nonce' name='settings_nonce' value='<?php echo wp_create_nonce( 'settings_nonce' );?>' />
			<button type="button" class="age_okay_lang_buttons age_okay_settings_save"><?php _e( 'Save', 'age-okay' );?></button>
		</div>
	</div>
</div>
