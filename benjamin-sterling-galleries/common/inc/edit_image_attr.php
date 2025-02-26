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
	$this->adminHeader();
	 $albumResult = $this->get_album_data( $_GET['aid'] );
	 $galleryResult = $this->get_galleries($albumResult->gallery_id);
	$imageList = $this->get_imgs( $_GET['aid'] );
	/*
	echo '<pre>';
	print_r($imageList);
	echo '</pre>';
	*/
?>


<div class="wrap">
		<a name="topGal" id="topGal"></a>
	<h2><?php _e('BSG Image Attribute Editor'); ?></h2>

	<div style="margin: auto; width: 650px; ">
		<table width="100%"  border="0" cellspacing="3" cellpadding="3">
			<thead>
				<tr class="thead">
					<th width="20%">Img</th>	
					<th width="80%" colspan="2">Alt Tag</th>
				</tr>
			</thead>
<?php if($imageList): ?>
			<tbody>
			<?php
				$i = 0;
				foreach($imageList as $image) {
					if($i%2 == 0) {
						$style = 'style=\'background-color: #eee\'';
					}  else {
						$style = 'style=\'background-color: none\'';
					}
			?>
				<tr <?php echo $style;?>>
					<td><img src="<?php echo $image->photo_tnurl;?>"/></td>
					<td><input type="text" id="photo_alt-<?php echo $image->photo_id;?>" name="photo_alt" value="<?php echo $image->photo_alt;?>" size="50"/></td>
					<td width="20%"></td>
				</tr>
			<?php 
					$i++;
				}
			?>
			</tbody>
<?php else: ?>
		
<?php endif;?>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php?to=edit_image_attr&'.time();?>"></script>
<?php
}
?>