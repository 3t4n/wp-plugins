    jQuery(document).ready(function(jQuery){ 		
     // Select the country code (That will display)
            jQuery('select#billing_country').on("change", function(){
			var countryVat =  jQuery('#billing_eu_vat_number_field').fadeIn();
			    selectedCountry = jQuery('select#billing_country').val();
				
				switch(selectedCountry) {
					case "AT":
						   countryVat;;
						break;
					case "XI":
						   countryVat;;
						break;
					case "BE":
						   countryVat;
						break;
					case "BG":
						   countryVat;
						break;						
					case "CY":
						   countryVat;
						break;
					case "CZ":
						   countryVat;
						break;
					case "DE":
						   countryVat;
						break;
					case "DK":
						   countryVat;
						break;
					case "EE":
						   countryVat;
						break;
					case "GR":
						   countryVat;
						break;
					case "ES":
						   countryVat;
						break;
					case "FI":
						   countryVat;
						break;
					case "FR":
						   countryVat;
						break;
					case "UK":
						   countryVat;
						break;
					case "HR":
						   countryVat;
						break;
					case "HU":
						   countryVat;
						break;
					case "IE":
						   countryVat;
						break;
					case "IT":
						   countryVat;
						break;
					case "LT":
						   countryVat;
						break;
					case "LU":
						   countryVat;
						break;
					case "LV":
						   countryVat;
						break;
					case "MT":
						   countryVat;
						break;
					case "NL":
						   countryVat;
						break;
					case "PL":
						   countryVat;
						break;
					case "PT":
						   countryVat;
						break;
					case "RO":
						   countryVat;
						break;
					case "SI":
						   countryVat;
						break;
					case "SE":
						   countryVat;
						break;																																																																																
					case "SK":
						   countryVat;
						break;																																																																																
								
					default:
						jQuery('#billing_eu_vat_number_field').fadeOut();
				}
            });
        });