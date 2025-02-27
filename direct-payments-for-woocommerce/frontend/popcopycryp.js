jQuery(document).ready(function($) { 

    function digagescryppopcopy() {
        
// Function to initialize the copy functionality
function initializeCopyFunctioncryp() {
    
    const copyContainerscryp = document.querySelectorAll('.digagescrypcopy-container'); 

    if (copyContainerscryp.length === 0) {
        return;
    }

    copyContainerscryp.forEach(container => {
        const copyButtoncryp = container.querySelector('.digagescrypcopy-button'); // Update if needed to match your button class
        const textToCopycryp = container.querySelector('.digagescryptext-to-copy'); // Update if needed to match your text class

        if (!copyButtoncryp || !textToCopycryp) {
            return;
        }
        // Adding click event to copy button
        copyButtoncryp.addEventListener('click', () => { 

            const text = textToCopycryp.textContent.trim(); // Ensure no extra spaces 

            // Ensure text is available before proceeding
            if (text.length === 0) { 
                return;
            }

            // Try using navigator.clipboard first
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => { 
                    showCopySuccesscryp(copyButtoncryp);
                }).catch(err => {
                    fallbackCopycryp(text, copyButtoncryp);
                });
            } else {
                // If navigator.clipboard is not supported, fallback to execCommand
                fallbackCopycryp(text, copyButtoncryp);
            }
        });
    });
}

// Fallback function using execCommand
function fallbackCopycryp(text, button) {
    let tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    try {
        const successful = document.execCommand('copy');
        if (successful) { 
            showCopySuccesscryp(button);
        } else {
        }
    } catch (err) {
    }
    document.body.removeChild(tempInput);
}

// Function to show success feedback
function showCopySuccesscryp(button) {
    const originalContent = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>';
    setTimeout(() => {
        button.innerHTML = originalContent;
    }, 2000);
}

// Function to continuously check for the digagescrypcopy-container class
function checkForCopyContainercryp() {
    const checkExist = setInterval(() => {
        const container = document.querySelector('.digagescrypcopy-container');
        if (container) {
            initializeCopyFunctioncryp();
            clearInterval(checkExist); // Stop checking after detection
        }
    }, 500); // Check every 500 milliseconds
}

// Start checking when the page loads
checkForCopyContainercryp();
       
        
        
    }

    
        // Call a function that does something
        digagescryppopcopy();


   // Function to trigger click and run main function
   function triggerClickAndRunzz() {
    
    $('.your-button-classs').trigger('click');
    digagescryppopcopy();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRunzz, 3000); 

});





