/* Onlice Job Board Shortcode Js
 * 1. Use to datatable js. 
 * 2. Use to display single job data while user click on a table row. 
 */

/* 1. DataTable Initialization */

new DataTable('#wfojb-table-display', {
    scrollX: true
});

/* 1. Display Single JOb */
jQuery(document).ready(function ($) {

    $('#wfojb-table-display tbody').on('click', 'tr', function () {
        $('#loading-spinner').show();
        $('#row-data').empty();

        document.getElementById('loading-spinner').scrollIntoView({
            behavior: 'smooth'
        });

        var rowData = $(this).children('td').map(function () {
            return $(this).text();
        }).get();

        var fullContent = $(this).data('content') || ""; // Full content
        var fullAddress = $(this).data('full-address') || ""; // Full address
        var fullemail = $(this).data('full-email') || ""; // Email
        var fullphone = $(this).data('full-phone') || ""; // Phone
        var thumbnailUrl = $(this).data('thumbnail') || ""; // Thumbnail URL
        var buttonText = $(this).data('button-text') || 'Apply'; // Default button text
        var buttonUrl = $(this).data('button-url') || "#"; // Default URL

        var companyName = rowData[2] || ""; // Company Name
        var jobTitle = rowData[1] || ""; // Job Title
        var category = rowData[3] || ""; // Category
        var openings = rowData[4] || ""; // Openings
        var city = rowData[5] || ""; // City

        // Conditional HTML elements based on availability of data
        var companyNameHtml = companyName ? `<p><i class="fa-solid fa-building"></i> <strong> Company Name:</strong> ${companyName}</p>` : "";
        var jobTitleHtml = jobTitle ? `<h3>${jobTitle}</h3>` : "";
        var categoryHtml = category ? `<p><i class="fa-solid fa-folder-open"></i> <strong> Category:</strong> ${category}</p>` : "";
        var openingsHtml = openings ? `<p><i class="fa-solid fa-clipboard"></i> <strong> Openings:</strong> ${openings}</p>` : "";
        var cityHtml = city ? `<p><i class="fa-solid fa-city"></i> <strong> City:</strong> ${city}</p>` : "";
        var emailHtml = fullemail ? `<p><i class="fa-solid fa-envelope"></i> <strong> Email:</strong> ${fullemail}</p>` : "";
        var phoneHtml = fullphone ? `<p><i class="fa-solid fa-phone"></i> <strong> Phone No:</strong> ${fullphone}</p>` : "";
        var addressHtml = fullAddress ? `<p><i class="fas fa-map-marker-alt"></i> <strong> Address:</strong> ${fullAddress}</p>` : "";

        var contactFormTemplate = $('#wfojb-template-data').data('contact-template') || 'template1';
        console.log("Selected Template:", contactFormTemplate);


        // Render the corresponding template
        setTimeout(function () {
            $('#loading-spinner').hide();

            if (contactFormTemplate === 'template1') {
                // Template 1 rendering
                $('#row-data').html(`
                    <!-- for layout 1-->
                    <div class="wfojb-main" id="wfojb-details-container">              
                        <div style="display: flex;">
                            <div class="row">
                                <div class="col-md-5">
                                    <div><img src="${thumbnailUrl}" class="wfojb_logo"></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="wfojb-custom">
                                        ${jobTitleHtml} <!-- Conditionally added Job Title -->
                                        ${companyNameHtml} <!-- Conditionally added Company Name -->
                                        ${categoryHtml} <!-- Conditionally added Category -->
                                        ${openingsHtml} <!-- Conditionally added Openings -->
                                        ${cityHtml} <!-- Conditionally added City -->
                                        ${emailHtml} <!-- Conditionally added Email -->
                                        ${phoneHtml} <!-- Conditionally added Phone -->
                                        ${addressHtml} <!-- Conditionally added Address -->
                                    </div>
                                </div>
                                <div class="wfojb-custom">
                                    <p>${fullContent}</p><!-- Full content -->
                                    <a class="wfojb-button" target="_blank" href="${buttonUrl}">${buttonText}</a> <!-- Conditionally added Button -->
                                    <button type="button" class="wfojb-close" id="close-details">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>                                     
                `);

                // Add functionality for the close button
                $('#close-details').on('click', function () {
                    $('#wfojb-details-container').remove(); // Hides the details container
                });
            }

            // Scroll into view
            document.getElementById('row-data').scrollIntoView({
                behavior: 'smooth'
            });
        }, 1100);
    });
});