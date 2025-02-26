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

if( isset( $_GET['aid'] ) ){
	 $albumResult = $this->get_album_data( $_GET['aid'] );
	 $galleryResult = $this->get_galleries($albumResult->gallery_id);
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

	$this->print_code(1,$galleryResult[0]->gallery_js,$jsParam,NULL, $_GET['aid'] );
?>


<div class="wrap" id="finGallery">
		<a name="topGal" id="topGal"></a>
	<h2><?php _e('BSG Style Editor'); ?></h2>

	<div style="margin: auto; width: 650px; " id="parent">
		<?php $this->build_image_set($_GET['aid']);?>
	</div>
</div>

<script type="text/javascript" src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php?to=edit_styles&'.time();?>"></script>

<div class="wrap">
	<p class="submit">
		<input type="hidden" name="aid" id="bsg_aid" value="<?php echo $_GET['aid'];?>"/>
		<input type="submit" name="bsg_processStyles" id="bsg_processStyles" value="<?php _e('Process Styles'); ?>" />
	</p>
<textarea style="width:97%;height:300px;" id="bsg_stylesTextarea"><?php echo $this->print_css();?></textarea>
</div>

<?php
}
?>