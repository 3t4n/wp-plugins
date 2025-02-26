<?php
/*Plugin Name: Fliptu
Plugin URI: http://www.fliptu.com
Description: To manage simple fliptu <iframe></ifeame> via shortcode and widget 
Version: 1.3.1
Author: Fliptu
Author URI: http://www.fliptu.com
*/

/*  Copyright 2013/Fliptu

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
    No animals were harmed in the making of this plugin.
*/
//Insert data in post table while plugin is getting activate

function your_plugin_options_install() {
   	global $wpdb;

	
	$table_name=$wpdb->prefix.'fliptu';
	$create_table="CREATE TABLE IF NOT EXISTS $table_name (
  		id int(11) NOT NULL AUTO_INCREMENT,
  		fliptu_author int(11) NOT NULL,
  		fliptu_title varchar(255) NOT NULL,
		page_slug varchar(255) NOT NULL,
  		fliptu_value text NOT NULL,
		page_id int(11) NOT NULL,
  		status int(2) NOT NULL,
  		PRIMARY KEY (id)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
		$wpdb->query($create_table);
		$insert_flip_home_data=array('fliptu_title'=>'Home Page','fliptu_value'=>'Your Embed script here','fliptu_author'=>'1','page_slug'=>'HOME','status'=>'1');
		$wpdb->insert($table_name, $insert_flip_home_data);
		
	}
// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'your_plugin_options_install');
add_action('admin_init', 'usm_wp_enqueue_scripts');

	/******************************* End Of Code To Create Table When Plugin Is Activated ****************************************************/

   function usm_wp_enqueue_scripts() {
		
		wp_enqueue_style( 'jquery-style',plugin_dir_url(__FILE__).'flip_style');
		wp_enqueue_script( 'jquery-ja',plugin_dir_url(__FILE__).'validate.js');
		
   }


//////////////////////////////////////////////////
//add_menu_page ($ page_title, $ menu_title, $ capability, $ menu_slug, $ function, $ icon_url, $ position);
function ic_myplugin_menu() {
    define("IC_MYPLUGIN_PERMISSIONS", "administrator");
    add_menu_page(
        __("Fliptu Social Media Streams"),
        __("Fliptu Social Media Streams"),
        IC_MYPLUGIN_PERMISSIONS,
        "my-plugin-slug",
        "flip_manage_page"
    );
	add_submenu_page(
        "my-plugin-slug",
        __("Fliptu Social Media Streams"),
        __("View List"),
        IC_MYPLUGIN_PERMISSIONS,
        "my-plugin-slug",
        "flip_manage_page"
    );
    add_submenu_page(
        "my-plugin-slug",
        __("Fliptu Social Media Streams"),
        __("Page Settings"),
        IC_MYPLUGIN_PERMISSIONS,
        "my-plugin-slug-items",
        "ic_add_embed_streams"
    );

   add_submenu_page(
        "my-plugin-slug",
        __("Fliptu Social Media Streams"),
        __("Home Settings"),
        IC_MYPLUGIN_PERMISSIONS,
        "ic_add_embed_home",
        "ic_add_embed_home"
    );
   
   
}
add_action('admin_menu', 'ic_myplugin_menu');

////////////////////////////////////////////////

/***********************************
Function :ic_add_embed_streams
Comment: Here call page to insert new embed code 
*************************************/ 

function ic_add_embed_streams() {
global $wpdb;
$msg='';
include('functions.php');
$table_name=$wpdb->prefix.'fliptu';
echo '<div  class="icon_flip"> <h2>Fliptu Options</h2></div>';

if(isset($_REQUEST['fliptuAdd']) && $_REQUEST['action']=='addData')// Add the flip listing record
	{
		$the_page_name=removeSpecialCharacter($_REQUEST['fliptu_title']);
		$insert_member_data=array('fliptu_title'=>$the_page_name,'fliptu_value'=>stripslashes($_REQUEST['fliptu_value']),'fliptu_author'=>'1','page_slug'=>$the_page_name,'status'=>'1');
		if($_REQUEST['fliptu_title']!='' && $_REQUEST['fliptu_value']!='')
		{
			
			 $flipid=$wpdb->insert($table_name, $insert_member_data);
			 $last_inserted_id = $wpdb->insert_id;
			if($last_inserted_id){
			add_new_page($_REQUEST['fliptu_title'],$the_page_name,$last_inserted_id);
			echo $msg="<span class=success_msg >New Page added successfully !</span>";
			}
		}else{
			$msg="<span class=err_msg >Fill data properly  !</span>";
		}

}else if(isset($_REQUEST['fliptuEdit']) && $_REQUEST['action']=='editData')// Edit the flip listing record
{
		$whereEdit = array('id'=>$_REQUEST['id']);
		$insert_member_data=array('fliptu_value'=>stripslashes($_REQUEST['fliptu_value']));
		$wpdb->update($table_name, $insert_member_data, $whereEdit);
		echo $msg="<span class=success_msg >Data updated successfully !</span><br>";

}

//include file here
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='edit' || $_REQUEST['action']=='editData'))
	{
		include('fliptu_edit.php');
	} else {

		include('fliptu_add.php');
	}


}

/**********************************
Function:ic_add_embed_home
Comments:create  embed code for home page
*********************************/

function ic_add_embed_home(){
global $wpdb;
$table_name=$wpdb->prefix.'fliptu';
echo '<div  class="icon_flip"> <h2>Fliptu Options</h2></div>';
if(isset($_REQUEST['fliptuHomeEdit']) && $_REQUEST['action']=='editHomeData')// Edit the flip listing record
	{
		$whereEdit = array('id'=>$_REQUEST['id'],'page_slug'=>'HOME');
		$insert_member_data=array('fliptu_value'=>stripslashes($_REQUEST['fliptu_value']));
		$wpdb->update($table_name, $insert_member_data, $whereEdit);
		echo $msg="<span class=success_msg >Data updated successfully !</span><br>";

}

include('fliptu_home_setting.php');

}

/**********************************
Function:add_new_page
Comments:create new page with embed code
*********************************/
function add_new_page($the_page_title,$the_page_name,$last_inserted_id){
global $wpdb;
$table_name=$wpdb->prefix.'fliptu';

		   // the menu entry...
		    delete_option($the_page_name."_title");
		    add_option($the_page_name."_title", $the_page_title, '', 'yes');
		    // the slug...
		    delete_option($the_page_name."_name");
		    add_option($the_page_name."_name", $the_page_name, '', 'yes');
		    // the id...
		    delete_option($the_page_name."_page_id");
		    add_option($the_page_name."_page_id", '0', '', 'yes');

		    $the_page = get_page_by_title( $the_page_title );

		 if ( ! $the_page ) {

		// Create post object
		$_p = array();
		$_p['post_title'] = $the_page_title;
		$_p['post_content'] = "[fliptu embed='$last_inserted_id']";
		$_p['post_status'] = 'publish';
		$_p['post_type'] = 'page';
		$_p['comment_status'] = 'closed';
		$_p['ping_status'] = 'closed';
		$_p['post_category'] = array(1); // the default 'Uncatrgorised'

		// Insert the post into the database
		$the_page_id = wp_insert_post( $_p );

		    }
		    else {
			// the plugin may have been previously active and the page may just be trashed...

			$the_page_id = $the_page->ID;

			//make sure the page is not trashed...
			$the_page->post_status = 'publish';
			$the_page_id = wp_update_post( $the_page );

		    }

		    delete_option( $the_page_name."_page_id" );
		    add_option( $the_page_name."_page_id", $the_page_id );
		
		$whereEdit = array('id'=>$last_inserted_id);
		$insert_page_data=array('page_id'=>$the_page_id);
		$wpdb->update($table_name, $insert_page_data, $whereEdit);

		



}
/***********************************
Function :removeSpecialCharacter
Comment: Generate page slug
*************************************/ 
 function removeSpecialCharacter($varName)
	{
		$varRequiredString = preg_replace('/[^a-zA-Z0-9\_\-\.]/', '-', $varName);
		return $varRequiredString;
	}





/***********************************
Function :flip_manage_page
Comment: Here call view all added embed code list
*************************************/ 
function flip_manage_page() {     
global $wpdb;
global $wp_roles;
$current_user=wp_get_current_user();
$msg='';
$where='';
include('functions.php');
$table_name=$wpdb->prefix.'fliptu';
$table_post=$wpdb->prefix.'posts';

	//Action perform here
	if(isset($_REQUEST['status']) && $_REQUEST['status']!='')// change status value here
	{
	$wpdb->query("update $table_post set post_status='".$_REQUEST['status']."' where ID='".$_REQUEST['id']."'");
		
	}else if(isset($_REQUEST['fliptuSearch']) && $_REQUEST['fliptuSearch']!='')// search record here
	{
		$where= " AND F.fliptu_title LIKE '%".$_REQUEST['search']."%' OR F.fliptu_value LIKE '%".$_REQUEST['search']."%'" ;
		
	}else if(isset($_REQUEST['filter']))// Filter records by All/Active/Inactive 
	{
		$where= " AND F.status='".$_REQUEST['filter']."'" ;
	}else if(isset($_REQUEST['fliptuDelete']) && $_REQUEST['action']=='deleteData')// Delete the flip listing record
	{
			$resultPost=$wpdb->get_results("SELECT * FROM $table_post where 1=1 AND ID='".$_REQUEST['page_id']."'");
			
			$the_page_title= $resultPost[0]->post_title;
			$the_page_name= $resultPost[0]->post_name;
			 // the option entry...
		   	 	delete_option($the_page_name."_title");
		     		delete_option($the_page_name."_name");
 				delete_option($the_page_name."_page_id");

			foreach ( $wp_roles->role_names as $role => $name ) :
			if ( current_user_can( $role ) )
			$roles= $role;
			endforeach;
			if ($roles=='administrator')
			{
			$wpdb->query("DELETE from $table_name where id='".$_REQUEST['id']."'");
			$wpdb->query("DELETE from $table_post where ID='".$_REQUEST['page_id']."'");

			$msg="<span class=success_msg >Data deleted successfully !</span><br>";
			}else{
			$msg="<span class=error_msg >Sorry ! You do not have permission to delete.</span><br>";

			}
			
	
	}
	//End Action perform here	
		echo '
    		<div class="wrap">
       		 <div class="icon_flip"><h2>'.__("Fliptu Social Media Streams").'</h2></div>
			 </div><br>
			
			 <div class="update-nag notice is-dismissible">
				<p>
					Due to the fact that our service is renamed, we created the new plugin. It has
					a lot of new features, you can download it <a target="_blank" href="https://wordpress.org/plugins/ampsy">here</a>. This plugin is no longer
					maintained. Thank you.
				</p>
			 </div>

			 ';
		echo $msg;
		?>
		<?php  if((isset($_REQUEST['action'])) && $_REQUEST['action']=='delete'){ ?>
		<!-- Show the Add  of flip ifram entries -->
		<?php include('fliptu_delete.php')?>	
		<!-- End Show the Add of flip ifram entries -->
	       <?php }else{ 


		$resultFlip=$wpdb->get_results("SELECT P.ID,P.post_title,P.post_status,F.id as fid,F.fliptu_value,F.page_id FROM $table_name F INNER JOIN $table_post P ON F.page_id=P.ID where 1=1 AND F.page_slug!='HOME' $where");
		?>
		<!-- Show the Listing of flip ifram entries -->
			<div>
			<form action="admin.php?page=my-plugin-slug-items" method="post">
			<input type='hidden' name='action' value="add">	
			<input class="button-secondary action" type="submit" name="fliptuEdit"  value="Add New Embed Page">
			</form>	
			
	
			<form action="<?php echo $PHP_SELF;?>" method="post">
			<div>   
			<input type='hidden' name='action' value="<?php echo $_REQUEST['action'] ?>">	
			<div id="ext_db_table_div"> 
			<br><br> 
			<a href="admin.php?page=my-plugin-slug">All</a> <span class='count'>(<?php echo (count($resultFlip)) ?>) </span> | 
			<a href="admin.php?page=my-plugin-slug&filter=publish">Published </a><span class='count'> (<?php echo countResult('publish') ?>)</span> | 
			<a href="admin.php?page=my-plugin-slug&filter=trash">Trash </a> <span class='count'>(<?php echo countResult('trash') ?>)</span>
			<span align='right'>
			<input type="text" name="search"><input class="button-secondary action" type="submit" name="fliptuSearch"  value="Search">
			</span>
			<p>All short code for added embed script are give in the front of each list.Use that shor code to display fliptu script anywhere.</p>
			
			
	 		<table  class="widefat" border="1">
			<thead>
			<tr>	
				
				<th scope="col" width="20%">Page Title</th>		
				<th scope="col" width="50%">Embed Code</th> 
				<th scope="col" width="10%">Short Code</th>
				<th scope="col" width="10%">Status</th>
				<th scope="col" width="20%">Action</th> 
			</tr>
			</thead>
			<?php 
			if(count($resultFlip)>0){
				foreach($resultFlip as $result){ 
				$id=$result->fid;
				$pageID=$result->page_id;
				$encodeUrl="id=".$id."&page_id=".$result->page_id;
				?>
				<tbody>	
					
					<td width="20%" ><?php echo $result->post_title; ?></td>
					<td width="50%"><?php echo htmlentities($result->fliptu_value); ?></td>
					<td width="10%"><b>[fliptu embed="<?php echo $id ?>"]</b></td>
					<td width="10%"><?php echo($result->post_status=='publish')?"<a href=admin.php?page=my-plugin-slug&status=trash&id=$pageID>Active</a>":"<a href=admin.php?page=my-plugin-slug&status=publish&id=$pageID>Inactive</a>" ?></td>
					<td width="20%"><a href="admin.php?page=my-plugin-slug-items&action=edit&id=<?php echo $id; ?>">Edit </a>| <a href="admin.php?page=my-plugin-slug&action=delete&_wpnonce=<?php echo base64_encode($encodeUrl)?>">Delete</a> </td>
				</tbody>
				<?php }

			} else {		
			 ?>
				<tbody>	
					<td colspan=3>No Embed Page Found !</td>
				</tbody>
			<?php }?>
			</table><br><br>
			</div>
		</form>		
	<!-- End Show the Listing of flip ifram entries -->

	<?}?>
		
<div>
<?php
} //ends the insert table function


function flip_show_func( $atts ) {
global $wpdb;
$table_name=$wpdb->prefix.'fliptu';
$resultFlip=$wpdb->get_results("SELECT * FROM $table_name where 1=1 AND id='".$atts['embed']."'");
	return $resultFlip[0]->fliptu_value;
}
add_shortcode( 'fliptu', 'flip_show_func' );

// Short code for home
function flip_show_home_func($atts) {
global $wpdb;
$table_name=$wpdb->prefix.'fliptu';

$resultFlip=$wpdb->get_results("SELECT * FROM $table_name where 1=1 AND page_slug='".$atts['embed']."'");
	
	return $resultFlip[0]->fliptu_value;
	
}
add_shortcode( 'FLIPTU_HOME', 'flip_show_home_func' );

//********Create widget Code********* 
//***********************************
function myFliptuWidget() 
{
  echo "<h2>Fliptu</h2>";
}
 
function widget_FliptuScript($args) {
  	extract($args);
 	$options = get_option("widget_FliptuScript");
  	if (!is_array( $options ))
	{
		$options = array(
	      	'title' => 'Title',
		'description' => 'Fliptu Title',
		'embed_height' => ''
	      	); 
 	 }      
 	echo "ffff";
  	echo $before_widget;
    	echo $before_title;
      	echo $options['title'];
	echo $after_title;
	echo $options['description'];
    	//Our Widget Content
    	myFliptuWidget();
  	echo $after_widget;
}
 
function myFliptu_control() 
{
  	$options = get_option("widget_FliptuScript");
  	if (!is_array( $options ))
	{
		$options = array(
	      	'title' => 'Fliptu Title here',
		'description' => 'Embed Script',
		'embed_height' => ''
	      	); 
  	}     
 
	  if ($_POST['myFliptu-Submit']) 
	  {
	    	$options['title'] = 		htmlspecialchars($_POST['myFliptu-WidgetTitle']);
		$options['description'] = 	stripslashes($_POST['myFliptu-WidgetDescription']);
		$options['embed_height'] = 	$_POST['myFliptu-WidgetHeight'];
	    	update_option("widget_FliptuScript", $options);
	  }
 
?>
  <p>
    	<label for="myFliptu-WidgetTitle">Title: </label>
    	<input type="text" id="myFliptu-WidgetTitle" name="myFliptu-WidgetTitle" style="width:200px;" value="<?php echo $options['title'];?>" />
 </p>
 <p>
	<label for="myFliptu-WidgetDescription">Enter <?php echo htmlentities('<iframe>')?> code from fliptustream or flipbook export wizard on fliptu.com: </label>
</p><p>
   	<textarea id="myFliptu-WidgetDescription"  name="myFliptu-WidgetDescription" style="width:310px;height:100px;"> <?php echo $options['description'];?></textarea>
   	 
  </p>
<!--<p><strong>Advance settings:</strong></p><p>
<label for="myFliptu-WidgetHeight">Height: </label>
<input type="text" id="myFliptu-WidgetHeight" name="myFliptu-WidgetHeight" style="width:80px;" value="<?php echo $options['embed_height'];?>" /> px<br>
Leave empty to make Fliptu widget auto-adjustable.Ideal column setting for sidebar widget is one(1).-->
<input type="hidden" id="myFliptu-Submit" name="myFliptu-Submit" value="1" />
</p>
<?php
}
 





function myFliptu_init()
{

$widget_ops = array(
    'classname' => 'Fliptu',
    'description' => __('Use this widget to embed your social media flipstream or your flip book media collections from Fliptu.com ')
);
  //register_sidebar_widget(__('Fliptu'), 'widget_FliptuScript');

  
 wp_register_sidebar_widget('Fliptu', __('Fliptu'), 'widget_FliptuScript', $widget_ops); 
wp_register_widget_control(   'Fliptu', 'myFliptu_control', 400, 300 );    
}
add_action("plugins_loaded", "myFliptu_init");


//End to create widget Code
?>
