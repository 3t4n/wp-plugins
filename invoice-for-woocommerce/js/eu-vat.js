jQuery("body").ready(function(jQuery){ 		
    // Select the country code (That will display)
	var noEU = jQuery('#billing_eu_vat_number_field').fadeOut();
	
	var selected = jQuery('select#billing_country').val();
	var country = ["AT", "XI", "BE", "BG", "CY", "CZ", "DE", "DK", "EE", "GR", "ES", "FI", "FR", "UK", "HR", "HU", "IE", "IT", "LT", "LU", "LV", "MT", "NL", "PL", "PT", "RO", "SI", "SE", "SK"];
	var inc = country.includes(selected);
	
	if (!inc) {
		    noEU; 
		} else {
			jQuery('#billing_eu_vat_number_field').fadeIn()
		}
		



});



/*
	jQuery('select#billing_postcode').on("change", function(jQuery){
		
		var selected1 = jQuery('select#billing_postcode').val();
		var country1 = selected1.slice(0, 2);
		var inc1 = country1.includes(selected1);	
		var eee = "BT";
		
		if ( inc1 == eee) {
				jQuery('#billing_eu_vat_number_field').fadeIn()
			}
	});	








	        jQuery("body").ready(function(jQuery){
  
            // Set the country code (That will display the message)
            var countryCode = 'GB';
  
            jQuery('select#billing_country').change(function(){
  
                selectedCountry = jQuery('select#billing_country').val();
                  
                if( selectedCountry == countryCode ){
                    jQuery('#billing_eu_vat_number_field').fadeIn()
                }
                else {
                    jQuery('#billing_eu_vat_number_field').fadeIn()
                }
            });
  
        });
  */