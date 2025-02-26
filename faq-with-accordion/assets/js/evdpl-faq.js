jQuery(document).ready( function(){
    jQuery('.evdpl-faq-accordion-content').each( function() {
        if( jQuery(this).hasClass('faq-closed')) {
            jQuery(this).hide();
        }
    });
    jQuery('.evdpl-faq-accordion-title').each( function() {
        jQuery(this).click(function() {
            var toggleContent = jQuery(this).next('.evdpl-faq-content');
            jQuery(this).toggleClass('faq-open').toggleClass('faq-closed');
            toggleContent.toggleClass('faq-open').toggleClass('faq-closed');
            toggleContent.slideToggle();
        });
    });
    jQuery('.evdpl-faq-accordion-wrap').accordion( {
        collapsible: true,
        active: false,
        heightStyle: "content"
    });
});