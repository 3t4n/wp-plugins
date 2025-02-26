<?php
/**
 * This file handles the dynamic parts of our blocks.
 *
 * @package ShopCred
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Render the dynamic aspects of our blocks.
 *
 * @since 1.0.0
 */
class Render_Block {
	
	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * Member Variable
	 *
	 * @since 1.0.0
	 * @var settings
	 */
	private static $settings;

	public static $set_attributes;

	/**
	 * Get Attributes
	 *
	 * @since 1.0.0
	 * @var settings
	 */
	// private static $product_grid;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
            add_action( 'admin_init', [ $this, 'activation_redirect' ] );
        }
		if ( class_exists( 'woocommerce' ) ) {
			add_action( 'init', array( $this, 'register_blocks' ) );
		}
		add_action( 'wp_ajax_spc_product_pagination', array( $this, 'product_pagination' ) );
		add_action( 'wp_ajax_nopriv_spc_product_pagination', array( $this, 'product_pagination' ) );	
		add_action( 'wp_ajax_spc_product_loadmore', array( $this, 'product_loadmore' ) );
		add_action( 'wp_ajax_nopriv_spc_product_loadmore', array( $this, 'product_loadmore' ) );
		add_filter( 'redirect_canonical', array( $this, 'override_canonical' ), 1, 2 );

		add_action( 'wp_ajax_spc_filter_post_grid_callback', array( $this,  'spc_filter_post_grid_callback' ));
		add_action( 'wp_ajax_nopriv_spc_filter_post_grid_callback', array( $this, 'spc_filter_post_grid_callback') );

		add_action( 'wp_ajax_custom_filter_post_grid_callback', array( $this,  'custom_filter_post_grid_callback' ));
		add_action( 'wp_ajax_nopriv_custom_filter_post_grid_callback', array( $this, 'custom_filter_post_grid_callback') );		
	}

	/**
     * Plugin Redirect Hook
     * 
     */
	public function activation_redirect() {
		if ( get_option( 'spc_do_update_redirect', false ) ) {
            delete_option( 'spc_do_update_redirect' );
            if ( !isset($_GET['activate-multi'] ) ) {
                wp_redirect( 'admin.php?page=shopcred-dashboard' );
                exit;
            }
        }
	}

	/**
	 * Register our dynamic blocks.
	 *
	 * @since 1.0.0
	 */
	public function register_blocks() {
		$Global_Product_Quickview_Attributes = Global_Attributes::get_product_quickview_attributes();
		$Global_Product_Tags_Attributes = Global_Attributes::get_product_tags_attributes();
		$Global_Product_Taxonomy_Attributes = Global_Attributes::get_product_taxonomy_attributes();
		$Global_Product_Container_Attributes = Global_Attributes::get_product_container_attributes();
		$Global_Product_Pagination_Attributes = Global_Attributes::get_product_pagination_attributes();
		$Global_Product_LoadMore_Attributes = Global_Attributes::get_product_loadmore_attributes();
		$Global_Product_swiper_arrows_Attributes = Global_Attributes::get_product_swiper_arrows_attributes();
		$Global_Product_swiper_dots_Attributes = Global_Attributes::get_product_swiper_dots_attributes();

		register_block_type(
			'spc/woo-product',
			array(
				'attributes'      => array_merge(
					$Global_Product_Quickview_Attributes,
					$Global_Product_Tags_Attributes,
					$Global_Product_Taxonomy_Attributes,
					$Global_Product_Container_Attributes,
					$Global_Product_Pagination_Attributes,
					$Global_Product_LoadMore_Attributes,
					$Global_Product_swiper_arrows_Attributes,
					$Global_Product_swiper_dots_Attributes,
					array(
						'block_id'                => array(
							'type'    => 'string',
						),
						'gap'      				=> array(
							'type'    => 'number',
							'default' => 20,
						),
						'gapTablet'      				=> array(
							'type'    => 'number',
							'default' => 10,
						),
						'gapMobile'      				=> array(
							'type'    => 'number',
							'default' => 20,
						),
						'post_type'                   => array(
							'type'    => 'string',
							'default' => 'grid',
						),
						'productGridMainMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '20', '0', '20', '0' ],
									'tablet' 	=> [ '15', '15', '15', '15' ],
									'mobile' 	=> [ '10', '10', '10', '10' ]
								),
							),
						),
						'productGridMainMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'productHotTagPosX'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '20',
									'mobile' 	=> '20',
								),
							),
						),
						'productHotTagPosXUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'productHotTagPosY'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '55',
									'tablet' 	=> '55',
									'mobile' 	=> '55',
								),
							),
						),
						'productHotTagPosYUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'productDiscntTagPosX'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '20',
									'mobile' 	=> '20',
								),
							),
						),
						'productDiscntTagPosXUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),		
						'productDiscntTagPosY'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '20',
									'mobile' 	=> '20',
								),
							),
						),
						'productDiscntTagPosYUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'productStockTagPosX'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '20',
									'mobile' 	=> '20',
								),
							),
						),
						'productStockTagPosXUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'productStockTagPosY'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '20',
									'mobile' 	=> '20',
								),
							),
						),						
						'productStockTagPosYUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'postDisplaytext'      => array(
							'type'    => 'string',
							'default' => 'No products found!',
						),
						'displayLayoutType'      => array(
							'type'    => 'string',
							'default' => 'grid',
						),
						'displayProductImage'      => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayProductTitle'       => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayProductTaxonomy'        => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayProductExcerpt'      => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'displayProductRating'     => array(
							'type'    => 'boolean',
							'default' => false,
						),	
						'displayProductPricing'     => array(
							'type'    => 'boolean',
							'default' => true,
						),	
						'displayProductCartbtn'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayWishList'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayQuickView'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayCompare'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displaySaleTag'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayfeaturedTag'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'displayStockTag'     => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'filtersAll'     => array(
							'type'    => 'boolean',
							'default' => true,
						),	
						'filterAllText'     => array(
							'type'    => 'string',
							'default' => 'All',
						),
						'displayProductPagination'     => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'loadMoreProduct'     => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'categories'              => array(
							'type' => 'string',
							'default' => '',
						),
						'postType'                => array(
							'type'    => 'string',
							'default' => 'product',
						),
						'taxonomyType'            => array(
							'type'    => 'string',
							'default' => 'product_cat',
						),
						'postsToShow'             => array(
							'type'    => 'number',
							'default' => 6,
						),
						'offset'      				=> array(
							'type'    => 'number',
							'default' => 0,
						),
						'columns'                 => array(
							'type'    => 'number',
							'default' => 3,
						),
						'tcolumns'                => array(
							'type'    => 'number',
							'default' => 2,
						),
						'mcolumns'                => array(
							'type'    => 'number',
							'default' => 1,
						),
						'imgSize'                 => array(
							'type'    => 'string',
							'default' => 'large',
						),
						//CAROUSEL
						'pGridSlideShow'  => array(
							'type'    => 'number',
							'default' => 3,
						), 
						'tpGridSlideShow'  => array(
							'type'    => 'number',
							'default' => 2,
						), 
						'mpGridSlideShow'  => array(
							'type'    => 'number',
							'default' => 1,
						), 
						'productCarouselEffect'  => array(
							'type'    => 'string',
							'default' => 'slide',
						),        
						'productCarouselAutoplay'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselDelay'  => array(
							'type'    => 'number',
							'default' => 5000,
						),
						'productCarouselLoop'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselSpeed'  => array(
							'type'    => 'number',
							'default' => 500,
						),
						'productCarouselPauseOnHover'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselSlidesPerView'  => array(
							'type'    => 'number',
							'default' => 3,
						),
						'productCarouselSlidesPerViewTablet'  => array(
							'type'    => 'number',
							'default' => 2,
						),
						'productCarouselSlidesPerViewMobile'  => array(
							'type'    => 'number',
							'default' => 1,
						),
						'productCarouselSlidesPerColumnEnable'  => array(
							'type'    => 'boolean',
							'default' => false,
						),	
						'productCarouselSlidesPerColumn'  => array(
							'type'    => 'number',
							'default' => 1,
						),	
						'productCarouselSlidesGridEnable'  => array(
							'type'    => 'boolean',
							'default' => false,
						),	
						'productCarouselSlidesGridNumber'  => array(
							'type'    => 'number',
							'default' => 2,
						),
						'productCarouselSpaceBetween'  => array(
							'type'    => 'number',
							'default' => 15,
						),
						'productCarouselGrabCursor'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselObserver'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselObserveParents'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselBreakpoints'  => array(
							'type'    => 'number',
							'default' => 768,
						),
						'productCarouselPagination'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselPaginationType'  => array(
							'type'    => 'string',
							'default' => 'bullets',
						),
						'productCarouselNavigation'  => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productCarouselNavigationNextEl'  => array(
							'type'    => 'string',
							'default' => 'spc-carousel-nav-next',
						),
						'productCarouselNavigationPrevEl'  => array(
							'type'    => 'string',
							'default' => 'spc-carousel-nav-next',
						),
						'productCarouselProgressBar'  => array(
							'type'    => 'boolean',
							'default' => false,
						),
						//tags start
						'hotText' => array(
							'type' => 'string',
							'default' => "Hot"
						),
						'stockText' => array(
							'type' => 'string',
							'default' => "In Stock"
						),
						//Title
						'productTitleColor'              => array(
							'type'    => 'string',
							'default' => '#000000',
						),
						'productTitleTag'                => array(
							'type'    => 'string',
							'default' => 'h3',
						),
						'productTitleFontSize'           => array(
							'type'    => 'number',
							'default' => 20,
						),
						'productTitleFontSizeType'       => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'productTitleFontSizeTablet'     => array(
							'type' => 'number',
							'default' => 16,
						),
						'productTitleFontSizeMobile'     => array(
							'type' => 'number',
							'default' => 14,
						),
						'productTitleFontFamily'         => array(
							'type'    => 'string',
							'default' => 'Outfit',
						),
						'productTitleFontWeight'         => array(
							'type' => 'string',
							'default' => '600',
						),
						'productTitleFontSubset'         => array(
							'type' => 'string',
						),
						'productTitleLineHeight'         => array(
							'type' => 'number',
							'default' => 1.2,
						),
						'productTitleLineHeightType'     => array(
							'type'    => 'string',
							'default' => 'em',
						),
						'productTitleLineHeightTablet'   => array(
							'type' => 'number',
						),
						'productTitleLineHeightMobile'   => array(
							'type' => 'number',
						),
						'productTitleLoadGoogleFonts'    => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productTitleTextTransform'         => array(
							'type' => 'string',
							'default' => 'capitalize',
						),
						'productTitleLetterSpacing'         => array(
							'type' => 'number',
							'default' => 0,
						),
						'productTitleMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '0', '0', '18', '0' ],
									'tablet' 	=> [ '0', '0', '18', '0' ],
									'mobile' 	=> [ '0', '0', '18', '0' ]
								),
							),
						),
						'productTitleMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),
						//rating
						'ratingSize'           => array(
							'type'    => 'number',
							'default' => 18,
						),
						'ratingNormalColor' => array(
							'type'    => 'string',
							'default' => '#d3ced2',
						),
						'ratingActiveColor' => array(
							'type'    => 'string',
							'default' => '#FF5656',
						),
						'ratingMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '8', '0', '8', '0' ],
									'tablet' 	=> [ '8', '0', '8', '0' ],
									'mobile' 	=> [ '8', '0', '8', '0' ]
								),
							),
						),
						'ratingMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						
						//excerpt 
						'productExcerptLength'           => array(
							'type'    => 'number',
							'default' => 25,
						),
						'displayProductContentRadio' => array(
							'type'    => 'string',
							'default' => 'excerpt',
						),
						'productExcerptColor'              => array(
							'type'    => 'string',
							'default' => '#00000080',
						),
						'productExcerptFontSize'           => array(
							'type'    => 'number',
							'default' => '15',
						),
						'productExcerptFontSizeType'       => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'productExcerptFontSizeTablet'     => array(
							'type' => 'number',
						),
						'productExcerptFontSizeMobile'     => array(
							'type' => 'number',
						),
						'productExcerptFontFamily'         => array(
							'type'    => 'string',
							'default' => 'Roboto',
						),
						'productExcerptFontWeight'         => array(
							'type' => 'string',
						),
						'productExcerptFontSubset'         => array(
							'type' => 'string',
						),
						'productExcerptLineHeight'         => array(
							'type' => 'number',
							'default' => 1.5,
						),
						'productExcerptLineHeightType'     => array(
							'type'    => 'string',
							'default' => 'em',
						),
						'productExcerptLineHeightTablet'   => array(
							'type' => 'number',
						),
						'productExcerptLineHeightMobile'   => array(
							'type' => 'number',
						),
						'productExcerptLoadGoogleFonts'    => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productExcerptTextTransform'         => array(
							'type' => 'string',
							'default' => 'none',
						),
						'productExcerptLetterSpacing'         => array(
							'type' => 'number',
							'default' => 1.5,
						),
						'productExcerptMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '20', '0', '15', '0' ],
									'tablet' 	=> [ '15', '0', '15', '0' ],
									'mobile' 	=> [ '15', '0', '15', '0' ]
								),
							),
						),
						'productExcerptMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						//price
						'productPriceCurrentColor'       => array(
							'type'    => 'string',
							'default' => '#FF0000',
						),	
						'productPriceDelColor'       => array(
							'type'    => 'string',
							'default' => '#FF0000',
						),
						'productPriceColor'              => array(
							'type'    => 'string',
							'default' => '#FF0000',
						),
						'productPriceTag'                => array(
							'type'    => 'string',
							'default' => 'h3',
						),
						'productPriceFontSize'           => array(
							'type'    => 'number',
							'default' =>  18,
						),
						'productPriceFontSizeType'       => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'productPriceFontSizeTablet'     => array(
							'type' => 'number',
							'default' => 16,
						),
						'productPriceFontSizeMobile'     => array(
							'type' => 'number',
							'default' => 14,
						),
						'productPriceFontFamily'         => array(
							'type'    => 'string',
							'default' => 'Outfit',
						),
						'productPriceFontWeight'         => array(
							'type' => 'string',
							'default' => '600',
						),
						'productPriceFontSubset'         => array(
							'type' => 'string',
						),
						'productPriceLineHeight'         => array(
							'type' => 'number',
							'default' => 1,
						),
						'productPriceLineHeightType'     => array(
							'type'    => 'string',
							'default' => 'em',
						),
						'productPriceLineHeightTablet'   => array(
							'type' => 'number',
						),
						'productPriceLineHeightMobile'   => array(
							'type' => 'number',
						),
						'productPriceLoadGoogleFonts'    => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'productPriceTextTransform'         => array(
							'type' => 'string',
							'default' => 'none',
						),
						'productPriceLetterSpacing'         => array(
							'type' => 'number',
							'default' => 0,
						),
						'productPriceMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '0', '0', '20', '0' ],
									'tablet' 	=> [ '0', '0', '20', '0' ],
									'mobile' 	=> [ '0', '0', '20', '0' ]
								),
							),
						),
						'productPriceMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'productPriceDelFontSizeUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'productPriceDelFontSize'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> '20',
									'tablet' 	=> '16',
									'mobile' 	=> '14',
								),
							),
						),				
						// cart btn attributes
						'cartbtnText'                 => array(
							'type'    => 'string',
							'default' => __( 'Add To Cart', 'shopcred' ),
						),
						'addToCartbtnText'                 => array(
							'type'    => 'string',
							'default' => __( 'Add to Cart', 'shopcred' ),
						),
						'addToCartbtnColor'                => array(
							'type'    => 'string',
							'default' => '#111111',
						),
						'addToCartbtnBgColor'              => array(
							'type'    => 'string',
							'default' => '#fff',
						),
						'addToCartbtnHcolor'               => array(
							'type' => 'string',
							'default' => '#fff',
						),
						'addToCartbtnBgHcolor'             => array(
							'type' => 'string',
							'default' => '#111111',
						),
						'addToCartbtnFontSize'             => array(
							'type'    => 'number',
							'default' => '16',
						),
						'addToCartbtnFontSizeType'         => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'addToCartbtnFontSizeMobile'       => array(
							'type' => 'number',
							'default' => 14,
						),
						'addToCartbtnFontSizeTablet'       => array(
							'type' => 'number',
						),
						'addToCartbtnFontFamily'           => array(
							'type'    => 'string',
							'default' => 'Roboto',
						),
						'addToCartbtnFontWeight'           => array(
							'type' => 'string',
							'default' => '500',
						),
						'addToCartbtnFontSubset'           => array(
							'type' => 'string',
						),
						'addToCartbtnLineHeight'           => array(
							'type' => 'number',
							'default' => 1.2,
						),
						'addToCartbtnLineHeightTablet'     => array(
							'type' => 'number',
							'default' => 1.2,
						),
						'addToCartbtnLineHeightMobile'     => array(
							'type' => 'number',
							'default' => 1.2,
						),
						'addToCartbtnLineHeightType'       => array(
							'type'    => 'string',
							'default' => 'em',
						),
						'addToCartbtnLoadGoogleFonts'      => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'addToCartbtnTextTransform'         => array(
							'type' => 'string',
							'default' => 'Capitalize',
						),
						'addToCartbtnLetterSpacing'         => array(
							'type' => 'number',
							'default' => 0,
						),
						'addToCartbtnBorderStyle'     => array(
							'type' => 'string',
							'default' => 'solid',
						),
						'addToCartbtnBorderWidth'     => array(
							'type' => 'number',
							'default' => 1,
						),
						'addToCartbtnBorderColor'     => array(
							'type'    => 'string',
							'default' => '#111111',
						),	
						'addToCartbtnBorderHStyle'     => array(
							'type' => 'string',
							'default' => 'solid',
						),
						'addToCartbtnBorderHWidth'     => array(
							'type' => 'number',
							'default' => 1,
						),
						'addToCartbtnBorderHColor'     => array(
							'type'    => 'string',
							'default' => '#111111',
						),
						'addToCartbtnSpaceing'         => array(
							'type'    => 'number',
							'default' => 0,
						),
					
						'addToCartbtnPadding'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '12', '40', '12', '40' ],
									'tablet' 	=> [ '12', '25', '12', '25' ],
									'mobile' 	=> [ '10', '20', '10', '20' ]
								),
							),
						),
						'addToCartbtnPaddingUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),							
						'addToCartbtnMargin'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '0', '0', '0', '0' ],
									'tablet' 	=> [ '0', '0', '0', '0' ],
									'mobile' 	=> [ '0', '0', '0', '0' ]
								),
							),
						),
						'addToCartbtnMarginUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),	
						'addToCartbtnBR'              => array(
							'type'    => 'array',
							'default' => array(
								array(
									'desk' 	=> [ '0', '0', '0', '0' ],
									'tablet' 	=> [ '0', '0', '0', '0' ],
									'mobile' 	=> [ '0', '0', '0', '0' ]
								),
							),
						),
						'addToCartbtnBRUnit'      => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'addToCartbtnBoxShadowColor' => array(
							'type'    => 'string',
							'default' => '',
						),	
						'addToCartbtnBoxShadowHOffset' => array(
							'type'    => 'number',
							'default' => 0,
						),
						'addToCartbtnBoxShadowVOffset' => array(
							'type'    => 'number',
							'default' => 0,
						),
						'addToCartbtnBoxShadowBlur' => array(
							'type'    => 'number',
							'default' => 0,
						),
						'addToCartbtnBoxShadowSpread' => array(
							'type'    => 'number',
							'default' => 0,
						),
						'addToCartbtnBoxShadowPosition' => array(
							'type'    => 'string',
							'default' => 'outset',
						),
						//wishlist btn
						// Exclude Current Post.
						'excludeCurrentPost'      => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'newTab'                  => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'equalHeight'                 => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'filterList'              => array(
							'type' => 'string',
							'default' => null,
						),	
						'quickViewText'              => array(
							'type' => 'string',
							'default' => 'Quick View',
						),
						'layoutConfig'                => array(
							'type'    => 'array',
							'default' => array(
								array( 'spc/product-tags' ),
								array( 'spc/product-image' ),
								array( 'spc/product-meta' ),
								array( 'spc/product-title' ),
								array( 'spc/product-rating' ),
								array( 'spc/product-price' ),
								array( 'spc/product-excerpt' ),
								array( 'spc/cart-button' ),
								
							),
						),
						'PcontentOrder'  => array(
							'type' => 'array',
							'default' => array(
								'spc/product-image',
								'spc/product-meta',
								'spc/product-title',
								'spc/product-tags',
								'spc/product-rating',
								'spc/product-price',
								'spc/product-excerpt',
								'spc/cart-button',
							),
						),
					)
				),
				'render_callback' => array( $this, 'post_grid_callback' ),
			)
		);

		register_block_type(
			'spc/product-title'
		);

		register_block_type(
			'spc/product-meta'
		);

		register_block_type(
			'spc/product-tags'
		);
		
		register_block_type(
			'spc/product-rating'
		);

		register_block_type(
			'spc/product-price'
		);
		
		register_block_type(
			'spc/product-image'
		);

		register_block_type(
			'spc/product-excerpt'
		);
		
		register_block_type(
			'spc/cart-button'
		);
		
	}

	/**
	 * Renders the post grid block on server.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function post_grid_callback( $attributes ) {

		// Render query.
		$query = Helper::get_query( $attributes, 'grid' );

		// Cache the settings.
		self::$settings['grid'][ $attributes['block_id'] ] = $attributes;

		ob_start();
		if ($attributes['displayLayoutType'] === "carousel" ) {
			$this->get_product_carousel_html( $attributes, $query, 'carousel' );
		} else {
			$this->get_post_html( $attributes, $query, 'grid' );
		}
		$output = ob_get_clean();
		// Output the post markup.
		return $output;
	}

	//carousel content render
	public function get_product_carousel_html( $attributes, $query, $layout ) {
		$attributes['post_type'] = $layout;

		$wrap = array(
			'is-grid spc-woo-product-items spc-woo-product-columns-' . $attributes['columns'],
			'is-' . $layout,
			'spc-woo-product-columns-tablet-' . $attributes['tcolumns'],
			'spc-woo-product-columns-mobile-' . $attributes['mcolumns'],
		);

		$block_id = 'spc-block-' . $attributes['block_id'];

		$desktop_class = '';
		$tab_class     = '';
		$mob_class     = '';

		$outerwrap = array(
			$block_id,
			( isset( $attributes['className'] ) ) ? $attributes['className'] : '',
			'wp-block-spc-woo-product spc-woo-product-wrapper',
			$desktop_class,
			$tab_class,
			$mob_class,
		);

		$total = $query->max_num_pages;

		$carousel_data_settings = wp_json_encode( array_filter([
			'effect' => $attributes['productCarouselEffect'] ? $attributes['productCarouselEffect'] : 'slide',
			'autoplay' => $attributes['productCarouselAutoplay'] ? true : false,
			'loop' => $attributes['productCarouselLoop'] ? true : false,
			'delay' => (int)$attributes['productCarouselDelay'] ? (int)$attributes['productCarouselDelay'] : 5000,
			'speed' => (int)$attributes['productCarouselSpeed'] ? (int)$attributes['productCarouselSpeed'] : 5000,
			'slidesPerView' => (int)$attributes['pGridSlideShow'] ? (int)$attributes['pGridSlideShow'] : 3,
			'slidesPerViewTablet' => (int)$attributes['tpGridSlideShow'] ? (int)$attributes['tpGridSlideShow'] : 2,
			'slidesPerViewMobile' => (int)$attributes['mpGridSlideShow'] ? (int)$attributes['mpGridSlideShow'] : 2,
			'spaceBetween' => (int)$attributes['productCarouselSpaceBetween'] ? (int)$attributes['productCarouselSpaceBetween'] : 15,
			'perColumn' => (int)$attributes['productCarouselSlidesPerColumn'] ? (int)$attributes['productCarouselSlidesPerColumn'] : 15,
			'grabCursor' => $attributes['productCarouselGrabCursor'] ? true : false,
			'navigation' => $attributes['productCarouselNavigation'] ? true : false,
			'pagination' => $attributes['productCarouselPagination'] ? true : false,
			'paginationType' => $attributes['productCarouselPaginationType'] ? $attributes['productCarouselPaginationType'] : 'bullets'
		]));

		?>
		<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_html( implode( ' ', $outerwrap ) ); ?>" data-total="<?php echo esc_attr( $total ); ?>">

		<div
		class ="swiper-container spc-swiper-container js-spc-swiper-container"
		data-carousel-settings="<?php echo esc_attr($carousel_data_settings) ;?>"
	>
			<div class="swiper-wrapper">
			<?php
				$this->posts_articles_markup( $query, $attributes );
			?>
			</div>
			 <?php if ( true === $attributes['productCarouselPagination'] ) {
				echo '<div class="spc-dots-container"><div class="spc-swiper-pagination swiper-pagination"></div></div>';
			 } ?>
			 </div>
			 <?php
			if ( true === $attributes['productCarouselNavigation'] ) {
				echo '<div class="spc-nav-wrapper">
				<div class="spc-carousel-nav-next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
				<div class="spc-carousel-nav-prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
			</div>';
			 } ?>
						
		
		</div>
		<?php 
	}

	/**
	 * Renders the post grid block on server.
	 *
	 * @param array  $attributes Array of block attributes.
	 *
	 * @param object $query WP_Query object.
	 * @param string $layout post grid layout.
	 * @since 1.0.0
	 */
	public function get_post_html( $attributes, $query, $layout ) {

		$attributes['post_type'] = $layout;
		$wrap = array(
			'is-grid spc-woo-product-items spc-woo-product-columns-' . $attributes['columns'],
			'is-' . $layout,
			'spc-woo-product-columns-tablet-' . $attributes['tcolumns'],
			'spc-woo-product-columns-mobile-' . $attributes['mcolumns'],
		);

		$block_id = 'spc-block-' . $attributes['block_id'];

		$desktop_class = '';
		$tab_class     = '';
		$mob_class     = '';

		$outerwrap = array(
			$block_id,
			( isset( $attributes['className'] ) ) ? $attributes['className'] : '',
			'wp-block-spc-woo-product spc-woo-product-wrapper',
			$desktop_class,
			$tab_class,
			$mob_class, 
		);

		switch ( $layout ) {

			case 'grid':
				if ( $attributes['equalHeight'] ) {
					array_push( $wrap, 'spc-woo-product-equal-height' );
				}
				break;

			default:
				// Nothing to do here.
				break;
		}

		$total = $query->max_num_pages;
		?>

		<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_html( implode( ' ', $outerwrap ) ); ?>" data-total="<?php echo esc_attr( $total ); ?>">

			<div class="<?php echo esc_html( implode( ' ', $wrap ) ); ?>">

			<?php

				$this->posts_articles_markup( $query, $attributes );
			
			if ( ( isset( $attributes['loadMoreProduct'] ) && true === $attributes['loadMoreProduct'] ) ) { ?>
				<span class="spc-loadmore-insert-before"></span>
			<?php } ;?>
			</div>
			<?php
			$post_not_found = $query->found_posts;

			if ( 0 === $post_not_found ) {
				?>
				<p class="spc-post-no-posts">
					<?php echo esc_html( $attributes['postDisplaytext'] ); ?>
				</p>
				<?php
			}

			if ( ( isset( $attributes['displayProductPagination'] ) && true === $attributes['displayProductPagination'] ) ) {

				?>
				<div class="spc-product-pagination-wrap">
					<?php echo $this->render_pagination( $query, $attributes ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<?php
			}	

			if ( ( isset( $attributes['loadMoreProduct'] ) && true === $attributes['loadMoreProduct'] ) ) {
				$block_name = 'product-grid';
		
				$loadmore_data_settings = wp_json_encode( array_filter([
					'block_id' => $attributes['block_id'],
					'post_type' => $attributes['post_type'],
					'categories' => $attributes['categories'],
					'taxonomyType' => $attributes['taxonomyType'],
					'postsToShow' => $attributes['postsToShow'],
					'offset' => $attributes['offset'] ? $attributes['offset'] : 0,
					'layoutConfig' => $attributes['layoutConfig'],
					'PcontentOrder' => $attributes['PcontentOrder'],

					'stockText' => $attributes['stockText'],
					'hotText' => $attributes['hotText'] ? $attributes['hotText'] : 'Hot',
					'newTab' => $attributes['newTab'],
					'imgSize' => $attributes['imgSize'] ? $attributes['imgSize'] : 'large',
					'quickViewText' => $attributes['quickViewText'] ? $attributes['quickViewText'] : 'Quick View',
					'displayProductTitle' => $attributes['displayProductTitle'],
					'productTitleTag' => $attributes['productTitleTag'],
					'displayProductContentRadio' => $attributes['displayProductContentRadio'] ? $attributes['displayProductContentRadio'] : 'excerpt',
					'cartbtnText' => $attributes['cartbtnText'] ? $attributes['cartbtnText'] : 'Add To Cart',
					'displayLayoutType' => $attributes['displayLayoutType'],
					'displayProductImage' => $attributes['displayProductImage'],
					'displayProductTaxonomy' => $attributes['displayProductTaxonomy'],
					'taxonomyType' => $attributes['taxonomyType'],
					'displayProductExcerpt' => $attributes['displayProductExcerpt'],
					'displayProductRating' => $attributes['displayProductRating'] ? $attributes['displayProductRating'] : false,
					'displayProductPricing' => $attributes['displayProductPricing'],
					'displayProductCartbtn' => $attributes['displayProductCartbtn'],
					'displayWishList' => $attributes['displayWishList'],
					'displayQuickView' => $attributes['displayQuickView'],
					'displaySaleTag' => $attributes['displaySaleTag'],
					'displayfeaturedTag' => $attributes['displayfeaturedTag'],
					'displayStockTag' => $attributes['displayStockTag'],
				
				]));
				
				?>
				<div class="spc-woo-product-load-btn">
					
					<a class="spc-woo-product-loadmore-btn" id="spc-woo-product-loadmore-btn" href="#" data-pages="<?php echo esc_attr($total) ;?>" data-attributes="<?php echo esc_attr($loadmore_data_settings) ;?>" data-pagenum="1" data-blockid="<?php echo esc_attr($attributes['block_id']) ;?>" data-blockname="spc-product-blocks_<?php echo esc_attr($block_name) ;?>" data-postid=""><?php echo esc_html__("Load More", 'shopcred') ;?></a>
				</div>

				<div class="spc-product-loadMore-wrap">
					
				</div>
				<?php
			}
			
			?>
		</div>
		<?php
	}

	/**
	 * Renders the post post pagination on server.
	 *
	 * @param object $query WP_Query object.
	 * @param array  $attributes Array of block attributes.
	 * @since 1.0.0
	 */
	public function render_pagination( $query, $attributes ) {

		$permalink_structure = get_option( 'permalink_structure' );
		$base                = untrailingslashit( wp_specialchars_decode( get_pagenum_link() ) );
		$base                = Helper::build_base_url( $permalink_structure, $base );
		$format              = Helper::paged_format( $permalink_structure, $base );
		$paged               = Helper::get_paged( $query );
		$page_limit          = min( $attributes['pageLimit'], $query->max_num_pages );
		$page_limit          = isset( $page_limit ) ? $page_limit : $attributes['postsToShow'];
		$attributes['postsToShow'];

		$links = paginate_links(
			array(
				'base'      => $base . '%_%',
				'format'    => $format,
				'current'   => ( ! $paged ) ? 1 : $paged,
				'total'     => $page_limit,
				'type'      => 'array',
				'mid_size'  => 4,
				'end_size'  => 4,
				'prev_text' => $attributes['productPaginationPrevText'],
				'next_text' => $attributes['productPaginationNextText'],
			)
		);

		if ( isset( $links ) ) {

			return wp_kses_post( implode( PHP_EOL, $links ) );
		}

		return '';
	}

	/**
	 * Sends the Post pagination markup to edit.js
	 *
	 * @since 1.0.0
	 */
	public function product_pagination() {

		check_ajax_referer( 'shopcred_blocks_ajax_nonce', 'nonce' );

		if ( isset( $_POST['attributes'] ) ) {

			$query = Helper::get_query( $_POST['attributes'], 'grid' );

			$pagination_markup = $this->render_pagination( $query, $_POST['attributes'] );

			wp_send_json_success( $pagination_markup );
		}

		wp_send_json_error( ' No attributes recieved' );
	}

	/**
	 * Sends the Post Loadmore - markup to edit.js
	 *
	 * @since 1.0.0
	 */
	public function product_loadmore() {

		check_ajax_referer( 'shopcred_blocks_ajax_nonce', 'nonce' );

		$attributes = $_POST['attributes'];
		// echo "<pre>"; print_r($attributes['filterAttr']); echo "</pre>";
		if ( isset($attributes['offset']) && !empty($attributes['offset'])) {
			$offset = $attributes['offset'];
		} else {
			$offset = 0;
		}

		$query_args = array(
            'post_type'        => 'product',
            'posts_per_page'   => $attributes['postsToShow'],
            'post_status'      => 'publish',
            'offset'           => (int)$offset + ( ( (int)$_POST['paged'] - 1 ) * (int)$attributes['postsToShow'] ),
        );

		// if ( isset( $attributes['categories'] ) && '' !== $attributes['categories'] ) {
		// 	$query_args['tax_query'][] = array(
		// 		'taxonomy' => ( isset( $attributes['taxonomyType'] ) ) ? $attributes['taxonomyType'] : 'product_cat',
		// 		'field'    => 'id',
		// 		'terms'    => $attributes['categories'],
		// 		'operator' => 'IN',
		// 	);
		// }

		if (!empty($attributes['filterAttr']['queryByTitle'])) {
			$query_args['s'] = sanitize_text_field($attributes['filterAttr']['queryByTitle']);
		}

		if (!empty($attributes['filterAttr']['selectedCategories'])) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $attributes['filterAttr']['selectedCategories'],
				'operator' => 'IN',
			);
		}

		if (!empty($attributes['filterAttr']['selectedTags'])) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'product_tag',
				'field'    => 'slug',
				'terms'    => $attributes['filterAttr']['selectedTags'],
				'operator' => 'IN',
			);
		}

		if (!empty($attributes['filterAttr']['otherAttributes'])) {
			$product_attributes = $attributes['filterAttr']['otherAttributes'];
			foreach($product_attributes as $key => $value) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'pa_'.$key,
					'field'    => 'slug',
					'terms'    => $value,
					'operator' => 'IN',
				);
			}
		}

		if (!empty($attributes['filterAttr']['queryByPrice'][0]) && !empty($attributes['filterAttr']['queryByPrice'][1])) {
			$query_args['meta_query'] = array(
				array(
					'key' => '_price',
					'value' => array(sanitize_text_field($attributes['filterAttr']['queryByPrice'][0]), sanitize_text_field($attributes['filterAttr']['queryByPrice'][1])),
					'type' => 'NUMERIC',
					'compare' => 'BETWEEN',
				),
			);
		}		

		$posts_query = new \WP_Query( $query_args );

		if ( isset( $_POST['attributes'] ) ) {
			echo $this->posts_articles_markup( $posts_query, $attributes );
		}

        wp_die();

		wp_send_json_error( 'No attributes recieved' );
	}
	
	/**
	 * Render Posts HTML Pagination.
	 *
	 * @param object $query WP_Query object.
	 * @param array  $attributes Array of block attributes.
	 * @since 1.0.0
	 */
	public function posts_articles_markup( $query, $attributes ) {

		if($query->have_posts()){
			while ( $query->have_posts() ) {
				$query->the_post();
				// Filter to modify the attributes based on content requirement.
				$attributes         = apply_filters( 'spc_post_alter_attributes', $attributes, get_the_ID() );
				$post_class_enabled = apply_filters( 'spc_enable_post_class', false, $attributes );
	
				$filters_class = $this->spc_get_categories_name_for_class();
	
				do_action( "spc_post_before_article_{$attributes['post_type']}", get_the_ID(), $attributes );
	
				if ($attributes['displayLayoutType'] === "carousel" ) {
					echo "<div class ='swiper-slide spc-swiper-slide' >";
				}
				?>
				
				<article class="<?php echo esc_attr( $filters_class ) ;?>">
					<?php do_action( "spc_post_before_inner_wrap_{$attributes['post_type']}", get_the_ID(), $attributes ); ?>
					<div class="spc-woo-product-inner-wrap">
						<?php $this->render_complete_box_link( $attributes ); ?>
						<?php $this->render_innerblocks( $attributes ); ?>
					</div>
					<?php do_action( "spc_post_after_inner_wrap_{$attributes['post_type']}", get_the_ID(), $attributes ); ?>
				</article>
				<?php
	
				if ($attributes['displayLayoutType'] === "carousel" ) {
					echo "</div>";
				}
				do_action( "spc_post_after_article_{$attributes['post_type']}", get_the_ID(), $attributes );
	
			}
		} else {
			echo "<h2 class='notice-title'>" . esc_html__('Nothing Found to show...', 'shopcred') . "</h2>";
		}

		wp_reset_postdata();
	}
	
	/**
	 * Render layout.
	 *
	 * @param array $fname to get the block.
	 * @param array $attr Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_layout( $fname, $attr ) {

		switch ( $fname ) {
			case 'spc/cart-button':
				return $this->get_add_to_cart( $attr );
			case 'spc/product-image':
				return $this->render_image( $attr );
			case 'spc/product-meta':
					return $this->render_meta( $attr );
			case 'spc/product-title':
				return $this->render_title( $attr );
			case 'spc/product-rating':
				return $this->render_rating( $attr );
			case 'spc/product-price':
				return $this->render_price( $attr );
			case 'spc/product-excerpt':
				return $this->render_excerpt( $attr );
			case 'spc/product-tags':
				return $this->render_tags( $attr );
			default:
				return '';
		}
	}
	/**
	 * Render Inner blocks.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_innerblocks( $attributes ) {

		$orderingLayout = $attributes['PcontentOrder'];
		
		// Check if $orderingLayout is an array before proceeding
		if ( ! is_array( $orderingLayout ) ) {
			return;
		}
		
		$reArrangelayout = array_chunk( $orderingLayout, 1 );
		$length = count( $orderingLayout );
		
		for ( $i = 0; $i < $length; $i++ ) {
			$this->render_layout( $reArrangelayout[ $i ][0], $attributes );
		}
	}	

	/**
	 * Render Image HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_image( $attributes ) {
		if ( ! $attributes['displayProductImage'] ) {
			return;
		}

		$target = '_self';

		if ( isset($attributes['newTab'] ) ) {
			$target = '_blank';
		}

		do_action( "spc_single_post_before_featured_image_{$attributes['post_type']}", get_the_ID(), $attributes );

		?>
		<div class='spc-product-image-wrapper spc-product-image'>
			<a href="<?php echo esc_url( apply_filters( "spc_single_post_link_{$attributes['post_type']}", get_the_permalink(), get_the_ID(), $attributes ) ); ?>" target="<?php echo esc_html( $target ); ?>" rel="bookmark noopener noreferrer"><?php echo wp_get_attachment_image( get_post_thumbnail_id(), $attributes['imgSize'] ); ?>
			</a>
			<?php $this->render_quickView($attributes); ?>
		</div>
		<?php
		do_action( "spc_single_post_after_featured_image_{$attributes['post_type']}", get_the_ID(), $attributes );
	}

	/**
	 * Renders the post grid block on server.
	 *
	 * @param array $attributes Array of block attributes.
	 * @param array $query_args Array of queryparams.
	 *
	 * @since 1.0.0
	 */
	public function custom_filter_post_grid_callback($query_args)
	{
		$get_page_id = sanitize_text_field($query_args['pageId']);
		$selectorToAction = sanitize_text_field($query_args['selectorToAction']);
	
		$attributes = array(); // Initialize $attributes array
	
		if (!empty($get_page_id && $selectorToAction)) {
			$spcSetAttr = self::get_product_block_attributes($get_page_id, $selectorToAction);
			$attributes = $spcSetAttr;
		}
	
		if (isset($attributes['postsToShow'])) {
			$query_args['posts_per_page'] = $attributes['postsToShow'];
			$posts_query = new \WP_Query($query_args);
	
			if (isset($selectorToAction) && !empty($selectorToAction)) {
				echo $this->posts_articles_markup($posts_query, $attributes);
			} else {
				echo "<h2 class='notice-title'>" . esc_html__('Nothing Found to show...', 'shopcred') . "</h2>";
			}
		} else {
			echo "<h2 class='notice-title'>" . esc_html__('PostsToShow attribute is not set.', 'shopcred') . "</h2>";
		}
	
		// wp_die();
		// wp_send_json_error( 'No attributes received' );
	}
	

	/**
	 * Renders the post grid block on server.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function spc_filter_post_grid_callback( ) {

		$get_page_id = sanitize_text_field($_POST['pageId']);
		$selectorToAction = sanitize_text_field($_POST['selectorToAction']);

		if ( empty( $selectorToAction ) ) {

			wp_die("<h2 class='notice-title'>". esc_html__('Please Select Block for action', 'shopcred' )."</h2>");

		}
		if ( ! empty( $get_page_id && $selectorToAction ) ) {
			
			$spcSetAttr = self::get_product_block_attributes( $get_page_id, $selectorToAction );
		}
	
		$attributes = $spcSetAttr;
		
		if ( $attributes['displayLayoutType'] === "grid" ) { 
		
			check_ajax_referer( 'shopcred_blocks_ajax_nonce', 'nonce' );
			$filter_type    = sanitize_text_field($_POST['filterType']);
			$taxonomy_name    = sanitize_text_field($_POST['taxtype']);
			$blockId    = sanitize_text_field($_POST['blockId']);
			$pageId     = sanitize_text_field($_POST['pageId']);
			$taxonomy   = sanitize_text_field($_POST['taxonomy']) ? sanitize_text_field($_POST['taxonomy']) : false;
			$taxonomyId =  ! empty($_POST['taxonomyID']) ? $_POST['taxonomyID'] : null;

			$tax_id = [];
			$tax_query = [];
				
				if ( $filter_type === "filter-checkbox" ) {
				
					if ( is_array( $taxonomyId ) && ! empty( $taxonomyId ) && !array_key_exists(0,$taxonomyId) ) {
				
						$tax_query = array('relation' => 'OR');
						foreach($taxonomyId as $Key=>$Value){
							
							if( !empty($Value) ) {
								if( count($Value)){
									foreach ($Value as $Inkey => $Invalue) {
										$tax_query[] = array( 
											'taxonomy' => ( isset( $taxonomy_name ) ) ? $taxonomy_name : 'product_cat',
											'field'    => 'term_id',
											'terms'    => $Invalue,
											'operator' => 'IN',
										);
									}
								}
							}
						}
					}
	
				}
				if ( ( $filter_type === "filter-tab" || $filter_type === "filter-select" || $filter_type === "filter-radio" ) && "-1" !== $taxonomyId ) {

					$tax_query[] = array(
						'taxonomy' => ( isset( $taxonomy_name ) ) ? $taxonomy_name : 'product_cat',
						'field'    => 'term_id',
						'terms'    => $taxonomyId,
						'operator' => 'IN',
					);
				
				}

				$query_args = array(
					'post_type'        => 'product',
					'posts_per_page'   => $attributes['postsToShow'],
					'post_status'      => 'publish',
					'tax_query' => $tax_query
				);
		}

		$posts_query = new \WP_Query( $query_args );
		
		if ( isset( $selectorToAction ) && !empty( $selectorToAction ) ){
			echo $this->posts_articles_markup( $posts_query, $attributes );
		} else {
			echo "<h2 class='notice-title'>". esc_html__('Please Select Block for action', 'shopcred' )."</h2>";
		}

        wp_die();

		wp_send_json_error( 'No attributes recieved' );
	}

	/**
     * filterable Post use category name as class name
     * @param $element
     * @return array class name to filterable Post control items
     */
    public function spc_get_categories_name_for_class( ) {
        $separator = ' ';
        $cat_name_as_class = '';
        $post_type = get_post_type(get_the_ID());   
        $taxonomies = get_object_taxonomies($post_type);   
        $taxonomy_slugs = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "slugs"));
        
            foreach($taxonomy_slugs as $tax_slug) :            
                $cat_name_as_class .= $tax_slug . $separator ; 
            endforeach;
            return trim( $cat_name_as_class, $separator );
         
    }

	/**
	 * Render Post Title HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_title( $attributes ) {

		if ( ! $attributes['displayProductTitle'] ) {
			return;
		}

		$target = '_self';

		if ( isset($attributes['newTab'] ) ) {
			$target = '_blank';
		}
		do_action( "spc_single_post_before_title_{$attributes['post_type']}", get_the_ID(), $attributes );
		?>
		<div class='spc-product-title-wrapper'> 
			<<?php echo esc_html( $attributes['productTitleTag'] ); ?> class="spc-product-title">
				<a href="<?php echo esc_url( apply_filters( "spc_single_post_link_{$attributes['post_type']}", get_the_permalink(), get_the_ID(), $attributes ) ); ?>" target="<?php echo esc_html( $target ); ?>" rel="bookmark noopener noreferrer"><?php the_title(); ?></a>
			</<?php echo esc_html( $attributes['productTitleTag'] ); ?>>
		</div>
		<?php
		do_action( "spc_single_post_after_title_{$attributes['post_type']}", get_the_ID(), $attributes );
	}

	/**
	 * Render Post Meta - Author HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_meta_author( $attributes ) {

		if ( ! $attributes['displayProductAuthor'] ) {
			return;
		}
		?>
			<span class="spc-post-author">
				<span class="dashicons-admin-users dashicons"></span>
				<?php the_author_posts_link(); ?>
			</span>
		<?php
	}

	/**
	 * Render Post Meta - Date HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_meta_date( $attributes ) {

		if ( ! $attributes['displayProductDate'] ) {
			return;
		}
		global $product, $post;
		?>
			<time datetime="<?php echo esc_attr( get_the_date( 'c', $post->ID ) ); ?>" class="spc-post__date">
				<span class="dashicons-calendar dashicons"></span>
				<?php echo esc_html( get_the_date( '', $post->ID ) ); ?>
			</time>
		<?php
	}

	/**
	 * Render Product Tags .
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_tags( $attributes ) {
		global $product, $post;
		$product_id = get_the_ID();

		?>
		<?php if ( $attributes['displaySaleTag'] && $product->is_on_sale() && ! empty($product->get_sale_price()) ) { ?>
			
			<span class="spc-product-tag spc-discount-price">
				<?php 

					$product  = wc_get_product( $product_id );

					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();

					$discount = ( $sale_price && $regular_price ) ? round( ( $regular_price - $sale_price ) / $regular_price * 100 ) .'%' : '';
					
					echo esc_html($discount );
				?>

			</span>
		
		<?php
		}

		if ( $attributes['displayfeaturedTag'] && $product->is_featured() ){ 
			$featuredText = ( $attributes['hotText'] ) ? $attributes['hotText'] : __( 'Hot', 'shopcred' ); ?>
			<span class="spc-product-tag spc-featured-product">
				<span class="spc-hot" ><?php echo esc_html( $featuredText ); ?></span>
			</span>

		<?php 
		}
		if ( $attributes['displayStockTag'] ){ 
			$stock_status = '';
			$inStockText = ( $attributes['stockText'] ) ? $attributes['stockText'] : __( 'In Stock', 'shopcred' );
			echo '<span class="spc-product-tag spc-stock-status" >';
			if ( ( $product->get_stock_status() == 'outofstock' ) ) { ?>
				<div class="spc-product-outofstock">
					<span><?php echo esc_html__( "Out of stock", "shopcred" );?></span>
				</div>
			<?php }elseif ( ($product->get_stock_status() == 'instock' ) ) { ?>
				<div class="spc-product-instock">
					<span><?php echo esc_html( $inStockText );?></span>
				</div>
			<?php }
			echo '</span>';
		}
		

	}
	
	/**
	 * Render Product Quick View - Date HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_quickView( $attributes ) {

		if ( ! $attributes['displayQuickView']  ) {
			return;
		} 
		global $product, $post;
		$product_id = get_the_ID();
		$product  = wc_get_product( $product_id );
		
		?>
		<div class="quickview-wrapper"><a href="javascript:void(0)" class="spc-product-quickview-btn spcquickview" data-product-id="<?php echo esc_attr( $product_id ) ;?>" title="<?php echo esc_attr( "Quick View" ) ;?>"><span class="spm-search-icon">
		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g clip-path="url(#clip0_2658_569)">
		<path d="M5 1.25V0H0.625C0.279805 0 0 0.279805 0 0.625V5H1.25V2.13125L7.05625 7.9375L7.9375 7.05625L2.13125 1.25H5Z" fill="black"/>
		<path d="M19.375 0H15V1.25H17.8688L12.0625 7.05625L12.9437 7.9375L18.75 2.13125V5H20V0.625C20 0.279805 19.7202 0 19.375 0Z" fill="black"/>
		<path d="M18.75 17.8688L12.9437 12.0625L12.0625 12.9437L17.8688 18.75H15V20H19.375C19.7202 20 20 19.7202 20 19.375V15H18.75V17.8688Z" fill="black"/>
		<path d="M7.05625 12.0563L1.25 17.8688V15H0V19.375C0 19.7202 0.279805 20 0.625 20H5V18.75H2.13125L7.9375 12.9438L7.05625 12.0563Z" fill="black"/>
		</g>
		<defs>
		<clipPath id="clip0_2658_569">
		<rect width="20" height="20" fill="white"/>
		</clipPath>
		</defs>
		</svg>
		</span><span><?php //echo esc_html( $QuickViewText) ?></span></a></div>
		<?php 
	}

	/**
	 * Render Product Price - Date HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_price( $attributes ) {

		if ( ! $attributes['displayProductPricing'] ) {
			return;
		}
		global $product, $post;
		if ( !empty($product->get_price_html()) ){
		?>
			<div class="spc-product-price"><?php echo wp_kses_post($product->get_price_html()) ;?></div>
		<?php
		}
	}

	/**
	 * Render Product Rating - Date HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_rating( $attributes ) {
	
		$attriRating = ( isset( $attributes['displayProductRating'] ) ) ? $attributes['displayProductRating'] : false;

		if ( ! $attriRating ) {
			return;
		}
		global $product, $post;
		$rating_count = $product->get_rating_count();
		if ( $rating_count > 0 ) :
		?>
			<div class="spc-product-rating woocommerce-product-rating" ><?php echo wp_kses_post( wc_get_rating_html( $product->get_average_rating() ) ) ;?></div>
			
		<?php
		endif;
	}

	/**
	 * Render Post Meta - Comment HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_meta_comment( $attributes ) {

		if ( ! $attributes['displayProductComment'] ) {
			return;
		}
		?>
			<span class="spc-post-comment">
				<span class="dashicons-admin-comments dashicons"></span>
				<?php comments_number(); ?>
			</span>
		<?php
	}

	/**
	 * Render Post Meta - Comment HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_meta_taxonomy( $attributes ) {

		if ( ! $attributes['displayProductTaxonomy'] ) {
			return;
		}
		global $product, $post;

		$terms = get_the_terms( $post->ID, $attributes['taxonomyType'] );
		if ( is_wp_error( $terms ) ) {
			return;
		}

		if ( ! isset( $terms[0] ) ) {
			return;
		}
		?>
		<span class="spc-product-taxonomy">
			<?php
			$terms_list = array();
			foreach ( $terms as $key => $value ) {
				// Get the URL of this category.
				$category_link = get_category_link( $value->term_id );
				array_push( $terms_list, '<a href="' . esc_url( $category_link ) . '">' . esc_html( $value->name ) . '</a>' );
			}
			echo wp_kses_post( implode( ' ', $terms_list ) );
			?>
		</span>
		<?php
	}

	/**
	 * Render Post Meta HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 0.0.1
	 */
	public function render_meta( $attributes ) {

		if ( ! $attributes['displayProductTaxonomy'] ) {
			return;
		}

		global $product, $post;
		do_action( "spc_single_post_before_meta_{$attributes['post_type']}", get_the_ID(), $attributes );

		$meta_sequence = array( 'author', 'date', 'comment', 'taxonomy' );
		$meta_sequence = apply_filters( "spc_single_post_meta_sequence_{$attributes['post_type']}", $meta_sequence, get_the_ID(), $attributes );
		?>
		<div class='spc-product-cat'> 
		
			<?php
			foreach ( $meta_sequence as $key => $sequence ) {
				switch ( $sequence ) {

					case 'taxonomy':
						$this->render_meta_taxonomy( $attributes );
						break;

					default:
						break;
				}
			}
			?>
		
		</div>
		<?php
		do_action( "spc_single_post_after_meta_{$attributes['post_type']}", get_the_ID(), $attributes );

	}

	/**
	 * Render Post Excerpt HTML.
	 *
	 * @param int $post_id post id.
	 * @param int $length lenght of the excerpt.
	 *
	 * @since 1.0.0
	 */
	public function get_excerpt_by_id( $post_id, $length ) {
		$the_post    = get_post( $post_id ); // Gets post ID.
		$the_excerpt = ( ( $the_post->post_excerpt ) ? $the_post->post_excerpt : $the_post->post_content ); // Gets post_content to be used as a basis for the excerpt.
		$the_excerpt = wp_strip_all_tags( strip_shortcodes( $the_excerpt ) ); // Strips tags and images.
		$words       = explode( ' ', $the_excerpt, $length + 1 );

		if ( count( $words ) > $length ) :
			array_pop( $words );
			array_push( $words, '…' );
			$the_excerpt = implode( ' ', $words );
		endif;

		return $the_excerpt;
	}

	/**
	 * Render Post Excerpt HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_excerpt( $attributes ) {
		if ( ! $attributes['displayProductExcerpt'] ) {
			return;
		}

		global $product, $post;

		$length = ( isset( $attributes['productExcerptLength'] ) ) ? $attributes['productExcerptLength'] : 25;

		if ( 'full_post' === $attributes['displayProductContentRadio'] ) {
			$excerpt = get_the_content();
		} else {
			$excerpt = $this->get_excerpt_by_id( $post->ID, $length );
		}

		if ( ! $excerpt ) {
			$excerpt = null;
		}
		if ( !empty( $excerpt ) ) {
			$excerpt = apply_filters( "spc_single_post_excerpt_{$attributes['post_type']}", $excerpt, get_the_ID(), $attributes );
			do_action( "spc_single_post_before_excerpt_{$attributes['post_type']}", get_the_ID(), $attributes );
			?>
				<div class='spc-post-text'> 
					<div class="spc-post-excerpt">
						<?php echo wp_kses_post( $excerpt ); ?>
					</div>
			</div>
			
		<?php
		}
		do_action( "spc_single_post_after_excerpt_{$attributes['post_type']}", get_the_ID(), $attributes );
	}

	/**
	 * Render Post CTA button HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_button( $attributes ) {
		if ( ! $attributes['displayProductCartbtn'] ) {
			return;
		}
		$target = '_self';

		if ( isset($attributes['newTab'] ) ) {
			$target = '_blank';
		}
		$cartbtnText = ( $attributes['cartbtnText'] ) ? $attributes['cartbtnText'] : __( 'Add To Cart', 'shopcred' );
		do_action( "spc_single_post_before_readMorebtn_{$attributes['post_type']}", get_the_ID(), $attributes );
		$wrap_classes = 'spc-post-button wp-block-button';
		$link_classes = 'spc-post-link spc-text-link';
		?>
		<div class='spc-button-wrapper'> 
			<div class="<?php echo esc_html( $wrap_classes ); ?>">
				<a class="<?php echo esc_html( $link_classes ); ?>" href="<?php echo esc_url( apply_filters( "spc_single_post_link_{$attributes['post_type']}", get_the_permalink(), get_the_ID(), $attributes ) ); ?>" target="<?php echo esc_html( $target ); ?>" rel="bookmark noopener noreferrer"><?php echo esc_html( $cartbtnText ); ?></a>
			</div>
		</div>
		<?php
		do_action( "spc_single_post_after_readMorebtn_{$attributes['post_type']}", get_the_ID(), $attributes );
	}

	public function get_add_to_cart( $attributes ){

		if ( ! $attributes['displayProductCartbtn'] ) {
			return;
		}

		global $product, $post;

        $data = '';

		$target = '_self';

		if ( isset($attributes['newTab'] ) ) {
			$target = '_blank';
		}
		$cartbtnText = ( $attributes['cartbtnText'] ) ? $attributes['cartbtnText'] : __( 'Add To Cart', 'shopcred' );

		do_action( "spc_product_cart_before_{$attributes['post_type']}", get_the_ID(), $attributes );

        $attributes = array(
            'aria-label'       => $product->add_to_cart_description(),
            'data-quantity'    => '1',
            'data-product_id'  => $product->get_id(),
            'data-product_sku' => $product->get_sku(),
            'rel'              => 'nofollow',
            'class'            => 'add_to_cart_button ajax_add_to_cart spc-cart-normal',
        ); 
        
        $args = array(
            'quantity'   => '1',
            'attributes' => $attributes,
            'class'      => 'add_to_cart_button ajax_add_to_cart'
        );
        
		$data = apply_filters(
			'woocommerce_loop_add_to_cart_link',
			sprintf(
				'<a href="%s" target="%s" data-stock="%s" %s>%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_html( $target ),
				esc_attr( $product->get_stock_quantity() ),
				wc_implode_html_attributes( $attributes ),
				$cartbtnText ? esc_html($cartbtnText) : esc_html( $product->add_to_cart_text() )
			),
			$product,
			$args
		);
        ?>
		<div class="spc-button-wrapper">
		
			<?php woocommerce_template_loop_add_to_cart(); ?>

			<!-- 
				woocommerce_after_add_to_cart_button
				if the wishlist block is enabled in shopcred addon then this do_action will trigger.
			-->
			<div>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</div>

		</div>
		<?php 
    	
    }

	/**
	 * Render Complete Box Link HTML.
	 *
	 * @param array $attributes Array of block attributes.
	 *
	 * @since 1.0.0
	 */
	public function render_complete_box_link( $attributes ) {
		if ( ! ( isset( $attributes['linkBox'] ) && $attributes['linkBox'] ) ) {
			return;
		}
		$target = ( $attributes['newTab'] ) ? '_blank' : '_self';
		?>
		<a class="spc-post-link-complete-box" href="<?php echo esc_url( apply_filters( "spc_single_post_link_{$attributes['post_type']}", get_the_permalink(), get_the_ID(), $attributes ) ); ?>" target="<?php echo esc_html( $target ); ?>" rel="bookmark noopener noreferrer"></a>
		<?php
	}

	/**
	 * Disable canonical on Single Post.
	 *
	 * @param  string $redirect_url  The redirect URL.
	 * @param  string $requested_url The requested URL.
	 * @since  1.0.0
	 * @return bool|string
	 */
	public function override_canonical( $redirect_url, $requested_url ) {

		global $wp_query;

		if ( is_array( $wp_query->query ) ) {

			if ( true === $wp_query->is_singular
				&& - 1 === $wp_query->current_post
				&& true === $wp_query->is_paged
			) {
				$redirect_url = false;
			}
		}

		return $redirect_url;
	}

	/**
	 * Get Block Attributes default and set attributes value
	 *
	 * @param  array  attributes $key & $vaule
	 * @since  1.0.0
	 * @return array
	 */
    public static function get_product_block_attributes( $get_page_id, $selectorToAction ) {

        if ( empty( $selectorToAction ) ) {
			return;
		}

        $blockName = "{$selectorToAction}";

        $defaultsValues = \WP_Block_Type_Registry::get_instance()->get_registered( 'spc/woo-product' );

        $default_attributes = $defaultsValues->attributes;

        foreach($default_attributes as $key => $val) {
            if ( array_key_exists('default', $val ) ){
           
                $keyID[$key] = $val['default'];
            }
          
          }

        $attributes = $keyID;
     	
        $post = get_post($get_page_id);

		$set_attributes = array();

		if (has_blocks($post->post_content)) {
			
			$blocks = parse_blocks($post->post_content);
			$result = [];
			self::extract_block_name_attrs($blocks, $result);

			if(isset($result)) 
			{
				if($result[0]['blockName'] == $blockName) {
					$woo_grid_settings = wp_parse_args(
						$result[0]['attrs'],
						$attributes
					);
						
					$set_attributes = $woo_grid_settings;
				}
			} 
			else 
			{
				$set_attributes = "Attributes are not set.";
				wp_die();
			}

		}

        return $set_attributes;
    }


	/**
	 * Recursive block to get spc/woo-product attributes
	 *
	 * @param  data and result
	 * @since  1.0.0
	 * @return array
	 */
	public static function extract_block_name_attrs($data, &$result) {
		foreach ($data as $item) {
			if (isset($item['blockName']) && $item['blockName'] === 'spc/woo-product') {
				$result[] = [
					'blockName' => $item['blockName'],
					'attrs' => $item['attrs'],
				];
			}
			if (isset($item['innerBlocks']) && is_array($item['innerBlocks'])) {
				self::extract_block_name_attrs($item['innerBlocks'], $result);
			}
		}
	}
	   
}

Render_Block::get_instance();
