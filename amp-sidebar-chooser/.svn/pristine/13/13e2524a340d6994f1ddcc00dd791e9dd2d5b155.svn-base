<?php function amp_get_sidebar(){
	amp_sidebar_chooser_get_sidebar_default();
}


function amp_sidebar_chooser_get_sidebar_default(){
	global $post;
	//echo (get_post_meta($post->ID, 'amp_sidebar_chooser', true));
	if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'default' && get_post_meta($post->ID, 'amp_sidebar_chooser', true) && get_post_meta($post->ID, 'amp_sidebar_chooser', true) != "none"){
			load_template( TEMPLATEPATH . "/".get_post_meta($post->ID, 'amp_sidebar_chooser', true));
	}
}

function amp_sidebar_chooser_get_sidebar_before(){
	global $post;
	if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'before'){
		if(get_post_meta($post->ID, 'amp_sidebar_chooser', true)){
			echo'<div id="amp-sidebar-chooser-sidebar">';
				load_template( TEMPLATEPATH . "/".get_post_meta($post->ID, 'amp_sidebar_chooser', true));
			echo '</div>';
		}	
	}
}

function amp_sidebar_chooser_get_sidebar_after(){
	global $post;
	if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'after'){
		if(get_post_meta($post->ID, 'amp_sidebar_chooser', true)){
			echo'<div id="amp-sidebar-chooser-sidebar">';
				load_template( TEMPLATEPATH . "/".get_post_meta($post->ID, 'amp_sidebar_chooser', true));
			echo'</div>';
		}	
	}
}


//Save settings from admin menu
function amp_sidebar_chooser_save_options($post){
	delete_post_meta($post, 'amp_sidebar_chooser', get_post_meta($post, 'amp_sidebar_chooser', true));
	delete_post_meta($post, 'amp_sidebar_chooser_position', get_post_meta($post, 'amp_sidebar_chooser_position', true));
	
	if(isset($_POST['amp_sidebar_chooser_select']) && $_POST['amp_sidebar_chooser_select'] != ""){
		update_post_meta($post, 'amp_sidebar_chooser', $_POST['amp_sidebar_chooser_select']);
	}

	update_post_meta($post, 'amp_sidebar_chooser_position', $_POST['amp_sidebar_chooser_position']);

}

// add sidebar chooser meta box to post and page
function amp_sidebar_chooser_add_meta_box(){
	$post_types_dontadd = array(
		'revision',
		'nav_menu_item',
		'attachment',
	);
	$post_types_all = get_post_types();
	$post_types_add = array_diff($post_types_all, $post_types_dontadd);
	
	foreach($post_types_add as $type){
			add_meta_box( 'amp-sidebar-chooser', 'AMP Sidebar Chooser', 'amp_sidebar_chooser_print_meta_box', $type, 'side' ); 
	}

}

function amp_sidebar_chooser_get_sidebars(){
		
$theme = TEMPLATEPATH;
		
		if ($dir = opendir($theme) ){
			$sidebars = array();
			array_push($sidebars, array('slug'=>'none', 'nicename'=>'(None)'));
			while (false !== ($file = readdir($dir))) {
				
				if (substr($file,0,7) == 'sidebar'){
					if($file == 'sidebar.php'){
						$nicename = "Default";
						$file = "sidebar.php";
					}
					else if(strpos(substr($file,7), '-') == 0) {
						$nicename = substr($file,8);
						$nicename = str_replace('-', ' ', $nicename);
						$nicename = str_replace('_', ' ', $nicename);
						$nicename = str_replace('.php', '', $nicename);
						$nicename = ucwords($nicename);
					}

						$thisfile = array(
							'slug' => $file,
							'nicename' =>$nicename
						);
						array_push($sidebars, $thisfile);
				}
			}
			closedir($dir);
		}
		return $sidebars;

}

function amp_sidebar_chooser_print_meta_box(){

	global $post;
	$sidebars = amp_sidebar_chooser_get_sidebars();
	if($sidebars){
		echo'<h4>Choose Sidebar</h4>';
		echo'<select id="amp_sidebar_chooser_select" name="amp_sidebar_chooser_select">';	
		foreach($sidebars as $sidebar){
			echo '<option value="'.$sidebar['slug'].'"';
				if(get_post_meta($post->ID, 'amp_sidebar_chooser', true) == $sidebar['slug']){
					echo' selected="selected"';
				}
			echo'>'.$sidebar['nicename'].'</option>';
		}
		echo'</select>';
		echo'<h4>Choose Location</h4><select id="amp_sidebar_chooser_position" name="amp_sidebar_chooser_position">';
			echo'<option value="default" ';
				if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'default'){
					echo ' selected="selected"';
				}
			echo'>Call explicitly with amp_get_sidebar() (default)</option>';
			echo'<option value="before"';
					if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'before'){
					echo ' selected="selected"';
				}
			echo'>Automatically insert before content</option>';
			echo'<option value="after"';
					if(get_post_meta($post->ID, 'amp_sidebar_chooser_position', true) == 'after'){
					echo ' selected="selected"';
				}
			echo'>Automatically insert after content</option>';
		echo'</select>';
	}

}


// add Submenu to Admin Settings Menu:
function amp_sidebar_chooser_admin_menu(){
	//add_options_page('WP Social Gravatar Box', 'WP Social Gravatar Box', '', 'wp-social-gravatar-box', '');
//function_exists('add_submenu_page') ? add_options_page(__('WP Social Gravatar Box', 'wp-social-gravatar-box'), __('WP Social Gravatar Box', 'wp-social-gravatar-box'), 'manage_options', 'wp-social-gravatar-box-options', 'wp_social_gravatar_box_options') : null;

}

?>