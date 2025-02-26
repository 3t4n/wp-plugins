<?php
/*
Plugin Name: Bible Tagger
Plugin URI:  https://www.websolutionsz.com/plugin/bible-tagger/
Description: A WordPress plugin based on the NETBible API, that allows the bible references on your pages to popup when one mouse overs the reference. see to <a href='http://labs.bible.org/NETBibleTagger'>https://labs.bible.org/NETBibleTagger/</a>
Version:     1.0
Author:      bible.org
Author URI:  https://bible.org/
License:     GPLv2
 
<Bible Tagger allows the bible references on your pages to popup when one mouse overs the reference>
Copyright (C) <2020>  <Websolutionsz>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
Bible Tagger Plugin for WordPress Copyright (C) 2020 Websolutionsz.com

*/

define('POPUP_BIBLE_VERSION', '1.0');

$options = get_option( 'popup-bible-options' );

	function wpdocs_popup_bible_stylesheets()
	{
		$dir = plugin_dir_url(__FILE__);
		wp_enqueue_style('popup-bible', $dir . 'css/front-style.css', array(), '0.1.0', 'all');
	}
	add_action('wp_enqueue_scripts', 'wpdocs_popup_bible_stylesheets', PHP_INT_MAX);


function popup_bible_print_scripts() { 
	$options = get_option( 'popup-bible-options' );
	?>
	<script type="text/javascript" defer="defer" src="https://labs.bible.org/api/NETBibleTagger/v2/netbibletagger.js">
	<?php
		echo "var headerFontColor = 'fff';";
		if ( isset( $options['voidOnMouseOut'] ) && 1 == $options['voidOnMouseOut'] )
		echo "\n\rorg.bible.NETBibleTagger.voidOnMouseOut = true;";
		if ( isset( $options['parseAnchors'] ) && 1 == $options['parseAnchors'] )
		echo "\n\rorg.bible.NETBibleTagger.parseAnchors = true;";
		if(esc_attr( $options['selectFont'] ) == "xx-small"){
		echo "\n\rvar fontSize = 11;";
		}
		if(esc_attr( $options['selectFont'] ) == "x-small"){
		echo "\n\rvar fontSize = 13;";
		}
		if(esc_attr( $options['selectFont'] ) == "small"){
		echo "\n\rvar fontSize = 15;";
		}
		if(esc_attr( $options['selectFont'] ) == "medium"){
		echo "\n\rvar fontSize = 18;";
		}
		if(esc_attr( $options['selectFont'] ) == "large"){
		echo "\n\rvar fontSize = 21;";
		}
		if(esc_attr( $options['selectFont'] ) == "x-large"){
		echo "\n\rvar fontSize = 23;";
		}
		if(esc_attr( $options['selectFont'] ) == "xx-large"){
		echo "\n\rvar fontSize = 25;";
		}
		?>
	</script>
	<?php
	if ( isset( $options['voidOnOutSideClick'] ) && 1 == $options['voidOnOutSideClick'] ) { ?>
	<script>
		document.addEventListener("mouseup", function(e) {
			var container = document.getElementById("nbtDiv");
			if (!container.contains(e.target)) {
			document.getElementById("nbtCloseImage").click();
			}
	    });
	</script>
<?php } }
add_action('wp_print_scripts', 'popup_bible_print_scripts');

	#### ADMIN PAGE ####

	// This function adds the admin page
	function popup_bible_init_menus() {
		// Add submenu item
		add_submenu_page( 'options-general.php', 'Bible Tagger', 'Bible Tagger', 'manage_options', 'bible-tagger', 'popup_bible_options_page' );
	}
	add_action( 'admin_menu', 'popup_bible_init_menus' );
	
	// Options page
	function popup_bible_options_page() {
		$options = get_option( 'popup-bible-options' );
		?>
		<div class='wrap'>
			<h2>Bible Tagger Options</h2>
			<p>
			Use the options below to change the way Bible Tagger works on your site. A detailed explanation of these options can be found <a href='http://labs.bible.org/NETBibleTagger'>here</a>.
			<br />An overview of the way NETBible Tagger works can be found at the <a href='http://labs.bible.org/NETBibleTagger'>NETBible Tagger web site</a>.
			<br />Donations are appreciated to <a href='https://www.paypal.me/bimal817/5' target="_blank">help support this plugin</a>.
			</p>
			<form method='post' name='popup-bible-options' action='' >
				<table class="form-table"> 
					<tr valign="top"> 
						<th scope="row"><label for="voidOnOutSideClick">Popups</label></th> 
						<td><input name="voidOnOutSideClick" type="checkbox" id="voidOnOutSideClick" class="checkbox" <?php checked( $options['voidOnOutSideClick'] ); ?> /> Remove the popup when the mouse click on outside?</td> 
					</tr> 
					<tr valign="top"> 
						<th scope="row"><label for="voidOnMouseOut">Popups</label></th> 
						<td><input name="voidOnMouseOut" type="checkbox" id="voidOnMouseOut" class="checkbox" <?php checked( $options['voidOnMouseOut'] ); ?> /> Remove the popup when the mouse leaves a link/popup?</td> 
					</tr> 
					<tr valign="top"> 
						<th scope="row"><label for="parseAnchors">Existing links</label></th> 
						<td><input name="parseAnchors" type="checkbox" id="parseAnchors" class="checkbox" <?php checked( $options['parseAnchors'] ); ?> /> Make NETBibleTagger work with your existing links?</td> 
					</tr> 
					<tr valign="top"> 
						<th scope="row"><label for="fontSizeValue">Select font size</label></th> 
						<td><select style="width:100%" name="selectFont">
							<option <?php if(esc_attr($options['selectFont'] == "xx-small")){echo "selected";} ?> value="xx-small">xx-small</option>
							<option <?php if(esc_attr($options['selectFont'] == "x-small")){echo "selected";} ?> value="x-small">x-small</option>
							<option <?php if(esc_attr($options['selectFont'] == "small")){echo "selected";} ?> value="small">small</option>
							<option <?php if(esc_attr($options['selectFont'] == "medium")){echo "selected";} ?> value="medium">medium</option>
							<option <?php if(esc_attr($options['selectFont'] == "large")){echo "selected";} ?> value="large">large</option>
							<option <?php if(esc_attr($options['selectFont'] == "x-large")){echo "selected";} ?> value="x-large">x-large</option>
							<option <?php if(esc_attr($options['selectFont'] == "xx-large")){echo "selected";} ?> value="xx-large">xx-large</option>
						</select>
						<br /><span class="description">If 'font size' checkbox is checked, change 'small' to one of following: <code>xx-small</code>, <code>x-small</code>, <code>small</code>, <code>medium</code>, <code>large</code>, <code>x-large</code>, <code>xx-large</code>.</span></td> 
					</tr>
					<input type='hidden' name='popup-bible-options-saved' value='true' />
				</table>
				<p class='submit'><input type='submit' class='button-primary' value='Save Changes' /></p>
			</form>
	</div>
<?php
	}
	
	// This function fires on init and procces options page form
	function popup_bible_process_options_form( $force=false ) {
		global $wpdb;
    
		if ( sanitize_text_field(! isset( $_POST['popup-bible-options-saved'] )) && !$force )
			return;

		// Load Post data array

		$voidOnOutSideClick = sanitize_text_field(isset( $_POST['voidOnOutSideClick'] ) ? 1 : 0);
		$voidOnMouseOut = sanitize_text_field(isset( $_POST['voidOnMouseOut'] ) ? 1 : 0);
		$parseAnchors 	= sanitize_text_field(isset( $_POST['parseAnchors'] ) ? 1 : 0);
				
		if (sanitize_text_field(!isset( $_POST['selectFont'] )) ||empty(  sanitize_text_field($_POST['selectFont'] )) ){
			$selectFont = 'small';
		}
		else
		{
			$selectFont = $wpdb->prepare( sanitize_text_field($_POST['selectFont']) );
		}
		$options = compact('voidOnOutSideClick', 'voidOnMouseOut', 'parseAnchors', 'selectFont' );
		
		update_option( 'popup-bible-options', $options );		
	}
	add_action('admin_init', 'popup_bible_process_options_form');
	
	// Loads default options if they don't exist when plugin is activated
	function popup_bible_load_defaults() {
		$options = get_option( 'popup-bible-options' );

		if ( empty( $options ) || ! is_array( $options ) )
			popup_bible_process_options_form( true );
	}
	add_action( 'init', 'popup_bible_load_defaults', 8 );
?>