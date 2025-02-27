document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('woocommerce_nofraud_automatic_voidrefund');
    if (checkbox) {
        function toggle_voidrefund_settings() {
            const checkbox = document.getElementById('woocommerce_nofraud_automatic_voidrefund');
            const voidrefundSettingsElement = document.getElementById('select2-woocommerce_nofraud_automatic_voidrefund_mode-container');
            if (voidrefundSettingsElement) {
                const parentRow = voidrefundSettingsElement.closest('tr');
                if (checkbox.checked) {
                    if (parentRow) {
                        parentRow.style.display = '';
                    }
                } else {
                    if (parentRow) {
                        parentRow.style.display = 'none';
                    }
                }
            } else {
                setTimeout(toggle_voidrefund_settings, 300);
            }
        }
        checkbox.addEventListener('change', toggle_voidrefund_settings);
        toggle_voidrefund_settings();
    }
});