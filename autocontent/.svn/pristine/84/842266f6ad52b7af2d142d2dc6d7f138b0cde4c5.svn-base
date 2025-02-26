document.addEventListener("DOMContentLoaded", () => {
    console.log("Setup Wizard Script Loaded");

    const step1Button = document.getElementById("step-1-continue");
    const activationKeyInput = document.getElementById("autocontent_activation_key");

    if (!step1Button || !activationKeyInput) {
        console.warn("Step 1 elements not found. Ensure the DOM is structured correctly.");
        return;
    }

    step1Button.addEventListener("click", () => {
        console.log("Step 1 Continue button clicked");

        const activationKey = activationKeyInput.value.trim();

        if (activationKey === "") {
            console.warn("Activation Key is empty.");
            wizardShowMessage("Please enter a valid Activation Key &#10005;", false);
            return;
        }

        console.log("Activation Key:", activationKey);

        updateActivationKeyOption(activationKey)
            .then(() => {
                console.log("Activation key updated successfully.");
                return wizardVerifyActivationKey(activationKey);
            })
            .then((status) => {
                console.log("Activation Key Verification Status:", status);
                if (status === "verified") {
                    wizardShowMessage("Activation Key Verified &#10003;", true);
                    goToNextStep(1); // Proceed to Step 2
                } else {
                    wizardShowMessage("Activation Key Verification Failed &#10005;", false);
                }
            })
            .catch((error) => {
                console.error("Error during activation key verification:", error);
                wizardShowMessage("Verification Failed &#10005;", false);
            });
    });
});


function updateActivationKeyOption(activationKey) {
    console.log("Activation Key:", activationKey);
    console.log("AJAX URL:", autocontent_vars.ajax_url);
    console.log("Nonce:", autocontent_vars.update_activation_key_nonce);

    // Validate required parameters
    if (!activationKey || !autocontent_vars.ajax_url || !autocontent_vars.update_activation_key_nonce) {
        console.error('Missing required parameters for AJAX call.');
        wizardShowMessage("Error: Missing required data for updating the activation key &#10005;", false);
        return Promise.reject(new Error('Missing required parameters.'));
    }

    return fetch(autocontent_vars.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'update_activation_key_option',
            autocontent_activation_key: activationKey,
            nonce: autocontent_vars.update_activation_key_nonce,
        }),
    })
        .then(response => {
            console.log("Response Status:", response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log("Server Response Data:", data);
            if (!data.success) {
                if (data.data === 'Invalid nonce.') {
                    console.warn('Invalid nonce detected. Please refresh the page.');
                    wizardShowMessage("Invalid security token. Please refresh the page and try again &#10005;", false);
                } else {
                    throw new Error(data.data || 'Failed to update the activation key option.');
                }
            }
            console.log('Activation key updated successfully.');
        })
        .catch(error => {
            if (error.name === 'TypeError') {
                console.error('Network error or server unreachable:', error);
                wizardShowMessage("Network error. Please try again later &#10005;", false);
            } else {
                console.error('Error updating activation key:', error);
                wizardShowMessage("Failed to update Activation Key &#10005;", false);
            }
            throw error;
        });
}



function wizardVerifyActivationKey(activationKey) {
    const apiUrl = `${autocontent_vars.ac_domain}/api/activate.php/verify`;
    return fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Activation-Key': activationKey,
        },
        body: JSON.stringify({ 'Origin': window.location.hostname }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.isValid) {
                wizardShowMessage('Activation Key is Valid &#10003;', true);
                return fetch(autocontent_vars.ajax_url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'update_activation_status',
                        status: 'verified',
                        frequency: data.frequency || 'daily',
                        nonce: autocontent_vars.update_activation_nonce,
                    })
                });
            } else {
                throw new Error('Invalid Activation Key');
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                wizardShowMessage('Activation status updated successfully &#10003;', true);
                return 'verified';
            } else {
                throw new Error(data.data || 'Failed to update activation status.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            wizardShowMessage(error.message || 'Activation Key is Invalid &#10005;', false);
            return 'failed';
        });
}

function wizardShowMessage(message, isSuccess) {
    const statusElement = document.getElementById('wizardActivationStatus');
    if (statusElement) {
        statusElement.innerHTML = `<span style="color: ${isSuccess ? 'green' : 'red'};">${message}</span>`;
        statusElement.style.display = 'block';
        setTimeout(() => { statusElement.style.display = 'none'; }, 5000);
    }
}

function goToNextStep(currentStep) {
    const currentForm = document.querySelector(`#step-${currentStep}-form`);

    // Check if the form exists
    if (!currentForm) {
        console.error(`Form for step ${currentStep} not found.`);
        return;
    }

    // Perform validation
    const requiredFields = currentForm.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('input-error'); // Add error styling
            console.error(`Field "${field.name}" is required.`);
        } else {
            field.classList.remove('input-error'); // Remove error styling if valid
        }
    });

    if (isValid) {
        const currentStepElement = document.getElementById(`step-${currentStep}`);
        const nextStepElement = document.getElementById(`step-${currentStep + 1}`);
        if (currentStepElement && nextStepElement) {
            currentStepElement.classList.remove('active');
            currentStepElement.classList.add('completed');
            nextStepElement.classList.remove('disabled');
            nextStepElement.classList.add('active');

            // Make the form visible
            const nextForm = nextStepElement.querySelector('form');
            if (nextForm) {
                nextForm.style.display = 'block';
            }
        }
    }



}

window.completeSetup = function () {
    // Initialize settings object
    const settings = {
        subject: '',
        keyword_1: '',
        keyword_2: '',
        keyword_3: '',
        keyword_4: '',
        keyword_5: '',
        tone: '',
        imageStyle: ''
    };

    // Collect subject (Step 2)
    const subjectInput = document.querySelector('input[name="autocontent_subject"]');
    if (subjectInput) {
        settings.subject = subjectInput.value.trim();
    } else {
        console.error('Subject input not found.');
    }

    // Collect keywords (Step 3)
    for (let i = 1; i <= 5; i++) {
        const keywordInput = document.querySelector(`input[name="autocontent_keyword_${i}"]`);
        if (keywordInput) {
            settings[`keyword_${i}`] = keywordInput.value.trim(); // Use backticks for dynamic keys
        } else {
            console.warn(`Keyword ${i} input not found.`);
        }
    }


    // Collect tone (Step 4)
    const toneInput = document.querySelector('select[name="autocontent_tone"]');
    if (toneInput) {
        settings.tone = toneInput.value.trim();
    } else {
        console.error('Tone input not found.');
    }

    // Collect image style (Step 5)
    const imageStyleInput = document.querySelector('select[name="autocontent_image_style"]');
    if (imageStyleInput) {
        settings.imageStyle = imageStyleInput.value.trim();
    } else {
        console.error('Image style input not found.');
    }

    console.log('Collected Settings:', settings);

    // Proceed with AJAX call only if all settings are collected
    fetch(autocontent_vars.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'save_setup_settings',
            settings: JSON.stringify(settings),
            nonce: autocontent_vars.save_settings_nonce,
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showCompletionModal();
                finalizeWizardUI()
                showCompletionButtons(); // Display the buttons
            } else {
                console.error('Failed to save settings:', data.data);
                wizardShowMessage('Failed to save settings. Please try again.', false);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            wizardShowMessage('An error occurred while saving settings.', false);
        });
};


/**
 * Displays the completion buttons ("Reset Wizard" and "Go to Settings Page")
 * after the setup wizard is successfully completed.
 */
function showCompletionButtons() {
    const completionButtons = document.getElementById("wizard-completion-buttons");

    if (completionButtons) {
        // Display the buttons
        completionButtons.style.display = "block";

        // Add event listeners for the buttons if not already added
        const resetButton = document.getElementById("reset-wizard-button");

        if (resetButton) {
            resetButton.addEventListener("click", resetWizard);
            console.log("Reset Wizard button is ready.");
        } else {
            console.warn("Reset Wizard button not found.");
        }
        
    } else {
        console.warn("Completion buttons container not found.");
    }
}



function showCompletionModal() {
    // Check if a modal already exists
    if (document.querySelector('.completion-modal')) {
        return; // Prevent multiple modals
    }

    // Create the modal structure
    const modal = document.createElement('div');
    modal.id = 'completion-modal';
    modal.className = 'completion-modal';
    modal.innerHTML = `
        <div class="modal-content" style="display: block; position: fixed">
            <span class="close" style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 18px; font-weight: bold;">&times;</span>
            <h1>Congratulations! Your Setup Is Complete!</h1>
            <br/>
            <button id="generatePostFromModal" class="button button-primary">Generate your first post</button>
            <br/>
            <span>This may take a moment...</span>
        </div>
    `;

    // Append modal to the body
    document.body.appendChild(modal);

    // Add confetti effect
    launchConfetti();

    const closeButton = modal.querySelector(".close");
    closeButton.onclick = () => modal.remove();

    // Generate Post modal event
    document.getElementById('generatePostFromModal').addEventListener('click', () => {
        // Show processing spinner or loader (optional)
        
        document.body.insertAdjacentHTML(
            "beforeend",
            '<div id="processingContainer" style="display: block;">Processing...</div>'
        );

        // Perform AJAX call to check credits and generate post
        checkCreditsAndGeneratePost();
    });
}

function hideCompletionModal() {
    const completionModal = document.getElementById("completion-modal");
    if (completionModal) {
        completionModal.remove();
    }
}

function launchConfetti() {
    const confetti = window.confetti || function() {};
    confetti({
        particleCount: 150,
        spread: 70,
        origin: { y: 0.6 },
    });
}

function finalizeWizardUI() {
    // Hide the Finish button
    const finishButton = document.querySelector('#step-5 .button.button-primary');
    if (finishButton) {
        finishButton.style.display = 'none'; // Hide the button
    } else {
        console.warn('Finish button not found.');
    }

    // Change the color of the last step circle
    const lastStepCircle = document.querySelector('#step-5 .wizard-step-marker .circle');
    if (lastStepCircle) {
        lastStepCircle.style.backgroundColor = '#4caf50'; // Set to green
        lastStepCircle.style.color = 'white'; // Optional: Make text color white
        lastStepCircle.style.borderColor = '#4caf50'; // Optional: Match border color to green
    } else {
        console.warn('Last step circle not found.');
    }

    // Mark the last step as completed
    const lastStep = document.querySelector('#step-5');
    if (lastStep) {
        lastStep.classList.add('completed'); // Add completed class
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const resetButton = document.getElementById("reset-wizard-button");
    const settingsButton = document.getElementById("goto-settings-button");

    // Handle Reset Wizard Button
    if (resetButton) {
        resetButton.addEventListener("click", () => {
            console.log("Reset Wizard button clicked.");
            resetWizard(); // Call the reset function
        });
    } else {
        console.warn("Reset Wizard button not found in the DOM.");
    }

    // Handle Go to Settings Page Button
    if (settingsButton) {
        settingsButton.addEventListener("click", () => {
            console.log("Go to Settings Page button clicked.");

            // Clear all fields except activation key
            document.querySelectorAll("input").forEach((input) => {
                if (input.name !== "autocontent_activation_key") {
                    input.value = "";
                }
            });

            // Hide completion buttons
            const completionButtons = document.getElementById("wizard-completion-buttons");
            if (completionButtons) {
                completionButtons.style.display = "none";
            }

            // Redirect to the settings page
            if (autocontent_vars && autocontent_vars.settings_url) {
                window.location.href = autocontent_vars.settings_url;
            } else {
                console.error("Settings URL is not defined in autocontent_vars.");
                alert("Settings URL is not available. Please contact support.");
            }
        });
    } else {
        console.warn("Go to Settings Page button not found in the DOM.");
    }
});


function resetWizard() {
    console.log("Resetting wizard...");

    // Clear all input fields except the activation key
    document.querySelectorAll("input").forEach((input) => {
        if (input.name !== "autocontent_activation_key") {
            input.value = "";
        }
    });

    // Reset dropdowns (if any)
    document.querySelectorAll("select").forEach((select) => {
        select.selectedIndex = 0;
    });

    // Hide the completion buttons
    const completionButtons = document.getElementById("wizard-completion-buttons");
    if (completionButtons) {
        completionButtons.style.display = "none";
    }

    // Reset wizard step states
    document.querySelectorAll(".wizard-step").forEach((step) => {
        step.classList.remove("completed", "active", "disabled");

        // Reset circle color and outline
        const circle = step.querySelector(".circle");
        if (circle) {
            circle.style.backgroundColor = ""; // Reset background color
            circle.style.borderColor = ""; // Reset border color
            circle.classList.remove("green-outline"); // Reset any specific class
        }

        if (step.id === "step-1") {
            step.classList.add("active");
            const form = step.querySelector("form");
            if (form) {
                form.style.display = "block";
            }
        } else {
            step.classList.add("disabled");
            const form = step.querySelector("form");
            if (form) {
                form.style.display = "none";
            }
        }
    });

    // Ensure the Finish button is visible in Step 5
    const step5Form = document.querySelector("#step-5-form");
    if (step5Form) {
        const finishButton = step5Form.querySelector(".button-primary");
        if (finishButton) {
            finishButton.style.display = "inline-block"; // Ensure the button is visible
            console.log("Finish button is reset and visible.");
        } else {
            console.warn("Finish button not found in Step 5.");
        }
    } else {
        console.warn("Step 5 form not found.");
    }

    console.log("Wizard has been reset.");
}


document.addEventListener("DOMContentLoaded", () => {
    const generatePostButton = document.getElementById("generate-post-button");
    const settingsLink = document.getElementById("goto-settings-link");

    // Attach event listener to "Generate Post" button
    if (generatePostButton) {
        generatePostButton.addEventListener("click", function () {
            // Show processing spinner or loader (optional)
            document.body.insertAdjacentHTML(
                "beforeend",
                '<div id="processingContainer" style="display: block;">Processing...</div>'
            );

            // Perform AJAX call to check credits and generate post
            checkCreditsAndGeneratePost();
        });
    }

    // Update "Go to Settings" link
    if (settingsLink) {
        settingsLink.href = autocontent_vars.settings_url; // Use localized settings URL
    }
});

function checkCreditsAndGeneratePost() {
    
    // Hide completion modal
    hideCompletionModal();
    
    // Show processing spinner
    showSpinner();

    const ajaxUrl = autocontent_vars.ajax_url;

    fetch(ajaxUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
            action: "check_autocontent_credits", // Custom action to check credits
            nonce: autocontent_vars.check_credits_nonce, // Use the localized nonce
            CallType: "manual",
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            hideSpinner();

            if (data.success && data.data.credits > 0) {
                // Proceed with post generation
                generatePostNow();
            } else {
                showModal(false); // Show failed modal if no credits
            }
        })
        .catch((error) => {
            console.error("Error checking credits:", error);
            hideSpinner();
            showModal(false); // Show failed modal on error
        });
}

function generatePostNow() {
    // Show processing spinner
    showSpinner();

    const ajaxUrl = autocontent_vars.ajax_url;

    fetch(ajaxUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
            action: "autocontent_generate_post_now", // Custom action for post generation
            nonce: autocontent_vars.nonce,
            CallType: "manual",
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            hideSpinner();

            if (data.success) {
                showModal(data.data.post_url); // Show success modal with post URL
            } else {
                showModal(false); // Show failure modal
            }
        })
        .catch((error) => {
            console.error("Error generating post:", error);
            hideSpinner();
            showModal(false); // Show failure modal on error
        });
}

function showSpinner() {
    const spinnerHtml = `
        <div id="spinner-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;">
        <img src="${autocontent_vars.plugin_url}images/processing_3.gif" alt="Loading..." style="width: 50px; height: 50px; margin-bottom: 10px;">
        <span style="font-size: 18px; font-weight: bold;">Your post is being generated...</span>
        </div>
    `;

    document.body.insertAdjacentHTML("beforeend", spinnerHtml);
}


function hideSpinner() {
    const spinnerContainer = document.getElementById("spinner-container");
    if (spinnerContainer) {
        spinnerContainer.remove();
    }
}

function showModal(postUrl) {
    
    const modalHtml = `
    <div id="postModalOverlay" class="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.2); z-index: 9998;">
        <div id="postModal" class="modal" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 2px solid #0073aa; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 9999; min-width: 300px; text-align: center;">
            <span class="close" style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 18px; font-weight: bold;">&times;</span>
            <div style="text-align: center; font-family: Arial, sans-serif; font-size: 16px;">
            ${postUrl
            ? `<p style="font-size: 20px; font-weight: bold;">Post generated successfully!</p>
                <button onclick="window.open('${postUrl}', '_blank')" style="background-color: #0073aa; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 14px; font-weight: bold;">
                  View Post
                </button>`
            : `
            <div style="align-items: center; font-size: 18px; margin-left: 50px; margin-right: 50px;">
                <img 
                    src="${autocontent_vars.plugin_url}images/crying.jpg" 
                    alt="Sad" 
                    style="margin-bottom: 1em; width: 100px; height: 100px;"
                >
                <p style="margin: 0; font-size: 18px;">
                    <span style="font-weight: bold;">Failed to generate post</span>
                    <br />
                    Insufficient WriteNow credits, <a href="https://autocontent.com/pricing/" target="_blank">upgrade</a> to get more.
                </p>
            </div>
            `}
            </div>
        </div>
    </div>
    `;

    document.body.insertAdjacentHTML("beforeend", modalHtml);

    // Add functionality to close the modal when clicking on the close button or outside the modal
    document.querySelector(".close").addEventListener("click", () => {
        document.getElementById("postModalOverlay").remove();
    });
    document.getElementById("postModalOverlay").addEventListener("click", (e) => {
        if (e.target.id === "postModalOverlay") {
            document.getElementById("postModalOverlay").remove();
        }
    });

}







