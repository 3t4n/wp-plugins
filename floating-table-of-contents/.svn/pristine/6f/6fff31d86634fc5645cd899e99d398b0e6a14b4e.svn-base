

jQuery(document).ready(function () {
    
    //gets options info from JSON object built into meta tag on page.
    const parsOptn = JSON.parse(document.querySelector('meta[name="styleOptions"]').content);
    
    

    //add alpha transparancy
    function addAlpha(color,  opacity) {
        // limit values so it is between 0 and 1.
        const _opacity = Math.round(Math.min(Math.max(opacity || 1, 0), 1) * 255);
        return color + _opacity.toString(16).toUpperCase();
    }

    
        //loads the saved setting into the .css file
    document.documentElement.style
        .setProperty('--backgroundcolor', addAlpha(parsOptn.toc_background_color, parsOptn.toc_background_trans));

    document.documentElement.style
        .setProperty('--titlecolor', addAlpha(parsOptn.toc_title_color, parsOptn.toc_title_trans));

    document.documentElement.style
        .setProperty('--titlefcolor', parsOptn.toc_title_fcolor);

    document.documentElement.style
        .setProperty('--borderstyle', parsOptn.toc_border_style);

    document.documentElement.style
        .setProperty('--bordercolor', parsOptn.toc_border_color);

    document.documentElement.style
        .setProperty('--chapterbackgroundcolor', addAlpha(parsOptn.toc_chap_bcolor, parsOptn.toc_chap_trans));

    document.documentElement.style
        .setProperty('--chaptertextcolor', parsOptn.toc_chap_fcolor);

    document.documentElement.style
        .setProperty('--buttoniconcolor', parsOptn.toc_icon_color);

    document.documentElement.style
        .setProperty('--gradientcolor1', parsOptn.toc_icon_g1color);

    document.documentElement.style
        .setProperty('--gradientcolor2', parsOptn.toc_icon_g2color);





    
    //controls the button and animations
    jQuery('.floatingButton').on('click',
        function (e) {
            e.preventDefault();
            jQuery(this).toggleClass('open');
    /*        if (jQuery(this).children('.svg-inline--fa').hasClass('fa-plus')) {
                jQuery(this).children('.svg-inline--fa').removeClass('fa-plus');
                jQuery(this).children('.svg-inline--fa').addClass('fa-times');
                console.log("Open");
            }
            else if (jQuery(this).children('.svg-inline--fa').hasClass('fa-times')) {
                jQuery(this).children('.svg-inline--fa').removeClass('fa-times');
                jQuery(this).children('.svg-inline--fa').addClass('fa-plus');
                console.log("Close");
            }*/
            jQuery('.table-of-contents').stop().slideToggle();
        }
    );
    jQuery(this).on('click', function (e) {

        var container = jQuery(".floatingButton");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && jQuery('.floatingButtonWrap').has(e.target).length === 0) {
            if (container.hasClass('open')) {
                container.removeClass('open');
            }
            if (container.children('.fa').hasClass('fa-times')) {
                container.children('.fa').removeClass('fa-times');
                container.children('.fa').addClass('fa-plus');
            }
            jQuery('.table-of-contents').hide();
        }

        // if the target of the click isn't the container and a descendant of the menu
        if (!container.is(e.target) && (jQuery('.table-of-contents').has(e.target).length > 0)) {
            jQuery('.floatingButton').removeClass('open');
            jQuery('.table-of-contents').stop().slideToggle();
        }
    });
});