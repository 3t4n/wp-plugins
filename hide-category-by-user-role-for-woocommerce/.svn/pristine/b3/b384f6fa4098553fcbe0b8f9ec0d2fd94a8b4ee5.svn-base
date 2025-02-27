<?php

/*
* The plugin's own styles and scripts are added
*/
add_action('wp_enqueue_scripts', 'tswchc_enqueue_css_js_front');
function tswchc_enqueue_css_js_front($hook) {
	wp_enqueue_style('ts_wchc-admin-main-css', TSWCHC_PLUGIN_URL . 'assets/css/plugin_style.css', '', TSWCHC_VERSION_NUM);
}

/*
* Prevents hidden products from being added to the cart
*/
add_filter('woocommerce_add_to_cart_validation', 'filter_wc_add_to_cart_validation', 10, 3);
function filter_wc_add_to_cart_validation($passed, $product_id, $quantity) {

	$product = wc_get_product($product_id);
	$terms = get_the_terms($product->get_ID(), 'product_cat');

	if (!is_array($terms)) {
		wc_add_notice(__("The product you are trying to add is not available", "woocommerce"), 'error');
		return false;
	}

	return $passed;
}

/*
* Removes hidden products from the cart in case any of them have been added
*/
add_action('woocommerce_check_cart_items', 'filter_wc_check_cart_items');
function filter_wc_check_cart_items() {

	$cart = WC()->cart;
	$cart_items = $cart->get_cart();
	$has_virtual = $has_physical = false;

	foreach (WC()->cart->get_cart() as $cart_item) {

		$product = wc_get_product($cart_item['product_id']);
		$terms = get_the_terms($product->get_ID(), 'product_cat');

		if (!is_array($terms)) {
			WC()->cart->remove_cart_item($cart_item['key']);
			wc_add_notice(__("The product " . $product->get_name() . " is not available and was removed from your cart", "woocommerce"), 'error');
		}
	}
}

/*
* Returns the rules set in the backend of the plugin
*/
add_action('plugins_loaded', 'tswchc_get_hide_rules', 1);
function tswchc_get_hide_rules() {

	$hide_cats = array();
	$hide_rules  = array();

	if (!is_admin()) {

		$user = wp_get_current_user();
		$user_roles = (array) $user->roles;
		$hide_rules = json_decode(get_option('tswchc_rules'));

		if ($user->ID) {

			if (is_array($hide_rules) && is_array($user_roles)) {

				foreach ($user_roles as $key => $user_role) {

					foreach ($hide_rules as $key => $rule) {

						$hide = 0;

						if ($user_role == $rule->role) {
							$hide++;
						}

						if (count($user_roles) == $hide) {
							if (!in_array($rule->category, $hide_cats)) {
								$hide_cats[] = $rule->category;
							}
						}
					}
				}
			}
		} else {

			if (is_array($hide_rules)) {

				foreach ($hide_rules as $key => $rule) {

					if ('guest' == $rule->role) {

						if (!in_array($rule->category, $hide_cats)) {
							$hide_cats[] = $rule->category;
						}
					}
				}
			}
		}
	}

	return $hide_cats;
}

/*
* Add parameters to exclude hidden categories from WP query
*/
add_action('woocommerce_product_query', 'tswchc_hide_products_category', 1);
function tswchc_hide_products_category($q) {

	if (!is_admin() || is_shop()) {

		$tax_query = (array) $q->get('tax_query');
		$hide_cats = tswchc_get_hide_rules();

		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $hide_cats,
			'operator' => 'NOT IN'
		);

		$q->set('tax_query', $tax_query);
	}
}

/*
* Ensures that the correct subcategories are displayed after hiding the parent
* categories set in the backend
*/
add_filter('get_terms', 'tswchc_get_subcategory_terms', 10, 3);
function tswchc_get_subcategory_terms($terms, $taxonomies, $args) {

	$new_terms = array();
	$hide_cats = tswchc_get_hide_rules();

	if (in_array('product_cat', $taxonomies) && !is_admin()) {

		foreach ($terms as $key => $term) {

			// Check if $term is an object, if not, assume it's an ID or slug and fetch the term
			if (!is_object($term)) {

				$term_str = (string) $term;  // Explicitly cast $term to string

				if (ctype_digit($term_str)) {
					// If $term is a numeric string, treat it as an ID
					$term = get_term('id', (int) $term, 'product_cat');
				} else {
					// Otherwise, treat it as a slug
					$term = get_term_by('slug', $term, 'product_cat');
				}
			}

			// Check if $term is an object
			if (is_object($term) && property_exists($term, 'slug') && !in_array($term->slug, $hide_cats)) {
				$new_terms[] = $term;
			}
		}
		$terms = $new_terms;
	}

	return $terms;
}

/*
* If a related product belongs to any hidden category, it will not be displayed in the related products section.
*/

add_filter('woocommerce_related_products', 'tswchc_exclude_related_products', 999, 3);

function tswchc_exclude_related_products($related_posts, $product_id, $args) {
	$excluded_ids = array();
	$hide_cats = tswchc_get_hide_rules(); // Function that returns an array of category slugs to hide

	// Loop through related posts to check their categories
	foreach ($related_posts as $related_post_id) {
		// Get the categories of the related product
		$product_cats = get_the_terms($related_post_id, 'product_cat');

		// If no categories or any parent category is hidden, exclude the related product
		if (empty($product_cats) || tswchc_has_hidden_parent_category($product_cats, $hide_cats)) {
			$excluded_ids[] = $related_post_id;
		}
	}

	return array_diff($related_posts, $excluded_ids);
}

/*
* If a up-sell product belongs to any hidden category, it will not be displayed in the up-sell products section.
*/

add_filter('woocommerce_product_get_upsell_ids', 'tswchc_custom_upsell_ids', 20, 2);

function tswchc_custom_upsell_ids($upsell_ids, $product) {
	$excluded_ids = array();
	$hide_cats = tswchc_get_hide_rules(); // Function that returns an array of category slugs to hide

	// Loop through upsell product IDs to check their categories
	foreach ($upsell_ids as $related_post_id) {
		// Get the categories of the upsell product
		$product_cats = get_the_terms($related_post_id, 'product_cat');

		// If no categories or any parent category is hidden, exclude the upsell product
		if (empty($product_cats) || tswchc_has_hidden_parent_category($product_cats, $hide_cats)) {
			$excluded_ids[] = $related_post_id;
		}
	}

	return array_diff($upsell_ids, $excluded_ids);
}

/*
* If a cross-sell product belongs to any hidden category, it will not be displayed in the cross-sell products section.
*/

add_filter('woocommerce_product_get_cross_sell_ids', 'tswchc_custom_cross_sell_ids', 20, 2);

function tswchc_custom_cross_sell_ids($cross_sell_ids, $product) {

	$excluded_ids = array();
	$hide_cats = tswchc_get_hide_rules(); // Function that returns an array of category slugs to hide

	// Loop through cross-sell product IDs to check their categories
	foreach ($cross_sell_ids as $related_post_id) {
		// Get the categories of the cross-sell product
		$product_cats = get_the_terms($related_post_id, 'product_cat');

		// If no categories or any parent category is hidden, exclude the cross-sell product
		if (empty($product_cats) || tswchc_has_hidden_parent_category($product_cats, $hide_cats)) {
			$excluded_ids[] = $related_post_id;
		}
	}

	return array_diff($cross_sell_ids, $excluded_ids);
}

/*
* Check if any category or its parent categories are hidden.
*/

function tswchc_has_hidden_parent_category($categories, $hide_cats) {
	foreach ($categories as $category) {
		$parent_id = $category->parent;
		while ($parent_id) {
			$parent_category = get_term($parent_id, 'product_cat');
			if (in_array($parent_category->slug, $hide_cats)) {
				return true; // If any parent category is hidden, return true
			}
			$parent_id = $parent_category->parent;
		}
	}
	return false; // If no hidden parent categories found, return false
}

/*
 * Display a message or redirect users according to the settings applied in the plugin
 */
add_action('wp', 'tswchc_redirect_product_pages', 10);
function tswchc_redirect_product_pages() {

	nocache_headers();

	$redirect_mode = get_option('tswchc_redirect_mode');
	$queried_object = get_queried_object();

	if (!is_admin()) {

		$terms = false;

		if (is_archive()) {

			global $post;

			if (isset($post->ID)) {
				$terms = get_the_terms($post->ID, 'product_cat');
			}
		} elseif (is_product()) {

			if (isset($queried_object->ID)) {
				$terms = get_the_terms($queried_object->ID, 'product_cat');

				if ($queried_object->taxonomy == 'product_cat' && is_array($terms)) {
					$no_terms = true;
					foreach ($terms as $term) {
						if ($queried_object->slug == $term->slug) {
							$no_terms = false;
						}
					}

					if ($no_terms) {
						$terms = false;
					}
				}
			}
		}

		// Redirect or replace content based on terms and mode
		if ((is_product() || is_archive()) && !$terms) {

			if ($redirect_mode === "url") {

				$shop_page_url = esc_attr(get_option('tswchc_redirect_url'));

				if (!$shop_page_url) {
					$shop_page_url = wc_get_page_permalink('shop');
				}

				if (!is_shop()) {
					wp_safe_redirect($shop_page_url);
					exit;
				}
			} elseif ($redirect_mode === "display-message") {
				add_action('template_redirect', 'tswchc_replace_main_content', 1);
			}
		}
	}
}

/*
 * Replaces the main content with a custom message and optional styles.
 * Fetches the custom message and styles from the options, then displays them.
 * Exits the process after rendering the message to prevent further page loading.
 */
function tswchc_replace_main_content() {

	$content = get_option('tswchc_display_custom_message');
	$styles = get_option('tswchc_message_styles');

	get_header();

	echo '<div id="ts-wchc-message">';
	echo $content;
	if ($styles) {
		echo '<style>' . tswchc_css_rules_worker($styles) . '</style>';
	}
	echo '</div>';

	get_footer();
	exit;
}


/*
* Removes hidden products and categories from the WP main query preventing them
*	from being displayed by other plugins
*/
function woocommerce_pre_get_posts($query) {

	if (!is_admin() && $query->is_main_query()) {

		tswchc_hide_products_category($query);
	}
}
add_action('pre_get_posts', 'woocommerce_pre_get_posts', 20);

/****/

/*****/

/**
 * Customizes the "Newest Products" block in WooCommerce by modifying the query to exclude hidden categories.
 * 
 * @param string $block_content The original block content.
 * @param array  $block         The block data.
 * @return string The modified block content with custom query results.
 */

add_filter('render_block', 'tswchc_customize_newest_products_block', 10, 2);

function tswchc_customize_newest_products_block($block_content, $block) {

	// Check if the block is the "Newest Products" block
	if ($block['blockName'] === 'woocommerce/product-new') {

		// Define hidden categories (you can replace this with your own logic)
		$hidden_categories = tswchc_get_hide_rules();

		// Create a custom query to fetch products excluding hidden categories
		$custom_query_args = array(
			'post_type'      => 'product',
			'posts_per_page' => $block['attrs']['columns'] * $block['attrs']['rows'],
			'orderby'        => 'date',
			'order'          => 'DESC',
			'tax_query'      => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $hidden_categories,
					'operator' => 'NOT IN',
				),
			),
		);

		$custom_query = new WP_Query($custom_query_args);

		// Start buffering output
		ob_start();

		// Check if we have posts
		if ($custom_query->have_posts()) {
			echo '<div data-block-name="woocommerce/product-new" data-columns="' . $block['attrs']['columns'] . '" data-rows="' . $block['attrs']['rows'] . '" class="wc-block-grid wp-block-product-new wc-block-product-new has-4-columns tswchc-custom-product-new-block">';
			echo '<ul class="wc-block-grid__products">';
			while ($custom_query->have_posts()) {
				$custom_query->the_post();
				global $product;
?>

				<li class="wc-block-grid__product">
					<a href="<?php the_permalink(); ?>" class="wc-block-grid__product-link">
						<div class="wc-block-grid__product-image">
							<?php
							// Display the product image
							if (has_post_thumbnail()) {
								the_post_thumbnail('woocommerce_thumbnail', ['decoding' => 'async', 'class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail']);
							} else {
								echo '<img decoding="async" width="300" height="300" src="' . wc_placeholder_img_src() . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="' . get_the_title() . '">';
							}
							?>
						</div>
						<div class="wc-block-grid__product-title"><?php the_title(); ?></div>
					</a>
					<div class="wc-block-grid__product-price price">
						<?php
						// Display the product price
						if ($product && $product->get_price()) {
							echo $product->get_price_html();
						} else {
							echo 'Price not available';
						}
						?>
					</div>

					<div class="wp-block-button wc-block-grid__product-add-to-cart">
						<?php echo do_shortcode('[add_to_cart id=' . $product->get_id() . ']'); ?>
					</div>
				</li>

			<?php
			}
			echo '</ul>';
			echo '</div>';
		} else {
			// You can provide your own fallback markup here
			echo '<p>No products available.</p>';
		}
		wp_reset_postdata();
		// Get the buffered content and replace the block content
		$block_content = ob_get_clean();
	}

	return $block_content;
}


/**
 * Customizes the "Cross-Sell Products" block in WooCommerce by modifying the query to exclude hidden categories.
 * 
 * @param string $block_content The original block content.
 * @param array  $block         The block data.
 * @return string The modified block content with custom query results.
 */

add_filter('pre_render_block', 'tswchc_customize_cross_sell_products_block', 10, 2);

function tswchc_customize_cross_sell_products_block($block_content, $block) {

	// Check if the block is the "Cart Cross-Sells" block
	if ($block['blockName'] === 'woocommerce/cart-cross-sells-block') {

		// Retrieve all cross-sell product IDs
		$cross_sell_ids = WC()->cart->get_cross_sells();

		// If there are cross-sell products, filter them based on hidden categories
		if (!empty($cross_sell_ids)) {
			$excluded_ids = array();
			$hide_cats = tswchc_get_hide_rules(); // Function that returns an array of hidden category slugs

			// Loop through cross-sell product IDs to check their categories
			foreach ($cross_sell_ids as $related_post_id) {
				// Get the categories of the cross-sell product
				$product_cats = get_the_terms($related_post_id, 'product_cat');

				// Exclude if no categories or if any parent category is hidden
				if (empty($product_cats) || tswchc_has_hidden_parent_category($product_cats, $hide_cats)) {
					$excluded_ids[] = $related_post_id;
				}
			}

			// Get the final list of cross-sell product IDs after excluding hidden ones
			$filtered_cross_sell_ids = array_diff($cross_sell_ids, $excluded_ids);

			// If there are remaining cross-sell products, query them
			if (!empty($filtered_cross_sell_ids)) {
				$custom_query_args = array(
					'post_type'      => 'product',
					'posts_per_page' => 4,
					'orderby'        => 'post__in', // Maintain the order of cross-sells
					'post__in'       => $filtered_cross_sell_ids, // Only include the filtered cross-sell IDs
				);
				$custom_query = new WP_Query($custom_query_args);
			} else {
				// No valid cross-sell products found
				$custom_query = null;
			}
		} else {
			// No cross-sell products in the cart
			$custom_query = null;
		}

		// Start buffering output
		ob_start();

		// Render custom product grid
		if ($custom_query && $custom_query->have_posts()) {

			echo '<div class="wp-block-woocommerce-cart-cross-sells-block tswchc-custom-cart-cross-sells-block">';

			// Render heading if present in inner blocks
			if (!empty($block['innerBlocks'][0]['innerHTML'])) {
				echo $block['innerBlocks'][0]['innerHTML'];
			}

			echo '<div>';

			while ($custom_query->have_posts()) {
				$custom_query->the_post();
				global $product;
			?>
				<div id="product-<?php echo $product->get_id(); ?>" class="cross-sells-product">
					<div>
						<div class="wc-block-components-product-image wp-block-cart-cross-sells-product__product-image">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('woocommerce_thumbnail', [
										'style' => 'object-fit: cover;',
										'data-testid' => 'product-image',
										'alt' => get_the_title()
									]);
								} else {
									echo '<img style="object-fit: cover;" data-testid="product-image" alt="' . get_the_title() . '" src="' . wc_placeholder_img_src() . '">';
								}
								?>
							</a>
						</div>
						<h3 class="wc-block-components-product-title wp-block-cart-cross-sells-product__product-title">
							<a class="wc-block-components-product-name" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<div class="wc-block-components-product-rating-stars wp-block-cart-cross-sells-product__product-rating">
							<div class="wc-block-components-product-rating-stars__container"></div>
						</div>
						<span class="wc-block-components-product-price wp-block-cart-cross-sells-product__product-price price wc-block-components-product-price">
							<span class="wc-block-formatted-money-amount wc-block-components-formatted-money-amount wc-block-components-product-price__value wp-block-cart-cross-sells-product__product-price__value">
								<?php echo $product->get_price_html(); ?>
							</span>
						</span>
					</div>
					<div class="wp-block-button wc-block-components-product-button wp-block-cart-cross-sells-product__product-add-to-cart">
						<?php echo do_shortcode('[add_to_cart id=' . $product->get_id() . ']'); ?>
					</div>
				</div>

<?php
			}
			echo '</div>';
			echo '</div>';
			echo "<script>
    jQuery(document).ready(function ($) {
        // Initialize products_added array to store added product IDs
        var products_added = [];

        // Function to handle hiding cross-sell products
        function handleAddToCartClick() {
            // Find the closest .cross-sells-product parent and hide it
            var crossSellProduct = $(this).closest('.cross-sells-product');
            if (crossSellProduct.length) {
                crossSellProduct.hide();
            }

            // If no cross-sells products are visible, remove the heading
            if ($('.cross-sells-product:visible').length === 0) {
                $('.wp-block-heading.has-large-font-size').remove();
            }
        }

        // Function to handle removing cart items
        function handleCartItemRemove() {
            var productRow = $(this).closest('tr.wc-block-cart-items__row');

            // Get the product name from the cart row
            var productName = productRow.find('.wc-block-components-product-name').text().trim();

            // Find the corresponding cross-sells-product block based on the product name
            var crossSellBlock = $('.cross-sells-product').filter(function () {
                return $(this).find('.wc-block-components-product-title a').text().trim() === productName;
            });

            // Show the matched cross-sells-product block after 500 ms delay
            if (crossSellBlock.length) {
                setTimeout(function () {
                    crossSellBlock.show();
                }, 500);
            }
        }

        // Delay initialization by 1 second after page load
        setTimeout(function () {
            // Attach click event to add-to-cart buttons in the cross-sells section
            $('.button.wp-element-button.product_type_simple.add_to_cart_button.ajax_add_to_cart')
                .off('click')
                .on('click', handleAddToCartClick);

            // Attach event listener for AJAX complete
            $(document).ajaxComplete(function () {
                // Re-bind the cart item remove link handler after 500 ms
                setTimeout(function () {
                    $('.wc-block-cart-item__remove-link')
                        .off('click')
                        .on('click', handleCartItemRemove);
                }, 500);
            });
        }, 1000); // 1-second delay
    });
</script>";
		} else {
			// echo '<p>No products available.</p>';
			$block_content = "";
		}

		wp_reset_postdata();


		// Replace the block content with custom content
		$block_content = ob_get_clean();
	}

	return $block_content;
}
