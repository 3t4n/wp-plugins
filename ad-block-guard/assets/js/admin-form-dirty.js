// Remind user to save form if they made changes
// This function tracks changes to form inputs and warns the user if they attempt to leave the page
// without saving. It resets the warning state when the form is submitted.
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Replace with the specific form selector if needed
    let isFormDirty = false;

    // Function to set the form as dirty when a change is detected
    function setFormDirty() {
        console.log('Form marked as dirty.');
        isFormDirty = true;
    }

    // Attach change and input event listeners to standard form inputs
    function addInputListeners() {
        form.querySelectorAll('input, textarea, select').forEach(function(input) {
            input.addEventListener('change', setFormDirty);
            input.addEventListener('input', setFormDirty); // For real-time input changes
        });
    }

    // Attach listeners specifically for Carbon Fields inputs
    function addCarbonFieldsListeners() {
        form.querySelectorAll('.cf-field-url input, .cf-field-number input').forEach(function(input) {
            input.addEventListener('change', setFormDirty);
            input.addEventListener('input', setFormDirty);
        });
    }

    // Observe changes in the form for dynamically added elements
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                console.log('Detected new elements in the form.');
                addInputListeners(); // Reattach listeners for new elements
                addCarbonFieldsListeners();
            }
        });
    });

    // Start observing the form for changes
    observer.observe(form, {
        childList: true,  // Detect added/removed nodes
        subtree: true     // Monitor all descendant nodes
    });

    // Warn the user if they try to navigate away with unsaved changes
    window.addEventListener('beforeunload', function(event) {
        if (isFormDirty) {
            const confirmationMessage = __("You have unsaved changes. Are you sure you want to leave this page?", 'ad-block-guard');
            event.returnValue = confirmationMessage; // Standard for most browsers
            return confirmationMessage; // For older browsers
        }
    });

    // Reset the dirty flag when the form is submitted
    form.addEventListener('submit', function() {
        console.log('Form submitted, resetting dirty flag.');
        isFormDirty = false;
    });

    // Initialize listeners
    addInputListeners();
    addCarbonFieldsListeners();
});