jQuery(document).ready(function($) {
    if (!$('#admin-error-widget').length) {
        return;
    }

    const widget = $('#admin-error-widget');
    const windowWidth = $(window).width();
    const windowHeight = $(window).height();

    const isCollapsed = localStorage.getItem('adminErrorWidgetCollapsed') === 'true';
    if (isCollapsed) {
        widget.addClass('collapsed');
        widget.css('height', '50px');
        $('#toggle-widget-view').find('.dashicons')
            .removeClass('dashicons-arrow-up-alt2')
            .addClass('dashicons-arrow-down-alt2');
    }

    // Make widget draggable with constraints
    widget.draggable({
        handle: '.error-widget-header',
        containment: 'window',
        drag: function(event, ui) {
            // Ensure widget stays within viewport bounds
            ui.position.top = Math.max(0, ui.position.top);
            ui.position.top = Math.min(windowHeight - $(this).height(), ui.position.top);
            ui.position.left = Math.max(0, ui.position.left);
            ui.position.left = Math.min(windowWidth - $(this).width(), ui.position.left);
            
            // Maintain widget dimensions
            $(this).css({
                width: '360px',
                maxWidth: '90vw'
            });
        }
    });

    // Toggle widget visibility with animation
    $('#toggle-widget-view').on('click', function() {
        widget.toggleClass('collapsed');
        
        const icon = $(this).find('.dashicons');
        if (widget.hasClass('collapsed')) {
            icon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
            widget.css('height', '50px'); // Collapsed height
            localStorage.setItem('adminErrorWidgetCollapsed', 'true');
        } else {
            icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
            widget.css('height', 'auto'); // Restore height
            localStorage.setItem('adminErrorWidgetCollapsed', 'false');
        }
        updateErrorBadge();
    });

    // Function to format timestamp
    function formatLastUpdated(date) {
        const now = new Date();
        const diff = Math.floor((now - date) / 1000); // difference in seconds

        if (diff < 60) return 'Just now';
        if (diff < 3600) return Math.floor(diff / 60) + ' minutes ago';
        if (diff < 86400) return Math.floor(diff / 3600) + ' hours ago';
        return date.toLocaleDateString();
    }

    // Function to refresh error logs
    function refreshWidgetLogs() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'display_error_log'
            },
            success: function(response) {
                $('#widget-error-container').html(response);
                updateErrorCount();
                $('#widget-last-updated').text(formatLastUpdated(new Date()));
            },
            error: function(xhr, status, error) {
                console.error('Error refreshing logs:', error);
                $('#widget-error-container').html('<div class="error-message">Error loading logs. Please try again.</div>');
            }
        });
    }

    // Function to update error count
    function updateErrorCount() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_error_count'
            },
            success: function(response) {
                $('#widget-error-count').text(response);
            },
            error: function(xhr, status, error) {
                console.error('Error updating count:', error);
                $('#widget-error-count').text('--');
            }
        });
    }

    // Clean logs with confirmation
    $('#clean-widget-log').on('click', function() {
        // if (confirm('Are you sure you want to clean the error log?')) {}
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'clean_debug_log'
            },
            success: function(response) {
                refreshWidgetLogs();
            },
            error: function(xhr, status, error) {
                console.error('Error cleaning logs:', error);
                alert('Error cleaning logs. Please try again.');
            }
        });
    });

    // Refresh button click handler with rotation animation
    $('#refresh-widget-log').on('click', function() {
        const icon = $(this).find('.dashicons');
        icon.addClass('rotating');
        refreshWidgetLogs();
        setTimeout(() => icon.removeClass('rotating'), 1000);
    });

    // Save widget position with bounds checking
    widget.on('dragstop', function(event, ui) {
        const position = {
            top: Math.max(0, Math.min(ui.position.top, windowHeight - $(this).height())),
            left: Math.max(0, Math.min(ui.position.left, windowWidth - $(this).width()))
        };
        
        localStorage.setItem('adminErrorWidgetPosition', JSON.stringify(position));
    });

    // Restore widget position with viewport checking
    const savedPosition = localStorage.getItem('adminErrorWidgetPosition');
    if (savedPosition) {
        try {
            const position = JSON.parse(savedPosition);
            
            // Ensure restored position is within current viewport
            position.top = Math.max(0, Math.min(position.top, windowHeight - widget.height()));
            position.left = Math.max(0, Math.min(position.left, windowWidth - widget.width()));
            
            widget.css(position);
        } catch (e) {
            console.error('Error restoring widget position:', e);
            localStorage.removeItem('adminErrorWidgetPosition');
        }
    }

    // Handle window resize
    $(window).resize(function() {
        const widgetPos = widget.position();
        const newWindowWidth = $(window).width();
        const newWindowHeight = $(window).height();
        
        // Adjust position if widget is outside viewport
        if (widgetPos.left + widget.width() > newWindowWidth) {
            widget.css('left', newWindowWidth - widget.width() - 20);
        }
        if (widgetPos.top + widget.height() > newWindowHeight) {
            widget.css('top', newWindowHeight - widget.height() - 20);
        }
    });

    // Add error count badge when collapsed
    function updateErrorBadge() {
        const errorCount = $('#widget-error-count').text();
        if (widget.hasClass('collapsed') && errorCount > 0) {
            if (!$('.error-badge').length) {
                widget.append(`<div class="error-badge">${errorCount}</div>`);
            } else {
                $('.error-badge').text(errorCount);
            }
        } else {
            $('.error-badge').remove();
        }
    }

    // Watch for error count changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.target.id === 'widget-error-count') {
                updateErrorBadge();
            }
        });
    });

    observer.observe(document.getElementById('widget-error-count'), {
        characterData: true,
        childList: true,
        subtree: true
    });

    // Initial load
    refreshWidgetLogs();

    // Auto refresh every 30 seconds
    setInterval(refreshWidgetLogs, 30000);

    // Add CSS for error badge
    $('<style>')
        .text(`
            .error-badge {
                position: absolute;
                top: -4px;  
                right: 0px;
                background: #d63638;
                color: white;
                border-radius: 50%;
                padding: 2px 6px;
                font-size: 12px;
                font-weight: bold;
                display: none;
            }
            .admin-error-widget.collapsed .error-badge {
                display: block;
            }
            @keyframes rotate {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            .rotating {
                animation: rotate 1s linear infinite;
            }
        `)
        .appendTo('head');
});