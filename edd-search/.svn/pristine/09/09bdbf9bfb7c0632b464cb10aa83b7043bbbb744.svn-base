<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Advanced Ajax Search For Easy Digital Downloads (EDD) 
 * Description:       Ajax Search for Easy Digital Downloads
 * Version:           1.0.4
 * Author:            Kopila Shrestha
 * Text Domain:       edd-search
 * Domain Path:       /languages
 */

// Restrict direct access 
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin setup and initialization
 */
class EddSearch{

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2);
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3);
		add_action( 'wp_enqueue_scripts', array( $this, 'edd_search_enqueue' ), 5);
		add_shortcode( 'edd_search', array( $this, 'edd_search' ), 6);
		
		add_action('wp_ajax_nopriv_edd_search_fetch_data',array($this, 'edd_search_fetch_data'), 7);
		add_action('wp_ajax_edd_search_fetch_data' , array($this,'edd_search_fetch_data'), 8);

		add_action( 'admin_notices', array($this, 'admin_notice_missing_plugin'), 9);
	}

	/**
	 * Define Plugin Constants
	 */
	function constants() {

		define( 'EDD_SEARCH_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'EDD_SEARCH_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * String translations
	 */
	function i18n() {
		load_plugin_textdomain( 'edd-search', false, 'edd-search/languages' );
	}

	/**
     * load js and css files
     */
	function edd_search_enqueue(){

		wp_enqueue_style( 'edd-search-style', EDD_SEARCH_URI.'css/style.css','', '1.0.3' );

		wp_enqueue_script( 'edd-search-script', EDD_SEARCH_URI.'js/script.js', array('jquery'), '1.0.3');

		wp_localize_script( 'edd-search-script', 'edd_search_wp_ajax', array( 
			'ajaxurl' 	=> admin_url( 'admin-ajax.php'),
			'ajaxnonce' => wp_create_nonce('ajax-nonce')
		));

	}

	//search form
	function edd_search($atts){

		$atts = shortcode_atts(
			array(
				'placeholder' 	=> 'Search...',
				'length'		=> 3,	
				'category'		=> false,	
				'tag'			=> false,	
				'not-found'		=> 'Data not Found'
			),$atts
		);
		ob_start();
		?>
		<div class="edd-search">
			<input type="text" value="" name="ajaxsearch" class="ajaxsearch" autocomplete="off" placeholder="<?php echo esc_attr__($atts['placeholder']); ?>" data-length="<?php echo esc_attr__($atts['length']); ?>" search-by-tag="<?php echo esc_attr__($atts['tag']); ?>" search-by-category="<?php echo esc_attr__($atts['category']); ?>" data-not-found="<?php echo esc_attr__($atts['not-found']); ?>" />
			<div class="edd-search-result"></div>
		</div>
		<?php 
		return ob_get_clean();
	}

	// ajax search function
	function edd_search_fetch_data(){

		if ( ! wp_verify_nonce( $_POST['security'], 'ajax-nonce' ) ){
			die ();
		}
		if( class_exists( 'Easy_Digital_Downloads' ) ) {

			global $wpdb;

			$select = "SELECT DISTINCT id
			FROM  $wpdb->posts as p
			LEFT JOIN $wpdb->term_relationships as tr ON (p.ID = tr.object_id)
			LEFT JOIN $wpdb->term_taxonomy as tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
			LEFT JOIN $wpdb->terms as wt ON(tt.term_id = wt.term_id)
			WHERE p.post_status = 'publish' AND p.post_type = 'download' ";

			if ('true' == $_POST['tag'] && 'true' == $_POST['category']) {
				$select .= " AND (tt.taxonomy = 'download_tag' OR tt.taxonomy = 'download_category') AND ( p.post_title LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%'  OR wt.name LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%')";
			}else{

				if ('true' == $_POST['tag']) {
					$select .= " AND tt.taxonomy = 'download_tag' AND ( p.post_title LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%'  OR wt.name LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%')";
				}else if ('true' == $_POST['category']) {
					$select .= " AND tt.taxonomy = 'download_category' AND ( p.post_title LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%'  OR wt.name LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%')";
				}else{
					$select .= " AND ( p.post_title LIKE '%". sanitize_text_field( $_POST['ajaxsearch'] ) ."%')";

				}
			}

			$select .= "ORDER BY p.post_date DESC";
			$posts = $wpdb->get_results ( $select);

			if (!$posts) {
				$response['status'] = 0;
			}

			foreach ($posts as $key => $post) {

				$data[$key]['id'] = $post->id;
				$data[$key]['title'] = get_the_title($post->id);
				$data[$key]['link'] = get_permalink($post->id);

			}
			$response = array(
				'status' => 1,
				'data' => $data,
			);

		}
		else{

			$response['status'] = 0;
			$response['error'] = esc_html__( 'Easy Digital Downloads is not active.', 'edd-search' );

		}

		wp_send_json($response);

	}

	//Admin notice
	function admin_notice_missing_plugin(){

		if( !class_exists( 'Easy_Digital_Downloads' ) ) {

			$notice = sprintf(
				__( '%1$s requires %2$s to be installed and activated.', 'edd-search' ),
				'<strong>' . esc_html__( 'EDD Search ', 'edd-search' ) . '</strong>',
				'<strong>' . esc_html__( 'Easy Digital Downloads', 'edd-search' ) . '</strong>'
			);

			printf('<div class="error"><p>%1$s</p></div>',$notice);
		}

	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}

}

function EddSearch_plugin_load() {

	return EddSearch::get_instance();

}
add_action('plugins_loaded', 'EddSearch_plugin_load', 1 );
