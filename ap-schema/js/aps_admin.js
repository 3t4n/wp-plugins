/**
 * Admin Control Panel JavaScripts
 * 
 * @version 1.0.0
 * @since 1.0.0
 */


// add extra fields  for actors
// http://www.saaraan.com/2013/03/addremove-input-fields-dynamically-with-jquery
jQuery(document).ready(function() {

	var MaxInputs       = 9; //maximum input boxes allowed
	var InputsWrapper   = jQuery("#aps_add_actors_wrapper"); //Input boxes wrapper ID
	var AddButton       = jQuery("#aps_movie_add_actors"); //Add button ID
	
	var x = InputsWrapper.length; //initlal text box count
	var FieldCount=1; //to keep track of text box added
	
	jQuery(AddButton).click(function (e)  //on add input button click
	{
			if(x <= MaxInputs) //max input box allowed
			{
				FieldCount++; //text box added increment
				//add input box
				jQuery(InputsWrapper).append('<div><input type="text" class="aps_movie_actors" name="aps_movie_actors" id="aps_movie_actors_'+ FieldCount +'" value=""/><a href="#" class="removeclass">&times;</a></div>');
				x++; //text box increment
			}
	return false;
	});

	jQuery("body").on("click",".removeclass", function(e){ //user click on remove text
			if( x > 1 ) {
					jQuery(this).parent('div').remove(); //remove text box
					x--; //decrement textbox
			}
	return false;
	}) 


	//remove the fields on loaded schema
	jQuery("body").on("click",".removeclassloaded", function(e){ //user click on remove text
					jQuery(this).parent('div').remove(); //remove text box
	return false;
	}) 


});

// add extra fields  for ingredients
// http://www.saaraan.com/2013/03/addremove-input-fields-dynamically-with-jquery
jQuery(document).ready(function() {

	var MaxInputs       = 30; //maximum input boxes allowed
	var InputsWrapper   = jQuery("#aps_add_ingredients_wrapper"); //Input boxes wrapper ID
	var AddButton       = jQuery("#aps_recipe_add_ingredients"); //Add button ID
	
	var x = InputsWrapper.length; //initlal text box count
	var FieldCount=1; //to keep track of text box added
	
	jQuery(AddButton).click(function (e)  //on add input button click
	{
			if(x <= MaxInputs) //max input box allowed
			{
				FieldCount++; //text box added increment
				//add input box
				jQuery(InputsWrapper).append('<div><input type="text" class="aps_recipe_ingredients" name="aps_recipe_ingredients" id="aps_recipe_ingredients'+ FieldCount +'" value=""/><a href="#" class="removeclass">&times;</a></div>');
				x++; //text box increment
			}
	return false;
	});
	
	jQuery("body").on("click",".removeclass", function(e){ //user click on remove text
			if( x > 1 ) {
					jQuery(this).parent('div').remove(); //remove text box
					x--; //decrement textbox
			}
	return false;
	}) 

});




//duplicate the name as the save name and change " to '
jQuery(document).ready(function(){

		jQuery('input[name="aps_book_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_book_save_name"]').val(txtClone2);
		});	


		jQuery('input[name="aps_event_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_event_save_name"]').val(txtClone2);
		});	
		
			
		jQuery('input[name="aps_movie_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_movie_save_name"]').val(txtClone2);
		});	
		
			
		jQuery('input[name="aps_organisation_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_organisation_save_name"]').val(txtClone2);
		});	
		
			
		jQuery('input[name="aps_person_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_person_save_name"]').val(txtClone2);
		});	
		
			
		jQuery('input[name="aps_product_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_product_save_name"]').val(txtClone2);
		});	
		
			
		jQuery('input[name="aps_recipe_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_recipe_save_name"]').val(txtClone2);
		});	
		
		
		jQuery('input[name="aps_review_name"]').keyup(function() {
			var txtClone = jQuery(this).val();
			txtClone2 = txtClone.replace(/"/g,"'");
			jQuery('input[name="aps_review_save_name"]').val(txtClone2);
		});	
	
	
	
/* sorts out the hide/show for admin schema forms
http://stackoverflow.com/questions/4923716/how-to-change-element-class-on-select-option-using-jquery
*/

		// show or hide the main input forms dependant on selection
		jQuery('#form_selector').change(function() {
												 
												 
		/* datepicker - needs to be here otherwise interferes with other js*/
		var aps_jquey_dateformat = jQuery("input[name='aps_wp_dateformat']").val();
	
	
		if(aps_jquey_dateformat === 'F j, Y') { //eg March 6, 2013
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'M d, yy', changeYear: true, yearRange: '1700:c+10', changeMonth: true });		
		}
		else if (aps_jquey_dateformat === 'Y/m/d') { 
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'yy/mm/dd', changeYear: true, yearRange: '1700:c+10', changeMonth: true  });		
		}
		else if (aps_jquey_dateformat === 'm/d/Y') {
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'mm/dd/yy', changeYear: true, yearRange: '1700:c+10', changeMonth: true  });		
		}
		else if (aps_jquey_dateformat === 'd/m/Y') {
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'dd/mm/yy', changeYear: true, yearRange: '1700:c+10', changeMonth: true  });		
		}
		else if (aps_jquey_dateformat === 'd.m.Y') {
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'dd.mm.yy', changeYear: true, yearRange: '1700:c+10', changeMonth: true  });		
		}
		else {
			jQuery('.apschema_date_picker').datepicker({ dateFormat: 'dd/mm/yy', changeYear: true, yearRange: '1700:c+10', changeMonth: true  });	//revert to UK, 
		}	
		
		
			jQuery('#aps_schema_form_person, #aps_schema_form_product, #aps_schema_form_book, #aps_schema_form_event, #aps_schema_form_movie, #aps_schema_form_organisation, #aps_schema_form_recipe, #aps_schema_form_review').hide();
			jQuery('#aps_schema_form_' + jQuery(this).find('option:selected').attr('value')).show();
		});





// show the Product star options
jQuery("#aps_product_startype_container").hide();

jQuery("#aps_product_startype_enable").click(function(){
       jQuery("#aps_product_startype_container").toggle();
  });
		
// show the Review star options
jQuery("#aps_review_startype_container").hide();

jQuery("#aps_review_startype_enable").click(function(){
       jQuery("#aps_review_startype_container").toggle();
  });

// show the Recipe star options
jQuery("#aps_recipe_startype_container").hide();

jQuery("#aps_recipe_startype_enable").click(function(){
       jQuery("#aps_recipe_startype_container").toggle();
  });

// show the Book review_by option
jQuery("#aps_book_review_by_container").hide();

jQuery("#aps_book_review_by_enable").click(function(){
       jQuery("#aps_book_review_by_container").toggle();
  });

// show the Event review_by option
jQuery("#aps_event_review_by_container").hide();

jQuery("#aps_event_review_by_enable").click(function(){
       jQuery("#aps_event_review_by_container").toggle();
  });

// show the Movie review_by option
jQuery("#aps_movie_review_by_container").hide();

jQuery("#aps_movie_review_by_enable").click(function(){
       jQuery("#aps_movie_review_by_container").toggle();
  });

// show the Organisation review_by option
jQuery("#aps_organisation_review_by_container").hide();

jQuery("#aps_organisation_review_by_enable").click(function(){
       jQuery("#aps_organisation_review_by_container").toggle();
  });

// show the Person review_by option
jQuery("#aps_person_review_by_container").hide();

jQuery("#aps_person_review_by_enable").click(function(){
       jQuery("#aps_person_review_by_container").toggle();
  });

// show the Product review_by option
jQuery("#aps_product_review_by_container").hide();

jQuery("#aps_product_review_by_enable").click(function(){
       jQuery("#aps_product_review_by_container").toggle();
  });

// show the Recipe review_by option
jQuery("#aps_recipe_review_by_container").hide();

jQuery("#aps_recipe_review_by_enable").click(function(){
       jQuery("#aps_recipe_review_by_container").toggle();
  });


		//shows/hides the post preview on the post page dependant on which option selected
		// probably not the best jQuery in the world but it works.
		jQuery('.aps_book_container').hide();                  // NOTE THAT THISIS A CLASS - the front end uses classes but the back end is using IDs!!
		jQuery('#aps_event_container').hide();
		jQuery('#aps_movie_container').hide();
		jQuery('#aps_organisation_container').hide();
		jQuery('#aps_person_container').hide();
		jQuery('#aps_product_container').hide();
		jQuery('#aps_recipe_container').hide();
		jQuery('#aps_review_container').hide();
		
		jQuery("#form_selector").change(function(){
			if(this.value == 'book')
			{jQuery(".aps_book_container").show();}
			else
			{jQuery(".aps_book_container").hide();}
			
			if(this.value == 'event')
			{jQuery("#aps_event_container").show();}
			else
			{jQuery("#aps_event_container").hide();}
		
			if(this.value == 'movie')
			{jQuery("#aps_movie_container").show();}
			else
			{jQuery("#aps_movie_container").hide();}
		
			if(this.value == 'organisation')
			{jQuery("#aps_organisation_container").show();}
			else
			{jQuery("#aps_organisation_container").hide();}
		
			if(this.value == 'person')
			{jQuery("#aps_person_container").show();}
			else
			{jQuery("#aps_person_container").hide();}
		
			if(this.value == 'product')
			{jQuery("#aps_product_container").show();}
			else
			{jQuery("#aps_product_container").hide();}
		
			if(this.value == 'recipe')
			{jQuery("#aps_recipe_container").show();}
			else
			{jQuery("#aps_recipe_container").hide();}
		
			if(this.value == 'review')
			{jQuery("#aps_review_container").show();}
			else
			{jQuery("#aps_review_container").hide();}
		
		});
		


}); 





jQuery(document).ready(function() {
		

//stop the forms from submitting with jquery is on
jQuery("#aps_schema_form_book").submit(function () { return false; });
jQuery("#aps_schema_form_event").submit(function () { return false; });
jQuery("#aps_schema_form_movie").submit(function () { return false; });
jQuery("#aps_schema_form_organisation").submit(function () { return false; });
jQuery("#aps_schema_form_person").submit(function () { return false; });
jQuery("#aps_schema_form_product").submit(function () { return false; });
jQuery("#aps_schema_form_recipe").submit(function () { return false; });
jQuery("#aps_schema_form_review").submit(function () { return false; });


// save function
		function apsSaveUpdate(table_name, schema_data, schema_type, message) {

				//nonce = jQuery(this).attr('data-nonce');
				//alert(currentid);
				var message = message;
			
				data = {
					action: 'aps_save_update_schema',
					type: 'POST',
					dataType: 'JSON',
					"table_name" : table_name,
					"schema_data" : schema_data,
					"schema_type" : schema_type
					//nonce: nonce
					
				};
		
				jQuery.post(ajaxurl, data, function(response) {
					
					var dataz = response;
					//console.log(dataz);
					var obj = jQuery.parseJSON(dataz);

					if (message == "save") {
					jQuery('#aps_schema_messages').append('<p class="aps_save_message" style="background:green; color: white; text-align:center; font-size:16px; padding: 5px 0;">Your Schema shortcode has been saved and inserted.</p>');
					jQuery('.aps_save_message').delay(3000).fadeOut("slow")

					}
					if (message == "update") {
					jQuery('#aps_schema_messages').append('<p class="aps_update_message" style="background:green; color: white; text-align:center; font-size:16px; padding: 5px 0;">Your Schema shortcode has been updated.</p>');
					jQuery('.aps_update_message').delay(3000).fadeOut("slow")
					}


// check to see if save name exists on list, if it does do nothing, else add the save name o tth elist, in case the user needs to select it before a page reload.
var aps_schema_dropdown = "aps_" + schema_type + "_load_selection";	
var aps_schema_get_save_name = "aps_" + schema_type + "_save_name";	
var aps_opt = jQuery("input[name='"+aps_schema_get_save_name+"']").val();
if (jQuery('#'+aps_schema_dropdown+' option:contains('+ aps_opt +')').length) {} else {
jQuery('#'+aps_schema_dropdown).append(
									   jQuery('<option>', {
											  value: aps_opt,
											  text:aps_opt
											  }));
}







					//http://www.abeautifulsite.net/blog/2010/01/smoothly-scroll-to-an-element-without-a-jquery-plugin/
					jQuery('html, body').animate({
						 scrollTop: jQuery("#titlediv").offset().top
					 }, 100);
					
													});
		};


/* insert content into tinymce */
//http://stackoverflow.com/questions/13393892/inserting-text-in-tinymce-editor-where-the-cursor-is

//   This replaces double quotes with single in order to stop the shotcodes from breaking.
//book
jQuery('#aps_book_save').click(function() { 
										
										
										
	var aps_schema_save_name = jQuery("input[name='aps_book_save_name']").val();
	
		if(aps_schema_save_name == '') {return; }

	var aps_schematype = "book";
	
	var aps_name_check = jQuery("input[name='aps_book_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	//the save section
	var book_data = '';
	var table_name = "aps_book";
	book_data = jQuery('#aps_schema_form_book').serializeArray();
	var obj = jQuery.makeArray(book_data);
	//console.log(obj);
	var message = "save";
	apsSaveUpdate(table_name, book_data, aps_schematype, message )


	//if the form has been validated - then send shortcode to the tinymce window
	if(jQuery('#aps_schema_form_book').valid()) {


	tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
																  );
	
										}
});


jQuery('#aps_book_update').click(function() { 

	var aps_name_check = jQuery("input[name='aps_book_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var aps_schema_save_name = jQuery("input[name='aps_book_save_name']").val();
	var aps_schematype = "book";

	var update_book_data = '';
	var update_table_name = "aps_book";
	update_book_data = jQuery('#aps_schema_form_book').serializeArray();
	var update_obj = jQuery.makeArray(update_book_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_book_data, aps_schematype, updatemessage )
});




//event
jQuery('#aps_event_save').click(function() { 

	var aps_schema_save_name = jQuery("input[name='aps_event_save_name']").val();
	var aps_schematype = "event";

	var aps_name_check = jQuery("input[name='aps_event_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var event_data = '';
	var table_name = "aps_event";
	event_data = jQuery('#aps_schema_form_event').serializeArray();
	var obj = jQuery.makeArray(event_data);
	var message = "save";
	apsSaveUpdate(table_name, event_data, aps_schematype, message )
	
	
	if(jQuery('#aps_schema_form_event').valid()) {
	tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
																  );
	};

});
jQuery('#aps_event_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_event_save_name']").val();
	var aps_schematype = "event";

	var aps_name_check = jQuery("input[name='aps_event_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_event_data = '';
	var update_table_name = "aps_event";
	update_event_data = jQuery('#aps_schema_form_event').serializeArray();
	var update_obj = jQuery.makeArray(update_event_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_event_data, aps_schematype, updatemessage )
});


//movie
jQuery('#aps_movie_save').click(function() { 

	var aps_schema_save_name = jQuery("input[name='aps_movie_save_name']").val();
	var aps_schematype = "movie";
	
	var aps_name_check = jQuery("input[name='aps_movie_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var movie_data = '';
	var table_name = "aps_movie";
	var updatemessage = "update";
	movie_data = jQuery('#aps_schema_form_movie').serializeArray();
	var obj = jQuery.makeArray(movie_data);
	message = "save";
	apsSaveUpdate(table_name, movie_data, aps_schematype, message )


	if(jQuery('#aps_schema_form_movie').valid()) {
	
	// combines the actors
	var aps_movie_all_actors = jQuery('.aps_movie_actors').map(function() { return this.value;}).get();
	var aps_movie_actors = 'aps_movie_actors="' + aps_movie_all_actors + '" ';

	
	tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
																  );
};
});
jQuery('#aps_movie_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_movie_save_name']").val();
	var aps_schematype = "movie";

	var aps_name_check = jQuery("input[name='aps_movie_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_movie_data = '';
	var update_table_name = "aps_movie";
	update_movie_data = jQuery('#aps_schema_form_movie').serializeArray();
	var update_obj = jQuery.makeArray(update_movie_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_movie_data, aps_schematype, updatemessage )
});


//organisation
jQuery('#aps_organisation_save').click(function() { 

	var aps_schema_save_name = jQuery("input[name='aps_organisation_save_name']").val();
	var aps_schematype = "organisation";

	var aps_name_check = jQuery("input[name='aps_organisation_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var organisation_data = '';
	var table_name = "aps_organisation";
	organisation_data = jQuery('#aps_schema_form_organisation').serializeArray();
	var obj = jQuery.makeArray(organisation_data);
	var message = "save";
	apsSaveUpdate(table_name, organisation_data, aps_schematype, message )
					
					
	if(jQuery('#aps_schema_form_organisation').valid()) {
		tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
	);
	};
});
jQuery('#aps_organisation_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_organisation_save_name']").val();
	var aps_schematype = "organisation";

	var aps_name_check = jQuery("input[name='aps_organisation_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_organisation_data = '';
	var update_table_name = "aps_organisation";
	update_organisation_data = jQuery('#aps_schema_form_organisation').serializeArray();
	var update_obj = jQuery.makeArray(update_organisation_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_organisation_data, aps_schematype, updatemessage )
});



//person

jQuery('#aps_person_save').click(function() { 

	var aps_schema_save_name = jQuery("input[name='aps_person_save_name']").val();
	var aps_schematype = "person";

	var aps_name_check = jQuery("input[name='aps_person_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var person_data = '';
	var table_name = "aps_person";
	person_data = jQuery('#aps_schema_form_person').serializeArray();
	var obj = jQuery.makeArray(person_data);
	var message = "save";

	apsSaveUpdate(table_name, person_data, aps_schematype, message )
					
					
	if(jQuery('#aps_schema_form_person').valid()) {
		tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
	);
	};

});
jQuery('#aps_person_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_person_save_name']").val();
	var aps_schematype = "person";

	var aps_name_check = jQuery("input[name='aps_person_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_person_data = '';
	var update_table_name = "aps_person";
	update_person_data = jQuery('#aps_schema_form_person').serializeArray();
	var update_obj = jQuery.makeArray(update_person_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_person_data, aps_schematype, updatemessage )
});




//product
jQuery('#aps_product_save').click(function() { 
	var aps_product_startype = jQuery('input[name=aps_product_startype]:checked').val(); 
	var aps_product_review_by = jQuery("input[name='aps_product_review_by']").val();

	var aps_name_check = jQuery("input[name='aps_product_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var aps_product_condition = jQuery("#aps_product_condition option:selected").val();								//dropdown
		if(aps_product_condition != "Please Select...") { aps_product_condition = aps_product_condition; } else { aps_product_condition = ''; }


	var aps_schema_save_name = jQuery("input[name='aps_product_save_name']").val();
	var aps_schematype = "product";

	var product_data = '';
	var table_name = "aps_product";
	product_data = jQuery('#aps_schema_form_product').serializeArray();
	var obj = jQuery.makeArray(product_data);
	var message = "save";

	apsSaveUpdate(table_name, product_data, aps_schematype, message )
					
					
	if(jQuery('#aps_schema_form_product').valid()) {
		tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
	);
	};


});
jQuery('#aps_product_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_product_save_name']").val();
	var aps_schematype = "product";

	var aps_name_check = jQuery("input[name='aps_product_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_product_data = '';
	var update_table_name = "aps_product";
	update_product_data = jQuery('#aps_schema_form_product').serializeArray();
	var update_obj = jQuery.makeArray(update_product_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_product_data, aps_schematype, updatemessage )
});





//recipe
jQuery('#aps_recipe_save').click(function() { 

// combines the ingredients
var aps_recipe_all_ingredients = jQuery('.aps_recipe_ingredients').map(function() { return this.value;}).get();
var aps_recipe_ingredients = 'aps_recipe_ingredients="' + aps_recipe_all_ingredients + '" ';

	var aps_name_check = jQuery("input[name='aps_recipe_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

/*
var deanvalues_ing = jQuery('.aps_recipe_ingredients').map(function() { return this.value;}).get();
var aps_recipe_ingredients = 'aps_recipe_ingredients="' + deanvalues_ing + '" ';
*/

	var aps_schema_save_name = jQuery("input[name='aps_recipe_save_name']").val();
	var aps_schematype = "recipe";

	var recipe_data = '';
	var table_name = "aps_recipe";
	recipe_data = jQuery('#aps_schema_form_recipe').serializeArray();
	var obj = jQuery.makeArray(recipe_data);
	var message = "save";

	apsSaveUpdate(table_name, recipe_data, aps_schematype, message )
					
					
	if(jQuery('#aps_schema_form_recipe').valid()) {
		tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
	);
	};


});
jQuery('#aps_recipe_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_recipe_save_name']").val();
	var aps_schematype = "recipe";

	var aps_name_check = jQuery("input[name='aps_recipe_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_recipe_data = '';
	var update_table_name = "aps_recipe";
	update_recipe_data = jQuery('#aps_schema_form_recipe').serializeArray();
	var update_obj = jQuery.makeArray(update_recipe_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_recipe_data, aps_schematype, updatemessage )
});



//review
jQuery('#aps_review_save').click(function() { 

	//var aps_review_startype = jQuery('input[name=aps_review_startype]:checked').val(); 

	var aps_name_check = jQuery("input[name='aps_review_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	jQuery(".aps_schema_form_div").validate();

	var aps_schema_save_name = jQuery("input[name='aps_review_save_name']").val();
	var aps_schematype = "review";

	var review_data = '';
	var table_name = "aps_review";
	review_data = jQuery('#aps_schema_form_review').serializeArray();
	var obj = jQuery.makeArray(review_data);
	var message = "save";

	apsSaveUpdate(table_name, review_data, aps_schematype, message )
					
					
	if(jQuery('#aps_schema_form_review').valid()) {
		tinymce.activeEditor.execCommand('mceInsertContent', false, '[ap_schema type="' +aps_schematype+ '" name="' +aps_schema_save_name+ '"]'
	);
	};

});
jQuery('#aps_review_update').click(function() { 
	
	var aps_schema_save_name = jQuery("input[name='aps_review_save_name']").val();
	var aps_schematype = "review";

	var aps_name_check = jQuery("input[name='aps_review_name']").val();
	if(aps_name_check == '') {
		return; false;
	}

	var update_review_data = '';
	var update_table_name = "aps_review";
	update_review_data = jQuery('#aps_schema_form_review').serializeArray();
	var update_obj = jQuery.makeArray(update_review_data);
	//console.log(obj);
	var updatemessage = "update";
	apsSaveUpdate(update_table_name, update_review_data, aps_schematype, updatemessage )
});





				
}); //end update/saves




/* old meta to shortcode */
jQuery(document).ready(function(){
					
	//grab the meta data from the hidden form fields				
	var aps_old_title_now_name = jQuery("input[name='aps_old_title_now_name']").val(); 
	var aps_old_custom_date = jQuery("input[name='aps_old_custom_date']").val(); 
	var aps_old_affiliate_link = jQuery("input[name='aps_old_affiliate_link']").val(); 
	var aps_old_producturl_now_image_url = jQuery("input[name='aps_old_producturl_now_image_url']").val(); 
	var aps_old_rating = jQuery("input[name='aps_old_rating']").val(); 
	var aps_old_desc = jQuery("input[name='aps_old_desc']").val(); 

	
	// insert the hidden meta data into the new shortcode form
	jQuery('#aps_insert_old').click(function() { 
											 
		jQuery("input[name='aps_review_name']").val(aps_old_title_now_name);
		//jQuery("input[name='']").val(aps_old_custom_date);
		jQuery("input[name='aps_review_affiliate_url']").val(aps_old_affiliate_link);
		//jQuery("input[name='']").val(aps_old_producturl_now_image_url);
		jQuery("input[name='aps_review_rating']").val(aps_old_rating);
		jQuery("textarea[name='aps_review_description']").val(aps_old_desc);

	});
		
});


// load Validation
// http://docs.jquery.com/Plugins/Validation
jQuery(document).ready(function(){
//	jQuery(".aps_schema_form_div").validate();
});






//*******************************
//*
//* LOAD BUTTONS ----------- AJAX functions to get the json data from database and insert it into the forms
//*
//*******************************


jQuery(document).ready(function(){


//----------------------- Book
	jQuery('#aps_book_load_button').click(function(){

	var aps_load_book_selection = jQuery("#aps_book_load_selection option:selected").val();									//dropdown

		jQuery('#aps_book_loading_image').show();
		jQuery('#aps_book_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema',
			type: 'post',
			dataType: 'JSON',
			"aps_load_book_selection" : aps_load_book_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		//console.log (result); //show json in console
		
		jQuery('input[name=aps_book_name]').val(result.item.book_name);
		jQuery('input[name=aps_book_website]').val(result.item.book_url);
		jQuery('textarea[name=aps_book_description]').val(result.item.book_desc);
		jQuery('input[name=aps_book_author]').val(result.item.book_author);
		jQuery('input[name=aps_book_publisher]').val(result.item.book_publisher);
		jQuery('input[name=aps_book_pub_date]').val(result.item.book_pub_date);
		jQuery('input[name=aps_book_edition]').val(result.item.book_edition);
		jQuery('input[name=aps_book_isbn]').val(result.item.book_isbn);

		jQuery('[name=apschema_book_schema_format] option').filter(function() { 
				return (jQuery(this).text() == result.item.book_format);
		}).prop('selected', true);		

		jQuery('[name=apschema_book_schema_genre] option').filter(function() { 
				return (jQuery(this).text() == result.item.book_genre); 
		}).prop('selected', true);		
		
		//jQuery('input[name=aps_book_review_by_enable]').val(result.item.book_name);
		var testtickbox = '';
		var testtickbox = result.item.book_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_book_review_by_enable]').attr('checked', true);
		jQuery('#aps_book_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_book_review_by_enable]').attr('checked', false);
		jQuery('#aps_book_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_book_review_by]').val(result.item.book_review_by);
		jQuery('input[name=aps_book_save_name]').val(result.item.book_save_name);

		jQuery('#aps_book_loading_image').hide(); //hides the spinner image
		jQuery('#aps_book_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 


//----------------------- Event

	jQuery('#aps_event_load_button').click(function(){

	var aps_load_event_selection = jQuery("#aps_event_load_selection option:selected").val();									//dropdown

		jQuery('#aps_event_loading_image').show();
		jQuery('#aps_event_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_event',
			type: 'post',
			dataType: 'JSON',
			"aps_load_event_selection" : aps_load_event_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
		
		//alert( dataz );
		
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		//console.log (result); //show json in console
		jQuery('[name=aps_event_schema_event_type] option').filter(function() { 
				return (jQuery(this).text() == result.item.event_type);
		}).prop('selected', true);		

		jQuery('input[name=aps_event_name]').val(result.item.event_name);
		jQuery('input[name=aps_event_website]').val(result.item.event_url);
		jQuery('textarea[name=aps_event_description]').val(result.item.event_desc);
		jQuery('input[name=aps_event_start_date]').val(result.item.event_start_date);
		jQuery('input[name=aps_event_end_date]').val(result.item.event_end_date);
		jQuery('input[name=aps_event_start_time]').val(result.item.event_start_time);
		jQuery('input[name=aps_event_end_time]').val(result.item.event_end_time);
		jQuery('input[name=aps_event_duration]').val(result.item.event_duration);
		jQuery('input[name=aps_event_address]').val(result.item.event_address);
		jQuery('input[name=aps_event_pobox]').val(result.item.event_pobox);
		jQuery('input[name=aps_event_city]').val(result.item.event_city);
		jQuery('input[name=aps_event_state_region]').val(result.item.event_region);
		jQuery('input[name=aps_event_postal_code]').val(result.item.event_postalcode);
		jQuery('input[name=aps_event_country]').val(result.item.event_country);
		jQuery('input[name=aps_event_email]').val(result.item.event_email);
		jQuery('input[name=aps_event_telephone]').val(result.item.event_phone);
		
		//jQuery('input[name=aps_event_review_by_enable]').val(result.item.event_name);
		var testtickbox = '';
		var testtickbox = result.item.event_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_event_review_by_enable]').attr('checked', true);
		jQuery('#aps_event_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_event_review_by_enable]').attr('checked', false);
		jQuery('#aps_event_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_event_review_by]').val(result.item.event_review_by);
		jQuery('input[name=aps_event_save_name]').val(result.item.event_save_name);

		jQuery('#aps_event_loading_image').hide(); //hides the spinner image
		jQuery('#aps_event_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 


//----------------------- Movie

	jQuery('#aps_movie_load_button').click(function(){

	var aps_load_movie_selection = jQuery("#aps_movie_load_selection option:selected").val();								
	
		jQuery('#aps_movie_loading_image').show();
		jQuery('#aps_movie_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_movie',
			type: 'post',
			dataType: 'JSON',
			"aps_load_movie_selection" : aps_load_movie_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
				
		// REALLY IMPORTANT!!
		var results = jQuery.parseJSON(dataz);

		//console.log (results); //show json in console
		
		jQuery('input[name=aps_movie_name]').val(results.item.movie_name);
		jQuery('input[name=aps_movie_website]').val(results.item.movie_url);
		jQuery('textarea[name=aps_movie_description]').val(results.item.movie_desc);
		jQuery('input[name=aps_movie_director]').val(results.item.movie_director);
		jQuery('input[name=aps_movie_producer]').val(results.item.movie_producer);
		//jQuery('input[name=aps_movie_actors]').val(results.item.movie_actors);
	


//hide the default actor field
jQuery('input[name=aps_movie_actors]').hide();

//remove any old actor fields
jQuery("#aps_add_actors_wrapper").children("#loaded_actors").remove();

//find all the actor values and add new fields for them
jQuery.each(results, function(i, v) {
			if (v.name == "aps_movie_actors" && v.value != '') {								   
				
				jQuery('#aps_add_actors_wrapper').append('<div id="loaded_actors"><input type="text" class="regular-text aps_movie_actors" name="aps_movie_actors" name="aps_movie_actors" value="' + v.value + '"/><a href="#" class="removeclassloaded">&times;</a></div>');	
			}
});



		//jQuery('input[name=aps_movie_review_by_enable]').val(result.item.movie_name);
		var testtickbox = '';
		var testtickbox = results.item.movie_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_movie_review_by_enable]').attr('checked', true);
		jQuery('#aps_movie_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_movie_review_by_enable]').attr('checked', false);
		jQuery('#aps_movie_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_movie_review_by]').val(results.item.movie_review_by);
		jQuery('input[name=aps_movie_save_name]').val(results.item.movie_save_name);

		jQuery('#aps_movie_loading_image').hide(); //hides the spinner image
		jQuery('#aps_movie_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 





//----------------------- organisation

	jQuery('#aps_organisation_load_button').click(function(){

	var aps_load_organisation_selection = jQuery("#aps_organisation_load_selection option:selected").val();								
	
		jQuery('#aps_organisation_loading_image').show();
		jQuery('#aps_organisation_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_organisation',
			type: 'post',
			dataType: 'JSON',
			"aps_load_organisation_selection" : aps_load_organisation_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
		//console.log (dataz); //show json in console
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		jQuery('[name=aps_organisation_schema_organisation_type] option').filter(function() { 
				return (jQuery(this).text() == result.item.organisation_type);
		}).prop('selected', true);		
		
		jQuery('input[name=aps_organisation_name]').val(result.item.organisation_name);
		jQuery('input[name=aps_organisation_website]').val(result.item.organisation_url);
		jQuery('textarea[name=aps_organisation_description]').val(result.item.organisation_desc);
		jQuery('input[name=aps_organisation_address]').val(result.item.organisation_address);
		jQuery('input[name=aps_organisation_pobox]').val(result.item.organisation_pobox);
		jQuery('input[name=aps_organisation_city]').val(result.item.organisation_city);
		jQuery('input[name=aps_organisation_state_region]').val(result.item.organisation_region);
		jQuery('input[name=aps_organisation_postal_code]').val(result.item.organisation_postalcode);
		jQuery('input[name=aps_organisation_country]').val(result.item.organisation_country);
		jQuery('input[name=aps_organisation_email]').val(result.item.organisation_email);
		jQuery('input[name=aps_organisation_telephone]').val(result.item.organisation_phone);
		jQuery('input[name=aps_organisation_fax]').val(result.item.organisation_fax);
		jQuery('input[name=aps_organisation_logo]').val(result.item.organisation_logo);
	


		//jQuery('input[name=aps_organisation_review_by_enable]').val(result.item.organisation_name);
		var testtickbox = '';
		var testtickbox = result.item.organisation_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_organisation_review_by_enable]').attr('checked', true);
		jQuery('#aps_organisation_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_organisation_review_by_enable]').attr('checked', false);
		jQuery('#aps_organisation_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_organisation_review_by]').val(result.item.organisation_review_by);
		jQuery('input[name=aps_organisation_save_name]').val(result.item.organisation_save_name);

		jQuery('#aps_organisation_loading_image').hide(); //hides the spinner image
		jQuery('#aps_organisation_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 





//----------------------- person

	jQuery('#aps_person_load_button').click(function(){

	var aps_load_person_selection = jQuery("#aps_person_load_selection option:selected").val();								
	
		jQuery('#aps_person_loading_image').show();
		jQuery('#aps_person_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_person',
			type: 'post',
			dataType: 'JSON',
			"aps_load_person_selection" : aps_load_person_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
		//console.log (dataz); //show json in console
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		jQuery('input[name=aps_person_name]').val(result.item.person_name);
		jQuery('input[name=aps_person_org]').val(result.item.person_org);
		jQuery('input[name=aps_person_job_title]').val(result.item.person_job_title);
		jQuery('input[name=aps_person_url]').val(result.item.person_url);
		jQuery('textarea[name=aps_person_desc]').val(result.item.person_desc);
		jQuery('input[name=aps_person_birthday]').val(result.item.person_birthday);		
		jQuery('input[name=aps_person_image]').val(result.item.person_image);		
		jQuery('input[name=aps_person_address]').val(result.item.person_address);
		jQuery('input[name=aps_person_pobox]').val(result.item.person_pobox);
		jQuery('input[name=aps_person_city]').val(result.item.person_city);
		jQuery('input[name=aps_person_region]').val(result.item.person_region);
		jQuery('input[name=aps_person_postalcode]').val(result.item.person_postalcode);
		jQuery('input[name=aps_person_country]').val(result.item.person_country);
		jQuery('input[name=aps_person_email]').val(result.item.person_email);
		jQuery('input[name=aps_person_telephone]').val(result.item.person_phone);
		jQuery('input[name=aps_person_fax]').val(result.item.person_fax);
		jQuery('input[name=aps_person_photo]').val(result.item.person_photo_url);


		//jQuery('input[name=aps_person_review_by_enable]').val(result.item.person_name);
		var testtickbox = '';
		var testtickbox = result.item.person_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_person_review_by_enable]').attr('checked', true);
		jQuery('#aps_person_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_person_review_by_enable]').attr('checked', false);
		jQuery('#aps_person_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_person_review_by]').val(result.item.person_review_by);
		jQuery('input[name=aps_person_save_name]').val(result.item.person_save_name);

		jQuery('#aps_person_loading_image').hide(); //hides the spinner image
		jQuery('#aps_person_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 



//----------------------- product

	jQuery('#aps_product_load_button').click(function(){

	var aps_load_product_selection = jQuery("#aps_product_load_selection option:selected").val();								
	
		jQuery('#aps_product_loading_image').show();
		jQuery('#aps_product_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_product',
			type: 'post',
			dataType: 'JSON',
			"aps_load_product_selection" : aps_load_product_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
		//console.log (dataz); //show json in console
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		jQuery('input[name=aps_product_name]').val(result.item.product_name);
		jQuery('input[name=aps_product_website]').val(result.item.product_url);
		jQuery('textarea[name=aps_product_description]').val(result.item.product_desc);
		
		jQuery('input[name=aps_product_brand]').val(result.item.product_brand);		
		jQuery('input[name=aps_product_manufacturer]').val(result.item.product_manufacturer);		
		jQuery('input[name=aps_product_model]').val(result.item.product_model);
		jQuery('input[name=aps_product_product_id]').val(result.item.product_prod_id);
		jQuery('input[name=aps_product_max_score]').val(result.item.product_max_score);
		jQuery('input[name=aps_product_avg_rating]').val(result.item.product_avg_rating);
		jQuery('input[name=aps_product_number_reviews]').val(result.item.product_no_reviews);
		jQuery('input[name=aps_product_price]').val(result.item.product_price);



		jQuery('[name=aps_product_condition] option').filter(function() { 
				return (jQuery(this).text() == result.item.product_condition);
		}).prop('selected', true);		



		//jQuery('input[name=aps_product_condition]').val(result.item.product_condition);
		
		jQuery('input[name=aps_product_image_url]').val(result.item.product_image_url);
		jQuery('input[name=aps_product_affiliate_url]').val(result.item.product_affiliate_url);

		jQuery('input[name=aps_product_startype_enable]').val(result.item.product_startype_enable);
		//jQuery('input[name=aps_product_startype]').val(result.item.product_startype);


		var aps_find_startype_radio = result.item.product_startype;
		if(aps_find_startype_radio != '') {
		jQuery(':radio[value="'+aps_find_startype_radio+'"]').attr('checked', 'true');
		}

		
		
		//display the star type override section only if it contains something
		var aps_show_star_types = '';
		var aps_show_star_types = result.item.product_startype;
		if (aps_show_star_types != '') {
		jQuery('input[name=aps_product_startype_enable]').attr('checked', true);
		jQuery('#aps_product_startype_container').css("display", "block");
		} else {
		jQuery('input[name=aps_product_startype_enable]').attr('checked', false);
		jQuery('#aps_product_startype_container').css("display", "none");
		}


		//display the review by section only if it contains something
		var testtickbox = '';
		var testtickbox = result.item.product_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_product_review_by_enable]').attr('checked', true);
		jQuery('#aps_product_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_product_review_by_enable]').attr('checked', false);
		jQuery('#aps_product_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_product_review_by]').val(result.item.product_review_by);
		jQuery('input[name=aps_product_save_name]').val(result.item.product_save_name);

		jQuery('#aps_product_loading_image').hide(); //hides the spinner image
		jQuery('#aps_product_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 



//----------------------- recipe

	jQuery('#aps_recipe_load_button').click(function(){

	var aps_load_recipe_selection = jQuery("#aps_recipe_load_selection option:selected").val();								
	
		jQuery('#aps_recipe_loading_image').show();
		jQuery('#aps_recipe_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_recipe',
			type: 'post',
			dataType: 'JSON',
			"aps_load_recipe_selection" : aps_load_recipe_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);

		//console.log (dataz); //show json in console
		
		jQuery('input[name=aps_recipe_name]').val(result.item.recipe_name);
		jQuery('input[name=aps_recipe_image_url]').val(result.item.recipe_image_url);
		jQuery('textarea[name=aps_recipe_description]').val(result.item.recipe_desc);
		jQuery('input[name=aps_recipe_author]').val(result.item.recipe_author);
		jQuery('input[name=aps_recipe_pub_date]').val(result.item.recipe_pub_date);
	
		jQuery('input[name=aps_recipe_prep_hours]').val(result.item.recipe_prep_hours);
		jQuery('input[name=aps_recipe_prep_minutes]').val(result.item.recipe_prep_mins);
		jQuery('input[name=aps_recipe_cook_minutes]').val(result.item.recipe_cook_mins);
		jQuery('input[name=aps_recipe_cook_hours]').val(result.item.recipe_cook_hours);
		jQuery('input[name=aps_recipe_yield]').val(result.item.recipe_yield);
		jQuery('input[name=aps_recipe_calories]').val(result.item.recipe_calories);
		jQuery('input[name=aps_recipe_fat]').val(result.item.recipe_fat);
		jQuery('input[name=aps_recipe_sugar]').val(result.item.recipe_sugar);
		jQuery('input[name=aps_recipe_salt]').val(result.item.recipe_salt);
		//jQuery('input[name=aps_recipe_ingredients]').val(result.item.recipe_ingredients);
		jQuery('textarea[name=aps_recipe_instructions]').val(result.item.recipe_instructions);
		jQuery('input[name=aps_recipe_rating]').val(result.item.recipe_rating);
		jQuery('input[name=aps_recipe_rating_min]').val(result.item.recipe_rating_min);
		jQuery('input[name=aps_recipe_rating_max]').val(result.item.recipe_rating_max);
		jQuery('input[name=aps_recipe_startype_enable]').val(result.item.recipe_startype);



//hide the default actor field
jQuery('input[name=aps_recipe_ingredients]').hide();

//remove any old actor fields
jQuery("#aps_add_ingredients_wrapper").children("#loaded_ingredients").remove();


//find all the actor values and add new fields for them
jQuery.each(result, function(i, v) {
			//console.log(v.value);
			if (v.name == "aps_recipe_ingredients" && v.value != '') {								   
				jQuery('#aps_add_ingredients_wrapper').append('<div id="loaded_ingredients"><input type="text" class="regular-text aps_recipe_ingredients" name="aps_recipe_ingredients" name="aps_recipe_ingredients" value="' + v.value + '"/><a href="#" class="removeclassloaded">&times;</a></div>');	
			}
});



		var aps_find_startype_radio_recipe = result.item.recipe_startype;
		if(aps_find_startype_radio_recipe != '') {
		jQuery(':radio[value="'+aps_find_startype_radio_recipe+'"]').attr('checked', 'true');
		}


		//display the star type override section only if it contains something
		var aps_show_star_types_recipe = '';
		var aps_show_star_types_recipe = result.item.recipe_startype;
		if (aps_show_star_types_recipe != '') {
		jQuery('input[name=aps_recipe_startype_enable]').attr('checked', true);
		jQuery('#aps_recipe_startype_container').css("display", "block");
		} else {
		jQuery('input[name=aps_recipe_startype_enable]').attr('checked', false);
		jQuery('#aps_recipe_startype_container').css("display", "none");
		}


		//jQuery('input[name=aps_recipe_review_by_enable]').val(result.item.recipe_name);
		var testtickbox = '';
		var testtickbox = result.item.recipe_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_recipe_review_by_enable]').attr('checked', true);
		jQuery('#aps_recipe_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_recipe_review_by_enable]').attr('checked', false);
		jQuery('#aps_recipe_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_recipe_review_by]').val(result.item.recipe_review_by);
		jQuery('input[name=aps_recipe_save_name]').val(result.item.recipe_save_name);

		jQuery('#aps_recipe_loading_image').hide(); //hides the spinner image
		jQuery('#aps_recipe_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 











//----------------------- review

	jQuery('#aps_review_load_button').click(function(){

	var aps_load_review_selection = jQuery("#aps_review_load_selection option:selected").val();								
	
		jQuery('#aps_review_loading_image').show();
		jQuery('#aps_review_load_button').attr('disabled', true); //stop load button being clicked when processing
		
		jQuery.ajax ( data = {
			action: 'aps_get_load_schema_review',
			type: 'post',
			dataType: 'JSON',
			"aps_load_review_selection" : aps_load_review_selection,
			success: function (response) {
			}
			
		});
		
		jQuery.post(ajaxurl, data, function (response) {

		var dataz = response;
				
		// REALLY IMPORTANT!!
		var result = jQuery.parseJSON(dataz);
		//console.log (dataz); //show json in console

		jQuery('input[name=aps_review_name]').val(result.item.review_name);
		jQuery('input[name=aps_review_affiliate_url]').val(result.item.review_affiliate_url);
		jQuery('input[name=aps_review_image_url]').val(result.item.review_image_url);
		jQuery('input[name=aps_review_website]').val(result.item.review_url);
		jQuery('textarea[name=aps_review_description]').val(result.item.review_desc);
		jQuery('input[name=aps_review_item_name]').val(result.item.review_item_name);		
		jQuery('textarea[name=aps_review_item_review]').val(result.item.review_item_review);		
		jQuery('input[name=aps_review_rating]').val(result.item.review_rating);
		jQuery('input[name=aps_review_rating_min]').val(result.item.review_rating_min);
		jQuery('input[name=aps_review_rating_max]').val(result.item.review_rating_max);
		jQuery('input[name=aps_review_author]').val(result.item.review_author);
		//jQuery('input[name=aps_review_startype]').val(result.item.review_startype);
		jQuery('input[name=aps_review_pub_date]').val(result.item.review_pub_date);
	


		var aps_find_startype_radio_review = result.item.review_startype;
		if(aps_find_startype_radio_review != '') {
		jQuery(':radio[value="'+aps_find_startype_radio_review+'"]').attr('checked', 'true');
		}


		//display the star type override section only if it contains something
		var aps_show_star_types_review = '';
		var aps_show_star_types_review = result.item.review_startype;
		if (aps_show_star_types_review != '') {
		jQuery('input[name=aps_review_startype_enable]').attr('checked', true);
		jQuery('#aps_review_startype_container').css("display", "block");
		} else {
		jQuery('input[name=aps_review_startype_enable]').attr('checked', false);
		jQuery('#aps_review_startype_container').css("display", "none");
		}



		//jQuery('input[name=aps_review_review_by_enable]').val(result.item.review_name);
		var testtickbox = '';
		var testtickbox = result.item.review_review_by;
		if (testtickbox != '') {
		jQuery('input[name=aps_review_review_by_enable]').attr('checked', true);
		jQuery('#aps_review_review_by_container').css("display", "block");
		} else {
		jQuery('input[name=aps_review_review_by_enable]').attr('checked', false);
		jQuery('#aps_review_review_by_container').css("display", "none");
		}

		jQuery('input[name=aps_review_review_by]').val(result.item.review_review_by);
		jQuery('input[name=aps_review_save_name]').val(result.item.review_save_name);

		jQuery('#aps_review_loading_image').hide(); //hides the spinner image
		jQuery('#aps_review_load_button').attr('disabled', false); //re-enable button

});

return false;
	
}); 


}); //end doc ready for load buttons





// DELETE SCHEMAS
jQuery(document).ready(function(){

	jQuery('#aps_book_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_book_load_selection option:selected").val();	
						var aps_delete_type = "book";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_event_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_event_load_selection option:selected").val();	
						var aps_delete_type = "event";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_movie_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_movie_load_selection option:selected").val();	
						var aps_delete_type = "movie";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_organisation_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_organisation_load_selection option:selected").val();	
						var aps_delete_type = "organisation";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_person_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_person_load_selection option:selected").val();	
						var aps_delete_type = "person";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_product_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_product_load_selection option:selected").val();	
						var aps_delete_type = "product";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_recipe_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_recipe_load_selection option:selected").val();	
						var aps_delete_type = "recipe";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	jQuery('#aps_review_delete_button').click(function() {
														 
						var aps_delete_movie_selection = jQuery("#aps_review_load_selection option:selected").val();	
						var aps_delete_type = "review";
						apsConfirmDialog(aps_delete_movie_selection, aps_delete_type);
											
	});
	
	
	function apsConfirmDialog(schema_name, schema_type) {
			jQuery.Zebra_Dialog('<strong>Are you sure you want to delete this schema?</strong><br /> This action cannot be undone.', {
				'type':     'question',
				'title':    'Confirm Schema Deletion',
				'buttons':  [
								{caption: 'Yes', callback: function() { 
												//nonce = jQuery(this).attr('data-nonce');

										data = {
										action: 'aps_delete_schema',
										type: 'POST',
										dataType: 'JSON',
										"table_name" : schema_type,
										"schema_name" : schema_name,
										//nonce: nonce
										
										};
										
										jQuery.post(ajaxurl, data, function(response) {
										
										jQuery('#aps_schema_messages').append('<p style="background:red; color: white; text-align:center; font-size:16px; padding: 5px 0;">'+response+'</p>').delay(3000).fadeOut("slow");
										
										var aps_schema_dropdown = "aps_" + schema_type + "_load_selection";										
										jQuery('#'+aps_schema_dropdown+' option:selected').remove();	
										
										//console.log(response);
										});
				
								}},
								{caption: 'Cancel', callback: function() {}}
							]
			});								
	}
													 
													 
	
});


jQuery(document).ready(function($){
 
 
    var custom_uploader;
 	var upload_field_class = '';

    $('.upload_image_button').click(function(e) {
 
 	//the containing div will have an id and the input field will have the same id but as a class - get it.
 	  	//var upload_field_class = jQuery(this).closest("div").attr("id");
		//var upload_field_class= '';
		
	console.log(upload_field_class);

        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function(upload_field_class) {
            attachment = custom_uploader.state().get('selection').first().toJSON();
			console.log(attachment);
			console.log(upload_field_class);

			upload_field_class = '';
			upload_field_class = jQuery('.upload_image_button').closest("div").attr("id");
			$('.' + upload_field_class).val(attachment.url);
						console.log(upload_field_class);

        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});