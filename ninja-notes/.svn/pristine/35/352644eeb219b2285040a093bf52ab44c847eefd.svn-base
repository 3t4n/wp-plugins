<?php
/*
Plugin Name: Ninja Notes
version: 2.0
Plugin URI: http://code-ninja.co.uk/projects/ninja-tools/ninja-notes/
Description: NOTES App for keeping track of various things
Author: Code Ninja
Author URI: http://www.code-ninja.co.uk/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Variables
global $nn_db_version;
global $NinjaToolsPlugins;
$nn_db_version = "1.0";

//Plugin Information.
$NinjaToolsPlugins['url'][]="http://code-ninja.co.uk/projects/ninja-tools/ninja-notes/";
$NinjaToolsPlugins['WPurl'][]="https://en-gb.wordpress.org/plugins/ninja-notes/";
$NinjaToolsPlugins['Name'][]="Ninja-Notes";
$NinjaToolsPlugins['Description'][]="<b>Ninja Notes</b> is a simple notepad system for Wordpress.
<p>Do you tend to keep all of your notes on a large collection of bits of paper? Would you rather keep them all easily accessable on your WordPress site, so they are all there to your fingers? Then Ninja-Notes is for you.</p>
<p>It lets you have as many separate notepads as you want. Or to have fixed notes per Post/Page</p>
<p>It's a great way to keep track of things.</p>";

//Install
function NinjaNotes_install() {
	global $wpdb;
	global $nn_db_version;
	$table_name = $wpdb->prefix . "ninjanotes";
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		notes text NOT NULL,
		UNIQUE KEY id (id)
	);";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql); 
}

function NinjaNotes_install_data() {
	global $wpdb;
  global $nn_db_version;
  $nn_db_old_version = get_option("nn_db_version");
  if($nn_db_old_version != $nn_db_version){
	  $nn_name="Welcome";
	  $nn_note="Thank you for using Ninja Notes.\nWhen A Ninja handles your Notes, you know they are safe.\n\nCode-Ninja";
	  $addNote = $wpdb->insert( $wpdb->prefix."ninjanotes",array('name' => $nn_name, 'notes' => $nn_note));
    update_option("nn_db_version", $nn_db_version);
  }
  add_option("nn_db_version", $nn_db_version);
}

//Tags & hooks
register_activation_hook(__FILE__,'NinjaNotes_install');
register_activation_hook(__FILE__,'NinjaNotes_install_data');
add_action('admin_menu', 'NinjaNotes_add_post_box' );
add_action('admin_menu', 'NinjaTools_Admin_Menu');
add_action('admin_menu', 'NinjaNotes_menu');
add_action("save_post", "NinjaNotes_save_details",10,2);
add_action('admin_footer', 'NinjaNotes_javascript' );
add_action('wp_ajax_show_ninjanotes', 'NinjaNotes_show_callback' );

//Menu
if (!function_exists('NinjaTools_Admin_Menu')) {
  function NinjaTools_Admin_Menu(){
    if(empty($GLOBALS['admin_page_hooks']['NinjaTools_admin_menu'])){
      add_menu_page('NinjaTools','NinjaTools','manage_options','NinjaTools_admin_menu','NinjaTools_InfoPage',plugins_url('/images/icon.png', __FILE__),40);
    }
  }
}

function NinjaNotes_menu() {
  add_submenu_page( 'NinjaTools_admin_menu','Ninja-Notes', 'Ninja-Notes', 'manage_options', 'NinjaNotes-notepage', 'NinjaNotes_notepage_callback');
}

//Functions
//This function adds the  meta baox to the Write Post Screen
function NinjaNotes_add_post_box() {
  add_meta_box('nn_options','Ninja Notes','NinjaNotes_post_box_content','post','normal','high');
  add_meta_box('nn_options','Ninja Notes','NinjaNotes_post_box_content','page','normal','high');
}

//Save Notes
function NinjaNotes_save_details($post_id){
global $wpdb;
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
  if ( 'page' == $_POST['post_type'] )
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  };
  $wpdb->update($wpdb->prefix."ninjanotes", array('notes' => $_POST['nnnotes']), array('id' => $_POST['nnselect']),array('%s'));
  update_post_meta( $post_id, 'ninjanotes', sanitize_text_field( $_POST['nnselect'] ) );
}


function NinjaNotes_javascript() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
    var selected = jQuery("#nnselect").val()
      var data = {
        'action': 'show_ninjanotes',
        'todo': 'show',
        'pid': selected
      };
      jQuery.post(ajaxurl, data, function(response) {
        document.getElementById("nnnotes").value = response;
      });

    jQuery("#nnselect").change(function() {
      var selected = jQuery("#nnselect").val()
  		var data = {
	  		'action': 'show_ninjanotes',
        'todo': 'show',
		  	'pid': selected
   		};
  		jQuery.post(ajaxurl, data, function(response) {
  			document.getElementById("nnnotes").value = response;
  		});
    });

    jQuery("#Delete").click(function() {
      var selected = jQuery("#nnselect").val()
      var data = {
        'action': 'show_ninjanotes',
        'todo': 'delete',
        'pid': selected
      };
      jQuery.post(ajaxurl, data, function(response) {
        jQuery("#nnselect option:selected").remove();
        jQuery("#nnselect").val($("#nnselect option:first").val());
        var selected = jQuery("#nnselect").val()
        var data = {
          'action': 'show_ninjanotes',
          'todo': 'show',
          'pid': selected
        };
        jQuery.post(ajaxurl, data, function(response) {
          document.getElementById("nnnotes").value = response;
        });
      });
    });

    jQuery("#Save").click(function() {
      var selected = jQuery("#nnselect").val()
      var data = {
        'action': 'show_ninjanotes',
        'todo': 'save',
        'pid': selected,
        data:jQuery("#notes").serialize() 
      };
      jQuery.post(ajaxurl, data, function(response) {
        document.getElementById("nnnotes").value = response;
      });
    });

    jQuery("#New").click(function() {
      var data = {
        'action': 'show_ninjanotes',
        'todo': 'new',
        data:jQuery("#notes").serialize() 
      };
      jQuery.post(ajaxurl, data, function(response) {
        jQuery("#nnselect").append(new Option(response.name, response.pid, true, true));
        document.getElementById("nnnotes").value = response.body;
      },"json");
    });

    jQuery("#New2").click(function() {
      var name = jQuery("#nnname").val();
      var data = {
        'action': 'show_ninjanotes',
        'todo': 'new2',
        'name': name 
      };
      jQuery.post(ajaxurl, data, function(response) {
        jQuery("#nnselect").append(new Option(response.name, response.pid, true, true));
        document.getElementById("nnnotes").value = response.body;
      },"json");
    });


	});
	</script> <?php
}

function NinjaNotes_show_callback() {
	global $wpdb;
  if($_POST['todo']=="show"){
    $pid = intval($_POST['pid']);
    $res = $wpdb->get_var("SELECT `notes` FROM ".$wpdb->prefix."ninjanotes where `id`='".$pid."'");
    echo(stripslashes($res));
  }elseif($_POST['todo']=="delete"){
    $pid = intval($_POST['pid']);
    $wpdb->query("delete from ".$wpdb->prefix."ninjanotes where `id`='".$pid."'");
    echo("");
  }elseif($_POST['todo']=="save"){
    $pid = intval($_POST['pid']);
    parse_str($_POST['data'], $data);
    $nnotes=stripslashes($data['nnnotes']);
    $wpdb->update($wpdb->prefix."ninjanotes", array('notes' => $nnotes), array('id' => $pid),array('%s'));
    echo($data['nnnotes']);
  }elseif($_POST['todo']=="new"){
    parse_str($_POST['data'], $data);
    $name=stripslashes($data['nnname']);
    $wpdb->insert( $wpdb->prefix."ninjanotes",array('name' => $name),array('%s'));
    $lastid = $wpdb->insert_id;
    $response=array( 'body' => "New Note", 'name' => $name, 'pid' => $lastid );
    echo(json_encode($response));
  }elseif($_POST['todo']=="new2"){
    $name=stripslashes($_POST['name']);
    $wpdb->insert( $wpdb->prefix."ninjanotes",array('name' => $name),array('%s'));
    $lastid = $wpdb->insert_id;
    $response=array( 'body' => "New Note", 'name' => $name, 'pid' => $lastid );
    echo(json_encode($response));
  }else{
    echo("Error");
  }
	wp_die(); 
}

//Pages
if (!function_exists('NinjaTools_InfoPage')) {
  function NinjaTools_InfoPage(){
    global $NinjaToolsPlugins;
    include('ninja-tools-information.php');
  }
}

function NinjaNotes_notepage_callback(){
global $wpdb;
$rid=intval($_REQUEST['id']);
?>
<div class="wrap">
  <div class="icon32" id="icon-options-general"><br /></div>
  <h2><img src="<?php echo plugins_url('/images/icon.png', __FILE__);?>" />&nbsp;Ninja Notes</h2>
  <form action='' method='post' id='notes'>
  <?php echo wp_nonce_field('update_notes', 'update_notes_nonce');?>
  <select name="nnselect" id="nnselect">
<?php
$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."ninjanotes order by `name`");
foreach($res as $row){
  echo("<option value='".$row->id."' ");
  if($row->id==$rid) echo(" SELECTED ");
  echo(">".$row->name."</option>");
}
?>
  </select><br/>
  <textarea rows="25" cols="140"  name="nnnotes" id="nnnotes">
Please Select a Note from the dropdown
If there are no notes listed in the dropdown then create a new one.
  </textarea>
  <input type="hidden" name="page_options" value="nnnotes,nnselect" />
  <input type="hidden" name="action" value="update" />
  <p>
  <input type="button" name="Save" id="Save" value="Save"/>
  <input type="button" value="Delete" name="Delete" id="Delete"/>
  <input type="text" name="nnname"><input type="button" value="New Note" name="New" id="New">
  </p>
  </form>
</div>
<?php

}

//metaBox for posts/pages
function NinjaNotes_post_box_content() {
global $wpdb;
?>
<select name="nnselect" id="nnselect">
<?php
$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."ninjanotes order by `name`");
$nid=get_post_meta( get_the_ID(), 'ninjanotes',true);
foreach($res as $row){
  echo("<option value='".$row->id."' ");
  if($row->id==$nid) echo(" SELECTED ");
  echo(">".$row->name."</option>");
}
?>
</select>
<input type="button" value="New Note" name="New2" id="New2">
<input type="hidden" value="POST:<?php echo get_the_ID();?>" name="nnname" id="nnname">
<br/>
<div id="wp-content-editor-container" class="wp-editor-container">
<textarea rows="15" cols="100"  name="nnnotes" id="nnnotes" class="wp-editor-area">
</textarea></div>
<?php
}

?>
