jQuery(document).ready(function($) {

    // random number generator
    function randomString(len, charSet) {
        charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var randomString = '';
        for (var i = 0; i < len; i++) {
            var randomPoz = Math.floor(Math.random() * charSet.length);
            randomString += charSet.substring(randomPoz, randomPoz + 1);
        }
        return randomString;
    }

    ///////////////// pricing tables listing page ////////////////////////
    $('.appts-shortcode-readonly > input[type="text"]').focus(function() {
        $(this).select();
    });

    // do the necessary actions according the data-action type for table listings
    $('.appts-table-action').on('click', function() {
        if (confirm($(this).data('confirm'))) {
            var $postid = $(this).data('postid'),
                    table_action = $(this).data('action_to_perform');
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'backend_ajax',
                    _action: table_action,
                    table_id: $postid,
                    _wpnonce: appts_backend_ajax.ajax_nonce
                },
                beforeSend: function() {
                    $('.appts-backend-ajax-loader-div').show();
                },
                complete: function() {
                    $('.appts-backend-ajax-loader-div').hide();
                },
                success: function(response) {
                    window.location.replace(response);
                }
            });
        }
    });

    ///////////////// pricing tables listing page ends ////////////////////////

    // tab actions
    $('.appts-tab').on('click', function() {
        $('.appts-tab').removeClass('appts-active');
        $(this).addClass('appts-active');
        var current_id = $(this).attr('id');
        $('.appts-tab-content').hide();
        $('.' + current_id).show();
        codeMirrorDisplay();
    });

    // select change option for dropdown change option ( template selections and template selection )
    $('.appts-img-selector').on('change', function() {
        var selected_img = $(this).find('option:selected').data('src');
        $(this).closest('.appts-input-wrap').find('.appts-img-selector-media img').attr('src', selected_img);
    });


    $('#appts-single-form').on('change', '.appts-ribbon-settings', function() {
        var selected_div = $(this).find('option:selected').data('select');
        if (selected_div == 'appts-text-sign') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
            $(this).closest('.appts-inner-tab-content').find('.appts-text-image-sign').show();
        }

        if (selected_div == 'appts--sign') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.appts-text-image-sign').hide();
        }
    });

    $('#appts-single-form').on('change', '.appts-price-settings', function() {
        var selected_div = $(this).find('option:selected').data('select');
        if (selected_div == 'appts-price') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-price-html') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
    });

    $('#appts-single-form').on('change', '.appts-custom-image-color-settings', function() {
        var selected_div = $(this).find('option:selected').data('select');
        if (selected_div == 'appts-bg-image') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-bg-color') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }

        if (selected_div == 'appts-none') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
        }
    });

    $('#appts-admin-main-wrapper').on('change', '.appts-row-option', function() {
        var selected_div = $(this).find('option:selected').data('select');
        if (selected_div == 'appts-html') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-button') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
    });

    $('#appts-admin-main-wrapper').on('change', '.appts-popup-content-selection-options', function() {
        var selected_div = $(this).find('option:selected').data('select');
        if (selected_div == 'appts-fontawesome') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-typicons') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-icomoon') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-material') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
        if (selected_div == 'appts-linecon') {
            $(this).closest('.appts-inner-tab-content').find('.appts-select-common-div').hide();
            $(this).closest('.appts-inner-tab-content').find('.' + selected_div).show();
        }
    });


    // checkbox selection hide show
    $('.appts-checkbox-option').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).closest('.appts-checkbox-selection-wrap').find(".appts-checkbox-options-show").show(); // checked
        } else {
            $(this).closest('.appts-checkbox-selection-wrap').find(".appts-checkbox-options-show").hide(); // unchecked
        }
    });

    // slide toggle function show/hide for table columns
    $('#appts-single-form').on('click', '.appts-column-header', function() {
        $(this).closest('.appts-settings-wrapper').find('.appts-column-content').slideToggle('slow', function() {
            $(this).closest('.appts-settings-wrapper').find('.appts-column-hide-show').toggleClass('appts-active', $(this).is(':visible'));
        });
    });

    $('#appts-single-form').on('click', '.appts-inner-tab-header-title', function() {
        $(this).closest('.appts-col-box').find('.appts-inner-tab-content').slideToggle('slow', function() {
            $(this).closest('.appts-col-box').find('.appts-inner-tab-header-title').toggleClass('appts-active', $(this).is(':visible'));
        });
    });


    // date picker
    $('#appts-single-form').on('focus', ".appts-date-time-picker", function() {
        $(this).datetimepicker({
            dateFormat: 'yy/mm/dd'
        });
    });

    //wordpress color picker action
    $('.appts-admin-main-wrapper').on('mouseenter mouseleave', ".appts-default-colorpicker", function() {
        $(this).wpColorPicker();
    });

    // media upload function
    // http://dobsondev.com/2015/01/23/using-the-wordpress-media-uploader/
    // http://stackoverflow.com/questions/20101909/wordpress-media-uploader-with-size-select
    $('.appts-admin-main-wrapper').on('click', '.appts-common-image-upload', function(e) {
        var mediaUploader;
        var $this = $(this);
        var container = $this.closest('.appts-image-upload').find('.appts-image-selection-append');

        $this.closest('.appts-image-upload').find('.appts-image-selection-append .appts-image-sizes-selection').remove();

        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Insert'
            },
            multiple: false
        });

        // When a file is selected, grab the image sizes URLs and set it as the select option fields
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            var sizes = typeof attachment.sizes !== 'undefined' ? attachment.sizes : null,
                    selectOptions = '';
            for (var x in sizes) {
                selectOptions += '<option value="' + sizes[x].url + '"' + (x == 'full' ? ' selected="selected"' : '') + '>' + x + ' (' + sizes[x].width + 'x' + sizes[x].height + ')</option>';
            }

            //generate html options to append
            if (selectOptions !== '') {
                var dropdown_selection = "<div class='appts-image-size-opt' style='margin-top:7px;'><select class='appts-image-sizes-selection'>" + selectOptions + "</select></div>";
                container.append(dropdown_selection);
            }
            $this.closest('.appts-image-upload').find('input[type=text]').val(attachment.url);
        });

        // Open the uploader dialog
        mediaUploader.open();
        e.preventDefault();
    });

    $('#appts-single-form').on('change', '.appts-image-sizes-selection', function() {
        var $image_url = $(this).val();
        $(this).closest('.appts-image-upload').find('input[type=text]').val($image_url);
    });

    $('#appts-single-form').on('click', function() {
        $('.appts-column-settings-columns-wrapper').sortable({
            items: '.appts-column-wrapper',
            handle: '.appts-column-header',
            tolerance: 'pointer',
            cursor: "move",
            update: function() {
                rearrangeColumnsIndex();
            }
        });

        $('.appts-settings-wrapper-body').sortable({
            items: '.appts-col-box',
            handle: '.appts-inner-tab-header-title',
            containment: 'parent',
            tolerance: 'pointer',
            cursor: "move",
        });

        $('.appts-column-footer-rows').sortable({
            items: '.appts-footer-col-box',
            containment: 'parent',
            handle: '.appts-inner-tab-header-title',
            tolerance: 'pointer',
            cursor: "move",
        });
    });




    // http://stackoverflow.com/questions/9374894/can-codemirror-find-textareas-by-class
    function codeMirrorDisplay() {
        var $codeMirrorEditors = $('.appts-common-textarea');
        $codeMirrorEditors.each(function(i, el) {
            var $active_element = $(el);
            if ($active_element.data('cm')) {
                $active_element.data('cm').doc.cm.toTextArea();
            }
            var codeMirrorEditor = CodeMirror.fromTextArea(el, {
                lineNumbers: true,
                lineWrapping: true,
                theme: 'eclipse'
            });
            $active_element.data('cm', codeMirrorEditor);
        });
    }

    function rearrangeColumnsIndex() {
        var column_outer_wrapper = $('#appts-single-form').find('.appts-columns-editor-outer-wrapper'),
                columns = column_outer_wrapper.find('.appts-column-wrapper');
        for (var i = 0; i < columns.length; i++) {
            var current_column = columns.eq(i);
            var all_inputs = current_column.find('[name*="appts-col-data"]');
            current_column.find('.appts-column-count').html('Column ' + (i + 1));
        }
    }

    $('.appts-add-new-column').on('click', function(e) {
        var $this = $(this),
                $parent = $this.closest('.appts-columns-editor-outer-wrapper').find('.appts-column-settings-columns-wrapper'),
                action = $this.data('action'),
                append_div = $parent.find('.appts-columns');

        if ($parent.find('.appts-column-wrapper').length <= 3) {
            if ($parent.find('.appts-column-wrapper').length) {
                var $clone = append_div.find('.appts-column-wrapper:last').clone();
                $('.appts-ajax-loaded-div').html($clone);
                var all_inputs = $('.appts-ajax-loaded-div').find('[name*="appts-col-data"]'),
                        data_column_index = $('.appts-ajax-loaded-div').find('data-column_index'),
                        random_string = randomString(10);
                $('.appts-ajax-loaded-div').find('.appts-col-box-add a').attr('data-column_index', random_string);
                for (var j = 0; j < all_inputs.length; j++) {
                    var current_input = all_inputs[j];
                    if (current_input.type !== undefined) {
                        current_input.setAttribute('name', current_input.getAttribute('name').replace(/appts-col-data\[([a-zA-Z0-9]+)?\]/g, 'appts-col-data[' + random_string + ']'));
                    }
                }
                $modified_div = $('.appts-ajax-loaded-div').html();
                $parent.find('.appts-columns').append($modified_div);
                $('.appts-ajax-loaded-div').html('');
                rearrangeColumnsIndex();
            } else {
                //add new column action using ajax since there is no column at all
                if (action == 'add_column') {
                    var action_to_perform = 'add_column';
                    $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'backend_ajax',
                            _action: action_to_perform,
                            _wpnonce: appts_backend_ajax.ajax_nonce
                        },
                        success: function(response) {
                            append_div.append(response);
                            rearrangeColumnsIndex();
                        }
                    });
                }
                e.preventDefault();
            }
            rearrangeColumnsIndex();
        } else {
            alert('Sorry. Maximum number of column exceeded.');
        }
    });

    $('#appts-single-form').on('click', '.appts-col-box-add a[data-action]', function(e) {
        var $this = $(this),
                action = $(this).data('action'),
                column_index = $(this).data('column_index');
        $outerwrapper = $this.closest('.appts-column-content').find('.appts-column-rows');
        var $outerwrapper_footer = $this.closest('.appts-column-content').find('.appts-column-footer-rows');
        if (action == 'add-row') {
            if ($outerwrapper.find('.appts-col-box').length <= 3) {
                if ($outerwrapper.find('.appts-col-box').length) {
                    var $orginal = $outerwrapper.find('.appts-col-box:last');
                    var cloned_row = $outerwrapper.find('.appts-col-box:last').clone();
                    var all_inputs = cloned_row.find('[name*="appts-col-data"]'),
                            random_string = randomString(10);
                    for (var j = 0; j < all_inputs.length; j++) {
                        var current_input = all_inputs[j];
                        if (current_input.type !== undefined) {
                            current_input.setAttribute('name', current_input.getAttribute('name').replace(/body\]\[([a-zA-Z0-9]+)?\]/g, 'body][' + random_string + ']'));
                        }
                    }

                    //get original selects into a object
                    var $originalSelects = $orginal.find('select');
                    cloned_row.find('select').each(function(index, item) {
                        //set new select to value of old select
                        $(item).val($originalSelects.eq(index).val());
                    });

                    //get original textareas into a object
                    var $originalTextareas = $orginal.find('textarea');
                    cloned_row.find('textarea').each(function(index, item) {
                        //set new textareas to value of old textareas
                        $(item).val($originalTextareas.eq(index).val());
                    });

                    $outerwrapper.append(cloned_row);

                } else {
                    var action_to_perform = 'add_row';
                    $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'backend_ajax',
                            _column_index: column_index,
                            _action: action_to_perform,
                            _wpnonce: appts_backend_ajax.ajax_nonce
                        },
                        success: function(response) {
                            $this.closest('.appts-column-content').find('.appts-column-rows').append(response);
                            rearrangeColumnsIndex();
                        }
                    });
                }
            } else {
                alert("Sorry. Maximum number of rows exceeded.");
                e.preventDefault();
            }
        } else if (action == 'add-footer-row') {
            if ($outerwrapper_footer.find('.appts-col-box').length <= 3) {
                if ($outerwrapper_footer.find('.appts-col-box').length) {
                    var $orginal = $outerwrapper_footer.find('.appts-col-box:last');
                    var cloned_row = $outerwrapper_footer.find('.appts-col-box:last').clone();
                    $('.appts-ajax-loaded-div').html(cloned_row);
                    var all_inputs = cloned_row.find('[name*="appts-col-data"]'),
                            random_string = randomString(10);
                    for (var j = 0; j < all_inputs.length; j++) {
                        var current_input = all_inputs[j];
                        if (current_input.type !== undefined) {
                            current_input.setAttribute('name', current_input.getAttribute('name').replace(/footer\]\[([a-zA-Z0-9]+)?\]/g, 'footer][' + random_string + ']'));
                        }
                    }

                    //get original selects into a jq object
                    var $originalSelects = $orginal.find('select');
                    cloned_row.find('select').each(function(index, item) {
                        //set new select to value of old select
                        $(item).val($originalSelects.eq(index).val());
                    });

                    //get original textareas into a jq object
                    var $originalTextareas = $orginal.find('textarea');
                    cloned_row.find('textarea').each(function(index, item) {
                        //set new textareas to value of old textareas
                        $(item).val($originalTextareas.eq(index).val());
                    });

                    $outerwrapper_footer.append(cloned_row);
                } else {
                    var action_to_perform = 'add_footer_row';
                    $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'backend_ajax',
                            _column_index: column_index,
                            _action: action_to_perform,
                            _wpnonce: appts_backend_ajax.ajax_nonce
                        },
                        success: function(response) {
                            $this.closest('.appts-column-content').find('.appts-column-footer-rows').append(response);
                        }
                    });
                }
            } else {
                alert("Sorry. Maximum number of rows exceeded.");
                e.preventDefault();
            }
        }

        e.preventDefault();
    });

    // do the necessary actions according  to the data-action type for column listings in the table editor
    $('.appts-admin-main-wrapper').on('click', '[data-action]', function(e) {
        var $this = $(this);
        var $outerwrapper = $this.closest('.appts-column-content').find('.appts-column-rows');
        var $outerwrapper_footer = $this.closest('.appts-column-content').find('.appts-column-footer-rows');

        //column copy action
        if ($(this).data('action') == 'copy-column') {
            if ($(this).closest('.appts-columns').find('.appts-column-wrapper').length <= 3) {
                // alert("copy here");
                if (confirm($(this).data('confirm'))) {
                    var $orginal = $(this).closest('.appts-column-wrapper');
                    var $clone = $(this).closest('.appts-column-wrapper').clone();
                    var all_inputs = $clone.find('[name*="appts-col-data"]'),
                            random_string = randomString(10);
                    for (var j = 0; j < all_inputs.length; j++) {
                        var current_input = all_inputs[j];
                        if (current_input.type !== undefined) {
                            current_input.setAttribute('name', current_input.getAttribute('name').replace(/appts-col-data\[([a-zA-Z0-9]+)?\]/g, 'appts-col-data[' + random_string + ']'));
                        }
                    }

                    //get original selects into a jq object
                    var $originalSelects = $orginal.find('select');
                    $clone.find('select').each(function(index, item) {
                        //set new select to value of old select
                        $(item).val($originalSelects.eq(index).val());
                    });

                    //get original textareas into a jq object
                    var $originalTextareas = $orginal.find('textarea');
                    $clone.find('textarea').each(function(index, item) {
                        //set new textareas to value of old textareas
                        $(item).val($originalTextareas.eq(index).val());
                    });

                    $('.appts-columns').append($clone);
                    // $('.appts-ajax-loaded-div').html('');
                    rearrangeColumnsIndex();
                    e.preventDefault();
                } else {
                    e.preventDefault();
                }
            } else {
                alert('Sorry. Maximum number of columns exceeded.');
                e.preventDefault();
            }
        }

        //column delete action
        if ($(this).data('action') == 'delete-column') {
            if (confirm($(this).data('confirm'))) {
                $(this).closest('.appts-column-wrapper').remove();
                rearrangeColumnsIndex();
            } else {
                e.preventDefault();
            }
        }

        // column's body row copy action
        if ($(this).data('action') == 'copy-row') {
            if (confirm($(this).data('confirm')) && ($(this).closest('.appts-column-content').find('.appts-col-box').length <= 3)) {
                var $outerwrapper = $this.closest('.appts-column-content').find('.appts-column-rows');
                var $orginal = $this.closest('.appts-col-box');
                var cloned_row = $this.closest('.appts-col-box').clone();
                var all_inputs = cloned_row.find('[name*="appts-col-data"]'),
                        random_string = randomString(10);
                for (var j = 0; j < all_inputs.length; j++) {
                    var current_input = all_inputs[j];
                    if (current_input.type !== undefined) {
                        current_input.setAttribute('name', current_input.getAttribute('name').replace(/body\]\[([a-zA-Z0-9]+)?\]/g, 'body][' + random_string + ']'));
                    }
                }

                //get original selects into a jq object
                var $originalSelects = $orginal.find('select');
                cloned_row.find('select').each(function(index, item) {
                    //set new select to value of old select
                    $(item).val($originalSelects.eq(index).val());
                });

                //get original textareas into a jq object
                var $originalTextareas = $orginal.find('textarea');
                cloned_row.find('textarea').each(function(index, item) {
                    //set new textareas to value of old textareas
                    $(item).val($originalTextareas.eq(index).val());
                });

                $outerwrapper.append(cloned_row);
                e.preventDefault();
            } else {
                alert("Sorry. Maximum number of rows exceeded.");
                e.preventDefault();
            }
        }

        // column's body row delete action
        if ($(this).data('action') == 'delete-row') {
            if (confirm($(this).data('confirm'))) {
                $(this).closest('.appts-col-box').remove();
                e.preventDefault();
            } else {
                e.preventDefault();
            }
        }

        // column's footer row copy action
        if ($(this).data('action') == 'copy-footer-row') {
            if (confirm($(this).data('confirm')) && $(this).closest('.appts-column-content').find('.appts-col-box').length <= 3) {
                var $outerwrapper = $this.closest('.appts-column-content').find('.appts-column-footer-rows');
                var $orginal = $this.closest('.appts-col-box');
                var cloned_row = $this.closest('.appts-col-box').clone();
                var all_inputs = cloned_row.find('[name*="appts-col-data"]'),
                        random_string = randomString(10);
                for (var j = 0; j < all_inputs.length; j++) {
                    var current_input = all_inputs[j];
                    if (current_input.type !== undefined) {
                        current_input.setAttribute('name', current_input.getAttribute('name').replace(/footer\]\[([a-zA-Z0-9]+)?\]/g, 'footer][' + random_string + ']'));
                    }
                }

                //get original selects into a jq object
                var $originalSelects = $orginal.find('select');
                cloned_row.find('select').each(function(index, item) {
                    //set new select to value of old select
                    $(item).val($originalSelects.eq(index).val());
                });

                //get original textareas into a jq object
                var $originalTextareas = $orginal.find('textarea');
                cloned_row.find('textarea').each(function(index, item) {
                    //set new textareas to value of old textareas
                    $(item).val($originalTextareas.eq(index).val());
                });
                $outerwrapper.append(cloned_row);
                e.preventDefault();
            } else {
                alert("Sorry. Maximum number of rows exceeded.");
                e.preventDefault();
            }
        }

        // column's body row delete action
        if ($(this).data('action') == 'delete-footer-row') {
            if (confirm($(this).data('confirm'))) {
                $(this).closest('.appts-col-box').remove();
                e.preventDefault();
            } else {
                e.preventDefault();
            }
        }

        // font styles bold, italic, strikethrough, underline
        if ($(this).data('action') == 'font-style-bold') {
            if ($(this).hasClass('appts-active')) {
                $(this).removeClass('appts-active');
                $(this).find('input').val('');
            } else {
                $(this).addClass('appts-active');
                $(this).find('input').val('1');
            }
        }

        if ($(this).data('action') == 'font-style-italic') {
            if ($(this).hasClass('appts-active')) {
                $(this).removeClass('appts-active');
                $(this).find('input').val('');
            } else {
                $(this).addClass('appts-active');
                $(this).find('input').val('1');
            }
        }

        if ($(this).data('action') == 'font-style-strikethrough') {
            if ($(this).hasClass('appts-active')) {
                $(this).removeClass('appts-active');
                $(this).find('input').val('');
            } else {
                $(this).addClass('appts-active');
                $(this).find('input').val('1');
            }
        }

        if ($(this).data('action') == 'font-style-underline') {
            if ($(this).hasClass('appts-active')) {
                $(this).removeClass('appts-active');
                $(this).find('input').val('');
            } else {
                $(this).addClass('appts-active');
                $(this).find('input').val('1');
            }
        }

    });

    // checkbox option selection option
    $('#appts-single-form').on('click', '.appts-background-gradient', function() {
        if ($(this).is(':checked')) {
            $(this).closest('.appts-select-common-div').find(".appts-checked-input-field-wrapper").show(); // checked
        } else {
            $(this).closest('.appts-select-common-div').find(".appts-checked-input-field-wrapper").hide(); // unchecked
        }
    });

    var cursorPosStart;
    var cursorPosEnd;
    var original_content;
    var input_insert;
    $('.appts-admin-main-wrapper').on('click', '.appts-ajax-font-icons', function() {
        var $this = $(this),
                data_attr = $(this).data('popup');

        input_insert = $this.closest('.appts-input-wrap').find('.appts-insert-icons');
        cursorPosStart = $this.closest('.appts-input-wrap').find('.appts-insert-icons').prop('selectionStart');
        cursorPosEnd = $this.closest('.appts-input-wrap').find('.appts-insert-icons').prop('selectionEnd');
        original_content = $this.closest('.appts-input-wrap').find('.appts-insert-icons').val();

        if (data_attr == 'font-icons') {
            var _action = 'font_icons';
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'backend_ajax',
                    _action: 'font_icons',
                    _wpnonce: appts_backend_ajax.ajax_nonce
                },
                beforeSend: function() {
                    $('.appts-backend-ajax-loader-div').show();
                },
                complete: function() {
                    $('.appts-backend-ajax-loader-div').hide();
                },
                success: function(response) {
                    $('.appts-ajax-loaded-div').show();
                    $('.appts-ajax-loaded-div').removeClass('appts-slideout');
                    $('.appts-ajax-loaded-div').addClass('appts-active');
                    $('.appts-ajax-loaded-div').html(response);
                }

            });
        }
    });

    // Hide font options popup
    $('.appts-admin-main-wrapper').on('click', '.appts-close', function() {
        $('.appts-ajax-loaded-div').removeClass('appts-active');
        $('.appts-ajax-loaded-div').addClass('appts-slideout');
        $('.appts-overlay').remove();
        setTimeout(function() {
            $('.appts-popup').remove();
        }, 1000);

    });

    $(document).keydown(function(e) {
        if (e.keyCode == 27) {
            $('.appts-ajax-loaded-div').removeClass('appts-active');
            $('.appts-ajax-loaded-div').addClass('appts-slideout');
            $('.appts-overlay').remove();
            setTimeout(function() {
                $('.appts-popup').remove();
            }, 1000);
        }
    });
    // Hide font options popup ends

    //popup functions
    //search option
    // http://stackoverflow.com/questions/14031369/how-to-implement-search-function-using-javascript-or-jquery
    var timeout;
    $('.appts-admin-main-wrapper').on('keypress', '.appts-search-input input', function(e) {
        var keyword = $(this).val(),
                search_criteria = $(this).closest('.appts-icon-picker-container').find('.appts-icon-picker-content a i');
        window.clearTimeout(timeout);
        timeout = window.setTimeout(function() {
            search_criteria.each(function() {
                var s = $(this).attr('class');
                if (s.indexOf(keyword) !== -1) {
                    $(this).closest('.appts-icon-picker').show();
                    $(this).parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
        }, 300);
    });

    $('.appts-admin-main-wrapper').on('click', '.appts-search-icon-button', function(e) {
        $(this).closest('.appts-icon-search-wrapper').find('.appts-search-input input').keypress();
    });

    // icon picker click function
    $('.appts-admin-main-wrapper').on('click', '.appts-icon-picker-inline', function(e) {
        var $this = $(this);
        $this.closest('.appts-icon-picker-content').find('.appts-icon-picker-inline').removeClass('appts-active');
        $this.addClass('appts-active');
        var $class_name = $this.find('i').attr('class');
        $this.closest('.appts-icon-picker-container').find('.appts-icon-container input:last').val($class_name);

    });

    // font icons insert feature
    $('.appts-admin-main-wrapper').on('click', '.appts-fonticons-insert-button', function() {
        var $this = $(this);
        var required_parent_div = $this.closest('.appts-popup').find('.appts-select-common-div:visible');
        var input_fields = required_parent_div.find('input');
        var str1 = '',
                str2 = '',
                str3 = '';

        input_fields.each(function() {
            if ($(this).attr('name') == 'color') {
                color = $(this).val();
                if (color != '') {
                    font_color = "color:" + color + ";";
                } else {
                    font_color = '';
                }
            }

            if ($(this).attr('name') == 'size') {
                size = $(this).val();
                if (size != '') {
                    font_size = "size:" + size + "px;";
                } else {
                    font_size = '';
                }
            }

            if ($(this).attr('name') == 'icon') {
                icon = $(this).val();
                if (icon != '') {
                    icon_class = "class='" + icon + "'";
                } else {
                    icon_class = '';
                }
            }
        });

        // INSERT TEXT for current cursor position
        //http://jsfiddle.net/4abr7jc5/2/
        if (font_size != '' || font_color != '') {
            style = "style='" + font_color + " " + font_size + "'";
        } else {
            style = '';
        }
        string = "<i " + icon_class + " " + style + "></i>";

        var textBefore = original_content.substring(0, cursorPosStart);
        var textAfter = original_content.substring(cursorPosEnd, original_content.length);
        input_insert.val(textBefore + string + textAfter);
        $('.appts-ajax-loaded-div').removeClass('appts-active');
        $('.appts-ajax-loaded-div').html('');
    });

}); // document.ready ends