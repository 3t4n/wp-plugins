<?php if(!defined('ABSPATH')){exit();}?>

<script>
	jQuery(document).ready(function($){
		id=$('.thumbput').val();
		$('.thumbnail').each(function(){
			if($(this).attr('data-id')==id){
				$('.thumbnail').css({'border':'6px solid #bbb'});
				$(this).css({'border':'6px solid #55f'});
			}
		});
		$('.thumbnail').click(function(){
			id=$(this).attr('data-id');
			$('.thumbnail').css({'border':'6px solid #bbb'});
			$(this).css({'border':'6px solid #55f'});
			$('.thumbput').val(id);
		});
	});
</script>
<div class='desktop'>
	<div class='edit-container'>
		<div class='edit-caption'>
		<?php _e('Add category','twp-youtube');?> :
		</div>
		<table class='edit-table'>
			<tr>
			

			<form action='?page=appsaur-twp-youtube&subpage=category-add_category' method='POST'>
			<tr><td><?php _e('Title','twp-youtube');?> : </td><td><input class='input' type='text' name='title' placeholder='<?php _e('Title','twp-youtube');?>' value='<?php _e('No-title','twp-youtube');?>' /></td></tr>
			<tr><td><?php _e('Thumbnail width','twp-youtube');?> : </td><td><input class='input' type='text' name='twidth' placeholder='<?php _e('Thumbnail width','twp-youtube');?>' value='148' /></td></tr>
			<tr><td><?php _e('Thumbnail height','twp-youtube');?> : </td><td><input class='input' type='text' name='theight' placeholder='<?php _e('Thumbnail height','twp-youtube');?>' value='111'/></td></tr>
			<tr><td><?php _e('Player width','twp-youtube');?> : </td><td><input class='input' type='text' name='pwidth' placeholder='<?php _e('Player width','twp-youtube');?>' value='640' /></td></tr>
			<tr><td><?php _e('Player height','twp-youtube');?> : </td><td><input class='input' type='text' name='pheight' placeholder='<?php _e('Player height','twp-youtube');?>' value='360' /></td></tr>
			</td></tr>
			<tr><td colspan='2'><a href='?page=appsaur-twp-youtube&subpage=main'><input class='button' type='button' value='<?php _e('Back','twp-youtube');?>'/></a><input class='button button-primary' type='submit' value='<?php _e('Save','twp-youtube');?>' /></td></tr>

			</form>
			</tr>
		</table>
	<div class='edit-box'>
</div>

