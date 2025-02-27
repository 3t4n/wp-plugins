<?php

/**
 * Product Table Main Actions
 *
 * This file is used to add the table actions before and after a table
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 * @version    2.5.2 - added can submit handler
 */

?>

<div class="wcv_dashboard_table_header wcv-cols-group wcv-search wcv-product-table-search-<?php echo esc_attr( $position ); ?>">

    <div class="all-50 small-100 wcv-product-table-search-results">
        <?php if ( strlen( $search ) > 0 ) : ?>
            <span class="wcv_search_results"><?php printf( /* translators: %s search term */ esc_html__( 'Search results for "%s" ...', 'wc-vendors' ), esc_html( $search ) ); ?></span>
        <?php endif; ?>
    </div>

    <div class="all-50 small-100  wcv-product-table-search-form" style="float:right">
        <form class="wcv-search-form wcv-form" method="get">
            <div class="column-group horizontal-gutters">
                <div class="control-group">
                    <div class="control append-button" role="search">
                        <span><input type="text" name="wcv-search" id="wcv-search"
                                    value="<?php echo esc_attr( $search ); ?>"></span>
                        <button class="wcv-button wcv-search-product"><?php echo esc_html__( 'Search', 'wc-vendors' ); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="wcv_actions wcv-cols-group wcv-product-table-actions-<?php echo esc_attr( $position ); ?>">
    <div class="all-50 small-100 wcv-product-table-buttons-<?php echo esc_attr( $position ); ?>">
        <?php if ( ! $lock_new_products && $can_submit ) : ?>
            <?php foreach ( $template_overrides as $key => $template_data ) : ?>
                <a href="<?php echo esc_url( $template_data['url'] ); ?>"
                class="wcv-button button quick-link-btn"><?php printf( /* translators: %s button label */ esc_html__( 'Add %s', 'wc-vendors' ), esc_html( $template_data['label'] ) ); ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php do_action( 'wcv_product_action_after_buttons' ); ?> 
    </div>

    <div class="all-50 small-100 wcv-product-table-pagination-<?php echo esc_attr( $position ); ?>" style="float:right">
        <?php
        echo $pagination_wrapper['wrapper_start']; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo paginate_links( //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            apply_filters(
                'wcv_product_pagination_args',
                array(
                    'base'      => add_query_arg( 'paged', '%#%' ),
                    'format'    => '',
                    'current'   => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
                    'total'     => $this->max_num_pages,
                    'prev_next' => true,
                    'type'      => 'list',
                ),
                ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
                $this->max_num_pages
            )
        );
        echo $pagination_wrapper['wrapper_end']; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>

    </div>
</div>
