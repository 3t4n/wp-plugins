/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var src_insert_block_pattern_block_register_block_type__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/insert-block-pattern-block/register-block-type */ "./src/insert-block-pattern-block/register-block-type.js");

Object(src_insert_block_pattern_block_register_block_type__WEBPACK_IMPORTED_MODULE_0__["registerInsertBlockPatternBlock"])();

/***/ }),

/***/ "./src/insert-block-pattern-block/edit.js":
/*!************************************************!*\
  !*** ./src/insert-block-pattern-block/edit.js ***!
  \************************************************/
/*! exports provided: InsertBlockPatternBlockEdit */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "InsertBlockPatternBlockEdit", function() { return InsertBlockPatternBlockEdit; });
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var _wp$element = wp.element,
    useState = _wp$element.useState,
    useEffect = _wp$element.useEffect;
var useSelect = wp.data.useSelect;
var useBlockProps = wp.blockEditor.useBlockProps;
var _wp$components = wp.components,
    Placeholder = _wp$components.Placeholder,
    SelectControl = _wp$components.SelectControl;
var _wp$blocks = wp.blocks,
    parse = _wp$blocks.parse,
    createBlock = _wp$blocks.createBlock;
/**
 * InsertBlockPatternBlockEdit
 *
 * @param {*} props
 */

var InsertBlockPatternBlockEdit = function InsertBlockPatternBlockEdit(props) {
  var _useState = useState("default"),
      _useState2 = _slicedToArray(_useState, 2),
      selectedCategoryName = _useState2[0],
      setSelectedCategoryName = _useState2[1];

  var _useState3 = useState(false),
      _useState4 = _slicedToArray(_useState3, 2),
      selectCategoryOptions = _useState4[0],
      setSelectCategoryOptions = _useState4[1];

  var _useState5 = useState(false),
      _useState6 = _slicedToArray(_useState5, 2),
      showSelectPatterns = _useState6[0],
      setShowSelectPatterns = _useState6[1];

  var _useState7 = useState("default"),
      _useState8 = _slicedToArray(_useState7, 2),
      selectedPatternName = _useState8[0],
      setSelectedPatternName = _useState8[1];

  var _useState9 = useState(false),
      _useState10 = _slicedToArray(_useState9, 2),
      selectPatternOptions = _useState10[0],
      setSelectPatternOptions = _useState10[1];

  var blockProps = useBlockProps();
  var blocks = useSelect(function (select) {
    return select("core/block-editor").getBlocks();
  }, []);
  var blockHierarchyRootClientId = useSelect(function (select) {
    return select("core/block-editor").getBlockHierarchyRootClientId(props.clientId);
  }, []);

  var _useSelect = useSelect(function (select) {
    var _select$getSettings = select("core/block-editor").getSettings(),
        __experimentalBlockPatterns = _select$getSettings.__experimentalBlockPatterns,
        __experimentalBlockPatternCategories = _select$getSettings.__experimentalBlockPatternCategories;

    return {
      patterns: __experimentalBlockPatterns,
      patternCategories: __experimentalBlockPatternCategories
    };
  }, []),
      patternCategories = _useSelect.patternCategories,
      patterns = _useSelect.patterns;

  useEffect(function () {
    // SELECT OPTIONS - FROM BLOCK PATTERNS
    var _selectCategoryOptions = lodash.map(patternCategories, function (category) {
      return {
        value: category.name,
        label: category.label
      };
    });

    _selectCategoryOptions.unshift({
      value: "default",
      label: __("Select a Block Pattern Category", "ibpb"),
      disabled: true
    });

    _selectCategoryOptions.push({
      value: "uncategorized",
      label: __("Uncategorized", "ibpb")
    });

    setSelectCategoryOptions(_selectCategoryOptions);
  }, []);
  useEffect(function () {
    // ON SELECT OF PATTERN CATEGORY - CREATE CORESPONDING PATTERNS SELECT OPTION
    if (patterns.length > 0) {
      if (selectedCategoryName !== "default") {
        var _selectPatternOptions = [];

        if (selectedCategoryName !== "uncategorized") {
          lodash.map(patterns, function (pattern) {
            if (pattern.categories !== undefined) {
              if (pattern.categories.includes(selectedCategoryName)) {
                _selectPatternOptions.push({
                  value: pattern.name,
                  label: pattern.title
                });
              }
            }
          });
        } else {
          // PATTERNS CAN HAVE UNDEFINED PATTERN_CATEGORY
          lodash.map(patterns, function (pattern) {
            if (pattern.categories === undefined) {
              _selectPatternOptions.push({
                value: pattern.name,
                label: pattern.title
              });
            }
          });
        }

        _selectPatternOptions.unshift({
          value: "default",
          label: __("Select a Block Pattern", "ibpb"),
          disabled: true
        });

        setSelectPatternOptions(_selectPatternOptions);
        setShowSelectPatterns(true);
      }
    }
  }, [selectedCategoryName]);
  useEffect(function () {
    if (showSelectPatterns !== false && selectedPatternName !== "default") {
      // BLOCK INDEX - THIS BLOCK
      var blockIndex = 0;
      lodash.map(blocks, function (block, index) {
        if (block.clientId === props.clientId) {
          blockIndex = index;
        }
      }); // FIND PATTERN

      var foundPattern = lodash.find(patterns, function (pattern) {
        return selectedPatternName === pattern.name;
      }); // PARSE PATTERN

      var patternParse = parse(foundPattern.content); // CREATE BLOCK

      var created = createBlock(patternParse[0].name, patternParse[0].attributes, patternParse[0].innerBlocks);

      if (blockHierarchyRootClientId === props.clientId) {
        // INSERT NEW BLOCK PREPEND CURRENT INDEX
        dispatch("core/block-editor").insertBlocks(created, blockIndex);
      } else {
        //INSERT INTO NESTED BLOCK - INTO LAST ELEMENT IN PARENTBLOCKS
        var parentBlocks = wp.data.select("core/block-editor").getBlockParents(props.clientId);
        dispatch("core/block-editor").insertBlocks(created, 0, parentBlocks[parentBlocks.length - 1]);
      } // REMOVE INSERT BLOCK PATTERN BLOCK - AKA THIS BLOCK


      setTimeout(function () {
        dispatch("core/block-editor").removeBlock(props.clientId);
      }, 200);
    }
  }, [selectedPatternName]); // RETURN ONLY PLACEHOLDER - AS THIS BLOCK WILL BE REMOVED

  return /*#__PURE__*/React.createElement("div", blockProps, /*#__PURE__*/React.createElement(Placeholder, {
    icon: "table-row-before",
    label: __("Insert Block Pattern", "ibpb")
  }, /*#__PURE__*/React.createElement(SelectControl, {
    value: selectedCategoryName,
    options: selectCategoryOptions,
    onChange: function onChange(value) {
      setSelectedCategoryName(value);
    }
  }), showSelectPatterns !== false && /*#__PURE__*/React.createElement("div", {
    style: {
      marginLeft: 20
    }
  }, /*#__PURE__*/React.createElement(SelectControl, {
    value: selectedPatternName,
    options: selectPatternOptions,
    onChange: function onChange(value) {
      setSelectedPatternName(value);
    }
  }))));
};

/***/ }),

/***/ "./src/insert-block-pattern-block/register-block-type.js":
/*!***************************************************************!*\
  !*** ./src/insert-block-pattern-block/register-block-type.js ***!
  \***************************************************************/
/*! exports provided: registerInsertBlockPatternBlock */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "registerInsertBlockPatternBlock", function() { return registerInsertBlockPatternBlock; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/insert-block-pattern-block/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./save */ "./src/insert-block-pattern-block/save.js");
/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
/**
 * Internal dependencies
 */



var attributes = [];
var registerInsertBlockPatternBlock = function registerInsertBlockPatternBlock() {
  registerBlockType("ibpb/insert-block-pattern", {
    title: __("Insert Block Pattern", "ibpb"),
    description: __("Block for inserting a Block Pattern", "ibpb"),
    icon: "screenoptions",
    keywords: [__("Block Pattern", "ibpb")],
    category: "ibpb",
    attributes: attributes,
    supports: {
      className: false,
      anchor: false,
      align: false
    },
    edit: _edit__WEBPACK_IMPORTED_MODULE_0__["InsertBlockPatternBlockEdit"],
    save: _save__WEBPACK_IMPORTED_MODULE_1__["default"]
  });
};

/***/ }),

/***/ "./src/insert-block-pattern-block/save.js":
/*!************************************************!*\
  !*** ./src/insert-block-pattern-block/save.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return save; });
function save(props) {
  //RETURN NULL - THIS BLOCK WILL BE REMOVED
  return null;
}

/***/ }),

/***/ 0:
/*!****************************!*\
  !*** multi ./src/index.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./src/index.js */"./src/index.js");


/***/ })

/******/ });
//# sourceMappingURL=ibpb_blocks_registration.js.map