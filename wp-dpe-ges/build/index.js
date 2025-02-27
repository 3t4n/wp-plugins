/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Edit; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _inspector__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./inspector */ "./src/inspector.js");
/* harmony import */ var _preview__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./preview */ "./src/preview.js");
/* harmony import */ var _preview_new__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./preview-new */ "./src/preview-new.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");


/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */






/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

function Edit(props) {
  let preview;

  if (props.attributes.new_dpe) {
    preview = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_preview_new__WEBPACK_IMPORTED_MODULE_5__["default"], props);
  } else {
    preview = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_preview__WEBPACK_IMPORTED_MODULE_4__["default"], props);
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)(), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_inspector__WEBPACK_IMPORTED_MODULE_3__["default"], props), !!(props.attributes.display_dpe || props.attributes.display_ges) ? preview : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    class: "WP-DPE-GES-message"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('You must display at least 1 value', 'wpdpeges'))));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./save */ "./src/save.js");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */



/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)('cgb/wp-dpe-ges', {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"],

  /**
   * @see ./save.js
   */
  save: _save__WEBPACK_IMPORTED_MODULE_4__["default"]
});

/***/ }),

/***/ "./src/inspector.js":
/*!**************************!*\
  !*** ./src/inspector.js ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Inspector; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





class Inspector extends _wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Component {
  render() {
    const {
      attributes: {
        dpe_value,
        ges_value,
        not_subject,
        new_dpe,
        display_dpe,
        display_ges,
        display_inline
      },
      setAttributes
    } = this.props;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
      key: "setting"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DPE-GES Values', 'wpdpeges')
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
      for: "inspector-text-control-0"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DPE Value', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
      type: "text",
      placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DPE Value', 'wpdpeges'),
      onChange: val => setAttributes({
        dpe_value: val
      }),
      value: dpe_value
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
      for: "inspector-text-control-1"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('GES Value', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
      type: "text",
      placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('GES Value', 'wpdpeges'),
      onChange: val => setAttributes({
        ges_value: val
      }),
      value: ges_value
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display', 'wpdpeges')
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Not subject', 'wpdpeges'),
      checked: not_subject,
      onChange: () => setAttributes({
        not_subject: !not_subject
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('New DPE', 'wpdpeges'),
      checked: new_dpe,
      onChange: () => setAttributes({
        new_dpe: !new_dpe
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display DPE', 'wpdpeges'),
      checked: display_dpe,
      onChange: () => setAttributes({
        display_dpe: !display_dpe
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display GES', 'wpdpeges'),
      checked: display_ges,
      onChange: () => setAttributes({
        display_ges: !display_ges
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Display Inline', 'wpdpeges'),
      checked: display_inline,
      onChange: () => setAttributes({
        display_inline: !display_inline
      })
    })));
  }

}

/***/ }),

/***/ "./src/preview-new.js":
/*!****************************!*\
  !*** ./src/preview-new.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ PreviewNew; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);



class PreviewNew extends _wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Component {
  render() {
    if (this.props.attributes) {
      var {
        dpe_value,
        ges_value,
        not_subject,
        display_inline,
        display_dpe,
        display_ges
      } = this.props.attributes;
    } else {
      var {
        dpe_value,
        ges_value,
        not_subject,
        display_inline,
        display_dpe,
        display_ges
      } = this.props;
    }

    if (dpe_value !== "" && dpe_value !== undefined) {
      dpe_value = dpe_value.replace(',', '.');
    } else {
      dpe_value = "";
    }

    if (ges_value !== "" && ges_value !== undefined) {
      ges_value = ges_value.replace(',', '.');
    } else {
      ges_value = "";
    }

    const dpeBlankDisplay = dpe_value ? '' : ' dpe-blank-active';
    const gesBlankDisplay = ges_value ? '' : ' ges-blank-active';
    const dpegesNotSubject = not_subject ? ' dpeges-not-subject-active' : '';
    const Dpe = dpe_value;
    const Ges = ges_value;
    const DpeGesInline = display_inline ? 'energyDiagnosticContainer_inline' : 'energyDiagnosticContainer';
    let lettre_dpe = '';
    let lettre_ges = '';

    if (display_dpe && Dpe !== "") {
      if (Dpe < 70 || Dpe.toUpperCase() == 'A') {
        lettre_dpe = 'A';
      } else if (Dpe < 110 || Dpe.toUpperCase() == 'B') {
        lettre_dpe = 'B';
      } else if (Dpe < 180 || Dpe.toUpperCase() == 'C') {
        lettre_dpe = 'C';
      } else if (Dpe < 250 || Dpe.toUpperCase() == 'D') {
        lettre_dpe = 'D';
      } else if (Dpe < 330 || Dpe.toUpperCase() == 'E') {
        lettre_dpe = 'E';
      } else if (Dpe < 420 || Dpe.toUpperCase() == 'F') {
        lettre_dpe = 'F';
      } else if (Dpe >= 420 || Dpe.toUpperCase() == 'G') {
        lettre_dpe = 'G';
      }

      ;
    }

    if (display_ges && Ges !== "") {
      if (Ges < 6 || Ges.toUpperCase() == 'A') {
        lettre_ges = 'A';
      } else if (Ges < 11 || Ges.toUpperCase() == 'B') {
        lettre_ges = 'B';
      } else if (Ges < 30 || Ges.toUpperCase() == 'C') {
        lettre_ges = 'C';
      } else if (Ges < 50 || Ges.toUpperCase() == 'D') {
        lettre_ges = 'D';
      } else if (Ges < 70 || Ges.toUpperCase() == 'E') {
        lettre_ges = 'E';
      } else if (Ges < 100 || Ges.toUpperCase() == 'F') {
        lettre_ges = 'F';
      } else if (Ges >= 100 || Ges.toUpperCase() == 'G') {
        lettre_ges = 'G';
      }

      ;
    }

    if (lettre_ges > lettre_dpe) {
      lettre_dpe = lettre_ges;
    }

    var dpeClass = 'newdpe ' + dpeBlankDisplay + dpegesNotSubject;
    var dpeContainerClass = 'diagnostic-scale number' + lettre_dpe;
    var dpeDiagramContainerClass = 'diagnostic-diagram number' + lettre_dpe;
    var gesClass = 'newges ' + gesBlankDisplay + dpegesNotSubject;
    var gesContainerClass = 'emission-scale  number' + lettre_ges;
    var gesDiagramContainerClass = 'emission-diagram number' + lettre_ges;

    if (display_dpe) {
      var output_dpe = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: dpeClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Energy performance diagnostic', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
        className: "diagnostic diagnostic-dpe"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-container",
        "aria-hidden": "true"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: dpeContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-number-container"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-number",
        "aria-hidden": "false"
      }, Dpe), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Primary Energy Unit', 'wpdpeges')
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KWh/m².year', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-number-container"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-number",
        "aria-hidden": "false"
      }, Ges, "*"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Quantity of greenhouse gas emissions', 'wpdpeges')
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('kg CO2/m².year', 'wpdpeges')))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: dpeDiagramContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-legend-top"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Efficient housing', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-a"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-a"
      }, "A")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-b"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-b"
      }, "B")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-c"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-c"
      }, "C")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-d"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-d"
      }, "D")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-e"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-e"
      }, "E")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-f"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-f"
      }, "F")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-g"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-g"
      }, "G")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-legend-bottom"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('High energy housing', 'wpdpeges'))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "dpe-blank"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-blank-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DPE blank', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-blank-legend"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Non-usable consumption', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "dpe-not-subject"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-not-subject-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Not subject to diagnostic', 'wpdpeges')))));
    }

    if (display_ges) {
      var output_ges = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: gesClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('* Of which greenhouse gas emissions', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
        className: "emission emission-ges"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-container ",
        "aria-hidden": "true"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: gesDiagramContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-legend-top"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Low GHG emissions', 'wpdpeges')), " "), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-a"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-a"
      }, "A")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-b"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-b"
      }, "B")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-c"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-c"
      }, "C")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-d"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-d"
      }, "D")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-e"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-e"
      }, "E")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-f"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-f"
      }, "F")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-g"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-g"
      }, "G")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-legend-bottom"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('High GHG emissions', 'wpdpeges')))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: gesContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-number-container"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-number",
        "aria-hidden": "false"
      }, Ges), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Quantity of greenhouse gas emissions', 'wpdpeges')
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KgeqCO2 / m².year', 'wpdpeges'))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "ges-blank"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-blank-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('GES blank', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-blank-legend"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Non-usable consumption', 'wpdpeges')))));
    }

    if (display_dpe && display_ges) {
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: DpeGesInline
      }, output_dpe, output_ges);
    } else if (display_dpe) {
      return output_dpe;
    } else if (display_ges) {
      return output_ges;
    } else {
      return;
    }
  }

}

/***/ }),

/***/ "./src/preview.js":
/*!************************!*\
  !*** ./src/preview.js ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Preview; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);



class Preview extends _wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Component {
  render() {
    if (this.props.attributes) {
      var {
        dpe_value,
        ges_value,
        not_subject,
        display_inline,
        display_dpe,
        display_ges
      } = this.props.attributes;
    } else {
      var {
        dpe_value,
        ges_value,
        not_subject,
        display_inline,
        display_dpe,
        display_ges
      } = this.props;
    }

    const dpeBlankDisplay = dpe_value ? '' : ' dpe-blank-active';
    const gesBlankDisplay = ges_value ? '' : ' ges-blank-active';
    const dpegesNotSubject = not_subject ? ' dpeges-not-subject-active' : '';
    const Dpe = dpe_value;
    const Ges = ges_value;
    const DpeGesInline = display_inline ? ' dpe-ges-inline' : '';

    if (display_dpe) {
      let lettre_dpe;

      if (Dpe < 51 || Dpe == 'A') {
        lettre_dpe = 'A';
      } else if (Dpe < 91 || Dpe == 'B') {
        lettre_dpe = 'B';
      } else if (Dpe < 151 || Dpe == 'C') {
        lettre_dpe = 'C';
      } else if (Dpe < 231 || Dpe == 'D') {
        lettre_dpe = 'D';
      } else if (Dpe < 331 || Dpe == 'E') {
        lettre_dpe = 'E';
      } else if (Dpe < 451 || Dpe == 'F') {
        lettre_dpe = 'F';
      } else if (Dpe >= 451 || Dpe == 'G') {
        lettre_dpe = 'G';
      }

      ;
      var dpeClass = 'dpe ' + dpeBlankDisplay + dpegesNotSubject;
      var dpeContainerClass = 'diagnostic-number-container number' + lettre_dpe;
      var output_dpe = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: dpeClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Energy performance diagnostic', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
        className: "diagnostic diagnostic-dpe"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figcaption", {
        className: "diagnostic-title hidden"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Energy performance diagnostic', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-container",
        "aria-hidden": "true"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-legend"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Efficient housing', 'wpdpeges')), " ", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Primary Energy Unit', 'wpdpeges')
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KWhep / m².year', 'wpdpeges')))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-diagram"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-a"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('≤ 50', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-a"
      }, "A")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-b"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('51 to 90', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-b"
      }, "B")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-c"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('91 to 150', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-c"
      }, "C")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-d"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('151 to 230', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-d"
      }, "D")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-e"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('231 to 330', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-e"
      }, "E")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-f"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('331 to 450', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-f"
      }, "F")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-line line-g"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('> 450', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-letter letter-g"
      }, "G"))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "diagnostic-scale"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: dpeContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "diagnostic-number",
        "aria-hidden": "false"
      }, Dpe, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        className: "hidden",
        title: "Primary Energy Unit"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KWhep / m².year', 'wpdpeges'))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('High energy housing', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "dpe-blank"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-blank-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DPE blank', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-blank-legend"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Non-usable consumption', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "dpe-not-subject"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dpe-not-subject-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Not subject to diagnostic', 'wpdpeges')))));
    }

    if (display_ges) {
      let lettre_ges;

      if (Ges <= 5 || Ges == 'A') {
        lettre_ges = 'A';
      } else if (Ges < 11 || Ges == 'B') {
        lettre_ges = 'B';
      } else if (Ges < 21 || Ges == 'C') {
        lettre_ges = 'C';
      } else if (Ges < 36 || Ges == 'D') {
        lettre_ges = 'D';
      } else if (Ges < 56 || Ges == 'E') {
        lettre_ges = 'E';
      } else if (Ges < 81 || Ges == 'F') {
        lettre_ges = 'F';
      } else if (Ges >= 81 || Ges == 'G') {
        lettre_ges = 'G';
      }

      ;
      var gesClass = 'ges ' + gesBlankDisplay + dpegesNotSubject;
      var gesContainerClass = 'emission-number-container number' + lettre_ges;
      var output_ges = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: gesClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Emission of greenhouse gases', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
        className: "emission emission-ges"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figcaption", {
        className: "emission-title hidden"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Emission of greenhouse gases', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-container ",
        "aria-hidden": "true"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-legend"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Low GHG emissions', 'wpdpeges')), " ", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Quantity of greenhouse gas emissions', 'wpdpeges')
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KgeqCO2 / m².year', 'wpdpeges')))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-diagram"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-a"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('≤ 5', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-a"
      }, "A")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-b"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('6 to 10', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-b"
      }, "B")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-c"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('11 to 20', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-c"
      }, "C")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-d"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('21 to 35', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-d"
      }, "D")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-e"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('36 to 55', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-e"
      }, "E")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-f"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('56 to 80', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-f"
      }, "F")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-line line-g"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-value"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('> 80', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-letter letter-g"
      }, "G"))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "emission-scale"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: gesContainerClass
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "emission-number",
        "aria-hidden": "false"
      }, Ges, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("abbr", {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Quantity of greenhouse gas emissions', 'wpdpeges'),
        className: "hidden"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('KgeqCO2 / m².year', 'wpdpeges'))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('High GHG emissions', 'wpdpeges'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "ges-blank"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-blank-title"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('GES blank', 'wpdpeges')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "ges-blank-legend"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Non-usable consumption', 'wpdpeges')))));
    }

    if (display_dpe && display_ges) {
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: DpeGesInline
      }, output_dpe, output_ges);
    } else if (display_dpe) {
      return output_dpe;
    } else if (display_ges) {
      return output_ges;
    } else {
      return;
    }
  }

}

/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ save; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _preview__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./preview */ "./src/preview.js");
/* harmony import */ var _preview_new__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./preview-new */ "./src/preview-new.js");


/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */




/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */

function save(_ref) {
  let {
    attributes
  } = _ref;
  let preview;

  if (attributes.new_dpe) {
    preview = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_preview_new__WEBPACK_IMPORTED_MODULE_4__["default"], attributes);
  } else {
    preview = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_preview__WEBPACK_IMPORTED_MODULE_3__["default"], attributes);
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps.save(), !!(attributes.display_dpe || attributes.display_ges) ? preview : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    class: "WP-DPE-GES-message"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('You must display at least 1 value', 'wpdpeges')));
}

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ (function(module) {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ (function(module) {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

module.exports = window["wp"]["i18n"];

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
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
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
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"style-index": 0
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
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
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
/******/ 		var chunkLoadingGlobal = self["webpackChunkwp_dpe_ges"] = self["webpackChunkwp_dpe_ges"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["style-index"], function() { return __webpack_require__("./src/index.js"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map