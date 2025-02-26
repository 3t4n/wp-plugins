(function( $ ) {
	'use strict';
	//////////////////////////////////////////////////
	$( document ).ready(function() {
		var timezone_offset_minutes = new Date().getTimezoneOffset();
        timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
		//alert(timezone_offset_minutes);
		var data= {
				action: 'get_timezone', timezone_offset_minutes: timezone_offset_minutes
			}
	$.ajax( {
		url: myAjax.ajaxurl, 
		data:data, 
		type: 'post', 
		dataType: 'json', 
		success: function(response) {
						console.log(response.timezone);
						
					}
				});
	});
	///////////////////////////////////////////////// 
	 $( window ).load(function() {
		 $( ".link-copy" ).on( "click", function() {
       var elementitem = $(this);
		 var $temp = $("<input>");
         $("body").append($temp);
         $temp.val($(elementitem).attr('data-link')).select();
         document.execCommand("copy");
         $temp.remove();
		 alert('Link Copied');
		 });

		  $( ".link-copy-plan" ).on( "click", function() {
       var elementitem = $(this);
		 var $temp = $("<input>");
         $("body").append($temp);
         $temp.val($(elementitem).attr('data-link')).select();
         document.execCommand("copy");
         $temp.remove();
		 alert('Link Copied');
		 });

		 $('a.share-trigger').click(function(event) {
      event.preventDefault();
      $(this).modal();
    });
	  });

	 $( document ).ready(function() {
		 $("a.share-trigger,a.bookmark-trigger,a.exly-button,a.exly-title").click(function(e){
  e.stopPropagation();
});
		 var linkName =  $(".link-to-listing");
		 linkName.click(function(){
		 var linktarget = $(this).attr('data-link-target');
		 window.open(linktarget, '_blank');
		 });

    $(".keywords_list ul li a").click(function(){

		var keyword = $(this).attr('data-target');
		var dataID = $(this).attr('data-id');
		$('.'+dataID+' .allkeywords').hide();
		$('.'+dataID).children('.'+keyword).show();

		$(this).parent('li').siblings("li").children("a").removeClass('active-primary-border-color');
		 $(this).addClass('active-primary-border-color');
		});
});

 $( document ).ready(function() {
	 $("#mobilephone").on('keypress',function(){
    if($(this).val().length >9){
        return false;
    }

});
//var validator = $('#exly-contact-validation').validate();
// $('.input-date').datepicker({
            // dateFormat : 'mm/dd/yy'
        // });
jQuery.validator.addMethod("phone_number_validate", function (value, element) {
        if ( /^\d{3}-?\d{3}-?\d{4}$/g.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");
$('.input-date').change(function() {

	if($(this).hasClass('date-required')){
		var date = $(this).val();
		if(date){
		$(this).attr('value',date);
		$(this).next('.error').remove();

		}
	}

});
 $('#exly-contact-validation').validate({
            rules: {
            full_name: {
                    required: true
               },
			   message: {
                    required: true
               },
            email: {
                    required: true,
                    email: true
              },
			  phone: {
		          required: true,
		          number: true,
		          minlength: 10,
		          maxlength: 10
		},
             },
			 messages: {
      message: "Please enter a message",
	  full_name: "Please enter your name",
      email: "Please enter an email",
	  phone: {
            required: "Please enter your phone number",
			phone_number_validate: true,
           // minlength: jQuery.format("Phone number should be 10 digits long"),
        }
    },errorPlacement: function(error, element) {
		       // if(error){
				//	alert('Please fill the form with valid details');

				//}
                if (element.hasClass('multicheck')) {
					error.appendTo(element.parent(".radio-inline").parent(".form-group"));
                }
				else {
                    error.appendTo(element.parent(".form-group"));
                }
            },
			invalidHandler: function(event, validator) {
    // 'this' refers to the form
    var errors = validator.numberOfInvalids();
    if (errors) {
      alert('Please fill the form with valid details');
    }
  },
            submitHandler: function(form) {
				console.log(form);

                var action_url = 'exly_lead_post';
                var postData = $('form#exly-contact-validation').serialize();
                $.ajax({
                   url: myAjax.ajaxurl,
                    type: "POST",
                     data: postData+'&action='+action_url,
                    cache: false,
                    processData: false,
                    success: function(data) {
						var obj = JSON.parse(data);
						if(obj.message === 'success'){
							var datamessage = 'Your message has been successfully sent.';
							var color = 'green';
							if(obj.data.post_interest_url){
								window.location.href = obj.data.post_interest_url;
							}else{
								alert(datamessage);
						        location.reload();
							}

						}else{
							var datamessage = 'Error to submit form.';
							var color = 'red';
							 alert(datamessage);
						       // location.reload();

						}
						
						

                    }
                });
                return false;
            },
            // other options
        });
		$('.form-checkbox .multicheck,.form-single-select select').each(function() {
                    $(this).rules('add', {

                        messages: {
                            required: 'Please select an option'
                        }
                    });
        });
		$('.form-input textarea').each(function() {
                    $(this).rules('add', {
                        messages: {
                            required: 'Please enter an answer'
                        }
                    });
        });
		$('.input-date').each(function() {
                    $(this).rules('add', {
					required : function(element) {
                      var action = $(element).hasClass('date-required');
                         if(action) {
                             return true;
                            } else {
                              return false;
                            }
					},
                        messages: {
                            required: 'Please enter a valid date'
                        },

                    });
        });
});
	 ////////////////////// Classic Testimonials Jquery //////////
	 $(document).ready(function(){
	 			$('.modern .testimonials-wrapper.owl-carousel').owlCarousel({
	 autoplay:false,
	 nav:false,
	 dots:true,
	 touchdrag:true,
	 mousedrag:true,
	 loop:true,
	 autoHeight: false,
  autoHeightClass: 'owl-height',
	 smartSpeed:1000,
	 items:3,
	 responsive: {
	 	0: {
	 			items: 1
	 	},
	 	600: {
	 			items: 1
	 	},
	 	1000: {
	 			items: 1
	 	}

	 }

	 });

	 });
	 //////////////////////////////////////////
	 $(document).ready(function(){
				 $('.classic .testimonials-wrapper.owl-carousel').owlCarousel({
autoplay:false,
nav:true,
dots:false,
touchdrag:true,
mousedrag:true,
loop:true,
smartSpeed:1000,
 items:3,
 responsive: {
		 0: {
				 items: 1
		 },
		 600: {
				 items: 1
		 },
		 1000: {
				 items: 2
		 }

 }

});
/////////////open openpopup ///////////
$('.openpopup').click(function(event) {
  event.preventDefault();
  this.blur(); // Manually remove focus from clicked link.
	var dataHTML = $(this).children('.testimonial').children('.text-testimonial').html();
  var html = '<div class="modal exly-wp-modal">'+dataHTML+'</div>';
    $(html).appendTo('body').modal();

});
///////////////////
	 });


})( jQuery );


document.addEventListener("DOMContentLoaded", function() {
    // Clear all cookies
    document.cookie.split(";").forEach(function(c) {
        document.cookie = c.trim().split("=")[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    });

    // Set the timezone cookie
    var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.cookie = "system_timezone=" + timezone + "; path=/";
    
    // Reload the page after setting the timezone
    if (!location.search.includes('reloaded=true')) {
        location.href = location.href + '?reloaded=true';
    } else {
        // Use history.replaceState to remove '?reloaded=true' from the URL
        history.replaceState(null, '', location.pathname);
    }
});
