/*jQuery(function() {
    var options = {
        target:"#itt_testimonial_result",
        beforeSend: function() {
            jQuery('.tl-progress').slideDown('fast');
            var percentVal = '0%';
            var bar = jQuery('.tl-bar');
            var percent = jQuery('.tl-percent');
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var bar = jQuery('.tl-bar');
            var percent = jQuery('.tl-percent');
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        beforeSubmit:  showRequest,     // pre-submit callback
        success:       showResponse,    // post-submit callback
        url:    ajax_object.ajaxurl
    };

    // bind form using "ajaxForm"
    jQuery("#itt_testimonial_submission_form").ajaxForm(options);
});
function showRequest(formData, jqForm, options) {
    var bar = jQuery('.tl-bar');
    var percent = jQuery('.tl-percent');
    var percentVal = '100%';
    bar.width(percentVal);
    percent.html(percentVal);
}
function showResponse(responseText, statusText, xhr, jQueryform)  {
//do extra stuff after submit
    document.getElementById("itt_testimonial_submission_form").reset();
    var percentVal = '0%';
    var bar = jQuery('.tl-bar');
    var percent = jQuery('.tl-percent');
    bar.width(percentVal);
    percent.html(percentVal);
    jQuery('.tl-progress').slideUp('fast');
}
*/