document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.switch-button');
    const hiddenInput = document.querySelector('#sync-customers-setting');

    toggleButton.addEventListener('click', function () {
        const isChecked = this.getAttribute('aria-checked') === 'true';
        const newCheckedValue = !isChecked;

        // Update aria-checked attribute
        this.setAttribute('aria-checked', newCheckedValue);

        // Update hidden input value
        hiddenInput.value = newCheckedValue ? 'true' : 'false';
    });
});