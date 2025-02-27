document.addEventListener('DOMContentLoaded', function (e) {
    // Single Row Subheading
    jQuery('.white-label-subheading').each(function (index, element) {
        var $element = jQuery(element);
        var $element_parent = $element.parent('td');
        $element_parent.attr('colspan', 2);
        $element_parent.prev('th').remove();
    });

    // Single Row Grouping
    jQuery('.white-label-grouping').each(function (index, element) {
        var $element = jQuery(element);
        var $element_parent = $element.parent('td');
        $element_parent.attr('colspan', 2);
        $element_parent.prev('th').remove();
    });

    // Modify Settings Tables
    const settings_tables = ['admin_welcome_panel_content', 'admin_remove_dashboard_widgets', 'admin_widget_content', 'admin_custom_dashboard_content', 'hidden_plugins', 'elementor_editor_navigation', 'gravity_forms_settings_panels', 'hidden_themes', 'sidebar_menus', 'hidden_admin_bar_nodes_backend', 'hidden_admin_bar_nodes_frontend', 'admin_footer_credit'];
    settings_tables.forEach((setting) => {
        jQuery('tr.' + setting + ' th').remove();
        jQuery('tr.' + setting + ' > td:first-of-type').attr('colspan', 2);
        jQuery('tr.' + setting + ' > td:first-of-type').css('padding', '0');
    });

    // Initiate Color Picker
    jQuery('.wp-color-picker-field').wpColorPicker();

    // Switches option sections
    jQuery('.group').hide();
    var banana_activetab = '';
    if (typeof(localStorage) != 'undefined' ) {
        banana_activetab = localStorage.getItem("banana_activetab");
    }

    //if url has section id as hash then set it as active or override the current local storage value
    if(window.location.hash){
        banana_activetab = window.location.hash;
        if (typeof(localStorage) != 'undefined' ) {
            localStorage.setItem("banana_activetab", banana_activetab);
        }
    }

    if (banana_activetab != '' && jQuery(banana_activetab).length ) {
        jQuery(banana_activetab).fadeIn(100);
    } else {
        jQuery('.group:first').fadeIn(100);
    }

    jQuery('.group .collapsed').each(function(){
        jQuery(this).find('input:checked').parent().parent().parent().nextAll().each(
        function(){
            if (jQuery(this).hasClass('last')) {
                jQuery(this).removeClass('hidden');
                return false;
            }
            jQuery(this).filter('.hidden').removeClass('hidden');
        });
    });

    if (banana_activetab != '' && jQuery(banana_activetab + '-tab').length ) {
        jQuery(banana_activetab + '-tab').addClass('active');
    }
    else {
        jQuery('#white-label-pane-left ul li:first').addClass('active');
    }

    jQuery('#white-label-pane-left ul li a').click(function(evt) {
        jQuery('#white-label-pane-left ul li').removeClass('active');
        jQuery(this).parent('li').addClass('active').blur();
        var clicked_group = jQuery(this).attr('href');
        if (typeof(localStorage) != 'undefined' ) {
            localStorage.setItem("banana_activetab", jQuery(this).attr('href'));
        }
        jQuery('.group').hide();
        jQuery(clicked_group).fadeIn(100);

        evt.preventDefault();
    });

    jQuery('.wpsa-browse').on('click', function (event) {
        event.preventDefault();

        var self = jQuery(this);

        // Create the media frame.
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: self.data('uploader_title'),
            button: {
                text: self.data('uploader_button_text'),
            },
            multiple: false
        });

        file_frame.on('select', function () {
            attachment = file_frame.state().get('selection').first().toJSON();
            self.prev('.wpsa-url').val(attachment.url).change();
        });

        // Finally, open the modal
        file_frame.open();
    });
});

jQuery(document).ready(function() {
    jQuery(document).on('click', 'a.wl-show-field', function(){
        var wl_plugin_details = jQuery(this).attr('data-wl-plugin-details');
        var is_hidden = jQuery('td#' + wl_plugin_details + ' div.wl-field').hasClass('hidden')

        if (is_hidden) {
            jQuery('td#' + wl_plugin_details + ' a.white-label-help').removeClass('hidden');
            jQuery('td#' + wl_plugin_details + ' div.wl-field').removeClass('hidden');
        } else {
            jQuery('td#' + wl_plugin_details + ' a.white-label-help').addClass('hidden');
            jQuery('td#' + wl_plugin_details + ' div.wl-field').addClass('hidden');
        }

        var wl_theme_details = jQuery(this).attr('data-wl-theme-details');
        var is_hidden = jQuery('td#' + wl_theme_details + ' div.wl-field').hasClass('hidden')

        if (is_hidden) {
            jQuery('td#' + wl_theme_details + ' a.white-label-help').removeClass('hidden');
            jQuery('td#' + wl_theme_details + ' div.wl-field').removeClass('hidden');
        } else {
            jQuery('td#' + wl_theme_details + ' a.white-label-help').addClass('hidden');
            jQuery('td#' + wl_theme_details + ' div.wl-field').addClass('hidden');
        }
    });

    // Select All
    jQuery('.white-label-select-all').change(function() {
        jQuery(this).closest('table').find('input[type="checkbox"]').prop('checked', jQuery(this).prop('checked'));
    });
    
    jQuery('input[type="checkbox"]').change(function() {
        var table = jQuery(this).closest('table');
        var checkboxes = table.find('input[type="checkbox"]');
        var select_all_checkbox = table.find('.white-label-select-all');

        if (!jQuery(this).prop('checked')) {
            select_all_checkbox.prop('checked', false);
        } else {
            select_all_checkbox.prop('checked', checkboxes.length === checkboxes.filter(':checked').length);
        }
    });
});