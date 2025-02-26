document.addEventListener('DOMContentLoaded', function () {
    const enableAllCheckbox = document.querySelector('[name="accp_settings[disable_all]"]');
    const individualCheckboxes = document.querySelectorAll('[name^="accp_settings"]:not([name="accp_settings[disable_all]"])');

    if (enableAllCheckbox) {
        enableAllCheckbox.addEventListener('change', function () {
            const isChecked = this.checked;
            individualCheckboxes.forEach((checkbox) => {
                checkbox.checked = isChecked;
            });
        });
    }

    individualCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const allChecked = Array.from(individualCheckboxes).every(cb => cb.checked);
            enableAllCheckbox.checked = allChecked;
        });
    });
});