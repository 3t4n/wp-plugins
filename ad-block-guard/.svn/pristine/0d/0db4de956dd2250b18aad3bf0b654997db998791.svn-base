// Ensure wp.i18n is loaded for translation
const { __ } = wp.i18n;

// remembers clicks and allows linking
// select checkboxes and change x or check mark in tab to match (visual indicator to user that it's enabled or not)
// only targeted to the sub-tabs, not the "button" tabs
(function($) {
    $(document).ready(function() {

        // Function to update the tab icons based on checkbox state
        function updateTabIcons() {
            $('.cf-complex__tabs-item').each(function() {
                var tab = $(this);
                var tabTitle = tab.find('.cf-complex__tabs-title').text().trim().toLowerCase();

                // Find the corresponding checkbox using the usergroup value
                var checkbox = $('.cf-complex__group-body').find('input[name*="_usergroup"][value="' + tabTitle + '"]').closest('.cf-complex__group-body').find('input[name*="_overlay_enabled"]');

                var iconHtml = checkbox.prop('checked') ? '<span class="dashicons dashicons-visibility"></span>' : '<span class="dashicons dashicons-hidden"></span>';

                if (checkbox.length > 0) {
                    // Update the tab icon
                    updateTabIcon(tab, iconHtml);

                    // Update the checkbox icon
                    updateCheckboxIcon(checkbox, iconHtml);
                }
            });
        }

        // Function to update the tab icon
        function updateTabIcon(tab, iconHtml) {
            if (tab.find('.tab-icon').length === 0) {
                tab.find('.cf-complex__tabs-title').append(' <span class="tab-icon">' + iconHtml + '</span>');
            } else {
                tab.find('.tab-icon').html(iconHtml);
            }
        }

        // Function to update the checkbox icon
        function updateCheckboxIcon(checkbox, iconHtml) {
            var checkboxContainer = checkbox.closest('.cf-field__body');
            checkboxContainer.find('.checkbox-icon').remove();
            checkboxContainer.find('label.cf-checkbox__label').after('<span class="checkbox-icon">' + iconHtml + '</span> ');
        }

        // Initial icon update
        updateTabIcons();

        // Update icons when the checkbox changes
        $(document).on('change', '.cf-checkbox__input[name*="_overlay_enabled"]', function() {
            updateTabIcons();
        });

        // Also call updateTabIcons when tabs are clicked to ensure they are up to date
        $(document).on('click', '.cf-complex__tabs-item', function() {
            setTimeout(function() {
                updateTabIcons();
            }, 100);  // Delay to ensure checkbox state has been updated
        });

        // Primary Tab Logic
        if ($('.cf-container__tabs-item').length) {
            var activeTabIndex = localStorage.getItem('wuadblockguard_active_tab_index');
            if (activeTabIndex !== null) {
                $('.cf-container__tabs-item').eq(activeTabIndex).find('button').click();
            }
            $('.cf-container__tabs-item button').on('click', function() {
                var tabIndex = $(this).closest('.cf-container__tabs-item').index();
                localStorage.setItem('wuadblockguard_active_tab_index', tabIndex);
                $('input[name="wuadblockguard_active_tab"]').val(tabIndex);
            });
        }

        // Horizontal Tab Logic with visibility icon
        $('.cf-complex__tabs--tabbed-horizontal').each(function() {
            var $tabContainer = $(this);
            var horizontalTabKey = $tabContainer.closest('.cf-complex__group-body').find('input[type="hidden"]').first().attr('id') + '_horizontal_tab_index';
            var savedTabTitle = localStorage.getItem(horizontalTabKey);

            if (savedTabTitle !== null) {
                $tabContainer.find('.cf-complex__tabs-item').each(function() {
                    var $tab = $(this);
                    var $icon = $tab.find('.tab-icon .dashicons');

                    if ($tab.find('.cf-complex__tabs-title').text().trim() === savedTabTitle) {
                        $tab.find('.cf-complex__tabs-title').click();

                        // Toggle visibility icon
                        if ($icon.hasClass('dashicons-hidden')) {
                            $icon.removeClass('dashicons-hidden').addClass('dashicons-visibility');
                        }
                        return false; // Exit loop once the correct tab is found
                    }
                });
            }

            $tabContainer.find('.cf-complex__tabs-item').on('click', function() {
                var tabTitle = $(this).find('.cf-complex__tabs-title').text().trim();
                localStorage.setItem(horizontalTabKey, tabTitle);

                // Toggle visibility icon
                var $icon = $(this).find('.tab-icon .dashicons');
                if ($icon.hasClass('dashicons-hidden')) {
                    $icon.removeClass('dashicons-hidden').addClass('dashicons-visibility');
                } else {
                    $icon.removeClass('dashicons-visibility').addClass('dashicons-hidden');
                }

                // Ensure tab icons are updated after the click
                setTimeout(function() {
                    updateTabIcons();
                }, 100);
            });
        });

        // Handle 'tab' query parameter
        const urlParams = new URLSearchParams(window.location.search);
        const targetTab = urlParams.get('tab');

        if (targetTab) {
            // Find the tab with the corresponding name and simulate a click to activate it
            $('.cf-complex__tabs-item').each(function() {
                var $tab = $(this);
                var $icon = $tab.find('.tab-icon .dashicons');

                if ($tab.find('.cf-complex__tabs-title').text().trim().toLowerCase() === targetTab.toLowerCase()) {
                    $tab.find('.cf-complex__tabs-title').click();

                    // Toggle visibility icon
                    if ($icon.hasClass('dashicons-hidden')) {
                        $icon.removeClass('dashicons-hidden').addClass('dashicons-visibility');
                    }

                    // Ensure tab icons are updated after the click
                    setTimeout(function() {
                        updateTabIcons();
                    }, 100);
                    
                    return false; // Exit loop once the correct tab is found
                }
            });
        }
    });
})(jQuery);

// demo linkingn with role
(function($) {
    $(document).ready(function() {
        // Attach click event to the Demo button
        $('a.thickbox.button-info').on('click', function(e) {
            // Prevent the default behavior
            e.preventDefault();

            // Find the closest input field above this button
            var usergroup = $(this).closest('.cf-field').prevAll('.cf-field.cf-text').first().find('input[readonly]').val().trim();

            // If usergroup is found, append it to the href
            if (usergroup) {
                var newHref = $(this).attr('href').split('&role=')[0] + '&role=' + encodeURIComponent(usergroup);
                $(this).attr('href', newHref);

                // Open the thickbox with the new URL
                tb_show($(this).attr('title'), newHref);
            }
        });
    });
})(jQuery);






