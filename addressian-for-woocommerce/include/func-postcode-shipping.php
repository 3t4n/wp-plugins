<?php
/*
Addressian for Woocommerce is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Addressian for Woocommerce is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Addressian for Woocommerce. If not, see {License URI}.
*/

$ajax_admin = admin_url('admin-ajax.php');
$options = get_option('saddr_settings');
$maxNumberOfElements = 10;
if (isset($options['saddr_text_field_2']))
   $maxNumberOfElements = $options['saddr_text_field_2'];
?>
<script>
    jQuery(document).ready(function ($) {
        $("#find_shipping_address").attr("role", "presentation");
        $("#find_shipping_address").attr("autocomplete", "off");
        hide_shipping_address_fields("hide", "find_shipping_address_field");
        /*$( '<span  class="postcode_addr_shipping" style="float: left;margin-top: 2%;margin-bottom: 5%;"><button  class="findaddr_shipping button">Fetch addresses</button></span>' ).insertAfter( "#find_shipping_address" );*/
        $('#find_shipping_address_field').append('<span  class="postcode_addr_shipping"><button  style="margin-top: 2px;margin-bottom: 2px;"  class="findaddr_shipping button  alt">Find</button></span>');
        $('.postcode_addr_shipping').append('<br /><span  class="descriptions_shipping" style=""><a href="#"  class="manually_address_shipping">Enter address manually</a></span>')
        $("#find_shipping_address").after('<span class ="ntfoundpostcodesh" style="color:red; display:None;">Incorrect postcode<br /></span>');
        $(".ntfoundpostcodesh").after('<span class ="emptypostcodesh" style="color:red; display:None;">Please enter a postcode<br /></span>');
        $('<select id="postcode-dropdown-shipping" style="display:none;"></select>').insertBefore(".descriptions_shipping");
        $(".postcode_addr_shipping").on("click", ".findaddr_shipping", function (event) {
            event.preventDefault();
            if (jQuery("#find_shipping_address").val() == '') {
                jQuery('.emptypostcodesh').fadeIn("slow");
                return;
            }
            jQuery('.emptypostcodesh').fadeOut("slow");
            $('#find_shipping_address').addClass("loading_sa");
            if (!validateAddr(jQuery("#find_shipping_address").val())) {
                jQuery(".ntfoundpostcodesh").show();
                $('#find_shipping_address').removeClass("loading_sa");
                if (jQuery('#postcode-dropdown-shipping').is(":visible")) {
                    jQuery('#postcode-dropdown-shipping').fadeOut("slow");
                }
                return;
            }
            jQuery(".ntfoundpostcodesh").hide();
            let dropdown = jQuery('#postcode-dropdown-shipping');
            dropdown.empty();
            if (dropdown.is(":visible")) {
                dropdown.fadeOut("slow");
                dropdown.fadeIn("slow"); /*update*/
            }
            dropdown.append('<option selected="true" disabled>Choose your address</option>');
            dropdown.prop('selectedIndex', 0);
            dropdown.change(function () {
                var selectedAddress = JSON.parse($(this).children("option:selected").val());
                var selectedItem = selectedAddress;//.data;
                var address_1 = selectedItem.address[0];
                var address_2 = "";
                if (selectedItem.address.length > 1) {
                    address_2 = selectedItem.address.slice(1).join(", ");//selectedItem.address[selectedItem.address.length - 1];
                }
                var city = selectedItem.city
                var county = selectedItem.county
                var postcode = selectedItem.postcode
                var company = selectedItem.hasOwnProperty('company') ? selectedItem.company : "";
                $("#shipping_city").val(city).trigger("change");
                $("#shipping_state").val(county).trigger("change");
                $("#shipping_postcode").val(postcode).trigger("change");
                $("#shipping_company").val(company).trigger("change");
                $("#shipping_address_2").val(address_2).trigger("change");
                $("#shipping_address_1").val(address_1).trigger("change");
                $('body').trigger('update_checkout');

                $(".descriptions_shipping a").text("Choose another address");
                $(".descriptions_shipping a").removeClass("manually_address_shipping");
                $(".descriptions_shipping a").addClass("another_address_shipping");
                //hide_shipping_address_fields("show", "find_shipping_address_field");
                hide_find_shipping_address("hide");
                dropdown.fadeOut('slow');
                dropdown.addClass("add_hide");
                dropdown.removeClass("add_show");
                $("body").find(".findaddr_shipping").hide();
            });
            const url = '';
            const ajaxurl = "<?php echo $ajax_admin; ?>";
            jQuery.ajax({
                beforeSend: function (request) {
                },
                dataType: "json",
                url: ajaxurl + "?phrase=" + jQuery("#find_shipping_address").val() + "&format=json&action=addressian_monitor_action",
                success: function (data) {
                    jQuery.each(data, function (key, entry) {
                        jQuery.each(entry.data, function (key2, entry2) {
                            var address_data = [];
                            if (entry2.hasOwnProperty('company'))
                                address_data.push(entry2.company);
                            address_data.push(entry2.address.join(', '));
                            if (entry2.hasOwnProperty('city'))
                                address_data.push(entry2.city);
                            if (entry2.hasOwnProperty('county'))
                                address_data.push(entry2.county);
                            if (entry2.hasOwnProperty('postcode'))
                                address_data.push(entry2.postcode);
                            dropdown.append(jQuery('<option></option>').attr('value', JSON.stringify(entry2)).text(address_data.join(", ")));
                        })
                    })
                    $('#find_shipping_address').removeClass("loading_sa");
                    dropdown.fadeIn("slow");
                    dropdown.removeClass("add_hide");
                }
            });
            jQuery.getJSON("", function (data) {
            });
        });
        $(".manually_address_shipping").on("click", function (event) {
            event.preventDefault();
            jQuery('.emptypostcodesh').fadeOut("slow");
            hide_shipping_address_fields("show", "");
            empty_shipping_address_fields();
            $("#find_address_postcode").val("");
            var dropdown = $('#postcode-dropdown-shipping');
            dropdown.hide();
            dropdown.addClass("add_hide");
            dropdown.removeClass("add_show");
            if ($("#find_shipping_address").is(":visible")) {
                $(".descriptions_shipping a").text("Postcode Finder");
                hide_shipping_address_fields("show", "");
                hide_find_shipping_address("hide");
                $("body").find(".findaddr_shipping").hide();
                dropdown.hide();
            } else {
                $(".descriptions_shipping a").text("Enter address manually");
                hide_shipping_address_fields("hide", "");
                hide_find_shipping_address("show");
                $("body").find(".findaddr_shipping").show();
                dropdown.hide();
            }

        });
        $(".descriptions_shipping").on("click", '.another_address_shipping', function (event) {
            event.preventDefault();
            hide_shipping_address_fields("hide", "");

            $(".descriptions_shipping a").text("Enter address manually");
            $(".descriptions_shipping a").addClass("manually_address_shipping");
            $(".descriptions_shipping a").removeClass("another_address_shipping");
            $("#find_shipping_address").val("");
            hide_find_shipping_address("show");
            jQuery('#postcode-dropdown-shipping').fadeOut("slow");
            jQuery('#postcode-dropdown').addClass("add_hide");
            jQuery('#postcode-dropdown').removeClass("add_show");
            hide_find_shipping_address("show");

        });

        $("#find_shipping_address").keyup(function () {
            if ($(this).val().trim() === "") {
                $(".ntfoundpostcodesh").fadeOut('slow');
            }
            jQuery('.emptypostcodesh').fadeOut("slow");
        });
    });
</script>