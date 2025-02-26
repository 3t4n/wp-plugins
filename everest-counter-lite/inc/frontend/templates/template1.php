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
			<div class='ec-counter-item ec-counter-item-<?php echo esc_attr($counter); ?>' >
				<div class='ec-top-container'>
					<div class="ec-top-inner-wrap">
						<?php
						include('parts/feature-item.php');
						include('parts/title.php');
						?>
					</div>
				</div>
				<div class="ec-bottom-container">
					<?php
					include('parts/count.php');
					include('parts/subtitle.php');
					include('parts/button.php');
					?>
				</div>
			</div>
			<?php
		endforeach; ?>
	</div>
</div>