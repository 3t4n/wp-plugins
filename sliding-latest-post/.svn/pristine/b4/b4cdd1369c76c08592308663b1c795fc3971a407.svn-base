<?php

/*

Plugin Name: Latest Post Carousel Slider

Plugin URI: http://www.dasinfomedia.com

Description: A plugin for wordpress which shows latest 10 posts with carousel sliding effect which is SEO friendly. User can set the height, width, and the time duration of the slide show. Post will be shown with the link nad by clicking on it, user can view particular post.


Author: dasinfomedia

Version: 1.0

Author URI:http://blog.dasinfomedia.com/?p=3
*/




add_action('admin_menu', 'latest_post_optionsmenu');

add_action('plugins_loaded', 'post_widget_init');





function latest_post_optionsmenu() {



    add_options_page('Latest Post Settings', 'Latest Post Settings', 10, 'latestpost', 'latestpost_optionspage');



}



 function get_latestpost() 

 {




		include(ABSPATH .'wp-content/plugins/latest-post-carousel/al_template.php');

	

}



 function post_widget() {



	get_latestpost();



}





function post_widget_init() {

	if ( !function_exists('register_sidebar_widget') )

		return;



	register_sidebar_widget('Latest Post', 'post_widget');

}





 function latestpost_optionspage() 

 {

 	

	

	global $wpdb,$wp_roles, $wp_version;

			require_once(ABSPATH .'wp-admin/includes/upgrade.php');

			

			 $latest_table = $wpdb->prefix . 'latest_post_carousel';

			

			if($wpdb->get_var("show tables like '$latest_table'") != $latest_table)

			{

			

					

				$sql = "CREATE TABLE `".$wpdb->prefix."latest_post_carousel` (

							`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,

							`display_type` VARCHAR( 255 ) NOT NULL ,

							`height` INT( 4 ) NOT NULL ,

							`width` INT( 4 ) NOT NULL ,

							`time` INT( 12 ) NOT NULL

							) ENGINE = MYISAM ;

							";

			
				

				dbDelta($sql);

				$query_insert="INSERT INTO .`".$wpdb->prefix."latest_post_carousel` (`id` ,`display_type` ,`height` ,`width` ,`time`) VALUES ( NULL , 'the_excerpt', 250, 450,5000)";

				$wpdb->query($query_insert);

				

			}

			

	if ($_POST['action'] == 'update') 

	{

	

			

			$updated = true;

			

			

			$height=$_POST['height'];

			$width=$_POST['width'];

			$time=$_POST['time'];

			$d_type=$_POST['content'];

			

			

			

			if($height=='')

			{

				$updated = false;

				$msg.="Please enter height";

			}

			if($width=='')

			{

				$updated = false;

				$msg.="<br>Please enter width";

			}

			if($time=='')

			{

				$updated = false;

				$msg.="<br>Please enter time";

			}

			if($updated == true)

			{



			$time=$time*1000;

			$query_insert="update .`".$wpdb->prefix."latest_post_carousel` set `display_type`='$d_type',`height`=$height ,`width`=$width ,`time`=$time where id=1";

			$wpdb->query($query_insert);		

			}

	

	}

?>

<?php 

if ($updated) { ?>

<div id="message" class="updated fade"><p><strong><?php echo "Option set succesfuly."; // echo $action; ?></strong></p></div>

<?php

} 

else if($updated==false && $msg!="")

{

?>

<div id="message" class="updated fade"><p><strong><?php echo $msg; ?></strong></p></div>

<?php

}



else { ?>

<div id="message" class="updated fade"><p><strong><?php echo "Please update the settings or use default." ?></strong></p></div>

<?php

}

?>

<?php



$query=" SELECT *

FROM `".$wpdb->prefix."latest_post_carousel` where id=1";

$result=mysql_query($query);



while($row=mysql_fetch_array($result))

{

	$d_type=$row['display_type'];

	$height=$row['height'];

	$width=$row['width'];

	$time=$row['time'];;

}



?>



	<div class="wrap">

<h2><?php  _e('Latest Post Settings'); ?></h2>



<form action="options-general.php?page=latestpost" method="post">

<input type="hidden" name="action" value="update" />



<table border="0" bordercolor="#FFFFFF" class="optiontable" style="border:1px dashed #818181; padding:10px;">

<tr valign="top">

<th width="150" height="25" scope="row" ><div align="left">Show Full Content:</div></th>
<td><input type="radio" name="content" value='the_content' <?php if($d_type=='the_content') echo "checked";?> ></td><br/>
</tr>
<tr>

<th width="150" height="25" scope="row" ><div align="left">Show Discription:</div></th>
<td><input type="radio" name="content" value="the_excerpt" <?php if($d_type=='the_excerpt') echo "checked";?> ></td>
</tr>



<tr>

<th width="150" align="left" scope="row"><?php _e('Slideshow Time:') ?></th>
<td><input name="time" type="text" size="4" value="<?php $time=$time/1000; echo $time ?>" />(In seconds)</td>
</tr>

<tr valign="top">

<th width="150" align="left" scope="row"><?php _e('Height:') ?></th>

<td><input name="height" type="text" size="4" value="<?php echo $height ?>" maxlength="4"/></td>
</tr>

<tr>

<th width="150" align="left" scope="row"><?php _e('Width:') ?></th>
  <td><input name="width" type="text" size="4" value="<?php echo $width ?>" maxlength="4" /></td></tr>
</table>

<br/><br/><input type="submit" name="Submit" value="<?php _e('Update Options &raquo;') ?>" /></p>

</form>	



</div>



<?php	

 }



?>