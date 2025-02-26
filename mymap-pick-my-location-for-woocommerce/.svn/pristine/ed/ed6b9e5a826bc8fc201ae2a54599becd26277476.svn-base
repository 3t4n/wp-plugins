function initGoogleMap(mapId, latitude, longitude, searchFieldId, address_type = 'billing') {    
    jQuery(".button.mymap_pick_location_billing,.button.mymap_pick_location_shipping").addClass('loading');
    var mapLocation = new google.maps.LatLng(latitude, longitude);
    var map = new google.maps.Map(document.getElementById(mapId), {
        zoom: 10,
        center: mapLocation,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var input = document.getElementById(searchFieldId);
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });
    var markers = [];
    // creates a draggable marker to the given coords
    var vMarker = new google.maps.Marker({
        position: mapLocation,
        draggable: true
    });
    markers.push(vMarker);
    google.maps.event.addListener(vMarker, 'dragend', function (evt) {
        jQuery('#' + mapId).closest('form').find('#latitude, .latitude').val(evt.latLng.lat().toFixed(6)).keyup();
        jQuery('#' + mapId).closest('form').find('#longitude, .longitude').val(evt.latLng.lng().toFixed(6)).keyup();
        //location drag
        var latlng = new google.maps.LatLng(evt.latLng.lat(), evt.latLng.lng());
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    fillupAddressForm(mapId, results, address_type);

                }
            }
        });
        //close
        map.panTo(evt.latLng);
    });
    google.maps.event.addListener(map, 'zoom_changed', function () {
        jQuery('#' + mapId).closest('form').find('#mapzoom').val(map.getZoom()).keyup();
    });
    map.setCenter(vMarker.position);
    vMarker.setMap(map);
    if (mapId == 'mymap_map_canvas') {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    map.setCenter(currentLocation);
                    map.setZoom(15);
                    vMarker.setPosition(currentLocation);
                    jQuery('#' + mapId).closest('form').find('#latitude, .latitude').val(currentLocation.lat.toFixed(6)).keyup();
                    jQuery('#' + mapId).closest('form').find('#longitude, .longitude').val(currentLocation.lng.toFixed(6)).keyup();
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                fillupAddressForm(mapId, results, address_type);
                            }
                        }
                    });
                    jQuery(".button.mymap_pick_location_billing,.button.mymap_pick_location_shipping").removeClass('loading');
                },
                () => {
                    // The Geolocation service failed.
                    jQuery(".button.mymap_pick_location_billing,.button.mymap_pick_location_shipping").removeClass('loading');
                }
            );
        } else {            
            // Browser doesn't support Geolocation
            jQuery(".button.mymap_pick_location_billing,.button.mymap_pick_location_shipping").removeClass('loading');
        }
    }
}
function fillupAddressForm(mapId, results, address_type = 'billing') {
    var postData = {
        locationdata: JSON.stringify(results)
    };
    var resultKey = 0;

    var street = [];
    var localAddr = [];
    var streetNumber = '';
	var neighbor_billing = [];
	var country = [];
	var province = [];
	var prefecture = [];
    var formattedAddress = results[resultKey].formatted_address;
    jQuery('#' + mapId).closest('form').find('input[name="city"], input[name="state"], input[name="country"], input[name="country-shortname"], input[name="postcode"]').val('');
    jQuery(results[resultKey].address_components.reverse()).each(function (key, components) {
        if (jQuery.inArray('subpremise', components.types) >= 0) {
            streetNumber = components.short_name + '/';
            street.push(streetNumber);
        } else if (jQuery.inArray('street_number', components.types) >= 0) {
            streetNumber = streetNumber + components.short_name;
            street.push(streetNumber);
        } else if (jQuery.inArray('landmark', components.types) >= 0 || jQuery.inArray('premise', components.types) >= 0) {
            if (streetNumber == '') {
                streetNumber = streetNumber + components.short_name;
                street.push(streetNumber);
            } else {
                street.push(components.short_name);
            }
        } else if (jQuery.inArray('neighborhood', components.types) >= 0) {
            street.push(components.short_name);
        } else if (jQuery.inArray('sublocality_level_2', components.types) >= 0) {
            street.push(components.short_name);
        } else if (jQuery.inArray('sublocality_level_1', components.types) >= 0) {
            street.push(components.short_name);
        } else if (jQuery.inArray('route', components.types) >= 0) {
            street.push(components.long_name);
        }

        if (jQuery.inArray('plus_code', components.types) >= 0) {
            formattedAddress = formattedAddress.replace(components.long_name + ' ', '');
            formattedAddress = formattedAddress.replace(components.long_name + ',', '');
        }
        /* Country Fillup */
        if (jQuery.inArray('country', components.types) >= 0) {
            jQuery('#components-form-token-input-0').val(components.short_name).change();

            if (address_type == "shipping") {
                jQuery('#shipping_country').val(components.short_name).change();
                jQuery("#shipping_country option[text='" + components.long_name + "']").prop("selected", true);
                jQuery("#shipping_country option[text='" + components.long_name + "']").change();
            } else {
                jQuery('#billing_country').val(components.short_name).change();
                jQuery("#billing_country option[text='" + components.long_name + "']").prop("selected", true);
                jQuery("#billing_country option[text='" + components.long_name + "']").change();
            }
            localAddr.push(components.long_name);
        }

        if (jQuery.inArray('locality', components.types) >= 0) {
            if (address_type == "shipping") {
                jQuery('#shipping_city').val(components.long_name).keyup();
                jQuery('#shipping-city').val(components.long_name).keyup();
            } else {
                jQuery('#billing_city').val(components.long_name).keyup();
                jQuery('#billing-city').val(components.long_name).keyup();
            }
            localAddr.push(components.long_name);
        }
        if (jQuery.inArray('administrative_area_level_3', components.types) >= 0) {
            if (address_type == "shipping") {
                jQuery('#shipping_city').val(components.long_name).keyup();
                jQuery('#shipping-city').val(components.long_name).keyup();
            } else {
                jQuery('#billing_city').val(components.long_name).keyup();
                jQuery('#billing-city').val(components.long_name).keyup();
            }
            localAddr.push(components.long_name);
        }
		if (jQuery.inArray('neighborhood', components.types) >= 0) {
			if (address_type == "shipping") {
				jQuery('#shipping_address_2').val(components.long_name).keyup();
			} else {
				jQuery('#billing_address_2').val(components.long_name).keyup();
			}
			localAddr.push(components.long_name);
			neighbor_billing.push(components.long_name);
		}

        if (jQuery.inArray('administrative_area_level_2', components.types) >= 0) {
            if (address_type == "shipping") {
                jQuery('#shipping_city').val(components.long_name).keyup();
                jQuery('#shipping-city').val(components.long_name).keyup();
            } else {
                jQuery('#billing_city').val(components.long_name).keyup();
                jQuery('#billing-city').val(components.long_name).keyup();
            }
            localAddr.push(components.long_name);
            province.push(components.short_name);
        }
        if (jQuery.inArray('administrative_area_level_1', components.types) >= 0) {
            if (address_type == "shipping") {
                jQuery("#shipping_state option[value='" + components.short_name + "']").prop("selected", true);
                jQuery("#shipping_state").trigger('change');
            } else {
                jQuery("#billing_state option[value='" + components.short_name + "']").prop("selected", true);
                jQuery("#billing_state").trigger('change');
            }
            localAddr.push(components.long_name);
            prefecture.push(components.long_name);
        }

        if (jQuery.inArray('postal_code', components.types) >= 0) {
            if (address_type == "shipping") {
                jQuery('#shipping_postcode').val(components.long_name).keyup();
            } else {
                jQuery('#billing_postcode').val(components.long_name).keyup();
            }
            formattedAddress = formattedAddress.replace(components.long_name, '');
            localAddr.push(components.long_name);
        }
    });
	
    street = [];
    street = subtractarrays(formattedAddress.split(', '), localAddr);
    if (results[resultKey].address_components[0].types[0] == 'plus_code') {
        if (street.length > 0) {
            var streetString = street.join(', ');
            if (address_type == "shipping") {
				
                jQuery('#shipping_address_1').val(streetString).keyup();
                jQuery('#shipping_address_1').val(results[resultKey].formatted_address);
            } else {
                jQuery('#billing_address_1').val(streetString).keyup();
                jQuery('#billing_address_1').val(results[resultKey].formatted_address);
            }
        } else {
            if (address_type == "shipping") {
                jQuery('#shipping_address_1').val(results[resultKey].formatted_address).keyup();
            } else {
                jQuery('#billing_address_1').val(results[resultKey].formatted_address).keyup();
            }
            //jQuery('#billing_address_1').val(results[resultKey].formatted_address).keyup();
            /* jQuery('#billing-address_1').val(results[resultKey].formatted_address).change(); */
        }
    } else {
        if (street.length > 0) {
            var streetString = street.join(', ');
			if (streetString.charAt(0) === ',') {streetString = streetString.substring(1); }
			streetString = streetString.split(",").slice(0, -1).join(",");
			
            if (address_type == "shipping") {
				var country = jQuery('#shipping_country').val();
				
                jQuery('#shipping_address_1').val(streetString).keyup();
				if(neighbor_billing.length == 0){
					jQuery('#shipping_address_2').val('').keyup();
				}
            } else {
				
				var country = jQuery('#billing_country').val();
				
				jQuery('#billing_address_1').val(streetString).keyup();
				if(neighbor_billing.length == 0){
					jQuery('#billing_address_2').val('').keyup();
				}				
            }
        } else {
            if (address_type == "shipping") {
                jQuery('#shipping_address_1').val(results[resultKey].formatted_address).keyup();
				province = '';
				jQuery("#shipping_state option[value='" + province + "']").prop("selected", true);
				jQuery("#shipping_state").trigger('change');
            } else {
                jQuery('#billing_address_1').val(results[resultKey].formatted_address).keyup();
				province = '';
				jQuery("#billing_state option[value='" + province + "']").prop("selected", true);
				jQuery("#billing_state").trigger('change');
            }
        }
		if(country =='CN'){			
			if (address_type == "shipping") {
				jQuery("#shipping_state option:contains('" + prefecture + "')").attr('selected', true);
				jQuery("#shipping_state").trigger('change');
			}
			else{
				jQuery("#billing_state option:contains('" + prefecture + "')").attr('selected', true);
				jQuery("#billing_state").trigger('change');
			}
		}
    }

}
function subtractarrays(array1, array2) {
    var difference = [];
    for (var i = 0; i < array1.length; i++) {
        if (jQuery.inArray(array1[i].trim(), array2) == -1) {
            difference.push(array1[i].trim());
        }
    }

    return difference;
}
function error(e) {
    console.log("error code:" + e.code + 'message: ' + e.message);
}
jQuery(document).ready(function () {

                var dlatitude = '27.891535';
                var dlongitude = '78.078743';
                //initGoogleMap('map_canvas', dlatitude, dlongitude, 'searchTextField');

    jQuery('body').on('click', '.mymap_pick_location_billing', function (e) {
        e.preventDefault();
        if (navigator.geolocation) {
            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };
            navigator.geolocation.getCurrentPosition(function (position) {
                initGoogleMap('mymap_map_canvas', position.coords.latitude, position.coords.longitude, 'searchTextField', 'billing');
				var url_location = "https://maps.google.com?q="+position.coords.latitude+","+position.coords.longitude+"";
				jQuery('#mymap_location_url').val(url_location);
                //initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                //map.setCenter(initialLocation);
            }, error, options);
        }
    });
    jQuery('body').on('click', '.mymap_pick_location_shipping', function (e) {
        e.preventDefault();
        if (navigator.geolocation) {
            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };
            navigator.geolocation.getCurrentPosition(function (position) {
                initGoogleMap('mymap_map_canvas', position.coords.latitude, position.coords.longitude, 'searchTextField', 'shipping');

                //initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                //map.setCenter(initialLocation);
            }, error, options);
        }
    });


});

jQuery(document).ready(function($) {
    $('.woocommerce-page label.woocommerce-form__label-for-checkbox input[type=checkbox]').change(function() {
        if ($(this).is(':checked')) {
            $('.button.mymap_pick_location_shipping').show();
        } else {
            $('.button.mymap_pick_location_shipping').hide();
        }
    }).trigger('change');
});