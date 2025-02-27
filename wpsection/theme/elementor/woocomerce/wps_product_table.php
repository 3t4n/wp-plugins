<?php

use Elementor\Widget_Base;
use Elementor\Plugin;

if (class_exists('woocommerce')) {
    class WPSection_WPS_Product_Table_Widget extends Widget_Base
    {
        public function get_name()
        {
            return 'wpsection_wps_product_table';
        }

        public function get_title()
        {
            return __('Products Table', 'wpsection');
        }

        public function get_icon()
        {
            return 'eicon-table';
        }

        public function get_keywords()
        {
            return ['wpsection', 'product'];
        }

        public function get_categories()
        {
            return [  'wpsection_shop' ];
        }

        protected function _register_controls()
        {
            // Add your controls here
            $this->start_controls_section(
                'wpsection_wps_product_table',
                [
                    'label' => esc_html__('General Settings', 'wpsection'),
                ]
            );

     
    $this->add_control(
            'wps_columns',
            array(
                'label' => __( 'Columns Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
                    '5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
                    '7' => __( '7 Columns', 'wpsection' ),
                    '8' => __( '8 Columns', 'wpsection' ),
                    '9' => __( '9 Columns', 'wpsection' ),
                    '10' => __( '10 Columns', 'wpsection' ),
                ],
            )
        );

    $this->add_control(
            'product_grid_type',
            array(
                'label'   => esc_html__( 'Products Type', 'wpsection' ),
                'type'    =>  \Elementor\Controls_Manager::SELECT,
                'default' => 'recent_products',
                'options' => array(
                    'featured_products'     => esc_html__( 'Featured Products', 'wpsection' ),
                    'sale_products'         => esc_html__( 'Sale Products', 'wpsection' ),
                    'best_selling_products' => esc_html__( 'Best Selling Products', 'wpsection' ),
                    'recent_products'       => esc_html__( 'Recent Products', 'wpsection' ),
                    'top_rated_products'    => esc_html__( 'Top Rated Products', 'wpsection' ),
                    'product_category'      => esc_html__( 'Product Category', 'wpsection' ),
                ),
            )
        );



 $this->add_control(
            'query_category',
            array(
                'label' => __( 'Select Category', 'wpsection' ),
                'condition' => array('product_grid_type' => 'product_category'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => mr_shop_product_cat_list(), // Connect the function to the 'options' parameter
                'default' => ' ', // Set the default value to an empty string
                'description' => esc_html__( 'All Categories are Selected. Click Cross to Select Again', 'wpsection' ),
            )
        );


    

      $this->add_control(
            'query_number',
              array(
            
                'label'   => esc_html__( 'Number of post', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            )
        );
   
     $this->add_control(
            'query_orderby',
          array(
                'label'   => esc_html__( 'Order By', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'wpsection' ),
                    'title'      => esc_html__( 'Title', 'wpsection' ),
                    'menu_order' => esc_html__( 'Menu Order', 'wpsection' ),
                    'rand'       => esc_html__( 'Random', 'wpsection' ),
                ),
            )
        );

   $this->add_control(
            'query_order',
            array(
                'label'   => esc_html__( 'Order', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'wpsection' ),
                    'ASC'  => esc_html__( 'ASC', 'wpsection' ),
                ),
                'separator' => 'after'
            )
        );



            $this->add_control(
                'pagination',
                [
                    'label'   => __('Enable Pagination', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_sku',
                [
                    'label'   => __('Show SKU', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_title',
                [
                    'label'   => __('Show Title', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_thumbnail',
                [
                    'label'   => __('Show Thumbnail', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_color',
                [
                    'label'   => __('Show Color', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_size',
                [
                    'label'   => __('Show Size', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_stock',
                [
                    'label'   => __('Show Stock', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_price',
                [
                    'label'   => __('Show Price', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_discount',
                [
                    'label'   => __('Show Discount', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_category',
                [
                    'label'   => __('Show Category', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_tags',
                [
                    'label'   => __('Show Tags', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );
$this->add_control(
    'show_rating',
    [
        'label'   => __('Show Rating', 'wpsection'),
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',
    ]
);



            $this->end_controls_section();
        }

        protected function render()
        {

echo '
<script>
    window["hoverSliderOptions"] = { preloadImages: true };

    jQuery(document).ready(function($) { 
        //put the js code under this line 
        document.addEventListener("DOMContentLoaded", function () {
            var addToCartButtons = document.querySelectorAll(".wps_add_to_cart");
            var selectProductCheckboxes = document.querySelectorAll(".wps_select_product");
            var addAllToCartButton = document.getElementById("wps_add_all_to_cart");

            addToCartButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    var productId = button.getAttribute("data-product-id");
                    // Call a function to add the product to the cart
                    addToCart(productId);
                });
            });

            selectProductCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    // You can implement logic to track selected products here
                });
            });

            addAllToCartButton.addEventListener("click", function () {
                // Call a function to add all selected products to the cart
                addAllToCart();
            });

            function addToCart(productId) {
                // Implement logic to add the product with the given ID to the cart using AJAX or other methods
                console.log("Adding product to cart:", productId);
            }

            function addAllToCart() {
                // Implement logic to add all selected products to the cart using AJAX or other methods
                console.log("Adding all selected products to cart");
            }
        });
        //put the code above the line 
    });
</script>
';




            
//require 'extended_array/render_settings.php';   



        global $product;
        global $wp_query;
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');       
        $paged = get_query_var('paged');
        //$paged = wpsection_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-wpsection' );
    

     // Call the setting and make variable 
        $product_per_page = $settings['query_number'];
        $product_order_by = $settings['query_orderby'];
        $product_order    = $settings['query_order'];
        $product_grid_type = $settings['product_grid_type'];
        $query_category = $settings['query_category'];
      // Argument for $args 
        if ( $product_grid_type == 'sale_products' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'meta_query'     => array(
                    'relation' => 'OR',
                    array(// Simple products type
                        'key'     => '_sale_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'numeric',
                    ),
                    array(// Variable products type
                        'key'     => '_min_variation_sale_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'numeric',
                    ),
                ),
                'orderby'        => $product_order_by,
                'order'          => $product_order,
            );
        }
        if ( $product_grid_type == 'best_selling_products' ) {
            $args = array(
                'post_type'      => 'product',
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'posts_per_page' => $product_per_page,
                'order'          => $product_order,
            );
        }
        if ( $product_grid_type == 'recent_products' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'orderby'        => $product_order_by,
                'order'          => $product_order,
            );
        }
        if ( $product_grid_type == 'featured_products' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
                'orderby'        => $product_order_by,
                'order'          => $product_order,
            );

        }
        if ( $product_grid_type == 'top_rated_products' ) {
            $args = array(
                'posts_per_page' => $product_per_page,
                'no_found_rows'  => 1,
                'post_status'    => 'publish',
                'post_type'      => 'product',
                'meta_key'       => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'order'          => $product_order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
        }
        if ( $product_grid_type == 'product_category' ) {
     
                $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => $product_per_page,
                        'orderby' => $product_order_by,
                        'order' => $product_order,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $query_category,
                                'operator' => 'IN',
                            ),
                        ),
                    );
               
        }
        // End of args

          



            $query = new \WP_Query($args);

            if ($query->have_posts()) {
                echo '<table class="wps_table_custom">';
                echo '<thead>';
                echo '<tr>';

                if ($settings['show_title'] === 'yes') {
                    echo '<th>Title</th>';
                }

                if ($settings['show_thumbnail'] === 'yes') {
                    echo '<th>Thumbnail</th>';
                }

                if ($settings['show_color'] === 'yes') {
                    echo '<th>Color</th>';
                }

                if ($settings['show_size'] === 'yes') {
                    echo '<th>Size</th>';
                }

                if ($settings['show_stock'] === 'yes') {
                    echo '<th>Stock</th>';
                }

                if ($settings['show_price'] === 'yes') {
                    echo '<th>Price</th>';
                }

                if ($settings['show_discount'] === 'yes') {
                    echo '<th>Discount</th>';
                }

                if ($settings['show_category'] === 'yes') {
                    echo '<th>Category</th>';
                }

                if ($settings['show_tags'] === 'yes') {
                    echo '<th>Tags</th>';
                }

           

               if ($settings['show_rating'] === 'yes') {
                    echo '<th>Rating</th>';
                }

                if ($settings['show_sku'] === 'yes') {
                    echo '<th>SKU</th>';
                }

                echo '<th>Available In Stock</th>';
                echo '<th>Action</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>'; ?>

<?php
while ($query->have_posts()) {
    $query->the_post();
    $product = wc_get_product(get_the_ID());

    echo '<tr>';

    if ($settings['show_title'] === 'yes') {
        echo '<td><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></td>';
    }

    if ($settings['show_thumbnail'] === 'yes') {
        echo '<td>' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</td>';
    }

    if ($settings['show_color'] === 'yes') {
        echo '<td>';
        // Add a dropdown/select for color
        $color_attribute = $product->get_attribute('pa_color');
        if ($color_attribute) {
            echo '<select class="wps_color_select">';
            $colors = explode('|', $color_attribute);
            foreach ($colors as $color) {
                echo '<option value="' . esc_attr(sanitize_title($color)) . '">' . esc_html($color) . '</option>';
            }
            echo '</select>';
        }
        echo '</td>';
    }

    if ($settings['show_size'] === 'yes') {
        echo '<td>';
        // Add a dropdown/select for size
        $size_attribute = $product->get_attribute('pa_size');
        if ($size_attribute) {
            echo '<select class="wps_size_select">';
            $sizes = explode('|', $size_attribute);
            foreach ($sizes as $size) {
                echo '<option value="' . esc_attr(sanitize_title($size)) . '">' . esc_html($size) . '</option>';
            }
            echo '</select>';
        }
        echo '</td>';
    }

	
	if ( isset($settings['show_stock']) && $settings['show_stock'] === 'yes' ) {
    echo '<td>' . esc_html( $product->get_stock_quantity() ) . '</td>';
}

if ( isset($settings['show_price']) && $settings['show_price'] === 'yes' ) {
    echo '<td>' . wp_kses_post( wc_price( $product->get_price() ) ) . '</td>';
}

if ( isset($settings['show_discount']) && $settings['show_discount'] === 'yes' ) {
    echo '<td>' . wp_kses_post( wc_price( $product->get_sale_price() ) ) . '</td>';
}

	
	


    if ($settings['show_category'] === 'yes') {
        $product_categories = get_the_terms(get_the_ID(), 'product_cat');
        echo '<td>' . (is_array($product_categories) && !empty($product_categories) ? esc_html($product_categories[0]->name) : '') . '</td>';
    }

    if ($settings['show_tags'] === 'yes') {
        $product_tags = get_the_terms(get_the_ID(), 'product_tag');
        echo '<td>' . (is_array($product_tags) && !empty($product_tags) ? esc_html($product_tags[0]->name) : '') . '</td>';
    }

    if ($settings['show_rating'] === 'yes') {
        $average_rating = $product->get_average_rating();

        echo '<td>';
       if ($average_rating > 0) {
    $rating_html = wc_get_rating_html($average_rating); // Assuming this function returns sanitized HTML
    $rating_text = esc_html(sprintf('%s out of 5', $average_rating)); // Assuming the maximum rating is 5
    echo wp_kses_post(str_replace('Rated ', '', $rating_html)); // Sanitize and output the HTML after removing "Rated "
} else {
    echo esc_html__('No rating', 'wpsection'); // Escaping for the fallback text
}

        echo '</td>';
    }

    if ($settings['show_sku'] === 'yes') {
        echo '<td>' . esc_html($product->get_sku()) . '</td>';
    }

    echo '<td>' . esc_html($product->get_stock_quantity()) . '</td>';

    echo '<td>
            <button class="wps_add_to_cart" data-product-id="' . esc_attr(get_the_ID()) . '">Add to Cart</button>
            <input type="checkbox" class="wps_select_product" data-product-id="' . esc_attr(get_the_ID()) . '">
        </td>';

    echo '</tr>';
}
?>

               
<?php
                echo '</tbody></table>';


                // Add JavaScript for handling add to cart and remove from list
                ?>
          
                <?php

                wp_reset_postdata();
            }
        }

        private function render_pagination($max_num_pages)
     
		
 {
    echo '<div class="wps_pagination">';
    echo wp_kses_post( paginate_links( array(
        'total' => $max_num_pages,
    ) ) );
    echo '</div>';
}
		
		
		
		
    }

    Plugin::instance()->widgets_manager->register_widget_type(new WPSection_WPS_Product_Table_Widget());
}
