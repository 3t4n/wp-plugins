(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
jQuery(document).ready(function() {
jQuery('.next').click(function(event) {
            event.preventDefault();
			try{
            var parent= jQuery(this).parent().parent().parent().parent().siblings();
            var error=0;
            parent.find('.required').each(function() {
               var value = $(this).val();
              console.log(value);
                if(value === '') {
                  jQuery(this).next('.error').text('This is Required Field');                
                   //error = 'error'; 
                   error=error+1;                 
                 } 
                else {
                   jQuery(this).next('.error').text(''); 
                //    error=error-1;
                //    //error = ''; 
                 }
            });		
           console.log(error);
            if(error > 0) {
                return false;
            }  
			}
			catch(err){
			 console.log(err);
			}
        });
		jQuery('.question').change(function() {
  var p = jQuery(this).parent().parent().parent();
  console.log(p);
  p.find('.required').each(function() {
   jQuery(this).val('hidddne');
   console.log(jQuery(this).val());
  });

});
var name="";
jQuery('.package').each(function () { 	
	jQuery(this).change(function() {
		var package_id=jQuery(this).val();
		var selected_package_id=jQuery("#hidden_package_"+package_id).val();
		if(selected_package_id!=''){
			jQuery("#hidden_package_"+package_id).val('');
			name = name.replace($(this).attr('data-pname'),'');
			jQuery(".package_select_"+package_id).css('border', 'none');
		}
		else{
			jQuery("#hidden_package_"+package_id).val(package_id);
			if(name === '') {
			  name =  $(this).attr('data-pname');
			} else {
			  name = name +' '+ $(this).attr('data-pname');
			}
			//$(".package_select_"+package_id).css('border', '3px solid #fb7f1d'); 
			//$("#submitpackages").focus();
			 jQuery("#submitpackages_mobile").click();
			jQuery("#submitpackages").click(); 
		}
		
		if(name.replace(' ','')==''){
			jQuery('.aggreediv').hide();
		}
		else{
			jQuery('.aggreediv').show();
			jQuery('.partner_name').text(name);
		}					 
	});
});
console.log('calling');
$.fn.stars = function() {
	console.log('fdfdf');
	console.log($('.star-ratings .tm-rating_rev').length);
    return $('.tm-rating_rev').each(function() {
        const rating = $(this).data("rating");
        console.log(rating);
        const numStars = $(this).data("numStars");
        const fullStar = '<i class="fa fa-star"></i>'.repeat(Math.floor(rating));
        const halfStar = (rating%1!== 0) ? '<i class="fas fa-star-half-alt"></i>': '';
        const noStar = '<i class="far fa-star"></i>'.repeat(Math.floor(numStars-rating));
        $(this).html(`${fullStar}${halfStar}${noStar}`);		
    });
}
jQuery('body .tm-rating_rev').stars();

jQuery('#submitpackages,#submitpackages_mobile').on('click', function() { // on change of state  
  //window.location.href = "https://affordablehomesecurity.com/thank-you/";
 
   var error = 0;
  var total = 0;
  var chosen=[];	
	jQuery('.package_name').each(function () {
     if(jQuery(this).val()!=''){
      total = total+1;
      chosen.push(jQuery(this).val());
      var chosenstring = chosen.join(",");
      jQuery('#chosendata').val(chosenstring);
	  jQuery('#chosendata_mobile').val(chosenstring);
     }
    });
	
    if(total===0) {
      alert('Please select atleast one package');
      error = error+1;
    } 
     if(error == 0 )  {          
      jQuery('#submitdata').submit();
      }
	  else
	  {
		  return false;} 
});

if(jQuery("#leadcheckname_section")){
	var lead_check_control_names=[];
	jQuery("#leadcheckname_section :input[type=hidden]").each(function(){
		if(jQuery(this).attr('name')!='leadcheckname_list' && jQuery(this).attr('name')!='leadcheckcontrol_list'){
			lead_check_control_names.push(jQuery(this).attr('name'));
		}
	});
	jQuery("#leadcheckcontrol_list").val(lead_check_control_names);
}



});

})( jQuery );

function confirm_submit(){
	var phone =jQuery('#phone').val();
    //var checkphone =/^[0-9]+$/.test(phone);
	var phoneno_reg  = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    //var checkphone = phone.match(phoneno_reg);
    //var length = phone.toString().length;
	
	var email=jQuery("#Email").val();
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	var return_value=true;
	  if(jQuery("#first-name").val()==''){
		  jQuery('.fname_error').text('Enter First name');
          return_value=false;
	  }
	  else if(jQuery("#first-name").val().toString().length<2){
		  jQuery('.fname_error').text('First name should contain at least two characters');
          return_value=false;
	  }
	  else{
		  jQuery('.fname_error').text('');
	  }
	  
	  if(jQuery("#last-name").val()==''){
		  jQuery('.lname_error').text('Enter Last name');
          return_value=false;
	  }
	  else if(jQuery("#last-name").val().toString().length<2){
		  jQuery('.lname_error').text('Last name should contain at least two characters');
          return_value=false;
	  }
	  else{
		  jQuery('.lname_error').text('');
	  }	  
	   if(jQuery("#full_address").val()==''){
		  jQuery('.full_address_error').text('Enter Address');
          return_value=false;
	  }
	  else{
		  jQuery('.full_address_error').text('');
	  }
	
      if(!phone.match(phoneno_reg)) {
        jQuery('.phone_error').text('Please enter valid phone number');
         return_value=false;
      } 
	  else {
          jQuery('.phone_error').text('');
      }
	  if(!re.test(String(email).toLowerCase())){
		  jQuery('.email_error').text('Please enter valid email id');
		  return_value=false;
	  }
	  else{
		  jQuery('.email_error').text('');
	  }
	  
	 /*  if(!jQuery("#consent_txt").attr('checked')){
		  jQuery('.consent_txt_error').text('This field is required');
		  return_value=false;
	  }
	  else{
		  jQuery('.consent_txt_error').text('');
	  } */
	  return return_value;
}
