<?php
defined( 'ABSPATH' ) || exit();

/**
 *Post Banner meta boxes
 */
if ( class_exists( 'CSF' ) ) {
	$prefix = 'apr_products';

	CSF::createMetabox( $prefix, array(
			'title'     => esc_html__( 'Affiliate Product Review!', 'bpen-core' ),
			'post_type' => 'post',
		)
	);

	CSF::createSection( $prefix, array(
		'fields' => array(
			array(
				'id'      => 'is_product_review',
				'type'    => 'checkbox',
				'title'   => esc_html__( 'Is Product Review ?', 'apr' ),
				'label'   => esc_html__( 'Yes, Please do it!', 'apr' ),
				'desc'    => esc_html__( 'If you want to add product review under the post please checked this box!', 'apr' ),
				'default' => false
			),

			array(
				'id'           => 'review_product',
				'type'         => 'repeater',
				'desc'         => esc_html__( 'You can add unlimited product here!', 'apr' ),
				'title'        => esc_html__( 'Review Products', 'apr' ),
				'button_title' => esc_html__( 'Add New Product Review', 'apr' ),
				'dependency'   => array( 'is_product_review', '==', 'true' ),
				'fields'       => array(

					array(
						'id'    => 'product_title',
						'type'  => 'text',
						'title' => esc_html__( 'Product Title', 'apr' ),
					),

					array(
						'id'          => 'product_img',
						'type'        => 'media',
						'title'       => esc_html__( 'Product Image', 'apr' ),
						'library'     => 'image',
						'placeholder' => esc_html__( 'Upload a Image', 'apr' ),
					),

					array(
						'id'    => 'product_desc',
						'type'  => 'textarea',
						'title' => esc_html__( 'Product Description', 'apr' ),
					),

					array(
						'id'    => 'product_btn',
						'type'  => 'text',
						'title' => esc_html__( 'Button Label', 'apr' ),
					),

					array(
						'id'    => 'product_url',
						'type'  => 'text',
						'title' => esc_html__( 'Product Button URL', 'apr' ),
					),

					array(
						'id'           => 'product_pros',
						'type'         => 'repeater',
						'title'        => esc_html__( 'Product Pros', 'apr' ),
						'button_title' => esc_html__( 'Add New Pros', 'apr' ),
						'fields'       => array(
							array(
								'id'    => 'pros_item',
								'type'  => 'text',
								'title' => esc_html__( 'Pros Item', 'apr' ),
							),
						)
					),

					array(
						'id'           => 'product_cons',
						'type'         => 'repeater',
						'title'        => esc_html__( 'Product Cons', 'apr' ),
						'button_title' => esc_html__( 'Add New Cons', 'apr' ),
						'fields'       => array(
							array(
								'id'    => 'cons_item',
								'type'  => 'text',
								'title' => esc_html__( 'Cons Item', 'apr' ),
							),
						)
					),
				),
			),
		),
	) );
}


