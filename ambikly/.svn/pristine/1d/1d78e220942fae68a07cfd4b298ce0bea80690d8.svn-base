/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/frontend/utility/apiRequest.ts":
/*!***************************************************!*\
  !*** ./assets/src/frontend/utility/apiRequest.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   apiRequest: () => (/* binding */ apiRequest)
/* harmony export */ });
var __assign = (undefined && undefined.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
var __awaiter = (undefined && undefined.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (undefined && undefined.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g = Object.create((typeof Iterator === "function" ? Iterator : Object).prototype);
    return g.next = verb(0), g["throw"] = verb(1), g["return"] = verb(2), typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
function apiRequest(url_1) {
    return __awaiter(this, arguments, void 0, function (url, options) {
        var _a, method, _b, headers, body, response, data, error_1;
        if (options === void 0) { options = {}; }
        return __generator(this, function (_c) {
            switch (_c.label) {
                case 0:
                    _a = options.method, method = _a === void 0 ? 'POST' : _a, _b = options.headers, headers = _b === void 0 ? {} : _b, body = options.body;
                    _c.label = 1;
                case 1:
                    _c.trys.push([1, 4, , 5]);
                    console.log("URL IS " + url);
                    return [4 /*yield*/, fetch(url, {
                            method: method,
                            headers: __assign({}, headers),
                            body: body,
                        })];
                case 2:
                    response = _c.sent();
                    console.log("Api called ");
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return [4 /*yield*/, response.text()];
                case 3:
                    data = _c.sent();
                    return [2 /*return*/, data];
                case 4:
                    error_1 = _c.sent();
                    console.error('Error during request:', error_1);
                    throw error_1; // Rethrow error for further handling
                case 5: return [2 /*return*/];
            }
        });
    });
}


/***/ }),

/***/ "./assets/src/frontend/utility/config.ts":
/*!***********************************************!*\
  !*** ./assets/src/frontend/utility/config.ts ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Config: () => (/* binding */ Config)
/* harmony export */ });
var _a;
var Config = {
    AJAX_URL: (_a = window.ambikly) === null || _a === void 0 ? void 0 : _a.ajax_url,
};


/***/ }),

/***/ "./assets/src/frontend/utility/message.ts":
/*!************************************************!*\
  !*** ./assets/src/frontend/utility/message.ts ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   displayMessage: () => (/* binding */ displayMessage)
/* harmony export */ });
function displayMessage(htmlElement, message, type, insertBefore, scrollToMessage // New argument for scrolling
) {
    var _a, _b;
    if (insertBefore === void 0) { insertBefore = false; }
    if (scrollToMessage === void 0) { scrollToMessage = false; }
    var existingMessage = document.querySelector('.ambikly-message');
    if (existingMessage) {
        existingMessage.remove(); // Remove any existing messages
    }
    var messageElement = document.createElement('div');
    messageElement.className = "ambikly-message ".concat(type, "-message"); // Add class based on message type
    messageElement.innerHTML = message; // Set the plain message
    messageElement.style.display = 'none'; // Initially hide the message
    messageElement.style.marginTop = '10px'; // Add margin for spacing
    if (insertBefore) {
        (_a = htmlElement.parentNode) === null || _a === void 0 ? void 0 : _a.insertBefore(messageElement, htmlElement); // Insert message before the htmlElement
    }
    else {
        (_b = htmlElement.parentNode) === null || _b === void 0 ? void 0 : _b.insertBefore(messageElement, htmlElement.nextSibling); // Insert message after the htmlElement
    }
    // Show the message after inserting
    messageElement.style.display = 'block'; // Show the message
    // Scroll to the message element's parent if scrollToMessage is true
    if (scrollToMessage) {
        var parentElement = messageElement.parentElement;
        if (parentElement) {
            parentElement.scrollIntoView({
                behavior: 'smooth', // Smooth scrolling
                block: 'start', // Align to the top of the view
            });
        }
    }
}


/***/ }),

/***/ "./assets/src/frontend/utility/messageTypes.ts":
/*!*****************************************************!*\
  !*** ./assets/src/frontend/utility/messageTypes.ts ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   MessageType: () => (/* binding */ MessageType)
/* harmony export */ });
// Define message types as constants
var MessageType = {
    SUCCESS: 'success',
    ERROR: 'error',
};


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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*************************************!*\
  !*** ./assets/src/frontend/cart.ts ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utility_message__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utility/message */ "./assets/src/frontend/utility/message.ts");
/* harmony import */ var _utility_messageTypes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utility/messageTypes */ "./assets/src/frontend/utility/messageTypes.ts");
/* harmony import */ var _utility_apiRequest__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./utility/apiRequest */ "./assets/src/frontend/utility/apiRequest.ts");
/* harmony import */ var _utility_config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./utility/config */ "./assets/src/frontend/utility/config.ts");
var __awaiter = (undefined && undefined.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (undefined && undefined.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g = Object.create((typeof Iterator === "function" ? Iterator : Object).prototype);
    return g.next = verb(0), g["throw"] = verb(1), g["return"] = verb(2), typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};



 // Assuming apiRequest is in utility
// Main functionality for managing the cart
document.addEventListener('DOMContentLoaded', function () {
    var ambiklyCart = {
        init: function () {
            this.bindEvents();
        },
        bindEvents: function () {
            var _this = this;
            // Combine both event listeners to minimize redundancy
            document.body.addEventListener('input', function (e) {
                var target = e.target;
                var isQuantityChange = target.classList.contains('ambikly-cart-quantity');
                if (isQuantityChange) {
                    var quantity = target.value;
                    _this.ajax(quantity, target);
                }
            });
            document.body.addEventListener('click', function (e) {
                var target = e.target;
                var isRemoveClick = target.classList.contains('ambikly-remove-button');
                if (isRemoveClick) {
                    var quantity = '0'; // Set quantity to 0 when removing
                    _this.ajax(quantity, target);
                }
            });
        },
        ajax: function (quantity, target) {
            return __awaiter(this, void 0, void 0, function () {
                var row, cartContainer, formData, response, data, messageType, error_1;
                var _a;
                return __generator(this, function (_b) {
                    switch (_b.label) {
                        case 0:
                            row = target.closest('tr');
                            if (!row)
                                return [2 /*return*/]; // Exit early if no row found
                            cartContainer = row.closest('.ambikly-cart-container');
                            if (!cartContainer)
                                return [2 /*return*/]; // Exit early if no cart container found
                            formData = this.buildFormData(quantity, row, cartContainer);
                            _b.label = 1;
                        case 1:
                            _b.trys.push([1, 3, , 4]);
                            return [4 /*yield*/, (0,_utility_apiRequest__WEBPACK_IMPORTED_MODULE_2__.apiRequest)((_a = _utility_config__WEBPACK_IMPORTED_MODULE_3__.Config.AJAX_URL) !== null && _a !== void 0 ? _a : '', {
                                    method: 'POST',
                                    body: formData,
                                })];
                        case 2:
                            response = _b.sent();
                            data = JSON.parse(response);
                            if (quantity === '0')
                                row.remove(); // Remove row if quantity is 0
                            messageType = data.success ? _utility_messageTypes__WEBPACK_IMPORTED_MODULE_1__.MessageType.SUCCESS : _utility_messageTypes__WEBPACK_IMPORTED_MODULE_1__.MessageType.ERROR;
                            (0,_utility_message__WEBPACK_IMPORTED_MODULE_0__.displayMessage)(cartContainer, data.data.message || 'Failed to update cart.', messageType, true);
                            return [3 /*break*/, 4];
                        case 3:
                            error_1 = _b.sent();
                            console.error('Error during cart update:', error_1);
                            (0,_utility_message__WEBPACK_IMPORTED_MODULE_0__.displayMessage)(cartContainer, 'An error occurred while processing your request.', _utility_messageTypes__WEBPACK_IMPORTED_MODULE_1__.MessageType.ERROR, true);
                            return [3 /*break*/, 4];
                        case 4: return [2 /*return*/];
                    }
                });
            });
        },
        buildFormData: function (quantity, row, cartContainer) {
            var _a, _b;
            var formData = new FormData();
            formData.append('quantity', quantity);
            var productId = row.getAttribute('data-product-id');
            var ambiklyNonce = (_a = cartContainer.querySelector('input[name="ambikly_nonce"]')) === null || _a === void 0 ? void 0 : _a.value;
            var action = (_b = cartContainer.querySelector('input[name="action"]')) === null || _b === void 0 ? void 0 : _b.value;
            if (productId)
                formData.append('product_id', productId);
            if (ambiklyNonce)
                formData.append('ambikly_nonce', ambiklyNonce);
            if (action)
                formData.append('action', action);
            return formData;
        },
    };
    ambiklyCart.init();
});

})();

/******/ })()
;
//# sourceMappingURL=cart-script.js.map