/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/admin/CategoryPicker.js":
/*!************************************************!*\
  !*** ./src/components/admin/CategoryPicker.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);

/**
 * WordPress dependencies
 */



const CategoryPicker = ({
  selectedCats,
  onSelected
}) => {
  const categories = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useSelect)(select => select('core').getEntityRecords('taxonomy', 'category', {
    per_page: 100
  }));
  const isLoading = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useSelect)(select => {
    return select('core/data').isResolving('core', 'getEntityRecords', ['taxonomy', 'category', {
      per_page: 100
    }]);
  });
  if (isLoading) {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Loading categories…', 'jcl_i18n'));
  }
  if (categories === null) {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, "No categories found");
  }
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    hideLabelFromVision: true,
    multiple: true,
    options: categories.map(({
      id,
      name
    }) => ({
      label: name,
      value: id
    })),
    onChange: selected => {
      onSelected(selected);
    },
    style: {
      minWidth: '250px',
      height: '100px'
    },
    value: selectedCats
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CategoryPicker);

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

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
/* harmony import */ var _editor_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.css */ "./src/editor.css");
/* harmony import */ var _components_admin_CategoryPicker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/admin/CategoryPicker */ "./src/components/admin/CategoryPicker.js");
/* harmony import */ var _components_frontend_JsCategoriesList__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/frontend/JsCategoriesList */ "./src/components/frontend/JsCategoriesList.js");
/* harmony import */ var _components_frontend_context_ConfigContext__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./components/frontend/context/ConfigContext */ "./src/components/frontend/context/ConfigContext.js");

/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */




function Edit({
  attributes,
  setAttributes
}) {
  const categories = Array.isArray(attributes.categories) ? attributes.categories : [];
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)()
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_frontend_context_ConfigContext__WEBPACK_IMPORTED_MODULE_7__.ConfigProvider, {
    attributes: attributes
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_frontend_JsCategoriesList__WEBPACK_IMPORTED_MODULE_6__["default"], null)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    key: "setting"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "jcl-controls"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('General options', 'jcl_i18n'),
    initialOpen: true
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Title', 'jcl_i18n'),
    value: attributes.title,
    onChange: val => setAttributes({
      title: val
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Trigger Symbol', 'jcl_i18n'),
    value: attributes.symbol,
    onChange: val => setAttributes({
      symbol: val
    }),
    options: [{
      value: '0',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Empty Space', 'jcl_i18n')
    }, {
      value: '1',
      label: '► ▼'
    }, {
      value: '2',
      label: '(+) (–)'
    }, {
      value: '3',
      label: '[+] [–]'
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Symbol position', 'jcl_i18n'),
    value: attributes.layout,
    onChange: val => setAttributes({
      layout: val
    }),
    options: [{
      value: 'left',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Left', 'jcl_i18n')
    }, {
      value: 'right',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Right', 'jcl_i18n')
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Effect', 'jcl_i18n'),
    value: attributes.effect,
    onChange: val => setAttributes({
      effect: val
    }),
    options: [{
      value: 'none',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('None', 'jcl_i18n')
    }, {
      value: 'slide',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Slide( Accordion )', 'jcl_i18n')
    }, {
      value: 'fade',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Fade', 'jcl_i18n')
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Order by', 'jcl_i18n'),
    value: attributes.orderby,
    onChange: val => setAttributes({
      orderby: val
    }),
    options: [{
      value: 'name',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Name', 'jcl_i18n')
    }, {
      value: 'id',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Category ID', 'jcl_i18n')
    }, {
      value: 'count',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Entries count', 'jcl_i18n')
    }, {
      value: 'slug',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Slug', 'jcl_i18n')
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Order direction', 'jcl_i18n'),
    value: attributes.orderdir,
    onChange: val => setAttributes({
      orderdir: val
    }),
    options: [{
      value: 'ASC',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('ASC', 'jcl_i18n')
    }, {
      value: 'DESC',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('DESC', 'jcl_i18n')
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Expand', 'jcl_i18n'),
    value: attributes.expand,
    onChange: val => setAttributes({
      expand: val
    }),
    options: [{
      value: '',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('None', 'jcl_i18n')
    }, {
      value: 'all',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('All (warning: requires too many ajax calls on load)', 'jcl_i18n')
    }, {
      value: 'sel_cat',
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Selected category', 'jcl_i18n')
    }]
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Extra options', 'jcl_i18n'),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.CheckboxControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Show number of posts', 'jcl_i18n'),
    checked: attributes.showcount,
    onChange: val => setAttributes({
      showcount: val
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.CheckboxControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Show empty categories', 'jcl_i18n'),
    checked: attributes.show_empty,
    onChange: val => setAttributes({
      show_empty: val
    })
  })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Category management', 'jcl_i18n'),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RadioControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Include or exclude', 'jcl_i18n'),
    selected: attributes.include_or_exclude,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Include the following categories', 'jcl_i18n'),
      value: 'include'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Exclude the following categories ', 'jcl_i18n'),
      value: 'exclude'
    }],
    onChange: val => setAttributes({
      include_or_exclude: val
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_admin_CategoryPicker__WEBPACK_IMPORTED_MODULE_5__["default"], {
    selectedCats: categories,
    onSelected: val => setAttributes({
      categories: val
    })
  })))))));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor. All other files
 * get applied to the editor only.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */



/**
 * Internal dependencies
 */



/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/editor.css":
/*!************************!*\
  !*** ./src/editor.css ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
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

/***/ "@wordpress/api-fetch":
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["apiFetch"];

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

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"jquery-categories-list/categories-block","version":"4.0.1","title":"JS Category List","category":"widgets","icon":"list-view","description":"A block for displaying a category list with some effects.","textdomain":"jcl_i18n","editorScript":"file:./index.js","editorStyle":"file:./index.css","viewScript":"file:view.js","style":"file:./style-index.css","supports":{"multiple":true},"attributes":{"title":{"type":"string","default":""},"symbol":{"type":"string","enum":["0","1","2","3"],"default":"0"},"effect":{"type":"string","enum":["none","slide","fade"],"default":"none"},"layout":{"type":"string","enum":["left","right"],"default":"left"},"orderby":{"type":"string","enum":["count","id","name","slug"],"default":"name"},"orderdir":{"type":"string","enum":["ASC","DESC"]},"expand":{"type":"string","enum":["","all","sel_cat"],"default":""},"showcount":{"type":"boolean","default":false},"show_empty":{"type":"boolean","default":false},"include_or_exclude":{"type":"string","enum":["exclude","include"],"default":"include"},"categories":{"type":"array"}}}');

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
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkjquery_categories_list"] = globalThis["webpackChunkjquery_categories_list"] || [];
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