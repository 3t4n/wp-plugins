<?php
/**
 * Rest API functions
 *
 * @package ShopCred
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class ShopCred_Rest
 */
class ShopCred_Rest extends \WP_REST_Controller {
	
	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 */
	private static $instance;

	/**
	 * Namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'shopcred/v';

	/**
	 * Version.
	 *
	 * @var string
	 */
	protected $version = '1';

	/**
	 * Initiator.
	 *
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * ShopCred_Rest constructor.
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * Register rest routes.
	 */
	public function register_routes() {
		$namespace = $this->namespace . $this->version;

		$post_type = Helper::get_post_types();

		foreach ( $post_type as $key => $value ) {
			// Add featured image source.
			register_rest_field(
				$value['value'],
				'spc_featured_image_src',
				array(
					'get_callback'    => array( $this, 'get_image_src' ),
					'update_callback' => null,
					'schema'          => null,
				)
			);
			// Add author info.
			register_rest_field(
				$value['value'],
				'spc_author_info',
				array(
					'get_callback'    => array( $this, 'get_author_info' ),
					'update_callback' => null,
					'schema'          => null,
				)
			);

			// Add comment info.
			register_rest_field(
				$value['value'],
				'spc_comment_info',
				array(
					'get_callback'    => array( $this, 'get_comment_info' ),
					'update_callback' => null,
					'schema'          => null,
				)
			);

			// Add excerpt info.
			register_rest_field(
				$value['value'],
				'spc_excerpt',
				array(
					'get_callback'    => array( $this, 'get_excerpt' ),
					'update_callback' => null,
					'schema'          => null,
				)
			);

			if ( class_exists( 'woocommerce' ) && "product" === $value['value'] ) {

				register_rest_field(
					$value['value'],
					'spc_product_taxonomy',
					array(
						'get_callback'    => array( $this, 'get_product_taxonomy' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);

				register_rest_field(
					$value['value'],
					'spc_product_price',
					array(
						'get_callback'    => array( $this, 'get_product_price_mrkup' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);

				register_rest_field(
					$value['value'],
					'spc_product_filter',
					array(
						'get_callback'    => array( $this, 'get_product_filters' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);
				
				register_rest_route(
					$value['value'],
					'spc_product_sale',
					array(
						'get_callback'    => array( $this, 'get_product_sale_price_mrkup' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);	
	
				register_rest_field(
					$value['value'],
					'spc_product_discount',
					array(
						'get_callback'    => array( $this, 'get_product_sale_discount' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);	

				register_rest_field(
					$value['value'],
					'spc_product_stock_status',
					array(
						'get_callback'    => array( $this, 'get_product_stock_status' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);	

				register_rest_field(
					$value['value'],
					'spc_product_featured',
					array(
						'get_callback'    => array( $this, 'get_product_featured' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);

				register_rest_field(
					$value['value'],
					'spc_product_rating',
					array(
						'get_callback'    => array( $this, 'get_product_average_rating_mrkup' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);	

				register_rest_field(
					$value['value'],
					'spc_get_class_name',
					array(
						'get_callback'    => array( $this, 'spc_get_filters_name_for_class' ),
						'update_callback' => null,
						'schema'          => null,
					)
				);
			}

		}

		// Update Settings.
		register_rest_route(
			$namespace,
			'/settings/',
			array(
				'methods'             => \WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'update_settings' ),
				'permission_callback' => array( $this, 'update_settings_permission' ),
			)
		);

		// Regenerate CSS Files.
		register_rest_route(
			$namespace,
			'/regenerate_css_files/',
			array(
				'methods'             => \WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'regenerate_css_files' ),
				'permission_callback' => array( $this, 'update_settings_permission' ),
			)
		);
	}

	/**
     * filterable Post use category name as class name
     * @param $element
     * @return array class name to filterable Post control items
     */
    public function spc_get_filters_name_for_class( $object, $field_name, $request ) {
        $separator = ' ';
        $cat_name_as_class = '';
        $post_type = get_post_type($object['id']);   
        $taxonomies = get_object_taxonomies($post_type);   
        $taxonomy_slugs = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "slugs"));
        
            foreach($taxonomy_slugs as $tax_slug) :            
                $cat_name_as_class .= $tax_slug . $separator ; 
            endforeach;
            return trim( $cat_name_as_class, $separator );
         
    }

	/**
	 * Get edit options permissions.
	 *
	 * @return bool
	 */
	public function update_settings_permission() {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Get featured image source for the rest field as per size
	 *
	 * @param object $object Post Object.
	 * @param string $field_name Field name.
	 * @param object $request Request Object.
	 * @since 1.0.0
	 */
	public function get_image_src( $object, $field_name, $request ) {
		$image_sizes = Helper::get_image_sizes();

		$featured_images = array();

		if ( ! isset( $object['featured_media'] ) ) {
			return $featured_images;
		}

		foreach ( $image_sizes as $key => $value ) {
			$size = $value['value'];

			$featured_images[ $size ] = wp_get_attachment_image_src(
				$object['featured_media'],
				$size,
				false
			);
		}

		return $featured_images;
	}

	/**
	 * Get author info for the rest field
	 *
	 * @param object $object Post Object.
	 * @param string $field_name Field name.
	 * @param object $request Request Object.
	 * @since 1.0.0
	 */
	public function get_author_info( $object, $field_name, $request ) {

		$author = ( isset( $object['author'] ) ) ? $object['author'] : '';

		// Get the author name.
		$author_data['display_name'] = get_the_author_meta( 'display_name', $author );

		// Get the author link.
		$author_data['author_link'] = get_author_posts_url( $author );

		// Return the author data.
		return $author_data;
	}

	/**
	 * Get comment info for the rest field
	 *
	 * @param object $object Post Object.
	 * @param string $field_name Field name.
	 * @param object $request Request Object.
	 * @since 1.0.0
	 */
	public function get_comment_info( $object, $field_name, $request ) {
		// Get the comments link.
		$comments_count = wp_count_comments( $object['id'] );
		return $comments_count->total_comments;
	}

	/**
	 * Get excerpt for the rest field
	 *
	 * @param object $object Post Object.
	 * @param string $field_name Field name.
	 * @param object $request Request Object.
	 * @since 1.0.0
	 */
	public function get_excerpt( $object, $field_name, $request ) {
		$excerpt = wp_trim_words( get_the_excerpt( $object['id'] ) );
		if ( ! $excerpt ) {
			$excerpt = null;
		}
		return $excerpt;
	}

	
	public function get_product_price_mrkup( $object, $field_name, $request ) {
		global $product, $post;
		$product  = wc_get_product( $object['id'] );

		$price = $product->get_price_html();

		return $price;
	}	

	//Product Terms - taxonomy
	public function get_product_taxonomy( $object, $field_name, $request ) {
		global $product, $post;

		$terms_name = '';
		$separator = ' ';

		$cat = get_the_terms( $product->get_id(), 'product_cat');

		if (!empty($cat)) {
			foreach ($cat as $val) {
				$terms_name .= '<a href="'.esc_url(get_term_link($val->term_id)).'">'.esc_html($val->name).'</a>' . $separator;
			}
		}

		return trim( $terms_name, $separator );
	}	


	public function get_product_average_rating_mrkup( $object, $field_name, $request ) {
		global $product, $post;
		
		$ratting = wc_get_rating_html( $product->get_average_rating() );
		
		return $ratting;
		
	}	
	
	
	//Product Filters
	public function get_product_filters( $object, $field_name, $request ) {
		global $product, $post;
	
		$product  = wc_get_product( $object['id'] );

		$featured = $product->is_featured();
	
		return $featured;
	}	

	//Featured Product
	public function get_product_featured( $object, $field_name, $request ) {
		global $product, $post;
	
		$product  = wc_get_product( $object['id'] );

		$featured = $product->is_featured();
	
		return $featured;
	}

	//Product Stock Status
	public function get_product_stock_status( $object, $field_name, $request ) {
		global $product, $post;
	
		$product  = wc_get_product( $object['id'] );

		$stock_status = '';
		if ( ( $product->get_stock_status() == 'outofstock' ) ) {
			$stock_status .= '<div class="spc-product-outofstock">';
				$stock_status .= '<span>'.esc_html__( "Out of stock", "shopcred" ).'</span>';
			$stock_status .= '</div>';
		}elseif ( ($product->get_stock_status() == 'instock' ) ) {
			$stock_status .= '<div class="spc-product-instock">';
			$stock_status .= '<span>'.esc_html__( "In Stock", "shopcred" ).'</span>';
			$stock_status .= '</div>';
		}

		return $stock_status;
	}

	//Product Sale Discount 
	public function get_product_sale_discount( $object, $field_name, $request ) {
		
		global $product, $post;
	
		$product  = wc_get_product( $object['id'] );

		$sale_price = $product->get_sale_price();
		$regular_price = $product->get_regular_price();

		$discount = ( $sale_price && $regular_price ) ? round( ( $regular_price - $sale_price ) / $regular_price * 100 ) .'%' : '';
		
		return $discount;
	}

	//Product price
	public function get_product_sale_price_mrkup( $object, $field_name, $request ) {
		global $product, $post;
        $out_of_stock = false;
		$product  = wc_get_product( $object['id'] );
        if (!$product->is_in_stock() && !is_product()) {
            $out_of_stock = true;
        }
		  /* Sale label */
		  if ($product->is_on_sale() && !$out_of_stock && ! empty($product->get_sale_price())) {

			$percentage = '';

			if ($product->get_type() == 'variable') {

				$available_variations = $product->get_variation_prices();
				$max_percentage = 0;

				foreach ($available_variations['regular_price'] as $key => $regular_price) {
					$sale_price = $available_variations['sale_price'][$key];

					if ($sale_price < $regular_price) {
						$percentage = round((($regular_price - $sale_price) / $regular_price) * 100);

						if ($percentage > $max_percentage) {
							$max_percentage = $percentage;
						}
					}
				}

			$percentage = $max_percentage;
			} elseif ($product->get_type() == 'simple' || $product->get_type() == 'external') {
				$percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
			}

		}
		return $percentage;
	}


	/**
	 * Sanitize our options.
	 *
	 * @since 1.0.0
	 * @param string $name The setting name.
	 * @param mixed  $value The value to save.
	 */
	public function sanitize_value( $name, $value ) {
		$callbacks = apply_filters(
			'shopcred_option_sanitize_callbacks',
			array(
				'css_print_method' => 'sanitize_text_field',
				'sync_responsive_previews' => 'rest_sanitize_boolean',
			)
		);

		$callback = $callbacks[ $name ];

		if ( ! is_callable( $callback ) ) {
			return sanitize_text_field( $value );
		}

		return $callback( $value );
	}

	/**
	 * Update Settings.
	 *
	 * @param WP_REST_Request $request  request object.
	 *
	 * @return mixed
	 */
	public function update_settings( \WP_REST_Request $request ) {
		$current_settings = get_option( 'shop-cred', array() );
		$new_settings = $request->get_param( 'settings' );

		foreach ( $new_settings as $name => $value ) {
			// Skip if the option hasn't changed.
			if ( $current_settings[ $name ] === $new_settings[ $name ] ) {
				unset( $new_settings[ $name ] );
				continue;
			}

			// Only save options that we know about.
			if ( ! array_key_exists( $name, Block_Defaults_Attributes::get_option_defaults() ) ) {
				unset( $new_settings[ $name ] );
				continue;
			}

			// Sanitize our value.
			$new_settings[ $name ] = $this->sanitize_value( $name, $value );
		}

		if ( empty( $new_settings ) ) {
			return $this->success( __( 'No changes found.', 'shopcred' ) );
		}

		if ( is_array( $new_settings ) ) {
			update_option( 'shop-cred', array_merge( $current_settings, $new_settings ) );
		}

		return $this->success( __( 'Settings saved.', 'shopcred' ) );
	}

	/**
	 * Regenerate CSS Files.
	 *
	 * @param WP_REST_Request $request  request object.
	 *
	 * @return mixed
	 */
	public function regenerate_css_files( \WP_REST_Request $request ) {
		update_option( 'Dynamic_CSS_posts', array() );

		return $this->success( __( 'CSS files regenerated.', 'shopcred' ) );
	}

	/**
	 * Success rest.
	 *
	 * @param mixed $response response data.
	 * @return mixed
	 */
	public function success( $response ) {
		return new \WP_REST_Response(
			array(
				'success'  => true,
				'response' => $response,
			),
			200
		);
	}

	/**
	 * Error rest.
	 *
	 * @param mixed $code     error code.
	 * @param mixed $response response data.
	 * @return mixed
	 */
	public function error( $code, $response ) {
		return new \WP_REST_Response(
			array(
				'error'      => true,
				'success'    => false,
				'error_code' => $code,
				'response'   => $response,
			),
			401
		);
	}

}

ShopCred_Rest::get_instance();
