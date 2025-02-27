jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data
    function populateEditForm(account) {
        $('#edit_bank_name').val(account.bank_name);
        $('#edit_account_name').val(account.account_name);
        $('#edit_account_number').val(account.account_number);
        $('#edit_sort_code').val(account.sort_code);
        $('#edit_iban').val(account.iban);
        $('#edit_bic_swift').val(account.bic_swift);
    }

    // Event handler for opening the edit modal
    $(document).on('click', '.edit-account', function() {
        // Ensure the savedBankAccounts data is parsed correctly from the localized object
var savedBankAccounts = JSON.parse(bank_transfer_object.savedBankAccounts); 
        const index = $(this).data('index');
        populateEditForm(savedBankAccounts[index]);  // Populate the form with the account data
        $('#edit_account_button').data('index', index);  // Store the index in the button for later use
    });

    // Event handler for saving the edited account
    $('#edit_account_button').on('click', function() {
        const index = $(this).data('index');
        const editedAccountData = {
            action: 'edit_bank_account',
            bank_name: $('#edit_bank_name').val(),
            account_name: $('#edit_account_name').val(),
            account_number: $('#edit_account_number').val(),
            sort_code: $('#edit_sort_code').val(),
            iban: $('#edit_iban').val(),
            bic_swift: $('#edit_bic_swift').val(),
            index: index,
            bank_transfer_nonce: $('#bank_transfer_nonce').val()
        };

        // Send the edited data via AJAX
        $.post(ajaxurl, editedAccountData, function(response) {
            if (response.success) {
                alert('Bank account updated successfully.');
                location.reload();  // Reload to update the account list
            } else {
                alert('An error occurred while updating the account.');
            }
        });
    });
});