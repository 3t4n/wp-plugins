/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/frontend/App.js":
/*!****************************************!*\
  !*** ./src/components/frontend/App.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _context_ConfigContext__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");
/* harmony import */ var _JsCategoriesList__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./JsCategoriesList */ "./src/components/frontend/JsCategoriesList.js");

/**
 * Internal dependencies
 */


const App = ({
  attributes
}) => {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_context_ConfigContext__WEBPACK_IMPORTED_MODULE_1__.ConfigProvider, {
    attributes: attributes
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_JsCategoriesList__WEBPACK_IMPORTED_MODULE_2__["default"], null));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (App);

/***/ }),

/***/ "./src/components/frontend/JsCategoriesList.js":
/*!*****************************************************!*\
  !*** ./src/components/frontend/JsCategoriesList.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_DisplayCategory_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/DisplayCategory.js */ "./src/components/frontend/components/DisplayCategory.js");
/* harmony import */ var _hooks_useAnimation__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./hooks/useAnimation */ "./src/components/frontend/hooks/useAnimation.js");
/* harmony import */ var _context_ConfigContext__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");
/* harmony import */ var _hooks_useApi__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./hooks/useApi */ "./src/components/frontend/hooks/useApi.js");
/* harmony import */ var _components_Loading__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./components/Loading */ "./src/components/frontend/components/Loading.js");

/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */





const JsCategoriesList = () => {
  const {
    config
  } = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useContext)(_context_ConfigContext__WEBPACK_IMPORTED_MODULE_5__.ConfigContext);
  const [loaded, setLoaded] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  const {
    loading,
    data: apiData,
    error,
    apiClient: loadCategories
  } = (0,_hooks_useApi__WEBPACK_IMPORTED_MODULE_6__["default"])('/jcl/v1/categories');
  const animationFunction = (0,_hooks_useAnimation__WEBPACK_IMPORTED_MODULE_4__["default"])(config.effect);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    loadCategories(config);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    if (!loaded && (error || loaded)) {
      setLoaded(true);
    }
  }, [loaded, error]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `js-categories-list layout-${config.layout}`
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, config.title), loading ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_Loading__WEBPACK_IMPORTED_MODULE_7__["default"], {
    loading: loading
  }), (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Loading…', 'jcl_i18n')) : '', !loading && apiData && apiData.categories ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: "jcl_widget"
  }, apiData.categories.length === 0 ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('There are no categories to show.', 'jcl_i18n')) : apiData.categories.map(category => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_DisplayCategory_js__WEBPACK_IMPORTED_MODULE_3__["default"], {
    key: category.id,
    category: category,
    animationFunction: animationFunction
  }))) : '', (loaded || error) && !apiData ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Cannot load categories.', 'jcl_i18n') : '');
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JsCategoriesList);

/***/ }),

/***/ "./src/components/frontend/components/BulletWithSymbol.js":
/*!****************************************************************!*\
  !*** ./src/components/frontend/components/BulletWithSymbol.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");
/* harmony import */ var _hooks_useFrontend__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../hooks/useFrontend */ "./src/components/frontend/hooks/useFrontend.js");

/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


const BulletWithSymbol = ({
  expanded,
  title,
  permalink,
  onToggle
}) => {
  const {
    config
  } = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useContext)(_context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__.ConfigContext);
  const {
    expandSymbol,
    collapseSymbol
  } = (0,_hooks_useFrontend__WEBPACK_IMPORTED_MODULE_3__.useSymbol)(config.symbol, config.layout);
  if (config.symbol.toString() === '0') {
    return null;
  }
  const expandedClass = 'jcl_symbol ' + (expanded ? 'expanded' : '');
  const symbol = expanded ? collapseSymbol : expandSymbol;

  // Do not show the component if it's disabled in the options.
  if (config.symbol.toString() === '0') {
    return '';
  }
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: permalink,
    title: title,
    className: expandedClass,
    onClick: onToggle
  }, symbol);
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BulletWithSymbol);

/***/ }),

/***/ "./src/components/frontend/components/CategoryLink.js":
/*!************************************************************!*\
  !*** ./src/components/frontend/components/CategoryLink.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");

/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */

const CategoryLink = ({
  category
}) => {
  const {
    config
  } = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useContext)(_context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__.ConfigContext);
  let linkContent = category.name;
  if (config.showcount) {
    linkContent += ` (${category.count})`;
  }
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: category.url,
    title: category.name
  }, linkContent);
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CategoryLink);

/***/ }),

/***/ "./src/components/frontend/components/DisplayCategory.js":
/*!***************************************************************!*\
  !*** ./src/components/frontend/components/DisplayCategory.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");
/* harmony import */ var _hooks_useApi__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../hooks/useApi */ "./src/components/frontend/hooks/useApi.js");
/* harmony import */ var _hooks_useFrontend__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../hooks/useFrontend */ "./src/components/frontend/hooks/useFrontend.js");
/* harmony import */ var _BulletWithSymbol__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./BulletWithSymbol */ "./src/components/frontend/components/BulletWithSymbol.js");
/* harmony import */ var _CategoryLink__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./CategoryLink */ "./src/components/frontend/components/CategoryLink.js");
/* harmony import */ var _Loading__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./Loading */ "./src/components/frontend/components/Loading.js");

/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */






const DisplayCategory = ({
  category,
  animationFunction
}) => {
  const {
    loading,
    data: apiData,
    apiClient: loadCategories
  } = (0,_hooks_useApi__WEBPACK_IMPORTED_MODULE_3__["default"])('/jcl/v1/categories');
  const {
    config
  } = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useContext)(_context_ConfigContext__WEBPACK_IMPORTED_MODULE_2__.ConfigContext);
  const [expand, setExpand] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)((0,_hooks_useFrontend__WEBPACK_IMPORTED_MODULE_4__.initialExpand)(config, category.id));
  const isLayoutLeft = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useMemo)(() => config.layout === 'left', [config]);
  const hasChilds = parseInt(category.child_num, 10) > 0;
  const listElement = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useRef)(null);
  const handleToggle = async event => {
    event.preventDefault();
    if (!apiData || !Array.isArray(apiData.categories)) {
      await loadCategories(config, category.id);
    }
    setExpand(!expand);
  };
  const animateList = () => {
    const categoriesList = [...listElement.current.children].filter(ch => ch.nodeName.toLowerCase() === 'ul');
    if (categoriesList.length > 0) animationFunction(categoriesList[0]);
  };
  const Toggler = () => {
    return hasChilds ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_BulletWithSymbol__WEBPACK_IMPORTED_MODULE_5__["default"], {
      expanded: expand,
      permalink: category.url,
      title: category.name,
      onToggle: handleToggle
    }) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "jcl_symbol no_child"
    });
  };
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    if (expand && (!apiData || !Array.isArray(apiData.categories))) {
      loadCategories(config, category.id);
    }
    animateList();
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [expand]);
  const childClassName = (0,_hooks_useFrontend__WEBPACK_IMPORTED_MODULE_4__.initialExpand)(config, category.id) ? '' : 'jcl-hide';
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    ref: listElement
  }, isLayoutLeft ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Toggler, null) : '', (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_CategoryLink__WEBPACK_IMPORTED_MODULE_6__["default"], {
    category: category
  }), !isLayoutLeft ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Toggler, null) : '', (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Loading__WEBPACK_IMPORTED_MODULE_7__["default"], {
    loading: loading
  }), hasChilds && apiData && apiData.categories.length > 0 ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: childClassName
  }, apiData.categories.map(subCategory => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(DisplayCategory, {
    key: subCategory.id,
    category: subCategory,
    animationFunction: animationFunction
  }))) : '');
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (DisplayCategory);

/***/ }),

/***/ "./src/components/frontend/components/Loading.js":
/*!*******************************************************!*\
  !*** ./src/components/frontend/components/Loading.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const Loading = ({
  loading
}) => {
  if (loading) {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "loading",
      role: "progressbar"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      x: "0",
      y: "0",
      version: "1.1",
      viewBox: "0 0 100 100",
      xmlSpace: "preserve"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      fill: "#000",
      d: "M73 50c0-12.7-10.3-23-23-23S27 37.3 27 50m3.9 0c0-10.5 8.5-19.1 19.1-19.1S69.1 39.5 69.1 50"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("animateTransform", {
      attributeName: "transform",
      attributeType: "XML",
      dur: "1s",
      from: "0 50 50",
      repeatCount: "indefinite",
      to: "360 50 50",
      type: "rotate"
    }))));
  }
  return '';
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Loading);

/***/ }),

/***/ "./src/components/frontend/context/ConfigContext.js":
/*!**********************************************************!*\
  !*** ./src/components/frontend/context/ConfigContext.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ConfigContext: () => (/* binding */ ConfigContext),
/* harmony export */   ConfigProvider: () => (/* binding */ ConfigProvider),
/* harmony export */   defaultConfig: () => (/* binding */ defaultConfig)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const defaultConfig = {
  title: '',
  symbol: '0',
  effect: 'none',
  layout: 'right',
  expand: '',
  orderby: 'name',
  orderdir: 'ASC',
  showcount: false,
  show_empty: false,
  include_or_exclude: 'include',
  expandCategories: []
};
const ConfigContext = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createContext)(defaultConfig);
const ConfigProvider = ({
  attributes,
  children
}) => {
  const initialConfig = {
    ...defaultConfig,
    ...attributes
  };
  const [config, updateContextConfig] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)(initialConfig);
  const setConfig = newConfig => {
    const parsedConfig = {
      ...defaultConfig,
      ...newConfig
    };

    /* global jclCurrentCat */
    if (typeof jclCurrentCat !== 'undefined') {
      parsedConfig.expandCategories = jclCurrentCat.split(',').map(Number);
    }
    updateContextConfig(parsedConfig);
  };
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    setConfig(attributes);
  }, [attributes]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(ConfigContext.Provider, {
    value: {
      config,
      setConfig
    }
  }, children);
};

/***/ }),

/***/ "./src/components/frontend/hooks/useAnimation.js":
/*!*******************************************************!*\
  !*** ./src/components/frontend/hooks/useAnimation.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useAnimation)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

function useAnimation(effect) {
  const supportsRequestAnimation = typeof window.requestAnimationFrame === 'function';
  const fadeIn = (element, duration = 500) => {
    element.style.removeProperty('display');
    let display = window.getComputedStyle(element).display;
    if (display === 'none') {
      display = 'block';
    }
    element.style.display = display;
    element.style.opacity = 0;
    let last = +new Date();
    const tick = function () {
      element.style.opacity = +element.style.opacity + (new Date() - last) / duration;
      last = +new Date();
      if (+element.style.opacity < 1) {
        if (supportsRequestAnimation) window.requestAnimationFrame(tick);else setTimeout(tick, 16);
      }
    };
    tick();
  };
  const fadeOut = (element, duration = 500) => {
    element.style.display = '';
    element.style.opacity = 1;
    let last = +new Date();
    const tick = function () {
      element.style.opacity = Number(+element.style.opacity - (new Date() - last) / duration).toFixed(4);
      last = +new Date();
      if (-element.style.opacity <= 0) {
        if (supportsRequestAnimation) window.requestAnimationFrame(tick);else setTimeout(tick, 16);
      } else {
        element.style.display = 'none';
      }
    };
    tick();
  };
  const fadeToggle = (target, duration = 500) => {
    if (window.getComputedStyle(target).display === 'none') {
      return fadeIn(target, duration);
    }
    return fadeOut(target, duration);
  };
  const slideUp = (target, duration = 500) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
      target.style.display = 'none';
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('padding-bottom');
      target.style.removeProperty('margin-top');
      target.style.removeProperty('margin-bottom');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  };
  const slideDown = (target, duration = 500) => {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;
    if (display === 'none') {
      display = 'block';
    }
    target.style.display = display;
    const height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout(() => {
      target.style.removeProperty('height');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  };
  const slideToggle = (target, duration = 500) => {
    if (window.getComputedStyle(target).display === 'none') {
      return slideDown(target, duration);
    }
    return slideUp(target, duration);
  };
  const showToggle = target => {
    if (window.getComputedStyle(target).display === 'none') {
      target.style.removeProperty('display');
    } else {
      target.style.display = 'none';
    }
  };
  const [animationFunction, setAnimationFunction] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    setAnimationFunction(() => {
      let animationFn;
      switch (effect) {
        case 'fade':
          animationFn = fadeToggle;
          break;
        case 'slide':
          animationFn = slideToggle;
          break;
        default:
          animationFn = showToggle;
          break;
      }
      return animationFn;
    });

    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [effect]);
  return animationFunction;
}

/***/ }),

/***/ "./src/components/frontend/hooks/useApi.js":
/*!*************************************************!*\
  !*** ./src/components/frontend/hooks/useApi.js ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useApi)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1__);
/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 *
 * @param {string} url
 */
function useApi(url) {
  const [data, setData] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
  const [error, setError] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
  const [loading, setLoading] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(false);

  /* global jclCurrentCat */
  const apiClient = async function (config, parent = 0) {
    setLoading(true);
    const params = new URLSearchParams({
      orderby: config.orderby,
      orderdir: config.orderdir,
      parent,
      showEmpty: config.show_empty,
      taxonomy: 'category',
      type: 'post'
    });
    if (typeof jclCurrentCat !== 'undefined' && config.onlycategory > 0) {
      params.append('currentCat', jclCurrentCat);
    }
    if (config.categories) {
      params.append('exclusionType', config.include_or_exclude);
      params.append('cats', config.categories);
    }
    return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1___default()({
      path: `${url}?${params.toString()}`
    }).then(response => {
      setData(response);
      setLoading(false);
    }).catch(e => {
      setLoading(false);
      setError(e);
    });
  };
  return {
    apiClient,
    data,
    error,
    loading,
    setLoading
  };
}

/***/ }),

/***/ "./src/components/frontend/hooks/useFrontend.js":
/*!******************************************************!*\
  !*** ./src/components/frontend/hooks/useFrontend.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   initialExpand: () => (/* binding */ initialExpand),
/* harmony export */   useSymbol: () => (/* binding */ useSymbol)
/* harmony export */ });
function useSymbol(symbol, layout = 'left') {
  let collapseSymbol = '';
  let expandSymbol = '';
  switch (symbol.toString()) {
    case '1':
      collapseSymbol = '▼';
      expandSymbol = layout === 'left' ? '►' : '◄';
      break;
    case '2':
      collapseSymbol = '(–)';
      expandSymbol = '(+)';
      break;
    case '3':
      collapseSymbol = '[–]';
      expandSymbol = '[+]';
      break;
  }
  return {
    collapseSymbol,
    expandSymbol
  };
}
function initialExpand(config, categoryId) {
  if (config.expand === 'all') return true;
  return config.expand === 'sel_cat' && config.expandCategories.includes(categoryId);
}

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/api-fetch":
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["apiFetch"];

/***/ }),

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["domReady"];

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
/*!*********************!*\
  !*** ./src/view.js ***!
  \*********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_frontend_App__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/frontend/App */ "./src/components/frontend/App.js");

/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */

_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default()(function () {
  const jclInstances = document.querySelectorAll('.wp-block-jquery-categories-list-categories-block');
  jclInstances.forEach(container => {
    const attributes = {
      ...container.dataset
    };
    (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.render)((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_frontend_App__WEBPACK_IMPORTED_MODULE_3__["default"], {
      attributes: attributes
    }), container);
  });
});
})();

/******/ })()
;
//# sourceMappingURL=view.js.map