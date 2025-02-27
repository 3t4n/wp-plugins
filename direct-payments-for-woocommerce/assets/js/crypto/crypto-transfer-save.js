jQuery(document).ready(function($) {
    //console.log('crypto loaded');
    // Modal controls
    function toggleModal(show, action, index = null) {
     $('#add_account_modal').toggle(show);
     $('#save_account_button').data('action', action).data('index', index);
     if (show && action === 'add') {
         $('#add_account_modal form')[0].reset(); // Reset form for adding new account
     }
 }
     // Handle checkbox changes for enabling/disabling Cryptocurrencys
     $('input[type="checkbox"][name="status"]').on('change', function() {
         var $checkbox = $(this);
         var accountIndex = $checkbox.data('account');
         var isEnabled = $checkbox.is(':checked') ? 1 : 0;
 
         // AJAX request to toggle the Cryptocurrency status
         $.ajax({
             url: cryptoTransferData.ajaxUrl, // Use localized AJAX URL
             method: 'POST',
             data: {
                 action: 'toggle_crypto_account_status',
                 crypto_transfer_nonce: cryptoTransferData.nonce, // Use localized nonce
                 index: accountIndex,
                 enabled: isEnabled
             },
             success: function(response) {
                 if (response.success) {
                     alert('Cryptocurrency status updated successfully.');
                 } else {
                     alert('Failed to update Cryptocurrency status: ' + response.data.message);
                 }
             },
             error: function() {
                 alert('An error occurred while updating the Cryptocurrency status.');
             }
         });
     });
 
     // Populate form fields with account data for editing
     function populateForm(account) {
         $('#crypto_name').val(account.crypto_name);
         $('#account_name').val(account.account_name);
         $('#phone_number').val(account.phone_number); 
     }
 
     // Client-side form validation
     function validateForm() {
         const requiredFields = ['#crypto_name', '#account_name', '#phone_number'];
         let isValid = true;
         requiredFields.forEach(function(field) {
             if (!$(field).val()) {
                 isValid = false;
                 alert('Please fill in all required fields: crypto Name, Account Name, and Account Number.');
             }
         });
         return isValid;
     }
 
     // Save account via AJAX
     function saveAccount(action, index) {
         const accountData = {
             action: action === 'edit' ? 'edit_crypto_account' : 'save_crypto_account',
             crypto_name: $('#crypto_name').val(),
             account_name: $('#account_name').val(),
             phone_number: $('#phone_number').val(), 
             index: index,
             crypto_transfer_nonce: cryptoTransferData.nonce // Use localized nonce
         };
 
         $.post(cryptoTransferData.ajaxUrl, accountData, function(response) {
             if (response.success) {
                 alert('Cryptocurrency saved successfully.');
                 location.reload(); // Reload page to refresh the account list
             } else {
                 alert('An error occurred while saving the Cryptocurrency: ' + response.data.message);
             }
         });
     }
 
     // Delete account via AJAX
     function deleteAccount(index) {
         const accountData = {
             action: 'delete_crypto_account',
             index: index,
             crypto_transfer_nonce: cryptoTransferData.nonce // Use localized nonce
         };
 
         $.post(cryptoTransferData.ajaxUrl, accountData, function(response) {
             if (response.success) {
                 alert('Cryptocurrency deleted successfully.');
                 location.reload(); // Reload page to refresh the account list
             } else {
                 alert('An error occurred while deleting the Cryptocurrency: ' + response.data.message);
             }
         });
     }
 
     // Event handlers
     $('#add_account_button').on('click', function() {
         toggleModal(true, 'add'); // Show modal for adding a new account
     });
 
     $(document).on('click', '.edit-account', function() {
         const index = $(this).data('index');
         populateForm(savedcryptoAccounts[index]);
         toggleModal(true, 'edit', index); // Show modal for editing the account
     });
 
     $('#save_account_button').on('click', function() {
         if (validateForm()) {
             const action = $(this).data('action');
             const index = $(this).data('index');
             saveAccount(action, index);
             toggleModal(false); // Hide modal after saving
         }
     });
 
     $(document).on('click', '.delete-account', function() {
         const index = $(this).data('index');
         if (confirm('Are you sure you want to delete this Cryptocurrency?')) {
             deleteAccount(index); // Delete account
         }
     });
 });
 