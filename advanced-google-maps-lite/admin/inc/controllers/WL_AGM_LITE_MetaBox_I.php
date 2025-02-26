<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Map_Regions.php' );

class WL_AGM_LITE_METABOX_I {
	/* Add Route metabox */
	public static function create_metabox() {

		/* MetaBox for Route Cpt */
		add_meta_box( 'wl_agm_interactive_meta', esc_html__( "Map's Information", WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_I',
			'meta_wl_agm_i_map'
		), 'wl_agm_inter_maps', 'normal', 'high' );
		add_meta_box( 'wl_agm_interactive_shortcode', esc_html__( 'Copy shortcode', WL_AGM_LITE_DOMAIN ), array(
			'WL_AGM_LITE_METABOX_I',
			'meta_wl_agm_i_map_shortcode_box'
		), 'wl_agm_inter_maps', 'side', 'low' );

        /* Save MetaBox Value*/
        add_action( 'save_post', array( 'WL_AGM_LITE_METABOX_I', 'save_data' ) );
	}

	/* Intractive Map's Meta Fields */
	public static function meta_wl_agm_i_map() {
		global $post;
		$map_width          = sanitize_text_field( get_post_meta( get_the_ID(), 'map_width', true ) );
		$map_height         = sanitize_text_field( get_post_meta( get_the_ID(), 'map_height', true ) );
		$map_desc           = sanitize_text_field( get_post_meta( get_the_ID(), 'map_desc', true ) );
        $map_continents     = sanitize_text_field( get_post_meta( get_the_ID(), 'map_continents', true ) );
        $map_subcontinents  = sanitize_text_field( get_post_meta( get_the_ID(), 'map_subcontinents', true ) );
        $map_country        = sanitize_text_field( get_post_meta( get_the_ID(), 'map_country', true ) );
        $map_resolution     = sanitize_text_field( get_post_meta( get_the_ID(), 'map_resolution', true ) );
        $bg_color           = sanitize_text_field( get_post_meta( get_the_ID(), 'bg_color', true ) );
        $dataless_color     = sanitize_text_field( get_post_meta( get_the_ID(), 'dataless_color', true ) );
        $map_interactivity  = sanitize_text_field( get_post_meta( get_the_ID(), 'map_interactivity', true ) );
        $saved_data_arr     = sanitize_text_field( get_post_meta( get_the_ID(), 'saved_data_arr', true ) );
        

        $post_id = $post->ID;
        ?>
		<div class="wl_agm wl_agm_container">
            <?php wp_nonce_field( 'save_meta_' . $post_id, 'save_meta_' . $post_id ); ?>
            <div class="form-group row">
                <label for="map_desc"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Description', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <textarea class="form-control" id="map_desc" name="map_desc"><?php if ( ! empty( $map_desc ) ) {
		                    echo esc_attr( $map_desc );
	                    } ?></textarea>
                    <span class="form-check-label"><?php esc_html_e( "Please enter map's description here.", WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
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
                    <label for="map_continents"
                           class="col-3 col-form-label"><?php esc_html_e( 'Region', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_continents" id="map_continents" class="custom-select">
                                <option value="0"><?php esc_html_e( '- For more detail: Select continent -', WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php $continents = WL_AGM_LITE_Helper::get_continents();
                                foreach ( $continents as $key => $value ) { ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                <?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( "Select Continents to get more detailed map view.", WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="map_subcontinents_div">
                <div class="row">
                    <label for="map_subcontinents"
                           class="col-3 col-form-label"><?php esc_html_e( 'Sub-Continents', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_subcontinents" id="map_subcontinents" class="custom-select">
                                <option value="" selected><?php esc_html_e( '- For more detail: Select subcontinent -', WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php if ( ! empty ( $map_continents ) ) {
                                    $subcontinents = WL_AGM_LITE_Map_Regions::get_tree();
                                    foreach ( $subcontinents as $row ) {
                                        if ( $row[0] == $map_continents ) {
                                            ?>
                                            <option value="<?php echo esc_attr( $row[1] ); ?>"><?php echo esc_html( $row[2] ); ?></option>
                                        <?php }
                                    }
                                } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( "Select Sub-Continents to get more detailed map view.", WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="map_country_div">
                <div class="row">
                    <label for="map_country"
                           class="col-3 col-form-label"><?php esc_html_e( 'Country', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_country" id="map_country" class="custom-select">
                                <option value="" selected><?php esc_html_e( '- For more detail: Select subcontinent -', WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php if ( ! empty ( $map_subcontinents ) ) {
                                    $subcontinents = WL_AGM_LITE_Map_Regions::get_tree();
                                    foreach ( $subcontinents as $row ) {
                                        if ( $row[0] == $map_subcontinents ) {
                                            ?>
                                            <option value="<?php echo esc_attr( $row[1] ); ?>"><?php echo esc_html( $row[2] ); ?></option>
                                        <?php }
                                    }
                                } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( "Select Country to get more detailed map view.", WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_resolution"
                           class="col-3 col-form-label"><?php esc_html_e( 'Resolution', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_resolution" id="map_resolution" class="custom-select">
                                <option value=""><?php esc_html_e( '- Choose One -', WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php $resolution = WL_AGM_LITE_Helper::get_region_resolution();
                                foreach ( $resolution as $value ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
                                <?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( "Select resolution of the geochart borders.", WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_display_mode"
                           class="col-3 col-form-label"><?php esc_html_e( 'Display Mode', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline">
                            <select name="map_display_mode" id="map_display_mode" class="custom-select">
                                <option value=""><?php esc_html_e( '- Choose One -', WL_AGM_LITE_DOMAIN ); ?></option>
                                <?php $display_mode = WL_AGM_LITE_Helper::get_map_display_mode();
                                foreach ( $display_mode as $value ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
                                <?php } ?>
                            </select>
                            <span class="form-check-label"><?php esc_html_e( "Select Display Mode for map.", WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_title"
                       class="col-3 col-form-label"><?php esc_html_e( 'Map Background Color', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" id="bg_color" name="bg_color" class="color-field"
                           value="<?php if ( ! empty( $bg_color ) ) {
                               echo esc_attr( $bg_color );
                           } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Choose color for the background of Map. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_title"
                       class="col-3 col-form-label"><?php esc_html_e( 'Dataless Region Color', WL_AGM_LITE_DOMAIN ); ?></label>
                <div class="col-9">
                    <input type="text" id="dataless_color" name="dataless_color" class="color-field"
                           value="<?php if ( ! empty( $dataless_color ) ) {
                               echo esc_attr( $dataless_color );
                           } ?>">
                    <span class="form-check-label"><?php esc_html_e( 'Choose color for the Dataless Region of map. Leave blank for default settings.', WL_AGM_LITE_DOMAIN ); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="map_interactivity"
                           class="col-3 col-form-label"><?php esc_html_e( 'Region Interactivity', WL_AGM_LITE_DOMAIN ); ?></label>
                    <div class="col-9">
                        <div class="form-check form-check-inline custom_toggle_checkbox">
                            <input type="checkbox" id="map_interactivity"
                                   name="map_interactivity" <?php if ( ! empty( $map_interactivity ) ) {
                                echo esc_attr('checked');
                            } ?> /><label for="map_interactivity"><?php esc_html_e( 'Toggle', WL_AGM_LITE_DOMAIN ); ?></label>
                            <span class="form-check-label"><?php esc_html_e( 'Disable region interactivity, including focus and tool-tip elaboration on mouse hover, and region selection.', WL_AGM_LITE_DOMAIN ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wl_agm wl_agm_container" id="data_table_region">
            <div class="col-md-12 col-xs-12 wl-agm-setting-title">
                <div class="product_name wl-agm-title-setting"><?php esc_html_e( "Map's Elements", WL_AGM_LITE_DOMAIN ); ?></div>
            </div>
            <div class="insert_region">
                <!-- Action Buttons -->
                <a class="btn btn-sm btn-primary custom_region" data-toggle="modal" data-target="#myModal"><?php esc_html_e( 'Add
                    Region', WL_AGM_LITE_DOMAIN ); ?></a>
                <a class="btn btn-sm btn-primary custom_region d-none" id="get_all_rows"><?php esc_html_e( 'Save Data', WL_AGM_LITE_DOMAIN ); ?></a>
                <a class="btn btn-sm btn-danger custom_region float-right" id="delete-row"><?php esc_html_e( 'Delete All', WL_AGM_LITE_DOMAIN ); ?></a>

                <!-- Add Region Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold"><?php esc_html_e( 'Add Region', WL_AGM_LITE_DOMAIN ); ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <form class="add_region_form" id="add_region_form">
                                    <div class="form-group row">
                                        <label for="region_name" class="col-3 col-form-label"><?php esc_html_e( 'Name', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="region_name" name="region_name"
                                                   value="">
                                            <span class="form-check-label"><?php esc_html_e( "Please enter Region Name here.", WL_AGM_LITE_DOMAIN ); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region_color" class="col-3 col-form-label"><?php esc_html_e( 'Color', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9" id="add_color">
                                            <input type="text" class="form-control color-field" id="region_color"
                                                   name="region_color" value="">
                                            <span class="form-check-label"><?php esc_html_e( "Select 'Color' for Region.", WL_AGM_LITE_DOMAIN ); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region_tooltip_value" class="col-3 col-form-label"><?php esc_html_e( 'Tooltip
                                            Value', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <textarea type="text" class="form-control" id="region_tooltip_value"
                                                      name="region_tooltip_value"></textarea>
                                            <span class="form-check-label"><?php esc_html_e( "Please enter Tooltip Value here.", WL_AGM_LITE_DOMAIN ); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region_click_value" class="col-3 col-form-label"><?php esc_html_e( 'Click Value', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="region_click_value"
                                                   name="region_click_value" value="">
                                            <span class="form-check-label"><?php esc_html_e( "Please enter click action value here.", WL_AGM_LITE_DOMAIN ); ?></span>
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-primary custom_region" id="submit_region"><?php esc_html_e( 'Submit', WL_AGM_LITE_DOMAIN ); ?></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Region Modal -->
                <div class="modal fade" id="edit_region_model" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold"><?php esc_html_e( 'Edit', WL_AGM_LITE_DOMAIN ); ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <form class="add_region_form" id="add_region_form">
                                    <div class="form-group row">
                                        <label for="region_name" class="col-3 col-form-label"><?php esc_html_e( 'Name', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_name" name="edit_name"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region_color" class="col-3 col-form-label"><?php esc_html_e( 'Color', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9" id="edit_color">
                                            <input type="text" class="form-control color-field" name="edit_color"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_tooltip_value" class="col-3 col-form-label"><?php esc_html_e( 'Tooltip
                                            Value', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <textarea type="text" class="form-control" id="edit_tooltip_value"
                                                      name="edit_tooltip_value"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="region_click_value" class="col-3 col-form-label"><?php esc_html_e( 'Click Value', WL_AGM_LITE_DOMAIN ); ?></label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_click_value"
                                                   name="edit_click_value" value="">
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-primary custom_region" id="edit_region"><?php esc_html_e( 'Submit', WL_AGM_LITE_DOMAIN ); ?></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <input id="saved_data_arr" type="hidden" name="saved_data_arr" class="form-control"
                       value="<?php if ( ! empty( $saved_data_arr ) ) {
                           echo htmlentities( $saved_data_arr );
                       } ?>"/>
                <table id="example"
                       class="table table-striped table-bordered table-responsive-md mdl-data-table dataTable"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th><input type='checkbox' name='select_all' class="select_all checkbox_region"></th>
                        <th><?php esc_html_e( 'Region', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Color', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Tooltip Value', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Click Action Value', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Action', WL_AGM_LITE_DOMAIN ); ?></th>
                    </tr>
                    </thead>
                    <?php $arr = json_decode( $saved_data_arr );
                    if ( ! empty ( $arr ) ) { ?>
                        <tbody>
                        <?php $size_data = sizeof( $arr );
                        for ( $i = 0; $i < $size_data; $i ++ ) { ?>
                            <tr>
                                <td><input class='checkbox_region' type='checkbox' name='record'></td>
                                <td><?php echo esc_html( $arr[ $i ]->region ); ?></td>
                                <td><?php echo esc_html( $arr[ $i ]->color ); ?></td>
                                <td><?php echo esc_html( $arr[ $i ]->tooltip_value ); ?></td>
                                <td><?php echo esc_html( $arr[ $i ]->click_value ); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-danger custom_action_btn delete_region"><?php esc_html_e( 'Delete', WL_AGM_LITE_DOMAIN ); ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    <?php } else { ?>
                        <tbody></tbody>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th><input type='checkbox' name='select_all' class="select_all checkbox_region"></th>
                        <th><?php esc_html_e( 'Region', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Color', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Tooltip Value', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Click Action Value', WL_AGM_LITE_DOMAIN ); ?></th>
                        <th><?php esc_html_e( 'Action', WL_AGM_LITE_DOMAIN ); ?></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php WL_AGM_LITE_Helper::interactive_cpt_select_options( get_the_ID() );
	}

	/* Shortcode MetaBox for Intractive Map's Cpt */
	public static function meta_wl_agm_i_map_shortcode_box() {
		global $post;
		?>
        <div class="wl_agm form-group">
            <label for="location_marker_ani"
                   class="col-3 col-form-label"><?php esc_html_e( 'Shortcode', WL_AGM_LITE_DOMAIN ); ?></label>
            <div class="row">
                <div class="col">
                    <input readonly="readonly" class="form-control" type="text"
                           value="<?php echo esc_attr("[WL_AGM_I_Map id=" . esc_attr( get_the_ID() ) . "]"); ?>">
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
            if ( $post_type == 'wl_agm_inter_maps' ) {

                $map_resolution = isset( $_POST['map_resolution'] ) ? sanitize_text_field( $_POST['map_resolution'] ) : '';
                $resolution_arr = WL_AGM_LITE_Helper::get_region_resolution();
                if ( ! in_array( $map_resolution, $resolution_arr ) ) {
                    $map_resolution = 'provinces';
                }

                $map_display_mode = isset( $_POST['map_display_mode'] ) ? sanitize_text_field( $_POST['map_display_mode'] ) : '';
                $display_mode     = WL_AGM_LITE_Helper::get_map_display_mode();
                if ( ! in_array( $map_display_mode, $display_mode ) ) {
                    $map_display_mode = 'regions';
                }

                update_post_meta( $post_ID, 'map_resolution', $map_resolution );
                update_post_meta( $post_ID, 'map_display_mode', $map_display_mode );
                update_post_meta( $post_ID, 'map_width', isset( $_POST['map_width'] ) ? sanitize_text_field( $_POST['map_width'] ) : '' );
                update_post_meta( $post_ID, 'map_height', isset( $_POST['map_height'] ) ? sanitize_text_field( $_POST['map_height'] ) : '' );
                update_post_meta( $post_ID, 'map_desc', isset( $_POST['map_desc'] ) ? sanitize_text_field( $_POST['map_desc'] ) : '' );
                update_post_meta( $post_ID, 'map_continents', isset( $_POST['map_continents'] ) ? sanitize_text_field( $_POST['map_continents'] ) : '' );
                update_post_meta( $post_ID, 'map_subcontinents', isset( $_POST['map_subcontinents'] ) ? sanitize_text_field( $_POST['map_subcontinents'] ) : '' );
                update_post_meta( $post_ID, 'map_country', isset( $_POST['map_country'] ) ? sanitize_text_field( $_POST['map_country'] ) : '' );
                update_post_meta( $post_ID, 'bg_color', isset( $_POST['bg_color'] ) ? sanitize_text_field( $_POST['bg_color'] ) : '' );
                update_post_meta( $post_ID, 'dataless_color', isset( $_POST['dataless_color'] ) ? sanitize_text_field( $_POST['dataless_color'] ) : '' );
                update_post_meta( $post_ID, 'map_interactivity', isset( $_POST['map_interactivity'] ) ? (bool) ( $_POST['map_interactivity'] ) : 0 );
                update_post_meta( $post_ID, 'saved_data_arr', isset( $_POST['saved_data_arr'] ) ? sanitize_text_field( $_POST['saved_data_arr'] ) : '' );
            }
        }
    }
}
?>