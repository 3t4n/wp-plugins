<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );

class WL_AGM_LITE_METABOX_L {
	/* Add Location metabox */
	public static function create_metabox() {
		/* MetaBox for Location Cpt */
		add_meta_box( 'wl_agm_location_meta', esc_html__( 'Location Information', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_L',
			'meta_wl_agm_lite_location'
		), 'wl_agm_locations', 'normal', 'high' );
		add_meta_box( 'wl_agm_location_shortcode', esc_html__( 'Copy shortcode', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_L',
			'meta_wl_agm_lite_location_shortcode_box'
		), 'wl_agm_locations', 'side', 'low' );

		/* Save MetaBox Value*/
		add_action( 'save_post', array( 'WL_AGM_LITE_METABOX_L', 'save_data' ) );
	}

	/* Location Meta Fields */
	public static function meta_wl_agm_lite_location() {
		global $post;
        $location_map_height   = sanitize_text_field( get_post_meta( get_the_ID(), 'location_map_height', true ) );
		$location_map_width    = sanitize_text_field( get_post_meta( get_the_ID(), 'location_map_width', true ) );
		$location_redirect     = sanitize_text_field( get_post_meta( get_the_ID(), 'location_redirect', true ) );
		$location_address      = sanitize_text_field( get_post_meta( get_the_ID(), 'location_address', true ) );
		$location_lat          = sanitize_text_field( get_post_meta( get_the_ID(), 'location_lat', true ) );
		$location_long         = sanitize_text_field( get_post_meta( get_the_ID(), 'location_long', true ) );
		$location_city         = sanitize_text_field( get_post_meta( get_the_ID(), 'location_city', true ) );
		$location_state        = sanitize_text_field( get_post_meta( get_the_ID(), 'location_state', true ) );
		$location_country      = sanitize_text_field( get_post_meta( get_the_ID(), 'location_country', true ) );
		$location_pcode        = sanitize_text_field( get_post_meta( get_the_ID(), 'location_pcode', true ) );
		$location_onclick      = sanitize_text_field( get_post_meta( get_the_ID(), 'location_onclick', true ) );
		$location_info_win     = sanitize_text_field( get_post_meta( get_the_ID(), 'location_info_win', true ) );
		$location_image        = sanitize_text_field( get_post_meta( get_the_ID(), 'location_image', true ) );
		$location_marker_img   = sanitize_text_field( get_post_meta( get_the_ID(), 'location_marker_img', true ) );
		$location_disable_info = sanitize_text_field( get_post_meta( get_the_ID(), 'location_disable_info', true ) );
		$location_marker_ani   = sanitize_text_field( get_post_meta( get_the_ID(), 'location_marker_ani', true ) );
		$location_style_theme  = sanitize_text_field( get_post_meta( get_the_ID(), 'location_style_theme', true ) );
        $map_zoom_level        = sanitize_text_field( get_post_meta( get_the_ID(), 'map_zoom_level', true ) );
        $loc_map_type          = sanitize_text_field( get_post_meta( get_the_ID(), 'loc_map_type', true ) );

        $post_id = $post->ID;
		?>
        <div class="wl_agm wl_agm_container">
            <?php wp_nonce_field( 'save_meta_' . $post_id, 'save_meta_' . $post_id ); ?>
            <div class="form-group row">
                <label for="location_map_height"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Height', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="location_map_height" name="location_map_height"
                           placeholder="400px" value="<?php if ( ! empty( $location_map_height ) ) {
						echo esc_attr( $location_map_height );
					} ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter height for map with "px" or "%". Default is 600px.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_map_width"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Width', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="location_map_width" name="location_map_width"
                           placeholder="400px" value="<?php if ( ! empty( $location_map_width ) ) {
                        echo esc_attr( $location_map_width );
                    } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter width for map with "px" or "%". Default is 100%.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="map_search" class="col-3 col-form-label">
                    <?php esc_html_e( 'Location', WL_AGM_LITE_DOMAIN ); ?>
                </label>
                <div class="col-9">
                    <input type="text" class="form-control" id="map_search" name="map_search"
                           value="<?php if ( ! empty( $location_address ) ) {
						       echo esc_attr( $location_address );
					       } ?>">
                    <div id="map_admin"></div>
                    <input type="hidden" name="map_id_admin" id="map_id_admin">
                    
					<?php
					WL_AGM_LITE_Helper::get_location_autocomplete_script( get_the_ID() );
					WL_AGM_LITE_Helper::google_auto_complete_url_request();
					?>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_title"
                       class="col-3 col-form-label"><?php esc_html_e( 'Location Address', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <textarea class="form-control" id="location_address"
                              name="location_address"><?php if ( ! empty( $location_address ) ) {
		                    echo esc_attr( $location_address );
	                    } ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_lat_long"
                           class="col-3 col-form-label"><?php esc_html_e( 'Latitude and Longitude', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col">
                        <input type="text" class="form-control" name="location_lat" id="location_lat"
                               placeholder="Latitude" value="<?php if ( ! empty( $location_lat ) ) {
							echo esc_attr( $location_lat );
						} ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="location_long" id="location_long"
                               placeholder="Longitude" value="<?php if ( ! empty( $location_long ) ) {
							echo esc_attr( $location_long );
						} ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_city_state"
                           class="col-3 col-form-label"><?php esc_html_e( 'City and State', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col">
                        <input type="text" class="form-control" name="location_city" id="locality" placeholder="City"
                               value="<?php if ( ! empty( $location_city ) ) {
							       echo esc_attr( $location_city );
						       } ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="location_state" id="administrative_area_level_1"
                               placeholder="State" value="<?php if ( ! empty( $location_state ) ) {
							echo esc_attr( $location_state );
						} ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_country_pcode"
                           class="col-3 col-form-label"><?php esc_html_e( 'Country and Postal Code', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col">
                        <input type="text" class="form-control" name="location_country" id="country"
                               placeholder="Country" value="<?php if ( ! empty( $location_country ) ) {
							echo esc_attr( $location_country );
						} ?>">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="location_pcode" id="postal_code"
                               placeholder="Postal Code" value="<?php if ( ! empty( $location_pcode ) ) {
							echo esc_attr( $location_pcode );
						} ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_onclick"
                           class="col-3 col-form-label"><?php esc_html_e( 'On Click action', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <input id="info-win" class="form-check-input" type="radio" name="location_onclick"
                                   value="info_win" <?php if ( empty( $location_onclick ) || $location_onclick == 'info_win' ) {
								echo esc_attr('checked');
							} ?> onclick="non_redirect_url();">
                            <label class="form-check-label"
                                   for="info-win"><?php esc_html_e( 'Display Infowindow', WL_AGM_LITE_DOMAIN ); ?></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="info-url" class="form-check-input" type="radio" name="location_onclick"
                                   value="info_url" <?php if ( ! empty( $location_onclick ) && $location_onclick == 'info_url' ) {
								echo esc_attr('checked');
							} ?> onclick="redirect_url();">
                            <label class="form-check-label"
                                   for="info-url"><?php esc_html_e( 'Redirect To url', WL_AGM_LITE_DOMAIN ); ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="redirect_input_div">
                <label for="location_redirect"
                       class="col-3 col-form-label"><?php esc_html_e( 'Redirect URL', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="location_redirect" name="location_redirect"
                           placeholder="https://example.com" value="<?php if ( ! empty( $location_redirect ) ) {
						echo esc_attr( $location_redirect );
					} ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter Full Redirect URL here. Like "https://example.com"', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row" id="redirect_info_div">
                <label for="location_info_win"
                       class="col-3 col-form-label"><?php esc_html_e( 'Infowindow Message', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <textarea class="form-control" id="location_info_win"
                              name="location_info_win"><?php if ( ! empty( $location_info_win ) ) {
		                    echo esc_attr( $location_info_win );
	                    } ?></textarea>
                        <span class="form-check-label"><?php esc_html_e( 'You can Add detail text for this location or some Info', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_image"
                       class="col-3 col-form-label"><?php esc_html_e( 'Location Image', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-7">
                    <input type="text" placeholder="<?php esc_html_e( "Image URL", "selements" ); ?>" name="location_image"
                           id="location_image" class="form-control" value="<?php if ( ! empty( $location_image ) ) {
						echo esc_attr( $location_image );
					} ?>">
                    <span class="form-check-label"><?php esc_html_e( 'You can set location image for this location', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
                <div class="col-2">
                    <input type="button" name="upload-btn" id="upload_location_image" class="button-secondary button"
                           value="<?php esc_attr_e( 'Upload Image', WL_AGM_LITE_DOMAIN ); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="location_marker_img"
                       class="col-3 col-form-label"><?php esc_html_e( 'Marker Image', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-7">
                    <input type="text" placeholder="<?php esc_attr_e( "Image URL", "selements" ); ?>" name="location_marker_img"
                           id="location_marker_img" class="form-control"
                           value="<?php if ( ! empty( $location_marker_img ) ) {
						       echo esc_attr( $location_marker_img );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'You can set your own custom marker here', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
                <div class="col-2">
                    <input type="button" name="upload-btn" id="upload_marker_image" class="button-secondary button"
                           value="<?php esc_attr_e( 'Upload Image', WL_AGM_LITE_DOMAIN ); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_disable_info"
                           class="col-3 col-form-label"><?php esc_html_e( 'Disable Infowindow', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="location_disable_info"
                                   name="location_disable_info" <?php if ( ! empty( $location_disable_info ) ) {
								echo esc_attr('checked');
							} ?> /><label for="location_disable_info"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Do you want to disable infowindow for this location?', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="loc_map_type" class="col-3 col-form-label"><?php esc_html_e( 'Map Type', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="loc_map_type" id="loc_map_type" class="custom-select">
                                <?php
                                $map_type_arr = WL_AGM_LITE_Helper::get_map_type();
                                foreach ( $map_type_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php esc_html_e( $value, WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please select Map Type.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_marker_ani"
                           class="col-3 col-form-label"><?php esc_html_e( 'Location Marker Animation', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="location_marker_ani" id="location_marker_ani" class="custom-select">
                                <option selected><?php esc_html_e( 'Choose...', WL_AGM_LITE_DOMAIN ) ?></option>
								<?php $animation_arr = WL_AGM_LITE_Helper::get_location_marker_animation();
								foreach ( $animation_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php esc_html_e( $value, WL_AGM_LITE_DOMAIN ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Select Marker Animation from here', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="location_style_theme"
                           class="col-3 col-form-label"><?php esc_html_e( 'Map Style Theme', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="location_style_theme" id="location_style_theme" class="custom-select">
                                <option selected><?php esc_html_e( 'Choose...', WL_AGM_LITE_DOMAIN ) ?></option>
								<?php $style_arr = WL_AGM_LITE_Helper::get_map_style_theme();
								foreach ( $style_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php esc_html_e( $value, WL_AGM_LITE_DOMAIN ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Select Map Theme From here', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_zoom_level"
                           class="col-3 col-form-label"><?php esc_html_e( 'Map Zoom Level', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_zoom_level" id="map_zoom_level" class="custom-select">
                                <?php for ( $i = 0; $i < 20; $i ++ ) { ?>
                                    <option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="form-check-label"><?php esc_html_e( 'You can manage map zoom level. Default is 13.', WL_AGM_LITE_DOMAIN ); ?></span>
                    </div>
                </div>
            </div>
        </div>
		<?php WL_AGM_LITE_Helper::location_cpt_select_options( get_the_ID() );
		WL_AGM_LITE_Helper::location_url_redirect( get_the_ID() );
	}

	/* Shortcode MetaBox for Location Cpt */
	public static function meta_wl_agm_lite_location_shortcode_box() {
		global $post;
		?>
        <div class="wl_agm form-group">
            <label for="location_marker_ani"
                   class="col-3 col-form-label"><?php esc_html_e( 'Shortcode', WL_AGM_LITE_DOMAIN ); ?></label>
            <div class="row">
                <div class="col">
                    <input readonly="readonly" class="form-control" type="text"
                           value="<?php echo esc_attr("[WL_AGM_LOCATION id=" . esc_attr( get_the_ID() ) . "]"); ?>">
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
			if ( $post_type == 'wl_agm_locations' ) {

				$location_marker_ani = isset( $_POST['location_marker_ani'] ) ? sanitize_text_field( $_POST['location_marker_ani'] ) : '';
				$animation_arr       = WL_AGM_LITE_Helper::get_location_marker_animation();
				if ( ! in_array( $location_marker_ani, array_keys( $animation_arr ) ) ) {
					$location_marker_ani = 'BOUNCE';
				}

				$location_style_theme = isset( $_POST['location_style_theme'] ) ? sanitize_text_field( $_POST['location_style_theme'] ) : '';
				$style_arr            = WL_AGM_LITE_Helper::get_map_style_theme();
				if ( ! in_array( $location_style_theme, array_keys( $style_arr ) ) ) {
					$location_style_theme = 'standard';
				}

                $map_zoom_level = isset( $_POST['map_zoom_level'] ) ? sanitize_text_field( $_POST['map_zoom_level'] ) : '';
                for ( $i = 0; $i < 20; $i ++ ) {
                    if ( isset( $i ) ) {
                        if ( $i == $map_zoom_level ) {
                            $map_zoom_level;
                        }
                    } else {
                        $map_zoom_level = '13';
                    }
                }

                $loc_map_type     = isset( $_POST['loc_map_type'] ) ? sanitize_text_field( $_POST['loc_map_type'] ) : '';
                $loc_map_type_arr = WL_AGM_LITE_Helper::get_map_type();
                if ( ! in_array( $loc_map_type, array_keys( $loc_map_type_arr ) ) ) {
                    $loc_map_type = 'ROADMAP';
                }

                update_post_meta( $post_ID, 'map_zoom_level', $map_zoom_level );
                update_post_meta( $post_ID, 'loc_map_type', $loc_map_type );
				update_post_meta( $post_ID, 'location_address', isset( $_POST['location_address'] ) ? sanitize_textarea_field( $_POST['location_address'] ) : '' );
				update_post_meta( $post_ID, 'location_map_height', isset( $_POST['location_map_height'] ) ? sanitize_text_field( $_POST['location_map_height'] ) : '' );
                update_post_meta( $post_ID, 'location_map_width', isset( $_POST['location_map_width'] ) ? sanitize_text_field( $_POST['location_map_width'] ) : '' );
				update_post_meta( $post_ID, 'location_redirect', isset( $_POST['location_redirect'] ) ? sanitize_text_field( $_POST['location_redirect'] ) : '' );
				update_post_meta( $post_ID, 'location_lat', isset( $_POST['location_lat'] ) ? sanitize_text_field( $_POST['location_lat'] ) : '' );
				update_post_meta( $post_ID, 'location_long', isset( $_POST['location_long'] ) ? sanitize_text_field( $_POST['location_long'] ) : '' );
				update_post_meta( $post_ID, 'location_city', isset( $_POST['location_city'] ) ? sanitize_text_field( $_POST['location_city'] ) : '' );
				update_post_meta( $post_ID, 'location_state', isset( $_POST['location_state'] ) ? sanitize_text_field( $_POST['location_state'] ) : '' );
				update_post_meta( $post_ID, 'location_country', isset( $_POST['location_country'] ) ? sanitize_text_field( $_POST['location_country'] ) : '' );
				update_post_meta( $post_ID, 'location_pcode', isset( $_POST['location_pcode'] ) ? intval( sanitize_text_field( $_POST['location_pcode'] ) ) : '' );
				update_post_meta( $post_ID, 'location_onclick', isset( $_POST['location_onclick'] ) ? sanitize_text_field( $_POST['location_onclick'] ) : '' );
				update_post_meta( $post_ID, 'location_info_win', isset( $_POST['location_info_win'] ) ? sanitize_text_field( $_POST['location_info_win'] ) : '' );
				update_post_meta( $post_ID, 'location_image', isset( $_POST['location_image'] ) ? sanitize_text_field( $_POST['location_image'] ) : '' );
				update_post_meta( $post_ID, 'location_marker_img', isset( $_POST['location_marker_img'] ) ? sanitize_text_field( $_POST['location_marker_img'] ) : '' );
				update_post_meta( $post_ID, 'location_disable_info', isset( $_POST['location_disable_info'] ) ? (bool) ( $_POST['location_disable_info'] ) : 0 );
				update_post_meta( $post_ID, 'location_marker_ani', $location_marker_ani );
				update_post_meta( $post_ID, 'location_style_theme', $location_style_theme );
			}
		}
	}
}
?>