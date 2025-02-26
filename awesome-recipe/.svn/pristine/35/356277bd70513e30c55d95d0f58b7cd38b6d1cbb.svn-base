<?php

/**
*
* Settings page ( Admin area )
* 
*@package AwesomeRecipePlugin
*/



function arpcpt_awesome_recipe_settings_panel(){

	global  $wpdb;

	// Getting row data

	$arpcpt_styles = $wpdb->get_row(
						"SELECT * FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_styles`
						ORDER BY id DESC LIMIT 1"
						); 


	// Storing data into an array

	foreach ($arpcpt_styles as $key => $arpcpt_style) {

	}

?>

<div class="wrap">

<!-- Display Success message on save-->
<div id="success"></div>


<!-- Setting UI for Action link page -->


<h3>Recipe Settings</h3>
	<hr>
	<h4>How to display your recipe posts to any page ?</h4>
	<h5>Simply place this shortcode <span style="color:#d80027; font-size: 18px;">[arpcpt_recipe]</span> to any page to display your recipe posts.</h5>
<br>
	<h4>Customize single recipe post</h4>
	<hr>
<form method="post" action="">


	<!-- Nonce -->
	<?php 
	$arpcpt_awesome_recipe_settings_data_nonce = wp_create_nonce('arpcpt_awesome_recipe_settings_data_nonce');
	?>
	
	<input type="hidden" name="arpcpt_awesome_recipe_nonce" value='<?php echo  $arpcpt_awesome_recipe_settings_data_nonce; ?>'>

	<!-- INPUTS -->
	<label>Icon Color</label><br>
	<input class="color-field"  type="text" name="arpcpt_icon_color" value='<?php echo  esc_html ( $arpcpt_styles->arpcpt_icon_color ); ?>'><br>

	<label>Header Background Color</label><br>
	<input class="color-field" type="text" name="arpcpt_header_background" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_header_background ); ?>'><br>

	<label>Header Font Size</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_header_font_size" value='<?php echo  esc_html ( $arpcpt_styles->arpcpt_header_font_size ); ?>'><em> px</em><br><br>

	<label>Header Font Style</label><br>
    <select name="arpcpt_header_font_style">
		
        <option value="Select">Select</option>
       

        <option value="uppercase" 

          <?php 
          if ($arpcpt_styles->arpcpt_header_font_style) { // checks if array key exists
                if ($arpcpt_styles->arpcpt_header_font_style =="uppercase"){ // check if it matches with array index data or not
                echo "SELECTED";  
                }
            }
          ?>

        >UPPERCASE</option>


        <option value="lowercase" 

          <?php  
          if ($arpcpt_styles->arpcpt_header_font_style) {
                if ( $arpcpt_styles->arpcpt_header_font_style =="lowercase"){
                    echo "SELECTED";  
                }
            }
         ?>

         >lowercase</option>

         <option value="capitalize"

         <?php 
            if ($arpcpt_styles->arpcpt_header_font_style) {
                if ($arpcpt_styles->arpcpt_header_font_style =="capitalize"){
                    echo "SELECTED";  
                }
            }
         ?>

         >Capitalize</option>

    </select><br><br>


	<label>Header Font Color</label><br>
	<input class="color-field" type="text" name="arpcpt_header_font_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_color ); ?>'><br>

	<label>List font size</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_list_font_size" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_list_font_size ); ?>'><em> px</em><br><br>


	<h4>Customize your [recipe] page</h4>
	<hr>
	<label>Number Of Posts To Display</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_recipe_card_number_of_posts" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_number_of_posts ); ?>'><br><br>

	<label>Recipe Card Background</label><br>
	<input class="color-field" type="text" name="arpcpt_recipe_card_background_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_background_color ); ?>'><br>

	<label>Recipe Card Width</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_recipe_card_width" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_width ); ?>'><em> %</em><br><br>

	<label>Recipe Card Height</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_recipe_card_height" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_height ); ?>'><em> px</em><br><br>

	<label>Recipe Card Title Color</label><br>
	<input class="color-field" type="text" name="arpcpt_recipe_card_title_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?>'><br>

	<label>Recipe Card Title Font Size</label><br>
	<input class="arpcpt_awesome-recipe-settings" type="number" name="arpcpt_recipe_card_title_font_size" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_title_font_size ); ?>'><em> px</em><br><br>

	<label>Recipe Card Title Font Style</label><br>
    <select name="arpcpt_recipe_card_title_font_style">
		
        <option value="Select">Select</option>
       

        <option value="uppercase" 

          <?php 
          if ($arpcpt_styles->arpcpt_recipe_card_title_font_style) { // checks if array key exists
                if ($arpcpt_styles->arpcpt_recipe_card_title_font_style =="uppercase"){ // check if it matches with array index data or not
                echo "SELECTED";  
                }
            }
          ?>

        >UPPERCASE</option>


        <option value="lowercase" 

          <?php  
          if ($arpcpt_styles->arpcpt_recipe_card_title_font_style) {
                if ( $arpcpt_styles->arpcpt_recipe_card_title_font_style =="lowercase"){
                    echo "SELECTED";  
                }
            }
         ?>

         >lowercase</option>

         <option value="capitalize"

         <?php 
            if ($arpcpt_styles->arpcpt_recipe_card_title_font_style) {
                if ($arpcpt_styles->arpcpt_recipe_card_title_font_style =="capitalize"){
                    echo "SELECTED";  
                }
            }
         ?>

         >Capitalize</option>

    </select><br><br>

	<label>Recipe Card Border Color</label><br>
	<input class="color-field" type="text" name="arpcpt_recipe_card_border_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_border_color ); ?>'><br>

	<label>Recipe Card "Read More" link color</label><br>
	<input class="color-field" type="text" name="arpcpt_read_more_link_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_read_more_link_color ); ?>'><br>

	<label>Recipe Card text color</label><br>
	<input class="color-field" type="text" name="arpcpt_recipe_card_excerpt_text_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_recipe_card_excerpt_text_color ); ?>'><br>

	<label>Recipe Card Pagination Background color</label><br>
	<input class="color-field" type="text" name="arpcpt_pagination_background_color" value='<?php echo esc_html ( $arpcpt_styles->arpcpt_pagination_background_color ); ?>'><br><br>


	<input type="submit" class="button button-primary button-large" name="arpcpt_custom_settings" value="Save">
</form>

<!-- LOAD DEFAULT SETTINGS-->
<form name="load-default-settings"  method="post" action="">
	<!-- Nonce -->
	<?php 
	$arpcpt_awesome_recipe_default_settings_data_nonce = wp_create_nonce('arpcpt_awesome_recipe_default_settings_data_nonce');
	?>
	
	<input type="hidden" name="arpcpt_awesome_recipe_default_nonce" value='<?php echo $arpcpt_awesome_recipe_default_settings_data_nonce; ?>'>

    <input style="float:right;" class="button button-primary button-large" type="submit" name="arpcpt_default_style" value="Load Default Settings">
</form>
<!-- END LOAD DEFAULT SETTINGS-->

</div>






<?php

	// Do security check

	if ( isset( $_POST['arpcpt_custom_settings'] ) ) {

		if( current_user_can('editor') || current_user_can('administrator') ){
			
		}else{
			return;
		}

		if ( ! wp_verify_nonce( $_POST['arpcpt_awesome_recipe_nonce'], 'arpcpt_awesome_recipe_settings_data_nonce' ) ) {
        return;
    	}

    // Sanitizing input fields

    $arpcpt_header_background = sanitize_text_field ( $_POST['arpcpt_header_background'] );
    $arpcpt_header_font_size = sanitize_text_field ( $_POST['arpcpt_header_font_size'] );
    $arpcpt_header_font_size = intval($arpcpt_header_font_size);
    $arpcpt_header_font_style = sanitize_text_field ( $_POST['arpcpt_header_font_style'] );
    $arpcpt_header_font_color = sanitize_text_field ( $_POST['arpcpt_header_font_color'] );
    $arpcpt_icon_color = sanitize_text_field ( $_POST['arpcpt_icon_color'] );
    $arpcpt_list_font_size = sanitize_text_field ( $_POST['arpcpt_list_font_size'] );
    $arpcpt_list_font_size = intval($arpcpt_list_font_size);
    $arpcpt_recipe_card_title_color = sanitize_text_field ( $_POST['arpcpt_recipe_card_title_color'] );
    $arpcpt_recipe_card_title_font_size = sanitize_text_field ( $_POST['arpcpt_recipe_card_title_font_size'] );
    $arpcpt_recipe_card_title_font_size = intval($arpcpt_recipe_card_title_font_size);
    $arpcpt_recipe_card_title_font_style = sanitize_text_field ( $_POST['arpcpt_recipe_card_title_font_style'] );
    $arpcpt_recipe_card_border_color = sanitize_text_field ( $_POST['arpcpt_recipe_card_border_color'] );
    $arpcpt_recipe_card_number_of_posts = sanitize_text_field ( $_POST['arpcpt_recipe_card_number_of_posts'] );
    $arpcpt_recipe_card_width = sanitize_text_field ( $_POST['arpcpt_recipe_card_width'] );
    $arpcpt_recipe_card_width = intval($arpcpt_recipe_card_width);
    $arpcpt_recipe_card_height = sanitize_text_field ( $_POST['arpcpt_recipe_card_height'] );
    $arpcpt_recipe_card_height = intval($arpcpt_recipe_card_height);
    $arpcpt_read_more_link_color = sanitize_text_field ( $_POST['arpcpt_read_more_link_color'] );
    $arpcpt_pagination_background_color = sanitize_text_field ( $_POST['arpcpt_pagination_background_color'] );
    $arpcpt_recipe_card_background_color = sanitize_text_field ( $_POST['arpcpt_recipe_card_background_color'] );
    $arpcpt_recipe_card_excerpt_text_color = sanitize_text_field ( $_POST['arpcpt_recipe_card_excerpt_text_color'] );


	global $wpdb;

		$arpcpt_updateDB = " UPDATE ". $wpdb->prefix ."arpcpt_awesome_recipe_styles  

		SET

			`arpcpt_header_background` = '" . $arpcpt_header_background . "' ,
			`arpcpt_header_font_size` = '" . $arpcpt_header_font_size . "',
			`arpcpt_header_font_style` = '" . $arpcpt_header_font_style . "',
			`arpcpt_header_font_color` = '" . $arpcpt_header_font_color . "',
			`arpcpt_icon_color` = '" . $arpcpt_icon_color . "',
			`arpcpt_list_font_size` = '" . $arpcpt_list_font_size . " ',
			`arpcpt_recipe_card_title_color` = '" . $arpcpt_recipe_card_title_color . "',
			`arpcpt_recipe_card_title_font_size` = '" . $arpcpt_recipe_card_title_font_size . "',
			`arpcpt_recipe_card_title_font_style` = '" . $arpcpt_recipe_card_title_font_style . "',
			`arpcpt_recipe_card_border_color` = '" . $arpcpt_recipe_card_border_color . "',
			`arpcpt_recipe_card_number_of_posts` = '" . $arpcpt_recipe_card_number_of_posts . "',
			`arpcpt_recipe_card_width` = '" . $arpcpt_recipe_card_width . "',
			`arpcpt_recipe_card_height` = '" . $arpcpt_recipe_card_height . "',
			`arpcpt_read_more_link_color` = '" . $arpcpt_read_more_link_color . "',
			`arpcpt_pagination_background_color` = '" . $arpcpt_pagination_background_color . "',
			`arpcpt_recipe_card_background_color` = '" . $arpcpt_recipe_card_background_color . "',
			`arpcpt_recipe_card_excerpt_text_color` = '" . $arpcpt_recipe_card_excerpt_text_color . "'
		
		WHERE `ID`=1

		";

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

	dbDelta( $arpcpt_updateDB );

?>

<script>

document.getElementById("success").innerHTML = '<div id="message" class="updated notice notice-success is-dismissible"><p>Your settings are saved successfully.</p><a href="#"></div>';

 location.reload();

</script>

<?php

}

	// Do security check

	if ( isset( $_POST['arpcpt_default_style'] ) ) {
        
		if( current_user_can('editor') || current_user_can('administrator') ){
			
		}else{
			return;
		}

		if ( ! wp_verify_nonce( $_POST['arpcpt_awesome_recipe_default_nonce'], 'arpcpt_awesome_recipe_default_settings_data_nonce' ) ) {
        return;
    }

	// Store default settings

	global $wpdb;

		$arpcpt_updateDB = " UPDATE ". $wpdb->prefix ."arpcpt_awesome_recipe_styles  

			SET
				`arpcpt_header_background` = '#D80027' ,
				`arpcpt_header_font_size` = '18',
				`arpcpt_header_font_style` = 'uppercase',
				`arpcpt_header_font_color` = '#FFFFFF',
				`arpcpt_icon_color` = '#D80027',
				`arpcpt_list_font_size` = '14',
				`arpcpt_recipe_card_title_color` = '#D80027',
				`arpcpt_recipe_card_title_font_size` = '18',
				`arpcpt_recipe_card_title_font_style` = 'uppercase',
				`arpcpt_recipe_card_border_color` = '#c7c7c7',
				`arpcpt_recipe_card_number_of_posts` = '6',
				`arpcpt_recipe_card_width` = '31',
				`arpcpt_recipe_card_height` = '490',
				`arpcpt_read_more_link_color` = '#D80027',
				`arpcpt_pagination_background_color` = '#D80027',
				`arpcpt_recipe_card_background_color` = '#FFFFFF',
				`arpcpt_recipe_card_excerpt_text_color` = '#8A8A8A'
				
			WHERE `ID`=1

			";

		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		dbDelta( $arpcpt_updateDB );

?>

<!-- Reload the screen and display success message -->

<script>

document.getElementById("success").innerHTML = '<div id="message" class="updated notice notice-success is-dismissible"><p>Your settings are saved successfully.</p><a href="#"></div>';

location.reload();

</script>

<?php

}

} // END Function

