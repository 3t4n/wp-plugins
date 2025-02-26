<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Admin Submenu Page
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	// Create Submenu Page
	function adosui_extended_options_submenu_page() {
		add_submenu_page(
			'addon-suite',
			__('Extended Options', 'addonsuite-for-wpadverts'),
			__('Extended Options', 'addonsuite-for-wpadverts'),
			'manage_options',	
			'extended-options',
			'adosui_extended_options_page'
		);
	}
	add_action( 'admin_menu', 'adosui_extended_options_submenu_page', 11 );
		
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Settings
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	// Settings Init
	function adosui_extended_options_settings_init(  ) { 
		
		// Register Settings
		register_setting( 'adosui_slug_options_pluginpage', 'adosui_slug_options_settings' );
		register_setting( 'adosui_submit_advert_options_pluginpage', 'adosui_submit_advert_options_settings' );
		register_setting( 'adosui_display_advert_options_pluginpage', 'adosui_display_advert_options_settings' );
		register_setting( 'adosui_search_advert_options_pluginpage', 'adosui_search_advert_options_settings' );		
		
		// Slug Settings Section
		add_settings_section(
			'adosui_slug_options_section', 
			__( 'Slug Options', 'addonsuite-for-wpadverts' ), 
			'adosui_slug_options_settings_callback', 
			'adosui_slug_options_pluginpage'
		);
		
					//Custom URL Slug
					add_settings_field( 
						'adosui_text_custom_url_slug', 
						__( 'Adverts URL slug:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_custom_url_slug_render', 
						'adosui_slug_options_pluginpage', 
						'adosui_slug_options_section' 
					);
					
					//Custom Category Slug
					add_settings_field( 
						'adosui_text_custom_category_slug', 
						__( 'Adverts category slug:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_custom_category_slug_render', 
						'adosui_slug_options_pluginpage', 
						'adosui_slug_options_section' 
					);
					
					//Custom Mal Location Slug

						add_settings_field( 
							'adosui_text_custom_mal_location_slug', 
							__( 'Location slug:', 'addonsuite-for-wpadverts' ), 
							'adosui_text_custom_mal_location_slug_render', 
							'adosui_slug_options_pluginpage', 
							'adosui_slug_options_section' 
						);

			
					// Setting Callback Description
					function adosui_slug_options_settings_callback( ) { 
						echo __( 'Setup the slugs for your WPAdverts classifieds page.', 'addonsuite-for-wpadverts' );
						echo "<div class='as-options-divider'></div>";
						echo "<div class='as-info-box-2'>";
						_e('Do not use a slug, which is already in use on your page. Leave the field blank to use the standard plugin slug. Please note that you have to <a href="options-permalink.php">save your permalinks</a> after slug change to prevent 404 pages.', 'addonsuite-for-wpadverts');
						echo "</div>";
					}			
								//Custom URL Slug	
								function adosui_text_custom_url_slug_render() { 
									$options = get_option( 'adosui_slug_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_slug_options_settings[adosui_text_custom_url_slug]' placeholder='<?php _e('Type your slug', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_custom_url_slug']; ?>'>
									<?php
								}
						
								//Custom Category Slug	
								function adosui_text_custom_category_slug_render() { 
									$options = get_option( 'adosui_slug_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_slug_options_settings[adosui_text_custom_category_slug]' placeholder='<?php _e('Type your slug', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_custom_category_slug']; ?>'>
									<div class='as-options-divider'></div>
									<?php
								}

								//Custom Mal Location Slug
								
								function adosui_text_custom_mal_location_slug_render() { 
									$options = get_option( 'adosui_slug_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_slug_options_settings[adosui_text_custom_mal_location_slug]' placeholder='<?php _e('Type your slug', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_custom_mal_location_slug']; ?>'>
									<br><small><i><?php _e('Please note, this option only works if you have the WPAdverts <a href="https://wpadverts.com/extensions/maps-and-locations/" target="_blank">Maps & Locations</a> premium addon installed and activated.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}								
								
					
		// Submit Advert Settings Section
		add_settings_section(
			'adosui_submit_advert_options_section', 
			__( 'Submit Options', 'addonsuite-for-wpadverts' ), 
			'adosui_submit_advert_options_settings_callback', 
			'adosui_submit_advert_options_pluginpage'
		);
		
					// Checkbox Force Featured Image
					add_settings_field( 
						'adosui_checkbox_force_featured_image', 
						__( 'Force featured image:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_force_featured_image_render', 
						'adosui_submit_advert_options_pluginpage', 
						'adosui_submit_advert_options_section' 
					);
					
					//Maximum Active Ads Each User
					add_settings_field( 
						'adosui_number_max_ads', 
						__( 'Maximum active user ads:', 'addonsuite-for-wpadverts' ), 
						'adosui_number_max_ads_render', 
						'adosui_submit_advert_options_pluginpage', 
						'adosui_submit_advert_options_section' 
					);
					
					// Mandatory Category 
					add_settings_field( 
						'adosui_checkbox_mandatory_category', 
						__( 'Category selection mandatory:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_mandatory_category_render', 
						'adosui_submit_advert_options_pluginpage', 
						'adosui_submit_advert_options_section' 
					);
					
					// Limit Category Selection to 1 
					add_settings_field( 
						'adosui_checkbox_limit_category_selection_1', 
						__( 'Limit category selection:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_limit_category_selection_1_render', 
						'adosui_submit_advert_options_pluginpage', 
						'adosui_submit_advert_options_section' 
					);
					
					// Setting Callback Description
					function adosui_submit_advert_options_settings_callback( ) { 
						echo __( 'Additional options for the adverts submission form.', 'addonsuite-for-wpadverts' );
						echo "<div class='as-options-divider'></div>";
					}
		
								// Checkbox Force Featured Image	
								function adosui_checkbox_force_featured_image_render( ) { 
									$options = get_option( 'adosui_submit_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_force_featured_image'])) {
									$options['adosui_checkbox_force_featured_image'] = false; }
									?>
									<input type='checkbox' name='adosui_submit_advert_options_settings[adosui_checkbox_force_featured_image]' <?php checked( $options['adosui_checkbox_force_featured_image'], 1 ); ?> value='1'>
									<small><i><?php _e('Force an featured image on advert creation. Please note that this option will enable featured image on newly posted ads only. The already existing ads you have to edit from wp-admin / Classifieds panel and define a featured image for each ad separately.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}

								//Maximum Active Ads Each User	
								function adosui_number_max_ads_render() { 
									$options = get_option( 'adosui_submit_advert_options_settings' );
									?>
									<input type='number' name='adosui_submit_advert_options_settings[adosui_number_max_ads]' value='<?php echo $options['adosui_number_max_ads']; ?>'>
									<br><small><i><?php _e('Here you can define, how many active ads each user can have at the same time. Leave it blank for unlimited ads.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}

								// Checkbox Make Category Mandatory	
								function adosui_checkbox_mandatory_category_render( ) { 
									$options = get_option( 'adosui_submit_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_mandatory_category'])) {
									$options['adosui_checkbox_mandatory_category'] = false; }
									?>
									<input type='checkbox' name='adosui_submit_advert_options_settings[adosui_checkbox_mandatory_category]' <?php checked( $options['adosui_checkbox_mandatory_category'], 1 ); ?> value='1'>
									<small><i><?php _e('If this option is activated, the category field on adverts submission form will be mandatory.', 'addonsuite-for-wpadverts'); ?></i></small>
									<?php
								}
								
								// Checkbox Limit Category Selection To 1	
								function adosui_checkbox_limit_category_selection_1_render( ) { 
									$options = get_option( 'adosui_submit_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_limit_category_selection_1'])) {
									$options['adosui_checkbox_limit_category_selection_1'] = false; }
									?>
									<input type='checkbox' name='adosui_submit_advert_options_settings[adosui_checkbox_limit_category_selection_1]' <?php checked( $options['adosui_checkbox_limit_category_selection_1'], 1 ); ?> value='1'>
									<small><i><?php _e('Limit the category selection on adverts submission. If this option is checked, only one category can be selected.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}
		
		// Display Advert Settings Section
		add_settings_section(
			'adosui_display_advert_options_section', 
			__( 'Display Options', 'addonsuite-for-wpadverts' ), 
			'adosui_display_advert_options_settings_callback', 
			'adosui_display_advert_options_pluginpage'
		);
				
					// Checkbox Comments Activation
					add_settings_field( 
						'adosui_checkbox_activate_adverts_comments', 
						__( 'Comments on adverts:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_activate_adverts_comments_render', 
						'adosui_display_advert_options_pluginpage', 
						'adosui_display_advert_options_section' 
					);
					
					// Checkbox Expiration Date
					add_settings_field( 
						'adosui_checkbox_expiration_date', 
						__( 'Show expiration date:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_expiration_date_render', 
						'adosui_display_advert_options_pluginpage', 
						'adosui_display_advert_options_section' 
					);
					
					//Expiration Info
					add_settings_field( 
						'adosui_text_expiration_date', 
						__( 'If no expiration date exist:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_expiration_date_render', 
						'adosui_display_advert_options_pluginpage', 
						'adosui_display_advert_options_section' 
					);
					
					// Setting Callback Description
					function adosui_display_advert_options_settings_callback( ) { 
						echo __( 'Setup some additional options which relates to the single advert page on frontend.', 'addonsuite-for-wpadverts' );
						echo "<div class='as-options-divider'></div>";
					}
					
								// Checkbox Comments Activation	
								function adosui_checkbox_activate_adverts_comments_render() { 
									$options = get_option( 'adosui_display_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_activate_adverts_comments'])) {
									$options['adosui_checkbox_activate_adverts_comments'] = false; }
									?>
									<input type='checkbox' name='adosui_display_advert_options_settings[adosui_checkbox_activate_adverts_comments]' <?php checked( $options['adosui_checkbox_activate_adverts_comments'], 1 ); ?> value='1'>
									<small><i><?php _e('Activate comments for your adverts detail pages. Please note, this will enable comments on newly posted ads only, the already existing ads you will need to edit from wp-admin / Classifieds panel and enable comments for each ad separately.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}
								
								// Checkbox Expiration Date	
								function adosui_checkbox_expiration_date_render() { 
									$options = get_option( 'adosui_display_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_expiration_date'])) {
									$options['adosui_checkbox_expiration_date'] = false; }
									?>
									<input type='checkbox' name='adosui_display_advert_options_settings[adosui_checkbox_expiration_date]' <?php checked( $options['adosui_checkbox_expiration_date'], 1 ); ?> value='1'>
									<small><i><?php _e('If this option is checked, the expiration date of an advert will be shown on the single advert detail page.', 'addonsuite-for-wpadverts'); ?></i></small>
									
									<?php
								}
								
								//Info If No Expiration Date Is Set	
								function adosui_text_expiration_date_render() { 
									$options = get_option( 'adosui_display_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_display_advert_options_settings[adosui_text_expiration_date]' placeholder='<?php _e('Type your information...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_expiration_date']; ?>'>
									<br><small><i><?php _e('Here you can set an information text like "Never" or something else for adverts, which have no expiration date. If you leave this field blank, the expiration information will be hidden for adverts with no expiration date. ', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}

// Search Options Settings Section
		add_settings_section(
			'adosui_search_advert_options_section', 
			__( 'Search Options', 'addonsuite-for-wpadverts' ), 
			'adosui_search_advert_options_settings_callback', 
			'adosui_search_advert_options_pluginpage'
		);

					// Checkbox Search By Price
					add_settings_field( 
						'adosui_checkbox_search_by_price', 
						__( 'Search by price:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_search_by_price_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					//Text Label Price Search Minimal
					add_settings_field( 
						'adosui_text_price_search_label_minimal', 
						__( 'Price search label min.:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_price_search_label_minimal_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);

					//Text Label Price Search Maximal
					add_settings_field( 
						'adosui_text_price_search_label_maximal', 
						__( 'Price search label max.:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_price_search_label_maximal_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					// Checkbox Search By Category
					add_settings_field( 
						'adosui_checkbox_search_by_category', 
						__( 'Search by category:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_search_by_category_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					//Text Label Category Search
					add_settings_field( 
						'adosui_text_category_search_label', 
						__( 'Category search label:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_category_search_label_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					// Checkbox Search By Date
					add_settings_field( 
						'adosui_checkbox_search_by_date', 
						__( 'Search by date:', 'addonsuite-for-wpadverts' ), 
						'adosui_checkbox_search_by_date_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					//Text Label Date Search
					add_settings_field( 
						'adosui_text_date_search_label', 
						__( 'Date search label:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_date_search_label_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					//Radius Distance Options
					add_settings_field( 
						'adosui_text_radius_distance', 
						__( 'Additional radius distance:', 'addonsuite-for-wpadverts' ), 
						'adosui_text_radius_distance_render', 
						'adosui_search_advert_options_pluginpage', 
						'adosui_search_advert_options_section' 
					);
					
					// Setting Callback Description
					function adosui_search_advert_options_settings_callback( ) { 
						echo __( 'Extend your adverts search with additional options.', 'addonsuite-for-wpadverts' );
						echo "<div class='as-options-divider'></div>";
					}
					
								// Checkbox Search By Price
								function adosui_checkbox_search_by_price_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_search_by_price'])) {
									$options['adosui_checkbox_search_by_price'] = false; }
									?>
									<input type='checkbox' name='adosui_search_advert_options_settings[adosui_checkbox_search_by_price]' <?php checked( $options['adosui_checkbox_search_by_price'], 1 ); ?> value='1'>
									<small><i><?php _e('The search results can be narrowed down to special price ranges (min./max).', 'addonsuite-for-wpadverts'); ?></i></small>
									<?php
								}
								
								//Text Label Price Search Minimal
								function adosui_text_price_search_label_minimal_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_search_advert_options_settings[adosui_text_price_search_label_minimal]' placeholder='<?php _e('Type your label...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_price_search_label_minimal']; ?>'>
									<br><small><i><?php _e('Enter a headline for the search option or leave the field empty to show nothing.', 'addonsuite-for-wpadverts'); ?></i></small>
									<?php
								}							
								
								//Text Label Price Search Minimal
								function adosui_text_price_search_label_maximal_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_search_advert_options_settings[adosui_text_price_search_label_maximal]' placeholder='<?php _e('Type your label...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_price_search_label_maximal']; ?>'>
									<br><small><i><?php _e('Enter a headline for the search option or leave the field empty to show nothing.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}
								
								
								// Checkbox Search By Category
								function adosui_checkbox_search_by_category_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_search_by_category'])) {
									$options['adosui_checkbox_search_by_category'] = false; }
									?>
									<input type='checkbox' name='adosui_search_advert_options_settings[adosui_checkbox_search_by_category]' <?php checked( $options['adosui_checkbox_search_by_category'], 1 ); ?> value='1'>
									<small><i><?php _e('With this option you activate the search by category on frontend.', 'addonsuite-for-wpadverts'); ?></i></small>
									<?php
								}
								
								//Text Label Category Search
								function adosui_text_category_search_label_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_search_advert_options_settings[adosui_text_category_search_label]' placeholder='<?php _e('Type your label...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_category_search_label']; ?>'>
									<br><small><i><?php _e('Enter a headline for the search option or leave the field empty to show nothing.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}		
								
								// Checkbox Search By Date
								function adosui_checkbox_search_by_date_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									if ( !isset ( $options['adosui_checkbox_search_by_date'])) {
									$options['adosui_checkbox_search_by_date'] = false; }
									
									?>
									<input type='checkbox' name='adosui_search_advert_options_settings[adosui_checkbox_search_by_date]' <?php checked( $options['adosui_checkbox_search_by_date'], 1 ); ?> value='1'>
									<small><i><?php _e('Give your users the ability to set the search for a specific time period.', 'addonsuite-for-wpadverts'); ?></i></small>
									<?php
								}
								
								//Text Label Date Search
								function adosui_text_date_search_label_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_search_advert_options_settings[adosui_text_date_search_label]' placeholder='<?php _e('Type your label...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_date_search_label']; ?>'>
									<br><small><i><?php _e('Enter a headline for the search option or leave the field empty to show nothing.', 'addonsuite-for-wpadverts'); ?></i></small>
									<div class='as-options-divider'></div>
									<?php
								}
								
								//Radius Distance Options
								function adosui_text_radius_distance_render() { 
									$options = get_option( 'adosui_search_advert_options_settings' );
									?>
									<input type='text' style="width:98%;" name='adosui_search_advert_options_settings[adosui_text_expiration_date]' placeholder='<?php _e('Type distance like "100,150,200"...', 'addonsuite-for-wpadverts'); ?>' value='<?php echo $options['adosui_text_expiration_date']; ?>'>
									<br><small><i><?php _e('Define some additonal radius values. Please note, that 5, 10, 25 and 50 are given from WPAdverts. You can set for example 100, 150, and so on. Please separate each value with a comma. ', 'addonsuite-for-wpadverts'); ?></i></small>
									<br><small><i><?php _e('Please note, this option only works if you have the WPAdverts <a href="https://wpadverts.com/extensions/maps-and-locations/" target="_blank">Maps & Locations</a> premium addon installed and activated.', 'addonsuite-for-wpadverts'); ?></i></small>									
									<div class='as-options-divider'></div>
									<?php
								}													
	}
	add_action( 'admin_init', 'adosui_extended_options_settings_init' );
		
		
	// Settings Page
	function adosui_extended_options_page() { ?>
		<?php //settings_errors(); ?>
		<div class="wrap">
			<div class="as-page-header">
				<?php 
				echo '<img class="as-dashboard-icon-header" src="' . plugins_url( 'assets/img/icon-96x96.png', dirname(__FILE__) ) . '" > '; 
				_e('Extended Options', 'addonsuite-for-wpadverts'); 
				echo '<a href="https://wpextend.net" target="_blank"><img style="float:right; min-width:100px; margin-left:10px;" class="as-dashboard-icon" src="' . plugins_url( 'assets/img/logo.png', dirname(__FILE__) ) . '" > </a>'; 
				?>
			</div>
			<h2></h2>
			<?php 
			$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'slug_options'; 
       
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } 
			?>
			
			<div class="as-box">
				<div class="as-nav-tab-wrapper">
					<a href="?page=extended-options&tab=slug_options" class="as-nav-tab <?php echo $active_tab == 'slug_options' ? 'as-nav-tab-active' : ''; ?>"><?php _e('Slug Options', 'addonsuite-for-wpadverts'); ?></a>
					<a href="?page=extended-options&tab=submit_options" class="as-nav-tab <?php echo $active_tab == 'submit_options' ? 'as-nav-tab-active' : ''; ?>"><?php _e('Submission Options', 'addonsuite-for-wpadverts'); ?></a>
					<a href="?page=extended-options&tab=display_options" class="as-nav-tab <?php echo $active_tab == 'display_options' ? 'as-nav-tab-active' : ''; ?>"><?php _e('Display Options', 'addonsuite-for-wpadverts'); ?></a>
					<a href="?page=extended-options&tab=search_options" class="as-nav-tab <?php echo $active_tab == 'search_options' ? 'as-nav-tab-active' : ''; ?>"><?php _e('Search Options', 'addonsuite-for-wpadverts'); ?></a>
				</div>
			</div>
			<div class="as-box">		
				<form action='options.php' method='post'>					
					<?php 
					if ( $active_tab == 'slug_options' ) {
						settings_fields( 'adosui_slug_options_pluginpage' ); 
						do_settings_sections( 'adosui_slug_options_pluginpage' );					
					} 
					elseif ( $active_tab == 'submit_options' ) {
						settings_fields( 'adosui_submit_advert_options_pluginpage' ); 
						do_settings_sections( 'adosui_submit_advert_options_pluginpage' ); 
					}  
					elseif ( $active_tab == 'display_options' ) {
						settings_fields( 'adosui_display_advert_options_pluginpage' ); 
						do_settings_sections( 'adosui_display_advert_options_pluginpage' ); 
					}
					elseif ( $active_tab == 'search_options' ) {
						settings_fields( 'adosui_search_advert_options_pluginpage' ); 
						do_settings_sections( 'adosui_search_advert_options_pluginpage' ); 
					}

					submit_button(); 
					?>					
				</form>	
			</div>
		</div>
	<?php }