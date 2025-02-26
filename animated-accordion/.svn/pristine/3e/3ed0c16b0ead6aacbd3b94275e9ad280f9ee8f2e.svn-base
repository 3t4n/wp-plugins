var titleBorderColor;
var titleBorderStyle;
var titleBorderWidth;
var contentBorderColor;
var contentBorderStyle;
var contentBorderWidth;
var animationTimeIn;
var animationTimeOut;
jQuery(document).ready(function() {
    jQuery("#preview").click(function() {
        var title = jQuery("#aTitle").val();
        var text = jQuery("#aText").val();
        var img = jQuery("#aImage").val();
        var imgfloat = jQuery("#imgfloat:checked").val();
        var titleBgColor = jQuery("#titleBgColor").val();
        var contentBgColor = jQuery("#contentBgColor").val();
        var ImageSize = jQuery("#ImageSize").val();
        var titleFontSize = jQuery("#titleFontSize").val();
        var contentFontSize = jQuery("#contentFontSize").val();
        var titleSectionHeight = jQuery("#titleSectionHeight").val();
        var titleFontColor = jQuery("#titleFontColor").val();
        var contentFontColor = jQuery("#contentFontColor").val();
        var img_with_src = '<img src=' + jQuery("#aImage").val() + ' style="width:128px">';
        titleBorderColor = jQuery("#titleBorderColor").val();
        titleBorderStyle = jQuery("#titleBorderStyle").val();
        titleBorderWidth = jQuery("#titleBorderWidth").val();

        contentBorderColor = jQuery("#contentBorderColor").val();
        contentBorderStyle = jQuery("#contentBorderStyle").val();
        contentBorderWidth = jQuery("#contentBorderWidth").val();
        animationTimeIn = jQuery("#animationTimeIn").val();
        animationTimeOut = jQuery("#animationTimeOut").val();

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            complete: function() {
                jQuery("#preview_section").show();
            },
            data: {"action": "preview_panel", "title": title, "text": text, "img": img, "imgfloat": imgfloat, "titleBgColor": titleBgColor, "contentBgColor": contentBgColor,
                "ImageSize": ImageSize, "titleFontSize": titleFontSize, "contentFontSize": contentFontSize, "titlePadding": titleSectionHeight,
                "titleFontColor": titleFontColor, "contentFontColor": contentFontColor,
                "titleBorderWidth": titleBorderWidth, "titleBorderStyle": titleBorderStyle,
                "titleBorderColor": titleBorderColor},
            success: function(data) {
                jQuery("#title_section").html(title);
                jQuery("#title_section").css('color', titleFontColor);
                jQuery("#title_section").css('font-size', titleFontSize + 'px');
                jQuery("#title_section").css('padding', '20');
                jQuery("#title_section").css('background-color', titleBgColor);
                jQuery("#content_text").html(text);
                jQuery("#content_text").css('color', contentFontColor);
                jQuery("#content_text").css('font-size', contentFontSize + 'px');
                jQuery("#content_img").html(img_with_src);
                jQuery("#content_img").css('float', imgfloat);
                jQuery(".accordionItem_preview").css('background-color', contentBgColor);
                jQuery(".accordionTitle_preview").css('background-color', titleBgColor);
                jQuery("#preview_section").css('background-color', titleBgColor);

                jQuery("#preview_section").css('border-bottom-width', parseInt(titleBorderWidth));
                jQuery("#preview_section").css('border-bottom-style', titleBorderStyle);
                jQuery("#preview_section").css('border-bottom-color', titleBorderColor);
                jQuery("#preview_section").css('border-top-width', parseInt(titleBorderWidth));
                jQuery("#preview_section").css('border-top-style', titleBorderStyle);
                jQuery("#preview_section").css('border-top-color', titleBorderColor);


            }
        });
    });
    //uses classList, setAttribute, and querySelectorAll
//if you want this to work in IE8/9 youll need to polyfill these

    var d = document,
            accordionToggles = d.querySelectorAll('.js-accordionTrigger-preview'),
            setAria,
            setAccordionAria,
            switchAccordion,
            touchSupported = ('ontouchstart' in window),
            pointerSupported = ('pointerdown' in window);

    skipClickDelay = function(e) {
        e.preventDefault();
        e.target.click();
    }

    setAriaAttr = function(el, ariaType, newProperty) {
        el.setAttribute(ariaType, newProperty);
    };
    setAccordionAria = function(el1, el2, expanded) {
        switch (expanded) {
            case "true":
                setAriaAttr(el1, 'aria-expanded', 'true');
                setAriaAttr(el2, 'aria-hidden', 'false');
                break;
            case "false":
                setAriaAttr(el1, 'aria-expanded', 'false');
                setAriaAttr(el2, 'aria-hidden', 'true');
                break;
            default:
                break;
        }
    };
//function
    switchAccordion = function(e) {
        e.preventDefault();
        var thisAnswer = e.target.parentNode.nextElementSibling;
        var thisQuestion = e.target;
        if (thisAnswer.classList.contains('is-collapsed')) {
            setAccordionAria(thisQuestion, thisAnswer, 'true');
        } else {
            setAccordionAria(thisQuestion, thisAnswer, 'false');
            jQuery(".animateIn-preview").css('border', 'none');
        }
        thisQuestion.classList.toggle('is-collapsed');
        thisQuestion.classList.toggle('is-expanded');
        thisAnswer.classList.toggle('is-collapsed');
        thisAnswer.classList.toggle('is-expanded');

        thisAnswer.classList.toggle('animateIn-preview');
        jQuery(".animateIn-preview").css('border-bottom-width', parseInt(contentBorderWidth));
        jQuery(".animateIn-preview").css('border-bottom-style', contentBorderStyle);
        jQuery(".animateIn-preview").css('border-bottom-color', contentBorderColor);
      
    };

    for (var i = 0, len = accordionToggles.length; i < len; i++) {
        if (touchSupported) {
            accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
        }
        if (pointerSupported) {
            accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
        }
        accordionToggles[i].addEventListener('click', switchAccordion, false);
    }



});

