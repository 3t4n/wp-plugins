<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="tumaz-direct-container">

<div class='wrap'>
    <div class="tablenav bottom">

        <div class="alignleft actions bulkactions"></div>
        <div class="alignleft actions"></div>

        <div class='tablenav-pages'>

            <span class="displaying-num"><?php echo wp_kses_post($all_orders_count);?> items</span>
            

            <span class='pagination-links'>
                <?php if ($current_page > 1) : ?>

                    <a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">
                        <span class="tablenav-pages-navspan button" aria-hidden="true">&lsaquo;</span>
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">
                        <span class="tablenav-pages-navspan button" aria-hidden="true">&laquo;</span>
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">
                        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&lsaquo;</span>
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">
                        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&laquo;</span>
                    </a>
                <?php endif; ?>

                <?php echo esc_html($current_page); ?> of <?php echo esc_html($total_pages); ?>

                <?php if ($current_page < $total_pages) : ?>

                    <a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">
                        <span class="next-page button" aria-hidden="true">&rsaquo;</span>
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('paged', $total_pages)); ?>">
                        <span class="last-page button" aria-hidden="true">&raquo;</span>
                    </a>
                <?php else : ?>

                    <a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">
                        <span class="next-page button disabled" aria-hidden="true">&rsaquo;</span>
                    </a>

                    <a href="<?php echo esc_url(add_query_arg('paged', $total_pages)); ?>">
                        <span class="last-page button disabled" aria-hidden="true">&raquo;</span>
                    </a>
                <?php endif; ?>
            </span>

        </div>

        <br class="clear" />
    </div>
</div>





<div id="orderDetailsModal" class="digages_popup">
    <div class="digagesmaincontainer">  
      
        <div class="digages_popup-content digagesmaincenter"> 
        
        <div class="modhe">  
                    <div class="container text-center">
                        <div class="rowt">
                            <div class="colt-6 text-start mtttp">
                                <span class="xcsse" id="staticBackdropLabel"><?php echo esc_html__('Payment Details', 'direct-payments-for-woocommerce'); ?></span>
                            </div>
                            <div class="colt-5 text-end mtttp text-capitalize">
                                <div id="orderhead"></div>
                            </div>
                            <div class="colt-1t xcs">
                                <span class="digages_close"><i class="bi bi-x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                 
<div class="digages-container digages-body-pad"> 
    <div class="digages-text-start digages-desktop-span-12 digages-tab-span-12 digages-mobile-span-12">

                    <div id="orderDetails"></div>
                </div>
                </div>

                <div class="tumafontbtm"></div>

                                 
<div class="digages-container digages-btm-pad"> 
    <div class="digages-text-start digages-desktop-span-12 digages-tab-span-12 digages-mobile-span-12">

                <div class="modal-footer">
                    <div class="tumaz_des_foot">
                        <span class="tumaz_makas"><?php echo esc_html__('Make payment as', 'direct-payments-for-woocommerce'); ?><span class="d-sm-none"><br/><br/></span></span>
                        <span>
                            <button type="button" class="modcnn2" id="confirmOrderBtn">
                                <i class="bi bi-check"></i> <?php echo esc_html__('Confirmed', 'direct-payments-for-woocommerce'); ?>
                            </button>
                        </span>
                        <span>
                            <button type="button" class="modcnl2" id="cancelOrderBtn">
                                <i class="bi bi-x"></i> <?php echo esc_html__('Cancelled', 'direct-payments-for-woocommerce'); ?>
                            </button>
                        </span>
                        <span class="tumazz_closse2 d-sm-none" data-bs-dismiss="modal" aria-label="Close"><?php echo esc_html__('Close', 'direct-payments-for-woocommerce'); ?></span>
                    </div>
                </div>

                </div>
                </div>

    </div>
</div>
                </div>
                </div>