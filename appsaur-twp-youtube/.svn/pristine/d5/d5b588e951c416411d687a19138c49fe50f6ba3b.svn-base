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
		<?php _e('Edition','twp-youtube');?> : <?php
			foreach($data['edit'] as $row){
				echo $row->title." <span> - ( Id : ".$row->id.")";
			}
		?>
		</div>
		<table class='edit-table'>
			<tr>
			
			<?php
				foreach($data['edit'] as $row){
					echo "<form action='?page=appsaur-twp-youtube&subpage=main-save&pid=".$row->id."' method='POST'>";
					echo "<tr><td>". __('Title','twp-youtube')." : </td><td><input class='input' type='text' name='title' placeholder='Title' value='".$row->title."'/></td></tr>";
					echo "<tr><td>". __('Category','twp-youtube')." : </td><td><select name='cat'>";
					if($data['cat']){
						foreach($data['cat'] as $cat){
							if($cat->id==0||!$cat->id){
								$cat='No-category';
							}
							echo "<option value='".$cat->id."'>".$cat->title."</option>";
						}
					}
					echo "<option value='0'>".__('No-category')."</option>";
					if($data['categories']){
						foreach($data['categories'] as $categories){
							if($categories!=''){
								echo "<option value='".$categories->id."'>".$categories->title."</option>";
							}
						}
					}
					echo"</select></td></tr>";
					echo "<tr><td>". __('Movie link','twp-youtube')." : </td><td><input class='input' type='text' name='vid' placeholder='Video Url' value='".$row->link."'/></td></tr>";
					echo "<tr><td>". __('Thumbnail','twp-youtube')." : </td><td><input class='input thumbput' type='hidden' name='thumbnail' value='".$row->thumbnail."'/>	";
					echo "<img class='thumbnail' data-id='0' src='https://img.youtube.com/vi/".$row->vid."/0.jpg' />";
					echo "<img class='thumbnail' data-id='1' src='https://img.youtube.com/vi/".$row->vid."/1.jpg' />";	
					echo "<img class='thumbnail' data-id='2' src='https://img.youtube.com/vi/".$row->vid."/2.jpg' />";
					echo "<img class='thumbnail' data-id='3' src='https://img.youtube.com/vi/".$row->vid."/3.jpg' />";
					echo "</td></tr>";
					echo "<tr><td>". __('Thumbnail width','twp-youtube')." : </td><td><input class='input pxput' type='text' name='twidth' value='".$row->twidth."'/>";
					echo "<tr><td>". __('Thumbnail height','twp-youtube')." : </td><td><input class='input pxput' type='text' name='theight' value='".$row->theight."'/>";
					echo "<tr><td>". __('Player width','twp-youtube')." : </td><td><input class='input pxput' type='text' name='pwidth' value='".$row->pwidth."'/>	";
					echo "<tr><td>". __('Player height','twp-youtube')." : </td><td><input class='input pxput' type='text' name='pheight' value='".$row->pheight."'/>";
					echo "<tr><td colspan='2'><a href='?page=appsaur-twp-youtube&subpage=main'><input class='button' type='button' value=".__('Back','twp-youtube')." /></a><input class='button button-primary' type='submit' value='". __('Save','twp-youtube')."' /></td></tr>";	
					echo "</form>";
				}
			?>
			</form>
			</tr>
		</table>
	<div class='edit-box'>
</div>

