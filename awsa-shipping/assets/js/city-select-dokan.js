jQuery(document).ready(function ($) {
    function awsa_dokan_change_country_state_handler(e) {
        var el = e.currentTarget ? e.currentTarget : e;
        var $container = $(el).closest('form');

        var $country = $container.find("[name='dokan_address[country]']");
        var country = $country.val();
        var $statebox = $container.find("[name='dokan_address[state]']");
        var state = $statebox.val();
        $(document.body).trigger('state_changing', [country, state, $container]);
    }

    $("[name='dokan_address[country]'] , [name='dokan_address[state]']").on('change', awsa_dokan_change_country_state_handler);
    $(document).ready(function () {
        $.each($("[name='dokan_address[city]']"), function (i, v) {
            awsa_dokan_change_country_state_handler($(v));
        });
    });

    var cities_json = awsa_dokan_city_select_params.cities.replace(/&quot;/g, '"');
    var cities = $.parseJSON(cities_json);

    $('body').on('state_changing', function (e, country, state, $container) {
        var $citybox = $container.find("[name='dokan_address[city]']");

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
            //we have to assign the new object, because of replaceWith
            $citybox = $('#' + input_id);
            if ($citybox.length == 0) {
                $citybox = $('[name="' + input_name + '"]');
            }
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

        $citybox.html('<option value="">' + awsa_dokan_city_select_params.i18n_select_city_text + '</option>' + options);
        if ($('option[value="' + value + '"]', $citybox).length) {
            $citybox.val(value).change();
        } else {
            $citybox.val('').change();
        }
    }
});