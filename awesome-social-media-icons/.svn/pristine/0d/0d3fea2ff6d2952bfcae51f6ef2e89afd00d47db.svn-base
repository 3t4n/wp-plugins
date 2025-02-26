<?php
/*
Plugin Name: Awesome Social Media Icons
Plugin URI: https://wordpress.org/plugins/awesome-social-media-icons/
Description:This is our social media plugin.Using this plugin you can add social icon in your sites, using shortcode you can put the icons any were in your posts & pages.
Author: Skywaveinfotech
Author URI: http://www.skywaveinfotech.com/
Version: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if( !defined('ABSPATH') ) die();

define ('plugin_dire_path',plugin_dir_path(__FILE__));
register_activation_hook(__FILE__,'asmi_init_socialtable');

//REGISTER YOUR SHORTCODE HERE.
add_shortcode('social-icons','asmi_init_sc');//END
$socailicons = plugin_dir_url(__FILE__);

//ENQUE STYLES AND JS.
function socialicon_enque_stylesheets(){
	global $socailicons;
    wp_enqueue_style( 'socaiicon_bootstrap_grid_min', $socailicons.'css/bootstrap-grid.min.css', array());
    wp_enqueue_style( 'socaiicon_fontawesomecss', $socailicons.'font-awesome/css/font-awesome.css', array());
    wp_enqueue_style( 'socaiicon_fontwesomem', $socailicons.'font-awesome/css/font-awesome.min.css',array());

    wp_enqueue_script( 'socialicon_boot_js', $socailicons.'js/bootstrap.js', array(), '1.0.0', true);
    wp_enqueue_script( 'socialicon_bootmin_js', $socailicons.'js/bootstrap.min.js', array(), '1.0.0', true);

}
//END ENQUE STYLE & JS
add_action('admin_enqueue_scripts','socialicon_enque_stylesheets');
/*
This is not include with above because its conflicting with wordress other pages.
*/
function asmi_tabletylesheet(){
	global $socailicons;
	wp_enqueue_style( 'socialicon_bootstrap_css', $socailicons.'css/bootstrap.css', array());
}

if( isset($_GET['page']) ) {
	if( $_GET['page']=='social-icon' OR $_GET['page']=='View-all' ) {
		add_action('admin_enqueue_scripts', 'asmi_tabletylesheet' );
	}
}

//REGISTER YOR MENU HERE.(SHOW IN LEFT SIDE ADMIN PANEL)
function asmi_main_menus(){
	add_menu_page('socialicon','Awesome Social Icon','manage_options','social-icon','asmi_sub_pages','dashicons-share',6);
	//Add submenu.
	add_submenu_page('social-icon','Add Icons','Add Icons','manage_options','social-icon','asmi_sub_pages');
	add_submenu_page('social-icon','View All','View All','manage_options','View-all','asmi_menu_page_view');
}
add_action('admin_menu','asmi_main_menus');//END REGISTER MENU.

function asmi_sub_pages(){
	//PATH 
	include_once(plugin_dire_path.'/addicons.php');
}
//DELETE ICONS.
if (isset($_GET['icon-delete'])) {
	if ($_GET['Id'] != '')
	{	global $wpdb;
		$get_table = $wpdb->prefix . "s_icon";		
		$wpdb->delete( $get_table, array( 'Id' => $_GET['Id'] ));	
		
	}
}//END DELETE.

function asmi_menu_page_view(){
?>	
	<div class="wrap">
	<script type="text/javascript">				
		function shw_confirm(Title,Id)
		{
			var redirectpage = "";
			var redirectreferance = "";
			var confirmation=confirm('Are you sure want to delete ? "'+Title+'"');
			if (confirmation==true)
			{
				redirectpage = '<?php echo $_SERVER['PHP_SELF'].'?page=View-all'; ?>';
				redirectreferance = '&icon-delete=y&Id='+Id;					
				window.location = redirectpage+redirectreferance;

			}
		}			
	</script>			
		<h1>Social Icons</h1>				
		<form method="POST" action="">
		<?php wp_nonce_field('asmi_cre_sc'); ?>				
		<table class="table table-striped table-bordered">
				<tr>
					<th>Index</th>							
					<th>Title</th>
					<th>Url</th>
					<th>Icon</th>
					<th>Action</th>
				</tr>					
			<?php 
				global $wpdb;
				$get_table_result = $wpdb->prefix . "s_icon";
				$get_social_icons = $wpdb->get_results( "SELECT * FROM $get_table_result Order by Title asc" );
					//print_r($socialicons);
				foreach($get_social_icons as $get_socialicon_result) {
					//FOR GETTING SOCIAL ICONS DATA FROM DATABSE.
			?>				
				<tr>
					<td><input type="checkbox" name="check_list[]" value="<?php echo $get_socialicon_result->Id ?>"></td>							
					<td><?php echo $get_socialicon_result->Title; ?></td>
					<td><?php echo $get_socialicon_result->Url; ?></td>
					<td>
						<i title="<?php echo $get_socialicon_result->Title ?>" style="font-size:32px;" class="<?php echo $get_socialicon_result->Icon; ?>">										
						</i>
						<td>
							<a title="Delete <?php echo $get_socialicon_result->Title;?>" onclick="shw_confirm('<?php echo addslashes($get_socialicon_result->Title)?>','<?php echo $get_socialicon_result->Id;?>');" href="#delete"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
						</td>
					</td>							
				</tr>

			<?php
			 }// END FOREACH.
			?>
				<tr>
					<td colspan="5"><input class="btn btn-primary" type="submit" name="submit" value="Getting Short Code"></td>
				</tr>									
			</table>
		</form>	
	</div>	
	<?php
	
	if(is_admin()){
	$get_social_shortcode = '[social-icons';

	if(($_POST['check_list']) && check_admin_referer('asmi_cre_sc') ) {
        if(is_array($_POST['check_list'])) {
            $set_icons_id='';
        	foreach($_POST['check_list'] as $set_icons) {
           			 $set_icons_id .= $set_icons.",";
       		}
                $set_icons_id = rtrim($set_icons_id,",");
                $get_social_shortcode .= ' selected_icons_id=&quot;'.$set_icons_id .'&quot;'.']';
                $auto_copy='Click To Copy';
                echo '<textarea  rows="3" cols="70" style="resize:none" id="copytext" readonly>'.$get_social_shortcode.'</textarea>';
                echo '<button onclick="click_to_copy()" class="btn btn-primary">'.$auto_copy.'</button>';                	                    
        }
	}
}
else{
	_e('You are not authonticate');
}
					
}//SOCIALMENU FUNCTION END.
//INITIALIZE DATABASE TABLE(PLUGIN TAVLE)
function asmi_init_socialtable () {
	global $wpdb;
	$get_table = $wpdb->prefix . "s_icon";
	if($wpdb->get_var("show tables like '$table_nam'") != $get_table) {
		$sql_create_table = "CREATE TABLE IF NOT EXISTS `$get_table` (
		`Id` INT NOT NULL AUTO_INCREMENT, 
		`Title` VARCHAR(255) NULL, 
		`Url` VARCHAR(255) NOT NULL, 
		`Icon` VARCHAR(255) NOT NULL,		
		PRIMARY KEY (`Id`)) ENGINE = MyISAM;
		INSERT INTO `wp_s_icon` (`Id`, `Title`, `Url`, `Icon`) VALUES	
		(1, 'Twitter', 'https://www.twitter.com/', 'fa fa-twitter');";	
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql_create_table);
	}
}

			
function asmi_init_sc($attr=array()) {
	global $wpdb;
		if(isset($attr['selected_icons_id'])){

			if(is_string($attr['selected_icons_id'])) {
			
			$attr['selected_icons_id'] = preg_replace('/[^0-9,]/','',$attr['selected_icons_id']); //CHECK WEATHER IT IS NUMBER OR NOT AND ALSO REMOVING A WHITE SPACE.
			$selected_icons_id= explode(',', $attr['selected_icons_id']);

			foreach ($selected_icons_id as $get_social_ions) {

				$get_table_name = $wpdb->prefix . "s_icon";						
				$get_icons = $wpdb->get_results("SELECT * FROM ".$get_table_name." WHERE `Id`=$get_social_ions");
				
				foreach ($get_icons as $get_social_icons) {
					
					?>
					<style>
							a{box-shadow: none !important;}	
							i{height: 44px;width:44px;padding: 6px 8px 4px 8px;background: lightgray;}
							i:hover{width:120px;padding: 6px 38px 4px 44px;opacity:0.5;
								background-color: gray;}
						</style>
					<a href="<?php echo $get_social_icons->Url;?>">
								<i title="<?php echo $get_social_icons->Title ?>" style="font-size:32px;" class="<?php echo $get_social_icons->Icon; ?>">
									
								</i>
					</a>
				<?php
				}//END FOREACH

			}//END FOREACH 	
					
		}
				
	}

 }