<?php
/**
 * Advamentor Admin Page Template
 */
?>

<div class="advamentor-admin-wrapper">
	<div class="container">

		<div class="page-heading">
			<h1 class="page-title"><?php _e( 'Advamentor', 'advamentor' ); ?></h1>
			<p class="page-description">
				<?php _e( 'Premium & Advanced Essential Elements for Elementor', 'advamentor' ); ?>
			</p>
		</div>

		<form class="advamentor-form" method="post">

			<div class="row widget-row">

				<div class="col-md-3">
					<div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
	                    <?php
	                    	add_option( 'disable_advanced_banner', 0 );
	                        if ( isset( $_POST['disable_advanced_banner'] ) ) {
	                            update_option( 'disable_advanced_banner', $_POST['disable_advanced_banner'] );
	                        }
	                    ?>
						<div class="custom-control custom-switch">
							<input type="hidden" name="disable_advanced_banner" value="1">
							<input type="checkbox" class="custom-control-input" id="disable_advanced_banner" name="disable_advanced_banner" value="0" <?php checked( 0, get_option( 'disable_advanced_banner' ), true ); ?>>
							<label class="custom-control-label" for="disable_advanced_banner"><?php _e( 'Advanced Banner', 'advamentor' ); ?></label>
						</div>
					</div>
				</div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_cf7', 0 );
                        if ( isset( $_POST['disable_advanced_cf7'] ) ) {
                            update_option( 'disable_advanced_cf7', $_POST['disable_advanced_cf7'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_cf7" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_cf7" name="disable_advanced_cf7" value="0" <?php checked( 0, get_option( 'disable_advanced_cf7' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_cf7"><?php _e( 'Advanced Contact Form 7', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_countdown', 0 );
                        if ( isset( $_POST['disable_advanced_countdown'] ) ) {
                            update_option( 'disable_advanced_countdown', $_POST['disable_advanced_countdown'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_countdown" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_countdown" name="disable_advanced_countdown" value="0" <?php checked( 0, get_option( 'disable_advanced_countdown' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_countdown"><?php _e( 'Advanced Countdown', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_counter', 0 );
                        if ( isset( $_POST['disable_advanced_counter'] ) ) {
                            update_option( 'disable_advanced_counter', $_POST['disable_advanced_counter'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_counter" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_counter" name="disable_advanced_counter" value="0" <?php checked( 0, get_option( 'disable_advanced_counter' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_counter"><?php _e( 'Advanced Counter', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_fancy_text', 0 );
                        if ( isset( $_POST['disable_advanced_fancy_text'] ) ) {
                            update_option( 'disable_advanced_fancy_text', $_POST['disable_advanced_fancy_text'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_fancy_text" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_fancy_text" name="disable_advanced_fancy_text" value="0" <?php checked( 0, get_option( 'disable_advanced_fancy_text' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_fancy_text"><?php _e( 'Advanced Fancy Text', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_image_slider', 0 );
                        if ( isset( $_POST['disable_advanced_image_slider'] ) ) {
                            update_option( 'disable_advanced_image_slider', $_POST['disable_advanced_image_slider'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_image_slider" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_image_slider" name="disable_advanced_image_slider" value="0" <?php checked( 0, get_option( 'disable_advanced_image_slider' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_image_slider"><?php _e( 'Advanced Image Slider', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_logo_carousel', 0 );
                        if ( isset( $_POST['disable_advanced_logo_carousel'] ) ) {
                            update_option( 'disable_advanced_logo_carousel', $_POST['disable_advanced_logo_carousel'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_logo_carousel" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_logo_carousel" name="disable_advanced_logo_carousel" value="0" <?php checked( 0, get_option( 'disable_advanced_logo_carousel' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_logo_carousel"><?php _e( 'Advanced Logo Carousel', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_testimonial_carousel', 0 );
                        if ( isset( $_POST['disable_advanced_testimonial_carousel'] ) ) {
                            update_option( 'disable_advanced_testimonial_carousel', $_POST['disable_advanced_testimonial_carousel'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_testimonial_carousel" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_testimonial_carousel" name="disable_advanced_testimonial_carousel" value="0" <?php checked( 0, get_option( 'disable_advanced_testimonial_carousel' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_testimonial_carousel"><?php _e( 'Advanced Testimonial Carousel', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-toggle" data-toggle="tooltip" data-placement="top" title="<h6>Available Options</h6><li>Change Background</li>">
                        <?php
                        add_option( 'disable_advanced_flip_carousel', 0 );
                        if ( isset( $_POST['disable_advanced_flip_carousel'] ) ) {
                            update_option( 'disable_advanced_flip_carousel', $_POST['disable_advanced_flip_carousel'] );
                        }
                        ?>
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="disable_advanced_flip_carousel" value="1">
                            <input type="checkbox" class="custom-control-input" id="disable_advanced_flip_carousel" name="disable_advanced_flip_carousel" value="0" <?php checked( 0, get_option( 'disable_advanced_flip_carousel' ), true ); ?>>
                            <label class="custom-control-label" for="disable_advanced_flip_carousel"><?php _e( 'Advanced Flip Carousel', 'advamentor' ); ?></label>
                        </div>
                    </div>
                </div>

			</div>

			<div class="page-actions">

				<div class="row">

					<div class="col-sm-12 submit-container">
						<?php wp_nonce_field( 'advamentor_admin_nonce_field' ); ?>
						<button type="submit" class="btn btn-primary"><?php _e( 'Save Settings', 'advamentor' ); ?></button>
					</div>

				</div>

			</div>

		</form>

	</div>
</div>