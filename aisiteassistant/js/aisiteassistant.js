jQuery(document).ready(function($) {
    console.log("Chat widget loaded");

    if (AISiteAssistant.current_task_id) {
        checkStatus(AISiteAssistant.current_task_id);
    }

    $('#chat-icon').on('click', function() {
        $('#chat-widget').toggle();
    });

    $('#scraper-form').on('submit', function(e) {
        e.preventDefault(); 
        var start_url = $('input[name="start_url"]').val();
        $('#scraper-result').html('<div class="step">Starting...</div>');
    
        $.ajax({
            url: AISiteAssistant.ajax_url,
            type: 'POST',
            data: {
                action: 'start_scraping',
                start_url: start_url,
                nonce: AISiteAssistant.nonce
            },
            success: function(response) {
                if (response.success) {
                    var task_id = response.data.task_id;
                    checkStatus(task_id); 
    
                    
                    location.reload(); 
                } else {
                    $('#scraper-result').html(response.data);
                }
            },
            error: function(xhr, status, error) {
                $('#scraper-result').html('Error: ' + error);
            }
        });
    });


    function checkStatus(task_id) {
        $.ajax({
            url: AISiteAssistant.ajax_url,
            type: 'POST',
            data: {
                action: 'check_status',
                task_id: task_id,
                nonce: AISiteAssistant.nonce
            },
            success: function(response) {
                if (response.success) {
                    var status = response.data.status;
                    updateStatus(status);

                    if (status === 'Database created and ready to use!') {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else if (status !== 'Task failed!') {
                        setTimeout(function() {
                            checkStatus(task_id);
                        }, 5000);
                    }
                } else {
                    console.warn('Response indicated failure during check_status:', response.data);
                    $('#scraper-result').html('We are doing database creation in the background, you can check back later or wait, your call :)');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error during check_status:', error);
                $('#scraper-result').html('We are doing database creation in the background, you can check back later or wait, your call :)');
            }
        });
    }

    function updateStatus(status) {
        var statusElement = $('#scraper-result');
        var steps = {
            'Collecting data...': 'Collecting data',
            'Downloading data...': 'Downloading data',
            'Cleaning data...': 'Cleaning data',
            'Building database...': 'Building database',
            'Database created and ready to use!': 'Database created and ready to use!'
        };

        var currentStatusHtml = statusElement.html();
        var stepText = steps[status] || status;

        // Prevent appending duplicate status messages
        if (!currentStatusHtml.includes(stepText)) {
            // Mark previous steps as completed
            statusElement.find('.step:contains("...")').each(function() {
                $(this).html($(this).text().replace('...', ' <span style="color:green;">✔</span>'));
            });

            // Append the new status
            statusElement.append('<div class="step">' + stepText + '...</div>');
        }

        // If the current status indicates completion, update it accordingly
        if (status === 'Database created and ready to use!') {
            statusElement.find('.step:last').html(stepText + ' <span style="color:green;">✔</span>');
        }
    }

    function displayLastDbCreated() {
        $.ajax({
            url: AISiteAssistant.ajax_url,
            type: 'POST',
            data: {
                action: 'get_current_status',
                nonce: AISiteAssistant.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('#last-db-created').html(response.data.last_db_time);
                } else {
                    $('#last-db-created').html('Error: ' + response.data);
                }
            },
            error: function(xhr, status, error) {
                $('#last-db-created').html('Error: ' + error);
            }
        });
    }

    function sendMessage(query, retriesLeft = 3) {
        if (typeof query === 'undefined') {
            query = $('#chat-input').val();
            if (query.trim() === '') return;
    
            console.log("Sending query: " + query);
    
            $('#chat-content').append(
                '<div class="chat-message user">' +
                '    <div class="chat-bubble user">' + query + '</div>' +
                '</div>'
            );
            $('#chat-input').val('');
        }
    
        $.ajax({
            url: AISiteAssistant.ajax_url,
            method: 'POST',
            data: {
                action: 'handle_chat_request',
                query: query,
                nonce: AISiteAssistant.nonce
            },
            success: function(response) {
                if (response.success) {
                    console.log("Response received: " + response.data.response);
                    $('#chat-content').append(
                        '<div class="chat-message bot">' +
                        '    <div class="chat-bubble bot">' + response.data.response + '</div>' +
                        '</div>'
                    );
                } else {
                    console.log("Error occurred: " + response.data);
                    handleError(query, retriesLeft);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error occurred: " + error);
                handleError(query, retriesLeft);
            }
        });
    }
    
    function handleError(query, retriesLeft) {
        if (retriesLeft > 0) {
            console.log("Retrying... (" + retriesLeft + " retries left)");
            setTimeout(function() {
                sendMessage(query, retriesLeft - 1);
            }, 2000); // Retry after 1 second
        } else {
            console.log("Max retries reached. An error occurred.");
            $('#chat-content').append(
                '<div class="chat-message bot">' +
                '    <div class="chat-bubble bot">An error occurred after multiple retries. Please try again later.</div>' +
                '</div>'
            );
        }
    }


    $('#chat-input').on('keypress', function(e) {
        if (e.which == 13) {
            sendMessage();
        }
    });

    $('#chat-send').on('click', function() {
        sendMessage();
    });
});
