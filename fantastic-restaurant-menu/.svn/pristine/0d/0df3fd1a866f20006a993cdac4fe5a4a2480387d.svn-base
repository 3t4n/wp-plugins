<?php

function fantasticmenu_add_metabox() {
	global $post;
    add_meta_box(
           'new-fantastic-restaurant-menu', //$post->ID, 
           'Edit restaurant menu', //$post->post_title 
           'fantasticmenu_meta_box_callback' , // $callback
           'fantasticmenu_menu', // $post type
           'normal', // context
           'high'
           ); 
}
add_action( 'add_meta_boxes', 'fantasticmenu_add_metabox');


function fantasticmenu_meta_box_callback( $post ){

	$menudatameta = FWL_menu_plugin::metabox_decode(get_post_meta($post->ID, '_menu_plus_menu_data' , true), true);

	$settingsmeta = FWL_menu_plugin::metabox_decode(get_post_meta($post->ID, '_menu_plus_menu_settings' , true), true);


	wp_nonce_field( 'fantasticmenu_save_meta_box_data', 'myplugin_meta_box_nonce' ); ?>
	
		<form>
			<div id="fantasticmenu-admintabs">
			  	<ul>
				    <li><a href="#tabone">Menu Conttent</a></li>
				    <li><a href="#tabtwo">Menu Design and Settings</a></li>
				</ul>
				<div id="tabone">
					<?php FantasticRestaurantMenu::create_menu($menudatameta); //menu data ?>	
				</div>
				<div id="tabtwo">
					<?php FantasticRestaurantMenu::create_settings_panel($settingsmeta, $menudatameta); //menu data ?>
				</div>
			</div>
		</form>
<?php 
}


//Metabox Save Function
function fantasticmenu_save_meta_box_data( $post_id ) 
{		
	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'fantasticmenu_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'glab_price_table' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['menusection_count'] ) ) {
		return;
	}


	// Sanitize user input.
	$menu_section_count = FWL_menu_plugin::validate_value($_POST['menusection_count'], 'int');
	
	$save_meta = array();

	//loop through sections
	for ($s = 1; $s<=$menu_section_count; $s++)
	{	
		if(isset($_POST['section_'.$s.'_existcheck']))
		{	

			$menu_section = array();
			// $menu_section['section_name'] = esc_html($_POST['section_'.$s.'_name']);
			$menu_section['section_name'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_name']);
			$order_number = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_orderNumber'], 'int');
			$menu_section['displayStatus'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_displayStatus'], 'switch');
			$menu_section['itemdata'] = array();


			$menu_item_count = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitemcount'], 'int');

			//loop through itmes in a single section
			for ($i = 1; $i<=$menu_item_count; $i++) 
			{	

				if(isset($_POST['section_'.$s.'_existcheck_item'.$i]))//check if the items is deleted
				{
					$menu_item = array();
					$menu_item['menuitem_name'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitem_name_'.$i]);
					$menu_item['menuitem_id'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitem_id_'.$i]);
					$item_order_number = FWL_menu_plugin::validate_value($_POST['section_' . $s . '_item_' . $i . '_order_number'], 'int');
					
					
					//Reserve line breaks in text area
					$menuitemdescription = preg_replace("!\r?\n!", "<br>", FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitem_description_'.$i]));
					$menu_item['menuitem_description'] = explode("<br>", $menuitemdescription);

					//validate as text, to allow price like 'seasonal', 'free' etc.
					$menu_item['menuitem_single_price'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitem_price_'.$i]);
					$menu_item['menuitem_price_type'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_menuitem_price_type_'.$i], 'pricetype');

					$menu_item['menuitem_imageURL'] = FWL_menu_plugin::process_url_beforeEncode($_POST['section_'.$s.'_photoupload_'.$i]);
					
					$menu_item['price_options'] = array();
					
					$pirce_option_count = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_item_'.$i.'_option_count'], 'int');

					//Price options
					for ($x = 1; $x<=$pirce_option_count; $x++)
					{	
						if(isset($_POST['section_'.$s.'_existcheck_item-'.$i.'_option-'.$x]))//check if the items is deleted
						{
							$option_item = array();
							$option_item['price-name'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_item-'.$i.'_price-name-'.$x]);
							$option_item['price-value'] = FWL_menu_plugin::validate_value($_POST['section_'.$s.'_item-'.$i.'_price-value-'.$x]);

							if((!empty($option_item['price-name'])) || !empty($option_item['price-value']))
							{
								array_push($menu_item['price_options'], $option_item);
							}
						}

					}//end of for loop for saving all price option data

					if((!empty($menu_item['menuitem_name'])) || !empty($menu_item['menuitem_single_price']) || !empty($menu_item['menuitem_description'])){	
						$menu_section['itemdata'][$item_order_number] = $menu_item;
					}
				}//end of check if item exists/deleted

			}//end of looping all items within a section

			//re-order item orders so that deleted items will not cause array key order number to be discrete
			$menu_section['itemdata re-ordered'] = array();

			for($i = 0; $i <= $menu_item_count; $i++)
			{
				if(isset($menu_section['itemdata'][$i]))
				{
					array_push($menu_section['itemdata re-ordered'], $menu_section['itemdata'][$i]);
				}
			}

			$menu_section['itemdata'] = $menu_section['itemdata re-ordered'];
			unset($menu_section['itemdata re-ordered']);


			if((!empty($menu_section['itemdata'])) || !empty($menu_section['section_name']))
			{
				$save_meta[$order_number] = $menu_section;
			}
		}//end of menu section exists/deleted check
	}//end of each menu section	

	//re-order section orders to avoid discrete  array key order 
	$save_meta_re_ordered = array();

	for ($s = 0; $s<=$menu_section_count; $s++)
	{				
		if(isset($save_meta[$s]))
		{
			array_push($save_meta_re_ordered, $save_meta[$s]);
		}
	}

	$save_meta = $save_meta_re_ordered;

	$save_meta = FWL_menu_plugin::metabox_encode($save_meta); 

	//by default update_post_meta will strip slashes, which will cause special letters such as "latin capital letter e with acute" 
	//not stored properly as uniqucode. (for example, the correct format to store for É woudl be \u00c9)
	update_post_meta( $post_id, '_menu_plus_menu_data', wp_slash($save_meta ));

	//Settings tab
	$save_settings = array();

	//hard coded settings option
		
	$settings = FantasticRestaurantMenu::$settingdefault;


	foreach($settings as $key=>$setting_field)
	{
		$save_settings[$key] = FWL_menu_plugin::validate_value($_POST[$key], $setting_field['validate']);
	}

	
	$save_settings = FWL_menu_plugin::metabox_encode($save_settings); 
	update_post_meta( $post_id, '_menu_plus_menu_settings', wp_slash($save_settings ));
}

add_action( 'save_post', 'fantasticmenu_save_meta_box_data' );




//This is for display restaurant menu short code on the right side bar
function fantasticmenu_add_shortcode_metabox() {
	global $post;
    add_meta_box(
           'new-fantastic-restaurant-menu-shortcode', //$post->ID,
           'Restaurant Menu Shortocde', //$post->post_title // $title
           'fantasticmenu_shortcode_meta_box_callback' , // $callback
           'fantasticmenu_menu', // $post type
           'side', // context
           'default' // priority
           ); 
}
add_action( 'add_meta_boxes', 'fantasticmenu_add_shortcode_metabox');


function fantasticmenu_shortcode_meta_box_callback( $post ){

	echo '<p>[fantasticmenu_menu id="'.$post->ID.'"]</p>';

}