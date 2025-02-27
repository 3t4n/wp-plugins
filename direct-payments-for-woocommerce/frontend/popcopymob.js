jQuery(document).ready(function($) { 

    function digagesmobpopcopy() {
        
// Function to initialize the copy functionality
function initializeCopyFunctionmob() {
    
    const copyContainersmob = document.querySelectorAll('.digagesmobcopy-container'); 

    if (copyContainersmob.length === 0) {
        return;
    }

    copyContainersmob.forEach(container => {
        const copyButtonmob = container.querySelector('.digagesmobcopy-button'); // Update if needed to match your button class
        const textToCopymob = container.querySelector('.digagesmobtext-to-copy'); // Update if needed to match your text class

        if (!copyButtonmob || !textToCopymob) {
            return;
        }
        // Adding click event to copy button
        copyButtonmob.addEventListener('click', () => { 

            const text = textToCopymob.textContent.trim(); // Ensure no extra spaces 

            // Ensure text is available before proceeding
            if (text.length === 0) { 
                return;
            }

            // Try using navigator.clipboard first
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => { 
                    showCopySuccessmob(copyButtonmob);
                }).catch(err => {
                    fallbackCopymob(text, copyButtonmob);
                });
            } else {
                // If navigator.clipboard is not supported, fallback to execCommand
                fallbackCopymob(text, copyButtonmob);
            }
        });
    });
}

// Fallback function using execCommand
function fallbackCopymob(text, button) {
    let tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    try {
        const successful = document.execCommand('copy');
        if (successful) { 
            showCopySuccessmob(button);
        } else {
        }
    } catch (err) {
    }
    document.body.removeChild(tempInput);
}

// Function to show success feedback
function showCopySuccessmob(button) {
    const originalContent = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>';
    setTimeout(() => {
        button.innerHTML = originalContent;
    }, 2000);
}

// Function to continuously check for the digagesmobcopy-container class
function checkForCopyContainermob() {
    const checkExist = setInterval(() => {
        const container = document.querySelector('.digagesmobcopy-container');
        if (container) {
            initializeCopyFunctionmob();
            clearInterval(checkExist); // Stop checking after detection
        }
    }, 500); // Check every 500 milliseconds
}

// Start checking when the page loads
checkForCopyContainermob();
       
        
        
    }

    
        // Call a function that does something
        digagesmobpopcopy();


   // Function to trigger click and run main function
   function triggerClickAndRunzz() {
    
    $('.your-button-classs').trigger('click');
    digagesmobpopcopy();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRunzz, 3000); 

});





