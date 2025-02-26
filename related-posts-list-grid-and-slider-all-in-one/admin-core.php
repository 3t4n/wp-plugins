<?php
//define all variables the needed alot
//delete_option('aio_settings');
include 'the_globals.php';
if($_POST["action"] == 'update')
{
	$related_posts_type = $_POST["related_posts_type"];
	if($related_posts_type == ''){$related_posts_type = 'related_list';}
	
	//----------------------------------------------------list options array values
	$list_title = $_POST["list_title"];
	$list_show_thumbs = $_POST["list_show_thumbs"]; // Display thumbs or not?
	$list_thumbw = $_POST["list_thumbw"]; // Thumbnail thumb width
	$list_thumbh = $_POST["list_thumbh"]; // Thumbnail thumb height
	$list_vspace = $_POST["list_vspace"];
	$list_posts_limit = $_POST["list_posts_limit"]; // How many posts to display?
	$list_show_excerpt = $_POST["list_show_excerpt"];
	$list_excerpt_length = $_POST["list_excerpt_length"];
	$list_use_css3_effects = $_POST["list_use_css3_effects"];
	$list_css3_shadow = $_POST["list_css3_shadow"];
	$list_css3_thumb_radius = $_POST["list_css3_thumb_radius"];
	$default_thumb = $_POST["default_thumb"]; // Default thumbnail thumb
	$list_Style = $_POST["list_Style"];
	$list_text_direction = $_POST["list_text_direction"];
	$list_image_direction = $_POST["list_image_direction"];

	//Validation//

	if($list_title == ''){$list_title = 'Related Posts:';}
	if($list_show_thumbs == ''){$list_show_thumbs = 'Yes';}
	if($list_thumbw < 40) $list_thumbw = 40;
	if($list_thumbh< 40) $list_thumbh= 40;
	if($list_vspace < 2) $list_vspace = 2;
	if($list_custom_image == ''){$list_custom_image = 'Image';}
	if($list_excerpt_length < 8){$list_excerpt_length = '8';}
	if($list_excerpt_length > 30){$list_excerpt_length = '30';}
	if($list_thumbw == ''){$list_thumbw = '40';}
	if($list_thumbh == ''){$list_thumbh = '40';}
	if($list_posts_limit == ''){$list_posts_limit = '5';}
	if($list_use_css3_effects == ''){$list_use_css3_effects = 'None';}
	if($list_excerpt_length == ''){$list_excerpt_length = '10';}
	if($list_excerpt_length < 10){$list_excerpt_length = '10';}
	if($list_excerpt_length > 30){$list_excerpt_length = '30';}
	if($list_text_direction == ''){$list_text_direction = 'ltr';}
	if($list_image_direction == ''){$list_image_direction = 'left';}

	//----------------------------------------------------Get grid options array values
	$grid_title = $_POST["grid_title"];
	$grid_show_images = $_POST["grid_show_images"];
	$grid_imagew = $_POST["grid_imagew"];
	$grid_imageh = $_POST["grid_imageh"];
	$grid_vspace = $_POST["grid_vspace"];
	$grid_hspace = $_POST["grid_hspace"];
	$a_font_size = $_POST["a_font_size"];
	$image_resizing = $_POST["image_resizing"];
	//Validation//
	if($grid_imagew < 90) $grid_imagew = 90;
	if($grid_imageh < 90) $grid_imageh = 90;
	if($grid_title == ''){$grid_title = 'Related Posts:';}
	if($grid_show_images == ''){$grid_show_images = 'Yes';}
	if($grid_imagew == ''){$grid_imagew = '85';}
	if($grid_imageh == ''){$grid_imageh = '85';}
	if($grid_vspace == ''){$grid_vspace = '33';}
	if($grid_hspace == ''){$grid_hspace = '33';}
	if($a_font_size == ''){$a_font_size = '10';}
	if($image_resizing == ''){$image_resizing = '6';}
	//-----------------------------------------------------get slider options array values
	$slider_title = $_POST["slider_title"];
	$slider_show_images = $_POST["slider_show_images"];
	$slider_imagew = $_POST["slider_imagew"];
	$slider_imageh = $_POST["slider_imageh"];
	$slider_custom_image = $_POST["slider_custom_image"];
	$slider_posts_limit = $_POST["slider_posts_limit"];
	$slider_css3_effect = $_POST["slider_css3_effect"];
	//Validation//
	if($slider_imagew < 50) $slider_imagew = 50;
	if($slider_imageh < 50) $slider_imageh = 50;
	if($slider_title == ''){$slider_title = 'You may interest:';}
	if($slider_show_images == ''){$slider_show_images = 'Yes';}
	if($slider_imagew == ''){$slider_imagew = '85';}
	if($slider_imageh == ''){$slider_imageh = '85';}
	if($slider_custom_image == ''){$slider_custom_image = 'Image';}
	if($slider_posts_limit == ''){$slider_posts_limit = '5';}
	if($slider_css3_effect == ''){$slider_css3_effect = 'None';}
	//-----------------------------------------------------Get general options array values
	$thumb_default = $_POST["thumb_default"];
	$use_css3_effects = $_POST["use_css3_effects"];
	$print_credits_link = $_POST["print_credits_link"];
	if($thumb_default == ''){$thumb_default = $aiopluginsurl.'/images/noimage.png';}

$aio_related_posts_settings = 
Array (
		'list_title' => $list_title, // Title of the list related posts block
		'list_vspace' => $list_vspace, // Space between rows
		'list_show_thumbs' => $list_show_thumbs, // Display thumbs or not?
		'list_thumbw' => $list_thumbw, // Thumbnail thumb width
		'list_thumbh' => $list_thumbh, // Thumbnail thumb height
		'list_custom_image' => $list_custom_image, // Use custom field to display images?
		'list_posts_limit' => $list_posts_limit, // How many posts to display?
		'list_show_excerpt' => $list_show_excerpt,
		'list_excerpt_length' => $list_excerpt_length, //by words count
		'list_use_css3_effects' => $list_use_css3_effects,
		'list_css3_shadow' => $list_css3_shadow, //CSS3 No Effect as default [None,5,10,15]
		'list_css3_thumb_radius' => $list_css3_thumb_radius, //CSS3 Effect on images radius [None,10,20,45]
		'default_thumb' => $default_thumb, //Default thumbnail
		'list_image_direction' => $list_image_direction,
		'list_text_direction' => $list_text_direction,
		
		'grid_title' => $grid_title, // Title of the grid related posts block
		'grid_show_images' => $grid_show_images, // Display images or not?
		'grid_imagew' => $grid_imagew, // Thumbnail image width
		'grid_imageh' => $grid_imageh, // Thumbnail image height
		'grid_vspace' => $grid_vspace, // Space between rows
		'grid_hspace' => $grid_hspace, // Space between items
		'a_font_size' => $a_font_size, // Use custom field to display images
		'image_resizing' => $image_resizing, // How many posts to display in the grid view?
		
		'slider_title' => $slider_title, // Title of the slider related posts block
		'slider_show_images' => $slider_show_images, // Display images or not?
		'slider_imagew' => $slider_imagew, // Thumbnail image width
		'slider_imageh' => $slider_imageh, // Thumbnail image height
		'slider_custom_image' => $slider_custom_image, // Use custom field to display images
		'slider_posts_limit' => $slider_posts_limit, // How many posts to display in the slider view?
		'slider_css3_effect' => $slider_css3_effect,
		'thumb_default' => $thumb_default, // Default thumbnail image
		'use_css3_effects' => $use_css3_effects,
		'related_posts_type' => $related_posts_type
	);
	if ($aio_related_posts_settings != '' ) {
	    update_option( 'aio_settings' , $aio_related_posts_settings );
	} else {
	    $deprecated = ' ';
	    $autoload = 'no';
	    add_option( 'aio_settings', $aio_related_posts_settings, $deprecated, $autoload );
	}
		
}else //no update action
{
	$aio_related_posts_settings = aio_read_options();
}

?>
<style>
#aio_admin_main {
text-align:left;
direction:ltr;
padding:10px;
margin: 10px;
background-color: #ffffff;
border:1px solid #EBDDE2;
display: relative;
}
.inner_block{
height: 370px;
display: inline;
min-width:770px;
}
#donate{
    background-color: #EEFFEE;
    border: 1px solid #66DD66;
    border-radius: 10px 10px 10px 10px;
    height: 58px;
    padding: 10px;
    margin: 15px;
    }
.seprator-cells{
border-top: 1px dotted #E9E9E9;
    font-size: 2px;
    line-height: 1px;
    }
.options-tab{
	display:none;
}
.options-tabchecked{
	display: inline;
}
</style>
<div>
		<h3>Related Posts with Thumbnails (<font color="#008000">Lite</font>)</h3>
</div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">


<div class="simpleTabs">
<ul class="simpleTabsNavigation">
    <li><a href="#">General options</a></li>
    <li><a href="#">Layout's manager</a></li>
    <li><a href="#">About</a></li>
</ul>
<div class="simpleTabsContent">
	<table border="0" width="100%" cellspacing="0" cellpadding="0" height="384">
		<tr>
			<td>
	<div style="float: left;width:100%; padding: 4px" id="layer1">
	<table width="55%" height="406" cellspacing="0" cellpadding="0">

			<tr>
				<td width="25%" align="left" rowspan="2">
				<font face="Tahoma" size="2">Title &amp; Limit</font></td>

				<td width="19%" align="center" height="11" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">
				Related custom title</font></td>

				<td width="9%" align="center" height="11" style="padding: 0">
				</td>

				<td width="33%" align="center" height="11" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">Posts limit</font></td>

			</tr>

			<tr>

				<td width="19%" align="center">
				<font face="Tahoma">
				<input type="text" class="form-control" placeholder="Box Title" name="list_title" size="32" style="width: 95; height:22" value="<?php echo $aio_related_posts_settings['list_title']; ?>"></font></td>

				<td width="9%" align="center">
				&nbsp;</td>

				<td width="33%" align="center">
				<font face="Tahoma"><select size="1" name="list_posts_limit">

				<?php for($i=1;$i<=9;$i++)

				{

					if ($i == $aio_related_posts_settings['list_posts_limit'])

						echo '<option selected>'. $i .'</option>';

					else

						echo '<option>'. $i .'</option>';

				}

				?>

				</select></font></td>

			</tr>

			<tr>

				<td width="86%" align="left" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" align="left" rowspan="2">
				<font face="Tahoma" size="2">Thumbnail options</font></td>

				<td width="19%" height="11" align="center" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">Show thumbnails</font></td>

				<td width="9%" height="11" style="padding: 0">

				</td>

				<td width="33%" height="11" style="padding: 0">

				<p align="center">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">
				Resizing</font></td>

			</tr>

			<tr>

				<td width="19%">
				<p align="center">
				<font face="Tahoma"><select size="1" name="list_show_thumbs">

				<?php 
				if ($aio_related_posts_settings['list_show_thumbs'] == 'Yes')
					{
						echo '<option selected>Yes</option>';
						echo '<option>No</option>';
					}
					else
					{
						echo '<option>Yes</option>';
						echo '<option selected>No</option>';
					}
				?>
				</select></font></td>

				<td width="9%">

				&nbsp;</td>

				<td width="33%" align="center">

				<font face="Tahoma">
				<select size="1" name="image_resizing">

				<?php

				$choice = '';

				$list_image_resizing_temp = $aio_related_posts_settings['image_resizing']; ?>

				<?php if ($list_image_resizing_temp == 'crop'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="crop">Crop images</option>
				
				<?php if ($list_image_resizing_temp == 'fit'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="fit">Resize to fit the container</option>

				</select></font></td>

			</tr>

			<tr>

				<td width="86%" align="left" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" rowspan="2" align="left">
				<font face="Tahoma" style="font-size: 10pt">Excerpt options</font></td>

				<td width="19%" align="center" height="11" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">Show Excerpt</font></td>

				<td width="9%" align="center" height="11" style="padding: 0">

				</td>

				<td width="33%" align="center" height="11" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">Excerpt length in words</font></td>

			</tr>

			<tr>

				<td width="19%" align="center">

				<font face="Tahoma"><select size="1" name="list_show_excerpt">
				<?php

				$choice = '';

				$list_show_excerpt_temp = $aio_related_posts_settings['list_show_excerpt']; ?>

				<?php if ($list_show_excerpt_temp == 'Yes'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="Yes">Yes</option>

				<?php if ($list_show_excerpt_temp == 'No'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="No">No</option>

				</select></font></td>

				<td width="9%" align="center">

				&nbsp;</td>

				<td width="33%" align="center">

				<font face="Tahoma">

				<input type="text" class="form-control" name="list_excerpt_length" size="12" value="<?php echo $aio_related_posts_settings['list_excerpt_length']; ?>"></font></td>

			</tr>

			<tr>

				<td width="86%" align="left" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" rowspan="2">
				<font face="Tahoma" size="2">Enable </font>
				<font face="Tahoma" style="font-size: 10pt">CSS3 Effects</font></td>

				<td width="19%" height="11" align="center" style="padding: 0">
				<font style="font-size: 8pt" face="Tahoma" color="#808080">
				Enable <font style="font-size: 8pt">CSS3 Effects</font></font></td>

				<td width="9%" height="11" style="padding: 0">

				</td>

				<td width="33%" align="center" height="11" style="padding: 0">

				</td>

			</tr>

			<tr>

				<td width="19%">

				<p align="center">

				<font color="#FF0000">Premium</font><font face="Tahoma">
								
				</font></td>

				<td width="42%" colspan="2">
				<p align="center">
				<font style="font-size: 8pt" face="Tahoma" color="#808080">Enlarge image when passing the mouse over it</font></td>

			</tr>

			<tr>

				<td width="86%" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" rowspan="2">
				<font face="Tahoma" style="font-size: 10pt">CSS3 effects</font></td>

				<td width="19%" height="11" align="center" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">CSS3 (shadow) effect</font></td>

				<td width="9%" height="11" style="padding: 0">

				</td>

				<td width="33%" align="center" height="11" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">CSS3 (radius) effect</font></td>

			</tr>

			<tr>

				<td width="19%" height="22">
				<p align="center"><font color="#FF0000">Premium</font></td>

				<td width="9%" height="22">

				&nbsp;</td>

				<td width="33%" align="center" height="22">

				<font color="#FF0000">Premium</font></td>

			</tr>

			<tr>

				<td width="86%" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" height="41" rowspan="2">
				<font face="Tahoma" style="font-size: 10pt">Direction</font></td>

				<td width="19%" align="center" height="19" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080">Image direction</font></td>

				<td width="9%" align="center" height="19" style="padding: 0">

				&nbsp;</td>

				<td width="33%" align="center" height="19" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">Text direction</font></td>

			</tr>

			<tr>

				<td width="19%" align="center" height="22">
				<font face="Tahoma"><select size="1" name="list_image_direction">

				<?php

				$choice = '';

				$list_image_dir_temp = $aio_related_posts_settings['list_image_direction']; ?>

				<?php if ($list_image_dir_temp == 'left'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="left">Left</option>

				<?php if ($list_image_dir_temp == 'right'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="right">Right</option>

				</select></font></td>

				<td width="9%" align="center" height="22">

				&nbsp;</td>

				<td width="33%" align="center" height="22">

				<font face="Tahoma"><select size="1" name="list_text_direction">

				<?php

				$choice = '';

				$list_text_direction_temp = $aio_related_posts_settings['list_text_direction']; ?>

				<?php if ($list_text_direction_temp == 'ltr'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="ltr">Left To Right</option>
				
				<?php if ($list_text_direction_temp == 'center'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="center">Center</option>

				<?php if ($list_text_direction_temp == 'rtl'){$choice = 'selected';}else{$choice = '';} ?>

				<option <?php echo $choice ?> value="rtl">Right To Left</option>

				</select></font></td>

			</tr>

			<tr>

				<td width="86%" height="22" colspan="4" class="seprator-cells">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" rowspan="2">
				<font face="Tahoma" size="2">Other options</font></td>

				<td width="19%" height="19" align="center" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">Custom image field</font></td>

				<td width="9%" height="19" style="padding: 0">

				&nbsp;</td>

				<td width="33%" height="19" align="center" style="padding: 0">

				&nbsp;</td>

			</tr>

			<tr>

				<td width="19%">
				<p align="center">
				<font face="Tahoma">
				<input type="text" class="form-control" name="list_custom_image" size="12" value="<?php echo $aio_related_posts_settings['list_custom_image']; ?>"></font></td>

				<td width="9%">

				&nbsp;</td>

				<td width="33%">

				<p align="center">
				&nbsp;</td>

			</tr>

			<tr>

				<td width="25%" height="19">
				<font color="#FFFFFF">_________________________________</font></td>

				<td width="19%" height="19">
				&nbsp;</td>

				<td width="9%" height="19">

				<p align="center"><font color="#FFFFFF">_______</font></td>

				<td width="33%" height="19">

				&nbsp;</td>

			</tr>

			</table>
	
		</div>
			<p>&nbsp;</td>
		</tr>
	</table>
	
	</div>
<script>
function displaytab(tabname)
	{
	curdisplay = document.getElementById(tabname).style.display;
    	if(tabname == 'list-options-tab' && curdisplay != 'inline')
    	{
    		document.getElementById('list-options-tab').style.display = 'inline';
    		document.getElementById('grid-options-tab').style.display = 'none';
    		document.getElementById('slider-options-tab').style.display = 'none';
    	}
    	if(tabname == 'grid-options-tab' && curdisplay != 'inline')
    	{
    		document.getElementById('list-options-tab').style.display = 'none';
    		document.getElementById('grid-options-tab').style.display = 'inline';
    		document.getElementById('slider-options-tab').style.display = 'none';
    	}
    	if(tabname == 'slider-options-tab' && curdisplay != 'inline')
    	{
    		document.getElementById('list-options-tab').style.display = 'none';
    		document.getElementById('grid-options-tab').style.display = 'none';
    		document.getElementById('slider-options-tab').style.display = 'inline';
    	}
	}
</script>

<div class="simpleTabsContent">
<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_list') { $checkvalue = 'checked';}?>
	<label onclick="displaytab('list-options-tab');" class="radio">
		<input id="related_list_radio" type="radio" data-toggle="radio" value="related_list" name="related_posts_type" <?php echo $checkvalue ?> checked >
	<h4>Show Related Posts As List:
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_list') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?></h4>
	</label>
<div class="options-tab<?php echo $checkvalue; ?>" id="list-options-tab">
	<p><span class="st">&nbsp;&nbsp; In this mode the related posts to your 
	content will be displayed as a list of items row by row as a list, each row 
	(post) contain an image ant title and a small excerpt, you can change the 
	values for those elements to mach your needs as you like, at the options 
	block you can see that there is a default and best values web prefer for 
	each option, we recommend to let take the default values to get the best 
	view.</span></p>
	<table width="64%" height="51" cellspacing="0" cellpadding="0">

			<tr>

				<td width="25%" rowspan="2" align="left">
				<font face="Tahoma" style="font-size: 10pt">Thumbnail options</font></td>

				<td width="19%" height="20" align="center" style="padding: 0">
				<font face="Tahoma" style="font-size: 8pt" color="#808080"> 
				&nbsp;Thumbnail width</font></td>

				<td width="9%" height="20" style="padding: 0">

				</td>

				<td width="19%" align="center" height="20" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">
				Thumbnail height</font></td>

			</tr>

			<tr>

				<td width="19%" height="41" align="center" style="padding: 0">

				<font color="#808080" face="Tahoma">
				<span style="font-size: 8pt">

				<input type="text" placeholder="Min : 40 & Best: 65" class="form-control" placeholder="Thumb width in pixels" name="list_thumbw" size="12" value="<?php echo $aio_related_posts_settings['list_thumbw']; ?>"></span></font></td>

				<td width="9%" height="41" style="padding: 0">

				<p align="center">
				<img border="0" src="<?php echo $aiopluginsurl; ?>/images/thumbnailwh.png"></td>

				<td width="19%" align="center" height="41" style="padding: 0">

				<font face="Tahoma">

				<input type="text" placeholder="Min : 40 & Best: 65" class="form-control" placeholder="Thumb hieght in pixels" name="list_thumbh" size="12" value="<?php echo $aio_related_posts_settings['list_thumbh']; ?>"></font></td>

			</tr>

			<tr>

				<td width="25%" rowspan="3" align="left">
				Spacing</td>

				<td width="19%" height="19" align="center" style="padding: 0">

				<font face="Tahoma" style="font-size: 8pt" color="#808080">Vertical space between 
				rows</font></td>

				<td width="9%" height="19" style="padding: 0">

				&nbsp;</td>

				<td width="19%" align="center" height="19" style="padding: 0">

				&nbsp;</td>

			</tr>

			<tr>

				<td width="19%" height="33" align="center" style="padding: 0">

				<font face="Tahoma">
				<input type="text" class="form-control" name="list_vspace" size="12" value="<?php echo $aio_related_posts_settings['list_vspace']; ?>"></font></td>

				<td width="9%" height="33" style="padding: 0">

				<p align="center"><img border="0" src="<?php echo $aiopluginsurl; ?>/images/vspace.png"></td>

				<td width="19%" align="center" height="33" style="padding: 0">

				&nbsp;</td>

			</tr>

			</table>
</div>
		
	<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_grid') { $checkvalue = 'checked';}?>
	<label onclick="displaytab('grid-options-tab');" class="radio">
		<input type="radio" data-toggle="radio" value="related_grid" name="related_posts_type" <?php echo $checkvalue ?>>
	<h4>Show Related Posts As Grid:
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_grid') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?>
	</h4>
	</label>
<div class="options-tab<?php echo $checkvalue; ?>" id="grid-options-tab">
	<p><span class="st">&nbsp;&nbsp; In this mode the related posts to your 
	content will be displayed as a list of items as a grid of rows, each row 
	contain some items and each item (post) an image and title</span></p>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div id="layer2">
		<table border="0" width="641" height="190" cellspacing="0" cellpadding="0">
			<tr>
				<td width="587" style="border-top: 1px dotted #E9E9E9; border-bottom: 1px dotted #E9E9E9; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
				<p align="center"><font color="#C47500" size="5"><b>
			<a target="_blank" href="http://www.wp-buy.com/product/related-posts-all-in-one/">
		Live Preview &amp; pricing</a></b></font></td>
			</tr>
			</table></div>
&nbsp;</td>
	</tr>
</table>
</div>
	<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_slider') { $checkvalue = 'checked';}?>
	<label onclick="displaytab('slider-options-tab');" class="radio">
		<input type="radio" data-toggle="radio" value="related_slider" name="related_posts_type" <?php echo $checkvalue ?>>
	<h4>
	Show Related Posts As 
	Bottom jQuery Slider:
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_slider') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?>
	</h4>
	</label>
<div class="options-tab<?php echo $checkvalue; ?>" id="slider-options-tab">
	<p>It works by creating &quot;<b>slides</b>&quot; of related 
	posts and you have several options for customization</p>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="60%">
		<div id="layer3">
		<table border="0" width="642" height="149" cellspacing="0" cellpadding="0">
			<tr>
				<td width="641">
				<p align="center"><font color="#C47500" size="5"><b>
			<a target="_blank" href="http://www.wp-buy.com/product/related-posts-all-in-one/">
		Live Preview &amp; pricing</a></b></font></td>
			</tr>
			</table></div>

				<p>&nbsp;</td>
			</tr>
	</table>
</div>

</div>

<div class="simpleTabsContent">
		<h4>Key features</h4>
		<ul>
			<li><font style="font-size: 10pt" face="Tahoma">Help your readers discover your own related content by 
			automatically linking to it at the bottom of each post.</font></li>
			<li><font style="font-size: 10pt" face="Tahoma">Help your readers find other related content from your old 
			content</font></li>
			<li><strong>Customize thumbnail layout</strong> as you like</li>
			<li><font style="font-size: 10pt" face="Tahoma"><b>Automatic</b>: it will 
			start displaying related posts on your site automatically after the 
			content when you activate the plugin. No need to edit template files</font></li>
			<li><font style="font-size: 10pt" face="Tahoma"><b>The algorithm</b>: Find 
			related posts by title and/or content of the current post</font></li>
			<li><font style="font-size: 10pt" face="Tahoma">An advanced and 
			versatile algorithm: Using a customizable algorithm considering post 
			titles, content, tags, categories, and custom taxonomies</font></li>
			<li><font style="font-size: 10pt; font-weight:700" face="Tahoma">Thumbnail support:
			</font>
			<ul>
				<li><font style="font-size: 10pt" face="Tahoma">Support for 
				WordPress post thumbnails</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Auto-extract the 
				first image in your post to be displayed as a thumbnail</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Manually enter 
				the URL of the thumbnail via WordPress meta fields. Specify this 
				using the meta box in your Edit screens.</font></li>
			</ul></li>
			<li><font style="font-size: 10pt" face="Tahoma"><b>Styles</b>: The 
			output is wrapped in CSS classes which allows you to easily style 
			the list.</font></li>
			<ul>
				<li><font style="font-size: 10pt" face="Tahoma">List mode - Grid 
				mode - Slider mode</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">There are Three 
				designs and you can shift between them as you like.</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Every design has 
				its own options to match your site needs.</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">You can change 
				the image sizes or displaying modes, excerpt length, CSS3 
				effects, use custom image field, etc..</font></li>
			</ul>
			<li><font style="font-size: 10pt; font-weight: 700" face="Tahoma">Customisable output: 
			</font>
			<ul>
				<li><font style="font-size: 10pt" face="Tahoma">Display excerpts 
				in post. You can select the length of the excerpt in words</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Control on font 
				size</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Control on CSS3 
				effects</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Control on 
				spacing between elements (rows or columns)</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Control the 
				thumbnail width &amp; height for every mode</font></li>
				<li><font style="font-size: 10pt" face="Tahoma">Control on
				<font style="font-size: 10pt">Slider Border effect</font></font></li>
				<li><font face="Tahoma" size="2">Ability to show/hide images in 
				the output list</font></li>
				<li><font face="Tahoma" size="2">You can set a customized title 
				for your output</font></li>
				<li><font face="Tahoma" size="2">Control the posts limit you 
				want to display</font></li>
				<li><font face="Tahoma" size="2">Image resizing options (Crop - 
				Resize) to control image's view</font></li>
				<li><font face="Tahoma" size="2">Right To Left languages are 
				supported</font></li>
				<li><font face="Tahoma" size="2">You can get images from custom 
				wordpress meta fields</font></li>
				<li><font face="Tahoma" size="2">You have a list of CSS3 
				(shadow) effect's to apply on elements</font></li>
				<li><font face="Tahoma" size="2">You have a list of CSS3 
				(radius) effect to apply on elements</font></li>
			</ul></li>
		</ul>
		<p><font style="font-size: 10pt" face="Tahoma">This is the new version of&nbsp;Related Posts with Thumbnails (Premium) 
		and you may have a notes</font></p>
		<p><font style="font-size: 10pt" face="Tahoma">feel free to tell us with your notes as soon 
		as you have any</font></p>
		<p><font style="font-size: 10pt" face="Tahoma">thank you</font></div>
<script>$("select").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});</script>
<p>	<input type="submit" value="     Save all Settings     " name="B4" class="btn btn-success"></p>
</div><!--SimpleTabs End-->
</form></div>