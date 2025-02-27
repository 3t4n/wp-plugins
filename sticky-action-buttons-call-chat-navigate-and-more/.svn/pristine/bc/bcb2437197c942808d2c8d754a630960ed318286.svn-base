(function($) {

    $(window).on('load', function() {

        /*
         * Load iframe to live preview
         */
        let src = $('#livepreviewContainer').data('src');
        $('#livepreviewContainer').append('<iframe src="' + src + '">');

        /*
         * Set current view on switcher
         */
        let activeSwitch = $('.screenSwitcer .screenSwitcerOptions > .option.active');
        let activeSwitchClass = activeSwitch.find('span').attr('class');
        $('.currentOption span').attr('class', activeSwitchClass);
        $('#wp-admin-bar-sab-view > .ab-item span').attr('class', activeSwitchClass);


    });

    $(document).ready(function() {

        /*
         * generate random unique to buttons items if blank
         */
        $('.buttons-manager .button-item .unique').each(function() {
            let val = $(this).val();
            let string = getRandomUnique(7);
            if (val == '' || val === 'undefined') {
                $(this).val(string);
            }
        });

        /*
         * add checked class to labels
         */
        $('.cr input').each(function() {
            let checked = $(this).is(':checked');
            if (checked) {
                $(this).parent().addClass('checked');
            }
        });

        /*
         * Show open options based on checkbox inputs on page load
         */
        $('.toggle_control').each(function() {
            let checked = $(this).is(':checked'),
                target = $(this).data('target');

            if (checked) {
                $(target).removeClass('hide');
            } else {
                $(target).addClass('hide');
            }
        });

        /*
         * Show open options based on radio inputs on page load
         */

        let targets = {};
        $('.radio_control').each(function() {
            let checked = $(this).is(':checked'),
                target = $(this).data('target');
            if (targets[target] != true && typeof target !== 'undefined') {
                if (checked) {
                    targets[target] = true;
                } else {
                    targets[target] = false;
                }
            }

        }).promise().done(function() {

            let sorted = Object.entries(targets)
                .sort(([, v1], [, v2]) => v1 - v2)
                .reduce((obj, [k, v]) => ({
                    ...obj,
                    [k]: v
                }), {});

            $.each(sorted, function(key, val) {
                if (val == true) {
                    $(key).removeClass('hide');
                } else {
                    $(key).addClass('hide');
                }
            });

        });


        /*
         * Fire colorpickers
         */
        let colorPickerOptions = {
            change: function(event, ui) {
                sabUpdateButtonsInput();
            }
        };
        $('form > .row:not(.sample) .color-picker').wpColorPicker(colorPickerOptions);

        /*
         * Fire Icon picker
         */
        $('.fa-picker').iconpicker();


        /*
         * Fire sortable item list
         */
        $("#sortable").sortable({
            handle: ".button-item-title",
            placeholder: "ui-state-highlight",
            update: function() {
                sabUpdateButtonsInput();
            }
        });

    });


    /*
     * Toggle checked class to labels
     */
    $(document).on('change input', '.cr input', function() {

        let checked = $(this).is(':checked');
        if (checked) {
            $(this).parent().addClass('checked');
        } else {
            $(this).parent().removeClass('checked');
        }
    });

    /*
     * Toggle options on change checkbox inputs
     */
    $(document).on('input', '.toggle_control', function() {

        let checked = $(this).is(':checked'),
            target = $(this).data('target');

        if (checked) {
            $(target).removeClass('hide');
        } else {
            $(target).addClass('hide');
        }

    });

    /*
     * Toggle options on change radio inputs
     */

    $(document).on('change', '.radio_control', function() {
        let targets = {},
            name = $(this).attr('name');
        $('input[name="' + name + '"]').each(function() {

            let checked = $(this).is(':checked'),
                target = $(this).data('target');

            if (targets[target] != true && typeof target !== 'undefined') {
                if (checked) {
                    targets[target] = true;
                } else {
                    targets[target] = false;
                }
            }

        }).promise().done(function() {

            let sorted = Object.entries(targets)
                .sort(([, v1], [, v2]) => v1 - v2)
                .reduce((obj, [k, v]) => ({
                    ...obj,
                    [k]: v
                }), {});

            $.each(sorted, function(key, val) {
                if (val == true) {
                    $(key).removeClass('hide');
                } else {
                    $(key).addClass('hide');
                }
            });

        });

    });


    /*
     * screen view switcher
     */
    $(document).on('click', '.screenSwitcerOptions .option', function() {

        let view = $(this).data('class'),
            icon = $(this).find('span').attr('class');

        // iframe
        $('#livepreviewContainer').attr('class', view);

        // switcher
        $('.currentOption span').attr('class', icon);
        $('.screenSwitcerOptions .option').removeClass('active');
        $(this).addClass('active');

        // top bar
        $('#wp-admin-bar-sab-view > .ab-item span').attr('class', icon);

        // input
        $('.lastView').val(view);

    });

    /*
     * top bar view switcher
     */
    $(document).on('click', '#wp-admin-bar-sab-view ul li', function(e) {

        e.preventDefault();

        let view = $(this).attr('class'),
            icon = $(this).find('span').attr('class');

        // iframe
        $('#livepreviewContainer').attr('class', view);

        // switcher
        $('.currentOption span').attr('class', icon);
        $('.screenSwitcerOptions .option').removeClass('active');
        $('.screenSwitcerOptions .option[data-class="' + view + '"').addClass('active');

        // top bar
        $('#wp-admin-bar-sab-view > .ab-item span').attr('class', icon);

        // input
        $('.lastView').val(view);

    });

    /*
     * Side panel expand/shrink
     */
    $(document).on('click', '#wp-admin-bar-sab-panel', function(e) {
        e.preventDefault();
        $('body').toggleClass('sab-full');
    });


    /*
     * Toggle accordins
     */
    $(document).on('click', 'form h3', function() {

        $(this).next().slideToggle(400);
        $(this).toggleClass('close-accordion');

    });

    /*
     * update icon picker state
     */
    $(document).on('iconpickerSelected input', '.fa-picker', function() {
        let value = $(this).val();
        $(this).next().next().removeClass('hide');
        $(this).addClass('icon-found');
        $(this).next('i').attr('class', value);
    });
    $(document).on('click', '.clear-icon', function() {
        $(this).addClass('hide');
        $(this).prev().prev().val('').removeClass('icon-found');
        $(this).prev().attr('class', '');
    });

    $(document).on('click', '#restart_option', function() {

        if (confirm(combar_sab.alert_reset + '\r\n' + combar_sab.continue) == true) {
            let optionName = $(this).data('option'),
                wpnonce = $(this).data('nonce');
            let str = '&action=combar_sab_restart_options&option=' + optionName + '&wpnonce=' + wpnonce;

            $.ajax({
                type: "POST",
                url: combar_sab.ajaxurl,
                data: str,
                success: function(data) {
                    if (true == data) {
                        window.location.href = window.location.href;
                    } else {
                        alert(combar_sab.fail);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(combar_sab.fail);
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
        }
    });

    /*
     *
     * Buttons manager
     *
     */


    /*
     * Change title of item
     */
    $(document).on('input', '.button-item input.item-title', function() {
        let string = $(this).val();
        $(this).parents('.button-item').find('.button-item-title b').text(string);
    });

    $(document).on('input change iconpickerSelected focus focusout', '.button-item input, .button-item select, .button-item button', function() {
        sabUpdateButtonsInput();
    });


    /*
     * Filter button items
     */
    $(document).on('click', '.filters > button', function(e) {
        e.preventDefault();
        $(this).toggleClass('filter-on');
        sabUpdateFilter();
    });


    /*
     * Add button item 
     */
    $(document).on('click', '.add-item', function(e) {

        e.preventDefault();

        let template = $('.sample .button-item').clone(),
            count = $('#count').val();
        let colorPickerOptions = {
            change: function(event, ui) {
                sabUpdateButtonsInput();
            }
        };
        $('.buttons-manager').append(template);
        $('.buttons-manager .button-item:last-child .unique').val(getRandomUnique(7));
        $('.buttons-manager .color-picker').wpColorPicker(colorPickerOptions);
        $('.fa-picker').iconpicker();
        sabUpdateButtonsInput();

        // count
        $('.sample .button-item .radio-imgs input[type="radio"]').attr('name', 'radio_' + count);
        $('.sample .button-item .icon-side input[type="radio"]').attr('name', 'icon_side_' + count);
        count++;
        $('#count').val(count);
    });


    /*
     * Toggle button items
     */
    $(document).on('click', '.button-item-title b', function() {
        $(this).parent().next().slideToggle(400);
        $(this).parent().parent().toggleClass('closed');
    });

    /*
     * Toggle button options
     */
    $(document).on('click', '.button-options-toggle', function() {
        $(this).toggleClass('open');
    });


    /*
     * Delete button item
     */
    $(document).on('click', '.delete-item', function() {
        if (confirm(combar_sab.delete_confirm) == true) {
            $(this).parent().parent().remove();
            sabUpdateButtonsInput();
        }
    });

    /*
     * Toggle devices state icon
     */
    $(document).on('change', '.state-trigger input', function() {
        let key = $(this).data('key');
        let stateClass = 'state-' + key
        $(this).parents('.button-item').toggleClass(stateClass);
        sabUpdateFilter();
    });

    /*
     * Update buttons before submit to ensure that data is updated
     */
    $(document).on('mouseover', '#submit', function() {
        sabUpdateButtonsInput();
    });

    function sabGetButtonsObject() {

        let setting = [];

        $('.buttons-manager .button-item').each(function() {
            let item = {};
            $(this).find('input, textarea, select').each(function() {

                let type = $(this).attr('type'),
                    name = $(this).data('key'),
                    value = $(this).val();


                const texts = ['hidden', 'text', 'number', 'url'],
                    checks = ['checkbox', 'radio'],
                    skip = ['action', '_wpnonce', '_wp_http_referer'];

                if (texts.includes(type)) {
                    if (value != '' && !skip.includes(name)) {
                        item[name] = value;
                    }
                } else if (checks.includes(type)) {
                    if (jQuery(this).is(':checked')) {
                        item[name] = value;
                    }
                } else if (jQuery(this).is('select')) {
                    value = jQuery(this).find('option:selected').val();
                    if (value != '') {
                        item[name] = value;
                    }
                }
            }).promise().done(function() {

                setting.push(item);

            });


        });

        let jsonOptions = JSON.stringify(setting);
        return jsonOptions;

    }

    function sabUpdateFilter() {
        let desk = $('.desk-filter').hasClass('filter-on'),
            mob = $('.mob-filter').hasClass('filter-on');
        if (desk && mob) {
            $('.button-item').show();
        } else if (desk && !mob) {
            $('.button-item.state-desktop').show();
            $('.button-item:not(.state-desktop)').hide();
        } else if (!desk && mob) {
            $('.button-item.state-mobile').show();
            $('.button-item:not(.state-mobile)').hide();
        } else {
            $('.button-item').hide();
        }
    }

    function sabUpdateButtonsInput() {
        let data = sabGetButtonsObject();
        $('#buttonsInput').val(data);
    }

    function getRandomUnique(length) {
        let randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (var i = 0; i < length; i++) {
            result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
        }
        return result;
    }

})(jQuery);