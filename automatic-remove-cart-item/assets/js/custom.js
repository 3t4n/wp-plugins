/* Show/hide time interval input field based on dropdown selection */
jQuery(document).ready(function ($) {
    $('.auto_remove_cart_item_time_interval_row').hide();
    $('.auto_remove_cart_item_time_interval_row').parents("tr").hide();

    /* Get the default selected time interval input field when the document is ready */
    var defaultSelectedValue = $('#auto_remove_cart_item_dropdown').val();
    $('#' + defaultSelectedValue).show();
    $('#' + defaultSelectedValue).parents("tr").show();

    /* Show/hide time interval input field based on selected option */
    $('#auto_remove_cart_item_dropdown').change(function () {
        var selectedOption = $(this).val();
        // Hide all time interval fields
        $('.auto_remove_cart_item_time_interval_row').hide();
        $('.auto_remove_cart_item_time_interval_row').parents("tr").hide();
        /* Show only the selected box */
        $('#' + selectedOption).show();
        $('#' + selectedOption).parents("tr").show();
        $('#auto_remove_cart_item_checkbox').show();
        $('#auto_remove_cart_item_checkbox').parents("tr").show();

        /* Hide checkbox if not select any option */
        if (selectedOption == 'auto_remove_cart_item_time_interval_select') {
            $('#auto_remove_cart_item_checkbox').hide();
            $('#auto_remove_cart_item_checkbox').parents("tr").hide();
        }
    });
    /* Hide checkbox if not select any option */
    if (defaultSelectedValue != 'auto_remove_cart_item_time_interval_select') {
        $('#auto_remove_cart_item_checkbox').show();
        $('#auto_remove_cart_item_checkbox').parents("tr").show();
    }
});
