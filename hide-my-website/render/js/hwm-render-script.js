jQuery(document).ready(function($) {
    // Create robots.txt
    $('#create_robots').click(function() {
        var nonce = $('#hmw_robots_nonce').val();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'hmw_create_robots',
                nonce: nonce
            },
            success: function(response) {
                if(response.success) {
                    alert('robots.txt created successfully');
                    location.reload();
                } else {
                    alert('Failed to create robots.txt: ' + response.data.message);
                }
            }
        });
    });

    // Delete robots.txt
    $('#delete_robots').click(function() {
        if(confirm('Are you sure you want to delete robots.txt?')) {
            var nonce = $('#hmw_robots_nonce').val();
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'hmw_delete_robots',
                    nonce: nonce
                },
                success: function(response) {
                    if(response.success) {
                        alert('robots.txt deleted successfully');
                        location.reload();
                    } else {
                        alert('Failed to delete robots.txt: ' + response.data.message);
                    }
                }
            });
        }
    });

//script for hwm plugin


document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('#faq-accordion .faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            // Toggle active state
            this.classList.toggle('active');
            
            // Show/Hide the answer
            const answer = this.nextElementSibling;
            if (answer.style.maxHeight) {
                answer.style.maxHeight = null; // Collapse
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px"; // Expand
            }
        });
    });
});


});
