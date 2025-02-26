/**
 * Sanitize MetaBox name
 *
 * @param meta_box
 * @returns {*|void|string|never}
 * @see https://www.designcise.com/web/tutorial/how-to-replace-all-occurrences-of-a-word-in-a-javascript-string
 */
rkns_js.sanitize_meta_box_name = function (meta_box) {
    return (meta_box.replace(new RegExp('-', 'g'), "_"));
};

/**
 * Get Meta Box Method name
 */
rkns_js.get_meta_box_method = function (meta_box) {
    return this.sanitize_meta_box_name(meta_box) + '_meta_box';
};

/**
 * Get Meta Box Tags ID
 */
rkns_js.getMetaBoxKey = function (key) {
    return 'rankology-stats-' + key + '-widget';
};

/**
 * Show No Data Error if Meta Box is Empty
 */
rkns_js.no_meta_box_data = function () {
    return '<div class="o-wrap o-wrap--no-data">' + rkns_js._('no_data') + '</div>';
};

/**
 * Show Error Connection if Meta Box is Empty
 */
rkns_js.error_meta_box_data = function (xhr) {
    if (typeof xhr !== 'undefined') {
        let data = JSON.parse(xhr);
        if (rkns_js.isset(data, 'message')) {
            return '<div class="o-wrap o-wrap--no-data">' + data['message'] + '</div>';
        }
    }
    return '<div class="o-wrap o-wrap--no-data">' + rkns_js._('rest_connect') + '</div>';
};

/**
 * Get MetaBox information by key
 */
rkns_js.get_meta_box_info = function (key) {
    if (key in rkns_js.global.meta_boxes) {
        return rkns_js.global.meta_boxes[key];
    }
    return [];
};

/**
 * Get MetaBox Lang
 */
rkns_js.meta_box_lang = function (meta_box, lang) {
    if (lang in rkns_js.global.meta_boxes[meta_box]['lang']) {
        return rkns_js.global.meta_boxes[meta_box]['lang'][lang];
    }
    return '';
};

/**
 * Get MetaBox inner text selector
 */
rkns_js.meta_box_inner = function (key) {
    return "#" + rkns_js.getMetaBoxKey(key) + " div.inside";
};

/**
 * Get MetaBox name by tag ID
 * ex: rankology-stats-summary-widget -> summary
 */
rkns_js.meta_box_name_by_id = function (ID) {
    return ID.split('statistics-').pop().split('-widget')[0];
};

/**
 * Create Custom Button for Meta Box
 */
rkns_js.meta_box_button = function (key) {
    let selector = "#" + rkns_js.getMetaBoxKey(key) + " .handle-actions button:first";
    let meta_box_info = rkns_js.get_meta_box_info(key);

    // Gutenberg Button Style
    let gutenberg_style = 'z-index: 9999;position: absolute;top: 1px;';
    let position_gutenberg = 'right';
    if (rkns_js.is_active('rtl')) {
        position_gutenberg = 'left';
    }

    // Clean Button
    jQuery("#" + rkns_js.getMetaBoxKey(key) + " button[class*=rkns-refresh]").remove();

    // Add Refresh Button
    jQuery(`<button class="handlediv rkns-refresh"` + (rkns_js.is_active('gutenberg') ? ` style="${gutenberg_style}${position_gutenberg}: 3%;" ` : 'style="line-height: 28px;"') + ` type="button" data-tooltip="` + rkns_js._('reload') + `"><span class="rkns-refresh-icon"></span> <span class="screen-reader-text">` + rkns_js._('reload') + `</span></button>`).insertBefore(selector);
};

/**
 * Run Meta Box
 *
 * @param key
 * @param params
 * @param button
 */
rkns_js.run_meta_box = function (key, params = false, button = true) {

    // Check Exist Meta Box div
    if (rkns_js.exist_tag("#" + rkns_js.getMetaBoxKey(key)) && (rkns_js.is_active('gutenberg') || (!rkns_js.is_active('gutenberg') && jQuery("#" + rkns_js.getMetaBoxKey(key)).is(":visible")))) {

        // Meta Box Main
        let main = jQuery(rkns_js.meta_box_inner(key));

        // Get Meta Box Method
        let method = rkns_js.get_meta_box_method(key);

        // Check Exist Method name
        if (method in rkns_js) {

            // Check PlaceHolder Method
            if ("placeholder" in rkns_js[method]) {
                main.html(rkns_js[method]["placeholder"]());
            } else {
                main.html(rkns_js.placeholder());
            }

            // Add Custom Button
            if (button === true) {
                rkns_js.meta_box_button(key);
            }

            // Get Meta Box Data
            let arg = {'name': key};
            if (params !== false) {
                arg = Object.assign(params, arg);
            }

            // Check Request Params in Meta box
            if ("params" in rkns_js[method]) {
                arg = Object.assign(arg, rkns_js[method]['params']());
            }

            // Run
            rkns_js.ajaxQ('metabox', arg, method, 'error_meta_box_data');
        }
    }
};

/**
 * Load all Meta Boxes
 */
rkns_js.run_meta_boxes = function (list = false) {
    if (list === false) {
        list = Object.keys(rkns_js.global.meta_boxes);
    }
    list.forEach(function (value) {
        let ago = '';
        let args = rkns_js.global.meta_boxes[value];
        if (args.hasOwnProperty('footer_options')) {
            ago = args.footer_options.default_date_filter;
        }
        rkns_js.run_meta_box(value, {'ago': ago});
    });
};

/**
 * Render Meta Box Footer
 */
rkns_js.meta_box_footer = function (key, data) {
    let params = {
        'footer_options': {
            'filter_by_date': false,
            'default_date_filter': '',
            'display_more_link': false,
            'more_link_title': ''
        }
    };

    const args = rkns_js.global.meta_boxes[key];
    if (args.hasOwnProperty('footer_options')) {
        Object.assign(params.footer_options, args.footer_options);
    }

    let selectedDateFilter = '';
    if (data.hasOwnProperty('filter')) {
        selectedDateFilter = data.filter;
    } else if (typeof params.footer_options.default_date_filter != 'undefined') {
        selectedDateFilter = params.footer_options.default_date_filter;
    }

    let selectedStartDate = '';
    if (data.hasOwnProperty('filter_start_date')) {
        selectedStartDate = data.filter_start_date;
    }

    let selectedEndDate = '';
    if (data.hasOwnProperty('filter_end_date')) {
        selectedEndDate = data.filter_end_date;
    }

    let fromDate = '';
    if (data.hasOwnProperty('from')) {
        fromDate = data.from;
    }

    let toDate = '';
    if (data.hasOwnProperty('to')) {
        toDate = data.to;
    }

    if (!params.footer_options.filter_by_date && !params.footer_options.display_more_link) return;

    let html = '<div class="c-footer"><div class="c-footer__filter js-widget-filters">';
    if (params.footer_options.filter_by_date) {
        html += `
            <button class="c-footer__filter__btn js-filters-toggle">` + rkns_js._('str_' + params.footer_options.default_date_filter) + `</button>
            <div class="c-footer__filters">
                <div class="c-footer__filters__current-filter">
                    <span class="c-footer__current-filter__title js-filter-title">Last 7 days</span>
                    <span class="c-footer__current-filter__date-range hs-filter-range">May 12,2020  -  May 20, 2020</span>
                </div>
                <div class="c-footer__filters__list">
                    <button data-metabox-key="${key}" data-filter="today" class="c-footer__filters__list-item">` + rkns_js._('str_today') + `</button>
                    <button data-metabox-key="${key}" data-filter="yesterday" class="c-footer__filters__list-item">` + rkns_js._('str_yesterday') + `</button>
                    <button data-metabox-key="${key}" data-filter="7days" class="c-footer__filters__list-item">` + rkns_js._('str_7days') + `</button>
                    <button data-metabox-key="${key}" data-filter="30days" class="c-footer__filters__list-item">` + rkns_js._('str_30days') + `</button>
                    <button data-metabox-key="${key}" data-filter="90days" class="c-footer__filters__list-item">` + rkns_js._('str_90days') + `</button>
                    <input type="text" class="c-footer__filters__custom-date-input js-datepicker-input"/>
                    <button data-metabox-key="${key}" data-filter="custom" class="c-footer__filters__list-item c-footer__filters__list-item--custom js-custom-datepicker">` + rkns_js._('str_custom') + `</button>
                </div>
            </div>
        `;
    }
    html += `</div><div class="c-footer__more">`;
    if (params.footer_options.display_more_link) {
        html += `<a class="c-footer__more__link" href="` + rkns_js.global.admin_url + 'admin.php?page=' + args.page_url + `">${params.footer_options.more_link_title}<svg width="14" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m9.61181.611328-.71269.712722 3.17148 3.17149L0 4.49951v1.00398h12.0706L8.89912 8.67495l.71269.71272L14 4.99948 9.61181.611328Z" fill="#bc690a"/></svg></a>`;
    }
    html += `</div></div>`;

    jQuery(rkns_js.meta_box_inner(key)).append(html);

    const datePickerElement = jQuery(rkns_js.meta_box_inner(key)).find('.js-datepicker-input').first();
    datePickerElement.daterangepicker({"autoApply": true});
    datePickerElement.on('apply.daterangepicker', function (ev, picker) {
        rkns_js.run_meta_box(key, {
            'from': picker.startDate.format('YYYY-MM-DD'),
            'to': picker.endDate.format('YYYY-MM-DD')
        });
    });

    /**
     * Add click event to filters toggle
     */
    jQuery('.js-filters-toggle:not(.is-ready)').on('click', function () {
        jQuery('.js-widget-filters').removeClass('is-active');
        jQuery('.postbox').removeClass('has-focus');
        jQuery(this).closest('.js-widget-filters').toggleClass('is-active');
        jQuery(this).closest('.postbox').toggleClass('has-focus')

        /**
         * Open filters to the downside if there's not enough space.
         */
        if (!jQuery(this).hasClass('is-active')) {
            const targetTopPosition = jQuery(this)[0].getBoundingClientRect().top;
            if (targetTopPosition < 350) {
                jQuery(this).closest('.js-widget-filters').addClass('is-down');
            }
        }
    });
    jQuery('.js-filters-toggle:not(.is-ready)').addClass('is-ready');


    rkns_js.set_date_filter_as_selected(key, selectedDateFilter, selectedStartDate, selectedEndDate, fromDate, toDate);
};

/**
 * Set As Selected Date Filter
 */
rkns_js.set_date_filter_as_selected = function (key, selectedDateFilter, selectedStartDate, selectedEndDate, fromDate, toDate) {
    const metaBoxInner = jQuery(rkns_js.meta_box_inner(key));
    const filterBtn = jQuery(metaBoxInner).find('.c-footer__filter__btn');
    const filterList = jQuery(metaBoxInner).find('.c-footer__filters__list');
    const currentFilterTitle = jQuery(metaBoxInner).find('.c-footer__current-filter__title');
    const currentFilterRange = jQuery(metaBoxInner).find('.c-footer__current-filter__date-range');
    if (selectedDateFilter.length) {
        filterList.find('button[data-filter]').removeClass('is-selected');
        filterList.find('button[data-filter="' + selectedDateFilter + '"').addClass('is-selected');
        filterBtn.text(rkns_js._('str_' + selectedDateFilter));
        currentFilterTitle.text(rkns_js._('str_' + selectedDateFilter));
        if (selectedDateFilter == 'custom') {
            const datePickerElement = jQuery(rkns_js.meta_box_inner(key)).find('.js-datepicker-input').first();
            datePickerElement.data('daterangepicker').setStartDate(moment(fromDate).format('MM/DD/YYYY'));
            datePickerElement.data('daterangepicker').setEndDate(moment(toDate).format('MM/DD/YYYY'));
        }
    }
    if (selectedStartDate.length && selectedEndDate.length) {
        currentFilterRange.text(selectedStartDate + '-' + selectedEndDate);
    }
}

/**
 * Meta Box Footer Handle Date Filter
 */
jQuery(document).on("click", 'button[data-filter]:not(.c-footer__filters__list-item--custom)', function () {
    rkns_js.run_meta_box(jQuery(this).attr('data-metabox-key'), {'ago': jQuery(this).attr('data-filter')});
});

jQuery(document).on("click", 'button[data-filter="custom"]', function () {
    const metaBoxKey = jQuery(this).attr('data-metabox-key');
    const datePickerElement = jQuery(rkns_js.meta_box_inner(metaBoxKey)).find('.js-datepicker-input').first();
    datePickerElement.data('daterangepicker').show();
});

/**
 * Disable Close WordPress Post ox for Meta Box Button
 *
 * @see wp-admin/js/postbox.js:107
 */
jQuery(document).on('mouseenter mouseleave', '.rkns-refresh, .rkns-more', function (ev) {
    if (ev.type === 'mouseenter') {
        rkns_js.wordpress_postbox_ajax('disable');
    } else {
        rkns_js.wordpress_postbox_ajax('enable');
    }
});

/**
 * Meta Box Refresh Click Handler
 */
jQuery(document).on("click", '.rkns-refresh', function (e) {
    e.preventDefault();

    // Get Meta Box name By Parent ID
    let parentID = jQuery(this).closest(".postbox").attr("id");
    let meta_box_name = rkns_js.meta_box_name_by_id(parentID);
    let ago = '';
    let args = rkns_js.global.meta_boxes[meta_box_name];
    if (args.hasOwnProperty('footer_options')) {
        ago = args.footer_options.default_date_filter;
    }

    // Run Meta Box
    rkns_js.run_meta_box(meta_box_name, {'ago': ago}, false);
    setTimeout(function () {
        jQuery('#' + parentID).find('.rkns-refresh').blur();
    }, 1000);
});

/**
 * Watch Show/Hide Meta Box in WordPress Dashboard
 * We dont Use PreventDefault Because WordPress Core uses Checked checkbox.
 */
jQuery(document).on("click", 'input[type=checkbox][id^="rankology-stats-"][id$="-widget-hide"]', function () {

    // Check is Checked For Show Post Box
    if (jQuery(this).is(':checked')) {

        // Get Meta Box name By ID
        let ID = jQuery(this).attr("id");
        let meta_box_name = rkns_js.meta_box_name_by_id(ID);

        // Run Meta Box
        rkns_js.run_meta_box(meta_box_name);
    }
});

/**
 * Show Select Date Time For Chart MetaBox
 */
rkns_js.btn_group_chart = function (chart, args = false) {

    // Datetime Select List
    let select_list = {
        7: rkns_js._('str_week'),
        30: rkns_js._('str_month'),
        365: rkns_js._('str_year')
    };

    // Check Active time
    var active;
    if (args.type == "ago") {
        active = parseInt(args.days);
    }

    // Create Html Data
    let html = `<div class="rkns-btn-group"><div class="btn-group" role="group">`;

    // Show Data
    Object.keys(select_list).forEach(function (key) {
        html += `<button type="button" class="btn ` + (key == active ? 'btn-primary' : 'btn-default') + `" data-chart-time="${chart}" data-time="${key}">${select_list[key]}</button>`;
    });

    // Add Custom
    html += `<button type="button" class="btn ` + (args.type == "between" ? 'btn-primary' : 'btn-default') + `" data-custom-date-picker="${chart}">${rkns_js._('custom')}</button>`;
    html += `</div></div>`;

    // Show Jquery Date Picker
    html += `
    <div data-chart-date-picker="${chart}"` + (args.type == "ago" ? ' style="display:none;"' : '') + `>
        <input type="text" size="18" name="date-from" data-rkns-date-picker="from" value="${args['from']}" placeholder="YYYY-MM-DD" autocomplete="off">
        ` + rkns_js._('to') + `
        <input type="text" size="18" name="date-to" data-rkns-date-picker="to" value="${args['to']}" placeholder="YYYY-MM-DD" autocomplete="off">
        <input type="submit" value="` + rkns_js._('go') + `" data-between-chart-show="${chart}" class="button-primary">
        <input type="hidden" name="" id="date-from" value="${args['from']}">
        <input type="hidden" name="" id="date-to" value="${args['to']}">
    </div>
    `;

    // Show HTMl
    return html;
};

/**
 * Seat Active Class after Click Btn Group
 */
jQuery(document).on("click", '.rkns-btn-group button', function () {
    jQuery('.rkns-btn-group button').attr('class', 'btn btn-default');
    jQuery(this).attr('class', 'btn btn-primary');
});

/**
 * SlideToggle Click on Custom Date Range
 */
jQuery(document).on("click", 'button[data-custom-date-picker]', function () {
    jQuery('div[data-chart-date-picker= ' + jQuery(this).attr('data-custom-date-picker') + ']').slideDown();
});

/**
 * Button Group Handle Chart time Show
 */
jQuery(document).on("click", 'button[data-chart-time]', function () {
    rkns_js.run_meta_box(jQuery(this).attr('data-chart-time'), {'ago': jQuery(this).attr('data-time'), 'no-data': 'no'});
});

/**
 * Send From/To Chart
 */
jQuery(document).on("click", 'input[data-between-chart-show]', function () {
    let chart = jQuery(this).attr('data-between-chart-show');
    rkns_js.run_meta_box(chart, {
        'from': jQuery("div[data-chart-date-picker=" + chart + "] input[id=date-from]").val(),
        'to': jQuery("div[data-chart-date-picker=" + chart + "] input[id=date-to]").val(),
        'no-data': 'no'
    });
});

/**
 * Close filters when clicking outside the filters
 * */
jQuery(document).on("click", function (event) {
    if (!jQuery(event.target).closest(".js-widget-filters").length) {
        jQuery('.js-widget-filters').removeClass('is-active');
        jQuery('.postbox.has-focus').removeClass('has-focus');
        jQuery('.c-footer__filter__btn.is-active').removeClass('is-active');
        setTimeout(function () {
            jQuery('.js-widget-filters').removeClass('is-down');
        }, 500)
    } else {
        const targetClasses = event.target.classList;
        if (targetClasses.contains('c-footer__filter__btn') && targetClasses.contains('is-active')) {
            event.target.classList.remove('is-active');
            jQuery('.js-widget-filters').removeClass('is-active');
            jQuery('.postbox.has-focus').removeClass('has-focus');

            setTimeout(function () {
                jQuery('.js-widget-filters').removeClass('is-down');
            }, 500)

        } else if (targetClasses.contains('c-footer__filter__btn') && !targetClasses.contains('is-active')) {
            event.target.classList.add('is-active');
        }
    }
});


