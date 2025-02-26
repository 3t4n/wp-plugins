<?php

/*  Copyright 2007 Benjamin Sterling  (email : benjamin.sterling@kenzomedia.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
$base_name = plugin_basename($this->file);
$base_page = 'admin.php?page='.$base_name;

if( isset( $_GET['id'] ) ){
	 $albumResult = $this->get_album_data( $_GET['id'] );
	 $galleryResult = $this->get_galleries($albumResult->gallery_id);
?>


<div class="wrap" id="finGallery">
		<a name="topGal" id="topGal"></a>
	<h2><?php _e('Benjamin Sterling Galleries Builder'); ?></h2>
	<div style="margin: auto; width: 650px; ">
		<p>Here is a preview of your gallery.  You can <a href="#add">add more/delete images</a> or <a href="#edit">edit the params</a></p>
	</div>
	<div style="margin: auto; width: 650px; padding-bottom:15px; ">
	<a href="<?php echo $base_page;?>&amp;action=edit_styles&amp;aid=<?php echo $_GET['id'];?>">Edit Styles</a>
	|
	<a href="<?php echo $base_page;?>&amp;action=edit_image_attr&amp;aid=<?php echo $_GET['id'];?>">Edit Images</a>
	</div>
	<div style="margin: auto; width: 650px; " id="parent">
		<?php 
		//$this->build_img_list( $_GET['id'], $albumResult->album_uselarge);
		$this->build_image_set($_GET['id']);
		//bsg_retievePhotosBuild($_GET['id'],$albumResult->gallery_id,stripslashes($albumResult->album_params));?>
	</div>
</div>

<?php
/*
	$this->print_code(0);
	if (!extension_loaded('json')){
		include_once($this->dir.'/common/inc/JSON.php');
		$json = new JSON;
		$objs = $json->unserialize(stripslashes($albumResult->album_params));
	}
	else{
		$objs = json_decode(stripslashes($albumResult->album_params));
	}
	$jsParam = array();
	if($objs){
		foreach($objs as $obj => $k){
			$k = (is_numeric($k) || is_bool($k)) ? $k : '"'.$k.'"';
			array_push($jsParam, $obj . ':' . $k);
		}
	}

	$this->print_code(1,$galleryResult[0]->gallery_js,$jsParam,NULL, $_GET['id'] );
*/
}
?>
<div class="wrap" id="startGallery">
	<h2><?php _e('Benjamin Sterling Galleries Builder'); ?></h2>
	<a name="add" id="add"></a>
	<div>
		<form action="" method="post" id="bsg-conf" style="margin: auto; width: 650px; ">
			<input type="hidden" name="hiddenService" value=""/>
			<table width="100%" cellpadding="3" cellspacing="3" border="0">
				<tbody>
					<tr>
						<td colspan="2">
							Please select an option from where you will be pulling your images from
						</td>
					</tr>
					<tr>
						<td width="235"><label for="picasa"><input type="radio" name="service" value="picasa" id="picasa" alt=".forPicasa"/> Picasa</label></td>
						<td>
							This option will pull your gallery information from a Picasa Album RSS feed.  When on a Picasa Album page, you can grab the RSS feed from the bottom right corner.
						</td>
					</tr>
					<tr>
						<td width="235"><label for="flickr"><input type="radio" name="service" value="flickr" id="flickr" alt=".forFlickr"/> Flickr</label></td>
						<td>
							This option will pull your gallery information from a Flickr RSS feed.  When on a Flickr Photos page, you can grab the RSS feed from the bottom left.
						</td>
					</tr>
					<tr>
						<td width="235"><label for="locally"><input type="radio" name="service" value="locally" id="locally" alt=".forLocally"/> Locally from Database</label></td>
						<td>
							This option will pull your gallery information from the database grabbing all attachments that are JPG, GIF, or PNG.
						</td>
					</tr>
					<tr>
						<td width="235"><label for="browsable"><input type="radio" name="service" value="browsable" id="browsable" alt=".forBrowsable"/> Browsable Directory</label></td>
						<td>
							This option will pull your gallery information from a folder on your server.  This will only grab that paths images in the folder supplied and all child folders.
						</td>
					</tr>
				</tbody>
			</table>
<?php $this->getFormParts('picasaOptions');?>
<?php $this->getFormParts('picasaBasic');?>
<?php $this->getFormParts('picasaAdvanced');?>
<?php $this->getFormParts('browseBasic');?>
<?php $this->getFormParts('flickrOptions');?>
<?php $this->getFormParts('flickrBasic');?>
<?php $this->getFormParts('flickrAdvanced');?>
			<p class="submit">
				<input type="submit" name="getGallery" id="bsg_getGallery" value="<?php _e('Get Gallery &raquo;'); ?>" />
			</p>
		</form>
	</div>
</div>

<div class="wrap bsgNotice" style="display:none;"></div>

<div class="wrap" id="buildGallery">
	<form action="" method="post" id="bsg_galBuild" style="margin: auto; width: 650px; ">
		<input type="hidden" name="album_id" value="<?php echo $_GET['id'];?>"/>
		<table width="100%" cellspacing="15">
			<thead>
				<tr>
					<th>Doubleclick on the images you want to add and they will be moved to the box on the right.</th>
					<th>Below, if you have not figured it out, is the box on the right.  Doubleclick on a image if you want to remove it.  Click and drag an image if you want to reorder it.</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="50%" valign="top" align="center">
						<a href="#" id="bsg_add_all">Add All</a><br/>
						note: if you have a lot of images the browser may hang for a second or so
					</td>
					<td width="50%" valign="top" align="center">
						<a href="#" id="bsg_remove_all">Remove All</a><br/>
						note: if you have a lot of images the browser may hang for a second or so
					</td>
				</tr>
				<tr>
					<td width="50%" style="border:1px solid #ccc;" valign="top">
						<ul id="selectList"></ul>
					</td>
					<td width="50%" style="border:1px solid #ccc;" valign="top">
						<ul id="imageList"><?php $this->get_img_list( $_GET['id']	);?></ul>
					</td>
				</tr>
			</tbody>
		</table>
		<a name="edit" id="edit"></a>
		<table width="100%" cellpadding="3" cellspacing="3" border="0">
			<tbody>
				<tr>
					<td>Use Large Size for this gallery </td>
					<td><input type="checkbox" name="bsg_album_uselarge" value="1" <?php if($albumResult->album_uselarge == 1) echo 'checked="checked"';?>/></td>
				</tr>
				<tr>
					<td>What structure do you want it in?</td>
					<td>
						<select name="bsg_structure" id="bsg_structure">
							<option <?php if($albumResult->album_structure == 'li') echo 'selected="selected"';?> value="li">Unordered List (Default)</option>
							<option <?php if($albumResult->album_structure == 'table') echo 'selected="selected"';?> value="table">Table</option>
							<option <?php if($albumResult->album_structure == 'div') echo 'selected="selected"';?> value="div">DIV</option>
							<option <?php if($albumResult->album_structure == 'empty') echo 'selected="selected"';?> value="empty">Empty (no wrapper)</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Name your gallery</td>
					<td><input type="text" name="bsg_galleryName" value="<?php echo $albumResult->album_title;?>"/></td>
				</tr>
				<tr>
					<td>Select the gallery style</td>
					<td><?php echo $this->get_galleries_selectMenu($albumResult->gallery_id);?></td>
				</tr>
				<tr>
					<td colspan="2" id="selectGalleryUrl"></td>
				</tr>
			</tbody>
		</table>
		
		<fieldset>
			<legend>Optional Params</legend>
			<table id="params" width="100%" cellpadding="3" cellspacing="3" border="0">
				<tbody><?php $this->get_OptionTable($albumResult->album_params, $albumResult->gallery_id);?></tbody>
			</table>
		</fieldset>
	
		<p class="submit">
			<input type="submit" name="setGallery" id="setGallery" value="<?php _e('Generate Gallery &raquo;'); ?>" />
		</p>
	</form>
</div>
<?php if( !isset( $_GET['id'] ) ){?>
<div class="wrap" style="display:none;" id="finGallery">
	<a name="topGal" id="topGal"></a>
	<h2><?php _e('Benjamin Sterling Galleries Builder'); ?></h2>
	<div style="margin: auto; width: 650px; "><strong>Success!!</strong> A preview of your gallery is below.</div>
	<div style="margin: auto; width: 650px; padding-bottom:15px;">
	<a href="<?php echo $base_page;?>&amp;action=edit_styles&amp;aid=" class="editLinks">Edit Styles</a>
	|
	<a href="<?php echo $base_page;?>&amp;action=edit_image_attr&amp;aid=" class="editLinks">Edit Images</a>
	</div>
	<div style="margin: auto; width: 650px;" id="parent">
		<ul id="theBSGGallery" style="position:relative;list-style:none;padding:0;margin:0;"></ul>
	</div>
</div>
<?php }?>