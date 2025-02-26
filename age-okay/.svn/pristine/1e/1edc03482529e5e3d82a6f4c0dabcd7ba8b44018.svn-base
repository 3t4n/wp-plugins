<?php

 /**
 * Verification Screen display
 *
 * Provides a public-facing view for the plugin. This file is used to markup the public-facing Verification Screen display.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/public/partials
 */
 
?>
<div id='age_okay_container' class='<?php echo ( $this->shared->options['back_type'] == 'image' ? 'age_okay_back_image' : '' ); ?>'>
	<style>
	/* dynamic styles */
	<?php if ( $this->shared->options['back_type'] == 'gradient' ) { ?>
		#age_okay_container #age_okay_overlay {
			background: <?php echo esc_html( $this->shared->options['gradient_color_f'] ); ?>;
			background: <?php echo esc_html( $this->shared->options['gradient'] ); ?>;
			opacity: <?php echo esc_html( $this->shared->options['gradient_opacity'] ); ?>;
		}
	<?php } elseif ( $this->shared->options['back_type'] != 'cthru' ) { ?>
		#age_okay_container #age_okay_overlay {
			background-color: <?php echo esc_html( $this->shared->options['overlay_color'] ); ?>;
			opacity: <?php echo esc_html( $this->shared->options['overlay_opacity'] ); ?>;
		}
		<?php if ( $this->shared->options['back_type'] == 'pattern' ) { ?>
			#age_okay_container {
				background: url('<?php echo esc_url( wp_get_attachment_image_src( $this->shared->options['image_url'], 'full' )[0] ); ?>');
			}
		<?php } elseif ( $this->shared->options['back_type'] == 'image' ) { ?>
			#age_okay_container {
				background: url('<?php echo esc_url( wp_get_attachment_image_src( $this->shared->options['image_url'], 'full' )[0] ); ?>');
			}
			@media (max-width: 1199px) { 
				#age_okay_container {
					background: url('<?php echo esc_url( wp_get_attachment_image_src( $this->shared->options['image_url'], array( 1199, 0 ), false )[0] ); ?>');
				}
			}
			@media (max-width: 899px) { 
				#age_okay_container {
					background: url('<?php echo esc_url( wp_get_attachment_image_src( $this->shared->options['image_url'], array( 899, 0 ) )[0] ); ?>');
				}
			}
			@media (max-width: 599px) { 
				#age_okay_container {
					background: url('<?php echo esc_url( wp_get_attachment_image_src( $this->shared->options['image_url'], array( 599, 0 ) )[0] ); ?>');
				}
			}
			<?php
		}
	}
	?>
	
	#age_okay_container #age_okay_inner {
		max-width: <?php echo ( $this->shared->options['max_width'] + 0 ) . 'px'; ?>;
	}
	
	#age_okay_container #age_okay_inner_relative, #age_okay_container #age_okay_inner #age_okay_error {
		border-width: <?php echo ( $this->shared->options['border_width'] + 0 ) . 'px'; ?>;
		border-color: <?php echo esc_html( ! empty( $this->shared->options['border_color'] ) ? $this->shared->options['border_color'] : 'transparent' ); ?>;
		background: <?php echo esc_html( ! empty( $this->shared->options['inner_color'] ) ? $this->shared->options['inner_color'] : 'transparent' ); ?>;
	}
	
	#age_okay_container #age_okay_inner .age_okay_text, .age_okay_date_input_span {
		color: <?php echo esc_html( $this->shared->options['text_color'] ); ?>;
	}
	
	#age_okay_container #age_okay_inner .age_okay_button {
		color: <?php echo esc_html( $this->shared->options['button_tcolor'] ); ?>;
		background-color: <?php echo esc_html( $this->shared->options['button_color'] ); ?>;
	}
	
	#age_okay_container #age_okay_inner .age_okay_button:hover,
	#age_okay_container #age_okay_inner .age_okay_button.age_okay_active {
		color: <?php echo esc_html( $this->shared->options['hbutton_tcolor'] ); ?>;
		background-color: <?php echo esc_html( $this->shared->options['hbutton_color'] ); ?>;
	}
	
	<?php if ( $this->shared->options['ebutton_style'] == 'true' ) { ?>
	#age_okay_container #age_okay_inner .age_okay_button.age_okay_button_no {
		color: <?php echo esc_html( $this->shared->options['ebutton_tcolor'] ); ?>;
		background-color: <?php echo esc_html( $this->shared->options['ebutton_color'] ); ?>;
	}
	
	#age_okay_container #age_okay_inner .age_okay_button.age_okay_button_no:hover {
		color: <?php echo esc_html( $this->shared->options['ehbutton_tcolor'] ); ?>;
		background-color: <?php echo esc_html( $this->shared->options['ehbutton_color'] ); ?>;
	}
	<?php } ?>
	
	#age_okay_container #age_okay_inner #age_okay_error {
		color: <?php echo esc_html( $this->shared->options['error_color'] ); ?>;
		left: <?php echo '-' . ( $this->shared->options['border_width'] + 0 ) . 'px'; ?>;
		width: <?php echo 'calc( 100% + ' . ( ( $this->shared->options['border_width'] + 0 ) * 2 ) . 'px )'; ?>;
	}
	</style>
	<div id='age_okay_overlay'></div>
	<div id='age_okay_fix'>
		<div id='age_okay_inner'>
			<div id='age_okay_inner_relative'>
				<p id='age_okay_logo' class='age_okay_text'><?php echo wp_get_attachment_image( $this->shared->options['logo'], 'full' ); ?></p>
				<p id='age_okay_title' class='age_okay_text'><?php echo $this->setup_textarea( $this->shared->lang['title'] ); ?></p>
				<p id='age_okay_desc' class='age_okay_text'><?php echo $this->setup_textarea( $this->shared->lang['desc'] ); ?></p>
				<?php
				// load the verification type content
				// simple enter button
				if ( $this->shared->options['type'] == 'simple' ) {
				?>
				<form action='<?php echo esc_url( admin_url('admin-post.php') );?>' id='age_okay_form' class='age_okay_form_simple' method='post'>
				<?php
				} elseif ( $this->shared->options['type'] == 'check' ) { // checkbox
				?>
				<form action='<?php echo esc_url( admin_url('admin-post.php') );?>' id='age_okay_form' class='age_okay_form_check' method='post'>
					<div class="age_okay_check_container">
						<input type="checkbox" name="age_okay_check_check" id="age_okay_check_check" autocomplete="off" />
						<div class="age_okay_check_labels">
							<label for="age_okay_check_check" class="age_okay_check_label_box age_okay_check_label">
								<span class="age_okay_check_span"></span>
							</label>
							<label for="age_okay_check_check" class="age_okay_check_label age_okay_text">
								<?php echo $this->setup_textarea( $this->shared->lang['check_text'] );?>
							</label>
						</div>
					</div>
				<?php
				} elseif ( $this->shared->options['type'] == 'input' ) { // date of birth verification
				?>
				<form action='<?php echo esc_url( admin_url('admin-post.php') ); ?>' id='age_okay_form' class='age_okay_form_simple' method='post'>
					<div class="age_okay_input_container">
						<?php
						for ( $x = 0; $x < 3; $x++ ) {
							if ( $this->shared->lang['date_order'][$x] == 'd' ) {
								echo '<div class="age_okay_date_input_container"><span class="age_okay_date_input_span">' . esc_html( ( ! empty( $this->shared->lang['placeholder_d'] ) ? $this->shared->lang['placeholder_d'] : '&nbsp;' ) ) . '</span><input type="tel" min="1" max="31" maxlength="2" name="age_okay_input_day" class="age_okay_input_text" id="age_okay_input_day" autocomplete="off" placeholder="' . esc_attr( ( ! empty( $this->shared->lang['placeholder_d'] ) ? $this->shared->lang['placeholder_d'] : '&nbsp;' ) ) . '" /></div>';
							} elseif ( $this->shared->lang['date_order'][$x] == 'm' ) {
								echo '<div class="age_okay_date_input_container"><span class="age_okay_date_input_span">' . esc_html( ( ! empty( $this->shared->lang['placeholder_m'] ) ? $this->shared->lang['placeholder_m'] : '&nbsp;' ) ) . '</span><input type="tel" min="1" max="12" maxlength="2" name="age_okay_input_month" class="age_okay_input_text" id="age_okay_input_month" autocomplete="off" placeholder="' . esc_attr( ( ! empty( $this->shared->lang['placeholder_m'] ) ? $this->shared->lang['placeholder_m'] : '&nbsp;' ) ) . '" /></div>';
							} else {
								echo '<div class="age_okay_date_input_container"><span class="age_okay_date_input_span age_okay_input_year_span">' . esc_html( ( ! empty( $this->shared->lang['placeholder_y'] ) ? $this->shared->lang['placeholder_y'] : '&nbsp;' ) ) . '</span><input type="tel" maxlength="4" name="age_okay_input_year" class="age_okay_input_text" id="age_okay_input_year" autocomplete="off" placeholder="' . esc_attr( ( ! empty( $this->shared->lang['placeholder_y'] ) ? $this->shared->lang['placeholder_y'] : '&nbsp;' ) ) .'" /></div>';
							}
						}
						?>
					</div>
				<?php
				} elseif ( $this->shared->options['type'] == 'drop' ) { // dropdown, not currently available
				?>
				<form action='<?php echo esc_url( admin_url('admin-post.php') ); ?>' id='age_okay_form' class='age_okay_form_simple' method='post'>
				<?php
				}
				?>
					<button type="submit" class="age_okay_button age_okay_button_yes age_okay_button_<?php echo esc_attr( $this->shared->options['button_style'] ); ?>"><?php echo esc_html( $this->shared->lang['ok_button'] ); ?></button>
					<?php if ( $this->shared->options['exit'] == 'true' ) { ?>
						<?php if ( $this->shared->options['no_type'] == 'text' ) { ?>
							<button name="age_okay_verify_error" type="submit" class="age_okay_button age_okay_button_no age_okay_button_<?php echo esc_attr( $this->shared->options['button_style'] ); ?>" data-type="<?php echo esc_attr( $this->shared->options['no_type'] ); ?>" data-target="<?php echo htmlspecialchars( $this->setup_textarea( $this->shared->lang['no_text'] ), ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8', true ); ?>" value="<?php echo htmlspecialchars( $this->setup_textarea( $this->shared->lang['no_text'] ), ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8', true ); ?>"><?php echo esc_html( $this->shared->lang['no_button'] ); ?></button>
						<?php } else { ?>
							<a href="<?php echo esc_url( $this->shared->options['no_type'] == 'url' ? $this->shared->lang['no_url'] : ( ! empty( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : 'http://google.com' ) ); ?>" class="age_okay_button age_okay_button_no age_okay_button_<?php echo esc_attr( $this->shared->options['button_style'] ); ?>" data-type="<?php echo esc_attr( $this->shared->options['no_type'] ); ?>" data-target="<?php echo esc_url( $this->shared->lang['no_url'] ); ?>"><?php echo esc_html( $this->shared->lang['no_button'] ); ?></a>
						<?php
						}
					} 
					?>
					<input type='hidden' name='action' value='age_okay_verify' tabindex='-1' />
					<input type='hidden' name='verify_nonce' value='<?php echo wp_create_nonce( 'verify_nonce' ); ?>' />
					<input type='hidden' name='url' value='<?php echo htmlspecialchars( '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8' ); ?>' tabindex='-1' />
				</form>
				<p id='age_okay_endtext' class='age_okay_text'><?php echo $this->setup_textarea( $this->shared->lang['endtext'] ); ?></p>
				<p id='age_okay_error' class='age_okay_text'><?php echo esc_html( ! empty( $this->verification_error ) ? $this->verification_error : '' ); ?></p>
			</div>
		</div>
	</div>
</div>
