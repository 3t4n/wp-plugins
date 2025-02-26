/**
 * Auto Attachments Cleaner Scripts
 * 
 *  @author Stefano Fattori <info@stefanofattori.it>
 *  @package Auto_Attachments_Cleaners
 */

/**
 * Manage Select and Deselect All on Plugin page admin
 * 
 */
document.addEventListener('DOMContentLoaded', function () {
    const selectAllButton = document.getElementById('select-all-post-types');
    const deselectAllButton = document.getElementById('deselect-all-post-types');
    const checkboxes = document.querySelectorAll('input[name="auto_attachments_cleaner_post_types[]"]');

    selectAllButton.addEventListener('click', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = true;
        });
    });

    deselectAllButton.addEventListener('click', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
        });
    });
});