jQuery(document).ready(function($) {
    // Modal controls
    function toggleModal(show, action, index = null) {
     $('#add_account_modal').toggle(show);
     $('#save_account_button').data('action', action).data('index', index);
     if (show && action === 'add') {
         $('#add_account_modal form')[0].reset(); // Reset form for adding new account
     }
 }
     // Handle checkbox changes for enabling/disabling mobile accounts
     $('input[type="checkbox"][name="status"]').on('change', function() {
         var $checkbox = $(this);
         var accountIndex = $checkbox.data('account');
         var isEnabled = $checkbox.is(':checked') ? 1 : 0;
 
         // AJAX request to toggle the mobile account status
         $.ajax({
             url: mobileTransferData.ajaxUrl, // Use localized AJAX URL
             method: 'POST',
             data: {
                 action: 'toggle_mobile_account_status',
                 mobile_transfer_nonce: mobileTransferData.nonce, // Use localized nonce
                 index: accountIndex,
                 enabled: isEnabled
             },
             success: function(response) {
                 if (response.success) {
                     alert('Mobile account status updated successfully.');
                 } else {
                     alert('Failed to update mobile account status: ' + response.data.message);
                 }
             },
             error: function() {
                 alert('An error occurred while updating the mobile account status.');
             }
         });
     });
 
     // Populate form fields with account data for editing
     function populateForm(account) {
         $('#mobile_name').val(account.mobile_name);
         $('#account_name').val(account.account_name);
         $('#phone_number').val(account.phone_number); 
     }
 
     // Client-side form validation
     function validateForm() {
         const requiredFields = ['#mobile_name', '#account_name', '#phone_number'];
         let isValid = true;
         requiredFields.forEach(function(field) {
             if (!$(field).val()) {
                 isValid = false;
                 alert('Please fill in all required fields: mobile Name, Account Name, and Account Number.');
             }
         });
         return isValid;
     }
 
     // Save account via AJAX
     function saveAccount(action, index) {
         const accountData = {
             action: action === 'edit' ? 'edit_mobile_account' : 'save_mobile_account',
             mobile_name: $('#mobile_name').val(),
             account_name: $('#account_name').val(),
             phone_number: $('#phone_number').val(), 
             index: index,
             mobile_transfer_nonce: mobileTransferData.nonce // Use localized nonce
         };
 
         $.post(mobileTransferData.ajaxUrl, accountData, function(response) {
             if (response.success) {
                 alert('Mobile account saved successfully.');
                 location.reload(); // Reload page to refresh the account list
             } else {
                 alert('An error occurred while saving the mobile account: ' + response.data.message);
             }
         });
     }
 
     // Delete account via AJAX
     function deleteAccount(index) {
         const accountData = {
             action: 'delete_mobile_account',
             index: index,
             mobile_transfer_nonce: mobileTransferData.nonce // Use localized nonce
         };
 
         $.post(mobileTransferData.ajaxUrl, accountData, function(response) {
             if (response.success) {
                 alert('mobile account deleted successfully.');
                 location.reload(); // Reload page to refresh the account list
             } else {
                 alert('An error occurred while deleting the mobile account: ' + response.data.message);
             }
         });
     }
 
     // Event handlers
     $('#add_account_button').on('click', function() {
         toggleModal(true, 'add'); // Show modal for adding a new account
     });
 
     $(document).on('click', '.edit-account', function() {
         const index = $(this).data('index');
         populateForm(savedmobileAccounts[index]);
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
         if (confirm('Are you sure you want to delete this mobile account?')) {
             deleteAccount(index); // Delete account
         }
     });
 });
 