<?php
function ws_3721up_form(){
	require_once (WS_3721UP_ROOT.'/templates/header.php');
	require_once (WS_3721UP_ROOT.'/templates/post.tpl.php');
	
}

function ws_3721up_admin_menu(){
	require_once (WS_3721UP_ROOT.'/templates/header.admin.php');
	require_once (WS_3721UP_ROOT.'/templates/admin.tpl.php');
	
}

function ws_3721up_admin_menu_constructor(){
	$page = add_options_page(	'千易网盘设置面板'      ,
						'千易网盘(new)',
						'manage_options'  ,
						'ws_3721up_plugin_id'      ,
						'ws_3721up_admin_menu'     );
	
}


function wp_3721up_add_custom_box(){
	add_meta_box( 
	'ws_3721up',
	'千易网盘(new)',
	'ws_3721up_form',
	'post' 
	);
	add_meta_box( 
	'ws_3721up',
	'千易网盘(new)',
	'ws_3721up_form',
	'page' 
	);
	
	
}

//admin init
function ws_3721up_admin_init() {
	wp_register_script('ws_3721up_main_js', WP_PLUGIN_URL . '/1000eb/javascripts/main.js',array('jquery') );
		
}

////////////////////////////////tiny mce BO////////////////////////////////////////
function ws_3721up_admin_header(){
	wp_enqueue_script('ws_3721up_main_js');	
}



function wp_3721up_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
  // 
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
	   
		add_filter("mce_external_plugins", "add_wp_3721up_tinymce_plugin");
		add_filter('mce_buttons', 'register_wp_3721up_button');
   }
}
 
function register_wp_3721up_button($buttons) {
   array_push($buttons, "separator", "wp_3721up");
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_wp_3721up_tinymce_plugin($plugin_array) {
   $plugin_array['wp_3721up'] = WP_PLUGIN_URL . '/1000eb/javascripts/tinymce.js';
   return $plugin_array;
}


function ws_3721up_addQuickTag(){
	$obj = stripslashes(get_option('ws_3721up_api_setting'));
	$src = stripslashes(get_option('ws_3721up_api_setting_api_src'));
	$global_name = get_option('ws_3721up_api_setting_global_name');
	
	echo '<script src="'.$src.'" type="text/javascript"></script>';
?>

<script>

<?php echo "var $global_name = $obj;";?>

$(function(){
	
var tinymce_qttoolbar = document.getElementById("ed_toolbar");  
	

if (tinymce_qttoolbar) {

	var tnewbutton = document.createElement("input");
	tnewbutton.type = "button";
	tnewbutton.id = 'ed_1000eb';
	tnewbutton.className = 'ed_button';
	tnewbutton.value = '▲';
	tnewbutton.onclick = ws_3721up_upload;
	tnewbutton.title = '1000EB';
	tinymce_qttoolbar.appendChild(tnewbutton);
}
	
	
});



function ws_3721up_upload(){
	com1000ebUpload('<?php echo $global_name;?>');
}

</script>


<?php	
	
}
////////////////////////////////tiny mce EO////////////////////////////////////////










function ws_3721up_install(){
	
	add_option('ws_3721up_file_list');	
	add_option('ws_3721up_api_setting');
	add_option('ws_3721up_api_setting_ori');
	add_option('ws_3721up_api_setting_api_src');	
}

function ws_3721up_uninstall(){
	
	//delete_option('ws_3721up_file_list');	
	
}




?>