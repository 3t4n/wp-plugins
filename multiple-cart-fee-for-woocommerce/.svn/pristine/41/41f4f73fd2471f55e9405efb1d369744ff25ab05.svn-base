jQuery(document).ready(function($) {
    var container = $('#multiple-fees-container');
    
    // Add new fee row
    container.on('click', '.add-fee', function() {
        var row = $(this).closest('.fee-row');
        var newRow = row.clone();
        var index = $('.fee-row').length;
        
        // Update indices
        newRow.find('input').each(function() {
            var name = $(this).attr('name');
            $(this).attr('name', name.replace(/\[\d+\]/, '[' + index + ']'));
            $(this).val('');
        });
        
        // Replace add button with remove button
        row.find('.add-fee').replaceWith(
            '<button type="button" class="remove-fee button-secondary">' +
            '<span class="dashicons dashicons-minus"></span></button>'
        );
        
        container.append(newRow);
    });
    
    // Remove fee row
    container.on('click', '.remove-fee', function() {
        $(this).closest('.fee-row').remove();
        updateLastButton();
    });
    
    // Ensure last row always has add button
    function updateLastButton() {
        $('.fee-row').each(function(index) {
            var isLast = index === $('.fee-row').length - 1;
            var button = isLast ? 
                '<button type="button" class="add-fee button-secondary">' +
                '<span class="dashicons dashicons-plus"></span></button>' :
                '<button type="button" class="remove-fee button-secondary">' +
                '<span class="dashicons dashicons-minus"></span></button>';
            
            $(this).find('button').replaceWith(button);
        });
    }
});
