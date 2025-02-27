jQuery(document).ready(function ($) {
    
    // Delay execution to ensure elements exist in the DOM
    setTimeout(function () {
        var $orderDataContainer = $('body.wp-admin #woocommerce-order-data #order_data .order_data_column_container');

        if ($orderDataContainer.length > 0 && wuoc_obj.combined_info) {
            $('<div class="wuoc-combined-info"><ul>' + wuoc_obj.combined_info + '</ul></div>')
                .insertAfter($orderDataContainer);
        }
    }, 1000);

    // Add cron button on the WooCommerce orders list page
    if (wuoc_obj.is_orders_list && $.inArray('orders_list', wuoc_obj.crons.button_display) >= 0) {
        var cronBtn = $('<a>', {
            href: wuoc_obj.crons.url,
            class: 'page-title-action',
            target: '_blank',
            title: wuoc_obj.crons.button_title,
            text: wuoc_obj.crons.button_text
        });

        $('body.post-type-shop_order a.page-title-action').last().after(cronBtn);
    }

    // Add filter input fields for WooCommerce orders list
    if (wuoc_obj.is_pro && wuoc_obj.is_orders_list && wuoc_obj.wuoc_filter_by_meta_key == 1) {
        var filterHTML = `
            <span class="wuoc-meta-filter">
                <input type="text" name="${wuoc_obj.meta_filters.key_name}" title="${wuoc_obj.meta_filters.key_title}"
                    placeholder="${wuoc_obj.meta_filters.key_placeholder}" value="${wuoc_obj.meta_filters.key_value}" />
                =
                <input type="text" name="${wuoc_obj.meta_filters.val_name}" title="${wuoc_obj.meta_filters.val_title}"
                    placeholder="${wuoc_obj.meta_filters.val_placeholder}" value="${wuoc_obj.meta_filters.val_value}" />
            </span>
        `;
        $('input[name="filter_action"]').before(filterHTML);
    }

    // Expand/collapse list items in retained orders
    $('.wuoc_retained_list_container > li').on('click', function () {
        var $dashicon = $(this).find('.dashicons');

        $('.wuoc_retained_list_container > li .dashicons').removeClass('dashicons-arrow-up').addClass('dashicons-arrow-down');
        $dashicon.addClass('dashicons-arrow-up');

        $('.wuoc_retained_list_container > li ul').not($(this).find('ul')).slideUp(300);
        $(this).find('ul').slideDown(300);
    });

    // Function to sort WooCommerce order items table by category
    function wuoc_sort_table($table, order) {
        var $rows = $table.find('tbody > tr');

        $rows.sort(function (a, b) {
            var terms_obj = wuoc_obj.products_terms_order;

            var keyA = terms_obj[$(a).data('order_item_id')] || '';
            var keyB = terms_obj[$(b).data('order_item_id')] || '';

            return order === 'asc' ? keyA.localeCompare(keyB) : keyB.localeCompare(keyA);
        });

        $table.append($rows);
    }

    // Apply sorting if enabled in the settings
    if (wuoc_obj.wuoc_sort_order_items_by_category === true) {
        wuoc_sort_table($('table.woocommerce_order_items'), 'asc');
    }

});
