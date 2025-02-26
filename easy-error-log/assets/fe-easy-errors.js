jQuery(document).ready(function($) {
    // Function to fetch and update error count
    function updateErrorCount() {
        $.ajax({
            url: ajax_fe_object.ajax_url,
            type: 'post',
            data: {
                action: 'get_error_count'
            },
            cache: false, // Prevent caching
            success: function(response) {
                var error_count = parseInt(response);
                var error_count_html = "<span style='color:red;font-weight:bold;' class='update-plugins count-" + error_count + "'><span class='update-count'>" + error_count + "</span></span>";
                $('#wp-admin-bar-my-errors-page .ab-item').html("WP Errors-" + error_count_html);
                $('#error-log-container .error-log-header span').html("Error Log (" + error_count_html + ")");
            },
            error: function(xhr, status, error) {
                console.error("Error fetching error count:", error);
            }
        });
    }

    // Function to fetch and update error log
    function updateErrorLog() {
        $.ajax({
            url: ajax_fe_object.ajax_url,
            type: 'post',
            data: {
                action: 'display_error_log'
            },
            success: function(response) {

                // console.log(response)
                $('#error-log-content').html(response);
            }
        });
    }

    // Initial load of error count and error log
    updateErrorCount();
    updateErrorLog();

    // Set intervals to update error count and error log periodically
    var errorCountInterval = setInterval(updateErrorCount, 5000); // Update every 5 seconds
    var errorLogInterval = setInterval(updateErrorLog, 5000); // To Update every 10 seconds 10000

    // Clean up intervals when the page is unloaded
    $(window).on('unload', function() {
        clearInterval(errorCountInterval);
        clearInterval(errorLogInterval);
    });



    // Initialize the state
    var isOpen = false;

    // Function to toggle the error log visibility
    function toggleErrorLog() {
        if (isOpen) {
            $('#error-log-container').removeClass('open').addClass('closed');
            $('#error-log-toggle').text('🔺');
        } else {
            $('#error-log-container').removeClass('closed').addClass('open');
            $('#error-log-toggle').text('🔻');
        }
        isOpen = !isOpen;
    }

    // Bind the click event to the toggle button
    // $('#error-log-toggle').on('click', function() {
    $('.error-log-header').on('click', function() {
        toggleErrorLog();
    });



    // Open editor 
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


});