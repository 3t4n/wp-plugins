jQuery(function($) {

    settingTypeNotific = '<span class="description" id="ncmwcp1802_upsell_settings_type_notific" style="display: block; margin: 5px;">This display style requires that "Enable AJAX add to cart buttons on archives" is enabled</span>';

    if ( $("#ncmwcp1802_upsell_settings_type").val() === "button" ) {
        
        $( settingTypeNotific ).appendTo( $("#ncmwcp1802_upsell_settings_type").parent() );

    }

    $("#ncmwcp1802_upsell_settings_type").change(function(){

        SelectedVal = $(this).val();

        if ( SelectedVal === "button" ) {

            $( settingTypeNotific ).appendTo( $(this).parent() );

        } else {

            $( "#ncmwcp1802_upsell_settings_type_notific" ).remove();

        }

    });
    

});