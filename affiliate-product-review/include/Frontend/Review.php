<?php

/**
 * This is the main review class
 *
 */
class Review {

	public function __construct() {

		add_filter( 'the_content', [ $this, 'render_review' ] );

	}

	/**
	 * Render  review frontend
	 *
	 * @param $content
	 *
	 * @return string
	 */
	public function render_review( $content ) {

		global $post;
		$apr_products = get_post_meta( $post->ID, 'apr_products', true );
		$is_review    = ! empty( $apr_products['is_product_review'] ) ? $apr_products['is_product_review'] : '';

		ob_start();

		if ( $is_review ):
			?>
            <div class="apr-main-wrapper">
                <div id="apr_container" class="apr-container">
					<?php
					$review_product = ! empty( $apr_products['review_product'] ) ? $apr_products['review_product'] : [];
					foreach ( $review_product as $product ):
						?>
                        <div class="apr-product-item">
                            <div class="apr-product-top">
                                <h3 class="apr-product-title">
                                    <a href="<?php echo esc_url( $product['product_url'] ) ?>">
										<?php echo esc_html( $product['product_title'] ) ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="apr-product-image-wrapper">
                                <div class="apr-product-image"
                                     style="background-image: url(<?php echo esc_url( $product['product_img']['url'] ); ?>)"></div>
                            </div>
                            <div class="apr-product-info">
                                <div class="apr-action">
                                    <a class="apr-btn apr-box-btn"
                                       href="<?php echo esc_url( $product['product_url'] ) ?>" rel="nofollow">
										<?php echo esc_html( $product['product_btn'] ) ?>
                                    </a>
                                </div>
                                <div class="apr-product-description">
                                    <p>
										<?php echo wp_kses_post( wpautop( $product['product_desc'] ) ) ?>
                                    </p>
                                </div>
								<?php
								if ( ! empty( $product['pros_item'] ) || ! empty( $product['product_cons'] ) ):
									?>
                                    <div class="apr-pros-cons">
                                        <div class="apr-pros">
                                            <h5><?php echo esc_html__( 'Pros', 'apr' ); ?></h5>
                                            <ul>
												<?php
												$pros_items = ! empty( $product['product_pros'] ) ? $product['product_pros'] : [];
												foreach ( $pros_items as $pros ):
													?>
                                                    <li><?php echo esc_html( $pros['pros_item'] ); ?></li>
												<?php
												endforeach;
												?>
                                            </ul>
                                        </div>
                                        <div class="apr-cons">
                                            <h5><?php echo esc_html__( 'Cons', 'apr' ); ?></h5>
                                            <ul>
												<?php
												$cons_items = ! empty( $product['product_cons'] ) ? $product['product_cons'] : [];
												foreach ( $cons_items as $cons ):
													?>
                                                    <li><?php echo esc_html( $cons['cons_item'] ); ?></li>
												<?php
												endforeach;
												?>
                                            </ul>
                                        </div>
                                    </div>
								<?php
								endif;
								?>
                            </div>
                        </div>
					<?php
					endforeach;
					?>
                </div>
            </div>
		<?php
		endif;

		$apr_markup = ob_get_clean();

		return $content . $apr_markup;
	}
}

/**
 * Isnisial The main  forntend class
 *
 * @return false/Review
 */
new Review();


