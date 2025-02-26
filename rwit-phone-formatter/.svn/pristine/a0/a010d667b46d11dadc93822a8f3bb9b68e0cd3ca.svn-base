/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/admin/custom-admin.js":
/*!***********************************!*\
  !*** ./src/admin/custom-admin.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/**\n * Admin entry point.\n */\n// Admin Scripts\n\nwindow.addEventListener('load', function (event) {\n  var phone = document.querySelector('#cpnf_placeholder');\n\n  if (phone != null) {\n    errorMsg(phone, 'warning');\n  }\n\n  var name = document.querySelector('#cpnf_name');\n\n  if (name != null) {\n    errorMsg(name, 'warning-char');\n  }\n  /*\n  * Validation on submit\n  */\n\n\n  var form = document.querySelector('#plugin-settings');\n  form.addEventListener('submit', function (ev) {\n    var nameStatus = true;\n    var name = document.querySelector('#cpnf_name'); // Replace spaces with underscore of name field\n\n    name.value = name.value.trim().replace(/ /g, \"_\");\n    nameStatus = validateName();\n\n    if (!nameStatus) {\n      ev.preventDefault();\n      name.focus();\n    }\n  }); // Copy to Clipboard functionality\n\n  var copyIcon = document.querySelectorAll('.copy-icn');\n  Array.prototype.forEach.call(copyIcon, function (element) {\n    element.addEventListener('click', function () {\n      var id = element.parentNode.children[0].id;\n      copyText(id);\n    });\n  });\n}); // Copy Text \n\nfunction copyText(id) {\n  /* Get the text field */\n  var text = document.getElementById(id);\n  var parentNode = text.parentNode.parentNode.parentNode;\n  /* Select the text field */\n\n  text.select();\n  text.setSelectionRange(0, 99999);\n  /* For mobile devices */\n\n  /* Copy the text inside the text field */\n\n  document.execCommand(\"copy\"); //display copy to clipboard message\n\n  var copyMsg = document.querySelector('.copy-alert.cpnf_shortcode');\n\n  if (!copyMsg.classList.contains('show-alert')) {\n    copyMsg.classList.add('show-alert');\n  } //Hide copy message \n\n\n  setTimeout(function () {\n    if (copyMsg.classList.contains('show-alert')) {\n      copyMsg.classList.remove('show-alert');\n    }\n  }, 2000);\n} // Function for create a empty node for error msg\n\n\nfunction errorMsg(selector, extraClass) {\n  var invalidMsg = document.createElement('p');\n  var message = document.createTextNode('');\n  invalidMsg.appendChild(message);\n  invalidMsg.classList.add('note-text', extraClass);\n  selector.parentNode.insertBefore(invalidMsg, selector.nextSibling);\n} // Validate name field\n\n\nfunction validateName() {\n  var name = document.querySelector('#cpnf_name');\n  var warningMsg = document.querySelector('.note-text.warning-char');\n  var status = true; // Phone name required validation\n\n  if (name.value == '') {\n    status = false;\n    warningMsg.innerHTML = 'This is a required field.';\n  } else {\n    // Phone name Special Character validation\n    status = /^[a-zA-Z0-9_]+$/.test(name.value);\n    warningMsg.innerHTML = 'Special character is not allowed.';\n  }\n\n  setDisplay(warningMsg, status);\n  return status;\n} //Set error message display\n\n\nfunction setDisplay(selector, status) {\n  if (status == false) {\n    selector.style.display = 'block';\n  } else selector.style.display = 'none';\n}\n\n//# sourceURL=webpack://rwit-phone-formatter/./src/admin/custom-admin.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/admin/custom-admin.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;