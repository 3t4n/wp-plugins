/*! Build: 10/19/2024, 5:50:34 PM */
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/gutenberg.block.js":
/*!***********************************!*\
  !*** ./src/js/gutenberg.block.js ***!
  \***********************************/
/***/ (() => {

eval("(function (blocks, element) {\n    const el = element.createElement;\n    const bl = blocks.registerBlockType;\n\n    let iconSvg = el('svg', {width: 20, height: 20},\n        el('path', {d: \"M10,0C4.478,0,0,4.478,0,10c0,5.521,4.478,10,10,10c5.521,0,10-4.479,10-10C20,4.478,15.521,0,10,0zM5.039,9.226c-0.786,0-1.425,0.765-1.425,1.705H2.576c0-1.512,1.104-2.742,2.462-2.742s2.463,1.23,2.463,2.742H6.463C6.463,9.991,5.825,9.226,5.039,9.226z M10,18.049c-3.417,0-6.188-2.41-6.188-5.382h12.375C16.188,15.639,13.418,18.049,10,18.049zM16.387,10.931c0-0.94-0.639-1.705-1.426-1.705c-0.785,0-1.424,0.765-1.424,1.705h-1.039c0-1.512,1.105-2.742,2.463-2.742s2.463,1.23,2.463,2.742H16.387z\"})\n    );\n\n    const getRandomNumber = () => {\n        const randomArray = new Uint32Array(1);\n        window.crypto.getRandomValues(randomArray);\n        return randomArray[0] % 8388607;\n    };\n\n    bl('da-reactions/gutenberg-block', {\n        title: 'Reactions',\n        icon: iconSvg,\n        category: 'widgets',\n        attributes: {\n            myId: {\n                type: 'string',\n                source: 'attribute',\n                default: getRandomNumber(),\n                selector: 'div.gutenberg-block',\n                attribute: 'data-id'\n            },\n        },\n\n        edit: (props) => {\n\n            let dataId = props.attributes.myId;\n\n            const twins = document.querySelectorAll(`div[data-id=\"${dataId}\"]`)\n\n            if (twins.length > 1) {\n                dataId++;\n                props.setAttributes({myId: dataId});\n            }\n\n            return el(\n                'div',\n                {\n                    'class': 'da-reactions-container-async gutenberg-block',\n                    'data-id': dataId\n                },\n                [\n                    el(\n                        'img',\n                        {\n                            src: DaReactionsGutenbergBlock.preview_image\n                        }\n                    )\n                ]\n            );\n        },\n\n        save: (props) => {\n            let dataId = props.attributes.myId;\n\n            return el(\n                'div',\n                {},\n                [\n                    el(\n                        'div',\n                        {\n                            class: 'da-reactions-outer T' + DaReactionsGutenbergBlock.item_type + 'ID' + dataId\n                        },\n                        [\n                            el(\n                                'div',\n                                {\n                                    'class': 'da-reactions-container-async gutenberg-block',\n                                    'data-id': dataId,\n                                    'data-type': DaReactionsGutenbergBlock.item_type\n                                },\n                                el(\n                                    'div',\n                                    {\n                                        'class': 'da-reactions-' + DaReactionsGutenbergBlock.use_template\n                                    }, {},\n                                    [\n                                        el(\n                                            'img',\n                                            {\n                                                src: DaReactionsGutenbergBlock.loader_url,\n                                                width: DaReactionsGutenbergBlock.button_size,\n                                                height: DaReactionsGutenbergBlock.button_size,\n                                                style: `width:${DaReactionsGutenbergBlock.button_size}px;height:${DaReactionsGutenbergBlock.button_size}px;`\n                                            }\n                                        )\n                                    ]\n                                )\n                            )\n                        ]\n                    )\n                ]\n            );\n        }\n    });\n\n}(window.wp.blocks, window.wp.element));\n\n\n//# sourceURL=webpack://da-reactions-assets/./src/js/gutenberg.block.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/gutenberg.block.js"]();
/******/ 	
/******/ })()
;