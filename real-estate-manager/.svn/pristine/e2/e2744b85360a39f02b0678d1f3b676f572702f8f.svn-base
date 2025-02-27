<div class="box-property-slide">
	<a href="<?php echo get_permalink($property_id); ?>" class="hover-effect right-block image-fill">
		<?php do_action( 'rem_property_picture', $property_id ); ?>
		<span class="cover"></span>
		<span class="cover-title"><?php echo get_the_title($property_id); ?></span>
	</a>
	<div class="left-block">
		<span class="title"><?php echo $address; ?></span>
		<span class="description"><?php the_excerpt($property_id); ?></span>

		<?php do_action( 'rem_property_details_icons', $property_id ); ?>

		<span class="price"><?php echo $price; ?></span>
		<a href="<?php echo get_permalink($property_id); ?>" class="btn btn-reverse button">
		<i class="fa fa-search"></i> <?php _e( 'Details', 'wcp-rem' ); ?></a>
	</div>
</div><!-- /.box-property-slide -->