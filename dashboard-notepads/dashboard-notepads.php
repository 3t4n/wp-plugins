<?php
/*
Plugin Name: Dashboard Notepads
Plugin URI: http://www.swedishboy.dk/wordpress/dashboard-notepads/
Description: Add 1-3 different notepad widgets to your Dashboard. Possible to disable Wordpress default Dashboard widgets. Great for developers, admins and users.
Version: 1.2.1
Author: Johan Str&ouml;m
Author URI: http://www.swedishboy.dk/
*/

/* 

hello there! 

	if you read this you probably are a programmer.
	please contribute rather than stealing this code...		
*/

// global version
global $dbn_version;
$dbn_version = 1.2;

function dash_notepad1() {
	dashnote_output(1);
}
function dash_notepad2() {
	dashnote_output(2);
}
function dash_notepad3() {
	dashnote_output(3);
}

function dashnote_output($num) {
	// first of all we check that the user got admin status.
	global $current_user;
	
		
	$user_level = $current_user->user_level;
 
	
	// then we fetch our settings

	$options = dbn_get_options();
	
	// here we save any posted new notes
	if(isset($_POST['notepad_'.$num])) {
		$options['notepad_'.$num] = $_POST['notepad_'.$num];
		update_option('dashnotepads_settings', $options);			
	}

// we only need to caugh once.
if($num==1) {

echo '
<style>
.dash_note {
	width: 99%;
	font-size: 11px;
}
#dashnote_widget_1 .submit, #dashnote_widget_2 .submit,#dashnote_widget_3 .submit {
	text-align: right;
}


';

// style settings echoed
echo $options['notepad_css'].'
</style>';

}


	// time to echo the notepads
	// alias
	$pad = $options['pads'][$num];	
	
		
	$pad_txt = stripslashes($options['notepad_'.$num]);
	
	if( $user_level >= $pad['level_edit'] ) {
		echo '
		<form name="dashboard_notepad_'.$num.'" method="post">		
		<textarea name="notepad_'.$num.'" id="dash_notepad'.$num.'" class="dash_note" rows="'.$pad['rows'].'" cols="15" tabindex="'.$num.'">'.$pad_txt.'</textarea>
		<br />
		<p class="submit" align="right">
		<input type="submit" name="save-notes" id="dashnote_submit" accesskey="n" tabindex="5" class="button" value="Save note" />
		</form>';
		
	}else{
		echo '<p>'.nl2br($pad_txt).'</p>';
	}
}



function dash_notepad1_conf() {
	dashnote_single_conf(1);
}
function dash_notepad2_conf() {
	dashnote_single_conf(2);
}
function dash_notepad3_conf() {
	dashnote_single_conf(3);
}


function dashnote_single_conf($num) {

	// we don't need user?
	global $current_user;	
	
	$user_level = $current_user->user_level;

	$options = dbn_get_options();
		
	// save quick configuration.	
	if(isset($_POST['widget_id']) && $_POST['widget_id']=='dashnote_widget_'.$num) {
		$options['pads'][$num]['title'] = $_POST['title'];
		$options['pads'][$num]['rows'] = is_numeric($_POST['rows']) ? round($_POST['rows']) : 8;
		$options['pads'][$num]['level_edit'] = $_POST['level_edit'];
		$options['pads'][$num]['level_view'] = $_POST['level_view'];
		update_option('dashnotepads_settings', $options);
	}
	
	$title = htmlspecialchars($options['pads'][$num]['title'], ENT_QUOTES);
	$rows = $options['pads'][$num]['rows'];
	$view = $options['pads'][$num]['level_view'];
	$edit = $options['pads'][$num]['level_edit'];
	


?>
	<input type="hidden" name="pad" value="<?php echo $num;?>">
	<p>
	Name
	 <input type="text" size="20" style="width: 150px;" name="title" value="<?php echo $title;?>" />
	<label for="rows" style="padding: 0px 4px; text-align: center; display: inline-block;">	 <?php _e('Text rows'); ?></label>
	<input type="text" name="rows" size="3" maxlength="2" title="Height (in rows) of textarea." value="<?php echo $rows;?>"> 
	 
	</p>
<?php 

// let user edit access levels (only administrators) 
//	this is here only if future versions lets users "configure" widgets.
if($user_level>=8) {
?>
	<p>	 
	 <b style="line-height: 2em;">User level access</b><br />
	 <label for="level_edit" style="width: 40px; text-align: center; display: inline-block;"><?php _e('Edit');?>:</label> 
	 <select name="level_edit" title="Minimum user level that can EDIT this note">
	 <option value="0" <?php if($edit==0) echo 'selected';?>><?php _e('Subscriber');?>	</option>
	 <option value="1" <?php if($edit==1) echo 'selected';?>><?php _e('Contributor');?>	</option>
	 <option value="2" <?php if($edit==2) echo 'selected';?>><?php _e('Author');?>	</option>
	 <option value="5" <?php if($edit==5) echo 'selected';?>><?php _e('Editor');?>	</option>
	 <option value="8" <?php if($edit==8 || !$edit) echo 'selected';?>><?php _e('Administrator');?></option>
	 <option value="11" <?php if($edit==11) echo 'selected';?>><?php _e('* Locked *');?></option>		 
	 </select><br />
	 <label for="level_view" style="width: 40px; text-align: center; display: inline-block;"><?php _e('View');?>:</label> 
	 <select name="level_view" title="Minimum user level that can VIEW this note">
	 <option value="0" <?php if($view==0) echo 'selected';?>><?php _e('Subscriber');?>	</option>
	 <option value="1" <?php if($view==1) echo 'selected';?>><?php _e('Contributor');?>	</option>
	 <option value="2" <?php if($view==2) echo 'selected';?>><?php _e('Author');?>	</option>
	 <option value="5" <?php if($view==5) echo 'selected';?>><?php _e('Editor');?>	</option>
	 <option value="8" <?php if($view==8 || !$view) echo 'selected';?>><?php _e('Administrator');?>	</option>
	 </select>
	</p>
<?php
	}
}



#
#	output of config page
#

function dashboard_notepad_conf() 
{

		global $dbn_version;


		if ( function_exists('current_user_can') && !current_user_can('manage_options') )
			die(__('Cheatin&#8217; uh?'));
		
		$options = dbn_get_options();

		if ( $_POST['dash-call'] ) {
			// Remember to sanitize and format use input appropriately.	

			for($i=1; $i<=$options['use']; $i++) {
				if($i>3) break;
				$options['pads'][$i]['title'] = $_POST['title'.$i];
				$rows = is_numeric($_POST['rows'.$i]) ? round($_POST['rows'.$i]) : 8;
				$options['pads'][$i]['rows'] = $rows;
				$options['pads'][$i]['level_edit'] = $_POST['level_edit'.$i];
				$options['pads'][$i]['level_view'] = $_POST['level_view'.$i];

			}
			$options['disabled_widgets']=array();
			
			if(isset($_POST['widget_off'])) {
				
				foreach($_POST['widget_off'] as $k => $w) 	
					if($w==1) $options['disabled_widgets'][]=$k; //silly check
			
			}
			
			$options['use'] = $_POST['pads'];
			$options['notepad_css'] = $_POST['notepad_css'];
			
			update_option('dashnotepads_settings', $options);
			
			$message = 'Configuration updated.';
		}
		
		// Be sure you format your options to be valid HTML attributes.
		
		foreach($options['pads'] as $key => $p) {
			$titles[$key] = htmlspecialchars($p['title'], ENT_QUOTES);
			$e_levels[$key] = $p['level_edit'];
			$v_levels[$key] = $p['level_view'];
		}

?>
	<div class="wrap">	
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>Dashboard Notepads - <?php _e('Settings'); ?></h2>
	v.<?php echo $dbn_version;
	if($message) echo '<div id="message" class="updated fade"><p>'.$message.'</p></div>';
	?>
	<div class="narrow">
	<form action="" name="dashnote" method="post" id="dashnotepad-conf" onsubmit="return false;">
	<input type="hidden" name="dash-call" value="1">
	<table class="form-table">
	<tr>
	 <th scope="row">
	 Number of notepads<br />
	 </th>
	 <td valign="top" width="200">
	 <select name="pads">
	 <option value="1" <?php if($options['use']==1) echo 'selected';?>>1</option>
	 <option value="2" <?php if($options['use']==2) echo 'selected';?>>2</option>
	 <option value="3" <?php if($options['use']==3) echo 'selected';?>>3</option>
	 </select>
	 </td>
	 <td>
	<div align="right">
		<input type="submit" class="button" name="dashnote-config-submit" value="<?php _e('Update options &raquo;'); ?>" onclick="document.dashnote.submit();" />
	</div>
	 </td>
	</tr>	
	</table>
<?php

	for($a=1; $a<=$options['use']; $a++) {
					if($a>3) break;

?>		
	<hr size="1" noshade color="#bbb" />
	<h3>Notepad <?php echo $a; ?></h3>
	<table class="form-table">		
	<tr>
	 <th scope="row">
	 Name
	 </th>
	 <td colspan="2">
	 <input type="text" size="20" style="width: 150px;" name="title<?php echo $a;?>" value="<?php echo $titles[$a];?>" />
	 </td>
	</tr>
	<tr>
	 <th scope="row">
	 User level access
	 </th>
	 <td>
	 <label for="level_edit" style="width: 40px; display: inline-block;"><?php _e('Edit');?>:</label>
	 <select name="level_edit<?php echo $a; ?>">
	 <option value="0" <?php if($e_levels[$a]==0) echo 'selected';?>><?php _e('Subscriber');?>	</option>
	 <option value="1" <?php if($e_levels[$a]==1) echo 'selected';?>><?php _e('Contributor');?>	</option>
	 <option value="2" <?php if($e_levels[$a]==2) echo 'selected';?>><?php _e('Author');?>	</option>
	 <option value="5" <?php if($e_levels[$a]==5) echo 'selected';?>><?php _e('Editor');?>	</option>
	 <option value="8" <?php if($e_levels[$a]==8 || !$e_levels[$a]) echo 'selected';?>><?php _e('Administrator');?></option>
	 <option value="11" <?php if($e_levels[$a]==11) echo 'selected';?>><?php _e('* Locked *');?></option>		 
	 </select><br />
	 <label for="level_view" style="width: 40px; display: inline-block;"><?php _e('View');?>:</label> 
	 <select name="level_view<?php echo $a; ?>">
	 <option value="0" <?php if($v_levels[$a]==0) echo 'selected';?>><?php _e('Subscriber');?>	</option>
	 <option value="1" <?php if($v_levels[$a]==1) echo 'selected';?>><?php _e('Contributor');?>	</option>
	 <option value="2" <?php if($v_levels[$a]==2) echo 'selected';?>><?php _e('Author');?>	</option>
	 <option value="5" <?php if($v_levels[$a]==5) echo 'selected';?>><?php _e('Editor');?>	</option>
	 <option value="8" <?php if($v_levels[$a]==8 || !$v_levels[$a]) echo 'selected';?>><?php _e('Administrator');?>	</option>
	 </select>
	 </td>
	 <td>
	 <?php if($a==1) echo '	 <span class="description">
		Control what minimum user level can edit and view the note.
	 </span>';?>	 
	 </td>
	</tr>		
	<tr>
	 <th scope="row">
	 <?php _e('Text rows'); ?>
	 </th>
	 <td width="200"><input type="text" name="rows<?php echo $a;?>" size="3" maxlength="2" value="<?php echo $options['pads'][$a]['rows'];?>">
	 </td>
	 <td>
	 <span class="description">
	 <?php if($a==1) echo 'Height (in rows) of textarea.';?>
	 </span>
	 </td>
	</tr>
	</table>
<?php
	}
?>
	<hr size="1" noshade color="#bbb" />
	<h3>Other</h3>
	<table class="form-table">
	<tr>
	 <th scope="row">
	 CSS style
	 <small class="description"><br />
	 Style any way you like.<br />	
<?php
	// we should move this javascript to a js file. but for now let's keep it here.
?>
	<script language="javascript">
	function dn_reset_css() {
		var a = confirm("This resets CSS to default.");
		if(a) {
		document.getElementById('dn_css').value='#dashnote_widget_1 {\n\n}\n#dashnote_widget_2 {\n\n}\n#dashnote_widget_3 {\n\n}';
		}
	}
	</script>
	<br />
	 <button class="button" onclick="dn_reset_css();">Reset CSS</button>
	 </small>
	 </th>
	 <td><textarea name="notepad_css" id="dn_css" cols="25" rows="12" style="font-size: 10px; font-family: mono-space; width: 300px; max-width: 300px;"><?php echo $options['notepad_css'];?></textarea>
	 </td>
	</tr>
	<tr>
	<th scope="row">
	Disable WP-widgets
	 <small class="description"><br />
	 Apply to all users.
	 </span>
	</th>
	<td>
<?php 
$disabled = $options['disabled_widgets']; 
if(!is_array($disabled)) $disabled=array();

$widgets = array('right_now' 		=> 'Right Now',
					 'recent_comments' 	=> 'Recent Comments',
					 'incoming_links'	=> 'Incoming Links', 
					 'plugins'			=> 'Plug-ins', 
					 'quick_press'		=> 'Quick Press',
					 'recent_drafts'	=> 'Recent Drafts',
					 'primary'			=> 'Wordpress Development',
					 'secondary'		=> 'Other News'
					);

	foreach($widgets as $key => $w) {
		echo '
	<input type="checkbox" value="1" name="widget_off['.$key.']"'.(in_array($key,$disabled)?' checked':'').'> '.$w.'<br />';
	}
?>
	</td>
	</tr>
	<tr>
	 <td colspan="2"></td>
	 <td>
		<p class="submit"><input type="submit" name="dashnote-config-submit" value="<?php _e('Update options &raquo;'); ?>" onclick="document.dashnote.submit();" /></p>
	 </td>
	</tr>
	</table>
	</form>
</div>
</div>
	<?php

}


#
# 	update script
#

function dbn_get_options() 
{
		
		global $dbn_version;

		$options = get_option('dashnotepads_settings');	

		if ( !is_array($options) )
			$options = array(
			'version' 	=>  $dbn_version,
			'pads'		=>	array(1=>array()),
			'use' => 1,
			'notepad_css' => "#dashnote_widget_1 {\n\n}\n#dashnote_widget_2 {\n\n}\n#dashnote_widget_3 {\n\n}"
			);
			
		if(!isset($options['version']) || $options['version']<$dbn_version) {
		// version 1.01

			$options['use'] = $options['pads'] ? $options['pads'] : 1;
			$options['pads'] = array(0);
			
				// this is only for update 1.02 from 1.01
			for($i=1; $i<=3; $i++) {
				$options['pads'][$i]['rows']=$options['rows'];
				$options['pads'][$i]['level_view']=8;
				$options['pads'][$i]['level_edit']=8;
				$options['pads'][$i]['title']=$options['pad'.$i.'_title'];
			}
	
			unset($options['pad1_title'],$options['pad2_title'],$options['pad3_title']);
			unset($options['rows']);
			// update version
			$options['version']=$dbn_version;
			update_option('dashnotepads_settings', $options);			
		}
		
		return $options;
}


function dashnote_init() 
{
	add_action('admin_menu', 'dashnote_menu_config');
}

// This is the function that adds a configuration page to settings menu group
function dashnote_menu_config() {
	
	if ( function_exists('add_submenu_page') )
		add_submenu_page('index.php', __('Notepads'), __('Notepads'), 'manage_options', 'dashboard-notepads', 'dashboard_notepad_conf');
}

function add_dashnotes_widget() {

	global $current_user;
	global $dbn_version;
	global $wp_meta_boxes;

	$user_level = $current_user->user_level;

	$options = dbn_get_options();	

			
	if($options['disabled_widgets']) {
		foreach($options['disabled_widgets'] as $off) {
			// Remove the quickpress widget

			if(isset($wp_meta_boxes['dashboard']['side']['core']['dashboard_'.$off]))
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_'.$off]);
			else 
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_'.$off]);	

		}
	}
	
	for($i=1; $i<=$options['use']; $i++) {
		if($i>3) break;

		if($user_level>$options['pads'][$i]['level_view']) {
		
			$title = $options['pads'][$i]['title'];
			if(!$title) $title = 'Notepad '.$i;

			wp_add_dashboard_widget('dashnote_widget_'.$i, __($title), 'dash_notepad'.$i, 'dash_notepad'.$i.'_conf');
		}
	}
} 


add_action('init', 'dashnote_init');
add_action('wp_dashboard_setup','add_dashnotes_widget');

?>