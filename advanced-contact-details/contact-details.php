<?php
/*
Plugin Name: Advanced Contact Details 
Description: You can write more than one contact information in your site in admin panel and then show it on front-end through shortcode.
Author: Jeney Thomas
Version: 1.0
Plugin URI: http://personalized.comxa.com/wordpress/
Author URI: http://personalized.comxa.com/wordpress/
*/
global $db_version;
$db_version = '1.0';
add_action('admin_menu', 'contact_menu_pages');
function contact_menu_pages(){
    add_menu_page('My Page Title', 'Advanced Contact Details Plugin', 'manage_options', 'contact_menu', 'contact_pluginAdminScreen' );
    add_submenu_page('contact_menu', 'Manage', 'Dashboard', 'manage_options', 'my-menu','contact_pluginAdminScreen' );
    $add = add_submenu_page('contact_menu', 'Add', 'Add', 'manage_options','add_data', 'contact_doAddData');
    $edit = add_submenu_page('contact_menu', 'Edit', 'Edit', 'manage_options','edit_data', 'contact_doEditData' );
    $settings = add_submenu_page('contact_menu', 'Settings', 'Settings', 'manage_options','settings', 'contact_doSettings');
    add_action($add,'contact_plugin_styles');
    add_action($edit,'contact_plugin_styles');
    add_action($settings,'contact_plugin_styles');
}
function contact_plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=settings">' . __( 'Settings' ) . '</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'contact_plugin_settings_link' );
/**
 * Register style sheet.
 */
function contact_plugin_styles($hook_suffix) {
wp_register_style('contact_first_plugin', plugins_url('/css/bootstrap.css',__FILE__ ));
wp_enqueue_style('contact_first_plugin');
wp_enqueue_style('wp-color-picker');
wp_enqueue_script(array('wp-color-picker'), false, true );
wp_register_script('contact_script_js', plugins_url('/js/script.js',__FILE__ ),array());
wp_enqueue_script('contact_script_js');
}
add_action( 'wp_enqueue_scripts', 'contact_plugin_styles' );

function contact_doAddData()
{
    include 'add_data.php';
}
function contact_doEditData()
{
	include 'edit_data.php';
}
function contact_doSettings()
{
    require_once('settings.php');    
}
function contact_column_shortcodes($title,$id)
{
	return sprintf(
		'[contact_details title='.$title.' id='.$id.']'
	);
}
function contact_delete_blocks_data($cb_id)

	{
		global $wpdb;	
		$table_name = $wpdb->prefix ."contact_detail";
	        $deletedata = "DELETE FROM $table_name WHERE id ='$cb_id'";	
		$results = $wpdb->query($deletedata);	
		if($results>0){	
			return true;
	
		}	
		else{
			return false;
		}		
	} 
        if(isset($_POST['Delete']))
        {
        if(contact_delete_blocks_data($_POST['delete_cb_id']))
        {
            $message = "Record successfully deleted";
			?>
<script type="text/javascript">
			window.location = "<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>";
			</script>
<?php	
        }

        else

        {

            $message = "An error occurded while trying to delete the entry";

        }

        echo '<div id="message" class="updated fade"><p><strong>';

	    echo $message;

	    echo '</strong></p></div>';

    }   
	
function contact_pluginAdminScreen(){
?>
 <div class="wrap">
        <h1>Advanced Contact Details Plugin Admin Area</h1>
        <table class="widefat">
            <thead>
                <tr>
                    <th>
                        Sr No
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Short Code
                    </th>
                    <th>
                        Delete
                    </th>
                     <th>
                        Edit
                    </th>
                </tr>  
            </thead>
            <tbody>
                <?php
                global $wpdb;
                
                $mydata = $wpdb->get_results($wpdb->prepare
                        ("select * from ".$wpdb->prefix ."contact_detail ORDER BY id DESC",
                         $metakey, $metavalue ));
                 ?>
                <?php
                $num = 1;
                  foreach($mydata as $mydatas)
                  {
                ?>
                <tr>
                    <?php echo "<td>".$num."</td>"?>
                    <?php echo "<td>".$mydatas->title."</td>"?>
                    <?php echo "<td>".contact_column_shortcodes($mydatas->title,$mydatas->id)."</td>"?>
                    <?php echo "<td><form method=\"post\" action=\"\" onSubmit=\"return confirm('Are you sure you want to delete this entry?');\">";				

				echo "<input type=\"hidden\" name=\"delete_cb_id\" value=".$mydatas->id." />";

	            echo '<input style="border: none; background-color: transparent; padding: 0; cursor:pointer;" type="submit" name="Delete" value="Delete">';

	            echo "</form></td>";
                    echo '<td><a href="admin.php?page=edit_data&id='.$mydatas->id.'">Edit</a>';
                    $num++;
                    ?>
                </tr>
               <?php   }    ?>
            </tbody>
        
    </div>
<?php
}
/**
 * Add Database on install.
 */
function contact_add_table(){
   global $wpdb;
   global $db_version; 
   $table_name = $wpdb->prefix . 'contact_detail';
   $charset_collate = $wpdb->get_charset_collate();
   if($wpdb->get_var('show tables like' . $table_name) !== $table_name)
   {        
   $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
                title varchar(255) NOT NULL,
		phone varchar(255) NOT NULL,
                phone_image  varchar(255) NOT NULL,
                fax varchar(255) NOT NULL,
                fax_image  varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                email_image  varchar(255) NOT NULL,
                mobile varchar(255) NOT NULL,
                mobile_image  varchar(255) NOT NULL,
                address text NOT NULL,
                address_image  varchar(255) NOT NULL,
                UNIQUE KEY id (id)
	) $charset_collate;";
   
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
   add_option( 'db_version', $db_version );
   }    
}
register_activation_hook( __FILE__, 'contact_add_table' );
/**
 * Delete Database on uninstall.
 */
register_deactivation_hook(__FILE__ , 'contact_detail_uninstall' );
function contact_detail_uninstall()
{
        global $db_version;
	global $wpdb;
	$table_name = $wpdb->prefix . "contact_detail";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");
        
        $settings_table_name = $wpdb->prefix . 'contact_settings';
        $wpdb->query("DROP TABLE IF EXISTS $settings_table_name");
}
add_action('init', 'contact_load_actions');
include_once("show_data.php");
function contact_load_actions()
{
add_shortcode('contact_details','show_data');
?>                       
<?php
}
/**
 * Create a folder in uploads
 */
function contact_folder_activate() {
define( 'STORING_DIRECTORY', WP_CONTENT_DIR .'/'. UPLOADS );
$upload_loc = STORING_DIRECTORY . '/contact_images';  
  if (!is_dir($upload_loc)) {
    wp_mkdir_p($upload_loc);
    }
  }
register_activation_hook( __FILE__, 'contact_folder_activate' );
register_deactivation_hook(__FILE__ , 'contact_folder_activate' );
//echo do_shortcode('[data id=1]');
?>