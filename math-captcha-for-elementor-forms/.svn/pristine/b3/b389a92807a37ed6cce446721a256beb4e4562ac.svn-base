/* JQUERY MATH RECAPTCHA FOR ELEMENTOR */
jQuery(document).ready(function($) {
	//INIT FUNCTION
		$(function(){
			$('.elementor-form').ebcaptcha();	
		});
		$(document).arrive(".elementor-popup-modal .elementor-form", function() {
			$('.elementor-popup-modal .bs-math-captcha').remove();
			$('.elementor-popup-modal .elementor-form').ebcaptcha();
		});
	//CAPTCHA FUNCTIONS
	(function($){
		jQuery.fn.ebcaptcha = function(options){

		var element = this; 
		var submitcontainer = $(this).find('.elementor-field-type-submit')
		var submit = $(this).find('button[type=submit]');
		//GHOST CONTAINER FOR TRIGGERING CLICK EVENT
		$('<div class="bs-submit-button-event"></div>').insertBefore(submit);
			 $(".bs-submit-button-event").css({'width': (submit.outerWidth() + 'px')});
			$(".bs-submit-button-event").css({'height': (submit.outerHeight() + 'px')});
		$('<div class="bs-math-captcha elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100"><label id="bs_ebcaptchatext" class="elementor-field-label"></label><input type="text" class="elementor-field elementor-size-sm  elementor-field-textual" id="bs_ebcaptchainput" required data-error="Please solve the math problem."/></div>').insertBefore(submitcontainer);
		var input = this.find('#bs_ebcaptchainput'); 
		var label = this.find('#bs_ebcaptchatext'); 
		
		$(element).find('button[type=submit]').attr('disabled','disabled'); 
		var operators = [];
		if(bs_math_captcha_plus_sign) {
			operators.push(
			{
			sign: "+",
	        method: function(a,b){ return a + b; }	
			});
		}
		if(bs_math_captcha_minus_sign) {
			operators.push(
			{
	        sign: "-",
	        method: function(a,b){ return a - b; }
   			});
		}
		if(bs_math_captcha_multiply_sign) {
			operators.push(
			{
			sign: "*",
			method: function(a,b){ return a * b; }
			});
		}
   		var selectedOperator = Math.floor(Math.random()*operators.length);
		var randomNr1 = 0; 
		var randomNr2 = 0;
		var totalNr = 0;
		randomNr1 = Math.floor(Math.random()*10);
		randomNr2 = Math.floor(Math.random()*10);
		totalNr = operators[selectedOperator].method(randomNr1, randomNr2)
		var texti = randomNr1+" "+operators[selectedOperator].sign+" "+randomNr2+" = ";
		$(label).text(texti);
		
	
		$(input).keyup(function(){

			var nr = $(this).val();
			if(nr==totalNr)
			{
				$(element).find('button[type=submit]').removeAttr('disabled');
				$(input).addClass('correct');
				$(input).removeClass('error');
				$('.bs-submit-button-event').css('z-index', '-1');
				$('#errorcaptcha').hide();
				$('#bs_ebcaptchainput').css('border-color', '');
			}
			else{
				$(element).find('button[type=submit]').attr('disabled','disabled');
				$(input).addClass('error');
				$(input).removeClass('correct');
				$('.bs-submit-button-event').css('z-index', '9');
			}
			
		});

		$(document).keypress(function(e)
		{
			if(e.which==13)
			{
				if((element).find('button[type=submit]').is(':disabled')===true)
				{
					e.preventDefault();
					return false;
				}
			}

		});

	};
})
 (jQuery);
});