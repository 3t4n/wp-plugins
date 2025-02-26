function areYouSureModal(question){
   return new Promise(function (resolve, reject) {
       var confirmationModal = document.getElementById('confirmationModal');
       var confirmModalButton = document.getElementById('confirmModalButton');
       var cancelModalButton = document.getElementById('cancelModalButton');
       var cancelModalButton = document.getElementById('cancelModalButton');
       var closeModalButton = document.getElementById('closeModalButton');

       document.getElementById('questionModalParagraph').innerText = question;


       // Display the confirmation modal with the provided message
       confirmationModal.style.display = 'block';

       // Event listener for the "Yes" button in the modal
       confirmModalButton.onclick = function () {
           closeConfirmationModal();
           resolve(true); // Resolve the promise with true when user clicks "Yes"
       };

       // Event listener for the "No" button in the modal
       cancelModalButton.onclick = function () {
           closeConfirmationModal();
           resolve(false); // Resolve the promise with false when user clicks "No"
       };

       // Event listener for the "x" button in the modal
       closeModalButton.onclick = function () {
           closeConfirmationModal();
           resolve(false); // Resolve the promise with false when user clicks "No"
       };

       // Function to close the confirmation modal
       function closeConfirmationModal() {
           confirmationModal.style.display = 'none';
       }

       // Close the modal if the user clicks outside of it
       window.onclick = function (event) {
           if (event.target == confirmationModal) {
               closeConfirmationModal();
               resolve(false); // Resolve the promise with false when user clicks outside the modal
           }
       };
   });
}

function getSubmitByElementId(elementId) {
    var spinnerHtml = '<div class="loading-overlay" id="spinner"><div class="loading-spinner"></div></div>';
    // Append the loading overlay to the body
    document.body.insertAdjacentHTML('beforeend', spinnerHtml);
    return document.getElementById(elementId).submit();
}
