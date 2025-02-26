<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );

class WL_AGM_LITE_METABOX_M {
	/* Add Location metabox */
	public static function create_metabox() { 
	/*  MetaBox for Map Cpt */
		add_meta_box( 'wl_agm_lite_map_meta1', esc_html__( 'Map Information', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_M',
			'meta_wl_agm_lite_map'
		), 'wl_agm_maps', 'normal', 'high' );
		add_meta_box( 'wl_agm_lite_map_meta2', esc_html__( "Map's Center", WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_M',
			'meta_wl_agm_map_center'
		), 'wl_agm_maps', 'normal', 'high' );
		add_meta_box( 'wl_agm_map_meta4', esc_html__( "Customization", WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_M',
			'meta_wl_agm_map_controls'
		), 'wl_agm_maps', 'normal', 'high' );
		add_meta_box( 'wl_agm_map_shortcode', esc_html__( 'Copy shortcode', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_M',
			'meta_wl_agm_lite_map_shortcode_box'
		), 'wl_agm_maps', 'side', 'low' );
		add_meta_box( 'wl_agm_map_meta3', esc_html__( "Choose Locations", WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_M',
			'meta_wl_agm_lite_map_locations'
		), 'wl_agm_maps', 'normal', 'high' );

		/* Save MetaBox Value*/
		add_action( 'save_post', array( 'WL_AGM_LITE_METABOX_M', 'save_data' ) );
	}

		/* Map Info Meta Fields */
	public static function meta_wl_agm_lite_map() {
		global $post;
		$map_width        = sanitize_text_field( get_post_meta( get_the_ID(), 'map_width', true ) );
		$map_height       = sanitize_text_field( get_post_meta( get_the_ID(), 'map_height', true ) );
		$map_zoom_level   = sanitize_text_field( get_post_meta( get_the_ID(), 'map_zoom_level', true ) );
		$map_type         = sanitize_text_field( get_post_meta( get_the_ID(), 'map_type', true ) );
		$map_scroll_wheel = sanitize_text_field( get_post_meta( get_the_ID(), 'map_scroll_wheel', true ) );
		$map_m_draggable  = sanitize_text_field( get_post_meta( get_the_ID(), 'map_m_draggable', true ) );
		$map_imagery      = sanitize_text_field( get_post_meta( get_the_ID(), 'map_imagery', true ) );
		$map_theme        = sanitize_text_field( get_post_meta( get_the_ID(), 'map_theme', true ) );

        $post_id = $post->ID;
		?>
        <div class="wl_agm wl_agm_container">
            <?php wp_nonce_field( 'save_meta_' . $post_id, 'save_meta_' . $post_id ); ?>
            <div class="form-group row">
                <label for="map_width" class="col-3 col-form-label"><?php esc_html_e( 'Map Width', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="map_width" name="map_width"
                           value="<?php if ( ! empty( $map_width ) ) {
						       echo esc_attr( $map_width );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter Width for map with "px" or "%". Default is 100%.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="map_height" class="col-3 col-form-label"><?php esc_html_e( 'Map Height', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="map_height" name="map_height"
                           value="<?php if ( ! empty( $map_height ) ) {
						       echo esc_attr( $map_height );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Please Enter height for map with "px" or "%". Default is 500px.', WL_AGM_LITE_DOMAIN ); ?></span>
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
            <div class="form-group">
                <div class="row">
                    <label for="map_type" class="col-3 col-form-label"><?php esc_html_e( 'Map Type', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_type" id="map_type" class="custom-select">
								<?php
								$map_type_arr = WL_AGM_LITE_Helper::get_map_type();
								foreach ( $map_type_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'Please select Map Type.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_theme"
                           class="col-3 col-form-label"><?php esc_html_e( 'Map Style Theme', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_theme" id="map_theme" class="custom-select">
                                <option selected><?php esc_html_e( 'Choose...', WL_AGM_LITE_DOMAIN ) ?></option>
								<?php $style_arr = WL_AGM_LITE_Helper::get_map_style_theme();
								foreach ( $style_arr as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( 'You can manage map style theme. Default is Standard.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_scroll_wheel"
                           class="col-3 col-form-label"><?php esc_html_e( 'Turn Off Scrolling Wheel', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="map_scroll_wheel"
                                   name="map_scroll_wheel" <?php if ( ! empty( $map_scroll_wheel ) ) {
								echo esc_attr('checked');
							} ?> /><label for="map_scroll_wheel">Toggle</label>
                            <span class="form-check-label"><?php esc_html_e( 'Please check to disable scroll wheel zoom.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_m_draggable"
                           class="col-3 col-form-label"><?php esc_html_e( 'Map Draggable', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="map_m_draggable"
                                   name="map_m_draggable" <?php if ( ! empty( $map_m_draggable ) ) {
								echo esc_attr('checked');
							} ?> /><label for="map_m_draggable"><?php esc_html_e( 'Toggle.', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Please check to disable map draggable.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_imagery"
                           class="col-3 col-form-label"><?php esc_html_e( '45° Imagery', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="map_imagery"
                                   name="map_imagery" <?php if ( ! empty( $map_imagery ) ) {
								echo esc_attr('checked');
							} ?> /><label for="map_imagery"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Apply 45° Imagery ? (only available for map type SATELLITE and HYBRID).', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php WL_AGM_LITE_Helper::map_cpt_select_options_one( get_the_ID() );
	}

	/* Map's Center Meta Fields */
	public static function meta_wl_agm_map_center() {
		global $post;
		$center_lat  = sanitize_text_field( get_post_meta( get_the_ID(), 'center_lat', true ) );
		$center_long = sanitize_text_field( get_post_meta( get_the_ID(), 'center_long', true ) );
		?>
        <div class="wl_agm wl_agm_container">
            <div class="form-group row">
                <label for="center_lat"
                       class="col-3 col-form-label"><?php esc_html_e( 'Center Latitude', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="center_lat" name="center_lat"
                           value="<?php if ( ! empty( $center_lat ) ) {
						       echo esc_attr( $center_lat );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'To Initiate map Please enter center latitude.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="center_long"
                       class="col-3 col-form-label"><?php esc_html_e( 'Center Longitude', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" class="form-control" id="center_long" name="center_long"
                           value="<?php if ( ! empty( $center_long ) ) {
						       echo esc_attr( $center_long );
					       } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'To Initiate map Please enter center Longitude.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
        </div>
		<?php
	}

	/* Control Settings Meta Fields */
	public static function meta_wl_agm_map_controls() {
		global $post;
		$location_image       = sanitize_text_field( get_post_meta( get_the_ID(), 'location_image', true ) );
		$info_win_custom      = sanitize_text_field( get_post_meta( get_the_ID(), 'info_win_custom', true ) );
		$custom_back_color    = sanitize_text_field( get_post_meta( get_the_ID(), 'custom_back_color', true ) );
		$custom_border_radius = sanitize_text_field( get_post_meta( get_the_ID(), 'custom_border_radius', true ) );
		$custom_bg_color      = sanitize_text_field( get_post_meta( get_the_ID(), 'custom_bg_color', true ) );
		$custom_width_info    = sanitize_text_field( get_post_meta( get_the_ID(), 'custom_width_info', true ) );
		$custom_text_color    = sanitize_text_field( get_post_meta( get_the_ID(), 'custom_text_color', true ) );
		?>
        <div class="wl_agm wl_agm_container">
            <div class="form-group">
                <div class="row">
                    <label for="location_image"
                           class="col-3 col-form-label"><?php esc_html_e( 'Choose Marker Image', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-7">
                        <input type="text" placeholder="<?php esc_attr_e( 'Image URL', WL_AGM_LITE_DOMAIN ); ?>"
                               name="location_image" id="location_image" class="form-control"
                               value="<?php if ( ! empty( $location_image ) ) {
							       echo esc_attr( $location_image );
						       } ?>" required >
                        <span class="form-check-label"><?php esc_html_e( 'This image can set as marker for all location.', WL_AGM_LITE_DOMAIN ); ?></span>
                    </div>
                    <div class="col-2">
                        <input type="button" name="upload-btn" id="upload_location_image"
                               class="button-secondary button"
                               value="<?php esc_attr_e( 'Upload Image', WL_AGM_LITE_DOMAIN ); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 wl-agm-setting-title">
                <div class="product_name wl-agm-title-setting"><?php esc_html_e( 'Infowindow Customization Settings', WL_AGM_LITE_DOMAIN ); ?></div>
            </div>
            <div class="control_settings_div">
                <div class="form-group">
                    <div class="row">
                        <label for="info_win_custom"
                               class="col-3 col-form-label"><?php esc_html_e( 'Turn On Infowindow Customization', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <div class="form-check form-check-inline custom_toggle_checkbox">
                                <input type="checkbox" id="info_win_custom"
                                       name="info_win_custom" <?php if ( ! empty( $info_win_custom ) ) {
									echo esc_attr('checked');
								} ?> /><label for="info_win_custom"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                                <span class="form-check-label"><?php esc_html_e( 'Please check to enable infowindow customization.', WL_AGM_LITE_DOMAIN ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="info_window_custom_controls">
                    <div class="form-group row">
                        <label for="location_title"
                               class="col-3 col-form-label"><?php esc_html_e( 'Width', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="custom_width_info" name="custom_width_info"
                                   value="<?php if ( ! empty( $custom_width_info ) ) {
								       echo esc_attr( $custom_width_info );
							       } ?>"/>
                            <span class="form-check-label"><?php esc_html_e( 'Enter infowindow width in px. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location_title"
                               class="col-3 col-form-label"><?php esc_html_e( 'Border Color', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <input type="text" id="custom_bg_color" name="custom_bg_color" class="color-field"
                                   value="<?php if ( ! empty( $custom_bg_color ) ) {
								       echo esc_attr( $custom_bg_color );
							       } ?>">
                            <span class="form-check-label"><?php esc_html_e( 'Choose color for the border of infowindow. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location_title"
                               class="col-3 col-form-label"><?php esc_html_e( 'Border Radius', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="custom_border_radius"
                                   name="custom_border_radius" value="<?php if ( ! empty( $custom_border_radius ) ) {
								echo esc_attr( $custom_border_radius );
							} ?>"/>
                            <span class="form-check-label"><?php esc_html_e( 'Enter border radius in px for the infowindow. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location_title"
                               class="col-3 col-form-label"><?php esc_html_e( 'Background Color', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <input type="text" id="custom_back_color" name="custom_back_color" class="color-field"
                                   value="<?php if ( ! empty( $custom_back_color ) ) {
								       echo esc_attr( $custom_back_color );
							       } ?>">
                            <span class="form-check-label"><?php esc_html_e( 'Choose color for the background of infowindow text. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location_title"
                               class="col-3 col-form-label"><?php esc_html_e( 'Text Color', WL_AGM_LITE_DOMAIN ); ?></label>
                        <div class="col-9">
                            <input type="text" id="custom_text_color" name="custom_text_color" class="color-field"
                                   value="<?php if ( ! empty( $custom_text_color ) ) {
								       echo esc_attr( $custom_text_color );
							       } ?>">
                            <span class="form-check-label"><?php esc_html_e( 'Choose color for the background of infowindow text. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php WL_AGM_LITE_Helper::map_cpt_select_options_two( get_the_ID() );
	}

	/* Shortcode MetaBox for Map Cpt */
	public static function meta_wl_agm_lite_map_shortcode_box() {
		global $post;
		?>
        <div class="wl_agm form-group">
            <label for="location_marker_ani"
                   class="col-3 col-form-label"><?php esc_html_e( 'Shortcode', WL_AGM_LITE_DOMAIN ); ?></label>
            <div class="row">
                <div class="col">
                    <input readonly="readonly" class="form-control" type="text"
                           value="<?php echo esc_attr("[WL_AGM_Map id=" . esc_attr( get_the_ID() ) . "]"); ?>">
                </div>
            </div>
        </div>
		<?php
	}

	/* Choose Locations Meta Fields */
	public static function meta_wl_agm_lite_map_locations() {
		global $post;
		$selected_locations = sanitize_text_field( get_post_meta( get_the_ID(), 'selected_locations', true ) );
		?>
        <div class="wl_agm wl_agm_container">
            <input type="hidden" name="selected_locations" class="selected_locations"
                   value="<?php if ( ! empty( $selected_locations ) ) {
				       echo esc_attr( $selected_locations );
			       } ?>">
            <div class="table-responsive">
                <table id="choose_location_data"
                       class="table table-striped table-bordered table-responsive-md mdl-data-table dataTable"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th class="hidden"><?php esc_html_e( 'location_pid', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Title', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Address', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'City', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'State', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Country', WL_AGM_LITE_DOMAIN ); ?></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $way_locations_str  = str_replace( [ '[', ']', '"' ], ' ', $selected_locations );
					$way_locations_arr  = ( explode( ",", $way_locations_str ) );
					$args = array( 'post_type' => 'wl_agm_locations', 'post_status' => 'publish' );
					$wl_agm_locations_cpt_data = new WP_Query( $args );
					if ( $wl_agm_locations_cpt_data->have_posts() ) :
						while ( $wl_agm_locations_cpt_data->have_posts() ) : $wl_agm_locations_cpt_data->the_post(); ?>
                            <tr <?php if ( in_array( get_the_ID(), $way_locations_arr ) ) { echo esc_attr('class="selected"'); } ?>>
                                <td class="hidden"><?php echo esc_html( get_the_ID() ); ?></td>
                                <td><?php the_title(); ?></td>
                                <td><?php if ( get_post_meta( get_the_ID(), 'location_address', true ) ) {
										echo esc_html( get_post_meta( get_the_ID(), 'location_address', true ) );
									} ?></td>
                                <td><?php if ( get_post_meta( get_the_ID(), 'location_city', true ) ) {
										echo esc_html( get_post_meta( get_the_ID(), 'location_city', true ) );
									} ?></td>
                                <td><?php if ( get_post_meta( get_the_ID(), 'location_state', true ) ) {
										echo esc_html( get_post_meta( get_the_ID(), 'location_state', true ) );
									} ?></td>
                                <td><?php if ( get_post_meta( get_the_ID(), 'location_country', true ) ) {
										echo esc_html( get_post_meta( get_the_ID(), 'location_country', true ) );
									} ?></td>
                            </tr>
						<?php endwhile; endif;
					wp_reset_postdata(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="hidden"><?php esc_html_e( 'location_pid', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Title', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Address', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'City', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'State', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Country', WL_AGM_LITE_DOMAIN ); ?></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
	<?php }

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
			if ( $post_type == 'wl_agm_maps' ) {

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

				$map_type     = isset( $_POST['map_type'] ) ? sanitize_text_field( $_POST['map_type'] ) : '';
				$map_type_arr = WL_AGM_LITE_Helper::get_map_type();
				if ( ! in_array( $map_type, array_keys( $map_type_arr ) ) ) {
					$map_type = 'ROADMAP';
				}

				$map_theme     = isset( $_POST['map_theme'] ) ? sanitize_text_field( $_POST['map_theme'] ) : '';
				$map_theme_arr = WL_AGM_LITE_Helper::get_map_style_theme();
				if ( ! in_array( $map_theme, array_keys( $map_theme_arr ) ) ) {
					$map_theme = 'standard';
				}

				update_post_meta( $post_ID, 'map_width', isset( $_POST['map_width'] ) ? sanitize_text_field( $_POST['map_width'] ) : '' );
				update_post_meta( $post_ID, 'map_height', isset( $_POST['map_height'] ) ? sanitize_text_field( $_POST['map_height'] ) : '' );	
				update_post_meta( $post_ID, 'map_zoom_level', $map_zoom_level );
				update_post_meta( $post_ID, 'map_type', $map_type );
				update_post_meta( $post_ID, 'map_theme', $map_theme );
				update_post_meta( $post_ID, 'map_scroll_wheel', isset( $_POST['map_scroll_wheel'] ) ? boolval( sanitize_text_field( $_POST['map_scroll_wheel'] ) ) : 0 );
				update_post_meta( $post_ID, 'map_m_draggable', isset( $_POST['map_m_draggable'] ) ? boolval( sanitize_text_field( $_POST['map_m_draggable'] ) ) : 0 );
				update_post_meta( $post_ID, 'map_imagery', isset( $_POST['map_imagery'] ) ? boolval( sanitize_text_field( $_POST['map_imagery'] ) ) : 0 );
				update_post_meta( $post_ID, 'center_lat', isset( $_POST['center_lat'] ) ? sanitize_text_field( $_POST['center_lat'] ) : '' );
				update_post_meta( $post_ID, 'center_long', isset( $_POST['center_long'] ) ? sanitize_text_field( $_POST['center_long'] ) : '' );
				update_post_meta( $post_ID, 'location_image', isset( $_POST['location_image'] ) ? sanitize_text_field( $_POST['location_image'] ) : '' );
				update_post_meta( $post_ID, 'info_win_custom', isset( $_POST['info_win_custom'] ) ? boolval( sanitize_text_field( $_POST['info_win_custom'] ) ) : 0 );
				update_post_meta( $post_ID, 'custom_bg_color', isset( $_POST['custom_bg_color'] ) ? sanitize_text_field( $_POST['custom_bg_color'] ) : '' );
				update_post_meta( $post_ID, 'custom_border_radius', isset( $_POST['custom_border_radius'] ) ? sanitize_text_field( $_POST['custom_border_radius'] ) : '' );
				update_post_meta( $post_ID, 'custom_back_color', isset( $_POST['custom_back_color'] ) ? sanitize_text_field( $_POST['custom_back_color'] ) : '' );
				update_post_meta( $post_ID, 'custom_text_color', isset( $_POST['custom_text_color'] ) ? sanitize_text_field( $_POST['custom_text_color'] ) : '' );
				update_post_meta( $post_ID, 'custom_width_info', isset( $_POST['custom_width_info'] ) ? sanitize_text_field( $_POST['custom_width_info'] ) : '' );

				update_post_meta( $post_ID, 'selected_locations', isset( $_POST['selected_locations'] ) ? sanitize_text_field( $_POST['selected_locations'] ) : '' );
			}
		}
	}
}
?>