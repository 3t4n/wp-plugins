<?php
/**
 * Helper Window
 *
 * The popup window initiated by the TinyMCE custom button.
 */
 
 
/**
 * Get Templates.
 *
 * Gets all the CPT Templates and convert to Array.
 */
$args = array( 'post_type' => 'ctrlv_templates', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
global $post;
$snippets = array();
$selectcat = array();

while ( $loop->have_posts() ) : $loop->the_post();

	$terms = get_the_terms( $post->ID, 'ctrlv_templates_cat');
	
	if ( $terms && ! is_wp_error( $terms ) ) {
	
		foreach ( $terms as $term ) {

			$category = strtolower( $term->slug );
			
		}
		
	} else {
	
		$category = 'uncategorized';
		
	}
	
	if ( ! in_array( $category, $selectcat ) ) {
	
		$selectcat[] = $category;
	
	}

	$snippets[] = array( 'title' => get_the_title(), 'content' => get_the_content(), 'category' => $category, 'thumbnail' => get_the_post_thumbnail() );

endwhile;

wp_reset_query();
?>

<?php
/**
 * Helper Window
 *
 * The helper window.
 */
?>
<div class="ctrlv-helper-shade"></div>
<div id="ctrlv-helper-window" class="postbox">

	<span class="ctrlv-close ctrlv-help-button"></span>

	<h3 class="hndle"><span><?php _e( 'Add Template', 'ctrlv' ); ?></span></h3>
	
	<div class="window-header">
		<div class="floatleft">
			<p class="description"><?php _e( 'Below are all the Templates you can add to the Editor.', 'ctrlv' ); ?><br><a href="<?php echo get_site_url(); ?>/wp-admin/post-new.php?post_type=ctrlv_templates">Create New Template</a></p>
		</div>
		
		<div class="floatright">
			<p><?php _e( 'Filter by Category:', 'ctrlv' ); ?></p>
			
			<select id="ctrlv-filter">
				<option value="all" selected><?php _e( 'All', 'ctrlv' ); ?></option>
				
				<?php
				foreach ( $selectcat as $cat ) {
				
					echo '<option value="'.$cat.'">' . ucfirst( $cat ) . '</option>';
					
				}
				?>
				
			</select>
		</div>
	</div>
	
	
	
	<div class="inside">
	
		<div class="snippets">
		
		<?php 
		
		$i = 0;
		
		foreach ($snippets as $snippet => $value) {
		
			echo '<div class="ctrlv-snippet-wrap" filter-id="category-'.$value['category'].'">';

			echo '<h4>' . $value['title'] . '</h4>';
			echo '<p class="category">' . __( 'Category: ', 'ctrlv') . $value['category'] . '</p>';
			
			echo '<div id="snippet'.$i.'" class="snippet" style="display:none;">'. $value['content'] .'</div>';

			echo '<button class="add-content button button-primary" snippet="snippet'.$i.'">'.__( 'Add', 'ctrlv' ).'</button>';
			
			echo '</div>';
		
		$i++;
		
		}
		?>
		</div>
		
		
		
	</div> <!-- .inside -->
	
</div> <!-- .postbox -->