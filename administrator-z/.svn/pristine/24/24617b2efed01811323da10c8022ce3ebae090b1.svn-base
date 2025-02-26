<?php
namespace Adminz\Helper;

class FlatsomeBanner {

	public $post_type = 'page';
	public $metafields = [];
	public $meta_box_label = '';

	function __construct() {

	}

	function init(): void {
		$this->create_hook();
		$this->create_metafields();
	}

	function create_metafields() {
		$args = [ 
			'post_type'          => 'page',
			'metabox_label'      => 'Page Banner',
			'meta_fields'        => [ 
				[ 
					'meta_key'  => 'adminz_banner',
					'label'     => 'Banner image',
					'attribute' => [ 
						'type' => 'wp_media',
					],
				],
				[ 
					'meta_key'     => 'banner_height',
					'label'        => 'Banner height',
					'attribute'    => [ 
						'placeholder' => '400px',
					],
					'admin_column' => false,
				],
				[ 
					'meta_key'     => 'breadcrumb_shortcode',
					'label'        => 'Breadcrumb shortcode',
					'admin_column' => false,
				],
				[ 
					'meta_key'     => 'adminz_title',
					'label'        => 'Banner title',
					'admin_column' => false,
				],
				[ 
					'meta_key'     => 'adminz_acf_banner_shortcode',
					'label'        => 'Banner shortcode After',
					'admin_column' => false,
				],
			],
			'register_post_meta' => true,
			'admin_post_columns' => true,
		];

		$meta = \WpDatabaseHelper\Init::WpMeta();
		$meta->init( $args );
		$meta->init_meta();

		// at the moment, i suppord only post type = post
		// see filter hooks: adminz_flatsome_banner as tempolary
	}

	function create_hook() {
		add_action( 'flatsome_after_header', function () {
			$this->create_html();
		}, 0 );
	}

	function create_html() {
		// check banner image
		$banner = $this->get_banner();
		if ( !$banner ) return;

		// prepare data
		$title     = $this->get_title();
		$height    = $this->get_banner_height();
		$shortcode = $this->get_shortcode();

		echo $this->template( $banner, $height, $title, $shortcode );
	}

	function template( $banner, $height = false, $title = false, $shortcode = false ) {

		ob_start();
		?>
		[section class="adminz_banner" bg_overlay="rgba(0,0,0,.5)" bg="<?php echo esc_attr( $banner ) ?>" bg_size="original"
		dark="true" height="<?php echo esc_attr( $height ); ?>"]
		[row]
		[col span__sm="12" span="9"]
		<div class="mb-half"> <?php echo $this->get_breadcrumb() ?> </div>
		<?php if ( $title ) : ?>
			<h1 class="h1 uppercase adminz_banner_title mb-0"><?php echo esc_attr( $title ); ?></h1>
		<?php endif; ?>
		[/col]
		[/row]
		<?php if ( $shortcode ) echo do_shortcode( $shortcode ); ?>
		<?php echo do_action( 'adminz_acf_banner_after', $this ); ?>
		[/section]
		<style type="text/css">
			@media (max-width: 549px) {
				.adminz_banner {
					min-height: 30vh !important;
				}
			}
		</style>
		<?php
		return do_shortcode( ob_get_clean() );
	}

	function get_breadcrumb() {
		$meta_key = 'breadcrumb_shortcode';
		$object   = adminz_get_object_id();

		if ( !$object || !isset( $object['object_id'] ) ) {
			return false;
		}
		$meta    = call_user_func( $object['object_type'], $object['object_id'], $meta_key, true );
		$meta = apply_filters( 'breadcrumb_shortcode', $meta, $object );
		if ( $meta ) {
			return $meta;
		}
		$default = do_shortcode( '[adminz_breadcrumb]' );
		return $default;
	}

	function get_banner() {
		$meta_key = 'adminz_banner';
		$object   = adminz_get_object_id();
		if ( !$object || !isset( $object['object_id'] ) ) {
			return false;
		}
		$meta = call_user_func( $object['object_type'], $object['object_id'], $meta_key, true );
		$meta = apply_filters( 'adminz_banner', $meta, $object );
		if ( $meta ) {
			return $meta;
		}
		$default = false;
		return $default;
	}

	function get_banner_height() {
		$meta_key = 'banner_height';
		$object   = adminz_get_object_id();
		if ( !$object || !isset( $object['object_id'] ) ) {
			return false;
		}
		$meta = call_user_func( $object['object_type'], $object['object_id'], $meta_key, true );
		$meta = apply_filters( 'adminz_banner_height', $meta, $object );
		if ( $meta ) {
			return $meta;
		}
		$default = '400px';
		return $default;
	}

	function get_title() {
		$meta_key = 'adminz_title';
		$object   = adminz_get_object_id();
		if ( !$object || !isset( $object['object_id'] ) ) {
			return false;
		}
		$meta = call_user_func( $object['object_type'], $object['object_id'], $meta_key, true );
		$meta = apply_filters( 'adminz_title', $meta, $object );
		if ( $meta ) {
			return $meta;
		}

		if ( is_singular() ) {
			return get_the_title();
		}

		if ( get_queried_object()->name ?? '' ) {
			return get_queried_object()->name;
		}

		if ( is_home() ) {
			return get_the_title( get_option( 'page_for_posts' ) );
		}

		if ( is_front_page() ) {
			return get_the_title( get_option( 'page_on_front' ) );
		}

		return;
	}

	function get_shortcode() {
		$meta_key = 'adminz_acf_banner_shortcode';
		$object   = adminz_get_object_id();
		if ( !$object || !isset( $object['object_id'] ) ) {
			return false;
		}
		$meta = call_user_func( $object['object_type'], $object['object_id'], $meta_key, true );
		$meta = apply_filters( 'adminz_acf_banner_shortcode', $meta, $object );
		if ( $meta ) {
			return $meta;
		}
		return false;
	}
}



/*
	EXAMPLE
	$sa = new \Adminz\Helper\FlatsomeAcfBanner;
$sa->init();
	
*/


/* 
customize example
add_filter( 'adminz_banner', function ($meta, $object) {
	if ( is_product_category() ) {
		if ( !get_term_meta( $object['object_id'] ?? '', 'adminz_banner', true ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			return get_post_meta( $shop_page_id, 'adminz_banner', true );
		}
	}

	if ( is_product() ) {
		if ( !get_post_meta( $object['object_id'] ?? '', 'adminz_banner', true ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			return get_post_meta( $shop_page_id, 'adminz_banner', true );
		}
	}
	return $meta;
}, 10, 2 );

add_filter( 'adminz_title', function ($meta, $object) {
	if ( is_product_category() ) {
		if ( !get_term_meta( $object['object_id'] ?? '', 'adminz_title', true ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			return get_the_title( $shop_page_id );
		}
	}
	if ( is_product() ) {
		if ( !get_post_meta( $object['object_id'] ?? '', 'adminz_title', true ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			return get_the_title( $shop_page_id );
		}
	}
	return $meta;
}, 10, 2 );

add_filter( 'adminz_banner_height', function ($meta, $object) {
	return '300px';
}, 10, 2 ); */