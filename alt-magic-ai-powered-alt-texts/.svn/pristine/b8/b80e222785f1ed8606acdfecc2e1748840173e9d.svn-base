document.addEventListener('DOMContentLoaded', function () {
    var pluginUrl = altMagicSettings.pluginUrl;
    var apiKeyInput = document.getElementById('alt_magic_api_key');
    var apiKey = apiKeyInput.value;
    if (apiKey) {
        verifyApiKey(apiKey);
    } else {
        document.getElementById('help-video-container').style.display = 'block';
    }

    document.getElementById('verify-api-key').addEventListener('click', function () {
        var apiKey = apiKeyInput.value;
        verifyApiKey(apiKey);
    });

    function verifyApiKey(apiKey) {
        document.getElementById('spinner').style.display = 'block';
        fetch('https://alt-magic-api-eabaa2c8506a.herokuapp.com/verify-api-key', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ api_key: apiKey })
        })
            .then(response => response.json())
            .then(response => {
                if (response.message === 'API key is valid' && response.user_id) {
                    fetch(ajaxurl, {
                        method: 'POST',
                        body: new URLSearchParams({
                            'action': 'alt_magic_save_api_key',
                            'api_key': apiKey,
                            'user_id': response.user_id,
                            'nonce': altMagicSettings.nonceSave
                        })
                    });

                    var statusHTML = `
                    <img src="${pluginUrl}../assets/altm-green-tick.svg" alt="Green Tick" style="width: 20px; height: 20px;">
                    <p style="color: #00B612; font-weight: bold;">API key is verified.</p>`;

                    var apiKeyStatus = document.getElementById('api-key-status');
                    apiKeyStatus.innerHTML = statusHTML;
                    apiKeyStatus.style.display = 'flex';


                    document.getElementById('help-video-container').style.display = 'none';
                    document.getElementById('remove-api-key-container').style.display = 'block';


                    document.getElementById('user-details').style.display = 'block';
                    var userEmail = response.user_details.email;
                    var profilePictureElement = document.getElementById('profile-picture');

                    if (userEmail.endsWith('@gmail.com')) {
                        profilePictureElement.style.backgroundImage = `url(${response.user_details.profile_picture})`;
                        profilePictureElement.style.backgroundSize = 'cover';
                        profilePictureElement.textContent = '';
                    } else {
                        var firstLetter = userEmail.charAt(0).toUpperCase();
                        profilePictureElement.style.backgroundImage = '';
                        profilePictureElement.style.backgroundColor = '#673AB7';
                        profilePictureElement.style.color = 'white';
                        profilePictureElement.style.fontSize = '18px';
                        profilePictureElement.textContent = firstLetter;
                    }
                    document.getElementById('user-name').textContent = response.user_details.user_name;
                    document.getElementById('user-email').textContent = userEmail;
                    document.getElementById('credits-available').textContent = response.user_details.credits_available;
                } else {
                    alert('Invalid API key. Please try again.');
                    document.getElementById('api-key-status').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Invalid API key. Please try again.');
            })
            .finally(() => {
                document.getElementById('spinner').style.display = 'none';
            });
    }

    document.getElementById('remove-api-key').addEventListener('click', function () {
        if (confirm('Are you sure you want to remove the API key from the system?')) {
            fetch(ajaxurl, {
                method: 'POST',
                body: new URLSearchParams({
                    'action': 'alt_magic_remove_api_key',
                    'nonce': altMagicSettings.nonceRemove
                })
            }).then(function () {
                apiKeyInput.value = '';
                document.getElementById('user-details').style.display = 'none';
                document.getElementById('api-key-status').style.display = 'none';

                document.getElementById('remove-api-key-container').style.display = 'none';
                document.getElementById('help-video-container').style.display = 'block';

                // Delay the alert to ensure DOM updates are rendered
                setTimeout(function () {
                    alert('API key has been removed from the system.');
                }, 200);
            });
        }
    });
});