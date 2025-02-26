<?php

/*=======================================================
*    Register Accordion Post Type
* =======================================================*/
function htblocks_register_accordion_post_type() {
	$labels = array(
		'name'                  => _x( 'Accordions', 'Post Type General Name', 'htblocks' ),
		'singular_name'         => _x( 'Accordion', 'Post Type Singular Name', 'htblocks' ),
		'menu_name'             => __( 'Accordions', 'htblocks' ),
		'name_admin_bar'        => __( 'accordion', 'htblocks' ),
		'archives'              => __( 'Accordion Archives', 'htblocks' ),
		'parent_item_colon'     => __( 'Parent Accordion:', 'htblocks' ),
		'all_items'             => __( 'All Accordions', 'htblocks' ),
		'add_new_item'          => __( 'Add New Accordion', 'htblocks' ),
		'add_new'               => __( 'Add New Accordion', 'htblocks' ),
		'new_item'              => __( 'New Accordion', 'htblocks' ),
		'edit_item'             => __( 'Edit Accordion', 'htblocks' ),
		'update_item'           => __( 'Update Accordion', 'htblocks' ),
		'view_item'             => __( 'View Accordion', 'htblocks' ),
		'search_items'          => __( 'Search Accordion', 'htblocks' ),
		'not_found'             => __( 'Not found', 'htblocks' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'htblocks' ),
		'featured_image'        => __( 'Featured Image', 'htblocks' ),
		'set_featured_image'    => __( 'Set featured image', 'htblocks' ),
		'remove_featured_image' => __( 'Remove featured image', 'htblocks' ),
		'use_featured_image'    => __( 'Use as featured image', 'htblocks' ),
		'insert_into_item'      => __( 'Insert into item', 'htblocks' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'htblocks' ),
		'items_list'            => __( 'Accordions list', 'htblocks' ),
		'items_list_navigation' => __( 'Accordions list navigation', 'htblocks' ),
		'filter_items_list'     => __( 'Filter items list', 'htblocks' ),
	);
	$args = array(
		'label'                 => __( 'Accordion', 'htblocks' ),
		'labels'                => $labels,
		'supports'              => array('title','editor','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-status',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'wphash_accordion', $args );
	
}
add_action( 'init', 'htblocks_register_accordion_post_type');


function htblocks_register_accordion_category() {

	//Gallery taxonomy 
	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'htblocks' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'htblocks' ),
		'menu_name'                  => __( 'Categories', 'htblocks' ),
		'all_items'                  => __( 'All Items', 'htblocks' ),
		'parent_item'                => __( 'Parent Item', 'htblocks' ),
		'parent_item_colon'          => __( 'Parent Item:', 'htblocks' ),
		'new_item_name'              => __( 'New Item Name', 'htblocks' ),
		'add_new_item'               => __( 'Add New Item', 'htblocks' ),
		'edit_item'                  => __( 'Edit Item', 'htblocks' ),
		'update_item'                => __( 'Update Item', 'htblocks' ),
		'view_item'                  => __( 'View Item', 'htblocks' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'htblocks' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'htblocks' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'htblocks' ),
		'popular_items'              => __( 'Popular Items', 'htblocks' ),
		'search_items'               => __( 'Search Items', 'htblocks' ),
		'not_found'                  => __( 'Not Found', 'htblocks' ),
		'no_terms'                   => __( 'No items', 'htblocks' ),
		'items_list'                 => __( 'Items list', 'htblocks' ),
		'items_list_navigation'      => __( 'Items list navigation', 'htblocks' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'accordion_cat', array( 'wphash_accordion' ), $args );

}
add_action( 'init', 'htblocks_register_accordion_category');



add_action( 'init', 'htblocks_register_accordion_dynamic_block' );
function htblocks_register_accordion_dynamic_block() {

	// Only load if Gutenberg is available.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Hook server side rendering into render callback
	register_block_type( 'htblocks/accordion', [
		'render_callback' => 'htblocks_render_accordion',
		'attributes' => array(
            'wrapperClass' => array(
                'type' => 'string',
            ),
            'perPage' => array(
                'type' => 'number',
                'default'	=> '3'
            ),
            'uniqueID' => array(
                'type' => 'number',
                'default'	=> '1'
            ),
            'orderby' => array(
            	'type'		=> 'string',
            ),
            'order' => array(
            	'type'		=> 'string'
            ),
            'category_ids' => array(
            	'type'		=> 'string'
            ),
            'columns' => array(
            	'type'		=> 'number'
            ),
            'titleBgColor' => array(
            	'type'		=> 'string'
            ),
            'contentBgColor' => array(
            	'type'		=> 'string'
            ),
            'titleColor' => array(
            	'type'		=> 'string'
            ),
            'contentColor' => array(
            	'type'		=> 'string'
            ),
            'iconColor' => array(
            	'type'		=> 'string'
            ),
            'iconBgColor' => array(
            	'type'		=> 'string'
            ),
            'boxShadow' => array(
            	'type'		=> 'boolean'
            ),
            'roundShape' => array(
            	'type'		=> 'boolean'
            ),
            'iconLeft' => array(
            	'type'		=> 'boolean'
            ),
            'contentBorder' => array(
            	'type'		=> 'boolean'
            ),
            'wrapItemWithBorder' => array(
            	'type'		=> 'boolean'
            ),
        )
	] );

}


function htblocks_render_accordion($attributes){

	if(is_admin()) return;

	$args = array();
	$args['post_type']		= 'wphash_accordion';
	$args['post_status']	= 'publish';
	$args['ignore_sticky_posts'] 	= true;

	if($attributes['perPage']){
		$args['posts_per_page'] = $attributes['perPage'];
	}

	if( $attributes['orderby']){
		$args['orderby']		= $attributes['orderby'];
	}

	if( $attributes['order']){
		$args['order']		= $attributes['order'];
	}

	if( $attributes['category_ids'] ){
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'accordion_cat',
				'field'    => 'term_id',
				'terms'    => explode(',', $attributes['category_ids']),
			),
		);
	}

	$query = new WP_Query($args);
	if($query->have_posts()):

		ob_start();

		$titleBgColor = $attributes['titleBgColor'] ? $attributes['titleBgColor'] : '';
		$contentBgColor = $attributes['contentBgColor'] ? $attributes['contentBgColor'] : '';
		$titleColor = $attributes['titleColor'] ? $attributes['titleColor'] : '';
		$contentColor = $attributes['contentColor'] ? $attributes['contentColor'] : '';
		$iconBgColor = $attributes['iconBgColor'] ? $attributes['iconBgColor'] : '';
		$iconColor = $attributes['iconColor'] ? $attributes['iconColor'] : '';

		$rand_class = 'rand_' . rand();

		$post_class_extra = array( 'panel-default');
		$attributes['boxShadow'] ? $post_class_extra[] = 'accordion-boxshadow' : '';
		$attributes['roundShape'] ? $post_class_extra[] = 'round-shape' : '';
		$attributes['iconLeft'] ? $post_class_extra[] = 'icon-left' : $post_class_extra[] = 'icon-right';
		$attributes['contentBorder'] ? $post_class_extra[] = 'has-content-border' : '';
		$attributes['wrapItemWithBorder'] ? $post_class_extra[] = 'wrap-item-with-border' : '';

	?>
	
	<div class="<?php echo esc_attr( $attributes['wrapperClass']. ' '. $rand_class ); ?>">
		<div class="wp-block-columns has-<?php echo esc_attr($columns); ?>-columns">

			<div class="accordion-style-1 panel-group" id="accordion-<?php echo esc_attr($attributes['uniqueID']); ?>" role="tablist" aria-multiselectable="true">

				<?php while($query->have_posts()): $query->the_post(); ?>
			    	<div <?php post_class($post_class_extra); ?>>
                        <div class="panel-heading bg-gray" role="tab" id="accOnea">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-<?php echo esc_attr($attributes['uniqueID']); ?>" href="#acc-collapse-<?php echo $attributes['uniqueID'];?>-<?php echo get_the_id(); ?>" aria-expanded="true"
                                    aria-controls="acc-collapse-<?php echo $attributes['uniqueID'];?>-<?php echo get_the_id(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="acc-collapse-<?php echo $attributes['uniqueID'];?>-<?php echo get_the_id(); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accOne">
                            <div class="panel-body"><?php echo get_the_content(); ?></div>
                        </div>
                    </div>

				<?php
				    endwhile; // main loop
				    wp_reset_postdata();
				?>

			</div>

			<style type="text/css">
				.<?php echo esc_html($rand_class); ?> .accordion-style-1 .panel-default .panel-collapse{
					color: <?php echo esc_html($contentColor); ?>;
					background: <?php echo esc_html($contentBgColor); ?>;
				}
				.<?php echo esc_html($rand_class); ?>  .accordion-style-1 .panel-default .panel-heading h4 a{
					color: <?php echo esc_html($titleColor); ?>;
					background: <?php echo esc_html($titleBgColor); ?>;
				}
				.<?php echo esc_html($rand_class); ?> .accordion-style-1 .panel-default .panel-heading h4 a::after{
					background: <?php echo esc_html($iconBgColor); ?>;
					color: <?php echo esc_html($iconColor); ?>;
				}
			</style>

		</div>
	</div>

	<?php
	endif; // have posts

	return ob_get_clean();
}
