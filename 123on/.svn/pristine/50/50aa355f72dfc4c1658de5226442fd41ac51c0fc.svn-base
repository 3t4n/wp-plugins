(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["gutenberg"],{

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/gutenberg/edit.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/gutenberg/edit.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);\n//\n//\n//\n//\n//\n//\n//\n//\n//\n//\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  name: \"edit\",\n\n  data() {\n    return {\n      videos: [],\n      video: null\n    };\n  },\n\n  props: ['attributes', 'setAttributes'],\n  computed: {\n    getCurrentVideo: {\n      get() {\n        if (this.attributes.video) return this.attributes.video;\n        if (this.videos && this.videos[0] && !this.video) return this.videos[0].id;\n        return this.video;\n      },\n\n      set(val) {\n        this.video = val;\n      }\n\n    }\n  },\n\n  mounted() {\n    axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/wp-json/v2/video_123on/posts').then(response => {\n      this.videos = response.data;\n      console.log(this.videos);\n    }).catch(error => {\n      console.log(error);\n    });\n  }\n\n});\n\n//# sourceURL=webpack:///./src/gutenberg/edit.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function() {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"div\", [\n    _c(\n      \"select\",\n      {\n        directives: [\n          {\n            name: \"model\",\n            rawName: \"v-model\",\n            value: _vm.getCurrentVideo,\n            expression: \"getCurrentVideo\"\n          }\n        ],\n        on: {\n          change: [\n            function($event) {\n              var $$selectedVal = Array.prototype.filter\n                .call($event.target.options, function(o) {\n                  return o.selected\n                })\n                .map(function(o) {\n                  var val = \"_value\" in o ? o._value : o.value\n                  return val\n                })\n              _vm.getCurrentVideo = $event.target.multiple\n                ? $$selectedVal\n                : $$selectedVal[0]\n            },\n            function($event) {\n              return _vm.setAttributes({ video: _vm.video })\n            }\n          ]\n        }\n      },\n      _vm._l(_vm.videos, function(vid) {\n        return _c(\"option\", { domProps: { value: vid.id } }, [\n          _vm._v(\"\\n      \" + _vm._s(vid.title) + \"\\n    \")\n        ])\n      }),\n      0\n    )\n  ])\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/gutenberg/edit.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./src/gutenberg/edit.vue":
/*!********************************!*\
  !*** ./src/gutenberg/edit.vue ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit.vue?vue&type=template&id=b20540ea&scoped=true& */ \"./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true&\");\n/* harmony import */ var _edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit.vue?vue&type=script&lang=js& */ \"./src/gutenberg/edit.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  \"b20540ea\",\n  null\n  \n)\n\n/* hot reload */\nif (false) { var api; }\ncomponent.options.__file = \"src/gutenberg/edit.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/gutenberg/edit.vue?");

/***/ }),

/***/ "./src/gutenberg/edit.vue?vue&type=script&lang=js&":
/*!*********************************************************!*\
  !*** ./src/gutenberg/edit.vue?vue&type=script&lang=js& ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../node_modules/babel-loader/lib!../../node_modules/vue-loader/lib??vue-loader-options!./edit.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/gutenberg/edit.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/gutenberg/edit.vue?");

/***/ }),

/***/ "./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true&":
/*!***************************************************************************!*\
  !*** ./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../node_modules/vue-loader/lib??vue-loader-options!./edit.vue?vue&type=template&id=b20540ea&scoped=true& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/gutenberg/edit.vue?vue&type=template&id=b20540ea&scoped=true&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_edit_vue_vue_type_template_id_b20540ea_scoped_true___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/gutenberg/edit.vue?");

/***/ }),

/***/ "./src/gutenberg/gutenberg.js":
/*!************************************!*\
  !*** ./src/gutenberg/gutenberg.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vuera__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuera */ \"./node_modules/vuera/dist/vuera.cjs.js\");\n/* harmony import */ var vuera__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuera__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _edit_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit.vue */ \"./src/gutenberg/edit.vue\");\nconst {\n  registerBlockType\n} = wp.blocks;\n\n\nconst Edit = Object(vuera__WEBPACK_IMPORTED_MODULE_0__[\"VueInReact\"])(_edit_vue__WEBPACK_IMPORTED_MODULE_1__[\"default\"]);\nregisterBlockType('clearmedia/video', {\n  title: 'video_123on',\n  category: 'widgets',\n  icon: 'format-video',\n  attributes: {\n    video: {\n      type: 'number',\n      default: null\n    }\n  },\n  edit: Edit,\n  save: ({\n    attributes\n  }) => {\n    return `[video_123on id=\"${attributes.video}\"]`;\n  }\n});\n\n//# sourceURL=webpack:///./src/gutenberg/gutenberg.js?");

/***/ })

},[["./src/gutenberg/gutenberg.js","runtime","vendors"]]]);