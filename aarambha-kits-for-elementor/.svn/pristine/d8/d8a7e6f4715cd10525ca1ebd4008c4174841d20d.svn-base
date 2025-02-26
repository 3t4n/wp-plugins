/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/imageupload.js":
/*!**************************************!*\
  !*** ./assets/src/js/imageupload.js ***!
  \**************************************/
/***/ (function() {

eval("/**\r\n * Image upload JS setting.\r\n */\njQuery(document).ready(function ($) {\n  var file_frame;\n  $(document.body).on('click', '.custom_media_upload', function (event) {\n    var $el = $(this);\n    var file_target_input = $el.parent().find('.custom_media_input');\n    var file_target_preview = $el.parent().find('.custom_media_preview');\n    event.preventDefault(); // Create the media frame.\n\n    file_frame = wp.media.frames.media_file = wp.media({\n      // Set the title of the modal.\n      title: $el.data('choose'),\n      button: {\n        text: $el.data('update')\n      },\n      states: [new wp.media.controller.Library({\n        title: $el.data('choose'),\n        library: wp.media.query({\n          type: 'image'\n        })\n      })]\n    }); // When an image is selected, run a callback.\n\n    file_frame.on('select', function () {\n      // Get the attachment from the modal frame.\n      var attachment = file_frame.state().get('selection').first().toJSON(); // Initialize input and preview change.\n\n      file_target_input.val(attachment.url).change();\n      file_target_preview.css({\n        display: 'none'\n      }).find('img').remove();\n      file_target_preview.css({\n        display: 'block'\n      }).append('<img src=\"' + attachment.url + '\" style=\"max-width:100%\">');\n    }); // Finally, open the modal.\n\n    file_frame.open();\n  }); // Media Uploader Preview.\n\n  $('input.custom_media_input').each(function () {\n    var preview_image = $(this).val(),\n        preview_target = $(this).siblings('.custom_media_preview'); // Initialize image previews.\n\n    if (preview_image !== '') {\n      preview_target.find('img.custom_media_preview_default').remove();\n      preview_target.css({\n        display: 'block'\n      }).append('<img src=\"' + preview_image + '\" style=\"max-width:100%\">');\n    }\n  });\n});\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/js/imageupload.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/src/js/imageupload.js"]();
/******/ 	
/******/ })()
;