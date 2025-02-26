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
class WPAS_Editorial_Rating_Schema {

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
	 * Schema JSON data for this plugin.
	 *
	 * @since   2.1.0
	 * @param   string $atts attribute of this shortcode.
	 */
	public function wpas_enqueue_json_schema() {

		// Global options.
		$wpas_global_options = get_option( '_wpas_global_options' ); // Root.
		$wpas_schema_shows   = isset( $wpas_global_options['wpas-schema-allows'] ) ? $wpas_global_options['wpas-schema-allows'] : '';

		// Get the ER byproduct data.
		$wpas_erbp_opt_values       = get_post_meta( get_the_ID(), '_wpas_er_byproduct_options', true );
		$wpas_erbp_opt_schema_shows = isset( $wpas_erbp_opt_values['wpas-cpt-schema-shows'] ) ? $wpas_erbp_opt_values['wpas-cpt-schema-shows'] : '';
		$wpas_erbp_opt_schema_for = isset( $wpas_erbp_opt_values['wpas-cpt-review-selected-for'] ) ? $wpas_erbp_opt_values['wpas-cpt-review-selected-for'] : '';

		/**
		 * Get er ID from ajax meta.
		 * Start user rating game from here.
		 */
		$wpas_meta_values  = get_post_meta( $wpas_erbp_opt_schema_for, '_wpas_er_options', true );
		
		if ( $wpas_meta_values ) {

			$frhd_total_vote   = isset( $wpas_meta_values['wpas-total-vote'] ) ? (int) $wpas_meta_values['wpas-total-vote'] : 0;
			$frhd_total_star   = isset( $wpas_meta_values['wpas-total-star'] ) ? (int) $wpas_meta_values['wpas-total-star'] : 0;
			$frhd_rate_math    = '';
			if ( $frhd_total_vote > 0 ) {

				$frhd_rate_math = ( $frhd_total_star / $frhd_total_vote );
			}
			$frhd_rate_math_round   = round( (float) $frhd_rate_math, 1 );
			$frhd_rate_math_percent = ( 20 * $frhd_rate_math_round );
		}

		/**
		 * Schema JSON.
		 * Set up global post data.
		 */
		$wpas_get_post = get_post();
		setup_postdata( $wpas_get_post );
		$wpas_author_name = get_the_author();

		// If shows schema on this specific post.
		if ( $wpas_erbp_opt_schema_shows ) {

			$wpas_erbp_opt_auth_name  = isset( $wpas_erbp_opt_values['wpas-cpt-schema-auth-name'] ) ? $wpas_erbp_opt_values['wpas-cpt-schema-auth-name'] : '';
			$wpas_erbp_opt_auth_name  = empty( $wpas_erbp_opt_auth_name ) ? $wpas_author_name : $wpas_erbp_opt_auth_name;

			if ( ! empty( $wpas_erbp_opt_schema_for ) ) {

				// Get the score.
				$wpas_i                 = 0;
				$wpas_total_rating      = 0;
				$wpas_score_title       = isset( $wpas_meta_values['wpas-score-title'] ) ? $wpas_meta_values['wpas-score-title'] : '';
				$wpas_product_image_url = isset( $wpas_meta_values['wpas-product-image']['url'] ) ? $wpas_meta_values['wpas-product-image']['url'] : '';
				$wpas_score_overview    = isset( $wpas_meta_values['wpas-score-overview'] ) ? $wpas_meta_values['wpas-score-overview'] : '';
				$wpas_editorial_rating  = isset( $wpas_meta_values['wpas-editorial-rating'] ) ? $wpas_meta_values['wpas-editorial-rating'] : '';
				foreach ( $wpas_editorial_rating as $wpas_editorial_rating_key => $wpas_editorial_rating_value ) {
					$rating_value = $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'];
					$wpas_total_rating += round( floatval( $rating_value ) );
					$wpas_i++;
				}
				$wpas_total_rating_math       = $wpas_total_rating / $wpas_i;
				$wpas_total_rating_math_round = number_format( $wpas_total_rating_math, 1 );
			} else {

				$wpas_score_title             = get_the_title();
				$wpas_product_image_url       = '';
				$wpas_score_overview          = '';
				$wpas_total_rating_math_round = 'nan';
			}

			if ( $wpas_schema_shows ) {
				?>
<script type="application/ld+json">
{
	"@context": "https://schema.org/",
	"@type":"Review",
	"name":"<?php echo $wpas_score_title; ?>",
				<?php
				if ( ! empty( $wpas_product_image_url ) ) {
					echo '"image": "' . $wpas_product_image_url . '",';
				}
				?>

	"datePublished":" <?php echo get_the_date( 'Y-m-d' ) . ' ' . get_the_time( 'H:i:s' ); ?>",
	"dateModified":"<?php echo get_the_modified_date( 'Y-m-d' ) . ' ' . get_post_modified_time( 'H:i:s' ); ?>",
	"reviewBody":"<?php echo strip_tags( $wpas_score_overview ); ?>",
	"reviewRating":{
		"@type":"Rating",
		"worstRating":"1",
		"bestRating":"10",
		"ratingValue":<?php echo $wpas_total_rating_math_round; ?>
	},
	"author":{
		"@type":"Person",
		"name":"<?php echo $wpas_erbp_opt_auth_name; ?>"
	},
	"itemReviewed":{
		"@type":"Product",
		"name":"<?php echo $wpas_score_title; ?>",
		"aggregateRating":{
		"@type":"AggregateRating",
		"worstRating":"1",
		"bestRating":"10",
		"ratingValue":<?php echo $wpas_total_rating_math_round; ?>,
		"reviewCount":"1"
		}
	}
}
</script>
				<?php
			} // IF $wpas_schema_shows.
		} // IF $wpas_erbp_opt_schema_shows.
	}

}
