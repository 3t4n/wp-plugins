jQuery(document).ready(function(){
// PREPEND FONT AWESOME ICONS
jQuery('.easy-paypal-btn-nav a:nth-child(1)').prepend('<i class="fa fa-cog"></i>')
jQuery('.easy-paypal-btn-nav a:nth-child(2)').prepend('<i class="fa fa-tags" aria-hidden="true"></i>')
jQuery('.easy-paypal-btn-nav a:nth-child(3)').prepend('<i class="fa fa-question-circle" aria-hidden="true"></i>')



// SELECT BUTTON
jQuery(".check-btn").change(function () {
   jQuery('.check-btn').not(this).prop('checked', false);
});





// CREATE SHORTCODE
jQuery('.update-setting').on("click", function (){

var email = jQuery('input[name="paypal_email_address"]').val();
var currency = jQuery("#paypal-currency option:selected").val();
var donation_amount = jQuery('input[name="donation_amount"]').val();
var item_name = jQuery('input[name="item_name"]').val();
var url = jQuery('input[name="return_url"]').val();
var btn_type = jQuery("#chose-btn-type option:selected").val();
 jQuery("input:checkbox:checked").each(function () {
  var img_id = jQuery(this).attr("id") 
    var max_wid =jQuery('input[name="img-width"]').val();

var shortCode = '[easy_paypal_button email="'+email+'" currency="'+currency+'" donation_amount="'+donation_amount+'"  item_name="'+item_name+'" return_url="'+url+'" btn_type="'+btn_type+'" img_id="'+img_id+'" max-width="'+max_wid+'" ]';


jQuery('#shortcode-field').val(shortCode);

  });
});

// hide and show button type


jQuery('#chose-btn-type').change(function(){
  if(jQuery(this).val() == 'donate'){ // or this.value == 'volvo'
    jQuery('.donate-btn-wrapper').show();
     jQuery('.buy-btn-wrapper').hide();
     jQuery('.subscibe-btn-wrapper').hide();
      jQuery('.btn-width-wrapper').show();
  }
   if(jQuery(this).val() == 'buy'){ // or this.value == 'volvo'
    jQuery('.buy-btn-wrapper').show();
  jQuery('.donate-btn-wrapper').hide();
     jQuery('.subscibe-btn-wrapper').hide(); 
      jQuery('.btn-width-wrapper').show();
  }
  if(jQuery(this).val() == 'subscribe'){ // or this.value == 'volvo'
    jQuery('.subscibe-btn-wrapper').show();
  jQuery('.donate-btn-wrapper').hide();
     jQuery('.buy-btn-wrapper').hide(); 
      jQuery('.btn-width-wrapper').show();
  }
   if(jQuery(this).val() == 'default'){ // or this.value == 'volvo'
    jQuery('.subscibe-btn-wrapper').hide();
  jQuery('.donate-btn-wrapper').hide();
     jQuery('.buy-btn-wrapper').hide(); 
      jQuery('.btn-width-wrapper').hide();
  }

});

// UPDATE BUTTON ACTION 
jQuery('.save-btn').on("click" , function (){
  // SHOW SHORTCODE
  jQuery('.short-code').show();
   // BACK TO TOP 
   jQuery('body,html').animate({
   scrollTop : 0                       // Scroll to top of body
    }, 500);  

});



       
   

  });






                
                
            
           