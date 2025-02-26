<?php

/**
 * Setup the single page template
 *
 * @link       http://mockupplugin.com
 * @since      1.5.0
 *
 * @package    MockUp
 */
class MockUp_Single {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.5.0
	 */
	public function __construct() {

		$this->postID = get_the_ID();
		$this->mockupID = get_post_meta($this->postID, '_mockup_id_1', true);
		$this->mockup_backgroundID = get_post_meta($this->postID, '_mockup_background_id_1', true);
		$this->description = get_post_meta($this->postID, '_mockup_description_1', true);
		$this->comments = get_post_meta($this->postID, '_mockup_comment_settings_1', true);
		$this->terms = get_the_terms($this->postID, MOCKUP_TAXONOMY);

		$this->intro = get_post_meta($this->postID, '_mockup_intro_settings', true);
		if(empty($this->intro)) {
			$this->intro = get_option( 'mockup_intro', 'hide' );
		} 

		if($this->intro == 'show') { // Only get the cookie if needed.
			$this->intro_cookie = filter_input(INPUT_COOKIE, 'mockup_intro', FILTER_SANITIZE_SPECIAL_CHARS);
		} else {
			$this->intro_cookie = '';
		}

		$this->intro_title = get_option( 'mockup_intro_title', __('Here is the menu.', 'MockUp') );
		$this->intro_text = get_option( 'mockup_intro_text', '' );
		$this->intro_link = get_option( 'mockup_intro_link', __('I understand', 'MockUp') );

		// Add do action
		do_action( 'mockup_before_single_init', $this->postID );

		// Load functions
		$this->mockup_single_check();
		$this->mockup_single_layout();
	}

	/**
	 * Check if a page has a image (mockup)
	 *
	 * @since 1.0.0
	 */
	public function mockup_single_check() {

		if(empty($this->mockupID) && is_user_logged_in()) {

			$title = __('No Mockup found' ,'MockUp');
			$message = __('You did not add a MockUp.' ,'MockUp');

			wp_die($message, $title);

		} elseif(empty($this->mockupID) && !is_user_logged_in()) {

			wp_redirect(get_bloginfo('url'));
		}
	}

	/**
	 * Build page layout
	 *
	 * @since 1.0.0
	 */
	public function mockup_single_layout() {

		// Get image data.
		$image_data = wp_get_attachment_image_src($this->mockupID, 'full');

		$this->url = $image_data[0];
		$this->width = $image_data[1];
		$this->height = $image_data[2];


		// Double check. Some people have problems with this.
		if(empty($this->width) && !empty($this->url) && function_exists('getimagesize')) {

			$image_data = getimagesize($this->url);
			$this->width = $image_data[0];
		}

		if(empty($this->height) && !empty($this->url) && function_exists('getimagesize')) {

			$image_data = getimagesize( $this->url );
			$this->height = $image_data[1];
		}

		// Get background image URL.
		$image_data = wp_get_attachment_image_src( $this->mockup_backgroundID, 'full' );
		$this->url_background = $image_data[0];


		// Get image positions.
		$this->position = get_post_meta( $this->postID, '_mockup_position_1', true );
		$this->position_background = get_post_meta( $this->postID, '_mockup_background_position_1', true );
		

		// Set colors.
		$this->bgcolor = get_post_meta( $this->postID, '_mockup_background_color_1', true );
		$this->activecolor = get_option( 'mockup_color_active', '#21759b' );

		// Sizes
		$this->sidebarsize = '300';

		// Overlay settings
		$this->overlay = get_option( 'mockup_overlay_settings', 'show' );

		// Center overflow X
		$this->overflowx = get_option( 'mockup_overflow_settings', 'true' );

		// Animation time
		$this->animation_time = get_option( 'mockup_animation_time', '1200' );

		// Font
		$this->fontfamily = get_option( 'mockup_fontfamily', "'Helvetica Neue', Helvetica, Arial, sans-serif" );
	}

	/**
	 * Construct page title
	 *
	 * @since 1.1.0
	 */
	public function mockup_page_title() {

		$page_title = get_option( 'mockup_single_title' );

		if( empty( $page_title ) ) {
			$page_title = '%title% | %name%';
		}

		$customers = '';

		if( strpos( $page_title, '%customers%' ) !== false ) {

			$terms = get_the_terms( $this->postID, MOCKUP_TAXONOMY );

			if($terms && !is_wp_error($terms)) {

				$draught_links = array();

				foreach ( $terms as $term ) {
					$draught_links[] = $term->name;
				}
									
				$customers = join( ', ', $draught_links );
			}
		}


		$find = array(
			'%name%', 
			'%title%',
			'%description%',
			'%customers%'
		);


		$replace  = array( 
			get_bloginfo( 'name' ), 
			get_the_title( $this->postID ),
			get_bloginfo( 'description' ),
			$customers
		);


		$page_title = str_replace( $find, $replace, $page_title );

		return $page_title;
	}

	/**
	 * Get terms
	 *
	 * @since 1.0.0
	 */
	public function mockup_terms($password) {

		if($this->terms && !is_wp_error($this->terms)) {

			$term_id_array = array();

			foreach($this->terms as $term) {

				$term_id_array[] = $term->term_id;
			}

			$args = array(
				'post_type'         => MOCKUP_POSTTYPE,
				'orderby'           => 'menu_order',
				'order'             => 'ASC',
				'has_password'      => $password, // true, false or null
				'posts_per_page'    => -1,
				'tax_query'         => array(
					array(
						'taxonomy'  => MOCKUP_TAXONOMY,
						'terms'     => $term_id_array
					)
				)
			);

			return $query = new WP_Query($args);
		}

		return false;
	}

	/**
	 * Show menu items
	 *
	 * @since 1.4.0
	 */
	public function mockup_single_menu() {
		
		$menu = null;
		$terms = $this->mockup_terms(null);

		// Description
		if(!empty($this->description))
			$menu .= '<a href="#" title="' . get_option( 'mockup_description_btn', __('Show description', 'MockUp') ) . '" id="description" class="toggle show-title"><span class="dashicons dashicons-welcome-write-blog"></span></a>';

		// Comments
		if($this->comments == 'enable')
			$menu .= '<a href="#" title="' . get_option( 'mockup_comment_btn', __('Write a comment', 'MockUp') ) . '" id="comment" class="toggle show-title"><span class="dashicons dashicons-format-chat"></span></a>';

		// Related
		if(isset($terms->found_posts) && $terms->found_posts > 1)
			$menu .= '<a href="#" title="' . get_option( 'mockup_related_btn', __('Show related MockUps', 'MockUp') ) . '" id="related" class="toggle show-title"><span class="dashicons dashicons-editor-ul"></span></a>';

		// Approve
		$menu .= '<a href="#" title="' . get_option( 'mockup_approve_btn', __('Approve', 'MockUp') ) . '" id="approve" class="toggle show-title"><span class="dashicons dashicons-yes"></span></a>';

		return $menu; 
	}

	/**
	 * Check if a password is required
	 *
	 * @since 1.3.0
	 */
	public function mockup_check_password() {

		// Check mockup.
		if(post_password_required()) return true;

		// Check related mockups
		$password_settings = get_option( 'mockup_password_settings', 'default' );

		if($password_settings == 'inherit') {

			$query = $this->mockup_terms(true);

			if(empty($query)) return false;

			while($query->have_posts()): $query->the_post();

				if(post_password_required()) {
					wp_reset_postdata();
					return true;
				} 

			endwhile;

			wp_reset_postdata();
		}

		return false;
	}

	/**
	 * Show password form
	 *
	 * @since 1.3.0
	 */
	public function mockup_password_form() {

		global $post;

		$label = 'pwbox-'.(empty($post->ID ) ? rand() : $post->ID);

		$form = '<form class="password" action="'.esc_url(site_url('wp-login.php?action=postpass', 'login_post')).'" method="post">';
		$form .= '<span class="dashicons dashicons-lock"></span>';
		$form .= '<p>'.get_option( 'mockup_locked_title', __('To view this protected MockUp, enter the password below:', 'MockUp') ).'</p>';
		$form .= '<input class="field" name="post_password" id="'.$label.'" type="password" size="20" maxlength="20" /><br />';
		$form .= '<input type="submit" class="btn" name="Submit" value="'.get_option( 'mockup_send_btn', __('Send', 'MockUp') ).'" />';
		$form .= '</form>';

		return $form;
	}

}