<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'GS_Book_Showcase_Dummy_Data' ) ) {

	final class GS_Book_Showcase_Dummy_Data {

		private static $_instance = null;

		private $is_pro;

		public static function get_instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new GS_Book_Showcase_Dummy_Data();
			}

			return self::$_instance;
		}

		public function __construct() {

			add_action( 'wp_ajax_gsbooks_dismiss_demo_data_notice', array( $this, 'gsbooks_dismiss_demo_data_notice' ) );
			add_action( 'wp_ajax_gs_books_import_book_data', array( $this, 'import_book_data' ) );
			add_action( 'wp_ajax_gs_books_remove_book_data', array( $this, 'remove_book_data' ) );
			add_action( 'wp_ajax_gs_books_import_shortcode_data', array( $this, 'import_shortcode_data' ) );
			add_action( 'wp_ajax_gs_books_remove_shortcode_data', array( $this, 'remove_shortcode_data' ) );
			add_action( 'wp_ajax_gs_books_import_all_data', array( $this, 'import_all_data' ) );
			add_action( 'wp_ajax_gs_books_remove_all_data', array( $this, 'remove_all_data' ) );
			add_action( 'admin_init', array( $this, 'maybe_auto_import_all_data' ) );

			// Remove dummy indicator
			add_action( 'edit_post_gs_book_showcase_slider', array( $this, 'remove_dummy_indicator' ), 10 );

			// Import Process
			add_action(
				'gsbooks_dummy_attachments_process_start',
				function () {

					// Force delete option if have any
					delete_option( 'gsbooks_dummy_book_data_created' );

					// Force update the process
					set_transient( 'gsbooks_dummy_book_data_creating', 1, 3 * MINUTE_IN_SECONDS );
				}
			);

			add_action(
				'gsbooks_dummy_attachments_process_finished',
				function () {

					$this->create_dummy_terms();
				}
			);

			add_action(
				'gsbooks_dummy_terms_process_finished',
				function () {

					$this->create_dummy_books();
				}
			);

			add_action(
				'gsbooks_dummy_books_process_finished',
				function () {

					// clean the record that we have started a process
					delete_transient( 'gsbooks_dummy_book_data_creating' );

					// Add a track so we never duplicate the process
					update_option( 'gsbooks_dummy_book_data_created', 1 );
				}
			);

			// Shortcodes
			add_action(
				'gsbooks_dummy_shortcodes_process_start',
				function () {

					// Force delete option if have any
					delete_option( 'gsbooks_dummy_shortcode_data_created' );

					// Force update the process
					set_transient( 'gsbooks_dummy_shortcode_data_creating', 1, 3 * MINUTE_IN_SECONDS );
				}
			);

			add_action(
				'gsbooks_dummy_shortcodes_process_finished',
				function () {

					// clean the record that we have started a process
					delete_transient( 'gsbooks_dummy_shortcode_data_creating' );

					// Add a track so we never duplicate the process
					update_option( 'gsbooks_dummy_shortcode_data_created', 1 );
				}
			);
		}

		public function get_taxonomy_list() {

			if ( ! is_pro_active() ) {
				return array( 'bookshowcase_group', 'gsb_tag' );
			}

			return array( 'bookshowcase_group', 'gsb_tag', 'gsb_genre', 'gsb_author', 'gsb_series', 'gsb_publishers', 'gsb_languages', 'gsb_countries' );
		}

        public function maybe_auto_import_all_data() {

            if ( get_option('gs_book_autoimport_done') == true ) return;

            $books = get_posts([
                'numberposts' => -1,
                'post_type' => 'gs_bookshowcase',
                'fields' => 'ids'
            ]);

            $shortcodes = plugin()->builder->get_shortcodes();

            if ( empty($books) && empty($shortcodes) ) {
                $this->_import_book_data( false );
                $this->_import_shortcode_data( false );
            }

            update_option( 'gs_book_autoimport_done', true );
            
        } 

		public function remove_dummy_indicator( $post_id ) {

			if ( empty( get_post_meta( $post_id, 'gsbooks-demo_data', true ) ) ) {
				return;
			}

			$taxonomies = $this->get_taxonomy_list();

			// Remove dummy indicator from texonomies
			$dummy_terms = wp_get_post_terms(
				$post_id,
				$taxonomies,
				array(
					'fields'     => 'ids',
					'meta_key'   => 'gsbooks-demo_data',
					'meta_value' => 1,
				)
			);

			if ( ! empty( $dummy_terms ) ) {
				foreach ( $dummy_terms as $term_id ) {
					delete_term_meta( $term_id, 'gsbooks-demo_data', 1 );
				}
				delete_transient( 'gsbooks_dummy_terms' );
			}

			// Remove dummy indicator from attachments
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
			if ( ! empty( $thumbnail_id ) ) {
				delete_post_meta( $thumbnail_id, 'gsbooks-demo_data', 1 );
			}
			delete_transient( 'gsbooks_dummy_attachments' );

			// Remove dummy indicator from post
			delete_post_meta( $post_id, 'gsbooks-demo_data', 1 );
			delete_transient( 'gsbooks_dummy_books' );
		}

		public function import_all_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			$response = array(
				'book'      => $this->_import_book_data( false ),
				'shortcode' => $this->_import_shortcode_data( false ),
			);

			if ( wp_doing_ajax() ) {
				wp_send_json_success( $response, 200 );
			}

			return $response;
		}

		public function remove_all_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			$response = array(
				'book'      => $this->_remove_book_data( false ),
				'shortcode' => $this->_remove_shortcode_data( false ),
			);

			if ( wp_doing_ajax() ) {
				wp_send_json_success( $response, 200 );
			}

			return $response;
		}

		public function import_book_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			// Start importing
			$this->_import_book_data();
		}

		public function remove_book_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			// Remove book data
			$this->_remove_book_data();
		}

		public function import_shortcode_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			// Start importing
			$this->_import_shortcode_data();
		}

		public function remove_shortcode_data() {

			// Validate nonce && check permission
			if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}

			// Hide the notice
			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );

			// Remove data
			$this->_remove_shortcode_data();
		}

		public function _import_book_data( $is_ajax = null ) {

			if ( $is_ajax === null ) {
				$is_ajax = wp_doing_ajax();
			}

			// Data already imported
			if ( get_option( 'gsbooks_dummy_book_data_created' ) !== false || get_transient( 'gsbooks_dummy_book_data_creating' ) !== false ) {

				$message_202 = __( 'Dummy Data already imported', 'gsbookshowcase' );

				if ( $is_ajax ) {
					wp_send_json_success( $message_202, 202 );
				}

				return array(
					'status'  => 202,
					'message' => $message_202,
				);

			}

			// Importing demo data
			$this->create_dummy_attachments();

			$message = __( 'Dummy Data imported', 'gsbookshowcase' );

			if ( $is_ajax ) {
				wp_send_json_success( $message, 200 );
			}

			return array(
				'status'  => 200,
				'message' => $message,
			);
		}

		public function _remove_book_data( $is_ajax = null ) {

			if ( $is_ajax === null ) {
				$is_ajax = wp_doing_ajax();
			}

			$this->delete_dummy_attachments();
			$this->delete_dummy_terms();
			$this->delete_dummy_books();

			delete_option( 'gsbooks_dummy_book_data_created' );
			delete_transient( 'gsbooks_dummy_book_data_creating' );

			$message = __( 'Dummy Books deleted', 'gsbookshowcase' );

			if ( $is_ajax ) {
				wp_send_json_success( $message, 200 );
			}

			return array(
				'status'  => 200,
				'message' => $message,
			);
		}

		public function _import_shortcode_data( $is_ajax = null ) {

			if ( $is_ajax === null ) {
				$is_ajax = wp_doing_ajax();
			}

			// Data already imported
			if ( get_option( 'gsbooks_dummy_shortcode_data_created' ) !== false || get_transient( 'gsbooks_dummy_shortcode_data_creating' ) !== false ) {

				$message_202 = __( 'Dummy Shortcodes already imported', 'gsbookshowcase' );

				if ( $is_ajax ) {
					wp_send_json_success( $message_202, 202 );
				}

				return array(
					'status'  => 202,
					'message' => $message_202,
				);

			}

			// Importing demo shortcodes
			$this->create_dummy_shortcodes();

			$message = __( 'Dummy Shortcodes imported', 'gsbookshowcase' );

			if ( $is_ajax ) {
				wp_send_json_success( $message, 200 );
			}

			return array(
				'status'  => 200,
				'message' => $message,
			);
		}

		public function _remove_shortcode_data( $is_ajax = null ) {

			if ( $is_ajax === null ) {
				$is_ajax = wp_doing_ajax();
			}

			$this->delete_dummy_shortcodes();

			delete_option( 'gsbooks_dummy_shortcode_data_created' );
			delete_transient( 'gsbooks_dummy_shortcode_data_creating' );

			$message = __( 'Dummy Shortcodes deleted', 'gsbookshowcase' );

			if ( $is_ajax ) {
				wp_send_json_success( $message, 200 );
			}

			return array(
				'status'  => 200,
				'message' => $message,
			);
		}

		public function get_taxonomy_ids_by_slugs( $taxonomy_group, $taxonomy_slugs = array() ) {			

			$_terms = $this->get_dummy_terms();

			if ( empty( $_terms ) ) {
				return array();
			}

			$_terms = wp_filter_object_list( $_terms, array( 'taxonomy' => $taxonomy_group ) );
			$_terms = array_values( $_terms );      // reset the keys

			if ( empty( $_terms ) ) {
				return array();
			}

			$term_ids = array();

			foreach ( $taxonomy_slugs as $slug ) {
				$key = array_search( $slug, array_column( $_terms, 'slug' ) );
				if ( $key !== false ) {
					$term_ids[] = $_terms[ $key ]['term_id'];
				}
			}

			return $term_ids;
		}

		public function get_attachment_id_by_filename( $filename ) {

			$attachments = $this->get_dummy_attachments();

			if ( empty( $attachments ) ) {
				return '';
			}

			$attachments = wp_filter_object_list( $attachments, array( 'post_name' => $filename ) );
			if ( empty( $attachments ) ) {
				return '';
			}

			$attachments = array_values( $attachments );

			return $attachments[0]->ID;
		}

		public function get_tax_inputs( $free_tax = array(), $pro_tax = array() ) {

			if( is_pro_active() ) {
				$tax_inputs = array_merge( $free_tax, $pro_tax );
			} else {
				$tax_inputs = $free_tax;
			}

			if ( empty($tax_inputs) ) return [];

			foreach ( $tax_inputs as $tax_input => $tax_params ) {
				$tax_inputs[ $tax_input ] = $this->get_taxonomy_ids_by_slugs( $tax_input, $tax_params );
			}

			return $tax_inputs;
		}

		public function get_meta_inputs( $meta_inputs = array() ) {

			$meta_inputs['_thumbnail_id'] = $this->get_attachment_id_by_filename( $meta_inputs['_thumbnail_id'] );

			return $meta_inputs;
		}

		// Books
		public function create_dummy_books() {

			do_action( 'gsbooks_dummy_books_process_start' );

			$post_status = 'publish';
			$post_type   = 'gs_bookshowcase';

			$books = array();

			$books[] = array(
				'post_title'   => 'All He Knew',
				'post_content' => 'Three young children smuggle themselves into Auschwitz in search of their mothers. Seventeen year old Braelyn has grown up learning magic under the tutelage of Master Pioran, a former mage. Tragically, the past decade has plunged the world into an endless winter. While researching a solution to the weather crisis.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'business' ),
						'gsb_tag'            => array( 'fantasy', 'fiction', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'classics' ),
						'gsb_author'         => array( 'alexander-olson', 'annie-bellet', 'brad-magnarella' ),
						'gsb_series'         => array( 'ends-of-magic', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'bloomsbury', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'           => 'gs-book-img-1',
						'_gsbks_publish'          => '16 Dec, 24',
						'_gsbks_copublisher'      => 'Annie Bellet',
						'_gsbks_translator'       => 'Michael Brown',
						'_gsbks_isbn_ten'         => '2233445566',
						'_gsbks_isbn_thirteen'    => '3344556677',
						'_gsbks_asin'             => 'D004YTFDV4',
						'_gsbks_doi'              => '10.8642/tuv24680',
						'_gsbks_lccn'             => 'D004YTFDV4',
						'_gsbks_pages'            => '40',
						'_gsbks_dimension'        => '5 x 71 x 9.2 inches',
						'_gsbks_weight'           => 'LLC654321098',
						'_gsbks_fsize'            => '5MB',
						'_gsbks_url'              => 'example.com/book4',
						'_gsbks_review'           => 'Into The Realms is the first book in the into the realms series by Papa Sanchez. The background and character development help to quickly capture your attention right from the start.',
						'_gsbks_rating'           => '5',
						'_gsbks_book_cover'       => 'Paperback, Hardcover',
						'_gsbks_regular_price'    => '59',
						'_gsbks_sale_price'       => '55',
						'_gsbks_available_books'  => 'available',
						'_pre_order_books'        => 'yes',
						'_age_group'              => '26-30',
						'_reading_level'          => 'Intermediate',
						'_short_desc'             => 'Positive themes in a beginning reader format...The message here, and in the simultaneously published companion book, I Am Thankful (2017), is a good one and may encourage younger children to think about how to make their world a better place',
						'_gsbks_edition'          => '3rd Edition',
						'_edition_features'       => 'Additional Exercises Added',
						'_award_recognitions'     => 'Booker Prize Finalist',
						'_reading_time'           => '2-3 hours',
						'_accessibility_features' => 'enabled',

					)
				),
			);

			$books[] = array(
				'post_title'   => 'Curious Minds',
				'post_content' => 'The book is well-paced and engaging, with a plot that keeps readers invested in the characters fates. Vansens writing style is accessible and evocative, making it easy for readers to immerse themselves in the story. The book is well-paced and engaging, with a plot that keeps readers invested in the characters fates.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'anthologies', 'biography', 'business' ),
						'gsb_tag'            => array( 'fantasy', 'fiction', 'history', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'biographies', 'classics' ),
						'gsb_author'         => array( 'alexander-olson', 'brad-magnarella' ),
						'gsb_series'         => array( 'ends-of-magic', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'bloomsbury', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'      => 'gs-book-img-2',
						'_gsbks_copublisher' => 'John Grisham',
					)
				),
			);

			$books[] = array(
				'post_title'   => 'Genesis Awakens',
				'post_content' => 'Haunted by grief and consumed by illness, the determined young woman unravels a series of cryptic clues across a famine-stricken Ireland in a desperate mission of finding her lost family and recovering the enchanted brooch entwined with her spirit.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'business' ),
						'gsb_tag'            => array( 'fantasy', 'fiction', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'arts', 'biographies', 'classics' ),
						'gsb_author'         => array( 'alexander-olson', 'brad-magnarella' ),
						'gsb_series'         => array( 'ends-of-magic', 'harry-potter', 'outlande', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'      => 'gs-book-img-3',
						'_gsbks_copublisher' => 'D.K. Holmberg',
					)
				),
			);

			$books[] = array(
				'post_title'   => 'Legacy of Hunger',
				'post_content' => 'From dreams to desperation. When the magical secrets of The Emerald Isle beckon, can she discover her destiny? Pittsburgh, 1846. In the heart of the bustling city, Valentia McDowell is tormented by vivid nightmares. The visions of the past lead her to Ireland, the birthplace of her ancestors.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'anthologies', 'biography', 'business' ),
						'gsb_tag'            => array( 'fantasy', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'arts', 'biographies', 'classics' ),
						'gsb_author'         => array( 'alexander-olson', 'annie-bellet', 'bandit-heaven', 'brad-magnarella' ),
						'gsb_series'         => array( 'ends-of-magic', 'harry-potter', 'outlande', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'bloomsbury', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'      => 'gs-book-img-4',
						'_gsbks_copublisher' => 'R.H. Knight',
					)
				),
			);

			$books[] = array(
				'post_title'   => 'Symbiosis',
				'post_content' => 'Thousands of years ago, the Overseers scattered humans across the galaxy. Now, one of them has found her way back home. On a mission to recover an escaped alien life form, young Justice Keeper Anna Lenai pursues the felon into uncharted space, and accidentally finds the lost homeworld of her ancestors.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'anthologies', 'biography', 'business' ),
						'gsb_tag'            => array( 'fantasy', 'fiction', 'history', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'arts', 'biographies', 'classics' ),
						'gsb_author'         => array( 'alexander-olson' ),
						'gsb_series'         => array( 'ends-of-magic', 'harry-potter', 'outlande', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'bloomsbury', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'      => 'gs-book-img-5',
						'_gsbks_copublisher' => 'E.C Diskin',
					)
				),
			);

			$books[] = array(
				'post_title'   => 'The Book Thief',
				'post_content' => 'Can Braelyn use her magic to find an end to the decade-long winter? Or will her efforts be foiled by the discovery she makes? Seventeen year old Braelyn has grown up learning magic under the tutelage of Master Pioran, a former mage.',
				'post_status'  => $post_status,
				'post_type'    => $post_type,
				'post_date'    => '2020-08-15 07:01:44',
				'tax_input'    => $this->get_tax_inputs(
					array(
						'bookshowcase_group' => array( 'animals', 'anthologies', 'biography' ),
						'gsb_tag'            => array( 'fantasy', 'fiction', 'horror' ),
					),
					array(
						'gsb_genre'          => array( 'adventure', 'arts', 'biographies', 'classics' ),
						'gsb_author'         => array( 'alexander-olson', 'bandit-heaven', 'brad-magnarella' ),
						'gsb_series'         => array( 'ends-of-magic', 'harry-potter', 'outlande', 'the-dark-tower' ),
						'gsb_publishers'     => array( 'ash-publishing', 'bloomsbury', 'cambridge-press' ),
						'gsb_languages'      => array( 'arabic', 'english', 'japanese' ),
						'gsb_countries'      => array( 'australia', 'canada', 'india' ),
					)
				),
				'meta_input'   => $this->get_meta_inputs(
					array(
						'_thumbnail_id'      => 'gs-book-img-6',
						'_gsbks_copublisher' => 'Jack Peacher',
					)
				),
			);

			foreach ( $books as $book ) {
				// Insert the post into the database
				$post_id = wp_insert_post( $book );
				// Add meta value for demo
				if ( $post_id ) {
					add_post_meta( $post_id, 'gsbooks-demo_data', 1 );
				}
			}

			do_action( 'gsbooks_dummy_books_process_finished' );
		}

		public function delete_dummy_books() {

			$books = $this->get_dummy_books();

			if ( empty( $books ) ) {
				return;
			}

			foreach ( $books as $book ) {
				wp_delete_post( $book->ID, true );
			}

			delete_transient( 'gsbooks_dummy_data' );
		}

		public function get_dummy_books() {

			$books = get_transient( 'gsbooks_dummy_data' );

			if ( false !== $books ) {
				return $books;
			}

			$books = get_posts(
				array(
					'numberposts' => -1,
					'post_type'   => 'gs_bookshowcase',
					'meta_key'    => 'gsbooks-demo_data',
					'meta_value'  => 1,
				)
			);

			if ( is_wp_error( $books ) || empty( $books ) ) {
				delete_transient( 'gsbooks_dummy_data' );
				return array();
			}

			set_transient( 'gsbooks_dummy_data', $books, 3 * MINUTE_IN_SECONDS );

			return $books;
		}

		public function http_request_args( $args ) {

			$args['sslverify'] = false;

			return $args;
		}

		// Attachments
		public function create_dummy_attachments() {

			do_action( 'gsbooks_dummy_attachments_process_start' );

			require_once ABSPATH . 'wp-admin/includes/image.php';

			$attachment_files = array(
				'gs-book-img-1.jpg',
				'gs-book-img-2.jpg',
				'gs-book-img-3.jpg',
				'gs-book-img-4.jpg',
				'gs-book-img-5.jpg',
				'gs-book-img-6.jpg',
			);

			add_filter( 'http_request_args', array( $this, 'http_request_args' ) );

			wp_raise_memory_limit( 'image' );

			foreach ( $attachment_files as $file ) {

				$file = GS_BOOKS_PLUGIN_URI . '/assets/img/dummy-data/' . $file;

				$filename = basename( $file );
				$get      = wp_remote_get( $file );
				$type     = wp_remote_retrieve_header( $get, 'content-type' );
				$mirror   = wp_upload_bits( $filename, null, wp_remote_retrieve_body( $get ) );

				// Prepare an array of post data for the attachment.
				$attachment = array(
					'guid'           => $mirror['url'],
					'post_mime_type' => $type,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				);

				// Insert the attachment.
				$attach_id = wp_insert_attachment( $attachment, $mirror['file'] );

				// Generate the metadata for the attachment, and update the database record.
				$attach_data = wp_generate_attachment_metadata( $attach_id, $mirror['file'] );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				add_post_meta( $attach_id, 'gsbooks-demo_data', 1 );

			}

			remove_filter( 'http_request_args', array( $this, 'http_request_args' ) );

			do_action( 'gsbooks_dummy_attachments_process_finished' );
		}

		public function delete_dummy_attachments() {

			$attachments = $this->get_dummy_attachments();

			if ( empty( $attachments ) ) {
				return;
			}

			foreach ( $attachments as $attachment ) {
				wp_delete_attachment( $attachment->ID, true );
			}

			delete_transient( 'gsbooks_dummy_attachments' );
		}

		public function get_dummy_attachments() {

			$attachments = get_transient( 'gsbooks_dummy_attachments' );

			if ( false !== $attachments ) {
				return $attachments;
			}

			$attachments = get_posts(
				array(
					'numberposts' => -1,
					'post_type'   => 'attachment',
					'post_status' => 'inherit',
					'meta_key'    => 'gsbooks-demo_data',
					'meta_value'  => 1,
				)
			);

			if ( is_wp_error( $attachments ) || empty( $attachments ) ) {
				delete_transient( 'gsbooks_dummy_attachments' );
				return array();
			}

			set_transient( 'gsbooks_dummy_attachments', $attachments, 3 * MINUTE_IN_SECONDS );

			return $attachments;
		}

		// Terms
		public function create_dummy_terms() {

			do_action( 'gsbooks_dummy_terms_process_start' );

			$terms = array(
				// 3 Groups
				array(
					'name'  => 'Animals',
					'slug'  => 'animals',
					'group' => 'bookshowcase_group',
				),
				array(
					'name'  => 'Anthologies',
					'slug'  => 'anthologies',
					'group' => 'bookshowcase_group',
				),
				array(
					'name'  => 'Biography',
					'slug'  => 'biography',
					'group' => 'bookshowcase_group',
				),
				array(
					'name'  => 'Business',
					'slug'  => 'business',
					'group' => 'bookshowcase_group',
				),
				array(
					'name'  => 'Fantasy',
					'slug'  => 'fantasy',
					'group' => 'gsb_tag',
				),
				array(
					'name'  => 'Fiction',
					'slug'  => 'fiction',
					'group' => 'gsb_tag',
				),
				array(
					'name'  => 'History',
					'slug'  => 'history',
					'group' => 'gsb_tag',
				),
				array(
					'name'  => 'Horror',
					'slug'  => 'horror',
					'group' => 'gsb_tag',
				),
				
			);

			if ( is_pro_active() ) {

				$pro_terms = [

					array(
						'name'  => 'Adventure',
						'slug'  => 'adventure',
						'group' => 'gsb_genre',
					),
					array(
						'name'  => 'Arts',
						'slug'  => 'arts',
						'group' => 'gsb_genre',
					),
					array(
						'name'  => 'Biographies',
						'slug'  => 'biographies',
						'group' => 'gsb_genre',
					),
					array(
						'name'  => 'Classics',
						'slug'  => 'classics',
						'group' => 'gsb_genre',
					),
					array(
						'name'  => 'Alexander Olson',
						'slug'  => 'alexander-olson',
						'group' => 'gsb_author',
					),
					array(
						'name'  => 'Annie Bellet',
						'slug'  => 'annie-bellet',
						'group' => 'gsb_author',
					),
					array(
						'name'  => 'Bandit Heaven',
						'slug'  => 'bandit-heaven',
						'group' => 'gsb_author',
					),
					array(
						'name'  => 'Brad Magnarella',
						'slug'  => 'brad-magnarella',
						'group' => 'gsb_author',
					),
					array(
						'name'  => 'Ends of Magic',
						'slug'  => 'ends-of-magic',
						'group' => 'gsb_series',
					),
					array(
						'name'  => 'Harry Potter',
						'slug'  => 'harry-potter',
						'group' => 'gsb_series',
					),
					array(
						'name'  => 'Outlande',
						'slug'  => 'outlande',
						'group' => 'gsb_series',
					),
					array(
						'name'  => 'The Dark Tower',
						'slug'  => 'the-dark-tower',
						'group' => 'gsb_series',
					),
					array(
						'name'  => 'ASH Publishing',
						'slug'  => 'ash-publishing',
						'group' => 'gsb_publishers',
					),
					array(
						'name'  => 'Bloomsbury',
						'slug'  => 'bloomsbury',
						'group' => 'gsb_publishers',
					),
					array(
						'name'  => 'Cambridge Press',
						'slug'  => 'cambridge-press',
						'group' => 'gsb_publishers',
					),
					array(
						'name'  => 'Arabic',
						'slug'  => 'arabic',
						'group' => 'gsb_languages',
					),
					array(
						'name'  => 'English',
						'slug'  => 'english',
						'group' => 'gsb_languages',
					),
					array(
						'name'  => 'Japanese',
						'slug'  => 'japanese',
						'group' => 'gsb_languages',
					),
					array(
						'name'  => 'Australia',
						'slug'  => 'australia',
						'group' => 'gsb_countries',
					),
					array(
						'name'  => 'Canada',
						'slug'  => 'canada',
						'group' => 'gsb_countries',
					),
					array(
						'name'  => 'India',
						'slug'  => 'india',
						'group' => 'gsb_countries',
					),

				];

				$terms = array_merge( $terms, $pro_terms );

			}

			foreach ( $terms as $term ) {

				$response = wp_insert_term( $term['name'], $term['group'], array( 'slug' => $term['slug'] ) );

				if ( ! is_wp_error( $response ) ) {
					add_term_meta( $response['term_id'], 'gsbooks-demo_data', 1 );
				}
			}

			do_action( 'gsbooks_dummy_terms_process_finished' );
		}

		public function delete_dummy_terms() {

			$terms = $this->get_dummy_terms();

			if ( is_wp_error( $terms ) || empty( $terms ) ) {
				return;
			}

			foreach ( $terms as $term ) {
				wp_delete_term( $term['term_id'], $term['taxonomy'] );
			}

			delete_transient( 'gsbooks_dummy_terms' );
		}

		public function get_dummy_terms() {

			$terms = get_transient( 'gsbooks_dummy_terms' );

			if ( false !== $terms ) {
				return $terms;
			}

			$taxonomies = $this->get_taxonomy_list();

			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomies,
					'hide_empty' => false,
					'meta_key'   => 'gsbooks-demo_data',
					'meta_value' => 1,
				)
			);

			if ( is_wp_error( $terms ) ) {
				delete_transient( 'gsbooks_dummy_terms' );
				return array();
			}

			$terms = json_decode( json_encode( $terms ), true ); // Object to Array

			if ( empty( $terms ) ) {
				delete_transient( 'gsbooks_dummy_terms' );
				return array();
			}

			set_transient( 'gsbooks_dummy_terms', $terms, 3 * MINUTE_IN_SECONDS );

			return $terms;
		}

		// Shortcode
		public function create_dummy_shortcodes() {

			do_action( 'gsbooks_dummy_shortcodes_process_start' );

			plugin()->builder->create_dummy_shortcodes();

			do_action( 'gsbooks_dummy_shortcodes_process_finished' );
		}

		public function delete_dummy_shortcodes() {

			plugin()->builder->delete_dummy_shortcodes();
		}

		function gsbooks_dismiss_demo_data_notice() {

			$nonce = isset( $_REQUEST['nonce'] ) ? $_REQUEST['nonce'] : null;

			if ( ! wp_verify_nonce( $nonce, '_gsbooks_dismiss_demo_data_notice_gs_' ) ) {

				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );

			}

			update_option( 'gsbooks_dismiss_demo_data_notice', 1 );
		}
	}

}

GS_Book_Showcase_Dummy_Data::get_instance();