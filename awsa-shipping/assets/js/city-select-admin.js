jQuery(function ($) {
    if (typeof wc_enhanced_select_params === 'undefined' || typeof awsa_wc_city_select_params === 'undefined') {
        return false;
    }
    /** wc-settings page begin */
    $("select[name=woocommerce_default_country]").on('change', function () {
        var default_country_state = $('select[name=woocommerce_default_country]').val();
        var country = default_country_state.split(':')[0];
        var state = default_country_state.split(':')[1];

        var $container = $(this).closest('table');
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    /** wc-settings-page end */


    /** profile.php WC and Dokan start */
    function awsa_change_country_state_handler(e) {
        var el = e.currentTarget ? e.currentTarget : e;
        var $container = $(el).closest('table');

        var $country = $container.find("#billing_country, #shipping_country, [name='dokan_store_address[country]']");
        var country = $country.val();
        var $statebox = $container.find("#billing_state, #shipping_state, [name='dokan_store_address[state]']");
        var state = $statebox.val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    }

    $("#shipping_country, #billing_country, #shipping_state, #billing_state, [name='dokan_store_address[country]'], [name='dokan_store_address[state]']").on('change', awsa_change_country_state_handler);
    $(document).ready(function () {
        $.each($("#billing_city, #shipping_city"), function (i, v) {
            awsa_change_country_state_handler($(v));
        });
    });

    $('body').on('change', 'select.state_select:not(.city_select), #billing_state, #shipping_state, [name="dokan_store_address[state]"]', function () {
        var $container = $(this).closest('table');
        var country = $container.find('#billing_country, #shipping_country, #calc_shipping_country, #_billing_country, #_shipping_country, #_calc_shipping_country, [name="dokan_store_address[country]"]').val();
        var state = $(this).val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    /** profile.php WC and Dokan end */

    /** post.php post-new.php shop_order start */
    function awsa_change_order_country_state_handler(e) {
        var el = e.currentTarget ? e.currentTarget : e;
        var $container = $(el).closest('div');
        var $country = $container.find("#_billing_country, #_shipping_country");
        var country = $country.val();
        var $statebox = $container.find("#_billing_state, #_shipping_state");
        var state = $statebox.val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    }

    $("#_shipping_country, #_billing_country, #_shipping_state, #_billing_state").on('change', awsa_change_order_country_state_handler);
    $(document).ready(function () {
        $.each($("#_billing_city, #_shipping_city"), function (i, v) {
            awsa_change_order_country_state_handler($(v));
        });
    });

    $('body').on('change', '#_billing_state, #_shipping_state', function () {
        var $container = $(this).closest('div');
        var country = $container.find('#_billing_country, #_shipping_country').val();
        var state = $(this).val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    /** post.php post-new.php shop_order end */

    function getEnhancedSelectFormatString() {
        var formatString = {
            formatMatches: function (matches) {
                if (1 === matches) {
                    return wc_enhanced_select_params.i18n_matches_1;
                }

                return wc_enhanced_select_params.i18n_matches_n.replace('%qty%', matches);
            },
            formatNoMatches: function () {
                return wc_enhanced_select_params.i18n_no_matches;
            },
            formatAjaxError: function () {
                return wc_enhanced_select_params.i18n_ajax_error;
            },
            formatInputTooShort: function (input, min) {
                var number = min - input.length;

                if (1 === number) {
                    return wc_enhanced_select_params.i18n_input_too_short_1;
                }

                return wc_enhanced_select_params.i18n_input_too_short_n.replace('%qty%', number);
            },
            formatInputTooLong: function (input, max) {
                var number = input.length - max;

                if (1 === number) {
                    return wc_enhanced_select_params.i18n_input_too_long_1;
                }

                return wc_enhanced_select_params.i18n_input_too_long_n.replace('%qty%', number);
            },
            formatSelectionTooBig: function (limit) {
                if (1 === limit) {
                    return wc_enhanced_select_params.i18n_selection_too_long_1;
                }

                return wc_enhanced_select_params.i18n_selection_too_long_n.replace('%qty%', limit);
            },
            formatLoadMore: function () {
                return wc_enhanced_select_params.i18n_load_more;
            },
            formatSearching: function () {
                return wc_enhanced_select_params.i18n_searching;
            }
        };

        return formatString;
    }


    if ($().select2) {
        var wc_city_select_select2 = function () {
            $('select.city_select:visible, .edit_address:hidden .city_select').each(function () {
                var select2_args = $.extend({
                    placeholderOption: 'first',
                    /*width: '100%'*/
                }, getEnhancedSelectFormatString());

                $(this).select2(select2_args);
            });
        };
        wc_city_select_select2();

        $(document.body).bind('city_to_select', function () {
            wc_city_select_select2();
        });
    }

    /* City select boxes */
    var cities_json = awsa_wc_city_select_params.cities.replace(/&quot;/g, '"');
    var cities = $.parseJSON(cities_json);

    $('body').on('country_to_state_changing', function (e, country, $container) {
        var $statebox = $container.find('#billing_state, #shipping_state, #calc_shipping_state, #_billing_state, #_shipping_state, #_calc_shipping_state ,#_billing_state, #_shipping_state');
        var state = $statebox.val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    $('body').on('change', 'select.state_select:not(.city_select), #calc_shipping_state', function () {
        var $container = $(this).closest('table');
        var country = $container.find('#billing_country, #shipping_country, #calc_shipping_country, #_billing_country, #_shipping_country, #_calc_shipping_country').val();
        var state = $(this).val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    $('body').on('state_changing', function (e, country, state, $container) {
        var $citybox = $container.find("#billing_city, #shipping_city, #billing_city, #shipping_city, #_billing_city, #_shipping_city, #_billing_city, #_shipping_city, #woocommerce_store_city , [name='dokan_store_address[city]']");
        if (typeof cities[country] !== 'undefined') {
            /* if the country has no states */
            if (cities[country] instanceof Array) {
                awsa_convert_to_select($citybox, cities[country]);
            } else if (state) {
                if (typeof cities[country][state] !== 'undefined' && cities[country][state]) {
                    awsa_convert_to_select($citybox, cities[country][state]);
                } else {
                    awsa_convert_to_input($citybox);
                }
            } else {
                awsa_disable_city_field($citybox);
            }
        } else {
            awsa_convert_to_input($citybox);
        }
    });

    function awsa_convert_to_input($citybox) {
        if ($citybox.is('input')) {
            $citybox.prop('disabled', false);
            return;
        }

        var input_name = $citybox.attr('name');
        var input_id = $citybox.attr('id');
        var placeholder = $citybox.attr('placeholder');
        placeholder = (placeholder !== "undefined") ? placeholder : '';
        var value = $citybox.val();

        $citybox.parent().find('.select2-container').remove();

        $citybox.replaceWith('<input type="text" class="input-text regular-text" name="' + input_name + '" id="' + input_id + '" placeholder="' + placeholder + '" value="' + value + '"/>');
    }

    function awsa_disable_city_field($citybox) {
        $citybox.val('').change();
        $citybox.prop('disabled', true);
    }

    function awsa_convert_to_select($citybox, current_cities) {
        var value = $citybox.val();

        if ($citybox.is('input')) {
            var input_name = $citybox.attr('name');
            var input_id = $citybox.attr('id');
            var placeholder = $citybox.attr('placeholder');
            var sclass = $citybox.attr('class');

            $citybox.replaceWith('<select name="' + input_name + '" id="' + input_id + '" class="city_select ' + sclass + '" placeholder="' + placeholder + '"></select>');
            $citybox = $('#' + input_id);
        } else {
            $citybox.prop('disabled', false);
        }

        var options = '';
        for (var index in current_cities) {
            if (current_cities.hasOwnProperty(index)) {
                var city_name = current_cities[index];
                var id = (awsa_wc_city_select_params.id === 'id') ? index : city_name;
                selected = (value === id) ? ' selected="selected" ' : '';
                options = options + '<option value="' + id + '" ' + selected + '>' + city_name + '</option>';
            }
        }

        $citybox.html('<option value="">' + awsa_wc_city_select_params.i18n_select_city_text + '</option>' + options);

        if ($('option[value="' + value + '"]', $citybox).length) {
            $citybox.val(value).change();
        } else {
            $citybox.val('').change();
        }

        $(document.body).trigger('city_to_select');
    }
});