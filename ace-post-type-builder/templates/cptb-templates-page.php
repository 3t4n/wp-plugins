<div class="wrap cptb-templates-wrap">
    <div class="cptb-loader"></div>
    <div class="cptb-loader-overlay"></div>
    <div class="cptb-templates-main">
        <div class="cptb-templates-search-content-box">
            <div class="d-flex justify-content-between mb-3">
                <div class="cptb-filter-categories-wrapper">
                        <div class="cptb-filter-category-select">
                            <span class="cptb-filter-category-select-content">All Categories</span>
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                        </div>
                        <ul class="cptb-templates-collections-group">
                            <?php $collections_arr = cptb_get_collections(); ?>
                            <?php foreach ( $collections_arr as $collection ) {
                                
                                if ($collection->handle != 'free' && $collection->handle != 'uncategorized' && $collection->handle != 'bwt-free') { ?>
                                    <li data-value="<?php echo esc_attr($collection->handle); ?>"><?php echo esc_html($collection->title); ?></li>
                                <?php } ?>
                                
                            <?php } ?>
                        </ul>
                    </div>
                <div class="cptb-templates-collections-search">
                    <input type="text" name="cptb-templates-search" autocomplete="off" placeholder="Search Templates...">
                </div>
            </div>
           
            <div class="cptb-filter-content cptb-main-grid row" id="cptb-filter-content">
                <?php $get_filtered_products = cptb_get_filtered_products();
                    if (isset($get_filtered_products['products']) && !empty($get_filtered_products['products'])) {
                        foreach ( $get_filtered_products['products'] as $product ) {

                            $product_obj = $product->node;
                            
                            if (isset($product_obj->inCollection) && !$product_obj->inCollection) {
                                continue;
                            }

                            $bundle_class = $product_obj->handle == 'wp-theme-bundle' ? 'is-bundle' : '';

                            $demo_url = isset($product->node->metafield->value) ? $product->node->metafield->value : '';
                            $product_url = isset($product->node->onlineStoreUrl) ? $product->node->onlineStoreUrl : '';
                            $image_src = isset($product->node->images->edges[0]->node->src) ? $product->node->images->edges[0]->node->src : ''; ?>

                            <div class="cptb-item cptb-filter-free col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                                <div class="cptb-item-inner-box">                              
                                    <div class="cptb-item-preview">
                                        <div class="cptb-item-screenshot">
                                            <img class="<?php echo esc_attr($bundle_class); ?>" src="<?php echo esc_url($image_src); ?>" loading="lazy" alt="<?php echo esc_attr($product_obj->title); ?>">
                                            <div class="cptb-item-overlay">
                                                <?php if ( $demo_url != '' ) { ?>
                                                    <a class="button cptb-item-demo-link" href="<?php echo esc_attr($demo_url); ?>" target="_blank"><?php echo esc_html('Demo'); ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cptb-item-footer">
                                        <div class="cptb-item-footer_meta">
                                            <h3 class="theme-name"><?php echo esc_html($product_obj->title); ?></h3>
                                            <div class="cptb-item-footer-actions">
                                                <a class="button cptb-buy-now" target="_blank" href="<?php echo esc_attr($product_url); ?>" aria-label="Buy Now"><?php echo esc_html('Buy Now'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                ?>
            </div>
        </div>
     
        <?php if (isset($get_filtered_products['pagination']->hasNextPage) && $get_filtered_products['pagination']->hasNextPage) { ?>
            <input type="hidden" name="cptb-end-cursor" value="<?php echo esc_attr(isset($get_filtered_products['pagination']->endCursor) ? $get_filtered_products['pagination']->endCursor : '') ?>">
        <?php } ?>
    </div>
</div>