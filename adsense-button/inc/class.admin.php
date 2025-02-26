<?php
class adsenseButton_Admin{

	function __construct() {
		// init process for button control
		add_action( 'admin_init', array (&$this, 'addButtons' ) );
		add_action( 'wp_ajax_mybutton_shortcodePrinter', array( &$this, 'wp_ajax_fct' ) );
	}
	
	/*
	* The content of the javascript popin for the insertion
	*
	*/
	function wp_ajax_fct(){
		?>
		<h2>Insert Adsense code</h2>
		<table>
			<tr>
				<td>Alignment
				</td>
				<td>
					<select class="alignment" id="adsensealign">
						<option value="left">left</option>
						<option value="center">center</option>
						<option value="right">right</option>
						<option value="none">none</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Adword
				</td>
				<td>
					<select class="alignment" id="adsensecodename">
						<?php
						for ($i=1; $i<6;$i++){
							$options = get_option( 'adsense_settingsname'.$i );
							if (isset($options) and $options!=''){
							?>
								<option value="<?php echo $i;?>" ><?php echo $options;?></option>
							<?php
							}
						}
						?>
					</select>
				</td>
			</tr>
		</table>
		
		<?php
		for ($i=1; $i<6;$i++){
			$options = get_option( 'adsense_settings'.$i );
			if (isset($options) and $options!=''){
			?>
				<textarea style="display:none" id="adsensecode<?php echo $i;?>" ><?php echo $options;?></textarea>
			<?php
			}
		}
		?>
		
		<br/>
		<input name="mcb_button" id="mcb_button" type="submit" class="button-primary" value="Insert">
		<?php die();
	}

	/*
	* Add buttons to the tiymce bar
	*/
	function addButtons() {
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return false;
	
		if ( get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', array (&$this,'addScriptTinymce' ) );
			add_filter('mce_buttons', array (&$this,'registerTheButton' ) );
		}
	}

	/*
	* Add buttons to the tiymce bar
	*
	*/
	function registerTheButton($buttons) {
		array_push($buttons, "|", "adsensebutton");
		return $buttons;
	}

	/*
	* Load the custom js for the tinymce button
	*

	*/
	function addScriptTinymce($plugin_array) {
		$plugin_array['adsensebutton'] = MTMCE_URL. '/inc/ressources/tinymce.js';
		return $plugin_array;
	}

	}
	

?>