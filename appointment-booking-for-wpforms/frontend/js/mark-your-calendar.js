/*!
 * Author:  Mark Allan B. Meriales
 * Name:    Mark Your Calendar v0.0.1
 * License: MIT License
 */
(function($) {
    // https://stackoverflow.com/questions/563406/add-days-to-javascript-date
    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    $.fn.markyourcalendar = function(opts) {
        var prevHtml = `
            <a href="#" class="booknow-prev-week">
                <span class="booknow_font icon-left-open"></span>
            </a>
        `;
        var nextHtml = `<a href="#" class="booknow-next-week"><span class="booknow_font icon-right-open"></span></a>`;
        var defaults = {
            availability: [[], [], [], [], [], [], []], // listahan ng mga oras na pwedeng piliin
            isMultiple: false,
            months: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
            prevHtml: prevHtml,
            nextHtml: nextHtml,
            selectedDates: [],
            startDate: new Date(),
            step:7,
            weekdays: ['sun', 'mon', 'tue', 'wed', 'thurs', 'fri', 'sat'],
        };
        var settings = $.extend({}, defaults, opts);
        var html = ``;
        var onClick = settings.onClick;
        var onClickNavigator = settings.onClickNavigator;
        var onClickService = settings.onClickService;
        var instance = this;
        // kuhanin ang buwan
        this.getMonthName = function(idx) {
            return settings.months[idx];
        };
        var formatDate = function(d) {
            var date = '' + d.getDate();
            var month = '' + (d.getMonth() + 1);
            var year = d.getFullYear();
            if (date.length < 2) {
                date = '0' + date;
            }
            if (month.length < 2) {
                month = '0' + month;
            }
            return year + '-' + month + '-' + date;
        };
        // Eto ang controller para lumipat ng linggo
        // Controller to change 
        this.getNavControl = function() {
            var previousWeekHtml = `<div class="boooknow-prev-week-container">` + settings.prevHtml + `</div>`;
            var nextWeekHtml = `<div class="boooknow-next-week-container">` + settings.nextHtml + `</div>`;
            var d = settings.startDate.addDays( settings.step );
            var m = settings.startDate.getMonth();
            var m7 = d.getMonth();
            if( m != m7 ) {
                var monthYearHtml = `
                    <div class="booknow-current-month-year-container">
                        ` + this.getMonthName(m) + ' - '+ this.getMonthName(m7) +' ' + settings.startDate.getFullYear() + `
                    </div>
                `; 
            }else{
               var monthYearHtml = `
                    <div class="booknow-current-month-year-container">
                        ` + this.getMonthName(settings.startDate.getMonth()) + ' ' + settings.startDate.getFullYear() + `
                    </div>
                `; 
            }
            var navHtml = `
                <div class="booknow-nav-container">
                    ` + previousWeekHtml + `
                    ` + monthYearHtml + `
                    ` + nextWeekHtml + `
                </div>
            `;
            return navHtml;
        };
        // kuhanin at ipakita ang mga araw
        this.getDatesHeader = function() {
            var tmp = ``;
            for (i = 0; i < settings.step; i++) {
                var d = settings.startDate.addDays(i);
                var number = d.getDate();
                if( number < 10 ){
                    number = number.toString();
                    number = "0" + number;
                }
                tmp += `
                    <th class="booknow-date-header-` + i + ` booknow-date-header">
                        <div class="clear-fix">
                            <span class="booknow-date-number booknow-date-number-`+i+`">` + number + `</span>
                            <span class="boooknow-date-display">` + settings.weekdays[d.getDay()] + `</span>
                        </div>
                    </th>
                `;
            }
            return tmp;
        }
        // kuhanin ang mga pwedeng oras sa bawat araw ng kasalukuyang linggo
        this.getAvailableTimes = function() {
            var tmp = ``;
            for (i = 0; i < settings.step; i++) {
                var tmpAvailTimes = ``;
                if(settings.availability[i] === undefined || settings.availability[i].length < 1) {
                    tmpAvailTimes = '<div class="boooknow-not-available">Not available.</div>';
                    tmp += `
                        <td class="boooknow-day-time-container boooknow-day-time-container-` + i + `">
                            ` + tmpAvailTimes + `
                        </td>
                    `;
                }else{
                    var more_i = 0;
                    $.each(settings.availability[i], function() {
                        more_i++;
                        var classs = "boooknow-available-time-container";
                        if( more_i > 5 ){
                            classs +=" boooknow-available-time-hidden hidden";
                        }
                        tmpAvailTimes += `<li class="`+classs+`">
                            <a href="#" class="boooknow-available-time" data-time="` + this + `" data-date="` + formatDate(settings.startDate.addDays(i)) + `">
                                ` + this + `
                            </a></li>
                        `;
                    });
                    if( more_i > 5){
                       tmpAvailTimes += `<li>
                            <a href="#" class="boooknow-available-more">
                                More...
                            </a></li>
                        `; 
                    }
                    tmp += `
                    <td class="boooknow-day-time-container boooknow-day-time-container-` + i + `">
                        <div><ul>` + tmpAvailTimes + `<ul></div>
                    </td>
                `;
                }
            }
            return tmp
        }
        // i-set ang mga oras na pwedeng ilaan
        this.setAvailability = function(arr) {
            settings.availability = arr;
            render();
        }
        // clear
        this.clearAvailability = function() {
            settings.availability = [[], [], [], [], [], [], []];
        }
        this.on('click', '.boooknow-available-time', function(e) {
            e.preventDefault();
        });
        // pag napindot ang nakaraang linggo
        this.on('click', '.booknow-prev-week', function(e) {
            e.preventDefault();
            var col = $(".booknow_responsive_col").val();
            if(col === undefined || col<1 ){
                col = 7;
            }
            col = parseInt(col);
            col_render = -col;
            settings.step = col;
            settings.startDate = settings.startDate.addDays(col_render);
            instance.clearAvailability();
            render(instance);
            if ($.isFunction(onClickNavigator)) {
                onClickNavigator.call(this, ...arguments, instance,settings.startDate);
            }
        });
        $("body").on('click', '.booknow-input-service li', function(e) {
            e.preventDefault();
            var col = $(".booknow_responsive_col").val();
            if(col === undefined || col<1 ){
                col = 7;
            }
            col = parseInt(col);
            col_render = -col;
            settings.step = col;
            instance.clearAvailability();
            render(instance);
            if ($.isFunction(onClickService)) {
                onClickService.call(this, ...arguments, instance,settings.startDate);
            }
        });
        // pag napindot ang susunod na linggo
        this.on('click', '.booknow-next-week', function(e) {
            e.preventDefault();
            var col = $(".booknow_responsive_col").val();
            if(col === undefined || col < 1 ){
                col = 7;
            }
            col = parseInt(col);
            settings.step = col;
            settings.startDate = settings.startDate.addDays(col);
            instance.clearAvailability();
            render(instance);
            if ($.isFunction(onClickNavigator)) {
                onClickNavigator.call(this, ...arguments, instance,settings.startDate);
            }
        });
        // pag namili ng oras
        this.on('click', '.boooknow-available-time', function(e) {
            e.preventDefault();
            var date = $(this).data('date');
            var time = $(this).data('time');
            var tmp = date + '|' + time;
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                var idx = settings.selectedDates.indexOf(tmp);
                if (idx !== -1) {
                    settings.selectedDates.splice(idx, 1);
                }
            } else {
                if (settings.isMultiple) {
                    $(this).addClass('selected');
                    settings.selectedDates.push(tmp);
                } else {
                    settings.selectedDates.pop();
                    if (!settings.selectedDates.length) {
                        $('.boooknow-available-time').removeClass('selected');
                        $(this).addClass('selected');
                        settings.selectedDates.push(tmp);
                    }
                }
            }
            if ($.isFunction(onClick)) {
                onClick.call(this, ...arguments, settings.selectedDates);
            }
        });
        var render = function() {
            ret = `
                <div class="booknow-calendar-container">
                    <div class="booknow-calendar-nav-container">` + instance.getNavControl() + `</div>
                    <table class="booknow-calendar-week-container">
                        <tr class="booknow-calendar-subheader">` + instance.getDatesHeader() + `</tr>
                        <tr class="booknow-calendar-datas">` + instance.getAvailableTimes() + `</tr>
                    </table>
                </div>
            `;
            instance.html(ret);
        };
        render();
    };
})(jQuery);