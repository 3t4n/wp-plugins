jQuery( document ).ready(function( $ ) {

    /**
     * General
     */
    // Color picker
    $('.colorpicker').wpColorPicker();

    // Check/Uncheck to show/hide the sticky bar in post/taxonomy
    $("#astro_sb_enable_disable_all").click(function () {
        $(".astro_sb_checkbox_enable").prop('checked', $(this).prop('checked'));
    });

    $(".astro_sb_checkbox_enable").change(function(){
        if (!$(this).prop("checked")){
            $("#astro_sb_enable_disable_all").prop("checked",false);
        }
    });

});