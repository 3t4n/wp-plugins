// ✅ Ensure the function is globally accessible
window.initGoogleAutocomplete = function() {
    console.log("Google Autocomplete Initialized");
    console.log("API Key: ", AddressAutocompleteSettings.apiKey);
    console.log("Target Selectors: ", AddressAutocompleteSettings.targetSelectors);
    console.log("Place Type: ", AddressAutocompleteSettings.placeType);
    console.log("Country: ", AddressAutocompleteSettings.country);

    let selectors = AddressAutocompleteSettings.targetSelectors.split(',');

    selectors.forEach(function(selector) {
        let inputs = document.querySelectorAll(selector.trim());
        console.log(`Selector: ${selector.trim()}`);
        console.log("Found Inputs: ", inputs);

        inputs.forEach(function(input) {
            if (input) {
                console.log("Applying Autocomplete to: ", input);

                // Place type defaults to "geocode" as it works for general locations, including regions and administrative areas
                let placeType = AddressAutocompleteSettings.placeType === "cities" ? "geocode" : AddressAutocompleteSettings.placeType || "geocode";

                let options = {
                    fields: ["formatted_address"],
                    types: [placeType],
                };

                // Restrict by country, if set
                if (AddressAutocompleteSettings.country) {
                    options.componentRestrictions = { country: AddressAutocompleteSettings.country }; // Restrict by country
                }

                console.log("Autocomplete Options: ", options);

                // Initialize the autocomplete object
                let autocomplete = new google.maps.places.Autocomplete(input, options);

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    let place = autocomplete.getPlace();
                    console.log("Selected Place:", place.formatted_address);
                });
            }
        });
    });
};

// ✅ Ensure the Google Maps API loads correctly
function loadGoogleMapsAPI() {
    if (window.google && window.google.maps) {
        console.log("Google Maps already loaded");
        initGoogleAutocomplete(); // If already loaded, initialize autocomplete
    } else {
        let script = document.createElement("script");
        script.src = `https://maps.googleapis.com/maps/api/js?key=${AddressAutocompleteSettings.apiKey}&libraries=places&callback=initGoogleAutocomplete`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
        console.log("Loading Google Maps API...");
    }
}

// ✅ Ensure the script runs after DOM is fully loaded
document.addEventListener("DOMContentLoaded", loadGoogleMapsAPI);
