<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );

class WL_AGM_LITE_METABOX_R {
	/* Add Route metabox */
	public static function create_metabox() {

		/* MetaBox for Route Cpt */
		add_meta_box( 'wl_agm_route_meta', esc_html__( 'Route Information', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_R',
			'meta_wl_agm_lite_route'
		), 'wl_agm_routes', 'normal', 'high' );
		add_meta_box( 'wl_agm_route_shortcode', esc_html__( 'Copy shortcode', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_R',
			'meta_wl_agm_lite_route_shortcode_box'
		), 'wl_agm_routes', 'side', 'low' );

		/* Save MetaBox Value*/
		add_action( 'save_post', array( 'WL_AGM_LITE_METABOX_R', 'save_data' ) );
	}

	/* Route Meta Fields */
	public static function meta_wl_agm_lite_route() {
		global $post;
		$r_stroke_typ     = sanitize_text_field( get_post_meta( get_the_ID(), 'r_stroke_typ', true ) );
		$r_storke_weight  = sanitize_text_field( get_post_meta( get_the_ID(), 'r_storke_weight', true ) );
		$r_unit_system    = sanitize_text_field( get_post_meta( get_the_ID(), 'r_unit_system', true ) );
		$r_draggable      = sanitize_text_field( get_post_meta( get_the_ID(), 'r_draggable', true ) );
		$r_start_location = sanitize_text_field( get_post_meta( get_the_ID(), 'r_start_location', true ) );
		$r_end_location   = sanitize_text_field( get_post_meta( get_the_ID(), 'r_end_location', true ) );
		$route_type       = sanitize_text_field( get_post_meta( get_the_ID(), 'route_type', true ) );
		$r_map_height     = sanitize_text_field( get_post_meta( get_the_ID(), 'r_map_height', true ) );
        $r_map_width      = sanitize_text_field( get_post_meta( get_the_ID(), 'r_map_width', true ) );
		$r_style_theme    = sanitize_text_field( get_post_meta( get_the_ID(), 'r_style_theme', true ) );
		$r_waypoints_ed   = sanitize_text_field( get_post_meta( get_the_ID(), 'r_waypoints_ed', true ) );
		$r_stroke_color   = sanitize_text_field( get_post_meta( get_the_ID(), 'r_stroke_color', true ) );
		$r_center         = sanitize_text_field( get_post_meta( get_the_ID(), 'r_center', true ) );

        $post_id = $post->ID;
		?>
        <div class="wl_agm wl_agm_container">
            <?php wp_nonce_field( 'save_meta_' . $post_id, 'save_meta_' . $post_id ); ?>
            <div class="form-group row">
                <label for="r_map_width"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Width', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="r_map_width" name="r_map_width" placeholder="500px"
                           value="<?php if ( ! empty( $r_map_width ) ) {
                               echo esc_attr( $r_map_width );
                           } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter width for map with "px" or "%". Default is 100%.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="r_map_height"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Height', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="r_map_height" name="r_map_height" placeholder="500px"
                           value="<?php if ( ! empty( $r_map_height ) ) {
                               echo esc_attr( $r_map_height );
                           } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter height for map with "px" or "%". Default is 500px.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="r_center"
                       class="col-3 col-form-label"><?php esc_html_e( 'Center Location', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="r_center" name="r_center" required placeholder="Location Address"
                           value="<?php if ( ! empty( $r_center ) ) {
						       echo esc_attr( $r_center );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please enter center location for map to initialize.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row route_map_preview">
                <label for="map_search" class="col-3 col-form-label"><?php esc_html_e( 'Location', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input id="origin-input" name="r_start_location" class="controls" type="text"
                           placeholder="<?php esc_attr_e( 'Enter an origin location', WL_AGM_LITE_DOMAIN ); ?>"
                           value="<?php if ( ! empty( $r_start_location ) ) {
						       echo esc_attr( $r_start_location );
					       } ?>">

                    <input id="destination-input" name="r_end_location" class="controls" type="text"
                           placeholder="<?php esc_attr_e( 'Enter a destination location', WL_AGM_LITE_DOMAIN ); ?>"
                           value="<?php if ( ! empty( $r_end_location ) ) {
						       echo esc_attr( $r_end_location );
					       } ?>">

                    <div id="mode-selector" class="controls">
                        <input type="radio" name="route_type" id="changemode-walking"
                               value="WALKING" <?php if ( ! empty( $route_type ) && $route_type == 'WALKING' ) {
							echo esc_attr('checked');
						} ?> >
                        <label for="changemode-walking"><?php esc_html_e( 'Walking', WL_AGM_LITE_DOMAIN ); ?></label>

                        <input type="radio" name="route_type" id="changemode-transit"
                               value="TRANSIT" <?php if ( ! empty( $route_type ) && $route_type == 'TRANSIT' ) {
							echo esc_attr('checked');
						} ?>>
                        <label for="changemode-transit"><?php esc_html_e( 'Transit', WL_AGM_LITE_DOMAIN ); ?></label>

                        <input type="radio" name="route_type" id="changemode-driving"
                               value="DRIVING" <?php if ( ! empty( $route_type ) && $route_type == 'DRIVING' ) {
							echo esc_attr('checked');
						} ?>>
                        <label for="changemode-driving"><?php esc_html_e( 'Driving', WL_AGM_LITE_DOMAIN ); ?></label>
                    </div>
                    <div id="map_route"></div>

					<?php WL_AGM_LITE_Helper::google_auto_complete_url_request_route(); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_stroke_typ"
                           class="col-3 col-form-label"><?php esc_html_e( 'Stroke Opacity', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="r_stroke_typ" id="r_stroke_typ" class="custom-select">
								<?php $stroke_opacity = WL_AGM_LITE_Helper::get_stroke_opacity();
								foreach ( $stroke_opacity as $value ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please Select Stroke( Route ) Opacity.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_storke_weight"
                           class="col-3 col-form-label"><?php esc_html_e( 'Stroke Weight', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="r_storke_weight" id="r_storke_weight" class="custom-select">
								<?php for ( $i = 10; $i > 0 || $i == 0; $i -- ) { ?>
                                    <option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please Select Stroke( Path ) Weight( Thikness ).', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_unit_system"
                           class="col-3 col-form-label"><?php esc_html_e( 'Unit Systems', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="r_unit_system" id="r_unit_system" class="custom-select">
								<?php $unit_system = WL_AGM_LITE_Helper::get_unit_system();
								foreach ( $unit_system as $value ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please Select Route Unit System.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_draggable"
                           class="col-3 col-form-label"><?php esc_html_e( 'Draggable', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="r_draggable"
                                   name="r_draggable" <?php if ( ! empty( $r_draggable ) ) {
								echo esc_attr('checked');
							} ?> /><label for="r_draggable"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Please check to enable route draggable.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_style_theme"
                           class="col-3 col-form-label"><?php esc_html_e( 'Map Style Theme', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="r_style_theme" id="r_style_theme" class="custom-select">
                                <option selected><?php esc_html_e( 'Choose...', WL_AGM_LITE_DOMAIN ) ?></option>
								<?php $style_arr = WL_AGM_LITE_Helper::get_map_style_theme();
								foreach ( $style_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please Select Map Style Theme.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_title"
                       class="col-3 col-form-label"><?php esc_html_e( 'Stroke Color', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" id="r_stroke_color" name="r_stroke_color" class="color-field"
                           value="<?php if ( ! empty( $r_stroke_color ) ) {
						       echo esc_attr( $r_stroke_color );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Choose Stroke Color(Path Color).', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="r_waypoints_ed"
                           class="col-3 col-form-label"><?php esc_html_e( 'WayPoints', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="r_waypoints_ed"
                                   name="r_waypoints_ed" <?php if ( ! empty( $r_waypoints_ed ) ) {
								echo esc_attr('checked');
							} ?> /><label for="r_waypoints_ed"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Disable WayPoints, Only Start and End Point Display.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End WayPoint Option -->
		<?php WL_AGM_LITE_Helper::route_cpt_select_options( get_the_ID() );
	}

	/* Shortcode MetaBox for Route Cpt */
	public static function meta_wl_agm_lite_route_shortcode_box() {
		global $post;
		?>
        <div class="wl_agm form-group">
            <label for="location_marker_ani"
                   class="col-3 col-form-label"><?php esc_html_e( 'Shortcode', WL_AGM_LITE_DOMAIN ); ?></label>
            <div class="row">
                <div class="col">
                    <input readonly="readonly" class="form-control" type="text"
                           value="<?php echo esc_attr("[WL_AGM_Route id=" . esc_attr( get_the_ID() ) . "]"); ?>">
                </div>
            </div>
        </div>
		<?php
	}

	/* Save Meta Fields */
	public static function save_data( $post_id ) {
        if ( ! isset( $_POST['save_meta_' . $post_id] ) || ! wp_verify_nonce( $_POST['save_meta_' . $post_id], 'save_meta_' . $post_id ) ) {
            return;
        }
		if ( ( defined( 'DOING_AUTOSAVE ' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || isset( $_REQUEST['bulk_edit'] ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
		if ( isset( $post_id ) ) {
			$post_ID   = sanitize_text_field( $post_id );
			$post_type = get_post_type( $post_ID );
			if ( $post_type == 'wl_agm_routes' ) {

				$r_stroke_typ   = isset ( $_POST['r_stroke_typ'] ) ? sanitize_text_field( $_POST['r_stroke_typ'] ) : '';
				$stroke_opacity = WL_AGM_LITE_Helper::get_stroke_opacity();
				if ( ! in_array( $r_stroke_typ, $stroke_opacity ) ) {
					$r_stroke_typ = '1';
				}

				$r_storke_weight = isset ( $_POST['r_storke_weight'] ) ? sanitize_text_field( $_POST['r_storke_weight'] ) : '';
				for ( $i = 10; $i > 0 || $i == 0; $i -- ) {
					if ( $r_storke_weight != $i ) {
						$r_storke_weight == '10';
					}
				}

				$r_unit_system = isset( $_POST['r_unit_system'] ) ? sanitize_text_field( $_POST['r_unit_system'] ) : '';
				$unit_system   = WL_AGM_LITE_Helper::get_unit_system();
				if ( ! in_array( $r_unit_system, $unit_system ) ) {
					$r_unit_system = 'METRIC';
				}

				$r_style_theme = isset( $_POST['r_style_theme'] ) ? sanitize_text_field( $_POST['r_style_theme'] ) : '';
				$style_arr     = WL_AGM_LITE_Helper::get_map_style_theme();
				if ( ! in_array( $r_style_theme, array_keys( $style_arr ) ) ) {
					$r_style_theme = 'standard';
				}

				update_post_meta( $post_ID, 'r_stroke_typ', $r_stroke_typ );
				update_post_meta( $post_ID, 'r_storke_weight', $r_storke_weight );
				update_post_meta( $post_ID, 'r_unit_system', $r_unit_system );
				update_post_meta( $post_ID, 'r_style_theme', $r_style_theme );
				update_post_meta( $post_ID, 'r_draggable', isset( $_POST['r_draggable'] ) ? boolval( sanitize_text_field( $_POST['r_draggable'] ) ) : 0 );
				update_post_meta( $post_ID, 'r_waypoints_ed', isset( $_POST['r_waypoints_ed'] ) ? boolval( sanitize_text_field( $_POST['r_waypoints_ed'] ) ) : 0 );
				update_post_meta( $post_ID, 'r_start_location', isset( $_POST['r_start_location'] ) ? sanitize_text_field( $_POST['r_start_location'] ) : '' );
				update_post_meta( $post_ID, 'r_end_location', isset( $_POST['r_end_location'] ) ? sanitize_text_field( $_POST['r_end_location'] ) : '' );
				update_post_meta( $post_ID, 'route_type', isset( $_POST['route_type'] ) ? sanitize_text_field( $_POST['route_type'] ) : '' );
				update_post_meta( $post_ID, 'r_map_height', isset( $_POST['r_map_height'] ) ? sanitize_text_field( $_POST['r_map_height'] ) : '' );
                update_post_meta( $post_ID, 'r_map_width', isset( $_POST['r_map_width'] ) ? sanitize_text_field( $_POST['r_map_width'] ) : '' );    
				update_post_meta( $post_ID, 'r_stroke_color', isset( $_POST['r_stroke_color'] ) ? sanitize_text_field( $_POST['r_stroke_color'] ) : '' );
				update_post_meta( $post_ID, 'r_center', isset( $_POST['r_center'] ) ? sanitize_text_field( $_POST['r_center'] ) : '' );
			}
		}
	}
}
