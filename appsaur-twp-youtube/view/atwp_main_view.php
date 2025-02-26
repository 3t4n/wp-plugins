<?php if(!defined('ABSPATH')){exit();}?>
<div class='desktop'>
	<div class='categories'>
		<div class='categories-caption'>
			<?php _e( 'Categories', 'twp-youtube' );?> :
		</div>
		<?php 
			if($data['cat']){	
				echo "<div class='categories-title'><a href='?page=appsaur-twp-youtube&subpage=main-construct&'>";
				echo _e( 'All', 'twp-youtube' );
				echo "</a></div><div class='categories-shortcode'>[twp_vid cat='all']</div>";
				echo "<div class='categories-title'><a href='?page=appsaur-twp-youtube&subpage=main-construct&cat=0&'>";
				echo _e( 'No-category', 'twp-youtube' );
				echo "</a></div><div class='categories-shortcode'>[twp_vid cat='no-category']</div>";
				foreach($data['cat'] as $row){

					echo "<div class='categories-title'><a href='?page=appsaur-twp-youtube&subpage=main-construct&cat=".$row->id."&'>";
					echo $row->title;
					echo "</a>";
					echo "<a href='?page=appsaur-twp-youtube&subpage=category-delete&cat=".$row->id."&'><i class='dashicons dashicons-no-alt'></i></a><a href='?page=appsaur-twp-youtube&subpage=category-edit&cat=".$row->id."&'><i class='dashicons dashicons-welcome-write-blog'></i></a></div><div class='categories-shortcode'>[twp_vid cat='".$row->id."']</div>";
					
				}
			}
			echo "<a href='?page=appsaur-twp-youtube&subpage=category-add&'><div class='categories-title'>";
			echo __('Add Category', 'twp-youtube');
			echo "<i class='dashicons dashicons-plus-alt'></i></div></a>";
		?>
	</div>
	<div class='movie-bar'>
		<form id='url-form' action='?page=appsaur-twp-youtube&subpage=main-add' method='POST'>
			<input type='text' id='title' class='input movie-bar-input' name='vid' placeholder='<?php _e( 'Movie link', 'twp-youtube' );?>'/>
			<input type='submit' class='button movie-bar-submit' value='<?php _e( 'Add', 'twp-youtube' );?>' />
		</form>
	</div>
	<div class='movie-list'>
		<div class='movie-list-caption'>
				<?php _e( 'Movies list', 'twp-youtube' );?> :
		</div>
		<table class='movie-list-positions'>
		<tr>
			<th></th><th><?php _e( 'Title', 'twp-youtube' );?></th><th><?php _e( 'Categories', 'twp-youtube' );?></th><th><?php _e( 'Shortcode', 'twp-youtube' );?></th><th><?php _e( 'Edit', 'twp-youtube' );?></th><th><?php _e( 'Delete', 'twp-youtube' );?></th>
		</tr>
			<?php 
				if($data['list']){
					foreach($data['list'] as $row){
						if($row->id!=''){
							$category=$data['list']['cat'][$row->id];
							$cat=$row->cat;
							if($row->cat==0){
								$category=__( 'No category', 'twp-youtube' );
								$cat='no-category';
							}
							echo '<tr><td><img class="thumbnail" data-id="0" src="https://img.youtube.com/vi/'.$row->vid.'/'.$row->thumbnail.'.jpg" /></td><td>'.$row->title.'</td><td><a href="?page=appsaur-twp-youtube&subpage=main-construct&cat='.str_replace(' ','+',$cat).'&">'.$category.'<a/></td><td>[twp_vid id="'.$row->vid.'"]</td><td><a href="?page=appsaur-twp-youtube&subpage=main-edit&pid='.$row->id.'&"><input class="button-primary" type="button" name="title" value="'.__( 'Edit', 'twp-youtube' ).'"/></a></td><td><a href="?page=appsaur-twp-youtube&subpage=main-delete&pid='.$row->id.'&"><input class="button" type="button" name="title" value="'.__( 'Delete', 'twp-youtube' ).'"/></a></td></tr>';
						}
						
					}
				}
			?>	
		</table>
		
	</div>
</div>