<?php
/*-----------------------------------------------------------------------------------*/
/* TImeline Awesome Post Type
/*-----------------------------------------------------------------------------------*/


add_action('init', 'accordion_awesome_register');

function accordion_awesome_register() {

	$labels = array(
		'name'                => esc_html_x( 'Accordions', 'Post Type General Name', 'accordion-awesome' ),
		'singular_name'       => esc_html_x( 'Accordions', 'Post Type Singular Name', 'accordion-awesome' ),
		'menu_name'           => esc_html__( 'Accordions', 'accordion-awesome' ),
		'parent_item_colon'   => esc_html__( 'Parent Accordions:', 'accordion-awesome' ),
		'all_items'           => esc_html__( 'All Accordions', 'accordion-awesome' ),
		'view_item'           => esc_html__( 'View Accordions', 'accordion-awesome' ),
		'add_new_item'        => esc_html__( 'Add New Accordions', 'accordion-awesome' ),
		'add_new'             => esc_html__( 'Add New', 'accordion-awesome' ),
		'edit_item'           => esc_html__( 'Edit Accordions', 'accordion-awesome' ),
		'update_item'         => esc_html__( 'Update Accordions', 'accordion-awesome' ),
		'search_items'        => esc_html__( 'Search Accordions', 'accordion-awesome' ),
		'not_found'           => esc_html__( 'Not found', 'accordion-awesome' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'accordion-awesome' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'query_var'           => 'accordions',
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'rewrite'             => array( 'slug' => 'accordions' ),
		'supports'            => array( 'title' ),
		'menu_position'       => 7,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'menu_icon'           => 'dashicons-align-wide',
	);
	register_post_type( 'accordion-awesome', $args );
}

require dirname( __FILE__ ) .'/includes/hover-collections.php';

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'accordion_awesome_field_in_post' );
function accordion_awesome_field_in_post() {

	require dirname( __FILE__ ) .'/accordion-awesome-ctrl.php';

	Container::make( 'post_meta', 'accordion_repeater_cont', esc_html('Accordion Awesome') )
	->where( 'post_type', '=', 'accordion-awesome' )
	->set_priority( 'high' )
	->add_tab(  __( 'Layout' ), array(
		Field::make( 'select', 'accordion_style_choice', esc_html__( 'Select Style', 'accordion-awesome' ) )
		->set_width( 33 )
		->add_options( array(
			'accordion-style-2' => 'Unique Dua',
			'accordion-style-7' => 'Unique Delapan',
			'accordion-style-9' => 'Unique Sapuluh',
			'accordion-style-13-checkboxes' => 'Unique Opatbelas',
			'accordion-style-13-radiobuttons' => 'Unique Limabelas',
		) ),

		Field::make( 'text', 'accordion_width_container', esc_html__( 'Accordion Width', 'accordion-awesome' ) )
		->set_attribute( 'placeholder', '1000' )
		->set_width( 33 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-1',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-2',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-2-autocollapse',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-3',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-4',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-5',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-6',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-8',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-9',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-10',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-11',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-12',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		Field::make( 'html', 'upgrade_to_pro_tab' )
   		->set_html( '<p>In order to get more styles and colors, let&#39;s upgrade to pro</p><a href="https://1.envato.market/QBG1A" target="_blank" class="btn-buy">Upgrade to Pro</a>' ),

	))
	->add_tab(  esc_html__( 'Content', 'accordion-awesome' ), array(

		Field::make( 'text', 'accordion_header_name', esc_html__( 'Accordion Header Name', 'accordion-awesome' ) )
		->set_attribute( 'placeholder', 'Accordion' )
		->set_width( 33 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-8',
				'compare' => '=',
			),
		) ),

		Field::make( 'complex', 'accordion_items', esc_html__( 'Accordion Items', 'accordion-awesome' ) )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( array(

			Field::make( 'text', 'accordion_item_title', esc_html__( 'Accordion Title', 'accordion-awesome' ) )
			->set_attribute( 'placeholder', 'Why use accordion?' )
			->set_width( 33 ),

			Field::make( 'rich_text', 'accordion_item_desc', esc_html__( 'Accordion Description', 'accordion-awesome' ) )
			->set_attribute( 'placeholder', 'Description' )
			->set_width( 100 )
			->set_conditional_logic( array(
				'relation' => 'OR',
				array(
					'field' => 'parent.accordion_style_choice',
					'value' => 'accordion-style-1',
					'compare' => '!=',
				),
			) ),

		))
	))

	->add_tab(  esc_html__( 'Customize', 'accordion-awesome' ), array(
		// start for customize fields
		Field::make( 'color', 'accordion_title_color', esc_html__( 'Accordion Title Color', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 ),

		// Style 1
		Field::make( 'color', 'accordion_hover_title', esc_html__( 'Accordion Title Hover Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		// Style 2
		Field::make( 'color', 'accordion_title_hover', esc_html__( 'Accordion Title Hover And Active ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-2',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-2-autocollapse',
				'compare' => '=',
			)
		) ),
	

		Field::make( 'color', 'accordion_description_color', esc_html__( 'Accordion Description Color', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 ),

		Field::make( 'color', 'accordion_icon_color', esc_html__( 'Accordion Icon Color', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 ),

		Field::make( 'color', 'accordion_border_color', esc_html__( 'Accordion Border Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-1',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-2',
				'compare' => '=',
			),
            array(
                'field' => 'accordion_style_choice',
                'value' => 'accordion-style-2-autocollapse',
                'compare' => '=',
            ),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-9',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-10',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-11',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-12',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		Field::make( 'color', 'accordion_header_name_color', esc_html__( 'Accordion Header Name Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-8',
				'compare' => '=',
			)
		) ),

		Field::make( 'color', 'accordion_header_border_color', esc_html__( 'Accordion Heading Border Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
		) ),

		Field::make( 'color', 'accordion_background_active', esc_html__( 'Accordion Background Active ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'AND',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobutton',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		Field::make( 'color', 'accordion_background_color', esc_html__( 'Accordion Background Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-7',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-8',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-9',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-10',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-11',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-12',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		Field::make( 'color', 'accordion_background_hover_color', esc_html__( 'Accordion Background Hover Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-11',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

		Field::make( 'color', 'accordion_inner_background_color', esc_html__( 'Accordion Inner Background Color ', 'accordion-awesome' ) )
		->set_alpha_enabled( true )
		->set_width( 14 )
		->set_conditional_logic( array(
			'relation' => 'OR',
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-9',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-10',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-11',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-checkboxes',
				'compare' => '=',
			),
			array(
				'field' => 'accordion_style_choice',
				'value' => 'accordion-style-13-radiobuttons',
				'compare' => '=',
			)
		) ),

	));

	// For Gutenberg Blocks
	Block::make( esc_html( 'Accordion Awesome' ) )
	->add_fields( array(
		Field::make( 'association', 'accordion_gutenberg_block', esc_html__( 'Accordion Awesome Post', 'accordion-awesome' ) )
		->set_min( 1 )
		->set_max( 1 )
		->set_types( array(
			array(
				'type'      => 'post',
				'post_type' => 'accordion-awesome',
			)
		) )
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		require dirname( __FILE__ ) .'/gutenberg-blocks/accordion-block.php';
	} );

}