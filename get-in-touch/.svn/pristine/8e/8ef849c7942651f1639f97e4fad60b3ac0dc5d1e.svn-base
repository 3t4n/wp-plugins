/******* Jquery No Conflict Function *******/
window.$ = jQuery.noConflict();

// Global Variable Declariation
var Status;
var Show = 'show';
var Hide = 'hide';
var process_input_fields_url 	= $("#git_text_hidden_url").val();
var urlpara = GetUrlValue('page');
if(urlpara === 'create-form')
{
	var form_id_counter = count_unique_form_id(process_input_fields_url);		
}

$(function(){
	$('.git-container .deletedata').on('click', function(){
		var check_fordeletedata = confirm('Do you want to delete?');
		if(check_fordeletedata == true)
		{		
			DeleteFormData($(this).attr('id'));
			return true
		}
		else
		{
			return false;
		}
	});

	$('.data_inportance').on('change', function(){
		SetImportantFormData($(this).attr('id'), $(this).val());
	});
});

// Initially Input Fields will be hide
//$("#input-options ul").hide();

/*
if(form_id_counter === '0')
{	
	reset_all_table_autoincrement_id();
}
*/

form_id_counter = ++form_id_counter;

// Get URL parameter
function GetUrlValue(Getvalue)
{
	var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == Getvalue) 
        {
            return sParameterName[1];
        }
    }
}
// Function to show and hide Loader
function Loader(Status)
{
	if(Status == 'show')
	{
		$('.git-loader').show();
	}
	else if(Status == 'hide')
	{
		$('.git-loader').fadeOut();
	}
}

//Go to Top
function GoToTop()
{
	$("html,body").animate({scrollTop:0}, 1500);
}

//Function to Get Parameter From URL
function GetURLParameters(param) 
{
    var val = document.URL;
    var url = val.substr(val.indexOf(param))  
    var action =url.replace(param+"=","");       
    return action;
}

$(function(){	

	PostInitialFormData(form_id_counter);			
	
	$('#ini_form_content').fadeIn(1000);	
	$("#input-options").find('ul').fadeIn(1000);	

	//Add Dynaminc Text Box for Form Title	
	$('#from-title').after().html('<input type="hidden" name="form_title' + form_id_counter + 
  	'" id="form_title' + form_id_counter + '" class="contact-form-title form-control" value="GIT Form' + form_id_counter + '" readonly="readonly">');


	var url_parameter = GetURLParameters("action");	
	if (url_parameter.indexOf("edit") >= 0)
	{		
		$('#update_form_content').fadeIn(1000);	
		$("#input-options").find('ul').fadeIn(1000);
	}
});

// Validate Form
function ValidateForm()
{
	var hasError = false;
	if($('#update_form_label').val() === '')
	{
		alert('Please enter form title.');			
		hasError = true;
	}
	else
	{
		SubmitForm();
	}
	return false;
}

// Call Quick Panel for Input Fields
$(function(){	

	$('#input-options li').click(function(){				

		var SelectedId = $(this).attr('id');
		var QuickPanel = $('#quick-panel');		
		GoToTop();	
		Loader(Show);	

		if(SelectedId === 'text-field')
		{										
			// Getting to default val for every field
			var name 			= $('#git_text_name').data('for');
			var id 				= $('#git_text_id').data('for');
			var cls 			= $('#git_text_class').data('for');
			var size 			= $('#git_text_size').data('for');
			var maxlen 			= $('#git_text_maxlen').data('for');
			var label 			= $('#git_text_label').data('for');
			var placeholder 	= $('#git_text_placeholder').data('for');

			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);
			
			$('#git_text_name').attr('value', name+Value);
			$('#git_text_id').attr('value', id+Value);
			$('#git_text_class').attr('value', cls+Value);			
			$('#git_text_size').attr('value', 42);
			$('#git_text_maxlen').attr('value', 50);			
			$('#git_text_label').attr('value', 'Name');			
			$('#git_text_placeholder').attr('value', 'Name');	

			QuickPanel.find('.email-container').hide();						
			QuickPanel.find('.phone-container').hide();
			QuickPanel.find('.textarea-container').hide();	
			QuickPanel.find('.map-container').hide();	
			QuickPanel.find('.captcha-container').hide();
			QuickPanel.find('.text-field-container').slideDown(1000);
		}

		if(SelectedId === 'email')
		{						
			// Getting to default val for every field
			var name 			= $('#git_email_name').data('for');
			var id 				= $('#git_email_id').data('for');
			var cls 			= $('#git_email_class').data('for');
			var size 			= $('#git_email_size').data('for');
			var maxlen 			= $('#git_email_maxlen').data('for');
			var label 			= $('#git_email_label').data('for');
			var placeholder		= $('#git_email_placeholder').data('for');

			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);
			
			$('#git_email_name').attr('value', name+Value);
			$('#git_email_id').attr('value', id+Value);
			$('#git_email_class').attr('value', cls+Value);			
			$('#git_email_size').attr('value', 42);
			$('#git_email_maxlen').attr('value', 50);			
			$('#git_email_label').attr('value', 'Email Address');	
			$('#git_email_placeholder').attr('value', 'Email Address');

			QuickPanel.find('.text-field-container').hide();
			QuickPanel.find('.map-container').hide();													
			QuickPanel.find('.phone-container').hide();
			QuickPanel.find('.textarea-container').hide();	
			QuickPanel.find('.captcha-container').hide();				
			QuickPanel.find('.email-container').slideDown(1000);
		}

		if(SelectedId === 'phone')
		{											
			// Getting to default val for every field
			var name 			= $('#git_phone_name').data('for');
			var id 				= $('#git_phone_id').data('for');
			var cls 			= $('#git_phone_class').data('for');
			var size 			= $('#git_phone_size').data('for');
			var maxlen 			= $('#git_phone_maxlen').data('for');
			var label 			= $('#git_phone_label').data('for');
			var placeholder		= $('#git_phone_placeholder').data('for');

			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);
			
			$('#git_phone_name').attr('value', name+Value);
			$('#git_phone_id').attr('value', id+Value);
			$('#git_phone_class').attr('value', cls+Value);			
			$('#git_phone_size').attr('value', 42);
			$('#git_phone_maxlen').attr('value', 50);			
			$('#git_phone_label').attr('value', 'Contact Number');		
			$('#git_phone_placeholder').attr('value', 'Contact Number');

			QuickPanel.find('.text-field-container').hide();
			QuickPanel.find('.email-container').hide();			
			QuickPanel.find('.map-container').hide();										
			QuickPanel.find('.textarea-container').hide();	
			QuickPanel.find('.captcha-container').hide();		
			QuickPanel.find('.phone-container').slideDown(1000);
		}

		if(SelectedId === 'textarea')
		{						
			// Getting to default val for every field
			var name 			= $('#git_textarea_name').data('for');
			var id 				= $('#git_textarea_id').data('for');
			var cls 			= $('#git_textarea_class').data('for');
			var cols 			= $('#git_textarea_cols').data('for');
			var rows 			= $('#git_textarea_rows').data('for');
			var label 			= $('#git_textarea_label').data('for');
			var placeholder		= $('#git_textarea_placeholder').data('for');

			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);
			
			$('#git_textarea_name').attr('value', name+Value);
			$('#git_textarea_id').attr('value', id+Value);
			$('#git_textarea_class').attr('value', cls+Value);			
			$('#git_textarea_cols').attr('value', 40);
			$('#git_textarea_rows').attr('value', 5);		
			$('#git_textarea_label').attr('value', 'Message');	
			$('#git_textarea_placeholder').attr('value', 'Message');

			QuickPanel.find('.text-field-container').hide();
			QuickPanel.find('.email-container').hide();						
			QuickPanel.find('.phone-container').hide();							
			QuickPanel.find('.map-container').hide();				
			QuickPanel.find('.captcha-container').hide();			
			QuickPanel.find('.textarea-container').slideDown(1000);
		}

		if(SelectedId === 'map')
		{						
			// Getting to default val for every field
			var latitude 			= $('#git_map_latitude').data('for');
			var longitude 			= $('#git_map_longitude').data('for');					
			var height 				= $('#git_map_height').data('for');
			var width 				= $('#git_map_width').data('for');
			var title 				= $('#git_map_title').data('for');
			var zoom 				= $('#git_map_zoom').data('for');
			var scrollwheel 		= $('#git_map_scrollwheel').data('for');
			var clickable 			= $('#git_map_clickable').data('for');
			
			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);
			
			$('#git_map_latitude').attr('value', '12.9120');
			$('#git_map_longitude').attr('value', '77.5930');			
			$('#git_map_height').attr('value', '300');
			$('#git_map_width').attr('value', '400');
			$('#git_map_title').attr('value', 'Get In Touch');
			$('#git_map_zoom').attr('value', '12');

			QuickPanel.find('.text-field-container').hide();
			QuickPanel.find('.email-container').hide();						
			QuickPanel.find('.phone-container').hide();							
			QuickPanel.find('.textarea-container').hide();
			QuickPanel.find('.captcha-container').hide();				
			QuickPanel.find('.map-container').slideDown(1000);			
		}		

		if(SelectedId === 'captcha')
		{						
			// Getting to default val for every field
			var publickey 			= $('#git_captcha_public_key').data('for');
			var privatekey 			= $('#git_captcha_private_key').data('for');			
			var theme 				= $('#git_captcha_theme').data('for');
			var language 			= $('#git_captcha_language').data('for');
			
			//Calling the function to set initial value for field
			var Value = InsertValueForEveryField(SelectedId);									

			QuickPanel.find('.text-field-container').hide();
			QuickPanel.find('.email-container').hide();						
			QuickPanel.find('.phone-container').hide();							
			QuickPanel.find('.textarea-container').hide();				
			QuickPanel.find('.map-container').hide();			
			QuickPanel.find('.captcha-container').slideDown(1000);			
		}		

		QuickPanel.fadeIn();
		QuickPanel.find('.selected-field').html('['+SelectedId+']');								
		Loader(Hide);
	});

	$('.git-container #close-quick-panel').click(function(){						
		GoToTop();
		Loader(Show);
		$('#quick-panel').slideUp();				
		Loader(Hide);
	});

	$('#content_form_text_fields').submit(function(){
		Loader(Show);
		Loader(Hide);
	});

	$('#content_form_email').submit(function(){
		Loader(Show);
		Loader(Hide);
	});

	$('#content_form_phone').submit(function(){
		Loader(Show);
		Loader(Hide);
	});

	$('#content_form_textarea').submit(function(){
		Loader(Show);
		Loader(Hide);
	});

	$('#content_form_map').submit(function(){
		Loader(Show);
		Loader(Hide);
	});

	$('#content_form_captcha').submit(function(){
		Loader(Show);
		Loader(Hide);
	});
});

//Data Submission Based on Input Type
function SubmitInputField(type, action)
{
	GoToTop();
	Loader(Show);
	if(type === 'text-field')		
	{			
		var	name	 	= $('#git_text_name').val();
		var id  		= $('#git_text_id').val();
		var cls  		= $('#git_text_class').val();
		var size  		= $('#git_text_size').val();
		var maxlen  	= $('#git_text_maxlen').val();		
		var label  		= $('#git_text_label').val();
		var placeholder	= $('#git_text_placeholder').val();
		var check       = $('#git_text_check').is(':checked');
		
		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{		
			// Pass Data to Array
			var data = new Array(name, id, cls, size, maxlen, label, check, to_update_id, placeholder);
		}
		else
		{			
		// Pass Data to Array
		var data = new Array(name, id, cls, size, maxlen, label, check, form_id_counter, placeholder);
		}		
		var RetVal = CheckPostedData(data);		

		if(RetVal === true)
		{				
			//Count All Input Fields to Assign Input-fields
			var text_field_counter = count_all_input_fields(process_input_fields_url, type);        			
			text_field_counter += 1;

			//Call Function to Post Data 					
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;						
		}
		else
		{			
			Loader(Hide);
			alert('Please enter the value of fields.');	
		}
	}

	// Email Data
	if(type === 'email')
	{			
		// Get All Data Attribute for Email
		var	name	 	= $('#git_email_name').val();
		var id  		= $('#git_email_id').val();
		var cls  		= $('#git_email_class').val();
		var size  		= $('#git_email_size').val();
		var maxlen  	= $('#git_email_maxlen').val();		
		var label  		= $('#git_email_label').val();
		var placeholder = $('#git_email_placeholder').val();
		var check       = $('#git_email_check').is(':checked');

		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{
			// Pass Data to Array
			var data = new Array(name, id, cls, size, maxlen, label, check, to_update_id, placeholder);
		}
		else
		{
		// Pass Data to Array
		var data = new Array(name, id, cls, size, maxlen, label, check, form_id_counter, placeholder);
		}		
		var RetVal = CheckPostedData(data);		
		
		if(RetVal === true)
		{			
			//Count All Input Fields to Assign Input-fields		
			var email_counter = count_all_input_fields(process_input_fields_url, type);        			
			email_counter += 1;

			//Call Function to Post Data 			
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;						
		}		
		else
		{
			Loader(Hide);
			alert('Please enter the value of fields.');
		}
	}

	// Phone Data
	if(type === 'phone')
	{		
		// Get All Data Attribute for Phone		
		var	name	 	= $('#git_phone_name').val();
		var id  		= $('#git_phone_id').val();
		var cls  		= $('#git_phone_class').val();
		var size  		= $('#git_phone_size').val();
		var maxlen  	= $('#git_phone_maxlen').val();		
		var label  		= $('#git_phone_label').val();
		var placeholder	= $('#git_phone_placeholder').val();
		var check       = $('#git_phone_check').is(':checked');

		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{
			// Pass Data to Array
			var data = new Array(name, id, cls, size, maxlen, label, check, to_update_id, placeholder);
		}
		else
		{
			// Pass Data to Array
			var data = new Array(name, id, cls, size, maxlen, label, check, form_id_counter, placeholder);
		}		
		var RetVal = CheckPostedData(data);		
		
		if(RetVal === true)
		{	
			//Count All Input Fields to Assign Input-fields
			var phone_counter = count_all_input_fields(process_input_fields_url, type);        			
			phone_counter += 1;

			//Call Function to Post Data 						
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;					
		}	
		else
		{
			Loader(Hide);
			var StatusShow = $('.StatusShow').html('Please enter the value of fields.');
			StatusShow.dialog();
		}		
	}

	// Text Area Data
	if(type === 'textarea')
	{			
		// Get All Data Attribute for Text Area
		var name 			= $('#git_textarea_name').val();
		var id 				= $('#git_textarea_id').val();
		var cls 			= $('#git_textarea_class').val();
		var cols 			= $('#git_textarea_cols').val();
		var rows 			= $('#git_textarea_rows').val();		
		var label 			= $('#git_textarea_label').val();
		var placeholder		= $('#git_textarea_placeholder').val();
		var check       	= $('#git_textarea_check').is(':checked');

		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{
			// Pass Data to Array
			var data = new Array(name, id, cls, cols, rows, label, check, to_update_id, placeholder);
		}
		else
		{
			// Pass Data to Array
			var data = new Array(name, id, cls, cols, rows, label, check, form_id_counter, placeholder);
		}		
		var RetVal = CheckPostedData(data);		
		
		if(RetVal === true)
		{	
			//Count All Input Fields to Assign Input-fields
			var textarea_counter = count_all_input_fields(process_input_fields_url, type);        			
			textarea_counter += 1;

			//Call Function to Post Data 						
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;					
		}	
		else
		{
			Loader(Hide);
			alert('Please enter the value of fields.');			
		}		
	}			

	// Map Data
	if(type === 'map')
	{		
		if($('#map_check').val() === 'has')
		{
			Loader(Hide);
			alert('You can not add more then one map in single contact form.');			
			return false;
		}
		else
		{
			$('#map_check').attr('value', 'has');	
		}		

		// Get All Data Attribute for Text Area
		var latitude 			= $('#git_map_latitude').val();
		var longitude 			= $('#git_map_longitude').val();		
		var height 				= $('#git_map_height').val();
		var width 				= $('#git_map_width').val();
		var title 				= $('#git_map_title').val();
		var zoom 				= $('#git_map_zoom').val();
		var scrollwheel 		= $('#git_map_scrollwheel').is(':checked');
		var clickable 			= $('#git_map_clickable').is(':checked');


		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{
			// Pass Data to Array
			var data = new Array(latitude, longitude, height, width, title, zoom, scrollwheel, clickable, to_update_id);
		}
		else
		{
			// Pass Data to Array			
			var data = new Array(latitude, longitude, height, width, title, zoom, scrollwheel, clickable, form_id_counter);
		}		
		var RetVal = CheckPostedData(data);		
		
		if(RetVal === true)
		{	
			//Count All Input Fields to Assign Input-fields
			var map_counter = count_all_input_fields(process_input_fields_url, type);        			
			map_counter += 1;

			//Call Function to Post Data 						
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;					
		}	
		else
		{
			Loader(Hide);
			alert('Please enter the value of fields.');
		}		
	}

	// Captcah Data
	if(type === 'captcha')
	{		
		if($('#captcha_check').val() === 'has')
		{
			Loader(Hide);
			alert('You can not add more then one captcha in single contact form.');			
			return false;
		}
		else
		{
			$('#captcha_check').attr('value', 'has');	
		}		

		// Get All Data Attribute for Text Area
		var publickey 			= $('#git_captcha_public_key').val();
		var privatekey 			= $('#git_captcha_private_key').val();		
		var theme 				= $('#git_captcha_theme').val();
		var language 			= $('#git_captcha_language').val();		


		var to_update_id= $('#action_val').val();

		if(action === 'update')
		{
			// Pass Data to Array
			var data = new Array(publickey, privatekey, theme, language, to_update_id);
		}
		else
		{
			// Pass Data to Array			
			var data = new Array(publickey, privatekey, theme, language, form_id_counter);			
		}		
		var RetVal = CheckPostedData(data);		
		
		if(RetVal === true)
		{	
			//Count All Input Fields to Assign Input-fields
			var map_counter = count_all_input_fields(process_input_fields_url, type);        			
			map_counter += 1;

			//Call Function to Post Data 						
			post_input_data(data, process_input_fields_url, type);												
			
			//Add Dynamically Input Fields						
			var newTextBoxDiv = '['+type+']'+'\n';
	 		document.ini_form_content_form.ini_form_content_area.value += newTextBoxDiv;					
		}	
		else
		{
			Loader(Hide);
			alert('Please enter the value of fields.');
		}		
	}

	// Reset Fields
	$('#content_form_text_fields')[0].reset();	
	Loader(Hide);	
}

//Get Value for Input Fields according to their type to show initial value in Quick Panel Form
function IniValForQuickPanel(type)
{
	Loader(Show);
	var textarea_counter = count_all_input_fields(process_input_fields_url, type, form_id_counter);        			
	textarea_counter += 1;
	Loader(Hide);
	return textarea_counter;
}

function InsertValueForEveryField(type)
{
	Loader(Show);
	var FieldTypeId = IniValForQuickPanel(type);
	Loader(Hide);

	// Insert Initial Value for Fields according to attribute
	return FieldTypeId;	
}

//Check Input Field to be Posted is empty or not
function CheckPostedData(data)
{
	Loader(Show);
	var i;
   	for(i=0; i<data.length; i++)
   	{
       if(data[i] === "")   
       {
       	  return false;
       }        
    }
    Loader(Hide);
   return true;
}

//To Increse accordinally Form Id Check
function SubmitForm()
{	
	// Get Data From Form
	var	form_label	 			= $('#update_form_label').val();
	var	form_title	 			= $('.contact-form-title').val();
	var form_data		  		= $('#ini_form_content_area').val();
	var map_check		  		= $('#map_check').val();
	var mail_subject			= $('#mail-subject').val();
	var mail_sender_name		= $('#mail-sender-name').val();
	var mail_sender_email		= $('#mail-sender-mail').val();		
	var ini_form_mail_message	= $('#ini_form_mail_message').val();	

	var user_form_width					= $('#user_form_width').val();
	var user_form_loader				= $('#user_form_loader').is(':checked');
	var user_form_hide					= $('#user_form_hide').is(':checked');	
	var user_form_lebels				= $('#user_form_lebels').is(':checked');
	var user_form_placeholder			= $('#user_form_placeholder').is(':checked');
	var user_form_captcha				= $('#user_form_captcha').is(':checked');

	var user_button_text					= $('#user_button_text').val();
	var user_button_color					= $('#user_button_color').val();
	var user_success_text					= $('#user_success_text').val();
	var user_error_validation_text			= $('#user_error_validation_text').val();
	var user_error_email_validation_text	= $('#user_error_email_validation_text').val();
	var git_mail_form_required_fields_text	= $('#git_mail_form_required_fields_text').is(':checked');
	var git_check_for_stor_contact_form_data= $('#git_check_for_stor_contact_form_data').is(':checked');

	var mail_copy_to_user_check = $('#git_mail_copy_to_user_check').is(':checked');
	var mail_recipient 			= $('#mail-recipient').val();
	var last_form_inserted_id   = $('#last-form-inserted-id').val();

	// Assign Data to Object
	var FormData = {
					form_label:             form_label,
					form_title: 			form_title, 
					form_data: 				form_data, 
					map_check: 				map_check, 
					mail_subject: 			mail_subject, 
					mail_sender_name: 		mail_sender_name, 
					mail_sender_email: 		mail_sender_email, 
					ini_form_mail_message: 	ini_form_mail_message, 

					user_form_width:		user_form_width,	
					user_form_loader:		user_form_loader,	
					user_form_hide:			user_form_hide,						
					user_form_lebels:       user_form_lebels,
					user_form_placeholder:  user_form_placeholder,
					user_form_captcha:  	user_form_captcha,
					user_button_text:       user_button_text,
					user_button_color:      user_button_color,
					user_success_text:       			user_success_text,
					user_error_validation_text:      	user_error_validation_text,
					user_error_email_validation_text:   user_error_email_validation_text,
					git_mail_form_required_fields_text: git_mail_form_required_fields_text,
					git_check_for_stor_contact_form_data: git_check_for_stor_contact_form_data,
					mail_recipient: 		mail_recipient,
					mail_copy_to_user_check:mail_copy_to_user_check,
					form_id_counter: 		form_id_counter,
					last_form_inserted_id:  last_form_inserted_id
				};	

	var RetVal = CheckPostedData(FormData);	

	if(form_data.length !== 0)
	{
		Loader(Show);
		$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'post',             
       	dataType: "json",		
	    data: FormData,
        success: function(data, status) {   
        			GoToTop(); 
        			// Reset All Fields
					$('#content_form_text_fields')[0].reset();
					$('#content_form_email')[0].reset();
					$('#content_form_phone')[0].reset();
					$('#content_form_textarea')[0].reset();					
					$('#ini_form_content_form')[0].reset();
        			$('#input-options, #quick-panel, #ini_form_content').fadeOut();
        			$('#form-submit-success').fadeIn();
        			Loader(Hide);
        			window.location.reload(true);
                 },
        error: function(){                	
           }	              				
    	});		    				
	}	
	else
	{
		Loader(Hide);
		alert('Please select input fields before submit form.');
		return false;
	}			
}

//Submit Updated Form to DB
function SubmitUpdatedForm(Form_Id_For_Updation)
{
	GoToTop();
	Loader(Show);
	// Get Data From Form
	var	form_label	 			= $('#update_form_label').val();
	var	form_title	 			= $('#update_form_title').val();
	var form_data		  		= $('#ini_form_content_area').val();
	var mail_subject			= $('#update-mail-subject').val();
	var mail_sender_name		= $('#update-sender-name').val();
	var mail_sender_email		= $('#update-sender-mail').val();		
	var ini_form_mail_message	= $('#update_form_mail_message').val();		
	var mail_copy_to_user_check = $('#update_mail_copy_to_user_check').is(':checked');
	var mail_recipient 			= $('#update-mail-recipient').val();	

	var user_form_width					= $('#user_form_width').val();
	var user_form_loader				= $('#user_form_loader').is(':checked');
	var user_form_hide					= $('#user_form_hide').is(':checked');	
	var user_form_lebels				= $('#user_form_lebels').is(':checked');
	var user_form_placeholder			= $('#user_form_placeholder').is(':checked');
	var user_form_captcha				= $('#user_form_captcha').is(':checked');
	
	var user_button_text					= $('#user_button_text').val();
	var user_button_color					= $('#user_button_color').val();
	var user_success_text					= $('#user_success_text').val();
	var user_error_validation_text			= $('#user_error_validation_text').val();
	var user_error_email_validation_text	= $('#user_error_email_validation_text').val();
	var git_mail_form_required_fields_text	= $('#git_mail_form_required_fields_text').is(':checked');
	var git_check_for_stor_contact_form_data= $('#git_check_for_stor_contact_form_data').is(':checked');
	
	// Assign Data to Object
	var UpdatedFormData = {
							up_form_label:              form_label,
							up_form_title: 				form_title, 
							up_form_data: 				form_data, 
							up_mail_subject: 			mail_subject, 
							up_mail_sender_name: 		mail_sender_name, 
							up_mail_sender_email: 		mail_sender_email, 
							up_ini_form_mail_message: 	ini_form_mail_message, 
							user_form_width:			user_form_width,	
							user_form_loader:			user_form_loader,	
							user_form_hide:				user_form_hide,								
							user_form_lebels:           user_form_lebels,
							user_form_placeholder:      user_form_placeholder,
							user_form_captcha:      	user_form_captcha,
							user_button_text:       	user_button_text,
							user_button_color:      	user_button_color,
							user_success_text:       				user_success_text,
							user_error_validation_text:      		user_error_validation_text,
							user_error_email_validation_text:   	user_error_email_validation_text,
							git_mail_form_required_fields_text: 	git_mail_form_required_fields_text,
							git_check_for_stor_contact_form_data: 	git_check_for_stor_contact_form_data,
							up_mail_recipient: 						mail_recipient,
							up_mail_copy_to_user_check: 			mail_copy_to_user_check,
							Form_Id_For_Updation: 					Form_Id_For_Updation
						};	

	var RetVal = CheckPostedData(UpdatedFormData);		
	if(form_data.length !== 0)
	{	 
		$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'post',            
       	dataType: "json",	 	
	    data: UpdatedFormData,
        success: function(data, status) {                
					//Redirect to Form View
					Loader(Hide);
        			window.location.href = "admin.php?page=view-forms";
                 },
        error: function(){                	
           }	              				
    	});		    				
	}	
	else
	{
		alert('Please select input fields before submit form.');
	}				
}

//Post Initial Form Data
function PostInitialFormData(formid)
{
	GoToTop();
	Loader(Show);
	$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'post',      	       	
	    data: {
	    	form_submit : 'initial',
	    	form_id     : formid
	    	},
        success: function(data, status) {  
        		$('#last-form-inserted-id').val(data);
        		
        		Loader(Hide);				
                 },
        error: function(){                	
           }	              				
    	});		    				
}

//Post Data through AJAX
function post_input_data(data, process_input_fields_url, type)
{	
	GoToTop();
	Loader(Show);
	if(type === 'map')
	{
		// Assign Data to Object
		var InputData = {
		    	latitude 	: data[0],
		    	longitude   : data[1],		    	  
		    	height  	: data[2],	
		    	width  		: data[3],	
		    	title  		: data[4],		
		    	zoom  		: data[5],		
		    	scrollwheel : data[6],		
		    	clickable  	: data[7],		
		    	form_id    	: data[8],	    	    	
		    	type		: type,
		    	inserted_Id	: $('#last-form-inserted-id').val()
				    	};	
	}
	else if(type === 'captcha')
	{
		// Assign Data to Object
		var InputData = {
		    	publickey 	  	: data[0],
		    	privatekey    	: data[1],		    	  
		    	theme  			: data[2],	
		    	language  		: data[3],			    	
		    	form_id  		: data[4],	
		    	type			: type,
		    	inserted_Id		: $('#last-form-inserted-id').val()
				    	};	
	}
	else
	{
		// Assign Data to Object
		var InputData = {
		    	name   		: data[0],
		    	id     		: data[1],
		    	cls    		: data[2],
		    	size   		: data[3],
		    	maxlen 		: data[4],
		    	label 		: data[5],
		    	check  		: data[6],	    	
		    	form_id    	: data[7],	    	    	
		    	placeholder	: data[8],	    	  
		    	type		: type,
		    	inserted_Id	: $('#last-form-inserted-id').val()
				    	};	

	}
	
	var RetVal = CheckPostedData(data);	

	if(RetVal === true)
	{	
		$('.git-input-field-status').fadeIn();	
		
		$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'post',             		
	    data: InputData,
        success: function(data, status) {      

        		Loader(Hide);
        		setTimeout(function(){
					$('.git-input-field-status').fadeOut();
				}, 2000);
        			      			
                 },
        error: function(){                	
           }	              				
    	});		    				
	}			
}

//Count All Input Fields AJAX
function count_all_input_fields(process_input_fields_url, type)
{	
	var countinput = 0;
	$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'GET',  
       	dataType: "json",	     	           	
	    data: {
	    	count_input		: 'count_input_id',
	    	input_type		: type,
	    	form_id_counter : form_id_counter
	    	},
        success: function(CountInputFields, status) {               			
        			countinput = parseInt(CountInputFields);        			        			
                 },
        error: function(){ 
        		
           }	              				
    	});			
    return countinput;		
}

//Count Unique Form Id AJAX
function count_unique_form_id(process_input_fields_url)
{		
	var countform = 0;
	var getvalpara = 'count_form_id';
	$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'GET',  
       	dataType: "json",	           	
	    data: {
	    	count_form	: getvalpara
	    	},
        success: function(CountFormId, status) {         			       	
        			countform = CountFormId;           			
                 },
        error: function(){    
           }	              				
    	});				
    return countform;		
}

//Reset 1 All Autoincrement Id
function reset_all_table_autoincrement_id()
{
	$.ajax({
        url: AdminAjax.process_input_fields_url,
       	type: 'POST', 
       	dataType: "json",	       	    
	    data: {
	    	reset_id	: 'reset_id'
	    	},
        success: function(AllInputFields, status) {    
                 },
        error: function(){ 
        		return false;
           }	              				
    	});			
}

//Set Important to contact form
function SetImportantFormData(ID, Value)
{
	var url = $("#url_send_mail").val();
	GoToTop();
	Loader(Show);
	$.ajax({
        url: AdminAjax.url,
       	type: 'post',       
       	dataType: "json",		    
	    data: 
		    {			    	
		    	form_data_important_id :ID,
		    	value: Value
	    	},
        success: function(data, status) {      	                			        		        			
        		$('.loader').fadeOut();
				//Redirect to Form Data View
    			window.location.reload(true);      			
    			Loader(Hide);

                 },
        error: function(){ 

           }	              				
    	});			
}

// Delete All Form Data
function DeleteFormData(ID)
{
	var url = $("#url_send_mail").val();
	GoToTop();
	Loader(Show);
	$.ajax({
        url: AdminAjax.url,
       	type: 'post',       	    
       	dataType: "json",	
	    data: 
		    {			    	
		    	form_data_deletion_id :ID
	    	},
        success: function(data, status) {        	                			        		        			
        		$('.loader').fadeOut();
        		
				//Redirect to Form View
    			window.location.reload(true);      			
    			Loader(Hide);

                 },
        error: function(){ 

           }	              				
    	});			
}
