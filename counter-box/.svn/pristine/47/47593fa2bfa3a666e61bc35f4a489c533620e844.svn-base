'use strict';

jQuery(document).ready(function ($) {

    const selectors = {
        settings: '.wpie-settings__main',
        color_picker: '.wpie-color',
        checkbox: '.wpie-field input[type="checkbox"]',
        full_editor: '.wpie-fulleditor',
        item_heading: '.wpie-item .wpie-item_heading',
        border_style: '[data-field="border_style"]',
        language: '[data-field="language"]',
        type: '[data-field="type"]',
        width_unit: '[data-field="width_unit"]',
        height_unit: '[data-field="height_unit"]',

    };

    function set_up() {
        $(selectors.full_editor).wowFullEditor();
        $(selectors.color_picker).wpColorPicker();
        $(selectors.checkbox).each(set_checkbox);
        $(selectors.border_style).each(border_style);
        $(selectors.language).each(language);
        $(selectors.type).each(type);
        $(selectors.width_unit).each(size_unit);
        $(selectors.height_unit).each(size_unit);
    }

    function initialize_events() {
        $(selectors.settings).on('change', selectors.checkbox, set_checkbox);
        $(selectors.settings).on('change', selectors.border_style, border_style);
        $(selectors.settings).on('click', selectors.item_heading, item_toggle);
        $(selectors.settings).on('change', selectors.language, language);
        $(selectors.settings).on('change', selectors.type, type);
        $(selectors.settings).on('change', selectors.width_unit, size_unit);
        $(selectors.settings).on('change', selectors.height_unit, size_unit)
    }

    function initialize() {
        set_up();
        initialize_events();
    }

    // Set the checkboxes
    function set_checkbox() {
        const next = $(this).next('input[type="hidden"]');
        if ($(this).is(':checked')) {
            next.val('1');
        } else {
            next.val('0');
        }
    }
    function border_style() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if (type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }
    function language() {
        const type = $(this).val();
        const locale = $('[data-field-box="locale"]');
        locale.addClass('is-hidden');
        if (type === 'custom') {
            locale.removeClass('is-hidden');
        }
    }

    function type() {
        const type = $(this).val();
        const parent = get_parent_fields($(this), '.wpie-fieldset');
        const countdownBox = $('.wpie-box-countdown');
        const timerBox = $('.wpie-box-timer');
        const counterBox = $('.wpie-box-counter');
        const dayweek = $('[data-field-box="dayweek"]');
        const timezon = $('[data-field-box="timezone"]');
        const date = $('[data-field-box="date"]');
        const timerTitles = $('[data-field-box="year_title"], [data-field-box="day_title"], [data-field-box="hour_title"], [data-field-box="min_title"], [data-field-box="sec_title"]');
        const counterTitles = $('[data-field-box="counter_title"]');
        const counterDate = $('.wpie-counter-date');
        const counterBase = $('.wpie-counter-base');

        $(countdownBox).add(timerBox).add(counterBox).add(dayweek).add(date).add(timerTitles).add(counterTitles).add(timezon).addClass('is-hidden');
        $(counterBase).add(counterDate).addClass('is-hidden');


        if(type === 'CountToDate' || type === 'ContFromDate') {
            $(countdownBox).add(date).add(timerTitles).add(timezon).removeClass('is-hidden');
        }
        if(type === 'CountToWeekday') {
            $(countdownBox).add(dayweek).add(timezon).add(timerTitles).removeClass('is-hidden');
        }
        if(type === 'Timer' || type === 'UserTimer' || type === 'TimerStopGo') {
            $(timerBox).add(timerTitles).removeClass('is-hidden');
        }
        if(type === 'Counter') {
            $(counterBox).add(counterTitles).add(counterBase).removeClass('is-hidden');
        }
        if(type === 'CounterFromDate' || type === 'CounterToDate') {
            $(counterBox).add(counterTitles).add(date).removeClass('is-hidden');
            $(parent).find('.wpie-box-countdown').removeClass('is-hidden');
            $(counterDate).removeClass('is-hidden');
        }
        if(type === 'CounterToWeekday' || type === 'CounterFromWeekday') {
            $(counterBox).add(counterTitles).add(dayweek).removeClass('is-hidden');
            $(parent).find('.wpie-box-countdown').removeClass('is-hidden');
            $(counterDate).removeClass('is-hidden');
        }

    }

    function size_unit() {
        const val = $(this).val();
        const parent = get_field_box($(this));
        const field = $(parent).find('input');
        if (val === 'auto') {
            $(field).attr('readonly', 'readonly');
            $(field).addClass('is-blur');
        } else {
            $(field).removeAttr('readonly');
            $(field).removeClass('is-blur');
        }
    }

    function item_toggle() {
        const parent = get_parent_fields($(this), '.wpie-item');
        const val = $(parent).attr('open') ? '0' : '1';
        $(parent).find('.wpie-item__toggle').val(val);
    }



    function get_parent_fields($el, $class = '.wpie-fields') {
        return $el.closest($class);
    }

    function get_field_box($el, $class = '.wpie-field') {
        return $el.closest($class);
    }

    initialize();
});