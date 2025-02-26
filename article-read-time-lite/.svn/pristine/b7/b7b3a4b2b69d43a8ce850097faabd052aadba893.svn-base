jQuery(document).ready(function ($) {

    /**
     * Tab show and hide
     */
    $('.artl-wrap .nav-tab').click(function () {
        var settings_ref = $(this).data('settings-ref');
        $('.artl-wrap .nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.artl-settings-section').hide();
        $('.artl-settings-section[data-settings-ref="' + settings_ref + '"]').show();
        if (settings_ref == 'help' || settings_ref == 'about') {
            $('.artl-settings-action').hide();
        } else {
            $('.artl-settings-action').show();
        }

    });
    $('.artl-colorpicker').wpColorPicker();
    /**
     * Template Preview Toggle
     */
    $('.artl-display-type-dropdown').change(function () {
        var display_type = $(this).val();
        if (display_type != 'paragraph') {
            $('.artl-paragraph-ref').hide();
            $('.artl-block-ref').show();


        } else {

            $('.artl-block-ref').hide();
            $('.artl-paragraph-ref').show();

        }

    });


    $("#artl-basic-status").change(function () {
        
        if (this.checked) {

            $('.artl-basic-wrap').show();
        } else {

            $('.artl-basic-wrap').hide();
        }
    });

    $("#artl-img-status").change(function () {
        
        if (this.checked) {

            $('.artl-img-wrap').show();
        } else {

            $('.artl-img-wrap').hide();
        }
    });

    $("#artl-progress-status").change(function () {
        if (this.checked) {

            $('.artl-progress-wrap').show();
        } else {

            $('.artl-progress-wrap').hide();
        }
    });

    $("#artl-word").change(function () {
        if (this.checked) {

            $('.artl-word-wrap').show();
        } else {

            $('.artl-word-wrap').hide();
        }
    });

    $("#artl-char").change(function () {
        if (this.checked) {

            $('.artl-char-wrap').show();
        } else {

            $('.artl-char-wrap').hide();
        }
    });
    $("#artl-read").change(function () {
        if (this.checked) {

            $('.artl-read-wrap').show();
        } else {

            $('.artl-read-wrap').hide();
        }
    });
    /**
     * Paragraph Dropdown event
     * */
    $('.artl-template-dropdown-paragraph').change(function () {
        var template = $(this).val();


        $('.artl-each-template-preview-paragraph').hide();
        $('.artl-each-template-preview-paragraph[data-template-ref="' + template + '"]').show();



    });
    /**
     * Block template dropdown event
     */
    $('.artl-template-dropdown-block').change(function () {
        var template = $(this).val();
        $('.artl-each-template-preview-block').hide();
        $('.artl-each-template-preview-block[data-template-ref="' + template + '"]').show();


    });



    /**
     * Progress Bar Display Position event
     */
    $('.artl-display-position-dropdown').change(function () {
        var display_position = $(this).val();
        if (display_position != 'none') {

            $('.artl-normal-ref').show();
            $('.artl-progress-bar-thickness').show();
            $('.artl-display-style').show();

        } else {

            $('.artl-normal-ref').hide();

            $('.artl-progress-bar-thickness').hide();
            $('.artl-display-style').hide();

        }

    });

    $('body').on('change', '.artl-toggle-trigger', function () {

        var toggle_ref = $(this).val();
        var toggle_class = $(this).data('toggle-class');
        $('.' + toggle_class).hide();
        $('.' + toggle_class + '[data-toggle-ref="' + toggle_ref + '"]').show();

    });


    $('.artl-field input[type="checkbox"]').each(function () {
        if (!$(this).parent().hasClass('artl-checkbox-toggle') && !$(this).hasClass('stdl-disable-checkbox-toggle')) {
            var input_name = $(this).attr('name');
            $(this).parent().addClass('artl-checkbox-toggle');
            $('<label></label>').insertAfter($(this));
        }
    });


});