<?php defined('ABSPATH') or die("No script kiddies please!");

include('parts/template-header.php'); ?>
<div class="ec-shortcode-outer-wrap ec-<?php echo esc_attr($template); ?> <?php echo esc_attr($responsive_class); ?>" style="<?php echo esc_attr($wrap_inner_styles); ?>" >
	<?php
	include('parts/overlay.php');
	$total_count_items = count($items);
	?>
	<div class="ec-counter-items-wrap <?php echo esc_attr($column_main_class); ?> clearfix" >
		<?php
		$counter=0;
		foreach ($items as $item): $counter++;
			?>
			<div class='ec-counter-item ec-counter-item-<?php echo esc_attr($counter); ?>'>
			<?php
			if($template == 'template2'){ ?>
				<div class='ec-icon-count-wrap clearfix'>
					<?php
					include('parts/feature-item.php');
					include('parts/count.php');
					?>
				</div>
				<?php
				include('parts/title.php');
				include('parts/subtitle.php');
				include('parts/button.php');
			}else if($template == 'template3' || $template == 'template4'){
				?>
				<div class="ec-item-wrap clearfix">
					<?php
					include('parts/feature-item.php');
					?>
					<div class="ec-right-content">
					<?php
					include('parts/count.php');
					include('parts/title.php');
					include('parts/subtitle.php');
					include('parts/button.php');
					?>
					</div>
				</div>
				<?php
			}else if( $template =='template5' ){
				include('parts/feature-item.php');
				include('parts/count.php');
				include('parts/title.php');
				include('parts/subtitle.php');
				include('parts/button.php');
			}else{
				include('parts/feature-item.php');
				include('parts/count.php');
				include('parts/title.php');
				include('parts/subtitle.php');
				include('parts/button.php');
				} ?>
			</div>
			<?php
		endforeach; ?>
	</div>
</div>