<?php

class FantasticRestaurantMenu{
	//Need be instantiated if call from Front End, as it'll hold all menu content and settings in memory and avoid call the database multipel times
	
	private $id;
	private $datameta;
	private $settingsmeta;
	public static $settingdefault = array(
				'active_skin' => array(
					'default' => '',
					'validate' => 'text'
				),	
				'menu_currency' => array(
					'default' => '',
					'validate' => 'text'
					),
				'column_count' => array(
					'default' => 1, 
					'validate' => 'int'
				),				
				'column_one_end' => array(
					'default' => '', 
					'validate' => 'text'
				),				
				'column_two_end' => array(
					'default' => '', 
					'validate' => 'text'
				),
				'item_photo_layout' => array(
					'default' => 1,
					'validate' => 'int'
					),
				'section_name_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'section_name_color' => array(
					'default' => '',
					'validate' => 'text'
					),
				'item_name_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'item_name_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'item_description_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'item_description_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'price_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'price_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'menu_bg_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'menu_bg_color' => array(
					'default' => '',
					'validate' => 'color'
					),
				'col_1_bg_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'col_1_bg_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'col_2_bg_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'col_2_bg_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'col_3_bg_color_mode' => array(
					'default' => 'theme default',
					'validate' => 'text'
				),
				'col_3_bg_color' => array(
					'default' => '',
					'validate' => 'color'
				),
				'font_section_title' => array(
					'default' => '',
					'validate' => 'text'
				),
				'font_item_title' => array(
					'default' => '',
					'validate' => 'text'
				),
				'font_item_price' => array(
					'default' => '',
					'validate' => 'text'
				),
				'font_item_description' => array(
					'default' => '',
					'validate' => 'text'
				),
			);

	/**
	 * [__construct description] Only called construct function in Front End b/c in admin side, we want different part of function such as create menu section/create menu item to be callable through Ajax (using as static function)
	 * @param [type] $shortcodeID [description]
	 */
	public function __construct($shortcodeID)
	{
		$this->id = $shortcodeID;

		$this->datameta = FWL_menu_plugin::metabox_decode(get_post_meta($shortcodeID, '_menu_plus_menu_data' , true), true);
		$this->settingsmeta = FWL_menu_plugin::metabox_decode(get_post_meta($shortcodeID, '_menu_plus_menu_settings' , true), true);

	}

	//create menu (Admin side)
	public static function create_menu($menudatameta = '')
	{ 	
		if(is_array($menudatameta))
		{
			$numberofSections = count($menudatameta);
		}else{
			$numberofSections = 0;
		}

		echo '<div id="restaurant-menu-accordion">';	

		
			if ($numberofSections > 0)
			{
				for($s=1; $s<=$numberofSections; $s++)
				{
					self::create_menu_section($menudatameta[$s-1], $s);
				}
				
			}else{ //no previus entries
					self::create_menu_section('', 1);
			}

		echo '</div><!-- end of accordion>-->';

		if ($numberofSections <1){$numberofSections =1;}//calibrate the counter
		echo '<input type="hidden" id="section_count" name="menusection_count" value="'.$numberofSections.'" >';
		echo '<input type="button" class="add-a-menu-section btn btn-success" value="add new menu section">';

		echo '<p class="help-footer">Need help? Click <a target="_blank" href="http://flyingwhalelab.com/fantastic-restaurant-menu-plugin-help-guide/">here</a> to read our online help guide.</p>';
	} 



	//price option(admin page)
	public static function create_price_option($price_option='', $s, $i, $x, $optionClass='notlast')
	{ 
		$s = esc_attr($s);
		$i = esc_attr($i);
		$x = esc_attr($x);
		$optionClass = esc_attr($optionClass);

		$price_option_name = '';
		$price_option_value = '';
		
		if(!empty($price_option))
		{
			$price_option_name = esc_attr($price_option['price-name']);
			$price_option_value = esc_attr($price_option['price-value']);
		}
		?>

		<div class="single-price-option <?php echo $optionClass;?>" id="section_<?php echo $s; ?>_item-<?php echo $i; ?>_price-option-<?php echo $x; ?>">
			<input type="text" name="section_<?php echo $s; ?>_item-<?php echo $i; ?>_price-name-<?php echo $x; ?>" placeholder="option name" value="<?php echo $price_option_name ?>" class="form-control price-option-name">
			<input type="text" name="section_<?php echo $s; ?>_item-<?php echo $i; ?>_price-value-<?php echo $x; ?>" class="form-control item-price-box" placeholder="price" value="<?php echo $price_option_value ?>">
			<input type="button" class="add-price-option btn btn-primary" value="add option">
			<input type="button" class="remove-price-option btn btn-danger" value="delete option">
			<input type="hidden" class="counter" name="" value="<?php echo $x; ?>">
			<input type="hidden" name="section_<?php echo $s; ?>_existcheck_item-<?php echo $i; ?>_option-<?php echo $x; ?>" value="<?php echo $i; ?>">
		</div>	
	<?php } 


	//menu item
	public static function create_menu_item($itemdata="", $i, $s)
	{ 	
		$s = esc_attr($s);
		$i = esc_attr($i);	

		$menuitem_name = '';
		$menuitem_id = uniqid();
		$menuitem_description_textarea = '';
		$menuitem_price='';
		$menuitem_price_type='single';
		$price_options = array();
		$imageURL = '';

		if(count($itemdata) > 1)
		{
			$menuitem_name = esc_attr($itemdata['menuitem_name']);
			if(isset($itemdata['menuitem_id'])){$menuitem_id = esc_attr($itemdata['menuitem_id']);} 
			$menuitem_price = esc_attr($itemdata['menuitem_single_price']);
			$menuitem_description = $itemdata['menuitem_description'];//array
			$menuitem_price_type= esc_attr($itemdata['menuitem_price_type']);
			$price_options = $itemdata['price_options'];//array
			$imageURL = FWL_menu_plugin::process_url_afterDecode($itemdata['menuitem_imageURL']);

			//re-aseemble text area
			if (!empty($menuitem_description))
			{	
				if(is_array($menuitem_description))
				{
					$numberofLines = count($menuitem_description);
					for($l = 0; $l<($numberofLines-1); $l++)
					{
						$menuitem_description_textarea = $menuitem_description_textarea.$menuitem_description[$l] . "\n";
					}	
					
					$menuitem_description_textarea = $menuitem_description_textarea.$menuitem_description[$numberofLines-1];

				}else{
					$menuitem_description_textarea = $menuitem_description;
				}	
			}

			$menuitem_description_textarea = esc_textarea($menuitem_description_textarea);

		}?>

		<div class="menu-item-section" id="section_<?php echo $s;?>_menu-item-<?php echo $i; ?>">
			<div class="item-box">
				<input type="text" name="section_<?php echo $s; ?>_menuitem_name_<?php echo $i; ?>" class="form-control item-name-box" placeholder="Item Name" value="<?php echo $menuitem_name;?>">
				<input type="hidden" name="section_<?php echo $s; ?>_menuitem_id_<?php echo $i; ?>" class="item-name-box" value="<?php echo $menuitem_id;?>">
				<input type="hidden" name="section_<?php echo $s; ?>_menuitem_order_<?php echo $i; ?>" class="item-name-box"  value="<?php echo $menuitem_id;?>">
				<input type="text" name="section_<?php echo $s; ?>_menuitem_price_<?php echo $i; ?>" class="form-control item-price-box" placeholder="price" value="<?php echo $menuitem_price;?>" <?php if($menuitem_price_type == 'multi'){echo 'readonly';} ?>>
				<input type="hidden" class="menuitem_pricetype pricetype_<?php echo $menuitem_price_type;?>" name="section_<?php echo $s; ?>_menuitem_price_type_<?php echo $i; ?>" value="<?php echo $menuitem_price_type;?>">
				
				<div class="toggle-wrap">
					<a href="javascript:;" class="toggler <?php if($menuitem_price_type == 'single'){echo 'off';} ?>">&nbsp;</a>
					<label>multiple prices</label>
				</div>
	
				<div class="media-upload-wrapper">
					<?php	fantasticmenu_WPphotoUpload::uploadButton('section_'.$s.'_photoupload_'.$i, $imageURL); ?>	
				</div>

				<textarea name="section_<?php echo $s; ?>_menuitem_description_<?php echo $i; ?>" class="form-control fantasticmenu-itemdescription" placeholder="(optional) please enter some description for this menu item..."><?php echo $menuitem_description_textarea;?></textarea>	

				<?php //Multi price options box 

				$numberofPriceoptions = count($price_options);

				echo '<div class="price-options-box pricetype_'.$menuitem_price_type.'">';
					if ($numberofPriceoptions > 0)
					{	
						for($x=1; $x<$numberofPriceoptions; $x++)
						{					
							self::create_price_option($price_options[$x-1], $s, $i, $x);
						}
							self::create_price_option($price_options[$x-1], $s, $i, $x, 'last'); //this is when x == number of price options

					}else{ //no previus entries
							self::create_price_option('', $s, $i, 1, 'last');
					}
				echo '</div>';	

				//calibrate the counter
				if ($numberofPriceoptions <1){$numberofPriceoptions =1;}
				?>
				<input type="hidden" id="section_<?php echo $s; ?>_item_<?php echo $i;?>_option_count" name="section_<?php echo $s; ?>_item_<?php echo $i;?>_option_count" value="<?php echo $numberofPriceoptions; ?>"><!--count number of price options-->

				
				<input type="hidden" class="counter" name="" value="<?php echo $i; ?>"><!--Count item number-->
				<input type="hidden" name="section_<?php echo $s; ?>_existcheck_item<?php echo $i;?>" value="<?php echo $i; ?>">
				<input type="hidden" class="item-order-number" name="section_<?php echo $s; ?>_item_<?php echo $i;?>_order_number" value="<?php echo ($i-1); ?>">
				<input type="button" class="delete-item-button btn btn-danger" value="delete item">
			</div>	
		</div>
	<?php }


	//create single menu section (Admin Panel)
	public static function create_menu_section($sectiondata='', $s)
	{
		$s = esc_attr($s);

		$numberofItems = 0;
		$sectionName ='';
		$displayStatus = 'on';

		if(count($sectiondata) > 1)
		{
			$sectionName = $sectiondata['section_name'];
			$numberofItems = count($sectiondata['itemdata']);
			if(isset($sectiondata['displayStatus'])){$displayStatus = esc_attr($sectiondata['displayStatus']);}
		}?>

				<div class="single-menu-section-wrap" id="<?php echo 'section_'.$s;?>_wrapper">
					<h3 class="single-menu-section-header" id="<?php echo 'section_'.$s;?>_header">
						<a class="menu-section-header-toggle <?php if($displayStatus == 'off'){echo 'off';}?>" href="javascript:;">
							<i class="off fa fa-arrow-right"></i>
							<i class="on fa fa-arrow-down"></i></span>
						</a><input type="text" name="<?php echo 'section_'.$s.'_name';?>" placeholder="enter section name here" value="<?php echo $sectionName;?>">
						<a class="delete-this-menu-section" href="javascript:;">
							<i class="fa fa-trash"></i>
						</a>
						<a class="sort-menu-section" href="javascrip:;">
							<i class="fa fa-arrows"></i></span>
						</a>
					</h3>
					<div class="single-menu-section-content" id="<?php echo 'section_'.$s;?>" <?php if($displayStatus == 'off'){echo 'style="display: none;"';}?>>

						<div class="menu-items-wrapper">

						<?php
							//Menu Items
							if ($numberofItems > 0)
							{			
										for($i=1; $i<$numberofItems; $i++)
										{					
											self::create_menu_item($sectiondata['itemdata'][$i-1], $i, $s);
										}
											self::create_menu_item($sectiondata['itemdata'][$i-1], $i, $s, 'last');
							}else{ //no previus entries
									self::create_menu_item('', 1, $s, 'last');
							}

						echo '</div>';

						//calibrate the counter
						if ($numberofItems <1){$numberofItems =1;}
						?>
						<input type="hidden" class="menuitemcount" id="section_<?php echo $s; ?>_menuitemcount" name="section_<?php echo $s; ?>_menuitemcount" value="<?php echo $numberofItems;?>">
						<?php $orderNumber = $s - 1; //as section use array key as counter (for re-order purpose), the lowest s number would be ?>
						<input type="hidden" class="xmlrpc_server_add_introspection_data(server, desc)ction-order-number" name="section_<?php echo $s; ?>_orderNumber" value="<?php echo $orderNumber;?>" >
						<input type="hidden" class="counter" value="<?php echo $s;?>" >
						<input type="hidden" name="section_<?php echo $s; ?>_existcheck" value="true">
						<input type="hidden" class="displayStatus" name="section_<?php echo $s; ?>_displayStatus" value="<?php echo $displayStatus; ?>">

						<input type="button" class="add-new-menu-item" value="add new menu item">
					</div>			
				</div>
	<?php }

	//settings panel
	public static function create_settings_panel($settingsmeta = '', $menudatameta = '')
	{
		$settingvalue = self::$settingdefault;

		//theme default value
		if(isset($settingsmeta['active_skin']) && file_exists (fantasticmenu_PLUGIN_PATH. 'skins/'. $settingsmeta['active_skin'] .'/home.php'))
		{
			include_once fantasticmenu_PLUGIN_PATH. 'skins/'. $settingsmeta['active_skin'] .'/home.php';
		}else{
			include_once fantasticmenu_PLUGIN_PATH. 'skins/default/home.php';
		}


		//saved value(over ride theme default value)
		foreach($settingvalue as $key=>$value)
		{
			$validateType = $value['validate'];

			//universal default value
			$settingvalue[$key] = $value['default'];

			//theme default value
			if(isset($fantasticmenu_theme_default_setting[$key]))
			{
				$settingvalue[$key] = $fantasticmenu_theme_default_setting[$key];
			}

			//saved value
			if(isset($settingsmeta[$key]))
			{
				$settingvalue[$key] = esc_attr(FWL_menu_plugin::validate_value($settingsmeta[$key], $validateType));
			}
		}

		echo '<h3>General Settings</h3>';

		//theme selection
		echo '<section class="setting-item">';
			echo '<label>Choose menu theme</label>';
			echo '<select class="active_skin" name="active_skin">';
				self::get_theme_list_as_options($settingvalue['active_skin']);
			echo '</select>';
		echo '</section>';

		//currency symbol
		echo '<section class="setting-item">';
			echo '<label>Currentcy symbol</label>';
			echo '<input type="text" name="menu_currency" placeholder="e.g. $" value="'.$settingvalue['menu_currency'].'">';
		echo '</section>';	

		//photo layout
		echo '<h3>Menu Item Photo Layout</h3>';
		echo '<section class="setting-item">';

			$checked = array();
			$checked[1] = '';
			$checked[2] = '';
			$checked[0] = '';

			$checked[$settingvalue['item_photo_layout']] = 'checked="checked"';


			echo '<input type="radio" name="item_photo_layout" value="1" '.$checked[1].'> Show photo above item<br>';
			echo '<input type="radio" name="item_photo_layout" value="2" '.$checked[2].'> Show photo below item<br>';
  			echo '<input type="radio" name="item_photo_layout" value="0" '.$checked[0].'> Do not show photos';
		echo '</section>';	


		echo '<h3>Menu Column Layout</h3>';
		//Set Number of Columns
		echo '<section class="setting-item">';
			echo '<label>Page layout</label>';
			echo '<select name="column_count" id="set-number-of-columns">';
				$number_of_columns = array(1, 2, 3);

				foreach($number_of_columns as $option)
				{
					$select_status = '';
					$plural = '';

					if($settingvalue['column_count'] == $option){$select_status = 'selected';}
					if($option != 1){$plural = 's';}	
					echo '<option value="'.$option.'" '.$select_status.'>'.$option.' column'.$plural.'</option>';
				}	
			echo '</select>';
		echo '</section>';

		//Set Where to Break the columns
		$warningMsg = '';
		$disabled = '';
		if(empty($menudatameta))
		{
			$warningMsg = '<p>Please save the menu entires first before configure the columns</p>';
		}	
		$column_one_end_style = 'display:none;';	
		$column_two_end_style = 'display:none;';	

		if(isset($settingvalue['column_count']))
		{
			if($settingvalue['column_count'] == 2)
			{
				$column_one_end_style = 'display:block;';
			}

			if($settingvalue['column_count'] == 3)
			{
				$column_one_end_style = 'display:block;';
				$column_two_end_style = 'display:block;';
			}

		}

		echo '<div id="column-configureation-wrapper">';	
			echo $warningMsg;

			//1st Column end
			echo '<div id="column-one-end-configuration" style="'.$column_one_end_style.'">';	
				echo '<section class="setting-item" id="first-column-ends">';
					echo '<label>First column ends after</label>';
					echo '<select name="column_one_end">';
						echo '<option>Auto</option>';
						echo '<option disabled>──────</option>';
						
						if(!empty($menudatameta))
						{
							foreach ($menudatameta as $menusection)
							{
								echo '<optgroup label="'.$menusection["section_name"].'">';

									foreach ($menusection["itemdata"] as $menuItem)
									{
										$select_status = '';
										if(isset($settingsmeta['column_one_end']))
										{	
											if( $settingsmeta['column_one_end'] == $menuItem['menuitem_id']){$select_status = 'selected';}
										}
										if(isset($menuItem['menuitem_id']) && isset($menuItem['menuitem_name']))
										{	
											echo '<option value="'.$menuItem['menuitem_id'].'" '.$select_status.'>'.$menuItem['menuitem_name'].'</option>';
										}
									}	

								echo '</optgroup>';
							}
						}

					echo '</select>';
				echo '</section>';
			echo '</div>';

			//2nd Column end
			echo '<div id="column-two-end-configuration" style="'.$column_two_end_style.'">';	
				echo '<section class="setting-item" id="second-column-ends">';
					echo '<label>Second column ends after</label>';
					echo '<select name="column_two_end" '.$disabled.'>';
						echo '<option>Auto</option>';
						echo '<option disabled>──────</option>';
						
						if(!empty($menudatameta))
						{
							foreach ($menudatameta as $menusection)
							{
								echo '<optgroup label="'.$menusection["section_name"].'">';

									foreach ($menusection["itemdata"] as $menuItem)
									{
										$select_status = '';
										if(isset($settingsmeta['column_two_end']))
										{	
											if( $settingsmeta['column_two_end'] == $menuItem['menuitem_id']){$select_status = 'selected';}
										}
											if(isset($menuItem['menuitem_id']) && isset($menuItem['menuitem_name']))
											{	
												echo '<option value="'.$menuItem['menuitem_id'].'" '.$select_status.'>'.$menuItem['menuitem_name'].'</option>';
											}
									}	

								echo '</optgroup>';
							}
						}
					echo '</select>';
				echo '</section>';
			echo '</div>';	
		echo '</div>';//end of column configuration wrapper

		echo '<h3>Color and Background</h3>';

		$slug = 'section_name_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], 'Section name color', $slug);

		$slug = 'item_name_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], 'Item name color', $slug);		

		$slug = 'item_description_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], 'Item description color', $slug);

		$slug = 'price_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], 'Price color', $slug);	

		$slug = 'menu_bg_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], 'Menu Overall Background color', $slug);

		$slug = 'col_1_bg_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], '1st Column Background Color', $slug);

		$slug = 'col_2_bg_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], '2nd Column Backgrond Color', $slug);		

		$slug = 'col_3_bg_color';
		echo self::build_color_option_html($settingvalue[$slug. '_mode'], $settingvalue[$slug], '3rd Column Background Color', $slug);	

		echo '<h3>Font</h3>';

		$slug = 'font_section_title';
		echo self::build_font_option_html($settingvalue[$slug], 'Section Title Font', $slug);

		$slug = 'font_item_title';
		echo self::build_font_option_html($settingvalue[$slug], 'Menu Item Name Font', $slug);

		$slug = 'font_item_price';
		echo self::build_font_option_html($settingvalue[$slug], 'Menu Item Price and Price Option Font', $slug);

		$slug = 'font_item_description';
		echo self::build_font_option_html($settingvalue[$slug], 'Menu Item Description Font', $slug);
	}

	private static function build_color_option_html($theme_customize_mode = 'theme default', $customize_color_value = '', $label, $slug)
	{
		$label = esc_html($label);
		$slug = esc_attr($slug);
		$customize_color_value =  FWL_menu_plugin::validate_value($customize_color_value, 'color');

		if($theme_customize_mode === 'theme default')
		{
			$toggle_mode = 'off';
		}else{
			$toggle_mode = '';
		}

		$html 	= 	'<section class="setting-item setting-color '.$toggle_mode.'">
						<label>'.$label.'</label>
				 			<div class="toggle-wrap">
							<a href="javascript:;" class="toggler  '.$toggle_mode.'">&nbsp;</a>
							<label>'.$theme_customize_mode.'</label>
						</div>
						<input type="hidden" class="hidden-input-for-switch" name="'.$slug.'_mode" value="'.$theme_customize_mode.'">
						<input type="text" name="'.$slug.'" class="colorpicker" value="'.$customize_color_value.'">
					</section>';

		return $html;
	}


	private static function build_font_option_html($font_value = '', $label, $slug)
	{
		$label = esc_html($label);
		$slug = esc_attr($slug);	

		$font_list = array(
			'(inherit theme)',
			'Arial',
			'Arial Black',
			'Book Antiqua',
			'Charcoal',
			'Courier',
			'Courier New',
			'Gadget',
			'Geneva',
			'Georgia',
			'Helvetica',
			'Impact',
			'Lucida Console',
			'Lucida Grande',
			'Lucida Sans Unicode',
			'Monaco',
			'Palatino',
			'Palatino Linotype',
			'Tahoma',
			'Times',
			'Times New Roman',
			'Trebuchet MS',
			'Verdana',
		);	

		$html 	= 	'<section class="setting-item setting-font">
						<label>'.$label.'</label>
							<select name="'.$slug.'">';

					foreach($font_list as $font_option)
					{
						$html .= '<option value="' . $font_option . '"';
						
						if($font_value === $font_option)
						{
							$html .= 'selected="selected"';
						}	

						$html .= '>'. $font_option . '</option>';
					}		

		$html 	.= 	'	</select>';

		$html 	.= '<a class="skin-default" href="javascript:;">use skin default</a>';

		$html 	.= 	'</section>';

		return $html;
	}


	private static function get_theme_list_as_options($activeThemeSlug)
	{
		$themeList = FWL_menu_plugin::get_filenames_in_directory(fantasticmenu_PLUGIN_PATH. '/skins');

		foreach($themeList as $themeSlug)
		{
			$select_status = '';
			if($activeThemeSlug == $themeSlug){$select_status = 'selected';} 	

			$themeInfo = json_decode(file_get_contents(fantasticmenu_PLUGIN_PATH. '/skins/'.$themeSlug.'/info.json'), true);
		
			$themeName = $themeInfo['Name'];

			echo '<option value="'.$themeSlug.'" '.$select_status.'>'.$themeName.'</option>';

		}	
	}



	/**
	 * [Front End] Display Menu
	 *
	 * By default, this only get called when in plugin mode
	 */
	public function display_menu() 
	{
		//incase a theme is removed
		if(file_exists (fantasticmenu_PLUGIN_PATH. 'skins/'.$this->settingsmeta['active_skin'].'/home.php')){
			include_once fantasticmenu_PLUGIN_PATH. 'skins/'.$this->settingsmeta['active_skin'].'/home.php';
		}else{
			include_once fantasticmenu_PLUGIN_PATH. 'skins/default/home.php';
		}

		//this function is in the theme file
		fantasticmenu_show_menu_by_theme($this->id,  $this->datameta, $this->settingsmeta, $fantasticmenu_theme_default_setting);

		wp_enqueue_style( 'fantasticmenu-bootstrap-grid-CSS', fantasticmenu_PLUGIN_URL . '/resources/css/bootstrap-grid.css' );

		if(!defined('NOT_LOAD_DEFAULT_CSS'))
		{
			wp_enqueue_style( 'fwl-restaurant-menu-default-front-css', fantasticmenu_PLUGIN_URL . '/resources/css/default-front.css');
		}

		if(file_exists(fantasticmenu_PLUGIN_PATH. 'skins/'.$this->settingsmeta['active_skin'].'/plugin-theme-style.css'))
		{
			wp_enqueue_style( 'fwl-restaurant-menu-theme-style-css', fantasticmenu_PLUGIN_URL. '/skins/'.$this->settingsmeta['active_skin'].'/plugin-theme-style.css');
		}
	}


	//for the front end
	public static function display_default_menu_html($shortcodeID, $datameta, $settingsmeta, $fantasticmenu_theme_default_setting = '')
	{
		$currencySign = '';
		$column_count = 1;

		if(isset($settingsmeta['menu_currency'])){$currencySign = esc_html($settingsmeta['menu_currency']);}
		if(isset($settingsmeta['column_count'])){$column_count = FWL_menu_plugin::validate_value($settingsmeta['column_count'], 'int');}
		
		$colors = array(
			'section_name_color' => '',
			'item_name_color' => '',
			'item_description_color' => '',
			'price_color' => '',
			'menu_bg_color' => '',
			'col_1_bg_color' => '',
			'col_2_bg_color' => '',
			'col_3_bg_color' => '',
		);

		foreach($colors as $key => $color_css)
		{
			if($settingsmeta[ $key. '_mode'] === 'theme default')
			{
				if(isset($fantasticmenu_theme_default_setting[$key]))
				{
					$colors[$key] = 'color:'.$fantasticmenu_theme_default_setting[$key].';';
				}
			}else{//customize color
				if(isset($settingsmeta[$key])){
					$colors[$key] = 'color:'. FWL_menu_plugin::validate_value($settingsmeta[$key], 'color').';';
				}
			}			
		}



		$htmlItems = array();

		write_log($datameta);

		foreach($datameta as $menusection)
		{
			$header = array();
			$header['id'] = 'section_header';
			$header['html'] = '<h3 style="'. esc_attr($colors['section_name_color']).' font-family:'. esc_attr($settingsmeta['font_section_title']).';">'. esc_html($menusection['section_name']).'</h3>';
			array_push($htmlItems, $header);


			//print an item, keep it together	
			foreach($menusection['itemdata'] as $menuitem)
			{	
				$item = self::build_menu_item_html($menuitem, $colors['item_name_color'], $colors['item_description_color'], $colors['price_color'], $settingsmeta);
				array_push($htmlItems, $item);
			}	
		}

		$col_1_bg_default = '';
		$col_2_bg_default = '';
		$col_3_bg_default = '';

		if($settingsmeta['col_1_bg_color_mode'] === 'theme default'){ $col_1_bg_default = 'ftm_col_1_bg_theme_default'; }
		if($settingsmeta['col_2_bg_color_mode'] === 'theme default'){ $col_2_bg_default = 'ftm_col_2_bg_theme_default'; }
		if($settingsmeta['col_3_bg_color_mode'] === 'theme default'){ $col_3_bg_default = 'ftm_col_3_bg_theme_default'; }

		echo '<div class="fantasticmenu_restaurant_menu fwl_resmenu '.$col_1_bg_default.' '.$col_2_bg_default.' '.$col_3_bg_default.'" id="fantasticmenu_menu_'. FWL_menu_plugin::validate_value($shortcodeID, 'int') .'" style="background-'. esc_attr($colors['menu_bg_color']).'">';
			echo '<div class="container-fluid">';

				echo '<div class="row">';

					$itemCount = count($htmlItems);

					switch ($column_count)
					{
						case 1:
							echo '<div class="col-md-12" style="background-'. esc_attr($colors['col_1_bg_color']) .'">';
								foreach($htmlItems as $htmlItem)
								{
									echo $htmlItem['html'];
								}	
							echo '</div>';
							break;

						case 2:	
							echo '<div class="col-md-6" style="background-'. esc_attr($colors['col_1_bg_color']) .'">';
							for($i = 0; $i < $itemCount; $i++)
							{
								echo $htmlItems[$i]['html'];

								if(!empty($settingsmeta['column_one_end'])&&($settingsmeta['column_one_end'] != 'Auto'))
								{	
									if($htmlItems[$i]['id'] == $settingsmeta['column_one_end'])
									{
										echo '</div>';

										echo '<div class="col-md-6" style="background-'. esc_attr($colors['col_2_bg_color']).'">';
									}	

								}elseif($i == intval($itemCount/2))
								{
									echo '</div>';
									echo '<div class="col-md-6" style="background-'. esc_attr($colors['col_2_bg_color']).'">';
								}


							}
							echo '</div>';
							break;	
							
						case 3:	
							echo '<div class="col-md-4" style="background-'. esc_attr($colors['col_1_bg_color']).'">';

								for($i = 0; $i < $itemCount; $i++)
								{
									echo $htmlItems[$i]['html'];

									//First Column Break
									if(!empty($settingsmeta['column_one_end'])&&($settingsmeta['column_one_end'] != 'Auto'))
									{	
										if($htmlItems[$i]['id'] == $settingsmeta['column_one_end'])
										{
											echo '</div>';
											echo '<div class="col-md-4" style="background-'. esc_attr($colors['col_2_bg_color']) .'">';
										}	

									}elseif($i == intval($itemCount/3))
									{
										echo '</div>';
										echo '<div class="col-md-4" style="background-'. esc_attr($colors['col_2_bg_color']).'">';
									}

									//Second Column Break
									if(!empty($settingsmeta['column_two_end'])&&($settingsmeta['column_two_end'] != 'Auto'))
									{	
										if($htmlItems[$i]['id'] == $settingsmeta['column_two_end'])
										{
											echo '</div>';
											echo '<div class="col-md-4" style="background-'.esc_attr($colors['col_3_bg_color']).'">';
										}	

									}elseif($i == 2*intval($itemCount/3))
									{
										echo '</div>';
										echo '<div class="col-md-4" style="background-'. esc_attr($colors['col_3_bg_color']).'">';
									}
								}
							
							echo '</div>';
							break;	
					}
					
				echo '</div><!--end of row-->';	
			echo '<div><!--end of container-->';	
		echo '</div><!--end of fantasticmenu_restaurant_menu-->';

	}

	//For front end display
	private static function build_menu_item_html($menuitem, $item_name_color = '', $item_description_color = '', $price_color ='', $settingsmeta)
	{
		$item = array();
		$item['html'] = '';

		if(!empty($menuitem['menuitem_imageURL']) && $settingsmeta['item_photo_layout'] == 1)
		{
			$item_image_url = site_url(). $menuitem['menuitem_imageURL'];
			$item['html'] .=  	'<div class="fantasticmenu_item_image">
									<img src="'. esc_attr($item_image_url).'" alt="'. esc_attr($menuitem['menuitem_name']).'">
								</div>';
		}

			$item['html'] .=  	'<div class="fantasticmenu_item">'.
									'<div class="fantasticmenu_item_header_row clearfix">'.	
										'<span class="fantasticmenu_itemname" style="'. esc_attr($item_name_color).'">'. esc_attr($menuitem['menuitem_name']).'</span>'.
										'<span class="fantasticmenu_price">';

										if($menuitem['menuitem_price_type'] === 'single')
										{
											$item['html'] .= '<span class="price-value" style="'. esc_attr($price_color).'">' . esc_html($settingsmeta['menu_currency']).' '. esc_html($menuitem['menuitem_single_price']) . '</span>';
										}else{
											foreach($menuitem['price_options'] as $price_option)
											{
												$item['html'] .= '<span class="price-value" style="'. esc_attr($price_color) .'">' . esc_html($settingsmeta['menu_currency']). ' ' . esc_html($price_option['price-value']) . '</span> <span class="price-option-name" style="'. esc_attr($item_name_color) .'">' . esc_html($price_option['price-name']) . '</span><br>';
											}		
										}							


			$item['html'] .= 			'</span>'.
								  	'</div>';

		$item['id']	= $menuitem['menuitem_id'];		  	
					  	
		if (!FWL_menu_plugin::is_empty_value_array($menuitem['menuitem_description']))
		{
			$item['html'] .=    	'<div class="fantasticmenu-itemdescription">'.
						 				'<p style="'.esc_attr($item_description_color).'">'.self::prep_menu_description_for_html($menuitem['menuitem_description']).'</p>'.
					 				'</div>';
		}


		if(!empty($menuitem['menuitem_imageURL']) && $settingsmeta['item_photo_layout'] == 2)
		{
			$item_image_url = site_url(). $menuitem['menuitem_imageURL'];
			$item['html'] .=  	'<div class="fantasticmenu_item_image">
									<img src="'.esc_attr($item_image_url).'">
								</div>';
		}



		$item['html'] = $item['html']. '</div>'; //end of item wrapper class="fantasticmenu_item"

		return $item;

	}


	//this is ncessary to allow save of new lines in description text box
	private static function prep_menu_description_for_html($menuitem_description)
	{	
		$menuitem_description_html = '';
		if (!empty($menuitem_description))
		{
			foreach ($menuitem_description as $line)
			{
				$menuitem_description_html = $menuitem_description_html. esc_html($line) . "<br>";
			}	
		}
		return $menuitem_description_html;
	}
}