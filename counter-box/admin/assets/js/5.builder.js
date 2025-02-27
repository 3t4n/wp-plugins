'use strict';

jQuery(document).ready(function ($) {

    $.fn.wowCounterLiveBuilder = function () {
        const element = $('#wpie-builder');

        const editor = tinyMCE.get('wpie-fulleditor-1');

        let content = $('#wpie-fulleditor-1').val();
        previewContent(content);

        editor.on('change keyup click', function (e) {
            let content = editor.getContent();
            previewContent(content)
        });

        $('#wpie-fulleditor-1').on('change keyup click load', function () {
            let content = $(this).val();
            previewContent(content)
        });

        function previewContent(content) {
            content = content.replace('{year}', '<span class="counter-element -year">01</span>');
            content = content.replace('{day}', '<span class="counter-element -day">10</span>');
            content = content.replace('{hour}', '<span class="counter-element -hour">59</span>');
            content = content.replace('{min}', '<span class="counter-element -min">59</span>');
            content = content.replace('{sec}', '<span class="counter-element -sec">59</span>');
            let type = $('[data-field="type"]').val();
            let start = $('[data-field="start"]').val();
            if(type === 'CounterFromDate' || type === 'CounterFromWeekday') {
                start = $('[data-field="base_number"]').val();
            }
            content = content.replace('{counter}', '<span class="counter-element -counter">' + start + '</span>');
            $(element).html(content);
        }

    };

    $($.fn).wowCounterLiveBuilder();
    previewBuilder();

    $('.wpie-settings__main').on('change keyup', function (){
        previewBuilder();
        $('.wpie-color').wpColorPicker({
            change: function (event, ui) {
                previewBuilder();
            },
        });
    });

    function previewBuilder() {

        const css = $('#wpie-live-preview-style');
        $(css).empty();
        let style = '.counter-element {position: relative;box-sizing: content-box;display: inline-block; text-align: center;';
        let background = $('[data-field="background"]').val();
        let border_radius = $('[data-field="border_radius"]').val();
        let border_style = $('[data-field="border_style"]').val();
        let border_width = $('[data-field="border_width"]').val();
        let border_color = $('[data-field="border_color"]').val();

        if (border_radius !== 0) {
            style += `border-radius: ${border_radius}px;`;
        }

        style += `border-width: ${border_width}px;`;
        style += `border-style: ${border_style};`;
        style += `border-color: ${border_color};`;
        style += `background: ${background};`;

        let width = $('[data-field="width"]').val();
        let width_unit = $('[data-field="width_unit"]').val().toString();

        if (width_unit === 'auto') {
            style += `width: auto;`;
        } else {
            style += `width: ${width}px;`;
        }

        let height = $('[data-field="height"]').val();
        let height_unit = $('[data-field="height_unit"]').val().toString();

        if (height_unit === 'auto') {
            style += `height: auto;`;
        } else {
            style += `height: ${height}px;`;
            style += `line-height: ${height}px;`;
        }

        style += '}';

        let year = $('[data-field="year_title_checkbox"]').prop('checked') ? $('[data-field="year_title"]').val() : '';
        let day = $('[data-field="day_title_checkbox"]').prop('checked') ? $('[data-field="day_title"]').val() : '';
        let hour = $('[data-field="hour_title_checkbox"]').prop('checked') ? $('[data-field="hour_title"]').val() : '';
        let min = $('[data-field="min_title_checkbox"]').prop('checked') ? $('[data-field="min_title"]').val() : '';
        let sec = $('[data-field="sec_title_checkbox"]').prop('checked') ? $('[data-field="sec_title"]').val() : '';
        let counter = $('[data-field="counter_title_checkbox"]').prop('checked') ? $('[data-field="counter_title"]').val() : '';
        let location = $('[data-field="title_position"]').val() || 'top';
        let offset = $('[data-field="title_offset"]').val() || 0;
        let color = $('[data-field="title_color"]').val() || '#000000';
        let size = $('[data-field="title_size"]').val() || '12';

        style += `.counter-element:after { position: absolute; 
            left: 0;
            right: 0;      
            line-height: 1;
            ${location}: ${offset}px;
            color: ${color};
            font-size: ${size}px;}`;

        style += `.counter-element.-year:after { content: '${year}'}`;
        style += `.counter-element.-day:after { content: '${day}'}`;
        style += `.counter-element.-hour:after {content: '${hour}'}`;
        style += `.counter-element.-min:after {content: '${min}'}`;
        style += `.counter-element.-sec:after {content: '${sec}'}`;
        style += `.counter-element.-counter:after {content: '${counter}'}`;

        css.html(style);
    }
});