(function ($) {
    'use strict';

    function ajax_call(data, success, error) {
        // Add the nonce to the data object
        data.nonce = upcasted_offload_s3_params.nonce;
        
        jQuery.ajax({
            url: upcasted_offload_s3_params.ajaxurl,
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                success(response);
            },
            error: function (response) {
                error(response);
            }
        });
    }

    function trigger_upcasted_change_s3_provider() {
        $('#upcasted-save-s3-provider').on('click', function () {
            const selected_s3_provider = $("#upcasted-select-s3-provider");
            change_s3_provider_event(selected_s3_provider);
        });
    }

    function change_s3_provider_event(selected_s3_provider) {
        ajax_call({
            'action': 'set_s3_provider',
            'selected_s3_provider': selected_s3_provider.val()
        }, function (response) {
            window.location.reload();
        }, function (response) {
            display_modal_error(response);
        });
    }

    function close_upcasted_modal() {
        const modal = $('.upcasted-modal');
        $('.upcasted-modal-content').on('click', function () {
            event.stopPropagation();
        });
        modal.on('click', function () {
            modal.addClass('hidden');
        });
        $('.upcasted-close-modal-button').on('click', function () {
            modal.addClass('hidden');
        });
    }

    function on_region_change() {
        $("#upcasted_offload_select_region").change(function () {
            var value = $(this).children(':selected').val();
            $("#upcasted_offload_region").focus().val(value);
        });
    }

    function trigger_upcasted_save_settings() {
        $('#upcasted-save-settings, #change-current-bucket').on('click', function () {
            const access_key_id = $("input[name='upcasted_s3_offload_access_key_id']");
            const secret_access_key = $("input[name='upcasted_s3_offload_secret_access_key']");
            const region = $("input[name='upcasted_offload_region']");
            const custom_endpoint = $("input[name='upcasted_custom_endpoint']");

            $('.upcasted-missing-mandatory-fields').remove();
            check_mandatory_field(access_key_id);
            check_mandatory_field(secret_access_key);
            if ('' === custom_endpoint.val()) {
                check_mandatory_field(region);
            }
            init_modal();
            if (0 === $('.upcasted-missing-mandatory-fields').size()) {
                if ($(this).attr('id') !== 'change-current-bucket') {
                    change_bucket_event(access_key_id, secret_access_key, region, custom_endpoint);
                } else {
                    if (confirm('!WARNING: Changing your bucket can break your file delivery because you can only serve files from one bucket. Are you sure that you want to change the bucket?')) {
                        change_bucket_event(access_key_id, secret_access_key, region, custom_endpoint);
                    } else {
                        $('.upcasted-tools-container ').removeClass('hidden');
                    }
                }
            }

        });
    }

    function change_bucket_event(access_key_id, secret_access_key, region, custom_endpoint) {
        ajax_call({
            'action': 'upcasted_offload_connect',
            'access_key_id': access_key_id.val(),
            'secret_access_key': secret_access_key.val(),
            'region': region.val(),
            'custom_endpoint': custom_endpoint.val()
        }, function (response) {
            if (response.success) {
                const buckets = response.data; // Use `response.data` as sent by `wp_send_json_success`
                
                // Clear any existing bucket options
                $('.upcasted-buckets-list').empty();

                if (Array.isArray(buckets) && buckets.length > 0) {
                    $('.upcasted-modal-error').addClass('hidden');
                    $('#select-bucket-modal').removeClass('hidden');
                    $('.upcasted-modal-result').removeClass('hidden');

                    // Append new bucket options
                    $.each(buckets, function (index, value) {
                        $('.upcasted-buckets-list').append($('<option />').text(value));
                    });
                } else {
                    // No buckets found, show custom bucket input
                    $('#select-bucket-modal').removeClass('hidden');
                    $('.upcasted-custom-bucket-name').removeClass('hidden');
                }
            } else {
                // Handle error response
                display_modal_error(response.data.message || 'An unexpected error occurred.');
            }
        },
        function (error) {
            // Generic error handling
            display_modal_error(error.responseJSON?.data?.message || 'An unexpected error occurred.');
        });
    }

    function trigger_upcasted_save_bucket() {
        $('#upcasted-save-bucket').on('click', function () {
            const bucket = $("select[name='upcasted_s3_offload_bucket']");
            check_mandatory_field(bucket);
            if (0 === $('.upcasted-missing-mandatory-fields').size()) {
                select_bucket_event(bucket.val());
            }
        });
        $('#upcasted-save-bucket-name').on('click', function () {
            const bucket = $("input[name='upcasted_write_bucket_name']");
            check_mandatory_field(bucket);
            if (0 === $('.upcasted-missing-mandatory-fields').size()) {
                select_bucket_event(bucket.val());
            }
        });
    }

    function select_bucket_event(bucket) {
        // Cache jQuery selectors
        const $accessKeyId = $("input[name='upcasted_s3_offload_access_key_id']");
        const $secretAccessKey = $("input[name='upcasted_s3_offload_secret_access_key']");
        const $includedFiletypes = $("select[name='upcasted_s3_offload_included_filetypes']");
        const $keepLocalFiles = $("select[name='upcasted-keep-local-files'] option:selected");
        const $keepS3Files = $("select[name='upcasted-keep-s3-files'] option:selected");
        const $region = $("input[name='upcasted_offload_region']");
        const $customEndpoint = $("input[name='upcasted_custom_endpoint']");
    
        // Prepare data for AJAX call
        const data = {
            action: 'upcasted_init',
            access_key_id: $accessKeyId.val(),
            secret_access_key: $secretAccessKey.val(),
            custom_endpoint: $customEndpoint.val(),
            region: $region.val(),
            bucket: bucket,
            included_filetypes: $includedFiletypes.val(),
            keep_local_files: $keepLocalFiles.val(),
            keep_s3_files: $keepS3Files.val()
        };
    
        // Execute AJAX call
        ajax_call(
            data,
            function(response) {
                if (response.success) {
                    // Hide modal and show tools container
                    $('.upcasted-modal').addClass('hidden');
                    $('.upcasted-tools-container').removeClass('hidden');
    
                    // Reset active buttons if necessary
                    remove_active_buttons();
    
                    // Update the current bucket display
                    $('.upcasted-current-bucket span strong').text(bucket);
                } else {
                    // Handle server-side errors
                    display_modal_error(response.data.message || 'An unexpected error occurred.');
                }
            },
            function(error) {
                // Handle AJAX errors
                display_modal_error(error.responseJSON?.data?.message || 'An unexpected error occurred.');
            }
        );
    }    

    function trigger_upcasted_create_bucket() {
        // Attach click event to the button
        $('#upcasted-create-bucket').on('click', function () {
            const bucket_name = $("input[name='upcasted_created_bucket']").val();
    
            // Check if bucket name is empty
            if (bucket_name === '') {
                display_modal_error('Bucket name cannot be empty.');
                return;
            }
    
            // Make AJAX call to create bucket
            ajax_call(
                {
                    action: 'upcasted_create_bucket', // WordPress AJAX action
                    bucket_name: bucket_name
                },
                function (response) {
                    // Handle successful response
                    if (response.success) {
                        select_bucket_event(bucket_name); // Proceed to select bucket event
                    } else {
                        display_modal_error(response.data || 'An unknown error occurred.');
                    }
                },
                function (errorResponse) {
                    // Handle AJAX error response
                    display_modal_error(errorResponse.responseJSON?.data || 'An unexpected error occurred.');
                }
            );
        });
    }    

    function display_error(message) {
        const error_div = $('.upcasted-tools-error');
        error_div.removeClass('hidden');
        error_div.text(message);
    }

    function remove_error() {
        $('.upcasted-tools-error').addClass('hidden');
    }

    function display_modal_error(response) {
        // Show the modal and error message
        $('#select-bucket-modal').removeClass('hidden');
        
        const error = $('.upcasted-modal-error');
        error.removeClass('hidden');
        
        // Set the error content
        error.html(undefined !== response.responseText ? '<pre>' + response.responseText + '</pre>' : '<pre>' + response + '</pre>');
        
        // Change the modal title to 'Error'
        $('.upcasted-modal-title').html('Error');
        
        // Hide the tools container
        $('.upcasted-tools-container').addClass('hidden');
    }
    
    function display_modal_error(response) {
        $('#select-bucket-modal').removeClass('hidden');
        const error = $('.upcasted-modal-error');
        error.removeClass('hidden');
        error.html(undefined !== response.responseText ? '<pre>' + response.responseText + '</pre>': '<pre>' + response + '</pre>');
        $('.upcasted-tools-container').addClass('hidden');
    }

    function check_mandatory_field(field) {
        if ('' === field.val()) {
            $('<div class="upcasted-missing-mandatory-fields">Missing mandatory field</div>').insertAfter(field);
        }
    }

    function init_modal() {
        $('#select-bucket-modal').addClass('hidden');
        $('.upcasted-modal-result').addClass('hidden');
        $('.upcasted-modal-error').addClass('hidden');
        $('.upcasted-tools-container').addClass('hidden')
        $('.upcasted-buckets-list option').remove();
    }

    function remove_active_buttons() {
        $('#local-to-s3-button').removeClass('upcasted-active-button');
        $('#s3-to-local-button').removeClass('upcasted-active-button');
    }

    
    

    function add_s3_filter_to_media_library() {
        // Wait for wp.media to be ready
        if (typeof wp !== 'undefined' && wp.media && wp.media.view) {
            // Run the code only on the Media Library page
            if (typeof pagenow !== 'undefined' && pagenow === 'upload') {
                // Save the original render function for later use
                const originalRender = wp.media.view.Attachment.Library.prototype.render;

                // Extend the Media Library view to add the cloud icon
                wp.media.view.Attachment.Library = wp.media.view.Attachment.Library.extend({
                    render: function () {
                        // Call the original render method
                        originalRender.apply(this, arguments);

                        // Check if the attachment has the custom property
                        if (this.model.get('is_cloud')) {
                            // Add a cloud icon overlay
                            if (!this.$el.find('.cloud-icon').length) { // Prevent duplicate icons
                                this.$el.addClass('upcasted-cloud-attachment');
                                this.$el.append('<span class="dashicons dashicons-cloud cloud-icon" title="File stored on S3"></span>');
                            }
                        }

                        return this;
                    }
                });
            }
        }
    };


    function upcasted_dismiss_notice() {
        $('#dismiss-upcasted-notice').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'dismiss_finished_cron_admin_notice',
                },
                success: function(response) {
                    if (response.success) {
                        $('.notice-success').fadeOut(); // Hide the notice
                    }
                }
            });
        });
    }

    function upcasted_toggle_info_panel() {
        window.upcasted_toggle_info_panel = function() {
            const infoPanel = $('.upcasted-plugin-info');
            const button = $('#toggle-info');
        
            if (infoPanel.is(':hidden')) {
                infoPanel.css('display', 'flex');
                button.text('Close Info Panel');
            } else {
                infoPanel.css('display', 'none');
                button.text('Read More');
            }
        };
      
        // Attach the function to the button click event
        $('#toggle-info').click(function() {
            upcasted_toggle_info_panel();
        });
    }

    $(document).ready(function () {
        upcasted_toggle_info_panel();
        trigger_upcasted_change_s3_provider();
        trigger_upcasted_create_bucket();
        trigger_upcasted_save_bucket();
        on_region_change();
        close_upcasted_modal();
        trigger_upcasted_save_settings();
        upcasted_dismiss_notice();
        add_s3_filter_to_media_library();
        
    });

})
(jQuery);
