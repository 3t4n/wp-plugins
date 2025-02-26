
// Force check fast detection
document.addEventListener('DOMContentLoaded', function() {
    // Select the checkbox using its name attribute
    const fastDetectionCheckbox = document.querySelector('input[name="carbon_fields_compact_input[_wuadblockguard_fast_detection]"]');

    if (fastDetectionCheckbox) {
        // Prevent the user from changing the checkbox state
        fastDetectionCheckbox.addEventListener('click', function(event) {
            // Check the checkbox state before the click
            const wasChecked = fastDetectionCheckbox.checked;

            // Prevent the default click action
            event.preventDefault();

            // Reapply the checked state (in case it was unchecked)
            fastDetectionCheckbox.checked = wasChecked;

            // Manually trigger a change event to ensure form validation
            const changeEvent = new Event('change', { bubbles: true });
            fastDetectionCheckbox.dispatchEvent(changeEvent);
        });
    }
});

// add overlays and 
document.addEventListener('DOMContentLoaded', function() {
    var fields = [
		{ selector: '[name="carbon_fields_compact_input[_wuadblockguard_custom_load_js_enable]"]', type: 'checkbox' },
		{ selector: '[name="carbon_fields_compact_input[_wuadblockguard_custom_css_class]"]', type: 'text' },
		{ selector: '[name="carbon_fields_compact_input[_wuadblockguard_custom_css_id]"]', type: 'text' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_remote_detection]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_network_detection]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_hide_from_crawlers]"]', type: 'textarea' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_prevent_masquerading]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_disable_demo_reminder]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_live_easylist]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_easylist_url]"]', type: 'text' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_ignore_urls]"]', type: 'textarea' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_special_pages_check]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_special_pages][]"]', type: 'multiselect' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_pages_check]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_pages][]"]', type: 'multiselect' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_posts]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_categories][]"]', type: 'multiselect' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_tags][]"]', type: 'multiselect' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_woocommerce]"]', type: 'checkbox' },
        { selector: '[name="carbon_fields_compact_input[_wuadblockguard_exclude_woocommerce_pages][]"]', type: 'multiselect' }
    ];

    var proFeatureMessage = typeof customAdminData !== 'undefined' ? customAdminData.proFeatureMessage : __('Pro Feature', 'ad-block-guard');

    function disableField(field) {
        var elements = document.querySelectorAll(field.selector);

        elements.forEach(function(element) {
            element.disabled = true;

            var parentDiv = element.closest('.cf-field');
            if (parentDiv) {
                parentDiv.classList.add('disabled');
                parentDiv.setAttribute('data-pro-feature-message', proFeatureMessage);
                parentDiv.classList.add('disabled');

                // Append a disabled message below the checkbox label
                if (field.type === 'checkbox') {
                    var checkboxLabel = parentDiv.querySelector('.cf-checkbox__label');
                    if (checkboxLabel && !parentDiv.querySelector('.pro-feature-message')) {
                        var message = document.createElement('span');
                        message.className = 'pro-feature-message';
                        message.style.setProperty('color', 'var(--color-tooltip-bg)');
                        message.style.marginLeft = '10px';
                        message.textContent = ` (${proFeatureMessage})`;
                        checkboxLabel.appendChild(message);
                    }
                }

                // Change background color on hover
                parentDiv.addEventListener('mouseenter', function() {
                    parentDiv.style.backgroundColor = 'var(--color-light-red)';
                });
                parentDiv.addEventListener('mouseleave', function() {
                    parentDiv.style.backgroundColor = '';  // Reset background color when not hovered
                });
            }

            // Additional handling for checkboxes
            if (field.type === 'checkbox') {
                element.checked = false;  // Uncheck the checkbox if it's a checkbox type
            }

            // Special handling for multiselect fields
            if (field.type === 'multiselect') {
                var multiselectContainer = parentDiv.querySelector('.cf-multiselect__control');
                if (multiselectContainer) {
                    multiselectContainer.classList.add('disabled');
                    multiselectContainer.style.pointerEvents = 'none';  // Disable interactions with the multiselect

                    // Optionally, you could display the pro message somewhere within the multiselect container
                    if (!multiselectContainer.querySelector('.pro-feature-message')) {
                        var message = document.createElement('span');
                        message.className = 'pro-feature-message';
                        message.style.setProperty('color', 'var(--color-tooltip-bg)');
                        message.style.marginLeft = '10px';
                        message.textContent = ` (${proFeatureMessage})`;
                        multiselectContainer.appendChild(message);
                    }
                }
            }
        });
    }

    function applyFieldDisabling() {
        fields.forEach(disableField);
    }

    applyFieldDisabling();

    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                applyFieldDisabling();
            }
        });
    });

    observer.observe(document.body, { childList: true, subtree: true });
});


jQuery(document).ready(function($) {
    // Disable the checkbox for specific tabs, add Pro feature text, and update tab font color
    $('.cf-checkbox__input[name*="_overlay_enabled"]').each(function() {
        var groupBody = $(this).closest('.cf-complex__group-body');
        var tabTitle = groupBody.find('input[name*="_usergroup"]').val().toLowerCase();

        if (tabTitle !== 'guest' && tabTitle !== 'administrator') {
            $(this).prop('disabled', true); // Disable the checkbox
            $(this).closest('.cf-field__body').append('<div class="pro-feature-text" style="color: var(--color-tooltip-bg); font-style: italic;"> [' + __('This is a Pro feature.', 'ad-block-guard') + ']</div>');

            // Find the corresponding tab and change its font color to --color-tooltip-bg
            $('.cf-complex__tabs-item').each(function() {
                var tabText = $(this).find('.cf-complex__tabs-title').text().trim().toLowerCase();
                if (tabText === tabTitle) {
                    $(this).find('.cf-complex__tabs-title').css('color', 'var(--color-tooltip-bg)');
                }
            });
        }
    });

    // Handle click on the entire .cf-field element
    $(document).on('click', '.cf-field.cf-checkbox', function(e) {
        var checkbox = $(this).find('.cf-checkbox__input[name*="_overlay_enabled"]');
        if (checkbox.prop('disabled')) {
            e.preventDefault(); // Prevent any default action
            alert(__("Sorry, this is a pro feature.", 'ad-block-guard'));
        }
    });
});

jQuery(document).ready(function($) {

    // Function to handle Pro feature tabs
    function handleProFeatureTabs() {
        $('.cf-checkbox__input[name*="_overlay_enabled"]').each(function() {
            var groupBody = $(this).closest('.cf-complex__group-body');
            var tabTitle = groupBody.find('input[name*="_usergroup"]').val().toLowerCase();

            if (tabTitle !== 'guest' && tabTitle !== 'administrator') {
                addProFeatureTooltip(tabTitle);
            }
        });
    }

    // Function to add Pro feature tooltip
    function addProFeatureTooltip(tabTitle) {
        $('.cf-complex__tabs-item').each(function() {
            var tabText = $(this).find('.cf-complex__tabs-title').text().trim().toLowerCase();
            if (tabText === tabTitle) {
                $(this).addClass('pro-feature')
                       .attr('data-pro-feature-message', __("This is a Pro feature.", 'ad-block-guard'));
            }
        });

        // Hover effect for Pro feature tabs
        $('.cf-complex__tabs-item.pro-feature').hover(
            function() {
                var tooltipMessage = $(this).attr('data-pro-feature-message');
                $('<div class="tooltip">' + tooltipMessage + '</div>').appendTo('body').fadeIn('slow');
            },
            function() {
                $('.tooltip').remove(); // Remove tooltip on mouse out
            }
        ).mousemove(function(e) {
            var mouseX = e.pageX + 15; // X coordinate of the mouse pointer
            var mouseY = e.pageY + 15; // Y coordinate of the mouse pointer
            $('.tooltip').css({
                top: mouseY + 'px',
                left: mouseX + 'px'
            });
        });
    }

    // Initial Pro feature handling
    handleProFeatureTabs();

    // Reapply Pro feature handling when tabs are clicked
    $(document).on('click', '.cf-complex__tabs-item', function() {
        setTimeout(function() {
            handleProFeatureTabs();
        }, 100);  // Delay to ensure checkbox state has been updated
    });
});



// TinyMCE Text tab removal
document.addEventListener('DOMContentLoaded', function () {
    // Function to remove the editor tabs and tools
    function removeEditorTabsAndTools() {
        document.querySelectorAll('.wp-editor-tabs').forEach(function (tabs) {
            tabs.remove();
        });
        document.querySelectorAll('.wp-editor-tools').forEach(function (tools) {
            tools.remove();
        });
    }

    // Initial removal on page load
    removeEditorTabsAndTools();

    // Set up a MutationObserver to watch for DOM changes
    const observer = new MutationObserver(function (mutationsList) {
        for (const mutation of mutationsList) {
            if (mutation.type === 'childList') {
                // Reapply the removal logic if new nodes are added
                removeEditorTabsAndTools();
            }
        }
    });

    // Observe the body or a more specific container for changes
    observer.observe(document.body, { childList: true, subtree: true });
});

