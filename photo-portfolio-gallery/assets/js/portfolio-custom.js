"use strict";
function portfolioGalleryIsotope(elem,option){
    if(typeof elem.isotope == 'function'){
        elem.isotope(option);
    } else {
        elem.webpacemicro(option);
    }
}
jQuery(document).ready(function () {
    if (portfolioGalleryDisableRightClick == 'on') {
        jQuery('.photo-portfolio-content img, ul[id^="web_pace_portfolio_popup_list_"] img').each(function () {
            jQuery(this).bind('contextmenu', function () {
                return false;
            });
        });
        jQuery('#pcolorbox').bind('contextmenu', '#pcboxLoadedContent img', function () {
            return false;
        });
    }
    jQuery('.photo-portfolio-content').each(function(){
        var portfolioId = jQuery(this).attr('data-portfolio-id');
        
            var watermark_class='',imgsrc;
            if(is_watermark){
                watermark_class='watermark';
            }
            var group_count = 0;
            jQuery(".portelement_" + portfolioId).each(function () {
                group_count++;
            });
            for (var i = 1; i <= group_count; i++) {
                jQuery(".portfolio-group" + i + "-" + portfolioId + " > img").addClass(watermark_class).attr('data-src', '');
                imgsrc = jQuery(".portfolio-group" + i + "-" + portfolioId + " > img").parent().attr('href');
                jQuery(".portfolio-group" + i + "-" + portfolioId + " > img").attr('data-imgsrc', imgsrc);
                jQuery(".portfolio-group" + i + "-" + portfolioId).addClass('portfolio_responsive_lightbox');
                if(!jQuery('.web_pace_portfolio_container').hasClass('view-store') && (!jQuery('.web_pace_portfolio_container').hasClass('view-toggle-up-down') ||
                    !jQuery('.web_pace_portfolio_container').hasClass('view-full-height') ||
                    !jQuery('.web_pace_portfolio_container').hasClass('view-full-width') ||
                    !jQuery('.photo-portfolio-content').hasClass('view-content-slider'))) {
                    jQuery(".portfolio-group" + i + "-" + portfolioId).lightboxPortfolio();
                }
            }
            jQuery(".portfolio-lightbox-group" + portfolioId + " > img").addClass(watermark_class).attr('data-src', '');
            jQuery(".portfolio-lightbox-group" + portfolioId + " > img").each(function(){
                imgsrc = jQuery(this).parent().attr('href');
                jQuery(this).attr('data-imgsrc', imgsrc);
            });
            jQuery(".portfolio-lightbox-group" + portfolioId).addClass('portfolio_responsive_lightbox');
            if(!jQuery('.web_pace_portfolio_container').hasClass('view-store'))
            {
                jQuery(".portfolio-lightbox-group" + portfolioId).removeClass('cboxElement').lightboxPortfolio();

            }
            var group_count_slider = 0;
            jQuery(".slider-content").each(function () {
                group_count_slider++;
            });
            if(!jQuery('.web_pace_portfolio_container').hasClass('view-store'))
            {
                jQuery(".portfolio-group-slider" + i).removeClass('cboxElement').addClass('portfolio_responsive_lightbox').lightboxPortfolio();

            }
            for (var i = 1; i <= group_count_slider; i++) {
                jQuery(".portfolio-group-slider_" + portfolioId + "_" + i ).each(function () {
                    imgsrc = jQuery(this).attr('href');
                    jQuery(this).find('img:first').attr('data-imgsrc', imgsrc);
                });
                jQuery(".portfolio-group-slider_" + portfolioId + "_" + i + " > img").addClass(watermark_class).attr('data-src', '');
                jQuery(".portfolio-group-slider_" + portfolioId + "_" + i).removeClass('cboxElement').addClass('portfolio_responsive_lightbox').lightboxPortfolio();
                jQuery("#p-main-slider_" + portfolioId + " .clone  a").removeClass();
            }

    });

});