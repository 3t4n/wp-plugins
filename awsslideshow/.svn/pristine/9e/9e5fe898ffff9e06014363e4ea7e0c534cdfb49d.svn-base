<div class="wrap">
	<h2>
		<?php _e('Edit Slideshow'); ?>
		<a href="?page=manage_awsslideshow&action=new" class="add-new-h2"><?php _e('Add New'); ?></a>
	</h2>
	
	<form name="post" id="post_edit" method="post" action="?page=manage_awsslideshow" autocomplete="off">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-1">
				<div id="post-body-content">
					<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="title" size="30" value="<?php echo $item->title; ?>" id="title" spellcheck="true" autocomplete="off">
					</div>
										
					<div class="panel-wrap product_data" id="awsslideshow">
						<div class="awsslideshow_workspace" ng-view></div>
					</div>
					
				</div>
				
				<p class="submit">
					<input class="button button-primary button-large" type="submit" name="submit" value="Save Slide" id="submit">
				</p>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $item->id; ?>">
		<input type="hidden" name="action" value="save">
	</form>
</div>