/******/ (() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*************************!*\
      !*** ./src/settings.js ***!
      \*************************/

    jQuery(document).ready(function ($) {
        'use strict';
        $('.vi-ui.menu .item').vi_tab({history: true});

        $('.vi-wpbulky-save-settings').on('click', function () {
            $(this).addClass('loading');
        });

        $('.vi-select2').select2({width: '100%'});

        $('.villatheme-get-key-button').one('click', function (e) {
            let v_button = $(this);
            v_button.addClass('loading');
            let data = v_button.data();
            let item_id = data.id;
            let app_url = data.href;
            let main_domain = window.location.hostname;
            main_domain = main_domain.toLowerCase();
            let popup_frame;
            e.preventDefault();
            let download_url = v_button.attr('data-download');
            popup_frame = window.open(app_url, "myWindow", "width=380,height=600");
            window.addEventListener('message', function (event) {
                /*Callback when data send from child popup*/
                let obj = $.parseJSON(event.data);
                let update_key = '';
                let message = obj.message;
                let support_until = '';
                let check_key = '';
                if (obj['data'].length > 0) {
                    for (let i = 0; i < obj['data'].length; i++) {
                        if (obj['data'][i].id === item_id && (obj['data'][i].domain === main_domain || obj['data'][i].domain === '' || obj['data'][i].domain == null)) {
                            if (update_key == '') {
                                update_key = obj['data'][i].download_key;
                                support_until = obj['data'][i].support_until;
                            } else if (support_until < obj['data'][i].support_until) {
                                update_key = obj['data'][i].download_key;
                                support_until = obj['data'][i].support_until;
                            }
                            if (obj['data'][i].domain === main_domain) {
                                update_key = obj['data'][i].download_key;
                                break;
                            }
                        }
                    }
                    if (update_key) {
                        check_key = 1;
                        $('.villatheme-autoupdate-key-field').val(update_key);
                    }
                }
                v_button.removeClass('loading');
                if (check_key) {
                    $('<p><strong>' + message + '</strong></p>').insertAfter(".villatheme-autoupdate-key-field");
                    $(v_button).closest('form').submit();
                } else {
                    $('<p><strong> Your key is not found. Please contact support@villatheme.com </strong></p>').insertAfter(".villatheme-autoupdate-key-field");
                }
            });
        });
    });
    /******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2V0dGluZ3MuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBbUMsY0FBYztBQUNqRDtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQSw4QkFBOEIsY0FBYztBQUM1QztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnQ0FBZ0Msd0JBQXdCO0FBQ3hEO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsMEJBQTBCO0FBQzFCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGNBQWM7QUFDZDtBQUNBO0FBQ0EsU0FBUztBQUNULEtBQUs7QUFDTCxDQUFDLEUiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvc2V0dGluZ3MuanMiXSwic291cmNlc0NvbnRlbnQiOlsiXHJcbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCQpIHtcclxuICAgICd1c2Ugc3RyaWN0JztcclxuICAgICQoJy52aS11aS5tZW51IC5pdGVtJykudmlfdGFiKHtoaXN0b3J5OiB0cnVlfSk7XHJcblxyXG4gICAgJCgnLnZpLXdwYnVsa3ktc2F2ZS1zZXR0aW5ncycpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICB9KTtcclxuXHJcbiAgICAkKCcudmktc2VsZWN0MicpLnNlbGVjdDIoe3dpZHRoOiAnMTAwJSd9KTtcclxuXHJcbiAgICAkKCcudmlsbGF0aGVtZS1nZXQta2V5LWJ1dHRvbicpLm9uZSgnY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgIGxldCB2X2J1dHRvbiA9ICQodGhpcyk7XHJcbiAgICAgICAgdl9idXR0b24uYWRkQ2xhc3MoJ2xvYWRpbmcnKTtcclxuICAgICAgICBsZXQgZGF0YSA9IHZfYnV0dG9uLmRhdGEoKTtcclxuICAgICAgICBsZXQgaXRlbV9pZCA9IGRhdGEuaWQ7XHJcbiAgICAgICAgbGV0IGFwcF91cmwgPSBkYXRhLmhyZWY7XHJcbiAgICAgICAgbGV0IG1haW5fZG9tYWluID0gd2luZG93LmxvY2F0aW9uLmhvc3RuYW1lO1xyXG4gICAgICAgIG1haW5fZG9tYWluID0gbWFpbl9kb21haW4udG9Mb3dlckNhc2UoKTtcclxuICAgICAgICBsZXQgcG9wdXBfZnJhbWU7XHJcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgIGxldCBkb3dubG9hZF91cmwgPSB2X2J1dHRvbi5hdHRyKCdkYXRhLWRvd25sb2FkJyk7XHJcbiAgICAgICAgcG9wdXBfZnJhbWUgPSB3aW5kb3cub3BlbihhcHBfdXJsLCBcIm15V2luZG93XCIsIFwid2lkdGg9MzgwLGhlaWdodD02MDBcIik7XHJcbiAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ21lc3NhZ2UnLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgLypDYWxsYmFjayB3aGVuIGRhdGEgc2VuZCBmcm9tIGNoaWxkIHBvcHVwKi9cclxuICAgICAgICAgICAgbGV0IG9iaiA9ICQucGFyc2VKU09OKGV2ZW50LmRhdGEpO1xyXG4gICAgICAgICAgICBsZXQgdXBkYXRlX2tleSA9ICcnO1xyXG4gICAgICAgICAgICBsZXQgbWVzc2FnZSA9IG9iai5tZXNzYWdlO1xyXG4gICAgICAgICAgICBsZXQgc3VwcG9ydF91bnRpbCA9ICcnO1xyXG4gICAgICAgICAgICBsZXQgY2hlY2tfa2V5ID0gJyc7XHJcbiAgICAgICAgICAgIGlmIChvYmpbJ2RhdGEnXS5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IG9ialsnZGF0YSddLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKG9ialsnZGF0YSddW2ldLmlkID09PSBpdGVtX2lkICYmIChvYmpbJ2RhdGEnXVtpXS5kb21haW4gPT09IG1haW5fZG9tYWluIHx8IG9ialsnZGF0YSddW2ldLmRvbWFpbiA9PT0gJycgfHwgb2JqWydkYXRhJ11baV0uZG9tYWluID09IG51bGwpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICh1cGRhdGVfa2V5ID09ICcnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVfa2V5ID0gb2JqWydkYXRhJ11baV0uZG93bmxvYWRfa2V5O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc3VwcG9ydF91bnRpbCA9IG9ialsnZGF0YSddW2ldLnN1cHBvcnRfdW50aWw7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAoc3VwcG9ydF91bnRpbCA8IG9ialsnZGF0YSddW2ldLnN1cHBvcnRfdW50aWwpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZV9rZXkgPSBvYmpbJ2RhdGEnXVtpXS5kb3dubG9hZF9rZXk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdXBwb3J0X3VudGlsID0gb2JqWydkYXRhJ11baV0uc3VwcG9ydF91bnRpbDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAob2JqWydkYXRhJ11baV0uZG9tYWluID09PSBtYWluX2RvbWFpbikge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdXBkYXRlX2tleSA9IG9ialsnZGF0YSddW2ldLmRvd25sb2FkX2tleTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgaWYgKHVwZGF0ZV9rZXkpIHtcclxuICAgICAgICAgICAgICAgICAgICBjaGVja19rZXkgPSAxO1xyXG4gICAgICAgICAgICAgICAgICAgICQoJy52aWxsYXRoZW1lLWF1dG91cGRhdGUta2V5LWZpZWxkJykudmFsKHVwZGF0ZV9rZXkpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIHZfYnV0dG9uLnJlbW92ZUNsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIGlmIChjaGVja19rZXkpIHtcclxuICAgICAgICAgICAgICAgICQoJzxwPjxzdHJvbmc+JyArIG1lc3NhZ2UgKyAnPC9zdHJvbmc+PC9wPicpLmluc2VydEFmdGVyKFwiLnZpbGxhdGhlbWUtYXV0b3VwZGF0ZS1rZXktZmllbGRcIik7XHJcbiAgICAgICAgICAgICAgICAkKHZfYnV0dG9uKS5jbG9zZXN0KCdmb3JtJykuc3VibWl0KCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAkKCc8cD48c3Ryb25nPiBZb3VyIGtleSBpcyBub3QgZm91bmQuIFBsZWFzZSBjb250YWN0IHN1cHBvcnRAdmlsbGF0aGVtZS5jb20gPC9zdHJvbmc+PC9wPicpLmluc2VydEFmdGVyKFwiLnZpbGxhdGhlbWUtYXV0b3VwZGF0ZS1rZXktZmllbGRcIik7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH0pO1xyXG59KTsiXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=