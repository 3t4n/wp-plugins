document.addEventListener('DOMContentLoaded', function () {
    const postTypeSelect = document.getElementById('ptenm_restaurant_reviews_post_type');
    const postIdSelect = document.getElementById('ptenm_restaurant_reviews_post_id');

    if (postTypeSelect && postIdSelect) {
        postTypeSelect.addEventListener('change', function () {
            const selectedPostType = postTypeSelect.value;

            console.log('Post type selected:', selectedPostType); // Log the selected post type

            // Clear the post ID dropdown and show loading message
            postIdSelect.innerHTML = '<option value="">' + 'Loading...' + '</option>';

            // If no post type is selected, show a message and stop
            if (!selectedPostType) {
                console.log('No post type selected.'); // Log if no post type is selected
                postIdSelect.innerHTML = '<option value="">' + 'Select a valid post type first' + '</option>';
                return;
            }

            // Fetch posts for the selected post type via AJAX
            fetch(ptenm_restaurant_reviews.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'get_posts_by_type', // Matches the action in PHP
                    post_type: selectedPostType,
                    nonce: ptenm_restaurant_reviews.nonce, // Include the nonce
                }),
            })
                .then((response) => {
                    console.log('Fetch response:', response); // Log the raw fetch response
                    return response.json();
                })
                .then((data) => {
                    console.log('Fetch data:', data); // Log the data returned by the server
                    postIdSelect.innerHTML = ''; // Clear existing options
                    if (data.success && data.data && data.data.posts && data.data.posts.length > 0) {
                        console.log('Posts found:', data.data.posts); // Log the posts array
                        data.data.posts.forEach((post) => {
                            const option = document.createElement('option');
                            option.value = post.ID;
                            option.textContent = post.title;
                            postIdSelect.appendChild(option);
                        });
                    } else {
                        console.log('No posts found for selected type:', selectedPostType); // Log no posts found
                        postIdSelect.innerHTML =
                            '<option value="">' + 'No posts found for this type' + '</option>';
                    }
                })
                .catch((error) => {
                    console.error('Error fetching posts:', error); // Log fetch errors
                    postIdSelect.innerHTML = '<option value="">' + 'Error fetching posts' + '</option>';
                });
        });
    } else {
        console.error('Post type or post ID dropdown not found in DOM.'); // Log if elements are missing
    }
});
