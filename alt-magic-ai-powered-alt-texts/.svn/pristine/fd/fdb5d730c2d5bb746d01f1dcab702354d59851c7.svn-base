document.addEventListener('DOMContentLoaded', function () {
    const settings = document.querySelectorAll('.alt-magic-setting');

    settings.forEach(setting => {
        setting.addEventListener('change', function () {
            const key = this.name;
            let value;

            // Display "Saving..." message
            showMessage('<p style="color: blue; margin-top: 4px;">Saving...</p>', this);

            if (this.type === 'checkbox') {
                value = this.checked == true ? 1 : 0;
            } else {
                value = this.value;
            }
            console.log('value: ', value);

            const formData = new FormData();
            formData.append('action', 'alt_magic_save_settings');
            formData.append('nonce', altMagicSettings.nonce); // Use localized nonce
            formData.append('key', key);
            formData.append('value', value);

            fetch(altMagicSettings.ajaxurl, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showMessage('<p style="color: green; margin-top: 4px;">' + data.data + '</p>', this, 2000);
                    } else {
                        showMessage('<p style="color: red; margin-top: 4px;">Error: ' + data.data + '</p>', this, 4000);
                    }
                })
                .catch(error => {
                    showMessage('<p style="color: red;">An error occurred. Please try again.</p>', this, 4000);
                    console.error('Error:', error);
                });
        });
    });

    function showMessage(message, element, timeout = 3000) {
        let messageContainer = element.parentElement.querySelector('.alt-magic-settings-message');
        if (!messageContainer) {
            messageContainer = document.createElement('div');
            messageContainer.className = 'alt-magic-settings-message';
            element.parentElement.appendChild(messageContainer);
        }
        messageContainer.innerHTML = message;
        messageContainer.style.display = 'block';
        setTimeout(() => {
            messageContainer.style.display = 'none';
        }, timeout);
    }
});
