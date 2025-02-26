jQuery(document).ready(function($) {
    var importContent = $('.apie_import_btn_wrap').html();
    var formContent = $('.apie_import_form_wrap').html();

    $(importContent).insertAfter('.bulkactions');
    $('.top').after(formContent);
    $(".wrap1").hide();
    $("#apie-import-btn").click(function(){
        $(".wrap1").fadeToggle();
    });
   	// VALIDATION ON FORM SUBMIT
    $('#apie-import-form').on('submit', function(e) {
        var fileInput = $('#import_file');
        if (fileInput.val() === '') {
            e.preventDefault();
            $('#validation-message').show();
        } else {
            $('#validation-message').hide();
        }
    }); 
});