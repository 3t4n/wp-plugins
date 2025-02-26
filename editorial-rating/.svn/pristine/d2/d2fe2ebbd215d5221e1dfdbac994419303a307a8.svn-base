<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a widget : Editorial Rating.
//
WPAS::createWidget(
	'wpas_editorial_rating_widget',
	array(
		'title'       => __( 'Editorial Rating', 'wpas_editorial_rating' ),
		'classname'   => 'wpas-widget-editorial-rating',
		'description' => __( 'This widget from Editorial Rating plugin.', 'wpas_editorial_rating' ),
		'fields'      => array(

			array(
				'id'      => 'wpas-widget-title',
				'type'    => 'text',
				'title'   => __( 'Title', 'wpas_editorial_rating' ),
				'default' => 'Editorial Rating',
			),
			array(
				'id'          => 'wpas-cpt-widget-for',
				'type'        => 'select',
				'title'       => 'Select a review for Widget data',
				'after'       => '<a href="' . esc_url( get_admin_url() . 'post-new.php?post_type=wpas_review' ) . '" target="_blank">+ Add New Review</a>',
				'placeholder' => 'Select a review',
				'chosen'      => true,
				'ajax'        => true,
				'options'     => 'posts',
				'query_args'  => array(
					'post_type' => 'wpas_review',
				),
				'class'       => 'wpas--db-tar',
			),
			array(
				'id'      => 'wpas-widget-show-img',
				'type'    => 'switcher',
				'title'   => __( 'Show/Hide Product Image.', 'wpas_editorial_rating' ),
				'default' => false,
			),
			array(
				'id'      => 'wpas-widget-show-score',
				'type'    => 'switcher',
				'title'   => __( 'Show/Hide Score Bars.', 'wpas_editorial_rating' ),
				'default' => true,
			),
			array(
				'id'      => 'wpas-widget-show-pros-cons',
				'type'    => 'switcher',
				'title'   => __( 'Show/Hide Pros Cons.', 'wpas_editorial_rating' ),
				'default' => false,
			),
			array(
				'id'      => 'wpas-widget-show-button',
				'type'    => 'switcher',
				'title'   => __( 'Show/Hide Button.', 'wpas_editorial_rating' ),
				'default' => true,
			),
			array(
				'id'      => 'wpas-widget-sticky',
				'type'    => 'switcher',
				'title'   => __( 'Off/On Sticky Mode.', 'wpas_editorial_rating' ),
				'default' => false,
			),
			array(
				'id'         => 'wpas-sticky-min-width',
				'type'       => 'number',
				'title'      => __( 'Stop sticky on mobile/tab size.', 'wpas_editorial_rating' ),
				'default'    => '922',
				'after'      => __( '(min-width: 922px)', 'wpas_editorial_rating' ),
				'dependency' => array( 'wpas-widget-sticky', '==', true ),
			),
			array(
				'id'         => 'wpas-widget-disable-sticky-footer',
				'type'       => 'switcher',
				'title'      => __( 'Disable sticky on footer tuch.', 'wpas_editorial_rating' ),
				'default'    => false,
				'dependency' => array( 'wpas-widget-sticky', '==', true ),
			),
			array(
				'id'         => 'wpas-widget-mobile-show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide This Widget on Mobile/Tab.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 75,
				'default'    => false,
			),
			array(
				'id'         => 'wpas-widget-min-width',
				'type'       => 'number',
				'title'      => __( 'Hide this widget on mobile/tab size.', 'wpas_editorial_rating' ),
				'default'    => '922',
				'after'      => __( '(min-width: 922px)', 'wpas_editorial_rating' ),
				'dependency' => array( 'wpas-widget-mobile-show', '==', true ),
			),

		),
	)
);

//
// Front-end display of widget : Editorial Rating.
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'wpas_editorial_rating_widget' ) ) {
	function wpas_editorial_rating_widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if ( ! empty( $instance['wpas-cpt-widget-for'] ) ) {

			/**
			 * Get Post Meta From Metabox.
			 */
			$wpas_meta_values                  = get_post_meta( $instance['wpas-cpt-widget-for'], '_wpas_er_options', true );
			$wpas_widget_disable_sticky_footer = ( '0' !== $instance['wpas-widget-disable-sticky-footer'] ) ? ' data-stickyDisable=true' : '';

			// Enqueue the styles.
			wp_enqueue_style( 'wpas_editorial_rating-widget' );
			if ( '0' !== $instance['wpas-widget-sticky'] ) {

				wp_enqueue_script( 'wpas_editorial_rating' );
			}

			$wpas_sticky_min_width  = isset( $instance['wpas-sticky-min-width'] ) ? $instance['wpas-sticky-min-width'] : '922';
			$wpas_widget_min_width  = isset( $instance['wpas-widget-min-width'] ) ? $instance['wpas-widget-min-width'] : '922';
			$wpas_product_image_url = isset( $wpas_meta_values['wpas-product-image']['url'] ) ? $wpas_meta_values['wpas-product-image']['url'] : '';
			$wpas_product_image_alt = isset( $wpas_meta_values['wpas-product-image']['alt'] ) ? $wpas_meta_values['wpas-product-image']['alt'] : '';
			$wpas_editorial_rating  = isset( $wpas_meta_values['wpas-editorial-rating'] ) ? $wpas_meta_values['wpas-editorial-rating'] : '';

			$wpas_i            = 0;
			$wpas_total_rating = 0;
			foreach ( $wpas_editorial_rating as $wpas_editorial_rating_key => $wpas_editorial_rating_value ) {

				$wpas_total_rating += $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'];
				$wpas_i++;
			}
			$wpas_total_rating_math       = $wpas_total_rating / $wpas_i;
			$wpas_total_rating_math_round = number_format( $wpas_total_rating_math, 1 );
			$wpas_wpas_pros               = isset( $wpas_meta_values['wpas-pros'] ) ? $wpas_meta_values['wpas-pros'] : '';
			$wpas_wpas_cons               = isset( $wpas_meta_values['wpas-cons'] ) ? $wpas_meta_values['wpas-cons'] : '';
			$wpas_product_btn_txt         = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-text'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-text'] : '';
			$wpas_product_btn_url         = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-link'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-link'] : '';
			$wpas_product_btn_target      = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-target'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-target'] : '';
			$wpas_product_btn_nofollow    = isset( $wpas_meta_values['wpas-product-btn']['wpas-product-btn-nofollow'] ) ? $wpas_meta_values['wpas-product-btn']['wpas-product-btn-nofollow'] : '';

			if ( '0' !== $instance['wpas-widget-mobile-show'] ) {

				echo '<style>@media (max-width: ' . $wpas_widget_min_width . 'px) {.wpas-widget-editorial-rating {display: none !important;}}</style>';
			}

			echo '<div id="wpas--editorial-rating" class="wpas--rating-widget-wrap" data-stickyhideon="' . $wpas_sticky_min_width . '"' . $wpas_widget_disable_sticky_footer . '>
				<div class="wpas--rating-widget-header">
					<span class="wpas--rating-widget-title">' . esc_html( $instance['wpas-widget-title'] ) . '</span>
					<strong><span class="wpas--rating-widget-score">' . esc_html( $wpas_total_rating_math_round ) . '</span></strong>
				</div>';

			if ( '0' !== $instance['wpas-widget-show-img'] ) {

				if ( $wpas_product_image_url ) {

					echo '<figure class="wpas--product-img">
						<img src="' . $wpas_product_image_url . '" alt="' . $wpas_product_image_alt . '">
					</figure>';
				}
			}

			// Score Bars.
			if ( '0' !== $instance['wpas-widget-show-score'] ) {

				echo '<div class="wpas--rating-categories">';
				foreach ( $wpas_editorial_rating as $wpas_editorial_rating_key => $wpas_editorial_rating_value ) {

					echo '<div class="wpas--rating-detail">
						<span class="wpas--rating-name">' . esc_html( $wpas_editorial_rating_value['wpas-editorial-rating-category-name'] ) . '</span>
						<strong>
							<span class="wpas--rating-rate">' . esc_html( $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'] ) . '</span>
						</strong>
					</div>
					<div class="wpas--rating-meter">	
						<span class="wpas--rating-bar" style="width: ' . esc_html( $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'] ) . '0%"></span>
					</div>';
				}
				echo '</div>';
			}

			// Pros-Cons Wrap.
			if ( '0' !== $instance['wpas-widget-show-pros-cons'] ) {

				echo '<div class="wpas--pros-cons-wrap">
						<div class="wpas--pros-wrap">
							<span class="wpas--pros-title">PROS</span>
							<ul class="wpas--pros-list">';
				foreach ( $wpas_wpas_pros as $wpas_wpas_pros_key => $wpas_wpas_pros_value ) {

					echo '<li><span class="icon-checkmark"></span>' . esc_html( $wpas_wpas_pros_value['wpas-pros-list'] ) . '</li>';
				}
							echo '</ul>
							<span class="wpas--title-cons"></span>
						</div>
						<div class="wpas--cons-wrap">
							<span class="wpas--cons-title">CONS</span>
							<ul class="wpas--cons-list">';
				foreach ( $wpas_wpas_cons as $wpas_wpas_cons_key => $wpas_wpas_cons_value ) {

					echo '<li><span class="icon-cross"></span>' . esc_html( $wpas_wpas_cons_value['wpas-cons-list'] ) . '</li>';
				}
							echo '</ul>
						</div>
					</div>';
			}

			// Button.
			if ( '0' !== $instance['wpas-widget-show-button'] ) {

				echo '<div class="wpas--rating-widget-btn-wrap"><a href="' . esc_attr( $wpas_product_btn_url ) . '" class="wpas--product-link" target="' . ( '1' !== $wpas_product_btn_target ? '_self' : '_blank' ) . '"' . ( '1' === $wpas_product_btn_nofollow ? ' rel="nofollow"' : '' ) . '>' . esc_html( $wpas_product_btn_txt ) . '</a></div>';
			}

			echo '</div>'; // wpas--rating-widget-wrap.
		} else {

			echo 'You are not selected any review for showing in this widget. You can <a href="' . esc_url( get_admin_url() . 'post-new.php?post_type=wpas_review' ) . '" target="_blank">+ Add a New Review</a>, then select to this widget.';
		}

		echo $args['after_widget'];
	}
}
