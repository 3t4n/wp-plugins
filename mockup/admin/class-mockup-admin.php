<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://mockupplugin.com
 * @since      1.6.3
 *
 * @package    MockUp
 * @subpackage MockUp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MockUp
 * @subpackage MockUp/admin
 * @author     Eelco Tjallema <mail@estjallema.nl>
 */
class MockUp_Admin {

	/**
	 * The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin.min.css', array('wp-color-picker'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		// Enqueues all scripts, styles, settings, and templates necessary to use all media JavaScript APIs.
		wp_enqueue_media();

		// Plugin custom
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admin.min.js', array('jquery', 'wp-color-picker'), $this->version, false );

		$translation_array = array(
			'popup_title' => __('Select or upload the MockUp', 'MockUp'),
			'popup_button' => __('Add MockUp', 'MockUp'),
			'confirm' => __('Are you sure?', 'MockUp'),
		);

		wp_localize_script($this->plugin_name , 'mockupL10n', $translation_array);

	}

	/**
	 * Register the custom post type.
	 *
	 * @since 1.0.0
	 */
	public static function register_cpt() {

		$pos = intval( get_option( 'mockup_menu_position', 160 ) );

		$opts['public']                			= true;
		$opts['exclude_from_search']   			= true;
		$opts['show_ui']               			= true;
		$opts['show_in_nav_menus']     			= false;
		$opts['menu_position']         			= $pos;
		$opts['menu_icon']             			= 'dashicons-art';
		$opts['supports']              			= array('title', 'page-attributes', 'author');
		$opts['rewrite']['slug']				= 'mockup';

		$opts['labels']['name']                 = esc_html__('MockUp\'s', 'MockUp');
		$opts['labels']['menu_name']            = esc_html__('MockUp', 'MockUp');
		$opts['labels']['singular_name']        = esc_html__('MockUp', 'MockUp');
		$opts['labels']['all_items']            = esc_html__('All MockUps', 'MockUp');
		$opts['labels']['add_new']              = esc_html__('Add new MockUp', 'MockUp');
		$opts['labels']['add_new_item']         = esc_html__('Add new MockUp', 'MockUp');
		$opts['labels']['edit']                 = esc_html__('Edit', 'MockUp');
		$opts['labels']['edit_item']            = esc_html__('Edit MockUp', 'MockUp');
		$opts['labels']['new_item']             = esc_html__('New MockUp', 'MockUp');
		$opts['labels']['view']                 = esc_html__('View MockUp', 'MockUp');
		$opts['labels']['view_item']            = esc_html__('View MockUp', 'MockUp');
		$opts['labels']['search_items']         = esc_html__('Search MockUps', 'MockUp');
		$opts['labels']['not_found']            = esc_html__('No MockUps found', 'MockUp');
		$opts['labels']['not_found_in_trash']   = esc_html__('No MockUps found in Trash', 'MockUp');
		$opts['labels']['parent']               = esc_html__('Parent MockUp', 'MockUp');


		$opts = apply_filters( 'mockup_register_cpt', $opts );

		register_post_type( MOCKUP_POSTTYPE, $opts );

	}

	/**
	 * Register the custom taxonomy.
	 *
	 * @since 1.0.0
	 */
	public static function register_taxonomy() {

		$opts['rewrite']['slug']	   			= 'related';
		$opts['rewrite']['with_front']			= false;
		$opts['show_admin_column'] 				= true;
		$opts['hierarchical']      				= true;

		$opts['labels']['name']               	= esc_html__('Customers' ,'MockUp');
		$opts['labels']['singular_name']      	= esc_html__('Customer' ,'MockUp');
		$opts['labels']['search_items']       	= esc_html__('Search customers' ,'MockUp');
		$opts['labels']['all_items']          	= esc_html__('All customers' ,'MockUp');
		$opts['labels']['parent_item']        	= esc_html__('Parent customer' ,'MockUp');
		$opts['labels']['parent_item_colon']  	= esc_html__('Parent customer' ,'MockUp');
		$opts['labels']['edit_item']          	= esc_html__('Edit customer' ,'MockUp');
		$opts['labels']['update_item']        	= esc_html__('Update customer' ,'MockUp');
		$opts['labels']['add_new_item']       	= esc_html__('Add new customer' ,'MockUp');
		$opts['labels']['new_item_name']      	= esc_html__('New customer name' ,'MockUp');
		$opts['labels']['menu_name']    		= esc_html__('Customers' ,'MockUp');


		$opts = apply_filters( 'mockup_register_taxonomy', $opts );

		register_taxonomy( MOCKUP_TAXONOMY, MOCKUP_POSTTYPE, $opts );
	}

	/**
	 * Register the options page.
	 *
	 * @since 1.0.0
	 */
	public function options_page() {

		$parentslug     = 'edit.php?post_type=' . MOCKUP_POSTTYPE;
		$pagetitle      = __('MockUp Options & Settings', 'MockUp');
		$menutitle      = __('Settings', 'MockUp');
		$capability     = 'manage_options';
		$callback       = array($this, 'options_page_callback');

		add_submenu_page( $parentslug, $pagetitle, $menutitle, $capability, MOCKUP_OPTIONSPAGE_SLUG, $callback );
	}

	/**
	 * Options page view
	 *
	 * @since 1.0.0
	 */
	public function options_page_callback() {

		include_once 'partials/mockup-admin-display-options.php';
	}

	/**
	 * Add link to plugin page.
	 *
	 * @since 1.2.0
	 */
	public function add_link( $links ) {

		$links[] = '<a href="'.get_admin_url( NULL, 'edit.php?post_type='. MOCKUP_POSTTYPE .'&page='. MOCKUP_OPTIONSPAGE_SLUG ).'">' . __('Settings', 'MockUp') . '</a>';

		return $links;
	}


	/**
	 * Register the settings.
	 *
	 * @since 1.0.0
	 */
	public function register_settings() {

		$options = array(

			'mockup_default_background_color' 	=> 'mockup_option_group_settings',
			'mockup_sidebar' 					=> 'mockup_option_group_settings',
			'mockup_single_title' 				=> 'mockup_option_group_settings',
			'mockup_intro' 						=> 'mockup_option_group_settings',
			'mockup_email' 						=> 'mockup_option_group_settings',
			'mockup_email_settings' 			=> 'mockup_option_group_settings',
			'mockup_menu_position' 				=> 'mockup_option_group_settings',


			'mockup_related_btn' 				=> 'mockup_option_group_text',
			'mockup_description_btn' 			=> 'mockup_option_group_text',
			'mockup_comment_btn' 				=> 'mockup_option_group_text',
			'mockup_send_btn' 					=> 'mockup_option_group_text',
			'mockup_approve_btn'				=> 'mockup_option_group_text',
			'mockup_intro_title' 				=> 'mockup_option_group_text',
			'mockup_intro_text' 				=> 'mockup_option_group_text',
			'mockup_intro_link' 				=> 'mockup_option_group_text',
			'mockup_related_title' 				=> 'mockup_option_group_text',
			'mockup_related_text' 				=> 'mockup_option_group_text',
			'mockup_description_title' 			=> 'mockup_option_group_text',
			'mockup_comment_title'				=> 'mockup_option_group_text',
			'mockup_approve_title' 				=> 'mockup_option_group_text',
			'mockup_approve_text' 				=> 'mockup_option_group_text',
			'mockup_comment_name_label' 		=> 'mockup_option_group_text',
			'mockup_comment_message_label' 		=> 'mockup_option_group_text',
			'mockup_comment_no_comments' 		=> 'mockup_option_group_text',
			'mockup_approved_text'				=> 'mockup_option_group_text',
			'mockup_locked_title' 				=> 'mockup_option_group_text',


			'mockup_color_active' 				=> 'mockup_option_group_style',
			'mockup_importfont' 				=> 'mockup_option_group_style',
			'mockup_fontfamily' 				=> 'mockup_option_group_style',
			'mockup_style_general' 				=> 'mockup_option_group_style',


			'mockup_password_settings' 			=> 'mockup_option_group_advanced',
			'mockup_overlay_settings' 			=> 'mockup_option_group_advanced',
			'mockup_overflow_settings' 			=> 'mockup_option_group_advanced',
			'mockup_animation_time' 			=> 'mockup_option_group_advanced'

		);

		foreach( $options as $option_name => $option_group ) {
				
			register_setting( $option_group, $option_name );
		}

	}


	/**
	 * Save some usefull information
	 *
	 * @since 1.6.0
	 */
	public function meta_data( $post ) {

		if( !isset( $_POST['mockupnonce_backend'] ) )
			return $post;

		if( !wp_verify_nonce( $_POST['mockupnonce_backend'] ) )
			return $post;


		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post;


		if($_POST['post_type'] == MOCKUP_POSTTYPE && !current_user_can( 'edit_page', $post ) )
			return $post;


		// Save the data
		add_post_meta( $post->ID, '_mockup_created_in_version', $this->version, true );
		add_post_meta( $post->ID, '_mockup_created_time', time(), true );
	}

	/**
	 * Taxonomy filter
	 *
	 * @since 1.1.0
	 */
	public function taxonomy_filter() {

		global $typenow, $post, $post_id;

		if(isset($_GET[MOCKUP_TAXONOMY])) $selected = $_GET[MOCKUP_TAXONOMY];
		else $selected = false;

		$args = array(
			'orderby'           => 'name', 
			'order'             => 'ASC',
			'hide_empty'        => false,
			'parent'            => 0,
		); 

		$terms = get_terms(MOCKUP_TAXONOMY, $args);

		echo '<select name="'.MOCKUP_TAXONOMY.'" id="'.MOCKUP_TAXONOMY.'" class="postform">';

			echo '<option value="">'.__('Show all customers', 'MockUp').'</option>';

			foreach($terms as $term) { 

				// Check if item is selected
				if($selected && $selected == $term->slug) $select = ' selected="selected"';
				else $select = '';

				// Show top level item.
				echo '<option value="'.$term->slug.'"'.$select.'>'.$term->name.'</option>';

				// Get child pages.
				$args = array(
					'orderby'           => 'name', 
					'order'             => 'ASC',
					'hide_empty'        => true,
					'child_of'          => $term->term_id
				);

				$childTerms = get_terms(MOCKUP_TAXONOMY, $args);

				foreach($childTerms as $childTerm) {

					// Check if item is selected
					if($selected && $selected == $childTerm->slug) $select = ' selected="selected"';
					else $select = '';

					echo '<option value="'.$childTerm->slug.'"'.$select.'> - '.$childTerm->name.' ('.$childTerm->count.')</option>';
				}
			}

		echo '</select>';
	}

	/**
	 * Admin colums to show number of comments page title
	 *
	 * @since 1.1.0
	 */
	public function admincolumn_comments_title($defaults) {

		$comments = array();

		foreach($defaults as $key => $title) {

			if($key == 'title')
				$comments['mockup_comments'] = '<div class="comment-grey-bubble"></div>';
				$comments[$key] = $title;
		}

		return $comments;
	}

	/**
	 * Admin colums to show number of comments
	 *
	 * @since 1.1.0
	 */
	public function admincolumn_comments($column_name, $post_ID) {

		if($column_name == 'mockup_comments') {

			$number = count(get_post_meta(get_the_ID(), '_mockup_comments_1'));

			if(empty($number)) $number = 0;

			echo '<span><strong>'.$number.'<strong></span>';
		}
	}

	/**
	 * Admin colums to status of mockup page title
	 *
	 * @since 1.1.0
	 */
	public function admincolumn_status_title($defaults) {

		$status = array();

		foreach($defaults as $key => $title) {

			if($key == 'taxonomy-'.MOCKUP_TAXONOMY)
				$status['mockup_status'] = __('Status', 'MockUp');
				$status[$key] = $title;
		}

		return $status;
	}

	/**
	 * Admin colums to status of mockup
	 *
	 * @since 1.1.0
	 */
	public function admincolumn_status($column_name, $post_ID) {

		if($column_name == 'mockup_status') {

			$status = get_post_meta($post_ID, '_mockup_status_1', true);

			if(isset($status['approved']) && $status['approved'] == true) {

				echo '<span>'.__('Approved', 'MockUp').'</span>';
			}
		}
	}

	/**
	 * Custom descriptions field with wysiwyg editor.
	 *
	 * @since 1.0.0
	 */
	public function content($post) {

		if($post->post_type == MOCKUP_POSTTYPE) {

			$mockup_description = get_post_meta($post->ID, '_mockup_description_1', true);
			$content = $mockup_description;
			$editor_id = 'mockup_description_1';

			$settings = array(

				'media_buttons' => false,
				'textarea_rows' => 10,
				'teeny' => true,
			);

			wp_editor($content, $editor_id, $settings);
		}
	}

	/**
	 * Add Mockup's to dashboard widget 'at a glance'.
	 *
	 * @since 1.5.0
	 * @link http://www.hughlashbrooke.com/2014/02/wordpress-add-items-glance-widget/
	 */
	public function dashboard($items = array()) {

			$num_posts = wp_count_posts(MOCKUP_POSTTYPE);
			
			if($num_posts) {
				
				$number = intval( $num_posts->publish );
				$post_type = get_post_type_object(MOCKUP_POSTTYPE);


				$text = _n('%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $number, 'MockUp');
				$text = sprintf($text, number_format_i18n($number));
				
				if(current_user_can( $post_type->cap->edit_posts)) {
					$items[] = sprintf( '<a class="mockup-count" href="edit.php?post_type=%1$s">%2$s</a>', MOCKUP_POSTTYPE, $text) . "\n";
				} else {
					$items[] = sprintf( '<span class="mockup-count">%1$s</span>', $text ) . "\n";
				}
			}

		return $items;
	}



	/**
	 * Add metaboxes
	 *
	 * @since 1.0.0
	 */
	public function metabox($post_type) {

		if($post_type == MOCKUP_POSTTYPE) {

			$id             = 'mockup_metabox_images';
			$title          =  __( 'Image\'s', 'MockUp' );
			$callback       = array($this, 'metabox_images');
			$post_type      = MOCKUP_POSTTYPE;
			$context        = 'advanced';
			$priority       = 'default';

			add_meta_box($id, $title, $callback, $post_type, $context, $priority);



			$id             = 'mockup_metabox_comments';
			$title          =  __( 'Comments', 'MockUp' );
			$callback       = array($this, 'metabox_comments');
			$post_type      = MOCKUP_POSTTYPE;
			$context        = 'normal';
			$priority       = 'high';

			add_meta_box($id, $title, $callback, $post_type, $context, $priority);


			$id             = 'mockup_metabox_settings';
			$title          =  __( 'Settings', 'MockUp' );
			$callback       = array($this, 'metabox_settings');
			$post_type      = MOCKUP_POSTTYPE;
			$context        = 'normal';
			$priority       = 'default';

			add_meta_box($id, $title, $callback, $post_type, $context, $priority);
		}
	}

	/**
	 * Add metabox for images
	 *
	 * @since 1.0.0
	 */
	public function metabox_images($post) {

		// Buttons
		function mockup_make_buttons($id, $action, $setText, $deleteText, $status) {

			if(empty($id)) {

				$delete_class = $action.'-hide';
				$set_class = $action.'-show';
				
			} else {

				$delete_class = $action.'-show';
				$set_class = $action.'-hide';
			}


			if(isset($status['approved']) && $status['approved'] === true) {

				$delete_class .= ' hide-status';
				$set_class .= ' hide-status';
			}

			$mockup_buttons = '<a href="#" class="delete_image mockup_delete '.$delete_class.'" action="'.$action.'">'.$deleteText.'</a>';
			$mockup_buttons .= '<a href="#" class="set_image '.$set_class.' button button-primary button-small" action="'.$action.'">'.$setText.'</a>';

			echo $mockup_buttons;
		}

		// Load tickbox
		add_thickbox();


		// Get image ID's
		$mockup_id = get_post_meta($post->ID, '_mockup_id_1', true); 
		$mockup_background_id = get_post_meta($post->ID, '_mockup_background_id_1', true); 


		// Get status
		$mockup_status = get_post_meta($post->ID, '_mockup_status_1', true);


		// Get image src
		$image_data = wp_get_attachment_image_src($mockup_id, 'thumbnail');
		$image_data_full = wp_get_attachment_image_src($mockup_id, 'full');
		$image_data_bg = wp_get_attachment_image_src($mockup_background_id, 'thumbnail');

		// Text
		$no_mockup = __('No MockUp is set.', 'MockUp');
		$no_mockup_bg = __('No background image is set, the background color will be used.', 'MockUp');

		// Get position settings
		$position = get_post_meta($post->ID, '_mockup_position_1', true); 
		if(isset($mockup_status['approved']) && $mockup_status['approved'] == true) $disabled = ' disabled';
		else $disabled = '';


		// Get background color settings
		$mockup_background_color = get_post_meta($post->ID, '_mockup_background_color_1', true);
		if(empty($mockup_background_color)) $mockup_background_color = get_option('mockup_default_background_color', '#ffffff' );


		include_once 'partials/mockup-admin-display-metabox-images.php';
	}

	/**
	 * Add metabox for comments.
	 *
	 * @since 1.0.0
	 */
	public function metabox_comments($post) {

		$comments = get_post_meta($post->ID, '_mockup_comments_1', false);

		krsort($comments);
		$total = count($comments);

		include_once 'partials/mockup-admin-display-metabox-comments.php';
	}

	/**
	 * Add metabox for page settings
	 *
	 * @since 1.0.0
	 */
	public function metabox_settings($post) {

		// Comments status
		$mockup_comments = get_post_meta($post->ID, '_mockup_comment_settings_1', true );


		// Email settings
		$mockup_email_settings = get_post_meta($post->ID, '_mockup_email_settings_1', true );
		if(empty($mockup_email_settings)) {
			$mockup_email_settings = get_option('mockup_email_settings', 'email_always' );
		}


		// Email address
		$mockup_email = get_post_meta($post->ID, '_mockup_email_1', true );
		if( empty( $mockup_email ) ) {
			$mockup_email = get_option( 'mockup_email' );
		} 
		if( empty( $mockup_email ) ) {
			$mockup_email = get_option( 'admin_email' );
		} 

		// Intro status
		$mockup_intro = get_post_meta($post->ID, '_mockup_intro_settings', true );
		if( empty($mockup_intro) && !empty($created) && $created >= '1.6.0' ) {

			$mockup_intro = get_option( 'mockup_intro', 'hide' );
		}


		include_once 'partials/mockup-admin-display-metabox-settings.php';
	}

	/**
	 * Process meataboxes value
	 *
	 * @since 1.0.0
	 */
	public function metabox_save($post_id) {

		if(!isset($_POST['mockupnonce_backend']))
			return $post_id;

		if(!wp_verify_nonce($_POST['mockupnonce_backend']))
			return $post_id;


		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
			return $post_id;


		if($_POST['post_type'] == MOCKUP_POSTTYPE && !current_user_can('edit_page', $post_id))
			return $post_id;


		// Allowed HTML Tags in content.
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array()
			),
			'span' => array(
				'style' => array()
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);

		// Sanitize user input.
		$mockup_id                  = sanitize_text_field($_POST['mockup_id']);
		$mockup_description         = wp_kses($_POST['mockup_description_1'], $allowed_html);
		// Value not send if is disabled.
		if(isset($_POST['mockup_position_1'])) {
			$mockup_position = sanitize_text_field($_POST['mockup_position_1']);
		}
		$mockup_background_color    = sanitize_text_field($_POST['mockup_background_color_1']);
		$mockup_background_position = sanitize_text_field($_POST['mockup_background_position_1']);
		$mockup_comment_settings    = sanitize_text_field($_POST['mockup_comment_settings_1']);
		$mockup_email_settings      = sanitize_text_field($_POST['mockup_email_settings_1']);
		$mockup_email               = sanitize_text_field($_POST['mockup_email_1']);
		$mockup_intro_settings    = sanitize_text_field($_POST['mockup_intro_settings']);


		// Update the meta field in the database.
		update_post_meta($post_id, '_mockup_id_1', $mockup_id);
		update_post_meta($post_id, '_mockup_description_1', $mockup_description);
		if(isset($_POST['mockup_position_1'])) {
			update_post_meta($post_id, '_mockup_position_1', $mockup_position);
		}
		update_post_meta($post_id, '_mockup_background_color_1', $mockup_background_color);
		update_post_meta($post_id, '_mockup_background_position_1', $mockup_background_position);
		update_post_meta($post_id, '_mockup_comment_settings_1', $mockup_comment_settings);
		update_post_meta($post_id, '_mockup_email_settings_1', $mockup_email_settings);
		update_post_meta($post_id, '_mockup_email_1', $mockup_email);
		update_post_meta($post_id, '_mockup_intro_settings', $mockup_intro_settings);
	}

	/**
	 * Move all "advanced" metaboxes above the default editor
	 *
	 * @since 1.6.3
	 */
	public function metabox_after_title($post) {

		global $wp_meta_boxes;

		if( $post->post_type === MOCKUP_POSTTYPE ) {

			do_meta_boxes( get_current_screen(), 'advanced', $post );
			unset( $wp_meta_boxes[ get_post_type( $post)]['advanced'] );
		}
	}

	/**
	 * Remove useless metabox from other plugin's
	 *
	 * @since 1.3.0
	 */
	public function remove_useless_metabox() {

		remove_meta_box( 'wpseo_meta', MOCKUP_POSTTYPE, 'normal' );
	}



	/**
	 * Ajax function to save images
	 *
	 * @since 1.0.0
	 */
	public function mockup_set_image() {

		$nonce = sanitize_text_field($_POST['mockupnonce_backend']);
		$postid = sanitize_text_field($_POST['postid']);
		$img_action = sanitize_text_field($_POST['img_action']);
		$img_id = sanitize_text_field($_POST['img_id']);

		if(!empty($postid) && !empty($img_id) && !empty($img_action) && !empty($nonce) && wp_verify_nonce($nonce)) {

			if($img_action == 'mockup') {
				update_post_meta($postid, '_mockup_id_1', $img_id);
			} elseif($img_action == 'background') {
				update_post_meta($postid, '_mockup_background_id_1', $img_id);
			}

			$image_data = wp_get_attachment_image_src($img_id, 'thumbnail');
			echo $image_data[0];
		}

		exit;
	}

	/**
	 * Ajax function to delete images
	 *
	 * @since 1.0.0
	 */
	public function mockup_delete_image() {

		$nonce = sanitize_text_field($_POST['mockupnonce_backend']);
		$postid = sanitize_text_field($_POST['postid']);
		echo $img_action = sanitize_text_field($_POST['img_action']);
		echo $img_id = sanitize_text_field($_POST['img_id']);

		if(!empty($postid) && !empty($img_id) && !empty($img_action) && !empty($nonce) && wp_verify_nonce($nonce)) {

			if($img_action == 'mockup') {
				delete_post_meta($postid, '_mockup_id_1', $img_id);
			} elseif($img_action == 'background') {
				delete_post_meta($postid, '_mockup_background_id_1', $img_id);
			}
		}

		exit;
	}

	/**
	 * Ajax function to remove an approval
	 *
	 * @since 1.0.0
	 */
	public function mockup_unapprove() {

		$nonce = sanitize_text_field($_POST['mockupnonce_backend']);
		$postid = sanitize_text_field($_POST['postid']);

		if(!empty($postid) && !empty($nonce) && wp_verify_nonce($nonce)) {

			delete_post_meta($postid, '_mockup_status_1');
		}

		exit;
	}

	/**
	 * Ajax function to delete a comment
	 *
	 * @since 1.0.0
	 */
	public function mockup_delete_comment() {

		$nonce = sanitize_text_field($_POST['mockupnonce_backend']);
		$postid = sanitize_text_field($_POST['postid']);
		$commentid = sanitize_text_field($_POST['commentid']);

		$comments = get_post_meta($postid, '_mockup_comments_1', false);

		if(!empty($postid) && !empty($nonce) && wp_verify_nonce($nonce)) {

			delete_post_meta($postid, '_mockup_comments_1', $comments[$commentid]);
		}

		exit;
	}

}