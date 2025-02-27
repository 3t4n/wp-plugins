<?php
/**
 * 
 */

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'grfwpIntegrations' ) ) {
/**
 * Integrations class
 *
 * This class integrates Good Reviews for WordPress with other plugins and 
 * services.
 *
 * @since 0.0.1
 */
class grfwpIntegrations {

	public function __construct() {
	
		// Business Profile
		if ( defined( 'BPFWP_VERSION' ) ) {
			
			add_filter( 'grfwp_reviewed_values', array( $this, 'bpfwp_set_reviewed_schema' ) );
		}

		// FDM 
		add_action( 'init', array( $this, 'maybe_add_fdm_actions' ) );

		// RTB 
		add_action( 'init', array( $this, 'maybe_add_rtb_actions' ) );
		add_filter( 'sanitize_option_grfwp-settings', array( $this, 'check_for_rtb_integration_change' ), 100 );
	}
	
	/**
	 * Get schema.org values to use from the Business Profile settings
	 * @since 0.0.1
	 */
	public function bpfwp_set_reviewed_schema( $reviewed ) {
		
		global $bpfwp_controller;
		
		$reviewed['schema'] = $bpfwp_controller->settings->get_setting( 'schema_type' );
		$reviewed['name'] = $bpfwp_controller->settings->get_setting( 'name' );
		
		return $reviewed;
	}

	/**
	 * Add in the filters necessary for Five-Star Restaurant Menu integration if necessary
	 * @since 2.0.0
	 */
	public function maybe_add_fdm_actions() {
		global $grfwp_controller;

		if ( is_object($grfwp_controller) and $grfwp_controller->settings->get_setting( 'fdm-integration' ) ) {

			add_filter( 'fdm_menu_item_elements', array( $this, 'grfwp_fdm_add_review_element' ), 10, 2 );
			add_filter( 'fdm_menu_item_elements_order', array( $this, 'grfwp_fdm_add_review_element_order'), 10, 2 );
			add_filter( 'fdm_content_map_fdmViewItem', array( $this, 'grfwp_fdm_add_review_content_map' ) );

			add_filter( 'fdm_template_directories', array( $this, 'grfwp_fdm_add_template_directory' ) );

			add_filter( 'grfwp_meta_boxes', array( $this, 'grfwp_fdm_add_menu_items_meta_box' ) );
			add_action( 'save_post_grfwp-review', array( $this, 'save_meta' ) );
		}

		if ( is_object($grfwp_controller) and $grfwp_controller->settings->get_setting( 'fdm-main-rating' ) ) {

			add_filter( 'fdm_menu_item_elements', array( $this, 'grfwp_fdm_add_rating_element' ), 10, 2 );
			add_filter( 'fdm_menu_item_elements_order', array( $this, 'grfwp_fdm_add_rating_element_order' ), 10, 2 );
			add_filter( 'fdm_content_map_fdmViewItem', array( $this, 'grfwp_fdm_add_rating_content_map' ) );

			add_filter( 'fdm_template_directories', array( $this, 'grfwp_fdm_add_template_directory' ) );
		}

		if ( is_object($grfwp_controller) and $grfwp_controller->settings->get_setting( 'fdm-submit-review' ) ) {

			add_filter( 'fdm_menu_item_elements', array( $this, 'grfwp_fdm_add_submit_review_element' ), 10, 2 );
			add_filter( 'fdm_menu_item_elements_order', array( $this, 'grfwp_fdm_add_submit_review_element_order' ), 10, 2 );
			add_filter( 'fdm_content_map_fdmViewItem', array( $this, 'grfwp_fdm_add_submit_review_content_map' ) );

			add_filter( 'fdm_template_directories', array( $this, 'grfwp_fdm_add_template_directory' ) );
		}

		if ( is_object($grfwp_controller) and $grfwp_controller->settings->get_setting( 'fdm-submit-review' ) ) {

			add_action( 'wp_ajax_fdm_grfwp_handle_submitted_review', array( $this, 'handle_fdm_review_submission') );
			add_action( 'wp_ajax_nopriv_fdm_grfwp_handle_submitted_review', array( $this, 'handle_fdm_review_submission') );

			add_filter( 'grfwp-submit-review-post-meta', array( $this, 'grfwp_fdm_add_menu_item_id_meta'), 10, 2 );
		}
	}

	/**
	 * Handles a submission of a review via the FDM menu-item lightbox
	 * @since 2.1.0
	 */
	public function handle_fdm_review_submission() {

		$submission = grfwp_handle_submitted_review();

		if ( $submission['status'] == 'success' ) {
			wp_send_json_success(
				array(
					'message' => $submission['message']
				)
			);
		}
		else {
			wp_send_json_error(
				array(
					'message' => $submission['message']
				)
			);
		}

		wp_die();
	}

	/**
	 * Add in the filters necessary for Five-Star Restaurant Reservations integration if necessary
	 * @since 2.0.0
	 */
	public function maybe_add_rtb_actions() {
		global $grfwp_controller;

		if ( is_object($grfwp_controller) and $grfwp_controller->settings->get_setting( 'rtb-integration' ) ) {
			if ( $grfwp_controller->settings->get_setting( 'rtb-reviews-position' ) == 'above' ) { add_filter( 'rtb_booking_form_before_html', array( $this, 'grfwp_rtb_add_reviews' ) ); }
			else { add_filter( 'rtb_booking_form_html_post', array( $this, 'grfwp_rtb_add_reviews' ) ); }
		}
	}

	/**
	 * Add in the GRFWP template directory to the list of FDM template directories
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_template_directory( $template_dirs ) {
		
		$template_dirs[]  = GRFWP_PLUGIN_DIR . '/' . GRFWP_TEMPLATE_DIR . '/';

		return array_unique( $template_dirs );
	}

	/**
	 * Adds the review element to the list of FDM elements to be displayed
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_review_element( $elements, $fdm_item ) {
		
		if ( $fdm_item->is_singular() ) { $elements['reviews'] = 'body'; }

		return $elements;
	}

	/**
	 * Puts the review element into the correct slot in the list of FDM elements
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_review_element_order( $elements_order, $fdm_item ) {
		
		if ( $fdm_item->is_singular() ) { $elements_order[] = 'reviews'; }

		return $elements_order;
	}

	/**
	 * Maps the location of the review element content
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_review_content_map( $content_map ) {

		$content_map['reviews'] = 'fdm-review';

		return $content_map;
	}

	/**
	 * Adds the rating element to the list of FDM elements to be displayed
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_rating_element( $elements, $fdm_item ) {
		
		if ( ! $fdm_item->is_singular() ) { $elements['rating'] = 'body'; }

		return $elements;
	}

	/**
	 * Puts the rating element into the correct slot in the list of FDM elements
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_rating_element_order( $elements_order, $fdm_item ) {
		
		if ( ! $fdm_item->is_singular() ) { 

			$pos = array_search( 'title', $elements_order ) + 1;

			array_splice( $elements_order, $pos, 0, 'rating' );
		}

		return $elements_order;
	}

	/**
	 * Maps the location of the rating element content
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_rating_content_map( $content_map ) {

		$content_map['rating'] = 'fdm-rating';

		return $content_map;
	}

	/**
	 * Adds the submit review element to the list of FDM elements to be displayed
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_submit_review_element( $elements, $fdm_item ) {
		
		if ( $fdm_item->is_singular() ) { $elements['submit_review'] = 'body'; }

		return $elements;
	}

	/**
	 * Puts the submit review element into the correct slot in the list of FDM elements
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_submit_review_element_order( $elements_order, $fdm_item ) {
		
		if ( $fdm_item->is_singular() ) { $elements_order[] = 'submit_review'; }

		return $elements_order;
	}

	/**
	 * Maps the location of the submit review element content
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_submit_review_content_map( $content_map ) {

		$content_map['submit_review'] = 'fdm-submit-review';

		return $content_map;
	}
	
	/**
	 * Adds in the meta data for the FDM item being reviewed, if any
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_menu_item_id_meta( $post_meta, $post_id ) {

		if ( isset( $_POST['fdm_menu_item_id']) ) { update_post_meta( $post_id, 'fdm_menu_item_id', intval($_POST['fdm_menu_item_id']) ) ; }

		return $post_meta;
	}
	
	/**
	 * Adds in a meta box to the review editing screen to allow the admin to select a menu item a review applies to
	 * @since 2.0.0
	 */
	public function grfwp_fdm_add_menu_items_meta_box( $meta_boxes ) {

		$meta_boxes['fdm_menu_item_select'] = array (
			'id'		=>	'grfwp_fdm_menu_item',
			'title'		=> __( 'Five-Star Restaurant Menu Item', 'good-reviews-wp' ),
			'callback'	=> array( $this, 'grfwp_fdm_select_menu_item' ),
			'post_type'	=> GRFWP_REVIEW_POST_TYPE,
			'context'	=> 'normal',
			'priority'	=> 'high'
		);

		return $meta_boxes;
	}

	/**
	 * Displays a select box to let an admin select which menu item a review applies to
	 * @since 2.0.0
	 */
	public function grfwp_fdm_select_menu_item() {

		global $post;
		global $grfwp_controller;

		$selected_menu_item = get_post_meta( $post->ID, 'fdm_menu_item_id', true );
		$menu_items = get_posts( array('post_type' => 'fdm-menu-item', 'posts_per_page' => -1 ) );

		?>

		<input type="hidden" name="grfwp_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>">

		<p><?php echo esc_html( $grfwp_controller->settings->get_setting( 'label-select-menu-item' ) ); ?></p>

		<select name="fdm_menu_item_id">
			<?php foreach ( $menu_items as $menu_item ) {?>
				<option value="<?php echo $menu_item->ID; ?>" <?php echo ( $selected_menu_item == $menu_item->ID ? 'selected' : '' ); ?> ><?php echo $menu_item->post_title; ?></option>
			<?php }  ?>
		</select>

		<?php
	}

	/**
	 * Saves the FDM menu item this review applies to, if any
	 * @since 2.0.0
	 */
	public function save_meta( $post_id ) {

		// Verify nonce
		if ( !isset( $_POST['grfwp_nonce'] ) || !wp_verify_nonce( $_POST['grfwp_nonce'], basename( __FILE__ ) ) ) {
			return $post_id;
		}

		// Check autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check permissions
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		// Save the metadata
		if ( isset($_POST['fdm_menu_item_id']) ) { update_post_meta( $post_id, 'fdm_menu_item_id', intval($_POST['fdm_menu_item_id']) ); }
	}

	/**
	 * Check to see if RTB integartion was toggled on
	 *
	 * @since 2.0.0
	 */
	public function check_for_rtb_integration_change( $val ) {
		global $grfwp_controller;

		if ( ! is_object( $grfwp_controller ) ) { return; }
		
		if ( ! empty( $val['rtb-integration'] ) and ! $grfwp_controller->settings->get_setting( 'rtb-integration' ) ) {
			$rtb_reviews_category = get_term_by( 'slug', 'reservations-reviews', GRFWP_REVIEW_CATEGORY );

			// Term doesn't exist, create it
			if ( ! $rtb_reviews_category ) {
				$result = wp_insert_term(
					'Reservations Reviews',
					GRFWP_REVIEW_CATEGORY,
					array(
						'slug'			=> 'reservations-reviews',
						'description'	=> 'If there are reviews in this category, they\'ll be the ones displayed above or below the review form when enabled.'
					)
				);
			}
		}

		return $val;
	}

	/**
	 * Displays reviews on the reservations form page
	 * @since 2.0.0
	 */
	public function grfwp_rtb_add_reviews( $output ) {

		global $grfwp_controller;

		$rtb_reviews_category = get_term_by( 'slug', 'reservations-reviews', GRFWP_REVIEW_CATEGORY );

		$args = array();

		if ( is_object($rtb_reviews_category) and $rtb_reviews_category->count ) {
			$args['category'] = $rtb_reviews_category->slug;
		}

		remove_action( 'the_content', array( $grfwp_controller, 'append_to_content' ) );

		$output .= grfwp_print_reviews( $args );

		add_action( 'the_content', array( $grfwp_controller, 'append_to_content' ) );

		return $output;
	}
	 
}
} // endif;
