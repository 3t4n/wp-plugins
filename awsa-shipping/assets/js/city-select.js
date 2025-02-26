jQuery(function ($) {
    if (typeof wc_country_select_params === 'undefined' || typeof awsa_wc_city_select_params === 'undefined') {
        return false;
    }

    function getEnhancedSelectFormatString() {
        var formatString = {
            formatMatches: function (matches) {
                if (1 === matches) {
                    return wc_country_select_params.i18n_matches_1;
                }

                return wc_country_select_params.i18n_matches_n.replace('%qty%', matches);
            },
            formatNoMatches: function () {
                return wc_country_select_params.i18n_no_matches;
            },
            formatAjaxError: function () {
                return wc_country_select_params.i18n_ajax_error;
            },
            formatInputTooShort: function (input, min) {
                var number = min - input.length;

                if (1 === number) {
                    return wc_country_select_params.i18n_input_too_short_1;
                }

                return wc_country_select_params.i18n_input_too_short_n.replace('%qty%', number);
            },
            formatInputTooLong: function (input, max) {
                var number = input.length - max;

                if (1 === number) {
                    return wc_country_select_params.i18n_input_too_long_1;
                }

                return wc_country_select_params.i18n_input_too_long_n.replace('%qty%', number);
            },
            formatSelectionTooBig: function (limit) {
                if (1 === limit) {
                    return wc_country_select_params.i18n_selection_too_long_1;
                }

                return wc_country_select_params.i18n_selection_too_long_n.replace('%qty%', limit);
            },
            formatLoadMore: function () {
                return wc_country_select_params.i18n_load_more;
            },
            formatSearching: function () {
                return wc_country_select_params.i18n_searching;
            }
        };

        return formatString;
    }


    if ($().select2) {
        var wc_city_select_select2 = function () {
            $('select.city_select:visible').each(function () {
                var select2_args = $.extend({
                    placeholderOption: 'first',
                    width: '100%'
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
        var $statebox = $container.find('#billing_state, #shipping_state, #calc_shipping_state, #_billing_state, #_shipping_state, #_calc_shipping_state');
        var state = $statebox.val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    $('body').on('change', 'select.state_select:not(.city_select), #calc_shipping_state', function () {
        var $container = $(this).closest('div');
        var country = $container.find('#billing_country, #shipping_country, #calc_shipping_country, #_billing_country, #_shipping_country, #_calc_shipping_country').val();
        var state = $(this).val();

        $(document.body).trigger('state_changing', [country, state, $container]);
    });

    $('body').on('state_changing', function (e, country, state, $container) {
        var $citybox = $container.find('#billing_city, #shipping_city, #calc_shipping_city, #_billing_city, #_shipping_city, #_calc_shipping_city');

        if (cities[country]) {
            if (cities[country] instanceof Array) {
                awsa_convert_to_select($citybox, cities[country]);
            } else if (state) {
                if (cities[country][state]) {
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

    /* Ajax replaces .cart_totals (child of .cart-collaterals) on shipping calculator */
    if ($('.cart-collaterals').length && $('#calc_shipping_state').length) {
        var calc_observer = new MutationObserver(function () {
            $('#calc_shipping_state').change();
        });
        calc_observer.observe(document.querySelector('.cart-collaterals'), {childList: true});
    }

    function awsa_convert_to_input($citybox) {
        if ($citybox.is('input')) {
            $citybox.prop('disabled', false);
            return;
        }

        var input_name = $citybox.attr('name');
        var input_id = $citybox.attr('id');
        var placeholder = $citybox.attr('placeholder');

        $citybox.parent().find('.select2-container').remove();

        $citybox.replaceWith('<input type="text" class="input-text" name="' + input_name + '" id="' + input_id + '" placeholder="' + placeholder + '" />');
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

            $citybox.replaceWith('<select name="' + input_name + '" id="' + input_id + '" class="' + sclass + '" placeholder="' + placeholder + '"></select>');
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
                options = options + '<option value="' + id + '">' + city_name + '</option>';
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