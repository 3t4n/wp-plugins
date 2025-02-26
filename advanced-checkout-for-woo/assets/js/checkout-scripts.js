
// Summary Toggle
document.addEventListener('DOMContentLoaded', function() {
    var orderSummaryElements = document.querySelectorAll('.order-summary');
    var customOrderReviewCouponWrapper = document.querySelector('.custom-order-review-coupon-wrapper');

    orderSummaryElements.forEach(function(orderSummary) {
      orderSummary.addEventListener('click', function() {
        if (customOrderReviewCouponWrapper.style.display === 'none' || customOrderReviewCouponWrapper.style.display === '') {
          customOrderReviewCouponWrapper.style.display = 'block';
        } else {
          customOrderReviewCouponWrapper.style.display = 'none';
        }
      });
    });
  });
  
   document.addEventListener('DOMContentLoaded', function() {
    // Create the Continue button
    var continueButton = document.createElement('div');
    continueButton.classList.add('multi-step-pagination');
   continueButton.innerHTML = '<button class="back-step2" type="button" onclick="step1()">Back</button><button class="back-step3" type="button" onclick="step2()">Back</button><button id="continue_button" type="button" onclick="validateFields()">Continue</button>';

var fieldwarning = document.createElement('div');
fieldwarning.innerHTML ="Please Fill All Required Fields!";
fieldwarning.classList.add('field-warning');
    // Insert the Continue button after the customer_details div
    var customerDetailsDiv = document.querySelector('#customer_details');
    customerDetailsDiv.parentNode.insertBefore(continueButton, customerDetailsDiv.nextSibling);
      continueButton.parentNode.insertBefore(fieldwarning, continueButton.nextSibling);

   
});

 // Function to check if all 'validate-required' elements have 'woocommerce-validated'
    function allFieldsValidated() {
        var requiredFields = document.querySelector('.woocommerce-billing-fields__field-wrapper').querySelectorAll('.validate-required');
        return Array.from(requiredFields).every(function(field) {
            return field.classList.contains('woocommerce-validated');
        });
    }

    // Add onclick directly to the button
    function validateFields() {
        // Trigger the validation of the fields (you can adjust and pick which fields are validated)    
jQuery('.validate-required input, .validate-required select').trigger('validate');

// Get which fields have failed validation
jQuery('.woocommerce-invalid-required-field').each(function(index, element){
    console.log(element.id)
})
        if (allFieldsValidated()) {
            // Perform an action when the Continue button is clicked and all required fields are validated
           document.querySelector('.multis-step.step3').style.display='flex';
           document.querySelector('.back-step3').style.display='block';
           document.querySelector('#continue_button').style.display='none';
           document.querySelector('div#order_review').style.display='block';
           document.querySelector('div#customer_details').style.display='none';
          document.querySelector('button.back-step2').style.display='none';
             document.querySelector('.multis-step.step2').style.display='none';
             document.querySelector('.field-warning').style.display='none';
        } else {
          document.querySelector('.field-warning').style.display='block';
        }
    };
    function step2(){
         // Perform an action when the Continue button is clicked and all required fields are validated
           document.querySelector('.multis-step.step3').style.display='none';
           document.querySelector('.back-step3').style.display='none';
           document.querySelector('#continue_button').style.display='block';
          document.querySelector('div#order_review').style.display='none';
           document.querySelector('div#customer_details').style.display='block';
             document.querySelector('.multis-step.step2').style.display='flex';
               document.querySelector('button.back-step2').style.display='block';
               document.querySelector('.field-warning').style.display='none';
    }
    
    function step1(){
    document.querySelector('.logoutloader').style.display='flex';
    (function($) {
        $.ajax({
            type: 'POST',
            url: myAjax.ajaxurl,
            data: {
                action: 'inline_ajax_logout',
                nonce: myAjax.nonce
            },
            success: function(response) {
                console.log('User logged out');
            },
            complete: function() {
                window.location.reload();
            }
        });
    })(jQuery);       
}

document.addEventListener('DOMContentLoaded', function() {
   document.querySelector('input#one_time_offer').addEventListener('change',function(){
        var one_time_offer = this.checked ? 1 : 0;
        jQuery.ajax({
            url: myAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'one_time_offer',
                one_time_offer: one_time_offer
            },
            success: function(response) {
                jQuery('body').trigger('update_checkout');
            }
        });
    })
});


