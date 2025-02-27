jQuery(document).ready(function($) { 

    function digagespopcopy() {
        
// Function to initialize the copy functionality
function initializeCopyFunction() {
    
    const copyContainers = document.querySelectorAll('.digagescopy-container'); 

    if (copyContainers.length === 0) {
        return;
    }

    copyContainers.forEach(container => {
        const copyButton = container.querySelector('.digagescopy-button'); // Update if needed to match your button class
        const textToCopy = container.querySelector('.digagestext-to-copy'); // Update if needed to match your text class

        if (!copyButton || !textToCopy) {
            return;
        }
        // Adding click event to copy button
        copyButton.addEventListener('click', () => { 

            const text = textToCopy.textContent.trim(); // Ensure no extra spaces 

            // Ensure text is available before proceeding
            if (text.length === 0) { 
                return;
            }

            // Try using navigator.clipboard first
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => { 
                    showCopySuccess(copyButton);
                }).catch(err => {
                    fallbackCopy(text, copyButton);
                });
            } else {
                // If navigator.clipboard is not supported, fallback to execCommand
                fallbackCopy(text, copyButton);
            }
        });
    });
}

// Fallback function using execCommand
function fallbackCopy(text, button) {
    let tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    try {
        const successful = document.execCommand('copy');
        if (successful) { 
            showCopySuccess(button);
        } else {
        }
    } catch (err) {
    }
    document.body.removeChild(tempInput);
}

// Function to show success feedback
function showCopySuccess(button) {
    const originalContent = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>';
    setTimeout(() => {
        button.innerHTML = originalContent;
    }, 2000);
}

// Function to continuously check for the digagescopy-container class
function checkForCopyContainer() {
    const checkExist = setInterval(() => {
        const container = document.querySelector('.digagescopy-container');
        if (container) {
            initializeCopyFunction();
            clearInterval(checkExist); // Stop checking after detection
        }
    }, 500); // Check every 500 milliseconds
}

// Start checking when the page loads
checkForCopyContainer();
       
        
        
    }

    
        // Call a function that does something
        digagespopcopy();


   // Function to trigger click and run main function
   function triggerClickAndRunzz() {
    
    $('.your-button-classs').trigger('click');
    digagespopcopy();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRunzz, 3000); 

});





