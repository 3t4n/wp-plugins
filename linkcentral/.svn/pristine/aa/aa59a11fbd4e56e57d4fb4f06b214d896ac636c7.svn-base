(function($) {
    'use strict';

    // Base constants available to both free and premium
    const isPremium = linkcentral_data.can_use_premium_code__premium_only === '1';

    // Initialize basic modal functionality (free)
    $(document).ready(function() {
        const btn = $('#linkcentral-dynamic-redirect');
        const modal = $('#linkcentral-dynamic-redirect-modal');
        const span = $('.linkcentral-dynamic-redirect-modal-close');

        // Basic event listeners (free)
        function initializeBasicEventListeners() {
            btn.on('click', openModal);
            span.on('click', closeModal);
            $(window).on('click', closeModalOnOutsideClick);
        }

        // Basic modal functions (free)
        function openModal(e) {
            e.preventDefault();
            modal.show();
            if (isPremium) {
                loadExistingRules();
                $('#linkcentral-add-rule, #linkcentral-save-rules').show();
            } else {
                $('#linkcentral-rules-container').empty();
                $('#linkcentral-add-rule, #linkcentral-save-rules').hide();
            }
        }

        function closeModal() {
            modal.hide();
        }

        function closeModalOnOutsideClick(event) {
            if (event.target === modal[0]) {
                closeModal();
            }
        }

        function updateDynamicButtonAppearance() {
            const button = $('#linkcentral-dynamic-redirect');
            const rules = JSON.parse($('#linkcentral_dynamic_rules').val() || '[]');
            button.toggleClass('linkcentral-dynamic-redirect-rules-set', rules.length > 0);
        }

        // Initialize basic functionality
        initializeBasicEventListeners();
        updateDynamicButtonAppearance();




    });

})(jQuery);