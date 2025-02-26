jQuery(document).ready(function ($) {
    // Function to handle AJAX request for updating content
    $('.easy-resource-hub').each(function () {
        var $hub = $(this);
        var instanceId = $hub.attr('id'); // Get the instance ID
        var postTypes = $hub.data('post-types'); // Fetching postTypes for this instance

        function updateResourceHubContent(paged = 1) {
            var itemsPerPage = $hub.data('items-per-page');
            var selectedTaxonomies = {};
            var acfFieldName = $hub.data('acf-field');
            var wckFieldName = $hub.data('wck-field');
            // Gather selected taxonomy terms from filters
            $hub.find('.erh-taxonomy-filter').each(function () {
                var taxonomy = $(this).data('taxonomy');
                var terms = $(this).val();
                // For single select, wrap the term in an array
                if (terms && !Array.isArray(terms)) {
                    terms = [terms];
                }
                // Check if terms are selected or if the default option is selected
                if (terms && terms.length > 0 && terms[0] !== '') {
                    selectedTaxonomies[taxonomy] = terms;
                }
            });

            // AJAX request
            $.ajax({
                url: erhcav_ajax.ajax_url, // This variable should be localized in PHP using wp_localize_script
                type: 'POST',
                data: {
                    'action': 'erhcav_fetch_content', // The action hook for AJAX in PHP
                    'nonce': erhcav_ajax.nonce,       // Nonce for security, localized in PHP
                    'post_types': postTypes, // Pass post type
                    'taxonomies': selectedTaxonomies, // Taxonomy data
                    'items_per_page': itemsPerPage,
                    'paged': paged,
                    'acf_image_field': acfFieldName,
                    'wck_image_field': wckFieldName,
                    'instance_id': instanceId // Pass the instance ID

                },
                success: function (response) {
                    // Update the content area with the response
                    // $('#erh-content-area').html(response);
                    $hub.find('.erh-content-area').html(response);
                },
                error: function () {
                    // Error handling
                    $hub.find('.erh-content-area').html('<p>There was an error processing your request.</p>');

                }
            });
        }

        // Event listener for taxonomy filter changes
        $hub.find('.erh-taxonomy-filter').on('change', function () {
            updateResourceHubContent();
        });


        //
        $('.erh-taxonomy-filters-left select[multiple]').each(function () {
            var select = $(this);
            var numberOfOptions = select.find('option').length;

            // Set height based on the number of options
            var optionHeight = 21; // Height of one option, adjust as needed
            var calculatedHeight = (1 + numberOfOptions) * optionHeight;
            select.css('height', calculatedHeight + 'px');
        });
        // Handle pagination click

        $hub.on('click', '.erh-pagination a', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var pageMatch = href.match(/page\/(\d+)(\/)?/); // Regex to match with and without trailing slash
            var page = pageMatch ? pageMatch[1] : 1; // Default to page 1 if no match

            updateResourceHubContent(page);
        });

        updateResourceHubContent();
    });
});


