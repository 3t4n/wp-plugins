/*
*Developed and Maintaining by:Siddharth Singh, v 01.00
*Detail:Use for Om contact form
*Author URI: http://fileworld.in/
*Email:siddharthsingh91@gmail.com
*/

jQuery(function(){
jQuery("#amount, #cardnum, #cvc, #month, #year").keyup(function (e) {
	  if(jQuery.isNumeric(this.value)== false){
              this.value = this.value.replace(/[^0-9\\.]+/g, '');
			  jQuery("#error_message").html("*Only number are allowed").show().delay(3000).fadeOut();
			return false;
        }     
})});

/*Below code for number check-*/	

jQuery(document).ready(function(e) {
jQuery("#nextButton").click(function(){
	var error=[];
	userDetail=Object();
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	
	userDetail.Fname=jQuery("#Fname").val(); userDetail.Fname=="" ? error.push("Please enter first name.") : null  	
    userDetail.Address1=jQuery("#Address1").val(); userDetail.Address1=="" ? error.push("Please enter address.") : null;
	userDetail.Phone_no=jQuery("#Phone_no").val(); userDetail.Phone_no=="" ? error.push("Please enter Phone no.") : null;
	userDetail.Email=jQuery("#Email").val();  userDetail.Email=="" ? error.push("Please enter email.") : expr.test(userDetail.Email)==false ? 
    error.push("Please enter valid email address.") : null;	
	userDetail.cardnum=jQuery("#cardnum").val(); userDetail.cardnum=="" ? error.push("Please enter your card no.") : null;
	userDetail.cvc=jQuery("#cvc").val(); userDetail.cvc=="" ? error.push("Please enter your card cvc.") : null;
	userDetail.amount=jQuery("#amount").val(); userDetail.amount=="" ? error.push("Please enter donation amount.") : null;
	userDetail.month=jQuery("#month").val(); userDetail.month=="" ? error.push("Please enter expiry month.") : null;
	userDetail.year=jQuery("#year").val(); userDetail.year=="" ? error.push("Please enter expiry year.") : null;
	

	if(error==0){
	pay_with_credit_card();		
/*if end*/	
	}  
	else{
	jQuery("#error_contaner").show(); 
	jQuery.each(error, function(key, value) {
   jQuery("#error_contaner").append('<p class="new_error_message">*'+value+"</p>"); });
   
     setTimeout(function(d){
		jQuery("#error_contaner").html("");
       jQuery("#error_contaner").hide();
    }, 5000);
	}
/*else end*/		    
 });
});	
	