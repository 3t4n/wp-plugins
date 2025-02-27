jQuery(document).ready(function($) { 

    function digagespopcopybank() {
        
// Function to initialize the copybank functionality
function initializecopybankFunction() {
    
    const copybankContainers = document.querySelectorAll('.digagescopybank-container'); 

    if (copybankContainers.length === 0) {
        return;
    }

    copybankContainers.forEach(container => {
        const copybankButton = container.querySelector('.digagescopybank-button'); // Update if needed to match your button class
        const textTocopybank = container.querySelector('.digagestext-to-copybank'); // Update if needed to match your text class

        if (!copybankButton || !textTocopybank) {
            return;
        }
        // Adding click event to copybank button
        copybankButton.addEventListener('click', () => { 

            const text = textTocopybank.textContent.trim(); // Ensure no extra spaces 

            // Ensure text is available before proceeding
            if (text.length === 0) { 
                return;
            }

            // Try using navigator.clipboard first
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => { 
                    showcopybankSuccess(copybankButton);
                }).catch(err => {
                    fallbackcopybank(text, copybankButton);
                });
            } else {
                // If navigator.clipboard is not supported, fallback to execCommand
                fallbackcopybank(text, copybankButton);
            }
        });
    });
}

// Fallback function using execCommand
function fallbackcopybank(text, button) {
    let tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    try {
        const successful = document.execCommand('copybank');
        if (successful) { 
            showcopybankSuccess(button);
        } else {
        }
    } catch (err) {
    }
    document.body.removeChild(tempInput);
}

// Function to show success feedback
function showcopybankSuccess(button) {
    const originalContent = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>';
    setTimeout(() => {
        button.innerHTML = originalContent;
    }, 2000);
}

// Function to continuously check for the digagescopybank-container class
function checkForcopybankContainer() {
    const checkExist = setInterval(() => {
        const container = document.querySelector('.digagescopybank-container');
        if (container) {
            initializecopybankFunction();
            clearInterval(checkExist); // Stop checking after detection
        }
    }, 500); // Check every 500 milliseconds
}

// Start checking when the page loads
checkForcopybankContainer();
       
        
        
    }

    
        // Call a function that does something
        digagespopcopybank();


   // Function to trigger click and run main function
   function triggerClickAndRunzz() {
    
    $('.your-button-classs').trigger('click');
    digagespopcopybank();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRunzz, 3000); 

});





