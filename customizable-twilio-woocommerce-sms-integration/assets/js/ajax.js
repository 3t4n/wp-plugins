jQuery(document).ready(function($) {
$(document).ajaxStart(function(){
      $("#loadotp").css("display", "block");
        $("#loadotp").html("Sending OTP to phone number");
    $("#otpreport").css("display", "none");
    
    });
    $(document).ajaxComplete(function(){
        $("#loadotp").css("display", "none");
    $("#otpreport").css("display", "block");
    });
  

$("#getotplink").click(function() {
   var billingphone = $('#billing_phone').val();
   var billingcountry = $('#billing_country').val();
   $("#getotplink").html("Resend OTP");


    if (billingphone == "") {
      $("#otpreport").css("color", "indigo");
      $("#otpreport").html("Please provide a billing phone number");
    }
    else if (billingcountry == "") {
      $("#otpreport").html("Please select your country");
    } else {
  var data = {
    action: 'my_action',
    security : MyAjax.security,
    phonenumber:billingphone,
    countrycode:billingcountry
  };
  $.post(MyAjax.ajaxurl, data, function(data) {
    $("#otpreport").html(data);
  });

}


});
});