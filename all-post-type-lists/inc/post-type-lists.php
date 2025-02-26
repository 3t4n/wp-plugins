<?php
/**
 * Post type lists class
 * 
 * @package         All_Post_Type_Lists
 */
class APTL_POST_TYPE_LISTS {
	/**
	 * Construct function
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'aptl_add_email_settings_page' ) );
		}
	}
	public function aptl_add_email_settings_page() {
		add_options_page( 'All Posts Types', 'All Posts Types', 'manage_options', 'all_post_types', array( $this, 'aptl_handle_all_post_types' ), null );
	}
	public function aptl_handle_all_post_types() {
		?>
		<div class="wrap">
			<h1><?php esc_html_e('Post Type Lists', 'all-post-type-lists'); ?></h1>
			<p></p>
			<?php
			/**
			 * Arguments to get post types
			 */
			$args = array(
				'public'   => true,
				'_builtin' => true,
			);
			$output = 'objects'; // names or objects, note names is the default
			$operator = 'and'; // 'and' or 'or'
			/**
			 * All build in post types as a object
			 */
			$post_types_buildin = get_post_types( $args, $output, $operator ); 
			/**
			 * Get all post types as object
			 */
			$post_types = get_post_types( [], 'objects' ); 
			?>
			<style>
				#all-post-type-lists{
					width:100%;
					border-spacing:0px;
				}
				th, td{
					border:solid 1px #ddd;
					padding:15px;
				}
			</style>
			<table id="all-post-type-lists">
				<thead>
						<th><?php esc_html_e('Lable', 'all-post-type-lists'); ?></th>
						<th><?php esc_html_e('Name/slug', 'all-post-type-lists'); ?></th>
						<th><?php esc_html_e('Builtin', 'all-post-type-lists'); ?></th>
						<th><?php esc_html_e('Registered Taxonomies', 'all-post-type-lists'); ?></th>
					
				</thead>
				<tbody>
					<?php
					if ( $post_types ) :
						foreach ( $post_types  as $post_type ) {
							$post_type_label = $post_type->label;
							$post_type_name = $post_type->name;
							$post_type_builtin = $post_type->_builtin;
							?>
							<tr>
								<td><?php echo esc_html( $post_type_label ); ?></td>
								<td><?php echo esc_html( $post_type_name ); ?></td>
								<td><?php echo esc_html( $post_type_builtin ); ?></td>
								<td>
									<ul>
									<?php
										$registerd_taxonomy_lists_arr = get_object_taxonomies($post_type_name);
										if( $registerd_taxonomy_lists_arr ):
											foreach( $registerd_taxonomy_lists_arr as $taxonomy_lists ):
												?>
												<li><?php echo esc_html( $taxonomy_lists ); ?></li>
												<?php
											endforeach;
										endif;
									?>
									</ul>
								</td>
							</tr>
							<?php
						}
					endif;
					?>
				</tbody>
			</table>
		</div>
		<?php
	}
}
new APTL_POST_TYPE_LISTS();