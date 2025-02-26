<?php
/**
 *
 * Backend view
 *
 * @package christmas-panda
 * @subpackage _views
 * @since Christmas Panda 1.0.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

?>

<div class="pix-christmas-panda">
	<div class="pix-cp-header">
		<div class="logo">
			<img src="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/cp-logo.png" alt="Christmas Panda logo" />
		</div>
	</div>

	<div class="pix-cp-tabs">
		<a class="<?php echo ! $tab_section || 'general' == $tab_section ? 'active' : ''; ?>" href="<?php echo esc_url( admin_url() ) . 'admin.php?page=pix-christmas-panda'; ?>"><?php esc_html_e( 'General', 'christmas-panda' ); ?></a>
		<a class="<?php echo 'snowfall' == $tab_section ? 'active' : ''; ?>" href="<?php echo esc_url( admin_url() ) . 'admin.php?page=pix-christmas-panda&section=snowfall'; ?>"><?php esc_html_e( 'Snowfall', 'christmas-panda' ); ?></a>
		<a class="<?php echo 'popups' == $tab_section ? 'active' : ''; ?>" href="<?php echo esc_url( admin_url() ) . 'admin.php?page=pix-christmas-panda&section=popups'; ?>"><?php esc_html_e( 'Pop-ups', 'christmas-panda' ); ?></a>
		<a class="" href="<?php echo esc_url( 'https://pixolette.com?ref=chr' ); ?>" target="_blank"><?php esc_html_e( 'Our other plugins', 'christmas-panda' ); ?></a>
		<a class="likeus" href="https://wordpress.org/support/plugin/christmas-panda/reviews/#new-post" target="_blank"></a>
		<div class="clear"></div>
	</div>
	<div class="pix-cp-body">
		<div class="pxl-cp-left-col">
			<form action="" method="post" id="px-cp-form">
				<?php
				switch ( $tab_section ) :
					default:
						?>
						<div class="pix-cp-row">
							<p class="pix-cp-italic"><?php esc_html_e( 'Here you can choose to display a row with decorations on the top or bottom of the page', 'christmas-panda' ); ?></p>
						</div>
						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Is active?', 'christmas-panda' ); ?></h3>
							<label class="fw-label">
								<input type="radio" name="px_cp_is_active" value="yes" <?php echo 'yes' == $cp_options->px_cp_is_active || ! $cp_options->px_cp_is_active ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Yes', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_is_active" value="no" <?php echo 'no' == $cp_options->px_cp_is_active ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'No', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>
						<hr/>

						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Display type:' ); ?></h3>
							<?php for ( $i = 1; $i < 10; $i++ ) : ?>
								<label class="label-with-image">
									<input type="radio" name="px_cp_display_type" value="<?php echo esc_attr( $i ); ?>" <?php echo $i == $cp_options->px_cp_display_type || ! $cp_options->px_cp_display_type ? 'checked="checked"' : ''; ?>><?php
									echo sprintf( esc_html__( 'Decoration image #%1$s', 'christmas-panda' ), esc_html__( $i ) ); ?>
									<img src="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/decoration_<?php echo esc_attr( $i ); ?>.png" alt="Display type: <?php
									echo sprintf( esc_html__( 'Decoration image #%1$s', 'christmas-panda' ), esc_html__( $i ) ); ?>" class="px-cp-display-type-img"/>
								</label>
							<?php endfor; ?>
							<div class="clear"></div>
						</div>
						<hr/>

						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Display location', 'christmas-panda' ); ?></h3>
							<label class="fw-label">
								<input type="radio" name="px_cp_display_position" value="bottom" <?php echo 'bottom' == $cp_options->px_cp_display_position || ! $cp_options->px_cp_display_position ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Bottom', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_display_position" value="top" <?php echo 'top' == $cp_options->px_cp_display_position ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Top', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>
						<hr/>

						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'It is sticky?', 'christmas-panda' ); ?></h3>
							<label class="fw-label">
								<input type="radio" name="px_cp_is_fixed" value="yes" <?php echo 'yes' == $cp_options->px_cp_is_fixed || ! $cp_options->px_cp_is_fixed ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Yes', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_is_fixed" value="no" <?php echo 'no' == $cp_options->px_cp_is_fixed ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'No', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>
						<input type="hidden" name="pix-cp-section" value="pix-cp-general" />
						<hr/>
						<?php
						break;
					case 'snowfall':
						?>
						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Display snowfall?', 'christmas-panda' ); ?></h3>
							<label class="label-with-image">
								<img src="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/snowfall_demo.jpg" alt="christmas Panda Fall" />
							</label>
							<div class="clear"></div>
							<label class="fw-label">
								<input type="radio" name="px_cp_snowfall" value="no" <?php echo 'no' == $cp_options->px_cp_snowfall || ! $cp_options->px_cp_snowfall ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'No', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_snowfall" value="yes" <?php echo 'yes' == $cp_options->px_cp_snowfall ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Yes', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>

						<input type="hidden" name="pix-cp-section" value="pix-cp-snowfall" />
						<hr/>
					<?php
					break;

					case 'popups':
						?>
						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Display popup?', 'christmas-panda' ); ?></h3>
							<div class="clear"></div>
							<label class="fw-label">
								<input type="radio" name="px_cp_display_popup" value="no" <?php echo 'no' == $cp_options->px_cp_display_popup || ! $cp_options->px_cp_display_popup ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'No', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_display_popup" value="yes" <?php echo 'yes' == $cp_options->px_cp_display_popup ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Yes', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>
						<hr/>

						<div class="pix-cp-row">
							<div class="pix-cp-row">
								<h3><?php esc_html_e( 'Pop-up type:' ); ?></h3>
								<?php for ( $i = 1; $i < 25; $i++ ) : ?>
									<label class="label-with-image px-cp-popup">
										<input type="radio" name="px_cp_popup_type" value="<?php echo esc_attr( $i ); ?>" <?php echo $i == $cp_options->px_cp_popup_type || ! $cp_options->px_cp_popup_type ? 'checked="checked"' : ''; ?>>
										<img src="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/popup_<?php echo esc_attr( $i ); ?>.png" alt="Christmas Popup <?php echo esc_attr( $i ); ?>" class="px-cp-display-type-img"/>
									</label>
								<?php endfor; ?>
								<div class="clear"></div>
							</div>
						</div>
						<hr/>

						<div class="pix-cp-row">
							<h3><?php esc_html_e( 'Pop-up position?', 'christmas-panda' ); ?></h3>
							<div class="clear"></div>
							<label class="fw-label">
								<input type="radio" name="px_cp_popup_position" value="right" <?php echo 'right' == $cp_options->px_cp_popup_position || ! $cp_options->px_cp_display_popup ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Bottom right corner', 'christmas-panda' ); ?>
							</label>
							<label class="fw-label">
								<input type="radio" name="px_cp_popup_position" value="left" <?php echo 'left' == $cp_options->px_cp_popup_position ? 'checked="checked"' : ''; ?>><?php esc_html_e( 'Bottom left corner', 'christmas-panda' ); ?>
							</label>
							<div class="clear"></div>
						</div>

						<input type="hidden" name="pix-cp-section" value="pix-cp-popups" />
						<hr/>
					<?php
					break;
				endswitch;
				?>
				<div class="pix-cp-row">
					<input type="submit" id="pix-cp-form-submit" value="<?php esc_attr_e( 'Save', 'christmas-panda' ); ?>">
				</div>
			</form>
		</div>

		<div class="px-plugin-sidebar">
			<div class="block-section">
                <a href="https://pixolette.com" target="_blank">
				    <img src="<?php echo esc_url( PIX_CHR_PAN_URL . 'assets/images/pixolette-logo.png' ); ?>" alt="<?php esc_attr_e( 'Pixolette Logo', 'christmas-panda' ); ?>"/>
                </a>
			</div>
			<hr class="silver"/>
			<div class="block-section">
				<h2><?php echo esc_attr( 'Need Help?', 'christmas-panda' ); ?></h2>
				<a class="underline" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/plugin/christmas-panda' ); ?>"><?php echo esc_attr( 'Support forum', 'christmas-panda' ); ?></a><br/>
				<a class="underline" target="_blank" href="<?php echo esc_url( 'https://pixolette.com/contact/' ); ?>"><?php echo esc_attr( 'Contact us', 'christmas-panda' ); ?></a><br/>
				<a class="underline" target="_blank" href="<?php echo esc_url( 'https://pixolette.com/wordpress-plugins?ref=chrp' ); ?>"><?php echo esc_attr( 'Our plugins', 'christmas-panda' ); ?></a><br/>
				<a class="underline" target="_blank" href="<?php echo esc_url( 'https://pixolette.com/wordpress-themes?ref=chrt' ); ?>"><?php echo esc_attr( 'Our themes', 'christmas-panda' ); ?></a><br/>
			</div>
			<hr/>
			<div class="block-section">
				<p><?php esc_attr_e( 'Do you like how this plugin serves you?', 'christmas-panda' ); ?> <a href="https://wordpress.org/support/plugin/christmas-panda/reviews/#new-post" target="_blank"><?php esc_attr_e( 'Rate it', 'christmas-panda' ); ?></a></p>
			</div>
		</div>
	</div>
</div>
