window.addEventListener('load', function () {
    toggleVisibility(); // Ensure correct display on page load based on checkbox state
    setTimeout(function () {
        const notificationBarSuccess = document.getElementById('notification-bar-success');
        const notificationBarError = document.getElementById('notification-bar-error');

        if (notificationBarSuccess) {
            notificationBarSuccess.style.display = 'none'; // Hide the success notification if it exists
        }
        if (notificationBarError) {
            notificationBarError.style.display = 'none'; // Hide the error notification if it exists
        }
    }, 3000); // Hide after 3000 milliseconds (3 seconds)
});
window.toggleVisibility = () => {
    const checkbox = document.getElementById('ars_enable_auto_approve');
    const ratingSection = document.getElementById('rating_threshold_section');
    const ruleSection = document.getElementById('apply_rule_section');

    if (checkbox.checked) {
        ratingSection.style.display = '';
        ruleSection.style.display = '';
    } else {
        ratingSection.style.display = 'none';
        ruleSection.style.display = 'none';
    }
}
window.updateOutput = (val) => {
    document.getElementById('rating_value').textContent = val;
    document.getElementById('rating_threshold').value = val;
}