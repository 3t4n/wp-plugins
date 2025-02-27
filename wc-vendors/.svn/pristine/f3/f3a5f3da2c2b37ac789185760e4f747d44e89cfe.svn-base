<?php
/**
 * Order Table Main Actions
 *
 * This file is used to add the table actions before and after a table
 */

use WC_Vendors\Classes\Front\WCV_Form_Helper;
?>

<div class="wcv_dashboard_table_header wcv_actions wcv-cols-group horizontal-gutters wcv-order-header">
    <div class="all-80 small-100">
        <form method="post" action="" class="wcv-form wcv-form-exclude">
            <?php


            // Start Date.
            WCV_Form_Helper::input(
                apply_filters(
                    'wcv_order_start_date_input',
                    array(
                        'id'                => '_wcv_order_start_date_input',
                        'label'             => __( 'Start date', 'wc-vendors' ),
                        'class'             => 'wcv-datepicker-dashboard-filter no_limit wcv-datepicker wcv-init-picker',
                        'value'             => gmdate( 'Y-m-d', $this->get_start_date() ),
                        'placeholder'       => 'YYYY-MM-DD',
                        'wrapper_start'     => '<div class="all-66 small-100"><div class="wcv-cols-group wcv-horizontal-gutters"><div class="all-33 small-100">',
                        'wrapper_end'       => '</div>',
                        'custom_attributes' => array(
                            'data-default' => gmdate( 'Y-m-d', $this->get_default_start_date() ),
                            'maxlenth'     => '10',
                            'pattern'      => '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
                        ),
                    )
                )
            );

            // End Date.
            WCV_Form_Helper::input(
                apply_filters(
                    'wcv_order_end_date_input',
                    array(
                        'id'                => '_wcv_order_end_date_input',
                        'label'             => __( 'End date', 'wc-vendors' ),
                        'class'             => 'wcv-datepicker-dashboard-filter no_limit wcv-datepicker wcv-init-picker',
                        'value'             => gmdate( 'Y-m-d', $this->get_end_date() ),
                        'placeholder'       => 'YYYY-MM-DD',
                        'wrapper_start'     => '<div class="all-33 small-100">',
                        'wrapper_end'       => '</div>',
                        'custom_attributes' => array(
                            'data-default' => gmdate( 'Y-m-d', strtotime( apply_filters( 'wcv_order_end_date', 'now' ) ) ),
                            'maxlenth'     => '10',
                            'pattern'      => '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
                        ),
                    )
                )
            );

            WCV_Form_Helper::select(
                apply_filters(
                    'wcv_order_status_input',
                    array(
                        'id'            => '_wcv_order_status_input',
                        'label'         => __( 'Order status', 'wc-vendors' ),
                        'class'         => 'select2 wcv-dashboard-filter',
                        'value'         => $this->get_order_filter_status(),
                        'placeholder'   => __( 'Completed', 'wc-vendors' ),
                        'wrapper_start' => '<div class="all-30 small-100">',
                        'wrapper_end'   => '</div></div></div>',
                        'options'       => wcv_get_order_statuses(),
                        'multiple'      => true,
                    )
                )
            );

            // Update Button.
            WCV_Form_Helper::submit(
                apply_filters(
                    'wcv_order_update_button',
                    array(
                        'id'            => 'update_button',
                        'value'         => __( 'Update', 'wc-vendors' ),
                        'class'         => 'expand',
                        'wrapper_start' => '<div class="control-group all-33 small-100"><div class="wcv-cols-group wcv-horizontal-gutters"><div class="all-50 small-100"><div class="control"><label>&nbsp;&nbsp;</label>',
                        'wrapper_end'   => '</div></div>',
                    )
                )
            );

            // Update Button.
            WCV_Form_Helper::clear(
                apply_filters(
                    'wcv_order_filter_clear_button',
                    array(
                        'id'            => 'clear_button',
                        'value'         => __( 'Clear', 'wc-vendors' ),
                        'class'         => 'expand',
                        'wrapper_start' => '<div class="all-50 small-100"><div class="control"><label>&nbsp;&nbsp;</label>',
                        'wrapper_end'   => '</div></div></div></div>',
                    )
                )
            );

            wp_nonce_field( 'wcv-order-date-update', 'wcv_order_date_update' );
            ?>
        </form>
    </div>

    <?php if ( $can_export_csv ) : ?>

        <?php $export_btn_class = apply_filters( 'wcv_order_export_btn_class', '' ); ?>

        <div class="all-20 small-100 align-right export-orders">
            <a href="<?php echo esc_url( $add_url ); ?>"
                class="wcv-button button quick-link-btn <?php echo esc_attr( $export_btn_class ); ?>"><?php echo esc_attr( __( 'Export Orders', 'wc-vendors' ) ); ?></a>
        </div>

    <?php endif; ?>
    <div class="all-100 small-100"  style="display: flex; align-items:center; flex-wrap:wrap-reverse;">
        <?php if ( $this->total_order_count > 0 ) : ?>
            <div class="all-20 small-100">
                <strong><?php echo esc_attr( __( 'Total Orders: ', 'wc-vendors' ) ); ?></strong>
                <span><?php echo wp_kses_post( $this->total_order_count ); ?> <?php echo esc_attr( _n( 'Order', 'Orders', $this->total_order_count, 'wc-vendors' ) ); ?></span>
            </div>
        <?php endif; ?>
        <?php if ( $this->max_num_pages > 1 ) : ?>
        <div class="all-80 small-100 wcv-order-table-pagination-right">
            <?php
            $order_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            if ( $order_paged > $this->max_num_pages ) {
                $order_paged = $this->max_num_pages;
            }
            echo wp_kses_post( $pagination_wrapper['wrapper_start'] );
            echo wp_kses_post(
                paginate_links(
                    apply_filters(
                        'wcv_order_pagination_args',
                        array(
                            'base'      => add_query_arg( 'paged', '%#%' ),
                            'format'    => 'paged=%#%',
                            'current'   => $order_paged,
                            'total'     => $this->max_num_pages,
                            'prev_next' => true,
                            'type'      => 'list',
                            'end_size'  => 2,
                            'mid_size'  => 2,
                        ),
                    )
                )
            );
            echo wp_kses_post( $pagination_wrapper['wrapper_end'] );
            ?>

        </div>
        <?php endif; ?>
    </div>
</div>
