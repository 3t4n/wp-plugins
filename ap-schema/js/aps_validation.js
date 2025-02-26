/**
 * Admin Posts Form Validation
 * 
 * @version 1.0.0
 * @since 1.0.0
 */


jQuery(document).ready(function(){

	// Book
	jQuery("#aps_schema_form_book").validate({

		onkeyup:false,
		rules: {
			aps_book_name: {
			},
			aps_book_author: {
			},
			aps_book_website:  {
				apsUrl: true
			},
			aps_book_publisher: {
				maxlength: 90
			},
			aps_book_pub_date: {
				//apsDate: true,
				maxlength: 15,
				required: false
			},
			aps_book_isbn: {
				maxlength: 20
			},
			aps_book_edition: {
				maxlength: 10
			},
			aps_book_description: {
			}
		},
		messages: {
			aps_book_publisher: {
				maxlength: jQuery.format("No more than {0} characters")
			},
			aps_book_pub_date: {
				maxlength: jQuery.format("No more than {0} characters")
			},
			aps_book_isbn: {
				maxlength: jQuery.format("No more than {0} characters")
			},
			aps_book_edition: {
				maxlength: jQuery.format("No more than {0} characters")
			}
		}


	}); //end book validation


	//event
	jQuery("#aps_schema_form_event").validate({

		onkeyup:false,
		rules: {
			aps_event_schema_event_type: {
			},
			aps_event_name: {
			},
			aps_event_website:  {
				apsUrl: true
			},
			aps_event_description: {
			},
			aps_event_start_date: {
				//apsDate: true,
				maxlength: 15,
			},
			aps_event_start_time: {
				apsTime: true,
				maxlength: 12
			},
			aps_event_end_date: {
				//apsDate: true,
				maxlength: 15,
			},
			aps_event_end_time: {
				apsTime: true,
				maxlength: 12
			},
			aps_event_duration: {
			},			
			aps_event_address: {
			},
			aps_event_pobox: {
			},
			aps_event_city: {
			},
			aps_event_state_region: {
			},
			aps_event_postal_code: {
			},
			aps_event_country: {
			},
			aps_event_email: {
				email: true
			},
			aps_event_telephone: {
				digits: true
			}
		},
		messages: {
		}


	}); //end event validation

//movie
	jQuery("#aps_schema_form_movie").validate({

		onkeyup:false,
		rules: {
			aps_movie_name: {
			},
			aps_movie_website:  {
				apsUrl: true
			},
			aps_movie_description: {
			},
			aps_movie_director: {
			},
			aps_movie_producer: {
			},
			aps_movie_actors: {
			}
		},
		messages: {
		}


	}); //end movie validation


//organisation
	jQuery("#aps_schema_form_organisation").validate({

		onkeyup:false,
		rules: {
			aps_organisation_schema_organisation_type: {
			},
			aps_organisation_name: {
			},
			aps_organisation_website:  {
				apsUrl: true
			},
			aps_organisation_description: {
			},
			aps_organisation_address: {
			},
			aps_organisation_pobox: {
			},
			aps_organisation_city: {
			},
			aps_organisation_state_region: {
			},
			aps_organisation_postal_code: {
			},
			aps_organisation_country: {
			},
			aps_organisation_email: {
				email: true
			},
			aps_organisation_telephone: {
				digits: true
			},
			aps_organisation_fax: {
				digits: true
			},
			aps_organisation_logo: {
				apsUrl: true
			}

		},
		messages: {
		}


	}); //end organisation validation


//person
	jQuery("#aps_schema_form_person").validate({

		onkeyup:false,
		rules: {
			aps_person_name: {
			},
			aps_person_organisation: {
			},
			aps_person_website:  {
				apsUrl: true
			},
			aps_person_description: {
			},
			aps_person_birthday: {
				//apsDate: true,
				maxlength: 15,
			},
			aps_person_address: {
			},
			aps_person_pobox: {
			},
			aps_person_city: {
			},
			aps_person_state_region: {
			},
			aps_person_postal_code: {
			},
			aps_person_country: {
			},
			aps_person_email: {
				email: true
			},
			aps_person_telephone: {
				digits: true
			}
		},
		messages: {
		}


	}); //end person validation


//product
	jQuery("#aps_schema_form_product").validate({

		onkeyup:false,
		rules: {
			aps_product_name: {
			},
			aps_product_website:  {
				apsUrl: true
			},
			aps_product_description: {
			},
			aps_product_brand: {
			},
			aps_product_manufacturer: {
			},
			aps_product_model: {
			},
			aps_product_product_id: {
			},
			aps_product_max_score: {
				number: true
			},
			aps_product_avg_rating: {
				number: true
			},
			aps_product_number_reviews: {
				number: true
			},
			aps_product_price: {
				number: true
			},
			aps_product_condition: {
			},
			aps_product_image_url: {
				apsUrl: true
			},
			aps_product_startype: {
			},
			aps_product_affiliate_url: {
				apsUrl: true
			}

		},
		messages: {
		}


	}); //end product validation


//recipe
	jQuery("#aps_schema_form_recipe").validate({

		onkeyup:false,
		rules: {
			aps_recipe_name: {
			},
			aps_recipe_image_url:  {
				apsUrl: true
			},
			aps_recipe_description: {
			},
			aps_recipe_author: {
			},			
			aps_recipe_published_date: {
				//apsDate: true,
				maxlength: 15
			},
			aps_recipe_prep_hours: {
				number: true
			},
			aps_recipe_prep_minutes: {
				number: true
			},
			aps_recipe_cook_hours: {
				number: true
			},
			aps_recipe_cook_minutes: {
				number: true
			},
			aps_recipe_yield: {
				digits: true
			},			
			aps_recipe_calories: {
				number: true
			},
			aps_recipe_fat: {
				number: true
			},
			aps_recipe_sugar: {
				number: true
			},
			aps_recipe_salt: {
				number: true
			},
			aps_recipe_ingredients: {
			},
			aps_recipe_instructions: {
			}
		},
		messages: {
		}
	}); //end recipe validation


//review
jQuery("#aps_schema_form_review").validate({

		onkeyup:false,
		rules: {
			aps_review_name: {
			},
			aps_review_website:  {
				apsUrl: true
			},
			aps_review_affiliate_url: {
				apsUrl: true
			},
			aps_review_description: {
			},
			aps_review_item_name: {
			},
			aps_review_item_review: {
			},
			aps_review_rating: {
				number: true
			},
			aps_review_rating_min: {
				number: true
			},
			aps_review_rating_max: {
				number: true
			},
			aps_review_image_url: {
				apsUrl: true
			},
			aps_review_author: {
			},
			aps_review_pub_date: {
				maxlength: 15
				//apsDate: true
			}

		},
		messages: {
		}

	}); //end review validation




/*****************************
*
* Custom Methods
*
****************************/




/************************
*
* Date
*
***********************/

/*
//fucking regex, hate it - wont validate so removed for now.

	//http://stackoverflow.com/questions/511439/custom-date-format-with-jquery-validation-plugin
	//http://docs.jquery.com/Plugins/Validation/Validator/addMethod#namemethodmessage
	jQuery.validator.addMethod(
    "apsDate",
    function(value, element) {

		
		var aps_jquery_dateformat = jQuery("input[name='aps_wp_dateformat']").val();
		
		
		
		// a bit hacky but regex is effing awful. basically this will allow a blank date, butif not blank regex will kick in to make sure format is correct
		if(value=="") { return true; }

		else if(aps_jquery_dateformat === 'F j, Y') { //eg March 6, 2013
			//jQuery('.apschema_date_picker').datepicker({ dateFormat: 'M d, yy' });		
		}
		else if (aps_jquery_dateformat === 'Y/m/d') { 
		alert (aps_jquery_dateformat);
			return value.match(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/); 		
		}
		else if (aps_jquery_dateformat === 'm/d/Y') {
			return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		}
		else if (aps_jquery_dateformat === 'd/m/Y') {
			return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		}
		else if (aps_jquery_dateformat === 'd.m.Y') {
			return value.match(/^\d\d?\.\d\d?\.\d\d\d\d$/);
		}
		else {
			return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		}	
	
	
    },
    "Please enter a date in the format dd-mm-yyyy."

	);
	*/



/***
*
* Time format - taken from the additonal methods file and modified (name)
*
*******/

jQuery.validator.addMethod("apsTime", function(value, element) {
	return this.optional(element) || /^([01]\d|2[0-3])(:[0-5]\d){1,2}$/.test(value);
}, "Please enter a valid time, between 00:00 and 23:59");


/***
*
* URL - added this to save having to write a message for each schema
*
*******/

jQuery.validator.addMethod("apsUrl", function(val, elem) {
//http://www.robsearles.com/2010/05/27/jquery-validate-url-adding-http/													

    // if no url, don't do anything
    if (val.length == 0) { return true; }

    // if user has not entered http:// https:// or ftp:// assume they mean http://
    if(!/^(https?|ftp):\/\//i.test(val)) {
        val = 'http://'+val; // set both the value
        jQuery(elem).val(val); // also update the form element
    }

    return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(val);
}, "Please enter a valid url");


}); //End all
