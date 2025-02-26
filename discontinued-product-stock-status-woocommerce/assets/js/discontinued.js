jQuery(document).ready(function () {
    const { __ } = wp.i18n;

    let currPage = dpssw_custom_data.curr_page;
    if ( '1' === currPage ) {
        jQuery('#related_to_disc_prod').select2({
            placeholder: " - Select Similar Products - ",
            width: '50%',
        });
    }

    // To show/hide 'Apply Grayscale effect based on "Show in catalog".
    jQuery('#discontinued_show_in_catalog').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery("#discontinued_greyscale_effect").parents('tr').hide();
        } else {
            jQuery("#discontinued_greyscale_effect").parents('tr').show();
        }
    }).trigger('change');


    // To show/hide 'select border width' and 'select border color'.
    jQuery('#discontinued_global_message_border_style').change(function () {
        if (jQuery(this).find(":selected").val() !== 'none') {
        jQuery('#discontinued_global_message_border_width').parents("tr").show();
        jQuery('#discontinued_global_message_border_color').parents("tr").show();
        jQuery('#discontinued_global_message_border_radius').parents("tr").show();
        } else {
        jQuery('#discontinued_global_message_border_width').parents("tr").hide();
        jQuery('#discontinued_global_message_border_color').parents("tr").hide();
        jQuery('#discontinued_global_message_border_radius').parents("tr").hide();
        }
    }).trigger('change');


    jQuery('select#product-type').change(function () {
        productType = jQuery(this).val();

        if ('variable' == productType || 'grouped' == productType) {
            jQuery('input#_discontinued_product').parent().show();
        } else {
            jQuery('input#_discontinued_product').parent().hide();
        }
    });
    jQuery('select#product-type').trigger('change');

    // To hide and show message box on variable product level. i.e when checked on 'Discontinued Product'.
    jQuery('input#_discontinued_product').on('change', function () {

        var is_discontinued_product = jQuery('input#_discontinued_product:checked').size();
        variElements = jQuery(this).parent().siblings();
        productType = jQuery('select#product-type').val();


        if (is_discontinued_product) {
            // if (is_discontinued_product) {

            jQuery(this).parent().siblings('p.form-field.show_specific_messsage_field').show();
            jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').show();

            let prodType = variElements.find('select#show_specific_messsage').val();

            if ('product_specific_message' == prodType) {

                jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').show();
            } else {
                jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').hide();
            }
        } else if ('simple' != productType) {

            jQuery(this).parent().siblings('p.form-field.show_specific_messsage_field').hide();
            jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').hide();

        }

    }).trigger('change');

    // To hide and show message box on variable product level. i.e when checked on 'Discontinued Product'.
    jQuery('div#discontinued_tab_container select#show_specific_messsage').on('change', function () {

        msgType = jQuery(this).val();
        productType = jQuery(this).val();

        if ('product_specific_message' == msgType) {
            jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').show();
        } else {
            jQuery(this).parent().siblings('div#wp-custom_editor_box-wrap').hide();
        }

    });

    if ('simple' == jQuery('select#product-type').val()) {
        jQuery('div#discontinued_tab_container select#show_specific_messsage').trigger('change');
    }

    // ------------------------------------------Backorder---------------------------------.

    // Get the current WooCommerce version.
    let wc_version = parseFloat( dpssw_custom_data.wc_version );

    if ( wc_version < 7.6 ) {

        // gets the backorder option value.
        let backOrderValue = jQuery('#_backorders').find(":selected").val();

        // chceking back order value and disabling checkbox.
        if ('no' !== backOrderValue) {
            jQuery("#_stock_discontinued_product").attr('disabled', true);
        } else {
            jQuery("#_stock_discontinued_product").attr('disabled', false);
        }

        // on changing backorder changing value of checkbox.
        jQuery("#_backorders").on('change', function () {

            if ('no' !== this.value) {
                jQuery("#_stock_discontinued_product").attr('disabled', true);
                jQuery("#_stock_discontinued_product").prop('checked', false);
            } else {
                jQuery("#_stock_discontinued_product").attr('disabled', false);
            }

        });

    } else {

        // gets the backorder option value.
        let backOrderValue = jQuery("input[name=_backorders]:checked").val();

        // checking back order value and disabling checkbox.
        if ('no' !== backOrderValue) {
            jQuery("#_stock_discontinued_product").attr('disabled', true);
        } else {
            jQuery("#_stock_discontinued_product").attr('disabled', false);
        }

        // on changing backorder changing value of checkbox.
        jQuery("input[name=_backorders]").on('change', function () {

            if ('no' !== this.value) {
                jQuery("#_stock_discontinued_product").attr('disabled', true);
                jQuery("#_stock_discontinued_product").prop('checked', false);
            } else {
                jQuery("#_stock_discontinued_product").attr('disabled', false);
            }

        });

    }

    // ---------------------------------------------END-------------------------------------------------.

    // Hide rating notice on click.
    jQuery(".dpssw_hide_rate").click(function (event) {
        event.preventDefault();
        jQuery.ajax({
            method: 'POST',
            url: dpssw_custom_data.url,
            data: {
                action: 'dpssw_update',
                nonce: dpssw_custom_data.nonce,
            },
            success: (res) => {
                window.location.href = window.location.href
            }
        });
    });

    // ------------------------------------------Similar-Products---------------------------------------.

    // Hide all the Settings on Discontinued Dropdown from Inventory for Simple Products.
    var productType = '';
    productType = jQuery('#product-type').val();
    var stockStatus = '';
    stockStatus = jQuery('#_stock_status').val();
    var savedStkStatus = stockStatus;

    // Swapping between different Product types.
    if ( 'simple' === productType ) {
        if ( 'discontinued' === stockStatus ) {
            jQuery("#_discontinued_product").prop("checked", true);
        } else {
            jQuery("#_discontinued_product").prop("checked", false);
        }
    } else {
        if ( jQuery('#_discontinued_product').is(":checked") ) {
            jQuery("#_stock_status").val("discontinued");
            jQuery("#_discontinued_product").prop("checked", true);
        } else {
            jQuery("#_stock_status").val(savedStkStatus);
            jQuery("#_discontinued_product").prop("checked", false);
        }
    }

    jQuery('#_stock_status').on('change', function () {

        var stockStatus = '';
        stockStatus = jQuery('#_stock_status').val();

        if ( 'discontinued' === stockStatus ) {
            jQuery("#_discontinued_product").prop("checked", true);
        } else {
            jQuery("#_discontinued_product").prop("checked", false);
        }
    });

    jQuery('#_discontinued_product').on('change', function () {

        var stockStatus = '';
        stockStatus = jQuery('#_stock_status').val();
        if ( jQuery('#_discontinued_product').is(":checked") ) {
            jQuery("#_stock_status").val("discontinued");
        } else {
            jQuery("#_stock_status").val(savedStkStatus);
        }
    });
    
    // Hide all the Settings on Discontinued Checkbox from Discontinued Products for Variable Products.
    if ( ( 'discontinued' === stockStatus ) && ( jQuery('#_discontinued_product').is(":checked") ) ) {
        jQuery('#show_specific_messsage').parent().show();
        jQuery('#related_product_header').parent().show();
        jQuery('#related_to_disc_prod').parent().show();
    } else {
        if ( 'simple' === productType ) {
            jQuery('#show_specific_messsage').parent().show();
        } else {
            jQuery('#show_specific_messsage').parent().hide();
        }
        jQuery('#related_product_header').parent().hide();
        jQuery('#related_to_disc_prod').parent().hide();
    }

    // Validation based on changing the Product type.
    jQuery('#product-type').on('change', function () {

        var productType = '';
        productType = jQuery('#product-type').val();
        var stockStatus = '';
        stockStatus = jQuery('#_stock_status').val();

        if ( 'simple' === productType ) {
            if ( 'discontinued' === stockStatus ) {
                jQuery("#_discontinued_product").prop("checked", true);
            } else {
                jQuery("#_discontinued_product").prop("checked", false);
            }
        } else {
            if ( jQuery('#_discontinued_product').is(":checked") ) {
                jQuery("#_stock_status").val("discontinued");
            } else {
                jQuery("#_stock_status").val(savedStkStatus);
            }
        }

        if ( ( 'discontinued' === stockStatus ) && ( jQuery('#_discontinued_product').is(":checked") ) ) {
            jQuery('#show_specific_messsage').parent().show();
            jQuery('#related_product_header').parent().show();
            jQuery('#related_to_disc_prod').parent().show();
            
        } else {
            if ( 'simple' === productType ) {
                jQuery('#show_specific_messsage').parent().show();
            } else {
                jQuery('#show_specific_messsage').parent().hide();
            }
            jQuery('#related_product_header').parent().hide();
            jQuery('#related_to_disc_prod').parent().hide();
        }
    });

    // Validation for Hiding and Showing settings for Simple Product.
    jQuery('#_stock_status').on('change', function () {

        var stockStatus = '';
        stockStatus = jQuery('#_stock_status').val();

        if ( 'discontinued' === stockStatus ) {
            jQuery('#related_product_header').parent().show();
            jQuery('#related_to_disc_prod').parent().show();
        } else {
            jQuery('#related_product_header').parent().hide();
            jQuery('#related_to_disc_prod').parent().hide();
        }

    });

    // Validation for Hiding and Showing settings for non-Simple Product (like Variable and Grouped).
    jQuery('#_discontinued_product').on('change', function () {

        if ( jQuery('#_discontinued_product').is(":checked") ) {
            jQuery('#show_specific_messsage').parent().show();
            jQuery('#related_product_header').parent().show();
            jQuery('#related_to_disc_prod').parent().show();
        } else {
            jQuery('#show_specific_messsage').parent().hide();
            jQuery('#related_product_header').parent().hide();
            jQuery('#related_to_disc_prod').parent().hide();
        }

    });

    // Hide Header Text Field and Dropdown field of Similar Products on Add Similar Products Checbox.
    if ( 'discontinued' === stockStatus  &&  jQuery('#_discontinued_product').is(":checked")  ) {
        jQuery('#related_product_header').parent().show();
        jQuery('#related_to_disc_prod').parent().show();
    } else {
        jQuery('#related_product_header').parent().hide();
        jQuery('#related_to_disc_prod').parent().hide();
    }

    jQuery("#related_product_header").attr('disabled', 'disabled');
    
    jQuery('#related_to_disc_prod').prop('disabled', true);

    // Banner on the Settings Page.
    var banner = jQuery('#discontinued_banner');
    banner.appendTo(banner.parent());

    // Adds Pro Field in General Settings.
    var label_text = jQuery("#discontinued_export_button_title");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Adds Pro Field in General Settings.
    var label_text = jQuery("#discontinued_import_button_title");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Adds Pro Field in General Settings.
    var label_text = jQuery("#discontinued_reset_button_title");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Adds Pro Field in General Settings.
    var label_text = jQuery("label[for='discontinued_global_message_border_color']");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');
    
    // Adds Pro Field in General Settings.
    var label_text = jQuery("label[for='discontinued_global_message_border_style']");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Adds Pro Field in General Settings.
    var label_text = jQuery("label[for='discontinued_global_message_border_width']");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Adds Pro Field in General Settings.
    var label_text = jQuery("label[for='discontinued_global_message_border_radius']");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');


    // Adds Pro Field in General Settings.
    var label_text = jQuery("label[for='discontinued_global_text_color']");
    // Find the text node and insert a span after it.
    label_text.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    var label_background = jQuery("label[for='discontinued_global_background_color']");
    // Find the text node and insert a span after it.
    label_background.contents().filter(function() {
        return this.nodeType === 3; // Filter for text nodes.
    }).last().after('<span style= "margin: 5px; color: white; background: red; border-radius: 12px; font-size: 12px; padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;" class="dpssw-pro-alert"><b> Pro </b></span>');

    // Free to Pro Pop-up.
    var dpsswUpgradeNow = dpssw_custom_data.upgrade_now;

    var headOne = dpssw_custom_data.head_point_one;
    var subOne = dpssw_custom_data.sub_point_one;

    var headTwo = dpssw_custom_data.head_point_two;
    var subTwo = dpssw_custom_data.sub_point_two;

    var headThree = dpssw_custom_data.head_point_three;
    var subThree = dpssw_custom_data.sub_point_three;

    var headFour = dpssw_custom_data.head_point_four;
    var subFour = dpssw_custom_data.sub_point_four;

    var headFive = dpssw_custom_data.head_point_five;
    var subFive = dpssw_custom_data.sub_point_five;

    var headSix = dpssw_custom_data.head_point_six;
    var subSix = dpssw_custom_data.sub_point_six;

    var headSeven = dpssw_custom_data.head_point_seven;
    var subSeven = dpssw_custom_data.sub_point_seven;

    var headEight = dpssw_custom_data.head_point_eight;
    var subEight = dpssw_custom_data.sub_point_eight;

    var subNineOne = dpssw_custom_data.sub_point_nine_one;
    var headNineOne = dpssw_custom_data.head_point_nine_one;
    var subNineTwo = dpssw_custom_data.sub_point_nine_two;
    var headNineTwo = dpssw_custom_data.head_point_nine_two;


    jQuery('.discontinued-export-button, .discontinued-import-button, #fileToUpload, #discontinued_global_message_border_style, #discontinued_global_message_border_width, .discontinued-restore-button').click(function(event){
        event.preventDefault();
        proSubscriptionPopUp();
        jQuery('#discontinued_global_message_border_width option:eq(0)').prop('selected',true);
    })

    jQuery('#discontinued_global_text_color, #discontinued_global_background_color, #discontinued_global_message_border_color, #discontinued_global_message_border_radius').focusout(function(event) {
        // Prevent the form from being submitted
        event.preventDefault();    
        var borderColor = jQuery('#discontinued_global_message_border_color').val();
        var borderRadius = jQuery('#discontinued_global_message_border_radius').val();
        var colorText =  jQuery('#discontinued_global_text_color').val();
        var colorBackground =  jQuery('#discontinued_global_background_color').val();
        if ( '' !== colorText || '' !== colorBackground || '' !== borderColor || '' !== borderRadius ) {
            proSubscriptionPopUp();
        }

        jQuery('#discontinued_global_text_color').val('');
        jQuery('#discontinued_global_background_color').val('');
        jQuery('#discontinued_global_message_border_radius').val('');
        jQuery('#discontinued_global_message_border_color').val('');
    });

    function proSubscriptionPopUp() {
        Swal.fire({
            title: '<div class="pro-alert-header"> Pro Field Alert! </div>',
            showCloseButton: true,
            html: '<div class="pro-crown">'
            + '<svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512">'
            + '<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->'
            + '<path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/>'
            + '</svg>'
            + '</div>'
            + '<div class="popup-text1">Looking for this cool feature? Go Pro!</div>'
            + '<div class="popup-text2">Go with our premium version to unlock the following features:</div>'
            + '<ul>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headOne + ' : ' + subOne + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headTwo + ' ' + subTwo + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headThree + ' ' + subThree + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headFour + ' ' + subFour + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headFive + ' : ' + subFive + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headSix + ' : ' + subSix + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headSeven + ' : ' + subSeven + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headEight + ' : ' + subEight + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + subNineOne + ' ' + headNineOne  + ' ' + subNineTwo + ' ' + headNineTwo + ' </li>'
            + '</ul>' 
            + '<button class="dpssw-upgrade-now" style="border: none"><a href="https://www.saffiretech.com/woocommerce-discontinued-products-stock-status-pro/?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=dpssw">'+dpsswUpgradeNow+'</a></button>',
            customClass: "dpssw-popup",
            showConfirmButton: false,
        });

        // CSS for Free to Pro Pop-up.
        jQuery( '.dpssw-popup' ).css('width', '1100px');
        jQuery( '.dpssw-popup > .swal2-header').css('background', '#061727' );
        jQuery( '.dpssw-popup > .swal2-header').css('margin', '-20px' );
        jQuery( '.pro-alert-header' ).css('padding-top', '25px' );
        jQuery( '.pro-alert-header' ).css('padding-bottom', '20px' );
        jQuery( '.pro-alert-header' ).css( 'color', 'white' );
        jQuery( '.pro-crown' ).css( 'margin-top', '20px' );
        jQuery( '.popup-text1').css( 'font-size', '30px' );
        jQuery( '.popup-text1' ).css( 'font-weight', '600' );
        jQuery( '.popup-text1' ).css( 'padding-bottom', '10px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'text-align', 'justify' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-left', '25px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-right', '25px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'line-height', '2em' );
        jQuery( '.popup-text2' ).css( 'padding', '10px' );
        jQuery( '.popup-text2' ).css( 'font-weignt', '500');
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul, .popup-text1, .popup-text2').css('color', '#061727' );
    }

    jQuery('.dpssw-pro-alert').click(function () {
        Swal.fire({
            title: '<div class="pro-alert-header"> Pro Field Alert! </div>',
            showCloseButton: true,
            html: '<div class="pro-crown">'
            + '<svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512">'
            + '<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->'
            + '<path fill="#f8c844" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/>'
            + '</svg>'
            + '</div>'
            + '<div class="popup-text1">Looking for this cool feature? Go Pro!</div>'
            + '<div class="popup-text2">Go with our premium version to unlock the following features:</div>'
            + '<ul>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headOne + ' : ' + subOne + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headTwo + ' ' + subTwo + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headThree + ' ' + subThree + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headFour + ' ' + subFour + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headFive + ' : ' + subFive + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headSix + ' : ' + subSix + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headSeven + ' : ' + subSeven + ' </li>'
            + '<li><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff3d3d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> ' + headEight + ' : ' + subEight + ' </li>'
            + '</ul>' 
            + '<button class="dpssw-upgrade-now" style="border: none"><a href="https://www.saffiretech.com/dynamic-cart-messages-pro-woocommerce/?utm_source=wp_plugin&utm_medium=profield&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=dpssw" target="_blank" class="purchase-pro-link">'+dpsswUpgradeNow+'</a></button>',
            customClass: "dpssw-popup",
            showConfirmButton: false,
        });

        // CSS for Free to Pro Pop-up.
        jQuery( '.dpssw-popup' ).css('width', '1100px');
        jQuery( '.dpssw-popup > .swal2-header').css('background', '#061727' );
        jQuery( '.dpssw-popup > .swal2-header').css('margin', '-20px' );
        jQuery( '.pro-alert-header' ).css('padding-top', '25px' );
        jQuery( '.pro-alert-header' ).css('padding-bottom', '20px' );
        jQuery( '.pro-alert-header' ).css( 'color', 'white' );
        jQuery( '.pro-crown' ).css( 'margin-top', '20px' );
        jQuery( '.popup-text1').css( 'font-size', '30px' );
        jQuery( '.popup-text1' ).css( 'font-weight', '600' );
        jQuery( '.popup-text1' ).css( 'padding-bottom', '10px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'text-align', 'justify' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-left', '25px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'padding-right', '25px' );
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul ' ).css( 'line-height', '2em' );
        jQuery( '.popup-text2' ).css( 'padding', '10px' );
        jQuery( '.popup-text2' ).css( 'font-weignt', '500');
        jQuery( '.dpssw-popup > .swal2-content > .swal2-html-container > ul, .popup-text1, .popup-text2').css('color', '#061727' );
        
    });

});

// Reference: https://wordpress.stackexchange.com/questions/217518/woocommerce-hook-after-loading-variation-in-admin-edit-page. 
jQuery(document).on('woocommerce_variations_loaded', function (event) {
    /**
     * Check if variation manage stock is checked and then show/hide elements
     */
    jQuery('#variable_product_options').on('change', 'input.variable_manage_stock', function () {

        stockstatus = jQuery(this).closest('.woocommerce_variation').find('.variable_stock_status select').val();

        if (jQuery(this).is(':checked')) {
            jQuery(this).closest('.woocommerce_variation').find('.variation-discontinued-div').hide();
        } else if ('discontinued' == stockstatus) {
            jQuery(this).closest('.woocommerce_variation').find('.variation-discontinued-div').show();
        }

        // Parent level.
        if (jQuery('input#_manage_stock:checked').length) {
            jQuery(this).closest('.woocommerce_variation').find('.variation-discontinued-div').hide();
        }
    });

    // cheks the back order and update the discontinued checkbox.
    jQuery('#variable_product_options').on('change', 'select.short', function () {

        // gets the back order status
        backOrderStatus = jQuery(this).closest('.woocommerce_variation').find('.show_if_variation_manage_stock .select').val();

        disconCheckbox = jQuery(this).closest('.woocommerce_variation').find('.show_if_variation_manage_stock input[type="checkbox"]');

        // on back order allowed change product checkbox status.
        if ('no' !== backOrderStatus) {
            disconCheckbox.attr('disabled', true);
            disconCheckbox.prop('checked', false);
        } else {
            disconCheckbox.attr('disabled', false);
        }
    });

    /**
     * Check if message type of variation is 'Product specific' if yes then show message box else hide it.
     * This function is initially trigger when clicked on 'Variations'.
     */
    var _messageType = function (element) {

        msgType = element.val();

        if ('variations_specific_message' == msgType) {
            element.parent().siblings('.dpssw-message').show();
        } else {
            element.parent().siblings('.dpssw-message').hide();
        }

    };

    /**
     * Check if variation stock status is discontinued is selected and then show/hide elements.
     */
    jQuery('.variable_stock_status select').on('change', function () {

        var stockStatus, discontinuedDiv = null;

        stockStatus = jQuery(this).val();
        discontinuedDiv = jQuery(this).parent().siblings('.variation-discontinued-div');

        if ('discontinued' == stockStatus) {
            discontinuedDiv.show();
            _messageType(discontinuedDiv.find('select.dpssw-select'));
        } else {
            discontinuedDiv.hide();
        }

    }).trigger('change');

    /**
     * Check if message type of variation is 'Product specific' if yes then show message box else hide it.
     * This function is initially trigger when clicked on 'Variations'.
    */
    jQuery('.variation-discontinued-div select.select.dpssw-select').on('change', function () {

        msgType = jQuery(this).val();

        if ('variations_specific_message' == msgType) {
            jQuery(this).parent().siblings('.dpssw-message').show();
        } else {
            jQuery(this).parent().siblings('.dpssw-message').hide();
        }
    });

});
