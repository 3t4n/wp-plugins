<?php

	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}

	function tp_register_skillbar_cpt() {
	    $labels = array(
	        'name'               => __( 'Skill Bars', 'skillbar' ),
	        'singular_name'      => __( 'Skill Bar', 'skillbar' ),
	        'add_new'            => __( 'Add New', 'skillbar' ),
	        'add_new_item'       => __( 'Add New Skill', 'skillbar' ),
	        'edit_item'          => __( 'Edit Skill Bar', 'skillbar' ),
	        'new_item'           => __( 'New Skill Bar', 'skillbar' ),
	        'all_items'          => __( 'All Skill Bars', 'skillbar' ),
	        'view_item'          => __( 'View Skill Bar', 'skillbar' ),
	        'search_items'       => __( 'Search Skill Bars', 'skillbar' ),
	        'not_found'          => __( 'No Skill Bars found', 'skillbar' ),
	        'not_found_in_trash' => __( 'No Skill Bars found in Trash', 'skillbar' ),
	        'menu_name'          => __( 'Skill Bars', 'skillbar' ),
	    );
	    $args = array(
	        'labels'             => $labels,
	        'public'             => true,
	        'has_archive'        => true,
	        'supports'           => array( 'title'),
	        'menu_icon'          => 'dashicons-chart-bar',
	        'show_in_rest'       => true,
	    );

	    register_post_type( 'skillbar', $args );
	}
	add_action( 'init', 'tp_register_skillbar_cpt' );

	function tp_add_skillbar_meta_box() {
	    add_meta_box(
	        'tp_skillbar_meta_box',
	        __( 'Skill Bar Details', 'skillbar' ),
	        'tp_render_skillbar_metabox',
	        'skillbar',
	        'normal',
	        'high'
	    );
	}
	add_action( 'add_meta_boxes', 'tp_add_skillbar_meta_box' );

	function tp_render_skillbar_metabox( $post ) {
	    // Add a nonce field for security
	    wp_nonce_field( 'tp_skillbar_metabox', 'tp_skillbar_nonce' );

	    // Fetch saved data or set default
	    $skillbar_data = get_post_meta( $post->ID, 'tp_skillbar_data', true );
	    if ( empty( $skillbar_data ) ) {
	        $skillbar_data = array(
	            array(
					'title'         => 'New Skill',
					'title_color'   => '#333333',
					'percentage'    => '80',
					'percent_color' => '#333333',
					'bg_color'      => '#dddddd',
					'color'         => '#333333',
	            ),
	        );
	    }

		$skills_themes            = get_post_meta( $post->ID, 'skills_themes', true );
		$tp_title_fontsize_option = get_post_meta( $post->ID, 'tp_title_fontsize_option', true );
		$tp_title_font_case       = get_post_meta( $post->ID, 'tp_title_font_case', true );
		$tp_title_font_style      = get_post_meta( $post->ID, 'tp_title_font_style', true );
		$tp_item_border_radius    = get_post_meta( $post->ID, 'tp_item_border_radius', true );

		$nav_value     = get_post_meta( $post->ID, 'nav_value', true );
		if ( empty( $nav_value ) ) { $nav_value = 1; }

		?>
		<input type="hidden" name="nav_value" id="nav_value" value="<?php echo $nav_value; ?>">

		<div class="skillbarsetings post-grid-metabox">
			<!-- <div class="wrap"> -->
			<ul class="tab-nav">
				<li nav="1" class="nav1 <?php if ( $nav_value == 1 ) { echo "active"; } ?>"><?php esc_html_e( 'Skill Bar', 'skillbar' ); ?></li>
				<li nav="2" class="nav2 <?php if ( $nav_value == 2 ) { echo "active"; } ?>"><?php esc_html_e( 'General Settings', 'skillbar' ); ?></li>
				<li nav="3" class="nav3 <?php if ( $nav_value == 3 ) { echo "active"; } ?>"><?php esc_html_e( 'Shortcode', 'skillbar' ); ?></li>
			</ul> <!-- tab-nav end -->
		</div>
		<ul class="box">

			<!-- Tab 1 -->
			<li style="<?php if ( $nav_value == 1 ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>" class="box1 tab-box <?php if ( $nav_value == 1 ) { echo 'active'; } ?>">
				<div class="wrap">
					<div class="option-box">
					    <div id="tp-skillbar-container">
						    <?php foreach ( $skillbar_data as $index => $skill ) { ?>
						        <div class="tp-skillbar-item">
						            <p>
						                <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_title"><?php esc_html_e( 'Skill Title:', 'skillbar' ); ?></label>
						                <input type="text" 
						                       id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_title" 
						                       name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][title]" 
						                       value="<?php echo esc_attr( $skill['title'] ); ?>" />
						            </p>
								    <p>
								        <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_title_color"><?php esc_html_e( 'Skill Title Color:', 'skillbar' ); ?></label>
								        <input type="color" 
								               id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_title_color" 
								               name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][title_color]" 
								               value="<?php echo esc_attr( $skill['title_color'] ); ?>" />
								    </p>
									<p>
									    <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_percentage"><?php esc_html_e( 'Skill Percentage:', 'skillbar' ); ?></label>
									    <span class="percentage-value"><?php echo esc_attr( $skill['percentage'] ); ?></span>%
									    <input type="range" 
									           id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_percentage" 
									           name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][percentage]" 
									           value="<?php echo esc_attr( $skill['percentage'] ); ?>" 
									           min="0" 
									           max="100" 
									           step="1" />
									</p>
								    <p>
								        <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_percent_color"><?php esc_html_e( 'Skill Percentage Color:', 'skillbar' ); ?></label>
								        <input type="color" 
								               id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_percent_color" 
								               name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][percent_color]" 
								               value="<?php echo esc_attr( $skill['percent_color'] ); ?>" />
								    </p>
								    <p>
								        <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_bg_color"><?php esc_html_e( 'Skill Background Color:', 'skillbar' ); ?></label>
								        <input type="color" 
								               id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_bg_color" 
								               name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][bg_color]" 
								               value="<?php echo esc_attr( $skill['bg_color'] ); ?>" />
								    </p>
						            <p>
						                <label for="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_color"><?php esc_html_e( 'Skill Animate Background Color:', 'skillbar' ); ?></label>
						                <input type="color" 
						                       id="tp_skillbar_data_<?php echo esc_attr( $index ); ?>_color" 
						                       name="tp_skillbar_data[<?php echo esc_attr( $index ); ?>][color]" 
						                       value="<?php echo esc_attr( $skill['color'] ); ?>" />
						            </p>
						            <button type="button" class="tp-remove-skillbar"><?php esc_html_e( 'Remove', 'skillbar' ); ?></button>
						        </div>

								<script>
								jQuery(document).ready(function ($) {
								    // Update the percentage value when the range slider is changed
								    $('input[type="range"]').on('input', function () {
								        var value = $(this).val(); // Get the current value of the range slider
								        $(this).prev('.percentage-value').text(value); // Update the percentage value before the slider
								    });
								});
								</script>        
						    <?php } ?>
					    </div>
					    <button type="button" id="tp-add-skillbar"><?php esc_html_e( 'Add Skill', 'skillbar' ); ?></button>
					</div>
				</div>
			</li>
			<!-- Tab 2 -->
			<li style="<?php if ( $nav_value == 2 ) { echo "display: block;"; } else { echo "display: none;"; } ?>" class="box2 tab-box <?php if ( $nav_value == 2 ) { echo "active"; } ?>">
				<div class="wrap">
					<div class="option-box">
						<table class="form-table">
							<tr valign="top">
							    <th scope="row">
							        <label for="skills_themes"><?php esc_html_e( 'Select Styles', 'skillbar' ); ?></label>
							    </th>
							    <td style="vertical-align:middle;">
							        <div class="switch-field">
							            <!-- Style 1 -->
							            <input type="radio" id="radio-three" name="skills_themes" value="theme1" 
							                   <?php if ( $skills_themes == 'theme1' || $skills_themes == '' ) echo 'checked'; ?> />
							            <label for="radio-three">
							                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/style1.png'; ?>" alt="<?php esc_attr_e( 'Style 1', 'skillbar' ); ?>" />
							            </label>

							            <!-- Style 2 -->
							            <input type="radio" id="radio-four" name="skills_themes" value="theme2" 
							                   <?php if ( $skills_themes == 'theme2' ) echo 'checked'; ?> />
							            <label for="radio-four">
							                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/style2.png'; ?>" alt="<?php esc_attr_e( 'Style 2', 'skillbar' ); ?>" />
							            </label>

							            <!-- Style 3 (Pro Only) -->
							            <input type="radio" id="radio-five" name="skills_themes" value="theme3" 
							                   <?php if ( $skills_themes == 'theme3' ) echo 'checked'; ?> disabled />
							            <label for="radio-five" class="pro-overlay">
							                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/style3.png'; ?>" alt="<?php esc_attr_e( 'Style 3', 'skillbar' ); ?>" />
							                <span class="pro-text"><?php esc_html_e( 'Pro', 'skillbar' ); ?></span>
							            </label>

							            <!-- Style 4 (Pro Only) -->
							            <input type="radio" id="radio-six" name="skills_themes" value="theme4" 
							                   <?php if ( $skills_themes == 'theme4' ) echo 'checked'; ?> disabled />
							            <label for="radio-six" class="pro-overlay">
							                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/style4.png'; ?>" alt="<?php esc_attr_e( 'Style 4', 'skillbar' ); ?>" />
							                <span class="pro-text"><?php esc_html_e( 'Pro', 'skillbar' ); ?></span>
							            </label>
							        </div>
							        <span class="skillbar_manager_hint">
							            <?php esc_html_e( 'Select a layout to display the Skill Bars. To unlock all Layouts', 'skillbar' ); ?>, 
							            <a href="https://themepoints.com/skillbar" target="_blank"><?php esc_html_e( 'Upgrade To Pro!', 'skillbar' ); ?></a>
							        </span>
							    </td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="tp_title_fontsize_option"><?php _e( 'Title Font Size', 'skillbar' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input type="number" name="tp_title_fontsize_option" id="tp_title_fontsize_option" min="10" max="45" class="timezone_string" required value="<?php  if($tp_title_fontsize_option !=''){echo $tp_title_fontsize_option; }else{ echo '16';} ?>"> <br />
								</td>
							</tr><!-- End Title Font Size-->

							<tr valign="top">
								<th scope="row">
									<label for="tp_title_font_case"><?php _e('Title Text Transform', 'skillbar'); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="tp_title_font_case" id="tp_title_font_case" class="timezone_string">
										<option value="none" <?php if ( isset ( $tp_title_font_case ) ) selected( $tp_title_font_case, 'none' ); ?>><?php _e('Default', 'skillbar');?></option>
										<option value="capitalize" <?php if ( isset ( $tp_title_font_case ) ) selected( $tp_title_font_case, 'capitalize' ); ?>><?php _e('Capitalize', 'skillbar'); ?></option>
										<option value="lowercase" <?php if ( isset ( $tp_title_font_case ) ) selected( $tp_title_font_case, 'lowercase' ); ?>><?php _e('Lowercase', 'skillbar'); ?></option>
										<option value="uppercase" <?php if ( isset ( $tp_title_font_case ) ) selected( $tp_title_font_case, 'uppercase' ); ?>><?php _e('Uppercase', 'skillbar'); ?></option>
									</select><br>
								</td>
							</tr><!-- End Title text Transform -->

							<tr valign="top">
								<th scope="row">
									<label for="tp_title_font_style"><?php _e('Title Text Style', 'skillbar'); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="tp_title_font_style" id="tp_title_font_style" class="timezone_string">
										<option value="normal" <?php if ( isset ( $tp_title_font_style ) ) selected( $tp_title_font_style, 'normal' ); ?>><?php _e('Default', 'skillbar'); ?></option>
										<option value="italic" <?php if ( isset ( $tp_title_font_style ) ) selected( $tp_title_font_style, 'italic' ); ?>><?php _e('Italic', 'skillbar'); ?></option>
									</select><br>
								</td>
							</tr> <!-- End Title text style -->

							<tr valign="top">
								<th scope="row">
									<label for="tp_item_border_radius"><?php _e( 'Skill Border Radius', 'skillbar' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input type="number" name="tp_item_border_radius" id="tp_item_border_radius" class="timezone_string" value="<?php if($tp_item_border_radius !=''){echo $tp_item_border_radius; }else{ echo '0';} ?>"> <br />
								</td>
							</tr><!-- End Title Font Size-->

						</table>
					</div>
				</div>
			</li>

			<li style="<?php if($nav_value == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($nav_value == 1){echo "active";}?>">
				<div class="option-box">
					<p class="option-title"><?php esc_html_e('Shortcode','skillbar' ); ?></p>
					<p class="option-info"><?php _e('Copy this shortcode and paste on page or post where you want to display Skill Bars. <br />Use PHP code to your themes file to display Skill Bars.','skillbar' ); ?></p>
					<textarea cols="50" rows="1" onClick="this.select();" >[skillbars <?php echo 'id="'.$post->ID.'"';?>]</textarea>
					<br /><br />
					<p class="option-info"><?php esc_html_e('PHP Code:','skillbar' ); ?></p>
					<textarea cols="50" rows="2" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[skillbars id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
				</div>
			</li>
		</ul>
	<?php
	}


	function tp_save_skillbar_metabox( $post_id ) {
	    // Verify nonce
	    if ( ! isset( $_POST['tp_skillbar_nonce'] ) || ! wp_verify_nonce( $_POST['tp_skillbar_nonce'], 'tp_skillbar_metabox' ) ) {
	        return;
	    }

	    // Prevent autosave
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	        return;
	    }

	    // Check user permissions
	    if ( ! current_user_can( 'edit_post', $post_id ) ) {
	        return;
	    }

	    // Check if skillbar data is set
	    if ( isset( $_POST['tp_skillbar_data'] ) && is_array( $_POST['tp_skillbar_data'] ) ) {
	        $skillbar_data = array();

	        // Sanitize and validate each repeatable item
	        foreach ( $_POST['tp_skillbar_data'] as $item ) {
	            if ( ! empty( $item['title'] ) && isset( $item['title_color'] ) && isset( $item['percentage'] ) && isset( $item['percent_color'] ) && isset( $item['bg_color'] ) && isset( $item['color'] ) ) {
	                $skillbar_data[] = array(
						'title'         => sanitize_text_field( $item['title'] ),
						'title_color'   => sanitize_hex_color( $item['title_color'] ),
						'percentage'    => absint( $item['percentage'] ),
						'percent_color' => sanitize_hex_color( $item['percent_color'] ),
						'bg_color'      => sanitize_hex_color( $item['bg_color'] ),
						'color'         => sanitize_hex_color( $item['color'] ),
	                );
	            }
	        }

	        // Save sanitized data
	        update_post_meta( $post_id, 'tp_skillbar_data', $skillbar_data );
	    } else {
	        // If no data, delete the meta key
	        delete_post_meta( $post_id, 'tp_skillbar_data' );
	    }

	 	#Checks for input and sanitizes/saves if needed
	    if ( isset( $_POST['skills_themes'] ) && ( $_POST['skills_themes'] != '' ) ) {
	        update_post_meta( $post_id, 'skills_themes', esc_html( $_POST['skills_themes'] ) );
	    }

		// Sanitize and save 'tp_title_fontsize_option' field
		if ( isset( $_POST['tp_title_fontsize_option'] ) ) {
		    $tp_title_fontsize_option = intval( $_POST['tp_title_fontsize_option'] );
		    update_post_meta( $post_id, 'tp_title_fontsize_option', $tp_title_fontsize_option );
		}

		// Sanitize and save 'tp_title_font_case' field
		if ( isset( $_POST['tp_title_font_case'] ) ) {
		    $tp_title_font_case = sanitize_text_field( $_POST['tp_title_font_case'] );
		    update_post_meta( $post_id, 'tp_title_font_case', $tp_title_font_case );
		}

		// Sanitize and save 'tp_title_font_style' field
		if ( isset( $_POST['tp_title_font_style'] ) ) {
		    $tp_title_font_style = sanitize_text_field( $_POST['tp_title_font_style'] );
		    update_post_meta( $post_id, 'tp_title_font_style', $tp_title_font_style );
		}

		// Sanitize and save 'tp_item_border_radius' field
		if ( isset( $_POST['tp_item_border_radius'] ) ) {
		    $tp_item_border_radius = sanitize_text_field( $_POST['tp_item_border_radius'] );
		    update_post_meta( $post_id, 'tp_item_border_radius', $tp_item_border_radius );
		}

		#Value check and saves if needed
		if ( isset( $_POST[ 'nav_value' ] ) ) {
			update_post_meta( $post_id, 'nav_value', $_POST['nav_value'] );
		} else {
			update_post_meta( $post_id, 'nav_value', 1 );
		}
	}
	add_action( 'save_post', 'tp_save_skillbar_metabox' );

	// Adding custom columns to display the shortcode in the admin post list
	function tp_skillbars_shortcode_clmn( $columns ) {
		// Merge the existing columns with the new ones for Shortcode and Template Shortcode
		return array_merge( $columns, 
		    array( 
		  		'shortcode' 	=> __( 'Shortcode', 'skillbar' ),
		  		'doshortcode' 	=> __( 'Template Shortcode', 'skillbar' ) 
		  	)
		);
	}
	add_filter( 'manage_skillbar_posts_columns' , 'tp_skillbars_shortcode_clmn' );

	// Display content for the custom columns in the post list
	function tp_skillbars_shortcode_clmn_display( $tpcp_column, $post_id ) {
		if ( $tpcp_column == 'shortcode' ) { ?>
		<input style="background:#ddd" type="text" onClick="this.select();" value="[skillbars <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
		 <?php
		}
	 	if ( $tpcp_column == 'doshortcode' ) { ?>
	  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode( "[skillbars id='; echo "'".$post_id."']"; echo '" ); ?>'; ?></textarea>
	  	<?php
	 	}
	}	
	add_action( 'manage_skillbar_posts_custom_column' , 'tp_skillbars_shortcode_clmn_display', 10, 2 );