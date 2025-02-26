let autocomplete;
let address1Field;
let address2Field;
let postalField;

let cityField;
let stateField;

function initAutocomplete() {
  address1Field = document.querySelector("input#billing_address_1");
  address2Field = document.querySelector("input#billing_address_2");
  postalField = document.querySelector("input#billing_postcode");
  
  cityField = document.querySelector("input#billing_city");
  stateField = document.querySelector("select#billing_state");

  // Create the autocomplete object, restricting the search predictions to
  // addresses in the selected billing country.
  autocomplete = new google.maps.places.Autocomplete(address1Field, {
    componentRestrictions: { country: []},
    fields: ["address_components", "geometry"],
    types: ["address"],
  });
  address1Field.focus();

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);

 
}



function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";
  let city = "";
  let state = "";
 

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (const component of place.address_components) {
    const componentType = component.types[0];
    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }
      case "route": {
        address1 += component.short_name;
        break;
      }
      case "postal_code": {
        postcode = `${component.long_name}${postcode}`;
        break;
      }
      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`;
        break;
      }
      case "locality":
        city = component.long_name;
        break;
      case "administrative_area_level_1":
        state = component.short_name;
        break;
    //  case "country":
    //    country = component.long_name;
     //   break;
    }
  }

  address1Field.value = address1;
  postalField.value = postcode;
  cityField.value = city;
  stateField.value = state;
 

  // Trigger the change event manually since programmatic changes don't trigger it.

  jQuery(stateField).trigger('change');


  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
  address2Field.focus();

  // Trigger the woocommerce_after_checkout_validation hook
  jQuery( document.body ).trigger( 'update_checkout' );
}

window.initAutocomplete = initAutocomplete;
