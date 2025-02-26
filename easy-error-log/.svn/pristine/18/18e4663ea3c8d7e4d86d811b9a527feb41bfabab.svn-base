jQuery(document).ready(function($) {

    // Fetch and update debug mode status when the page loads
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: {
            action: 'get_debug_mode_status'
        },
        success: function(response) {
            var statusElement = $('#debug-mode-status');
            if (response === 'ON') {
                statusElement.css('color', 'red');
            } else if (response === 'OFF') {
                statusElement.css('color', 'green');
            }
            statusElement.text(response);
        }
    });

    // AJAX call to toggle debug mode
    function updateToggleState(status) {
        $('#toggle-debug-mode').prop('checked', status === 'ON');
        $('#debug-mode-status')
            .text(status)
            .css('color', status === 'ON' ? 'red' : 'green');
    }

    // Initial state
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: { action: 'get_debug_mode_status' },
        success: function(response) {
            updateToggleState(response);
        }
    });

    // Toggle handler
    $('#toggle-debug-mode').on('change', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: { action: 'toggle_debug_mode' },
            success: function(response) {
                updateToggleState(response);
            }
        });
    });
    // END 

    
    // AJAX call to display error log
    $('#refresh-debug-log').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'display_error_log'
            },
            success: function(response) {
                $('#error-log-container').empty(); // reset and show the latest error on log 
                // console.log(response); 
                $('#error-log-container').append(response);
            }
        });
    });

     // Fetch error count via AJAX
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: {
            action: 'get_error_count'
        },
        cache: false, // Prevent caching
        success: function(response) {
            var error_count = parseInt(response);
            var error_count_html = "<span style='color:red;font-weight:bold;' class='update-plugins count-" + error_count + "'><span class='update-count'>" + error_count + "</span></span>";
            $('#wp-admin-bar-my-errors-page .ab-item').html("WP Errors-" + error_count_html);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching error count:", error);
        }
    });

    // AJAX call to clean debug log
    $('#clean-debug-log').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'clean_debug_log'
            },
            success: function(response) {
                // alert(response);
                // Refresh error log after cleaning
                $('#refresh-debug-log').trigger('click');

                // Update error count after cleaning
                $.ajax({
                    url: ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action: 'get_error_count'
                    },
                    success: function(response) {
                        var error_count = parseInt(response);
                        var error_count_html = "<span style='color:red;font-weight:bold;' class='update-plugins count-" + error_count + "'><span class='update-count'>" + error_count + "</span></span>";
                        $('#wp-admin-bar-my-errors-page .ab-item').html("WP Errors-" + error_count_html);
                    }
                });
                
            }
        });
    });

    

    // AJAX call to download debug log
    $('form#download-debug-log').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // JavaScript-based download
                var downloadLink = document.createElement('a');
                downloadLink.href = response; // Debug log URL
                downloadLink.download = 'debug.log';
                downloadLink.style.display = 'none';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            }
        });
    });

    //Reset 
    $('#reset-constant').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'reset_debug_constant', // Action name to trigger the AJAX callback
                // Add any additional data if needed
            },
            success: function(response) {
                alert(response); // Show success message
                window.location.reload();
            },
            error: function(error) {
                console.error('Error:', error); // Log any errors to the console
            }
        });
    });


    // Function to fetch and update error count
    function updateErrorCount() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'get_error_count'
            },
            cache: false, // Prevent caching
            success: function(response) {
                var error_count = parseInt(response);
                var error_count_html = "<span style='color:red;font-weight:bold;' class='update-plugins count-" + error_count + "'><span class='update-count'>" + error_count + "</span></span>";
                $('#wp-admin-bar-my-errors-page .ab-item').html("WP Errors-" + error_count_html);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching error count:", error);
            }
        });
    }

    // Function to fetch and update error log
    function updateErrorLog() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'display_error_log'
            },
            success: function(response) {
                $('#error-log-container').html(response);
            }
        });
    }


    function updateDebugStatus() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'check_debug_constants_status',
            },
            success: function(response) {
                if (response.success) {
                    const wpDebugStatus = response.data.WP_DEBUG;
                    const wpDebugLogStatus = response.data.WP_DEBUG_LOG;

                    const wpDebugElement = $('.constant-status.wp-debug');
                    const wpDebugLogElement = $('.constant-status.wp-debug-log');

                    wpDebugElement.text(wpDebugStatus === true || wpDebugStatus === 'true' ? 'Active' : 'Not Active');
                    wpDebugLogElement.text(wpDebugLogStatus === true || wpDebugLogStatus === 'true' ? 'Active' : 'Not Active');

                    wpDebugElement.css('color', wpDebugStatus === true || wpDebugStatus === 'true' ? 'green' : 'red');
                    wpDebugLogElement.css('color', wpDebugLogStatus === true || wpDebugLogStatus === 'true' ? 'green' : 'red');
                }
            }
        });
    }

    // Initial load of error count and error log
    updateErrorCount();
    updateErrorLog();
    updateDebugStatus();

    // Set intervals to update error count and error log periodically
    var errorCountInterval = setInterval(updateErrorCount, 5000); // Update every 5 seconds
    var updateDebugConstStatus = setInterval(updateDebugStatus, 5000); // Update every 5 seconds
    // var errorLogInterval = setInterval(updateErrorLog, 5000); // To Update every 10 seconds 10000

    // Clean up intervals when the page is unloaded
    $(window).on('unload', function() {
        clearInterval(errorCountInterval);
        clearInterval(updateDebugConstStatus);
        // clearInterval(errorLogInterval);
    });


    // Initial load of error log
    $('#refresh-debug-log').trigger('click');


    // Tabs 
    const tabs = document.querySelectorAll('.nav-tab');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('nav-tab-active'));
            tabPanes.forEach(p => p.style.display = 'none');

            this.classList.add('nav-tab-active');
            document.querySelector(this.getAttribute('href')).style.display = 'block';
        });
    });

    // Copy button 
    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetCode = document.querySelector(targetId);

            // Create a temporary textarea to copy the content
            const tempInput = document.createElement('textarea');
            tempInput.value = targetCode.textContent;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Change button text to "Copied"
            const originalText = this.textContent;
            this.textContent = 'copied';

            // Revert text back after 1 second
            setTimeout(() => {
                this.textContent = originalText;
            }, 1000);
        });
    });



    // AJAX call to toggle fe debug mode widgets
    $('#toggle-fe-mode').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'toggle_widgets_mode'
            },
            success: function(response) {
                var widgets_mode = response.data.widgets_mode;
                $('#debug-fe-status').text(widgets_mode === 'true' ? 'ON' : 'OFF');
                $('#debug-fe-status').css('color', widgets_mode === 'true' ? 'red' : '#ffee00');
            }
        });
    });

    // Set the initial status based on the stored option value
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'post',
        data: {
            action: 'get_widgets_mode_status'
        },
        success: function(response) {
            var widgets_mode = response.data.widgets_mode;
            $('#debug-fe-status').text(widgets_mode === 'true' ? 'ON' : 'OFF');
            $('#debug-fe-status').css('color', widgets_mode === 'true' ? 'red' : '#ffee00');
        }
    });

    $('#toggle-admin-widget').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'toggle_admin_widget',
                nonce: ajax_object.nonce
            },
            success: function(response) {
                if (response.success) {
                    const status = response.data.status;
                    const $statusSpan = $('#admin-widget-status');
                    
                    if (status === 'active') {
                        $statusSpan.text('ON').css('color', '#ffee00');
                    } else {
                        $statusSpan.text('OFF').css('color', 'red');
                    }
                    
                }
            }
        });
    });

    jQuery(document).ready(function($) {
        $(document).on('click', '.open-in-editor', function() {
            const filePath = $(this).data('path');
            const line = $(this).data('line');
            const protocols = $(this).data('protocols');
            
            const tryOpenEditor = (protocols, index) => {   
                if (index >= protocols.length) {
                    // Try to open with Notepad as last resort
                    const notepadUrl = `file:///${filePath}`;
                    const link = document.createElement('a');
                    link.href = notepadUrl;
                    
                    // Try to open with Notepad
                    try {
                        link.click();
                    } catch (e) {
                        alert('No compatible editor found. Please install an editor (VSCode, Sublime, PHPStorm, Atom) or ensure Notepad is properly configured.');
                    }
                    return;
                }
                
                const protocol = protocols[index];
                let url;
                
                switch(protocol) {
                    case 'vscode':
                        url = `vscode://file/${filePath}:${line}`;
                        break;
                    case 'sublime':
                        url = `subl://open?url=file://${filePath}&line=${line}`;
                        break;
                    case 'phpstorm':
                        url = `phpstorm://open?file=${filePath}&line=${line}`;
                        break;
                    case 'atom':
                        url = `atom://core/open/file?filename=${filePath}&line=${line}`;
                        break;
                }
                
                const link = document.createElement('a');
                link.href = url;
                link.click();
                
                setTimeout(() => {
                    tryOpenEditor(protocols, index + 1);
                }, 1000);
            };
            
            tryOpenEditor(protocols, 0);
        });
    });


    $('#toggle-controller').on('click', function() {
        $('.wpel-buttons').slideToggle(300); // Toggle visibility with animation
        let icon = $('#toggle-icon');
        icon.text(icon.text() === '▼' ? '▲' : '▼'); // Change icon
    });

    if (ajax_object.admin_widget_status !== 'active') {
        $('#admin-error-widget').remove();
        return;
    }


});

