function initOverlayHighlightTabs() {
    jQuery(document).ready(function($) {
        // Select all checkboxes for overlay-enabled usergroup settings.
        // This selector picks any input whose name starts with the usergroup settings and ends with [_overlay_enabled].
        var overlayCheckboxes = $('input[name^="carbon_fields_compact_input[_wuadblockguard_usergroup_settings]"]')
            .filter(function() {
                return $(this).attr('name').indexOf('[_overlay_enabled]') !== -1;
            });
        
        // Function to update the tab backgrounds based on the checkboxes.
        function updateTabsHighlight() {
            // Assume that the corresponding tabs are the <li> elements within the tab list container.
            // (Adjust the selector if your markup structure is different.)
            var tabs = $('.cf-complex__tabs-list li');
            
            overlayCheckboxes.each(function(index) {
                var $checkbox = $(this);
                // Optionally, you could add a console log here to check the mapping.
                var $tab = tabs.eq(index);
                if ($checkbox.is(':checked')) {
                    $tab.css('background-color', 'white');
                } else {
                    $tab.css('background-color', 'var(--color-light-red)');
                }
            });
        }
        
        // Update the highlighting when the document is ready.
        updateTabsHighlight();
        
        // Also update whenever one of these checkboxes changes.
        overlayCheckboxes.on('change', updateTabsHighlight);
    });
}

// To initialize the overlay highlight functionality, call:
initOverlayHighlightTabs();
