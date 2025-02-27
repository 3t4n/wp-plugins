(function ($) {
	"use strict";
    function creContactForm(form) {
        var $form = $(form),
            submitButton = $form.find('.submit-button'),
            loader = $form.find('.cre_widget_contact_form_loader'),
            messageContainer = $form.find('.message-container'),
            errorContainer = $form.find('.error-container'),
            formOptions = {
                beforeSubmit: function () {
                    submitButton.attr('disabled', 'disabled');
                    messageContainer.fadeOut('fast');
                    errorContainer.html('').fadeOut('fast');
                    loader.css('display', 'inline-block');
                },
                success: function (ajax_response, statusText, xhr, $form) {
                    var response = $.parseJSON(ajax_response);
                    loader.fadeOut('fast');
                    submitButton.removeAttr('disabled');
                    if (response.success) {
                        $form.resetForm();
                        messageContainer.html(response.message).fadeIn('fast');

                        setTimeout(function () {
                            messageContainer.html('').fadeOut('fast');
                        }, 3000);
                    } else {
                        errorContainer.html(response.message).fadeIn('fast');
                    }
                }
            };

        $form.validate({
            errorLabelContainer: errorContainer,
            submitHandler: function (form) {
                $(form).ajaxSubmit(formOptions);
            }
        });
    }

    $(window).on('load', function () {

        if (jQuery().validate && jQuery().ajaxSubmit) {
            var creGetContactFormWidgets = $('.cre_contact_form');
            if (creGetContactFormWidgets.length) {
                $.each(creGetContactFormWidgets, function (i, widget) {
                    var id = $(widget).attr("id");
                    creContactForm('#' + id + ' .contact-form');
                });
            }
        }
    });

    $(document).on('ready',function () {

        // Property Gallery
        $('.property-gallery-slider').slick({
            dots: false,
            infinite: true,
            speed: 700,
            slidesToShow: 1,
            autoplay: true,
            fade: true,
            arrows: true,
        });

        // Property Accordion
        $('.accordion-item .accordion-icon').click(function (e) {
            e.preventDefault();
            var $this = $(this);
            if ($this.siblings('.accordion-content').hasClass('show')) {
                $this.siblings('.accordion-content').removeClass('show');
                $this.siblings('.accordion-content').slideUp(350);
            } else {
                // $this.parent().parent().siblings('.accordion-item .accordion-content').removeClass('show');
                // $this.parent().parent().siblings('.accordion-item .accordion-content').slideUp(350);
                $this.parent('.accordion-item').siblings('.accordion-item').children('.accordion-content').removeClass('show');
                $this.parent('.accordion-item').siblings('.accordion-item').children('.accordion-content').slideUp(350);
                $this.siblings('.accordion-content').toggleClass('show');
                $this.siblings('.accordion-content').slideToggle(350);
            }
        });
        $('.accordion-item-wrap .accordion-item .accordion-icon').on('click', function (e) {
            e.preventDefault();
            $(this).parent().siblings('.accordion-item').removeClass('current');
            $(this).parent().toggleClass('current');
        });
        $('.accordion-item .toggle').click(function (e) {
            e.preventDefault();
            var $this = $(this);
            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('.accordion-item .accordion-content').removeClass('show');
                $this.parent().parent().find('.accordion-item .accordion-content').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }
        });
        $('.accordion-item-wrap .accordion-item .toggle').on('click', function (e) {
            e.preventDefault();
            $(this).parent().siblings('.accordion-item').removeClass('current');
            $(this).parent().toggleClass('current');
        });
    })

})(jQuery);



(function ($) {
    "use strict";

    $(document).ready(function () {

        /*----------------------------------------------------------------------------------*/
        /* Contact Form AJAX validation and submission
         /* Validation Plugin : http://bassistance.de/jquery-plugins/jquery-plugin-validation/
         /* Form Ajax Plugin : http://www.malsup.com/jquery/form/
         /*---------------------------------------------------------------------------------- */
        if (jQuery().validate && jQuery().ajaxSubmit) {

            var submitButton = $('#submit-button'),
                ajaxLoader = $('#ajax-loader'),
                messageContainer = $('#message-container'),
                errorContainer = $("#error-container");

            var formOptions = {
                beforeSubmit: function () {
                    submitButton.attr('disabled', 'disabled');
                    ajaxLoader.fadeIn('fast');
                    messageContainer.fadeOut('fast');
                    errorContainer.fadeOut('fast');
                },
                success: function (ajax_response, statusText, xhr, $form) {
                    var response = $.parseJSON(ajax_response);
                    ajaxLoader.fadeOut('fast');
                    submitButton.removeAttr('disabled');
                    if (response.success) {
                        $form.resetForm();
                        messageContainer.html(response.message).fadeIn('fast');

                        setTimeout(function () {
                            messageContainer.fadeOut('slow')
                        },5000);

                        if ( typeof contactFromData !== 'undefined' ){
                            setTimeout(function(){
                                window.location.replace(contactFromData.redirectPageUrl);
                            },1000);
                        }

                    } else {
                        errorContainer.html(response.message).fadeIn('fast');
                    }
                }
            };

            // Contact page form
            $('#contact-form .contact-form').validate({
                errorLabelContainer: errorContainer,
                submitHandler: function (form) {
                    $(form).ajaxSubmit(formOptions);
                }
            });

            // Contact page form
            $('.cfos_contact_form').validate({
                errorLabelContainer: errorContainer,
                submitHandler: function (form) {
                    $(form).ajaxSubmit(formOptions);
                }
            });

            // Agent single page form
            $('#agent-single-form').validate({
                errorLabelContainer: errorContainer,
                submitHandler: function (form) {
                    $(form).ajaxSubmit(formOptions);
                }
            });
        }
    });

})(jQuery);