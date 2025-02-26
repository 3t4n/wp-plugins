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
### Some Variables
$base_name = plugin_basename($this->file);
$base_page = 'admin.php?page='.$base_name;
$mode = trim($_GET['mode']);

### Determines Which Mode It Is
switch($mode) {
		//  Deactivating WP-PostRatings
		case 'end-UNINSTALL':
			break;
		case 'update':
			$this->bsg_update();
		default:
	
		$bsg_results = $wpdb->get_results("SELECT * FROM $wpdb->bsg_album");
?>
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
   
<?php $this->bsg_show_update();?>
<script type="text/javascript" src="<?php echo $this->default_options['bsg_js'] ;?>jquery-1.2.1.min.js"></script>
<script type="text/javascript">
(function ($) {
	$(document).ready(function(){
		$('a.toDelete').click(function(){
			if(confirm("Are you sure you want to delete this album?")){
				return true;
			}
			return false;
		});
	});
})(jQuery);
</script>
<div class="wrap">
	<h2>Benjamin Sterling Galleries Albums</h2>
	<table width="100%"  border="0" cellspacing="3" cellpadding="3">
		<thead>
			<tr class="thead">
				<th width="2%">ID</th>	
				<th width="11%">Post Code</th>	
				<th width="25%">Album Title</th>
				<th width="25%">Gallery Type</th>	
				<th>Edit Styles</th>
				<th>Edit Images</th>
				<th>Delete</th>
			</tr>
		</thead>
	<?php
		if($bsg_results) {
	?>
		<tbody>
		<?php
			$i = 0;
			foreach($bsg_results as $bsg_result) {
				if($i%2 == 0) {
					$style = 'style=\'background-color: #eee\'';
				}  else {
					$style = 'style=\'background-color: none\'';
				}
		?>
			<tr <?php echo $style;?>>
				<td><?php echo $bsg_result->album_id;?></td>
				<td>[gallery=<?php echo $bsg_result->album_id;?>]</td>
				<td><a href="admin.php?page=bsg_build&amp;mode=1&amp;id=<?php echo $bsg_result->album_id;?>"><?php echo $bsg_result->album_title;?></a></td>
				<td>
		<?php
			$sql = "SELECT * FROM $wpdb->bsg_gallery WHERE gallery_id = ".$bsg_result->gallery_id;
			$r = $wpdb->get_row($sql);
			echo '<a href="'.$r->gallery_example.'" target="_blank" title="example">'.$r->gallery_title.'</a>';
		?>
				</td>
				<td><a href="<?php echo $base_page;?>&amp;action=edit_styles&amp;aid=<?php echo $bsg_result->album_id;?>">Edit Styles</a></td>
				<td><a href="<?php echo $base_page;?>&amp;action=edit_image_attr&amp;aid=<?php echo $bsg_result->album_id;?>">Edit Images</a></td>
				<td><a href="<?php echo $base_page;?>&amp;action=delete_album&amp;aid=<?php echo $bsg_result->album_id;?>" class="toDelete">Delete</a></td>
			</tr>
		<?php 
				$i++;
			}
		?>
		</tbody>
		<?php
		}
		else{
			echo '<tr><td colspan="3" align="center"><strong>No Galleries Found</strong></td></tr>';
		}?>
	</table>
</div>
<?php
}
?>