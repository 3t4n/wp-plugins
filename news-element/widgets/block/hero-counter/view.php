<?php
	use News_Element\Khobish_Helper;
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['meta']);
	$query_args = Khobish_Helper::hero_slide_query($settings,'query');
	$wp_query = new WP_Query($query_args);
	$excerptf = '';
?>

<ul class="hero-trending tpoverflow line-clip">

	<?php $post_count = 0; while ($wp_query->have_posts()) : $wp_query->the_post();$post_count++;?>

	<li data-num="<?php echo $post_count;?>">
		<?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
	</li>

	<?php endwhile; wp_reset_postdata(); ?>

</ul>
		
 