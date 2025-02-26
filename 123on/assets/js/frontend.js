(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["frontend"],{

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/App.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/App.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);\n//\n//\n//\n//\n//\n//\n//\n//\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  name: 'p123on',\n  data: () => ({\n    video: null\n  }),\n  props: {\n    id: {\n      type: Number,\n      default: 1\n    }\n  },\n\n  mounted() {\n    axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/wp-json/v2/video_123on/posts/' + this.id).then(response => {\n      this.video = response.data;\n    }).catch(error => {\n      console.log(error);\n    });\n  }\n\n});\n\n//# sourceURL=webpack:///./src/frontend/App.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Home.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/pages/Home.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n//\n//\n//\n//\n//\n//\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  name: 'Home',\n\n  data() {\n    return {\n      msg: 'Welcome to Your Vue.js Frontend App'\n    };\n  }\n\n});\n\n//# sourceURL=webpack:///./src/frontend/pages/Home.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Profile.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/pages/Profile.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n//\n//\n//\n//\n//\n//\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  name: 'Profile',\n\n  data() {\n    return {};\n  }\n\n});\n\n//# sourceURL=webpack:///./src/frontend/pages/Profile.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/App.vue?vue&type=template&id=82d33a46&":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/App.vue?vue&type=template&id=82d33a46& ***!
  \*******************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function() {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"div\", { attrs: { id: \"vue-frontend-app\" } }, [\n    _vm._v(\"\\n  There, you will see a video rendered.\"),\n    _c(\"br\"),\n    _vm._v(\"\\n  ID: \" + _vm._s(_vm.video.ID)),\n    _c(\"br\"),\n    _vm._v(\"\\n  Title: \" + _vm._s(_vm.video.post_title) + \"\\n\")\n  ])\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/frontend/App.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function() {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"div\", { staticClass: \"hello\" }, [\n    _c(\"span\", [_vm._v(_vm._s(_vm.msg))])\n  ])\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/frontend/pages/Home.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function() {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"div\", { staticClass: \"profile\" }, [\n    _vm._v(\"\\n  The Profile Page\\n\")\n  ])\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/frontend/pages/Profile.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./src/frontend/App.vue":
/*!******************************!*\
  !*** ./src/frontend/App.vue ***!
  \******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./App.vue?vue&type=template&id=82d33a46& */ \"./src/frontend/App.vue?vue&type=template&id=82d33a46&\");\n/* harmony import */ var _App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./App.vue?vue&type=script&lang=js& */ \"./src/frontend/App.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  null,\n  null\n  \n)\n\n/* hot reload */\nif (false) { var api; }\ncomponent.options.__file = \"src/frontend/App.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/frontend/App.vue?");

/***/ }),

/***/ "./src/frontend/App.vue?vue&type=script&lang=js&":
/*!*******************************************************!*\
  !*** ./src/frontend/App.vue?vue&type=script&lang=js& ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../node_modules/babel-loader/lib!../../node_modules/vue-loader/lib??vue-loader-options!./App.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/App.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/frontend/App.vue?");

/***/ }),

/***/ "./src/frontend/App.vue?vue&type=template&id=82d33a46&":
/*!*************************************************************!*\
  !*** ./src/frontend/App.vue?vue&type=template&id=82d33a46& ***!
  \*************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../node_modules/vue-loader/lib??vue-loader-options!./App.vue?vue&type=template&id=82d33a46& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/App.vue?vue&type=template&id=82d33a46&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_82d33a46___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/frontend/App.vue?");

/***/ }),

/***/ "./src/frontend/main.js":
/*!******************************!*\
  !*** ./src/frontend/main.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm.js\");\n/* harmony import */ var _App_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./App.vue */ \"./src/frontend/App.vue\");\n/* harmony import */ var _router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./router */ \"./src/frontend/router/index.js\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_3__);\n\n\n\n\nvue__WEBPACK_IMPORTED_MODULE_0__[\"default\"].config.productionTip = false;\n/* eslint-disable no-new */\n// new Vue({\n//   el: '#vue-frontend-app',\n//   router,\n//   render: h => h(App, {\n//     props:{\n//       id: parseInt(document.querySelector(\"#vue-frontend-app\").dataset.video)\n//     }\n//   })\n// })\n\njQuery(document).ready(function ($) {\n  const videos = [...document.querySelectorAll('.video')];\n  let allHotspots = [];\n  videos.forEach(video => {\n    axios__WEBPACK_IMPORTED_MODULE_3___default.a.get('/wp-json/v2/video_123on/video_meta/' + video.dataset.video).then(response => {\n      allHotspots[video.dataset.video] = JSON.parse(JSON.parse(response.data));\n      video.allowFullscreen = false;\n      let overlays = [];\n      let hotspotHyperlinks = [];\n      let hotspotImages = [];\n      let hotspots = allHotspots[video.dataset.video];\n      let node = video.parentNode.firstChild;\n\n      while (node) {\n        if (node !== video && node.nodeType === Node.ELEMENT_NODE) if ($(node).hasClass('overlay')) {\n          overlays.push(node);\n        }\n        node = node.nextElementSibling || node.nextSibling;\n      }\n\n      overlays.forEach(function (item) {\n        hotspotHyperlinks.push($(item).children(\"a\"));\n      });\n      hotspotHyperlinks.forEach(function (item) {\n        hotspotImages.push($(item).children(\"img\"));\n      });\n\n      for (let i = 0; i < hotspots.length; i++) {\n        if (hotspots[i].btn_option == '1') {\n          hotspotHyperlinks[i].addClass('white-hotspot');\n          hotspotHyperlinks[i].removeClass('overlay__hyperlink');\n          hotspotImages[i].remove();\n        }\n\n        if (hotspots[i].btn_option == '2') {\n          hotspotImages[i].attr('src', video.dataset.hotspot2);\n          $(overlays[i]).addClass('overlay-transparent');\n          hotspotHyperlinks[i].addClass('hyperlink-transparent');\n        }\n\n        if (hotspots[i].btn_option == '3') {\n          hotspotImages[i].attr('src', video.dataset.hotspot3);\n        }\n\n        hotspotHyperlinks[i].attr('href', hotspots[i].value);\n        $(overlays[i]).css('top', hotspots[i].position_y + '%');\n        $(overlays[i]).css('left', hotspots[i].position_x + '%');\n\n        if (hotspots[i].option == 'product') {\n          let popup = $(overlays[i]).nextAll(\".product__popup:first\").css('display', 'flex');\n          $(popup).find(\".product__button\").attr(\"href\", hotspots[i].value);\n        }\n\n        if (hotspots[i].option == 'custom-product') {\n          let popup = $(overlays[i]).nextAll(\".product__popup:first\").css('display', 'flex');\n          $(popup).find(\".product__name\").text(hotspots[i].custom_product.name);\n          $(popup).find(\".product__price\").text(hotspots[i].custom_product.price);\n\n          if (!/^https?:\\/\\//i.test(hotspots[i].custom_product.link)) {\n            hotspots[i].custom_product.link = 'http://' + hotspots[i].custom_product.link;\n          }\n\n          $(popup).find(\".product__button\").attr(\"href\", hotspots[i].custom_product.link);\n          $(popup).find(\".product__thumbnail\").attr(\"src\", hotspots[i].custom_product.image_url);\n          hotspotHyperlinks[i].attr('href', hotspots[i].custom_product.link);\n        }\n      }\n    });\n  });\n  videos.filter(video => video.addEventListener('timeupdate', e => {\n    let overlays = [];\n    let hotspots = allHotspots[video.dataset.video];\n    let node = video.parentNode.firstChild;\n\n    while (node) {\n      if (node !== video && node.nodeType === Node.ELEMENT_NODE) if ($(node).hasClass('overlay')) {\n        overlays.push(node);\n      }\n      node = node.nextElementSibling || node.nextSibling;\n    }\n\n    let vidCurrentTime = e.target.currentTime;\n\n    try {\n      for (let i = 0; i < hotspots.length; i++) {\n        if (format(vidCurrentTime) >= hotspots[i].startTime && format(vidCurrentTime) < hotspots[i].stopTime) {\n          $(overlays[i]).css('display', 'flex');\n\n          if (hotspots[i].option == 'product') {\n            $(overlays[i]).nextAll(\".product__popup:first\").css('display', 'flex');\n          }\n\n          if (hotspots[i].option == 'custom-product') {\n            $(overlays[i]).nextAll(\".product__popup:first\").css('display', 'flex');\n          }\n        } else {\n          $(overlays[i]).hide();\n          $(overlays[i]).nextAll(\".product__popup:first\").hide();\n        }\n      }\n    } catch (e) {}\n  }));\n\n  function format(s) {\n    let m = Math.floor(s / 60);\n    m = m >= 10 ? m : '0' + m;\n    s = Math.floor(s % 60);\n    s = s >= 10 ? s : '0' + s;\n    return m + ':' + s;\n  }\n\n  $(\".product__info-container\").on(\"click\", function (e) {\n    if ($(this).hasClass(\"product__info-container--minimized\")) {\n      $(this).parent().removeClass(\"product__popup--minimized\");\n      $(this).removeClass(\"product__info-container--minimized\");\n      $(this).children(\".product-data__container\").removeClass(\"product-data__container--minimized\");\n      $(this).children(\".product-data__container\").find(\".product__thumbnail\").removeClass(\"product__thumbnail--minimized\");\n      $(this).children(\".minimize__popup-btn\").children(\".minimize__popup-arrow-left\").removeClass(\"minimize__popup-arrow-left--minimized\");\n      $(this).children(\".minimize__popup-btn\").children(\".minimize__popup-arrow-right\").removeClass(\"minimize__popup-arrow-right--minimized\");\n    } else {\n      $(this).parent().addClass(\"product__popup--minimized\");\n      $(this).addClass(\"product__info-container--minimized\");\n      $(this).children(\".product-data__container\").addClass(\"product-data__container--minimized\");\n      $(this).children(\"div\").find(\".product__thumbnail\").addClass(\"product__thumbnail--minimized\");\n      $(this).children(\".minimize__popup-btn\").children(\".minimize__popup-arrow-left\").addClass(\"minimize__popup-arrow-left--minimized\");\n      $(this).children(\".minimize__popup-btn\").children(\".minimize__popup-arrow-right\").addClass(\"minimize__popup-arrow-right--minimized\");\n    }\n  });\n});\n\n//# sourceURL=webpack:///./src/frontend/main.js?");

/***/ }),

/***/ "./src/frontend/pages/Home.vue":
/*!*************************************!*\
  !*** ./src/frontend/pages/Home.vue ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Home.vue?vue&type=template&id=668e76be&scoped=true& */ \"./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true&\");\n/* harmony import */ var _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Home.vue?vue&type=script&lang=js& */ \"./src/frontend/pages/Home.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  \"668e76be\",\n  null\n  \n)\n\n/* hot reload */\nif (false) { var api; }\ncomponent.options.__file = \"src/frontend/pages/Home.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/frontend/pages/Home.vue?");

/***/ }),

/***/ "./src/frontend/pages/Home.vue?vue&type=script&lang=js&":
/*!**************************************************************!*\
  !*** ./src/frontend/pages/Home.vue?vue&type=script&lang=js& ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib!../../../node_modules/vue-loader/lib??vue-loader-options!./Home.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Home.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/frontend/pages/Home.vue?");

/***/ }),

/***/ "./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true&":
/*!********************************************************************************!*\
  !*** ./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Home.vue?vue&type=template&id=668e76be&scoped=true& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Home.vue?vue&type=template&id=668e76be&scoped=true&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_668e76be_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/frontend/pages/Home.vue?");

/***/ }),

/***/ "./src/frontend/pages/Profile.vue":
/*!****************************************!*\
  !*** ./src/frontend/pages/Profile.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true& */ \"./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true&\");\n/* harmony import */ var _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profile.vue?vue&type=script&lang=js& */ \"./src/frontend/pages/Profile.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  \"5fc2c0cc\",\n  null\n  \n)\n\n/* hot reload */\nif (false) { var api; }\ncomponent.options.__file = \"src/frontend/pages/Profile.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/frontend/pages/Profile.vue?");

/***/ }),

/***/ "./src/frontend/pages/Profile.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./src/frontend/pages/Profile.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib!../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Profile.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/frontend/pages/Profile.vue?");

/***/ }),

/***/ "./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true&":
/*!***********************************************************************************!*\
  !*** ./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/frontend/pages/Profile.vue?vue&type=template&id=5fc2c0cc&scoped=true&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_5fc2c0cc_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/frontend/pages/Profile.vue?");

/***/ }),

/***/ "./src/frontend/router/index.js":
/*!**************************************!*\
  !*** ./src/frontend/router/index.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm.js\");\n/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-router */ \"./node_modules/vue-router/dist/vue-router.esm.js\");\n/* harmony import */ var frontend_pages_Home_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! frontend/pages/Home.vue */ \"./src/frontend/pages/Home.vue\");\n/* harmony import */ var frontend_pages_Profile_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! frontend/pages/Profile.vue */ \"./src/frontend/pages/Profile.vue\");\n\n\n\n\nvue__WEBPACK_IMPORTED_MODULE_0__[\"default\"].use(vue_router__WEBPACK_IMPORTED_MODULE_1__[\"default\"]);\n/* harmony default export */ __webpack_exports__[\"default\"] = (new vue_router__WEBPACK_IMPORTED_MODULE_1__[\"default\"]({\n  routes: [{\n    path: '/',\n    name: 'Home',\n    component: frontend_pages_Home_vue__WEBPACK_IMPORTED_MODULE_2__[\"default\"]\n  }, {\n    path: '/profile',\n    name: 'Profile',\n    component: frontend_pages_Profile_vue__WEBPACK_IMPORTED_MODULE_3__[\"default\"]\n  }]\n}));\n\n//# sourceURL=webpack:///./src/frontend/router/index.js?");

/***/ })

},[["./src/frontend/main.js","runtime","vendors"]]]);