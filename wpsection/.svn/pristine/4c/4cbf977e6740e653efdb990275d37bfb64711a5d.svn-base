<?php
/*
wps_product_tab Style-1
*/
$templatePartDir = esc_attr( __DIR__ . '/../template_part/' );
$unique_id_tab_one = 'wps_tab_one_' . uniqid();

echo '<script>
    window["hoverSliderOptions"] = { preloadImages: true };
    jQuery(document).ready(function($) {
        // Function to show loading spinner
        function showLoadingSpinner() {
            $(" .' . esc_js( $unique_id_tab_one ) . '  .tab-content .active .product-block-spining").addClass("loading");
        }

        // Function to hide loading spinner
        function hideLoadingSpinner() {
            $(".' . esc_js( $unique_id_tab_one ) . '  .tab-content .product-block-spining").removeClass("loading");
        }

        // Swiper initialization
        var swiper = new Swiper(".' . esc_js( $unique_id_tab_one ) . ' .mySwiper", {
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".' . esc_js( $unique_id_tab_one ) . ' .swiper-pagination",
                clickable: true,
            },
        });

        // Event listener for tab activation
        $(" .' . esc_js( $unique_id_tab_one ) . ' .nav-link").on("click", function() {
            showLoadingSpinner(); // Show loading spinner when a tab is clicked
            // Set a timeout to hide the loading spinner after 5 seconds (adjust as needed)
            setTimeout(function() {
                hideLoadingSpinner();
            }, 500); 
        });

    });
</script>';
?>


<section class="wps_product_tab_width mr_shop mr_products_one produt_section wps_tab_one <?php echo esc_attr( $unique_id_tab_one ); ?>">

        <div class="row">

            <?php
            if ('2' === $settings['tab_left_right']) {
                $colClass = 'col-md-12';
            } else {
                $colClass = 'col-md-12 col-lg-' . esc_attr($settings['grid_width_x_tab']);
                $styleAttribute = 'style="order:' . esc_attr($settings['tab_left_right']) . '"';
            }
            ?>

   <div class="<?php echo esc_attr( $colClass ); ?>" <?php echo isset( $styleAttribute ) ? wp_kses_post( $styleAttribute ) : ''; ?>>

	
                <!-- Your content goes here -->
                <div class="wps_tab_container">
                    <ul class="nav nav-tabs tab-title wps_tab_ul" role="tablist">
                    
						
<?php
$i = 1;
foreach ($settings['repeat'] as $tab) {
    $this->tabid[$tab['_id']] = $tab['_id'] . wp_rand(1000, 9999);
    $active_btn = ($i == 1) ? 'active' : '';

?>				
                          
						
  <li class="wps_tab_button nav-item">
            <a class="nav-link <?php echo esc_attr($active_btn); ?>" href="#tab-<?php echo esc_attr($this->tabid[$tab['_id']]); ?>" role="tab" data-bs-toggle="tab"><?php echo esc_html($tab['tab_title']); ?></a>
        </li>						
						
                        <?php $i++;
                        } ?>
                    </ul>
                </div>
            </div>

            <?php
            if ('2' === $settings['tab_left_right']) {
                $colClassTwo = 'col-md-12';
            } else {
                $colClassTwo = 'col-md-12 col-lg-' . esc_attr(12 - $settings['grid_width_x_tab']);
            }
            ?>

				
	   <div class="<?php echo esc_attr( $colClassTwo ); ?>">			
                <div class="tab-content">
                    <?php
                    $i = 1;
                    foreach ($settings['repeat'] as $tab) {
                        $product_grid_type = $tab['product_grid_type'];
                        $product_per_page  = $tab['product_per_page'];
                        $product_order     = $tab['product_order'];
                        $product_order_by  = $tab['product_order_by'];
                        $catagory_name     = $tab['catagory_name'];

                        if ($tab['block_column'] == '10') {
                            $columns_markup = ' mr_column_10 ';
                        } elseif ($tab['block_column'] == '9') {
                            $columns_markup = ' mr_column_9 ';
                        } elseif ($tab['block_column'] == '8') {
                            $columns_markup = ' mr_column_8 ';
                        } elseif ($tab['block_column'] == '7') {
                            $columns_markup = ' mr_column_7 ';
                        } elseif ($tab['block_column'] == '6') {
                            $columns_markup = 'col-lg-2 ';
                        } elseif ($tab['block_column'] == '5') {
                            $columns_markup = ' mr_column_5 ';
                        } elseif ($tab['block_column'] == '4') {
                            $columns_markup = 'col-lg-3 ';
                        } elseif ($tab['block_column'] == '3') {
                            $columns_markup = 'col-lg-4 ';
                        } elseif ($tab['block_column'] == '2') {
                            $columns_markup = 'col-lg-6 ';
                        } elseif ($tab['block_column'] == '1') {
                            $columns_markup = 'col-lg-12 ';
                        }
						
						
						

   
         if ($tab['block_column_tab'] == '6') {
                        $columns_markup_tab = ' col-md-2';
                    }

         elseif ($tab['block_column_tab'] == '4') {
                        $columns_markup_tab = ' col-md-3 ';
                    }   
        elseif ($tab['block_column_tab'] == '3') {
                        $columns_markup_tab = ' col-md-4';
                    }
         elseif ($tab['block_column_tab'] == '2') {
                        $columns_markup_tab = ' col-md-6';
                    } 
         elseif ($tab['block_column_tab'] == '1') {
                        $columns_markup_tab = ' col-md-12';
                    }
						
						
						
//mobile column
       if ($tab['block_column_mobile'] == '6') {
                        $columns_markup_mobile = ' col-2';
                    }

         elseif ($tab['block_column_mobile'] == '4') {
                        $columns_markup_mobile = ' col-3 ';
                    }   
        elseif ($tab['block_column_mobile'] == '3') {
                        $columns_markup_mobile = ' col-4';
                    }
         elseif ($tab['block_column_mobile'] == '2') {
                        $columns_markup_mobile = ' col-6';
                    } 
         elseif ($tab['block_column_mobile'] == '1') {
                        $columns_markup_mobile = ' col-12';
                    }
						
						
						

	$new_markup = $columns_markup . ' ' . $columns_markup_tab . ' ' . $columns_markup_mobile ;				
						

                        $active_tab = '';
                        if ($i == 1) {
                            $active_tab = 'active';
                        }
                    ?>
<div role="tabpanel" class="tab-pane show <?php echo esc_attr( $active_tab ); ?>  animated fadeIn" id="tab-<?php echo esc_attr( $this->tabid[$tab['_id']] ); ?>">	                        

                            <div class="row">
                                <?php
                                $args = array();
                                if ($product_grid_type == 'sale_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'meta_query'     => array(
                                            'relation' => 'OR',
                                            array( // Simple products type
                                                'key'     => '_sale_price',
                                                'value'   => 0,
                                                'compare' => '>',
                                                'type'    => 'numeric',
                                            ),
                                            array( // Variable products type
                                                'key'     => '_min_variation_sale_price',
                                                'value'   => 0,
                                                'compare' => '>',
                                                'type'    => 'numeric',
                                            ),
                                        ),
                                    );
                                } elseif ($product_grid_type == 'best_selling_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'meta_key'       => 'total_sales',
                                        'orderby'        => 'meta_value_num',
                                        'posts_per_page' => $product_per_page,
                                    );
                                } elseif ($product_grid_type == 'recent_products') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'orderby'        => $product_order,
                                        'order'          => $product_order_by,
                                    );
                                } elseif ($product_grid_type == 'featured_products') {
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
                                    );
                                } elseif ($product_grid_type == 'top_rated_products') {
                                    $args = array(
                                        'posts_per_page' => $product_per_page,
                                        'no_found_rows'  => 1,
                                        'post_status'    => 'publish',
                                        'post_type'      => 'product',
                                        'meta_key'       => '_wc_average_rating',
                                        'orderby'        => $product_order_by,
                                        'order'          => $product_order,
                                        'meta_query'     => WC()->query->get_meta_query(),
                                        'tax_query'      => WC()->query->get_tax_query(),
                                    );
                                } elseif ($product_grid_type == 'product_category') {
                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => $product_per_page,
                                        'product_cat'    => $catagory_name,
                                        'orderby'        => $product_order_by,
                                        'order'          => $product_order,
                                    );
                                }

                                $query = new \WP_Query($args);

                                if ($query->have_posts()) {
                                    $i     = 1;
                                    $count = 1;
                                    $flag  = 0;
                                ?>
                                    <!-- While Loop Area -->
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                        <?php global $post, $product; ?>
                                        <!-- Product Column Start if WHILE LOOP -->
                          
											
				 <div class="wps_product_column <?php echo esc_attr( $new_markup ); ?> masonry-item all">							
                                            <div class="mr_product_block product-block_hr_001">
                                                <!-- Global Settings -->
                                                <?php
                                                require $templatePartDir . 'hook.php';
                                                $i++;
                                                ?>
                                                <div <?php wc_product_class(); ?>>
                                                    <!-- Product Style Start -->
                                   <div class="mr_style_one wps_product_block_one product-block-spining">
		
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>									   
<div class="row">                                   																		
<div class="col-md-6 col-lg-<?php echo esc_attr($settings['grid_width_x']); ?> 	 <?php echo ('1' === $settings['grid_order']) ? 'wps_grid_left' : ' '; ?>">	
<?php } ?> 	
									   
									   
									   
                                                        <!-- Thumbnail Area -->                        

<?php
if (isset($settings['show_product_x_thumbnail']) && $settings['show_product_x_thumbnail'] && !empty(get_the_post_thumbnail())) {

?>


                                                            <div class="wps_thumbnail_area wps_slide_thumb">
                                                                <?php
                                                                require $templatePartDir . 'hot_offer.php';
                                                                require $templatePartDir . 'special_offer.php';
                                                                require $templatePartDir . 'thumbnail.php';
                                                                ?>
                                                            </div><!-- Thumbnail area div -->
                                                            <?php require $templatePartDir . 'product_overlay.php'; ?>
                                                            
                                                        <?php } ?>
                                                        <!-- End Thumbnail Area -->
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>		
</div>	
 <div class="col-md-6 col-lg-<?php echo esc_attr(12 - $settings['grid_width_x']); ?> wps_grid-<?php echo esc_attr($settings['grid_order']); ?>">
<?php } ?> 		 
	 
		
                                                        <!-- Product Bottom Area -->
														
<?php  if ( 'top' === $settings['wps_columns_expand'] ) { ?>
  <div class="wps_hide_two_block">
<?php } ?> 
	  
	
                                                        <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                                            <?php
                                                            // Include various template parts
                                                            require $templatePartDir . 'title.php';
                                                            require $templatePartDir . 'rating.php';
                                                            require $templatePartDir . 'price.php';
                                                            require $templatePartDir . 'progress.php';
                                                            require $templatePartDir . 'instock.php';
                                                            require $templatePartDir . 'offer_countdown.php';
															require $templatePartDir . 'offer_text.php';
                                                            require $templatePartDir . 'category.php';
                                                            require $templatePartDir . 'feature_addtocart.php';
                                                            ?>
                                                        </div>
                                                        <!-- End Product Bottom Area -->
 <?php  if ( 'top' === $settings['wps_columns_expand'] ) { ?>
  </div>
<?php } ?>	
	 
<?php  if ( 'grid' === $settings['tab_thumbnail_view'] ) { ?>	
	</div>    
	</div><!-- End grid row -->
<?php } ?>										   
									   
                                                    <!-- End Product Style One -->
													
													 </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Column -->
                                    <?php endwhile; ?>

 
                                <?php } ?>
                            </div>
                        </div>
                        <?php $i++;
                    } ?>
                </div>
		   
		 
            </div>
        </div>
   
</section>
