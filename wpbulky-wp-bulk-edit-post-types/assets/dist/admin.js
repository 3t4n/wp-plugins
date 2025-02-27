/******/ (() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!**********************!*\
      !*** ./src/admin.js ***!
      \**********************/
    jQuery(document).ready(function ($) {
        'use strict';
        if (typeof viWbeParams === 'undefined') {
            let $post_screen = $(`.edit-php.post-type-${wpBulkyParams.postType}`),
                $title_action = $post_screen.find('.page-title-action:first');

            if (wpBulkyParams.url) {
                $title_action.after(`<a href="${wpBulkyParams.url}" class="page-title-action" style="display: inline-block">
                                    <i class="dashicons dashicons-media-spreadsheet" style="height: auto; font-size: 18px; line-height: 26px"> </i>
                                    ${wpBulkyParams.text}
                                </a>`);
            }
        }

    });
    /******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYWRtaW4uanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQSxvREFBb0QsdUJBQXVCO0FBQzNFO0FBQ0E7QUFDQTtBQUNBLDRDQUE0QyxrQkFBa0I7QUFDOUQsMEdBQTBHLGlCQUFpQjtBQUMzSCxzQ0FBc0M7QUFDdEM7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEUiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvYWRtaW4uanMiXSwic291cmNlc0NvbnRlbnQiOlsialF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG4gICAgaWYgKHR5cGVvZiB2aVdiZVBhcmFtcyA9PT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgICAgICBsZXQgJHBvc3Rfc2NyZWVuID0gJChgLmVkaXQtcGhwLnBvc3QtdHlwZS0ke3dwQnVsa3lQYXJhbXMucG9zdFR5cGV9YCksXHJcbiAgICAgICAgICAgICR0aXRsZV9hY3Rpb24gPSAkcG9zdF9zY3JlZW4uZmluZCgnLnBhZ2UtdGl0bGUtYWN0aW9uOmZpcnN0Jyk7XHJcblxyXG4gICAgICAgIGlmICh3cEJ1bGt5UGFyYW1zLnVybCkge1xyXG4gICAgICAgICAgICAkdGl0bGVfYWN0aW9uLmFmdGVyKGA8YSBocmVmPVwiJHt3cEJ1bGt5UGFyYW1zLnVybH1cIiBjbGFzcz1cInBhZ2UtdGl0bGUtYWN0aW9uXCIgc3R5bGU9XCJkaXNwbGF5OiBpbmxpbmUtYmxvY2tcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9XCJkYXNoaWNvbnMgZGFzaGljb25zLW1lZGlhLXNwcmVhZHNoZWV0XCIgc3R5bGU9XCJoZWlnaHQ6IGF1dG87IGZvbnQtc2l6ZTogMThweDsgbGluZS1oZWlnaHQ6IDI2cHhcIj4gPC9pPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAke3dwQnVsa3lQYXJhbXMudGV4dH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2E+YCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxufSk7Il0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9