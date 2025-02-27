/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
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
var __webpack_exports__ = {};
__webpack_require__.r(__webpack_exports__);

document.addEventListener("DOMContentLoaded", function () {
  // Remove Freemius Dashboard Links
  var linktFSLink = document.querySelectorAll(".fs-submenu-item.linkt");
  if (linktFSLink) {
    linktFSLink.forEach(function (item) {
      item.closest("li").remove();
    });
  }
  // Remove Sub-Categories in Free
  var linktCatParentSelect = document.querySelector("body.wp-admin.taxonomy-linkts.linkt-free .form-field.term-parent-wrap, body.wp-admin.post-type-linkt.linkt-free #taxonomy-linkts .category-add select#newlinkts_parent");
  if (linktCatParentSelect) linktCatParentSelect.remove();
});
(this.linkt = this.linkt || {}).admin = __webpack_exports__;
/******/ })()
;