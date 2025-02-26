<?php
/**
 * Contains the main functions for setting the group options and displaying them in the admin panel
*/

class ab_option_group {
	
	public static $type;
	public static $name;
	public static $description;
	public static $dropdowns = array();
	public static $inputs = array();
	public static $checkboxes = array();
	public static $textareas = array();

	function __construct($var){
		
		$this->type = 'group';
		
		if(isset($var['name'])){
			$this->name = $var['name'];
			$this->slug = strtolower(str_replace(' ', '_', $this->name));
		}
		
		if(isset($var['description'])) $this->description = $var['description'];
		
		if(isset($var['dropdowns'])) $this->dropdowns = $var['dropdowns'];
		
		if(isset($var['checkboxes'])) $this->checkboxes = $var['checkboxes'];
		
		if(isset($var['inputs'])) $this->inputs = $var['inputs'];
		
		if(isset($var['textareas'])) $this->textareas = $var['textareas'];
	}
	
	function register_settings(){
	
		if(isset($this->dropdowns)): foreach($this->dropdowns as $key=>$cb):
			$name='ab_'.strtolower(str_replace(' ', '_', $key));
			register_setting('ab_custom_options', (string)$name);
		endforeach; endif;

		if(isset($this->checkboxes)): foreach($this->checkboxes as $key=>$cb):
			$name='ab_'.$key;
			register_setting('ab_custom_options', $name);
		endforeach; endif;

		if(isset($this->inputs)): foreach($this->inputs as $key=>$cb):
			$name='ab_'.$key;
			register_setting('ab_custom_options', $name);
		endforeach; endif;

		if(isset($this->textareas)): foreach($this->textareas as $key=>$cb):
			$name='ab_'.$key;
			register_setting('ab_custom_options', $name);
		endforeach; endif;
		
	}
	
	function print_settings(){
		?><div id="poststuff">
			<div id="aio-favicon-settings" class="postbox">
				<h3 id="settings"><?php echo $this->name ?></h3>
				<div class="inside">
					<?php if($this->description) echo '<p>' .$this->description .'</p>';  ?>
					<table class="form-table">
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
		echo '<li><a class="' .$this->slug .'" href="#' .$this->slug .'">' .$this->name .'</a></li>';
	}
	
	function print_fancy_settings(){
		?><div id="<?php echo $this->slug; ?>">
			<a name="<?php echo $this->slug; ?>"></a>
			<h3><?php echo $this->name ?></h3>
			<?php if($this->description) echo '<p>' .$this->description .'</p>';  ?>
			<table class="form-table">
				<?php if(isset($this->dropdowns)) $this->print_admin_dropdowns();  ?>
				<?php if(isset($this->checkboxes)) $this->print_admin_checkboxes();  ?>
				<?php if(isset($this->inputs)) $this->print_admin_inputs();  ?>
				<?php if(isset($this->textareas)) $this->print_admin_textareas();  ?>
			</table>
		</div>
		<?php
	}
	
	function print_admin_dropdowns(){
		foreach($this->dropdowns as $key=>$dd):
			$name =  'ab_' .strtolower(str_replace(' ', '_', $key));
			$op = get_option($name);
			
			echo $this->get_wrapper($key);
			?><select name="<?php echo $name; ?>">
				<?php foreach($dd as $value=>$name): ?>
					<option <?php if($op==$value) echo 'selected="selected"'; ?> value="<?php echo $value; ?>"><?php echo $name; ?></option>
				<?php endforeach; ?>
			</select><?php
			echo $this->get_wrapper();
			
		endforeach;
	}
	
	function print_admin_checkboxes(){
		foreach($this->checkboxes as $key=>$i):
			$name='ab_'.$key;
			
			echo $this->get_wrapper($i);
			?><input <?php if(get_option($name)) echo 'checked="checked"'; ?> type="checkbox" name="<?php echo $name; ?>" value="1" /> <span class="description">Yes please!</span><?php
			echo $this->get_wrapper();
			
		endforeach;
	}
	
	function print_admin_inputs(){
		foreach($this->inputs as $key=>$i):
			$name='ab_'.$key;
			
			echo $this->get_wrapper($i);
			?><input type="text" name="<?php echo $name; ?>" value="<?php echo get_option($name); ?>" class="regular-text" /><?php
			echo $this->get_wrapper();
			
		endforeach;
	}
	
	function print_admin_textareas(){
		foreach($this->textareas as $key=>$i):
			$name='ab_'.$key;
			
			echo $this->get_wrapper($i);
			?><textarea class="ab_textarea" name="<?php echo $name; ?>"><?php echo get_option($name); ?></textarea><?php
			echo $this->get_wrapper();
			
		endforeach;
	}
	
	function get_wrapper($name=""){
		return ($name=="") ? '</td></tr>' : '<tr valign="top"><th scope="row">' .$name .':</th><td>';
	}
}
?>