<?php
/*
Plugin Name: Advert Manager
Plugin URI: http://isitesolution.com
Description: Manage your sponsor ads on every post and pages. Enjoy mga Bayot... 
Version:1.0
Author: Joseph Mendez
Author URI: http://isitesolution.com

Copyright 2010 Joseph M. Mendez

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if(!class_exists(advert_manager)){
class advert_manager{

function add_options(){
	$myplug = add_options_page('Advert Manager by isitesolution.com','Advert Manager','administrator',basename(__FILE__),array('advert_manager',advertmanaging));
	add_action( "admin_print_scripts-$myplug", array('advert_manager',my_admin_scripts) );
	add_action( "admin_print_styles-$myplug", array('advert_manager',my_admin_styles) );
}
function advertmanaging(){
	echo '<div class="wrap">';
	screen_icon();
	echo '<h2>Advert Manager</h2>';
	echo '<div class="option-advert">'; ?>
	<div class="the-advert">
	<div class="alist"><a href="javascript:void(0)" title="Add New Advert" class="anew">Add New Advert</a></div>
	<div class="alist"><a href="javascript:void(0)" title="View Adverts" class="aview">View All Advert</a></div>
	</div>	
	<?php
	$urltarget = WP_PLUGIN_URL.'/advert-manager/';
	?>
<form style="width: 100%; float: left;" id="saveadverts" class="tabletop">	
	<table>
	<tr><td>
	<div id="upload_button" alt="<?php echo $urltarget; ?>"><span>Upload Advert Here<span></div>
	<span id="status_message" ></span><p id="imgshow"></p>
	<p id="p"></p>
	<td></tr><tr><td>
		<label for="advertimage"><strong>Advert Generated Image Source </strong>(<em>shown upon successful image upload</em>)</label><br/>
		<textarea readonly id="files_list" style="height:30px;" cols="130"></textarea>	
		</td></tr><tr><td><br/><br/>
		<label for="advertgetitle"><strong>Advert Title</strong>(<em>required</em>)</label><br/>
		<textarea id="advert_gettitle" rows="2" cols="80" name="advert_gettitle"></textarea>
		</td></tr><tr><td><br/><br/>
		<label for="advertdescription"><strong>Advert Description</strong>(<em>required</em>)</label>
		<p>note: instead of image your can insert javascript or text for your advert here...</p>
		<textarea id="advert_desc" rows="2" cols="80" name="advert_desc"></textarea>
		</td></tr><tr><td><br><br>
		<label for="advertpostpage"><strong>Page/Post Title where you want the advert to show..</strong>(<em>required</em>)</label><br/>
		<?php
			global $wpdb;
			$query = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_title!=''");
			echo '<select name="option_title" id="advert_title">';
			foreach ($query as $post) :
			echo '<option>'.$post->post_title.'</option>';
			endforeach;
			echo '</select>';
		?><br><br></td></tr><tr><td>
		<label for="advertdescription"></strong>Advert URL </strong>(<em>sample: http://www.facebook.com </em>)</label><br/>
		<input id="advert_url" size="80" name="advert_url"/>
		</td></tr><tr><td>
		<input type="submit" name="SaveAdvert" alt="<?php echo WP_PLUGIN_URL.'/advert-manager/'; ?>" onclick="return false" value="Add New Advert" class="saveadvert">
		</td></tr>
		</table>
		</form>
		<table  class="tablebot" style="width: 100%; float: left; border:1px solid #ccc;background:#eee;font-size:11px !important;">
		<tr style="border:1px solid #ccc;">
		<td style="border:1px solid #ccc;"><strong>No</strong></td>
		<td style="border:1px solid #ccc;"><strong>Advert Title</strong></td>
		<td style="border:1px solid #ccc;"><strong>Shown on post/page title</strong></td>
		<td style="border:1px solid #ccc;"><strong>URL</strong>(website)</td>
		<td style="border:1px solid #ccc;"><strong>Image Preview</strong></td>
		<td style="border:1px solid #ccc;"><strong>Description</strong></td>
		<td style="border:1px solid #ccc;"><strong>Status</strong></td>
		<td style="border:1px solid #ccc;"><strong>Options/Actions</strong></td>
		</tr>
		<?php
			global $wpdb;
			$s = $wpdb->get_results("SELECT * FROM wp_advertmanage_joseph_db");
			foreach ($s as $key=>$post) :
			echo '<tr style="border:1px dotted #ccc;background:#fff;">';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.($key+1).'</td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.$post->post_title.'</td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.$post->advert_text.'</td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.$post->advert_url.'</td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;"><img width="300px" src="'.$post->advert_img.'" /></td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.$post->advert_description.'</td>';
			echo '<td style="border:1px dotted #ccc;background:#fff;">'.$post->status.'</td>';		
			echo '<td style="border:1px dotted #ccc;background:#fff;">
			<a  alt="'.$post->id.'" eact="deleteadvert" etar="'.WP_PLUGIN_URL.'/advert-manager/" class="aclickmanage" href="javascript:void(0)">Delete</a> 
			<a  alt="'.$post->id.'" eact="ableadvert" setvalu="'.($post->status=='Active'?'Deactive':'Activate').'"  etar="'.WP_PLUGIN_URL.'/advert-manager/"
			class="aclickmanage" href="javascript:void(0)">'.($post->status=='Active'?'Deactive':'Activate').'</a>
			</td></tr>';		
			endforeach;
		?>
		</table>	
<?php
	echo '</div></div>';			
}
function my_admin_scripts(){
	//$p =  WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';	
	wp_register_script('my-jquery', WP_PLUGIN_URL.'/advert-manager/js/jquery-1.3.2.js');
	wp_register_script('my-upload', WP_PLUGIN_URL.'/advert-manager/js/ajaxupload.3.5.js');
	wp_register_script('my-uploader', WP_PLUGIN_URL.'/advert-manager/js/jsuploading.js');		
	wp_enqueue_script('my-jquery');
	wp_enqueue_script('my-upload');
	wp_enqueue_script('my-uploader');	
}
function my_admin_styles(){
	wp_register_style('my-style', WP_PLUGIN_URL.'/advert-manager/css/style.css');
	wp_enqueue_style('my-style');
}
function advert_install(){
	global $wpdb;
	$table_name = $wpdb->prefix . "advertmanage_joseph_db";
	if($wpdb->get_var("SHOW tables like '$table_name'") != $table_name) {
	  $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  time bigint(11) DEFAULT '0' NOT NULL,
		  post_title text NOT NULL,
		  advert_text text NOT NULL,
		  advert_url text NOT NULL,
		  advert_img text NOT NULL,
		  advert_description text NOT NULL,
		  status text NOT NULL,
		  UNIQUE KEY id (id)
	);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		}
	  }	
   }
}
$new = new advert_manager;
add_action("admin_menu", array($new,'add_options'));
//add_action('admin_print_scripts', array($new, 'my_admin_scripts'));
//add_action('admin_print_styles', array($new, 'my_admin_styles'));
register_activation_hook(__FILE__,array($new, 'advert_install'));

function get_adverthere(){
global $post;
global $wpdb;
$g = get_bloginfo( template_url );
$t = WP_PLUGIN_URL.'/advert-manager/uploads';
$tit = get_the_title();
		$imgset = $wpdb->get_results("SELECT * FROM wp_advertmanage_joseph_db WHERE post_title='$tit' ORDER BY id ASC LIMIT 1", ARRAY_A);
		if($imgset==NULL){
			return  $t.'/images/default-ads.jpg';
		}else{
			foreach ($imgset as $val) :
				//return $post->advert_img;	
				$advr = $val;
			endforeach;
			return $advr;
		}
		//return $advr;
}