<?php
defined( 'ABSPATH' ) or exit;
function mbo_add_deal_columns( $columns )
{
    unset( $columns['date'] );
    $columns = array_merge( $columns, array
    (
        'dealType'          => __( "Type", 'molongui-bump-offer' ),
        'bumpProduct'       => __( "Product", 'molongui-bump-offer' ),
        'dealQuantity'      => __( "Quantity", 'molongui-bump-offer' ),
        'bumpPriceCriteria' => __( "Price Criteria", 'molongui-bump-offer' ), // Hidden column. Added to enable quick and bulk edit. Keep it 4th or update CSS rule (back.less).
        'bumpPrice'         => __( "Price", 'molongui-bump-offer' ),
        'bumpStatus'        => __( "Status", 'molongui-bump-offer' ),
        'bumpStart'         => __( "Starts", 'molongui-bump-offer' ),
        'bumpEnd'           => __( "Expires", 'molongui-bump-offer' ),
        'bumpPage'          => __( "Pages", 'molongui-bump-offer' ),
        'bumpPosition'      => __( "Position", 'molongui-bump-offer' ),
    ));
    return $columns;
}
add_filter( 'manage_'.MOLONGUI_BUMP_OFFER_CPT.'_posts_columns', 'mbo_add_deal_columns' );
function mbo_fill_deal_columns( $column, $ID )
{
    if ( empty( $ID ) ) return;
    if ( 'dealType' == $column )
    {
        $type = get_post_meta( $ID, '_molongui_deal_type', true );
        if ( empty( $type ) ) return;

        $types = mbo_get_deal_types();

        echo $types[$type]['label'];
    }
    elseif ( 'bumpProduct' == $column )
    {
        $pid = get_post_meta( $ID, '_molongui_bump_product', true );
        if ( empty( $pid ) ) return;
        $product = wc_get_product( $pid );
        $ptitle = get_the_title( $pid );
        $plink  = ( $product->is_type( 'variation' ) ? get_edit_post_link( $product->get_parent_id() ) : get_edit_post_link( $pid ) );
        echo '<div id="bump-product-'.$ID.'" data-bump-product-id="'.$pid.'" data-bump-product-title="'.$ptitle.'">'.'<a href="'.$plink.'">'.$ptitle.'</a>'.'</div>';
    }
    elseif ( 'dealQuantity' == $column )
    {
        $qty = get_post_meta( $ID, '_molongui_deal_quantity', true );
        if ( empty( $qty ) ) return;

        echo $qty;
    }
    elseif ( 'bumpPriceCriteria' == $column )
    {
        $criteria = get_post_meta( $ID, '_molongui_deal_price_criteria', true );
        if ( empty( $criteria ) ) return;

        echo '<div id="deal-price-criteria-'.$ID.'" data-deal-price-criteria="'.$criteria.'">'.$criteria.'</div>';
    }
    elseif ( 'bumpPrice' == $column )
    {
        $deal_price_criteria = get_post_meta( $ID, '_molongui_deal_price_criteria', true );
        $deal_price          = get_post_meta( $ID, '_molongui_bump_price', true );
        $deal_product        = get_post_meta( $ID, '_molongui_bump_product', true );

        $price = mbo_get_deal_price( $deal_product, $deal_price_criteria, $deal_price );
        if ( empty( $price ) ) return;

        echo '<div id="bump-price-'.$ID.'" data-bump-price="'.$deal_price.'">'.wc_price( $price ).'</div>';
    }
    elseif ( 'bumpStatus' == $column )
    {
        $output = __( "Active", 'molongui-bump-offer' );

        /*!
         * PRIVATE FILTER.
         *
         * For internal use only. Not intended to be used by plugin or theme developers.
         * Future compatibility NOT guaranteed.
         *
         * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
         * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
         * or deprecation phase.
         *
         * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
         * and knowing that it could cause code failure.
         */
        echo apply_filters( '_mbo/bump/column/status', $output, $column, $ID );
    }
    elseif ( 'bumpStart' == $column )
    {
        $output = '<a href="'.MOLONGUI_BUMP_OFFER_WEB.'" target="_blank" class="molongui-bump-premium-label">'.__( "Premium feature", 'molongui-bump-offer' ).'</a>';

        /*!
         * PRIVATE FILTER.
         *
         * For internal use only. Not intended to be used by plugin or theme developers.
         * Future compatibility NOT guaranteed.
         *
         * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
         * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
         * or deprecation phase.
         *
         * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
         * and knowing that it could cause code failure.
         */
        echo apply_filters( '_mbo/bump/column/start', $output, $column, $ID );
    }
    elseif ( 'bumpEnd' == $column )
    {
        $output = '<a href="'.MOLONGUI_BUMP_OFFER_WEB.'" target="_blank" class="molongui-bump-premium-label">'.__( "Premium feature", 'molongui-bump-offer' ).'</a>';

        /*!
         * PRIVATE FILTER.
         *
         * For internal use only. Not intended to be used by plugin or theme developers.
         * Future compatibility NOT guaranteed.
         *
         * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
         * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
         * or deprecation phase.
         *
         * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
         * and knowing that it could cause code failure.
         */
        echo apply_filters( '_mbo/bump/column/end', $output, $column, $ID );
    }
    elseif ( 'bumpPage' == $column )
    {
        $page = get_post_meta( $ID, '_molongui_bump_page', true );
        if ( empty( $page ) ) return;

        echo '<div id="bump-page-'.$ID.'" data-bump-page="'.$page.'">'.ucfirst( $page ).'</div>';
    }
    elseif ( 'bumpPosition' == $column )
    {
        $labels = mbo_get_hooks( 'checkout' );
        $output = '<div>'.$labels['woocommerce_review_order_before_submit'].'</div>';

        /*!
         * PRIVATE FILTER.
         *
         * For internal use only. Not intended to be used by plugin or theme developers.
         * Future compatibility NOT guaranteed.
         *
         * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
         * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
         * or deprecation phase.
         *
         * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
         * and knowing that it could cause code failure.
         */
        echo apply_filters( '_mbo/bump/column/position', $output, $column, $ID, $labels );
    }
}
add_action( 'manage_'.MOLONGUI_BUMP_OFFER_CPT.'_posts_custom_column', 'mbo_fill_deal_columns', 5, 2 );
function mbo_disable_view_trash( $views )
{
    /*!
     * PRIVATE FILTER.
     *
     * For internal use only. Not intended to be used by plugin or theme developers.
     * Future compatibility NOT guaranteed.
     *
     * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
     * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
     * or deprecation phase.
     *
     * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
     * and knowing that it could cause code failure.
     */
    if ( apply_filters( '_mbo/bump/view_trash', false ) ) return $views;

    $remove_views = array( 'trash' );

    foreach ( $remove_views as $view )
    {
        if ( isset( $views[$view] ) ) unset( $views[$view] );
    }
    return $views;
}
add_filter( 'views_edit-' . MOLONGUI_BUMP_OFFER_CPT, 'mbo_disable_view_trash' );
function mbo_disable_action_trash( $allcaps, $caps, $args )
{
    /*!
     * PRIVATE FILTER.
     *
     * For internal use only. Not intended to be used by plugin or theme developers.
     * Future compatibility NOT guaranteed.
     *
     * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
     * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
     * or deprecation phase.
     *
     * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
     * and knowing that it could cause code failure.
     */
    if ( apply_filters( '_mbo/bump/action_trash', false ) ) return $allcaps;

    if ( isset( $args[0] ) and $args[0] == 'delete_post' and isset( $args[2] ) )
    {
        if ( get_post_type( $args[2] ) == MOLONGUI_BUMP_OFFER_CPT )
        {
            foreach ( $caps as $cap ) $allcaps[$cap] = false;
        }
    }

    return $allcaps;
}
add_filter( 'user_has_cap', 'mbo_disable_action_trash', 10, 3 );
function mbo_remove_action_trash( $actions, $post )
{
    /*!
     * PRIVATE FILTER.
     *
     * For internal use only. Not intended to be used by plugin or theme developers.
     * Future compatibility NOT guaranteed.
     *
     * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
     * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
     * or deprecation phase.
     *
     * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
     * and knowing that it could cause code failure.
     */
    if ( apply_filters( '_mbo/bump/action_trash', false ) ) return $actions;

    if ( $post->post_type === MOLONGUI_BUMP_OFFER_CPT )
    {
        unset( $actions['clone'] );
        unset( $actions['trash'] );
        unset( $actions['delete'] );
    }
    return $actions;
}
add_filter( 'post_row_actions', 'mbo_remove_action_trash', 10, 2 );
function mbo_disable_bulk_trash( $bulk_actions )
{
    /*!
     * PRIVATE FILTER.
     *
     * For internal use only. Not intended to be used by plugin or theme developers.
     * Future compatibility NOT guaranteed.
     *
     * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
     * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
     * or deprecation phase.
     *
     * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
     * and knowing that it could cause code failure.
     */
    if ( apply_filters( '_mbo/bump/bulk_trash', false ) ) return $bulk_actions;

    if ( isset( $bulk_actions['trash'] ) ) unset( $bulk_actions['trash'] );

    return $bulk_actions;
}
add_filter( 'bulk_actions-edit-molongui_bump', 'mbo_disable_bulk_trash' );