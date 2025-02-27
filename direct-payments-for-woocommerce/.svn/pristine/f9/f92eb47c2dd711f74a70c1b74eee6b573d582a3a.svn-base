jQuery(document).ready(function($) { 

    function digagespopcopy() { 
// Function to initialize the copy functionality

        // Listen for when the modal is shown
        $('#exampleModal').on('shown.bs.modal', function() {
            // Attach the click event to the close icon once the modal is visible
            $('#tumaz_closeModalIcon').on('click', function(event) {
                // Prevent default behavior
                event.preventDefault();
                // Show confirmation before closing
                if (confirm("Do you want to close this payment?")) {
                    // Hide the modal using Bootstrap's modal function
                    $('#exampleModal').modal('hide');
                }
            });
        });
    
    }
 
        // Call a function that does something
        digagespopcopy();


   // Function to trigger click and run main function
   function triggerClickAndRunzz() {
    $('.your-button-classsw').trigger('click');
    digagespopcopy();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRunzz, 3000); 

});





