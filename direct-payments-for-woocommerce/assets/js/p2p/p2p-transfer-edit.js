jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data
    function populateEditForm(account) {
        $('#edit_p2p_name').val(account.p2p_name);
        $('#edit_account_name').val(account.account_name);
        $('#edit_account_id').val(account.account_id);
        $('#edit_account_type').val(account.account_type); 
    }

    // Event handler for opening the edit modal
    $(document).on('click', '.edit-account', function() {
        var savedp2pAccounts = JSON.parse(p2p_transfer_object.savedp2pAccounts); 
        const index = $(this).data('index');
        populateEditForm(savedp2pAccounts[index]);  // Populate the form with the account data
        $('#edit_account_button').data('index', index);  // Store the index in the button for later use
    });

    // Event handler for saving the edited account
    $('#edit_account_button').on('click', function() {
        const index = $(this).data('index');
        const editedAccountData = {
            action: 'edit_p2p_account',
            p2p_name: $('#edit_p2p_name').val(),
            account_name: $('#edit_account_name').val(),
            account_id: $('#edit_account_id').val(),
            account_type: $('#edit_account_type').val(), 
            index: index,
            p2p_transfer_nonce: $('#p2p_transfer_nonce').val()
        };

        // Send the edited data via AJAX
        $.post(ajaxurl, editedAccountData, function(response) {
            if (response.success) {
                alert('P2P account updated successfully.');
                location.reload();  // Reload to update the account list
            } else {
                alert('An error occurred while updating the account.');
            }
        });
    });
});