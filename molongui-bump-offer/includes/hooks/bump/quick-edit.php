<?php
defined( 'ABSPATH' ) or exit;
function mbo_quick_edit_add_custom_fields( $column_name, $post_type )
{
    if ( $post_type != MOLONGUI_BUMP_OFFER_CPT ) return;
    $columns = array
    (
        'bumpProduct' => array
        (
            'label' => __( "Product", 'molongui-bump-offer' ),
            'input' => '_molongui_bump_product',
        ),
        'bumpPriceCriteria' => array
        (
            'label' => __( "Price", 'molongui-bump-offer' ),
            'input' => '_molongui_deal_price_criteria',
        ),
        'bumpPrice' => array
        (
            'label' => __( "Price", 'molongui-bump-offer' ),
            'input' => '_molongui_bump_price',
        ),
    );

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
    $columns = apply_filters( '_mbo/admin/quick_edit/bump/fields', $columns );
    if ( !array_key_exists( $column_name, $columns ) ) return;
    switch ( $column_name )
    {
        case 'bumpProduct':

            wp_nonce_field( 'quick_edit_bump', 'quick_edit_bump_nonce' );
            ?>
            <fieldset class="inline-edit-col-left">
                <div class="inline-edit-col">
                    <div class="inline-edit-group wp-clearfix">
                        <label class="inline-edit-status alignleft" style="width:100%;">
                            <span class="title"><?php echo $columns[$column_name]['label']; ?></span>
                            <select name="<?php echo $columns[$column_name]['input']; ?>"
                                    data-placeholder="<?php esc_attr_e( "Search for a product&hellip;", 'molongui-bump-offer' ); ?>"
                                    data-action="woocommerce_json_search_products_and_variations"
                                    style="width:calc(100% - 6em);">
                            </select>
                        </label>
                    </div>
                </div>
            </fieldset>
            <?php

        break;

        case 'bumpPriceCriteria':

            ?>
            <fieldset class="inline-edit-col-left">
                <div class="inline-edit-col">
                    <div class="inline-edit-group wp-clearfix">
                        <label class="inline-edit-status alignleft" style="width:100%;">
                            <span class="title"><?php echo $columns[$column_name]['label']; ?></span>
                            <select name="<?php echo $columns[$column_name]['input']; ?>"
                                    data-action="woocommerce_json_search_products_and_variations"
                                    style="width:calc(100% - 6em);">
                                <option value="regular"><?php _e( "Regular price from product" , 'molongui-bump-offer' ); ?></option>
                                <option value="sale"><?php _e( "Sale price from product" , 'molongui-bump-offer' ); ?></option>
                                <option value="custom"><?php _e( "Custom price" , 'molongui-bump-offer' ); ?></option>
                                <option value="discount"><?php _e( "Custom discount off regular price" , 'molongui-bump-offer' ); ?></option>
                            </select>
                        </label>
                    </div>
                </div>
            </fieldset>
            <?php

        break;

        case 'bumpPrice':

            ?>
            <fieldset class="inline-edit-col-left">
                <div class="inline-edit-col column-<?php echo $column_name; ?>">
                    <label class="inline-edit-group">
                        <span class="title"><?php echo $columns[$column_name]['label']; ?></span>
                        <input type="text" name="<?php echo $columns[$column_name]['input']; ?>" class="" value="">
                    </label>
                </div>
            </fieldset>
            <?php

        break;
    }

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
    do_action( '_bump_offer/admin/quick_edit/bump/markup', $columns, $column_name );
}
add_action( 'quick_edit_custom_box', 'mbo_quick_edit_add_custom_fields', 10, 2 );
function mbo_quick_edit_populate_custom_fields()
{
    $current_screen = get_current_screen();
    if ( $current_screen->id != 'edit-'.MOLONGUI_BUMP_OFFER_CPT or $current_screen->post_type != MOLONGUI_BUMP_OFFER_CPT ) return;
    wp_enqueue_script( 'jquery' );
    ?>
    <script type="text/javascript">
        jQuery(function($)
        {
            var $inline_editor = inlineEditPost.edit;
            inlineEditPost.edit = function(id)
            {
                $inline_editor.apply(this, arguments);
                var post_id = 0;
                if ( typeof(id) == 'object' )
                {
                    post_id = parseInt(this.getId(id));
                }
                if ( post_id != 0 )
                {
                    $row = $('#edit-' + post_id);
                    $bump_product       = $('#bump-product-' + post_id);
                    $bump_product_id    = $bump_product.data('bump-product-id');
                    $bump_product_title = $bump_product.data('bump-product-title');
                    $product_selector = $row.find('[name="_molongui_bump_product"]');
                    $product_selector.append($('<option>', {value:$bump_product_id, text:$bump_product_title+' (#'+$bump_product_id+')'}));
                    $product_selector.addClass('wc-product-search');
                    $( document.body ).trigger('wc-enhanced-select-init');
                    let $deal_price_criteria = $('#deal-price-criteria-' + post_id).data('deal-price-criteria');
                    let $criteria_field = $row.find('[name="_molongui_deal_price_criteria"]');
                    $criteria_field.val($deal_price_criteria);
                    $criteria_field.on('change', function()
                    {
                        switch ($(this).val())
                        {
                            case 'regular':
                            case 'sale':
                                $row.find('[name="_molongui_bump_price"]').closest('fieldset').hide();
                            break;

                            case 'custom':
                                $row.find('[name="_molongui_bump_price"]').parent().find('.title').html('<?php echo get_woocommerce_currency_symbol(); ?>');
                                $row.find('[name="_molongui_bump_price"]').closest('fieldset').show();
                            break;

                            case 'discount':
                                $row.find('[name="_molongui_bump_price"]').parent().find('.title').html('% OFF');
                                $row.find('[name="_molongui_bump_price"]').closest('fieldset').show();
                            break;
                        }
                    });
                    $bump_price = $('#bump-price-' + post_id).data('bump-price');
                    $row.find('[name="_molongui_bump_price"]').val($bump_price);
                    $page_selector = $row.find('[name="_molongui_bump_page"]');
                    if ( $page_selector.length )
                    {
                        $bump_page = $('#bump-page-' + post_id).data( 'bump-page' );
                        if ( $bump_page === '' )
                        {
                            $bump_page = 'checkout';
                        }
                        $page_selector.val($bump_page);
                        $page_selector.children('[value="' + $bump_page + '"]').attr('selected', true);
                        $cart_position     = $row.find('[name="_molongui_bump_cart_position"]');
                        $checkout_position = $row.find('[name="_molongui_bump_checkout_position"]');
                        $minicart_position = $row.find('[name="_molongui_bump_minicart_position"]');
                        $bump_position          = $('#bump-position-' + post_id);
                        $bump_cart_position     = $bump_position.data('bump-cart-position');
                        $bump_checkout_position = $bump_position.data('bump-checkout-position');
                        $bump_minicart_position = $bump_position.data('bump-minicart-position');
                        $cart_position.val($bump_cart_position);
                        $cart_position.children('[value="' + $bump_cart_position + '"]').attr('selected', true);
                        $checkout_position.val($bump_checkout_position);
                        $checkout_position.children('[value="' + $bump_checkout_position + '"]').attr('selected', true);
                        $minicart_position.val($bump_minicart_position);
                        $minicart_position.children('[value="' + $bump_minicart_position + '"]').attr('selected', true);
                        if ( $bump_page === 'checkout' )
                        {
                            $cart_position.closest('fieldset').hide();
                            $minicart_position.closest('fieldset').hide();
                        }
                        else if ( $bump_page === 'cart' )
                        {
                            $checkout_position.closest('fieldset').hide();
                            $minicart_position.closest('fieldset').hide();
                        }
                        else if ( $bump_page === 'minicart' )
                        {
                            $cart_position.closest('fieldset').hide();
                            $checkout_position.closest('fieldset').hide();
                        }
                        $page_selector.on('change', function()
                        {
                            switch(this.value)
                            {
                                case 'cart':
                                    $cart_position.closest('fieldset').show();
                                    $checkout_position.closest('fieldset').hide();
                                    $minicart_position.closest('fieldset').hide();
                                break;

                                case 'checkout':
                                    $cart_position.closest('fieldset').hide();
                                    $checkout_position.closest('fieldset').show();
                                    $minicart_position.closest('fieldset').hide();
                                break;

                                case 'minicart':
                                    $cart_position.closest('fieldset').hide();
                                    $checkout_position.closest('fieldset').hide();
                                    $minicart_position.closest('fieldset').show();
                                break;

                                case 'both':
                                    $cart_position.closest('fieldset').show();
                                    $checkout_position.closest('fieldset').show();
                                    $minicart_position.closest('fieldset').hide();
                                break;

                                case 'all':
                                    $cart_position.closest('fieldset').show();
                                    $checkout_position.closest('fieldset').show();
                                    $minicart_position.closest('fieldset').show();
                                break;
                            }
                        });
                    }
                }
            }
        });
    </script>
    <?php
}
add_action( 'admin_footer', 'mbo_quick_edit_populate_custom_fields' );
function mbo_quick_edit_save_custom_fields( $post_id, $post )
{
    if ( !isset( $_POST['quick_edit_bump_nonce'] ) or !wp_verify_nonce( $_POST['quick_edit_bump_nonce'], 'quick_edit_bump' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) and DOING_AUTOSAVE ) return;
    if ( !current_user_can( 'edit_post', $post_id ) ) return;
    if ( isset( $_POST['_molongui_bump_product'] ) ) update_post_meta( $post_id, '_molongui_bump_product', $_POST['_molongui_bump_product'] );
    if ( isset( $_POST['_molongui_deal_price_criteria'] ) ) update_post_meta( $post_id, '_molongui_deal_price_criteria', $_POST['_molongui_deal_price_criteria'] );
    if ( isset( $_POST['_molongui_bump_price'] ) ) update_post_meta( $post_id, '_molongui_bump_price', $_POST['_molongui_bump_price'] );
    do_action( 'bump_offer/admin/quick_edit/bump/save', $post_id, $_POST );
}
add_action( 'save_post_'.MOLONGUI_BUMP_OFFER_CPT, 'mbo_quick_edit_save_custom_fields', 10, 2 );