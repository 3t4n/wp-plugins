document.addEventListener('DOMContentLoaded', function() {
    const shortcodeContainers = document.querySelectorAll('[id^="wp-ai-workflows-output-"]');
    
    shortcodeContainers.forEach(container => {
        const workflowId = container.dataset.workflowId;
        const sessionId = wpAiWorkflowsShortcode.sessionId;
        
        function showLoadingState() {
            container.innerHTML = `
                <div class="wp-ai-workflows-loading">
                    <div class="loading-spinner"></div>
                    <div class="loading-text">Processing your submission...</div>
                </div>
            `;
        }

        function showOutput(content) {
            container.innerHTML = `
                <div class="wp-ai-workflows-output-content">
                    ${content}
                </div>
            `;
        }

        function showError(message) {
            container.innerHTML = `
                <div class="wp-ai-workflows-error">
                    ${message}
                </div>
            `;
        }

        function fetchOutput() {
            const isSubmitting = sessionStorage.getItem(`workflow_${workflowId}_submitted`);
            
            if (isSubmitting) {
                showLoadingState();
            }

            fetch(`${wpAiWorkflowsShortcode.apiRoot}wp-ai-workflows/v1/shortcode-output?workflow_id=${workflowId}&session_id=${sessionId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.output) {
                        try {
                            const outputData = JSON.parse(data.output);
                            const outputNode = Object.values(outputData).find(node => node.type === 'output');
                            
                            if (outputNode) {
                                showOutput(outputNode.content);
                                sessionStorage.removeItem(`workflow_${workflowId}_submitted`);
                            }
                        } catch (e) {
                            showError('Error processing output data.');
                        }
                    }
                })
                .catch(() => {
                    showError('Error fetching output.');
                });
        }

        jQuery(document).on('submit', 
            '.gform_wrapper form, ' +      // Gravity Forms
            '.wpforms-form, ' +           // WPForms
            '.wpcf7-form, ' +            // Contact Form 7
            '.ninja-forms-form, ' +      // Ninja Forms
            '.nf-form-layout form',      // Ninja Forms (alternate structure)
            function() {
                sessionStorage.setItem(`workflow_${workflowId}_submitted`, 'true');
                showLoadingState();
            }
        );

        jQuery(document).on('wpformsAjaxSubmitBegin', function() {
            sessionStorage.setItem(`workflow_${workflowId}_submitted`, 'true');
            showLoadingState();
        });

        // Make trigger function available globally
        if (!window.wpAiWorkflows) {
            window.wpAiWorkflows = {};
        }
        window.wpAiWorkflows[workflowId] = {
            triggerSubmission: function() {
                sessionStorage.setItem(`workflow_${workflowId}_submitted`, 'true');
                showLoadingState();
            }
        };

        // Start polling
        fetchOutput();
        setInterval(fetchOutput, 5000);
    });
});