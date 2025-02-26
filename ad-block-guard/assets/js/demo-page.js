document.addEventListener('DOMContentLoaded', function () {
    const demoForms = document.querySelectorAll('.adblock-demo-form');
    
    // Get the current count of how many times the message has been shown
    let messageCount = sessionStorage.getItem('demoMessageCount') || 0;
    
    demoForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            // Allow only if messageCount is less than 3
            if (messageCount < 5) {
                const button = form.querySelector('button[type="submit"]');
                const allowClose = button.getAttribute('data-allow-close') === 'no';
                
                if (allowClose) {
                    e.preventDefault(); // Prevent the default submission
                    
                    // Show SweetAlert2 modal
                    Swal.fire({
                        title: wp.i18n.__('Reminder', 'ad-block-guard'),
                        text: wp.i18n.__('In this demo, the close button is always enabled to avoid locking you in. Website visitors won\'t have this option. Disable this reminder in [Advanced Settings].', 'ad-block-guard'),
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: wp.i18n.__('Got it', 'ad-block-guard'),
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if the user confirms
                            
                            // Increment the message count and store it in sessionStorage
                            messageCount++;
                            sessionStorage.setItem('demoMessageCount', messageCount);
                        }
                    });
                }
            } else {
                // If the message has been shown 3 times, just submit the form without showing the message
                form.submit();
            }
        });
    });
});



