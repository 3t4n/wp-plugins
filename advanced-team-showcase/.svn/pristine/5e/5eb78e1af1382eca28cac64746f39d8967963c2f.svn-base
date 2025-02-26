<?php
/****************************
*
*	Advanced Team Showcase Core
*
*****************************/	
	
function atmswc_get_post_by_cat( $postid ){

	$myarray = array();

	if( current_user_can('manage_options') ){

		if( isset($_POST['cat_ids']) ){

			$myarray = $_POST['cat_ids'];
			$args = array(
			   'post_type' => 'atmswc',
				'tax_query' 	 	=> array(
					array(
						'taxonomy' 	=> 'atmswc_cat',
						'field' 	=> 'id',
						'terms' 	=> $myarray,
					)
				)			   
			);
			// The Query
			$query = new WP_Query( $args );			 
			while ($query->have_posts()) : $query->the_post(); ?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_fb"><?php the_title(); ?></label>
					</th>
					<td style="vertical-align: middle;">
						<input type="hidden" name="sort_post[]" value="<?php echo get_the_ID(); ?>">						
					</td>
				</tr>
			<?php endwhile;				
		}
	}
}
add_action( 'wp_ajax_atmswc_get_post_by_cat', 'atmswc_get_post_by_cat' );