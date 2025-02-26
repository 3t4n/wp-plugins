// Function to update the textarea based on checked checkboxes
function acanimationsUpdateTextarea() {
    const checkboxes = document.querySelectorAll('input[name="ac_elem_checkbox"]:checked');
    const textarea = document.querySelector('textarea.acanimations-elements');

    // Collect all the values of checked checkboxes
    const selectedValues = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Update the textarea with concatenated values
    textarea.value = selectedValues.join(', ');
}
function acanimationsToggleAll() {
    const acanimations_checkboxes = document.querySelectorAll('input[name="ac_elem_checkbox"]');
    acanimations_checkboxes.forEach(checkbox => checkbox.checked = true);
    acanimationsUpdateTextarea();
}

window.addEventListener('DOMContentLoaded', function() {
    // Attach event listeners to all checkboxes
    const acanimations_checkboxes = document.querySelectorAll('input[name="ac_elem_checkbox"]');
    acanimations_checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', acanimationsUpdateTextarea);
    });

})
