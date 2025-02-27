jQuery(document).ready(function () {

    // Final setup ajax.
    jQuery('#beucw_ajax_setup_button').click(function (e) {

        e.preventDefault();

        Swal.fire('', 'Your Request Created Successfully..!', 'success');

        let selectedValue = jQuery('input[name="beucw_selected_radio"]:checked').val();
        let catId = jQuery('input[name="beucw_cat_selection"]:checked').val();

        jQuery.ajax({
            url: beucw_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'beucw_api_request_data',
                selected_option: selectedValue,
                catId: catId,
            },
            success: function (response) {
                // location.reload();
            }
        });
    });

    // Log Toggle Date.
    jQuery('.beucw-log-toggle-button').click(function () {

        let content = jQuery(this).parent().next('.beucw-log-data-submenu');
        let isExpanded = content.css('display') !== 'none';

        if (isExpanded) {
            content.slideUp();
        } else {
            content.slideDown();
        }
    });

    // Key Validation ajax.
    jQuery('#beucw_ajax_button').click(function (e) {

        // e.preventDefault();
        jQuery.ajax({
            url: beucw_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'beucw_api_key_validation',
                key_data: jQuery('input[name="beucw_openai_api_key"]').val(),
            },
            beforeSend: function () {
                jQuery('span#beucw-key-valid-message').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                jQuery( '.beucw-ai-message-data' ).html('<i class="fas fa-spinner fa-spin"></i> Processing');
                jQuery( '.beucw_openai_api_model' ).hide();
            },
            success: function (response) {

                let final_data = JSON.parse(response);

                if ( final_data.status == 1 ) {
                    jQuery('span#beucw-key-valid-message').empty().html('<i class="fas fa-check-circle" style="color: green;"></i> ' + final_data.usage);
                } else {
                    jQuery('span#beucw-key-valid-message').empty().html('<i class="fas fa-times-circle" style="color: red;"></i> ' + final_data.usage);
                }

                // Set processing status.
                jQuery( '.beucw-ai-message-data' ).html('<i class="fas fa-spinner fa-spin"></i> Processing');

                // Trigger save button.
                jQuery("input[name='beucw_save_key']").click();
            }
        });
    });

    // Final setup ajax.
    jQuery('#beucw_ajax_setup_button').click(function (e) {

        e.preventDefault();

        Swal.fire('', 'Your Request Created Successfully..!', 'success');

        let selectedValue = jQuery('input[name="beucw_selected_radio"]:checked').val();
        let catId = jQuery('input[name="beucw_cat_selection"]:checked').val();

        jQuery.ajax({
            url: beucw_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'beucw_api_request_data',
                selected_option: selectedValue,
                catId: catId,
            },
            success: function (response) {
            }
        });
    });
    
    // Setting timeout.
    setTimeout( () => {
        // AJAX to show notice of new features.
        jQuery('div[data-notice="beucw_new_features_notice"] .notice-dismiss').on('click', function(e){
            e.preventDefault();
            jQuery.ajax({
                type: "POST",
                url: beucw_ajax_object.ajax_url,
                data: {
                    action: 'beucw_update_new_feature_notice_read',
                },
                success: (res) => {
                }
            });
            console.log("dimissed");
        })
    }, 2000);
});


function showContent(contentId) {

    // Hide all content divs
    const contents = document.querySelectorAll('.beucw-log-content-container');
    contents.forEach(content => content.classList.remove('active'));

    // Remove active class from all tabs
    const tabs = document.querySelectorAll('.beucw-log-tab');
    tabs.forEach(tab => tab.classList.remove('active'));

    // Show the selected content
    document.getElementById(contentId).classList.add('active');

    // Set the clicked tab as active
    document.getElementById('tab' + contentId.slice(-1)).classList.add('active');
}