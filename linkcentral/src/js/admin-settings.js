(function($) {
    $(document).ready(function() {
        // Handle tab clicks
        $('.linkcentral-pagestyles .nav-tab-wrapper a').on('click', function(e) {
            e.preventDefault();
            var tabId = $(this).attr('href').substring(1);
            showActiveTab(tabId, true);
        });

        // Function to show the active tab
        function showActiveTab(tab, updateUrl = false) {
            $('.linkcentral-pagestyles .nav-tab-wrapper a').removeClass('nav-tab-active');
            $('.linkcentral-pagestyles .nav-tab-wrapper a[href="#' + tab + '"]').addClass('nav-tab-active');
            $('.linkcentral-pagestyles .linkcentral-tab-content').hide();
            $('.linkcentral-pagestyles #' + tab).show();
            $('.linkcentral-pagestyles #active_tab').val(tab);

            if (updateUrl) {
                // Update URL without causing page jump
                history.pushState(null, '', '#' + tab);
            }
        }

        // Check if there's a hash in the URL and set the active tab accordingly
        function checkHash() {
            var hash = window.location.hash.substring(1);
            if (hash && $('#' + hash).length) {
                showActiveTab(hash);
            } else {
                // Set initial active tab based on hidden input or default to 'linkcentral-general'
                var activeTab = $('.linkcentral-pagestyles #active_tab').val() || 'linkcentral-general';
                showActiveTab(activeTab);
            }
        }

        // Initial check
        checkHash();

        // Listen for popstate events (back/forward browser navigation)
        $(window).on('popstate', checkHash);

        // Handle clicks on links with hash
        $('a[href^="#"]').on('click', function(e) {
            var tabId = $(this).attr('href').substring(1);
            if ($('#' + tabId).length) {
                e.preventDefault();
                showActiveTab(tabId, true);
            }
        });

        // Function to toggle tracking settings based on Disable Reporting checkbox
        // This function disables checkboxes to prevent interaction and submission when Disable Reporting is checked
        function toggleTrackingSettings() {
            var disableReporting = $('#linkcentral_disable_reporting').is(':checked');
            var trackingFields = [
                '#linkcentral_track_ip',
                '#linkcentral_track_user_agent',
                '#linkcentral_track_unique_visitors',
                '#linkcentral_excluded_ips',
                'input[name="linkcentral_excluded_roles[]"]',
                '#linkcentral_exclude_bots',
                '#linkcentral_enable_ga',
                '#linkcentral_ga_measurement_id',
                '#linkcentral_ga_api_secret'
            ];

            trackingFields.forEach(function(selector) {
                $(selector).prop('disabled', disableReporting);
            });

            var trackingRows = [
                '#linkcentral_track_ip',
                '#linkcentral_track_user_agent',
                '#linkcentral_track_unique_visitors',
                '#linkcentral_excluded_ips',
                'input[name="linkcentral_excluded_roles[]"]',
                '#linkcentral_exclude_bots',
                '#linkcentral_enable_ga'
            ];

            trackingRows.forEach(function(selector) {
                $(selector).closest('tr, div').css('opacity', disableReporting ? 0.4 : 1);
            });
        }

        // Initial call to set the state based on the current checkbox value
        toggleTrackingSettings();

        // Event listener for changes in the Disable Reporting checkbox
        $('#linkcentral_disable_reporting').on('change', toggleTrackingSettings);

        // Function to update the prefix example text based on the selected or custom value
        function updatePrefixExample() {
            var selectedValue = $('#linkcentral_url_prefix_select').val();
            if (selectedValue === 'custom') {
                selectedValue = $('#linkcentral_url_prefix').val();
            }
            $('#prefix-example').text(selectedValue);
        }

        // Event listener for changes in the URL prefix select dropdown
        $('#linkcentral_url_prefix_select').on('change', updatePrefixExample);
        // Event listener for input changes in the custom URL prefix text field
        $('#linkcentral_url_prefix').on('input', updatePrefixExample);
        // Initial update of the prefix example text
        updatePrefixExample();
        
        // Show or hide the custom URL prefix input based on the selected value
        $('#linkcentral_url_prefix_select').on('change', function() {
            if ($(this).val() === 'custom') {
                $('#linkcentral_url_prefix').show().focus();
            } else {
                $('#linkcentral_url_prefix').hide().val($(this).val());
            }
        });

        // Initialize the visibility of the custom URL prefix input
        if ($('#linkcentral_url_prefix_select').val() === 'custom') {
            $('#linkcentral_url_prefix').show();
        }

        // Enable or disable the data expiry period select based on the checkbox state
        $('input[name="linkcentral_enable_data_expiry"]').on('change', function() {
            $('select[name="linkcentral_data_expiry_days"]').prop('disabled', !$(this).is(':checked'));
        });

        // Accordion functionality
        $('.linkcentral-accordion-header').click(function() {
            $(this).toggleClass('linkcentral-accordion-active');
            $(this).next('.linkcentral-accordion-content').slideToggle();
        });

        
        /* 
         * Toggle Rows
         */
        // Generic function to toggle configuration rows
        function toggleConfigRows(targetSelector, show) {
            var $rows = $(targetSelector).closest('tr');
            if (show) {
                $rows.show();
            } else {
                $rows.hide();
            }
        }

        // Function to handle visibility of configuration links and rows
        function handleConfigVisibility(triggerElement, showConfig) {
            var $configLink = $(triggerElement).siblings('.linkcentral-configure-link');
            var targetSelector = $configLink.data('toggle-rows');
            
            if (showConfig) {
                $configLink.show();
            } else {
                $configLink.hide().removeClass('linkcentral-active');
                toggleConfigRows(targetSelector, false);
            }
        }

        // Event listener for changes in select dropdowns that have configuration options
        $('select').each(function() {
            var $select = $(this);
            var $configLink = $select.siblings('.linkcentral-configure-link');
            
            if ($configLink.length) {
                $select.on('change', function() {
                    var selectedValue = $(this).val();
                    var showConfig = selectedValue === $configLink.data('target');
                    handleConfigVisibility(this, showConfig);
                });
                
                // Initial setup
                $select.trigger('change');
            }
        });

        // Event listener for checkboxes that have configuration options
        $('input[type="checkbox"]').each(function() {
            var $checkbox = $(this);
            var $configLink = $checkbox.siblings('.linkcentral-configure-link');
            
            if ($configLink.length) {
                $checkbox.on('change', function() {
                    handleConfigVisibility(this, $(this).is(':checked'));
                });
                
                // Initial setup
                $checkbox.trigger('change');
            }
        });

        // Toggle visibility of specified rows
        $('.linkcentral-configure-link').on('click', function(e) {
            e.preventDefault();
            var targetSelector = $(this).data('toggle-rows');
            $(this).toggleClass('linkcentral-active');
            toggleConfigRows(targetSelector, $(this).hasClass('linkcentral-active'));
        });


        /* 
         * Country Tracking
         */
        

    });
})(jQuery);