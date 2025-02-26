<?php
/*
Plugin Name: Adminbar Manager
Plugin URI: https://wordpress.org/plugins/adminbar-manager/
Description: Remove unwanted menus from adminbar(toolbar).
Author: sarankumar
Author URI: https://sarankumar.xyz
Version: 1.9.0
*/
class ABMC_options
	{
		public $options;
	
		public function __construct()
				{
				
				$this->options=get_option('ABMC_options');
				$this->register_settings_and_fields();
				}
		public static function add_menu_page()
				{
				add_options_page('Adminbar cleaner', 'Adminbar Manager', 'administrator', __FILE__,array('ABMC_options','display_option_page'));
				

				}
		public static function display_option_page()
				{
				?><div class="wrap">
               
   			 <h2>Admin Bar Menu Cleaner Options</h2>
             <form action="options.php" method="post">
             <?php 
			 settings_fields('ABMC_options');
             do_settings_sections(__FILE__);
			 ?>
             <p class="submit">
             <input  name="submit" type="submit" class="button-primary" value="save options" />
             </p>
             </form>
    
 			   </div><?php
                }
		public function register_settings_and_fields()
				{
				register_setting( 'ABMC_options', 'ABMC_options',array($this,'ABMC_validator')); 
				add_settings_section('ABMC_section_main','Admin Bar Menu Manager Options',array($this,'ABMC_main_section_cb'),__FILE__);
				add_settings_field('ABMC_wplogo','Remove Wp Logo Link:',array($this,'ABMC_wplogo_setting'),__FILE__,'ABMC_section_main');
				add_settings_field('ABMC_sitename','Remove Sitename Link:',array($this,'ABMC_sitename_setting'),__FILE__,'ABMC_section_main');
				add_settings_field('ABMC_updates','Remove Updates Link:',array($this,'ABMC_updates_setting'),__FILE__,'ABMC_section_main');
				add_settings_field('ABMC_comments','Remove Comments Link:',array($this,'ABMC_comments_setting'),__FILE__,'ABMC_section_main');
				add_settings_field('ABMC_newcontent','Remove New Content:',array($this,'ABMC_newcontent_setting'),__FILE__,'ABMC_section_main');
				add_settings_field('ABMC_secondary','Remove Secondary Navigation:',array($this,'ABMC_secondary_setting'),__FILE__,'ABMC_section_main');
				//add_settings_field('ABMC_desable','Desable Adminbar for all users :',array($this,'ABMC_desable_setting'),__FILE__,'ABMC_section_main');

				add_settings_field('ABMC_color','Admin Bar Color:',array($this,'ABMC_color_setting'),__FILE__,'ABMC_section_main');
				
				}
		public function ABMC_main_section_cb()
				{
				//optional
				}		
									
		public function ABMC_wplogo_setting()
				{
						if(isset($this->options['ABMC_wplogo']) && $this->options['ABMC_wplogo']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_wplogo]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_wplogo]' value='1'/>";
						
				}
		public function ABMC_sitename_setting()
				{
				if(isset($this->options['ABMC_sitename']) && $this->options['ABMC_sitename']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_sitename]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_sitename]' value='1'/>";
				}
		public function ABMC_updates_setting()
				{
				if(isset($this->options['ABMC_updates']) && $this->options['ABMC_updates']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_updates]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_updates]' value='1'/>";
				}			
					
		public function ABMC_comments_setting()
				{
				if(isset($this->options['ABMC_comments']) && $this->options['ABMC_comments']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_comments]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_comments]' value='1'/>";
				}
		public function ABMC_newcontent_setting()
				{
				if(isset($this->options['ABMC_newcontent']) && $this->options['ABMC_newcontent']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_newcontent]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_newcontent]' value='1'/>";
				}
		public function ABMC_secondary_setting()
				{
				if(isset($this->options['ABMC_secondary']) && $this->options['ABMC_secondary']==1 )
						echo "<input type='checkbox' name='ABMC_options[ABMC_secondary]' value='1' checked/>";
						else 
						echo "<input type='checkbox' name='ABMC_options[ABMC_secondary]' value='1'/>";
				}
		
		public function ABMC_color_setting()
				{
				if(isset($this->options['ABMC_color']))
					$color=$this->options['ABMC_color'];
				else
					$color='';
				echo "<input type='text' name='ABMC_options[ABMC_color]' value='$color'/>";
				echo "eg:#efefef (admin bar color  change only in Front End)";
				}
		
				
		public function ABMC_validator($options)
				{
				//print_r($options);
				return $options;
				}														
				
	}// class Adminbar Clear ends here

add_action('admin_menu','ABMC_options_adder'); 
function ABMC_options_adder(){
ABMC_options::add_menu_page();
}
 add_action('admin_init','ABMC_fun');
 function ABMC_fun(){
 new ABMC_options();
 
 }
 


 function ABMC_edit_toolbar($wp_toolbar) {
	 $options=get_option('ABMC_options');
	 		if(isset($options['ABMC_wplogo']) && $options['ABMC_wplogo']==1)
				$wp_toolbar->remove_node('wp-logo');
			 if(isset($options['ABMC_sitename']) &&$options['ABMC_sitename']==1)	
				$wp_toolbar->remove_node('site-name');
			if(isset($options['ABMC_updates']) &&$options['ABMC_updates']==1)
				$wp_toolbar->remove_node('updates');
	   		if(isset($options['ABMC_comments']) &&$options['ABMC_comments']==1)
	   			$wp_toolbar->remove_node('comments');
	   
	   		if(isset($options['ABMC_newcontent']) &&$options['ABMC_newcontent']==1)
				$wp_toolbar->remove_node('new-content');
			if(isset($options['ABMC_secondary']) &&$options['ABMC_secondary']==1)
	   			$wp_toolbar->remove_node('top-secondary');
			

}
function themeslug_enqueue_style()
{
$options=get_option('ABMC_options');
$color=$options['ABMC_color'];
if(empty($color)){
	return ;
}
?><style type="text/css">
/* admin bar manager css*/
#wpadminbar, .quicklinks,.menupop ul,.ab-item,.ab-sub-wrapper{
background-color:<?php echo $color; ?>!important;
}

</style><?php
}

add_action('admin_bar_menu', 'ABMC_edit_toolbar', 999);

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
?>