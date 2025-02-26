function initAutocomplete() {
  const observer = new MutationObserver((mutations, observer) => {
    const input = document.getElementById("billing-address_1");
    if (input) {
      // Initialize the autocomplete object
      const autocomplete = new google.maps.places.Autocomplete(input, {});

      // Listen for the place_changed event
      autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();
       // Log the place details for debugging

        // Extract the address components
        const addressComponents = place.address_components;
 console.log(addressComponents); 
        // Helper function to get a component by type
        function getAddressComponent(type) {
          const component = addressComponents.find((comp) =>
            comp.types.includes(type)
          );
          return component ? component.long_name : "";
        }

        // Set values to the corresponding fields
        document.getElementById("billing-address_1").value = getAddressComponent("street_number") + " " + getAddressComponent("route");
        document.getElementById("billing-address_2").value = getAddressComponent("sublocality");
        document.getElementById("billing-city").value = getAddressComponent("locality");
        document.getElementById("billing-state").value = getAddressComponent("administrative_area_level_1");
        document.getElementById("billing-postcode").value = getAddressComponent("postal_code");
        document.getElementById("billing-country").value = getAddressComponent("country");
      });

      // Stop observing once the element is found
      observer.disconnect();
    }
  });

  // Start observing the document body for changes
  observer.observe(document.body, { childList: true, subtree: true });
}

initAutocomplete();
