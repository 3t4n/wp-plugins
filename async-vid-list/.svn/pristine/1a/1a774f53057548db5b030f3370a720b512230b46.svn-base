<?php
/*
Plugin Name: Async Vid List
Plugin URI: http://electriccatbox.com/async-vid-list
Description: Lets the user create lists of video embeds that load and play asynchronously in one div
Version: 1.3
Author: Mike Rohan
Author URI: http://electriccatbox.com/
License: GPL2
*/
/*
Copyright 2013  Mike Rohan  (mikerohan10@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('WP_Async_Vid_List'))
{
	class WP_Async_Vid_List
	{
		public function __construct()
		{
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));       	
		} 

        public function admin_init()
        {
        	$this->init_settings();
        } 
		
        public function init_settings()
        {
			$async_vid_info = array(array(array()));		
			register_setting('WP_Async_Vid_List-group', 'async_vid_info' );		
        } 
        	
        public function add_menu()
        {
        	add_options_page('WP Async Vid List Settings', 'WP Async Vid List', 'manage_options', 'WP_Async_Vid_List', array(&$this, 'plugin_settings_page'));
        } 
        	
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } 
    		
		public static function activate()
		{
			// Do nothing
		} 
			
		public static function deactivate()
		{
			// Do nothing
		} 
	} // END class WP_Async_Vid_List
} // END if(!class_exists('WP_Async_Vid_List'))

if(class_exists('WP_Async_Vid_List'))
{
	register_activation_hook(__FILE__, array('WP_Async_Vid_List', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Async_Vid_List', 'deactivate'));

	$WP_Async_Vid_List = new WP_Async_Vid_List();

    if(isset($WP_Async_Vid_List))
    {
        function plugin_settings_link($links)
        { 
            $settings_link = '<a href="options-general.php?page=WP_Async_Vid_List">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        }
        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
    }
}

///////////////// stylesheet
function asyncVidList_style() {
	wp_register_style( 'asyncvidlist-style', plugins_url( '/css/asyncvidlist-style.css', __FILE__ ), array(), '1', 'all' );
	wp_enqueue_style( 'asyncvidlist-style' );	 
}
add_action( 'wp_enqueue_scripts', 'asyncVidList_style' );

function asyncVidList_admin_style() {
	wp_register_style( 'asyncvidlist-admin-style', plugins_url( '/css/asyncvidlist-admin-style.css', __FILE__ ), array(), '1', 'all' );
    wp_enqueue_style( 'asyncvidlist-admin-style' );
}
add_action( 'admin_print_scripts-settings_page_WP_Async_Vid_List', 'asyncVidList_admin_style' );

///////////////// scripts
function asyncVidList_scripts() {
	wp_register_script( 'asyncvidlist', plugins_url( '/js/asyncvidlist.js', __FILE__ ), array('jquery') );  
	wp_enqueue_script( 'asyncvidlist' ); 
}
add_action( 'wp_enqueue_scripts', 'asyncVidList_scripts' ); 

function asyncVidList_admin_scripts() {
	wp_register_script( 'asyncvidlistadmin', plugins_url( '/js/asyncvidlistAdmin.js', __FILE__ ), array('jquery') );  
	wp_enqueue_script( 'asyncvidlistadmin' ); 
	wp_enqueue_script('jquery-ui-accordion');
}
add_action( 'admin_print_scripts-settings_page_WP_Async_Vid_List' , 'asyncVidList_admin_scripts' );

///////////////// Shortcode handler
function asyncVidList_shortcode_handler($atts=null, $content=null){
	
	extract( shortcode_atts( array(
		'list_id' => 'list_id',
		'width' => '420',
		'height' => '315'
	), $atts ) );
	
	ob_start();	
	$options = get_option( 'async_vid_info' ); 

	echo '<div class="async-vid-list-wrap">';
	echo '<div id="async-vid-list' . $list_id . '" data-list_id="' . $list_id . '" class="async-vid-list"><ul>' ;	
	for( $i=0, $size=count($options[$list_id]) ; $i<=$size ;$i++) 
	{ 
		if( $options[$list_id][$i][title] != '' )
		{
		?>
		<li><a data-async-vid-list-desc="<p><?php echo $options[$list_id][$i]['desc'] ?></p>" data-async-vid-list-vid='<?php echo $options[$list_id][$i]['link']?>' ><?php echo $options[$list_id][$i]['title']?></a></li>		
		<?php
		}
	}
	echo '</ul></div>';
	echo '<div id="async-vid-list-divVideo' . $list_id . '" class="async-vid-list-divVideo"></div><div id="async-vid-list-divChoice' . $list_id . '" class="async-vid-list-divChoice"></div></div>';	
	?>
	
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}	

add_shortcode('asyncVidList', 'asyncVidList_shortcode_handler');

?>