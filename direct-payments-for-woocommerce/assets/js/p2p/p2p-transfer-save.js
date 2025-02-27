jQuery(document).ready(function($) {
   // Modal controls
   function toggleModal(show, action, index = null) {
    $('#add_account_modal').toggle(show);
    $('#save_account_button').data('action', action).data('index', index);
    if (show && action === 'add') {
        $('#add_account_modal form')[0].reset(); // Reset form for adding new account
    }
}
    // Handle checkbox changes for enabling/disabling P2P accounts
    $('input[type="checkbox"][name="status"]').on('change', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the P2P account status
        $.ajax({
            url: p2pTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_p2p_account_status',
                p2p_transfer_nonce: p2pTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('P2P account status updated successfully.');
                } else {
                    alert('Failed to update P2P account status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the P2P account status.');
            }
        });
    });

    // Populate form fields with account data for editing
    function populateForm(account) {
        $('#p2p_name').val(account.p2p_name);
        $('#account_name').val(account.account_name);
        $('#account_id').val(account.account_id);
        $('#account_type').val(account.account_type); 
    }

    // Client-side form validation
    function validateForm() {
        const requiredFields = ['#p2p_name', '#account_name', '#account_id'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: P2P Platform, Account Name, and ID.');
            }
        });
        return isValid;
    }

    // Save account via AJAX
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_p2p_account' : 'save_p2p_account',
            p2p_name: $('#p2p_name').val(),
            account_name: $('#account_name').val(),
            account_id: $('#account_id').val(),
            account_type: $('#account_type').val(), 
            index: index,
            p2p_transfer_nonce: p2pTransferData.nonce // Use localized nonce
        };

        $.post(p2pTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('P2P account saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the P2P account: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_p2p_account',
            index: index,
            p2p_transfer_nonce: p2pTransferData.nonce // Use localized nonce
        };

        $.post(p2pTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('P2P account deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the P2P account: ' + response.data.message);
            }
        });
    }

    // Event handlers
    $('#add_account_button').on('click', function() {
        toggleModal(true, 'add'); // Show modal for adding a new account
    });

    $(document).on('click', '.edit-account', function() {
        const index = $(this).data('index');
        populateForm(savedp2pAccounts[index]);
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
        if (confirm('Are you sure you want to delete this P2P account?')) {
            deleteAccount(index); // Delete account
        }
    });
});
