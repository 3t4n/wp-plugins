<div class="rem-settings-box">
	<ul class="category-tabs rem-setting-tabs">
		<?php
			include 'single-property-fields.php';
			foreach ($tabsData as $name => $title) {
				echo '<li><a href="#'.$name.'">'.$title.'</a></li>';
			}
		?>
	</ul>
	
	<div class="tabs-data">
		<?php
			foreach ($tabsData as $name => $title) { ?>
				<div id="<?php echo $name; ?>" class="tabs-panel">
					<table class="wp-list-table widefat fixed striped posts">
						<?php
							foreach ($inputFields as $field) {
								if($field['tab'] == $name){ ?>
									<tr>
										<td>
											<?php echo $field['title']; ?>	
										</td>
										<td>
											<?php rem_render_field($field); ?>
										</td>
										<td>
											<p class="description">
												<?php echo $field['help']; ?>	
											</p>
										</td>
									</tr>
								<?php }
							}
						?>
					</table>
				</div>
			<?php }
		?>	
	</div>
	
</div>

<style>
	.rem-settings-box .tabs-panel {
		border: 1px solid #ddd;
		padding: 10px;		
	}
	.rem-settings-box .tabs-panel {
		display: none;
	}
	.rem-setting-tabs a {
		padding: 15px;
	}
	.rem-setting-tabs a:focus {
		outline: none;
		box-shadow: none;
	}
</style>
<script>
	jQuery(document).ready(function($) {
		$('.rem-setting-tabs li:first-child').addClass('tabs');
		$('.rem-settings-box .tabs-data .tabs-panel:first-child').show();
		$('.rem-setting-tabs a').click(function(event) {
			event.preventDefault();
			$('.rem-setting-tabs li').removeClass('tabs');
			$(this).closest('li').addClass('tabs');
			var tab_name = $(this).attr('href');
			$('.rem-settings-box').find(tab_name).show().siblings('.tabs-panel').hide();
		});
	});
</script>