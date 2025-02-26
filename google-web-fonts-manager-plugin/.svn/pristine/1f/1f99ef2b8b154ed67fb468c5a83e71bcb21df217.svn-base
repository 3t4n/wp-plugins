<?php

class Google_Web_Fonts_Manager_Admin extends Google_Web_Fonts_Manager {
	/**
	 * Error messages to diplay
	 *
	 * @var array
	 */
	private $_messages = array();
	
	
	/**
	 * Class constructor
	 *
	 */
	public function __construct() {
		$this->_plugin_dir   = DIRECTORY_SEPARATOR . str_replace(basename(__FILE__), null, plugin_basename(__FILE__));
		$this->_settings_url = 'options-general.php?page=' . plugin_basename(__FILE__);
		
		$this->setup_css_imports();

		$allowed_options = array();
		
		
		
		// register installer function
		register_activation_hook(GFM_LOADER, array(&$this, 'activateFontManager'));
		
		// add plugin "Settings" action on plugin list
		add_action('plugin_action_links_' . plugin_basename(GFM_LOADER), array(&$this, 'add_plugin_actions'));
		
		// add links for plugin help, donations,...
		add_filter('plugin_row_meta', array(&$this, 'add_plugin_links'), 10, 2);
		
		// push options page link, when generating admin menu
		add_action('admin_menu', array(&$this, 'adminMenu'));
		
		//add help menu
		add_filter('contextual_help', array(&$this,'adminHelp'), 10, 3);
	
		
	}
	
	/**
	 * Add "Settings" action on installed plugin list
	 */
	public function add_plugin_actions($links) {
		array_unshift($links, '<a href="themes.php?page=' . plugin_basename(__FILE__) . '">' . __('Settings') . '</a>');
		
		return $links;
	}
	
	/**
	 * Add links on installed plugin list
	 */
	public function add_plugin_links($links, $file) {
		if($file == plugin_basename(GFM_LOADER)) {
			$upgrade_url = 'http://mywebsiteadvisor.com/tools/wordpress-plugins/google-web-fonts-manager-plugin-for-wordpress/';
			$links[] = '<a href="'.$upgrade_url.'" target="_blank" title="Click Here to Upgrade this Plugin!">Upgrade Plugin</a>';

			$rate_url = 'http://wordpress.org/support/view/plugin-reviews/' . basename(dirname(__FILE__)) . '?rate=5#postform';
			$links[] = '<a href="'.$rate_url.'" target="_blank" title="Click Here to Rate and Review this Plugin on WordPress.org">Rate This Plugin</a>';
			
		}
		
		return $links;
	}
	
	/**
	 * Add menu entry 
	 */
	public function adminMenu() {		
		// add option in admin menu, for setting options
		global $google_font_manager_admin_page;
		$google_font_manager_admin_page = add_theme_page('Google Web Fonts Manager', 'Google Web Fonts Manager', 'manage_options', __FILE__, array(&$this, 'optionsPage'));


	}
	


	public function adminHelp($contextual_help, $screen_id, $screen){
	
		global $google_font_manager_admin_page;
		
		if ($screen_id == $google_font_manager_admin_page) {
			
			$support_the_dev = $this->display_support_us();
			$screen->add_help_tab(array(
				'id' => 'developer-support',
				'title' => "Support the Developer",
				'content' => "<h2>Support the Developer</h2><p>".$support_the_dev."</p>"
			));
			
			$screen->add_help_tab(array(
				'id' => 'plugin-support',
				'title' => "Plugin Support",
				'content' => "<h2>Support</h2><p>For Plugin Support please visit <a href='http://mywebsiteadvisor.com/support/' target='_blank'>MyWebsiteAdvisor.com</a></p>"
			));
			
			$faqs = "<p><b>Question: How do I use the fonts?</b><br>Answer: You need to add the fonts to your CSS Style Sheet.<br>If you want to set all of the H2 tags to Acme font you could add this to your CSS: H2 {font-family: Acme;}</p>";
			
			$faqs .= "<p><b>Question: How do I get new fonts?</b><br>Answer: Google Fonts is always adding new fonts to their system.<br>This plugin will automatically add the newest fonts to the list of fonts.</p>";
			
						
			$screen->add_help_tab(array(
				'id' => 'plugin-faq',
				'title' => "Plugin FAQ's",
				'content' => "<h2>Frequently Asked Questions</h2>".$faqs
			));
			
			$screen->add_help_tab(array(
				'id' => 'plugin-upgrades',
				'title' => "Plugin Upgrades",
				'content' => "<h2>Plugin Upgrades</h2><p>We also offer a premium version of this pluign with extended features!<br>You can learn more about it here: <a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/google-web-fonts-manager-plugin-for-wordpress/' target='_blank'>MyWebsiteAdvisor.com</a></p><p>Learn about all of our free plugins for WordPress here: <a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/' target='_blank'>MyWebsiteAdvisor.com</a></p>"
			));
			
			
			$screen->set_help_sidebar("<p>Please Visit us online for more Free WordPress Plugins!</p><p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/' target='_blank'>MyWebsiteAdvisor.com</a></p><br>");
			
		}
			
	}




	public function display_support_us(){
				
		$string = '<p><b>Thank You for using the Google Web Fonts Manager Plugin for WordPress!</b></p>';
		$string .= "<p>Please take a moment to <b>Support the Developer</b> by doing some of the following items:</p>";
		
		$rate_url = 'http://wordpress.org/support/view/plugin-reviews/' . basename(dirname(__FILE__)) . '?rate=5#postform';
		$string .= "<li><a href='$rate_url' target='_blank' title='Click Here to Rate and Review this Plugin on WordPress.org'>Click Here</a> to Rate and Review this Plugin on WordPress.org!</li>";
		
		$string .= "<li><a href='http://facebook.com/MyWebsiteAdvisor' target='_blank' title='Click Here to Follow us on Facebook'>Click Here</a> to Follow MyWebsiteAdvisor on Facebook!</li>";
		$string .= "<li><a href='http://twitter.com/MWebsiteAdvisor' target='_blank' title='Click Here to Follow us on Twitter'>Click Here</a> to Follow MyWebsiteAdvisor on Twitter!</li>";
		$string .= "<li><a href='http://mywebsiteadvisor.com/tools/premium-wordpress-plugins/' target='_blank' title='Click Here to Purchase one of our Premium WordPress Plugins'>Click Here</a> to Purchase Premium WordPress Plugins!</li>";
	
		return $string;
	}




	
	function HtmlPrintBoxHeader($id, $title, $right = false) {
		
		?>
		<div id="<?php echo $id; ?>" class="postbox">
			<h3 class="hndle"><span><?php echo $title ?></span></h3>
			<div class="inside">
		<?php
		
		
	}
	
	function HtmlPrintBoxFooter( $right = false) {
		?>
			</div>
		</div>
		<?php
		
	}
	

	
	/**
	 * Display options page
	 */
	public function optionsPage() {
		// if user clicked "Save Changes" save them
		if(isset($_POST['Submit'])) {
			foreach($this->_options as $option => $value) {
				if(array_key_exists($option, $_POST)) {
					update_option($option, $_POST[$option]);
				} else {
					update_option($option, $value);
				}
			}

			$this->_messages['updated'][] = 'Options updated!';
		}

	
		
	
		foreach($this->_messages as $namespace => $messages) {
			foreach($messages as $message) {
?>
<div class="<?php echo $namespace; ?>">
	<p>
		<strong><?php echo $message; ?></strong>
	</p>
</div>
<?php
			}
		}
?>
<script type="text/javascript">var wpurl = "<?php bloginfo('wpurl'); ?>";</script>



<style>

.form-table{
	clear:left;
}

.fb_edge_widget_with_comment {
	position: absolute;
	top: 0px;
	right: 200px;
}

</style>

<div  style="height:20px; vertical-align:top; width:50%; float:right; text-align:right; margin-top:5px; padding-right:16px; position:relative;">

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=253053091425708";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-like" data-href="http://www.facebook.com/MyWebsiteAdvisor" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
	
	
	<a href="https://twitter.com/MWebsiteAdvisor" class="twitter-follow-button" data-show-count="false"  >Follow @MWebsiteAdvisor</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


</div>



<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>Google Web Fonts Manager</h2>

	<form method="post" action="">




	<div id="poststuff" class="metabox-holder has-right-sidebar">
		<div class="inner-sidebar">
			<div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:relative;">
			
<?php $this->HtmlPrintBoxHeader('pl_diag',__('Plugin Diagnostic Check','diagnostic'),true); ?>

				<?php
				
				echo "<p>Plugin Version: $this->version</p>";
				
				echo "<p>Required PHP Version: 5.2+<br>";
				echo "Current PHP Version: " . phpversion() . "</p>";
				
				
				echo "<p>Memory Use: " . number_format(memory_get_usage()/1024/1024, 1) . " / " . ini_get('memory_limit') . "</p>";
				
				
				?>

<?php $this->HtmlPrintBoxFooter(true); ?>



<?php $this->HtmlPrintBoxHeader('pl_resources',__('Plugin Resources','resources'),true); ?>
	<p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/google-web-fonts-manager-plugin-for-wordpress/' target='_blank'>Plugin Homepage</a></p>
	<p><a href='http://mywebsiteadvisor.com/support/'  target='_blank'>Plugin Support</a></p>
	<p><a href='http://mywebsiteadvisor.com/contact-us/'  target='_blank'>Contact Us</a></p>
	<p><a href='http://wordpress.org/support/view/plugin-reviews/google-web-fonts-manager-plugin?rate=5#postform'  target='_blank'>Rate and Review This Plugin</a></p>
	
<?php $this->HtmlPrintBoxFooter(true); ?>




<?php $this->HtmlPrintBoxHeader('pl_help',__('Plugin Help','help'),true); ?>

	<p>Please make sure to setup and enable 'Web Fonts Developer API' on the Google API Setup Page.</p>
	<p>Click Here for the <a target='_blank' href='https://code.google.com/apis/console'>Google API Setup Page</a></p>
	<p>Click Here for the <a target='_blank' href='http://mywebsiteadvisor.com/learning/software-tutorials/google-web-fonts-manager-plugin-for-wordpress-setup-tutorial/'>Google API Setup Tutorial</a></p>
	
<?php $this->HtmlPrintBoxFooter(true); ?>


<?php $this->HtmlPrintBoxHeader('pl_upgrades',__('Plugin Upgrades','upgrades'),true); ?>
	<p><a href='http://mywebsiteadvisor.com/tools/google-web-fonts-manager-plugin-for-wordpress/' target='_blank'>Upgrade to Google Web Fonts Manager Ultra!</a></p>
	<p><b>Features:</b><br />
	 -Display Selected fonts at the top of the list.<br />
	 -Customize the demo font preview text.<br />
	 -Much More!<br />
	 </p>
<?php $this->HtmlPrintBoxFooter(true); ?>




<?php $this->HtmlPrintBoxHeader('more_plugins',__('More Plugins','more_plugins'),true); ?>
	
	<p><a href='http://mywebsiteadvisor.com/tools/premium-wordpress-plugins/'  target='_blank'>Premium WordPress Plugins!</a></p>
	<p><a href='http://profiles.wordpress.org/MyWebsiteAdvisor/'  target='_blank'>Free Plugins on Wordpress.org!</a></p>
	<p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/'  target='_blank'>Free Plugins on MyWebsiteAdvisor.com!</a></p>	
				
<?php $this->HtmlPrintBoxFooter(true); ?>


<?php $this->HtmlPrintBoxHeader('follow',__('Follow MyWebsiteAdvisor','follow'),true); ?>

	<p><a href='http://facebook.com/MyWebsiteAdvisor/'  target='_blank'>Follow us on Facebook!</a></p>
	<p><a href='http://twitter.com/MWebsiteAdvisor/'  target='_blank'>Follow us on Twitter!</a></p>
	<p><a href='http://www.youtube.com/mywebsiteadvisor'  target='_blank'>Watch us on YouTube!</a></p>
	<p><a href='http://MyWebsiteAdvisor.com/'  target='_blank'>Visit our Website!</a></p>	
	
<?php $this->HtmlPrintBoxFooter(true); ?>




</div>
</div>



	<div class="has-sidebar sm-padded" >			
		<div id="post-body-content" class="has-sidebar-content">
			<div class="meta-box-sortabless">
								



<?php $this->HtmlPrintBoxHeader('gwf_setup',__('Setup Google API Key','plugin_setup'),true); ?>


	<?php $selected_fonts = $this->get_option('selected_fonts'); ?>
	<?php $google_api_key = $this->get_option('google_api_key'); ?>
	
	<table class='form-table'>
	<tr>
	<th>Google API Developer Key:</th>
	<td><input size='60' type="text" name="google_api_key" value="<?php echo $google_api_key; ?>"><br />
	<span class='description'>
		<p><a target='_blank' href='https://code.google.com/apis/console'>Click Here to Get Your Google API Key!</a> </p>
		<p><a target='_blank' href='http://mywebsiteadvisor.com/learning/software-tutorials/google-web-fonts-manager-plugin-for-wordpress-setup-tutorial/'>Click Here for the Google API Key Setup Tutorial!</a></p>
	</span>
	
	
	
	</td>
	</tr>
	</table>
	
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
	</p>

<?php $this->HtmlPrintBoxFooter(true); ?>


<?php if(isset($google_api_key) && (true == $this->check_api_key($google_api_key)) ){ ?>
	<?php $this->HtmlPrintBoxHeader('gwf_setup',__('Select Fonts','plugin_setup'),true); ?>

	

	<p><strong>Select fonts below and click the save button to activate a font for your website!</strong></p>

	<p>Once you have selected a font, use it in your CSS to change the font for anything!  <br />
	Use the font-family tag just like with any standard font.</p>
		
			
			<a href = 'http://www.google.com/webfonts' target='_blank'>Browse fonts on Google Fonts</a>

			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
			</p>

			Note: If the new fonts do not appear when you click save, wait a few seconds and reload the page or click save again.<br />

			<?php
			
			$font_select_form = $this->get_google_fonts();
			?>

			<?php echo $font_select_form; ?>


		
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
			</p>

	<?php $this->HtmlPrintBoxFooter(true); ?>
<?php } ?>		
		
</div></div></div></div>


		</form>
		
		
		

</div>
<?php
	}

/**
	function setup_css_imports(){
	
		$selected_fonts = $this->get_option('selected_fonts');
	
		foreach($selected_fonts as $font){
			$google_url = "http://fonts.googleapis.com/css?family=" . $font;
			//$google_url = $google_url;
	
			wp_enqueue_style($font, $google_url);	
		}
	}
**/

	function setup_css_imports(){
	
		$selected_fonts = $this->get_option('selected_fonts');
		$google_url = "http://fonts.googleapis.com/css?family=";
	
		foreach($selected_fonts as $font){
			$google_url .= $font . "|";
		}
		
		$google_url = substr($google_url,0, -1);
		wp_enqueue_style("google-web-fonts-manager", $google_url);	
		
	}
	
	
	function get_google_fonts(){
	
		$test_string = "Grumpy wizards make toxic brew for the evil Queen and Jack.";
	
		$google_api_key  = $this->get_option('google_api_key');
			
		$api_url = "https://www.googleapis.com/webfonts/v1/webfonts?key=";
			
		$this->check_api_key($google_api_key);
			
		// transient caching
		if ( false === ( $font_list = get_transient( 'google_web_fonts_manager_cache' ) ) ) {
			$api_data = wp_remote_get($api_url . $google_api_key);
			
			$response = $api_data['response'];
			$body =  json_decode($api_data['body'], true);
			
			if(200 === $response['code']){
				$font_list = $body;
				set_transient( 'google_web_fonts_manager_cache', $font_list, 60*60*12 );
			}
		}
	

		if(isset($font_list) && count($font_list) == 0){
			echo "<br><b>Error: Can not connect to Google Web Fonts API, please double check your API Key and Try Again!</b><br>";
		}
	
		$selected_fonts = $this->get_option('selected_fonts');
	
		$input_html = "<h4>" . count($selected_fonts) ." of " . count($font_list['items']) . " fonts selected!</h4>";
	
		$css_data = "<style type='text/css' media='screen'>";
	
		foreach($font_list['items'] as $font){
	
				$link_url = "http://www.google.com/webfonts/specimen/" . urlencode($font['family']);
				$font_name =  $font['family'];
				$font_family = "$font_name";
	
				if(in_array($font_name, $selected_fonts)){
					$input_html .= "<p><label><input type='checkbox' name='selected_fonts[]' value='$font_name'  checked='checked' >";
					$font_name = $font['family'];
					$input_html .= "$font_name (font-family: $font_family)</label><br><br><span class='$font_family' style='padding:10px; margin:10px; font-size:24px; font-family:$font_family'>$font_name - " . $test_string ."</span></p>";
				}else{
					$input_html .= "<p><label><input type='checkbox' name='selected_fonts[]' value='$font_name'>";
					$input_html .= "<span  class='$font_family' > " . $font_name  . "</span></label></p>";
				}
	
	
				$font_name = str_replace(" ", "-", $font['family']);
				
		}
	
		$css_data .= "</style>";
		
		return $input_html;
	
	
	}
	
	
	
	private function check_api_key($google_api_key){
		
		if(strlen($google_api_key) < 1){
			echo "<div class='updated'><p><strong>Welcome: </strong>You need to ";
			echo "<a href='https://code.google.com/apis/console' target='_blank'>Setup your Google API Key</a> or ";
			echo "<a href='http://mywebsiteadvisor.com/learning/software-tutorials/google-web-fonts-manager-plugin-for-wordpress-setup-tutorial/' target='_blank'>Learn How</a>.</p></div>";
			return false;
		}
		
		$api_url = "https://www.googleapis.com/webfonts/v1/webfonts?key=";
		$api_data = wp_remote_get($api_url . $google_api_key);
		
		if(200 === $api_data['response']['code']){
			return true;
		}
		
		$body = json_decode($api_data['body'], true);
		$response = $api_data['response'];
		$headers = $api_data['headers'];
		
		foreach($body['error']['errors'] as $error){
			if("keyInvalid" == $error['reason']){
				echo "<div class='error'><p><strong>ERROR:</strong> Invalid API Key</p></div>";
			}
		}	
		
		$message = "<h2>An Error Has Been Encountered!</h2>\r\n";
		
		$message .= "<p>If you need help you can <a href='http://MyWebsiteAdvisor.com/support/' target='_blank' title='Contact MyWebsiteAdivisor.com WordPress Plugin Support Team!'>Contact Support</a>.</p>";
		$message .= "<p>Please Include (copy and paste) the information below so we can assist you.</p>";
		
		$message .= "<p>Here is the response we received from the Google Web Fonts API:</p>\r\n";
		
		$message .= "<pre>\r\n";
		$message .= "<strong>API Data Headers: </strong>\r\n";
		$message .= print_r($headers, true);
		$message .= "</pre>\r\n";
		
		$message .= "<pre>\r\n";
		$message .= "<strong>API Data Response: </strong>\r\n";
		$message .= print_r($response, true);	
		$message .= "</pre>\r\n";
		
		$message .= "<pre>\r\n";	
		$message .= "<strong>API Data Body: </strong>\r\n";
		$message .= print_r($body, true);			
		$message .= "</pre>\r\n";
		
		echo $message;
			
		return false;
	}
	

}


?>