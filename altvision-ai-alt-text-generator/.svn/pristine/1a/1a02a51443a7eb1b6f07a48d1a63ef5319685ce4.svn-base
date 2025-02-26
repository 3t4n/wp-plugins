// Constants
const API_CONFIG = {
    headers: {
        'Content-Type': 'application/json',
    }
};

// Utility functions
const updateButtonState = (button, state) => {
    const states = {
        loading: { text: 'Generating...', disabled: true },
        success: { text: 'Generated!', disabled: true },
        error: { text: 'Error - Try Again', disabled: false },
        default: { text: 'Generate Alt Text', disabled: false }
    };
    
    const newState = states[state];
    button.disabled = newState.disabled;
    button.textContent = newState.text;
};

const createTextArea = (message) => `
    <div class="altvision-input-container" style="margin-top: 10px;">
        <div style="display: flex; gap: 5px; margin-bottom: 5px;">
            <textarea 
                class="widefat" 
                style="width: 100%; margin-top: 5px;"
                rows="3">${message}</textarea>
            <button type="button" 
                    class="button button-secondary altvision-copy-alt" 
                    style="height: fit-content; margin-top: 5px;">
                Copy
            </button>
        </div>
    </div>
`;

// API Handler
class AltTextGenerator {
    static async generateAltText(imageUrl, imageId, button) {
        try {
            updateButtonState(button, 'loading');
            
            const response = await fetch(altVisionMedia.apiUrl, {
                method: 'POST',
                ...API_CONFIG,
                headers: {
                    ...API_CONFIG.headers,
                    'X-WP-Nonce': altVisionMedia.nonce
                },
                body: JSON.stringify({ image_url: imageUrl })
            });

            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'API Error');
            }

            if (data.message) {
                this.handleSuccess(data.message, button, imageId);
            }
        } catch (error) {
            console.error('AltVision Error:', error);
            updateButtonState(button, 'error');
        }
    }

    static async handleSuccess(message, button, imageId) {
        if (message.includes('Daily limit reached')) {
            const upgradeLink = `
            <div class="altvision-upgrade-notice" style="margin-top: 10px; color: #395773;">
                <span>${message}</span>
                <a href="${altVisionMedia.adminUrl}" 
                   style="text-decoration: underline;">
                    Upgrade to Premium →
                </a>
            </div>`;
            button.insertAdjacentHTML('afterend', upgradeLink);
            updateButtonState(button, 'default');
            return;
        }
    
         // Remove any existing input containers before adding a new one
        const existingContainers = document.querySelectorAll('.altvision-input-container');
        existingContainers.forEach(container => container.remove());
        
        button.insertAdjacentHTML('afterend', createTextArea(message));
        
        // Update all possible alt text fields
        const altTextFields = [
            `input[name="attachments[${imageId}][alt]"]`,
            'input[name="image-alt"]',
            '.compat-field-alt input',
            '#attachment_alt',
            '#attachment-details-two-column-alt-text'  // Add the specific textarea
        ].join(', ');
    
        document.querySelectorAll(altTextFields).forEach(input => {
            input.value = message;
            input.dispatchEvent(new Event('change', { bubbles: true }));
            input.dispatchEvent(new Event('input', { bubbles: true }));
        });
        
         // Update the media model
        const attachment = wp.media.model.Attachment.get(imageId);
        if (attachment) {
            attachment.set('alt', message);
            attachment.fetch().done(() => {
                attachment.trigger('change');
                // Force update the specific textarea again after fetch
                const specificTextarea = document.getElementById('attachment-details-two-column-alt-text');
                if (specificTextarea) {
                    specificTextarea.value = message;
                    specificTextarea.dispatchEvent(new Event('change', { bubbles: true }));
                    specificTextarea.dispatchEvent(new Event('input', { bubbles: true }));
                }
            });
        }
        
        updateButtonState(button, 'success');
        setTimeout(() => updateButtonState(button, 'default'), 2000);
    }
}

// Media Modal Extension

class MediaModalExtension {
    static init() {
        if (!wp.media) return;

        const originalAttachmentDetails = wp.media.view.Attachment.Details;
        wp.media.view.Attachment.Details = originalAttachmentDetails.extend({
            initialize() {
                originalAttachmentDetails.prototype.initialize.apply(this, arguments);
                this.listenTo(this.model, 'change', this.addGenerateButton);
            },

            addGenerateButton() {
                const attachment = this.model;
                if (!attachment?.get('type') === 'image') return;

                // Remove any existing elements
                const existingContainer = this.el.querySelector('.altvision-container');
                const existingTextAreas = this.el.querySelectorAll('.altvision-input-container');
                const existingUpgradeNotices = this.el.querySelectorAll('.altvision-upgrade-notice');

                existingContainer?.remove();
                existingTextAreas.forEach(textarea => textarea.remove());
                existingUpgradeNotices.forEach(notice => notice.remove());

                const buttonHtml = `
                    <div class="altvision-container">
                        <button type="button" 
                                class="button button-secondary altvision-generate-alt" 
                                data-image-id="${attachment.get('id')}"
                                data-image-url="${attachment.get('url')}">
                            Generate Alt Text
                        </button>
                    </div>`;
                
                const attachmentInfo = this.el.querySelector('.attachment-info');
                if (attachmentInfo) {
                    attachmentInfo.insertAdjacentHTML('beforeend', buttonHtml);
                }
            }
        });
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Media Modal Extension
    MediaModalExtension.init();

    // Handle click events for alt text generation and copying
    document.addEventListener('click', (e) => {
        if (e.target.matches('.altvision-generate-alt')) {
            e.preventDefault();
            const button = e.target;
            AltTextGenerator.generateAltText(
                button.dataset.imageUrl,
                button.dataset.imageId,
                button
            );
        } else if (e.target.matches('.altvision-copy-alt')) {
            e.preventDefault();
            const textarea = e.target.closest('.altvision-input-container').querySelector('textarea');
            textarea.select();
            document.execCommand('copy');
            
            // Visual feedback
            const originalText = e.target.textContent;
            e.target.textContent = 'Copied!';
            setTimeout(() => {
                e.target.textContent = originalText;
            }, 1500);
        }
    });
});