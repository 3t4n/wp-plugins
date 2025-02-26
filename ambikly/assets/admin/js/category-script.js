/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/admin/utility/config.ts":
/*!********************************************!*\
  !*** ./assets/src/admin/utility/config.ts ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Config: () => (/* binding */ Config)
/* harmony export */ });
var _a;
var Config = {
    AJAX_URL: (_a = window.ambikly_admin) === null || _a === void 0 ? void 0 : _a.ajax_url,
};


/***/ }),

/***/ "./assets/src/admin/utility/form-submission.ts":
/*!*****************************************************!*\
  !*** ./assets/src/admin/utility/form-submission.ts ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   initializeFormSubmission: () => (/* binding */ initializeFormSubmission)
/* harmony export */ });
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./config */ "./assets/src/admin/utility/config.ts");
/* harmony import */ var _toast__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./toast */ "./assets/src/admin/utility/toast.ts");
 // Import Config if needed
 // Import the showToast function
function initializeFormSubmission() {
    var saveTriggerButtons = document.querySelectorAll('.save-trigger-button');
    var forms = document.querySelectorAll('.ambikly-form');
    saveTriggerButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            forms.forEach(function (form) { return form.dispatchEvent(new Event('submit', { cancelable: true })); });
        });
    });
    forms.forEach(function (formElement) {
        formElement.addEventListener('submit', function (e) {
            var _a;
            e.preventDefault();
            var form = e.currentTarget;
            // Check if the form is valid
            if (!form.checkValidity()) {
                form.reportValidity(); // Show validation messages
                return; // Stop submission
            }
            var formData = new FormData(form);
            disableSubmitButtons(); // Disable buttons and show saving text
            fetch((_a = _config__WEBPACK_IMPORTED_MODULE_0__.Config.AJAX_URL) !== null && _a !== void 0 ? _a : '', {
                method: 'POST',
                body: formData,
            })
                .then(function (response) { return response.json(); })
                .then(function (response) {
                enableSubmitButtons(); // Re-enable buttons
                // Clear any previous error messages
                var errorMessages = document.querySelectorAll('.form-group .error-message');
                errorMessages.forEach(function (errorMessage) { return errorMessage.remove(); });
                if (response === 0) {
                    (0,_toast__WEBPACK_IMPORTED_MODULE_1__.showToast)('An error occurred. Please check your AJAX function name or server response.', 'error');
                    return;
                }
                if (response.success) {
                    (0,_toast__WEBPACK_IMPORTED_MODULE_1__.showToast)(response.data.message, 'success');
                }
                else {
                    (0,_toast__WEBPACK_IMPORTED_MODULE_1__.showToast)(response.data.message, 'error');
                    displayValidationErrors(response.data.validationErrors);
                }
                if (response.data.redirect && response.data.redirect !== '') {
                    setTimeout(function () {
                        window.location.href = response.data.redirect;
                    }, 1000); // Redirect after 3 seconds
                }
            })
                .catch(function (error) {
                enableSubmitButtons(); // Re-enable buttons
                (0,_toast__WEBPACK_IMPORTED_MODULE_1__.showToast)('Something went wrong. Please try again.', 'error');
            });
        });
    });
}
// Disable buttons during submission
function disableSubmitButtons() {
    var saveTriggerButtons = document.querySelectorAll('.save-trigger-button');
    var submitButtons = document.querySelectorAll('button[type="submit"]');
    saveTriggerButtons.forEach(function (button) {
        var savingText = button.getAttribute('data-saving-text') || 'Saving...'; // Get data-saving-text or use default
        button.setAttribute('disabled', 'true');
        button.textContent = savingText;
        button.innerHTML += ' <i class="loading-spinner"></i>'; // Add spinner
    });
    submitButtons.forEach(function (button) {
        var savingText = button.getAttribute('data-saving-text') || 'Saving...'; // Get data-saving-text or use default
        button.setAttribute('disabled', 'true');
        button.textContent = savingText;
        button.innerHTML += ' <i class="loading-spinner"></i>'; // Add spinner
    });
}
// Enable buttons after submission
function enableSubmitButtons() {
    var saveTriggerButtons = document.querySelectorAll('.save-trigger-button');
    var submitButtons = document.querySelectorAll('button[type="submit"]');
    saveTriggerButtons.forEach(function (button) {
        var saveText = button.getAttribute('data-text') || 'Save'; // Get data-text or use default 'Save'
        button.removeAttribute('disabled');
        button.textContent = saveText;
    });
    submitButtons.forEach(function (button) {
        var saveText = button.getAttribute('data-text') || 'Save'; // Get data-text or use default 'Save'
        button.removeAttribute('disabled');
        button.textContent = saveText;
    });
}
// Display validation errors
function displayValidationErrors(validationErrors) {
    Object.entries(validationErrors).forEach(function (_a) {
        var _b;
        var fieldName = _a[0], errors = _a[1];
        var errorMessage = errors.join(', ');
        var fieldGroup = (_b = document.querySelector("[name=\"".concat(fieldName, "\"]"))) === null || _b === void 0 ? void 0 : _b.closest('.form-group');
        if (fieldGroup) {
            var existingErrorMessage = fieldGroup.querySelector('.error-message');
            if (existingErrorMessage)
                existingErrorMessage.remove(); // Remove existing message
            var errorElement = document.createElement('p');
            errorElement.className = 'error-message';
            errorElement.style.color = 'red';
            errorElement.textContent = errorMessage;
            var label = fieldGroup.querySelector('label');
            if (label) {
                label.insertAdjacentElement('afterend', errorElement);
            }
        }
    });
}


/***/ }),

/***/ "./assets/src/admin/utility/helper.ts":
/*!********************************************!*\
  !*** ./assets/src/admin/utility/helper.ts ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   generateProductSlug: () => (/* binding */ generateProductSlug)
/* harmony export */ });
function generateProductSlug(text) {
    return text
        .toLowerCase() // Convert to lowercase
        .replace(/[^a-z0-9 -]/g, '') // Remove invalid characters
        .trim() // Trim whitespace
        .replace(/\s+/g, '-') // Replace spaces with hyphens
        .replace(/--+/g, '-'); // Replace multiple hyphens with a single one
}


/***/ }),

/***/ "./assets/src/admin/utility/media-uploader.ts":
/*!****************************************************!*\
  !*** ./assets/src/admin/utility/media-uploader.ts ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   initializeMediaUpload: () => (/* binding */ initializeMediaUpload)
/* harmony export */ });
var mediaUploader; // wp.media doesn't have TypeScript support, so 'any' is used
function initializeMediaUpload(uploadButton) {
    var closestUploadBox = uploadButton.closest('.media-upload-box');
    if (mediaUploader) {
        mediaUploader.open();
        return;
    }
    mediaUploader = wp.media({
        title: 'Choose Image',
        button: {
            text: 'Use this image'
        },
        multiple: false
    });
    mediaUploader.on('select', function () {
        var attachment = mediaUploader.state().get('selection').first().toJSON();
        var imageIdField = closestUploadBox === null || closestUploadBox === void 0 ? void 0 : closestUploadBox.querySelector('.image_id');
        var imagePreviewField = closestUploadBox === null || closestUploadBox === void 0 ? void 0 : closestUploadBox.querySelector('.image-preview');
        if (imageIdField)
            imageIdField.value = attachment.id;
        if (imagePreviewField) {
            imagePreviewField.innerHTML = "<img src=\"".concat(attachment.url, "\" style=\"max-width: 100%; height: auto;\" />");
        }
    });
    mediaUploader.open();
}


/***/ }),

/***/ "./assets/src/admin/utility/toast.ts":
/*!*******************************************!*\
  !*** ./assets/src/admin/utility/toast.ts ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   showToast: () => (/* binding */ showToast)
/* harmony export */ });
// toast.ts
function showToast(message, type) {
    var toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    if (type === 'success') {
        toast.classList.add('toast-success');
    }
    else if (type === 'error') {
        toast.classList.add('toast-error');
    }
    document.body.appendChild(toast);
    toast.style.display = 'block';
    setTimeout(function () {
        toast.style.opacity = '0';
        setTimeout(function () {
            toast.remove(); // Remove after fading out
        }, 300);
    }, 3000);
}


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
/*!**************************************!*\
  !*** ./assets/src/admin/category.ts ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utility_media_uploader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utility/media-uploader */ "./assets/src/admin/utility/media-uploader.ts");
/* harmony import */ var _utility_form_submission__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utility/form-submission */ "./assets/src/admin/utility/form-submission.ts");
/* harmony import */ var _utility_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./utility/helper */ "./assets/src/admin/utility/helper.ts");


 // Import the form submission function
document.addEventListener('DOMContentLoaded', function () {
    var uploadButton;
    var AmbiklyCategory = {
        init: function () {
            this.handleMediaUpload();
            (0,_utility_form_submission__WEBPACK_IMPORTED_MODULE_1__.initializeFormSubmission)(); // Call the imported form submission function
            this.bindSlugEvent();
        },
        handleMediaUpload: function () {
            var uploadButtons = document.querySelectorAll('.ambikly-image-upload');
            uploadButtons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    uploadButton = e.currentTarget;
                    (0,_utility_media_uploader__WEBPACK_IMPORTED_MODULE_0__.initializeMediaUpload)(uploadButton);
                });
            });
        },
        bindSlugEvent: function () {
            var categoryNameInput = document.querySelector('input[name="category_name"]');
            var categorySlugInput = document.querySelector('input[name="category_slug"]');
            if (categoryNameInput) {
                categoryNameInput.addEventListener('input', function () {
                    var categoryName = categoryNameInput.value;
                    var slug = (0,_utility_helper__WEBPACK_IMPORTED_MODULE_2__.generateProductSlug)(categoryName);
                    if (categorySlugInput) {
                        categorySlugInput.value = slug; // Set slug in category_slug input
                    }
                });
            }
        },
    };
    AmbiklyCategory.init();
});

})();

/******/ })()
;
//# sourceMappingURL=category-script.js.map