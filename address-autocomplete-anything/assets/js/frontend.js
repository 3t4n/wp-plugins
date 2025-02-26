function wps_aa() {

	for ( const address_group of wps_aa_vars.instances ) {
		if ( address_group.init ) {
			if ( ! address_group.delay ) {
				wps_aa_init_autocomplete( address_group );
			} else if ( address_group.delay ) {
				setTimeout( wps_aa_init_autocomplete, address_group.delay * 1000, address_group );
			}
		}
	}
}

function wps_aa_init_autocomplete( address_group ) {
	const init_selector = document.querySelector( address_group.init );
	if ( ! init_selector ) {
		console.log( 'WPSAA: Could not find address autocomplete initial selector: ' + address_group.init );
		return;
	}
	var options = {
		fields: [ 'address_components', 'geometry', 'name' ],
	};

	if ( address_group.allowed_countries ) {
		options.componentRestrictions = { country: address_group.allowed_countries };
	}

	const autocomplete = new google.maps.places.Autocomplete( init_selector, options );
	autocomplete.addListener( 'place_changed', () => {

		let values = {};
		let replacements = [];
		let final_data = [];

		const place = autocomplete.getPlace();
		console.log( 'WPSAA Address found:', place );

		// Helper function to check for fallback fields
		function get_field_value( primary, fallback ) {
			return values[primary] ? values[primary] : values[fallback];
		}

		// Build all possible replacement values
		for ( const place_component of place.address_components ) {
			values[ place_component.types[0] ] = place_component;
		}

		if ( place.hasOwnProperty( 'name' ) ) {
			values['name'] = { long_name: place.name, short_name: place.name };
		}

		// Handle special cases like postal_town for locality, etc.
		if ( values['postal_town'] && ! values['locality'] ) {
			values['locality'] = values['postal_town'];
		}

		// Populate replacement array
		for ( const k in values ) {
			let short_replacement = { search: '{' + k + ':short_name}', replace: values[k].short_name || '' };
			let long_replacement = { search: '{' + k + ':long_name}', replace: values[k].long_name || '' };
			replacements.push( short_replacement, long_replacement );
		}

		// Latitude and Longitude replacements
		replacements.push( { search: '{lat}', replace: place.geometry.location.lat() } );
		replacements.push( { search: '{lng}', replace: place.geometry.location.lng() } );

		// Address 1 formatting based on country
		let address1_format = wps_aa_address1_format( values.country.short_name );
		let address1_short = { search: '{address1:short_name}', replace: '' };
		let address1_long = { search: '{address1:long_name}', replace: '' };

		if ( address1_format === 'standard' ) {
			address1_short.replace = values.street_number?.short_name || '';
			address1_long.replace = values.street_number?.long_name || '';
			address1_short.replace += ( address1_short.replace && values.route?.short_name ) ? ' ' + values.route.short_name : '';
			address1_long.replace += ( address1_long.replace && values.route?.long_name ) ? ' ' + values.route.long_name : '';
		} else {
			address1_short.replace = values.route?.short_name || '';
			address1_long.replace = values.route?.long_name || '';
			address1_short.replace += ( address1_short.replace && values.street_number?.short_name ) ? ' ' + values.street_number.short_name : '';
			address1_long.replace += ( address1_long.replace && values.street_number?.long_name ) ? ' ' + values.street_number.long_name : '';
		}
		replacements.push( address1_short, address1_long );

		// Go through all available fields and apply replacements
        for ( const key in address_group.fields ) {

            let selector = address_group.fields[key].selector;
            let data = address_group.fields[key].data.toString();
            let result = data;
            let replace;
            let attributes = wps_aa_parse_atts( data );

            // Strip the attributes now for easier replace
            let attribute_strings = result.match(/[\w-]+=".*?"/g);
            if ( attribute_strings ) {
                attribute_strings.forEach( function( attribute ) {
                    result = result.replace( attribute, '' );
                } );
            }
            result = result.replace( /\s/g, '' ); // Should no longer be any spaces

            // Loop through each replacement and run it on this data
            for ( replacement of replacements ) {

                // Set the replacement string by checking the before/after attributes
                replace = replacement.replace;
                if ( Object.keys( attributes ).length > 0 ) {
                    attributes.forEach( function( attribute ) {
                        // Loop through attributes and see if key matches this search item
                        if ( replacement.search == attribute.key ) {
                            if ( attribute.hasOwnProperty( 'before' ) ) {
                                replace = attribute.before + replace;
                            }
                            if ( attribute.hasOwnProperty( 'after' ) ) {
                                replace = replace + attribute.after;
                            }
                        }
                    } );
                }

                result = result.replace( replacement.search, replace );

            }

            // Replace all leftover placeholders with empty string
            result = result.replace( /{.*}/, '' );

            wps_aa_change_value( selector, result );

			final_data.push( { selector: selector, result: result } );

        }

		const wps_aa_event = new CustomEvent( 'wps_aa', { detail: { data: final_data, init: address_group.init } } );
		document.dispatchEvent( wps_aa_event );

	} );
}

function wps_aa_parse_atts(inputString) {
    const regex = /{([^{}]+)}/g;
    const matches = inputString.match(regex);
    const attributes = [];

    if (matches) {
        for (const match of matches) {
            let attributeString = match.slice(1, -1);
            const attributePairs = attributeString.match(/[\w-]+=".*?"/g);

            if (attributePairs) {

                attributePairs.forEach(function(attribute) {
                    attributeString = attributeString.replace(attribute, '');
                });
                attributeString = attributeString.replace(/\s/g, '');
                const attributeObj = {
                    key: '{' + attributeString + '}'
                };

                for (const pair of attributePairs) {
                    const [attrKey, attrValue] = pair.split('=');
                    const trimmedKey = attrKey.trim();
                    const trimmedValue = attrValue.slice(1, -1);
                    attributeObj[trimmedKey] = trimmedValue;
                }

                attributes.push(attributeObj);
            } else {
                // No attributes found, add the entire string as the key with empty attribute values
                attributes.push({
                    key: match
                });
            }
        }
    }

    return attributes;
}

function wps_aa_change_value( selector, data ) {
	const element = document.querySelector( selector );
	if ( element ) {
		if ( element.tagName === 'SELECT' ) {
			element.value = data;
			if ( element.value !== data ) {
				for ( let i = 0; i < element.options.length; i++ ) {
					if ( element.options[i].text === data ) {
						element.selectedIndex = i;
						break;
					}
				}
			}
		} else {
			element.value = data;
		}
		element.dispatchEvent( new Event( 'change' ) );
		if ( typeof jQuery !== 'undefined' ) {
			jQuery( selector ).trigger( 'change' );
		}
	} else {
		console.error( 'Cannot find selector to attach address autocomplete data', selector, data );
	}
}

function wps_aa_address1_format( country ) {
	const reverse_countries = [ 'DE', 'AT', 'MX', 'CH', 'NL' ];
	return reverse_countries.includes( country ) ? 'reverse' : 'standard';
}
