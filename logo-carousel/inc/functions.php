<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Adding Thumbnail support
add_theme_support( "post-thumbnails" );
add_image_size( 'sp-logo-size' );


// Registers a logo-carousel post type
function sp_logo_carousel_register_post_type() {

	$labels = array(
		'name'               => __( 'Logos', 'logo_carousel' ),
		'singular_name'      => __( 'Logo', 'logo_carousel' ),
		'add_new'            => _x( 'Add New Logo', 'logo_carousel', 'logo_carousel' ),
		'add_new_item'       => __( 'Add New Logo', 'logo_carousel' ),
		'edit_item'          => __( 'Edit Logo', 'logo_carousel' ),
		'new_item'           => __( 'New Logo', 'logo_carousel' ),
		'view_item'          => __( 'View Logo', 'logo_carousel' ),
		'search_items'       => __( 'Search Logos', 'logo_carousel' ),
		'not_found'          => __( 'No Logos found', 'logo_carousel' ),
		'not_found_in_trash' => __( 'No Logos found in Trash', 'logo_carousel' ),
		'parent_item_colon'  => __( 'Parent Logo:', 'logo_carousel' ),
		'menu_name'          => __( 'Logo Carousel', 'logo_carousel' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'thumbnail'
		)
	);

	register_post_type( 'logo-carousel', $args );
}

add_action( 'init', 'sp_logo_carousel_register_post_type' );


// Register custom meta box
function sp_logo_carousel_meta_box() {
	add_meta_box( 'sp_lc_pro_version_features_meta_box',
		'Pro Version Features',
		'display_sp_lc_pro_version_features_meta_box',
		'logo-carousel', 'normal', 'high'
	);
}
add_action( 'admin_init', 'sp_logo_carousel_meta_box' );


function display_sp_lc_pro_version_features_meta_box( $logo_url ) {
	//
	?>
	<div class="sp-meta-box-framework">

		<div class="sp-element sp-field-text">
			<ol>
				<li>Unlimited carousel anywhere</li>
				<li>Logo Title Hover effect</li>
				<li>Logo carousel from specific categories</li>
				<li>Set Number of Columns you want to show</li>
				<li>Unlimited Custom color (Brand Color)</li>
				<li>Carousel AutoPlay on/off</li>
				<li>Carousel Stop on Hover</li>
				<li>External link opening with new tab option</li>
				<li>Custom logo size</li>
				<li>Stylish navigation arrows</li>
				<li>Carousel slide time option</li>
				<li>Navigation show/hide options</li>
				<li>Navigation position</li>
				<li>Pagination show/hide options</li>
				<li>Filter style</li>
				<li>Grid style</li>
				<li>4 Hours Instant Support from expert people</li>
				<li>And Many More</li>
			</ol>
			<p><a class="button button-primary button-large" href="http://shapedplugin.com/plugin/logo-carousel-pro/" target="_blank">Go to pro</a></p>
			<div class="clear"></div>
		</div>

	</div>

	<?php
}