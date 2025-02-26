/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/term.js":
/*!*******************************!*\
  !*** ./assets/src/js/term.js ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _css_term_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/term.css */ \"./assets/src/css/term.css\");\n// Styles\n\n/**\r\n * File meta-box script.\r\n *\r\n * Theme Post/Page Meta Box enhancements for a better user experience.\r\n *\r\n */\n\n(function ($) {\n  \"use strict\";\n\n  var custom_theme_file_frame; // Uploads.\n\n  jQuery(document).on('click', 'input.select-img', function (event) {\n    var $this = $(this);\n    event.preventDefault();\n    var CustomThemeImage = wp.media.controller.Library.extend({\n      defaults: _.defaults({\n        id: 'custom-theme-insert-image',\n        title: $this.data('uploader_title'),\n        allowLocalEdits: false,\n        displaySettings: true,\n        displayUserSettings: false,\n        multiple: false,\n        library: wp.media.query({\n          type: 'image'\n        })\n      }, wp.media.controller.Library.prototype.defaults)\n    }); // Create the media frame.\n\n    custom_theme_file_frame = wp.media.frames.custom_theme_file_frame = wp.media({\n      button: {\n        text: jQuery(this).data('uploader_button_text')\n      },\n      state: 'custom-theme-insert-image',\n      states: [new CustomThemeImage()],\n      multiple: false\n    }); // When an image is selected, run a callback.\n\n    custom_theme_file_frame.on('select', function () {\n      var state = custom_theme_file_frame.state('custom-theme-insert-image');\n      var selection = state.get('selection');\n      var display = state.display(selection.first()).toJSON();\n      var obj_attachment = selection.first().toJSON();\n      display = wp.media.string.props(display, obj_attachment);\n      var image_field = $this.siblings('.img');\n      var imgurl = display.src; // Copy image URL.\n\n      image_field.val(imgurl);\n      image_field.trigger('change'); // Show in preview.\n\n      var image_preview_wrap = $this.siblings('.image-preview-wrap');\n      var image_html = '<img src=\"' + imgurl + '\" alt=\"\" style=\"width:200px;height:auto;\" />';\n      image_preview_wrap.html(image_html); // Show Remove button.\n\n      var image_remove_button = $this.siblings('.btn-image-remove');\n      image_remove_button.css('display', 'inline-block');\n    }); // Finally, open the modal.\n\n    custom_theme_file_frame.open();\n  }); // Remove image.\n\n  jQuery(document).on('click', 'input.btn-image-remove', function (e) {\n    e.preventDefault();\n    var $this = $(this);\n    var image_field = $this.siblings('.img');\n    image_field.val('');\n    var image_preview_wrap = $this.siblings('.image-preview-wrap');\n    image_preview_wrap.html('');\n    $this.css('display', 'none');\n    image_field.trigger('change');\n  });\n  $('.image-upload-button').click(function () {\n    event.preventDefault();\n    var imgContainer = $(this).closest('.image-fields-wrap').find('.thumbnail-image .image-container'),\n        removeimg = $(this).closest('.image-fields-wrap').find('.image-delete-button'),\n        imgIdInput = $(this).siblings('.upload-id');\n    var frame; // Create a new media frame\n\n    frame = wp.media({\n      title: AARAMBHA_KITS.upload_image,\n      button: {\n        text: AARAMBHA_KITS.use_image\n      },\n      multiple: false // Set to true to allow multiple files to be selected\n\n    }); // When an image is selected in the media frame...\n\n    frame.on('select', function () {\n      // Get media attachment details from the frame state\n      var attachment = frame.state().get('selection').first().toJSON(); // Send the attachment URL to our custom image input field.\n\n      imgContainer.html('<img src=\"' + attachment.url + '\" style=\"width:200px;height:auto;\" />');\n      removeimg.addClass('image-show'); // Send the attachment id to our hidden input\n\n      imgIdInput.val(attachment.url).trigger('change');\n    }); // Finally, open the modal on click\n\n    frame.open();\n  }); // DELETE IMAGE LINK\n\n  $('.image-delete-button').click(function () {\n    event.preventDefault();\n    var imgContainer = $(this).closest('.image-fields-wrap').find('.thumbnail-image .image-container');\n    var removeimg = $(this).closest('.image-fields-wrap').find('.image-delete-button');\n    var imgIdInput = $(this).closest('.image-fields-wrap').find('.upload-id'); // Clear out the preview image\n\n    imgContainer.find('img').remove();\n    removeimg.removeClass('image-show'); // Delete the image id from the hidden input\n\n    imgIdInput.val('').trigger('change');\n  }); // Remove IMAGE AFTER CATEGORY CREATED LINK\n\n  $(document).ajaxSuccess(function (e, request, settings) {\n    var object = settings.data;\n\n    if (typeof object == 'string') {\n      var object = object.split(\"&\");\n\n      if (object.includes('action=add-tag') && object.includes('screen=edit-category') && object.includes('taxonomy=category')) {\n        $('.image-delete-button').removeClass('image-show');\n        $('.upload-id').attr('value', '');\n        $('.image-container').empty();\n      }\n    }\n  });\n  jQuery(document).ready(function ($) {\n    $('.colorpicker').wpColorPicker();\n  }); // End Document Ready JQuery\n})(jQuery);\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/js/term.js?");

/***/ }),

/***/ "./assets/src/css/term.css":
/*!*********************************!*\
  !*** ./assets/src/css/term.css ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/css/term.css?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/src/js/term.js");
/******/ 	
/******/ })()
;