   <?php 

        global $product;
        global $wp_query;
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');





 


        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-wpsection' );
    
    //Column Settings Area   

        if($settings['wps_columns'] == '10') {
                        $columns_markup = ' mr_column_10 ';
                    }      
         else if($settings['wps_columns'] == '9') {
                        $columns_markup = ' mr_column_9 ';
                    } 
        else if($settings['wps_columns'] == '8') {
                        $columns_markup = ' mr_column_8 ';
                    }   
         else if($settings['wps_columns'] == '7') {
                        $columns_markup = ' mr_column_7 ';
                    } 
        else if($settings['wps_columns'] == '6') {
                        $columns_markup = 'col-lg-2 ';
                    }
        else if($settings['wps_columns'] == '5') {
                        $columns_markup = ' mr_column_5 ';
                    } 
        else if($settings['wps_columns'] == '4') {
                        $columns_markup = 'col-lg-3 ';
                    }   
         else if($settings['wps_columns'] == '3') {
                        $columns_markup = 'col-lg-4 ';
                    }
        else if($settings['wps_columns'] == '2') {
                        $columns_markup = 'col-lg-6 ';
                    } 
        else if($settings['wps_columns'] == '1') {
                        $columns_markup = 'col-lg-12 ';
                    }

// Tab Column 

  //Column Settings Area   

        if($settings['wps_columns_tab'] == '10') {
                        $columns_markup_tab = ' mr_column_10 ';
                    }      
         else if($settings['wps_columns_tab'] == '9') {
                        $columns_markup_tab = ' mr_column_9 ';
                    } 
        else if($settings['wps_columns_tab'] == '8') {
                        $columns_markup_tab = ' mr_column_8 ';
                    }   
         else if($settings['wps_columns_tab'] == '7') {
                        $columns_markup_tab = ' mr_column_7 ';
                    } 
        else if($settings['wps_columns_tab'] == '6') {
                        $columns_markup_tab = ' col-md-2';
                    }
        else if($settings['wps_columns_tab'] == '5') {
                        $columns_markup_tab = ' mr_column_5 ';
                    } 
        else if($settings['wps_columns_tab'] == '4') {
                        $columns_markup_tab = ' col-md-3 ';
                    }   
         else if($settings['wps_columns_tab'] == '3') {
                        $columns_markup_tab = ' col-md-4';
                    }
        else if($settings['wps_columns_tab'] == '2') {
                        $columns_markup_tab = ' col-md-6';
                    } 
        else if($settings['wps_columns_tab'] == '1') {
                        $columns_markup_tab = ' col-md-12';
                    }


// Mobile Column 
   if($settings['wps_columns_mobile'] == '6') {
                        $columns_markup_mobile = ' col-2';
                    }
     
        else if($settings['wps_columns_mobile'] == '4') {
                        $columns_markup_mobile = ' col-3 ';
                    }   
         else if($settings['wps_columns_mobile'] == '3') {
                        $columns_markup_mobile = ' col-4';
                    }
        else if($settings['wps_columns_mobile'] == '2') {
                        $columns_markup_mobile = ' col-6';
                    } 
        else if($settings['wps_columns_mobile'] == '1') {
                        $columns_markup_mobile = ' col-12';
                    }


$columns_markup_print = $columns_markup . ' ' . $columns_markup_tab . ' ' . $columns_markup_mobile ;



 // Get the current page number
    //$paged = max(1, get_query_var('paged', 1));
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;


// Get settings variables
    $product_per_page   = $settings['query_number'];
    $product_order_by   = $settings['query_orderby'];
    $product_order      = $settings['query_order'];
    $product_grid_type  = $settings['product_grid_type'];
    $query_category     = $settings['query_category'];
    $query_category_2   = $settings['query_category_2'];

    // Set default arguments for recent products
    $args = [
        'posts_per_page' => $product_per_page,
        'paged' => $paged,
        'post_type'      => 'product',
        'orderby'        => $product_order_by,
        'order'          => $product_order,
    ];

    // Check if a category is selected
    if ($settings['filter_category'] == 'multi_cat' && !empty($query_category)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Use slug instead of term_id
                'terms'    => $query_category,
                'operator' => 'IN',
            ],
        ];
    } elseif ($settings['filter_category'] == 'single_cat' && !empty($query_category_2)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Use slug instead of term_id
                'terms'    => $query_category_2,
                'operator' => 'IN',
            ],
        ];
    }




// Check if in stock or out of stock filtering is selected
if ($product_grid_type == 'in_stock') {    
    $args['meta_query'][] = array(
        'key'     => '_stock_status',
        'value'   => 'instock',
        'compare' => '=',
    );
} elseif ($product_grid_type == 'out_of_stock') {
    $args['meta_query'][] = array(
        'key'     => '_stock_status',
        'value'   => 'outofstock',
        'compare' => '=',
    );
}

// Modify arguments based on the product grid type
if ($product_grid_type == 'best_selling_products') {
    $args['meta_key'] = 'total_sales';
    $args['orderby']  = 'meta_value_num';
} elseif ($product_grid_type == 'featured_products') {
    $args['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
    );
} elseif ($product_grid_type == 'top_rated_products') {
    $args['meta_key']    = '_wc_average_rating';
    $args['orderby']     = 'meta_value_num';
    $args['no_found_rows'] = true;
}

//Tags
elseif ($product_grid_type == 'product_tag') {
    // Logic for product tag filtering
    if ($settings['filter_tag'] == 'multi_tag') {
        $args['tax_query'][] = array(
            'taxonomy' => 'product_tag',
            'field'    => 'term_id',
            'terms'    => $settings['query_tag'],
            'operator' => 'IN',
        );
    } elseif ($settings['filter_tag'] == 'single_tag') {
        $args['tax_query'][] = array(
            'taxonomy' => 'product_tag',
            'field'    => 'term_id',
            'terms'    => $settings['query_tag_2'],
            'operator' => 'IN',
        );
    }
}

//Price
elseif ($product_grid_type == 'price_filter') {
    // Logic for price filtering
    if ($settings['query_price'] == 'product_price_low_to_high') {
        $args['orderby']  = 'meta_value_num';
        $args['meta_key'] = '_price';
        $args['order']    = 'ASC';
    } elseif ($settings['query_price'] == 'product_price_high_to_low') {
        $args['orderby']  = 'meta_value_num';
        $args['meta_key'] = '_price';
        $args['order']    = 'DESC';
    }
}


$enable_pagination = $settings['wps_block_pagination'] === 'yes';
