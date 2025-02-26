<?php
/*
Plugin Name: GetMore 
Plugin URI: http://fainmailmarketing.com
Description: Optin plugin for wordpress
Version: 1.0
Author: Nick Holdren
Author URI: http://nickholdren.com/
License: GPL2
*/

/**
* Short description for file
*
* Long description for file (if any)...
*
* LICENSE: Some license information
*
* @copyright  2010 Fanmail Marketing
* @license    
* @version    1.0
* @link       
* @since      File available since Release 1.0
*/
define('GETMORE_URLPATH', WP_CONTENT_URL.'/plugins/'.plugin_basename( dirname(__FILE__)).'/' );

/**
* GetMore plugin class
*
* 
*
* @copyright  2010 Fanmail Marketing
* @license    http://www.zend.com/license/3_0.txt   PHP License 3.0
* @version    Release: 1.0
* @link       
* @since      Class available since Release 1.0
* @var String $mid Member ID for the ExactTarget Account
* @var String $lid List ID for the ExactTarget Account
* @var String $button_text The text to be displayed on the button
* @var String $button_color The color of the GetMore button
* @var String $text_color The color of the GetMore button text
* @var String $button_location The location of the GetMore button
* @var String $welcome_message The welcome message for the GetMore form
* @var String $confirmation_message The message displayed when a user submits the form
*/ 
class GetMore{

	var $mid;
	var $lid;
	var $button_text;
	var $button_color;
	var $text_color;
	var $button_location;
    var $welcome_message;
	var $confirmation_message;
	var $preview_image;

		

	/**
	* Constructor for the GetMore class
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/ 
	function __construct(){
		
			
			//Call all the actions to create the plugin
			add_action('admin_menu', array(&$this,'createMenu'));
			add_action('admin_init', array(&$this,'registerSettings'));
			add_action('init', array(&$this,'insertJavascript'));
			add_action('wp_head', array(&$this,'insertCSS'));
			add_action('wp_footer', array(&$this,'insertGetMoreDiv'));
			add_action('admin_print_scripts', array(&$this,'insertColorpicker'));
			
			//Set the properties of the class
			$this->button_text = get_option('button_text');
			$this->button_location = get_option('button_location');
			$this->button_color = get_option('button_color');
			$this->text_color = get_option('text_color');
			$this->welcome_message = get_option('welcome_message');
			$this->mid = get_option('mid');
			$this->lid = get_option('lid');
			$this->confirmation_message = get_option('confirmation_message');
			$this->preview_image = get_option('preview_image');
	}
	
	function GetMore(){
		
			
			//Call all the actions to create the plugin
			add_action('admin_menu', array(&$this,'createMenu'));
			add_action('admin_init', array(&$this,'registerSettings'));
			add_action('init', array(&$this,'insertJavascript'));
			add_action('wp_head', array(&$this,'insertCSS'));
			add_action('wp_footer', array(&$this,'insertGetMoreDiv'));
			add_action('admin_print_scripts', array(&$this,'insertColorpicker'));
			
			//Set the properties of the class
			$this->button_text = get_option('button_text');
			$this->button_location = get_option('button_location');
			$this->button_color = get_option('button_color');
			$this->text_color = get_option('text_color');
			$this->welcome_message = get_option('welcome_message');
			$this->mid = get_option('mid');
			$this->lid = get_option('lid');
			$this->confirmation_message = get_option('confirmation_message');
			$this->preview_image = get_option('preview_image');
	}
	
	
	/**
	* Creates the menu for the GetMore plugin admin
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function createMenu(){
		
			//Create a menu page for the plugin
			add_menu_page('Settings', 'GetMore', 9, basename(__FILE__), array(&$this, 'showSettingsPage'));
	}
	
	/**
	* Registers the settings used in the GetMore plugin
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function registerSettings(){
		
			//Register the settings for the GetMore plugin
			register_setting( 'getmore_settings', 'mid' );
			register_setting( 'getmore_settings', 'lid' );
			register_setting( 'getmore_settings', 'attributes' );
			register_setting( 'getmore_settings', 'button_text' );
			register_setting( 'getmore_settings', 'button_color' );
			register_setting( 'getmore_settings', 'text_color' );
			register_setting( 'getmore_settings', 'button_location');
			register_setting( 'getmore_settings', 'welcome_message' );
			register_setting( 'getmore_settings', 'confirmation_message' );
			register_setting( 'getmore_settings', 'pages' );
			register_setting( 'getmore_settings', 'preview_image' );
	
	}
	
	/**
	* Displays the settings page for the GetMore plugin
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function showSettingsPage(){
		echo("<h2>GetMore Settings</h2>");
	?>

<form method="post" action="options.php">
  <?php settings_fields('getmore_settings'); ?>
  <fieldset>
    <legend>
    <h3>ExactTarget Account</h3>
    </legend>
    <table cellpadding="10" cellspacing="10">
      <tr>
        <td width="200"><label for="mid">Account ID:</label></td>
        <td><input type="text" name="mid" value="<?php echo ($this->mid); ?>" />
          <br /></td>
      </tr>
      <tr>
        <td colspan="2"><span class="description">This identifies your account and is found in: Admin > Account Settings > Account ID</span></td>
      </tr>
      <tr>
        <td><label for="lid">List ID:</label></td>
        <td><input type="text" name="lid" value="<?php echo($this->lid); ?>" />
          <br /></td>
      </tr>
      <tr>
        <td colspan="2"><span class="description">This identifies the list to populate and is found in: Subscribers > My Lists > Check Box List Name > Properties > List Identification > ID</span></td>
      </tr>
    </table>
  </fieldset>
  <fieldset>
    <legend>
    <h3>Location</h3>
    </legend>
    <span class="description">Where do you want it to go? Save your changes and refresh site to preview.</span>
    <table cellpadding="10" cellspacing="10">
      <tr>
        <td width="200"><label for="button_location">Buttons:</label></td>
        <td><table cellpadding="10" cellspacing="10">
            <tr>
              <td>Left</td>
              <td><input type="radio" name="button_location" value="left" <?php if($this->button_location == 'left'){ ?>  checked="checked" <?php } ?> /></td>
            </tr>
            <!--<tr>
              <td>Right</td>
              <td><input type="radio" name="button_location" value="right" <?php if($this->button_location == 'right'){ ?>  checked="checked" <?php } ?> /></td>
            </tr>-->
            <tr>
              <td>Bottom Left</td>
              <td><input type="radio" name="button_location" value="bottom_left" <?php if($this->button_location == 'bottom_left'){ ?>  checked="checked" <?php } ?> /></td>
            </tr>
            <tr>
              <td>Bottom Right</td>
              <td><input type="radio" name="button_location" value="bottom_right" <?php if($this->button_location == 'bottom_right'){ ?>  checked="checked" <?php } ?> /></td>
            </tr>
            <tr>
              <td>Top Left</td>
              <td><input type="radio" name="button_location" value="top_left" <?php if($this->button_location == 'top_left'){ ?>  checked="checked" <?php } ?> /></td>
            </tr>
            <tr>
              <td>Top Right</td>
              <td><input type="radio" name="button_location" value="top_right" <?php if($this->button_location == 'top_right'){ ?>  checked="checked" <?php } ?>/></td>
            </tr>
          </table></td>
          <td rowspan="2"><img style="border: 1px solid #222;" id="preview" src="<?php echo(GETMORE_URLPATH.'/images/'.$this->button_location.'.jpg'); ?>" border="1" /></td>
      </tr>
      <tr>
        <td>Banners:</td>
        <td><table cellpadding="10" cellspacing="10">
            <tr>
              <td>Left Corner</td>
              <td><input type="radio" name="button_location" value="banner_left" <?php if($this->button_location == 'banner_left'){ ?>  checked="checked" <?php } ?>/></td>
            </tr>
            <!--<tr>
              <td>Right Corner</td>
              <td><input type="radio" name="button_location" value="banner_right" <?php if($this->button_location == 'banner_right'){ ?>  checked="checked" <?php } ?>/></td>
            </tr>-->
          </table></td>
        
      </tr>
    </table>
  </fieldset>
  <fieldset>
    <legend>
    <h3>Attributes</h3>
    </legend>
    <span class="description">What do you want it to say and look like? Save your changes and refresh site to preview.</span>
    <table cellpadding="10" cellspacing="10">
      <tr>
        <td width="200"><label for="button_text">Call to Action Text:</label></td>
        <td><select name="button_text">
            <option value="Connect w/Us" <?php if($this->button_text == 'Connect w/us'){ ?> selected="selected" <?php } ?>>Connect</option>
            <option value="Join The Club" <?php if($this->button_text == 'Join The Club'){ ?> selected="selected" <?php } ?>>Join The Club</option>
            <option value="Become A Fan" <?php if($this->button_text == 'Become A Fan'){ ?> selected="selected" <?php } ?>>Become A Fan</option>
            <option value="Get Connected" <?php if($this->button_text == 'Get Connected'){ ?> selected="selected" <?php } ?>>Get Connected</option>
            <option value="Get Updates" <?php if($this->button_text == 'Get Updates'){ ?> selected="selected" <?php } ?>>Get Updates</option>
            <option value="Follow Us" <?php if($this->button_text == 'Follow Us'){ ?> selected="selected" <?php } ?>>Follow Us</option>
            <option value="Download Now" <?php if($this->button_text == 'Download Now'){ ?> selected="selected" <?php } ?>>Download Now</option>
            <option value="Get The Video" <?php if($this->button_text == 'Get The Video'){ ?> selected="selected" <?php } ?>>Get The Video</option>
            <option value="Free Song" <?php if($this->button_text == 'Free SOng'){ ?> selected="selected" <?php } ?>>Free Song</option>
            <option value="Free Ebook" <?php if($this->button_text == 'Free Ebook'){ ?> selected="selected" <?php } ?>>Free Ebook</option>
            <option value="Free Tickets" <?php if($this->button_text == 'Free Tickets'){ ?> selected="selected" <?php } ?>>Free Tickets</option>
            <option value="Join Us" <?php if($this->button_text == 'Join Us'){ ?> selected="selected" <?php } ?>>Join Us</option>
            <option value="Newsletter" <?php if($this->button_text == 'Newsletter'){ ?> selected="selected" <?php } ?>>Newsletter</option>
            <option value="More Info" <?php if($this->button_text == 'More Info'){ ?> selected="selected" <?php } ?>>More Info</option>
            <option value="Learn More" <?php if($this->button_text == 'Learn More'){ ?> selected="selected" <?php } ?>>Learn More</option>
            <option value="Contact Us" <?php if($this->button_text == 'Contact Us'){ ?> selected="selected" <?php } ?>>Contact</option>
          </select></td>
      </tr>
      <tr>
        <td width="200"><label for="welcome_message">Welcome Message:</label></td>
        <td><input type="text" name="welcome_message" maxlength="150" size="50" value="<?php echo($this->welcome_message) ?>" /></td>
      </tr>
      <tr>
        <td width="200"><label for="confirmation_message" >Confirmation Message:</label></td>
        <td><input type="text" name="confirmation_message" maxlength="150" size="50" value="<?php echo($this->confirmation_message) ?>" /></td>
      </tr>
      <tr>
        <td width="200"><label for="button_color" >Background Color:</label></td>
        <td><input type="text" name="button_color" id="button_color" class="iColorPicker" value="<?php echo($this->button_color); ?>" size="10" /></td>
      </tr>
      <tr>
        <td width="200"><label for="text_color" >Text Color:</label></td>
        <td><input type="text" name="text_color" id="text_color" class="iColorPicker" value="<?php echo($this->text_color); ?>" size="10" /></td>
      </tr>
    </table>
  </fieldset>
  <input type="hidden" name="create" value="Y" />
  <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</form>
<br />
<?php
		
	}
	
	/**
	* Creates the CSS code for the GetMore button
	*
	* @param  String    $location 	Location of where the button is to be placed
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return String	$CSS		String of CSS used for the button
	*/
	function getCSS($location){
		
		//Based on the selected location of the Widget tailor CSS
		switch($location){
			case "left":
				$CSS = "div#GetMoreDiv{
					font-family:Arial, Helvetica, sans-serif;
					position:absolute;
					top:50%;
					left:0;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;
				padding-top:10px;padding-left:10px; padding-right:10px; font-size:14px;cursor:pointer;text-transform:uppercase;border-left: 1px solid ##FONT_COLOR##;border-right: 1px solid ##FONT_COLOR##;border-bottom: 2px solid ##FONT_COLOR##;
				-webkit-transform: rotate(-90deg); 
-moz-transform: rotate(-90deg);	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
-moz-transform-origin: top left;
-webkit-transform-origin: top left}";
				break;
			case "right":	
				$CSS = "div#GetMoreDiv{
					font-family:Arial, Helvetica, sans-serif;
					position:absolute;
					top:40%;
					right:0;
					height:30px;
					background-color: ##BG_COLOR##;
					color: ##FONT_COLOR##;
					padding-top:10px;
					padding-right:10px;
					padding-left:10px;
					font-size:14px;
					cursor:pointer;
					text-transform:uppercase;
					border-left: 1px solid ##FONT_COLOR##;
					border-right: 1px solid ##FONT_COLOR##;
					border-top: 1px solid ##FONT_COLOR##;} ";
				break;
			case "top_left":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;position:absolute;left:10%;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px;text-transform:uppercase;border-left: 1px solid ##FONT_COLOR##;border-right: 1px solid ##FONT_COLOR##;border-bottom: 1px solid ##FONT_COLOR##;cursor:pointer;top:0;}";
				
				break;
			case "bottom_left":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;position:absolute;bottom:0;left:10%;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px;text-transform:uppercase;border-right: 1px solid ##FONT_COLOR##;border-top: 1px solid ##FONT_COLOR##;border-left: 1px solid ##FONT_COLOR##;cursor:pointer;}";
				break;
			case "bottom_right":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;positext-transform:uppercase;tion:absolute;bottom:0;right:10%;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px;border-right: 1px solid ##FONT_COLOR##;border-top: 1px solid ##FONT_COLOR##;border-left: 1px solid ##FONT_COLOR##;cursor:pointer;text-transform:uppercase;}";
				break;
			case "top_right":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;position:absolute;top:0;right:10%;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px; z-index:1000;text-transform:uppercase;border-right: 1px solid ##FONT_COLOR##;border-bottom: 1px solid ##FONT_COLOR##;border-left: 1px solid ##FONT_COLOR##;cursor:pointer;}";
				break;
			case "banner_right":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;position:absolute;top:10px;right:-10px;width:250px;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px; cursor:pointer;border-bottom: 2px solid #999999;text-transform:uppercase;}";
				break;
			case "banner_left":
				$CSS = "div#GetMoreDiv{font-family:Arial, Helvetica, sans-serif;position:absolute;top:50px;left:0px;width:250px;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;font-size: 14px;padding-top: 10px;padding-left:10px;padding-right: 10px;cursor:pointer;border-bottom: 2px solid #999999;text-transform:uppercase;cursor:pointer;";
				if($this->ae_detect_ie()){

					$CSS .= "top:10px;";
				}else{
					$CSS .= "}";	
				}
				break;
			default:
			$CSS = "div#GetMoreDiv{
				font-family:Arial, Helvetica, sans-serif;
					position:absolute;
					top:50%;
					left:0;height:30px;background-color: ##BG_COLOR##;color: ##FONT_COLOR##;
				padding-top:10px;padding-left:10px; padding-right:10px; font-size:14px;cursor:pointer;text-transform:uppercase;border-left: 1px solid ##FONT_COLOR##;border-right: 1px solid ##FONT_COLOR##;border-bottom: 2px solid ##FONT_COLOR##;}";
				break;
				
		}


		$CSS = $CSS."@media screen{body>div#GetMoreDiv{position:fixed;}";
		
			
		//Set the default button color
		if($this->button_color == ""){
		
			$this->button_color = "#000000";	
		}
		
		//Set the default text color
		if($this->text_color == ""){
			
			$this->text_color = "#FFFFFF";
		}
		
		//Replace the settings for the styles for the placeholders
		$CSS = str_replace('##BG_COLOR##', $this->button_color, $CSS);
		$CSS = str_replace('##FONT_COLOR##', $this->text_color, $CSS);
		
		//Return the generated CSS
		return $CSS;
		
	}
	
	/**
	* Inserts the GetMore button onto the wordpress pages
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return
	*/
	function insertCSS(){
		
		wp_enqueue_script("GetMoreLightbox", GETMORE_URLPATH. 'jquery.lightbox-0.5.min.js');
		echo('<script src="http://code.jquery.com/jquery-1.4.2.js" ></script>');
		echo('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.js" ></script>');

		
		echo('<link href="'.GETMORE_URLPATH.'jquery.lightbox-0.5.css" rel="stylesheet" />');
		echo('<style type="text/css">'.$this->getCSS($this->button_location).'</style>');
		
				?>
                 
        <script src="<?php echo(GETMORE_URLPATH."transform.js") ?>" ></script>
<script type="text/javascript">
		var $b = jQuery.noConflict();

$b(function() {



	$b('.move').transform({
    
	<?php 
	
		switch($this->button_location){
		
			case "banner_left":?>
			rotate: -45,
    		origin: [0, 100]
			
			<?php if($this->ae_detect_ie()){ ?>
			,translateY: 25,
			translateX:-15
			<?php 
			}
			break;
			case "banner_right":?>
			rotate: 45,
    		origin: [100,100]
			<?php
			break;
			default:
			break;
		}
	?>
	
	});

		$b('#GetMoreDiv').dialog('destroy');
			var loadLogo = 0;
			var email = $b('#GetMore_email'),
			allFields = $b([]).add(email),
			tips = $b('.validateTips');

		function updateTips(t) {
			tips
				.text(t)
				.addClass('ui-state-highlight');
			setTimeout(function() {
				tips.removeClass('ui-state-highlight', 1500);
			}, 500);
		}

		function checkLength(o,n,min,max) {

			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips('Length of ' + n + ' must be between '+min+' and '+max+'.');
				return false;
			} else {
				return true;
			}

		}

		function checkRegexp(o,regexp,n) {

			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}

		}


		$b('#GetMoreForm').dialog({
			autoOpen: false,
			height: 175,
			width: 400,
			modal: true,
resizable: false,
			open: function(){
				
			/*if(!loadLogo){
        		$b('<img id="GetMoreFanmailLogo" src="<?php echo(WP_PLUGIN_URL.'/GetMore/logo.jpg'); ?>" style="float: left;" />').insertBefore('.ui-dialog-buttonpane button:first');
				loadLogo = 1;
			}*/
			},
			buttons: {

				'Submit': function() {
					

					var bValid = true;
					allFields.removeClass('ui-state-error');

					bValid = bValid && checkLength(email,'GetMore_email',6,80);
					
					bValid = bValid && checkRegexp(email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,'eg. ui@jquery.com');

						//If everything checks out send it through
						if(bValid){

							var result = $b.post('<?php echo(WP_PLUGIN_URL.'/GetMore/optin.php'); ?>', { 'Email%20Address': email.val(), MID:<?php echo($this->mid); ?>,lid:<?php echo($this->lid); ?>}, function(data){ });
email.hide();
							$b('.GetMoreLabel').hide();
							$b('#GetMoreConfirm').show();
							allFields.val('').removeClass('ui-state-error');
$b('#GetMoreForm').dialog( 'option', 'height', 175 );
$b('.ui-dialog-buttonpane').hide();
							
						}
	
	
	
	
				}
				
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
			
		});

		
		
$b('#GetMoreDiv').click(function() {
$b('#GetMoreConfirm').hide();
$b('#GetMoreForm').show();
email.show();
$b('.GetMoreLabel').show();
$b('.ui-dialog-buttonpane').show();
$b('#GetMoreForm').dialog( 'option', 'height', 175 );

$b('#GetMoreForm').dialog('open');

});



	});

</script>
<?php
	}
	
	/**
	* Inserts the GetMoreDiv into the Wordpress theme
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function insertGetMoreDiv(){
		
		echo('<div id="GetMoreDiv" class="move">'.$this->button_text.'</div>');
		echo('<div id="GetMore"><div id="GetMoreForm" title="'.$this->welcome_message.'"><div id="GetMoreConfirm"><br /><br />'.$this->confirmation_message.'</div><form><br /><br /><label for="email" class="GetMoreLabel">Email Address</label><input type="text" name="GetMore_email" id="GetMore_email" value="" class="text ui-widget-content ui-corner-all" /></form></div></div>');
		
	}
	
	/**
	* Calls and inserts javascript libraries to the header
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function insertJavascript(){
			
		//wp_enqueue_script("jquery");
//wp_enqueue_script('jquery-ui');
		//wp_enqueue_script('jquery-ui-dialogue');
		//wp_enqueue_script("transform", GETMORE_URLPATH. 'transform.js');
		
		
	}
	
	/**
	* Inserts javascript libraries for the color picker
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function insertColorPicker(){
		wp_enqueue_script("jquery");
		?>
<link rel="stylesheet" href="<?php echo(GETMORE_URLPATH."colorpicker.css"); ?>" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.js"></script>
<script src="<?php echo(GETMORE_URLPATH."colorpicker.js") ?>" ></script>

<script type="text/javascript">
	var $b = jQuery.noConflict();
	$b(document).ready(function() {
	
	imgFldr = '<?php echo(GETMORE_URLPATH); ?>/images/';
$b("input[name='button_location']").click(function() {
   $b('#preview').attr('src', imgFldr+this.value+'.jpg');
});
	
	});
		
	</script>
<?php	
	}


	function ae_detect_ie()
	{
		if (isset($_SERVER['HTTP_USER_AGENT']) && 
		(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
			return true;
		else
			return false;
	}

	/**
	* Destroys the GetMore object
	*
	* @throws Some_Exception_Class If something interesting cannot happen
	* @return 
	*/
	function __destruct(){
		
	}


}

$getmore = new GetMore();

?>
