(window["webpackJsonp_fragment_amzn"] = window["webpackJsonp_fragment_amzn"] || []).push([["style-index"],{

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"index": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	var jsonpArray = window["webpackJsonp_fragment_amzn"] = window["webpackJsonp_fragment_amzn"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/index.js","style-index"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Edit; });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");





/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

function Edit(props) {
  var attributes = props.attributes,
      setAttributes = props.setAttributes,
      className = props.className,
      isSelected = props.isSelected,
      onReplace = props.onReplace,
      mergeBlocks = props.mergeBlocks;
  var text = attributes.text,
      page = attributes.page,
      totalCount = attributes.totalCount,
      items = attributes.items,
      title = attributes.title,
      maker = attributes.maker,
      image_url = attributes.image_url,
      amazon_url = attributes.amazon_url,
      rakuten_url = attributes.rakuten_url;
  var _fragment_amzn_init_d = fragment_amzn_init_data,
      nonce = _fragment_amzn_init_d.nonce,
      noimage_url = _fragment_amzn_init_d.noimage_url,
      amazon_associate_id = _fragment_amzn_init_d.amazon_associate_id,
      rakuten_affiliate_id = _fragment_amzn_init_d.rakuten_affiliate_id;

  var onChangeKeyword = function onChangeKeyword(val) {
    setAttributes({
      text: val
    });
  };

  var onClickItem = function onClickItem(item) {
    setAttributes({
      title: item.title
    });
    setAttributes({
      image_url: item.image_url
    });
    setAttributes({
      amazon_url: item.url
    });
    setAttributes({
      rakuten_url: 'http://hb.afl.rakuten.co.jp/hgc/' + rakuten_affiliate_id + '/?pc=http%3A%2F%2Fsearch.rakuten.co.jp%2Fsearch%2Fmall%2F' + encodeURI(item.title)
    });
  };

  var onClickMore = function onClickMore(page) {
    page += 1;
    setAttributes({
      page: page
    });
    search(page);
  };

  var onSubmitQuery = function onSubmitQuery(e) {
    e.preventDefault();
    setAttributes({
      page: 1
    });
    setAttributes({
      items: []
    });
    setAttributes({
      totalCount: 0
    });
    search(1);
  };

  var search = function search(page) {
    if (text === "") return;
    var formData = new URLSearchParams();
    formData.append('keywords', text);
    formData.append('page', page);
    formData.append('security', nonce);
    fetch('/wp-admin/admin-ajax.php?action=fragment_amzn_search_amazon_items', {
      method: "POST",
      body: formData
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      data = JSON.parse(data);
      var tmpitems = [];
      data.SearchResult.Items.forEach(function (item) {
        tmpitems.push({
          "title": item.ItemInfo.Title.DisplayValue,
          "url": item.DetailPageURL,
          "image_url": item.Images.Primary.Medium.URL,
          "maker": ""
        });
      });

      if (page != 1 && items.length > 0) {
        tmpitems = items.concat(tmpitems);
      }

      setAttributes({
        items: tmpitems
      });
      setAttributes({
        totalCount: data.SearchResult.TotalResultCount
      });
    })["catch"](function (val) {
      console.log(val);
      alert("問題が発生しました。AWSのアクセスキー・シークレット、またはパートナータグが間違えている可能性があります。");
    });
  };

  if (image_url == "" || image_url == undefined) {
    setAttributes({
      image_url: noimage_url
    });
  }

  return /*#__PURE__*/React.createElement(React.Fragment, null, wp.element.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__["InspectorControls"], {
    key: "setting"
  }, wp.element.createElement("div", {
    id: "wp-block-create-block-fragment-amzn-controls"
  }, wp.element.createElement("fieldset", null, wp.element.createElement("form", {
    className: "inline-input",
    onSubmit: onSubmitQuery
  }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextControl"], {
    value: text,
    onChange: onChangeKeyword,
    placeholder: "商品名を入力してEnter"
  }), wp.element.createElement("input", {
    type: "hidden",
    value: page,
    name: "page"
  }))), wp.element.createElement("fieldset", {
    "class": "wp-block-create-block-fragment-amzn-items"
  }, wp.element.createElement("ul", null, items.map(function (item) {
    return wp.element.createElement("li", null, wp.element.createElement("img", {
      src: item.image_url
    }), wp.element.createElement("p", null, item.maker), wp.element.createElement("p", null, wp.element.createElement("a", {
      href: item.url,
      target: "_blank"
    }, item.title)), wp.element.createElement("div", {
      "class": "btn-area"
    }, wp.element.createElement("button", {
      value: item,
      onClick: function onClick() {
        return onClickItem(item);
      }
    }, "\u9078\u629E\u3059\u308B")));
  })), items.length < totalCount && wp.element.createElement("button", {
    value: page,
    onClick: function onClick() {
      return onClickMore(page);
    },
    "class": "wp-block-create-block-fragment-amzn-next"
  }, "\u3082\u3063\u3068\u898B\u308B")))), wp.element.createElement("div", Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__["useBlockProps"])(), wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-inner"
  }, wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-img"
  }, wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-img-box"
  }, wp.element.createElement("span", null, wp.element.createElement("img", {
    src: image_url
  })))), wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-info"
  }, wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-maker"
  }, maker), wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-title"
  }, wp.element.createElement("a", {
    href: amazon_url ? amazon_url : "",
    target: amazon_url ? "_blank" : "",
    rel: "noopener noreferrer"
  }, title)), wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-btn"
  }, wp.element.createElement("a", {
    href: amazon_url ? amazon_url : "",
    target: amazon_url ? "_blank" : "",
    rel: "noopener noreferrer",
    "class": "wp-block-create-block-fragment-amzn-info-amazon"
  }, "Amazon\u3067\u898B\u308B"), wp.element.createElement("a", {
    href: rakuten_url ? rakuten_url : "",
    target: rakuten_url ? "_blank" : "",
    rel: "noopener noreferrer",
    "class": "wp-block-create-block-fragment-amzn-info-rakuten"
  }, "\u697D\u5929\u5E02\u5834\u3067\u898B\u308B"))))));
}

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _menu_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./menu.scss */ "./src/menu.scss");
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



var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path;
/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__["registerBlockType"])('create-block/fragment-amzn', {
  icon: wp.element.createElement("svg", {
    height: "1024",
    width: "1024",
    viewBox: "2.167 .438 251.038 259.969",
    xmlns: "http://www.w3.org/2000/svg"
  }, wp.element.createElement("g", {
    fill: "none",
    "fill-rule": "evenodd"
  }, wp.element.createElement("path", {
    d: "m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z",
    fill: "#f90",
    "fill-rule": "nonzero"
  }), wp.element.createElement("path", {
    d: "m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095",
    fill: "#000"
  }), wp.element.createElement("path", {
    d: "m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z",
    fill: "#f90",
    "fill-rule": "nonzero"
  }), wp.element.createElement("path", {
    d: "m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095",
    fill: "#000"
  }))),

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

/***/ "./src/menu.scss":
/*!***********************!*\
  !*** ./src/menu.scss ***!
  \***********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return save; });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
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
  var attributes = _ref.attributes;
  var text = attributes.text,
      items = attributes.items,
      title = attributes.title,
      maker = attributes.maker,
      image_url = attributes.image_url,
      amazon_url = attributes.amazon_url,
      rakuten_url = attributes.rakuten_url;
  return /*#__PURE__*/React.createElement(React.Fragment, null, wp.element.createElement("div", _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__["useBlockProps"].save(), wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-inner"
  }, wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-img"
  }, wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-img-box"
  }, wp.element.createElement("span", null, wp.element.createElement("img", {
    src: image_url
  })))), wp.element.createElement("div", {
    "class": "wp-block-create-block-fragment-amzn-info"
  }, wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-maker"
  }, maker), wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-title"
  }, wp.element.createElement("a", {
    href: amazon_url,
    target: "_blank",
    rel: "noopener noreferrer"
  }, title)), wp.element.createElement("p", {
    "class": "wp-block-create-block-fragment-amzn-info-btn"
  }, wp.element.createElement("a", {
    href: amazon_url,
    target: "_blank",
    rel: "noopener noreferrer",
    "class": "wp-block-create-block-fragment-amzn-info-amazon"
  }, "Amazon\u3067\u898B\u308B"), wp.element.createElement("a", {
    href: rakuten_url,
    target: "_blank",
    rel: "noopener noreferrer",
    "class": "wp-block-create-block-fragment-amzn-info-rakuten"
  }, "\u697D\u5929\u5E02\u5834\u3067\u898B\u308B"))))));
}

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map