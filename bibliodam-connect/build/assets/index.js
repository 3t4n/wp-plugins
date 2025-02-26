/******/
(function (modules) { // webpackBootstrap
    /******/ 	// The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ 	// The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ 		// Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ 		// Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/            i: moduleId,
            /******/            l: false,
            /******/            exports: {}
            /******/
        };
        /******/
        /******/ 		// Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ 		// Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ 		// Return the exports of the module
        /******/
        return module.exports;
        /******/
    }

    /******/
    /******/
    /******/ 	// expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ 	// expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ 	// define getter function for harmony exports
    /******/
    __webpack_require__.d = function (exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {enumerable: true, get: getter});
            /******/
        }
        /******/
    };
    /******/
    /******/ 	// define __esModule on exports
    /******/
    __webpack_require__.r = function (exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {value: 'Module'});
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', {value: true});
        /******/
    };
    /******/
    /******/ 	// create a fake namespace object
    /******/ 	// mode & 1: value is a module id, require it
    /******/ 	// mode & 2: merge all properties of value into the ns
    /******/ 	// mode & 4: return value when already ns object
    /******/ 	// mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function (value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', {enumerable: true, value: value});
        /******/
        if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) {
            return value[key];
        }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ 	// getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function (module) {
        /******/
        var getter = module && module.__esModule ?
            /******/            function getDefault() {
                return module['default'];
            } :
            /******/            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ 	// Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ 	// __webpack_public_path__
    /******/
    __webpack_require__.p = "";
    /******/
    /******/
    /******/ 	// Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = "./src/index.js");
    /******/
})
    /************************************************************************/
    /******/ ({

    /***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
    /*!*****************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
      \*****************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        function _arrayLikeToArray(arr, len) {
            if (len == null || len > arr.length) len = arr.length;

            for (var i = 0, arr2 = new Array(len); i < len; i++) {
                arr2[i] = arr[i];
            }

            return arr2;
        }

        module.exports = _arrayLikeToArray;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
    /*!******************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
      \******************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

        function _arrayWithoutHoles(arr) {
            if (Array.isArray(arr)) return arrayLikeToArray(arr);
        }

        module.exports = _arrayWithoutHoles;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
    /*!***************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
      \***************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        function _defineProperty(obj, key, value) {
            if (key in obj) {
                Object.defineProperty(obj, key, {
                    value: value,
                    enumerable: true,
                    configurable: true,
                    writable: true
                });
            } else {
                obj[key] = value;
            }

            return obj;
        }

        module.exports = _defineProperty;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
    /*!****************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
      \****************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        function _iterableToArray(iter) {
            if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter);
        }

        module.exports = _iterableToArray;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
    /*!******************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
      \******************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        function _nonIterableSpread() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
        }

        module.exports = _nonIterableSpread;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
    /*!******************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
      \******************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

        var iterableToArray = __webpack_require__(/*! ./iterableToArray */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

        var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

        var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

        function _toConsumableArray(arr) {
            return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
        }

        module.exports = _toConsumableArray;

        /***/
    }),

    /***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
    /*!***************************************************************************!*\
      !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
      \***************************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

        function _unsupportedIterableToArray(o, minLen) {
            if (!o) return;
            if (typeof o === "string") return arrayLikeToArray(o, minLen);
            var n = Object.prototype.toString.call(o).slice(8, -1);
            if (n === "Object" && o.constructor) n = o.constructor.name;
            if (n === "Map" || n === "Set") return Array.from(o);
            if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
        }

        module.exports = _unsupportedIterableToArray;

        /***/
    }),

    /***/ "./src/index.js":
    /*!**********************!*\
      !*** ./src/index.js ***!
      \**********************/
    /*! no exports provided */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */
        var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
        /* harmony import */
        var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
        /* harmony import */
        var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
        /* harmony import */
        var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
        /* harmony import */
        var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
        /* harmony import */
        var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
        /* harmony import */
        var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
        /* harmony import */
        var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
        /* harmony import */
        var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
        /* harmony import */
        var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__);
        /* harmony import */
        var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
        /* harmony import */
        var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__);
        /* harmony import */
        var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
        /* harmony import */
        var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);


        function ownKeys(object, enumerableOnly) {
            var keys = Object.keys(object);
            if (Object.getOwnPropertySymbols) {
                var symbols = Object.getOwnPropertySymbols(object);
                if (enumerableOnly) symbols = symbols.filter(function (sym) {
                    return Object.getOwnPropertyDescriptor(object, sym).enumerable;
                });
                keys.push.apply(keys, symbols);
            }
            return keys;
        }

        function _objectSpread(target) {
            for (var i = 1; i < arguments.length; i++) {
                var source = arguments[i] != null ? arguments[i] : {};
                if (i % 2) {
                    ownKeys(Object(source), true).forEach(function (key) {
                        _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]);
                    });
                } else if (Object.getOwnPropertyDescriptors) {
                    Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
                } else {
                    ownKeys(Object(source)).forEach(function (key) {
                        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
                    });
                }
            }
            return target;
        }


        var pluginTitle = 'BiblioDAM Connect';
        var pluginName = 'bibliodam-connect';
        var icon = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("svg", {
            width: "16.403",
            height: "19.996",
            viewBox: "0 0 16.403 19.996",
            xmlns: "http://www.w3.org/2000/svg"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("path", {
            id: "Path_8303",
            "data-name": "Path 8303",
            d: "M3.281,12.029H2.656a.207.207,0,0,1-.234-.234V8.436A.207.207,0,0,1,2.656,8.2H5.936c1.953,0,2.968.625,2.968,1.875a1.6,1.6,0,0,1-.7,1.562,4.117,4.117,0,0,1-1.172.391c-.234,0-.547.078-.859.078H3.281ZM2.421,2.5a.207.207,0,0,1,.234-.234H5.468a3.268,3.268,0,0,1,1.953.469,1.772,1.772,0,0,1,.625,1.484V4.3c0,1.172-.859,1.718-2.578,1.718H2.656a.207.207,0,0,1-.234-.234V2.5ZM14.372,6.171h0a1.074,1.074,0,0,0-1.64.078l-.156.156a1.073,1.073,0,0,0,.078,1.406,6.488,6.488,0,0,1,1.328,4.218,5.459,5.459,0,0,1-1.406,4.062A5.388,5.388,0,0,1,8.592,17.5H5.233a.43.43,0,0,1-.391-.234l-1.8-2.968H6.639a5.455,5.455,0,0,0,3.046-.781c.234-.156.469-.391.7-.547A3.778,3.778,0,0,0,11.4,10.31a3.205,3.205,0,0,0-.781-2.265,4.653,4.653,0,0,0-1.64-1.094.163.163,0,0,1,0-.312h0a.077.077,0,0,0,.078-.078c.078-.078.234-.156.547-.391A2.806,2.806,0,0,0,10.623,4.3V3.671a3.419,3.419,0,0,0-1.015-2.5A3.331,3.331,0,0,0,8.045.234,11.32,11.32,0,0,0,5.546,0H.625A.672.672,0,0,0,0,.625V13.747a2.08,2.08,0,0,0,.234.937l2.89,4.608a1.407,1.407,0,0,0,1.25.7H8.28c2.734,0,4.765-.7,6.093-2.187A8.209,8.209,0,0,0,16.4,11.951a7.81,7.81,0,0,0-2.031-5.78",
            fill: "#223e77"
        }));
        Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["registerBlockType"])('bibliodam-connect/bc-block', {
            title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])(pluginTitle, pluginName),
            description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Integration of BiblioDAM media onto your WordPress website.', pluginName),
            icon: {
                src: icon
            },
            category: 'layout',
            keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Dam', pluginName), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Picker', pluginName), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Media', pluginName), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Video', pluginName), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Image', pluginName)],
            attributes: {
                mediaArray: {
                    type: 'array',
                    default: []
                },
                content: {
                    type: 'string',
                    source: 'html',
                    selector: '.shortcode_body'
                },
                button: {
                    type: 'string',
                    source: 'text'
                },
                alignment: {
                    type: 'string',
                    default: 'none'
                }
            },
            edit: function edit(props) {
                var className = props.className,
                    _props$attributes = props.attributes,
                    mediaArray = _props$attributes.mediaArray,
                    alignment = _props$attributes.alignment,
                    setAttributes = props.setAttributes;

                var onChangeMedia = function onChangeMedia(media) {
                    setAttributes(_objectSpread(_objectSpread({}, props.attributes), {}, {
                        mediaArray: _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(media)
                    }));
                };

                var handleReceivedMessage = function handleReceivedMessage(event) {
                    if (event.data) {
                        var req = JSON.parse(event.data);

                        switch (req.request) {
                            case 'config':
                                damLauncher.handleConfigRequest();
                                break;

                            case 'baobabCP':
                                damLauncher.handleBaobabAuthRequest();
                                break;

                            case 'selected':
                            case 'selected2':
                                var mediaItems = req.items.filter(function (media) {
                                    return media['@type'] === "ExistingImage" || media['@type'] === "Video";
                                });
                                damLauncher.cl.close();
                                onChangeMedia(mediaItems);
                                window.removeEventListener('message', handleReceivedMessage, true);
                                break;

                            case 'selected-article':
                            case 'selected-article2':
                                let articleMediaItems = [];
                                req.items.forEach(function (article) {
                                    if (article.hasOwnProperty("media")) {
                                        article.media.forEach(function (media) {
                                            if (media['@type'] === "ExistingImage" || media['@type'] === "Video") {
                                                articleMediaItems.push(media);
                                            }
                                        });
                                    }
                                });
                                damLauncher.cl.close();
                                onChangeMedia(articleMediaItems);
                                window.removeEventListener('message', handleReceivedMessage, true);
                                break;
                            default:
                                console.warn('Unsupported request: %s', event.data);
                        }
                    }
                };

                var onLauncher = function onLauncher() {
                    damLauncher.popupWithUrl("".concat(damLauncher.cfg.domain).concat(damLauncher.cfg.searchFrag));
                    window.addEventListener('message', handleReceivedMessage, true);
                };

                var onChangeContent = function onChangeContent(newContent) {
                    setAttributes({
                        content: newContent
                    });
                };

                var onChangeAlignment = function onChangeAlignment(newAlignment) {
                    props.setAttributes({
                        alignment: newAlignment === undefined ? 'none' : newAlignment
                    });
                };

                var damMediaButtons = function damMediaButtons(media) {
                    if (media.length === 0) {
                        return null;
                    }

                    if (media[0]['@type'] === 'ExistingImage') {
                        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["BlockControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["BlockAlignmentToolbar"], {
                            value: alignment,
                            onChange: onChangeAlignment
                        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Toolbar"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
                            onClick: onLauncher,
                            title: pluginTitle,
                            label: "Replace",
                            value: "Replace",
                            className: "replace_dam",
                        }, "Replace Video")));
                    } else {
                        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["BlockControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Toolbar"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
                            onClick: onLauncher,
                            title: pluginTitle,
                            label: "Replace",
                            value: "Replace",
                            className: "replace_dam",
                        }, "Replace Video")));
                    }
                };

                var renderMediaItemsEdit = function renderMediaItemsEdit(media) {

                    if (media.length === 0) {
                        return null;
                    }

                    return media.map(function (mediaItem) {
                        switch (mediaItem['@type']) {
                            case "ExistingImage":
                                return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("figure", {
                                    className: "align ".concat(alignment, " wp-block-image size-large")
                                }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
                                    src: mediaItem.imageURL,
                                    alt: mediaItem.hasOwnProperty("articleMetadata") && mediaItem.articleMetadata.hasOwnProperty("titleName") ? mediaItem.articleMetadata.titleName : "No Caption",
                                    width: mediaItem.width,
                                    height: mediaItem.height
                                }));

                            case "Video":
                                const figureStyle = {
                                    position: "relative",
                                    textAlign: "center",
                                };

                                const playButtonContainerStyle = {
                                    position: "absolute",
                                    top: "50%",
                                    left: "50%",
                                    transform: "translate(-50%, -50%)",
                                    width: "60px", // Adjust the size of the circle as needed
                                    height: "60px", // Adjust the size of the circle as needed
                                    borderRadius: "50%", // Make it a circle
                                    backgroundColor: "rgba(0, 0, 0, 0.5)", // Semi-transparent black circle background
                                    display: "flex",
                                    alignItems: "center",
                                    justifyContent: "center",
                                };

                                const playButtonStyle = {
                                    fontSize: "24px", // Adjust the size of the play button as needed
                                    color: "white", // White play button color
                                };

                                return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("figure", { style: figureStyle },
                                    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
                                        src: mediaItem.videoThumbnail,
                                        alt: "Video Thumbnail"
                                    }),
                                    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", { style: playButtonContainerStyle },
                                        Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", { style: playButtonStyle }, "\u25B6")
                                    )
                                );

                            default:
                                return null;
                        }
                    });
                };

                if (mediaArray.length > 0) {
                    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                        className: className,
                        align: alignment
                    }, damMediaButtons(mediaArray), renderMediaItemsEdit(mediaArray));
                } else {
                    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                        className: className
                    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                        className: "components-placeholder block-editor-media-placeholder wp-block-image is-large"
                    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                        className: "components-placeholder__label"
                    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
                        className: "block-editor-block-icon"
                    }, icon), "Media Select"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                        className: "components-placeholder__instructions"
                    }, "Select an image or video, pick one from the media library, or search for one."), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
                        className: "button button-large",
                        label: 'Change BiblioDam Media',
                        onClick: onLauncher
                    }, "Select BiblioDAM Media")));
                }
            },
            save: function save(props) {
                var className = props.className,
                    _props$attributes2 = props.attributes,
                    mediaArray = _props$attributes2.mediaArray,
                    alignment = _props$attributes2.alignment;

                var renderMediaItems = function renderMediaItems(media) {
                    if (media.length === 0) {
                        return null;
                    }

                    return media.map(function (mediaItem) {
                        switch (mediaItem['@type']) {
                            case "ExistingImage":
                                return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("figure", {
                                    className: "align ".concat(alignment, " wp-block-image size-large")
                                }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
                                    src: mediaItem.imageURL,
                                    alt: mediaItem.hasOwnProperty('articleMetadata') && mediaItem.articleMetadata.hasOwnProperty('titleName') ? mediaItem.articleMetadata.titleName : "No Caption",
                                }));

                            case "Video":
                                return '[imigino_video url="' + mediaItem.url + '" title="' + mediaItem.usage.Headline + '"]'
                            default:
                                return null;
                        }
                    });
                };

                return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
                    className: "media"
                }, renderMediaItems(mediaArray));
            }
        });

        /***/
    }),

    /***/ "@wordpress/block-editor":
    /*!**********************************************!*\
      !*** external {"this":["wp","blockEditor"]} ***!
      \**********************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        (function () {
            module.exports = this["wp"]["blockEditor"];
        }());

        /***/
    }),

    /***/ "@wordpress/blocks":
    /*!*****************************************!*\
      !*** external {"this":["wp","blocks"]} ***!
      \*****************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        (function () {
            module.exports = this["wp"]["blocks"];
        }());

        /***/
    }),

    /***/ "@wordpress/components":
    /*!*********************************************!*\
      !*** external {"this":["wp","components"]} ***!
      \*********************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        (function () {
            module.exports = this["wp"]["components"];
        }());

        /***/
    }),

    /***/ "@wordpress/element":
    /*!******************************************!*\
      !*** external {"this":["wp","element"]} ***!
      \******************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        (function () {
            module.exports = this["wp"]["element"];
        }());

        /***/
    }),

    /***/ "@wordpress/i18n":
    /*!***************************************!*\
      !*** external {"this":["wp","i18n"]} ***!
      \***************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        (function () {
            module.exports = this["wp"]["i18n"];
        }());

        /***/
    })

    /******/
});
//# sourceMappingURL=index.js.map
