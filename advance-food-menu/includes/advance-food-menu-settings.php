<?php 

//Add Advance Food Menu In Settings Options
function advance_food_menu_options(){
	 add_submenu_page('edit.php?post_type=menu-item', 'Event settings', 'Settings', "manage_options", 'settings', 'advance_food_menu_options_cb', '');
}
add_action('admin_menu','advance_food_menu_options');

//News Ticker Callback Function

function advance_food_menu_options_cb(){
	echo "<div class='wrap'>";
	echo "<h1>Advance Food Menu Options</h1>";
	settings_errors('newsticker_options');
	?>
	<form action="options.php" method="post">
		<?php 
			settings_fields( 'tickers_groups' ); 
			do_settings_sections( 'afm_settings' );
		?>
		<?php submit_button();?>
	</form>
	<?php
	echo "</div>";
	?>
	
	
	<table class="form-table">
		<h1>Documentation For Advance Food Menu Plugin</h1>
		<h3>Your Just Put This Shortcode Any Where Our Below Shortcode <b style="color:red;font-size:20px;padding:3px">[afm_shortcode]</b></h3>
	</table>
	<?php
}


/*Setting a Option Add */

function advance_food_menu_options_input(){
	register_setting('tickers_groups','afm_currency_symbol');
	register_setting('tickers_groups','afm_disable_thum');
	add_settings_section('ticker_option',' ','advance_food_menu_options_secction','afm_settings');
	
	add_settings_field('afm_currency_symbol','Currency symbol:','advance_food_menu_currency_symbol','afm_settings','ticker_option');
	add_settings_field('afm_disable_thum','Disable thumbnail images ?:','advance_food_menu_disable_thum','afm_settings','ticker_option');
	
	
}
add_action('admin_init','advance_food_menu_options_input');

function advance_food_menu_currency_symbol(){
	$afm_currency_symbol = get_option('afm_currency_symbol');
	?>
	<input type="text" name="afm_currency_symbol" value="<?php afm_ifelse($afm_currency_symbol,'$');?>" id="" />
	<?php
}

function advance_food_menu_disable_thum(){
	$afm_disable_thum = get_option('afm_disable_thum');
	?>
	<input type="checkbox" name="afm_disable_thum" value="off" <?php checked('off',get_option('afm_disable_thum'),true);?> id=""/>
	<?php
}

function advance_food_menu_options_secction(){
	return;
}

//My function
function afm_ifelse($cond,$text){
	if($cond){
		echo $cond;
	}
	else{
		echo $text;
	}
}