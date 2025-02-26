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
				
			<?php 
				if($data['edit']){
					foreach($data['edit'] as $row){
						echo "<form action='?page=appsaur-twp-youtube&subpage=category-save&cat=".$row->id."' method='POST'>";
						echo "<tr><td>".__('Title','twp-youtube')." : </td><td><input class='input' type='text' name='title' placeholder='".__('Title','twp-youtube')."' value='".$row->title."' value=''/></td></tr>";
						echo "<tr><td>".__('Thumbnail width','twp-youtube')." : </td><td><input class='input' type='text' name='twidth' placeholder='".__('Thumbnail width','twp-youtube')."' value='".$row->twidth."' /></td></tr>";
						echo "<tr><td>".__('Thumbnail height','twp-youtube')." : </td><td><input class='input' type='text' name='theight' placeholder='".__('Thumbnail height','twp-youtube')."' value='".$row->theight."' /></td></tr>";
						echo "<tr><td>".__('Player width','twp-youtube')." : </td><td><input class='input' type='text' name='pwidth' placeholder='".__('Player width','twp-youtube')."' value='".$row->pwidth."' /></td></tr>";
						echo "<tr><td>".__('Player height','twp-youtube')." : </td><td><input class='input' type='text' name='pheight' placeholder='".__('Player height','twp-youtube')."' value='".$row->pheight."' /></td></tr>";
						echo "<tr><td></td><td><a href='?page=appsaur-twp-youtube&subpage=category-setup&cat=".$row->id."'><input type='button' class='button' value='".__('Set up for movies','twp-youtube')."' /></a></td></tr>";
					}
				}
				echo "<tr><td colspan='2'><a href='?page=appsaur-twp-youtube&subpage=main'><input class='button' type='button' value='". __('Back','twp-youtube')."'/></a><input class='button button-primary' type='submit' value='".__('Save','twp-youtube')."' /></td></tr>";
				?>
			</form>	
			</tr>
		</table>
	<div class='edit-box'>
</div>
