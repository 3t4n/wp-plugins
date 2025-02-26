<?php
/**
 * Contains functions for printing and saving the main settings
*/
class ab_option_main extends ab_option_group {
	
	public static $template_styles = array();
	public static $layout;
	public static $tracking;
	public static $favicon;
	public static $logo;
	public static $apple_icon;
	public static $mce_styles = array();
	public static $custom_contact = array();
	public static $contact_remove = array();
	public static $post_types = array();

	function __construct($var){
		
		parent::__construct($var);
		
		$this->type = 'main';
		
		$this->name = 'General Settings';
		
		$this->slug = strtolower(str_replace(' ', '_', $this->name));
		
		if(isset($var['template_styles'])) $this->template_styles = $var['template_styles'];
		
		if(isset($var['layout'])) $this->layout = $var['layout'];
		
		if(isset($var['logo'])) $this->logo = $var['logo'];
		
		if(isset($var['favicon'])) $this->favicon = $var['favicon'];
	
		if(isset($var['apple_icon'])) $this->apple_icon = $var['apple_icon'];
		
		if(isset($var['tracking'])) $this->tracking = $var['tracking'];
		
	}
	
	function register_settings(){
		parent::register_settings();
		
		if(isset($this->template_styles)) register_setting('ab_custom_options', 'ab_template_styles');
		
		if(isset($this->layout)) register_setting('ab_custom_options', 'ab_layout');
		
		if(isset($this->logo)) register_setting('ab_custom_options', 'ab_logo');
		
		if(isset($this->favicon)) register_setting('ab_custom_options', 'ab_favicon');
		
		if(isset($this->apple_icon)) register_setting('ab_custom_options', 'ab_apple_icon');
		
		if(isset($this->tracking)) register_setting('ab_custom_options', 'ab_tracking');
	}
	
	function print_settings(){
		?><div id="poststuff">
			<div id="aio-favicon-settings" class="postbox">
				<h3 id="settings"><?php echo $this->name ?></h3>
				<div class="inside">
					<?php if($this->description) echo '<p>' .$this->description .'</p>';  ?>
					<table class="form-table">
						<?php if(isset($this->template_styles)) $this->print_admin_template_styles();  ?>
						<?php if(isset($this->layout)) $this->print_admin_layout();  ?>
						<?php if(isset($this->logo)) $this->print_admin_logo();  ?>
						<?php if(isset($this->favicon)) $this->print_admin_favicon();  ?>
						<?php if(isset($this->apple_icon)) $this->print_admin_apple_icon();  ?>
						<?php if(isset($this->tracking)) $this->print_admin_tracking();  ?>
						<?php if(isset($this->dropdowns)) $this->print_admin_dropdowns();  ?>
						<?php if(isset($this->checkboxes)) $this->print_admin_checkboxes();  ?>
						<?php if(isset($this->inputs)) $this->print_admin_inputs();  ?>
						<?php if(isset($this->textareas)) $this->print_admin_textareas();  ?>
					</table>
				</div>
			</div>
		</div><?php
	}
	
	function print_tab(){
		echo '<li><a class="selected ' .$this->slug .'" href="#' .$this->slug .'">' .$this->name .'</a></li>';
	}
	
	function print_fancy_settings(){
		?><div id="<?php echo $this->slug; ?>">
			<a name="<?php echo $this->slug; ?>"></a>	
			<h3><?php echo $this->name ?></h3>
			<?php if(isset($this->description)) echo '<p>' .$this->description .'</p>';  ?>
			<table class="form-table">
				<?php if(isset($this->template_styles)) $this->print_admin_template_styles();  ?>
				<?php if(isset($this->layout)) $this->print_admin_layout();  ?>
				<?php if(isset($this->logo)) $this->print_admin_logo();  ?>
				<?php if(isset($this->favicon)) $this->print_admin_favicon();  ?>
				<?php if(isset($this->apple_icon)) $this->print_admin_apple_icon();  ?>
				<?php if(isset($this->tracking)) $this->print_admin_tracking();  ?>
				<?php if(isset($this->dropdowns)) $this->print_admin_dropdowns();  ?>
				<?php if(isset($this->checkboxes)) $this->print_admin_checkboxes();  ?>
				<?php if(isset($this->inputs)) $this->print_admin_inputs();  ?>
				<?php if(isset($this->textareas)) $this->print_admin_textareas();  ?>
			</table>
		</div>
		<?php
	}
	
	function print_admin_template_styles(){
		$op = get_option('ab_template_styles');
		
		echo $this->get_wrapper('Theme Colour');
		?><select name="ab_template_styles">
			<?php foreach($this->template_styles as $key=>$style): ?>
				<option <?php if($op==$key) echo 'selected="selected"'; ?> value="<?php echo $key; ?>"><?php echo $style; ?></option>
			<?php endforeach; ?>
		</select><?php
		echo $this->get_wrapper();
	}
	
	function print_admin_layout(){
		$op = get_option('ab_layout');
		
		echo $this->get_wrapper('Layout Options');
		?><select name="ab_layout">
			<?php foreach($this->layout as $key=>$layout): ?>
				<option <?php if($op==$key) echo 'selected="selected"'; ?> value="<?php echo $key; ?>"><?php echo $layout; ?></option>
			<?php endforeach; ?>
		</select><?php
		echo $this->get_wrapper();
	}
	
	function print_admin_logo(){
		echo $this->get_wrapper('Upload Logo');
		?><label for="ab_logo">
			<input id="ab_logo" type="text" size="36" name="ab_logo" value="<?php echo get_option('ab_logo'); ?>" />
			<input id="ab_logo_button" class="button" type="button" value="Upload Logo" />
			<br />
			<span class="description">Enter an URL or upload an image for your logo.</span>
		</label><?php
		echo $this->get_wrapper();
	}
	
	function print_admin_favicon(){
		echo $this->get_wrapper('Upload Favicon');
		?><label for="ab_favicon">
			<input id="ab_favicon" type="text" size="36" name="ab_favicon" value="<?php echo get_option('ab_favicon'); ?>" />
			<input id="ab_favicon_button" class="button" type="button" value="Upload Favicon" />
			<br />
			<span class="description">Enter an URL or upload an image for the favicon. Make sure it's 16x16px.</span>
		</label><?php
		echo $this->get_wrapper();
	}
	
	function print_admin_apple_icon(){
		echo $this->get_wrapper('Upload Apple Touch Icon');
		?><label for="ab_apple_icon">
			<input id="ab_apple_icon" type="text" size="36" name="ab_apple_icon" value="<?php echo get_option('ab_apple_icon'); ?>" />
			<input id="ab_apple_icon_button" class="button" type="button" value="Upload Apple Icon" />
			<br />
			<span class="description">Enter an URL or upload an image for your logo.</span>
		</label><?php
		echo $this->get_wrapper();
	}
	
	function print_admin_tracking(){
		
		echo $this->get_wrapper('Tracking Code');
		?><textarea id="tracking_code" name="ab_tracking"><?php echo get_option('ab_tracking'); ?></textarea>
		<div class="clear"></div>
		<span class="description">Paste your whole your Google Analytics code here (including script tags) so you can track visitors to your site.</span><?php
		echo $this->get_wrapper();
	}
}