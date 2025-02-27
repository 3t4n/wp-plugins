/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/src/Edit.js":
/*!****************************!*\
  !*** ./blocks/src/Edit.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _styleicon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styleicon */ "./blocks/src/styleicon.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var _wp$editor = wp.editor,
    InspectorControls = _wp$editor.InspectorControls,
    RichText = _wp$editor.RichText,
    ColorPalette = _wp$editor.ColorPalette;
var __ = wp.i18n.__;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;
var _wp$components = wp.components,
    PanelBody = _wp$components.PanelBody,
    TextControl = _wp$components.TextControl,
    ToggleControl = _wp$components.ToggleControl;
var _wp$ctaComponents = wp.ctaComponents,
    CtaMedia = _wp$ctaComponents.CtaMedia,
    CtaLayoutSelector = _wp$ctaComponents.CtaLayoutSelector;


var Edit = /*#__PURE__*/function (_Component) {
  _inherits(Edit, _Component);

  var _super = _createSuper(Edit);

  function Edit(props) {
    var _this;

    _classCallCheck(this, Edit);

    _this = _super.call(this, props);
    _this.toggleTarget = _this.toggleTarget.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(Edit, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this$props = this.props,
          setAttributes = _this$props.setAttributes,
          clientId = _this$props.clientId,
          uniqueId = _this$props.attributes.uniqueId;

      var _client = clientId.substr(0, 6);

      if (!uniqueId) {
        setAttributes({
          uniqueId: _client
        });
      } else if (uniqueId && uniqueId != _client) {
        setAttributes({
          uniqueId: _client
        });
      }
    }
  }, {
    key: "toggleTarget",
    value: function toggleTarget() {
      var _this$props2 = this.props,
          setAttributes = _this$props2.setAttributes,
          btn_target = _this$props2.attributes.btn_target;
      setAttributes({
        btn_target: !btn_target
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props3 = this.props,
          _this$props3$attribut = _this$props3.attributes,
          uniqueId = _this$props3$attribut.uniqueId,
          layout = _this$props3$attribut.layout,
          isGradientBg = _this$props3$attribut.isGradientBg,
          bgColor = _this$props3$attribut.bgColor,
          bgColor2 = _this$props3$attribut.bgColor2,
          bgImage = _this$props3$attribut.bgImage,
          title = _this$props3$attribut.title,
          description = _this$props3$attribut.description,
          btn_label = _this$props3$attribut.btn_label,
          btn_url = _this$props3$attribut.btn_url,
          btn_target = _this$props3$attribut.btn_target,
          setAttributes = _this$props3.setAttributes;
      return wp.element.createElement(Fragment, null, wp.element.createElement(InspectorControls, {
        key: "inspector"
      }, wp.element.createElement(PanelBody, {
        title: __('Layout', 'cta-gutenberg'),
        initialOpen: true
      }, wp.element.createElement(CtaLayoutSelector, {
        value: layout,
        onChange: function onChange(val) {
          return setAttributes({
            layout: val
          });
        },
        options: [{
          value: 1,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_1
        }, {
          value: 2,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_2
        }, {
          value: 3,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_3
        }, {
          value: 4,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_4
        }, {
          value: 5,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_5
        }, {
          value: 6,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_6
        }, {
          value: 7,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_7
        }, {
          value: 8,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_8
        }, {
          value: 9,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_9
        }, {
          value: 10,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_10
        }, {
          value: 11,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_11
        }, {
          value: 12,
          styleIcon: _styleicon__WEBPACK_IMPORTED_MODULE_0__["default"].cta_layout_12
        }]
      })), wp.element.createElement(PanelBody, {
        title: __('Button', 'cta-gutenberg'),
        initialOpen: false
      }, wp.element.createElement(TextControl, {
        label: __('Link', 'cta-gutenberg'),
        value: btn_url,
        onChange: function onChange(value) {
          return setAttributes({
            btn_url: value
          });
        }
      }), wp.element.createElement(ToggleControl, {
        label: __('Open in new Window', 'cta-gutenberg'),
        checked: btn_target,
        onChange: this.toggleTarget
      })), wp.element.createElement(PanelBody, {
        title: __('Wrapper', 'cta-gutenberg'),
        initialOpen: false
      }, (layout == 8 || layout == 9) && wp.element.createElement(ToggleControl, {
        label: __('Enable Gradient', 'cta-gutenberg'),
        checked: isGradientBg,
        onChange: function onChange(state) {
          return setAttributes({
            isGradientBg: state
          });
        }
      }), wp.element.createElement("span", {
        className: "cta-field-label"
      }, __('Background Color', 'cta-gutenberg')), wp.element.createElement(ColorPalette, {
        label: __('Background Color', 'cta-gutenberg'),
        className: "cta-field",
        value: bgColor,
        onChange: function onChange(colorValue) {
          return setAttributes({
            bgColor: colorValue
          });
        },
        allowReset: true
      }), isGradientBg == 1 && (layout == 8 || layout == 9) && wp.element.createElement(Fragment, null, wp.element.createElement("span", {
        className: "cta-field-label"
      }, __('Background Color 2', 'cta-gutenberg')), wp.element.createElement(ColorPalette, {
        label: __('Background Color 2', 'cta-gutenberg'),
        className: "cta-field",
        value: bgColor2,
        onChange: function onChange(colorValue) {
          return setAttributes({
            bgColor2: colorValue
          });
        },
        allowReset: true
      })), wp.element.createElement(CtaMedia, {
        label: __('Image', 'cta-gutenberg'),
        value: bgImage,
        onChange: function onChange(val) {
          return setAttributes({
            bgImage: val
          });
        }
      }))), wp.element.createElement("div", {
        className: "call_to_action_".concat(layout, " call_to_action_").concat(uniqueId),
        style: {
          backgroundImage: "".concat(bgImage.url != undefined ? "url(".concat(bgImage.url, ")") : 'none')
        }
      }, wp.element.createElement("div", {
        className: "cta_content"
      }, wp.element.createElement(RichText, {
        tagName: "h2",
        value: title,
        placeholder: "Call to action title",
        onChange: function onChange(value) {
          return setAttributes({
            title: value
          });
        }
      }), wp.element.createElement(RichText, {
        tagName: "p",
        value: description,
        placeholder: "Call to action description",
        onChange: function onChange(value) {
          return setAttributes({
            description: value
          });
        }
      }), wp.element.createElement(RichText, {
        tagName: "a",
        className: "ctagb-btn",
        value: btn_label,
        placeholder: "Button Label",
        onChange: function onChange(value) {
          return setAttributes({
            btn_label: value
          });
        }
      }))), wp.element.createElement("style", null, layout == 1 || layout == 8 || layout == 9 ? "\n\t\t\t\t\t\t.call_to_action_".concat(uniqueId, ":after{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor, ", ").concat(bgColor2, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t.call_to_action_").concat(uniqueId, ">.cta_content>.ctagb-btn:hover{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor2, ", ").concat(bgColor, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t") : ".call_to_action_".concat(uniqueId, "{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor, ", ").concat(bgColor2, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t")));
    }
  }]);

  return Edit;
}(Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Edit);

/***/ }),

/***/ "./blocks/src/attributes.js":
/*!**********************************!*\
  !*** ./blocks/src/attributes.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var attributes = {
  //basic
  uniqueId: {
    type: 'string',
    "default": ''
  },
  layout: {
    type: 'number',
    "default": 1
  },
  isGradientBg: {
    type: 'boolean',
    "default": 0
  },
  bgColor: {
    type: 'string',
    "default": '#7840FF'
  },
  bgColor2: {
    type: 'string',
    "default": '#7840FF'
  },
  bgImage: {
    type: 'object',
    "default": {
      url: cta_gutenberg_locate.plugin + 'assets/images/cta_1.png',
      alt: 'Call to action Image',
      id: 0
    }
  },
  //Content
  title: {
    type: 'string',
    "default": 'Flexi Addons For Elementor'
  },
  description: {
    type: 'string',
    "default": 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent sollicitudin felis vel mi facilisis posuere Nulla ultrices.'
  },
  btn_label: {
    type: 'string',
    "default": 'Free trial'
  },
  btn_url: {
    type: 'string',
    "default": '#'
  },
  btn_target: {
    type: 'boolean',
    "default": 1
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (attributes);

/***/ }),

/***/ "./blocks/src/blockicon.js":
/*!*********************************!*\
  !*** ./blocks/src/blockicon.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ClickIcon": () => (/* binding */ ClickIcon)
/* harmony export */ });
var ClickIcon = function ClickIcon() {
  return wp.element.createElement("svg", {
    className: "dashicon",
    xmlns: "http://www.w3.org/2000/svg",
    xmlnsXlink: "http://www.w3.org/1999/xlink",
    version: "1.1",
    width: "24",
    height: "24",
    viewBox: "0 0 512 512"
  }, wp.element.createElement("path", {
    d: "M512,183.778V50.213c0-27.618-22.469-50.087-50.087-50.087H50.087C22.469,0.126,0,22.595,0,50.213v133.565 c0,27.618,22.469,50.087,50.087,50.087h134.9l80.628,241.883c5.054,15.161,26.613,15.195,31.678,0l26.874-80.622L431.15,502.11 c13.019,13.018,34.203,13.018,47.223,0l23.612-23.611c13.017-13.019,13.017-34.203-0.001-47.222L395.001,324.293l80.622-26.874 c15.169-5.058,15.186-26.615,0-31.678L380,233.867h81.913C489.531,233.865,512,211.396,512,183.778z M417.546,281.579 l-58.733,19.577c-11.77,3.923-15.284,18.886-6.526,27.645l126.084,126.086l-23.612,23.611L328.675,352.412 c-8.777-8.779-23.724-5.23-27.645,6.526l-19.577,58.733l-68.047-204.139C217.508,214.9,402.306,276.499,417.546,281.579z M279.825,200.475v-0.001l-87.536-29.178c-13.016-4.343-25.465,8.081-21.119,21.119l2.687,8.061H50.087 c-9.206,0-16.696-7.49-16.696-16.696V50.214c0-9.206,7.49-16.696,16.696-16.696h411.826c9.206,0,16.696,7.49,16.696,16.696V183.78 c0,9.206-7.49,16.696-16.696,16.696H279.825z"
  }));
};

/***/ }),

/***/ "./blocks/src/blocks.js":
/*!******************************!*\
  !*** ./blocks/src/blocks.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blockicon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blockicon */ "./blocks/src/blockicon.js");
/* harmony import */ var _cta_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cta-component */ "./blocks/src/cta-component.js");
/* harmony import */ var _cta_component__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_cta_component__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./attributes */ "./blocks/src/attributes.js");
/* harmony import */ var _Edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Edit */ "./blocks/src/Edit.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./blocks/src/style.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./editor.scss */ "./blocks/src/editor.scss");
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    PlainText = _wp$editor.PlainText;
var registerBlockType = wp.blocks.registerBlockType;
var __ = wp.i18n.__;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;
var Button = wp.components.Button;






registerBlockType('wppool/cta', {
  title: __('Call to action', 'cta-gutenberg'),
  icon: _blockicon__WEBPACK_IMPORTED_MODULE_0__.ClickIcon,
  category: 'common',
  keywords: [__('call to action', 'cta-gutenberg'), __('wppool', 'cta-gutenberg')],
  attributes: _attributes__WEBPACK_IMPORTED_MODULE_2__["default"],
  supports: {
    align: true
  },
  edit: _Edit__WEBPACK_IMPORTED_MODULE_3__["default"],
  save: function save(props) {
    var _props$attributes = props.attributes,
        uniqueId = _props$attributes.uniqueId,
        layout = _props$attributes.layout,
        isGradientBg = _props$attributes.isGradientBg,
        bgColor = _props$attributes.bgColor,
        bgColor2 = _props$attributes.bgColor2,
        bgImage = _props$attributes.bgImage,
        title = _props$attributes.title,
        description = _props$attributes.description,
        btn_label = _props$attributes.btn_label,
        btn_url = _props$attributes.btn_url,
        btn_target = _props$attributes.btn_target;
    return wp.element.createElement("div", {
      className: "call_to_action_".concat(layout, " call_to_action_").concat(uniqueId),
      style: {
        backgroundImage: "".concat(bgImage.url != undefined ? "url(".concat(bgImage.url, ")") : 'none')
      }
    }, wp.element.createElement("div", {
      className: "cta_content"
    }, wp.element.createElement("h2", null, title), wp.element.createElement("p", null, description), wp.element.createElement("a", {
      className: "ctagb-btn",
      target: btn_target ? '_blank' : '',
      rel: "noopener noreferrer",
      href: btn_url
    }, btn_label)), wp.element.createElement("style", null, layout == 1 || layout == 8 || layout == 9 ? "\n\t\t\t\t\t\t.call_to_action_".concat(uniqueId, ":after{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor, ", ").concat(bgColor2, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t.call_to_action_").concat(uniqueId, ">.cta_content>.ctagb-btn:hover{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor2, ", ").concat(bgColor, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t") : ".call_to_action_".concat(uniqueId, "{\n\t\t\t\t\t\t\t").concat(isGradientBg == 1 ? "background-image: linear-gradient(to right, ".concat(bgColor, ", ").concat(bgColor2, ")") : "background-color: ".concat(bgColor), "\n\t\t\t\t\t\t}\n\t\t\t\t\t\t")));
  }
});

/***/ }),

/***/ "./blocks/src/cta-component.js":
/*!*************************************!*\
  !*** ./blocks/src/cta-component.js ***!
  \*************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var Component = wp.element.Component;
var __ = wp.i18n.__;
var MediaUpload = wp.blockEditor.MediaUpload;
var Dashicon = wp.components.Dashicon;

var CtaMedia = /*#__PURE__*/function (_Component) {
  _inherits(CtaMedia, _Component);

  var _super = _createSuper(CtaMedia);

  function CtaMedia() {
    _classCallCheck(this, CtaMedia);

    return _super.apply(this, arguments);
  }

  _createClass(CtaMedia, [{
    key: "setSettings",
    value: function setSettings(media) {
      var onChange = this.props.onChange;

      if (media && media.url) {
        onChange({
          url: media.url,
          id: media.id,
          alt: media.alt
        });
      }
    }
  }, {
    key: "removeImage",
    value: function removeImage() {
      var onChange = this.props.onChange;
      onChange({});
    }
  }, {
    key: "validateUrl",
    value: function validateUrl(url) {
      if (['wbm', 'jpg', 'jpeg', 'gif', 'png', 'svg'].indexOf(url.split('.').pop().toLowerCase()) != -1) {
        return url;
      } else {
        return cta_gutenberg_locate.plugin + 'assets/images/cta_1.png';
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this = this;

      var _this$props = this.props,
          value = _this$props.value,
          label = _this$props.label,
          className = _this$props.className;
      return wp.element.createElement("div", {
        className: "cta-field cta-field-media-selector ".concat(className ? className : '')
      }, label && wp.element.createElement("span", {
        className: "cta-field-label"
      }, label), wp.element.createElement("div", {
        className: "cta-field-content cta-field-media"
      }, wp.element.createElement(MediaUpload, {
        onSelect: function onSelect(val) {
          return _this.setSettings(val);
        },
        allowedTypes: ['image'],
        value: value,
        render: function render(_ref) {
          var open = _ref.open;
          return wp.element.createElement("div", null, value && value.url ? wp.element.createElement("div", null, wp.element.createElement("div", {
            className: "cta-single-img"
          }, wp.element.createElement("span", {
            className: "cta-media-image-parent",
            onClick: open
          }, wp.element.createElement("img", {
            src: _this.validateUrl(value.url),
            alt: value.alt
          }))), wp.element.createElement("div", {
            className: "cta-media-actions cta-field-button-list"
          }, wp.element.createElement("button", {
            className: "cta-field-button",
            "aria-label": __('Edit', 'cta-gutenberg'),
            onClick: open,
            role: "button"
          }, wp.element.createElement("span", {
            "aria-label": __('Edit', 'cta-gutenberg'),
            className: "dashicons dashicons-edit"
          })), wp.element.createElement("button", {
            className: "cta-field-button",
            "aria-label": __('Remove', 'cta-gutenberg'),
            onClick: function onClick() {
              return _this.removeImage();
            },
            role: "button"
          }, wp.element.createElement("span", {
            "aria-label": __('Close', 'cta-gutenberg'),
            className: "dashicons dashicons-no"
          })))) : wp.element.createElement("div", {
            className: "cta-single-img"
          }, wp.element.createElement("div", {
            onClick: open,
            className: "cta-placeholder-image"
          }, wp.element.createElement(Dashicon, {
            icon: "format-image"
          }))));
        }
      })));
    }
  }]);

  return CtaMedia;
}(Component);

var CtaLayoutSelector = /*#__PURE__*/function (_Component2) {
  _inherits(CtaLayoutSelector, _Component2);

  var _super2 = _createSuper(CtaLayoutSelector);

  function CtaLayoutSelector() {
    _classCallCheck(this, CtaLayoutSelector);

    return _super2.apply(this, arguments);
  }

  _createClass(CtaLayoutSelector, [{
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          value = _this$props2.value,
          label = _this$props2.label,
          options = _this$props2.options,
          _this$props2$columns = _this$props2.columns,
          columns = _this$props2$columns === void 0 ? 2 : _this$props2$columns,
          className = _this$props2.className,
          onChange = _this$props2.onChange;
      return wp.element.createElement("div", {
        className: "cta-field cta-field-layout ".concat(className ? className : '')
      }, label && wp.element.createElement("span", {
        className: "cta-field-label"
      }, label), wp.element.createElement("div", {
        className: "cta-field-content cta-field-layout-list"
      }, options.map(function (data, index) {
        return wp.element.createElement("div", {
          key: index,
          onClick: function onClick() {
            return onChange(data.value);
          },
          className: "".concat(value == data.value ? 'active' : '')
        }, data.styleIcon && wp.element.createElement("span", {
          className: "cta-layout-style cta-layout-style-".concat(data.value)
        }, data.styleIcon));
      })));
    }
  }]);

  return CtaLayoutSelector;
}(Component);

wp.ctaComponents = {
  CtaMedia: CtaMedia,
  CtaLayoutSelector: CtaLayoutSelector
};

/***/ }),

/***/ "./blocks/src/styleicon.js":
/*!*********************************!*\
  !*** ./blocks/src/styleicon.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var styleicons = {};
styleicons.cta_layout_1 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_1"
}, wp.element.createElement("span", {
  className: "dashicons dashicons-format-image"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_2 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_2"
}, wp.element.createElement("span", {
  className: "dashicons dashicons-format-image"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_3 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_3"
}, wp.element.createElement("span", {
  className: "dashicons dashicons-format-image"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_4 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_4"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_5 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_5"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_6 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_6"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_7 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_7"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_8 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_8"
}, wp.element.createElement("span", {
  className: "dashicons dashicons-format-image"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_9 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_9"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_10 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_10"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_11 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_11"
}, wp.element.createElement("span", {
  className: "dashicons"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
styleicons.cta_layout_12 = wp.element.createElement("span", {
  className: "cta_layout cta_layout_12"
}, wp.element.createElement("span", {
  className: "dashicons dashicons-format-image"
}), wp.element.createElement("span", {
  className: "cta-info-icon"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (styleicons);

/***/ }),

/***/ "./blocks/src/editor.scss":
/*!********************************!*\
  !*** ./blocks/src/editor.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/dist/blocks.editor.build.css");

/***/ }),

/***/ "./blocks/src/style.scss":
/*!*******************************!*\
  !*** ./blocks/src/style.scss ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/dist/blocks.style.build.css");

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_require__("./blocks/src/blocks.js");
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	__webpack_require__("./blocks/src/editor.scss");
/******/ 	var __webpack_exports__ = __webpack_require__("./blocks/src/style.scss");
/******/ 	
/******/ })()
;
//# sourceMappingURL=blocks.build.js.map