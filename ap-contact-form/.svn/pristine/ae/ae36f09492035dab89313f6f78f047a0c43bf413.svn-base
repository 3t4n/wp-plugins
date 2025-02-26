jQuery(document).ready(function($){

  console.log(apcf_js_obj.ajax_url);

  // Frontend Form Submit Function
  $('.ap-contact-form-wrap form').submit(function(){

    // Specifing $(this) state to a variable to access fields on only this instance
    var selector = $(this);

    var error_flag = 0;

    //Check captcha flags
    var captcha_show = selector.find('.apcf-captch-flag').val();
    var captcha_site = selector.find('.apcf-captch-site-flag').val();
    var captcha_secret = selector.find('.apcf-captch-secret-flag').val();

    // Checking for each required field
    selector.find('.ap-required-field').each(function(){
      var value = $(this).val();
      if(value == ''){
       error_flag = 1;
       $(this).closest('.ap-contact-field-wrap').find('.ap-error-msg').show();
      }
    });

    // Checking state of error flack for submission.
    if(error_flag == 1){
      return false;    
    }
    else{
      selector.find('.apcf-ajax-loader').show();
      // Getting value from frontend form to set to ajax data
      var name = selector.find('.ap-name-field').val();
      var email = selector.find('.ap-email-field').val();
      var subject = selector.find('.ap-subject-field').val();
      var message = selector.find('.ap-message-field').val();
      var captcha_val = selector.find('#g-recaptcha-response').val();
      console.log(captcha_val);

      
      // Checking value for captcha show
      if(captcha_show == '1'){
        if (!(captcha_site == '' || captcha_secret == '')){
          $('.apcf-captcha-error').hide();
          // Ajax function
          $.ajax({
            url : apcf_js_obj.ajax_url,
            type : 'post',
            data:{
              action: 'apcf_sendmail',
              _wpnonce: apcf_js_obj._wpnonce,
              name:name,
              email:email,
              subject: subject,
              message: message,
              captchaResponse: captcha_val
            },
            success: function(response){
              //alert(response);
              if(response == 'success'){
                selector.find('.apcf-ajax-loader').hide();
                if (selector.find('#g-recaptcha-response').length > 0) {
                  grecaptcha.reset();
                }
                selector.find('.ap-error-msg').hide();
                selector.find('.ap-success-message').show();
                selector.find('.ap-name-field').val("");
                selector.find('.ap-email-field').val("");
                selector.find('.ap-subject-field').val("");
                selector.find('.ap-message-field').val("");
                
              }
              else{
                //alert('Failure');
              }
              console.log("success");
            }
          });
        }
        else{
          $('.apcf-captcha-error').show();
          selector.find('.apcf-ajax-loader').hide();
        }
      }
      else{
        // Form Submission Ajax call when Captcha is disabled.
        // alert('captcha deactivated');
        $.ajax({
            url : apcf_js_obj.ajax_url,
            type : 'post',
            data:{
              action: 'apcf_sendmail',
              _wpnonce: apcf_js_obj._wpnonce,
              name:name,
              email:email,
              subject: subject,
              message: message,
            },
            success: function(response){
              //alert(response);
              if(response == 'success'){
                selector.find('.apcf-ajax-loader').hide();
                selector.find('.ap-error-msg').hide();
                
                selector.find('.ap-success-message').show();
                selector.find('.ap-name-field').val("");
                selector.find('.ap-email-field').val("");
                selector.find('.ap-subject-field').val("");
                selector.find('.ap-message-field').val("");
              }
              else{
                //alert('Failure');
              }
              console.log("success");
            }
        });
      }
    }
   // return true;
   return false;
  });
   
  $('.ap-required-field').keyup(function(){
    $(this).parents('.ap-contact-field-wrap').find('.ap-error-msg').hide();
  });
});