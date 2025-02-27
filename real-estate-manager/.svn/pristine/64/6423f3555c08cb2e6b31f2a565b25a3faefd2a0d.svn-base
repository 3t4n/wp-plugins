<div class="ich-settings-main-wrap">
<div id="user-profile">
	<div class="table-responsive property-list">
		<table class="table-striped table-hover">
		  <thead>
			<tr>
				<th><?php _e( 'Thumbnail', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Title', 'wcp-rem' ); ?></th>
				<th class="hidden-xs"><?php _e( 'Type', 'wcp-rem' ); ?></th>
				<th class="hidden-xs hidden-sm"><?php _e( 'Added', 'wcp-rem' ); ?></th>
				<th class="hidden-xs"><?php _e( 'Purpose', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Status', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Actions', 'wcp-rem' ); ?></th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
				$current_user_data = wp_get_current_user();
				$args = array(
					'author'	=> $current_user_data->ID,
					'post_type' => 'rem_property'
				);
				$myproperties = new WP_Query( $args );
				if( $myproperties->have_posts() ){
					while( $myproperties->have_posts() ){ 
						$myproperties->the_post(); ?>	
							<tr>
								<td class="img-wrap">
									<?php do_action( 'rem_property_picture', get_the_id(), 'thumbnail' ); ?>
								</td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php echo get_post_meta(get_the_id(),'rem_property_address', true); ?></td>
								<td class="hidden-xs"><?php echo ucfirst(get_post_meta(get_the_id(),'rem_property_type', true )); ?></td>
								<td class="hidden-xs hidden-sm"><?php the_time('Y/m/d'); ?></td>
								<td class="hidden-xs"><?php echo ucfirst(get_post_meta(get_the_id(),'rem_property_purpose', true )); ?></td>
								<td><span class="label label-success"><?php echo ucfirst(get_post_meta(get_the_id(),'rem_property_status', true )); ?></span></td>
								<td>
									<?php edit_post_link( '<span class="dashicons dashicons-edit"></span>'); ?>
									<?php $delete_url = get_delete_post_link(get_the_id()); ?>
									<a href="<?php echo $delete_url; ?>"><span class="dashicons dashicons-trash"></span></a>
								</td>
							</tr>
			<?php 
					}
				}
			?>
		  </tbody>
		</table>
	</div>
</div>
</div>