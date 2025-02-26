jQuery(document).ready(function () {

    // Weight threshold for LTL freight
    en_weight_threshold_limit();

    // Cuttoff Time
    jQuery("#odfl_freight_shipment_offset_days").closest('tr').addClass("odfl_freight_shipment_offset_days_tr");
    jQuery("#all_shipment_days_odfl").closest('tr').addClass("all_shipment_days_odfl_tr");
    jQuery(".odfl_shipment_day").closest('tr').addClass("odfl_shipment_day_tr");
    jQuery("#odfl_freight_order_cut_off_time").closest('tr').addClass("odfl_freight_cutt_off_time_ship_date_offset");
    var odfl_current_time = en_odfl_admin_script.odfl_freight_order_cutoff_time;
    if (odfl_current_time == '') {
        jQuery('#odfl_freight_order_cut_off_time').wickedpicker({
            now: '',
            title: 'Cut Off Time',
        });
    } else {
        jQuery('#odfl_freight_order_cut_off_time').wickedpicker({

            now: odfl_current_time,
            title: 'Cut Off Time'
        });
    }

    var delivery_estimate_val = jQuery('input[name=odfl_delivery_estimates]:checked').val();
    if (delivery_estimate_val == 'dont_show_estimates') {
        jQuery("#odfl_freight_order_cut_off_time").prop('disabled', true);
        jQuery("#odfl_freight_shipment_offset_days").prop('disabled', true);
        jQuery("#odfl_freight_shipment_offset_days").css("cursor", "not-allowed");
        jQuery("#odfl_freight_order_cut_off_time").css("cursor", "not-allowed");
    } else {
        jQuery("#odfl_freight_order_cut_off_time").prop('disabled', false);
        jQuery("#odfl_freight_shipment_offset_days").prop('disabled', false);
        // jQuery("#odfl_freight_order_cut_off_time").css("cursor", "auto");
        jQuery("#odfl_freight_order_cut_off_time").css("cursor", "");
    }

    jQuery("input[name=odfl_delivery_estimates]").change(function () {
        var delivery_estimate_val = jQuery('input[name=odfl_delivery_estimates]:checked').val();
        if (delivery_estimate_val == 'dont_show_estimates') {
            jQuery("#odfl_freight_order_cut_off_time").prop('disabled', true);
            jQuery("#odfl_freight_shipment_offset_days").prop('disabled', true);
            jQuery("#odfl_freight_order_cut_off_time").css("cursor", "not-allowed");
            jQuery("#odfl_freight_shipment_offset_days").css("cursor", "not-allowed");
        } else {
            jQuery("#odfl_freight_order_cut_off_time").prop('disabled', false);
            jQuery("#odfl_freight_shipment_offset_days").prop('disabled', false);
            jQuery("#odfl_freight_order_cut_off_time").css("cursor", "auto");
            jQuery("#odfl_freight_shipment_offset_days").css("cursor", "auto");
        }
    });

    /*
     * Uncheck Week days Select All Checkbox
     */
    jQuery(".odfl_shipment_day").on('change load', function () {

        var checkboxes = jQuery('.odfl_shipment_day:checked').length;
        var un_checkboxes = jQuery('.odfl_shipment_day').length;
        if (checkboxes === un_checkboxes) {
            jQuery('.all_shipment_days_odfl').prop('checked', true);
        } else {
            jQuery('.all_shipment_days_odfl').prop('checked', false);
        }
    });

    /*
     * Select All Shipment Week days
     */

    var all_int_checkboxes = jQuery('.all_shipment_days_odfl');
    if (all_int_checkboxes.length === all_int_checkboxes.filter(":checked").length) {
        jQuery('.all_shipment_days_odfl').prop('checked', true);
    }

    jQuery(".all_shipment_days_odfl").change(function () {
        if (this.checked) {
            jQuery(".odfl_shipment_day").each(function () {
                this.checked = true;
            });
        } else {
            jQuery(".odfl_shipment_day").each(function () {
                this.checked = false;
            });
        }
    });


    //** End: Order Cut Off Time
    jQuery("#en_ignore_items_through_freight_classification").closest('tr').addClass("en_ignore_items_through_freight_classification");

    // JS for edit product nested fields
    jQuery("._nestedMaterials").closest('p').addClass("_nestedMaterials_tr");
    jQuery("._nestedPercentage").closest('p').addClass("_nestedPercentage_tr");
    jQuery("._maxNestedItems").closest('p').addClass("_maxNestedItems_tr");
    jQuery("._nestedDimension").closest('p').addClass("_nestedDimension_tr");
    jQuery("._nestedStakingProperty").closest('p').addClass("_nestedStakingProperty_tr");

    if (!jQuery('._nestedMaterials').is(":checked")) {
        jQuery('._nestedPercentage_tr').hide();
        jQuery('._nestedDimension_tr').hide();
        jQuery('._maxNestedItems_tr').hide();
        jQuery('._nestedDimension_tr').hide();
        jQuery('._nestedStakingProperty_tr').hide();
    } else {
        jQuery('._nestedPercentage_tr').show();
        jQuery('._nestedDimension_tr').show();
        jQuery('._maxNestedItems_tr').show();
        jQuery('._nestedDimension_tr').show();
        jQuery('._nestedStakingProperty_tr').show();
    }

    jQuery("._nestedPercentage").attr('min', '0');
    jQuery("._maxNestedItems").attr('min', '0');
    jQuery("._nestedPercentage").attr('max', '100');
    jQuery("._maxNestedItems").attr('max', '100');
    jQuery("._nestedPercentage").attr('maxlength', '3');
    jQuery("._maxNestedItems").attr('maxlength', '3');

    if (jQuery("._nestedPercentage").val() == '') {
        jQuery("._nestedPercentage").val(0);
    }

    jQuery("._nestedPercentage").keydown(function (eve) {
        Odfl_lfq_stop_special_characters(eve);
        var nestedPercentage = jQuery('._nestedPercentage').val();
        if (nestedPercentage.length == 2) {
            var newValue = nestedPercentage + '' + eve.key;
            if (newValue > 100) {
                return false;
            }
        }
    });

    jQuery("._nestedDimension").keydown(function (eve) {
        Odfl_lfq_stop_special_characters(eve);
        var nestedDimension = jQuery('._nestedDimension').val();
        if (nestedDimension.length == 2) {
            var newValue1 = nestedDimension + '' + eve.key;
            if (newValue1 > 100) {
                return false;
            }
        }
    });

    jQuery("._maxNestedItems").keydown(function (eve) {
        Odfl_lfq_stop_special_characters(eve);
    });

    jQuery("._nestedMaterials").change(function () {
        if (!jQuery('._nestedMaterials').is(":checked")) {
            jQuery('._nestedPercentage_tr').hide();
            jQuery('._nestedDimension_tr').hide();
            jQuery('._maxNestedItems_tr').hide();
            jQuery('._nestedDimension_tr').hide();
            jQuery('._nestedStakingProperty_tr').hide();
        } else {
            jQuery('._nestedPercentage_tr').show();
            jQuery('._nestedDimension_tr').show();
            jQuery('._maxNestedItems_tr').show();
            jQuery('._nestedDimension_tr').show();
            jQuery('._nestedStakingProperty_tr').show();
        }
    });

    // Backup rates settings UI
    odflBackupRatesSettings();

    jQuery("#odfl_residential").closest('tr').addClass("odfl_residential");
    jQuery("#avaibility_auto_residential").closest('tr').addClass("avaibility_auto_residential");
    jQuery("#avaibility_lift_gate").closest('tr').addClass("avaibility_lift_gate");
    jQuery("#odfl_liftgate").closest('tr').addClass("odfl_liftgate");
    jQuery("#odfl_quotes_liftgate_delivery_as_option").closest('tr').addClass("odfl_quotes_liftgate_delivery_as_option");
    jQuery("#odfl_handling_fee").closest('tr').addClass("odfl_handling_fee_tr");
    jQuery("#odfl_allow_other_plugins").closest('tr').addClass("odfl_allow_other_plugins_tr");
    jQuery("#odfl_label_as").closest('tr').addClass("odfl_label_as_tr");
    // inside delivery
    jQuery('#odfl_accessorial_inside_delivery').closest('tr').addClass("odfl_accessorial_inside_delivery");
    jQuery('#odfl_inside_delivery_as_option').closest('tr').addClass("odfl_inside_delivery_as_option");

    jQuery("#odfl_freight_hold_at_terminal_checkbox_status").closest('tr').addClass("odfl_odfl_freight_hold_at_terminal");
    jQuery("#odfl_freight_hold_at_terminal_fee").closest('tr').addClass("odfl_freight_hold_at_terminal_fee_tr");
    jQuery("#handling_weight_odfl").closest('tr').addClass("odfl_freight_cutt_off_time_ship_date_offset");
    jQuery("#maximum_handling_weight_odfl").closest('tr').addClass("odfl_freight_cutt_off_time_ship_date_offset");

    /**
     * Offer lift gate delivery as an option and Always include residential delivery fee
     * @returns {undefined}
     */
    jQuery(".checkbox_fr_add").on("click", function () {
        var id = jQuery(this).attr("id");
        if (id == "odfl_liftgate") {
            jQuery("#odfl_quotes_liftgate_delivery_as_option").prop({checked: false});
            jQuery("#en_woo_addons_liftgate_with_auto_residential").prop({checked: false});

        } else if (id == "odfl_quotes_liftgate_delivery_as_option" ||
            id == "en_woo_addons_liftgate_with_auto_residential") {
            jQuery("#odfl_liftgate").prop({checked: false});
        }
    });

    // Inside delivery
    jQuery('.odfl_inside_delivery_service').on('change', function () {
        jQuery(this.id == 'odfl_accessorial_inside_delivery' ? "#odfl_inside_delivery_as_option" : "#odfl_accessorial_inside_delivery").prop({checked: false});
    });

    jQuery("#odfl_label_as, #odfl_freight_hold_at_terminal_fee , #odfl_freight_settings_handling_weight , #odfl_handling_fee").focus(function (e) {
        jQuery("#" + this.id).css({'border-color': '#ddd'});
    });


    var url = getUrlVarsODFL()["tab"];
    if (url === 'odfl_quotes') {
        jQuery('#footer-left').attr('id', 'wc-footer-left');
    }

    /*
     * Add err class on connection settings page
     */
    jQuery('.connection_section_class_odfl input[type="text"]').each(function () {
        if (jQuery(this).parent().find('.err').length < 1) {
            jQuery(this).after('<span class="err"></span>');
        }
    });


    /*
     * Show Note Message on Connection Settings Page
     */

    jQuery('.connection_section_class_odfl .form-table').before("<div class='warning-msg'><p>Note! You must have an Old Dominion Freight Lines account to use this application. if you don't have one, contact Old Dominion Freight Lines at 800-235-5569, or email <a href='mailto:customer.service@odfl.com' target='_parent' >customer.service@odfl.com</a>.</p></div>");


    /*
     * Add maxlength Attribute on Handling Fee Quote Setting Page
     */

    jQuery("#handling_weight_odfl").attr('maxlength', '7');
    jQuery("#maximum_handling_weight_odfl").attr('maxlength', '7');
    jQuery("#odfl_handling_fee").attr('maxlength', '7');

    /*
     * Add maxlength Attribute on Account Number Connection Setting Page
     */

    jQuery("#wc_settings_odfl_account_no").attr('maxlength', '8');

    /*
     * Add Title To Connection Setting Fields
     */
    jQuery('#wc_settings_odfl_username').attr('title', 'Username');
    jQuery('#wc_settings_odfl_password').attr('title', 'Password');
    jQuery('#wc_settings_odfl_account_no').attr('title', 'Account Number');
    jQuery('#wc_settings_odfl_plugin_licence_key').attr('title', 'Eniture API Key');
    jQuery('#billing_zip_code_key_odfl').attr('title', 'Billing Postal Code ');
    jQuery('#billing_zip_code_key_odfl').attr('data-optional', '1');

    jQuery('#wc_settings_odfl_third_party_acc').attr('title', 'Third Party Account Number');
    jQuery('#wc_settings_odfl_third_party_acc').attr('data-optional', '1');

    /*
     * Add Title To Qoutes Setting Fields
     */

    jQuery('#odfl_label_as').attr('title', 'Label As');
    jQuery('#odfl_handling_fee').attr('title', 'Handling Fee / Markup');

    jQuery(".connection_section_class_odfl .button-primary, .connection_section_class_odfl .is-primary").click(function () {
        var input = validateInput('.connection_section_class_odfl');
        if (input === false)
            return false;

    });

    jQuery(".connection_section_class_odfl .woocommerce-save-button").before('<a href="javascript:void(0)" class="button-primary odfl_test_connection is-primary">Test connection</a>');

    /**
     * ODFL Test connection Form Valdating ajax Request
     */
    jQuery('.odfl_test_connection').click(function (e) {
        var input = validateInput('.connection_section_class_odfl');
        if (input === false)
            return false;

        var postForm = {
            'action': 'odfl_action',
            'odfl_username': jQuery('#wc_settings_odfl_username').val(),
            'odfl_password': jQuery('#wc_settings_odfl_password').val(),
            'odfl_accountno': jQuery('#wc_settings_odfl_account_no').val(),
            'odfl_plugin_license': jQuery('#wc_settings_odfl_plugin_licence_key').val(),
            'billing_zip_code': jQuery('#billing_zip_code_key_odfl').val()
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: postForm,
            dataType: 'json',

            beforeSend: function () {
                jQuery(".connection_save_button").remove();
                jQuery('#wc_settings_odfl_username').css('background', 'rgba(255, 255, 255, 1) url("' + en_odfl_admin_script.plugins_url + '/ltl-freight-quotes-odfl-edition/warehouse-dropship/wild/assets/images/processing.gif") no-repeat scroll 50% 50%');
                jQuery('#wc_settings_odfl_password').css('background', 'rgba(255, 255, 255, 1) url("' + en_odfl_admin_script.plugins_url + '/ltl-freight-quotes-odfl-edition/warehouse-dropship/wild/assets/images/processing.gif") no-repeat scroll 50% 50%');
                jQuery('#wc_settings_odfl_account_no').css('background', 'rgba(255, 255, 255, 1) url("' + en_odfl_admin_script.plugins_url + '/ltl-freight-quotes-odfl-edition/warehouse-dropship/wild/assets/images/processing.gif") no-repeat scroll 50% 50%');
                jQuery('#wc_settings_odfl_plugin_licence_key').css('background', 'rgba(255, 255, 255, 1) url("' + en_odfl_admin_script.plugins_url + '/ltl-freight-quotes-odfl-edition/warehouse-dropship/wild/assets/images/processing.gif") no-repeat scroll 50% 50%');
            },
            success: function (data) {
                jQuery('#wc_settings_odfl_username').css('background', '#fff');
                jQuery('#wc_settings_odfl_password').css('background', '#fff');
                jQuery('#wc_settings_odfl_account_no').css('background', '#fff');
                jQuery('#wc_settings_odfl_plugin_licence_key').css('background', '#fff');
                jQuery(".odfl_success_message").remove();
                jQuery(".odfl_error_message").remove();
                jQuery("#message").remove();

                if (data.message === "success") {
                    jQuery('.warning-msg').before('<div class="notice notice-success odfl_success_message"><p><strong>Success!</strong> The test resulted in a successful connection.</p></div>');
                } else if (data.message == "Username or Password is not valid.") {
                    jQuery('.warning-msg').before('<div class="notice notice-error odfl_error_message"><p><strong>Error! </strong>Please verify credentials and try again. </p></div>');
                } else {
                    jQuery('.warning-msg').before('<div class="notice notice-error odfl_error_message"><p><strong>Error! </strong>' + data.message + ' </p></div>');
                }
            }
        });
        e.preventDefault();
    });
    // fdo va
    jQuery('#fd_online_id_odfl').click(function (e) {
        var postForm = {
            'action': 'odfl_fd',
            'company_id': jQuery('#freightdesk_online_id').val(),
            'disconnect': jQuery('#fd_online_id_odfl').attr("data")
        }
        var id_lenght = jQuery('#freightdesk_online_id').val();
        var disc_data = jQuery('#fd_online_id_odfl').attr("data");
        if(typeof (id_lenght) != "undefined" && id_lenght.length < 1) {
            jQuery(".odfl_error_message").remove();
            jQuery('.user_guide_fdo').before('<div class="notice notice-error odfl_error_message"><p><strong>Error!</strong> FreightDesk Online ID is Required.</p></div>');
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: postForm,
            beforeSend: function () {
                jQuery('#freightdesk_online_id').css('background', 'rgba(255, 255, 255, 1) url("' + en_odfl_admin_script.plugins_url + '/ltl-freight-quotes-odfl-edition/warehouse-dropship/wild/assets/images/processing.gif") no-repeat scroll 50% 50%');
            },
            success: function (data_response) {
                if(typeof (data_response) == "undefined"){
                    return;
                }
                var fd_data = JSON.parse(data_response);
                jQuery('#freightdesk_online_id').css('background', '#fff');
                jQuery(".odfl_error_message").remove();
                if((typeof (fd_data.is_valid) != 'undefined' && fd_data.is_valid == false) || (typeof (fd_data.status) != 'undefined' && fd_data.is_valid == 'ERROR')) {
                    jQuery('.user_guide_fdo').before('<div class="notice notice-error odfl_error_message"><p><strong>Error! ' + fd_data.message + '</strong></p></div>');
                }else if(typeof (fd_data.status) != 'undefined' && fd_data.status == 'SUCCESS') {
                    jQuery('.user_guide_fdo').before('<div class="notice notice-success odfl_success_message"><p><strong>Success! ' + fd_data.message + '</strong></p></div>');
                    window.location.reload(true);
                }else if(typeof (fd_data.status) != 'undefined' && fd_data.status == 'ERROR') {
                    jQuery('.user_guide_fdo').before('<div class="notice notice-error odfl_error_message"><p><strong>Error! ' + fd_data.message + '</strong></p></div>');
                }else if (fd_data.is_valid == 'true') {
                    jQuery('.user_guide_fdo').before('<div class="notice notice-error odfl_error_message"><p><strong>Error!</strong> FreightDesk Online ID is not valid.</p></div>');
                } else if (fd_data.is_valid == 'true' && fd_data.is_connected) {
                    jQuery('.user_guide_fdo').before('<div class="notice notice-error odfl_error_message"><p><strong>Error!</strong> Your store is already connected with FreightDesk Online.</p></div>');

                } else if (fd_data.is_valid == true && fd_data.is_connected == false && fd_data.redirect_url != null) {
                    window.location = fd_data.redirect_url;
                } else if (fd_data.is_connected == true) {
                    jQuery('#con_dis').empty();
                    jQuery('#con_dis').append('<a href="#" id="fd_online_id_odfl" data="disconnect" class="button-primary">Disconnect</a>')
                }
            }
        });
        e.preventDefault();
    });
    /**
     * ODFL Qoute Settings Tabs Validation
     */

    jQuery('.quote_section_class_odfl .button-primary, .quote_section_class_odfl .is-primary').on('click', function () {
        jQuery(".updated").hide();
        jQuery('.error').remove();

        if (!odfl_label_validation()) {
            return false;
        }
        if (!odfl_handling_unit_validation('handling_weight_odfl')) {
            return false;
        }
        if (!odfl_handling_unit_validation('maximum_handling_weight_odfl')) {
            return false;
        }
        if (!odfl_handling_fee_validation()) {
            return false;
        }
        if (!odfl_free_ship_class()) {
            return false;
        }
        if (!odfl_freight_hold_at_terminal_fee_validation()) {
            return false;
        }

        // backup rates validations
        if (!odflBackupRatesValidations()) return false;

        var Error = true;
        var handling_fee = jQuery('#odfl_handling_fee').val();

        /*Custom Error Message Validation*/
        var checkedValCustomMsg = jQuery("input[name='wc_pervent_proceed_checkout_eniture']:checked").val();
        var allow_proceed_checkout_eniture = jQuery("textarea[name=allow_proceed_checkout_eniture]").val();
        var prevent_proceed_checkout_eniture = jQuery("textarea[name=prevent_proceed_checkout_eniture]").val();

        if (checkedValCustomMsg == 'allow' && jQuery.trim(allow_proceed_checkout_eniture) == '') {
            jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_custom_error_message"><p><strong>Error! </strong>Custom message field is empty.</p></div>');
            jQuery('html, body').animate({
                'scrollTop': jQuery('.odfl_custom_error_message').position().top
            });
            Error = false;
        } else if (checkedValCustomMsg == 'prevent' && jQuery.trim(prevent_proceed_checkout_eniture) == '') {
            jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_custom_error_message"><p><strong>Error! </strong>Custom message field is empty.</p></div>');
            jQuery('html, body').animate({
                'scrollTop': jQuery('.odfl_custom_error_message').position().top
            });
            Error = false;
        }

        return Error;
    });

    jQuery("#en_wd_origin_markup, #en_wd_dropship_markup, ._en_product_markup").keydown(function (e) {
        if ((e.keyCode === 109 || e.keyCode === 189) && (jQuery(this).val().length>0) )  return false;
        if (e.keyCode === 53) if (e.shiftKey) if(jQuery(this).val().length==0)   return false; 
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 189, 109]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode === 53 && e.shiftKey) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        // if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        //     e.preventDefault();
        // }
    
        if ((jQuery(this).val().indexOf('.') != -1) && (jQuery(this).val().substring(jQuery(this).val().indexOf('.'), jQuery(this).val().indexOf('.').length).length > 2)) {
            if (e.keyCode !== 8 && e.keyCode !== 46) { //exception
                e.preventDefault();
            }
        }
        
        if(jQuery(this).val().length > 7){
            e.preventDefault();
        }
    
    });
    
    jQuery("#en_wd_origin_markup, #en_wd_dropship_markup, ._en_product_markup").keyup(function (e) {
        var val = jQuery(this).val();
    
        if (val.split('.').length - 1 > 1) {
    
            var newval = val.substring(0, val.length - 1);
            var countDots = newval.substring(newval.indexOf('.') + 1).length;
            newval = newval.substring(0, val.length - countDots - 1);
            jQuery(this).val(newval);
        }
    
        if (val.split('%').length - 1 > 1) {
            var newval = val.substring(0, val.length - 1);
            var countPercentages = newval.substring(newval.indexOf('%') + 1).length;
            newval = newval.substring(0, val.length - countPercentages - 1);
            jQuery(this).val(newval);
        }
    });
    
    jQuery("#en_wd_origin_markup,#en_wd_dropship_markup,._en_product_markup").bind("cut copy paste",function(e) {
        e.preventDefault();
     });
     
    jQuery("#en_wd_origin_markup,#en_wd_dropship_markup,._en_product_markup").keypress(function (e) {
     if (!String.fromCharCode(e.keyCode).match(/^[-0-9\d\.%\s]+$/i)) return false;
    });

    jQuery("#handling_weight_odfl, #maximum_handling_weight_odfl").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)|| e.keyCode == 109) {
            // let it happen, don't do anything
            return;
        }
        
        // Ensure that it is a number and stop the keypress
        if ((e.keyCode === 190 || e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    
        if ((jQuery(this).val().indexOf('.') != -1) && (jQuery(this).val().substring(jQuery(this).val().indexOf('.'), jQuery(this).val().indexOf('.').length).length > 2)) {
            if (event.keyCode !== 8 && event.keyCode !== 46) { //exception
                event.preventDefault();
            }
        }
    });
        
    jQuery("#handling_weight_odfl,#maximum_handling_weight_odfl").keyup(function (e) {
        var val = jQuery(this).val();
        if (val.split('.').length - 1 > 1) {
            var newval = val.substring(0, val.length - 1);
            var countDots = newval.substring(newval.indexOf('.') + 1).length;
            newval = newval.substring(0, val.length - countDots - 1);
            jQuery(this).val(newval);
        }
    });
    
    // Product variants settings
    jQuery(document).on("click", '._nestedMaterials', function(e) {
        const checkbox_class = jQuery(e.target).attr("class");
        const name = jQuery(e.target).attr("name");
        const checked = jQuery(e.target).prop('checked');

        if (checkbox_class?.includes('_nestedMaterials')) {
            const id = name?.split('_nestedMaterials')[1];
            setNestMatDisplay(id, checked);
        }
    });

    // Callback function to execute when mutations are observed
    const handleMutations = (mutationList) => {
        let childs = [];
        for (const mutation of mutationList) {
            childs = mutation?.target?.children;
            if (childs?.length) setNestedMaterialsUI();
          }
    };
    const observer = new MutationObserver(handleMutations),
        targetNode = document.querySelector('.woocommerce_variations.wc-metaboxes'),
        config = { childList: true, subtree: true };
    if (targetNode) observer.observe(targetNode, config);

});

// Weight threshold for LTL freight
if (typeof en_weight_threshold_limit != 'function') {
    function en_weight_threshold_limit() {
        // Weight threshold for LTL freight
        jQuery("#en_weight_threshold_lfq").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g) || !jQuery("#en_weight_threshold_lfq").val().match(/^\d{0,3}$/)) return false;
        });

        jQuery('#en_plugins_return_LTL_quotes').on('change', function () {
            if (jQuery('#en_plugins_return_LTL_quotes').prop("checked")) {
                jQuery('tr.en_weight_threshold_lfq').css('display', 'contents');
                jQuery('tr.en_suppress_parcel_rates').css('display', '');
            } else {
                jQuery('tr.en_weight_threshold_lfq').css('display', 'none');
                jQuery('tr.en_suppress_parcel_rates').css('display', 'none');
            }
        });

        jQuery("#en_plugins_return_LTL_quotes").closest('tr').addClass("en_plugins_return_LTL_quotes_tr");
        // Weight threshold for LTL freight
        var weight_threshold_class = jQuery("#en_weight_threshold_lfq").attr("class");
        jQuery("#en_weight_threshold_lfq").closest('tr').addClass("en_weight_threshold_lfq " + weight_threshold_class);

        // Weight threshold for LTL freight is empty
        if (jQuery('#en_weight_threshold_lfq').length && !jQuery('#en_weight_threshold_lfq').val().length > 0) {
            jQuery('#en_weight_threshold_lfq').val(150);
        }

        // Suppress parcel rates when thresold is met
        jQuery(".en_suppress_parcel_rates").closest('tr').addClass("en_suppress_parcel_rates");
        !jQuery("#en_plugins_return_LTL_quotes").is(":checked") ? jQuery('tr.en_suppress_parcel_rates').css('display', 'none') : jQuery('tr.en_suppress_parcel_rates').css('display', '');
    }
}

// Update plan
if (typeof en_update_plan != 'function') {
    function en_update_plan(input) {
        let action = jQuery(input).attr('data-action');
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: {action: action},
            success: function (data_response) {
                window.location.reload(true);
            }
        });
    }
}

function odfl_handling_fee_validation() {
    var handling_fee = jQuery('#odfl_handling_fee').val();
    var handling_fee_regex = /^(-?[0-9]{1,4}%?)$|(\.[0-9]{1,2})%?$/;
    if (handling_fee != '' && !handling_fee_regex.test(handling_fee)) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_handlng_fee_error"><p><strong>Error! </strong>Handling fee format should be 100.20 or 10%.</p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_handlng_fee_error').position().top
        });
        jQuery("#odfl_handling_fee").css({'border-color': '#e81123'});
        return false;
    } else {
        return true;
    }
}

function odfl_handling_unit_validation(field) {
    var handling_unit = jQuery('#' + field).val();
    var handling_unit_regex = /^([0-9]{1,4})*(\.[0-9]{0,2})?$/;
    const title = field == 'handling_weight_odfl' ? 'Weight of Handling Unit' : 'Maximum Weight per Handling Unit'; 
    if (handling_unit != '' && !handling_unit_regex.test(handling_unit)) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_handlng_fee_error"><p><strong>Error! </strong>' + title + ' format should be 100.20 or 10.</p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_handlng_fee_error').position().top
        });
        jQuery("#" + field).css({'border-color': '#e81123'});
        
        return false;
    } else {
        return true;
    }
}

function odfl_free_ship_class() {
    var en_ship_class = jQuery('#en_ignore_items_through_freight_classification').val();
    var en_ship_class_arr = en_ship_class.split(',');
    var en_ship_class_trim_arr = en_ship_class_arr.map(Function.prototype.call, String.prototype.trim);
    if (en_ship_class_trim_arr.indexOf('ltl_freight') != -1) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_free_ship_error"><p><strong>Error! </strong>Shipping Slug of <b>ltl_freight</b> can not be ignored.</p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_free_ship_error').position().top
        });
        jQuery("#en_ignore_items_through_freight_classification").css({'border-color': '#e81123'});
        return false;
    } else {
        return true;
    }
}

// Validation hold at terminal
function odfl_freight_hold_at_terminal_fee_validation() {
    var odfl_hold_at_terminal_fee = jQuery('#odfl_freight_hold_at_terminal_fee').val();
    var odfl_hold_at_terminal_fee_regex = /^(-?[0-9]{1,4}%?)$|(\.[0-9]{1,2})%?$/;
    if (odfl_hold_at_terminal_fee != '' && !odfl_hold_at_terminal_fee_regex.test(odfl_hold_at_terminal_fee) || odfl_hold_at_terminal_fee.split('.').length - 1 > 1) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_freight_hold_at_terminal_fee_error"><p><strong>Hold at terminal fee format should be 100.20 or 10%.</strong></p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_freight_hold_at_terminal_fee_error').position().top
        });
        jQuery("#odfl_freight_hold_at_terminal_fee").css({'border-color': '#e81123'});
        return false;
    } else {
        return true;
    }
}

function odfl_label_validation() {
    var label_value = jQuery('#odfl_label_as').val();
    var labelRegex = /^[a-zA-Z0-9 ]*$/;
    if (label_value.length > 25) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_label_error"><p><strong>Error! </strong>Maximum 25 characters are allowed for label field.</p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_label_error').position().top
        });
        jQuery("#odfl_label_as").css({'border-color': '#e81123'});
        return false;
    } else if (label_value != '' && !labelRegex.test(label_value)) {
        jQuery("#mainform .quote_section_class_odfl").prepend('<div id="message" class="error inline odfl_label_error"><p><strong>Error! </strong>No special characters allowed for label field.</p></div>');
        jQuery('html, body').animate({
            'scrollTop': jQuery('.odfl_label_error').position().top
        });
        jQuery("#odfl_label_as").css({'border-color': '#e81123'});
        return false;
    } else {
        return true;
    }
}


/**
 * Read a page's GET URL variables and return them as an associative array.
 */
function getUrlVarsODFL() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


/**
 * ODFL Form Validating Inputs
 * @param form_id
 * @return string
 */
function validateInput(form_id) {
    var has_err = true;
    jQuery(form_id + " input[type='text']").each(function () {

        var input = jQuery(this).val();
        var response = validateString(input);
        var errorText = jQuery(this).attr('title');
        var optional = jQuery(this).data('optional');

        var errorElement = jQuery(this).parent().find('.err');
        jQuery(errorElement).html('');

        optional = (optional === undefined) ? 0 : 1;
        errorText = (errorText != undefined) ? errorText : '';

        if ((optional == 0) && (response == false || response == 'empty')) {
            errorText = (response == 'empty') ? errorText + ' is required.' : 'Invalid input.';
            jQuery(errorElement).html(errorText);
        }
        has_err = (response != true && optional == 0) ? false : has_err;
    });
    return has_err;
}

/**
 * ODFL Validating Numbers
 */
function isValidNumber(value, noNegative) {
    if (typeof (noNegative) === 'undefined')
        noNegative = false;
    var isValidNumber = false;
    var validNumber = (noNegative == true) ? parodfloat(value) >= 0 : true;
    if ((value == parseInt(value) || value == parodfloat(value)) && (validNumber)) {
        if (value.indexOf(".") >= 0) {
            var n = value.split(".");
            if (n[n.length - 1].length <= 4) {
                isValidNumber = true;
            } else {
                isValidNumber = 'decimal_point_err';
            }
        } else {
            isValidNumber = true;
        }
    }
    return isValidNumber;
}

/**
 * ODFL Validating String
 */
function validateString(string) {
    if (string == '')
        return 'empty';
    else
        return true;

}

/*Custom Error Message*/
jQuery(document).ready(function () {
    var prevent_text_box = jQuery('.prevent_text_box').length;
    if (!prevent_text_box > 0) {
        jQuery("input[name*='wc_pervent_proceed_checkout_eniture']").closest('tr').addClass('wc_pervent_proceed_checkout_eniture');
        jQuery(".wc_pervent_proceed_checkout_eniture input[value*='allow']").after('<div class="allow_custom_message"><span>Allow user to continue to check out and display this message </span></div><br><textarea  name="allow_proceed_checkout_eniture" class="prevent_text_box" title="Message" maxlength="250">' + en_odfl_admin_script.allow_proceed_checkout_eniture + '</textarea> <span class="description"> Enter a maximum of 250 characters.</span>');
        jQuery(".wc_pervent_proceed_checkout_eniture input[value*='prevent']").after('<div class="allow_custom_message"><span>Prevent user from checking out and display this message</span></div> <br><textarea name="prevent_proceed_checkout_eniture" class="prevent_text_box" title="Message" maxlength="250">' + en_odfl_admin_script.prevent_proceed_checkout_eniture + '</textarea> <span class="description"> Enter a maximum of 250 characters.</span>');
    }
});

function Odfl_lfq_stop_special_characters(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if (jQuery.inArray(e.keyCode, [46, 9, 27, 13, 110, 190, 189]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        e.preventDefault();
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 90)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode != 186 && e.keyCode != 8) {
        e.preventDefault();
    }
    if (e.keyCode == 186 || e.keyCode == 190 || e.keyCode == 189 || (e.keyCode > 64 && e.keyCode < 91)) {
        e.preventDefault();
        return;
    }
}

if (typeof setNestedMaterialsUI != 'function') {
    function setNestedMaterialsUI() {
        const nestedMaterials = jQuery('._nestedMaterials');
        const productMarkups = jQuery('._en_product_markup');
        
        if (productMarkups?.length) {
            for (const markup of productMarkups) {
                jQuery(markup).attr('maxlength', '7');

                jQuery(markup).keypress(function (e) {
                    if (!String.fromCharCode(e.keyCode).match(/^[0-9.%-]+$/))
                        return false;
                });
            }
        }

        if (nestedMaterials?.length) {
            for (let elem of nestedMaterials) {
                const className = elem.className;

                if (className?.includes('_nestedMaterials')) {
                    const checked = jQuery(elem).prop('checked'),
                        name = jQuery(elem).attr('name'),
                        id = name?.split('_nestedMaterials')[1];
                    setNestMatDisplay(id, checked);
                }
            }
        }
    }
}

if (typeof setNestMatDisplay != 'function') {
    function setNestMatDisplay (id, checked) {
        
        jQuery(`input[name="_nestedPercentage${id}"]`).attr('min', '0');
        jQuery(`input[name="_nestedPercentage${id}"]`).attr('max', '100');
        jQuery(`input[name="_nestedPercentage${id}"]`).attr('maxlength', '3');
        jQuery(`input[name="_maxNestedItems${id}"]`).attr('min', '0');
        jQuery(`input[name="_maxNestedItems${id}"]`).attr('max', '100');
        jQuery(`input[name="_maxNestedItems${id}"]`).attr('maxlength', '3');

        jQuery(`input[name="_nestedPercentage${id}"], input[name="_maxNestedItems${id}"]`).keypress(function (e) {
            if (!String.fromCharCode(e.keyCode).match(/^[0-9]+$/))
                return false;
        });

        jQuery(`input[name="_nestedPercentage${id}"]`).closest('p').css('display', checked ? '' : 'none');
        jQuery(`select[name="_nestedDimension${id}"]`).closest('p').css('display', checked ? '' : 'none');
        jQuery(`input[name="_maxNestedItems${id}"]`).closest('p').css('display', checked ? '' : 'none');
        jQuery(`select[name="_nestedStakingProperty${id}"]`).closest('p').css('display', checked ? '' : 'none');
    }
}

if (typeof odflBackupRatesSettings != 'function') {
    function odflBackupRatesSettings() {
        jQuery('input[name*="odfl_backup_rates_category"]').closest('tr').addClass("odfl_backup_rates_category");
        // backup rates as a fixed rate
        jQuery(".odfl_backup_rates_category input[value*='fixed_rate']").after('Backup rate as a fixed rate. <br /><input type="text" style="margin-top: 10px" name="odfl_backup_rates_fixed_rate" id="odfl_backup_rates_fixed_rate" title="Backup Rates" maxlength="50" value="' + en_odfl_admin_script.odfl_backup_rates_fixed_rate + '"> <br> <span class="description"> Enter a value for the fixed rate. (e.g. 10.00)</span><br />');
        // backup rates as a percentage of cart price
        jQuery(".odfl_backup_rates_category input[value*='percentage_of_cart_price']").after('Backup rate as a percentage of Cart price. <br /><input type="text" style="margin-top: 10px" name="odfl_backup_rates_cart_price_percentage" id="odfl_backup_rates_cart_price_percentage" title="Backup Rates" maxlength="50" value="' + en_odfl_admin_script.odfl_backup_rates_cart_price_percentage + '"> <br> <span class="description"> Enter a percentage for the backup rate. (e.g. 10.0%)</span><br />');
        // backup rates as a function of cart weight
        jQuery(".odfl_backup_rates_category input[value*='function_of_weight']").after('Backup rate as a function of the Cart weight. <br /><input type="text" style="margin-top: 10px" name="odfl_backup_rates_weight_function" id="odfl_backup_rates_weight_function" title="Backup Rates" maxlength="50" value="' + en_odfl_admin_script.odfl_backup_rates_weight_function + '"> <br> <span class="description"> Enter a rate per pound to use for the backup rate. (e.g. 2.00)</span><br />');

        jQuery('#odfl_backup_rates_label').attr('maxlength', '50');
        jQuery('#odfl_backup_rates_fixed_rate, #odfl_backup_rates_cart_price_percentage, #odfl_backup_rates_weight_function').attr('maxlength', '10');
        jQuery('#odfl_backup_rates_carrier_fails_to_return_response, #odfl_backup_rates_carrier_returns_error').closest('td').css('padding', '0px 10px');

        jQuery("#odfl_backup_rates_fixed_rate, #odfl_backup_rates_weight_function").keypress(function (e) {
            if (!String.fromCharCode(e.keyCode).match(/^[0-9\d\.\s]+$/i)) return false;
        });
        jQuery("#odfl_backup_rates_cart_price_percentage").keypress(function (e) {
            if (!String.fromCharCode(e.keyCode).match(/^[0-9\d\.%\s]+$/i)) return false;
        });
        jQuery('#odfl_backup_rates_fixed_rate, #odfl_backup_rates_cart_price_percentage, #odfl_backup_rates_weight_function').keyup(function () {
            var val = jQuery(this).val();
            var regex = /\./g;
            var count = (val.match(regex) || []).length;
            
            if (count > 1) {
                val = val.replace(/\.+$/, '');
                jQuery(this).val(val);
            }
        });
    }
}

if (typeof odflBackupRatesValidations != 'function') {
    function odflBackupRatesValidations() {
        if (jQuery('#enable_backup_rates_odfl').is(':checked')) {
            let error_msg = '', field_id = '';
            if (jQuery('#odfl_backup_rates_label').val() == '') {
                error_msg = 'Backup rates label field is empty.';
                field_id = 'odfl_backup_rates_label';
            }

            const number_regex = /^([0-9]{1,4})$|(\.[0-9]{1,2})$/;
            const cart_price_regex = /^([0-9]{1,3}%?)$|(\.[0-9]{1,2})%?$/;
    
            if (!error_msg) {
                const backup_rates_type = jQuery('input[name="odfl_backup_rates_category"]:checked').val();
                if (backup_rates_type == 'fixed_rate' && jQuery('#odfl_backup_rates_fixed_rate').val() == '') {
                    error_msg = 'Backup rates as a fixed rate field is empty.';
                    field_id = 'odfl_backup_rates_fixed_rate';
                } else if (backup_rates_type == 'percentage_of_cart_price' && jQuery('#odfl_backup_rates_cart_price_percentage').val() == '') {
                    error_msg = 'Backup rates as a percentage of cart price field is empty.';
                    field_id = 'odfl_backup_rates_cart_price_percentage';
                } else if (backup_rates_type == 'function_of_weight' && jQuery('#odfl_backup_rates_weight_function').val() == '') {
                    error_msg = 'Backup rates as a function of weight field is empty.';
                    field_id = 'odfl_backup_rates_weight_function';
                } else if (jQuery('#odfl_backup_rates_fixed_rate').val() != '' && !number_regex.test(jQuery('#odfl_backup_rates_fixed_rate').val())) {
                    error_msg = 'Backup rates as a fixed rate format should be 100.20 or 10.';
                    field_id = 'odfl_backup_rates_fixed_rate';
                } else if (jQuery('#odfl_backup_rates_cart_price_percentage').val() != '' && !cart_price_regex.test(jQuery('#odfl_backup_rates_cart_price_percentage').val())) {
                    error_msg = 'Backup rates as a percentage of cart price format should be 100.20 or 10%.';
                    field_id = 'odfl_backup_rates_cart_price_percentage';
                } else if (jQuery('#odfl_backup_rates_weight_function').val() != '' && !number_regex.test(jQuery('#odfl_backup_rates_weight_function').val())) {
                    error_msg = 'Backup rates as a function of weight format should be 100.20 or 10.';
                    field_id = 'odfl_backup_rates_weight_function';
                }
            }
    
            if (error_msg) {
                jQuery('#mainform .quote_section_class_odfl').prepend('<div id="message" class="error inline handlng_fee_error"><p><strong>Error! </strong>' + error_msg + '</p></div>');
                jQuery('html, body').animate({
                    'scrollTop': jQuery('.handlng_fee_error').position().top
                }, 100);
                jQuery('#' + field_id).css({'border-color': '#e81123'});
                return false;
            }
        }

        return true;
    }
}