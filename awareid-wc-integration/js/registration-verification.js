jQuery(document).ready(function ($) {
    // Store forms we already handled, to avoid infinite loops
    const handledForms = new WeakSet();

    /**
     * Detect if we're in a block-based environment
     */
    const isBlockBased = () => typeof wp !== 'undefined' && wp.data;

    /**
     * Check if this form looks like a registration form
     */
    function isLikelyRegistrationForm($form) {
        const fields = [
            "user_login",
            "user_email",
            "email",
            "reg_email",
            "pass1",
            "user_pass",
            "password",
        ];

        // Only after checking original fields, check for block exclusions
        if (isBlockBased()) {
            const skipSelectors = [
                '.login-form', 
                '.search-form',
                '#loginform',
                '#searchform',
                '.comment-form',
                '#commentform'
            ];

            for (const selector of skipSelectors) {
                if ($form.is(selector) || $form.closest(selector).length) {
                    return false;
                }
            }

            const formAction = $form.attr('action')?.toLowerCase() || '';
            if (formAction.includes('login') || formAction.includes('signin')) {
                return false;
            }
        }

        let score = 0;
        fields.forEach((f) => {
            if ($form.find(`[name="${f}"]`).length) {
                score++;
            }
        });
        return score >= 2;
    }

    /**
     * Find email in form
     */
    function findEmail($form) {
        const emailSelectors = [
            '[name="user_email"]',
            '[name="email"]',
            '[name="reg_email"]',
            '[name="billing_email"]'
        ];
        for (let sel of emailSelectors) {
            const val = $form.find(sel).val();
            console.log(val);
            if (val) return val;
        }
        return '';
    }

    /**
     * Check if user is verified
     */
    function checkIfUserIsVerified(showModalCallback, verifiedCallback) {
        $.ajax({
            url: userData.ajax_url,
            type: "POST",
            data: { action: "check_button_status" },
            success: function (resp) {
                if (resp.disable_old_button) {
                    verifiedCallback();
                } else {
                    showModalCallback();
                }
            },
            error: function () {
                showModalCallback();
            },
        });
    }

    /**
     * Check if email exists
     */
    function checkEmailExistence(email, existsCb, notExistsCb) {
        if (!email) {
            notExistsCb();
            return;
        }

        $.ajax({
            url: userData.ajax_url,
            type: "POST",
            data: {
                action: "awareid_check_email_existence",
                email: email,
                nonce: userData.awareid_email_check_nonce
            },
            success: (response) => {
                console.log("AwareID: checkEmailExistence raw response:", response);
                if (response.success && response.data.exists) {
                    existsCb();
                } else if (response.success) {
                    notExistsCb();
                } else {
                    console.error("AwareID: checkEmailExistence unexpected:", response.data);
                    notExistsCb();
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error("AwareID: checkEmailExistence AJAX error:", textStatus, errorThrown);
                notExistsCb();
            },
        });
    }

    /**
     * Show consent modal
     */
    function showConsentModal($form, email) {
        console.log("AwareID: Show consentModal for registration form:", $form, email);
        userData.email = email || userData.email || '';

        console.log("AwareID: Setting userData.email to", userData.email);
        $("#consentModal").modal("show");
        window.awareidRegistrationForm = $form;
        
        $("#captureBtn").off('click').on('click', function () {
            console.log("AwareID: Show identityVerificationModal...");
            $("#identityVerificationModal").modal("show");
        });
    }

    /**
     * Submit form after verification
     */
    function doRealSubmit($form) {
        console.log("AwareID: re-submitting registration form after biometric success.");
        handledForms.add($form[0]); 
        $form.trigger('submit');
    }

    /**
     * Handle block-specific registration attempts
     */
    function setupBlockRegistrationHandling() {
        if (!isBlockBased()) return;

        wp.data.subscribe(() => {
            try {
                const stores = [
                    wp.data.select('core/editor'),
                    wp.data.select('core/block-editor'),
                    wp.data.select('core/blocks')
                ].filter(Boolean);

                stores.forEach(store => {
                    const blocks = store.getBlocks?.() || [];
                    blocks.forEach(block => {
                        if (block.name?.includes('registration') || 
                            block.name?.includes('sign-up')) {
                            // Just monitor blocks, don't attach handlers
                            console.log("AwareID: Registration block detected");
                        }
                    });
                });
            } catch (e) {
                console.error("AwareID: Block monitoring error:", e);
            }
        });
    }

    // Initialize block handling if needed
    setupBlockRegistrationHandling();

    // MAIN FORM HANDLING - Back to original document-level event delegation
    $(document).on('submit', 'form', function (e) {
        const $form = $(this);

        // If we already handled this form once, do nothing
        if (handledForms.has(this)) {
            return true;
        }

        // Check if this looks like a registration form
        if (!isLikelyRegistrationForm($form)) {
            return true;
        }

        // If it IS a likely registration form, intercept
        e.preventDefault();
        e.stopImmediatePropagation();

        console.log("AwareID: Intercepting potential registration form:", $form);

        // Get the email if present
        const email = findEmail($form);

        if (userData.is_user_logged_in) {
            // Logged-in user => check if already verified
            checkIfUserIsVerified(
                // if not verified -> show modal
                () => showConsentModal($form, email),
                // if verified -> let them submit
                () => doRealSubmit($form)
            );
        } else {
            // Not logged in => check if email already exists
            checkEmailExistence(
                email,
                // if email exists => ask them to login
                () => {
                    console.log("AwareID: Email exists, letting plugin handle login flow...");
                    doRealSubmit($form);
                },
                // if email not exists => show modal
                () => showConsentModal($form, email)
            );
        }
    });
});