jQuery(document).ready(function($) {
   // Modal controls
   function toggleModal(show, action, index = null) {
    $('#add_account_modal').toggle(show);
    $('#save_account_button').data('action', action).data('index', index);
    if (show && action === 'add') {
        $('#add_account_modal form')[0].reset(); // Reset form for adding new account
    }
}
    // Handle checkbox changes for enabling/disabling bank accounts
    $('input[type="checkbox"][name="status"]').on('change', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the bank account status
        $.ajax({
            url: bankTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_bank_account_status',
                bank_transfer_nonce: bankTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('Bank account status updated successfully.');
                } else {
                    alert('Failed to update bank account status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the bank account status.');
            }
        });
    });

    // Populate form fields with account data for editing
    function populateForm(account) {
        $('#bank_name').val(account.bank_name);
        $('#account_name').val(account.account_name);
        $('#account_number').val(account.account_number);
        $('#sort_code').val(account.sort_code);
        $('#iban').val(account.iban);
        $('#bic_swift').val(account.bic_swift);
    }

    // Client-side form validation
    function validateForm() {
        const requiredFields = ['#bank_name', '#account_name', '#account_number'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: Bank Name, Account Name, and Account Number.');
            }
        });
        return isValid;
    }

    // Save account via AJAX
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_bank_account' : 'save_bank_account',
            bank_name: $('#bank_name').val(),
            account_name: $('#account_name').val(),
            account_number: $('#account_number').val(),
            sort_code: $('#sort_code').val(),
            iban: $('#iban').val(),
            bic_swift: $('#bic_swift').val(),
            index: index,
            bank_transfer_nonce: bankTransferData.nonce // Use localized nonce
        };

        $.post(bankTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Bank account saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the bank account: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_bank_account',
            index: index,
            bank_transfer_nonce: bankTransferData.nonce // Use localized nonce
        };

        $.post(bankTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Bank account deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the bank account: ' + response.data.message);
            }
        });
    }

    // Event handlers
    $('#add_account_button').on('click', function() {
        toggleModal(true, 'add'); // Show modal for adding a new account
    });

    $(document).on('click', '.edit-account', function() {
        const index = $(this).data('index');
        populateForm(savedBankAccounts[index]);
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
        if (confirm('Are you sure you want to delete this bank account?')) {
            deleteAccount(index); // Delete account
        }
    });
});
