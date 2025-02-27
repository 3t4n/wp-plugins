jQuery(document).ready(function($) {
    if ($('#form-panel-tab').length) {
        var postID = $("#post_ID").val(); //attr('id').replace('post-', ''); // Get form ID
        $('#form-panel-tab').after('<li role="tab" aria-selected="false" tabindex="-1" id="contact-tab-panel-custom" class="contact-tab"><a href="admin.php?page=fdm_form&l=c&form_id=' + postID + '" target="_blank" style="color:#466ab3;font-weight:600;">Submissions</a></li>');
    }

    // Target each row of Contact Form 7 forms
    $(".wp-list-table .row-actions").each(function() {
        var postID = $(this).closest('tr').find('.check-column input[type="checkbox"]').val(); //attr('id').replace('post-', ''); // Get form ID
        var customUrl = 'admin.php?page=fdm_form&l=c&form_id=' + postID; // Adjust this URL as needed
        var customLink = '<span class="custom-action"> | <a href="' + customUrl + '" style="color:#466ab3;font-weight:600;">Submissions</a></span>';
        $(this).append(customLink); 
    });
});