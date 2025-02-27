jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data
    function populateEditForm(account) {
        $('#edit_crypto_name').val(account.crypto_name);
        $('#edit_account_name').val(account.account_name);
        $('#edit_phone_number').val(account.phone_number);
        $('#edit_sort_code').val(account.sort_code);
        $('#edit_iban').val(account.iban);
        $('#edit_bic_swift').val(account.bic_swift);
    }

    // Event handler for opening the edit modal
    $(document).on('click', '.edit-account', function() {
        var savedcryptoAccounts = JSON.parse(crypto_transfer_object.savedcryptoAccounts); 
        const index = $(this).data('index');
        populateEditForm(savedcryptoAccounts[index]);  // Populate the form with the account data
        $('#edit_account_button').data('index', index);  // Store the index in the button for later use
    });

    // Event handler for saving the edited account
    $('#edit_account_button').on('click', function() {
        const index = $(this).data('index');
        const editedAccountData = {
            action: 'edit_crypto_account',
            crypto_name: $('#edit_crypto_name').val(),
            account_name: $('#edit_account_name').val(),
            phone_number: $('#edit_phone_number').val(), 
            index: index,
            crypto_transfer_nonce: $('#crypto_transfer_nonce').val()
        };

        // Send the edited data via AJAX
        $.post(ajaxurl, editedAccountData, function(response) {
            if (response.success) {
                alert('Cryptocurrency updated successfully.');
                location.reload();  // Reload to update the account list
            } else {
                alert('An error occurred while updating the account.');
            }
        });
    });
});