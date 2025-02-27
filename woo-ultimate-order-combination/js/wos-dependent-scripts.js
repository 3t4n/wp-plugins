jQuery(document).ready(function ($) {

    // Handle bulk action dropdown change
    $('select#bulk-action-selector-top').on('change', function () {
        var selectedAction = $(this).val();
        var $orderCheckboxes = $('#the-list input[name="post[]"][type="checkbox"]');
        var $actionsColumn = $('#the-list .wc_actions.column-wc_actions p');

        if (selectedAction !== 'combine' && selectedAction !== 'wuoc_combine') {
            $actionsColumn.find('.wc_os_parent').remove();
            $('input[name="wc_os_parent"][type="hidden"]').remove();
            return;
        }

        // Uncheck all selected checkboxes
        $orderCheckboxes.prop('checked', false).removeClass('wos_parent_mark');

        // Process each selected checkbox
        $orderCheckboxes.each(function () {
            var $checkbox = $(this);
            var $parentActionContainer = $checkbox.closest('tr').find('.wc_actions.column-wc_actions p');

            $parentActionContainer.find('.wc_os_parent').remove();
            $checkbox.addClass('wos_parent_mark').click();
        });
    });

    // Handle checkbox click for orders
    $('#the-list input[name="post[]"][type="checkbox"]').on('click', function () {
        var selectedAction = $('select#bulk-action-selector-top').val();
        if (selectedAction !== 'combine' && selectedAction !== 'wuoc_combine') {
            return;
        }

        var $checkbox = $(this);
        var $parentActionContainer = $checkbox.closest('tr').find('.wc_actions.column-wc_actions p');

        if ($checkbox.is(':checked')) {
            if ($parentActionContainer.find('a.wos_parent').length === 0) {
                $parentActionContainer.append(
                    '<a title="Click here to mark this item as parent/main order during this action" class="button wc-action-button wc-action-button-wc_os_parent wc_os_parent"></a>'
                );
            }
        } else {
            $parentActionContainer.find('.wc_os_parent').remove();
        }
    });

    // Handle clicking on the parent order marker button
    $('#the-list .wc_actions.column-wc_actions').on('click', 'p .wc_os_parent', function (event) {
        event.preventDefault();

        var $button = $(this);
        var $checkbox = $button.closest('tr').find('input[name="post[]"][type="checkbox"]');

        // Unselect all previously selected parent orders
        $('p .wc_os_parent.selected').not($button).removeClass('selected');

        // Toggle selection
        $button.toggleClass('selected');

        var selectedOrderId = $checkbox.val();

        if ($('input[name="wc_os_parent"][type="hidden"]').length === 0) {
            $('form#posts-filter').prepend('<input type="hidden" name="wc_os_parent" value="' + selectedOrderId + '">');
        } else {
            $('input[name="wc_os_parent"][type="hidden"]').val(selectedOrderId);
        }
    });

});
