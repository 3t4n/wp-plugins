jQuery(document).ready(function($){
    $('#sub-accordion-section-contact_section').on( 'click', '.phone_text', function(e){
        e.preventDefault();
        wp.customize.control( 'phone' ).focus();        
    });

    $('#sub-accordion-section-contact_section').on( 'click', '.email_text', function(e){
        e.preventDefault();
        wp.customize.control( 'email' ).focus();        
    });

    $('#sub-accordion-section-social_section').on( 'click', '.social_text', function(e){
        e.preventDefault();
        wp.customize.control( 'social_links' ).focus();        
    });

    $('#sub-accordion-section-header_settings').on( 'click', '.phone_label_text', function(e){
        e.preventDefault();
        wp.customize.control( 'phone_label' ).focus();        
    });

    $('#sub-accordion-section-header_settings').on( 'click', '.email_label_text', function(e){
        e.preventDefault();
        wp.customize.control( 'email_label' ).focus();        
    });

    $('#sub-accordion-section-social_media_settings').on( 'click', '.social_section_text', function(e){
        e.preventDefault();
        wp.customize.control( 'social_title' ).focus();        
    });
});