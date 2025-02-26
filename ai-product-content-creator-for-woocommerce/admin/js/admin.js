// Helper functions for logging
function logToConsole(message) {
    if (spwai_vars.enableConsoleLog === 'yes') {
        console.log(message);
    }
}

function logToErrorLog(message) {
    if (spwai_vars.enableErrorLog === 'yes') {
        console.error(message);
    }
}

jQuery(document).ready(function ($) {
    $('#spwai-use-upc').on('change', function () {
        if ($(this).is(':checked')) {
            var upc = $('#spwai-use-upc-value').val();
            $('#spwai-prompt').val(upc + ' - this is upc');
        } else {
            var productTitle = $('#spwai-product-title').val();
            $('#spwai-prompt').val(productTitle);
        }
    });
    
    $('#spwai-generate').on('click', function () {
        var prompt = $('#spwai-prompt').val();

        $('#spwai-error-message').html(''); // error message

        // Validate that the prompt is not empty
        if (!prompt.trim()) {
            $('#spwai-error-message').html('Error: Please enter Product keyword.');
            return; // Do not proceed with the AJAX request
        }

        // generate text from open ai for generateFields array values
        var generateFields = ['title', 'description', 'shortdescription'];
        // Filter the array based on checkboxes
        generateFields = generateFields.filter(function (item) {
            return $('#spwai-check-' + item).prop('checked');
        });

        // Check if no checkboxes are checked
        if (generateFields.length === 0) {
            $('#spwai-error-message').html('Please select at least one checkbox!');
            return;
        }

        var step = 0; // first field : title
        generate_text_from_openai(prompt, generateFields, step);

    });


    // save generated values 
    $('#spwai-apply').on('click', function () {
        // validate fields are selected
        var generateFields = ['title', 'description', 'shortdescription'];
        selectedFields = generateFields.filter(function (item) { // Filter based on checkboxes
            return $('#spwai-check-' + item).prop('checked');
        });
        // Check if no checkboxes are checked
        if (selectedFields.length === 0) {
            $('#spwai-error-message').html('Failed to save: No Checkbox are selected!');
            var errorMessageElement = document.getElementById('spwai-error-message');
            errorMessageElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        } else {
            saveGeneratedValues(selectedFields);
        }

    });

    // generate text from open ai
    function generate_text_from_openai(prompt, generateFields, step) {
        var nonce = $('#spwai-nonce').val();
        var currentField = generateFields[step]; // field to generate
    
        $('#spwai-loader').show(); // show loading
    
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            dataType: 'json',
            data: {
                action: 'spwai_generate_text',
                prompt: prompt,
                field: currentField,
                nonce: nonce
            },
            beforeSend: function () {
                $('#spwai-loader').show();
            },
            success: function (response) {
                logToConsole(response);
                console.log(`Prompt sent to OpenAI: ${prompt}`);
                if (response.status === 'success') {
                    let messageElement = $('#spwai-' + currentField);
                    displayMessage(messageElement, response.message);
    
                    step++;
                    let fieldsCount = generateFields.length;
                    if (step < fieldsCount) {
                        generate_text_from_openai(prompt, generateFields, step);
                    } else {
                        $('#spwai-loader').hide();
                    }
                } else {
                    $('#spwai-error-message').html(response.message);
                    $('#spwai-loader').hide();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                logToErrorLog('AJAX request failed: ' + textStatus, errorThrown);
                $('#spwai-error-message').html('Error: Unable to fetch data.');
                $('#spwai-loader').hide();
            }
        });
    }

    // generate text from open ai
    function generate_text_from_openai_variation(prompt, generateFields, step, varMetabox) {
        var nonce = $('#spwai-nonce').val();
        // var postId = $('#post_ID').val();

        varMetabox.find('.spwai-loader').show();
        var errorElement = varMetabox.find('.spwai-error-message');

        var currentField = generateFields[step]; // field to generate
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            dataType: 'json',
            data: {
                action: 'spwai_generate_text',
                prompt: prompt,
                field: currentField,
                nonce: nonce
            },
            beforeSend: function () {
                // Show the loader before making the AJAX request
                varMetabox.find('.spwai-loader').show();
            },
            success: function (response) {
                logToConsole(response);
                if (response.status === 'success') {
                    displayMessage(varMetabox.find('.spwai-description'), response.message);

                    step++;
                    let fieldsCount = generateFields.length;
                    if (step < fieldsCount) {
                        generate_text_from_openai_variation(prompt, generateFields, step, varMetabox);
                    } else {
                        varMetabox.find('.spwai-loader').hide();
                    }
                } else {
                    // failed case
                    errorElement.html(response.message);
                    varMetabox.find('.spwai-loader').hide();
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle AJAX request errors
                logToErrorLog('AJAX request failed: ' + textStatus, errorThrown);
                errorElement.html('Error: Unable to fetch data.');
                varMetabox.find('.spwai-loader').hide();
            }
        });
    }



    // save generated values 
    function saveGeneratedValues(selectedFields) {
        // Fetch values from input fields for selected fields
        var fieldsArr = {};
        selectedFields.forEach(function (field) {
            fieldsArr[field] = $('#spwai-' + field).val();
        });

        // Check if any of the values is not empty
        if (Object.values(fieldsArr).some(value => value !== '')) {
            var nonce = $('#spwai-nonce').val();
            var postId = $('#post_ID').val();

            $('#spwai-error-message').html('');
            var isConfirmed = window.confirm('Are you sure you want to save?');
            if (isConfirmed) {
                // Send AJAX request to save values
                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    dataType: 'json',
                    data: {
                        action: 'spwai_save_product_data',
                        nonce: nonce,
                        product_id: postId,
                        fields: fieldsArr
                    },
                    success: function (response) {
                        logToConsole(response);
                        if (response.status === 'success') {
                            // update success
                            location.reload(true);
                        } else {
                            // update failed
                            alert(response.message);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle AJAX request errors
                        logToErrorLog('AJAX request failed: ' + textStatus, errorThrown);
                        // Display an error message if needed
                        alert('Error saving values.');
                    }
                });
            }

        } else {
            $('#spwai-error-message').html('Failed to save: Generated fields are empty!');
            var errorMessageElement = document.getElementById('spwai-error-message');
            errorMessageElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }

    }


    // save variation description 
    function saveVariationData(variationId, varMetabox, generatedDesc) {
        var errorElement = varMetabox.find('.spwai-error-message');
        // Check if values is not empty
        if (variationId && generatedDesc) {
            errorElement.html('');
            var nonce = $('#spwai-nonce').val();
            // Send AJAX request to save values
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                data: {
                    action: 'spwai_save_product_data',
                    nonce: nonce,
                    variation_id: variationId,
                    description: generatedDesc
                },
                success: function (response) {
                    logToConsole(response);
                    if (response.status === 'success') {
                        // update success
                        // scroll top to description field
                        var offset = 300;
                        $('html, body').animate({
                            scrollTop: varMetabox.offset().top - offset
                        }, 1000);
                    } else {
                        // update failed
                        errorElement.html(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle AJAX request errors
                    logToErrorLog('AJAX request failed: ' + textStatus, errorThrown);
                    // Display an error message if needed
                    errorElement.html("Save failed: ajax error!");
                }
            });

        } else {
            errorElement.html('Failed to save: Generated field empty!');
        }
    }


    function displayMessage(messageElement, message) {
        messageElement.val(''); // remove existing value from input field

        // Split the message into paragraphs
        const paragraphs = message.split(/\n+/);

        let currentParagraphIndex = 0;

        function typeParagraph() {
            if (currentParagraphIndex < paragraphs.length) {
                // Split the current paragraph into words
                const words = paragraphs[currentParagraphIndex].split(/\s+/);
                let currentWordIndex = 0;

                function typeWord() {
                    if (currentWordIndex < words.length) {
                        // Display the current word with spaces
                        messageElement.val(messageElement.val() + (currentWordIndex === 0 ? '' : ' ') + words[currentWordIndex]);
                        currentWordIndex++;
                        setTimeout(typeWord, 100); // Adjust the typing speed between words
                    } else {
                        // Move to the next paragraph
                        currentParagraphIndex++;
                        // Add a line break between paragraphs
                        messageElement.val(messageElement.val() + '\n\n');
                        // Start typing the next paragraph
                        typeParagraph();
                    }
                }

                // Start typing the current paragraph
                typeWord();
            } else {
                // Scroll to the bottom of the textarea
                messageElement.scrollTop(messageElement[0].scrollHeight);
            }
        }

        // Start typing animation
        typeParagraph();
    }



    //=============== Variation product ===========

    // Generate Content - click event
    $('#variable_product_options').on('click', '.spwai-variation-meta-box .spwai-generate', function () { // event delegation for dynamical elements
        var loop = $(this).data("loop");
        var varMetabox = $(this).closest('.spwai-variation-meta-box');
        var errorElement = varMetabox.find('.spwai-error-message');
        errorElement.html(''); // remove error message

        // get product keywords
        var prompt = varMetabox.find('.spwai-prompt').val();

        // validate empty
        if (!prompt.trim()) {
            errorElement.html('Error: Please enter Product keyword.');
            return; // Do not proceed with the AJAX request
        }

        // generate text from open ai for generateFields array values
        var generateFields = ['var-description'];
        var step = 0; // first field : title
        generate_text_from_openai_variation(prompt, generateFields, step, varMetabox);

    });

    $('#variable_product_options').on('click', '.spwai-variation-meta-box .spwai-apply', function () { // event delegation for dynamical elements
        var loop = $(this).data("loop");
        var varMetabox = $(this).closest('.spwai-variation-meta-box');
        var errorElement = varMetabox.find('.spwai-error-message');
        errorElement.html(''); // remove error message

        // get generated description
        var generatedDesc = varMetabox.find('.spwai-description').val();

        // validate empty
        if (!generatedDesc.trim()) {
            errorElement.html('Failed to save: Generated description is empty.');
            return; // Do not proceed with the AJAX request
        }

        var isConfirmed = window.confirm('Are you sure you want to save description?');
        if (isConfirmed) {
            // get closest variation parent
            var thisVariation = $(this).closest('.woocommerce_variation');
            // replace variation description with generated
            thisVariation.find('#variable_description' + loop).val(generatedDesc);
            // get variation id
            var variationId = thisVariation.find('.variable_post_id').val();

            // call save function
            saveVariationData(variationId, varMetabox, generatedDesc);
        }

    });


});


// Add copy functionality to copy icons
document.addEventListener('DOMContentLoaded', function () {
    // Delegate click events on the copy button and icon
    document.body.addEventListener('click', function (event) {
        // Check if the clicked element or any of its parents has the 'copy-icon' class
        let targetElement = event.target;

        // Traverse up the DOM tree to find the button if the icon was clicked
        while (targetElement && !targetElement.classList.contains('copy-icon')) {
            targetElement = targetElement.parentElement;
        }

        if (targetElement && targetElement.classList.contains('copy-icon')) {
            event.preventDefault();
            const targetSelector = targetElement.getAttribute('data-copy-target');
            const targetTextarea = document.querySelector(targetSelector);

            if (targetTextarea) {
                // Focus and select the content
                targetTextarea.focus();
                targetTextarea.select();

                try {
                    const successful = document.execCommand('copy');
                    if (successful) {
                        logToConsole('Copy successful!');
                        // Optional: Add visual feedback here
                    } else {
                        logToErrorLog('Copy failed!');
                    }
                } catch (err) {
                    logToErrorLog('Error executing copy command:', err);
                }
            } else {
                logToErrorLog('Target textarea not found!');
            }
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('spwai-generate')) {
            event.preventDefault();

            const loop = event.target.getAttribute('data-loop');
            const targetTextarea = document.querySelector(`#spwai-var-description_${loop}`);

            if (targetTextarea) {
                // Simulate content generation
                targetTextarea.value = 'Generated content goes here';
                logToConsole('Content generated and added to textarea:', targetTextarea);
            }
        }
    });
});


jQuery('#save-button').on('click', function (e) {
    e.preventDefault();


    var selectedField = $('input[name="spwai-rewrite-option"]:checked').val();
    var newContent = '';
    var productId = $('#product-id').val();

    if (selectedField === 'title') {
        newContent = $('#new-title').val();
    } else if (selectedField === 'description') {
        newContent = $('#new-description').val();
    } else if (selectedField === 'shortdescription') {
        newContent = $('#new-short-description').val();
    }

    $.ajax({
        type: 'POST',
        url: spwai_ajax.ajax_url,
        data: {
            action: 'spwai_save_content',
            field: selectedField,
            product_id: productId,
            new_content: newContent,
            _ajax_nonce: spwai_ajax.nonce
        },
        success: function (response) {
            if (response.success) {
                alert('Content saved successfully!');
            } else {
                alert(response.data.message || 'Error saving content');
            }
        },
        error: function (xhr, status, error) {
            logToConsole('AJAX Error:', error);
        }
    });
});

// 1.2.0
jQuery(document).ready(function ($) {
    $('#spwai-bulk-generate').on('click', function (e) {
        e.preventDefault(); // Prevent default action (page reload or form submission)

        // Collect selected products
        let selectedProducts = [];
        $('.check-column input[type="checkbox"]:checked').each(function () {
            if ($(this).val() !== 'on') {
                selectedProducts.push({
                    id: $(this).val(),
                    name: $(this).closest('tr').find('.row-title').text().trim(), // Get product name
                });
            }
        });

        if (selectedProducts.length === 0) {
            alert('Please select one or more products first.');
            return;
        }

        // Generate the list of selected products for the popup
        const productListHtml = selectedProducts
            .map(
                (product) => `
            <li class="ntdelitem" style="display: flex; align-items: flex-start;">
                <button type="button" id="${product.id}" class="button-link ntdelbutton" style="padding-right: 5px;">
                    <span class="screen-reader-text">Remove “${product.name}” from Bulk Edit</span>
                </button>
                <span class="ntdeltitle" aria-hidden="true">${product.name}</span>
            </li>
        `
            )
            .join('');

        // Popup HTML
        const popupHtml = `
        <div id="spwai-popup-overlay">
            <div id="spwai-popup">
                <button id="spwai-close-popup">&times;</button>
                <h2>Bulk Content Generation</h2>
                <div style="display: flex; width: 100%; margin-top: 20px;">
                    <!-- Selected Products -->
                    <div style="width: 25%; padding: 10px;">
                        <h4>Selected Products</h4>
                        <div id="bulk-title-div">
                            <div id="bulk-titles">
                                <ul id="bulk-titles-list" role="list">${productListHtml}</ul>
                            </div>
                        </div>
                    </div>
                    <!-- Prompt Field -->
                    <div style="width: 18%; padding: 10px;">
                        <h4>Which Field to Use as Prompt</h4>
                        <select id="spwai-prompt-field">
                            <option value="title" selected>Title</option>
                            <option value="description">Description</option>
                            <option value="shortdescription">Short Description</option>
                           <!-- <option value="upc">UPC</option>  -->
                        </select>
                    </div>
                    <!-- Contents to Generate -->
                    <div style="width: 18%; padding: 10px;">
                        <h4>Contents to Generate</h4>
                        <label><input type="checkbox" value="title" id="generate-title"> Title</label><br>
                        <label><input type="checkbox" value="description" id="generate-description"> Description</label><br>
                        <label><input type="checkbox" value="shortdescription" id="generate-short-description"> Short Description</label>
                    </div>
                    <!-- Progress -->
                    <div style="width: 39%; padding: 10px;">
                        <h4>Progress</h4>
                        <div id="spwai-progress-bar" style="width: 100%; height: 20px; background: #f0f0f0; border: 1px solid #ccc;">
                            <div id="spwai-progress" style="width: 0%; height: 100%; background: green;"></div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <button id="spwai-start-generation" style="margin-top: 20px;">Start</button>
            </div>
        </div>`;

        $('body').append(popupHtml);

        // Remove a product from the list
        $('#bulk-titles-list').on('click', '.ntdelbutton', function () {
            const productId = $(this).attr('id');
            selectedProducts = selectedProducts.filter((product) => product.id !== productId);
            $(this).closest('li').remove();
        });

        // Close popup
        $('#spwai-close-popup').on('click', function () {
            $('#spwai-popup-overlay').remove();
        });

        $('#spwai-start-generation').on('click', function () {
            if (selectedProducts.length === 0) {
                alert('No products selected.');
                return;
            }
        
            // Collect selected fields
            let selectedFields = [];
            if ($('#generate-title').is(':checked')) {
                selectedFields.push('title');
            }
            if ($('#generate-description').is(':checked')) {
                selectedFields.push('description');
            }
            if ($('#generate-short-description').is(':checked')) {
                selectedFields.push('shortdescription');
            }
        
            if (selectedFields.length === 0) {
                alert('Please select at least one field to generate.');
                return;
            }
        
            // Hide start button and display loading icon
            const startButton = $(this);
            startButton.hide();
            $('#spwai-progress-bar').after('<div id="loading-icon" style="margin-top: 10px;"><img src="' + spwai_vars.loadingGif + '" alt="Loading..."></div>');
        
            // Prepare data for AJAX
            const total = selectedProducts.length;
            let completed = 0;
        
            // Initialize failed products object
            let failedProducts = {
                noContent: [],
                insufficientContent: [],
                apiErrors: [],
                timeoutErrors: [], // Add timeoutErrors to track 504 errors
                missingUPC: [] // Add missingUPC to track products without UPC
            };
        
            $('#spwai-progress').css('width', '0%'); // Reset progress bar
            $('#spwai-completion-message').remove(); // Remove any previous message
            $('#spwai-progress-bar').after('<div id="spwai-completion-message" style="margin-top: 10px;"></div>'); // Placeholder for messages
        
            // Process products in batches
            const batchSize = 5; // Reduce batch size to avoid overloading the server
            let batchIndex = 0;
        
            function processBatch() {
                const batch = selectedProducts.slice(batchIndex * batchSize, (batchIndex + 1) * batchSize);
                if (batch.length === 0) {
                    return;
                }
        
                const promises = batch.map((product) => {
                    const promptField = $('#spwai-prompt-field').val();
        
                    return new Promise((resolve) => {
                        // Fetch product content dynamically
                        getProductContent(product.id, promptField, function (productContent) {
                            if (productContent && productContent.error === '504_timeout') {
                                console.warn(`Product ${product.name} skipped: Cloudflare 504 Timeout.`);
                                $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                failedProducts.timeoutErrors.push(product.name);
                                updateProgress();
                                resolve();
                                return;
                            }

                            if (promptField === 'upc' && !productContent) {
                                console.warn(`Product ${product.name} skipped: Missing UPC.`);
                                $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                failedProducts.missingUPC.push(product.name);
                                updateProgress();
                                resolve();
                                return;
                            }
        
                            if (typeof productContent === 'undefined' || !productContent) {
                                console.warn(`Product ${product.name} skipped: No content retrieved for field '${promptField}'.`);
                                $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                failedProducts.noContent.push(product.name);
                                $('#failure-no-content span').text(failedProducts.noContent.length);
                                updateProgress();
                                resolve();
                                return;
                            }
        
                            if (productContent.split(' ').length < 2) {
                                console.warn(`Product ${product.name} skipped: Insufficient content.`);
                                $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                failedProducts.insufficientContent.push(product.name);
                                $('#failure-insufficient-content span').text(failedProducts.insufficientContent.length);
                                updateProgress();
                                resolve();
                                return;
                            }
        
                            // Send AJAX for valid products
                            $.ajax({
                                type: 'POST',
                                url: spwai_vars.ajaxurl,
                                data: {
                                    action: 'handle_bulk_generate',
                                    options: JSON.stringify({
                                        productId: product.id,
                                        selectedFields: selectedFields,
                                        promptField: promptField,
                                    }),
                                    security: spwai_vars.nonce,
                                },
                                success: function (response) {
                                    if (response.success) {
                                        logToConsole(`Product ${product.name} processed successfully.`);
                                        completed++;
                                        $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#d4edda');
                                    } else {
                                        console.warn(`Product ${product.name} failed from backend: ${response.data.message || 'Unknown error'}`);
                                        $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                        if (response.data.failures && response.data.failures.api_error) {
                                            failedProducts.apiErrors.push({ name: product.name, message: response.data.failures.error_message });
                                            $('#failure-api-error span').text(failedProducts.apiErrors.length);
                                        }
                                        if (response.data.failures.no_content) {
                                            failedProducts.noContent.push(product.name);
                                            $('#failure-no-content span').text(failedProducts.noContent.length);
                                        }
                                        if (response.data.failures.insufficient_content) {
                                            failedProducts.insufficientContent.push(product.name);
                                            $('#failure-insufficient-content span').text(failedProducts.insufficientContent.length);
                                        }
                                    }
                                    updateProgress();
                                    resolve();
                                },
                                error: function (xhr, status, error) {
                                    logToErrorLog(`Product ${product.name} encountered an AJAX error: ${error}`);
                                    const apiErrorMessage = `API Error: ${error || 'Unknown error'} on product ${product.name}`;
                                    $('#failure-api-error').append(`<p style="margin: 0; color: black;">${apiErrorMessage}</p>`);
                                    failedProducts.apiErrors.push({ name: product.name, message: error });
                                    $('#failure-api-error span').text(failedProducts.apiErrors.length);
                                    $(`#bulk-titles-list button#${product.id}`).closest('li').css('background-color', '#f8d7da');
                                    updateProgress();
                                    resolve();
                                }
                            });
                        });
                    });
                });
        
                Promise.all(promises).then(() => {
                    batchIndex++;
                    if (batchIndex * batchSize < total) {
                        setTimeout(processBatch, 3000); // Delay between batches to avoid server overload
                    } else {
                        updateProgress();
                    }
                });
            }
        
            processBatch();
        
            function updateProgress() {
                const totalProcessed = completed + failedProducts.noContent.length + failedProducts.insufficientContent.length + failedProducts.apiErrors.length + failedProducts.timeoutErrors.length + failedProducts.missingUPC.length;
                const progress = Math.round((totalProcessed / total) * 100);
                $('#spwai-progress').css('width', `${progress}%`);
        
                if (totalProcessed === total) {
                    logToConsole("All products processed.");
                    let successMessage = `<p style="color: green;"><b>Number of Completed Products: ${completed}</b></p>`;
                    let skippedMessage = "";
                    if (failedProducts.noContent.length > 0 || failedProducts.insufficientContent.length > 0 || failedProducts.missingUPC.length > 0) {
                        const skippedCount = failedProducts.noContent.length + failedProducts.insufficientContent.length + failedProducts.missingUPC.length;
                        skippedMessage = `<p style="color: red;"><b>Number of Products Skipped: ${skippedCount}</b></p>`;
                        if (failedProducts.noContent.length > 0) {
                            skippedMessage += `<p style="margin-bottom: 0px;"><b>Skipped due to missing content:</b></p>`;
                            skippedMessage += failedProducts.noContent.map(name => `<p style="margin-top: 0px; margin-bottom: 0px; color: black; margin-left: 10px;">- ${name}</p>`).join('');
                        }
                        if (failedProducts.insufficientContent.length > 0) {
                            skippedMessage += `<p style="margin-bottom: 0px;"><b>Skipped due to insufficient content:</b></p>`;
                            skippedMessage += failedProducts.insufficientContent.map(name => `<p style="margin-top: 0px; margin-bottom: 0px; color: black; margin-left: 10px;">- ${name}</p>`).join('');
                        }
                        if (failedProducts.missingUPC.length > 0) {
                            skippedMessage += `<p style="margin-bottom: 0px;"><b>Skipped due to missing UPC:</b></p>`;
                            skippedMessage += failedProducts.missingUPC.map(name => `<p style="margin-top: 0px; margin-bottom: 0px; color: black; margin-left: 10px;">- ${name}</p>`).join('');
                        }
                    }
                    let apiErrorMessage = "";
                    if (failedProducts.apiErrors.length > 0) {
                        const groupedApiErrors = failedProducts.apiErrors.reduce((acc, { name, message }) => {
                            const cleanedMessage = message.replace(/API Error: /g, '').trim();
                            if (!acc[cleanedMessage]) {
                                acc[cleanedMessage] = [];
                            }
                            acc[cleanedMessage].push(name);
                            return acc;
                        }, {});
                        apiErrorMessage = `<p style="color: red;margin-bottom: 0px;"><b>Number of API Errors: ${failedProducts.apiErrors.length}</b></p>`;
                        Object.keys(groupedApiErrors).forEach(errorMessage => {
                            apiErrorMessage += `<p style="color: red;"><b>Skipped due to API Error: ${errorMessage}</b></p>`;
                            apiErrorMessage += groupedApiErrors[errorMessage].map(name => `<p style="margin-top: 0px; margin-bottom: 0px; color: black; margin-left: 10px;">- ${name}</p>`).join('');
                        });
                    }
                    let timeoutErrorMessage = "";
                    if (failedProducts.timeoutErrors.length > 0) {
                        timeoutErrorMessage = `<p style="color: red;margin-bottom: 0px;"><b>Number of Timeout Errors: ${failedProducts.timeoutErrors.length}</b></p>`;
                        timeoutErrorMessage += failedProducts.timeoutErrors.map(name => `<p style="margin-top: 0px; margin-bottom: 0px; color: black; margin-left: 10px;">- ${name}</p>`).join('');
                    }
                    const finalMessage = successMessage + skippedMessage + apiErrorMessage + timeoutErrorMessage;
                    $('#spwai-completion-message').html(finalMessage);
                    startButton.show();
                    $('#loading-icon').remove();
                }
            }
        });
        
        function getProductContent(productId, promptField, callback, retries = 3) {
            $.ajax({
                type: 'POST',
                url: spwai_vars.ajaxurl,
                data: {
                    action: 'get_product_field',
                    productId: productId,
                    field: promptField,
                    security: spwai_vars.nonce,
                },
                success: function (response) {
                    if (response.success && response.data && response.data.content) {
                        let content = response.data.content;
                        if (promptField === 'upc') {
                            content += ' - this is upc';
                        }
                        logToConsole(`Fetched content for product ${productId}, field '${promptField}': ${content}`);
                        callback(content);
                    } else {
                        console.warn(`Failed to fetch content for product ${productId}, field '${promptField}':`, response.message || "No content found");
                        callback(null);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 504) {
                        console.error(`Product ${productId} failed due to Cloudflare 504 Timeout.`);
                        callback({ error: '504_timeout' });
                    } else if (retries > 0) {
                        logToErrorLog(`Retrying... (${3 - retries + 1})`);
                        setTimeout(() => getProductContent(productId, promptField, callback, retries - 1), 2000); // Exponential backoff
                    } else {
                        logToErrorLog(`AJAX error while fetching content for product ${productId}, field '${promptField}'`);
                        callback(null);
                    }
                },
            });
        }

    });
});

// settings tab switch
jQuery(document).ready(function ($) {
    $('.nav-tab').click(function (e) {
        e.preventDefault();
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');

        $('.spwai-tab-content').hide();
        $($(this).attr('href')).show();
    });
});