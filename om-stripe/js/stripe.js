/*
*Developed and Maintaining by:Siddharth Singh, v 01.00
*Detail:Use for Om contact form
*Author URI: http://sanditsolution.com/
*Email:siddharthsingh91@gmail.com
*/
<!-- The required Stripe lib -->

// This identifies your website in the createToken call below
Stripe.setPublishableKey(publishable_key.key);
/*******************************************************************************
 * form ajax call for stripe start
 ******************************************************************************/
function stripeResponseHandler(status, response) {
var datas;
if (response.error) {
	 // re-enable the submit button
    // Show the errors on the form
	
jQuery("#load").html("");
jQuery("#error_message").html("*"+response.error.message).show().delay(3000).fadeOut();	
jQuery("#nextButton").show();
 
 //jQuery('#payment-form').find('#error_message').text(response.error.message);
 jQuery('#payment-form').find('button').prop('disabled', false);
} else {
		var formjQuery = jQuery("#payment-form");
		var charges=jQuery("#amount").val();
		var charge =Number(charges*100)
           		
		// token contains id, last4, and card type
		var token = response['id'];
		// insert the token into the form so it gets submitted to the server
		formjQuery.append("<input type='hidden' name='stripeToken' value='" + token+ "'/>");
		
	userDetail.Fname=jQuery("#Fname").val(); 
    userDetail.Address1=jQuery("#Address1").val(); 
	userDetail.Phone_no=jQuery("#Phone_no").val(); 
	userDetail.Email=jQuery("#Email").val(); 
	userDetail.cardnum=jQuery("#cardnum").val(); 
	userDetail.cvc=jQuery("#cvc").val(); 
	userDetail.amount=jQuery("#amount").val();
	userDetail.month=jQuery("#month").val(); 
	userDetail.year=jQuery("#year").val(); 
	
		// and submit
		// formjQuery.get(0).submit();
		jQuery.ajax({
			type : 'POST',
			url : om_stripe_url.ajaxurl,
			data : {
				'action': 'om_stripe_ajax',
				'stripeToken' : token,
				'charges' : charge,
				 'POST' :userDetail
			}
		})
		.done(
				function(data) {
					jQuery("#load").html("");
					
					var datas=String(data);
					if(datas.match(/Error/gi)){
					   jQuery("#load").html("");
					   jQuery("#error_message").html("*Something went wrong please try agin later.").show();	
						}
					else if(datas.match(/Sucess/gi)) {
					jQuery("#om_stripe_form_hide_after_sucess").hide();	
					jQuery("#sucess_message").html("<h3 id=\"sucess_full_payment\">Thank For Your Payment</h3>").show();
						}else{
					jQuery("#load").html("");		
					jQuery("#error_message").html(data).show();		
							}
				});
	}
}


function pay_with_credit_card(){
	jQuery("#load").html('<span><img src="'+om_stripe_url.image_url+'"/>Please wait.....</span>');
	jQuery("#nextButton").hide();
	var card_number=Number(jQuery("#cardnum").val());
	var card_password=Number(jQuery("#cvc").val());
	var exp_month=Number(jQuery("#month").val());
	var exp_year=Number(jQuery("#year").val());
	var card_holder_name=jQuery("#Fname").val();
		
 Stripe.createToken({
				number : card_number,
				cvc : card_password,
				exp_month : exp_month,
				exp_year : exp_year,
				name: card_holder_name,
			}, stripeResponseHandler);			
			 }

