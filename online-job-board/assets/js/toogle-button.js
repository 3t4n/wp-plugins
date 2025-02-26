jQuery(document).ready(function() {
    function updateLayout(alwselectedlayout) {
        // Reset all layouts
        jQuery('.contact_layout_one, .contact_layout_two, .contact_layout_three, .contact_layout_four').removeClass('contact_layout');

        // Handle template-specific logic
        switch(alwselectedlayout) {
            case 'template1':
               
               jQuery('.contact_layout_one').addClass('contact_layout');
                break;
            case 'template2':
               
                jQuery('.contact_layout_two').addClass('contact_layout');
                break;
            case 'template3':
               
                jQuery('.contact_layout_three').addClass('contact_layout');
                break;
            case 'template4':
                
                jQuery('.contact_layout_four').addClass('contact_layout');
                break;
            default:
                break;
        }
    }

    // Initial load
    var alwselectedlayout = jQuery('[name=contact_form_template]:checked').val();
    updateLayout(alwselectedlayout);

    // On change
    jQuery('input[type=radio][name=contact_form_template]').change(function() {
        alwselectedlayout = jQuery(this).val();
        updateLayout(alwselectedlayout);
    });
});