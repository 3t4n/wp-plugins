<?php
//kein zugriff bei direktem Aufruf
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

//Register custom post types
function aa_rating_add_post_type() {

	$labels = array(
		'name'					=> _x( 'Amazon Ratings', 'Post Type General Name', 'affiliate-rating-for-amazon' ),
		'singular_name'			=> _x( 'Amazon Rating', 'Post Type Singular Name', 'affiliate-rating-for-amazon' ),
		'menu_name'				=> __( 'Amazon Ratings', 'affiliate-rating-for-amazon' ),
		'name_admin:_bar'		=> __( 'Amazon Ratings', 'affiliate-rating-for-amazon' ),
		'parent_item_colon' 	=> __( 'Parent Item:', 'affiliate-rating-for-amazon' ),
		'all_items'				=> __( 'All Items', 'affiliate-rating-for-amazon' ),
		'add_new_item'			=> __( 'Add New Item', 'affiliate-rating-for-amazon' ),
		'add_new'				=> __( 'Add New', 'affiliate-rating-for-amazon' ),
		'new_item'				=> __( 'New Item', 'affiliate-rating-for-amazon'),
		'edit_item'				=> __( 'Edit Item', 'affiliate-rating-for-amazon'),
		'update_item'			=> __( 'Update Item', 'affiliate-rating-for-amazon'),
		'view_item'				=> __( 'View Item', 'affiliate-rating-for-amazon'),
		'search_item'			=> __( 'Search Item', 'affiliate-rating-for-amazon'),
		'not_found'				=> __( 'Not Found', 'affiliate-rating-for-amazon'),
		'not_found_in_trash'	=> __( 'Not found in trash', 'affiliate-rating-for-amazon'),
		'items_list'			=> __( 'Items list', 'affiliate-rating-for-amazon'),
		'items_list_navigation'	=> __( 'Items list navigation', 'affiliate-rating-for-amazon'),
		'filter_items_list'		=> __( 'Filter Items list', 'affiliate-rating-for-amazon'),
	);
	$args = array(
		'label'					=> __( 'Amazon Rating', 'affiliate-rating-for-amazon'),
		'labels'				=> $labels,
		'supports'				=> array( ),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'show_in_nav_menus'		=> true,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false, 
		'publicly_queryable'	=> true,
		'capability_type'		=> 'post',
	);

	register_post_type( 'aa_rating', $args );

}

add_action( 'init', 'aa_rating_add_post_type', 0 );


//Hinzufügen der Meta-Box
add_action( 'add_meta_boxes', 'aa_rating_add_custom_meta_box' );
function aa_rating_add_custom_meta_box() { 
	add_meta_box(
		'aa_rating_editor',
		__( 'Amazon Rating', 'affiliate-rating-for-amazon' ),
		'aa_rating_editor',
		'aa_rating',
		'advanced',
		'high'

	);
}

//Inhalt und Darstellung der Meta-Box
function aa_rating_editor( $post ) { 

	wp_nonce_field( 'aa_rating_save_meta_box_data', 'aa_rating_save_meta_box_nonce' );

?>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="aa_rating_shortcode"><?php echo __( 'Shortcode', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_shortcode" value="[aa_rating id=<?php echo $post->ID; ?>]"></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_title"><?php echo __( 'Title', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_title" value="<?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_title', true ) ); ?>"></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_image"><?php echo __( 'Image', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_image" id="rating_image" value="<?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_image', true ) ); ?>"></br>
					<input type="button" id="aa_rating_upload_button" value="<?php echo __( 'Upload', 'affiliate-rating-for-amazon' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_pro"><?php echo __( 'Pro', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><textarea name="aa_rating_pro" rows="5"><?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_pro', true ) ); ?></textarea></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_contra"><?php echo __( 'Contra', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><textarea name="aa_rating_contra" rows="5"><?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_contra', true ) ); ?></textarea></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_review"><?php echo __( 'Review', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><textarea name="aa_rating_review" rows="5"><?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_review', true ) ); ?></textarea></td>
			</tr>

			<?php 
			//Checkbox auslesen und prüfen
				$check = null;
				if( esc_html( get_post_meta( $post->ID, 'aa_rating_stars_check', true ) ) === 'aa_rating_stars_check' ) {
					$check = 'checked';
				}
			?>

			<tr>
				<th scope="row"><label for="aa_rating_stars_check"><?php echo __( 'Enable Star Rating', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="checkbox" name="aa_rating_stars_check" value="aa_rating_stars_check" <?php echo $check; ?> ></td>
			</tr>

			<tr>
				<th scope="row"><label for="aa_rating_percent"><?php echo __( 'Rating in percent', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_percent" value="<?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_percent', true ) ); ?>"></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_button_text"><?php echo __( 'Button Text', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_button_text" value="<?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_button_text', true ) ); ?>"></td>
			</tr>
			<tr>
				<th scope="row"><label for="aa_rating_button_link"><?php echo __( 'Button Link', 'affiliate-rating-for-amazon' ); ?></label></th>
				<td><input type="text" name="aa_rating_button_link" placeholder="https://www.amazon.de" value="<?php echo esc_html( get_post_meta( $post->ID, 'aa_rating_button_link', true ) ); ?>"></td>
			</tr>



		</tbody>
	</table>
<?php
}

//Speichern des Meta Box Formulares

add_action( 'save_post', 'aa_rating_save' );
function aa_rating_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( !isset( $_POST['aa_rating_save_meta_box_nonce'] ) ) {
		return;
	}

	if ( !wp_verify_nonce( $_POST['aa_rating_save_meta_box_nonce'], 'aa_rating_save_meta_box_data' ) ) {
		return;
	}

	if ( 'aa_rating' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$aa_rating_title = sanitize_text_field( $_POST['aa_rating_title'] ) ;
	if( isset( $aa_rating_title ) ) {
		update_post_meta( $post_id, 'aa_rating_title', $aa_rating_title );
	}

	$aa_rating_image = sanitize_text_field( $_POST['aa_rating_image'] );
	if( isset( $aa_rating_image ) ) {
		update_post_meta( $post_id, 'aa_rating_image', $aa_rating_image );
	}

	$aa_rating_pro = sanitize_textarea_field( $_POST['aa_rating_pro'] );
	if( isset( $aa_rating_pro ) ) {
			update_post_meta( $post_id, 'aa_rating_pro', $aa_rating_pro );
		}

	$aa_rating_contra = sanitize_textarea_field( $_POST['aa_rating_contra'] );
	if( isset( $aa_rating_contra ) ) {
		update_post_meta( $post_id, 'aa_rating_contra', $aa_rating_contra );
	}

	$aa_rating_review = sanitize_textarea_field( $_POST['aa_rating_review'] );
	if( isset( $aa_rating_review ) ) {
		update_post_meta( $post_id, 'aa_rating_review', $aa_rating_review );
	}

	$aa_rating_stars_check = $_POST['aa_rating_stars_check'] ;

	//sanitize checkbox
	function checkbox_sanitization( $aa_rating_stars_check ) {	
		if ( true === $aa_rating_stars_check ) {
		    return 1;
		 } else {
		    return 0;
		 }
		}

	if( isset( $aa_rating_stars_check ) ) {
		update_post_meta( $post_id, 'aa_rating_stars_check', $aa_rating_stars_check );
	} else {
		update_post_meta( $post_id, 'aa_rating_stars_check', null );
	}

	$aa_rating_percent = sanitize_text_field( $_POST['aa_rating_percent'] );
	if( isset( $aa_rating_percent ) ) {
		update_post_meta( $post_id, 'aa_rating_percent', $aa_rating_percent );
	}

	$aa_rating_button_text = sanitize_text_field( $_POST['aa_rating_button_text'] );
	if( isset( $aa_rating_button_text ) ) {
		update_post_meta( $post_id, 'aa_rating_button_text', $aa_rating_button_text );
	}

	$aa_rating_button_link = sanitize_text_field( $_POST['aa_rating_button_link'] );
	if( isset( $aa_rating_button_link ) ) {
		update_post_meta( $post_id, 'aa_rating_button_link', $aa_rating_button_link );
	}
}
