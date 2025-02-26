/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/wc-attributes/components/ColorPicker.js":
/*!*****************************************************!*\
  !*** ./src/wc-attributes/components/ColorPicker.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _ColorPickerItem__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./ColorPickerItem */ "./src/wc-attributes/components/ColorPickerItem.js");




const ColorPicker = ({
  value,
  onChange,
  confirm
}) => {
  const [values, setValues] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(() => {
    const more = value?.more?.map?.(v => ({
      v: v || "",
      t: Date.now()
    }));
    let l = [{
      v: value?.value || "",
      t: Date.now()
    }, ...(more || [])];
    return l;
  });
  const [changed, setChanged] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const [isVisible, setIsVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    let t = null;
    if (changed) {
      t = setTimeout(() => {
        console.log("Call_Change___");
        const newValue = {
          ...value,
          value: ""
        };
        if (values?.length) {
          newValue.value = values[0].v;
        }
        if (values?.length > 1) {
          newValue.more = [];
          newValue.value = values[0].v;
          for (let i = 1; i < values.length; i++) {
            newValue.more.push(values[i].v);
          }
        }
        onChange?.(newValue);
      }, 600);
    }
    return () => {
      if (t) {
        clearTimeout(t);
      }
    };
  }, [changed]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: ""
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wc_swatch_colors sasw_space sasw_wrap",
    onClick: () => {
      setIsVisible(!isVisible);
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "sasw_swatch"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "sasw_color_inner"
  }, values.map(i => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "sasw_color_item",
    style: {
      background: i.v,
      pointer: "cursor"
    }
  }))))), isVisible && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Modal, {
    title: "Select Color",
    className: "sasw_swatch_modal",
    onClickOutside: () => {
      setIsVisible(false);
    },
    onRequestClose: () => {
      setIsVisible(false);
    },
    headerActions: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "sasw_space"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
      className: "button",
      onClick: e => {
        setChanged(Date.now());
        setValues(prev => {
          return [...prev, {
            t: Date.now(),
            v: ""
          }];
        });
      }
    }, "Add"))
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_space sasw_wrap"
  }, values.map((i, index) => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: i.t,
      className: "color_item"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_ColorPickerItem__WEBPACK_IMPORTED_MODULE_3__["default"], {
      size: "x2",
      color: i.v || "",
      onChange: value => {
        setChanged(Date.now());
        setValues(prev => {
          const next = [...prev];
          next[index].v = value;
          return next;
        });
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "ic remove",
      onClick: () => {
        setChanged(Date.now());
        setValues(prev => {
          if (prev?.length < 2) {
            return prev;
          }
          const next = [...prev];
          next.splice(index, 1);
          return next;
        });
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "dashicons dashicons-no-alt"
    })));
  })))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ColorPicker);

/***/ }),

/***/ "./src/wc-attributes/components/ColorPickerItem.js":
/*!*********************************************************!*\
  !*** ./src/wc-attributes/components/ColorPickerItem.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);



const ColorPickerItem = ({
  color,
  onChange,
  confirm,
  size = "def"
}) => {
  const [value, setValue] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(color);
  const [isVisible, setIsVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const handleOnChange = color => {
    setValue(color);
    onChange?.(color);
  };
  const classes = ["wc_swatch_color sasw_border"];
  classes.push(size);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: classes.join(" ")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    style: {
      background: value,
      pointer: "cursor"
    },
    onClick: () => {
      setIsVisible(true);
    }
  }), isVisible && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Popover, {
    className: "wc_swatch_color_picker",
    placement: `left-start`,
    offset: 15,
    noArrow: false,
    onClose: () => {
      setIsVisible(false);
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ColorPicker, {
    color: value,
    onChange: handleOnChange
  }))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ColorPickerItem);

/***/ }),

/***/ "./src/wc-attributes/attr-style.scss":
/*!*******************************************!*\
  !*** ./src/wc-attributes/attr-style.scss ***!
  \*******************************************/
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

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

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
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************************!*\
  !*** ./src/wc-attributes/attr-manager.js ***!
  \*******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _components_ColorPicker__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/ColorPicker */ "./src/wc-attributes/components/ColorPicker.js");
/* harmony import */ var _attr_style_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./attr-style.scss */ "./src/wc-attributes/attr-style.scss");







const sendReq = ({
  url,
  path,
  method,
  data,
  body,
  params
}) => {
  return new Promise((resolve, reject) => {
    let reqUrl = url ? url : window?.SASW_SWATCHES?.root + path;
    const args = {
      method: method || "get",
      // *GET, POST, PUT, DELETE, etc.
      cache: "no-cache",
      // *default, no-cache, reload, force-cache, only-if-cached
      headers: {
        "Content-Type": "application/json",
        "X-WP-Nonce": window?.SASW_SWATCHES?.nonce
      },
      redirect: "follow" // manual, *follow, error
    };
    if (data) {
      args.body = JSON.stringify(data);
    }
    if (body) {
      args.body = JSON.stringify(body);
    }
    if (params) {
      const sp = new URLSearchParams(params || {});
      const q = sp.toString();
      if (q.length) {
        if (reqUrl?.includes("?")) {
          reqUrl += "&" + q;
        } else {
          reqUrl += "?" + q;
        }
      }
    }
    fetch(reqUrl, args).then(res => res.json()).then(res => resolve(res)).catch(e => reject(e));
  });
};
const Image2 = ({
  value,
  type,
  onChange,
  clear
}) => {
  var _image$thumbnail;
  const [image, setImage] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useState)(value || {});
  const frame = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useMemo)(() => {
    // https://github.com/WordPress/gutenberg/blob/HEAD/packages/block-editor/src/components/media-upload/README.md
    // https://github.com/xwp/wp-core-media-widgets/blob/905edbccfc2a623b73a93dac803c5335519d7837/wp-admin/js/widgets/media-gallery-widget.js
    const config = {
      title: "Select Image",
      button: {
        text: "Use this image"
      },
      multiple: false // Set to true to allow multiple files to be selected
    };
    config.library = {
      type: ["image"]
    };
    const f = wp.media(config);
    f.on("select", function () {
      // Get media attachment details from the frame state
      var attachment = frame.state().get("selection").first().toJSON();
      const sizes = {};
      if (attachment.sizes?.thumbnail?.url) {
        sizes.thumbnail = attachment.sizes?.thumbnail?.url;
      }
      if (attachment.sizes?.full?.url) {
        sizes.full = attachment.sizes?.full?.url;
      }
      const data = {
        id: attachment.id,
        ...sizes
      };
      setImage(data);
      onChange?.(data);
    });
    return f;
  }, []);
  const handleOpen = () => {
    frame.open();
  };
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useEffect)(() => {
    if (clear) {
      jQuery(window).on("taxonomy_term_added", (e, res) => {
        const t = res?.responses?.[1]?.supplemental?.term_id;
        console.log("Tax_added", t, res);
        setImage(null);
        onChange?.(null);
      });
    }
  }, []);
  const handleRemove = () => {
    setImage(false);
    onChange?.(false);
  };
  const src = (_image$thumbnail = image?.thumbnail) !== null && _image$thumbnail !== void 0 ? _image$thumbnail : image?.full;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wc_swatch_image_wrap",
    "data-type": type
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    onClick: handleOpen,
    className: "wc_swatch_image"
  }, src ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: src,
    alt: ""
  }) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "wc_swatch_image_placeholder"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "dashicons dashicons-format-image"
  }))), "full" === type ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "act"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
    size: "small",
    onClick: handleOpen,
    variant: "secondary"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Upload', "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
    onClick: handleRemove,
    isDestructive: true,
    size: "small",
    variant: "secondary"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Remove', "sa-swatches"))) : null);
};
const App = () => {
  const onChange = data => {
    console.log("onChange", data);
    jQuery("input#sasw_attr_swatch").val(JSON.stringify({
      ...data,
      type: SASW_SWATCHES?.current_tax?.type
    }));
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_attr_main"
  }, SASW_SWATCHES?.current_tax?.type === "sasw_image" ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Image2, {
    value: window.SASW_SWATCHES?.current_term,
    clear: true,
    autoSave: false,
    onChange: onChange,
    type: "full"
  }) : null, SASW_SWATCHES?.current_tax?.type === "sasw_color" ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_ColorPicker__WEBPACK_IMPORTED_MODULE_4__["default"], {
    value: window.SASW_SWATCHES?.current_term,
    onChange: onChange
  }) : null);
};
const AppCol = ({
  data,
  term_id
}) => {
  const onChange = changeData => {
    console.log("onChange__col", changeData);
    let saveData = {
      ...SASW_SWATCHES.current_tax,
      ...changeData,
      term_id
    };
    if (saveData?.type === 'sasw_image') {
      saveData.value = changeData?.id;
    }
    sendReq({
      url: SASW_SWATCHES?.ajax,
      method: "post",
      data: saveData,
      params: {
        endpoint: "update_term_swatch"
      }
    }).then(res => {
      console.log("Update_meta", res);
    }).catch(e => console.log(e));
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, SASW_SWATCHES?.current_tax?.type === "sasw_image" ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Image2, {
    value: data,
    onChange: onChange
  }) : null, SASW_SWATCHES?.current_tax?.type === "sasw_color" ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_ColorPicker__WEBPACK_IMPORTED_MODULE_4__["default"], {
    confirm: true,
    onChange: onChange,
    value: data
  }) : null);
};
const domNode = document.getElementById("sasw_attr_swatch_el");
const appEl = document.createElement("div");
domNode.append(appEl);
(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.render)((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(App, null), appEl);
const renderCol = el => {
  const data = el.data("swatch");
  const term_id = el.data("term_id");
  el.addClass("sasw_added");
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.render)((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(AppCol, {
    data: data,
    term_id: term_id
  }), el.get(0));
};
jQuery(".sasw_swatch").each(function () {
  const el = jQuery(this);
  renderCol(el);
});
jQuery(window).on("taxonomy_term_added", (e, res) => {
  console.log('New term added');
  jQuery(".sasw_swatch").not(".sasw_added").each(function () {
    const el = jQuery(this);
    renderCol(el);
  });
});
})();

/******/ })()
;
//# sourceMappingURL=attr-manager.js.map