/*! Build: 10/19/2024, 5:50:34 PM */
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/admin.menu.es6":
/*!*******************************!*\
  !*** ./src/js/admin.menu.es6 ***!
  \*******************************/
/***/ (() => {

eval("/* global wpNavMenu */\n\n(function ($) {\n    'use strict';\n\n    function addLinkToMenu(url, label) {\n        wpNavMenu.addLinkToMenu(url, label, null, function () {\n            // Remove the ajax spinner\n            $('.customlinkdiv .spinner').removeClass('is-active');\n            // Set custom link form back to defaults\n            $('#custom-menu-item-name').val('').blur();\n            $('#custom-menu-item-url').val('').attr('placeholder', 'https://');\n        });\n    }\n\n    $(document).ready(function () {\n        $('#menu-settings-column').bind('click', function (e) {\n            const target = e.target;\n\n            if ($(target).is('#submit-da-reactions-menu-item')) {\n                $('#da-reactions-checklist-pop input:checked').each(function() {\n                    addLinkToMenu($(this).val(), $(this).attr('name'));\n                    $(this).prop('checked', false);\n                })\n            }\n        });\n    })\n\n}(jQuery));\n\n\n//# sourceURL=webpack://da-reactions-assets/./src/js/admin.menu.es6?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/admin.menu.es6"]();
/******/ 	
/******/ })()
;