<?php

// HERE WE START

global $acf_core_loader;
$options = $acf_core_loader->settings;
$mailer_path = admin_url('admin-ajax.php?action=acf_submit_message');
//var_dump($options);
//exit();
if ($options['Enable'] == 1){

?>
<div class="fancyforn-window-overlay">
    <?php if($options['DeveloperCopy']) {?><div class="developer-copyright"><span>developed by</span> <a href="http://www.magazento.com/">magento templates</a></div><?php };?>
</div>
<div class="ajaxcontactform-show" id="ajaxcontactform-action" style="top: <?php echo $options['VPositionPx'];?>">
</div>
<div class="ajaxcontactform-wrapper" style="display: none;">
    <div class="fcf-contact-success">
        <div class="fcf-contact-holder">
            <div class="fcf-confirmation" style="opacity: 1;"><?php echo $options['Success_Text'];?></span>
            </div>
            <input class="submit-contact-button-success" type="submit" name="submit" value="Close" style="opacity: 1;">
            <div class="fcf-stamp" style="opacity: 1;"><div class="fcf-stamp-borders"></div><div class="fcf-lines"></div></div>
        </div>
    </div>
    <div class="fcf-contact">
        <div class="fcf-envelope">
            <div class="fcf-envelope-ft"></div>
            <div class="fcf-letter">
                <div id="close-button-fancybox">X</div>
                <form class="fcf-contact-form">
                    <div class="left">
                        <label for="message"><?php echo $options['Message'];?> <span class="req"><?php echo $options['Message'];?></span></label>
                        <textarea name="message" cols="0" id="ajaxcontactform-message" rows="5" class="textarea"></textarea>
                    </div>

                    <div class="right">
                        <label for="name"><?php echo $options['Your_name'];?><span class="req"><?php echo $options['Required'];?></span></label>
                        <input type="text" name="name" id="ajaxcontactform-name" class="input">
                        <label for="email"><?php echo $options['Email'];?> <span class="req"><?php echo $options['Required'];?></span></label>
                        <input type="text" name="email" id="ajaxcontactform-email" class="input">
                        <label for="url"><?php echo $options['Website'];?></label>
                        <input type="text" name="url" id="ajaxcontactform-url" class="input">
                        <input type="submit" name="submit" value="Send message !" class="submit-contact-button"/>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    (function ($) {

        // Email Validation
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }

        function hideContactForm() {
            $('#ajaxcontactform-action').removeClass("opened");
//            $.when($('.fcf-envelope').animate({'height': '400px'}, 300)).then(function() {
//                $('.ajaxcontactform-wrapper').hide()
//                $('.fancyforn-window-overlay').hide();
//            });

            $('.fcf-envelope').animate({'height': '400px'}, 300, function () {
                $('.ajaxcontactform-wrapper').hide();
                $('.fancyforn-window-overlay').hide();
            });
        }

        function bubbleLetter(ev, eft, letterFadingOutTime, letterFadingInTime, letterMovingTime, letter) {
            var newletter = '<div class="fcf-alphabet">' + letter + '</div>';
            var randomLeftStart = Math.floor(Math.random() * ($(window).width()));
            var randomLeftEnd = Math.floor(Math.random() * (ev.width() - 40));
            randomLeftEnd += ev.offset().left;
            var randomTopEnd = Math.floor(Math.random() * (eft.height() / 2 - 40));
            randomTopEnd += eft.offset().top + (eft.height() / 2);

            var closestX = (randomLeftStart > (ev.offset().left + ev.width() / 2)) ? (ev.offset().left + ev.width() - 40) : (ev.offset().left + 40);

            if (Math.abs((randomTopEnd) / (randomLeftEnd - randomLeftStart)) > Math.abs((eft.offset().top) / (closestX - randomLeftStart))) {

                randomTopEnd = eft.offset().top + (eft.height() / 2);
                randomLeftEnd = eft.offset().left + (eft.width() / 2);

            }


            $(newletter).appendTo('body').css({'top': 0, 'left': randomLeftStart + 'px'}).fadeIn(letterFadingInTime).animate({
                'top': randomTopEnd + 'px',
                'left': randomLeftEnd + 'px',
                'fontSize': '26px',
                'width': '40px',
                'height': '40px'
            }, letterMovingTime).fadeOut(letterFadingOutTime, function () {
                    $(this).remove();
                });
        }

        $.fn.fancyContactForm = function (options) {

            var defaults = {
                urlSubmit: '<?php echo $mailer_path; ?>',
                methodSubmit: 'GET',
                afterSubmit: function (res) {
                },
                error: function (request, status, error) {
                },
                stampAppearingTime: 1000,
                dataType: "html",
                textAppearingTime: 1000,
                letterMovingTime: 3000,
                envelopeOpeningTime: 1000,
                envelopeClosingTime: 1000,
                letterFadingInTime: 300,
                letterFadingOutTime: 300
            };

            var options = $.extend(defaults, options);

            this.each(function () {

                var $cont = $(this),
                    eft = $cont.find('.fcf-envelope-ft'),
                    ev = $cont.find('.fcf-envelope'),
                    form = $cont.find('.fcf-contact-form');

                form.find('input, textarea').keypress(function (e) {

                    bubbleLetter(ev, eft, options.letterFadingOutTime, options.letterFadingInTime, options.letterMovingTime, String.fromCharCode(e.which));

                });

                form.submit(function (e) {
                    e.preventDefault();

                    var formvalid = true
                    if (!isValidEmailAddress($('#ajaxcontactform-email').val())) {
                        formvalid = false;
                        $('#ajaxcontactform-email').addClass('notvalid');
                    } else {
                        $('#ajaxcontactform-email').removeClass('notvalid');
                    }

                    if ($('#ajaxcontactform-name').val() == '') {
                        $('#ajaxcontactform-name').addClass('notvalid');
                        formvalid = false;
                    } else {
                        $('#ajaxcontactform-name').removeClass('notvalid');
                    }

                    if ($('#ajaxcontactform-message').val() == '') {
                        formvalid = false;
                        $('#ajaxcontactform-message').addClass('notvalid');
                    } else {
                        $('#ajaxcontactform-message').removeClass('notvalid');
                    }

                    if (formvalid) {

                        $.ajax({
                            url: options.urlSubmit,
                            type: options.methodSubmit,
                            data: $(form).serialize(),
                            success: function (res) {
                                console.log(res);
                                options.afterSubmit(res);
                                $('.fcf-alphabet').remove();
                                ev.animate({'height': '400px'}, options.envelopeClosingTime).css('marginLeft', (ev.offset().left - $('.fcf-contact').offset().left) + 'px').animate({'marginLeft': $(window).width() + 'px'}, function () {

                                    $('.ajaxcontactform-wrapper').show();
                                    $('.fcf-contact-success').show();

//                                ev.remove();

                                });
                                return false;
                            },
                            error: function (request, status, error) {
                                options.error(request, status, error);
                            }
                        });
                    }


                });

            });
        };




        jQuery( document ).ready(function( $ ) {

            // PREPARE
            $('.fancyforn-window-overlay').css('height',$( document ).height() + 'px');
            $('.fcf-contact').fancyContactForm();
            $('.ajaxcontactform-wrapper').hide();


            // BIND CLICKS
            $("#ajaxcontactform-action").click(function () {
                if ($("#ajaxcontactform-action").hasClass("opened")) {
                    hideContactForm();
                } else {
                    $('.fcf-envelope').animate({'height': '735px'}, 1000);
                    $('#ajaxcontactform-action').addClass("opened");
                    $('.ajaxcontactform-wrapper').show();
                    $('.fancyforn-window-overlay').show();
                    $('.fcf-envelope').show();
                }
            });

            // Close Button
            $(".submit-contact-button-success").click(function () {
                $('.fcf-envelope').css({
                    'margin': '50px auto',
                    'display': 'none'
                });
                $('.ajaxcontactform-wrapper').hide();
                $('.fcf-contact-success').hide();


                $('.fancyforn-window-overlay').hide();
                $('#ajaxcontactform-action').removeClass("opened");

                $('.fcf-contact-form .textarea ,.fcf-contact-form .input').val('');
            });

            $("#close-button-fancybox").click(function () {
                hideContactForm();
            });


        });

    })(jQuery);
</script>

<?php } ?>