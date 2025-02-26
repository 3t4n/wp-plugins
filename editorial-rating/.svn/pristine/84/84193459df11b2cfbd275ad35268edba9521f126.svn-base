<?php

/**
 * The public-facing display of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 */

/**
 * The public-facing display of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 * @author     Forhad Hossain <need@forhad.net>
 */
class WPAS_Editorial_Rating_Public_Display {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * A shortcode for this plugin.
	 *
	 * @since   2.0.0
	 * @param   string $atts attribute of this shortcode.
	 */
	public function wpas_shortcode_execute( $atts ) {

		// Get the meta ID.
		$wpas_post_id = intval( $atts['id'] );

		// Get meta values.
		$wpas_meta_values           = get_post_meta( $wpas_post_id, '_wpas_er_options', true );
		$wpas_theme_select          = isset( $wpas_meta_values['wpas-theme-select'] ) ? $wpas_meta_values['wpas-theme-select'] : '';
		$wpas_max_width             = isset( $wpas_meta_values['wpas-max-width'] ) ? $wpas_meta_values['wpas-max-width'] : '';
		$wpas_user_rating_shows     = isset( $wpas_meta_values['wpas-user-rating-shows'] ) ? $wpas_meta_values['wpas-user-rating-shows'] : '';
		$wpas_user_rating_pre_txt   = isset( $wpas_meta_values['wpas-user-rating-pre-txt'] ) ? $wpas_meta_values['wpas-user-rating-pre-txt'] : '';
		$wpas_score_title           = isset( $wpas_meta_values['wpas-score-title'] ) ? $wpas_meta_values['wpas-score-title'] : '';
		$wpas_score_overview        = isset( $wpas_meta_values['wpas-score-overview'] ) ? $wpas_meta_values['wpas-score-overview'] : '';
		$wpas_product_image_url     = isset( $wpas_meta_values['wpas-product-image']['url'] ) ? $wpas_meta_values['wpas-product-image']['url'] : '';
		$wpas_product_image_alt     = isset( $wpas_meta_values['wpas-product-image']['alt'] ) ? $wpas_meta_values['wpas-product-image']['alt'] : '';
		$wpas_editorial_date_show   = isset( $wpas_meta_values['wpas-editorial-date-show'] ) ? $wpas_meta_values['wpas-editorial-date-show'] : '';
		$wpas_editorial_date_label  = isset( $wpas_meta_values['wpas-editorial-date-label'] ) ? $wpas_meta_values['wpas-editorial-date-label'] : '';
		$wpas_editorial_date_custom = isset( $wpas_meta_values['wpas-editorial-date-custom'] ) ? $wpas_meta_values['wpas-editorial-date-custom'] : '';
		$wpas_editorial_rating_show = isset( $wpas_meta_values['wpas-editorial-rating-show'] ) ? $wpas_meta_values['wpas-editorial-rating-show'] : '';
		$wpas_editorial_rating      = isset( $wpas_meta_values['wpas-editorial-rating'] ) ? $wpas_meta_values['wpas-editorial-rating'] : '';
		$wpas_bar_animation         = isset( $wpas_meta_values['wpas-bar-animation'] ) ? $wpas_meta_values['wpas-bar-animation'] : '';
		$is_wpas_pros_cons_shows    = isset( $wpas_meta_values['wpas-pros-cons-shows'] ) ? $wpas_meta_values['wpas-pros-cons-shows'] : '';
		$wpas_wpas_pros             = isset( $wpas_meta_values['wpas-pros'] ) ? $wpas_meta_values['wpas-pros'] : '';
		$wpas_wpas_cons             = isset( $wpas_meta_values['wpas-cons'] ) ? $wpas_meta_values['wpas-cons'] : '';
		$wpas_pros_label            = isset( $wpas_meta_values['wpas-pros-label'] ) ? $wpas_meta_values['wpas-pros-label'] : '';
		$wpas_cons_label            = isset( $wpas_meta_values['wpas-cons-label'] ) ? $wpas_meta_values['wpas-cons-label'] : '';
		$wpas_product_btn_show      = isset( $wpas_meta_values['wpas-product-btn-show'] ) ? $wpas_meta_values['wpas-product-btn-show'] : '';
		$wpas_product_btn_txt       = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-text'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-text'] : '';
		$wpas_product_btn_url       = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-link'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-link'] : '';
		$wpas_product_btn_target    = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-target'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-target'] : '';
		$wpas_product_btn_nofollow  = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-nofollow'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-nofollow'] : '';
		$wpas_product_name_linked   = isset( $wpas_meta_values['wpas-product-name-linked'] ) ? $wpas_meta_values['wpas-product-name-linked'] : '';
		$wpas_product_img_linked    = isset( $wpas_meta_values['wpas-product-img-linked'] ) ? $wpas_meta_values['wpas-product-img-linked'] : '';

		if ( ! empty( $wpas_editorial_rating ) ) {

			// Get the score.
			$wpas_i            = 0;
			$wpas_total_rating = 0;
			foreach ( $wpas_editorial_rating as $wpas_editorial_rating_key => $wpas_editorial_rating_value ) {
				$wpas_total_rating += $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'];
				$wpas_i++;
			}
			$wpas_total_rating_math       = $wpas_total_rating / $wpas_i;
			$wpas_total_rating_math_round = number_format( $wpas_total_rating_math, 1 );

			/**
			 * Start user rating game from here.
			 * NOTE: Get post meta from post id, not shortcode attr id.
			 */
			$frhd_total_vote   = isset( $wpas_meta_values['wpas-total-vote'] ) ? (int) $wpas_meta_values['wpas-total-vote'] : 0;
			$frhd_total_star   = isset( $wpas_meta_values['wpas-total-star'] ) ? (int) $wpas_meta_values['wpas-total-star'] : 0;
			$frhd_rate_math    = '';
			if ( $frhd_total_vote > 0 ) {

				$frhd_rate_math = ( $frhd_total_star / $frhd_total_vote );
			}
			$frhd_rate_math_round   = round( (float) $frhd_rate_math, 1 );
			$frhd_rate_math_percent = ( 20 * $frhd_rate_math_round );

			ob_start();

			// Show dynamic styles.
			require WPASER_DIR_PATH_FILE . 'public/average-score-dynamic-styles.php';

			/**
			 * Switching theme parts.
			 */
			switch ( $wpas_theme_select ) {

				case 'value-1':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-2':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-3':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-4':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-5':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-6':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-7':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-8':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				case 'value-9':
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;

				default:
					require plugin_dir_path( __FILE__ ) . 'template-parts/wpas-theme-1.php';
					break;
			}

			return ob_get_clean();
		} else {

			echo '<p>No review found!</p>';
		}
	}

	/**
	 * Getting Ajax of User Rating.
	 *
	 * @return void
	 */
	public function frhd_user_vote() {

		$frhd_the_post_id   = $_POST['post_id'];
		$frhd_the_post_er   = $_POST['post_er'];
		$frhd_rating_val    = $_POST['rating_val'];
		$frhd_rating_vote   = $_POST['rating_vote'];
		$frhd_meta_key_name = '_wpas_er_options';
		$frhd_old_meta      = get_post_meta( $frhd_the_post_id, $frhd_meta_key_name, true );
		$frhd_vote_meta     = array(
			'wpas-total-vote' => $frhd_rating_vote,
			'wpas-total-star' => $frhd_rating_val,
			'wpas-post-er'    => $frhd_the_post_er,
		);

		// Merge the arrays together.
		if ( ! empty( $frhd_old_meta ) ) {

			$new_meta = array_merge( $frhd_old_meta, $frhd_vote_meta );
			update_post_meta( $frhd_the_post_id, $frhd_meta_key_name, $new_meta );
		} else {

			update_post_meta( $frhd_the_post_id, $frhd_meta_key_name, $frhd_old_meta );
		}


		die();
	}
}
