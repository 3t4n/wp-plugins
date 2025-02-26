<?php

/**
 * Translations page
 *
 * Provides an admin area view for the plugin. This file is used to markup the admin-facing Translations page in the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin/partials
 */

// @see class Age_Okay_Shared
$this->shared->load_lang_live();
?>
<div class="wrap">
	<h2></h2>
	<div id='age_okay_wrap'>
		<h1 class="wp-heading-inline">Age Okay - <?php _e( 'Translations', 'age-okay' ); ?>&nbsp;&nbsp;&nbsp;<span class='age_okay_red'><?php _e( 'Available in PRO', 'age-okay' );?></span></h1>
		<div class='age_okay_lang_container'>
			<div id='age_okay_lang_switch_container'>
				<div class='age_okay_form_group age_okay_red'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Choose Locale', 'age-okay' ); ?></span>
						<select id='age_okay_lang_switcher' disabled style='background:#bdbdbd' >
							<option value='default'><?php _e( 'Default', 'age-okay' ); ?></option>
							<?php
							// get available languages, can be added with a translation plugin or by adding languages in the general settings language dropdown
							$langs = get_available_languages();
							//wp_dropdown_languages(array( 'show_available_translations' => false, 'languages' => array( get_locale() ) , 'selected' => get_locale() ));
							foreach ( $langs as $lang ) {
								echo '<option>' . $lang . '</option>';
							}
							?>
						</select>
					</label>
				</div>
			</div>
			<div id='age_okay_default_lang' class='age_okay_lang_content'>
				<?php
				$placeholder = '';
				$data = $this->shared->lang;
				?>
				<h2>
				<?php _e( 'Default', 'age-okay' ); ?>
				</h2>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Verification Age', 'age-okay' ); ?></span>
						<div class='age_okay_form_input_group'>
							<input type='text' name='age_diff' value='<?php echo esc_attr( ! empty( $data['age_diff'] ) ? $data['age_diff'] : '' ); ?>' <?php echo $placeholder; ?> />
							<span><?php _e( 'Years', 'age-okay' ); ?></span>
						</div>
					</label>
				</div>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Title', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='title' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['title'] ) ? $data['title'] : '' ); ?></textarea>
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Description', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='desc' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['desc'] ) ? $data['desc'] : '' ); ?></textarea>
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Text after buttons', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='endtext' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['endtext'] ) ? $data['endtext'] : '' ); ?></textarea>
					</label>
				</div>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Checkbox Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='check_text' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['check_text'] ) ? $data['check_text'] : '' ); ?></textarea>
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Error Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='check_error' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['check_error'] ) ? $data['check_error'] : '' ); ?></textarea>
					</label>
				</div>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Input Order', 'age-okay' ); ?></span>
						<select name='date_order' data-value='<?php echo esc_attr( ! empty( $data['date_order'] ) ? $data['date_order'] : '' ); ?>'>
							<option value=''>Choose date format</option>
							<option value='dmy'><?php _e( 'DMY', 'age-okay' ); ?></option>
							<option value='dym'><?php _e( 'DYM', 'age-okay' ); ?></option>
							<option value='mdy'><?php _e( 'MDY', 'age-okay' ); ?></option>
							<option value='myd'><?php _e( 'MYD', 'age-okay' ); ?></option>
							<option value='ydm'><?php _e( 'YDM', 'age-okay' ); ?></option>
							<option value='ymd'><?php _e( 'YMD', 'age-okay' ); ?></option>
						</select>
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Day Placeholder', 'age-okay' ); ?></span>
						<input type='text' name='placeholder_d' value='<?php echo esc_attr( ! empty( $data['placeholder_d'] ) ? $data['placeholder_d'] : '' ); ?>' <?php echo $placeholder; ?> />
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Month Placeholder', 'age-okay' ); ?></span>
						<input type='text' name='placeholder_m' value='<?php echo esc_attr( ! empty( $data['placeholder_m'] ) ? $data['placeholder_m'] : '' ); ?>' <?php echo $placeholder; ?> />
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Year Placeholder', 'age-okay' ); ?></span>
						<input type='text' name='placeholder_y' value='<?php echo esc_attr( ! empty( $data['placeholder_y'] ) ? $data['placeholder_y'] : '' ); ?>' <?php echo $placeholder; ?> />
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Invalid Date Error', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='input_error_invalid' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['input_error_invalid'] ) ? $data['input_error_invalid'] : '' ); ?></textarea>
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Too Young Error', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='input_error_under' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['input_error_under'] ) ? $data['input_error_under'] : '' ); ?></textarea>
					</label>
				</div>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Submit Button Text', 'age-okay' ); ?></span>
						<input type='text' name='ok_button' value='<?php echo esc_attr( ! empty( $data['ok_button'] ) ? $data['ok_button'] : '' ); ?>' <?php echo $placeholder; ?> />
					</label>
				</div>
				<hr />
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Exit Button Text', 'age-okay' ); ?></span>
						<input type='text' name='no_button' value='<?php echo esc_attr( ! empty( $data['no_button'] ) ? $data['no_button'] : '' ); ?>' <?php echo $placeholder; ?> />
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span><?php _e( 'Exit Target', 'age-okay' ); ?></span>
						<input type='text' name='no_url' value='<?php echo esc_url( ! empty( $data['no_url'] ) ? $data['no_url'] : '' ); ?>' placeholder='<?php echo ( ! empty( $lang ) ? '(inherit)' : 'http://website.com' ); ?>' />
					</label>
				</div>
				<div class='age_okay_form_group'>
					<label class='age_okay_form_label'>
						<span class='age_okay_tooltip'><?php _e( 'Exit Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
						<textarea name='no_text' <?php echo $placeholder; ?>><?php echo esc_html( ! empty( $data['no_text'] ) ? $data['no_text'] : '' ); ?></textarea>
					</label>
				</div>
			</div>
			<div id='age_okay_second_lang' class='age_okay_lang_content'>
				<!--Ajax-->
			</div>
			<input type='hidden' id='lang_nonce' name='lang_nonce' value='<?php echo wp_create_nonce( 'lang_nonce' ); ?>' />
		</div>
		<div class="clear"></div>
	</div>
</div>
