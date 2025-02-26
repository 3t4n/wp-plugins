<?php
class arv_amazon_lb_options {
	/** Arevico options */
	public $setting_name="arevico_amazon_lb";
	public $setting_slug="arevico_tld_settings";
	public $option_group="arevico_amz_lb";
	/*===================*/
	public $plugin_option_slug="arevico-amazon-lb";
	public $plugin_option_title="Amazon Lightbox";
	/***/
	private $defs = array('amazontag'=>'','standardsearch'=>'Watch','deswidget'=>'2','width'=>400,'rows'=>2,'colums'=>3,'show_once'=>0,'display_on_page'=>1,'display_on_post'=>1,'display_on_home'=>1,'delay'=>2000,'exc'=>'<!-- no_lb -->','fancybox'=>0);

	function arv_amazon_lb_options()
	{
		$this->__construct();
	}
	/** Constructor, add all hooks and stuff here!*/
	function __construct()
	{

		add_action('admin_init', array(&$this, 'options_init') );
		add_action('admin_menu', array(&$this, 'add_menu_items'));
	}

	function options_init(){
		register_setting($this->option_group, $this->setting_name, array(&$this,'option_validate') );
	}
		function find_menu($top_lvl,$sub_lbl="",$sub_menu=false){
		global $submenu;
		$lret=isset($submenu[$top_lvl]);
		if (!$sub_menu){return $lret;} 
		if (!$lret){return $lret;} 
		return in_array($sub_lbl,array_values($submenu[$top_lvl]));
		/** */
		
	
	}
	
	function add_menu_items() {

		if (!$this->find_menu($this->setting_slug,'Arevico Plugins',true)){
		add_menu_page('Arevico', 'Arevico Plugins', 'manage_options', $this->setting_slug, array(&$this,'tld_do_page'));		
		}
		add_submenu_page( $this->setting_slug, $this->plugin_option_slug, $this->plugin_option_title, 'manage_options', $this->plugin_option_slug, array(&$this,'plugin_setting_page') );
	}

	function tld_do_page(){
	?>
	<div class="wrap">
	<h2>Arevico Software Page</h2>
	<p>This page contains no settings, but is merely a container for the submenus per plugin.<br />
	<strong>Please expand the 'Arevico Plugins'-tab on your left and select the plugin you want to configure!</strong></p>
	<p><h2>Support us</h2>
	Developing plugins costs a lot of time and we don't see the immidiate benefit. <br />Please support us by checking out and purchasing <a href="http://arevico.comblue.hop.clickbank.net?x=91">The Internet Marketing Advantage</a>. We will receive a small commision and you will
	learn a lot! A Win-Win situation!
	</p>
	</div>
	<?php
	}
	/*=================*/
	function pl_get_options(){
		$arr_opt=get_option($this->setting_name,$this->defs);
		return $arr_opt;
	}

	function option_validate($arr_options){
		return $arr_options;
	}

	function plugin_setting_page(){

	?>
	<div class="wrap">
	<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
	<?php } ?>
		<div class="updated settings-error">
			<p><strong>Do more with Social Media: &nbsp;&nbsp;&nbsp;<a href="http://arevico.com/out/?p=hyperfacebook2">Check Hyper Facebook Traffic. It will greatly help your social media presence And ultimately increase your traffic.</a><br /><a href="http://arevico.com/out/?p=hyperfacebook2" target="_blank"><img src="http://www.arevico.com/ad/banner.php" width="468" height="60" border=0></a></strong>
		</p>			
	</div>

	<h2>Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields($this->option_group);
				  $options = $this->pl_get_options();?>

			<table class="form-table">
				<tr valign="top"><th scope="row">Amazon Associate-ID:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[amazontag]" value="<?php echo $options['amazontag']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Standard Search Term:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[standardsearch]" value="<?php echo $options['standardsearch']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Amazon Widget Design (1-6):</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[deswidget]" value="<?php echo $options['deswidget']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Width:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[width]" value="<?php echo $options['width']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Product Rows:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[rows]" value="<?php echo $options['rows']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Product Colums:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[colums]" value="<?php echo $options['colums']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Show once every $x days(per visitor):</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[show_once]" value="<?php echo $options['show_once']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Show on:</th>
					<td>
					<input name="<?php echo($this->setting_name); ?>[display_on_page]" type="checkbox" value="1" <?php checked('1', $options['display_on_page']); ?> /> On Page &nbsp;&nbsp;&nbsp;&nbsp;
					<input name="<?php echo($this->setting_name); ?>[display_on_post]" type="checkbox" value="1" <?php checked('1', $options['display_on_post']); ?> /> On Post
					<input name="<?php echo($this->setting_name); ?>[display_on_home]" type="checkbox" value="1" <?php checked('1', $options['display_on_home']); ?> /> On HomePage (only if full_post shows)&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
				<tr valign="top"><th scope="row">Don't load fancybox(only select when theme allready includes it):</th>
					<td>
					<input name="<?php echo($this->setting_name); ?>[fancybox]" type="checkbox" value="1" <?php checked('1', $options['fancybox']); ?> />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Delay (miliseconds):</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[delay]" value="<?php echo $options['delay']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Exclude Shortcode:</th>
					<td><input type="text" name="<?php echo($this->setting_name); ?>[exc]" value="<?php echo $options['exc']; ?>" /></td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

			</p>

		</form>
	</div>
	<?php }}?>