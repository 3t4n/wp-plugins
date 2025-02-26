jQuery(document).ready(function($) {
    var debounceTimeout;

    $('#ajax-search-input').on('keyup', function() {
        var query = $(this).val();
        var postType = $('#ajax-search-post-type').val(); // Get the dynamic post type from the hidden input field
console.log(postType);
        clearTimeout(debounceTimeout); // Clear any previous timeout
        
        if (query.length >= 3) { // Trigger search after 3 characters
            debounceTimeout = setTimeout(function() {
                $.ajax({
                    url: ajaxsearch.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'ajax_search',
                        query: query,
                        post_type: postType // Send the post type in the AJAX request
                    },
                    success: function(response) {
                        if (response.success) {
                            var results = response.data;
                            var output = '<div>';
                            $.each(results, function(index, result) {
                                output += '<ul><li class="imgboxsearchresult"><img src="'+result.postimg+'" class="post-image" /></li>'
                                output += '<li class="contentboxsearchresult"><a href="' + result.url + '">' + result.title + '</a><p>' + result.excerpt + '</p><div class="viewmorebtnbox"><a class="viewbtnajaxsearch" href="' + result.url + '">View →</a></div></li></ul>';
                                output += '';
                            });
                            output += '</div>';
                            $('#ajax-search-results').html(output).css('display','block');
                        } else {
                            $('#ajax-search-results').html('<p>' + response.data.message + '</p>');
                            $('#ajax-search-results').css('display','block');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#ajax-search-results').html('<p>Error: ' + error + '</p>');
                    }
                });
            }, 500); // 500ms delay before sending the request
        } else {
            $('#ajax-search-results').html('');
            $('#ajax-search-results').css('display','none');
        }
    });
});