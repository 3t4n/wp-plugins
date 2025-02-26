(function(){
    jQuery(document).ready(function($) {
        // Handle the page search input field
        $('#c404_search_page').on('keyup', function() {
            var searchQuery = $(this).val();
    
            // If there's no input, do nothing
            if (searchQuery.length < 2) {
                return;
            }
    
            // Send an AJAX request to search for pages
            $.ajax({
                url: c404_ajax_obj.ajax_url,
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'c404_search_pages',
                    q: searchQuery,
                    _ajax_nonce: c404_ajax_obj.nonce
                },
                success: function(response) {
                    if (response.success) {
                        // Clear the select dropdown
                        $('#c404_selected_404_page').empty();
                        
                        // Append an option for each result
                        $.each(response.data, function(index, page) {
                            $('#c404_selected_404_page').append(
                                $('<option>', {
                                    value: page.id,
                                    text: page.text
                                })
                            );
                        });
                    } else {
                        // Handle case where no results were found
                        $('#c404_selected_404_page').empty();
                        $('#c404_selected_404_page').append(
                            $('<option>', {
                                text: 'No pages found',
                                disabled: true
                            })
                        );
                    }
                },
                error: function() {
                    alert('Error retrieving pages.');
                }
            });
        });
    });     
    
})(jQuery)