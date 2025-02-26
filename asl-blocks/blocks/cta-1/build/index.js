/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/deprecated.js":
/*!***************************!*\
  !*** ./src/deprecated.js ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);



const v1 = {
  attributes: {
    body: {
      type: 'array',
      source: 'children',
      selector: '.asl-cta-2-text'
    },
    backgroundColor: {
      type: 'string',
      default: '#f4f4f4'
    },
    btnText: {
      type: 'string',
      default: '',
      source: 'html',
      selector: '.asl-btn-cta-2'
    },
    btnStyle: {
      type: 'string',
      default: 'outline'
    },
    btnBackground: {
      type: 'string',
      default: ''
    },
    btnColor: {
      type: 'string',
      default: ''
    },
    btnBorderRadius: {
      type: 'number',
      default: 1
    },
    btnBorderWidth: {
      type: 'number',
      default: 2
    },
    btnBorderColor: {
      type: 'string',
      default: ''
    },
    btnHoverBackground: {
      type: 'string'
    },
    btnHoverColor: {
      type: 'string'
    },
    btnLink: {
      type: 'string',
      source: 'attribute',
      selector: '.asl-btn-cta-2',
      attribute: 'href'
    },
    rel: {
      type: 'string',
      source: 'attribute',
      selector: 'a',
      attribute: 'rel',
      default: 'sponsored nofollow'
    },
    target: {
      type: 'boolean',
      default: false
    }
  },

  save(_ref) {
    let {
      attributes
    } = _ref;
    const {
      title,
      body,
      alignment,
      borderColor,
      borderWidth,
      borderRadius,
      btnText1,
      btnText2,
      btnStyleFirst,
      btnStyleSecond,
      btnBackgroundFirst,
      btnBackgroundSecond,
      borderRadiusFirst,
      borderRadiusSecond,
      borderWidthFirst,
      borderWidthSecond,
      btnBorderColorFirst,
      btnBorderColorSecond,
      btnLinkFirst,
      btnLinkSecond,
      btnColorFirst,
      btnColorSecond,
      rel,
      target
    } = attributes;
    const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps.save({
      className: 'asl-cta-1'
    });
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, blockProps, {
      style: {
        borderColor,
        borderWidth,
        borderRadius
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("h3", {
      style: {
        textAlign: alignment
      }
    }, title), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
      className: "asl-cta-1-buttons"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "a",
      value: btnText1,
      style: btnStyleFirst === 'fill' ? {
        color: btnColorFirst,
        backgroundColor: btnBackgroundFirst,
        borderRadius: borderRadiusFirst
      } : {
        borderWidth: borderWidthFirst,
        borderColor: btnBorderColorFirst,
        borderStyle: 'solid',
        color: btnColorFirst,
        borderRadius: borderRadiusFirst
      },
      target: target === true ? '_blank' : '_self',
      href: btnLinkFirst,
      rel: rel,
      className: btnStyleFirst === 'fill' ? 'asl-btn-cta-1 asl-btn-first asl-fill' : 'asl-btn-cta-1 asl-btn-first asl-outline'
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "a",
      value: btnText2,
      style: btnStyleSecond === 'fill' ? {
        color: btnColorSecond,
        backgroundColor: btnBackgroundSecond,
        borderRadius: borderRadiusSecond
      } : {
        borderWidth: borderWidthSecond,
        borderColor: btnBorderColorSecond,
        borderStyle: 'solid',
        color: btnColorSecond,
        borderRadius: borderRadiusSecond
      },
      target: target === true ? '_blank' : '_self',
      href: btnLinkSecond,
      rel: rel,
      className: btnStyleSecond === 'fill' ? 'asl-btn-cta-1 asl-btn-second asl-fill' : 'asl-btn-cta-1 asl-btn-second asl-outline'
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "div",
      className: "asl-cta-1-content",
      value: body
    }));
  }

};
const deprecated = [v1];
/* harmony default export */ __webpack_exports__["default"] = (deprecated);

/***/ }),

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Edit; }
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");
/* harmony import */ var _utils_colors__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../utils/colors */ "../utils/colors.js");









const ALLOWED_BLOCKS = ['core/image'];
function Edit(_ref) {
  let {
    attributes,
    setAttributes
  } = _ref;
  const {
    alignment,
    title,
    body,
    btnText1,
    btnText2,
    target,
    borderColor,
    borderWidth,
    borderRadius,
    btnStyleFirst,
    btnStyleSecond,
    btnBackgroundFirst,
    btnBackgroundSecond,
    borderRadiusFirst,
    borderRadiusSecond,
    borderWidthFirst,
    borderWidthSecond,
    btnBorderColorFirst,
    btnBorderColorSecond,
    btnLinkFirst,
    btnLinkSecond,
    btnColorFirst,
    btnColorSecond,
    rel,
    btnHoverBackgroundFirst,
    btnHoverBackgroundSecond,
    btnHoverColorFirst,
    btnHoverColorSecond
  } = attributes;
  const [btn, setBtn] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)('first');
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps)({
    className: 'asl-cta-1'
  });
  const hoverClassFirst = (btnHoverBackgroundFirst ? btnHoverBackgroundFirst.replace('#', '') + '-' : '') + (btnHoverColorFirst ? btnHoverColorFirst.replace('#', '') : '');
  const hoverClassSecond = (btnHoverBackgroundSecond ? btnHoverBackgroundSecond.replace('#', '') + '-' : '') + (btnHoverColorSecond ? btnHoverColorSecond.replace('#', '') : '');
  const btnClassStyleFirst = btnStyleFirst === 'fill' ? 'asl-fill' : 'asl-outline';
  const btnClassStyleSecond = btnStyleSecond === 'fill' ? 'asl-fill' : 'asl-outline';
  const hoverStylesFirst = (btnHoverBackgroundFirst ? `background-color: #${btnHoverBackgroundFirst.replace('#', '')}!important;` : '') + (btnHoverColorFirst ? `color: #${btnHoverColorFirst.replace('#', '')}!important;` : '');
  const hoverStylesSecond = (btnHoverBackgroundSecond ? `background-color: #${btnHoverBackgroundSecond.replace('#', '')}!important;` : '') + (btnHoverColorSecond ? `color: #${btnHoverColorSecond.replace('#', '')}!important;` : '');

  const onSelectFirst = tabName => {
    let content;

    if (tabName.name === 'current') {
      if (btnStyleFirst === 'fill') {
        content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnBackgroundFirst,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnBackgroundFirst: color
          })
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnColorFirst,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnColorFirst: color
          })
        }));
      } else {
        content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border width:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
          value: borderWidthFirst,
          onChange: width => setAttributes({
            borderWidthFirst: width
          }),
          min: 0,
          max: 10,
          step: 1
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnBorderColorFirst,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnBorderColorFirst: color
          })
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnColorFirst,
          onChange: val => setAttributes({
            btnColorFirst: val
          })
        }));
      }
    } else {
      content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
        size: 14,
        weight: 400,
        display: 'block',
        style: {
          marginBottom: 10
        }
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background hover color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
        value: btnHoverBackgroundFirst,
        onChange: color => setAttributes({
          btnHoverBackgroundFirst: color
        })
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
        size: 14,
        weight: 400,
        display: 'block',
        style: {
          marginBottom: 10
        }
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text hover color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
        value: btnHoverColorFirst,
        onChange: color => setAttributes({
          btnHoverColorFirst: color
        })
      }));
    }

    return content;
  };

  const onSelectSecond = tabName => {
    let content;

    if (tabName.name === 'current') {
      if (btnStyleSecond === 'fill') {
        content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnBackgroundSecond,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnBackgroundSecond: color
          })
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnColorSecond,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnColorSecond: color
          })
        }));
      } else {
        content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border width:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
          value: borderWidthSecond,
          onChange: width => setAttributes({
            borderWidthSecond: width
          }),
          min: 0,
          max: 10,
          step: 1
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnBorderColorSecond,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: color => setAttributes({
            btnBorderColorSecond: color
          })
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
          size: 14,
          weight: 400,
          display: 'block',
          style: {
            marginBottom: 10
          }
        }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
          value: btnColorSecond,
          colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
          onChange: val => setAttributes({
            btnColorSecond: val
          })
        }));
      }
    } else {
      content = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
        size: 14,
        weight: 400,
        display: 'block',
        style: {
          marginBottom: 10
        }
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background hover color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
        value: btnHoverBackgroundSecond,
        colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
        onChange: color => setAttributes({
          btnHoverBackgroundSecond: color
        })
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
        size: 14,
        weight: 400,
        display: 'block',
        style: {
          marginBottom: 10
        }
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text hover color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
        value: btnHoverColorSecond,
        colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
        onChange: color => setAttributes({
          btnHoverColorSecond: color
        })
      }));
    }

    return content;
  };

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, {
    style: {
      marginBottom: '40px'
    }
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border template settings', 'asl-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select a border color:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.ColorPalette, {
    value: borderColor,
    colors: _utils_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
    onChange: color => setAttributes({
      borderColor: color
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select a border width:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    value: borderWidth,
    onChange: width => setAttributes({
      borderWidth: width
    }),
    min: 0,
    max: 15,
    step: 1
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select a border radius:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    value: borderRadius,
    onChange: radius => setAttributes({
      borderRadius: radius
    }),
    min: 0,
    max: 50,
    step: 1
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Global links settings', 'asl-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Open in new window:', 'asl-blocks'),
    checked: target,
    onChange: state => {
      setAttributes({
        target: state
      });
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Add a rel attributes:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
    value: rel,
    onChange: newRel => setAttributes({
      rel: newRel
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Buttons settings', 'asl-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select button:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalRadioGroup, {
    onChange: setBtn,
    checked: btn,
    className: "range-flex"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalRadio, {
    value: "first",
    className: "range-flex"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('First Button')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalRadio, {
    value: "second",
    className: "range-flex"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Second Button'))), btn === 'first' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 15,
    weight: 500,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('First button settings:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalDivider, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Add link:', 'asl-blocks'),
    value: btnLinkFirst,
    onChange: link => setAttributes({
      btnLinkFirst: link
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border radius:', 'asl-blocks'),
    value: borderRadiusFirst,
    onChange: radius => setAttributes({
      borderRadiusFirst: radius
    }),
    min: 0,
    max: 50,
    step: 1
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Button style:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    value: btnStyleFirst,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Fill', 'asl-blocks'),
      value: 'fill'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Outline', 'asl-blocks'),
      value: 'outline'
    }],
    onChange: option => setAttributes({
      btnStyleFirst: option
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalDivider, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 15,
    weight: 500,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Color settings:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TabPanel, {
    activeClass: "is-active",
    tabs: [{
      name: 'current',
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Current', 'asl-blocks'),
      className: 'tab-one'
    }, {
      name: 'hover',
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Hover', 'asl-blocks'),
      className: 'tab-two'
    }]
  }, tab => onSelectFirst(tab))), btn === 'second' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 15,
    weight: 500,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Second button settings:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalDivider, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Add link:', 'asl-blocks'),
    value: btnLinkSecond,
    onChange: link => setAttributes({
      btnLinkSecond: link
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border radius:', 'asl-blocks'),
    value: borderRadiusSecond,
    onChange: radius => setAttributes({
      borderRadiusSecond: radius
    }),
    min: 0,
    max: 50,
    step: 1
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 14,
    weight: 400,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Button style:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    value: btnStyleSecond,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Fill', 'asl-blocks'),
      value: 'fill'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Outline', 'asl-blocks'),
      value: 'outline'
    }],
    onChange: option => setAttributes({
      btnStyleSecond: option
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalDivider, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalText, {
    size: 15,
    weight: 500,
    display: 'block',
    style: {
      marginBottom: 10
    }
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Color settings:', 'asl-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TabPanel, {
    activeClass: "is-active",
    tabs: [{
      name: 'current',
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Current', 'asl-blocks'),
      className: 'tab-one'
    }, {
      name: 'hover',
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Hover', 'asl-blocks'),
      className: 'tab-two'
    }]
  }, tab => onSelectSecond(tab))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, blockProps, {
    style: {
      borderColor,
      borderWidth,
      borderRadius
    }
  }), (hoverClassFirst || hoverClassSecond) && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: `.asl-cta-1-buttons  .hover-${hoverClassFirst}:hover{${hoverStylesFirst}}.asl-cta-1-buttons .hover-${hoverClassSecond}:hover{${hoverStylesSecond}}`
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.AlignmentToolbar, {
    value: alignment,
    onChange: val => setAttributes({
      alignment: val === undefined ? 'none' : val
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InnerBlocks, {
    allowedBlocks: ALLOWED_BLOCKS
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.RichText, {
    tagName: "h3",
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Your CTA Title', 'asl-blocks'),
    value: title,
    allowedFormats: ['core/italic'],
    onChange: newTitle => setAttributes({
      title: newTitle
    }),
    style: {
      textAlign: alignment
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
    className: "asl-cta-1-buttons"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.RichText, {
    tagName: "a",
    value: btnText1,
    allowedFormats: ['core/italic'],
    style: btnStyleFirst === 'fill' ? {
      color: btnColorFirst,
      backgroundColor: btnBackgroundFirst,
      borderRadius: borderRadiusFirst
    } : {
      borderWidth: borderWidthFirst,
      borderColor: btnBorderColorFirst,
      borderStyle: 'solid',
      color: btnColorFirst,
      borderRadius: borderRadiusFirst
    },
    target: target === true ? '_blank' : '_self',
    href: btnLinkFirst,
    rel: rel,
    onChange: text => setAttributes({
      btnText1: text
    }),
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Type text here', 'asl-blocks'),
    className: classnames__WEBPACK_IMPORTED_MODULE_3___default()('asl-btn-cta-1 asl-btn-first', `hover-${hoverClassFirst}`, {
      'has-background': btnBackgroundFirst,
      'has-text-color': btnColorFirst,
      [btnClassStyleFirst]: btnClassStyleFirst
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.RichText, {
    tagName: "a",
    value: btnText2,
    allowedFormats: ['core/italic'],
    style: btnStyleSecond === 'fill' ? {
      color: btnColorSecond,
      backgroundColor: btnBackgroundSecond,
      borderRadius: borderRadiusSecond
    } : {
      borderWidth: borderWidthSecond,
      borderColor: btnBorderColorSecond,
      borderStyle: 'solid',
      color: btnColorSecond,
      borderRadius: borderRadiusSecond
    },
    target: target === true ? '_blank' : '_self',
    href: btnLinkSecond,
    rel: rel,
    onChange: text => setAttributes({
      btnText2: text
    }),
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Type text here', 'asl-blocks'),
    className: classnames__WEBPACK_IMPORTED_MODULE_3___default()('asl-btn-cta-1 asl-btn-second', `hover-${hoverClassSecond}`, {
      'has-background': btnBackgroundSecond,
      'has-text-color': btnColorSecond,
      [btnClassStyleSecond]: btnClassStyleSecond
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.RichText, {
    tagName: "div",
    className: "asl-cta-1-content",
    allowedFormats: ['core/italic'],
    multiline: "p",
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Your CTA Description', 'asl-blocks'),
    value: body,
    onChange: newBody => setAttributes({
      body: newBody
    })
  })));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../utils/icons */ "../utils/icons.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./save */ "./src/save.js");
/* harmony import */ var _deprecated__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./deprecated */ "./src/deprecated.js");







(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('asl/cta-1', {
  icon: _utils_icons__WEBPACK_IMPORTED_MODULE_0__.cta1,
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('The Call To Action block helps you to create attractive call-to-action with a trendy title, description and a catchy button that boosts conversions on your website.'),
  example: {
    attributes: {
      title: 'Title Block',
      alignment: 'center',
      image: 'https://via.placeholder.com/640x140',
      borderColor: '#332e54',
      borderWidth: '2',
      borderRadius: '5',
      btnText1: 'Button 1',
      btnText2: 'Button 2'
    },
    innerBlocks: [{
      name: 'core/image',
      attributes: {
        src: 'https://s.w.org/images/core/5.3/Biologia_Centrali-Americana_-_Cantorchilus_semibadius_1902.jpg'
      }
    }]
  },
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h3'
    },
    body: {
      type: 'array',
      source: 'children',
      selector: '.asl-cta-1-content'
    },
    alignment: {
      type: 'string',
      default: 'none'
    },
    image: {
      type: 'string',
      default: 'https://via.placeholder.com/640x140'
    },
    borderColor: {
      type: 'string',
      default: '#332e54'
    },
    borderWidth: {
      type: 'number',
      default: 6
    },
    borderRadius: {
      type: 'number',
      default: 5
    },
    btnText1: {
      type: 'string',
      default: '',
      source: 'html',
      selector: '.asl-btn-first'
    },
    btnText2: {
      type: 'string',
      default: '',
      source: 'html',
      selector: '.asl-btn-second'
    },
    btnStyleFirst: {
      type: 'string',
      default: 'outline'
    },
    btnStyleSecond: {
      type: 'string',
      default: 'fill'
    },
    btnBackgroundFirst: {
      type: 'string',
      default: ''
    },
    btnBackgroundSecond: {
      type: 'string',
      default: ''
    },
    btnHoverBackgroundFirst: {
      type: 'string'
    },
    btnHoverBackgroundSecond: {
      type: 'string'
    },
    btnColorFirst: {
      type: 'string',
      default: ''
    },
    btnColorSecond: {
      type: 'string',
      default: ''
    },
    btnHoverColorFirst: {
      type: 'string'
    },
    btnHoverColorSecond: {
      type: 'string'
    },
    borderRadiusFirst: {
      type: 'number',
      default: 1
    },
    borderRadiusSecond: {
      type: 'number',
      default: 0
    },
    borderWidthFirst: {
      type: 'number',
      default: 2
    },
    borderWidthSecond: {
      type: 'number',
      default: 2
    },
    btnBorderColorFirst: {
      type: 'string',
      default: ''
    },
    btnBorderColorSecond: {
      type: 'string',
      default: ''
    },
    btnLinkFirst: {
      type: 'string',
      source: 'attribute',
      selector: '.asl-btn-first',
      attribute: 'href'
    },
    btnLinkSecond: {
      type: 'string',
      source: 'attribute',
      selector: '.asl-btn-second',
      attribute: 'href'
    },
    rel: {
      type: 'string',
      source: 'attribute',
      selector: 'a',
      attribute: 'rel',
      default: 'sponsored nofollow'
    },
    target: {
      type: 'boolean',
      default: true
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_4__["default"],
  save: _save__WEBPACK_IMPORTED_MODULE_5__["default"],
  deprecated: _deprecated__WEBPACK_IMPORTED_MODULE_6__["default"]
});

/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ save; }
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_3__);




function save(_ref) {
  let {
    attributes
  } = _ref;
  const {
    title,
    body,
    alignment,
    borderColor,
    borderWidth,
    borderRadius,
    btnText1,
    btnText2,
    btnStyleFirst,
    btnStyleSecond,
    btnBackgroundFirst,
    btnBackgroundSecond,
    borderRadiusFirst,
    borderRadiusSecond,
    borderWidthFirst,
    borderWidthSecond,
    btnBorderColorFirst,
    btnBorderColorSecond,
    btnLinkFirst,
    btnLinkSecond,
    btnColorFirst,
    btnColorSecond,
    rel,
    target,
    btnHoverBackgroundFirst,
    btnHoverBackgroundSecond,
    btnHoverColorFirst,
    btnHoverColorSecond
  } = attributes;
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps.save({
    className: 'asl-cta-1'
  });
  const hoverClassFirst = (btnHoverBackgroundFirst ? btnHoverBackgroundFirst.replace('#', '') + '-' : '') + (btnHoverColorFirst ? btnHoverColorFirst.replace('#', '') : '');
  const hoverClassSecond = (btnHoverBackgroundSecond ? btnHoverBackgroundSecond.replace('#', '') + '-' : '') + (btnHoverColorSecond ? btnHoverColorSecond.replace('#', '') : '');
  const btnClassStyleFirst = btnStyleFirst === 'fill' ? 'asl-fill' : 'asl-outline';
  const btnClassStyleSecond = btnStyleSecond === 'fill' ? 'asl-fill' : 'asl-outline';
  const hoverStylesFirst = (btnHoverBackgroundFirst ? `background-color: #${btnHoverBackgroundFirst.replace('#', '')}!important;` : '') + (btnHoverColorFirst ? `color: #${btnHoverColorFirst.replace('#', '')}!important;` : '');
  const hoverStylesSecond = (btnHoverBackgroundSecond ? `background-color: #${btnHoverBackgroundSecond.replace('#', '')}!important;` : '') + (btnHoverColorSecond ? `color: #${btnHoverColorSecond.replace('#', '')}!important;` : '');
  const buttonClassesFirst = classnames__WEBPACK_IMPORTED_MODULE_3___default()('asl-btn-cta-1 asl-btn-first', `hover-${hoverClassFirst}`, {
    'has-background': btnBackgroundFirst,
    'has-text-color': btnColorFirst,
    [btnClassStyleFirst]: btnClassStyleFirst
  });
  const buttonClassesSecond = classnames__WEBPACK_IMPORTED_MODULE_3___default()('asl-btn-cta-1 asl-btn-second', `hover-${hoverClassSecond}`, {
    'has-background': btnBackgroundSecond,
    'has-text-color': btnColorSecond,
    [btnClassStyleSecond]: btnClassStyleSecond
  });
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, blockProps, {
    style: {
      borderColor,
      borderWidth,
      borderRadius
    }
  }), (hoverClassFirst || hoverClassSecond) && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: `.asl-cta-1-buttons  .hover-${hoverClassFirst}:hover{${hoverStylesFirst}}.asl-cta-1-buttons .hover-${hoverClassSecond}:hover{${hoverStylesSecond}}`
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("h3", {
    style: {
      textAlign: alignment
    }
  }, title), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
    className: "asl-cta-1-buttons"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
    tagName: "a",
    value: btnText1,
    style: btnStyleFirst === 'fill' ? {
      color: btnColorFirst,
      backgroundColor: btnBackgroundFirst,
      borderRadius: borderRadiusFirst
    } : {
      borderWidth: borderWidthFirst,
      borderColor: btnBorderColorFirst,
      borderStyle: 'solid',
      color: btnColorFirst,
      borderRadius: borderRadiusFirst
    },
    target: target === true ? '_blank' : '_self',
    href: btnLinkFirst,
    rel: rel,
    className: buttonClassesFirst
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
    tagName: "a",
    value: btnText2,
    style: btnStyleSecond === 'fill' ? {
      color: btnColorSecond,
      backgroundColor: btnBackgroundSecond,
      borderRadius: borderRadiusSecond
    } : {
      borderWidth: borderWidthSecond,
      borderColor: btnBorderColorSecond,
      borderStyle: 'solid',
      color: btnColorSecond,
      borderRadius: borderRadiusSecond
    },
    target: target === true ? '_blank' : '_self',
    href: btnLinkSecond,
    rel: rel,
    className: buttonClassesSecond
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
    tagName: "div",
    className: "asl-cta-1-content",
    value: body
  }));
}

/***/ }),

/***/ "../utils/colors.js":
/*!**************************!*\
  !*** ../utils/colors.js ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "colors": function() { return /* binding */ colors; }
/* harmony export */ });
const colors = [{
  name: 'purple',
  color: '#332e54'
}, {
  name: 'orange',
  color: '#f7882f'
}, {
  name: 'black',
  color: '#000000'
}, {
  name: 'gray',
  color: '#f4f4f4'
}, {
  name: 'red',
  color: '#ef3737'
}, {
  name: 'red-light',
  color: '#fa5d49'
}, {
  name: 'red-dark',
  color: '#aa0511'
}];

/***/ }),

/***/ "../utils/icons.js":
/*!*************************!*\
  !*** ../utils/icons.js ***!
  \*************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "button": function() { return /* binding */ button; },
/* harmony export */   "table": function() { return /* binding */ table; },
/* harmony export */   "productTable": function() { return /* binding */ productTable; },
/* harmony export */   "product": function() { return /* binding */ product; },
/* harmony export */   "cta1": function() { return /* binding */ cta1; },
/* harmony export */   "cta2": function() { return /* binding */ cta2; },
/* harmony export */   "tableRow": function() { return /* binding */ tableRow; },
/* harmony export */   "buttons": function() { return /* binding */ buttons; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const button = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "86",
  height: "86",
  viewBox: "0 0 86 86",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M73.1 21.5H12.9C8.17005 21.5 4.30005 25.37 4.30005 30.1V55.9C4.30005 60.63 8.17005 64.5 12.9 64.5H73.1C77.83 64.5 81.7 60.63 81.7 55.9V30.1C81.7 25.37 77.83 21.5 73.1 21.5ZM77.4 51.6C77.4 54.18 75.68 55.9 73.1 55.9H12.9C10.32 55.9 8.60005 54.18 8.60005 51.6V30.1C8.60005 27.52 10.32 25.8 12.9 25.8H73.1C75.68 25.8 77.4 27.52 77.4 30.1V51.6Z",
  fill: "url(#paint0_linear_2_4573)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4573",
  x1: "-23.2914",
  y1: "30.4583",
  x2: "98.5419",
  y2: "50.1667",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#18D2EB"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#9D33DE"
}))));
const table = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "80",
  height: "80",
  viewBox: "0 0 80 80",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
  clipPath: "url(#clip0_2_4262)"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M26.624 25.856H38.144V37.376H43.776V25.856H55.296V20.48H43.776V8.96H38.144V20.48H26.624V25.856ZM0 71.68V0H81.92V71.68H0ZM30.72 61.44H51.2V46.08H30.72V61.44ZM5.12 61.44H25.6V46.08H5.12V61.44V61.44ZM76.8 5.12H5.12V41.216H76.8V5.12ZM76.8 46.08H56.32V61.44H76.8V46.08Z",
  fill: "url(#paint0_linear_2_4262)"
})), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4262",
  x1: "-31.6667",
  y1: "-5",
  x2: "108.333",
  y2: "35",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#18D2EB"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#9D33DE"
})), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("clipPath", {
  id: "clip0_2_4262"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
  width: "80",
  height: "80",
  fill: "white"
}))));
const productTable = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "86",
  height: "86",
  viewBox: "0 0 86 86",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M77.4 73.1V12.9H8.59998V73.1H77.4ZM68.8 30.1H17.2V21.5H68.8V30.1ZM38.7 47.3H17.2V38.7H38.7V47.3ZM68.8 47.3H47.3V38.7H68.8V47.3ZM38.7 64.5H17.2V55.9H38.7V64.5ZM68.8 64.5H47.3V55.9H68.8V64.5Z",
  fill: "url(#paint0_linear_2_4454)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4454",
  x1: "120.042",
  y1: "-10.7499",
  x2: "-30.4584",
  y2: "87.7918",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));
const product = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "86",
  height: "86",
  viewBox: "0 0 86 86",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M81.7 68.8V12.9C81.7 10.535 79.765 8.59998 77.4 8.59998H12.9C10.535 8.59998 8.59998 10.535 8.59998 12.9V68.8C8.59998 71.165 10.535 73.1 12.9 73.1H77.4C79.765 73.1 81.7 71.165 81.7 68.8ZM17.2 17.2H73.1V34.4H17.2V17.2ZM21.5 21.5V30.1H34.4V21.5H21.5ZM38.7 21.5V30.1H51.6V21.5H38.7ZM55.9 21.5V30.1H68.8V21.5H55.9ZM19.35 43C20.554 43 21.5 43.946 21.5 45.15C21.5 46.354 20.554 47.3 19.35 47.3C18.146 47.3 17.2 46.354 17.2 45.15C17.2 43.946 18.146 43 19.35 43ZM25.8 43H43V47.3H25.8V43ZM51.6 43H73.1V64.5H51.6V43ZM19.35 51.6C20.554 51.6 21.5 52.546 21.5 53.75C21.5 54.954 20.554 55.9 19.35 55.9C18.146 55.9 17.2 54.954 17.2 53.75C17.2 52.546 18.146 51.6 19.35 51.6ZM25.8 51.6H43V55.9H25.8V51.6ZM55.9 51.6V60.2H68.8V51.6H55.9ZM19.35 60.2C20.554 60.2 21.5 61.146 21.5 62.35C21.5 63.554 20.554 64.5 19.35 64.5C18.146 64.5 17.2 63.554 17.2 62.35C17.2 61.146 18.146 60.2 19.35 60.2ZM25.8 60.2H43V64.5H25.8V60.2Z",
  fill: "url(#paint0_linear_2_4243)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4243",
  x1: "109.292",
  y1: "-7.16678",
  x2: "-53.7501",
  y2: "129",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));
const cta1 = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "80",
  height: "80",
  viewBox: "0 0 80 80",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M68 16H12C7.6 16 4 19.6 4 24V56C4 60.4 7.6 64 12 64H68C72.4 64 76 60.4 76 56V24C76 19.6 72.4 16 68 16ZM40 48H12V24H40V48ZM56 42L50 48L56 54V60L44 48L56 36V42ZM60 60V54L66 48L60 42V36L72 48L60 60ZM36 44V34L28.8 40L24 36.8L16 44H36ZM18.4 34.4C20.8 34.4 22.4 32.8 22.4 30.4C22.4 28 20.8 26.4 18.4 26.4C16 26.4 14.4 28 14.4 30.4C14.4 32.8 16 34.4 18.4 34.4Z",
  fill: "url(#paint0_linear_2_4474)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4474",
  x1: "96.6666",
  y1: "3.41172e-05",
  x2: "-36.6667",
  y2: "96.6667",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));
const cta2 = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "80",
  height: "80",
  viewBox: "0 0 80 80",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M68 16H12C7.6 16 4 19.6 4 24V56C4 60.4 7.6 64 12 64H68C72.4 64 76 60.4 76 56V24C76 19.6 72.4 16 68 16ZM34.4 36L32.8 37.2C31.2 38.8 30.8 41.6 32 43.6L28.8 46.8L24.4 42.4L19.2 47.6C18.4 48.4 12.8 52.8 12 52C11.2 51.2 15.6 45.6 16.4 44.8L21.6 39.6L17.2 35.2L20.4 32C22.4 33.2 25.2 33.2 26.8 31.2L28 30C30 28 30 25.2 28.8 23.2L32 20L44 31.6L40.8 34.8C38.8 34 36 34 34.4 36V36ZM56 42L50 48L56 54V60L44 48L56 36V42ZM60 60V54L66 48L60 42V36L72 48L60 60Z",
  fill: "url(#paint0_linear_2_4471)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4471",
  x1: "88.3333",
  y1: "10",
  x2: "-35",
  y2: "83.3334",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));
const tableRow = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "84",
  height: "84",
  viewBox: "0 0 84 84",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M79.8 8.40002V33.6H4.20001V8.40002H79.8ZM75.6 29.4V12.6H8.40001V29.4H75.6ZM21 16.8V25.2H12.6V16.8H21ZM33.6 16.8V25.2H25.2V16.8H33.6ZM46.2 16.8V25.2H37.8V16.8H46.2ZM58.8 16.8V25.2H50.4V16.8H58.8ZM71.4 16.8V25.2H63V16.8H71.4ZM79.8 37.8V75.6H4.20001V37.8H79.8ZM75.6 71.4V42H8.40001V71.4H75.6ZM21 46.2V54.6H12.6V46.2H21ZM33.6 46.2V54.6H25.2V46.2H33.6ZM46.2 46.2V54.6H37.8V46.2H46.2ZM71.4 46.2V54.6H50.4V46.2H71.4ZM46.2 58.8V67.2H12.6V58.8H46.2ZM58.8 58.8V67.2H50.4V58.8H58.8ZM71.4 58.8V67.2H63V58.8H71.4Z",
  fill: "url(#paint0_linear_2_4373)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_2_4373",
  x1: "113.75",
  y1: "-22.7501",
  x2: "-43.75",
  y2: "112",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));
const buttons = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  width: "86",
  height: "86",
  viewBox: "0 0 86 86",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M60.9167 10.75H25.0834C21.1417 10.75 17.9167 13.975 17.9167 17.9167V32.25C17.9167 36.1917 21.1417 39.4167 25.0834 39.4167H60.9167C64.8584 39.4167 68.0834 36.1917 68.0834 32.25V17.9167C68.0834 13.975 64.8584 10.75 60.9167 10.75ZM62.7084 32.25C62.7084 33.325 61.9917 34.0417 60.9167 34.0417H25.0834C24.0084 34.0417 23.2917 33.325 23.2917 32.25V17.9167C23.2917 16.8417 24.0084 16.125 25.0834 16.125H60.9167C61.9917 16.125 62.7084 16.8417 62.7084 17.9167V32.25ZM34.0417 27.95H51.9584V22.2167H34.0417V27.95ZM60.9167 46.5833H25.0834C21.1417 46.5833 17.9167 49.8083 17.9167 53.75V68.0833C17.9167 72.025 21.1417 75.25 25.0834 75.25H60.9167C64.8584 75.25 68.0834 72.025 68.0834 68.0833V53.75C68.0834 49.8083 64.8584 46.5833 60.9167 46.5833ZM62.7084 68.0833C62.7084 69.1583 61.9917 69.875 60.9167 69.875H25.0834C24.0084 69.875 23.2917 69.1583 23.2917 68.0833V53.75C23.2917 52.675 24.0084 51.9583 25.0834 51.9583H60.9167C61.9917 51.9583 62.7084 52.675 62.7084 53.75V68.0833ZM34.0417 63.7833H51.9584V58.4083H34.0417V63.7833Z",
  fill: "url(#paint0_linear_204_760)"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
  id: "paint0_linear_204_760",
  x1: "43",
  y1: "10.75",
  x2: "43",
  y2: "75.25",
  gradientUnits: "userSpaceOnUse"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  stopColor: "#9D33DE"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "0.9999",
  stopColor: "#18D2EB"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopOpacity: "0"
}), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
  offset: "1",
  stopColor: "#18D2EB"
}))));

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ _extends; }
/* harmony export */ });
function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
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
/******/ 		var chunkLoadingGlobal = self["webpackChunkcta_1"] = self["webpackChunkcta_1"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], function() { return __webpack_require__("./src/index.js"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map