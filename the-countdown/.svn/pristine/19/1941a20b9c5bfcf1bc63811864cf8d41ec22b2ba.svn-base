/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/attributes.js":
/*!***************************!*\
  !*** ./src/attributes.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   attributes: () => (/* binding */ attributes),
/* harmony export */   templateStyles: () => (/* binding */ templateStyles)
/* harmony export */ });
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils */ "./src/utils.js");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const {
  __
} = wp.i18n;
const {
  applyFilters
} = wp.hooks;

/**
 * Internal dependencies
 */

const templateStyles = applyFilters('tc_template_styles', {
  'default': {
    digitSize: '2.5rem',
    labelSize: '1.2rem',
    digitPad: '0.3rem',
    labelPad: '0.2rem',
    gap: '1rem',
    minWidth: '18%',
    digitColor: '#ffffff',
    digitBgColor: '#487ea8',
    labelColor: '',
    labelBgColor: ''
  },
  'minimal': {
    separator: ' : ',
    fontSize: '',
    fontWeight: '400',
    fontColor: ''
  },
  'flip': {
    digitSize: '2.7rem',
    labelSize: '1rem',
    width: '5rem',
    height: '7rem',
    gap: '1rem',
    digitColor: '#eeeeee',
    digitBgColor: '#272727',
    labelColor: '',
    labelBgColor: '',
    backgroundColor: ''
  },
  'scoreboard': {
    labelSize: '0.8rem',
    digitSize: '3rem',
    gap: '0rem',
    width: '90%',
    digitColor: '#ffffff',
    digitBgColor: '#40acda',
    labelColor: '#ffffff',
    labelBgColor: '#286189'
  },
  'circular': {
    digitSize: '4rem',
    labelSize: '1.8rem',
    digitTop: '40%',
    labelTop: '60%',
    gap: '1rem',
    width: '100%',
    baseSize: '16px',
    progressSize: '16px',
    baseColor: '#e0e0e0',
    progressColor: '#54b342',
    digitColor: '#111111',
    labelColor: '#a4a4a4',
    labelBgColor: '',
    backgroundColor: ''
  }
});

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const attributes = {
  clientId: {
    type: 'string',
    default: ''
  },
  mode: {
    type: 'string',
    default: 'until'
  },
  // the time
  dateTime: {
    type: 'string',
    default: (0,_utils__WEBPACK_IMPORTED_MODULE_0__.daysFromNow)(30)
  },
  // the time
  format: {
    type: 'array',
    default: ['days', 'hours', 'minutes', 'seconds']
  },
  labels1: {
    type: 'array',
    default: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second']
  },
  labels: {
    type: 'array',
    default: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds']
  },
  padZeroes: {
    type: 'boolean',
    default: true
  },
  hideonExpiry: {
    type: 'boolean',
    default: false
  },
  onExpiry: {
    type: 'string',
    default: 'show_message'
  },
  expiryText: {
    type: 'string',
    default: __('Expired', 'the-countdown')
  },
  expiryURL: {
    type: 'string',
    default: ''
  },
  expiryFunction: {
    type: 'string',
    default: ''
  },
  onTick: {
    type: 'string',
    default: ''
  },
  tickInterval: {
    type: 'integer',
    default: 1
  },
  relative: {
    type: 'string',
    default: '+5d'
  },
  template: {
    type: 'string',
    default: 'default'
  },
  styles: {
    type: 'object',
    default: templateStyles.default
  }
};

/***/ }),

/***/ "./src/edit-template.js":
/*!******************************!*\
  !*** ./src/edit-template.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ EditTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _attributes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./attributes.js */ "./src/attributes.js");
/* harmony import */ var _templates_default_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./templates/default.js */ "./src/templates/default.js");
/* harmony import */ var _templates_minimal_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./templates/minimal.js */ "./src/templates/minimal.js");
/* harmony import */ var _templates_flip_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./templates/flip.js */ "./src/templates/flip.js");
/* harmony import */ var _templates_scoreboard_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./templates/scoreboard.js */ "./src/templates/scoreboard.js");
/* harmony import */ var _templates_circular_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./templates/circular.js */ "./src/templates/circular.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
const {
  __
} = wp.i18n;
const {
  applyFilters
} = wp.hooks;
const {
  PanelBody,
  SelectControl
} = wp.components;







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
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function EditTemplate({
  attributes,
  setAttributes
}) {
  const {
    template
  } = {
    ...attributes
  };
  const templates = applyFilters('tc_templates', [{
    value: "default",
    label: __('Default', 'the-countdown'),
    help: "This is the default template. Please adjust available setting below to match your needs.",
    component: _templates_default_js__WEBPACK_IMPORTED_MODULE_2__["default"]
  }, {
    value: "minimal",
    label: __('Minimal', 'the-countdown'),
    help: "Display a timer using inline text.",
    component: _templates_minimal_js__WEBPACK_IMPORTED_MODULE_3__["default"]
  }, {
    value: "flip",
    label: __('Flip', 'the-countdown'),
    help: "Display a timer with flip box style.",
    component: _templates_flip_js__WEBPACK_IMPORTED_MODULE_4__["default"]
  }, {
    value: "scoreboard",
    label: __('Scoreboard', 'the-countdown'),
    help: "Display a timer with score board style.",
    component: _templates_scoreboard_js__WEBPACK_IMPORTED_MODULE_5__["default"]
  }, {
    value: "circular",
    label: __('Circular', 'the-countdown'),
    help: __('Display countdown with ticking progress bar circles. Best works with combination of days, hours, minutues and seconds', 'the-countdown'),
    component: _templates_circular_js__WEBPACK_IMPORTED_MODULE_6__["default"]
  }]);
  const changeTemplate = template => {
    setAttributes({
      template,
      styles: {
        ..._attributes_js__WEBPACK_IMPORTED_MODULE_1__.templateStyles[template]
      }
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Template', 'the-countdown'),
    help: templates.filter(tmp => tmp.value === template)[0].help,
    value: template,
    options: templates,
    onChange: value => changeTemplate(value),
    __nextHasNoMarginBottom: true
  })), templates.filter(tmp => tmp.value === template)[0].component({
    attributes,
    setAttributes
  }));
}

/***/ }),

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./utils */ "./src/utils.js");
/* harmony import */ var _timer__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./timer */ "./src/timer.js");
/* harmony import */ var _format__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./format */ "./src/format.js");
/* harmony import */ var _labels__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./labels */ "./src/labels.js");
/* harmony import */ var _on_expiry__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./on-expiry */ "./src/on-expiry.js");
/* harmony import */ var _edit_template__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./edit-template */ "./src/edit-template.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
 // development purpoase











/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

function useTraceUpdate(props) {
  const prev = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(props);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const changedProps = Object.entries(props).reduce((ps, [k, v]) => {
      if (prev.current[k] !== v) {
        ps[k] = [prev.current[k], v];
      }
      return ps;
    }, {});
    if (Object.keys(changedProps).length > 0) {
      console.log('Changed props:', changedProps);
    }
    prev.current = props;
  });
}

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function Edit({
  attributes,
  setAttributes,
  clientId
}) {
  setAttributes({
    clientId
  }); // add unique id

  const settingsTab = () => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
      __nextHasNoMarginBottom: true,
      className: "tcp-no-margin"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Date Time', 'the-countdown')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, {
      className: "until-since"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
      value: attributes.mode,
      options: [{
        value: 'until',
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Until', 'the-countdown')
      }, {
        value: 'since',
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Since', 'the-countdown')
      }, {
        value: 'relative',
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Relative', 'the-countdown')
      }],
      onChange: value => setAttributes({
        mode: value
      })
    }), 'relative' === attributes.mode && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
      type: "text",
      value: attributes.relative,
      onChange: value => setAttributes({
        relative: value
      })
    }), ['until', 'since'].indexOf(attributes.mode) > -1 && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Dropdown, {
      className: "my-container-class-name",
      contentClassName: "my-popover-content-classname",
      popoverProps: {
        placement: 'bottom-start'
      },
      renderToggle: ({
        isOpen,
        onToggle
      }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
        variant: "tertiary",
        onClick: onToggle,
        "aria-expanded": isOpen
      }, /* https://github.com/WordPress/gutenberg/blob/trunk/packages/editor/src/components/post-schedule/label.js#L35 */
      (0,_wordpress_date__WEBPACK_IMPORTED_MODULE_4__.dateI18n)(
      // translators: If using a space between 'g:i' and 'a', use a non-breaking sapce.
      (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__._x)('F j, Y g:i\xa0a', 'post schedule full date format'), attributes.dateTime)),
      renderContent: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.DateTimePicker, {
        label: "Date time",
        startOfWeek: (0,_wordpress_date__WEBPACK_IMPORTED_MODULE_4__.getSettings)().l10n.startOfWeek,
        currentDate: attributes.dateTime,
        onChange: newDate => setAttributes({
          dateTime: newDate
        }),
        is12Hour: _utils__WEBPACK_IMPORTED_MODULE_5__.is12HourTime,
        __nextRemoveHelpButton: true,
        __nextRemoveResetButton: true
      })
    })), 'relative' === attributes.mode && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
      className: "components-base-control__help relativeHelp"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("A number is treated as seconds i.e 300 for 300 seconds. Or use a string to specify the number and units: " + "'y' for years, 'o' for months, 'w' for weeks, 'd' for days, 'h' for hours, 'm' for minutes, 's' for seconds " + "i.e +3d for the next three days. Either upper or lower case letters may be used. Multiple relative may be " + "combined into single string i.e +3d +3h.", 'the-countdown'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("br", null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Note:", 'the-countdown')), (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("This mode will deactive if switching to other browser tab.", 'the-countdown'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,_format__WEBPACK_IMPORTED_MODULE_7__["default"])({
      attributes,
      setAttributes
    })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,_labels__WEBPACK_IMPORTED_MODULE_8__["default"])({
      attributes,
      setAttributes
    })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,_on_expiry__WEBPACK_IMPORTED_MODULE_9__["default"])({
      attributes,
      setAttributes
    })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Add leading zeroes', 'the-countdown'),
      checked: attributes.padZeroes,
      onChange: () => {
        setAttributes({
          padZeroes: !attributes.padZeroes
        });
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Hide counter if expired', 'the-countdown'),
      checked: attributes.hideonExpiry,
      onChange: () => {
        setAttributes({
          hideonExpiry: !attributes.hideonExpiry
        });
      }
    })));
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)()
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    group: "settings"
  }, settingsTab()), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    group: "advanced"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tick Interval', 'the-countdown'),
    type: "number",
    size: "3",
    value: attributes.tickInterval,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Interval (seconds) between onTick callbacks.', 'the-countdown'),
    onChange: value => setAttributes({
      tickInterval: parseInt(value)
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: "On Tick",
    value: attributes.onTick,
    placeholder: "Example: myFunction",
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Run JavaScript function every time the countdown ticking. Put the function name only <strong>without</strong> brackets.', 'the-countdown'),
    onChange: value => setAttributes({
      onTick: value
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    group: "styles"
  }, (0,_edit_template__WEBPACK_IMPORTED_MODULE_10__["default"])({
    attributes,
    setAttributes
  })), (0,_timer__WEBPACK_IMPORTED_MODULE_6__["default"])(attributes));
}

/***/ }),

/***/ "./src/format.js":
/*!***********************!*\
  !*** ./src/format.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Format)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

function Format({
  attributes,
  setAttributes
}) {
  const optionsObj = {
    years: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Years', 'the-countdown'),
    months: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Months', 'the-countdown'),
    weeks: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Weeks', 'the-countdown'),
    days: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Days', 'the-countdown'),
    hours: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Hours', 'the-countdown'),
    minutes: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Minutes', 'the-countdown'),
    seconds: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Seconds', 'the-countdown')
  };
  const onChangeOption = val => {
    const format = attributes.format.slice(0);
    let pos = format.indexOf(val);
    pos > -1 ? format.splice(pos, 1) : format.push(val);
    setAttributes({
      format
    });
  };
  const renderOptions = Object.keys(optionsObj).map(key => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexItem, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.CheckboxControl, {
      label: optionsObj[key],
      checked: attributes.format.indexOf(key) > -1 ? true : false,
      onChange: val => onChangeOption(key)
    }));
  });
  const displayText = attributes.format.map(k => optionsObj[k]).join(', ').substring(0, 20) + '...';
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Format', 'the-countdown-pro')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Dropdown, {
    headerTitle: "Format",
    popoverProps: {
      placement: 'bottom-start'
    },
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
      variant: "tertiary",
      onClick: onToggle,
      "aria-expanded": isOpen
    }, displayText),
    renderContent: () => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, {
        direction: "row",
        align: "top",
        wrap: true,
        className: "box"
      }, renderOptions);
    }
  })));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./save */ "./src/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */



/**
 * Internal dependencies
 */





/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_5__.name, {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('The Countdown', 'the-countdown'),
  /**
   * @see ./attributes.js
   */
  attributes: _attributes__WEBPACK_IMPORTED_MODULE_2__.attributes,
  /**
   * @see ./edit.js
   */
  edit: ({
    attributes,
    setAttributes,
    clientId
  }) => (0,_edit__WEBPACK_IMPORTED_MODULE_3__["default"])({
    attributes,
    setAttributes,
    clientId
  }),
  /**
   * @see ./save.js
   */
  save: ({
    attributes
  }) => (0,_save__WEBPACK_IMPORTED_MODULE_4__["default"])({
    attributes
  })
});

/***/ }),

/***/ "./src/labels.js":
/*!***********************!*\
  !*** ./src/labels.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Labels)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

function Labels({
  attributes,
  setAttributes
}) {
  const labels1 = ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'];
  const labels = ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'];
  const renderLabels1 = (attKey, whichLabel) => {
    const onChangeLabel = (val, index) => {
      const lbl = attributes[attKey].map((label, idx) => {
        if (index === idx) {
          label = val;
        }
        return label;
      });
      setAttributes({
        [attKey]: lbl
      });
    };
    const flexText = (label, index) => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexItem, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
        className: "textLabel",
        label: label,
        value: attributes[attKey][index],
        onChange: val => onChangeLabel(val, index)
      }));
    };
    const renderFlexText = whichLabel.map((label, index) => flexText(label, index));
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Dropdown, {
      popoverProps: {
        placement: 'bottom-start'
      },
      renderToggle: ({
        isOpen,
        onToggle
      }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
        variant: "tertiary",
        onClick: onToggle,
        "aria-expanded": isOpen
      }, attributes[attKey].join(', ').substring(0, 20) + '...'),
      renderContent: () => {
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, {
          direction: "row",
          align: "top",
          wrap: true,
          className: "box"
        }, renderFlexText);
      }
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", null, "Singular Label"), renderLabels1('labels1', labels1)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", null, "Plural Label"), renderLabels1('labels', labels)));
}

/***/ }),

/***/ "./src/lib/countdown.min.js":
/*!**********************************!*\
  !*** ./src/lib/countdown.min.js ***!
  \**********************************/
/***/ ((module) => {

/*
 countdown.js v2.6.1 http://countdownjs.org
 Copyright (c)2006-2014 Stephen M. McKamey.
 Licensed under The MIT License.
*/
var countdown = function () {
  function z(a, b) {
    var c = a.getTime();
    a.setMonth(a.getMonth() + b);
    return Math.round((a.getTime() - c) / 864E5);
  }
  function v(a) {
    var b = a.getTime(),
      c = new Date(b);
    c.setMonth(a.getMonth() + 1);
    return Math.round((c.getTime() - b) / 864E5);
  }
  function w(a, b) {
    b = b instanceof Date || null !== b && isFinite(b) ? new Date(+b) : new Date();
    if (!a) return b;
    var c = +a.value || 0;
    if (c) return b.setTime(b.getTime() + c), b;
    (c = +a.milliseconds || 0) && b.setMilliseconds(b.getMilliseconds() + c);
    (c = +a.seconds || 0) && b.setSeconds(b.getSeconds() + c);
    (c = +a.minutes || 0) && b.setMinutes(b.getMinutes() + c);
    (c = +a.hours || 0) && b.setHours(b.getHours() + c);
    (c = +a.weeks || 0) && (c *= 7);
    (c += +a.days || 0) && b.setDate(b.getDate() + c);
    (c = +a.months || 0) && b.setMonth(b.getMonth() + c);
    (c = +a.millennia || 0) && (c *= 10);
    (c += +a.centuries || 0) && (c *= 10);
    (c += +a.decades || 0) && (c *= 10);
    (c += +a.years || 0) && b.setFullYear(b.getFullYear() + c);
    return b;
  }
  function C(a, b) {
    return x(a) + (1 === a ? p[b] : q[b]);
  }
  function n() {}
  function k(a, b, c, e, l, d) {
    0 <= a[c] && (b += a[c], delete a[c]);
    b /= l;
    if (1 >= b + 1) return 0;
    if (0 <= a[e]) {
      a[e] = +(a[e] + b).toFixed(d);
      switch (e) {
        case "seconds":
          if (60 !== a.seconds || isNaN(a.minutes)) break;
          a.minutes++;
          a.seconds = 0;
        case "minutes":
          if (60 !== a.minutes || isNaN(a.hours)) break;
          a.hours++;
          a.minutes = 0;
        case "hours":
          if (24 !== a.hours || isNaN(a.days)) break;
          a.days++;
          a.hours = 0;
        case "days":
          if (7 !== a.days || isNaN(a.weeks)) break;
          a.weeks++;
          a.days = 0;
        case "weeks":
          if (a.weeks !== v(a.refMonth) / 7 || isNaN(a.months)) break;
          a.months++;
          a.weeks = 0;
        case "months":
          if (12 !== a.months || isNaN(a.years)) break;
          a.years++;
          a.months = 0;
        case "years":
          if (10 !== a.years || isNaN(a.decades)) break;
          a.decades++;
          a.years = 0;
        case "decades":
          if (10 !== a.decades || isNaN(a.centuries)) break;
          a.centuries++;
          a.decades = 0;
        case "centuries":
          if (10 !== a.centuries || isNaN(a.millennia)) break;
          a.millennia++;
          a.centuries = 0;
      }
      return 0;
    }
    return b;
  }
  function A(a, b, c, e, l, d) {
    var f = new Date();
    a.start = b = b || f;
    a.end = c = c || f;
    a.units = e;
    a.value = c.getTime() - b.getTime();
    0 > a.value && (f = c, c = b, b = f);
    a.refMonth = new Date(b.getFullYear(), b.getMonth(), 15, 12, 0, 0);
    try {
      a.millennia = 0;
      a.centuries = 0;
      a.decades = 0;
      a.years = c.getFullYear() - b.getFullYear();
      a.months = c.getMonth() - b.getMonth();
      a.weeks = 0;
      a.days = c.getDate() - b.getDate();
      a.hours = c.getHours() - b.getHours();
      a.minutes = c.getMinutes() - b.getMinutes();
      a.seconds = c.getSeconds() - b.getSeconds();
      a.milliseconds = c.getMilliseconds() - b.getMilliseconds();
      var g;
      0 > a.milliseconds ? (g = s(-a.milliseconds / 1E3), a.seconds -= g, a.milliseconds += 1E3 * g) : 1E3 <= a.milliseconds && (a.seconds += m(a.milliseconds / 1E3), a.milliseconds %= 1E3);
      0 > a.seconds ? (g = s(-a.seconds / 60), a.minutes -= g, a.seconds += 60 * g) : 60 <= a.seconds && (a.minutes += m(a.seconds / 60), a.seconds %= 60);
      0 > a.minutes ? (g = s(-a.minutes / 60), a.hours -= g, a.minutes += 60 * g) : 60 <= a.minutes && (a.hours += m(a.minutes / 60), a.minutes %= 60);
      0 > a.hours ? (g = s(-a.hours / 24), a.days -= g, a.hours += 24 * g) : 24 <= a.hours && (a.days += m(a.hours / 24), a.hours %= 24);
      for (; 0 > a.days;) a.months--, a.days += z(a.refMonth, 1);
      7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7);
      0 > a.months ? (g = s(-a.months / 12), a.years -= g, a.months += 12 * g) : 12 <= a.months && (a.years += m(a.months / 12), a.months %= 12);
      10 <= a.years && (a.decades += m(a.years / 10), a.years %= 10, 10 <= a.decades && (a.centuries += m(a.decades / 10), a.decades %= 10, 10 <= a.centuries && (a.millennia += m(a.centuries / 10), a.centuries %= 10)));
      b = 0;
      !(e & 1024) || b >= l ? (a.centuries += 10 * a.millennia, delete a.millennia) : a.millennia && b++;
      !(e & 512) || b >= l ? (a.decades += 10 * a.centuries, delete a.centuries) : a.centuries && b++;
      !(e & 256) || b >= l ? (a.years += 10 * a.decades, delete a.decades) : a.decades && b++;
      !(e & 128) || b >= l ? (a.months += 12 * a.years, delete a.years) : a.years && b++;
      !(e & 64) || b >= l ? (a.months && (a.days += z(a.refMonth, a.months)), delete a.months, 7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7)) : a.months && b++;
      !(e & 32) || b >= l ? (a.days += 7 * a.weeks, delete a.weeks) : a.weeks && b++;
      !(e & 16) || b >= l ? (a.hours += 24 * a.days, delete a.days) : a.days && b++;
      !(e & 8) || b >= l ? (a.minutes += 60 * a.hours, delete a.hours) : a.hours && b++;
      !(e & 4) || b >= l ? (a.seconds += 60 * a.minutes, delete a.minutes) : a.minutes && b++;
      !(e & 2) || b >= l ? (a.milliseconds += 1E3 * a.seconds, delete a.seconds) : a.seconds && b++;
      if (!(e & 1) || b >= l) {
        var h = k(a, 0, "milliseconds", "seconds", 1E3, d);
        if (h && (h = k(a, h, "seconds", "minutes", 60, d)) && (h = k(a, h, "minutes", "hours", 60, d)) && (h = k(a, h, "hours", "days", 24, d)) && (h = k(a, h, "days", "weeks", 7, d)) && (h = k(a, h, "weeks", "months", v(a.refMonth) / 7, d))) {
          e = h;
          var n,
            p = a.refMonth,
            q = p.getTime(),
            r = new Date(q);
          r.setFullYear(p.getFullYear() + 1);
          n = Math.round((r.getTime() - q) / 864E5);
          if (h = k(a, e, "months", "years", n / v(a.refMonth), d)) if (h = k(a, h, "years", "decades", 10, d)) if (h = k(a, h, "decades", "centuries", 10, d)) if (h = k(a, h, "centuries", "millennia", 10, d)) throw Error("Fractional unit overflow");
        }
      }
    } finally {
      delete a.refMonth;
    }
    return a;
  }
  function d(a, b, c, e, d) {
    var f;
    c = +c || 222;
    e = 0 < e ? e : NaN;
    d = 0 < d ? 20 > d ? Math.round(d) : 20 : 0;
    var k = null;
    "function" === typeof a ? (f = a, a = null) : a instanceof Date || (null !== a && isFinite(a) ? a = new Date(+a) : ("object" === typeof k && (k = a), a = null));
    var g = null;
    "function" === typeof b ? (f = b, b = null) : b instanceof Date || (null !== b && isFinite(b) ? b = new Date(+b) : ("object" === typeof b && (g = b), b = null));
    k && (a = w(k, b));
    g && (b = w(g, a));
    if (!a && !b) return new n();
    if (!f) return A(new n(), a, b, c, e, d);
    var k = c & 1 ? 1E3 / 30 : c & 2 ? 1E3 : c & 4 ? 6E4 : c & 8 ? 36E5 : c & 16 ? 864E5 : 6048E5,
      h,
      g = function () {
        f(A(new n(), a, b, c, e, d), h);
      };
    g();
    return h = setInterval(g, k);
  }
  var s = Math.ceil,
    m = Math.floor,
    p,
    q,
    r,
    t,
    u,
    f,
    x,
    y;
  n.prototype.toString = function (a) {
    var b = y(this),
      c = b.length;
    if (!c) return a ? "" + a : u;
    if (1 === c) return b[0];
    a = r + b.pop();
    return b.join(t) + a;
  };
  n.prototype.toHTML = function (a, b) {
    a = a || "span";
    var c = y(this),
      e = c.length;
    if (!e) return (b = b || u) ? "\x3c" + a + "\x3e" + b + "\x3c/" + a + "\x3e" : b;
    for (var d = 0; d < e; d++) c[d] = "\x3c" + a + "\x3e" + c[d] + "\x3c/" + a + "\x3e";
    if (1 === e) return c[0];
    e = r + c.pop();
    return c.join(t) + e;
  };
  n.prototype.addTo = function (a) {
    return w(this, a);
  };
  y = function (a) {
    var b = [],
      c = a.millennia;
    c && b.push(f(c, 10));
    (c = a.centuries) && b.push(f(c, 9));
    (c = a.decades) && b.push(f(c, 8));
    (c = a.years) && b.push(f(c, 7));
    (c = a.months) && b.push(f(c, 6));
    (c = a.weeks) && b.push(f(c, 5));
    (c = a.days) && b.push(f(c, 4));
    (c = a.hours) && b.push(f(c, 3));
    (c = a.minutes) && b.push(f(c, 2));
    (c = a.seconds) && b.push(f(c, 1));
    (c = a.milliseconds) && b.push(f(c, 0));
    return b;
  };
  d.MILLISECONDS = 1;
  d.SECONDS = 2;
  d.MINUTES = 4;
  d.HOURS = 8;
  d.DAYS = 16;
  d.WEEKS = 32;
  d.MONTHS = 64;
  d.YEARS = 128;
  d.DECADES = 256;
  d.CENTURIES = 512;
  d.MILLENNIA = 1024;
  d.DEFAULTS = 222;
  d.ALL = 2047;
  var D = d.setFormat = function (a) {
      if (a) {
        if ("singular" in a || "plural" in a) {
          var b = a.singular || [];
          b.split && (b = b.split("|"));
          var c = a.plural || [];
          c.split && (c = c.split("|"));
          for (var d = 0; 10 >= d; d++) p[d] = b[d] || p[d], q[d] = c[d] || q[d];
        }
        "string" === typeof a.last && (r = a.last);
        "string" === typeof a.delim && (t = a.delim);
        "string" === typeof a.empty && (u = a.empty);
        "function" === typeof a.formatNumber && (x = a.formatNumber);
        "function" === typeof a.formatter && (f = a.formatter);
      }
    },
    B = d.resetFormat = function () {
      p = " millisecond; second; minute; hour; day; week; month; year; decade; century; millennium".split(";");
      q = " milliseconds; seconds; minutes; hours; days; weeks; months; years; decades; centuries; millennia".split(";");
      r = " and ";
      t = ", ";
      u = "";
      x = function (a) {
        return a;
      };
      f = C;
    };
  d.setLabels = function (a, b, c, d, f, k, m) {
    D({
      singular: a,
      plural: b,
      last: c,
      delim: d,
      empty: f,
      formatNumber: k,
      formatter: m
    });
  };
  d.resetLabels = B;
  B();
   true && module.exports ? module.exports = d : "undefined" !== typeof window && "function" === typeof window.define && "undefined" !== typeof window.define.amd && window.define("countdown", [], function () {
    return d;
  });
  return d;
}();

/***/ }),

/***/ "./src/lib/rAF.js":
/*!************************!*\
  !*** ./src/lib/rAF.js ***!
  \************************/
/***/ (() => {

// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
// http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating

// requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel

// MIT license

(function () {
  var lastTime = 0;
  var vendors = ['ms', 'moz', 'webkit', 'o'];
  for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
    window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
    window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
  }
  if (!window.requestAnimationFrame) window.requestAnimationFrame = function (callback, element) {
    var currTime = new Date().getTime();
    var timeToCall = Math.max(0, 16 - (currTime - lastTime));
    var id = window.setTimeout(function () {
      callback(currTime + timeToCall);
    }, timeToCall);
    lastTime = currTime + timeToCall;
    return id;
  };
  if (!window.cancelAnimationFrame) window.cancelAnimationFrame = function (id) {
    clearTimeout(id);
  };
})();

/***/ }),

/***/ "./src/on-expiry.js":
/*!**************************!*\
  !*** ./src/on-expiry.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ OnExpiry)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */



/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

function OnExpiry({
  attributes,
  setAttributes
}) {
  const {
    onExpiry,
    expiryText,
    expiryURL
  } = {
    ...attributes
  };
  const actionHelp = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('This action always be executed after the countdown has expired', 'the-countdown');
  const renderInput = () => {
    switch (attributes.onExpiry) {
      case "show_message":
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
          value: expiryText,
          placeholder: "Insert text to display",
          help: actionHelp,
          onChange: value => setAttributes({
            expiryText: value
          })
        });
      case "js_callback":
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
          value: expiryText,
          placeholder: "Example: myFunction()",
          help: actionHelp,
          onChange: value => setAttributes({
            expiryText: value
          })
        });
      case "redirect_url":
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
          value: expiryURL,
          placeholder: "Example: http://www.example.com/index.html",
          type: "url",
          help: actionHelp,
          onChange: value => setAttributes({
            expiryURL: value
          })
        });
    }
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
    className: "on-expiry-panel"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: "On Expiry Action",
    value: onExpiry,
    options: [{
      value: 'none',
      label: 'Do nothing'
    }, {
      value: 'show_message',
      label: 'Show Text'
    }, {
      value: 'redirect_url',
      label: 'Redirect to URL'
    }, {
      value: 'js_callback',
      label: 'Run JavaScript function'
    }],
    onChange: value => setAttributes({
      onExpiry: value
    }),
    className: "narrow-margin-bottom"
  }), renderInput());
}

/***/ }),

/***/ "./src/relative.js":
/*!*************************!*\
  !*** ./src/relative.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   convertRelativeTime: () => (/* binding */ convertRelativeTime)
/* harmony export */ });
// https://github.com/kbwood/countdown/blob/master/src/js/jquery.countdown.js#L606

var Y = 0; // Years
var O = 1; // Months
var W = 2; // Weeks
var D = 3; // Days
var H = 4; // Hours
var M = 5; // Minutes
var S = 6; // Seconds

const currentDate = new Date();
const _getDaysInMonth = (year, month) => {
  return 32 - new Date(year, month, 32).getDate();
};
const offsetNumeric = offset => {
  // e.g. +300, -2
  var time = new Date();
  time.setTime(time.getTime() + offset * 1000);
  return time;
};
const offsetString = offset => {
  // e.g. '+2d', '-4w', '+3h +30m'
  offset = offset.toLowerCase();
  var time = new Date();
  var year = time.getFullYear();
  var month = time.getMonth();
  var day = time.getDate();
  var hour = time.getHours();
  var minute = time.getMinutes();
  var second = time.getSeconds();
  var pattern = /([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g;
  var matches = pattern.exec(offset);
  while (matches) {
    switch (matches[2] || 's') {
      case 's':
        second += parseInt(matches[1], 10);
        break;
      case 'm':
        minute += parseInt(matches[1], 10);
        break;
      case 'h':
        hour += parseInt(matches[1], 10);
        break;
      case 'd':
        day += parseInt(matches[1], 10);
        break;
      case 'w':
        day += parseInt(matches[1], 10) * 7;
        break;
      case 'o':
        month += parseInt(matches[1], 10);
        day = Math.min(day, _getDaysInMonth(year, month));
        break;
      case 'y':
        year += parseInt(matches[1], 10);
        day = Math.min(day, _getDaysInMonth(year, month));
        break;
    }
    matches = pattern.exec(offset); // repeat to avoid stuck
  }
  return new Date(year, month, day, hour, minute, second, 0);
};
function convertRelativeTime(relative) {
  // e.g. '+2d', '-4w', '+3h +30m'
  return typeof relative === 'string' ? offsetString(relative) : offsetNumeric(relative);
}
;

/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Save)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_countdown__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-countdown */ "./node_modules/react-countdown/dist/index.es.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_5__);





/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */




/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
function Save({
  attributes
}) {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    id: attributes['clientId'],
    className: "the-countdown"
  });
}

/***/ }),

/***/ "./src/styles/size.js":
/*!****************************!*\
  !*** ./src/styles/size.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Size)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */

function Size(key, label, attributes, setAttributes) {
  const units = [{
    value: 'px',
    label: 'px',
    default: 0
  }, {
    value: '%',
    label: '%',
    default: 0
  }, {
    value: 'em',
    label: 'em',
    default: 0
  }, {
    value: 'rem',
    label: 'rem',
    default: 0
  }, {
    value: 'vw',
    label: 'vw',
    default: 0
  }];
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    __next40pxDefaultSize: false,
    className: "block-editor-hooks__layout-controls-unit-input",
    label: label,
    labelPosition: "top",
    value: attributes.styles[key],
    onChange: sizeUnit => updateStyle(key, sizeUnit),
    units: units,
    style: {
      marginBottom: '16px'
    }
  });
}

/***/ }),

/***/ "./src/templates.js":
/*!**************************!*\
  !*** ./src/templates.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Templates)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./utils.js */ "./src/utils.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
const {
  useEffect,
  useState
} = wp.element;

const {
  applyFilters
} = wp.hooks;


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


function Templates({
  _countdown,
  attributes
}) {
  const {
    expired = false
  } = {
    ..._countdown
  };
  const {
    clientId,
    labels1,
    labels,
    expiryText,
    onExpiry,
    expiryURL,
    hideonExpiry = false,
    format,
    padZeroes,
    styles
  } = {
    ...attributes
  };
  const {
    lineHeight,
    gap
  } = {
    ...styles
  };
  const digits = Object.assign({}, _countdown);
  const defaultFormats = ['years', 'months', 'weeks', 'days', 'hours', 'minutes', 'seconds'];
  if (!!padZeroes) {
    Object.keys(digits).forEach(function (key, index) {
      if (defaultFormats.indexOf(key) > -1) {
        digits[key] = digits[key] < 10 ? '0' + digits[key] : digits[key];
        digits.prevs[key] = digits.prevs[key] < 10 ? '0' + digits.prevs[key] : digits.prevs[key];
      }
      ;
    });
  }
  const getLabel = lbl => {
    const lblPos = defaultFormats.indexOf(lbl.toLowerCase());

    // See countdown sprite { ..._countdown } above
    // Make sure _countdown is ready first
    const isSingle = _countdown && digits[lbl] <= 1 ? true : false;
    return isSingle ? labels1[lblPos] : labels[lblPos];
  };
  const renderDefaultSection = () => {
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const {
      digitSize,
      labelSize,
      minWidth,
      digitPad,
      labelPad,
      digitColor,
      digitBgColor,
      labelColor,
      labelBgColor
    } = {
      ...styles
    };
    return format.map(unit => {
      const unitStyle = {};
      if (!!minWidth) unitStyle.minWidth = minWidth;
      const amountStyle = {};
      if (!!digitColor) amountStyle.color = digitColor;
      if (!!digitBgColor) amountStyle.backgroundColor = digitBgColor;
      if (!!digitSize) amountStyle.fontSize = digitSize;
      if (!!digitPad) {
        amountStyle.paddingTop = digitPad;
        amountStyle.paddingBottom = digitPad;
      }
      const labelStyle = {};
      if (!!labelColor) labelStyle.color = labelColor;
      if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
      if (!!labelSize) labelStyle.fontSize = labelSize;
      if (!!labelPad) {
        labelStyle.paddingTop = labelPad;
        labelStyle.paddingBottom = labelPad;
      }
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        style: unitStyle
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "amount",
        style: amountStyle
      }, digits[unit.toLowerCase()]), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)));
    });
  };
  const renderScoreboardSection = () => {
    const {
      digitColor,
      digitSize,
      digitBgColor,
      labelColor,
      labelSize,
      labelBgColor
    } = {
      ...styles
    };
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const labelStyle = {};
    if (!!labelColor) labelStyle.color = labelColor;
    if (!!labelSize) labelStyle.fontSize = labelSize;
    if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
    const digitStyle = {};
    if (!!digitColor) digitStyle.color = digitColor;
    if (!!digitSize) digitStyle.fontSize = digitSize;
    if (!!digitBgColor) digitStyle.backgroundColor = digitBgColor;
    return format.map(unit => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "amount",
        style: digitStyle
      }, digits[unit.toLowerCase()]));
    });
  };
  const renderFlipSection = () => {
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const {
      width,
      height,
      digitColor,
      digitSize,
      digitBgColor,
      labelColor,
      labelSize,
      labelBgColor
    } = {
      ...styles
    };
    const digitStyle = {};
    if (!!height) digitStyle.height = height;
    if (!!digitSize) digitStyle.fontSize = digitSize;
    if (!!digitColor) digitStyle.color = digitColor;
    const labelStyle = {};
    if (!!labelSize) labelStyle.fontSize = labelSize;
    if (!!labelColor) labelStyle.color = labelColor;
    if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
    return format.map(_unit => {
      let unit = _unit.toLowerCase();
      let currentDigit = digits[unit];
      let previousDigit = digits.prevs[unit];
      let shuffle = digits.hasOwnProperty('shuffles') && digits.shuffles.hasOwnProperty(unit) ? digits.shuffles[unit] : true;

      // shuffle digits
      const digit1 = shuffle ? previousDigit : currentDigit;
      const digit2 = !shuffle ? previousDigit : currentDigit;

      // shuffle animations
      const animation1 = shuffle ? 'fold' : 'unfold';
      const animation2 = !shuffle ? 'fold' : 'unfold';
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: 'flipClock',
        style: {
          width
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: 'flipUnitContainer',
        style: digitStyle
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "upperCard",
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, currentDigit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "lowerCard",
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, previousDigit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: `flipCard ${animation1}`,
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, digit1)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: `flipCard ${animation2}`,
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, digit2))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)));
    });
  };
  const renderMinimalSection = () => {
    const {
      separator,
      fontSize,
      fontWeight,
      fontColor
    } = {
      ...styles
    };
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const arr = format.map(unit => {
      return digits[unit.toLowerCase()] + ' ' + getLabel(unit);
    });
    const spanStyle = {};
    if (!!fontSize) spanStyle.fontSize = fontSize;
    if (!!fontColor) spanStyle.color = fontColor;
    if (!!fontWeight) spanStyle.fontWeight = fontWeight;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      style: spanStyle
    }, arr.join(separator));
  };
  const renderCircularSection = () => {
    const {
      baseColor,
      progressColor,
      digitColor,
      labelColor,
      digitSize,
      labelSize,
      baseSize,
      progressSize,
      digitTop,
      labelTop
    } = {
      ...styles
    };
    let cirleId = 'tc' + clientId.replaceAll('-', '');

    // Create temporary reminder in the window and check if it is not expired
    if (!window[cirleId] && !digits.expired) {
      window[cirleId] = digits;
    }
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    return format.map(unit => {
      const fullAmount = {
        year: 10,
        // decade
        months: 12,
        days: 30,
        hours: 24,
        minutes: 60,
        seconds: 60
      };
      const unitLowerCase = unit.toLowerCase();
      const max = fullAmount[unitLowerCase];
      const value = digits[unit.toLowerCase()];
      const size = 200;
      const vBox = '-' + size * 0 + ' -' + size * 0 + ' ' + size + ' ' + size; // display: +- stroke width/2
      const radius = size / 2 - 10;
      const circumference = 3.14159 * radius * 2;
      const percentage = Math.round(circumference * ((max - value) / max)) + 'px';
      const cx = size / 2;
      const cy = size / 2;

      //unitLowerCase === 'minutes' && console.log( 'digit, duration, remaining', digits[ unit.toLowerCase() ], duration, remaining);	

      const progressStroke = _countdown[unit.toLowerCase()] === 0 ? baseColor : progressColor;
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
        width: size,
        height: size,
        viewBox: vBox,
        style: {
          transform: 'rotate(-90deg)'
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
        r: cx - 10,
        cx: cx,
        cy: cy,
        fill: "transparent",
        stroke: baseColor,
        "stroke-width": baseSize
      }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
        r: cx - 10,
        cx: cx,
        cy: cy,
        stroke: progressStroke,
        "stroke-width": progressSize,
        "stroke-linecap": "round",
        "stroke-dashoffset": percentage,
        "stroke-dasharray": circumference,
        fill: "transparent"
      }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("text", {
        x: "100",
        y: "50",
        "font-size": digitSize,
        "text-anchor": "middle",
        "dominant-baseline": "middle",
        style: {
          transform: 'rotate(90deg) translate(0px, -196px)'
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("tspan", {
        x: "100",
        y: digitTop,
        "font-weight": "bold",
        fill: digitColor
      }, value), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("tspan", {
        x: "100",
        y: labelTop,
        "font-weight": "normal",
        fill: labelColor,
        "font-size": labelSize
      }, getLabel(unit))));
    });
  };
  let inlineStyles = {};
  const renderExpiryText = () => {
    switch (onExpiry) {
      case "redirect_url":
        // Redirect to URL is is set to and if expired
        if ('post-php' !== window.adminpage) {
          // if not in admin

          window.setTimeout(() => {
            location.href = expiryURL;
          }, 2000);
          return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
            className: "tc-textCenter"
          }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Redirecting...', 'the-countdown'));
        } else {
          return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
            className: "tc-textCenter"
          }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Redirecting on hold because you are not in front page.', 'the-countdown'));
        }
      default:
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
          className: "tc-textCenter"
        }, expiryText);
    }
  };
  const hideIfExpired = () => {
    return !!expired && !!hideonExpiry ? true : false;
  };
  const {
    width
  } = {
    ...styles
  };
  let margin = '0 ' + (100 - parseInt(width)) / 2 + '%';
  switch (attributes.template) {
    case "minimal":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-minimal"
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderMinimalSection()), !!expired && renderExpiryText());
    case "scoreboard":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-scoreboard",
        style: {
          width,
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderScoreboardSection()), !!expired && renderExpiryText());
    case "flip":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-flip",
        style: {
          lineHeight,
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderFlipSection()), !!expired && renderExpiryText());
    case "circular":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-circular",
        style: {
          width,
          gap,
          margin
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderCircularSection()), !!expired && renderExpiryText());
    case "default":
    default:
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-default",
        style: {
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderDefaultSection()), !!expired && renderExpiryText());
  }
}

/***/ }),

/***/ "./src/templates/circular.js":
/*!***********************************!*\
  !*** ./src/templates/circular.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ circularTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _styles_size_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../styles/size.js */ "./src/styles/size.js");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function circularTemplate({
  attributes,
  setAttributes
}) {
  const {
    baseColor,
    progressColor,
    digitColor,
    labelColor,
    width
  } = {
    ...attributes.styles
  };
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    __next40pxDefaultSize: false,
    className: "block-editor-hooks__layout-controls-unit-input",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Block Width'),
    labelPosition: "top",
    value: width,
    onChange: value => {
      if (parseInt(value) <= 100) {
        updateStyle('width', value);
      }
    },
    units: [{
      value: '%',
      label: '%'
    }],
    style: {
      marginBottom: '16px'
    }
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('gap', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Gap'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('baseSize', 'Base Size', attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('progressSize', 'Progress Size', attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Size'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Size'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitTop', 'Digit Top', attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelTop', 'Label top', attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.PanelColorSettings, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Colors'),
    className: "tc-inside-panel",
    colorSettings: [{
      value: baseColor,
      onChange: color => updateStyle('baseColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Circle Base Color')
    }, {
      value: progressColor,
      onChange: color => updateStyle('progressColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Progress Circle Color')
    }, {
      value: digitColor,
      onChange: color => updateStyle('digitColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Color')
    }, {
      value: labelColor,
      onChange: color => updateStyle('labelColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Color')
    }]
  })));
}

/***/ }),

/***/ "./src/templates/default.js":
/*!**********************************!*\
  !*** ./src/templates/default.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ defaultTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _styles_size_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../styles/size.js */ "./src/styles/size.js");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function defaultTemplate({
  attributes,
  setAttributes
}) {
  const {
    digitColor,
    digitBgColor,
    labelColor,
    labelBgColor
  } = {
    ...attributes.styles
  };
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('gap', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Gap'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('minWidth', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Min Width'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Size'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Size'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitPad', 'Digit Padding', attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelPad', 'Label Padding', attributes, setAttributes)))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.PanelColorSettings, {
    className: "tx-default-color",
    colorSettings: [{
      value: digitColor,
      onChange: color => updateStyle('digitColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Color')
    }, {
      value: digitBgColor,
      onChange: color => updateStyle('digitBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Background Color')
    }, {
      value: labelColor,
      onChange: color => updateStyle('labelColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Color')
    }, {
      value: labelBgColor,
      onChange: color => updateStyle('labelBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Background Color')
    }]
  }));
}

/***/ }),

/***/ "./src/templates/flip.js":
/*!*******************************!*\
  !*** ./src/templates/flip.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ flipTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _styles_size_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../styles/size.js */ "./src/styles/size.js");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function flipTemplate({
  attributes,
  setAttributes,
  clientId
}) {
  const {
    digitColor,
    digitBgColor,
    labelColor,
    labelBgColor
  } = attributes.styles;
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('width', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Width'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('height', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Height'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('gap', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Gap'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Size'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Size'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitPadV', 'Digit Padding', attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitPadH', 'Digit Padding', attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelPadV', 'Label Padding', attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelPadH', 'Label Padding', attributes, setAttributes)))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.PanelColorSettings, {
    className: "tx-default-color",
    colorSettings: [{
      value: digitColor,
      onChange: color => updateStyle('digitColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Color')
    }, {
      value: digitBgColor,
      onChange: color => updateStyle('digitBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Background Color')
    }, {
      value: labelColor,
      onChange: color => updateStyle('labelColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Color')
    }, {
      value: labelBgColor,
      onChange: color => updateStyle('labelBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Background Color')
    }]
  }));
}

/***/ }),

/***/ "./src/templates/minimal.js":
/*!**********************************!*\
  !*** ./src/templates/minimal.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ minimalTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _styles_size_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../styles/size.js */ "./src/styles/size.js");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function minimalTemplate({
  attributes,
  setAttributes
}) {
  const {
    fontColor,
    separator,
    fontWeight
  } = {
    ...attributes.styles
  };
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Separator', 'the-countdown'),
    type: "text",
    value: separator,
    onChange: text => updateStyle('separator', text),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('String for each digit separator.', 'the-countdown')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('fontSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Font Size'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Font Weight', 'the-countdown'),
    value: fontWeight,
    options: [{
      value: '100',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Thin', 'the-countdown')
    }, {
      value: '200',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Extra Light', 'the-countdown')
    }, {
      value: '300',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Light', 'the-countdown')
    }, {
      value: '400',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Normal', 'the-countdown')
    }, {
      value: '500',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Medium', 'the-countdown')
    }, {
      value: '600',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Semi Bold', 'the-countdown')
    }, {
      value: '700',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Bold', 'the-countdown')
    }, {
      value: '800',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Extra Bold', 'the-countdown')
    }, {
      value: '900',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Black', 'the-countdown')
    }, {
      value: '950',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Extra Black', 'the-countdown')
    }],
    onChange: value => updateStyle('fontWeight', value),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Some weight might not work for current theme.', 'the-countdown')
  }), "\xDF"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.PanelColorSettings, {
    className: "tx-default-color",
    colorSettings: [{
      value: fontColor,
      onChange: color => updateStyle('fontColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Font Color')
    }]
  }));
}

/***/ }),

/***/ "./src/templates/scoreboard.js":
/*!*************************************!*\
  !*** ./src/templates/scoreboard.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ ScoreboardTemplate)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _styles_size_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../styles/size.js */ "./src/styles/size.js");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
function ScoreboardTemplate({
  attributes,
  setAttributes
}) {
  const {
    digitColor,
    digitBgColor,
    labelColor,
    labelBgColor
  } = {
    ...attributes.styles
  };
  const updateStyle = (key, value) => {
    const styles = Object.assign({}, attributes.styles);
    styles[key] = value;
    setAttributes({
      styles
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('gap', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Gap'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('width', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Width'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Flex, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('digitSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Size'), attributes, setAttributes)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FlexBlock, null, (0,_styles_size_js__WEBPACK_IMPORTED_MODULE_4__["default"])('labelSize', (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Size'), attributes, setAttributes))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.PanelColorSettings, {
    className: "tc-inside-panel",
    styles: {
      margin: '0 -16px'
    },
    colorSettings: [{
      value: labelColor,
      onChange: color => updateStyle('labelColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Color')
    }, {
      value: labelBgColor,
      onChange: color => updateStyle('labelBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Label Background Color')
    }, {
      value: digitColor,
      onChange: color => updateStyle('digitColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Color')
    }, {
      value: digitBgColor,
      onChange: color => updateStyle('digitBgColor', color),
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Digit Background Color')
    }]
  })));
}

/***/ }),

/***/ "./src/timer.js":
/*!**********************!*\
  !*** ./src/timer.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ CountDownTimer)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./lib/rAF.js */ "./src/lib/rAF.js");
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./lib/countdown.min.js */ "./src/lib/countdown.min.js");
/* harmony import */ var _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _relative__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./relative */ "./src/relative.js");
/* harmony import */ var _templates__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./templates */ "./src/templates.js");


const {
  useEffect,
  useState,
  useRef
} = wp.element;
const apiFetch = wp.apiFetch;





// https://codesandbox.io/s/x908rkw8yq?fontsize=14&file=/src/index.js
const fetchServerDateTime = attributes => {
  const [currentDate, setcurrentDate] = useState(null);
  const [loading, setLoading] = useState(true);
  const fetchDateTime = async () => {
    const response = await apiFetch({
      path: 'the-countdown/v1/get-datetime'
    });
    const date = await response;
    setcurrentDate(new Date(date));
    setLoading(false);
  };
  useEffect(() => {
    fetchDateTime();
  }, [attributes.mode, attributes.dateTime, attributes.relative]); // update if dateTime or relative time changed

  return {
    currentDate,
    loading
  };
};
function CountDownTimer(attributes) {
  const {
    dateTime,
    mode,
    tickInterval,
    format,
    onTick,
    onExpiry,
    expiryURL,
    relative
  } = {
    ...attributes
  };
  let units = 0;
  let zeroUnits = {};
  let trueShuffles = {};
  for (let i = 0; i < format.length; i++) {
    units = units + (_lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default())[format[i].toUpperCase()]; // for countdown parameter
    zeroUnits[format[i]] = 0;
    trueShuffles[format[i]] = true;
  }
  const targetDate = 'relative' === mode ? (0,_relative__WEBPACK_IMPORTED_MODULE_4__.convertRelativeTime)(relative) : new Date(dateTime);
  const {
    currentDate,
    loading
  } = fetchServerDateTime(attributes); // update current server date time

  const initialState = {
    ...zeroUnits,
    init: false,
    prevs: Object.assign({}, zeroUnits),
    shuffles: Object.assign({}, trueShuffles),
    expired: false,
    error: false
  };
  const [_countdown, _setCountdown] = useState(initialState);
  const prevCountddownRef = useRef(initialState);

  // https://stackoverflow.com/a/69771433/806875
  // https://stackoverflow.com/a/69340268/806875
  useEffect(() => {
    if (loading) {
      return;
    }

    // Do quick redirect if expired right after calculation.
    const doExpiryAction = () => {
      // Redirect to URL is is set to and if expired
      if ('post-php' !== window.adminpage && 'redirect_url' === onExpiry) {
        window.location = expiryURL;
        return;
      }
      _setCountdown(initialState);
    };
    if ('until' === mode || 'relative' === mode && targetDate.getTime() > currentDate.getTime()) {
      // expired
      if (targetDate.getTime() < currentDate.getTime()) {
        // expired
        doExpiryAction();
      } else {
        let ticks = tickInterval;
        const interval = setInterval(() => {
          let countdownObj = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + ticks, units);
          if (countdownObj.start.toString() === countdownObj.end.toString()) {
            // this -1 second
            clearInterval(interval);
            initialState.expired = true;
            _setCountdown(initialState); // expired					
          } else {
            countdownObj.init = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + tickInterval, units);
            countdownObj.expired = false;
            countdownObj.shuffles = prevCountddownRef.current.shuffles;
            for (let i = 0; i < format.length; i++) {
              let unit = format[i];
              if (countdownObj[unit] !== prevCountddownRef.current[unit]) {
                countdownObj.shuffles[unit] = !Boolean(prevCountddownRef.current.shuffles[unit]);
              }
            }
            countdownObj.prevs = prevCountddownRef.current;
            _setCountdown(countdownObj);
            let fn = window[onTick]; // onTick callback						
            typeof fn === "function" && fn(); // is a function?

            ticks = ticks + tickInterval * 1000;
          }
        }, parseInt(tickInterval * 1000));
        return () => clearInterval(interval);
      }
    }
    if ('since' === mode || 'relative' === mode && targetDate.getTime() < currentDate.getTime()) {
      // expired
      if (targetDate.getTime() > currentDate.getTime()) {
        // expired
        doExpiryAction();
      } else {
        let ticks = tickInterval;
        const interval = setInterval(() => {
          let countdownObj = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(currentDate.getTime() + ticks, targetDate, units);
          if (countdownObj.start.toString() === countdownObj.end.toString()) {
            // this -1 second
            clearInterval(interval);
            initialState.expired = true;
            _setCountdown(initialState); // expired
          } else {
            countdownObj.init = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + tickInterval, units);
            countdownObj.expired = false;
            countdownObj.shuffles = prevCountddownRef.current.shuffles;
            for (let i = 0; i < format.length; i++) {
              let unit = format[i];
              if (countdownObj[unit] !== prevCountddownRef.current[unit]) {
                countdownObj.shuffles[unit] = !Boolean(prevCountddownRef.current.shuffles[unit]);
              }
            }
            countdownObj.prevs = prevCountddownRef.current;
            _setCountdown(countdownObj);
            let fn = window[onTick]; // onTick callback						
            typeof fn === "function" && fn(); // is a function?

            ticks = ticks + tickInterval * 1000;
          }
        }, parseInt(tickInterval * 1000));
        return () => clearInterval(interval);
      }
    }
  }, [currentDate, format, loading]);
  if (!loading) {
    // Return error if target date is not valid for since and until
    if ('since' === mode && targetDate.getTime() > currentDate.getTime()) {
      // expired
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "tc-error"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Target date cannot be in the future for "since" mode, please check the date time setting.'), " ");
    }
    if ('until' === mode && targetDate.getTime() < currentDate.getTime()) {
      // expired
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "tc-error"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Target date cannot be in the past for "until" mode, please check the date time setting.'), " ");
    }
    prevCountddownRef.current = _countdown;
    return (0,_templates__WEBPACK_IMPORTED_MODULE_5__["default"])({
      _countdown,
      attributes
    });
  } else {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "tc-textCenter"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Rendering timer...', 'the-countdown'));
  }
}
;

/***/ }),

/***/ "./src/utils.js":
/*!**********************!*\
  !*** ./src/utils.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   daysFromNow: () => (/* binding */ daysFromNow),
/* harmony export */   is12HourTime: () => (/* binding */ is12HourTime),
/* harmony export */   isEmpty: () => (/* binding */ isEmpty),
/* harmony export */   isWeekend: () => (/* binding */ isWeekend)
/* harmony export */ });
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_0__);


// gutenberg/packages/components/src/date-time/stories/utils.ts 
function daysFromNow(days) {
  const date = new Date();
  date.setDate(date.getDate() + days);
  return date;
}
function isWeekend(date) {
  return date.getDay() === 0 || date.getDay() === 6;
}
function isEmpty(value) {
  return value === undefined || value === null || typeof value === "object" && Object.keys(value).length === 0 || typeof value === "string" && value.trim().length === 0;
}

// https://github.com/WordPress/gutenberg/blob/41a30232f5d9ad57246e9843c40cae4ca62acda4/packages/editor/src/components/post-schedule/index.js#L62
const is12HourTime = /a(?!\\)/i.test((0,_wordpress_date__WEBPACK_IMPORTED_MODULE_0__.getSettings)().formats.time.toLowerCase() // Test only the lower case a.
.replace(/\\\\/g, '') // Replace "//" with empty strings.
.split('').reverse().join('') // Reverse the string and test for "a" not followed by a slash.
);

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/***/ ((module) => {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = __webpack_require__(/*! ./lib/has */ "./node_modules/prop-types/lib/has.js");

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) { /**/ }
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.' +
              'This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/factoryWithTypeCheckers.js":
/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/prop-types/node_modules/react-is/index.js");
var assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");

var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
var has = __webpack_require__(/*! ./lib/has */ "./node_modules/prop-types/lib/has.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

var printWarning = function() {};

if (true) {
  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

function emptyFunctionThatReturnsNull() {
  return null;
}

module.exports = function(isValidElement, throwOnDirectAccess) {
  /* global Symbol */
  var ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
  var FAUX_ITERATOR_SYMBOL = '@@iterator'; // Before Symbol spec.

  /**
   * Returns the iterator method function contained on the iterable object.
   *
   * Be sure to invoke the function with the iterable as context:
   *
   *     var iteratorFn = getIteratorFn(myIterable);
   *     if (iteratorFn) {
   *       var iterator = iteratorFn.call(myIterable);
   *       ...
   *     }
   *
   * @param {?object} maybeIterable
   * @return {?function}
   */
  function getIteratorFn(maybeIterable) {
    var iteratorFn = maybeIterable && (ITERATOR_SYMBOL && maybeIterable[ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL]);
    if (typeof iteratorFn === 'function') {
      return iteratorFn;
    }
  }

  /**
   * Collection of methods that allow declaration and validation of props that are
   * supplied to React components. Example usage:
   *
   *   var Props = require('ReactPropTypes');
   *   var MyArticle = React.createClass({
   *     propTypes: {
   *       // An optional string prop named "description".
   *       description: Props.string,
   *
   *       // A required enum prop named "category".
   *       category: Props.oneOf(['News','Photos']).isRequired,
   *
   *       // A prop named "dialog" that requires an instance of Dialog.
   *       dialog: Props.instanceOf(Dialog).isRequired
   *     },
   *     render: function() { ... }
   *   });
   *
   * A more formal specification of how these methods are used:
   *
   *   type := array|bool|func|object|number|string|oneOf([...])|instanceOf(...)
   *   decl := ReactPropTypes.{type}(.isRequired)?
   *
   * Each and every declaration produces a function with the same signature. This
   * allows the creation of custom validation functions. For example:
   *
   *  var MyLink = React.createClass({
   *    propTypes: {
   *      // An optional string or URI prop named "href".
   *      href: function(props, propName, componentName) {
   *        var propValue = props[propName];
   *        if (propValue != null && typeof propValue !== 'string' &&
   *            !(propValue instanceof URI)) {
   *          return new Error(
   *            'Expected a string or an URI for ' + propName + ' in ' +
   *            componentName
   *          );
   *        }
   *      }
   *    },
   *    render: function() {...}
   *  });
   *
   * @internal
   */

  var ANONYMOUS = '<<anonymous>>';

  // Important!
  // Keep this list in sync with production version in `./factoryWithThrowingShims.js`.
  var ReactPropTypes = {
    array: createPrimitiveTypeChecker('array'),
    bigint: createPrimitiveTypeChecker('bigint'),
    bool: createPrimitiveTypeChecker('boolean'),
    func: createPrimitiveTypeChecker('function'),
    number: createPrimitiveTypeChecker('number'),
    object: createPrimitiveTypeChecker('object'),
    string: createPrimitiveTypeChecker('string'),
    symbol: createPrimitiveTypeChecker('symbol'),

    any: createAnyTypeChecker(),
    arrayOf: createArrayOfTypeChecker,
    element: createElementTypeChecker(),
    elementType: createElementTypeTypeChecker(),
    instanceOf: createInstanceTypeChecker,
    node: createNodeChecker(),
    objectOf: createObjectOfTypeChecker,
    oneOf: createEnumTypeChecker,
    oneOfType: createUnionTypeChecker,
    shape: createShapeTypeChecker,
    exact: createStrictShapeTypeChecker,
  };

  /**
   * inlined Object.is polyfill to avoid requiring consumers ship their own
   * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
   */
  /*eslint-disable no-self-compare*/
  function is(x, y) {
    // SameValue algorithm
    if (x === y) {
      // Steps 1-5, 7-10
      // Steps 6.b-6.e: +0 != -0
      return x !== 0 || 1 / x === 1 / y;
    } else {
      // Step 6.a: NaN == NaN
      return x !== x && y !== y;
    }
  }
  /*eslint-enable no-self-compare*/

  /**
   * We use an Error-like object for backward compatibility as people may call
   * PropTypes directly and inspect their output. However, we don't use real
   * Errors anymore. We don't inspect their stack anyway, and creating them
   * is prohibitively expensive if they are created too often, such as what
   * happens in oneOfType() for any type before the one that matched.
   */
  function PropTypeError(message, data) {
    this.message = message;
    this.data = data && typeof data === 'object' ? data: {};
    this.stack = '';
  }
  // Make `instanceof Error` still work for returned errors.
  PropTypeError.prototype = Error.prototype;

  function createChainableTypeChecker(validate) {
    if (true) {
      var manualPropTypeCallCache = {};
      var manualPropTypeWarningCount = 0;
    }
    function checkType(isRequired, props, propName, componentName, location, propFullName, secret) {
      componentName = componentName || ANONYMOUS;
      propFullName = propFullName || propName;

      if (secret !== ReactPropTypesSecret) {
        if (throwOnDirectAccess) {
          // New behavior only for users of `prop-types` package
          var err = new Error(
            'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
            'Use `PropTypes.checkPropTypes()` to call them. ' +
            'Read more at http://fb.me/use-check-prop-types'
          );
          err.name = 'Invariant Violation';
          throw err;
        } else if ( true && typeof console !== 'undefined') {
          // Old behavior for people using React.PropTypes
          var cacheKey = componentName + ':' + propName;
          if (
            !manualPropTypeCallCache[cacheKey] &&
            // Avoid spamming the console because they are often not actionable except for lib authors
            manualPropTypeWarningCount < 3
          ) {
            printWarning(
              'You are manually calling a React.PropTypes validation ' +
              'function for the `' + propFullName + '` prop on `' + componentName + '`. This is deprecated ' +
              'and will throw in the standalone `prop-types` package. ' +
              'You may be seeing this warning due to a third-party PropTypes ' +
              'library. See https://fb.me/react-warning-dont-call-proptypes ' + 'for details.'
            );
            manualPropTypeCallCache[cacheKey] = true;
            manualPropTypeWarningCount++;
          }
        }
      }
      if (props[propName] == null) {
        if (isRequired) {
          if (props[propName] === null) {
            return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required ' + ('in `' + componentName + '`, but its value is `null`.'));
          }
          return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required in ' + ('`' + componentName + '`, but its value is `undefined`.'));
        }
        return null;
      } else {
        return validate(props, propName, componentName, location, propFullName);
      }
    }

    var chainedCheckType = checkType.bind(null, false);
    chainedCheckType.isRequired = checkType.bind(null, true);

    return chainedCheckType;
  }

  function createPrimitiveTypeChecker(expectedType) {
    function validate(props, propName, componentName, location, propFullName, secret) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== expectedType) {
        // `propValue` being instance of, say, date/regexp, pass the 'object'
        // check, but we can offer a more precise error message here rather than
        // 'of type `object`'.
        var preciseType = getPreciseType(propValue);

        return new PropTypeError(
          'Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'),
          {expectedType: expectedType}
        );
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createAnyTypeChecker() {
    return createChainableTypeChecker(emptyFunctionThatReturnsNull);
  }

  function createArrayOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside arrayOf.');
      }
      var propValue = props[propName];
      if (!Array.isArray(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an array.'));
      }
      for (var i = 0; i < propValue.length; i++) {
        var error = typeChecker(propValue, i, componentName, location, propFullName + '[' + i + ']', ReactPropTypesSecret);
        if (error instanceof Error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!isValidElement(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!ReactIs.isValidElementType(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement type.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createInstanceTypeChecker(expectedClass) {
    function validate(props, propName, componentName, location, propFullName) {
      if (!(props[propName] instanceof expectedClass)) {
        var expectedClassName = expectedClass.name || ANONYMOUS;
        var actualClassName = getClassName(props[propName]);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + actualClassName + '` supplied to `' + componentName + '`, expected ') + ('instance of `' + expectedClassName + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createEnumTypeChecker(expectedValues) {
    if (!Array.isArray(expectedValues)) {
      if (true) {
        if (arguments.length > 1) {
          printWarning(
            'Invalid arguments supplied to oneOf, expected an array, got ' + arguments.length + ' arguments. ' +
            'A common mistake is to write oneOf(x, y, z) instead of oneOf([x, y, z]).'
          );
        } else {
          printWarning('Invalid argument supplied to oneOf, expected an array.');
        }
      }
      return emptyFunctionThatReturnsNull;
    }

    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      for (var i = 0; i < expectedValues.length; i++) {
        if (is(propValue, expectedValues[i])) {
          return null;
        }
      }

      var valuesString = JSON.stringify(expectedValues, function replacer(key, value) {
        var type = getPreciseType(value);
        if (type === 'symbol') {
          return String(value);
        }
        return value;
      });
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of value `' + String(propValue) + '` ' + ('supplied to `' + componentName + '`, expected one of ' + valuesString + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createObjectOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside objectOf.');
      }
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an object.'));
      }
      for (var key in propValue) {
        if (has(propValue, key)) {
          var error = typeChecker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
          if (error instanceof Error) {
            return error;
          }
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createUnionTypeChecker(arrayOfTypeCheckers) {
    if (!Array.isArray(arrayOfTypeCheckers)) {
       true ? printWarning('Invalid argument supplied to oneOfType, expected an instance of array.') : 0;
      return emptyFunctionThatReturnsNull;
    }

    for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
      var checker = arrayOfTypeCheckers[i];
      if (typeof checker !== 'function') {
        printWarning(
          'Invalid argument supplied to oneOfType. Expected an array of check functions, but ' +
          'received ' + getPostfixForTypeWarning(checker) + ' at index ' + i + '.'
        );
        return emptyFunctionThatReturnsNull;
      }
    }

    function validate(props, propName, componentName, location, propFullName) {
      var expectedTypes = [];
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        var checkerResult = checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret);
        if (checkerResult == null) {
          return null;
        }
        if (checkerResult.data && has(checkerResult.data, 'expectedType')) {
          expectedTypes.push(checkerResult.data.expectedType);
        }
      }
      var expectedTypesMessage = (expectedTypes.length > 0) ? ', expected one of type [' + expectedTypes.join(', ') + ']': '';
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`' + expectedTypesMessage + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createNodeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      if (!isNode(props[propName])) {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`, expected a ReactNode.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function invalidValidatorError(componentName, location, propFullName, key, type) {
    return new PropTypeError(
      (componentName || 'React class') + ': ' + location + ' type `' + propFullName + '.' + key + '` is invalid; ' +
      'it must be a function, usually from the `prop-types` package, but received `' + type + '`.'
    );
  }

  function createShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      for (var key in shapeTypes) {
        var checker = shapeTypes[key];
        if (typeof checker !== 'function') {
          return invalidValidatorError(componentName, location, propFullName, key, getPreciseType(checker));
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createStrictShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      // We need to check all keys in case some are required but missing from props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (has(shapeTypes, key) && typeof checker !== 'function') {
          return invalidValidatorError(componentName, location, propFullName, key, getPreciseType(checker));
        }
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' + JSON.stringify(Object.keys(shapeTypes), null, '  ')
          );
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }

    return createChainableTypeChecker(validate);
  }

  function isNode(propValue) {
    switch (typeof propValue) {
      case 'number':
      case 'string':
      case 'undefined':
        return true;
      case 'boolean':
        return !propValue;
      case 'object':
        if (Array.isArray(propValue)) {
          return propValue.every(isNode);
        }
        if (propValue === null || isValidElement(propValue)) {
          return true;
        }

        var iteratorFn = getIteratorFn(propValue);
        if (iteratorFn) {
          var iterator = iteratorFn.call(propValue);
          var step;
          if (iteratorFn !== propValue.entries) {
            while (!(step = iterator.next()).done) {
              if (!isNode(step.value)) {
                return false;
              }
            }
          } else {
            // Iterator will provide entry [k,v] tuples rather than values.
            while (!(step = iterator.next()).done) {
              var entry = step.value;
              if (entry) {
                if (!isNode(entry[1])) {
                  return false;
                }
              }
            }
          }
        } else {
          return false;
        }

        return true;
      default:
        return false;
    }
  }

  function isSymbol(propType, propValue) {
    // Native Symbol.
    if (propType === 'symbol') {
      return true;
    }

    // falsy value can't be a Symbol
    if (!propValue) {
      return false;
    }

    // 19.4.3.5 Symbol.prototype[@@toStringTag] === 'Symbol'
    if (propValue['@@toStringTag'] === 'Symbol') {
      return true;
    }

    // Fallback for non-spec compliant Symbols which are polyfilled.
    if (typeof Symbol === 'function' && propValue instanceof Symbol) {
      return true;
    }

    return false;
  }

  // Equivalent of `typeof` but with special handling for array and regexp.
  function getPropType(propValue) {
    var propType = typeof propValue;
    if (Array.isArray(propValue)) {
      return 'array';
    }
    if (propValue instanceof RegExp) {
      // Old webkits (at least until Android 4.0) return 'function' rather than
      // 'object' for typeof a RegExp. We'll normalize this here so that /bla/
      // passes PropTypes.object.
      return 'object';
    }
    if (isSymbol(propType, propValue)) {
      return 'symbol';
    }
    return propType;
  }

  // This handles more types than `getPropType`. Only used for error messages.
  // See `createPrimitiveTypeChecker`.
  function getPreciseType(propValue) {
    if (typeof propValue === 'undefined' || propValue === null) {
      return '' + propValue;
    }
    var propType = getPropType(propValue);
    if (propType === 'object') {
      if (propValue instanceof Date) {
        return 'date';
      } else if (propValue instanceof RegExp) {
        return 'regexp';
      }
    }
    return propType;
  }

  // Returns a string that is postfixed to a warning about an invalid type.
  // For example, "undefined" or "of type array"
  function getPostfixForTypeWarning(value) {
    var type = getPreciseType(value);
    switch (type) {
      case 'array':
      case 'object':
        return 'an ' + type;
      case 'boolean':
      case 'date':
      case 'regexp':
        return 'a ' + type;
      default:
        return type;
    }
  }

  // Returns class name of the object, if any.
  function getClassName(propValue) {
    if (!propValue.constructor || !propValue.constructor.name) {
      return ANONYMOUS;
    }
    return propValue.constructor.name;
  }

  ReactPropTypes.checkPropTypes = checkPropTypes;
  ReactPropTypes.resetWarningCache = checkPropTypes.resetWarningCache;
  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (true) {
  var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/prop-types/node_modules/react-is/index.js");

  // By explicitly using `prop-types` you are opting into new development behavior.
  // http://fb.me/prop-types-in-prod
  var throwOnDirectAccess = true;
  module.exports = __webpack_require__(/*! ./factoryWithTypeCheckers */ "./node_modules/prop-types/factoryWithTypeCheckers.js")(ReactIs.isElement, throwOnDirectAccess);
} else {}


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/***/ ((module) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/prop-types/lib/has.js":
/*!********************************************!*\
  !*** ./node_modules/prop-types/lib/has.js ***!
  \********************************************/
/***/ ((module) => {

module.exports = Function.call.bind(Object.prototype.hasOwnProperty);


/***/ }),

/***/ "./node_modules/prop-types/node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************************************!*\
  !*** ./node_modules/prop-types/node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
/** @license React v16.13.1
 * react-is.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?

var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_BLOCK_TYPE = hasSymbol ? Symbol.for('react.block') : 0xead9;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE || type.$$typeof === REACT_BLOCK_TYPE);
}

function typeOf(object) {
  if (typeof object === 'object' && object !== null) {
    var $$typeof = object.$$typeof;

    switch ($$typeof) {
      case REACT_ELEMENT_TYPE:
        var type = object.type;

        switch (type) {
          case REACT_ASYNC_MODE_TYPE:
          case REACT_CONCURRENT_MODE_TYPE:
          case REACT_FRAGMENT_TYPE:
          case REACT_PROFILER_TYPE:
          case REACT_STRICT_MODE_TYPE:
          case REACT_SUSPENSE_TYPE:
            return type;

          default:
            var $$typeofType = type && type.$$typeof;

            switch ($$typeofType) {
              case REACT_CONTEXT_TYPE:
              case REACT_FORWARD_REF_TYPE:
              case REACT_LAZY_TYPE:
              case REACT_MEMO_TYPE:
              case REACT_PROVIDER_TYPE:
                return $$typeofType;

              default:
                return $$typeof;
            }

        }

      case REACT_PORTAL_TYPE:
        return $$typeof;
    }
  }

  return undefined;
} // AsyncMode is deprecated along with isAsyncMode

var AsyncMode = REACT_ASYNC_MODE_TYPE;
var ConcurrentMode = REACT_CONCURRENT_MODE_TYPE;
var ContextConsumer = REACT_CONTEXT_TYPE;
var ContextProvider = REACT_PROVIDER_TYPE;
var Element = REACT_ELEMENT_TYPE;
var ForwardRef = REACT_FORWARD_REF_TYPE;
var Fragment = REACT_FRAGMENT_TYPE;
var Lazy = REACT_LAZY_TYPE;
var Memo = REACT_MEMO_TYPE;
var Portal = REACT_PORTAL_TYPE;
var Profiler = REACT_PROFILER_TYPE;
var StrictMode = REACT_STRICT_MODE_TYPE;
var Suspense = REACT_SUSPENSE_TYPE;
var hasWarnedAboutDeprecatedIsAsyncMode = false; // AsyncMode should be deprecated

function isAsyncMode(object) {
  {
    if (!hasWarnedAboutDeprecatedIsAsyncMode) {
      hasWarnedAboutDeprecatedIsAsyncMode = true; // Using console['warn'] to evade Babel and ESLint

      console['warn']('The ReactIs.isAsyncMode() alias has been deprecated, ' + 'and will be removed in React 17+. Update your code to use ' + 'ReactIs.isConcurrentMode() instead. It has the exact same API.');
    }
  }

  return isConcurrentMode(object) || typeOf(object) === REACT_ASYNC_MODE_TYPE;
}
function isConcurrentMode(object) {
  return typeOf(object) === REACT_CONCURRENT_MODE_TYPE;
}
function isContextConsumer(object) {
  return typeOf(object) === REACT_CONTEXT_TYPE;
}
function isContextProvider(object) {
  return typeOf(object) === REACT_PROVIDER_TYPE;
}
function isElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}
function isForwardRef(object) {
  return typeOf(object) === REACT_FORWARD_REF_TYPE;
}
function isFragment(object) {
  return typeOf(object) === REACT_FRAGMENT_TYPE;
}
function isLazy(object) {
  return typeOf(object) === REACT_LAZY_TYPE;
}
function isMemo(object) {
  return typeOf(object) === REACT_MEMO_TYPE;
}
function isPortal(object) {
  return typeOf(object) === REACT_PORTAL_TYPE;
}
function isProfiler(object) {
  return typeOf(object) === REACT_PROFILER_TYPE;
}
function isStrictMode(object) {
  return typeOf(object) === REACT_STRICT_MODE_TYPE;
}
function isSuspense(object) {
  return typeOf(object) === REACT_SUSPENSE_TYPE;
}

exports.AsyncMode = AsyncMode;
exports.ConcurrentMode = ConcurrentMode;
exports.ContextConsumer = ContextConsumer;
exports.ContextProvider = ContextProvider;
exports.Element = Element;
exports.ForwardRef = ForwardRef;
exports.Fragment = Fragment;
exports.Lazy = Lazy;
exports.Memo = Memo;
exports.Portal = Portal;
exports.Profiler = Profiler;
exports.StrictMode = StrictMode;
exports.Suspense = Suspense;
exports.isAsyncMode = isAsyncMode;
exports.isConcurrentMode = isConcurrentMode;
exports.isContextConsumer = isContextConsumer;
exports.isContextProvider = isContextProvider;
exports.isElement = isElement;
exports.isForwardRef = isForwardRef;
exports.isFragment = isFragment;
exports.isLazy = isLazy;
exports.isMemo = isMemo;
exports.isPortal = isPortal;
exports.isProfiler = isProfiler;
exports.isStrictMode = isStrictMode;
exports.isSuspense = isSuspense;
exports.isValidElementType = isValidElementType;
exports.typeOf = typeOf;
  })();
}


/***/ }),

/***/ "./node_modules/prop-types/node_modules/react-is/index.js":
/*!****************************************************************!*\
  !*** ./node_modules/prop-types/node_modules/react-is/index.js ***!
  \****************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/prop-types/node_modules/react-is/cjs/react-is.development.js");
}


/***/ }),

/***/ "./node_modules/react-countdown/dist/index.es.js":
/*!*******************************************************!*\
  !*** ./node_modules/react-countdown/dist/index.es.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   calcTimeDelta: () => (/* binding */ calcTimeDelta),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   formatTimeDelta: () => (/* binding */ formatTimeDelta),
/* harmony export */   zeroPad: () => (/* binding */ zeroPad)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);



function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _possibleConstructorReturn(self, call) {
  if (call && (typeof call === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return _arrayLikeToArray(arr);
}

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter);
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

  return arr2;
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

function zeroPad(value) {
  var length = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2;
  var strValue = String(value);
  if (length === 0) return strValue;
  var match = strValue.match(/(.*?)([0-9]+)(.*)/);
  var prefix = match ? match[1] : '';
  var suffix = match ? match[3] : '';
  var strNo = match ? match[2] : strValue;
  var paddedNo = strNo.length >= length ? strNo : (_toConsumableArray(Array(length)).map(function () {
    return '0';
  }).join('') + strNo).slice(length * -1);
  return "".concat(prefix).concat(paddedNo).concat(suffix);
}
var timeDeltaFormatOptionsDefaults = {
  daysInHours: false,
  zeroPadTime: 2
};
function calcTimeDelta(date) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var _options$now = options.now,
      now = _options$now === void 0 ? Date.now : _options$now,
      _options$precision = options.precision,
      precision = _options$precision === void 0 ? 0 : _options$precision,
      controlled = options.controlled,
      _options$offsetTime = options.offsetTime,
      offsetTime = _options$offsetTime === void 0 ? 0 : _options$offsetTime,
      overtime = options.overtime;
  var startTimestamp;

  if (typeof date === 'string') {
    startTimestamp = new Date(date).getTime();
  } else if (date instanceof Date) {
    startTimestamp = date.getTime();
  } else {
    startTimestamp = date;
  }

  if (!controlled) {
    startTimestamp += offsetTime;
  }

  var timeLeft = controlled ? startTimestamp : startTimestamp - now();
  var clampedPrecision = Math.min(20, Math.max(0, precision));
  var total = Math.round(parseFloat(((overtime ? timeLeft : Math.max(0, timeLeft)) / 1000).toFixed(clampedPrecision)) * 1000);
  var seconds = Math.abs(total) / 1000;
  return {
    total: total,
    days: Math.floor(seconds / (3600 * 24)),
    hours: Math.floor(seconds / 3600 % 24),
    minutes: Math.floor(seconds / 60 % 60),
    seconds: Math.floor(seconds % 60),
    milliseconds: Number((seconds % 1 * 1000).toFixed()),
    completed: total <= 0
  };
}
function formatTimeDelta(timeDelta, options) {
  var days = timeDelta.days,
      hours = timeDelta.hours,
      minutes = timeDelta.minutes,
      seconds = timeDelta.seconds;

  var _Object$assign = Object.assign(Object.assign({}, timeDeltaFormatOptionsDefaults), options),
      daysInHours = _Object$assign.daysInHours,
      zeroPadTime = _Object$assign.zeroPadTime,
      _Object$assign$zeroPa = _Object$assign.zeroPadDays,
      zeroPadDays = _Object$assign$zeroPa === void 0 ? zeroPadTime : _Object$assign$zeroPa;

  var zeroPadTimeLength = Math.min(2, zeroPadTime);
  var formattedHours = daysInHours ? zeroPad(hours + days * 24, zeroPadTime) : zeroPad(hours, zeroPadTimeLength);
  return {
    days: daysInHours ? '' : zeroPad(days, zeroPadDays),
    hours: formattedHours,
    minutes: zeroPad(minutes, zeroPadTimeLength),
    seconds: zeroPad(seconds, zeroPadTimeLength)
  };
}

var Countdown = function (_React$Component) {
  _inherits(Countdown, _React$Component);

  var _super = _createSuper(Countdown);

  function Countdown() {
    var _this;

    _classCallCheck(this, Countdown);

    _this = _super.apply(this, arguments);
    _this.state = {
      count: _this.props.count || 3
    };

    _this.startCountdown = function () {
      _this.interval = window.setInterval(function () {
        var count = _this.state.count - 1;

        if (count === 0) {
          _this.stopCountdown();

          _this.props.onComplete && _this.props.onComplete();
        } else {
          _this.setState(function (prevState) {
            return {
              count: prevState.count - 1
            };
          });
        }
      }, 1000);
    };

    _this.stopCountdown = function () {
      clearInterval(_this.interval);
    };

    _this.addTime = function (seconds) {
      _this.stopCountdown();

      _this.setState(function (prevState) {
        return {
          count: prevState.count + seconds
        };
      }, _this.startCountdown);
    };

    return _this;
  }

  _createClass(Countdown, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.startCountdown();
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      clearInterval(this.interval);
    }
  }, {
    key: "render",
    value: function render() {
      return this.props.children ? (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(this.props.children, {
        count: this.state.count
      }) : null;
    }
  }]);

  return Countdown;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);
Countdown.propTypes = {
  count: prop_types__WEBPACK_IMPORTED_MODULE_1__.number,
  children: prop_types__WEBPACK_IMPORTED_MODULE_1__.element,
  onComplete: prop_types__WEBPACK_IMPORTED_MODULE_1__.func
};

var Countdown$1 = function (_React$Component) {
  _inherits(Countdown$1, _React$Component);

  var _super = _createSuper(Countdown$1);

  function Countdown$1(props) {
    var _this;

    _classCallCheck(this, Countdown$1);

    _this = _super.call(this, props);
    _this.mounted = false;
    _this.initialTimestamp = _this.calcOffsetStartTimestamp();
    _this.offsetStartTimestamp = _this.props.autoStart ? 0 : _this.initialTimestamp;
    _this.offsetTime = 0;
    _this.legacyMode = false;
    _this.legacyCountdownRef = null;

    _this.tick = function () {
      var timeDelta = _this.calcTimeDelta();

      var callback = timeDelta.completed && !_this.props.overtime ? undefined : _this.props.onTick;

      _this.setTimeDeltaState(timeDelta, undefined, callback);
    };

    _this.setLegacyCountdownRef = function (ref) {
      _this.legacyCountdownRef = ref;
    };

    _this.start = function () {
      if (_this.isStarted()) return;
      var prevOffsetStartTimestamp = _this.offsetStartTimestamp;
      _this.offsetStartTimestamp = 0;
      _this.offsetTime += prevOffsetStartTimestamp ? _this.calcOffsetStartTimestamp() - prevOffsetStartTimestamp : 0;

      var timeDelta = _this.calcTimeDelta();

      _this.setTimeDeltaState(timeDelta, "STARTED", _this.props.onStart);

      if (!_this.props.controlled && (!timeDelta.completed || _this.props.overtime)) {
        _this.clearTimer();

        _this.interval = window.setInterval(_this.tick, _this.props.intervalDelay);
      }
    };

    _this.pause = function () {
      if (_this.isPaused()) return;

      _this.clearTimer();

      _this.offsetStartTimestamp = _this.calcOffsetStartTimestamp();

      _this.setTimeDeltaState(_this.state.timeDelta, "PAUSED", _this.props.onPause);
    };

    _this.stop = function () {
      if (_this.isStopped()) return;

      _this.clearTimer();

      _this.offsetStartTimestamp = _this.calcOffsetStartTimestamp();
      _this.offsetTime = _this.offsetStartTimestamp - _this.initialTimestamp;

      _this.setTimeDeltaState(_this.calcTimeDelta(), "STOPPED", _this.props.onStop);
    };

    _this.isStarted = function () {
      return _this.isStatus("STARTED");
    };

    _this.isPaused = function () {
      return _this.isStatus("PAUSED");
    };

    _this.isStopped = function () {
      return _this.isStatus("STOPPED");
    };

    _this.isCompleted = function () {
      return _this.isStatus("COMPLETED");
    };

    if (props.date) {
      var timeDelta = _this.calcTimeDelta();

      _this.state = {
        timeDelta: timeDelta,
        status: timeDelta.completed ? "COMPLETED" : "STOPPED"
      };
    } else {
      _this.legacyMode = true;
    }

    return _this;
  }

  _createClass(Countdown$1, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      if (this.legacyMode) {
        return;
      }

      this.mounted = true;
      if (this.props.onMount) this.props.onMount(this.calcTimeDelta());
      if (this.props.autoStart) this.start();
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      if (this.legacyMode) {
        return;
      }

      if (this.props.date !== prevProps.date) {
        this.initialTimestamp = this.calcOffsetStartTimestamp();
        this.offsetStartTimestamp = this.initialTimestamp;
        this.offsetTime = 0;
        this.setTimeDeltaState(this.calcTimeDelta());
      }
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      if (this.legacyMode) {
        return;
      }

      this.mounted = false;
      this.clearTimer();
    }
  }, {
    key: "calcTimeDelta",
    value: function calcTimeDelta$1() {
      var _this$props = this.props,
          date = _this$props.date,
          now = _this$props.now,
          precision = _this$props.precision,
          controlled = _this$props.controlled,
          overtime = _this$props.overtime;
      return calcTimeDelta(date, {
        now: now,
        precision: precision,
        controlled: controlled,
        offsetTime: this.offsetTime,
        overtime: overtime
      });
    }
  }, {
    key: "calcOffsetStartTimestamp",
    value: function calcOffsetStartTimestamp() {
      return Date.now();
    }
  }, {
    key: "addTime",
    value: function addTime(seconds) {
      this.legacyCountdownRef.addTime(seconds);
    }
  }, {
    key: "clearTimer",
    value: function clearTimer() {
      window.clearInterval(this.interval);
    }
  }, {
    key: "isStatus",
    value: function isStatus(status) {
      return this.state.status === status;
    }
  }, {
    key: "setTimeDeltaState",
    value: function setTimeDeltaState(timeDelta, status, callback) {
      var _this2 = this;

      if (!this.mounted) return;
      var completing = timeDelta.completed && !this.state.timeDelta.completed;
      var completedOnStart = timeDelta.completed && status === "STARTED";

      if (completing && !this.props.overtime) {
        this.clearTimer();
      }

      var onDone = function onDone() {
        if (callback) callback(_this2.state.timeDelta);

        if (_this2.props.onComplete && (completing || completedOnStart)) {
          _this2.props.onComplete(timeDelta, completedOnStart);
        }
      };

      return this.setState(function (prevState) {
        var newStatus = status || prevState.status;

        if (timeDelta.completed && !_this2.props.overtime) {
          newStatus = "COMPLETED";
        } else if (!status && newStatus === "COMPLETED") {
          newStatus = "STOPPED";
        }

        return {
          timeDelta: timeDelta,
          status: newStatus
        };
      }, onDone);
    }
  }, {
    key: "getApi",
    value: function getApi() {
      return this.api = this.api || {
        start: this.start,
        pause: this.pause,
        stop: this.stop,
        isStarted: this.isStarted,
        isPaused: this.isPaused,
        isStopped: this.isStopped,
        isCompleted: this.isCompleted
      };
    }
  }, {
    key: "getRenderProps",
    value: function getRenderProps() {
      var _this$props2 = this.props,
          daysInHours = _this$props2.daysInHours,
          zeroPadTime = _this$props2.zeroPadTime,
          zeroPadDays = _this$props2.zeroPadDays;
      var timeDelta = this.state.timeDelta;
      return Object.assign(Object.assign({}, timeDelta), {
        api: this.getApi(),
        props: this.props,
        formatted: formatTimeDelta(timeDelta, {
          daysInHours: daysInHours,
          zeroPadTime: zeroPadTime,
          zeroPadDays: zeroPadDays
        })
      });
    }
  }, {
    key: "render",
    value: function render() {
      if (this.legacyMode) {
        var _this$props3 = this.props,
            count = _this$props3.count,
            _children = _this$props3.children,
            onComplete = _this$props3.onComplete;
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Countdown, {
          ref: this.setLegacyCountdownRef,
          count: count,
          onComplete: onComplete
        }, _children);
      }

      var _this$props4 = this.props,
          className = _this$props4.className,
          overtime = _this$props4.overtime,
          children = _this$props4.children,
          renderer = _this$props4.renderer;
      var renderProps = this.getRenderProps();

      if (renderer) {
        return renderer(renderProps);
      }

      if (children && this.state.timeDelta.completed && !overtime) {
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(children, {
          countdown: renderProps
        });
      }

      var _renderProps$formatte = renderProps.formatted,
          days = _renderProps$formatte.days,
          hours = _renderProps$formatte.hours,
          minutes = _renderProps$formatte.minutes,
          seconds = _renderProps$formatte.seconds;
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: className
      }, renderProps.total < 0 ? '-' : '', days, days ? ':' : '', hours, ":", minutes, ":", seconds);
    }
  }]);

  return Countdown$1;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);
Countdown$1.defaultProps = Object.assign(Object.assign({}, timeDeltaFormatOptionsDefaults), {
  controlled: false,
  intervalDelay: 1000,
  precision: 0,
  autoStart: true
});
Countdown$1.propTypes = {
  date: (0,prop_types__WEBPACK_IMPORTED_MODULE_1__.oneOfType)([(0,prop_types__WEBPACK_IMPORTED_MODULE_1__.instanceOf)(Date), prop_types__WEBPACK_IMPORTED_MODULE_1__.string, prop_types__WEBPACK_IMPORTED_MODULE_1__.number]),
  daysInHours: prop_types__WEBPACK_IMPORTED_MODULE_1__.bool,
  zeroPadTime: prop_types__WEBPACK_IMPORTED_MODULE_1__.number,
  zeroPadDays: prop_types__WEBPACK_IMPORTED_MODULE_1__.number,
  controlled: prop_types__WEBPACK_IMPORTED_MODULE_1__.bool,
  intervalDelay: prop_types__WEBPACK_IMPORTED_MODULE_1__.number,
  precision: prop_types__WEBPACK_IMPORTED_MODULE_1__.number,
  autoStart: prop_types__WEBPACK_IMPORTED_MODULE_1__.bool,
  overtime: prop_types__WEBPACK_IMPORTED_MODULE_1__.bool,
  className: prop_types__WEBPACK_IMPORTED_MODULE_1__.string,
  children: prop_types__WEBPACK_IMPORTED_MODULE_1__.element,
  renderer: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  now: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onMount: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onStart: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onPause: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onStop: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onTick: prop_types__WEBPACK_IMPORTED_MODULE_1__.func,
  onComplete: prop_types__WEBPACK_IMPORTED_MODULE_1__.func
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Countdown$1);



/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/***/ ((module) => {

"use strict";
module.exports = window["ReactDOM"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/date":
/*!******************************!*\
  !*** external ["wp","date"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["date"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"the-countdown/countdown","version":"0.1.0","title":"The Countdown","category":"widgets","icon":"clock","description":"A block to show countdown timer.","supports":{"html":false,"align":true},"textdomain":"the-countdown","editorScript":"file:./index.js","editorStyle":["file:./index.css","file:./style-index.css"],"viewScript":["wp-element","wp-api-fetch","file:./countdown.js"],"style":"file:./style-index.css"}');

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
/******/ 			"index": 0,
/******/ 			"./style-index": 0
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
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkthe_countdown"] = globalThis["webpackChunkthe_countdown"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map