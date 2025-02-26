/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/boxslogan/boxsloganIcon.svg":
/*!************************************************!*\
  !*** ./src/blocks/boxslogan/boxsloganIcon.svg ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ReactComponent: () => (/* binding */ SvgBoxsloganIcon),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
var _path;
function _extends() { _extends = Object.assign ? Object.assign.bind() : function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

var SvgBoxsloganIcon = function SvgBoxsloganIcon(props) {
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    height: "1em",
    viewBox: "0 0 512 512"
  }, props), _path || (_path = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("path", {
    d: "M448 96v128H288V96zm0 192v128H288V288zm-224-64H64V96h160zM64 288h160v128H64zm0-256C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64z"
  })));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHBhdGggZD0iTTQ0OCA5NlYyMjRIMjg4Vjk2SDQ0OHptMCAxOTJWNDE2SDI4OFYyODhINDQ4ek0yMjQgMjI0SDY0Vjk2SDIyNFYyMjR6TTY0IDI4OEgyMjRWNDE2SDY0VjI4OHpNNjQgMzJDMjguNyAzMiAwIDYwLjcgMCA5NlY0MTZjMCAzNS4zIDI4LjcgNjQgNjQgNjRINDQ4YzM1LjMgMCA2NC0yOC43IDY0LTY0Vjk2YzAtMzUuMy0yOC43LTY0LTY0LTY0SDY0eiIgLz48L3N2Zz4=");

/***/ }),

/***/ "./src/blocks/boxslogan/attributes.js":
/*!********************************************!*\
  !*** ./src/blocks/boxslogan/attributes.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const attributes = {
  id: {
    type: 'string'
  },
  uniqueID: {
    type: 'string',
    default: ''
  },
  blockStyle: {
    type: 'object'
  },
  gapDBetweenBlocks: {
    type: 'number',
    default: 0
  },
  gapTBetweenBlocks: {
    type: 'number',
    default: 0
  },
  gapMBetweenBlocks: {
    type: 'number',
    default: 0
  },
  blockBorderRadius: {
    type: 'number',
    default: 0
  },
  contentBoxHeight: {
    type: 'number',
    default: 250
  },
  deskCols: {
    type: 'number',
    default: 3
  },
  tabCols: {
    type: 'number',
    default: 2
  },
  mobCols: {
    type: 'number',
    default: 1
  },
  sloganTextAlignment: {
    type: 'string',
    enum: ['left', 'center', 'right'],
    default: 'center'
  },
  titleTag: {
    type: 'string',
    default: 'h3'
  },
  descriptionTag: {
    type: 'string',
    default: 'p'
  },
  titleColor: {
    type: 'string'
  },
  descriptionColor: {
    type: 'string'
  },
  contentBoxPadding: {
    type: 'number',
    default: 10
  },
  imageObjectFit: {
    type: 'string',
    default: 'cover'
  },
  imageAspectRatio: {
    type: 'string',
    default: '1/1'
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (attributes);

/***/ }),

/***/ "./src/blocks/boxslogan/edit.js":
/*!**************************************!*\
  !*** ./src/blocks/boxslogan/edit.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.scss */ "./src/blocks/boxslogan/editor.scss");
/* harmony import */ var _inspector__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./inspector */ "./src/blocks/boxslogan/inspector.js");

// React hook that is used to mark the block wrapper element.


// WordPress data store

const {
  useEffect
} = wp.element;

// editor style


/**
 * Internal dependencies
 */

function Edit(props) {
  const {
    id,
    uniqueID,
    gapDBetweenBlocks,
    deskCols,
    tabCols,
    mobCols
  } = props.attributes;
  useEffect(() => {
    if (!uniqueID) {
      props.setAttributes({
        uniqueID: props.clientId.slice(0, 8),
        id: props.clientId.slice(0, 8)
      });
    }
  }, []);

  // Block Props
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)({
    className: `${id || ''} wtrbmr-${uniqueID} wtrbs__dcols_${deskCols} wtrbs__tcols_${tabCols} wtrbs__mcols_${mobCols}`,
    style: {
      gap: `${gapDBetweenBlocks}px`
    }
  });
  const insertBoxSloganBlock = () => {
    const innerCount = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.select)('core/editor').getBlocksByClientId(props.clientId)[0].innerBlocks.length;

    // if innercount is odd, add an "EVEN item"
    if (innerCount % 2 === 1) {
      const block = (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.createBlock)('wtrb/boxsloganmember', {
        config: 'imagebottom'
      });
      (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.dispatch)('core/block-editor').insertBlock(block, innerCount, props.clientId);
    }
    // if innerCount is even, add an "ODD item"
    if (innerCount % 2 === 0) {
      const block = (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.createBlock)('wtrb/boxsloganmember', {
        config: 'imagetop'
      });
      (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.dispatch)('core/block-editor').insertBlock(block, innerCount, props.clientId);
    }
  };

  /**
   * Inner Block Props
   */
  const innerBlocksProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useInnerBlocksProps)(blockProps, {
    allowedBlocks: ['wtrb/boxsloganmember'],
    template: [['wtrb/boxsloganmember', {
      config: 'imagetop'
    }], ['wtrb/boxsloganmember', {
      config: 'imagebottom'
    }], ['wtrb/boxsloganmember', {
      config: 'imagetop'
    }]],
    renderAppender: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
      className: "components-button block-editor-button-block-appender",
      type: "button",
      onClick: insertBoxSloganBlock
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 24 24",
      width: "24",
      height: "24",
      "aria-hidden": "true",
      focusable: "false"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M18 11.2h-5.2V6h-1.6v5.2H6v1.6h5.2V18h1.6v-5.2H18z"
    })))
  });
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_inspector__WEBPACK_IMPORTED_MODULE_5__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...innerBlocksProps
  }));
}

/***/ }),

/***/ "./src/blocks/boxslogan/index.js":
/*!***************************************!*\
  !*** ./src/blocks/boxslogan/index.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/blocks/boxslogan/style.scss");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block.json */ "./src/blocks/boxslogan/block.json");
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./attributes */ "./src/blocks/boxslogan/attributes.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./edit */ "./src/blocks/boxslogan/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./save */ "./src/blocks/boxslogan/save.js");
/* harmony import */ var _boxsloganIcon_svg__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./boxsloganIcon.svg */ "./src/blocks/boxslogan/boxsloganIcon.svg");

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 */


/**
 * Internal dependencies
 */






/**
 * Every block starts by registering a new block type definition.
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_3__.name, {
  attributes: _attributes__WEBPACK_IMPORTED_MODULE_4__["default"],
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_5__["default"],
  save: _save__WEBPACK_IMPORTED_MODULE_6__["default"],
  icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _boxsloganIcon_svg__WEBPACK_IMPORTED_MODULE_7__["default"],
    alt: "Box slogan",
    height: 16,
    width: 16
  })
});

/***/ }),

/***/ "./src/blocks/boxslogan/inspector.js":
/*!*******************************************!*\
  !*** ./src/blocks/boxslogan/inspector.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _utilities_Icons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../utilities/Icons */ "./src/utilities/Icons.js");

/**
 * WordPress dependencies
 */





const Inspector = ({
  attributes,
  setAttributes
}) => {
  const {
    titleTag,
    descriptionTag,
    gapDBetweenBlocks,
    gapTBetweenBlocks,
    gapMBetweenBlocks,
    blockBorderRadius,
    contentBoxHeight,
    sloganTextAlignment,
    contentBoxPadding,
    deskCols,
    tabCols,
    mobCols,
    titleColor,
    descriptionColor,
    imageObjectFit,
    imageAspectRatio
  } = attributes;
  const {
    desktop,
    tablet,
    smartphone
  } = _utilities_Icons__WEBPACK_IMPORTED_MODULE_5__["default"];
  // title color visibility
  const [isTitleColorVisible, setIsTitleColorVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)(false);
  // description color visibility
  const [isDescriptionColorVisible, setIsDescriptionColorVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)(false);
  const [currentButton, setCurrentButton] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)('desktop');
  const [currentGapButton, setCurrentGapButton] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)('desktop');

  // Set current button for column number once on mount
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useEffect)(() => {
    setCurrentButton('desktop');
  }, []);

  // Number of Columns device event handler
  const handleColumnsNoClick = e => {
    // Which device is clicked
    const curButton = e.currentTarget.name;
    // Remove "active" class from all device button classes
    e.currentTarget.parentNode.childNodes.forEach(el => {
      el.classList.remove('active');
    });
    // Add "active" to clicked button
    e.currentTarget.classList.add('active');
    setCurrentButton(curButton);
  };

  // Block Gap device event handler
  const handleBlockGapClick = e => {
    // Which device is clicked
    const curButton = e.currentTarget.name;
    // Remove "active" class from all device button classes
    e.currentTarget.parentNode.childNodes.forEach(el => {
      el.classList.remove('active');
    });
    // Add "active" to clicked button
    e.currentTarget.classList.add('active');
    setCurrentGapButton(curButton);
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__responsive_items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__label_flex"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "wtrbmr__label_nomargin"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Number of Columns', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__devices"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "desktop",
    className: "wtrbmr__device active",
    onClick: handleColumnsNoClick
  }, desktop), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "tablet",
    className: "wtrbmr__device",
    onClick: handleColumnsNoClick
  }, tablet), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "smartphone",
    className: "wtrbmr__device",
    onClick: handleColumnsNoClick
  }, smartphone))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__items"
  }, currentButton === 'desktop' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: deskCols,
    onChange: newValue => {
      setAttributes({
        deskCols: newValue
      });
    },
    min: 1,
    max: 4,
    beforeIcon: currentButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Desktop Columns: ', 'wtrb-boxslogan-block') + deskCols
  }), currentButton === 'tablet' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: tabCols,
    onChange: newValue => {
      setAttributes({
        tabCols: newValue
      });
    },
    min: 1,
    max: 2,
    beforeIcon: currentButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tablet Columns: ', 'wtrb-boxslogan-block') + tabCols
  }), currentButton === 'smartphone' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: mobCols,
    onChange: newValue => {
      setAttributes({
        mobCols: newValue
      });
    },
    min: 1,
    max: 2,
    beforeIcon: currentButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Mobile Columns: ', 'wtrb-boxslogan-block') + mobCols
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__responsive_items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__label_flex"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "wtrbmr__label_nomargin"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Gap between blocks (px)', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__devices"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "desktop",
    className: "wtrbmr__device active",
    onClick: handleBlockGapClick
  }, desktop), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "tablet",
    className: "wtrbmr__device",
    onClick: handleBlockGapClick
  }, tablet), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    name: "smartphone",
    className: "wtrbmr__device",
    onClick: handleBlockGapClick
  }, smartphone)))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrbmr__items"
  }, currentGapButton === 'desktop' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: gapDBetweenBlocks || 0,
    onChange: newValue => {
      setAttributes({
        gapDBetweenBlocks: newValue
      });
    },
    min: 0,
    max: 50,
    beforeIcon: currentGapButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Desktop Gap: ', 'wtrb-boxslogan-block') + gapDBetweenBlocks
  }), currentGapButton === 'tablet' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: gapTBetweenBlocks || 0,
    onChange: newValue => {
      setAttributes({
        gapTBetweenBlocks: newValue
      });
    },
    min: 0,
    max: 50,
    beforeIcon: currentGapButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tablet Gap: ', 'wtrb-boxslogan-block') + gapTBetweenBlocks
  }), currentGapButton === 'smartphone' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    value: gapMBetweenBlocks || 0,
    onChange: newValue => {
      setAttributes({
        gapMBetweenBlocks: newValue
      });
    },
    min: 0,
    max: 50,
    beforeIcon: currentGapButton,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Mobile Gap: ', 'wtrb-boxslogan-block') + gapMBetweenBlocks
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Block border radius (px)', 'wtrb-boxslogan-block'),
    separatorType: "fullWidth",
    value: blockBorderRadius || 0,
    min: 0,
    max: 100,
    onChange: newValue => {
      setAttributes({
        blockBorderRadius: parseInt(newValue)
      });
    }
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    group: "styles"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb-tabs-panel"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Content', 'wtrb-boxslogan-block'),
    initialOpen: true,
    className: "flex-col"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Alignment', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb__titles_group"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ButtonGroup, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        sloganTextAlignment: 'left'
      });
    },
    title: "Left",
    "aria-pressed": `${sloganTextAlignment === 'left' ? 'true' : 'false'}`,
    className: `${sloganTextAlignment === 'left' ? 'is-pressed' : ''}`
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicon dashicons dashicons-editor-alignleft"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        sloganTextAlignment: 'center'
      });
    },
    title: "Center",
    "aria-pressed": `${sloganTextAlignment === 'center' ? 'true' : 'false'}`,
    className: `${sloganTextAlignment === 'center' ? 'is-pressed' : ''}`
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicon dashicons dashicons-editor-aligncenter"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        sloganTextAlignment: 'right'
      });
    },
    title: "Right",
    "aria-pressed": `${sloganTextAlignment === 'center' ? 'true' : 'false'}`,
    className: `${sloganTextAlignment === 'right' ? 'is-pressed' : ''}`
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicon dashicons dashicons-editor-alignright"
  })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Title Tag', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb__titles_group"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ButtonGroup, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h1'
      });
    },
    title: "H1",
    "aria-pressed": `${titleTag === 'h1' ? 'true' : 'false'}`,
    className: `${titleTag === 'h1' ? 'is-pressed' : ''}`
  }, "H1"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h2'
      });
    },
    title: "H2",
    "aria-pressed": `${titleTag === 'h2' ? 'true' : 'false'}`,
    className: `${titleTag === 'h2' ? 'is-pressed' : ''}`
  }, "H2"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h3'
      });
    },
    title: "H3",
    "aria-pressed": `${titleTag === 'h3' ? 'true' : 'false'}`,
    className: `${titleTag === 'h3' ? 'is-pressed' : ''}`
  }, "H3"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h4'
      });
    },
    title: "H4",
    "aria-pressed": `${titleTag === 'h4' ? 'true' : 'false'}`,
    className: `${titleTag === 'h4' ? 'is-pressed' : ''}`
  }, "H4"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h5'
      });
    },
    title: "H5",
    "aria-pressed": `${titleTag === 'h5' ? 'true' : 'false'}`,
    className: `${titleTag === 'h5' ? 'is-pressed' : ''}`
  }, "H5"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'h6'
      });
    },
    title: "H6",
    "aria-pressed": `${titleTag === 'h6' ? 'true' : 'false'}`,
    className: `${titleTag === 'h6' ? 'is-pressed' : ''}`
  }, "H6"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'p'
      });
    },
    title: "P",
    "aria-pressed": `${titleTag === 'p' ? 'true' : 'false'}`,
    className: `${titleTag === 'p' ? 'is-pressed' : ''}`
  }, "p"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        titleTag: 'div'
      });
    },
    title: "div",
    "aria-pressed": `${titleTag === 'div' ? 'true' : 'false'}`,
    className: `${titleTag === 'div' ? 'is-pressed' : ''}`
  }, "div"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Description Tag', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb__titles_group"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ButtonGroup, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h1'
      });
    },
    title: "H1",
    "aria-pressed": `${descriptionTag === 'h1' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h1' ? 'is-pressed' : ''}`
  }, "H1"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h2'
      });
    },
    title: "H2",
    "aria-pressed": `${descriptionTag === 'h2' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h2' ? 'is-pressed' : ''}`
  }, "H2"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h3'
      });
    },
    title: "H3",
    "aria-pressed": `${descriptionTag === 'h3' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h3' ? 'is-pressed' : ''}`
  }, "H3"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h4'
      });
    },
    title: "H4",
    "aria-pressed": `${descriptionTag === 'h4' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h4' ? 'is-pressed' : ''}`
  }, "H4"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h5'
      });
    },
    title: "H5",
    "aria-pressed": `${descriptionTag === 'h5' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h5' ? 'is-pressed' : ''}`
  }, "H5"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'h6'
      });
    },
    title: "H6",
    "aria-pressed": `${descriptionTag === 'h6' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'h6' ? 'is-pressed' : ''}`
  }, "H6"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'p'
      });
    },
    title: "P",
    "aria-pressed": `${descriptionTag === 'p' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'p' ? 'is-pressed' : ''}`
  }, "p"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    onClick: () => {
      setAttributes({
        descriptionTag: 'div'
      });
    },
    title: "div",
    "aria-pressed": `${descriptionTag === 'div' ? 'true' : 'false'}`,
    className: `${descriptionTag === 'div' ? 'is-pressed' : ''}`
  }, "div"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.HorizontalRule, null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Content Height', 'wtrb-boxslogan-block'),
    separatorType: "fullWidth",
    min: 0,
    max: 300,
    value: contentBoxHeight || 250,
    onChange: newValue => {
      setAttributes({
        contentBoxHeight: parseInt(newValue)
      });
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Content Padding', 'wtrb-boxslogan-block'),
    separatorType: "fullWidth",
    min: 10,
    max: 50,
    value: contentBoxPadding || 10,
    onChange: newValue => {
      setAttributes({
        contentBoxPadding: parseInt(newValue)
      });
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.HorizontalRule, null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb__color_picker"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "wtrb__color_picker_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Title color', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setIsTitleColorVisible(true),
    className: "wtrb__color_indicator"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorIndicator, {
    colorValue: titleColor || '#000000'
  }), isTitleColorVisible && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Popover, {
    onFocusOutside: () => setIsTitleColorVisible(false)
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    label: "Title color",
    value: titleColor,
    clearable: true,
    onChange: newColor => setAttributes({
      titleColor: newColor
    })
  })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wtrb__color_picker"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "wtrb__color_picker_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Description color', 'wtrb-boxslogan-block')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setIsDescriptionColorVisible(true),
    className: "wtrb__color_indicator"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorIndicator, {
    colorValue: descriptionColor || '#444444'
  }), isDescriptionColorVisible && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Popover, {
    onFocusOutside: () => setIsDescriptionColorVisible(false)
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    label: "Description color",
    value: descriptionColor,
    clearable: true,
    onChange: newColor => setAttributes({
      descriptionColor: newColor
    })
  }))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Photo', 'wtrb-boxslogan-block'),
    initialOpen: false,
    className: "flex-col"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Object fit', 'wtrb-boxslogan-block'),
    value: imageObjectFit,
    onChange: newValue => {
      setAttributes({
        imageObjectFit: newValue
      });
    },
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Select an object fit', 'wtrb-boxslogan-block'),
      value: '',
      disabled: true
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Inherit', 'wtrb-boxslogan-block'),
      value: 'inherit'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Fill', 'wtrb-boxslogan-block'),
      value: 'fill'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Contain', 'wtrb-boxslogan-block'),
      value: 'contain'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Cover', 'wtrb-boxslogan-block'),
      value: 'cover'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Scale down', 'wtrb-boxslogan-block'),
      value: 'scale-down'
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Aspect Ratio', 'wtrb-boxslogan-block'),
    value: imageAspectRatio,
    onChange: newValue => {
      setAttributes({
        imageAspectRatio: newValue
      });
    },
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Select an aspect ratio', 'wtrb-boxslogan-block'),
      value: '',
      disabled: true
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('1:1', 'wtrb-boxslogan-block'),
      value: '1/1'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('2:3', 'wtrb-boxslogan-block'),
      value: '2/3'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('3:2', 'wtrb-boxslogan-block'),
      value: '3/2'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('3:4', 'wtrb-boxslogan-block'),
      value: '3/4'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('4:3', 'wtrb-boxslogan-block'),
      value: '4/3'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('9:16', 'wtrb-boxslogan-block'),
      value: '9/16'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('16:9', 'wtrb-boxslogan-block'),
      value: '16/9'
    }]
  })))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Inspector);

/***/ }),

/***/ "./src/blocks/boxslogan/save.js":
/*!**************************************!*\
  !*** ./src/blocks/boxslogan/save.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */


/**
 * Save function
 */

function save(props) {
  // Block Props
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.useBlockProps.save();
  const {
    children
  } = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.useInnerBlocksProps.save(blockProps);
  return children;
}

/***/ }),

/***/ "./src/utilities/Icons.js":
/*!********************************!*\
  !*** ./src/utilities/Icons.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const Icons = {
  desktop: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "8",
    height: "7",
    viewBox: "0 0 8 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M7.33333 0H0.666667C0.298611 0 0 0.293945 0 0.65625V5.03125C0 5.39355 0.298611 5.6875 0.666667 5.6875H3.33333L3.11111 6.34375H2.11111C1.92639 6.34375 1.77778 6.49004 1.77778 6.67188C1.77778 6.85371 1.92639 7 2.11111 7H5.88889C6.07361 7 6.22222 6.85371 6.22222 6.67188C6.22222 6.49004 6.07361 6.34375 5.88889 6.34375H4.88889L4.66667 5.6875H7.33333C7.70139 5.6875 8 5.39355 8 5.03125V0.65625C8 0.293945 7.70139 0 7.33333 0ZM7.11111 4.8125H0.888889V0.875H7.11111V4.8125Z"
  })),
  tablet: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "6",
    height: "7",
    viewBox: "0 0 6 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M5 0H1C0.446667 0 0 0.390833 0 0.875V6.125C0 6.60917 0.446667 7 1 7H5C5.55333 7 6 6.60917 6 6.125V0.875C6 0.390833 5.55333 0 5 0ZM3.66667 6.41667H2.33333V6.125H3.66667V6.41667ZM5.41667 5.54167H0.583333V0.875H5.41667V5.54167Z"
  })),
  smartphone: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "4",
    height: "7",
    viewBox: "0 0 4 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M3.33333 0H0.666667C0.297778 0 0 0.390833 0 0.875V6.125C0 6.60917 0.297778 7 0.666667 7H3.33333C3.70222 7 4 6.60917 4 6.125V0.875C4 0.390833 3.70222 0 3.33333 0ZM2.44444 6.41667H1.55556V6.125H2.44444V6.41667ZM3.61111 5.54167H0.388889V0.875H3.61111V5.54167Z"
  })),
  alignleft: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "21",
    x2: "3",
    y1: "6",
    y2: "6"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "15",
    x2: "3",
    y1: "12",
    y2: "12"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "17",
    x2: "3",
    y1: "18",
    y2: "18"
  })),
  alignright: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "21",
    x2: "3",
    y1: "6",
    y2: "6"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "21",
    x2: "9",
    y1: "12",
    y2: "12"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "21",
    x2: "7",
    y1: "18",
    y2: "18"
  })),
  aligncenter: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "21",
    x2: "3",
    y1: "6",
    y2: "6"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "17",
    x2: "7",
    y1: "12",
    y2: "12"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    x1: "19",
    x2: "5",
    y1: "18",
    y2: "18"
  }))
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Icons);

/***/ }),

/***/ "./src/blocks/boxslogan/editor.scss":
/*!******************************************!*\
  !*** ./src/blocks/boxslogan/editor.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/blocks/boxslogan/style.scss":
/*!*****************************************!*\
  !*** ./src/blocks/boxslogan/style.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/blocks/boxslogan/block.json":
/*!*****************************************!*\
  !*** ./src/blocks/boxslogan/block.json ***!
  \*****************************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"wtrb/boxslogans","version":"0.1.0","title":"Box Slogan Block","category":"wtrb-boxslogans","description":"Responsive Box Slogan Block for Gutenberg editor.","example":{"innerBlocks":[{"name":"wtrb/boxsloganmember","attributes":{"config":"imagetop"}},{"name":"wtrb/boxsloganmember","attributes":{"config":"imagebottom"}},{"name":"wtrb/boxsloganmember","attributes":{"config":"imagetop"}}]},"supports":{"html":false},"providesContext":{"wtrb/uniqueID":"uniqueID","wtrb/titleTag":"titleTag","wtrb/descriptionTag":"descriptionTag","wtrb/gapDBetweenBlocks":"gapDBetweenBlocks","wtrb/gapTBetweenBlocks":"gapTBetweenBlocks","wtrb/gapMBetweenBlocks":"gapMBetweenBlocks","wtrb/blockBorderRadius":"blockBorderRadius","wtrb/deskCols":"deskCols","wtrb/tabCols":"tabCols","wtrb/mobCols":"mobCols","wtrb/contentBoxHeight":"contentBoxHeight","wtrb/sloganTextAlignment":"sloganTextAlignment","wtrb/contentBoxPadding":"contentBoxPadding","wtrb/titleColor":"titleColor","wtrb/descriptionColor":"descriptionColor","wtrb/imageObjectFit":"imageObjectFit","wtrb/imageAspectRatio":"imageAspectRatio"},"textdomain":"wtrb-boxslogan-block","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php"}');

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"blocks/boxslogan/index": 0,
/******/ 			"blocks/boxslogan/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkwtr_boxslogan_block"] = globalThis["webpackChunkwtr_boxslogan_block"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["blocks/boxslogan/style-index"], () => (__webpack_require__("./src/blocks/boxslogan/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map