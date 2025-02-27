/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.react.js":
/*!****************************************************************************************!*\
  !*** ./node_modules/@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.react.js ***!
  \****************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

/*!
 * 
 * React FontIconPicker
 * 
 * React Component to show a picker element to pick font-icons & svg
 * 
 * @author Swashata Ghosh <swashata@wpquark.com>
 * @version 1.2.0
 * @link https://github.com/fontIconPicker/react-fonticonpicker
 * @license MIT
 * 
 * Copyright (c) 2018 Swashata Ghosh <swashata@wpquark.com>
 * 
 * This software is released under the MIT License.
 * https://opensource.org/licenses/MIT
 * 
 */
!function(e,t){ true?module.exports=t(__webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js"),__webpack_require__(/*! react */ "react"),__webpack_require__(/*! classnames */ "./node_modules/classnames/index.js"),__webpack_require__(/*! react-dom */ "react-dom"),__webpack_require__(/*! react-transition-group */ "./node_modules/react-transition-group/esm/index.js")):0}(window,function(e,t,r,n,a){return function(e){var t={};function r(n){if(t[n])return t[n].exports;var a=t[n]={i:n,l:!1,exports:{}};return e[n].call(a.exports,a,a.exports,r),a.l=!0,a.exports}return r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:n})},r.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=15)}([function(t,r){t.exports=e},function(e,r){e.exports=t},function(e,t,r){"use strict";function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function a(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function o(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}Object.defineProperty(t,"__esModule",{value:!0}),t.flattenPossiblyCategorizedSource=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;if(Array.isArray(e))return o(e);if(null!==t)return void 0!==e[t]?o(e[t]):[];var r=[],n=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{},n=Object.keys(r);"function"==typeof Object.getOwnPropertySymbols&&(n=n.concat(Object.getOwnPropertySymbols(r).filter(function(e){return Object.getOwnPropertyDescriptor(r,e).enumerable}))),n.forEach(function(t){a(e,t,r[t])})}return e}({},e);return Object.keys(n).forEach(function(e){r=o(r).concat(o(n[e]))}),r},t.getPossibleCategories=function(e){return Array.isArray(e)?null:Object.keys(e)},t.convertToHex=function(e){return String.fromCodePoint(parseInt(e,10))},t.isArrayEqual=function(e,t){if(!Array.isArray(e)||!Array.isArray(t))return!1;var r=o(e);r.sort();var n=o(t);return n.sort(),JSON.stringify(r)===JSON.stringify(n)},t.getOffset=function(e){var t=e.getBoundingClientRect(),r=window.pageXOffset||document.documentElement.scrollLeft,n=window.pageYOffset||document.documentElement.scrollTop;return{top:t.top+n,left:t.left+r}},t.getSourceType=function(e){return null===e?"null":"object"!==n(e)||Array.isArray(e)?Array.isArray(e)?"array":n(e):"object"},t.InvalidSourceException=function(e,t){this.givenType=e,this.requiredType=t,this.message="Expected of type: ".concat(this.requiredType,", found: ").concat(this.givenType),this.toString=function(){return"Invalid Source Exception: ".concat(this.message)}},t.fuzzySearch=function(e,t){e=e.toLowerCase();var r=(t=t.toLowerCase()).length,n=e.length;if(n>r)return!1;if(n===r)return e===t;e:for(var a=0,o=0;a<n;a++){for(var l=e.codePointAt(a);o<r;)if(t.codePointAt(o++)===l)continue e;return!1}return!0},t.debounce=void 0,t.debounce=function(e,t){var r;return function(){var n=this,a=arguments;clearTimeout(r),r=setTimeout(function(){return e.apply(n,a)},t)}}},function(e,t){e.exports=r},,,function(e,t){e.exports=n},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=u(r(1)),a=r(6),o=u(r(0)),l=u(r(3)),i=r(2);function u(e){return e&&e.__esModule?e:{default:e}}function c(e){return(c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function s(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function f(e,t,r){return t&&s(e.prototype,t),r&&s(e,r),e}function d(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var p=function(e){function t(e){var r,n;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),this,n=(t.__proto__||Object.getPrototypeOf(t)).call(this,e),r=!n||"object"!==c(n)&&"function"!=typeof n?d(this):n,Object.defineProperty(d(r),"syncPortalPosition",{configurable:!0,enumerable:!0,writable:!0,value:function(){r.resetPortalPosition(),r.fixWindowOverflow()}}),Object.defineProperty(d(r),"fixWindowOverflow",{configurable:!0,enumerable:!0,writable:!0,value:function(){var e=r.props.domRef.current.offsetWidth,t=r.props.domRef.current.offsetHeight,n=window,a=n.innerWidth,o=n.pageYOffset,l=document.documentElement.clientHeight,u=(0,i.getOffset)(r.props.domRef.current),c=u.left,s=u.top,f="self"===r.state.appendRoot?r.props.domRef.current:r.state.appendRoot,d=(0,i.getOffset)(f),p=r.props.btnRef.current,h=r.props.domRef.current,y=(0,i.getOffset)(p),b=getComputedStyle(p),g=(parseInt(b.borderTop,10)||0)+(parseInt(b.borderBottom,10)||0);if(c+e>a-20){var m=y.left+r.props.btnRef.current.offsetWidth-(e+d.left);m+d.left<0&&(m=10-d.left),h.style.left="".concat(m,"px")}t+s-o>l&&y.top-t>0&&("self"===r.state.appendRoot?h.style.top="-".concat(t-g,"px"):h.style.top="".concat(y.top+g-t,"px"))}}),r.state={},r.debouncedSyncPortalPosition=(0,i.debounce)(r.syncPortalPosition,250),r}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),f(t,null,[{key:"getDerivedStateFromProps",value:function(e){var r=t.calculateAppendAndClass(e.appendRoot);return{appendRoot:r.appendRoot,portalClasses:r.portalClasses}}},{key:"calculateAppendAndClass",value:function(e){var t="self",r=(0,l.default)({"rfipdropdown--portal":!1!==e});return!1!==e&&(t=document.querySelector(e)),{portalClasses:r,appendRoot:t}}}]),f(t,[{key:"componentDidMount",value:function(){window.addEventListener("resize",this.debouncedSyncPortalPosition),window.addEventListener("scroll",this.debouncedSyncPortalPosition),this.syncPortalPosition()}},{key:"componentDidUpdate",value:function(){this.syncPortalPosition()}},{key:"componentWillUnmount",value:function(){window.removeEventListener("resize",this.debouncedSyncPortalPosition),window.removeEventListener("scroll",this.debouncedSyncPortalPosition)}},{key:"positionPortal",value:function(){var e=this.props.domRef.current.style.display;this.props.domRef.current.style.display="none";var t=this.props.btnRef.current,r=(0,i.getOffset)(t),n=(0,i.getOffset)(this.state.appendRoot),a=t.offsetHeight;this.props.domRef.current.style.left="".concat(r.left-n.left,"px"),this.props.domRef.current.style.top="".concat(r.top+a,"px"),this.props.domRef.current.style.display=e}},{key:"resetPortalPosition",value:function(){var e=this.props.domRef.current;"self"===this.state.appendRoot?e.style.top="":this.positionPortal()}},{key:"render",value:function(){var e=(0,l.default)(this.props.className,this.state.portalClasses),t=n.default.createElement("div",{className:e,ref:this.props.domRef},this.props.children);return"self"===this.state.appendRoot?t:(0,a.createPortal)(t,this.state.appendRoot)}}]),t}();Object.defineProperty(p,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{appendRoot:o.default.oneOfType([o.default.bool,o.default.string]),children:o.default.node.isRequired,domRef:o.default.object.isRequired,btnRef:o.default.object.isRequired,className:o.default.string.isRequired}}),Object.defineProperty(p,"defaultProps",{configurable:!0,enumerable:!0,writable:!0,value:{appendRoot:!1}});var h=p;t.default=h},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=i(r(1)),a=i(r(0)),o=i(r(3)),l=r(2);function i(e){return e&&e.__esModule?e:{default:e}}function u(e){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function c(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function s(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function f(e,t,r){return t&&s(e.prototype,t),r&&s(e,r),e}function d(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var p=function(e){function t(e){var r,n;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),this,n=(t.__proto__||Object.getPrototypeOf(t)).call(this,e),r=!n||"object"!==u(n)&&"function"!=typeof n?d(this):n,Object.defineProperty(d(r),"handleChangePage",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,a=r.props.currentPage,o=r.state.totalPage;null!==n?"next"===n?a+=1:a-=1:a=parseInt(e.target.value,10)-1,a<0&&(a=0),a>o-1&&(a=o-1),t=a+1,null===n&&Number.isNaN(a)&&(a=0,t=""),r.setState({viewPage:t}),r.props.handleChangePage(a)}}),Object.defineProperty(d(r),"handlePageKeyBoard",{configurable:!0,enumerable:!0,writable:!0,value:function(e,t){13!==e.keyCode&&32!==e.keyCode||r.handleChangePage({},t)}}),Object.defineProperty(d(r),"handleChangeValue",{configurable:!0,enumerable:!0,writable:!0,value:function(e){r.props.handleChangeValue(e)}}),Object.defineProperty(d(r),"handleValueKeyboard",{configurable:!0,enumerable:!0,writable:!0,value:function(e,t){13!==e.keyCode&&32!==e.keyCode||r.handleChangeValue(t)}}),r.state={viewPage:r.props.currentPage+1},r}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),f(t,null,[{key:"getDerivedStateFromProps",value:function(e,r){var n=t.getCategoryFilteredState(e.currentCategory,e.categories,e.icons),a=t.getCategoryFilteredState(e.currentCategory,e.categories,null===e.search?e.icons:e.search),o=t.getActiveIcons(n,a,e.currentSearch),l=o.activeIcons,i=o.activeTitles,u=e.currentPage,c=e.iconsPerPage,s={iconView:t.getCurrentViewIcons(l,c,u),titleView:t.getCurrentViewIcons(i,c,u),totalPage:Math.ceil(l.length/c)};return""!==r.viewPage&&(s.viewPage=e.currentPage+1),s}},{key:"getActiveIcons",value:function(e,t,r){var n=c(e),a=c(t);if(""===r||null===r)return{activeIcons:n,activeTitles:a};var o=[],i=[];return n.forEach(function(e,n){(0,l.fuzzySearch)(r,t[n])&&(o.push(e),i.push(t[n]))}),{activeIcons:o,activeTitles:i}}},{key:"getCategoryFilteredState",value:function(e,t,r){var n=null,a=(0,l.getSourceType)(r);if(Array.isArray(t)){if("object"!==a)throw new l.InvalidSourceException(a,"object")}else if("array"!==a)throw new l.InvalidSourceException(a,"array");return 0!==e&&Array.isArray(t)&&(n=t[e]||null),(0,l.flattenPossiblyCategorizedSource)(r,n)}},{key:"getCurrentViewIcons",value:function(e,t,r){var n=r*t,a=(r+1)*t;return e.slice(n,a)}}]),f(t,[{key:"renderPager",value:function(){var e=this;if(this.state.totalPage<1)return null;var t=this.props.currentPage>0?n.default.createElement("span",{className:"rfipicons__left",role:"button",tabIndex:0,onKeyDown:function(t){return e.handlePageKeyBoard(t,"prev")},onClick:function(t){return e.handleChangePage(t,"prev")}},n.default.createElement("span",{role:"presentation",className:"rfipicons__label","aria-label":"Left"},n.default.createElement("i",{className:"fipicon-angle-left"}))):null,r=this.props.currentPage<this.state.totalPage-1?n.default.createElement("span",{className:"rfipicons__right",role:"button",tabIndex:0,onKeyDown:function(t){return e.handlePageKeyBoard(t,"next")},onClick:function(t){return e.handleChangePage(t,"next")}},n.default.createElement("span",{role:"presentation",className:"rfipicons__label","aria-label":"Right"},n.default.createElement("i",{className:"fipicon-angle-right"}))):null;return n.default.createElement("div",{className:"rfipicons__pager"},n.default.createElement("div",{className:"rfipicons__num"},n.default.createElement("input",{value:this.state.viewPage,onChange:this.handleChangePage,className:"rfipicons__cp",type:"tel",min:1}),n.default.createElement("span",{className:"rfipicons__sp"},"/"),n.default.createElement("span",{className:"rfipicons__tp"},this.state.totalPage)),n.default.createElement("div",{className:"rfipicons__arrow"},t,r))}},{key:"renderIconView",value:function(){var e=this;return this.state.totalPage>0?this.state.iconView.map(function(t,r){var a=(0,o.default)("rfipicons__icon",{"rfipicons__icon--selected":e.props.value===t||Array.isArray(e.props.value)&&e.props.value.includes(t)});return n.default.createElement("span",{className:a,key:t,title:e.state.titleView[r]},n.default.createElement("span",{className:"rfipicons__ibox",tabIndex:0,role:"button",onClick:function(){return e.handleChangeValue(t)},onKeyDown:function(r){return e.handleValueKeyboard(r,t)}},e.props.renderIcon(t)))}):n.default.createElement("span",{className:"rfipicons__icon--error"},n.default.createElement("span",{className:"rfipicons__ibox--error"},this.props.noIconPlaceholder))}},{key:"render",value:function(){return n.default.createElement("div",{className:"rfipicons"},this.renderPager(),n.default.createElement("div",{className:"rfipicons__selector"},this.renderIconView()))}}]),t}();Object.defineProperty(p,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{categories:a.default.arrayOf(a.default.string),currentCategory:a.default.number,isMulti:a.default.bool.isRequired,icons:a.default.oneOfType([a.default.arrayOf(a.default.string),a.default.arrayOf(a.default.number),a.default.objectOf(a.default.oneOfType([a.default.arrayOf(a.default.number),a.default.arrayOf(a.default.string)]))]).isRequired,search:a.default.oneOfType([a.default.objectOf(a.default.arrayOf(a.default.string)),a.default.arrayOf(a.default.string)]),value:a.default.oneOfType([a.default.number,a.default.string,a.default.arrayOf(a.default.oneOfType([a.default.number,a.default.string]))]).isRequired,currentSearch:a.default.string.isRequired,handleChangeValue:a.default.func.isRequired,currentPage:a.default.number.isRequired,iconsPerPage:a.default.number.isRequired,handleChangePage:a.default.func.isRequired,renderIcon:a.default.func.isRequired,noIconPlaceholder:a.default.string.isRequired}}),Object.defineProperty(p,"defaultProps",{configurable:!0,enumerable:!0,writable:!0,value:{categories:null,currentCategory:null,search:null}});var h=p;t.default=h},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=o(r(1)),a=o(r(0));function o(e){return e&&e.__esModule?e:{default:e}}var l=function(e){return n.default.createElement("div",{className:"rfipsearch"},n.default.createElement("input",{type:"text",className:"rfipsearch__input",value:e.value,onChange:e.handleSearch,placeholder:e.placeholder}))};l.propTypes={handleSearch:a.default.func.isRequired,value:a.default.string.isRequired,placeholder:a.default.string.isRequired};var i=l;t.default=i},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=o(r(1)),a=o(r(0));function o(e){return e&&e.__esModule?e:{default:e}}function l(e){return(l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function i(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var u=function(e){function t(){return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),function(e,t){return!t||"object"!==l(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}var r,a;return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),r=t,(a=[{key:"render",value:function(){return n.default.createElement("div",{className:"rfipcategory"},n.default.createElement("select",{className:"rfipcategory__select",onChange:this.props.handleCategory,value:this.props.value},this.props.categories.map(function(e,t){return n.default.createElement("option",{className:"rfipcategory__select__option",key:e,value:t},e)})),n.default.createElement("i",{className:"fipicon-angle-down",role:"presentation","aria-label":"Open"}))}}])&&i(r.prototype,a),t}();Object.defineProperty(u,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{handleCategory:a.default.func.isRequired,value:a.default.number.isRequired,categories:a.default.arrayOf(a.default.string).isRequired}});var c=u;t.default=c},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=c(r(1)),a=c(r(0)),o=c(r(10)),l=c(r(9)),i=c(r(8)),u=r(2);function c(e){return e&&e.__esModule?e:{default:e}}function s(e){return(s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function f(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function d(e,t,r){return t&&f(e.prototype,t),r&&f(e,r),e}function p(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var h=function(e){function t(e){var r,n;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),this,n=(t.__proto__||Object.getPrototypeOf(t)).call(this,e),r=!n||"object"!==s(n)&&"function"!=typeof n?p(this):n,Object.defineProperty(p(r),"handleCategory",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=parseInt(e.target.value,10);Number.isNaN(t)&&(t=0),r.props.handleChangeCategory(t),r.props.handleChangePage(0)}}),Object.defineProperty(p(r),"handleSearch",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.target.value;r.props.handleChangeSearch(t)}}),r.state={},r}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),d(t,null,[{key:"getDerivedStateFromProps",value:function(e){var t=(0,u.getPossibleCategories)(e.icons);return null!==t&&(t=[e.allCatPlaceholder].concat(function(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}(t))),{categories:t,searchString:e.currentSearch}}}]),d(t,[{key:"render",value:function(){return n.default.createElement("div",{className:"rfipdropdown__selector"},this.props.showSearch?n.default.createElement(l.default,{handleSearch:this.handleSearch,value:this.state.searchString,placeholder:this.props.searchPlaceholder}):null,this.props.showCategory&&this.state.categories&&this.state.categories.length?n.default.createElement(o.default,{handleCategory:this.handleCategory,value:this.props.currentCategory,categories:this.state.categories}):null,n.default.createElement(i.default,{categories:this.state.categories,currentCategory:this.props.currentCategory,isMulti:this.props.isMulti,icons:this.props.icons,search:this.props.search,value:this.props.value,currentSearch:this.props.currentSearch,handleChangeValue:this.props.handleChangeValue,currentPage:this.props.currentPage,iconsPerPage:this.props.iconsPerPage,handleChangePage:this.props.handleChangePage,renderIcon:this.props.renderIcon,noIconPlaceholder:this.props.noIconPlaceholder}))}}]),t}();Object.defineProperty(h,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{isMulti:a.default.bool.isRequired,value:a.default.oneOfType([a.default.number,a.default.string,a.default.arrayOf(a.default.any)]).isRequired,currentCategory:a.default.number.isRequired,currentPage:a.default.number.isRequired,currentSearch:a.default.string.isRequired,icons:a.default.oneOfType([a.default.arrayOf(a.default.number),a.default.arrayOf(a.default.string),a.default.objectOf(a.default.oneOfType([a.default.arrayOf(a.default.number),a.default.arrayOf(a.default.string)]))]).isRequired,search:a.default.oneOfType([a.default.object,a.default.arrayOf(a.default.string)]),showCategory:a.default.bool.isRequired,showSearch:a.default.bool.isRequired,iconsPerPage:a.default.number.isRequired,allCatPlaceholder:a.default.string.isRequired,searchPlaceholder:a.default.string.isRequired,noIconPlaceholder:a.default.string.isRequired,renderIcon:a.default.func.isRequired,handleChangeValue:a.default.func.isRequired,handleChangeCategory:a.default.func.isRequired,handleChangePage:a.default.func.isRequired,handleChangeSearch:a.default.func.isRequired}}),Object.defineProperty(h,"defaultProps",{configurable:!0,enumerable:!0,writable:!0,value:{search:null}});var y=h;t.default=y},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=l(r(1)),a=l(r(0)),o=l(r(3));function l(e){return e&&e.__esModule?e:{default:e}}function i(e){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function u(){return(u=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e}).apply(this,arguments)}function c(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function s(e,t){return!t||"object"!==i(t)&&"function"!=typeof t?f(e):t}function f(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var d=function(e){function t(){var e,r,a;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);for(var o=arguments.length,l=new Array(o),i=0;i<o;i++)l[i]=arguments[i];return s(a,(r=a=s(this,(e=t.__proto__||Object.getPrototypeOf(t)).call.apply(e,[this].concat(l))),Object.defineProperty(f(a),"handleClick",{configurable:!0,enumerable:!0,writable:!0,value:function(){a.props.onClick()}}),Object.defineProperty(f(a),"handleKeyDown",{configurable:!0,enumerable:!0,writable:!0,value:function(e){32!==e.keyCode&&13!==e.keyCode||a.props.onClick()}}),Object.defineProperty(f(a),"handleDelete",{configurable:!0,enumerable:!0,writable:!0,value:function(e,t){e.stopPropagation(),a.props.handleDeleteValue(t)}}),Object.defineProperty(f(a),"handleDeleteKeyboard",{configurable:!0,enumerable:!0,writable:!0,value:function(e,t){32!==e.keyCode&&13!==e.keyCode||a.props.handleDeleteValue(t)}}),Object.defineProperty(f(a),"renderEmptyIcon",{configurable:!0,enumerable:!0,writable:!0,value:function(){return n.default.createElement("span",{className:"rfipbtn__icon--empty"},a.props.noSelectedPlaceholder)}}),r))}var r,a;return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),r=t,(a=[{key:"renderIcon",value:function(e){var t=this;return""===e||null===e||void 0===e?this.renderEmptyIcon():n.default.createElement("span",{className:"rfipbtn__icon",key:e},n.default.createElement("span",{className:"rfipbtn__elm"},this.props.renderIcon(e)),n.default.createElement("span",{className:"rfipbtn__del",onClick:function(r){return t.handleDelete(r,e)},onKeyDown:function(r){return t.handleDeleteKeyboard(r,e)},tabIndex:0,role:"button"},"×"))}},{key:"renderCurrentIcons",value:function(){var e=this;return this.props.isMulti?this.props.value.length?this.props.value.map(function(t){return e.renderIcon(t)}):this.renderEmptyIcon():this.renderIcon(this.props.value)}},{key:"render",value:function(){var e={onClick:this.handleClick,onKeyDown:this.handleKeyDown,onFocus:this.handleFocus,onBlur:this.handleBlur,tabIndex:0},t=(0,o.default)("rfipbtn__button","rfipbtn__button--".concat(this.props.isOpen?"open":"close")),r=(0,o.default)(this.props.className);return n.default.createElement("div",u({className:r,ref:this.props.domRef},e),n.default.createElement("div",{className:"rfipbtn__current"},this.renderCurrentIcons()),n.default.createElement("div",{className:t},n.default.createElement("i",{className:"fipicon-angle-down",role:"presentation","aria-label":"Open"})))}}])&&c(r.prototype,a),t}();Object.defineProperty(d,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{className:a.default.string.isRequired,isOpen:a.default.bool.isRequired,onClick:a.default.func.isRequired,domRef:a.default.object.isRequired,isMulti:a.default.bool.isRequired,value:a.default.oneOfType([a.default.number,a.default.string,a.default.arrayOf(a.default.oneOfType([a.default.number,a.default.string]))]).isRequired,renderIcon:a.default.func.isRequired,handleDeleteValue:a.default.func.isRequired,noSelectedPlaceholder:a.default.string.isRequired}});var p=d;t.default=p},function(e,t){e.exports=a},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=f(r(1)),a=f(r(0)),o=f(r(3)),l=r(13),i=f(r(12)),u=f(r(11)),c=f(r(7)),s=r(2);function f(e){return e&&e.__esModule?e:{default:e}}function d(e){return(d="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function p(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function h(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function y(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function b(e,t,r){return t&&y(e.prototype,t),r&&y(e,r),e}function g(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var m=[],v="",P=function(e){function t(e){var r,a;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),this,a=(t.__proto__||Object.getPrototypeOf(t)).call(this,e),r=!a||"object"!==d(a)&&"function"!=typeof a?g(this):a,Object.defineProperty(g(r),"handleOuterClick",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.target;r.isClickWithin(t)||r.closeDropdown()}}),Object.defineProperty(g(r),"handleEscapeKeyboard",{configurable:!0,enumerable:!0,writable:!0,value:function(e){27===e.keyCode&&r.closeDropdown()}}),Object.defineProperty(g(r),"isClickWithin",{configurable:!0,enumerable:!0,writable:!0,value:function(e){return r.fipButtonRef.current.contains(e)||r.fipDropDownRef.current&&r.fipDropDownRef.current.contains(e)}}),Object.defineProperty(g(r),"handleToggle",{configurable:!0,enumerable:!0,writable:!0,value:function(){r.setState(function(e){return r.handleDropDown(!e.isOpen,!1)})}}),Object.defineProperty(g(r),"closeDropdown",{configurable:!0,enumerable:!0,writable:!0,value:function(){r.handleDropDown(!1)}}),Object.defineProperty(g(r),"handleDropDown",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var n=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],a={isOpen:e};return a.elemClass=t.getDerivedClassName("rfip",r.props.theme,r.props.isMulti,e),a.btnClass=t.getDerivedClassName("rfipbtn",r.props.theme,r.props.isMulti,e),a.ddClass=t.getDerivedClassName("rfipdropdown",r.props.theme,r.props.isMulti,e),n&&r.setState(a),a}}),Object.defineProperty(g(r),"handleChangeValue",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t;r.props.isMulti?(t=p(r.state.value)).includes(e)?(t=t.filter(function(t){return t!==e})).length||(t=m):t.push(e):t=e===r.state.value?v:e,r.setState({value:t,isOpen:!r.props.closeOnSelect}),r.props.onChange(t)}}),Object.defineProperty(g(r),"handleDeleteValue",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var n;n=r.props.isMulti?r.state.value.filter(function(t){return t!==e}):t.getDerivedValue(n,r.props.isMulti),r.setState({value:n}),r.props.onChange(n)}}),Object.defineProperty(g(r),"handleChangePage",{configurable:!0,enumerable:!0,writable:!0,value:function(e){r.setState({currentPage:e})}}),Object.defineProperty(g(r),"handleChangeCategory",{configurable:!0,enumerable:!0,writable:!0,value:function(e){r.setState({currentCategory:e,currentPage:0})}}),Object.defineProperty(g(r),"handleChangeSearch",{configurable:!0,enumerable:!0,writable:!0,value:function(e){r.setState({currentSearch:e,currentPage:0})}}),Object.defineProperty(g(r),"resetPortalStyle",{configurable:!0,enumerable:!0,writable:!0,value:function(e){["maxHeight","paddingTop","paddingBottom"].forEach(function(t){e.style[t]=null})}}),Object.defineProperty(g(r),"handlePortalEnter",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.childNodes[0];r.resetPortalStyle(t);var n=getComputedStyle(t);r.fipPortalComputedStyle={height:n.height,paddingTop:n.paddingTop,paddingBottom:n.paddingBottom},["maxHeight","paddingTop","paddingBottom"].forEach(function(e){t.style[e]="0px"})}}),Object.defineProperty(g(r),"handlePortalEntering",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.childNodes[0];t.style.maxHeight=r.fipPortalComputedStyle.height,t.style.paddingTop=r.fipPortalComputedStyle.paddingTop,t.style.paddingBottom=r.fipPortalComputedStyle.paddingBottom}}),Object.defineProperty(g(r),"handlePortalEntered",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.childNodes[0];r.resetPortalStyle(t),r.props.showSearch&&void 0===window.orientation&&-1===navigator.userAgent.indexOf("IEMobile")&&t.querySelector(".rfipsearch__input").focus()}}),Object.defineProperty(g(r),"handlePortalExit",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.childNodes[0];r.resetPortalStyle(t);var n=getComputedStyle(t).height;t.style.maxHeight=n}}),Object.defineProperty(g(r),"handlePortalExiting",{configurable:!0,enumerable:!0,writable:!0,value:function(e){var t=e.childNodes[0];t.style.maxHeight="0px",t.style.paddingTop="0px",t.style.paddingBottom="0px"}}),Object.defineProperty(g(r),"renderIcon",{configurable:!0,enumerable:!0,writable:!0,value:function(e){if("function"==typeof r.props.renderFunc)return r.props.renderFunc(e);if("class"===r.props.renderUsing)return n.default.createElement("i",{className:e});var t=h({},r.props.renderUsing,r.props.convertHex?(0,s.convertToHex)(e):e);return n.default.createElement("i",t)}}),r.fipButtonRef=n.default.createRef(),r.fipDropDownRef=n.default.createRef(),r.state={currentCategory:0,currentPage:0,isOpen:!1,currentSearch:""},r.fipPortalComputedStyle=null,r}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,n.default.PureComponent),b(t,null,[{key:"getDerivedStateFromProps",value:function(e,r){var n={};return n.elemClass=t.getDerivedClassName("rfip",e.theme,e.isMulti,r.isOpen),n.btnClass=t.getDerivedClassName("rfipbtn",e.theme,e.isMulti,r.isOpen),n.ddClass=t.getDerivedClassName("rfipdropdown",e.theme,e.isMulti,r.isOpen),n.value=t.getDerivedValue(e.value,e.isMulti),e.showCategory||(n.currentCategory=0,n.currentPage=0),e.showSearch||(n.currentSearch="",n.currentPage=0),n}},{key:"getDerivedClassName",value:function(e,t,r,n){return(0,o.default)(e,"".concat(e,"--").concat(t),h({},"".concat(e,"--multi"),r),"".concat(e,"--").concat(n?"open":"close"))}},{key:"getDerivedValue",value:function(e,t){var r=e;return t?r=Array.isArray(e)?p(e):m:"number"!=typeof e&&"string"!=typeof e&&(r=v),r}}]),b(t,[{key:"componentDidMount",value:function(){var e=this;["click"].forEach(function(t){document.addEventListener(t,e.handleOuterClick,!1)}),document.addEventListener("keydown",this.handleEscapeKeyboard,!1),this.props.onChange(this.state.value)}},{key:"componentWillUnmount",value:function(){var e=this;["click"].forEach(function(t){document.removeEventListener(t,e.handleOuterClick,!1)}),document.removeEventListener("keydown",this.handleEscapeKeyboard,!1)}},{key:"render",value:function(){var e={currentCategory:this.state.currentCategory,currentPage:this.state.currentPage,currentSearch:this.state.currentSearch,value:this.state.value,isMulti:this.props.isMulti,icons:this.props.icons,search:this.props.search,showCategory:this.props.showCategory,showSearch:this.props.showSearch,iconsPerPage:this.props.iconsPerPage,allCatPlaceholder:this.props.allCatPlaceholder,searchPlaceholder:this.props.searchPlaceholder,noIconPlaceholder:this.props.noIconPlaceholder,renderIcon:this.renderIcon,handleChangeValue:this.handleChangeValue,handleChangeCategory:this.handleChangeCategory,handleChangePage:this.handleChangePage,handleChangeSearch:this.handleChangeSearch};return n.default.createElement("div",{className:this.state.elemClass,ref:this.fipRef},n.default.createElement(i.default,{className:this.state.btnClass,isOpen:this.state.isOpen,onClick:this.handleToggle,domRef:this.fipButtonRef,isMulti:this.props.isMulti,value:this.state.value,renderIcon:this.renderIcon,handleDeleteValue:this.handleDeleteValue,noSelectedPlaceholder:this.props.noSelectedPlaceholder}),n.default.createElement(l.CSSTransition,{classNames:"fipappear",timeout:300,in:this.state.isOpen,unmountOnExit:!0,onEnter:this.handlePortalEnter,onEntering:this.handlePortalEntering,onEntered:this.handlePortalEntered,onExit:this.handlePortalExit,onExiting:this.handlePortalExiting},n.default.createElement(c.default,{appendRoot:this.props.appendTo,domRef:this.fipDropDownRef,btnRef:this.fipButtonRef,className:this.state.ddClass},n.default.createElement(u.default,e))))}}]),t}();Object.defineProperty(P,"propTypes",{configurable:!0,enumerable:!0,writable:!0,value:{icons:a.default.oneOfType([a.default.arrayOf(a.default.string),a.default.arrayOf(a.default.number),a.default.objectOf(a.default.oneOfType([a.default.arrayOf(a.default.number),a.default.arrayOf(a.default.string)]))]).isRequired,search:a.default.oneOfType([a.default.objectOf(a.default.arrayOf(a.default.string)),a.default.arrayOf(a.default.string)]),iconsPerPage:a.default.number,theme:a.default.string,onChange:a.default.func.isRequired,showCategory:a.default.bool,showSearch:a.default.bool,value:a.default.oneOfType([a.default.arrayOf(a.default.string),a.default.arrayOf(a.default.number),a.default.number,a.default.string]),isMulti:a.default.bool,renderUsing:a.default.string,convertHex:a.default.bool,renderFunc:a.default.func,appendTo:a.default.oneOfType([a.default.bool,a.default.string]),allCatPlaceholder:a.default.string,searchPlaceholder:a.default.string,noIconPlaceholder:a.default.string,noSelectedPlaceholder:a.default.string,closeOnSelect:a.default.bool}}),Object.defineProperty(P,"defaultProps",{configurable:!0,enumerable:!0,writable:!0,value:{search:null,iconsPerPage:20,theme:"default",showCategory:!0,showSearch:!0,value:null,isMulti:!1,renderUsing:"class",convertHex:!0,renderFunc:null,appendTo:!1,allCatPlaceholder:"Show from all",searchPlaceholder:"Search Icons",noIconPlaceholder:"No icons found",noSelectedPlaceholder:"Select icon",closeOnSelect:!1}}),Object.defineProperty(P,"displayName",{configurable:!0,enumerable:!0,writable:!0,value:"FontIconPicker"});var O=P;t.default=O},function(e,t,r){"use strict";var n;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var a=((n=r(14))&&n.__esModule?n:{default:n}).default;t.default=a}]).default});
//# sourceMappingURL=fonticonpicker.react.js.map

/***/ }),

/***/ "./node_modules/@samuelmeuli/font-manager/dist/index.es.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@samuelmeuli/font-manager/dist/index.es.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "FONT_FAMILY_DEFAULT": () => (/* binding */ FONT_FAMILY_DEFAULT),
/* harmony export */   "FontManager": () => (/* binding */ FontManager),
/* harmony export */   "OPTIONS_DEFAULTS": () => (/* binding */ OPTIONS_DEFAULTS),
/* harmony export */   "getFontId": () => (/* binding */ getFontId)
/* harmony export */ });
/*! *****************************************************************************
Copyright (c) Microsoft Corporation. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License"); you may not use
this file except in compliance with the License. You may obtain a copy of the
License at http://www.apache.org/licenses/LICENSE-2.0

THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
MERCHANTABLITY OR NON-INFRINGEMENT.

See the Apache Version 2.0 License for specific language governing permissions
and limitations under the License.
***************************************************************************** */

var __assign = function() {
    __assign = Object.assign || function __assign(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};

function __rest(s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
}

function __awaiter(thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
}

function __generator(thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
}

function styleInject(css, ref) {
  if ( ref === void 0 ) ref = {};
  var insertAt = ref.insertAt;

  if (!css || typeof document === 'undefined') { return; }

  var head = document.head || document.getElementsByTagName('head')[0];
  var style = document.createElement('style');
  style.type = 'text/css';

  if (insertAt === 'top') {
    if (head.firstChild) {
      head.insertBefore(style, head.firstChild);
    } else {
      head.appendChild(style);
    }
  } else {
    head.appendChild(style);
  }

  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    style.appendChild(document.createTextNode(css));
  }
}

var css = "@charset \"UTF-8\";\ndiv[id^=font-picker] {\n  position: relative;\n  display: inline-block;\n  width: 200px;\n  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);\n}\ndiv[id^=font-picker] * {\n  box-sizing: border-box;\n}\ndiv[id^=font-picker] p {\n  margin: 0;\n  padding: 0;\n}\ndiv[id^=font-picker] button {\n  color: inherit;\n  font-size: inherit;\n  background: none;\n  border: 0;\n  outline: none;\n  cursor: pointer;\n}\ndiv[id^=font-picker] .dropdown-button {\n  display: flex;\n  align-items: center;\n  justify-content: space-between;\n  width: 100%;\n  height: 35px;\n  padding: 0 10px;\n  background: #cbcbcb;\n}\ndiv[id^=font-picker] .dropdown-button:hover, div[id^=font-picker] .dropdown-button:focus {\n  background: #bebebe;\n}\ndiv[id^=font-picker] .dropdown-button .dropdown-font-name {\n  overflow: hidden;\n  white-space: nowrap;\n}\ndiv[id^=font-picker] .dropdown-icon {\n  margin-left: 10px;\n}\n@-webkit-keyframes spinner {\n  to {\n    transform: rotate(360deg);\n  }\n}\n@keyframes spinner {\n  to {\n    transform: rotate(360deg);\n  }\n}\ndiv[id^=font-picker] .dropdown-icon.loading::before {\n  display: block;\n  width: 10px;\n  height: 10px;\n  border: 2px solid #b2b2b2;\n  border-top-color: #000000;\n  border-radius: 50%;\n  -webkit-animation: spinner 0.6s linear infinite;\n          animation: spinner 0.6s linear infinite;\n  content: \"\";\n}\ndiv[id^=font-picker] .dropdown-icon.finished::before {\n  display: block;\n  width: 0;\n  height: 0;\n  margin: 0 2px;\n  border-top: 6px solid #000000;\n  border-right: 5px solid transparent;\n  border-left: 5px solid transparent;\n  transition: transform 0.3s;\n  content: \"\";\n}\ndiv[id^=font-picker] .dropdown-icon.error::before {\n  content: \"⚠\";\n}\ndiv[id^=font-picker].expanded .dropdown-icon.finished::before {\n  transform: rotate(-180deg);\n}\ndiv[id^=font-picker].expanded ul {\n  max-height: 200px;\n}\ndiv[id^=font-picker] ul {\n  position: absolute;\n  z-index: 1;\n  width: 100%;\n  max-height: 0;\n  margin: 0;\n  padding: 0;\n  overflow-x: hidden;\n  overflow-y: auto;\n  background: #eaeaea;\n  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);\n  transition: 0.3s;\n  -webkit-overflow-scrolling: touch;\n}\ndiv[id^=font-picker] ul li {\n  height: 35px;\n  list-style: none;\n}\ndiv[id^=font-picker] ul li button {\n  display: flex;\n  align-items: center;\n  width: 100%;\n  height: 100%;\n  padding: 0 10px;\n  white-space: nowrap;\n}\ndiv[id^=font-picker] ul li button:hover, div[id^=font-picker] ul li button:focus {\n  background: #dddddd;\n}\ndiv[id^=font-picker] ul li button.active-font {\n  background: #d1d1d1;\n}";
styleInject(css);

function getFontId(fontFamily) {
    return fontFamily.replace(/\s+/g, "-").toLowerCase();
}
function validatePickerId(pickerId) {
    if (pickerId.match(/[^0-9a-z]/i)) {
        throw Error("The `pickerId` parameter may only contain letters and digits");
    }
}

function get(url) {
    return new Promise(function (resolve, reject) {
        var request = new XMLHttpRequest();
        request.overrideMimeType("application/json");
        request.open("GET", url, true);
        request.onreadystatechange = function () {
            if (request.readyState === 4) {
                if (request.status !== 200) {
                    reject(new Error("Response has status code " + request.status));
                }
                else {
                    resolve(request.responseText);
                }
            }
        };
        request.send();
    });
}

var LIST_BASE_URL = "https://www.googleapis.com/webfonts/v1/webfonts";
function getFontList(apiKey) {
    return __awaiter(this, void 0, void 0, function () {
        var url, response, json, fontsOriginal;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    url = new URL(LIST_BASE_URL);
                    url.searchParams.append("sort", "popularity");
                    url.searchParams.append("key", apiKey);
                    return [4, get(url.href)];
                case 1:
                    response = _a.sent();
                    json = JSON.parse(response);
                    fontsOriginal = json.items;
                    return [2, fontsOriginal.map(function (fontOriginal) {
                            var family = fontOriginal.family, subsets = fontOriginal.subsets, others = __rest(fontOriginal, ["family", "subsets"]);
                            return __assign(__assign({}, others), { family: family, id: getFontId(family), scripts: subsets });
                        })];
            }
        });
    });
}

var previewFontsStylesheet = document.createElement("style");
document.head.appendChild(previewFontsStylesheet);
function applyFontPreview(previewFont, selectorSuffix) {
    var fontId = getFontId(previewFont.family);
    var style = "\n\t\t\t#font-button-" + fontId + selectorSuffix + " {\n\t\t\t\tfont-family: \"" + previewFont.family + "\";\n\t\t\t}\n\t\t";
    previewFontsStylesheet.appendChild(document.createTextNode(style));
}
function getActiveFontStylesheet(selectorSuffix) {
    var stylesheetId = "active-font-" + selectorSuffix;
    var activeFontStylesheet = document.getElementById(stylesheetId);
    if (!activeFontStylesheet) {
        activeFontStylesheet = document.createElement("style");
        activeFontStylesheet.id = stylesheetId;
        document.head.appendChild(activeFontStylesheet);
    }
    return activeFontStylesheet;
}
function applyActiveFont(activeFont, previousFontFamily, selectorSuffix) {
    var style = "\n\t\t.apply-font" + selectorSuffix + " {\n\t\t\tfont-family: \"" + activeFont.family + "\"" + (previousFontFamily ? ", \"" + previousFontFamily + "\"" : "") + ";\n\t\t}\n\t";
    var activeFontStylesheet = getActiveFontStylesheet(selectorSuffix);
    activeFontStylesheet.innerHTML = style;
}

var PREVIEW_ATTRIBUTE_NAME = "data-is-preview";
function getStylesheetId(fontId) {
    return "font-" + fontId;
}
function stylesheetExists(fontId, isPreview) {
    var stylesheetNode = document.getElementById(getStylesheetId(fontId));
    if (isPreview === null || isPreview === undefined) {
        return stylesheetNode !== null;
    }
    return (stylesheetNode !== null &&
        stylesheetNode.getAttribute(PREVIEW_ATTRIBUTE_NAME) === isPreview.toString());
}
function createStylesheet(fontId, isPreview) {
    var stylesheetNode = document.createElement("style");
    stylesheetNode.id = getStylesheetId(fontId);
    stylesheetNode.setAttribute(PREVIEW_ATTRIBUTE_NAME, isPreview.toString());
    document.head.appendChild(stylesheetNode);
}
function fillStylesheet(fontId, styles) {
    var stylesheetId = getStylesheetId(fontId);
    var stylesheetNode = document.getElementById(stylesheetId);
    if (stylesheetNode) {
        stylesheetNode.textContent = styles;
    }
    else {
        console.error("Could not fill stylesheet: Stylesheet with ID \"" + stylesheetId + "\" not found");
    }
}
function setStylesheetType(fontId, isPreview) {
    var stylesheetId = getStylesheetId(fontId);
    var stylesheetNode = document.getElementById(stylesheetId);
    if (stylesheetNode) {
        stylesheetNode.setAttribute(PREVIEW_ATTRIBUTE_NAME, isPreview.toString());
    }
    else {
        console.error("Could not change stylesheet type: Stylesheet with ID \"" + stylesheetId + "\" not found");
    }
}

function getMatches(regex, str) {
    var matches = [];
    var match;
    do {
        match = regex.exec(str);
        if (match) {
            matches.push(match[1]);
        }
    } while (match);
    return matches;
}

var FONT_FACE_REGEX = /@font-face {([\s\S]*?)}/gm;
var FONT_FAMILY_REGEX = /font-family: ['"](.*?)['"]/gm;
function extractFontStyles(allFontStyles) {
    var rules = getMatches(FONT_FACE_REGEX, allFontStyles);
    var fontStyles = {};
    rules.forEach(function (rule) {
        var fontFamily = getMatches(FONT_FAMILY_REGEX, rule)[0];
        var fontId = getFontId(fontFamily);
        if (!(fontId in fontStyles)) {
            fontStyles[fontId] = "";
        }
        fontStyles[fontId] += "@font-face {\n" + rule + "\n}\n\n";
    });
    return fontStyles;
}

var FONT_BASE_URL = "https://fonts.googleapis.com/css";
function getStylesheet(fonts, scripts, variants, previewsOnly) {
    return __awaiter(this, void 0, void 0, function () {
        var url, variantsStr, familiesStr, familyNamesConcat, downloadChars;
        return __generator(this, function (_a) {
            url = new URL(FONT_BASE_URL);
            variantsStr = variants.join(",");
            familiesStr = fonts.map(function (font) { return font.family + ":" + variantsStr; });
            url.searchParams.append("family", familiesStr.join("|"));
            url.searchParams.append("subset", scripts.join(","));
            if (previewsOnly) {
                familyNamesConcat = fonts.map(function (font) { return font.family; }).join("");
                downloadChars = familyNamesConcat
                    .split("")
                    .filter(function (char, pos, self) { return self.indexOf(char) === pos; })
                    .join("");
                url.searchParams.append("text", downloadChars);
            }
            url.searchParams.append("font-display", "swap");
            return [2, get(url.href)];
        });
    });
}

function loadFontPreviews(fonts, scripts, variants, selectorSuffix) {
    return __awaiter(this, void 0, void 0, function () {
        var fontsArray, fontsToFetch, response, fontStyles;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    fontsArray = Array.from(fonts.values());
                    fontsToFetch = fontsArray
                        .map(function (font) { return font.id; })
                        .filter(function (fontId) { return !stylesheetExists(fontId); });
                    fontsToFetch.forEach(function (fontId) { return createStylesheet(fontId, true); });
                    return [4, getStylesheet(fontsArray, scripts, variants, true)];
                case 1:
                    response = _a.sent();
                    fontStyles = extractFontStyles(response);
                    fontsArray.forEach(function (font) {
                        applyFontPreview(font, selectorSuffix);
                        if (fontsToFetch.includes(font.id)) {
                            if (!(font.id in fontStyles)) {
                                console.error("Missing styles for font \"" + font.family + "\" (fontId \"" + font.id + "\") in Google Fonts response");
                                return;
                            }
                            fillStylesheet(font.id, fontStyles[font.id]);
                        }
                    });
                    return [2];
            }
        });
    });
}
function loadActiveFont(font, previousFontFamily, scripts, variants, selectorSuffix) {
    return __awaiter(this, void 0, void 0, function () {
        var fontStyle;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    if (!stylesheetExists(font.id, false)) return [3, 1];
                    applyActiveFont(font, previousFontFamily, selectorSuffix);
                    return [3, 3];
                case 1:
                    if (stylesheetExists(font.id, true)) {
                        setStylesheetType(font.id, false);
                    }
                    else {
                        createStylesheet(font.id, false);
                    }
                    return [4, getStylesheet([font], scripts, variants, false)];
                case 2:
                    fontStyle = _a.sent();
                    applyActiveFont(font, previousFontFamily, selectorSuffix);
                    fillStylesheet(font.id, fontStyle);
                    _a.label = 3;
                case 3: return [2];
            }
        });
    });
}

var FONT_FAMILY_DEFAULT = "Open Sans";
var OPTIONS_DEFAULTS = {
    pickerId: "",
    families: [],
    categories: [],
    scripts: ["latin"],
    variants: ["regular"],
    filter: function () { return true; },
    limit: 50,
    sort: "alphabet",
};

var FontManager = (function () {
    function FontManager(apiKey, defaultFamily, _a, onChange) {
        if (defaultFamily === void 0) { defaultFamily = FONT_FAMILY_DEFAULT; }
        var _b = _a.pickerId, pickerId = _b === void 0 ? OPTIONS_DEFAULTS.pickerId : _b, _c = _a.families, families = _c === void 0 ? OPTIONS_DEFAULTS.families : _c, _d = _a.categories, categories = _d === void 0 ? OPTIONS_DEFAULTS.categories : _d, _e = _a.scripts, scripts = _e === void 0 ? OPTIONS_DEFAULTS.scripts : _e, _f = _a.variants, variants = _f === void 0 ? OPTIONS_DEFAULTS.variants : _f, _g = _a.filter, filter = _g === void 0 ? OPTIONS_DEFAULTS.filter : _g, _h = _a.limit, limit = _h === void 0 ? OPTIONS_DEFAULTS.limit : _h, _j = _a.sort, sort = _j === void 0 ? OPTIONS_DEFAULTS.sort : _j;
        if (onChange === void 0) { onChange = function () { }; }
        this.fonts = new Map();
        validatePickerId(pickerId);
        this.selectorSuffix = pickerId ? "-" + pickerId : "";
        this.apiKey = apiKey;
        this.options = {
            pickerId: pickerId,
            families: families,
            categories: categories,
            scripts: scripts,
            variants: variants,
            filter: filter,
            limit: limit,
            sort: sort,
        };
        this.onChange = onChange;
        this.addFont(defaultFamily, false);
        this.setActiveFont(defaultFamily, false);
    }
    FontManager.prototype.init = function () {
        return __awaiter(this, void 0, void 0, function () {
            var fonts, _loop_1, this_1, i, state_1, fontsToLoad;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4, getFontList(this.apiKey)];
                    case 1:
                        fonts = _a.sent();
                        _loop_1 = function (i) {
                            var font = fonts[i];
                            if (this_1.fonts.size >= this_1.options.limit) {
                                return "break";
                            }
                            if (!this_1.fonts.has(font.family) &&
                                (this_1.options.families.length === 0 || this_1.options.families.includes(font.family)) &&
                                (this_1.options.categories.length === 0 || this_1.options.categories.includes(font.category)) &&
                                this_1.options.scripts.every(function (script) { return font.scripts.includes(script); }) &&
                                this_1.options.variants.every(function (variant) { return font.variants.includes(variant); }) &&
                                this_1.options.filter(font) === true) {
                                this_1.fonts.set(font.family, font);
                            }
                        };
                        this_1 = this;
                        for (i = 0; i < fonts.length; i += 1) {
                            state_1 = _loop_1(i);
                            if (state_1 === "break")
                                break;
                        }
                        fontsToLoad = new Map(this.fonts);
                        fontsToLoad["delete"](this.activeFontFamily);
                        loadFontPreviews(fontsToLoad, this.options.scripts, this.options.variants, this.selectorSuffix);
                        return [2, this.fonts];
                }
            });
        });
    };
    FontManager.prototype.getFonts = function () {
        return this.fonts;
    };
    FontManager.prototype.addFont = function (fontFamily, downloadPreview) {
        if (downloadPreview === void 0) { downloadPreview = true; }
        var font = {
            family: fontFamily,
            id: getFontId(fontFamily),
        };
        this.fonts.set(fontFamily, font);
        if (downloadPreview) {
            var fontMap = new Map();
            fontMap.set(fontFamily, font);
            loadFontPreviews(fontMap, this.options.scripts, this.options.variants, this.selectorSuffix);
        }
    };
    FontManager.prototype.removeFont = function (fontFamily) {
        this.fonts["delete"](fontFamily);
    };
    FontManager.prototype.getActiveFont = function () {
        var activeFont = this.fonts.get(this.activeFontFamily);
        if (!activeFont) {
            throw Error("Cannot get active font: \"" + this.activeFontFamily + "\" is not in the font list");
        }
        else {
            return activeFont;
        }
    };
    FontManager.prototype.setActiveFont = function (fontFamily, runOnChange) {
        var _this = this;
        if (runOnChange === void 0) { runOnChange = true; }
        var previousFontFamily = this.activeFontFamily;
        var activeFont = this.fonts.get(fontFamily);
        if (!activeFont) {
            throw Error("Cannot update active font: \"" + fontFamily + "\" is not in the font list");
        }
        this.activeFontFamily = fontFamily;
        loadActiveFont(activeFont, previousFontFamily, this.options.scripts, this.options.variants, this.selectorSuffix).then(function () {
            if (runOnChange) {
                _this.onChange(activeFont);
            }
        });
    };
    FontManager.prototype.setOnChange = function (onChange) {
        this.onChange = onChange;
    };
    return FontManager;
}());




/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/edit.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/edit.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _pencil__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./pencil */ "./node_modules/@wordpress/icons/build-module/library/pencil.js");
/**
 * Internal dependencies
 */

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_pencil__WEBPACK_IMPORTED_MODULE_0__["default"]);
//# sourceMappingURL=edit.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/link-off.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/link-off.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const linkOff = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M15.6 7.3h-.7l1.6-3.5-.9-.4-3.9 8.5H9v1.5h2l-1.3 2.8H8.4c-2 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7H10V7.3H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H9l-1.4 3.2.9.4 5.7-12.5h1.4c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.9 0 5.2-2.3 5.2-5.2 0-2.9-2.4-5.2-5.2-5.2z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (linkOff);
//# sourceMappingURL=link-off.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/link.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/link.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const link = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (link);
//# sourceMappingURL=link.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/pencil.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/pencil.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const pencil = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M20.1 5.1L16.9 2 6.2 12.7l-1.3 4.4 4.5-1.3L20.1 5.1zM4 20.8h8v-1.5H4v1.5z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (pencil);
//# sourceMappingURL=pencil.js.map

/***/ }),

/***/ "./src/blocks/Spice_Blockquote.js":
/*!****************************************!*\
  !*** ./src/blocks/Spice_Blockquote.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");


const {
  RichText,
  InspectorControls,
  BlockControls,
  AlignmentToolbar,
  PanelColorSettings,
  FontSizePicker,
  MediaUpload,
  MediaUploadCheck
} = wp.blockEditor;

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;


const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    boxColor,
    quoteColor,
    shadowColor,
    author,
    authorborderRadius,
    contentpaddings,
    content,
    authorColor,
    authorbgColor,
    bgColor,
    contentColor,
    bgimgrepeat,
    bgimgposition,
    bgimgsize,
    bgimgattch,
    margins,
    paddings,
    opacity,
    Authorfontfamily,
    authorfontSize,
    AuthorLineHeight,
    AuthorFontWeight,
    AuthorTransform,
    AuthorDecoration,
    AuthorLetterSpacing,
    Contentfontfamily,
    contentfontSize,
    ContentFontWeight,
    ContentLineHeight,
    ContentTransform,
    ContentDecoration,
    ContentLetterSpacing,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    bgType,
    bgImage,
    bgImageParallax,
    bgImageSize,
    bgImageRepeat,
    bgImageOverlay,
    bgOverlayColor,
    bgOverlayPopup,
    bgOverlayOpacity,
    bgVideo,
    bgImagePosition,
    hidequote,
    hideauthor,
    hidecontent
  } = attributes;
  setAttributes({
    uniqueid: 'spiceblockquote' + clientId.slice(0, 8)
  });
  const blockStyle = plugin.pluginpath + 'assets/images/blockquote.jpg';

  function setAuthor(value) {
    setAttributes({
      authorColor: value
    });
  }

  function setContent(value) {
    setAttributes({
      contentColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setquoteColor(value) {
    setAttributes({
      quoteColor: value
    });
  }

  function setOverlayColor(value) {
    setAttributes({
      bgOverlayColor: value
    });
  }

  const blockquoteclass = 'wp-block background-img spice-blocks-blockquote';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
  let containerBg = '';
  const bgImage1 = bgImage != null ? bgImage : blockStyle;

  if (bgType !== 'none' && bgType === 'image') {
    containerBg = `url(${bgImage1})`;
  } else {
    containerBg = `url(${blockStyle})`;
  }

  let backgroundPosition = '';

  if (bgType === 'image' && bgImage) {
    backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
  } else {
    backgroundPosition = ' ';
  }

  let backgroundSize = '';

  if (bgType === 'image' && bgImage) {
    backgroundSize = bgImageSize;
  } else {
    backgroundSize = 'cover';
  } //Image Background Attachment


  let backgroundAttachment = '';

  if (bgType === 'image' && bgImage && bgImageParallax) {
    backgroundAttachment = 'fixed';
  } else {
    backgroundAttachment = 'scroll';
  } //Image Repeat


  let backgroundRepeat = '';

  if (bgType === 'image' && bgImage) {
    backgroundRepeat = bgImageRepeat;
  } else {
    backgroundRepeat = 'no-repeat';
  }

  if (Contentfontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + Contentfontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  if (Authorfontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + Authorfontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", Contentfontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2); var authorfontfamily2=`", Authorfontfamily, "`; var authorfontfamilyurl2 = 'https://fonts.googleapis.com/css2?family='+authorfontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var authorfontfamilylink2 = document.createElement('link'); authorfontfamilylink2.href = authorfontfamilyurl2; authorfontfamilylink2.rel = \"stylesheet\"; authorfontfamilylink2.type =  \"text/css\"; document.head.appendChild(authorfontfamilylink2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`#${uniqueid}{
					background-color: ${bgColor};
			    }
			    #${uniqueid} .spice-blocks-blockquote{
			    	background-image: ${containerBg};
			    	background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
					margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					animation-delay: ${delay}ms;
				}
				#${uniqueid} .spice-blocks-blockquote blockquote{
					background-color: unset;
					position: unset;
			    }
			    #${uniqueid} .spice-blocks-blockquote i{
			    	color:${quoteColor};
			    }
			    #${uniqueid} .spice-blocks-blockquote p{
		    		color:${contentColor};
					font-size: ${contentfontSize};
					font-weight: ${ContentFontWeight};
					line-height: ${ContentLineHeight}px;
					font-family: ${Contentfontfamily};
					text-transform: ${ContentTransform};
					text-decoration: ${ContentDecoration};
					letter-spacing: ${ContentLetterSpacing}px;									
					padding: ${contentpaddings.top} ${contentpaddings.right} ${contentpaddings.bottom} ${contentpaddings.left};
			    }
			    #${uniqueid} .spice-blocks-blockquote cite{
	    			color:${authorColor};
					font-size: ${authorfontSize};
					font-weight: ${AuthorFontWeight};
					line-height: ${AuthorLineHeight}px;
					font-family: ${Authorfontfamily};
					text-transform: ${AuthorTransform};
					text-decoration: ${AuthorDecoration};
					letter-spacing: ${AuthorLetterSpacing}px;
			    }
		    	#${uniqueid} .spice-blocks-blockquote .blockquote-field .name-field .name::before{
		    		background-color:${authorColor};
		    	}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Quote', 'spice-blocks'),
    checked: hidequote,
    onChange: newval => setAttributes({
      hidequote: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Content', 'spice-blocks'),
    checked: hidecontent,
    onChange: newval => setAttributes({
      hidecontent: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Author', 'spice-blocks'),
    checked: hideauthor,
    onChange: newval => setAttributes({
      hideauthor: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: paddings,
    label: __('Box Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: contentpaddings,
    label: __('Content Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...contentpaddings,
      contentpaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-block-section-bg-color',
    colorSettings: [{
      value: quoteColor,
      onChange: setquoteColor,
      clearable: true,
      label: __('Quote Color', 'spice-blocks')
    }, {
      value: contentColor,
      onChange: setContent,
      clearable: true,
      label: __('Content Color', 'spice-blocks')
    }, {
      value: authorColor,
      onChange: setAuthor,
      clearable: true,
      label: __('Author Color', 'spice-blocks')
    }, {
      value: bgColor,
      onChange: setBgColor,
      clearable: true,
      label: __('Background Color', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Background Image', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    isPressed: bgType === 'image',
    onClick: () => setAttributes({
      bgType: 'image'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "18",
    height: "15",
    viewBox: "0 0 18 15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M16.083.263h-14.446c-.798 0-1.445.648-1.445 1.447v11.579c0 .8.646 1.447 1.445 1.447h14.446c.798 0 1.445-.648 1.445-1.447v-11.579c0-.8-.646-1.447-1.445-1.447zm-4.334 2.171c2.389 0 2.386 3.618 0 3.618-2.385 0-2.39-3.618 0-3.618zm-9.39 10.855l4.334-5.789 2.965 3.961 2.091-2.514 3.611 4.342h-13.001z",
    className: "svg-fill",
    fillRule: "nonzero"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    onClick: () => setAttributes({
      bgType: 'none'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-image-rotate"
  })))), bgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, bgImage ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_container"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_image"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FocalPointPicker, {
    url: bgImage,
    value: bgImagePosition,
    onChange: focalPoint => setAttributes({
      bgImagePosition: focalPoint
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_actions"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setAttributes({
      bgImage: ''
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-trash"
  }))))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(MediaUpload, {
    onSelect: media => setAttributes({
      bgImage: media.url
    }),
    type: "image",
    value: bgImage,
    render: _ref => {
      let {
        open
      } = _ref;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
        className: "spice_block_section_custom_upload",
        onClick: open
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dashicons dashicons-insert"
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "spice_block_section_upload_label"
      }, __('Add Image', 'spice-blocks')));
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Enable Parallax', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: bgImageParallax,
    onChange: () => setAttributes({
      bgImageParallax: !bgImageParallax
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Size', 'spice-blocks'),
    options: [{
      label: __('Default', 'spice-blocks'),
      value: 'initial'
    }, {
      label: __('Cover', 'spice-blocks'),
      value: 'cover'
    }, {
      label: __('Contain', 'spice-blocks'),
      value: 'contain'
    }, {
      label: __('Auto', 'spice-blocks'),
      value: 'auto'
    }],
    onChange: size => {
      setAttributes({
        bgImageSize: size
      });
    },
    value: bgImageSize
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Repeat', 'spice-blocks'),
    options: [{
      label: __('No Repeat', 'spice-blocks'),
      value: 'no-repeat'
    }, {
      label: __('Repeat', 'spice-blocks'),
      value: 'repeat'
    }, {
      label: __('Repeat X', 'spice-blocks'),
      value: 'repeat-x'
    }, {
      label: __('Repeat Y', 'spice-blocks'),
      value: 'repeat-y'
    }],
    onChange: value => {
      setAttributes({
        bgImageRepeat: value
      });
    },
    value: bgImageRepeat
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Background Overlay', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Enable Overlay', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: bgImageOverlay,
    onChange: () => setAttributes({
      bgImageOverlay: !bgImageOverlay
    })
  })), bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: open,
    className: 'sb-color-style',
    title: __('Overlay Color', 'spice-blocks'),
    colorSettings: [{
      value: bgOverlayColor,
      onChange: setOverlayColor,
      label: __('Overlay Color:', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Overlay Opacity', 'spice-blocks'),
    value: bgOverlayOpacity,
    onChange: value => setAttributes({
      bgOverlayOpacity: value
    }),
    min: 0.1,
    max: 1,
    step: 0.01
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Content Font Typography', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: Contentfontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      Contentfontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: contentfontSize,
    onChange: userVal => setAttributes({
      contentfontSize: userVal
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: ContentFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      ContentFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: ContentLineHeight,
    onChange: newtext => setAttributes({
      ContentLineHeight: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: ContentTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      ContentTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: ContentDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      ContentDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: ContentLetterSpacing,
    onChange: newtext => setAttributes({
      ContentLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Author Font Typography', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: Authorfontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      Authorfontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: authorfontSize,
    onChange: val => setAttributes({
      authorfontSize: val
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: AuthorFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: val => setAttributes({
      AuthorFontWeight: val
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: AuthorLineHeight,
    onChange: val => setAttributes({
      AuthorLineHeight: val
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: AuthorTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      AuthorTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: AuthorDecoration,
    options: [{
      label: 'Default',
      value: ''
    }, {
      label: 'Underline',
      value: 'underline'
    }, {
      label: 'Overline',
      value: 'overline'
    }, {
      label: 'Line Through',
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      AuthorDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: AuthorLetterSpacing,
    onChange: newtext => setAttributes({
      AuthorLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "spice-blockquote",
    id: uniqueid
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
    className: `${blockquoteclass} ${alignmentClass} ${animationclass} ${displayclass}`
  }, bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice-blocks-overlay",
    style: {
      backgroundColor: bgImageOverlay ? bgOverlayColor : '',
      opacity: bgImageOverlay ? bgOverlayOpacity : ''
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("blockquote", {
    class: "blockquote-field"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "blockquote-text"
  }, hidequote && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "quote-icon"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("i", {
    class: "fa-solid fa-quote-right"
  })), hidecontent && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    tagName: "p",
    value: content,
    onChange: newvalue => setAttributes({
      content: newvalue
    })
  })), hideauthor && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "name-field"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    className: "name",
    tagName: "cite",
    value: author,
    onChange: newvalue => setAttributes({
      author: newvalue
    })
  }))))));
};

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('spice-blocks/spice-blockquote', {
  title: __('Blockquote', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24.000000000000004",
    height: "24.000000000000004",
    xmlns: "http://www.w3.org/2000/svg",
    version: "1.1",
    "aria-hidden": "true",
    focusable: "false"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "#09A223",
    id: "svg_21",
    d: "m0.48982,3.10824l0,0c0,-1.41994 1.18096,-2.57103 2.63775,-2.57103l1.19898,0l0,0l5.75509,0l10.7908,0c0.69958,0 1.3705,0.27088 1.86517,0.75304c0.49467,0.48216 0.77258,1.13611 0.77258,1.81799l0,6.42758l0,0l0,3.85655l0,0c0,1.41994 -1.18096,2.57103 -2.63775,2.57103l-10.7908,0l-7.51832,6.53754l1.76323,-6.53754l-1.19898,0c-1.45679,0 -2.63775,-1.15109 -2.63775,-2.57103l0,0l0,-3.85655l0,0l0,-6.42758z",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null",
    id: "svg_1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null",
    id: "right_x5F_quote"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null",
    id: "svg_2"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "null",
    id: "svg_3",
    fill: "#fff",
    d: "m6.80436,4.15632l0,3.89673l2.59782,0c0,1.43205 -1.16447,2.59782 -2.59782,2.59782l0,1.29891c2.14872,0 3.89673,-1.74801 3.89673,-3.89673l0,-3.89673l-3.89673,0z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "null",
    id: "svg_4",
    fill: "#fff",
    d: "m13.29891,4.15632l0,3.89673l2.59782,0c0,1.43205 -1.16447,2.59782 -2.59782,2.59782l0,1.29891c2.14872,0 3.89673,-1.74801 3.89673,-3.89673l0,-3.89673l-3.89673,0z"
  })))))),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  category: 'spice-blocks',
  keywords: ['Spice Blockquote', 'blockquote', 'spice'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    hidequote: {
      type: 'boolean',
      default: true
    },
    hidecontent: {
      type: 'boolean',
      default: true
    },
    hideauthor: {
      type: 'boolean',
      default: true
    },
    author: {
      type: 'string',
      default: 'Cillum Dolore'
    },
    content: {
      type: 'string',
      default: ' sure there is not anything embarrassing hidden in the middle of text.'
    },
    textAlignment: {
      type: 'string',
      default: 'center'
    },
    authorColor: {
      type: 'string',
      default: '#fff'
    },
    bgColor: {
      type: 'string',
      default: 'transparent'
    },
    contentColor: {
      type: 'string',
      default: '#fff'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    },
    quoteColor: {
      type: 'string'
    },
    bgType: {
      type: 'string',
      default: 'none'
    },
    bgImage: {
      type: 'string'
    },
    bgImageParallax: {
      type: 'boolean',
      default: false
    },
    bgImageSize: {
      type: 'string',
      default: 'cover'
    },
    bgImageRepeat: {
      type: 'string',
      default: 'no-repeat'
    },
    bgImageOverlay: {
      type: 'boolean',
      default: false
    },
    bgOverlayColor: {
      type: 'string',
      default: '#000000'
    },
    bgOverlayOpacity: {
      type: "number",
      default: 0.7
    },
    bgImagePosition: {
      type: 'object',
      default: {
        "x": 0.5,
        "y": 0.5
      }
    },
    margins: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    contentpaddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    opacity: {
      type: 'number',
      default: 0.5
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ''
    },
    delay: {
      type: 'string'
    },
    Contentfontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    contentfontSize: {
      type: 'string',
      default: '30px'
    },
    ContentFontWeight: {
      type: 'string',
      default: '600'
    },
    ContentLineHeight: {
      type: 'number',
      default: 50
    },
    ContentTransform: {
      type: 'string'
    },
    ContentDecoration: {
      type: 'string'
    },
    ContentLetterSpacing: {
      type: 'number'
    },
    Authorfontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    authorfontSize: {
      type: 'string',
      default: '24px'
    },
    AuthorFontWeight: {
      type: 'string',
      default: '400'
    },
    AuthorLineHeight: {
      type: 'number',
      default: 50
    },
    AuthorTransform: {
      type: 'string'
    },
    AuthorDecoration: {
      type: 'string'
    },
    AuthorLetterSpacing: {
      type: 'number'
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      boxColor,
      quoteColor,
      shadowColor,
      author,
      authorborderRadius,
      contentpaddings,
      content,
      authorColor,
      authorbgColor,
      bgColor,
      contentColor,
      bgimgrepeat,
      bgimgposition,
      bgimgsize,
      bgimgattch,
      margins,
      paddings,
      opacity,
      Authorfontfamily,
      authorfontSize,
      AuthorLineHeight,
      AuthorFontWeight,
      AuthorTransform,
      AuthorDecoration,
      AuthorLetterSpacing,
      Contentfontfamily,
      contentfontSize,
      ContentFontWeight,
      ContentLineHeight,
      ContentTransform,
      ContentDecoration,
      ContentLetterSpacing,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      bgType,
      bgImage,
      bgImageParallax,
      bgImageSize,
      bgImageRepeat,
      bgImageOverlay,
      bgOverlayColor,
      bgOverlayPopup,
      bgOverlayOpacity,
      bgVideo,
      bgImagePosition,
      hidequote,
      hideauthor,
      hidecontent
    } = attributes;
    const blockStyle = plugin.pluginpath + 'assets/images/blockquote.jpg';
    const blockquoteclass = 'wp-block background-img spice-blocks-blockquote';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    let containerBg = '';

    if (bgType !== 'none' && bgType === 'image') {
      containerBg = `url(${bgImage})`;
    } else {
      containerBg = `url(${blockStyle})`;
    }

    let backgroundPosition = '';

    if (bgType === 'image' && bgImage) {
      backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
    } else {
      backgroundPosition = '';
    }

    let backgroundSize = '';

    if (bgType === 'image' && bgImage) {
      backgroundSize = bgImageSize;
    } else {
      backgroundSize = 'cover';
    } //Image Background Attachment


    let backgroundAttachment = '';

    if (bgType === 'image' && bgImage && bgImageParallax) {
      backgroundAttachment = 'fixed';
    } else {
      backgroundAttachment = 'scroll';
    } //Background Image Repeat


    let backgroundRepeat = '';

    if (bgType === 'image' && bgImage) {
      backgroundRepeat = bgImageRepeat;
    } else {
      backgroundRepeat = 'no-repeat';
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`#${uniqueid}{
					background-color: ${bgColor};
			    }
			    #${uniqueid} .spice-blocks-blockquote{
			    	background-image: ${containerBg};
			    	background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
					margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					animation-delay: ${delay}ms;
				}
				#${uniqueid} .spice-blocks-blockquote blockquote{
					background-color: unset;
					position: unset;
			    }
		    	#${uniqueid} .spice-blocks-blockquote i{
		    		color:${quoteColor};
		    	}
		    	#${uniqueid} .spice-blocks-blockquote p{
		    		color:${contentColor};
					font-size: ${contentfontSize};
					font-weight: ${ContentFontWeight};
					line-height: ${ContentLineHeight}px;
					font-family: ${Contentfontfamily};
					text-transform: ${ContentTransform};
					text-decoration: ${ContentDecoration};
					letter-spacing: ${ContentLetterSpacing}px;									
					padding: ${contentpaddings.top} ${contentpaddings.right} ${contentpaddings.bottom} ${contentpaddings.left};
		    	}
		    	#${uniqueid} .spice-blocks-blockquote cite{
		    			color:${authorColor};
						font-size: ${authorfontSize};
						font-weight: ${AuthorFontWeight};
						line-height: ${AuthorLineHeight}px;
						font-family: ${Authorfontfamily};
						text-transform: ${AuthorTransform};
						text-decoration: ${AuthorDecoration};
						letter-spacing: ${AuthorLetterSpacing}px;
		    	}
		    	#${uniqueid} .spice-blocks-blockquote .blockquote-field .name-field .name::before{
		    		background-color:${authorColor};
		    	}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", Contentfontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2); var authorfontfamily2=`", Authorfontfamily, "`; var authorfontfamilyurl2 = 'https://fonts.googleapis.com/css2?family='+authorfontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var authorfontfamilylink2 = document.createElement('link'); authorfontfamilylink2.href = authorfontfamilyurl2; authorfontfamilylink2.rel = \"stylesheet\"; authorfontfamilylink2.type =  \"text/css\"; document.head.appendChild(authorfontfamilylink2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "spice-blockquote",
      id: uniqueid
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("figure", {
      className: `${blockquoteclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`
    }, bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "spice-blocks-overlay",
      style: {
        backgroundColor: bgImageOverlay ? bgOverlayColor : '',
        opacity: bgImageOverlay ? bgOverlayOpacity : ''
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("blockquote", {
      class: "blockquote-field"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "blockquote-text"
    }, hidequote && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      class: "quote-icon"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("i", {
      class: "fa-solid fa-quote-right"
    })), hidecontent && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      tagName: "p",
      value: content
    })), hideauthor && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "name-field"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      className: "name",
      tagName: "cite",
      value: author
    }))))));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Button.js":
/*!************************************!*\
  !*** ./src/blocks/Spice_Button.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/keycodes */ "@wordpress/keycodes");
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keycodes__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/link.js");
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/link-off.js");
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");




const {
  Fragment,
  useState,
  useRef
} = wp.element;
const {
  __
} = wp.i18n;






const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId,
    className,
    isSelected,
    onReplace,
    mergeBlocks
  } = props;
  const {
    linkTarget,
    placeholder,
    rel,
    style,
    text,
    url,
    width
  } = attributes;
  setAttributes({
    uniqueid: 'spiceblocksbutton' + clientId.slice(0, 8)
  });
  const {
    uniqueid,
    title,
    buttontype,
    titleColor,
    bgColor,
    titlehColor,
    bghColor,
    shadowColor,
    border,
    borderradius,
    margins,
    buttonpaddings,
    fontfamily,
    titlefontSize,
    TitleLineHeight,
    TitleFontWeight,
    TitleTransform,
    TitleDecoration,
    TitleLetterSpacing,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes;
  const blockclass = 'spice-blocks-button-wrapper';
  const buttonclass = 'spice-blocks-button';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
  const NEW_TAB_REL = 'noreferrer noopener';

  function setTitle(value) {
    setAttributes({
      title: value
    });
  }

  function setTitleColor(value) {
    setAttributes({
      titleColor: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setTitlehColor(value) {
    setAttributes({
      titlehColor: value
    });
  }

  function setBghColor(value) {
    setAttributes({
      bghColor: value
    });
  }

  function unlink() {
    setAttributes({
      url: undefined,
      linkTarget: undefined,
      rel: undefined
    });
    setIsEditingURL(false);
  }

  function startEditing(event) {
    event.preventDefault();
    setIsEditingURL(true);
  }

  function onToggleOpenInNewTab(value) {
    const newLinkTarget = value ? '_blank' : undefined;
    let updatedRel = rel;

    if (newLinkTarget && !rel) {
      updatedRel = NEW_TAB_REL;
    } else if (!newLinkTarget && rel === NEW_TAB_REL) {
      updatedRel = undefined;
    }

    setAttributes({
      linkTarget: newLinkTarget,
      rel: updatedRel
    });
  }

  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)();

  const SpiceColorTabPanel = () => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TabPanel, {
    className: "color-tab-panel",
    activeClass: "active-tab",
    tabs: [{
      name: 'normal',
      title: __('Normal', 'spice-blocks'),
      className: 'tab-one',
      content: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.PanelColorSettings, {
        initialOpen: open,
        colorSettings: [{
          value: titleColor,
          clearable: true,
          onChange: setTitleColor,
          label: __('Text Color:', 'spice-blocks')
        }, {
          value: bgColor,
          clearable: true,
          onChange: setBgColor,
          label: __('Background Color:', 'spice-blocks')
        }],
        className: 'spice-blocks-normal-button'
      })
    }, {
      name: 'hover',
      title: __('Hover', 'spice-blocks'),
      className: 'tab-two',
      content: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.PanelColorSettings, {
        initialOpen: open,
        colorSettings: [{
          value: titlehColor,
          clearable: true,
          onChange: setTitlehColor,
          label: __('Text Color:', 'spice-blocks')
        }, {
          value: bghColor,
          clearable: true,
          onChange: setBghColor,
          label: __('Background Color:', 'spice-blocks')
        }],
        className: 'spice-blocks-hover-button'
      })
    }]
  }, tab => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, tab.content));

  if (fontfamily != null) {
    let urlf = 'https://fonts.googleapis.com/css2?family=' + fontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = urlf;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  const [popoverAnchor, setPopoverAnchor] = useState(null);
  const ref = useRef();
  const richTextRef = useRef();
  const isURLSet = !!url;
  const opensInNewTab = linkTarget === '_blank';
  const [isEditingURL, setIsEditingURL] = useState(false);
  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`.spice-blocks-button-wrapper#${uniqueid} .wp-block-spice-blocks-spice-button{
						color: ${titleColor};
						background-color:${bgColor};
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						padding: ${buttonpaddings.top} ${buttonpaddings.right} ${buttonpaddings.bottom} ${buttonpaddings.left};	
						font-size: ${titlefontSize};
						font-weight: ${TitleFontWeight};
						line-height: ${TitleLineHeight}px;
						animation-delay: ${delay}ms;
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						font-family:${fontfamily};
						text-transform:${TitleTransform};
						text-decoration:${TitleDecoration};
						letter-spacing:${TitleLetterSpacing}px;
					}
					.spice-blocks-button-wrapper#${uniqueid} .wp-block-spice-blocks-spice-button:hover{
						color: ${titlehColor};
						background-color:${bghColor};
					}
					.spice-blocks-button-wrapper#${uniqueid}{
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						animation-delay: ${delay}ms;		

					}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Type', 'spice-blocks'),
    value: buttontype,
    options: [{
      label: __('Link', 'spice-blocks'),
      value: 'link'
    }, {
      label: __('Submit', 'spice-blocks'),
      value: 'submit'
    }],
    onChange: newtext => setAttributes({
      buttontype: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    values: buttonpaddings,
    label: __('Button Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...buttonpaddings,
      buttonpaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
    label: __('Border', 'spice-blocks'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: __('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks'),
    className: "spice-blocks-dual-color"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", blockProps, SpiceColorTabPanel())), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks'),
    className: "spiceheadingtypo"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: fontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      fontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: titlefontSize,
    onChange: userVal => setAttributes({
      titlefontSize: userVal
    }),
    allowReset: false
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: TitleFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      TitleFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: TitleLineHeight,
    onChange: newtext => setAttributes({
      TitleLineHeight: newtext
    }),
    min: 0,
    step: 0.1,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: TitleTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      TitleTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: TitleDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      TitleDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: TitleLetterSpacing,
    onChange: newtext => setAttributes({
      TitleLetterSpacing: newtext
    }),
    min: -10.0,
    step: 0.1,
    max: 10.0
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass}`,
    id: uniqueid
  }, buttontype == 'link' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: buttonclass
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    ref: richTextRef,
    tagName: "span",
    "aria-label": __('Button text'),
    placeholder: placeholder || __('Add text…', 'spice-blocks'),
    value: title,
    onChange: newtext => setAttributes({
      title: newtext
    }),
    withoutInteractiveFormatting: true,
    className: classnames__WEBPACK_IMPORTED_MODULE_5___default()(className, 'wp-block-button__link')
  })), buttontype == 'submit' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `${buttonclass} ${alignmentClass}`
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    ref: richTextRef,
    tagName: "span",
    "aria-label": __('Button text'),
    placeholder: placeholder || __('Add text…', 'spice-blocks'),
    value: title,
    onChange: newtext => setAttributes({
      title: newtext
    }),
    withoutInteractiveFormatting: true,
    className: classnames__WEBPACK_IMPORTED_MODULE_5___default()(className, 'wp-block-button__link')
  }))), buttontype == 'link' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.BlockControls, {
    group: "block"
  }, !isURLSet && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToolbarButton, {
    name: "link",
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_8__["default"],
    title: __('Link'),
    shortcut: _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_6__.displayShortcut.primary('k'),
    onClick: startEditing
  }), isURLSet && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToolbarButton, {
    name: "link",
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_9__["default"],
    title: __('Unlink'),
    shortcut: _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_6__.displayShortcut.primaryShift('k'),
    onClick: unlink,
    isActive: true
  })), isSelected && (isEditingURL || isURLSet) && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Popover, {
    position: "bottom center",
    onClose: () => {
      var _richTextRef$current;

      setIsEditingURL(false);
      (_richTextRef$current = richTextRef.current) === null || _richTextRef$current === void 0 ? void 0 : _richTextRef$current.focus();
    },
    anchor: popoverAnchor,
    focusOnMount: isEditingURL ? 'firstElement' : false,
    __unstableSlotName: '__unstable-block-tools-after',
    shift: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalLinkControl, {
    className: "wp-block-navigation-link__inline-link-input",
    value: {
      url,
      opensInNewTab
    },
    onChange: _ref => {
      let {
        url: newURL = '',
        opensInNewTab: newOpensInNewTab
      } = _ref;
      setAttributes({
        url: newURL
      });

      if (opensInNewTab !== newOpensInNewTab) {
        onToggleOpenInNewTab(newOpensInNewTab);
      }
    },
    onRemove: () => {
      var _richTextRef$current2;

      unlink();
      (_richTextRef$current2 = richTextRef.current) === null || _richTextRef$current2 === void 0 ? void 0 : _richTextRef$current2.focus();
    },
    forceIsEditingLink: isEditingURL
  })));
};

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('spice-blocks/spice-button', {
  title: __('Button', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg",
    "aria-hidden": "true",
    focusable: "false"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "Layer_1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null",
    id: "svg_14"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "#09A223",
    rx: "4",
    id: "svg_2",
    height: "12.4121",
    width: "20.66935",
    y: "9.14495",
    x: "2",
    "stroke-width": "2",
    fill: "#fff"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    stroke: "#09A223",
    id: "svg_5",
    y2: "15",
    x2: "18",
    y1: "15",
    x1: "7",
    "stroke-width": "2",
    fill: "none"
  })))),
  category: 'spice-blocks',
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Button', 'Button', 'Link'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    url: {
      "type": "string",
      "source": "attribute",
      "selector": "a",
      "attribute": "href"
    },
    linkTarget: {
      "type": "string",
      "source": "attribute",
      "selector": "a",
      "attribute": "target"
    },
    rel: {
      type: "string",
      source: "attribute",
      selector: "a",
      attribute: "rel"
    },
    placeholder: {
      type: "string"
    },
    title: {
      type: 'string'
    },
    buttontype: {
      type: 'string',
      default: 'link'
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    titleColor: {
      type: 'string',
      default: '#fff'
    },
    bgColor: {
      type: 'string',
      default: '#4CAF50'
    },
    titlehColor: {
      type: 'string'
    },
    bghColor: {
      type: 'string',
      default: '#0693e3'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    },
    border: {
      type: 'object',
      default: {
        color: '',
        style: '',
        width: ''
      }
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    buttonpaddings: {
      type: 'object',
      default: {
        top: '',
        left: '',
        bottom: '',
        right: ''
      }
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    TitleFontWeight: {
      type: 'string',
      default: '600'
    },
    TitleLineHeight: {
      type: 'number',
      default: 15
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    fontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    titlefontSize: {
      type: 'string'
    },
    TitleTransform: {
      type: 'string'
    },
    TitleDecoration: {
      type: 'string'
    },
    TitleLetterSpacing: {
      type: 'number'
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      fontfamily,
      title,
      buttontype,
      titleColor,
      bgColor,
      titlehColor,
      bghColor,
      shadowColor,
      border,
      borderradius,
      margins,
      buttonpaddings,
      titlefontSize,
      TitleLineHeight,
      TitleFontWeight,
      TitleTransform,
      TitleDecoration,
      TitleLetterSpacing,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes;
    const {
      linkTarget,
      placeholder,
      rel,
      style,
      text,
      url,
      width
    } = attributes;
    const blockclass = 'spice-blocks-button-wrapper';
    const buttonclass = 'spice-blocks-button';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const buttonClasses = classnames__WEBPACK_IMPORTED_MODULE_5___default()('wp-block-spice-blocks-spice-button');
    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.spice-blocks-button-wrapper#${uniqueid} .wp-block-spice-blocks-spice-button{
							color: ${titleColor};
							background-color:${bgColor};							
							border: ${border.width} ${border.style} ${border.color};
							border-top:${bordertop};
							border-right:${borderright};
							border-bottom:${borderbottom};
							border-left:${borderleft};
							border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
							padding: ${buttonpaddings.top} ${buttonpaddings.right} ${buttonpaddings.bottom} ${buttonpaddings.left};	
							font-size: ${titlefontSize};
							font-weight: ${TitleFontWeight};
							line-height: ${TitleLineHeight}px;							
							box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
							font-family:${fontfamily};
							text-transform:${TitleTransform};
							text-decoration:${TitleDecoration};
							letter-spacing:${TitleLetterSpacing}px;
						}
						
						.spice-blocks-button-wrapper#${uniqueid} .wp-block-spice-blocks-spice-button:hover{
							color: ${titlehColor};
							background-color:${bghColor};
						}
						.spice-blocks-button-wrapper#${uniqueid}{
							margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
							animation-delay: ${delay}ms;
						}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", fontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`,
      id: uniqueid
    }, buttontype == 'link' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: buttonclass,
      href: url,
      target: linkTarget,
      rel: rel
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "span",
      className: buttonClasses,
      title: title,
      value: title
    })), buttontype == 'submit' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
      className: `${buttonclass} ${alignmentClass}`
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "span",
      className: buttonClasses,
      title: title,
      value: title
    }))));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_CTA.js":
/*!*********************************!*\
  !*** ./src/blocks/Spice_CTA.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");


const {
  RichText,
  InnerBlocks,
  InspectorControls,
  BlockControls,
  AlignmentToolbar,
  PanelColorSettings,
  FontSizePicker,
  MediaUpload,
  MediaUploadCheck
} = wp.blockEditor;
const ALLOWED_BLOCKS = ['spice-blocks/spice-button'];

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;
const {
  withSelect
} = wp.data;


const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    bgType,
    boxColor,
    quoteColor,
    shadowColor,
    subtitle,
    subtitlepaddings,
    subtitleborderRadius,
    titlepaddings,
    Title,
    subtitleColor,
    subtitlebgColor,
    bgColor,
    titleColor,
    bgimgrepeat,
    bgimgposition,
    bgimgsize,
    bgimgattch,
    margins,
    paddings,
    opacity,
    subtitlefontfamily,
    subtitlefontSize,
    subtitleLineHeight,
    subtitleFontWeight,
    subtitleTransform,
    subtitleDecoration,
    subtitleLetterSpacing,
    titlefontfamily,
    titlefontSize,
    titleFontWeight,
    titleLineHeight,
    titleTransform,
    titleDecoration,
    titleLetterSpacing,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    bgImage,
    bgImageParallax,
    bgImageSize,
    bgImageRepeat,
    bgImageOverlay,
    bgOverlayColor,
    bgOverlayPopup,
    bgOverlayOpacity,
    bgVideo,
    bgImagePosition,
    hideTitle,
    hidesubtitle
  } = attributes;
  setAttributes({
    uniqueid: 'spiceCTA' + clientId.slice(0, 8)
  });
  const blockStyle = plugin.pluginpath + 'assets/images/cta.jpg';

  function setSubtitle(value) {
    setAttributes({
      subtitleColor: value
    });
  }

  function setTitle(value) {
    setAttributes({
      titleColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setOverlayColor(value) {
    setAttributes({
      bgOverlayColor: value
    });
  }

  let containerBg = '';
  const bgImage1 = bgImage != null ? bgImage : blockStyle;

  if (bgType !== 'none' && bgType === 'image') {
    containerBg = `url(${bgImage1})`;
  } else {
    containerBg = `url(${blockStyle})`;
  }

  let backgroundPosition = '';

  if (bgType === 'image' && bgImage) {
    backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
  } else {
    backgroundPosition = '';
  }

  let backgroundSize = '';

  if (bgType === 'image' && bgImage) {
    backgroundSize = bgImageSize;
  } else {
    backgroundSize = '';
  } //Image Background Attachment


  let backgroundAttachment = '';

  if (bgType === 'image' && bgImage && bgImageParallax) {
    backgroundAttachment = 'fixed';
  } else {
    backgroundAttachment = 'scroll';
  } //Image Repeat


  let backgroundRepeat = '';

  if (bgType === 'image' && bgImage) {
    backgroundRepeat = bgImageRepeat;
  } else {
    backgroundRepeat = '';
  }

  const blockquoteclass = 'wp-block background-img spice-blocks-cta';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;

  if (titlefontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + titlefontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  if (subtitlefontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + subtitlefontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`.spice-blocks-cta#${uniqueid}{
			     	background-image: ${containerBg};					
			    	margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					animation-delay: ${delay}ms;
					background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
					
			     }
			    #${uniqueid} .top-heading{
			     	color:${titleColor};
					font-size: ${titlefontSize};
					font-weight: ${titleFontWeight};
					line-height: ${titleLineHeight}px;
					font-family: ${titlefontfamily};
					text-transform: ${titleTransform};
					text-decoration: ${titleDecoration};
					letter-spacing: ${titleLetterSpacing}px;
					padding: ${titlepaddings.top} ${titlepaddings.right} ${titlepaddings.bottom} ${titlepaddings.left};
					}
			    #${uniqueid} p.main-heading{
						color:${subtitleColor};
						font-size: ${subtitlefontSize};
						font-weight: ${subtitleFontWeight};
						line-height: ${subtitleLineHeight}px;
						font-family: ${subtitlefontfamily};
						text-transform: ${subtitleTransform};
						text-decoration: ${subtitleDecoration};
						letter-spacing: ${subtitleLetterSpacing}px;
						padding: ${subtitlepaddings.top} ${subtitlepaddings.right} ${subtitlepaddings.bottom} ${subtitlepaddings.left};
				}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Enable Title', 'spice-blocks'),
    checked: hideTitle,
    onChange: newval => setAttributes({
      hideTitle: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Enable/Disable Subtitle', 'spice-blocks'),
    checked: hidesubtitle,
    onChange: newval => setAttributes({
      hidesubtitle: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: paddings,
    label: __('Box Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: titlepaddings,
    label: __('Title Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...titlepaddings,
      titlepaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: subtitlepaddings,
    label: __('Subtitle Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...subtitlepaddings,
      subtitlepaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: [{
      value: titleColor,
      clearable: true,
      onChange: setTitle,
      label: __('Title Color', 'spice-blocks')
    }, {
      value: subtitleColor,
      clearable: true,
      onChange: setSubtitle,
      label: __('Subtitle Color', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Background Image', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    isPressed: bgType === 'image',
    onClick: () => setAttributes({
      bgType: 'image'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "18",
    height: "15",
    viewBox: "0 0 18 15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M16.083.263h-14.446c-.798 0-1.445.648-1.445 1.447v11.579c0 .8.646 1.447 1.445 1.447h14.446c.798 0 1.445-.648 1.445-1.447v-11.579c0-.8-.646-1.447-1.445-1.447zm-4.334 2.171c2.389 0 2.386 3.618 0 3.618-2.385 0-2.39-3.618 0-3.618zm-9.39 10.855l4.334-5.789 2.965 3.961 2.091-2.514 3.611 4.342h-13.001z",
    className: "svg-fill",
    fillRule: "nonzero"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    onClick: () => setAttributes({
      bgType: 'none'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-image-rotate"
  })))), bgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, bgImage ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_container"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_image"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FocalPointPicker, {
    url: bgImage,
    value: bgImagePosition,
    onChange: focalPoint => setAttributes({
      bgImagePosition: focalPoint
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_actions"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setAttributes({
      bgImage: ''
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-trash"
  }))))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(MediaUpload, {
    onSelect: media => setAttributes({
      bgImage: media.url
    }),
    type: "image",
    value: bgImage,
    render: _ref => {
      let {
        open
      } = _ref;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
        className: "spice_block_section_custom_upload",
        onClick: open
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dashicons dashicons-insert"
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "spice_block_section_upload_label"
      }, __('Add Image', 'spice-blocks')));
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Enable Parallax', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: bgImageParallax,
    onChange: () => setAttributes({
      bgImageParallax: !bgImageParallax
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Size', 'spice-blocks'),
    options: [{
      label: __('Default', 'spice-blocks'),
      value: 'initial'
    }, {
      label: __('Cover', 'spice-blocks'),
      value: 'cover'
    }, {
      label: __('Contain', 'spice-blocks'),
      value: 'contain'
    }, {
      label: __('Auto', 'spice-blocks'),
      value: 'auto'
    }],
    onChange: size => {
      setAttributes({
        bgImageSize: size
      });
    },
    value: bgImageSize
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Repeat', 'spice-blocks'),
    options: [{
      label: __('No Repeat', 'spice-blocks'),
      value: 'no-repeat'
    }, {
      label: __('Repeat', 'spice-blocks'),
      value: 'repeat'
    }, {
      label: __('Repeat X', 'spice-blocks'),
      value: 'repeat-x'
    }, {
      label: __('Repeat Y', 'spice-blocks'),
      value: 'repeat-y'
    }],
    onChange: value => {
      setAttributes({
        bgImageRepeat: value
      });
    },
    value: bgImageRepeat
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Background Overlay', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, __('Enable Overlay', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: bgImageOverlay,
    onChange: () => setAttributes({
      bgImageOverlay: !bgImageOverlay
    })
  })), bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: open,
    className: 'sb-color-style',
    title: __('Overlay Color', 'spice-blocks'),
    colorSettings: [{
      value: bgOverlayColor,
      onChange: setOverlayColor,
      label: __('Overlay Color:', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Overlay Opacity', 'spice-blocks'),
    value: bgOverlayOpacity,
    onChange: value => setAttributes({
      bgOverlayOpacity: value
    }),
    min: 0.1,
    max: 1,
    step: 0.01
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Title Font Typography', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: titlefontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      titlefontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: titlefontSize,
    onChange: userVal => setAttributes({
      titlefontSize: userVal
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: titleFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      titleFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: titleLineHeight,
    onChange: newtext => setAttributes({
      titleLineHeight: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: titleTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      titleTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: titleDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      titleDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: titleLetterSpacing,
    onChange: newtext => setAttributes({
      titleLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Subtitle Font Typography', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_3__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: subtitlefontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      subtitlefontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: subtitlefontSize,
    onChange: val => setAttributes({
      subtitlefontSize: val
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: "Font Weight",
    value: subtitleFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: val => setAttributes({
      subtitleFontWeight: val
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: subtitleLineHeight,
    onChange: val => setAttributes({
      subtitleLineHeight: val
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: subtitleTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      subtitleTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: subtitleDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      subtitleDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: subtitleLetterSpacing,
    onChange: newtext => setAttributes({
      subtitleLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `${blockquoteclass} ${alignmentClass} ${animationclass} ${displayclass}`,
    id: uniqueid
  }, bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice-blocks-overlay",
    style: {
      backgroundColor: bgImageOverlay ? bgOverlayColor : '',
      opacity: bgImageOverlay ? bgOverlayOpacity : ''
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "block-container"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "block-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "block-col-12"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "cta-block"
  }, hideTitle && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    tagName: "h2",
    className: "top-heading",
    value: Title,
    onChange: newvalue => setAttributes({
      Title: newvalue
    }),
    style: {}
  })), hidesubtitle && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    className: "main-heading",
    tagName: "p",
    value: subtitle,
    onChange: newvalue => setAttributes({
      subtitle: newvalue
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InnerBlocks, {
    allowedBlocks: ALLOWED_BLOCKS
  })))))));
};

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('spice-blocks/spice-call-to-action', {
  title: __('Call to Action', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "18",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_7"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "#09A223",
    id: "svg_2",
    height: "16.65616",
    width: "24.84361",
    y: "0.60944",
    x: "0.57819",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_6"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    id: "svg_3",
    height: "1.96874",
    width: "8.43747",
    y: "3.00002",
    x: "8.28127",
    fill: "#fff"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    id: "svg_4",
    height: "1.56249",
    width: "18.37491",
    y: "6.90629",
    x: "3.31255",
    fill: "#fff"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    id: "svg_3",
    height: "1.96874",
    width: "4.43747",
    y: "12.00002",
    x: "8.28127",
    fill: "#fff"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    id: "svg_3",
    height: "1.96874",
    width: "4.43747",
    y: "12.00002",
    x: "14.28127",
    fill: "#fff"
  })))),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  category: 'spice-blocks',
  keywords: ['Spice Call To Action', 'cta', 'CTA'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    hideTitle: {
      type: 'boolean',
      default: true
    },
    hidesubtitle: {
      type: 'boolean',
      default: true
    },
    subtitle: {
      type: 'string',
      default: 'Duis aute irure dolor in reprehe nderit in voluptate velit esse cillum'
    },
    Title: {
      type: 'string',
      default: 'Occaecat cupidatat non proident'
    },
    textAlignment: {
      type: 'string',
      default: 'center'
    },
    subtitleColor: {
      type: 'string'
    },
    bgColor: {
      type: 'string'
    },
    titleColor: {
      type: 'string'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    },
    boxColor: {
      type: 'string'
    },
    quoteColor: {
      type: 'string'
    },
    bgType: {
      type: 'string',
      default: 'none'
    },
    bgImage: {
      type: 'string'
    },
    bgImageParallax: {
      type: 'boolean',
      default: false
    },
    bgImageSize: {
      type: 'string',
      default: 'cover'
    },
    bgImageRepeat: {
      type: 'string',
      default: 'no-repeat'
    },
    bgImageOverlay: {
      type: 'boolean',
      default: true
    },
    bgOverlayColor: {
      type: 'string',
      default: '#000000'
    },
    bgOverlayOpacity: {
      type: "number",
      default: 0.7
    },
    bgImagePosition: {
      type: 'object',
      default: {
        "x": 0.5,
        "y": 0.5
      }
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '172px',
        left: '10px',
        right: '10px',
        bottom: '206px'
      }
    },
    subtitlepaddings: {
      type: 'object',
      default: {
        top: '5px',
        left: '10px',
        right: '10px',
        bottom: '5px'
      }
    },
    titlepaddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    opacity: {
      type: 'number',
      default: 0.5
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    titlefontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    titlefontSize: {
      type: 'string'
    },
    titleFontWeight: {
      type: 'string'
    },
    titleLineHeight: {
      type: 'number'
    },
    titleTransform: {
      type: 'string'
    },
    titleDecoration: {
      type: 'string'
    },
    titleLetterSpacing: {
      type: 'number'
    },
    subtitlefontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    subtitlefontSize: {
      type: 'string'
    },
    subtitleFontWeight: {
      type: 'string'
    },
    subtitleLineHeight: {
      type: 'number'
    },
    subtitleTransform: {
      type: 'string'
    },
    subtitleDecoration: {
      type: 'string'
    },
    subtitleLetterSpacing: {
      type: 'number'
    }
  },
  edit: withSelect((select, props) => {
    return {
      media: props.attributes.mediaId ? select('core').getMedia(props.attributes.mediaId) : undefined
    };
  })(BlockEdit),
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      bgType,
      boxColor,
      quoteColor,
      shadowColor,
      subtitle,
      subtitlepaddings,
      subtitleborderRadius,
      titlepaddings,
      Title,
      subtitleColor,
      subtitlebgColor,
      bgColor,
      titleColor,
      bgimgrepeat,
      bgimgposition,
      bgimgsize,
      bgimgattch,
      margins,
      paddings,
      opacity,
      subtitlefontfamily,
      subtitlefontSize,
      subtitleLineHeight,
      subtitleFontWeight,
      subtitleTransform,
      subtitleDecoration,
      subtitleLetterSpacing,
      titlefontfamily,
      titlefontSize,
      titleFontWeight,
      titleLineHeight,
      titleTransform,
      titleDecoration,
      titleLetterSpacing,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      bgImage,
      bgImageParallax,
      bgImageSize,
      bgImageRepeat,
      bgImageOverlay,
      bgOverlayColor,
      bgOverlayPopup,
      bgOverlayOpacity,
      bgVideo,
      bgImagePosition,
      hideTitle,
      hidesubtitle
    } = attributes;
    const blockquoteclass = 'wp-block background-img spice-blocks-cta cta';
    const blockStyle = plugin.pluginpath + 'assets/images/cta.jpg';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    let containerBg = '';

    if (bgType !== 'none' && bgType === 'image') {
      containerBg = `url(${bgImage})`;
    } else {
      containerBg = `url(${blockStyle})`;
    }

    let backgroundPosition = '';

    if (bgType === 'image' && bgImage) {
      backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
    } else {
      backgroundPosition = '';
    }

    let backgroundSize = '';

    if (bgType === 'image' && bgImage) {
      backgroundSize = bgImageSize;
    } else {
      backgroundSize = '';
    } //Image Background Attachment


    let backgroundAttachment = '';

    if (bgType === 'image' && bgImage && bgImageParallax) {
      backgroundAttachment = 'fixed';
    } else {
      backgroundAttachment = 'scroll';
    } //Background Image Repeat


    let backgroundRepeat = '';

    if (bgType === 'image' && bgImage) {
      backgroundRepeat = bgImageRepeat;
    } else {
      backgroundRepeat = '';
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", titlefontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2); var subtitlefontfamily2=`", subtitlefontfamily, "`; var subtitlefontfamilyurl2 = 'https://fonts.googleapis.com/css2?family='+subtitlefontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var subtitlefontfamilylink2 = document.createElement('link'); subtitlefontfamilylink2.href = subtitlefontfamilyurl2; subtitlefontfamilylink2.rel = \"stylesheet\"; subtitlefontfamilylink2.type =  \"text/css\"; document.head.appendChild(subtitlefontfamilylink2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.spice-blocks-cta#${uniqueid}{
			     	background-image: ${containerBg};					
			    	margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					animation-delay: ${delay}ms;
					background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
			     }
			    #${uniqueid} .top-heading{
			     	color:${titleColor};
					font-size: ${titlefontSize};
					font-weight: ${titleFontWeight};
					line-height: ${titleLineHeight}px;
					font-family: ${titlefontfamily};
					text-transform: ${titleTransform};
					text-decoration: ${titleDecoration};
					letter-spacing: ${titleLetterSpacing}px;
					padding: ${titlepaddings.top} ${titlepaddings.right} ${titlepaddings.bottom} ${titlepaddings.left};
					}
			    #${uniqueid} p.main-heading{
						color:${subtitleColor};
						font-size: ${subtitlefontSize};
						font-weight: ${subtitleFontWeight};
						line-height: ${subtitleLineHeight}px;
						font-family: ${subtitlefontfamily};
						text-transform: ${subtitleTransform};
						text-decoration: ${subtitleDecoration};
						letter-spacing: ${subtitleLetterSpacing}px;
						padding: ${subtitlepaddings.top} ${subtitlepaddings.right} ${subtitlepaddings.bottom} ${subtitlepaddings.left};
				}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: `${blockquoteclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`,
      id: uniqueid
    }, bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "spice-blocks-overlay",
      style: {
        backgroundColor: bgImageOverlay ? bgOverlayColor : '',
        opacity: bgImageOverlay ? bgOverlayOpacity : ''
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "block-container"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "block-row"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "block-col-12"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "cta-block"
    }, hideTitle && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      className: "top-heading",
      tagName: "h2",
      value: Title,
      style: {}
    })), hidesubtitle && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      className: "main-heading",
      tagName: "p",
      value: subtitle
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InnerBlocks.Content, null)))))));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Column.js":
/*!************************************!*\
  !*** ./src/blocks/Spice_Column.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _lib_coldeprecated__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./lib/coldeprecated */ "./src/blocks/lib/coldeprecated.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");

const {
  registerBlockType
} = wp.blocks;
const {
  __,
  sprintf
} = wp.i18n;









const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    verticalAlignment,
    textAlignment,
    width,
    templateLock,
    allowedBlocks,
    margins,
    paddings,
    border,
    borderradius,
    overlayopacity,
    shadowColor,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    zindex,
    colBgType,
    colBgHType,
    colBgColor,
    colBgHColor,
    colBgGradient,
    colBgHGradient,
    colBgImage,
    colBgHImage,
    colBgImageParallax,
    colBgImageSize,
    colBgImageRepeat,
    colBgImageOverlay,
    colBgImagePosition,
    colBgOverlayColor,
    colBgOverlayOpacity,
    colBgVideo,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes; // set unique ID

  setAttributes({
    uniqueid: clientId.slice(0, 8)
  });
  const classes = classnames__WEBPACK_IMPORTED_MODULE_4___default()('block-core-columns', {
    [`is-vertically-aligned-${verticalAlignment}`]: verticalAlignment,
    [`has-text-align-${textAlignment}`]: textAlignment,
    [`hide-desktop`]: hidedesktop,
    [`hide-tablet`]: hidetablet,
    [`hide-mobile`]: hidemobile,
    [`animated ${durations}`]: durations,
    [`animated ${animation}`]: animation
  }); // Normal Bg

  let containerBg = '';

  if (colBgType !== 'none' && colBgType === 'image') {
    containerBg = `url(${colBgImage})`;
  } else {
    containerBg = 'none';
  } // Hover Bg


  let containerHBg = '';

  if (colBgHType !== 'none' && colBgHType === 'image') {
    containerHBg = `url(${colBgHImage})`;
  } else {
    containerHBg = 'none';
  } // Background Position


  let backgroundPosition = '';

  if (colBgType === 'image' && colBgImage) {
    backgroundPosition = `${colBgImagePosition.x * 100}% ${colBgImagePosition.y * 100}%`;
  } else {
    backgroundPosition = '';
  } // Background Size


  let backgroundSize = '';

  if (colBgType === 'image' && colBgImage) {
    backgroundSize = colBgImageSize;
  } else {
    backgroundSize = '';
  } //Image Background Attachment


  let backgroundAttachment = '';

  if (colBgType === 'image' && colBgImage && colBgImageParallax) {
    backgroundAttachment = 'fixed';
  } else {
    backgroundAttachment = 'scroll';
  } //Background Image Repeat


  let backgroundRepeat = '';

  if (colBgType === 'image' && colBgImage) {
    backgroundRepeat = colBgImageRepeat;
  } else {
    backgroundRepeat = '';
  }

  const units = (0,_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUseCustomUnits)({
    availableUnits: (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useSetting)('spacing.units') || ['%', 'px', 'em', 'rem', 'vw']
  });
  const {
    columnsIds,
    hasChildBlocks,
    rootClientId
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useSelect)(select => {
    const {
      getBlockOrder,
      getBlockRootClientId
    } = select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.store);
    const rootId = getBlockRootClientId(clientId);
    return {
      hasChildBlocks: getBlockOrder(clientId).length > 0,
      rootClientId: rootId,
      columnsIds: getBlockOrder(rootId)
    };
  }, [clientId]);
  const {
    updateBlockAttributes
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useDispatch)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.store);

  const updateAlignment = value => {
    // Update own alignment.
    setAttributes({
      verticalAlignment: value
    }); // Reset parent Columns block.

    updateBlockAttributes(rootClientId, {
      verticalAlignment: null
    });
  };

  const widthWithUnit = Number.isFinite(width) ? width + '%' : width;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)({
    className: classes,
    style: widthWithUnit ? {
      flexBasis: widthWithUnit
    } : undefined
  });
  const columnsCount = columnsIds.length;
  const currentColumnPosition = columnsIds.indexOf(clientId) + 1;
  const label = sprintf(
  /* translators: 1: Block label (i.e. "Block: Column"), 2: Position of the selected block, 3: Total number of sibling blocks of the same type */
  __('%1$s (%2$d of %3$d)', 'spice-blocks'), blockProps['aria-label'], currentColumnPosition, columnsCount);
  const innerBlocksProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useInnerBlocksProps)({ ...blockProps,
    'aria-label': label
  }, {
    templateLock,
    allowedBlocks,
    renderAppender: hasChildBlocks ? undefined : _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InnerBlocks.ButtonBlockAppender
  });

  function setColBgColor(value) {
    setAttributes({
      colBgColor: value
    });
  }

  function setColBgHColor(value) {
    setAttributes({
      colBgHColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setColOverlayColor(value) {
    setAttributes({
      colBgOverlayColor: value
    });
  }

  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`#block-${clientId}{
						background-color:${colBgColor};
						background-image:${containerBg};
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						opacity: ${overlayopacity};
						animation-delay: ${delay}ms;
						background-position: ${backgroundPosition}; 
						background-repeat: ${colBgImageRepeat};
						background-size:${backgroundSize};
						background-attachment: ${backgroundAttachment};
						background-repeat: ${backgroundRepeat};
						z-index: ${zindex};
						overflow: hidden;
						position: relative;
					}
				#block-${clientId}:hover{
						background-color:${colBgHColor};
					}
				#block-${clientId}:hover .spice-blocks-overlay{
						opacity: 1 ;
						background-color:${colBgHColor} ;
						background-image:${containerHBg} ;
					}
					`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.BlockVerticalAlignmentToolbar, {
    onChange: updateAlignment,
    value: verticalAlignment
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Overlay Opacity', 'spice-blocks'),
    value: overlayopacity,
    onChange: newtext => setAttributes({
      overlayopacity: newtext
    }),
    min: 0,
    step: 0.01,
    max: 1
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: __('z-index', 'spice-blocks'),
    value: zindex,
    onChange: newtext => setAttributes({
      zindex: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Animation', 'spice-block'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: userVal => setAttributes({
      animation: userVal
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Spacing', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    label: __('Width', 'spice-blocks'),
    labelPosition: "edge",
    __unstableInputWidth: "80px",
    value: width || '',
    onChange: nextWidth => {
      nextWidth = 0 > parseFloat(nextWidth) ? '0' : nextWidth;
      setAttributes({
        width: nextWidth
      });
    },
    units: units
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: paddings,
    label: __('Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Background', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TabPanel, {
    className: "my-tab-panel",
    activeClass: "active-tab",
    orientation: "horizontal",
    initialTabName: "tab1",
    tabs: [{
      name: 'tab1',
      title: 'Normal',
      className: 'active'
    }, {
      name: 'tab2',
      title: 'Hover',
      className: 'tab-two'
    }]
  }, tab => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, tab.name == 'tab1' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    initialOpen: open,
    className: "spice-block-col-bg-color",
    colorSettings: [{
      value: colBgColor,
      onChange: setColBgColor,
      label: __('Background Color:', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_col_panel_label"
  }, " ", __('Background Type', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    isPressed: colBgType === 'image',
    onClick: () => setAttributes({
      colBgType: 'image'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "18",
    height: "15",
    viewBox: "0 0 18 15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M16.083.263h-14.446c-.798 0-1.445.648-1.445 1.447v11.579c0 .8.646 1.447 1.445 1.447h14.446c.798 0 1.445-.648 1.445-1.447v-11.579c0-.8-.646-1.447-1.445-1.447zm-4.334 2.171c2.389 0 2.386 3.618 0 3.618-2.385 0-2.39-3.618 0-3.618zm-9.39 10.855l4.334-5.789 2.965 3.961 2.091-2.514 3.611 4.342h-13.001z",
    className: "svg-fill",
    fillRule: "nonzero"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    isSmall: true,
    onClick: () => setAttributes({
      colBgType: 'none'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-image-rotate"
  })))), colBgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, colBgImage ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_preview_container"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_preview_image"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FocalPointPicker, {
    url: colBgImage,
    value: colBgImagePosition,
    onChange: focalPoint => setAttributes({
      colBgImagePosition: focalPoint
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_preview_actions"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setAttributes({
      colBgImage: ''
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-trash"
  }))))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.MediaUpload, {
    onSelect: media => setAttributes({
      colBgImage: media.url
    }),
    type: "image",
    value: colBgImage,
    render: _ref => {
      let {
        open
      } = _ref;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
        className: "spice_block_col_custom_upload",
        onClick: open
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dashicons dashicons-insert"
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "spice_block_col_upload_label"
      }, __('Add Image', 'spice-blocks')));
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_col_panel_label"
  }, __('Enable Parallax', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: colBgImageParallax,
    onChange: () => setAttributes({
      colBgImageParallax: !colBgImageParallax
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Size', 'spice-blocks'),
    options: [{
      label: __('Default', 'spice-blocks'),
      value: 'initial'
    }, {
      label: __('Cover', 'spice-blocks'),
      value: 'cover'
    }, {
      label: __('Contain', 'spice-blocks'),
      value: 'contain'
    }, {
      label: __('Auto', 'spice-blocks'),
      value: 'auto'
    }],
    onChange: size => {
      setAttributes({
        colBgImageSize: size
      });
    },
    value: colBgImageSize
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Background Repeat', 'spice-blocks'),
    options: [{
      label: __('No Repeat', 'spice-blocks'),
      value: 'no-repeat'
    }, {
      label: __('Repeat', 'spice-blocks'),
      value: 'repeat'
    }, {
      label: __('Repeat X', 'spice-blocks'),
      value: 'repeat-x'
    }, {
      label: __('Repeat Y', 'spice-blocks'),
      value: 'repeat-y'
    }],
    onChange: value => {
      setAttributes({
        colBgImageRepeat: value
      });
    },
    value: colBgImageRepeat
  }))), tab.name == 'tab2' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    initialOpen: open,
    className: "spice-block-col-bg-color",
    colorSettings: [{
      value: colBgHColor,
      onChange: setColBgHColor,
      clearable: true,
      label: __('Background Color:', 'spice-blocks')
    }]
  }))))), colBgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Background Overlay', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_col_panel_label"
  }, __('Enable Overlay', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.FormToggle, {
    checked: colBgImageOverlay,
    onChange: () => setAttributes({
      colBgImageOverlay: !colBgImageOverlay
    })
  })), colBgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_col_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    initialOpen: open,
    className: "spice-block-section-bg-overlay",
    title: __('Overlay Color', 'spice-blocks'),
    colorSettings: [{
      value: colBgOverlayColor,
      onChange: setColOverlayColor,
      clearable: true,
      label: __('Overlay Color:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Overlay Opacity', 'spice-blocks'),
    value: colBgOverlayOpacity,
    onChange: value => setAttributes({
      colBgOverlayOpacity: value
    }),
    min: 0.1,
    max: 1,
    step: 0.01
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: __('Border Settings', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_7__.colors,
    label: __('Border', 'spice-blocks'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: __('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", innerBlocksProps, colBgType === 'image' && colBgType !== 'none' && colBgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice-blocks-overlay",
    style: {
      backgroundColor: colBgImageOverlay ? colBgOverlayColor : '',
      opacity: colBgImageOverlay ? colBgOverlayOpacity : ''
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice-column-wrapper"
  }, innerBlocksProps.children)));
};

registerBlockType('spice-blocks/spice-column', {
  apiVersion: 2,
  title: __('Column', 'spice-blocks'),
  category: 'spice-blocks',
  parent: ['spice-blocks/spice-section'],
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24.000000000000004",
    height: "24.000000000000004"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "null",
    height: "24",
    width: "10.8",
    y: "0",
    x: "0",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "null",
    height: "24",
    width: "10.8",
    y: "0",
    x: "13",
    fill: "#09A223"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  })))),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Column', 'column'],
  "attributes": {
    uniqueid: {
      type: 'string'
    },
    mediaId: {
      type: 'number',
      default: 0
    },
    mediaUrl: {
      type: 'string',
      default: ''
    },
    textAlignment: {
      type: 'string',
      default: 'center'
    },
    verticalAlignment: {
      type: 'string'
    },
    width: {
      type: 'string'
    },
    allowedBlocks: {
      type: 'array'
    },
    templateLock: {
      type: ["string", "boolean"],
      enum: ["all", "insert", "contentOnly", false]
    },
    shadowColor: {
      type: 'string',
      default: '#ADACAC'
    },
    margins: {
      default: {
        top: '0px',
        right: 'auto',
        bottom: '0px',
        left: 'auto'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    border: {
      type: 'object',
      default: {
        color: '',
        style: '',
        width: ''
      }
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    overlayopacity: {
      type: 'number'
    },
    zindex: {
      type: 'string'
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    colBgType: {
      "type": "string",
      "default": "none"
    },
    colBgHType: {
      "type": "string",
      "default": "none"
    },
    colBgColor: {
      type: 'string'
    },
    colBgHColor: {
      type: 'string'
    },
    colBgGradient: {
      "type": "string",
      "default": "linear-gradient(135deg,#12c2e9 0%,#c471ed 50%,#f64f59 100%)"
    },
    colBgHGradient: {
      "type": "string",
      "default": "linear-gradient(135deg,#12c2e9 0%,#c471ed 50%,#f64f59 100%)"
    },
    colBgImage: {
      "type": "string"
    },
    colBgHImage: {
      "type": "string"
    },
    colBgImageParallax: {
      "type": "boolean",
      "default": false
    },
    colBgImageSize: {
      "type": "string",
      "default": "cover"
    },
    colBgImageRepeat: {
      "type": "string",
      "default": "no-repeat"
    },
    colBgImageOverlay: {
      "type": "boolean",
      "default": false
    },
    colBgOverlayColor: {
      "type": "string",
      "default": "#000000"
    },
    colBgOverlayOpacity: {
      "type": "number",
      "default": 0.6
    },
    colBgVideo: {
      "type": "string"
    },
    colBgImagePosition: {
      "type": "object",
      "default": {
        "x": 0.5,
        "y": 0.5
      }
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes,
      setAttributes,
      clientId
    } = props;
    const {
      uniqueid,
      verticalAlignment,
      textAlignment,
      width,
      margins,
      paddings,
      border,
      borderradius,
      overlayopacity,
      shadowColor,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      zindex,
      colBgType,
      colBgHType,
      colBgColor,
      colBgHColor,
      colBgImage,
      colBgHImage,
      colBgImageParallax,
      colBgImageSize,
      colBgImageRepeat,
      colBgImageOverlay,
      colBgImagePosition,
      colBgOverlayColor,
      colBgOverlayOpacity,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes; // Normal Bg for save method

    let containerBg = '';

    if (colBgType !== 'none' && colBgType === 'image') {
      containerBg = `url(${colBgImage})`;
    } else {
      containerBg = 'none';
    } // Hover Bg for save method


    let containerHBg = '';

    if (colBgHType !== 'none' && colBgHType === 'image') {
      containerHBg = `url(${colBgHImage})`;
    } else {
      containerHBg = 'none';
    } // Background Position for save method	


    let backgroundPosition = '';

    if (colBgType === 'image' && colBgImage) {
      backgroundPosition = `${colBgImagePosition.x * 100}% ${colBgImagePosition.y * 100}%`;
    } else {
      backgroundPosition = '';
    } // Background Size for save method


    let backgroundSize = '';

    if (colBgType === 'image' && colBgImage) {
      backgroundSize = colBgImageSize;
    } else {
      backgroundSize = '';
    } //Image Background Attachment


    let backgroundAttachment = '';

    if (colBgType === 'image' && colBgImage && colBgImageParallax) {
      backgroundAttachment = 'fixed';
    } else {
      backgroundAttachment = 'scroll';
    } //Background Image Repeat


    let backgroundRepeat = '';

    if (colBgType === 'image' && colBgImage) {
      backgroundRepeat = colBgImageRepeat;
    } else {
      backgroundRepeat = '';
    }

    const wrapperClasses = classnames__WEBPACK_IMPORTED_MODULE_4___default()({
      [`is-vertically-aligned-${verticalAlignment}`]: verticalAlignment,
      [`has-text-align-${textAlignment}`]: textAlignment,
      [`hide-desktop`]: hidedesktop,
      [`hide-tablet`]: hidetablet,
      [`hide-mobile`]: hidemobile,
      [`animated ${durations}`]: durations,
      [`animated ${animation}`]: animation,
      [`spice-block-col-${uniqueid}`]: 'uniqueid'
    });
    let style;

    if (width && /\d/.test(width)) {
      // Numbers are handled for backward compatibility as they can be still provided with templates.
      let flexBasis = Number.isFinite(width) ? width + '%' : width; // In some cases we need to round the width to a shorter float.

      if (!Number.isFinite(width) && width !== null && width !== void 0 && width.endsWith('%')) {
        const multiplier = 1000000000000; // Shrink the number back to a reasonable float.

        flexBasis = Math.round(Number.parseFloat(width) * multiplier) / multiplier + '%';
      }

      style = {
        flexBasis
      };
    }

    const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps.save({
      className: wrapperClasses,
      style
    });
    const innerBlocksProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useInnerBlocksProps.save(blockProps);
    const widthWithUnit = Number.isFinite(width) ? width + '%' : width;
    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.spice-block-col-${uniqueid}{
						background-color:${colBgColor};
						background-image:${containerBg};
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						opacity: ${overlayopacity};
						animation-delay: ${delay}ms;
						z-index: ${zindex};
						flex-basis:${widthWithUnit};
						background-position: ${backgroundPosition};
						background-repeat:${colBgImageRepeat};
						background-size:${backgroundSize};
						background-attachment:${backgroundAttachment};
						overflow: hidden;
						position: relative;
					}
					.spice-block-col-${uniqueid}:hover{
							background-color:${colBgHColor};
							
						}
					.spice-block-col-${uniqueid}:hover .spice-blocks-overlay{
							opacity: 1 ;
							background-color:${colBgHColor} ;
							background-image:${containerHBg} ;
						}	
						`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", innerBlocksProps, colBgType !== 'none' && colBgType === 'video' && colBgVideo && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("video", {
      autoPlay: true,
      muted: true,
      loop: true,
      id: "spice_blocks_video"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("source", {
      src: colBgVideo,
      type: "video/mp4"
    })), (colBgType === 'image' || colBgType === 'video') && colBgType !== 'none' && colBgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "spice-blocks-overlay",
      style: {
        backgroundColor: colBgImageOverlay ? colBgOverlayColor : '',
        opacity: colBgImageOverlay ? colBgOverlayOpacity : ''
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "spice-column-wrapper"
    }, innerBlocksProps.children)));
  },
  deprecated: _lib_coldeprecated__WEBPACK_IMPORTED_MODULE_5__["default"]
});

/***/ }),

/***/ "./src/blocks/Spice_Divider.js":
/*!*************************************!*\
  !*** ./src/blocks/Spice_Divider.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);

const {
  registerBlockType
} = wp.blocks;
const {
  InspectorControls,
  PanelColorSettings,
  BlockControls,
  AlignmentToolbar
} = wp.blockEditor;

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;


const BlockEdit = props => {
  const {
    attributes,
    setAttributes
  } = props;
  const {
    diviWidth,
    diviHeight,
    borderstyle,
    borderradius,
    margins,
    paddings,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    diviColor,
    shadowColor
  } = attributes;
  const blockclass = 'spice-blocks-divider';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
  const dividerclass = 'spice-blocks-divider-line';
  const diviStyles = {
    borderWidth: diviHeight + 'px',
    width: diviWidth + '%',
    borderStyle: borderstyle,
    borderRadius: borderradius + 'px',
    boxShadow: `${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor}`,
    borderColor: diviColor
  };

  function setdiviColor(value) {
    setAttributes({
      diviColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
    label: __('Type', 'spice-blocks'),
    value: borderstyle,
    options: [{
      label: __('Solid', 'spice-blocks'),
      value: 'solid'
    }, {
      label: __('Dashed', 'spice-blocks'),
      value: 'dashed'
    }, {
      label: __('Double', 'spice-blocks'),
      value: 'double'
    }, {
      label: __('Groove', 'spice-blocks'),
      value: 'groove'
    }, {
      label: __('Ridge', 'spice-blocks'),
      value: 'ridge'
    }, {
      label: __('Dotted', 'spice-blocks'),
      value: 'dotted'
    }, {
      label: __('Inset', 'spice-blocks'),
      value: 'inset'
    }, {
      label: __('Outset', 'spice-blocks'),
      value: 'outset'
    }],
    onChange: newtext => setAttributes({
      borderstyle: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Width', 'spice-blocks'),
    value: diviWidth,
    onChange: newtext => setAttributes({
      diviWidth: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Height', 'spice-blocks'),
    value: diviHeight,
    onChange: newtext => setAttributes({
      diviHeight: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Border Radius', 'spice-blocks'),
    value: borderradius,
    onChange: newtext => setAttributes({
      borderradius: newtext
    }),
    min: 0,
    max: 50
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBoxControl, {
    values: paddings,
    label: __('Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Color Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: [{
      value: diviColor,
      clearable: true,
      onChange: setdiviColor,
      label: __('Color:', 'spice-blocks')
    }]
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `${alignmentClass} ${animationclass} ${displayclass}`,
    style: {
      animationDelay: delay + 'ms',
      margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
      padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`
    }
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: dividerclass,
    style: diviStyles
  })));
};

registerBlockType('spice-blocks/spice-divider', {
  title: __('Divider', 'spice-blocks'),
  category: 'spice-blocks',
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_7"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "#09A223",
    id: "svg_1",
    height: "1.24158",
    width: "23.90919",
    y: "11.16637",
    x: "0.04541",
    "stroke-width": "1",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "#09A223",
    id: "svg_6",
    d: "m9.19759,4.83403l2.80241,-4.17182l2.80241,4.17182l-1.4012,0l0,4.19189l-2.80242,0l0,-4.19189l-1.4012,0z",
    "stroke-width": "1",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    transform: "rotate(-180 12 18.7142)",
    stroke: "#09A223",
    id: "svg_5",
    d: "m9.19759,18.7042l2.80241,-4.17182l2.80241,4.17182l-1.40121,0l0,4.19189l-2.80241,0l0,-4.19189l-1.40121,0z",
    "stroke-width": "1",
    fill: "#09A223"
  }))),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Spacer', 'Spacer'],
  attributes: {
    borderstyle: {
      type: 'string',
      default: 'solid'
    },
    diviWidth: {
      type: 'number',
      default: 50
    },
    textAlignment: {
      type: 'string',
      default: 'center'
    },
    diviHeight: {
      type: 'number'
    },
    borderradius: {
      type: 'number',
      default: 0
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    diviColor: {
      type: 'string'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    }
  },
  supports: {
    align: ['wide', 'full']
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      diviWidth,
      diviHeight,
      borderstyle,
      borderradius,
      margins,
      paddings,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      diviColor,
      shadowColor
    } = attributes;
    const blockclass = 'spice-blocks-divider';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const dividerclass = 'spice-blocks-divider-line';
    const diviStyles = {
      borderWidth: diviHeight + 'px',
      width: diviWidth + '%',
      borderStyle: borderstyle,
      borderRadius: borderradius + 'px',
      boxShadow: `${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor}`,
      borderColor: diviColor
    };
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: `${alignmentClass} ${animationclass} ${displayclass}`,
      style: {
        animationDelay: delay + 'ms',
        margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
        padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`
      }
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: dividerclass,
      style: diviStyles
    }));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Editor.js":
/*!************************************!*\
  !*** ./src/blocks/Spice_Editor.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var animate_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! animate.css */ "./node_modules/animate.css/animate.css");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");



const {
  RichText,
  ColorPalette,
  InspectorControls,
  BlockControls,
  AlignmentToolbar,
  withColors,
  FontSizePicker,
  getColorClassName,
  PanelColorSettings
} = wp.blockEditor;
const {
  PanelBody,
  Button,
  ResponsiveWrapper,
  RangeControl,
  ToggleControl,
  SelectControl,
  TextControl
} = wp.components;
const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;
const {
  withSelect
} = wp.data;


const fontSizes = [{
  name: 'Tiny',
  slug: 'tiny',
  size: 8
}, {
  name: 'Small',
  slug: 'small',
  size: 12
}, {
  name: 'Normal',
  slug: 'normal',
  size: 16
}, {
  name: 'Big',
  slug: 'big',
  size: 26
}, {
  name: 'Bigger',
  slug: 'bigger',
  size: 30
}, {
  name: 'Huge',
  slug: 'huge',
  size: 36
}, {
  name: 'Very Huge',
  slug: 'very-huge',
  size: 72
}];
const fallbackContentFontSize = 16;
const fallbackdropcapFontSize = 72;

const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    content,
    dropCap,
    contentColor,
    bgColor,
    margins,
    paddings,
    dropcapmargins,
    dropcappaddings,
    fontfamily,
    contentfontSize,
    ContentLineHeight,
    ContentFontWeight,
    ContentTransform,
    ContentDecoration,
    ContentLetterSpacing,
    dropcapfontfamily,
    dropcapfontSize,
    dropcapLineHeight,
    dropcapFontWeight,
    dropcapTransform,
    dropcapDecoration,
    dropcapLetterSpacing,
    dropColor,
    dropbgColor,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay
  } = attributes;
  const blockclass = 'spice-blocks-text-editor';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
  const dropcapclass = dropCap != false ? 'has-dropcap' : '';

  function setContent(value) {
    setAttributes({
      content: value
    });
  }

  function setContentColor(value) {
    setAttributes({
      contentColor: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setdropColor(value) {
    setAttributes({
      dropColor: value
    });
  }

  function setdropbgColor(value) {
    setAttributes({
      dropbgColor: value
    });
  }

  function setPaddings(value) {
    setAttributes({
      paddings: {
        top: value,
        left: value,
        right: value,
        bottom: value
      }
    });
  }

  setAttributes({
    uniqueid: 'spiceEditor' + clientId.slice(0, 8)
  });

  if (fontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + fontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  if (dropcapfontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + dropcapfontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Padding', 'spice-blocks'),
    values: paddings,
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Dropcap', 'spice-blocks'),
    checked: dropCap,
    onChange: newval => setAttributes({
      dropCap: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Dropcap Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: dropcapmargins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...dropcapmargins,
      dropcapmargins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Dropcap Padding', 'spice-blocks'),
    values: dropcappaddings,
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...dropcappaddings,
      dropcappaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: [{
      value: contentColor,
      clearable: true,
      onChange: setContentColor,
      label: __('Text Color:', 'spice-blocks')
    }, {
      value: bgColor,
      clearable: true,
      onChange: setBgColor,
      label: __('Background Color:', 'spice-blocks')
    }, {
      value: dropColor,
      clearable: true,
      onChange: setdropColor,
      label: __('Dropcap Color:', 'spice-blocks')
    }, {
      value: dropbgColor,
      clearable: true,
      onChange: setdropbgColor,
      label: __('Dropcap Backgroud Color:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks'),
    className: "spicetexteditortypo"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Content Typography Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: fontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      fontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    fontSizes: fontSizes,
    value: contentfontSize,
    fallbackFontSize: fallbackContentFontSize,
    onChange: userVal => setAttributes({
      contentfontSize: userVal
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: ContentFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      ContentFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: ContentLineHeight,
    onChange: newtext => setAttributes({
      ContentLineHeight: newtext
    }),
    min: 0,
    step: 0.1,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: ContentTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      ContentTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: ContentDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      ContentDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: ContentLetterSpacing,
    onChange: newtext => setAttributes({
      ContentLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Dropcap Typography Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: dropcapfontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      dropcapfontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    fontSizes: fontSizes,
    value: dropcapfontSize,
    fallbackFontSize: fallbackdropcapFontSize,
    onChange: userVal => setAttributes({
      dropcapfontSize: userVal
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: dropcapFontWeight,
    options: [{
      label: 'Thin',
      value: '100'
    }, {
      label: 'Extra Light',
      value: '200'
    }, {
      label: 'Light',
      value: '300'
    }, {
      label: 'Regular',
      value: '400'
    }, {
      label: 'Medium',
      value: '500'
    }, {
      label: 'Semi Bold',
      value: '600'
    }, {
      label: 'Bold',
      value: '700'
    }, {
      label: 'Extra Bold',
      value: '800'
    }, {
      label: 'Black',
      value: '900'
    }],
    onChange: newtext => setAttributes({
      dropcapFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: dropcapLineHeight,
    onChange: newtext => setAttributes({
      dropcapLineHeight: newtext
    }),
    min: 0,
    step: 0.1,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: dropcapTransform,
    options: [{
      label: 'Default',
      value: ''
    }, {
      label: 'Uppercase',
      value: 'uppercase'
    }, {
      label: 'Lowercase',
      value: 'lowercase'
    }, {
      label: 'Capitalize',
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      dropcapTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: dropcapDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      dropcapDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: dropcapLetterSpacing,
    onChange: newtext => setAttributes({
      dropcapLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`.text-editor-inner p.${uniqueid}.has-dropcap:first-child:first-letter {
					color: ${dropColor};
					background-color:${dropbgColor};
					float: left;
					font-family: ${dropcapfontfamily};
					font-size: ${dropcapfontSize};
					text-transform:${dropcapTransform};
					text-decoration:${dropcapDecoration};
					font-weight: ${dropcapFontWeight};
					line-height: ${dropcapLineHeight}px;
					letter-spacing: ${dropcapLetterSpacing}px;
					margin: ${dropcapmargins.top} ${dropcapmargins.right} ${dropcapmargins.bottom} ${dropcapmargins.left};
					padding: ${dropcappaddings.top} ${dropcappaddings.right} ${dropcappaddings.bottom} ${dropcappaddings.left};
				}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "text-editor-inner"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    tagName: "p",
    className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${dropcapclass} ${uniqueid}`,
    placeholder: __('Enter Text Here', 'spice-blocks'),
    value: content,
    onChange: setContent,
    style: {
      color: contentColor,
      backgroundColor: bgColor,
      margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
      padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`,
      fontSize: contentfontSize,
      fontWeight: ContentFontWeight,
      lineHeight: `${ContentLineHeight}px`,
      animationDelay: delay + 'ms',
      fontFamily: fontfamily,
      textTransform: ContentTransform,
      textDecoration: ContentDecoration,
      letterSpacing: ContentLetterSpacing
    }
  })));
};

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('spice-blocks/spice-text-editor', {
  title: __('Text Editor', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 512 512"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "a",
    x1: "53.862",
    x2: "458.25",
    y1: "113.412",
    y2: "517.8",
    gradientTransform: "matrix(1 0 0 -1 0 514)",
    gradientUnits: "userSpaceOnUse"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "0",
    "stop-color": "#332c81"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    "stop-color": "#e21d73"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    fill: "#09A223",
    d: "M460.6 6H51.4c-9.9 0-17.9 8-17.9 17.9V131c0 9.9 8 17.9 17.9 17.9h35.7c9.9 0 17.9-8 17.9-17.9V95.3h106.4v339.3h-44.6c-9.9 0-17.9 8-17.9 17.9v35.7c0 9.9 8 17.9 17.9 17.9h178.6c9.9 0 17.9-8 17.9-17.9v-35.7c0-9.9-8-17.9-17.9-17.9h-44.6V95.3h106.4V131c0 9.9 8 17.9 17.9 17.9h35.7c9.9 0 17.9-8 17.9-17.9V23.9C478.5 14 470.5 6 460.6 6z"
  })),
  category: 'spice-blocks',
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Text Editor', 'Text Editor', 'Editor'],
  supports: {
    html: false,
    anchor: true,
    spacing: {
      margin: true,
      padding: true
    }
  },
  attributes: {
    uniqueid: {
      type: 'string'
    },
    content: {
      type: 'string'
    },
    dropCap: {
      type: 'boolean',
      default: false
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    contentColor: {
      type: 'string'
    },
    bgColor: {
      type: 'string'
    },
    dropColor: {
      type: 'string'
    },
    dropbgColor: {
      type: 'string'
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    dropcapmargins: {
      default: {
        top: '10px',
        left: '10px',
        right: '10px',
        bottom: '10px'
      }
    },
    dropcappaddings: {
      type: 'object',
      default: {
        top: '8px',
        left: '12px',
        right: '12px',
        bottom: '8px'
      }
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    fontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    ContentFontWeight: {
      type: 'string',
      default: 400
    },
    ContentLineHeight: {
      type: 'number',
      default: 28
    },
    ContentTransform: {
      type: 'string'
    },
    ContentDecoration: {
      type: 'string'
    },
    ContentLetterSpacing: {
      type: 'number'
    },
    contentfontSize: {
      type: 'string',
      default: '18px'
    },
    dropcapfontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    dropcapFontWeight: {
      type: 'string',
      default: 600
    },
    dropcapLineHeight: {
      type: 'number',
      default: 60
    },
    dropcapTransform: {
      type: 'string',
      default: 'uppercase'
    },
    dropcapDecoration: {
      type: 'string'
    },
    dropcapLetterSpacing: {
      type: 'number'
    },
    dropcapfontSize: {
      type: 'string',
      default: '72px'
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      fontfamily,
      content,
      dropCap,
      contentColor,
      bgColor,
      margins,
      paddings,
      dropcapmargins,
      dropcappaddings,
      contentfontSize,
      ContentLineHeight,
      ContentFontWeight,
      ContentTransform,
      ContentDecoration,
      ContentLetterSpacing,
      dropcapfontfamily,
      dropcapfontSize,
      dropcapLineHeight,
      dropcapFontWeight,
      dropcapTransform,
      dropcapDecoration,
      dropcapLetterSpacing,
      dropColor,
      dropbgColor,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay
    } = attributes;
    const blockclass = 'spice-blocks-text-editor';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const dropcapclass = dropCap != false ? 'has-dropcap' : '';
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.text-editor-inner p.${uniqueid}.has-dropcap:first-child:first-letter {
						color: ${dropColor};
						background-color:${dropbgColor};
						float: left;
						font-family: ${dropcapfontfamily};
						font-size: ${dropcapfontSize};
						font-weight: ${dropcapFontWeight};
						text-transform:${dropcapTransform};
						text-decoration:${dropcapDecoration};
						line-height: ${dropcapLineHeight}px;
						letter-spacing: ${dropcapLetterSpacing}px;
						margin: ${dropcapmargins.top} ${dropcapmargins.right} ${dropcapmargins.bottom} ${dropcapmargins.left};
						padding: ${dropcappaddings.top} ${dropcappaddings.right} ${dropcappaddings.bottom} ${dropcappaddings.left};
							}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", fontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2); var dropcapfontfamily2=`", dropcapfontfamily, "`; var dropcapfontfamilyurl2 = 'https://fonts.googleapis.com/css2?family='+dropcapfontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var dropcapfontfamilylink2 = document.createElement('link'); dropcapfontfamilylink2.href = dropcapfontfamilyurl2; dropcapfontfamilylink2.rel = \"stylesheet\"; dropcapfontfamilylink2.type =  \"text/css\"; document.head.appendChild(dropcapfontfamilylink2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "text-editor-inner"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      tagName: "p",
      className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${dropcapclass} ${uniqueid} ${props.attributes.className}`,
      value: attributes.content,
      style: {
        color: contentColor,
        backgroundColor: bgColor,
        margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
        padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`,
        fontSize: contentfontSize,
        fontWeight: ContentFontWeight,
        lineHeight: `${ContentLineHeight}px`,
        animationDelay: delay + 'ms',
        fontFamily: fontfamily,
        textTransform: ContentTransform,
        textDecoration: ContentDecoration,
        letterSpacing: ContentLetterSpacing
      }
    })));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Heading.js":
/*!*************************************!*\
  !*** ./src/blocks/Spice_Heading.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var animate_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! animate.css */ "./node_modules/animate.css/animate.css");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");



const {
  RichText,
  ColorPalette,
  InspectorControls,
  BlockControls,
  AlignmentToolbar,
  withColors,
  FontSizePicker,
  getColorClassName,
  PanelColorSettings
} = wp.blockEditor;

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;


const BlockEdit = props => {
  const {
    attributes,
    setAttributes
  } = props;
  const {
    title,
    Contenttag,
    titleColor,
    bgColor,
    shadowColor,
    margins,
    paddings,
    fontfamily,
    titlefontSize,
    TitleLineHeight,
    TitleFontWeight,
    TitleTransform,
    TitleDecoration,
    TitleLetterSpacing,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay
  } = attributes;
  const blockclass = 'spice-blocks-heading';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;

  function setTitle(value) {
    setAttributes({
      title: value
    });
  }

  function setTitleColor(value) {
    setAttributes({
      titleColor: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setPaddings(value) {
    setAttributes({
      paddings: {
        top: value,
        left: value,
        right: value,
        bottom: value
      }
    });
  }

  if (fontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + fontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Content', 'spice-blocks'),
    value: Contenttag,
    options: [{
      label: __('H1', 'spice-blocks'),
      value: 'h1'
    }, {
      label: __('H2', 'spice-blocks'),
      value: 'h2'
    }, {
      label: __('H3', 'spice-blocks'),
      value: 'h3'
    }, {
      label: __('H4', 'spice-blocks'),
      value: 'h4'
    }, {
      label: __('H5', 'spice-blocks'),
      value: 'h5'
    }, {
      label: __('H6', 'spice-blocks'),
      value: 'h6'
    }],
    onChange: newtext => setAttributes({
      Contenttag: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    values: paddings,
    label: __('Content Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Text Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Text Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Text Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: [{
      value: titleColor,
      clearable: true,
      onChange: setTitleColor,
      label: __('Heading Color:', 'spice-blocks')
    }, {
      value: bgColor,
      clearable: true,
      onChange: setBgColor,
      label: __('Background Color:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks'),
    className: "spiceheadingtypo"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: fontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      fontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: titlefontSize,
    onChange: userVal => setAttributes({
      titlefontSize: userVal
    }),
    allowReset: false
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: TitleFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      TitleFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: TitleLineHeight,
    onChange: newtext => setAttributes({
      TitleLineHeight: newtext
    }),
    min: 0,
    step: 0.1,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: TitleTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      TitleTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: TitleDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      TitleDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: TitleLetterSpacing,
    onChange: newtext => setAttributes({
      TitleLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText, {
    key: "editable",
    tagName: Contenttag,
    className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass}`,
    placeholder: __('Enter Heading Here...', 'spice-blocks'),
    value: title,
    onChange: setTitle,
    style: {
      color: titleColor,
      backgroundColor: bgColor,
      margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
      padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`,
      fontSize: titlefontSize,
      fontWeight: TitleFontWeight,
      lineHeight: `${TitleLineHeight}px`,
      animationDelay: delay + 'ms',
      textShadow: `${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor}`,
      fontFamily: fontfamily,
      textTransform: TitleTransform,
      textDecoration: TitleDecoration,
      letterSpacing: TitleLetterSpacing
    }
  }));
};

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('spice-blocks/spice-heading', {
  title: __('Heading', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 512 512"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    fill: "#09A223",
    d: "M456 89.3v333.3h33.3c9.2 0 16.7 7.5 16.7 16.7v33.3c0 9.2-7.5 16.7-16.7 16.7H322.7c-9.2 0-16.7-7.5-16.7-16.7v-33.3c0-9.2 7.5-16.7 16.7-16.7H356V289.3H156v133.3h33.3c9.2 0 16.7 7.5 16.7 16.7v33.3c0 9.2-7.5 16.7-16.7 16.7H22.7c-9.2 0-16.7-7.5-16.7-16.7v-33.3c0-9.2 7.5-16.7 16.7-16.7H56V89.3H22.7C13.5 89.3 6 81.9 6 72.7V39.3c0-9.2 7.5-16.7 16.7-16.7h166.7c9.2 0 16.7 7.5 16.7 16.7v33.3c0 9.2-7.5 16.7-16.7 16.7H156v133.3h200V89.3h-33.3c-9.2 0-16.7-7.5-16.7-16.7V39.3c0-9.2 7.5-16.7 16.7-16.7h166.7c9.2 0 16.7 7.5 16.7 16.7v33.3c0 9.2-7.5 16.7-16.7 16.7H456z"
  })),
  category: 'spice-blocks',
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Heading', 'Heading', 'Title'],
  supports: {
    html: false,
    anchor: true,
    spacing: {
      margin: true,
      padding: true
    }
  },
  attributes: {
    title: {
      type: 'string'
    },
    Contenttag: {
      type: 'string',
      default: 'h2'
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    mediaId: {
      type: 'number',
      default: 0
    },
    mediaUrl: {
      type: 'string',
      default: ''
    },
    titleColor: {
      type: 'string'
    },
    bgColor: {
      type: 'string'
    },
    shadowColor: {
      type: 'string',
      default: '#ADACAC'
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string'
    },
    delay: {
      type: 'string'
    },
    fontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    titlefontSize: {
      type: 'string'
    },
    TitleFontWeight: {
      type: 'string',
      default: '600'
    },
    TitleLineHeight: {
      type: 'number'
    },
    TitleTransform: {
      type: 'string'
    },
    TitleDecoration: {
      type: 'string'
    },
    TitleLetterSpacing: {
      type: 'number'
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      fontfamily,
      title,
      Contenttag,
      titleColor,
      bgColor,
      shadowColor,
      margins,
      paddings,
      titlefontSize,
      TitleLineHeight,
      TitleFontWeight,
      TitleTransform,
      TitleDecoration,
      TitleLetterSpacing,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay
    } = attributes;
    const blockclass = 'spice-blocks-heading';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", fontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RichText.Content, {
      tagName: Contenttag,
      className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`,
      value: attributes.title,
      style: {
        color: titleColor,
        backgroundColor: bgColor,
        margin: `${margins.top} ${margins.right} ${margins.bottom} ${margins.left}`,
        padding: `${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left}`,
        fontSize: titlefontSize,
        fontWeight: TitleFontWeight,
        lineHeight: `${TitleLineHeight}px`,
        animationDelay: delay + 'ms',
        textShadow: `${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor}`,
        fontFamily: fontfamily,
        textTransform: TitleTransform,
        textDecoration: TitleDecoration,
        letterSpacing: TitleLetterSpacing
      }
    }));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Icon.js":
/*!**********************************!*\
  !*** ./src/blocks/Spice_Icon.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _fonticonpicker_react_fonticonpicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @fonticonpicker/react-fonticonpicker */ "./node_modules/@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.react.js");
/* harmony import */ var _fonticonpicker_react_fonticonpicker__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_fonticonpicker_react_fonticonpicker__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lib_icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./lib/icons */ "./src/blocks/lib/icons.js");
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");

const {
  registerBlockType
} = wp.blocks;
const {
  InspectorControls,
  PanelColorSettings,
  BlockControls,
  AlignmentToolbar,
  useBlockProps
} = wp.blockEditor;
const {
  PanelBody,
  RangeControl,
  ToggleControl,
  SelectControl,
  TextControl
} = wp.components;

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;




const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    iconv,
    iconWidth,
    iconbg,
    iconhbg,
    border,
    borderradius,
    margins,
    paddings,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    iconColor,
    iconhColor,
    shadowColor,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes;
  setAttributes({
    uniqueid: 'spiceblocksicon' + clientId.slice(0, 8)
  });
  const blockclass = 'spice-blocks-icon';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;

  function seticonColor(value) {
    setAttributes({
      iconColor: value
    });
  }

  function seticonhColor(value) {
    setAttributes({
      iconhColor: value
    });
  }

  function seticonBg(value) {
    setAttributes({
      iconbg: value
    });
  }

  function seticonhBg(value) {
    setAttributes({
      iconhbg: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  const blockProps = useBlockProps();

  const SpiceColorTabPanel = () => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TabPanel, {
    className: "color-tab-panel",
    activeClass: "active-tab",
    tabs: [{
      name: 'normal',
      title: __('Normal', 'spice-blocks'),
      className: 'tab-one',
      content: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
        initialOpen: open,
        colorSettings: [{
          value: iconColor,
          clearable: true,
          onChange: seticonColor,
          label: __('Icon Color:', 'spice-blocks')
        }, {
          value: iconbg,
          clearable: true,
          onChange: seticonBg,
          label: __('Background Color:', 'spice-blocks')
        }],
        className: 'spice-blocks-normal-button'
      })
    }, {
      name: 'hover',
      title: __('Hover', 'spice-blocks'),
      className: 'tab-two',
      content: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
        initialOpen: open,
        colorSettings: [{
          value: iconhColor,
          onChange: seticonhColor,
          label: __('Icon Color:', 'spice-blocks')
        }, {
          value: iconhbg,
          onChange: seticonhBg,
          label: __('Background Color:', 'spice-blocks')
        }],
        className: 'spice-blocks-hover-button'
      })
    }]
  }, tab => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, tab.content));

  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`.spice-blocks-icon#${uniqueid} i{
						color: ${iconColor};
						background-color:${iconbg};
						font-size: ${iconWidth}px;
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};	
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						color: iconColor;
						background-color:iconbg;
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					}
					.spice-blocks-icon#${uniqueid} i:hover{
						color: ${iconhColor};
						background-color:${iconhbg};
					}
					.spice-blocks-icon#${uniqueid}{
						animation-delay: ${delay}ms;
					}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)((_fonticonpicker_react_fonticonpicker__WEBPACK_IMPORTED_MODULE_2___default()), {
    theme: "default spiceblocksicon " + uniqueid,
    icons: _lib_icons__WEBPACK_IMPORTED_MODULE_3__.icons,
    value: iconv,
    onChange: val => setAttributes({
      iconv: val
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Width(px)', 'spice-blocks'),
    value: iconWidth,
    onChange: newtext => setAttributes({
      iconWidth: newtext
    }),
    min: 0,
    max: 500
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_4__.colors,
    label: __('Border', 'spice-blocks'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: __('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBoxControl, {
    values: paddings,
    label: __('Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
    initialOpen: false,
    title: __('Color & Background Settings', 'spice-blocks'),
    className: "spice-blocks-dual-color"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", blockProps, SpiceColorTabPanel()))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    id: uniqueid,
    className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass}`
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("i", {
    className: iconv
  })));
};

registerBlockType('spice-blocks/spice-icon', {
  title: __('Icon', 'spice-blocks'),
  category: 'spice-blocks',
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "24",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("ellipse", {
    stroke: "#09A223",
    "stroke-width": "2",
    ry: "9.87913",
    rx: "9.87913",
    id: "svg_9",
    cy: "12.00228",
    cx: "12.51808",
    fill: "none"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "null",
    id: "svg_11",
    d: "m22.51911,1.3706l-1.98122,-1.12429c-0.49987,-0.28338 -1.15853,-0.14699 -1.4735,0.30441l-0.78091,1.12219l3.79016,2.14928l0.78153,-1.12167c0.31377,-0.45194 0.16402,-1.04717 -0.33605,-1.32992l0,0zm-10.98023,9.99757l3.79037,2.14925l6.17767,-8.87906l-3.79217,-2.14982l-6.17586,8.87962l0,0zm-0.57898,2.73071l-0.08372,2.01876l1.97818,-0.94469l1.83829,-0.87633l-3.65669,-2.07477l-0.07607,1.87703l0,0l0,0z",
    fill: "#09A223"
  }))),
  keywords: ['Spice Icon', 'icon', 'Icon'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    iconv: {
      type: 'string',
      default: 'fa fa-address-book'
    },
    iconWidth: {
      type: 'number'
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    border: {
      type: 'object',
      default: {
        color: '#09A223',
        style: 'solid',
        width: '2px'
      }
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '12px',
        left: '12px',
        right: '12px',
        bottom: '12px'
      }
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    iconColor: {
      type: 'string'
    },
    iconhColor: {
      type: 'string'
    },
    iconhbg: {
      type: 'string',
      default: '#09A223'
    },
    iconbg: {
      type: 'string',
      default: '#fff'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    }
  },
  supports: {
    align: ['wide', 'full']
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      iconv,
      iconWidth,
      iconbg,
      iconhbg,
      border,
      borderradius,
      margins,
      paddings,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      iconColor,
      iconhColor,
      shadowColor,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes;
    const blockclass = 'spice-blocks-icon';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.spice-blocks-icon#${uniqueid} i{
						color: ${iconColor};
						background-color:${iconbg};
						font-size: ${iconWidth}px;
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};	
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						color: iconColor;
						background-color:iconbg;
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						}
						.spice-blocks-icon#${uniqueid} i:hover{
							color: ${iconhColor};
							background-color:${iconhbg};
						}
						.spice-blocks-icon#${uniqueid}{
							animation-delay: ${delay}ms;
						}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      id: uniqueid,
      className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("i", {
      className: iconv
    })));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Image.js":
/*!***********************************!*\
  !*** ./src/blocks/Spice_Image.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/edit.js");
/* harmony import */ var animate_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! animate.css */ "./node_modules/animate.css/animate.css");
/* harmony import */ var _lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./lib/FontPicker.js */ "./src/blocks/lib/FontPicker.js");
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");

const {
  registerBlockType
} = wp.blocks;




const ALLOWED_MEDIA_TYPES = ['audio', 'image'];

const {
  __
} = wp.i18n;



const BlockEdit = props => {
  const {
    className,
    attributes,
    setAttributes,
    clientId
  } = props;
  setAttributes({
    uniqueid: 'spiceblocksimage' + clientId.slice(0, 8)
  });
  const {
    uniqueid,
    title,
    imgfit,
    toggle,
    imgwidth,
    imgheight,
    imgopacity,
    imgbrightness,
    imgcontrast,
    imgsaturate,
    imgblur,
    imghue_rotate,
    bgColor,
    captionColor,
    shadowColor,
    margins,
    paddings,
    captionpaddings,
    border,
    borderradius,
    fontfamily,
    titlefontSize,
    TitleLineHeight,
    TitleFontWeight,
    TitleTransform,
    TitleDecoration,
    TitleLetterSpacing,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes;
  const blockclass = 'image-upload-wrapper spice-blocks-image';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;

  const onFileSelect = img => {
    props.setAttributes({
      imageUrl: img.url,
      imageID: img.id,
      imageAlt: img.alt
    });
  };

  const onRemoveImg = () => {
    setAttributes({
      imageUrl: null,
      imageID: null,
      imageAlt: null
    });
  };

  const blockStyle = plugin.pluginpath + 'assets/images/dummy-image.jpg';

  function setTitle(value) {
    setAttributes({
      title: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setcaptionColor(value) {
    setAttributes({
      captionColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setPaddings(value) {
    setAttributes({
      paddings: {
        top: value,
        left: value,
        right: value,
        bottom: value
      }
    });
  }

  if (fontfamily != null) {
    let url = 'https://fonts.googleapis.com/css2?family=' + fontfamily + ':wght@100;200;300;400;500;600;700;800;900&display=swap';
    let link = document.createElement('link');
    link.href = url;
    link.rel = "stylesheet";
    link.type = "text/css";

    if (jQuery("body").hasClass("site-editor-php")) {
      jQuery('iframe').contents().find("head").append(link);
    } else {
      document.head.appendChild(link);
    }
  }

  const colorSettingsarray = toggle != false ? [{
    value: bgColor,
    clearable: true,
    onChange: setBgColor,
    label: __('Background Color:', 'spice-blocks')
  }, {
    value: captionColor,
    clearable: true,
    onChange: setcaptionColor,
    label: __('Caption Text Color:', 'spice-blocks')
  }] : [{
    value: bgColor,
    clearable: true,
    onChange: setBgColor,
    label: __('Background Color:', 'spice-blocks')
  }];
  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`.spice-blocks-image#${uniqueid}{
					background-color:${bgColor};
					margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};						
					animation-delay: ${delay}ms;					
					
				}
				.spice-blocks-image#${uniqueid} img{
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};						
				}

				.spice-blocks-image#${uniqueid} img{
					border: ${border.width} ${border.style} ${border.color};
					border-top:${bordertop};
					border-right:${borderright};
					border-bottom:${borderbottom};
					border-left:${borderleft};
					border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						
					width: ${imgwidth}px;
  					height: ${imgheight}px;
  					opacity: ${imgopacity};
					object-fit: ${imgfit};
					filter: brightness( ${imgbrightness}% ) contrast( ${imgcontrast}% ) saturate( ${imgsaturate}% ) blur( ${imgblur}px ) hue-rotate( ${imghue_rotate}deg );
				}
				.spice-blocks-image#${uniqueid} span{
					display: flex;
					font-size: ${titlefontSize};
					font-weight: ${TitleFontWeight};
					line-height: ${TitleLineHeight}px;
					font-family: ${fontfamily};
					text-transform:${TitleTransform};
					text-decoration:${TitleDecoration};
					letter-spacing:${TitleLetterSpacing}px;
					color:${captionColor};
					padding: ${captionpaddings.top} ${captionpaddings.right} ${captionpaddings.bottom} ${captionpaddings.left};
				}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Text Caption', 'spice-blocks'),
    checked: attributes.toggle,
    onChange: newval => setAttributes({
      toggle: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: paddings,
    label: __('Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), toggle == true && [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBoxControl, {
    values: captionpaddings,
    label: __('Caption text Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...captionpaddings,
      captionpaddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }))], (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Width', 'spice-blocks'),
    value: imgwidth,
    onChange: newtext => setAttributes({
      imgwidth: newtext
    }),
    min: 0,
    max: 2000
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('height', 'spice-blocks'),
    value: imgheight,
    onChange: newtext => setAttributes({
      imgheight: newtext
    }),
    min: 0,
    max: 2000
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Opacity', 'spice-blocks'),
    value: imgopacity,
    onChange: newtext => setAttributes({
      imgopacity: newtext
    }),
    min: 0.0,
    step: 0.01,
    max: 1.0
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Image Fit', 'spice-blocks'),
    value: imgfit,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: 'initial'
    }, {
      label: __('Fill', 'spice-blocks'),
      value: 'fill'
    }, {
      label: __('Cover', 'spice-blocks'),
      value: 'cover'
    }, {
      label: __('Contain', 'spice-blocks'),
      value: 'contain'
    }],
    onChange: newtext => setAttributes({
      imgfit: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_5__.colors,
    label: __('Borders'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: __('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Image Filter', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Brightness', 'spice-blocks'),
    value: imgbrightness,
    onChange: newtext => setAttributes({
      imgbrightness: newtext
    }),
    min: 0,
    max: 200
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Contrast', 'spice-blocks'),
    value: imgcontrast,
    onChange: newtext => setAttributes({
      imgcontrast: newtext
    }),
    min: 0,
    max: 200
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Saturate', 'spice-blocks'),
    value: imgsaturate,
    onChange: newtext => setAttributes({
      imgsaturate: newtext
    }),
    min: 0,
    max: 200
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Blur', 'spice-blocks'),
    value: imgblur,
    onChange: newtext => setAttributes({
      imgblur: newtext
    }),
    min: 0,
    step: 0.1,
    max: 10
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Hue-Rotate', 'spice-blocks'),
    value: imghue_rotate,
    onChange: newtext => setAttributes({
      imghue_rotate: newtext
    }),
    min: 0,
    max: 360
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: colorSettingsarray
  })), toggle == true && [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    initialOpen: false,
    title: __('Typography Settings', 'spice-blocks'),
    className: "spiceheadingtypo"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.BaseControl, {
    id: "spice-blocks-font-family",
    label: __(' Font Family', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_lib_FontPicker_js__WEBPACK_IMPORTED_MODULE_4__["default"], {
    apiKey: "AIzaSyBH0F5UCzRyGQImf8sDK3UVo18kCeq_FqM",
    activeFontFamily: fontfamily,
    limit: 200,
    onChange: nextFont => setAttributes({
      fontfamily: nextFont.family
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.FontSizePicker, {
    __nextHasNoMarginBottom: true,
    value: titlefontSize,
    onChange: userVal => setAttributes({
      titlefontSize: userVal
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Font Weight', 'spice-blocks'),
    value: TitleFontWeight,
    options: [{
      label: __('Thin', 'spice-blocks'),
      value: '100'
    }, {
      label: __('Extra Light', 'spice-blocks'),
      value: '200'
    }, {
      label: __('Light', 'spice-blocks'),
      value: '300'
    }, {
      label: __('Regular', 'spice-blocks'),
      value: '400'
    }, {
      label: __('Medium', 'spice-blocks'),
      value: '500'
    }, {
      label: __('Semi Bold', 'spice-blocks'),
      value: '600'
    }, {
      label: __('Bold', 'spice-blocks'),
      value: '700'
    }, {
      label: __('Extra Bold', 'spice-blocks'),
      value: '800'
    }, {
      label: __('Black', 'spice-blocks'),
      value: '900'
    }],
    onChange: newtext => setAttributes({
      TitleFontWeight: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('line Height(px)', 'spice-blocks'),
    value: TitleLineHeight,
    onChange: newtext => setAttributes({
      TitleLineHeight: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Transform', 'spice-blocks'),
    value: TitleTransform,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Uppercase', 'spice-blocks'),
      value: 'uppercase'
    }, {
      label: __('Lowercase', 'spice-blocks'),
      value: 'lowercase'
    }, {
      label: __('Capitalize', 'spice-blocks'),
      value: 'capitalize'
    }],
    onChange: newtext => setAttributes({
      TitleTransform: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: __('Decoration ', 'spice-blocks'),
    value: TitleDecoration,
    options: [{
      label: __('Default', 'spice-blocks'),
      value: ''
    }, {
      label: __('Underline', 'spice-blocks'),
      value: 'underline'
    }, {
      label: __('Overline', 'spice-blocks'),
      value: 'overline'
    }, {
      label: __('Line Through', 'spice-blocks'),
      value: 'line-through'
    }],
    onChange: newtext => setAttributes({
      TitleDecoration: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
    label: __('Letter Spacing', 'spice-blocks'),
    value: TitleLetterSpacing,
    onChange: newtext => setAttributes({
      TitleLetterSpacing: newtext
    }),
    min: -10,
    step: 0.1,
    max: 10
  })))]), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "media-wrapper"
  }, props.attributes.imageUrl ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    id: uniqueid,
    className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass}`
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "spice-img"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: props.attributes.imageUrl,
    alt: props.attributes.imageAlt
  }), props.isSelected ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToolbarGroup, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.MediaUpload, {
    onSelect: onFileSelect,
    allowedTypes: ALLOWED_MEDIA_TYPES,
    value: props.attributes.imageID,
    render: _ref => {
      let {
        open
      } = _ref;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToolbarButton, {
        icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__["default"],
        label: __('Edit', 'spice-blocks'),
        onClick: open
      });
    }
  }))) : null, toggle != false ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {
    key: "editable",
    tagName: "span",
    className: "spice-blocks-img-caption",
    placeholder: __('Enter Caption Here', 'spice-blocks'),
    value: title,
    onChange: setTitle
  }) : null)) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.MediaUpload, {
    onSelect: onFileSelect,
    allowedTypes: ALLOWED_MEDIA_TYPES,
    value: props.attributes.imageID,
    render: _ref2 => {
      let {
        open
      } = _ref2;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
        className: "spice-blocks-image-button",
        type: "image",
        onClick: open
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
        src: blockStyle,
        width: "50%"
      }));
    }
  })));
};

registerBlockType('spice-blocks/spice-image', {
  title: __('Image', 'spice-blocks'),
  category: 'spice-blocks',
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "23.999999999999996",
    height: "23.999999999999996",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    rx: "1",
    stroke: "#09A223",
    id: "svg_1",
    height: "18.74587",
    width: "22.93729",
    y: "2.62706",
    x: "0.53135",
    fill: "#fff",
    "stroke-width": "2"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_13"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    transform: "rotate(45.7722 14.6715 13.3298)",
    rx: "1",
    "stroke-width": "2",
    id: "svg_11",
    height: "6.44073",
    width: "2.18812",
    y: "10.10939",
    x: "14.0774",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    transform: "rotate(-46.9003 19.221 13.9235)",
    rx: "1",
    "stroke-width": "2",
    id: "svg_5",
    height: "8.27758",
    width: "2.18812",
    y: "9.78467",
    x: "18.62695",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_10"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    transform: "rotate(22.9389 3.91708 13.4961)",
    rx: "1",
    "stroke-width": "5",
    id: "svg_8",
    height: "10.02146",
    width: "2.18812",
    y: "8.48539",
    x: "3.32302",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    transform: "rotate(-48.4641 10.2548 13.3219)",
    rx: "1",
    "stroke-width": "5",
    id: "svg_9",
    height: "13.10192",
    width: "2.18812",
    y: "6.77092",
    x: "9.66077",
    fill: "#09A223"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    transform: "rotate(-63.8321 12.8496 7.80434)",
    id: "svg_14",
    d: "m14.07365,10.18058l0,0c-1.35189,0 -2.44804,-1.06369 -2.44804,-2.37624c0,-1.31238 1.09614,-2.37624 2.44804,-2.37624l0,0c-0.77044,0.56093 -1.22393,1.44135 -1.22393,2.37624s0.45349,1.81513 1.22393,2.37624z",
    "stroke-width": "4",
    fill: "#09A223"
  })))),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['image', 'Spice Image', 'Image', 'spice-image'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    imageUrl: {
      type: 'string'
    },
    imageID: {
      type: 'number'
    },
    imageAlt: {
      type: 'string',
      source: 'attributes',
      attributes: 'alt',
      selector: 'img'
    },
    title: {
      type: 'string'
    },
    imgfit: {
      type: 'string',
      default: 'initial'
    },
    toggle: {
      type: 'boolean',
      default: false
    },
    imgwidth: {
      type: 'number'
    },
    imgheight: {
      type: 'number'
    },
    imgopacity: {
      type: 'number'
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    imgbrightness: {
      type: 'number',
      default: 100
    },
    imgcontrast: {
      type: 'number',
      default: 100
    },
    imgsaturate: {
      type: 'number',
      default: 100
    },
    imgblur: {
      type: 'number',
      default: 0
    },
    imghue_rotate: {
      type: 'number',
      default: 0
    },
    bgColor: {
      type: 'string'
    },
    captionColor: {
      type: 'string',
      default: '#000'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    captionpaddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    border: {
      type: 'object',
      default: {
        color: '',
        style: '',
        width: ''
      }
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    titlefontSize: {
      type: 'string'
    },
    TitleFontWeight: {
      type: 'string',
      default: '600'
    },
    TitleLineHeight: {
      type: 'number',
      default: 58
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    fontfamily: {
      type: 'string',
      default: 'Open Sans'
    },
    TitleTransform: {
      type: 'string'
    },
    TitleDecoration: {
      type: 'string'
    },
    TitleLetterSpacing: {
      type: 'number'
    }
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      title,
      imgfit,
      toggle,
      imgwidth,
      imgheight,
      imgopacity,
      imgbrightness,
      imgcontrast,
      imgsaturate,
      imgblur,
      imghue_rotate,
      bgColor,
      captionColor,
      shadowColor,
      margins,
      paddings,
      captionpaddings,
      border,
      borderradius,
      fontfamily,
      titlefontSize,
      TitleLineHeight,
      TitleFontWeight,
      TitleTransform,
      TitleDecoration,
      TitleLetterSpacing,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes;
    const blockclass = 'image-upload-wrapper spice-blocks-image';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.spice-blocks-image#${uniqueid}{
						background-color:${bgColor};						
						animation-delay: ${delay}ms;
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};							
					}
					.spice-blocks-image#${uniqueid} img{
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};						
					}
					.spice-blocks-image#${uniqueid} img{
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						width: ${imgwidth}px;
	  					height: ${imgheight}px;
	  					opacity: ${imgopacity};
						object-fit: ${imgfit};
						filter: brightness( ${imgbrightness}% ) contrast( ${imgcontrast}% ) saturate( ${imgsaturate}% ) blur( ${imgblur}px ) hue-rotate( ${imghue_rotate}deg );
					}
					.spice-blocks-image#${uniqueid} span{						
						display: flex;
						font-size: ${titlefontSize};
						font-weight: ${TitleFontWeight};
						line-height: ${TitleLineHeight}px;
						font-family: ${fontfamily};
						text-transform:${TitleTransform};
						text-decoration:${TitleDecoration};
						letter-spacing:${TitleLetterSpacing}px;
						color:${captionColor};
						padding: ${captionpaddings.top} ${captionpaddings.right} ${captionpaddings.bottom} ${captionpaddings.left};
					}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("script", null, "var fontfamily2=`", fontfamily, "`; var url2 = 'https://fonts.googleapis.com/css2?family='+fontfamily2+':wght@100;200;300;400;500;600;700;800;900&display=swap'; var link2 = document.createElement('link'); link2.href = url2; link2.rel = \"stylesheet\"; link2.type =  \"text/css\"; document.head.appendChild(link2);"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      id: uniqueid,
      className: `${blockclass} ${alignmentClass} ${animationclass} ${displayclass} ${props.attributes.className}`
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      class: "spice-img"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: props.attributes.imageUrl,
      alt: props.attributes.imageAlt
    }), toggle != false ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText.Content, {
      tagName: "span",
      className: "spice-blocks-img-caption",
      value: attributes.title
    }) : null)));
  }
});

/***/ }),

/***/ "./src/blocks/Spice_Section.js":
/*!*************************************!*\
  !*** ./src/blocks/Spice_Section.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _lib_utils__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./lib/utils */ "./src/blocks/lib/utils.js");
/* harmony import */ var _lib_deprecated__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./lib/deprecated */ "./src/blocks/lib/deprecated.js");
/* harmony import */ var _lib_variations__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./lib/variations */ "./src/blocks/lib/variations.js");
/* harmony import */ var _lib_transforms__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./lib/transforms */ "./src/blocks/lib/transforms.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");

const {
  registerBlockType
} = wp.blocks;













const ALLOWED_BLOCKS = ['spice-blocks/spice-column']; // WordPress dependencies

function ColumnsEditContainer(_ref) {
  let {
    attributes,
    setAttributes,
    updateAlignment,
    updateColumns,
    clientId
  } = _ref;
  const {
    verticalAlignment,
    textAlignment,
    contentwidth,
    contenterwidth,
    margins,
    paddings,
    border,
    borderradius,
    bgColor,
    shadowColor,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    zindex,
    bgType,
    bgGradient,
    bgImage,
    bgImageParallax,
    bgImageSize,
    bgImageRepeat,
    bgImageOverlay,
    bgOverlayColor,
    bgOverlayPopup,
    bgOverlayOpacity,
    bgVideo,
    bgImagePosition
  } = attributes;
  const {
    count
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => {
    return {
      count: select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store).getBlockCount(clientId)
    };
  }, [clientId]);
  setAttributes({
    uniqueid: 'spicesection' + clientId.slice(0, 8)
  });
  const classes = classnames__WEBPACK_IMPORTED_MODULE_1___default()({
    [`are-vertically-aligned-${verticalAlignment}`]: verticalAlignment,
    [`has-text-align-${textAlignment}`]: textAlignment,
    [`spice-block-container-fluid`]: 'spice-block-container-fluid',
    [`hide-desktop`]: hidedesktop,
    [`hide-tablet`]: hidetablet,
    [`hide-mobile`]: hidemobile,
    [`animated ${attributes.durations}`]: durations,
    [`animated ${attributes.animation}`]: animation
  });
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps)({
    className: classes
  });
  const innerBlocksProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useInnerBlocksProps)(blockProps, {
    allowedBlocks: ALLOWED_BLOCKS,
    orientation: 'horizontal',
    renderAppender: false
  });
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.BlockVerticalAlignmentToolbar, {
    onChange: updateAlignment,
    value: verticalAlignment
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.AlignmentToolbar, {
    value: attributes.textAlignment,
    onChange: newalign => setAttributes({
      textAlignment: newalign
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: open,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Content Width', 'spice-blocks'),
    value: contentwidth,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Container', 'spice-blocks'),
      value: 'spice-block-container'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Container Fluid', 'spice-blocks'),
      value: 'spice-block-container-fluid'
    }],
    onChange: newtext => setAttributes({
      contentwidth: newtext
    })
  }), contentwidth === 'spice-block-container' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Container Width', 'spice-blocks'),
    value: contenterwidth,
    onChange: newtext => setAttributes({
      contenterwidth: newtext
    }),
    min: 500,
    max: 1600
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    className: 'spice-section-columns',
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Columns', 'spice-blocks'),
    value: count,
    onChange: value => updateColumns(count, value),
    min: 1,
    max: Math.max(6, count)
  }), count > 6 && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Notice, {
    status: "warning",
    isDismissible: false
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('This column count exceeds the recommended amount and may cause visual breakage.', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Z Index', 'spice-blocks'),
    value: zindex,
    onChange: newtext => setAttributes({
      zindex: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Animation', 'spice-block'),
    value: animation,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('None', 'spice-blocks'),
      value: ' '
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: userVal => setAttributes({
      animation: userVal
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  }))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", innerBlocksProps, bgType !== 'none' && bgType === 'video' && bgVideo && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("video", {
    autoPlay: true,
    muted: true,
    loop: true,
    id: "spice_blocks_video"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("source", {
    src: bgVideo,
    type: "video/mp4"
  })), (bgType === 'image' || bgType === 'video') && bgType !== 'none' && bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice-blocks-overlay",
    style: {
      backgroundColor: bgImageOverlay ? bgOverlayColor : '',
      opacity: bgImageOverlay ? bgOverlayOpacity : ''
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `spice-block ${contentwidth}`
  }, innerBlocksProps.children)));
}

const ColumnsEditContainerWrapper = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.withDispatch)((dispatch, ownProps, registry) => ({
  /**
   * Update all child Column blocks with a new vertical alignment setting
   * based on whatever alignment is passed in. This allows change to parent
   * to overide anything set on a individual column basis.
   *
   * @param {string} verticalAlignment the vertical alignment setting
   */
  updateAlignment(verticalAlignment) {
    const {
      clientId,
      setAttributes
    } = ownProps;
    const {
      updateBlockAttributes
    } = dispatch(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store);
    const {
      getBlockOrder
    } = registry.select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store); // Update own alignment.

    setAttributes({
      verticalAlignment
    }); // Update all child Column Blocks to match.

    const innerBlockClientIds = getBlockOrder(clientId);
    innerBlockClientIds.forEach(innerBlockClientId => {
      updateBlockAttributes(innerBlockClientId, {
        verticalAlignment
      });
    });
  },

  /**
   * Updates the column count, including necessary revisions to child Column
   * blocks to grant required or redistribute available space.
   *
   * @param {number} previousColumns Previous column count.
   * @param {number} newColumns      New column count.
   */
  updateColumns(previousColumns, newColumns) {
    const {
      clientId
    } = ownProps;
    const {
      replaceInnerBlocks
    } = dispatch(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store);
    const {
      getBlocks
    } = registry.select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store);
    let innerBlocks = getBlocks(clientId);
    const hasExplicitWidths = (0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.hasExplicitPercentColumnWidths)(innerBlocks); // Redistribute available width for existing inner blocks.

    const isAddingColumn = newColumns > previousColumns;

    if (isAddingColumn && hasExplicitWidths) {
      // If adding a new column, assign width to the new column equal to
      // as if it were `1 / columns` of the total available space.
      const newColumnWidth = (0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.toWidthPrecision)(100 / newColumns); // Redistribute in consideration of pending block insertion as
      // constraining the available working width.

      const widths = (0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.getRedistributedColumnWidths)(innerBlocks, 100 - newColumnWidth);
      innerBlocks = [...(0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.getMappedColumnWidths)(innerBlocks, widths), ...Array.from({
        length: newColumns - previousColumns
      }).map(() => {
        return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.createBlock)('spice-blocks/spice-column', {
          width: `${newColumnWidth}%`
        });
      })];
    } else if (isAddingColumn) {
      innerBlocks = [...innerBlocks, ...Array.from({
        length: newColumns - previousColumns
      }).map(() => {
        return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.createBlock)('spice-blocks/spice-column');
      })];
    } else {
      // The removed column will be the last of the inner blocks.
      innerBlocks = innerBlocks.slice(0, -(previousColumns - newColumns));

      if (hasExplicitWidths) {
        // Redistribute as if block is already removed.
        const widths = (0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.getRedistributedColumnWidths)(innerBlocks, 100);
        innerBlocks = (0,_lib_utils__WEBPACK_IMPORTED_MODULE_7__.getMappedColumnWidths)(innerBlocks, widths);
      }
    }

    replaceInnerBlocks(clientId, innerBlocks);
  }

}))(ColumnsEditContainer);

function Placeholder(_ref2) {
  let {
    clientId,
    name,
    setAttributes
  } = _ref2;
  const {
    blockType,
    defaultVariation,
    variations
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => {
    const {
      getBlockVariations,
      getBlockType,
      getDefaultBlockVariation
    } = select(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.store);
    return {
      blockType: getBlockType(name),
      defaultVariation: getDefaultBlockVariation(name, 'block'),
      variations: getBlockVariations(name, 'block')
    };
  }, [name]);
  const {
    replaceInnerBlocks
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useDispatch)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store);
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps)();
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", blockProps, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.__experimentalBlockVariationPicker, {
    icon: (0,lodash__WEBPACK_IMPORTED_MODULE_11__.get)(blockType, ['icon', 'src']),
    label: (0,lodash__WEBPACK_IMPORTED_MODULE_11__.get)(blockType, ['title']),
    variations: variations,
    onSelect: function () {
      let nextVariation = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : defaultVariation;

      if (nextVariation.attributes) {
        setAttributes(nextVariation.attributes);
      }

      if (nextVariation.innerBlocks) {
        replaceInnerBlocks(clientId, (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.createBlocksFromInnerBlocksTemplate)(nextVariation.innerBlocks), true);
      }
    },
    allowSkip: true
  }));
}

const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    verticalAlignment,
    contentwidth,
    contenterwidth,
    margins,
    paddings,
    border,
    borderradius,
    bgColor,
    shadowColor,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    zindex,
    bgType,
    bgGradient,
    bgImage,
    bgImageParallax,
    bgImageSize,
    bgImageRepeat,
    bgImageOverlay,
    bgOverlayColor,
    bgOverlayPopup,
    bgOverlayOpacity,
    bgVideo,
    bgImagePosition,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes;

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setOverlayColor(value) {
    setAttributes({
      bgOverlayColor: value
    });
  } // Section Background


  let containerBg = '';

  if (bgType !== 'none' && bgType === 'image') {
    containerBg = `url(${bgImage})`;
  } else {
    containerBg = 'none';
  } // Section Background Position


  let backgroundPosition = '';

  if (bgType === 'image' && bgImage) {
    backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
  } else {
    backgroundPosition = '';
  } // Section Background Size


  let backgroundSize = '';

  if (bgType === 'image' && bgImage) {
    backgroundSize = bgImageSize;
  } else {
    backgroundSize = '';
  } // Section Image Background Attachment


  let backgroundAttachment = '';

  if (bgType === 'image' && bgImage && bgImageParallax) {
    backgroundAttachment = 'fixed';
  } else {
    backgroundAttachment = 'scroll';
  } // Section Background Image Repeat


  let backgroundRepeat = '';

  if (bgType === 'image' && bgImage) {
    backgroundRepeat = bgImageRepeat;
  } else {
    backgroundRepeat = '';
  }

  const hasInnerBlocks = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.store).getBlocks(clientId).length > 0, [clientId]);
  const Component = hasInnerBlocks ? ColumnsEditContainerWrapper : Placeholder;
  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`#block-${clientId}{
					background-color:${bgColor};
					background-image:${containerBg};
					margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					border: ${border.width} ${border.style} ${border.color};
					border-top:${bordertop};
					border-right:${borderright};
					border-bottom:${borderbottom};
					border-left:${borderleft};
					border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};	
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};					
					animation-delay: ${delay}ms;
					background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
				    z-index: ${zindex};
					overflow: hidden;
					position: relative;
				}
				#block-${clientId} .spice-block.spice-block-container{
		     		max-width:${contenterwidth}px;

		     	}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Component, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Spacing', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBoxControl, {
    values: paddings,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Padding', 'spice-blocks'),
    units: [],
    allowReset: false,
    onChange: newValue => setAttributes({ ...paddings,
      paddings: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.PanelColorSettings, {
    initialOpen: open,
    className: "spice-block-section-bg-color",
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Color', 'spice-blocks'),
    colorSettings: [{
      value: bgColor,
      clearable: true,
      onChange: setBgColor,
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Color:', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Type', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    isSmall: true,
    isPressed: bgType === 'image',
    onClick: () => setAttributes({
      bgType: 'image'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "18",
    height: "15",
    viewBox: "0 0 18 15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M16.083.263h-14.446c-.798 0-1.445.648-1.445 1.447v11.579c0 .8.646 1.447 1.445 1.447h14.446c.798 0 1.445-.648 1.445-1.447v-11.579c0-.8-.646-1.447-1.445-1.447zm-4.334 2.171c2.389 0 2.386 3.618 0 3.618-2.385 0-2.39-3.618 0-3.618zm-9.39 10.855l4.334-5.789 2.965 3.961 2.091-2.514 3.611 4.342h-13.001z",
    className: "svg-fill",
    fillRule: "nonzero"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    isSmall: true,
    onClick: () => setAttributes({
      bgType: 'none'
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-image-rotate"
  })))), bgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, bgImage ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_container"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_image"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.FocalPointPicker, {
    url: bgImage,
    value: bgImagePosition,
    onChange: focalPoint => setAttributes({
      bgImagePosition: focalPoint
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_preview_actions"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: () => setAttributes({
      bgImage: ''
    })
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons dashicons-trash"
  }))))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.MediaUpload, {
    onSelect: media => setAttributes({
      bgImage: media.url
    }),
    type: "image",
    value: bgImage,
    render: _ref3 => {
      let {
        open
      } = _ref3;
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
        className: "spice_block_section_custom_upload",
        onClick: open
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "dashicons dashicons-insert"
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "spice_block_section_upload_label"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Add Image', 'spice-blocks')));
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Enable Parallax', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.FormToggle, {
    checked: bgImageParallax,
    onChange: () => setAttributes({
      bgImageParallax: !bgImageParallax
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Size', 'spice-blocks'),
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Default', 'spice-blocks'),
      value: 'initial'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Cover', 'spice-blocks'),
      value: 'cover'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Contain', 'spice-blocks'),
      value: 'contain'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Auto', 'spice-blocks'),
      value: 'auto'
    }],
    onChange: size => {
      setAttributes({
        bgImageSize: size
      });
    },
    value: bgImageSize
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Repeat', 'spice-blocks'),
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('No Repeat', 'spice-blocks'),
      value: 'no-repeat'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Repeat', 'spice-blocks'),
      value: 'repeat'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Repeat X', 'spice-blocks'),
      value: 'repeat-x'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Repeat Y', 'spice-blocks'),
      value: 'repeat-y'
    }],
    onChange: value => {
      setAttributes({
        bgImageRepeat: value
      });
    },
    value: bgImageRepeat
  }))), bgType === 'image' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Background Overlay', 'spice-blocks'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "spice_block_section_flex_panel"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "spice_block_section_panel_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Enable Overlay', 'spice-blocks')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.FormToggle, {
    checked: bgImageOverlay,
    onChange: () => setAttributes({
      bgImageOverlay: !bgImageOverlay
    })
  })), bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.PanelColorSettings, {
    initialOpen: open,
    className: "spice-block-section-bg-overlay",
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Overlay Color', 'spice-blocks'),
    colorSettings: [{
      value: bgOverlayColor,
      onChange: setOverlayColor,
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Overlay Color:', 'spice-blocks')
    }]
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Overlay Opacity', 'spice-blocks'),
    value: bgOverlayOpacity,
    onChange: value => setAttributes({
      bgOverlayOpacity: value
    }),
    min: 0.1,
    max: 1,
    step: 0.01
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_12__.colors,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border', 'spice-blocks'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    initialOpen: false,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Box Shadow:', 'spice-blocks')
    }]
  }))));
};

registerBlockType('spice-blocks/spice-section', {
  apiVersion: 2,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Section', 'spice-blocks'),
  category: 'spice-blocks',
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    width: "24.000000000000004",
    height: "24.000000000000004"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    fill: "#09A223",
    stroke: "#09A223",
    d: "m0.04638,0.04638l0,23.90723l23.90723,0l0,-23.90723l-23.90723,0zm22.5411,22.5411l-21.17498,0l0,-21.17498l21.17498,0l0,21.17498z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    fill: "#09A223",
    stroke: "null",
    height: "17.75966",
    width: "4.78145",
    y: "3.12017",
    x: "3.12017"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    fill: "#09A223",
    stroke: "null",
    height: "17.75966",
    width: "4.78145",
    y: "3.12017",
    x: "9.60928"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    fill: "#09A223",
    stroke: "null",
    height: "17.75966",
    width: "4.78145",
    y: "3.12017",
    x: "16.09838"
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    stroke: "null"
  })), " ")),
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Section', 'Section'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    textAlignment: {
      type: 'string',
      default: 'center'
    },
    verticalAlignment: {
      type: 'string'
    },
    contentwidth: {
      type: 'string',
      default: 'spice-block-container'
    },
    contenterwidth: {
      type: 'number',
      default: 1140
    },
    bgColor: {
      type: 'string'
    },
    shadowColor: {
      type: 'string',
      default: '#ADACAC'
    },
    margins: {
      default: {
        top: '0px',
        right: 'auto',
        bottom: '0px',
        left: 'auto'
      }
    },
    paddings: {
      type: 'object',
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    border: {
      type: 'object',
      default: {
        color: '',
        style: '',
        width: ''
      }
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    zindex: {
      type: 'string'
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    bgType: {
      "type": "string",
      "default": "none"
    },
    bgGradient: {
      "type": "string",
      "default": "linear-gradient(135deg,#12c2e9 0%,#c471ed 50%,#f64f59 100%)"
    },
    bgImage: {
      "type": "string"
    },
    bgImageParallax: {
      "type": "boolean",
      "default": false
    },
    bgImageSize: {
      "type": "string",
      "default": "cover"
    },
    bgImageRepeat: {
      "type": "string",
      "default": "no-repeat"
    },
    bgImageOverlay: {
      "type": "boolean",
      "default": false
    },
    bgOverlayColor: {
      "type": "string",
      "default": "#000000"
    },
    bgOverlayPopup: {
      "type": "boolean",
      "default": false
    },
    bgOverlayOpacity: {
      "type": "number",
      "default": 0.6
    },
    bgVideo: {
      "type": "string"
    },
    bgImagePosition: {
      "type": "object",
      "default": {
        "x": 0.5,
        "y": 0.5
      }
    }
  },
  "supports": {
    "anchor": true,
    "align": ["wide", "full"],
    "html": false,
    "spacing": {
      "blockGap": {
        "__experimentalDefault": "2em",
        "sides": ["horizontal", "vertical"]
      },
      "margin": ["top", "bottom"],
      "padding": true,
      "__experimentalDefaultControls": {
        "padding": true
      }
    },
    "__experimentalLayout": {
      "allowSwitching": false,
      "allowInheriting": false,
      "allowEditing": false,
      "default": {
        "type": "flex",
        "flexWrap": "nowrap"
      }
    },
    "__experimentalBorder": {
      "color": true,
      "radius": true,
      "style": true,
      "width": true,
      "__experimentalDefaultControls": {
        "color": true,
        "radius": true,
        "style": true,
        "width": true
      }
    }
  },
  variations: _lib_variations__WEBPACK_IMPORTED_MODULE_9__["default"],
  deprecated: _lib_deprecated__WEBPACK_IMPORTED_MODULE_8__["default"],
  edit: BlockEdit,
  save: props => {
    const {
      attributes,
      setAttributes,
      clientId
    } = props;
    const {
      uniqueid,
      verticalAlignment,
      textAlignment,
      contentwidth,
      contenterwidth,
      margins,
      paddings,
      border,
      borderradius,
      overlayopacity,
      bgColor,
      shadowColor,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      zindex,
      bgType,
      bgGradient,
      bgImage,
      bgImageParallax,
      bgImageSize,
      bgImageRepeat,
      bgImageOverlay,
      bgOverlayColor,
      bgOverlayPopup,
      bgOverlayOpacity,
      bgVideo,
      bgImagePosition,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes;
    const className = classnames__WEBPACK_IMPORTED_MODULE_1___default()({
      [`${uniqueid}`]: uniqueid,
      [`are-vertically-aligned-${verticalAlignment}`]: verticalAlignment,
      [`has-text-align-${textAlignment}`]: textAlignment,
      [`spice-block-container-fluid`]: `spice-block-container-fluid`,
      [`hide-desktop`]: hidedesktop,
      [`hide-tablet`]: hidetablet,
      [`hide-mobile`]: hidemobile,
      [`animated ${attributes.durations}`]: durations,
      [`animated ${attributes.animation}`]: animation
    });
    const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps.save({
      className
    });
    const innerBlocksProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useInnerBlocksProps.save(blockProps); // Section Background

    let containerBg = '';

    if (bgType !== 'none' && bgType === 'image') {
      containerBg = `url(${bgImage})`;
    } else {
      containerBg = 'none';
    } // Section Background Position


    let backgroundPosition = '';

    if (bgType === 'image' && bgImage) {
      backgroundPosition = `${bgImagePosition.x * 100}% ${bgImagePosition.y * 100}%`;
    } else {
      backgroundPosition = '';
    } // Section Background Size


    let backgroundSize = '';

    if (bgType === 'image' && bgImage) {
      backgroundSize = bgImageSize;
    } else {
      backgroundSize = '';
    } //Image Background Attachment


    let backgroundAttachment = '';

    if (bgType === 'image' && bgImage && bgImageParallax) {
      backgroundAttachment = 'fixed';
    } else {
      backgroundAttachment = 'scroll';
    } //Background Image Repeat


    let backgroundRepeat = '';

    if (bgType === 'image' && bgImage) {
      backgroundRepeat = bgImageRepeat;
    } else {
      backgroundRepeat = '';
    }

    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`.wp-block-spice-blocks-spice-section.${uniqueid}{
					background-color:${bgColor};
					background-image:${containerBg};
					margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
					padding: ${paddings.top} ${paddings.right} ${paddings.bottom} ${paddings.left};
					border: ${border.width} ${border.style} ${border.color};
					border-top:${bordertop};
					border-right:${borderright};
					border-bottom:${borderbottom};
					border-left:${borderleft};
					border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};	
					box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
					animation-delay: ${delay}ms;
					background-position: ${backgroundPosition}; 
					background-repeat: ${bgImageRepeat};
					background-size:${backgroundSize};
					background-attachment: ${backgroundAttachment};
					background-repeat: ${backgroundRepeat};
				    z-index: ${zindex};
					overflow: hidden;
					position: relative;
				}
				.wp-block-spice-blocks-spice-section.${uniqueid} .spice-block.spice-block-container{
			     		max-width:${contenterwidth}px;
			     }`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", innerBlocksProps, bgType === 'image' && bgType !== 'none' && bgImageOverlay && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "spice-blocks-overlay",
      style: {
        backgroundColor: bgImageOverlay ? bgOverlayColor : '',
        opacity: bgImageOverlay ? bgOverlayOpacity : ''
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: `spice-block ${contentwidth}`
    }, innerBlocksProps.children)));
  },
  transforms: _lib_transforms__WEBPACK_IMPORTED_MODULE_10__["default"]
});

/***/ }),

/***/ "./src/blocks/Spice_Spacer.js":
/*!************************************!*\
  !*** ./src/blocks/Spice_Spacer.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _lib_colors__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./lib/colors */ "./src/blocks/lib/colors.js");

const {
  registerBlockType
} = wp.blocks;
const {
  InspectorControls,
  PanelColorSettings
} = wp.blockEditor;

const {
  Fragment
} = wp.element;
const {
  __
} = wp.i18n;


const BlockEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId
  } = props;
  const {
    uniqueid,
    boxHeight,
    border,
    borderradius,
    margins,
    hshadow,
    vshadow,
    blurshadow,
    hidedesktop,
    hidetablet,
    hidemobile,
    animation,
    durations,
    delay,
    bgColor,
    shadowColor,
    bordertopradius,
    borderrightradius,
    borderbottomradius,
    borderleftradius
  } = attributes;
  setAttributes({
    uniqueid: 'spiceblocksspacer' + clientId.slice(0, 8)
  });
  const blockclass = 'spice-blocks-spacer';
  const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
  const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
  const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
  const displaytablet = hidetablet != false ? 'hide-tablet' : '';
  const displaymobile = hidemobile != false ? 'hide-mobile' : '';
  const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;

  function setBgColor(value) {
    setAttributes({
      bgColor: value
    });
  }

  function setShadowColor(value) {
    setAttributes({
      shadowColor: value
    });
  }

  const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
  const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
  const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
  const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null; //console.log(border.width);

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
    dangerouslySetInnerHTML: {
      __html: [`#${uniqueid}{
						height: ${boxHeight}px;
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						animation-delay: ${delay}ms;
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						background-color:${bgColor};
					}`].join('\n')
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('General Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Height(px)', 'spice-blocks'),
    value: boxHeight,
    units: [],
    onChange: newtext => setAttributes({
      boxHeight: newtext
    }),
    min: 1,
    max: 2000
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBorderBoxControl, {
    colors: _lib_colors__WEBPACK_IMPORTED_MODULE_2__.colors,
    label: __('Border', 'spice-blocks'),
    onChange: newtext => setAttributes({
      border: newtext
    }),
    value: border
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    className: "spice-blocks-border-radius",
    label: __('Border Radius', 'spice-blocks'),
    __nextHasNoMarginBottom: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-top",
    onChange: newtext => setAttributes({
      bordertopradius: newtext
    }),
    value: bordertopradius,
    placeholder: "Top"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-right",
    onChange: newtext => setAttributes({
      borderrightradius: newtext
    }),
    value: borderrightradius,
    placeholder: "right"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-left",
    onChange: newtext => setAttributes({
      borderleftradius: newtext
    }),
    value: borderleftradius,
    placeholder: "left"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalUnitControl, {
    className: "border-radius-bottom",
    onChange: newtext => setAttributes({
      borderbottomradius: newtext
    }),
    value: borderbottomradius,
    placeholder: "bottom"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalBoxControl, {
    label: __('Margin', 'spice-blocks'),
    inputProps: {
      min: -300
    },
    values: margins,
    sides: ['top', 'bottom', 'left', 'right'],
    allowReset: false,
    units: [],
    onChange: newValue => setAttributes({ ...margins,
      margins: {
        top: newValue.top,
        left: newValue.left,
        right: newValue.right,
        bottom: newValue.bottom
      }
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Display', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Desktop', 'spice-blocks'),
    checked: hidedesktop,
    onChange: newval => setAttributes({
      hidedesktop: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Tablet', 'spice-blocks'),
    checked: hidetablet,
    onChange: newval => setAttributes({
      hidetablet: newval
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
    label: __('Hide on Mobile', 'spice-blocks'),
    checked: hidemobile,
    onChange: newval => setAttributes({
      hidemobile: newval
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Animation Effects', 'spice-blocks'),
    className: 'spice-panel-edit'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
    label: __('Animation', 'spice-blocks'),
    value: animation,
    options: [{
      label: __('None', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Bounce', 'spice-blocks'),
      value: 'bounce'
    }, {
      label: __('Flash', 'spice-blocks'),
      value: 'flash'
    }, {
      label: __('Pulse', 'spice-blocks'),
      value: 'pulse'
    }, {
      label: __('RubberBand', 'spice-blocks'),
      value: 'rubberBand'
    }, {
      label: __('Shake', 'spice-blocks'),
      value: 'shake'
    }, {
      label: __('Swing', 'spice-blocks'),
      value: 'swing'
    }, {
      label: __('Tada', 'spice-blocks'),
      value: 'tada'
    }, {
      label: __('Wobble', 'spice-blocks'),
      value: 'wobble'
    }, {
      label: __('Jello', 'spice-blocks'),
      value: 'jello'
    }, {
      label: __('BounceIn', 'spice-blocks'),
      value: 'bounceIn'
    }, {
      label: __('BounceInDown', 'spice-blocks'),
      value: 'bounceInDown'
    }, {
      label: __('BounceInLeft', 'spice-blocks'),
      value: 'bounceInLeft'
    }, {
      label: __('BounceInRight', 'spice-blocks'),
      value: 'bounceInRight'
    }, {
      label: __('BounceInUp', 'spice-blocks'),
      value: 'bounceInUp'
    }, {
      label: __('FadeIn', 'spice-blocks'),
      value: 'fadeIn'
    }, {
      label: __('FadeInDown', 'spice-blocks'),
      value: 'fadeInDown'
    }, {
      label: __('FadeInDownBig', 'spice-blocks'),
      value: 'fadeInDownBig'
    }, {
      label: __('FadeInLeft', 'spice-blocks'),
      value: 'fadeInLeft'
    }, {
      label: __('FadeInLeftBig', 'spice-blocks'),
      value: 'fadeInLeftBig'
    }, {
      label: __('FadeInRight', 'spice-blocks'),
      value: 'fadeInRight'
    }, {
      label: __('FadeInRightBig', 'spice-blocks'),
      value: 'fadeInRightBig'
    }, {
      label: __('FadeInUp', 'spice-blocks'),
      value: 'fadeInUp'
    }, {
      label: __('FadeInUpBig', 'spice-blocks'),
      value: 'fadeInUpBig'
    }, {
      label: __('Flip', 'spice-blocks'),
      value: 'flip'
    }, {
      label: __('FlipInX', 'spice-blocks'),
      value: 'flipInX'
    }, {
      label: __('FlipInY', 'spice-blocks'),
      value: 'flipInY'
    }, {
      label: __('LightSpeedIn', 'spice-blocks'),
      value: 'lightSpeedIn'
    }, {
      label: __('RollIn', 'spice-blocks'),
      value: 'rollIn'
    }, {
      label: __('RotateIn', 'spice-blocks'),
      value: 'rotateIn'
    }, {
      label: __('RotateInDownLeft', 'spice-blocks'),
      value: 'rotateInDownLeft'
    }, {
      label: __('RotateInDownRight', 'spice-blocks'),
      value: 'rotateInDownRight'
    }, {
      label: __('RotateInUpLeft', 'spice-blocks'),
      value: 'rotateInUpLeft'
    }, {
      label: __('RotateInUpRight', 'spice-blocks'),
      value: 'rotateInUpRight'
    }, {
      label: __('SlideInDown', 'spice-blocks'),
      value: 'slideInDown'
    }, {
      label: __('SlideInLeft', 'spice-blocks'),
      value: 'slideInLeft'
    }, {
      label: __('SlideInRight', 'spice-blocks'),
      value: 'slideInRight'
    }, {
      label: __('ZoomIn', 'spice-blocks'),
      value: 'zoomIn'
    }, {
      label: __('ZoomInDown', 'spice-blocks'),
      value: 'zoomInDown'
    }, {
      label: __('ZoomInLeft', 'spice-blocks'),
      value: 'zoomInLeft'
    }, {
      label: __('ZoomInRight', 'spice-blocks'),
      value: 'zoomInRight'
    }, {
      label: __('ZoomInUp', 'spice-blocks'),
      value: 'zoomInUp'
    }],
    onChange: newtext => setAttributes({
      animation: newtext
    })
  }), animation != '' && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
    label: __('Durations', 'spice-blocks'),
    value: durations,
    options: [{
      label: __('Normal', 'spice-blocks'),
      value: ' '
    }, {
      label: __('Slow', 'spice-blocks'),
      value: 'slow'
    }, {
      label: __('Fast', 'spice-blocks'),
      value: 'fast'
    }],
    onChange: newtext => setAttributes({
      durations: newtext
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
    label: __('Delay(ms)', 'spice-blocks'),
    value: delay,
    onChange: newtext => setAttributes({
      delay: newtext
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Box Shadow', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Horizontal Shadow(px)', 'spice-blocks'),
    value: hshadow,
    onChange: newtext => setAttributes({
      hshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Vertical Shadow(px)', 'spice-blocks'),
    value: vshadow,
    onChange: newtext => setAttributes({
      vshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
    label: __('Blur Shadow(px)', 'spice-blocks'),
    value: blurshadow,
    onChange: newtext => setAttributes({
      blurshadow: newtext
    }),
    min: 0,
    max: 100
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    initialOpen: true,
    className: "spice-block-section-bg-color",
    title: __('Box Shadow Color', 'spice-blocks'),
    colorSettings: [{
      value: shadowColor,
      onChange: setShadowColor,
      label: __('Box Shadow:', 'spice-blocks')
    }]
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    initialOpen: false,
    title: __('Background Settings', 'spice-blocks')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelColorSettings, {
    className: 'spice-blocks-color-style',
    colorSettings: [{
      value: bgColor,
      clearable: true,
      onChange: setBgColor,
      label: __('Background Color:', 'spice-blocks')
    }]
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `${blockclass} ${animationclass} ${displayclass}`,
    id: uniqueid
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ResizableBox, {
    className: 'spice-blocks-spacer-wrapper',
    size: {
      height: boxHeight
    },
    showHandle: props.isSslected,
    onResizeStop: (event, direction, resize_element, delta) => props.setAttributes({
      boxHeight: parseInt(boxHeight + delta.height)
    }),
    enable: {
      top: false,
      left: false,
      right: false,
      topLeft: false,
      topRight: false,
      bottom: true,
      bottomLeft: false,
      bottomRight: false
    }
  })));
};

registerBlockType('spice-blocks/spice-spacer', {
  title: __('Spacer', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24.000000000000004",
    height: "24.000000000000004",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_15"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("line", {
    stroke: "#09A223",
    id: "svg_13",
    y2: "14.28773",
    x2: "12.01978",
    y1: "9.81011",
    x1: "12.01978",
    fill: "none"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "#09A223",
    "stroke-width": "1",
    id: "svg_3",
    d: "m10.40726,10.04841l1.63237,-3.01457l1.63237,3.01457l-3.26473,0z",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    stroke: "#09A223",
    "stroke-width": "1",
    id: "svg_4",
    d: "m13.67202,14.03291l-1.63137,3.01517l-1.63336,-3.01397l3.26473,-0.0012z",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    id: "svg_14"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "#09A223",
    "stroke-width": "1",
    id: "svg_1",
    height: "1.3867",
    width: "23.82439",
    y: "3.5758",
    x: "0.12743",
    fill: "#09A223"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    stroke: "#09A223",
    "stroke-width": "1",
    id: "svg_2",
    height: "1.3867",
    width: "23.82439",
    y: "19.03749",
    x: "0.12743",
    fill: "#09A223"
  })))),
  category: 'spice-blocks',
  example: {
    'attributes': {
      'mode': 'preview'
    }
  },
  keywords: ['Spice Spacer', 'Spacer'],
  attributes: {
    uniqueid: {
      type: 'string'
    },
    boxHeight: {
      type: 'number',
      default: 165
    },
    border: {
      type: 'object',
      default: {
        color: '',
        style: '',
        width: ''
      }
    },
    bordertopradius: {
      type: 'string',
      default: '0px'
    },
    borderrightradius: {
      type: 'string',
      default: '0px'
    },
    borderbottomradius: {
      type: 'string',
      default: '0px'
    },
    borderleftradius: {
      type: 'string',
      default: '0px'
    },
    margins: {
      default: {
        top: '0px',
        left: '0px',
        right: '0px',
        bottom: '0px'
      }
    },
    hshadow: {
      type: 'number',
      default: 0
    },
    vshadow: {
      type: 'number',
      default: 0
    },
    blurshadow: {
      type: 'number',
      default: 0
    },
    hidedesktop: {
      type: 'boolean',
      default: false
    },
    hidetablet: {
      type: 'boolean',
      default: false
    },
    hidemobile: {
      type: 'boolean',
      default: false
    },
    animation: {
      type: 'string',
      default: ''
    },
    durations: {
      type: 'string',
      default: ' '
    },
    delay: {
      type: 'string'
    },
    bgColor: {
      type: 'string'
    },
    shadowColor: {
      type: 'string',
      default: '#000'
    }
  },
  supports: {
    align: ['wide', 'full']
  },
  edit: BlockEdit,
  save: props => {
    const {
      attributes
    } = props;
    const {
      uniqueid,
      boxHeight,
      border,
      borderradius,
      margins,
      hshadow,
      vshadow,
      blurshadow,
      hidedesktop,
      hidetablet,
      hidemobile,
      animation,
      durations,
      delay,
      bgColor,
      shadowColor,
      bordertopradius,
      borderrightradius,
      borderbottomradius,
      borderleftradius
    } = attributes;
    const blockclass = 'spice-blocks-spacer';
    const alignmentClass = attributes.textAlignment != null ? 'has-text-align-' + attributes.textAlignment : '';
    const animationclass = 'animated ' + attributes.durations + ' ' + attributes.animation;
    const displaydesktop = hidedesktop != false ? 'hide-desktop' : '';
    const displaytablet = hidetablet != false ? 'hide-tablet' : '';
    const displaymobile = hidemobile != false ? 'hide-mobile' : '';
    const displayclass = displaydesktop + ' ' + displaytablet + ' ' + displaymobile;
    const bordertop = border.top != undefined ? `${border.top.width} ${border.top.style} ${border.top.color}` : null;
    const borderright = border.right != undefined ? `${border.right.width} ${border.right.style} ${border.right.color}` : null;
    const borderbottom = border.bottom != undefined ? `${border.bottom.width} ${border.bottom.style} ${border.bottom.color}` : null;
    const borderleft = border.left != undefined ? `${border.left.width} ${border.left.style} ${border.left.color}` : null;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", {
      dangerouslySetInnerHTML: {
        __html: [`#${uniqueid}{
						height: ${boxHeight}px;
						border: ${border.width} ${border.style} ${border.color};
						border-top:${bordertop};
						border-right:${borderright};
						border-bottom:${borderbottom};
						border-left:${borderleft};
						border-radius: ${bordertopradius} ${borderrightradius} ${borderbottomradius} ${borderleftradius};
						margin: ${margins.top} ${margins.right} ${margins.bottom} ${margins.left};
						animation-delay: ${delay}ms;
						box-shadow: ${hshadow}px ${vshadow}px ${blurshadow}px ${shadowColor};
						background-color:${bgColor};
					}`].join('\n')
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      id: uniqueid,
      className: `${blockclass} ${animationclass} ${displayclass} ${props.attributes.className}`
    }));
  }
});

/***/ }),

/***/ "./src/blocks/lib/FontPicker.js":
/*!**************************************!*\
  !*** ./src/blocks/lib/FontPicker.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @samuelmeuli/font-manager */ "./node_modules/@samuelmeuli/font-manager/dist/index.es.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);


/*! *****************************************************************************
Copyright (c) Microsoft Corporation. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License"); you may not use
this file except in compliance with the License. You may obtain a copy of the
License at http://www.apache.org/licenses/LICENSE-2.0

THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
MERCHANTABLITY OR NON-INFRINGEMENT.

See the Apache Version 2.0 License for specific language governing permissions
and limitations under the License.
***************************************************************************** */

/* global Reflect, Promise */

var extendStatics = function (d, b) {
  extendStatics = Object.setPrototypeOf || {
    __proto__: []
  } instanceof Array && function (d, b) {
    d.__proto__ = b;
  } || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
  };

  return extendStatics(d, b);
};

function __extends(d, b) {
  extendStatics(d, b);

  function __() {
    this.constructor = d;
  }

  d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
} // function getFontId(fontFamily) {
//     return fontFamily.replace(/\s+/g, "-").toLowerCase();
// }


var FontPicker = function (_super) {
  __extends(FontPicker, _super);

  function FontPicker(props) {
    var _this = _super.call(this, props) || this;

    _this.state = {
      expanded: false,
      loadingStatus: "loading"
    };

    _this.componentDidMount = function () {
      _this.fontManager.init().then(function () {
        _this.setState({
          loadingStatus: "finished"
        });
      })["catch"](function (err) {
        _this.setState({
          loadingStatus: "error"
        });

        console.error("Error trying to fetch the list of available fonts");
        console.error(err);
      });
    };

    _this.componentDidUpdate = function (prevProps) {
      var _a = _this.props,
          activeFontFamily = _a.activeFontFamily,
          onChange = _a.onChange;

      if (activeFontFamily !== prevProps.activeFontFamily) {
        _this.setActiveFontFamily(activeFontFamily);
      }

      if (onChange !== prevProps.onChange) {
        _this.fontManager.setOnChange(onChange);
      }
    };

    _this.onClose = function (e) {
      var targetEl = e.target;
      var fontPickerEl = document.getElementById("font-picker" + _this.fontManager.selectorSuffix);

      while (true) {
        if (targetEl === fontPickerEl) {
          return;
        }

        if (targetEl.parentNode) {
          targetEl = targetEl.parentNode;
        } else {
          _this.toggleExpanded();

          return;
        }
      }
    };

    _this.onSelection = function (e) {
      var target = e.target;
      var activeFontFamily = target.textContent;

      if (!activeFontFamily) {
        throw Error("Missing font family in clicked font button");
      }

      _this.setActiveFontFamily(activeFontFamily);

      _this.toggleExpanded();
    };

    _this.setActiveFontFamily = function (activeFontFamily) {
      _this.fontManager.setActiveFont(activeFontFamily);
    };

    _this.generateFontList = function (fonts) {
      var activeFontFamily = _this.props.activeFontFamily;
      var loadingStatus = _this.state.loadingStatus;

      if (loadingStatus !== "finished") {
        return react__WEBPACK_IMPORTED_MODULE_1___default().createElement("div", null);
      }

      return react__WEBPACK_IMPORTED_MODULE_1___default().createElement("ul", {
        className: "font-list"
      }, fonts.map(function (font) {
        var isActive = font.family === activeFontFamily;
        var fontId = (0,_samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.getFontId)(font.family);
        return react__WEBPACK_IMPORTED_MODULE_1___default().createElement("li", {
          key: fontId,
          className: "font-list-item"
        }, react__WEBPACK_IMPORTED_MODULE_1___default().createElement("button", {
          type: "button",
          id: "font-button-" + fontId + _this.fontManager.selectorSuffix,
          className: "font-button " + (isActive ? "active-font" : ""),
          onClick: _this.onSelection,
          onKeyPress: _this.onSelection
        }, font.family));
      }));
    };

    _this.toggleExpanded = function () {
      var expanded = _this.state.expanded;

      if (expanded) {
        _this.setState({
          expanded: false
        });

        document.removeEventListener("click", _this.onClose);
      } else {
        _this.setState({
          expanded: true
        });

        document.addEventListener("click", _this.onClose);
      }
    };

    _this.render = function () {
      var _a = _this.props,
          activeFontFamily = _a.activeFontFamily,
          sort = _a.sort;
      var _b = _this.state,
          expanded = _b.expanded,
          loadingStatus = _b.loadingStatus;
      var fonts = Array.from(_this.fontManager.getFonts().values());

      if (sort === "alphabet") {
        fonts.sort(function (font1, font2) {
          return font1.family.localeCompare(font2.family);
        });
      }

      return react__WEBPACK_IMPORTED_MODULE_1___default().createElement("div", {
        id: "font-picker" + _this.fontManager.selectorSuffix,
        className: expanded ? " spice-blocks-font-family expanded" : "spice-blocks-font-family"
      }, react__WEBPACK_IMPORTED_MODULE_1___default().createElement("button", {
        type: "button",
        className: "dropdown-button",
        onClick: _this.toggleExpanded,
        onKeyPress: _this.toggleExpanded
      }, react__WEBPACK_IMPORTED_MODULE_1___default().createElement("p", {
        className: "dropdown-font-family"
      }, activeFontFamily), react__WEBPACK_IMPORTED_MODULE_1___default().createElement("p", {
        className: "dropdown-icon " + loadingStatus
      })), loadingStatus === "finished" && _this.generateFontList(fonts));
    };

    var _a = _this.props,
        apiKey = _a.apiKey,
        activeFontFamily = _a.activeFontFamily,
        pickerId = _a.pickerId,
        families = _a.families,
        categories = _a.categories,
        scripts = _a.scripts,
        variants = _a.variants,
        filter = _a.filter,
        limit = _a.limit,
        sort = _a.sort,
        onChange = _a.onChange;
    var options = {
      pickerId: pickerId,
      families: families,
      categories: categories,
      scripts: scripts,
      variants: variants,
      filter: filter,
      limit: limit,
      sort: sort
    };
    _this.fontManager = new _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.FontManager(apiKey, activeFontFamily, options, onChange);
    return _this;
  }

  FontPicker.defaultProps = {
    activeFontFamily: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.FONT_FAMILY_DEFAULT,
    onChange: function () {},
    pickerId: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.pickerId,
    families: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.families,
    categories: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.categories,
    scripts: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.scripts,
    variants: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.variants,
    filter: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.filter,
    limit: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.limit,
    sort: _samuelmeuli_font_manager__WEBPACK_IMPORTED_MODULE_0__.OPTIONS_DEFAULTS.sort
  };
  return FontPicker;
}(react__WEBPACK_IMPORTED_MODULE_1__.PureComponent);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FontPicker);

/***/ }),

/***/ "./src/blocks/lib/coldeprecated.js":
/*!*****************************************!*\
  !*** ./src/blocks/lib/coldeprecated.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */


const deprecated = [{
  attributes: {
    verticalAlignment: {
      type: 'string'
    },
    width: {
      type: 'number',
      min: 0,
      max: 100
    }
  },

  isEligible(_ref) {
    let {
      width
    } = _ref;
    return isFinite(width);
  },

  migrate(attributes) {
    return { ...attributes,
      width: `${attributes.width}%`
    };
  },

  save(_ref2) {
    let {
      attributes
    } = _ref2;
    const {
      verticalAlignment,
      width
    } = attributes;
    const wrapperClasses = classnames__WEBPACK_IMPORTED_MODULE_1___default()({
      [`is-vertically-aligned-${verticalAlignment}`]: verticalAlignment
    });
    const style = {
      flexBasis: width + '%'
    };
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: wrapperClasses,
      style: style
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null));
  }

}];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (deprecated);

/***/ }),

/***/ "./src/blocks/lib/colors.js":
/*!**********************************!*\
  !*** ./src/blocks/lib/colors.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "colors": () => (/* binding */ colors)
/* harmony export */ });
const colors = [{
  name: 'Blue 20',
  color: '#72aee6'
} // ...
];

/***/ }),

/***/ "./src/blocks/lib/deprecated.js":
/*!**************************************!*\
  !*** ./src/blocks/lib/deprecated.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */



/**
 * Given an HTML string for a deprecated columns inner block, returns the
 * column index to which the migrated inner block should be assigned. Returns
 * undefined if the inner block was not assigned to a column.
 *
 * @param {string} originalContent Deprecated Columns inner block HTML.
 *
 * @return {?number} Column to which inner block is to be assigned.
 */

function getDeprecatedLayoutColumn(originalContent) {
  let {
    doc
  } = getDeprecatedLayoutColumn;

  if (!doc) {
    doc = document.implementation.createHTMLDocument('');
    getDeprecatedLayoutColumn.doc = doc;
  }

  let columnMatch;
  doc.body.innerHTML = originalContent;

  for (const classListItem of doc.body.firstChild.classList) {
    if (columnMatch = classListItem.match(/^layout-column-(\d+)$/)) {
      return Number(columnMatch[1]) - 1;
    }
  }
}

const migrateCustomColors = attributes => {
  if (!attributes.customTextColor && !attributes.customBackgroundColor) {
    return attributes;
  }

  const style = {
    color: {}
  };

  if (attributes.customTextColor) {
    style.color.text = attributes.customTextColor;
  }

  if (attributes.customBackgroundColor) {
    style.color.background = attributes.customBackgroundColor;
  }

  const {
    customTextColor,
    customBackgroundColor,
    ...restAttributes
  } = attributes;
  return { ...restAttributes,
    style
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  attributes: {
    verticalAlignment: {
      type: 'string'
    },
    backgroundColor: {
      type: 'string'
    },
    customBackgroundColor: {
      type: 'string'
    },
    customTextColor: {
      type: 'string'
    },
    textColor: {
      type: 'string'
    }
  },
  migrate: migrateCustomColors,

  save(_ref) {
    let {
      attributes
    } = _ref;
    const {
      verticalAlignment,
      backgroundColor,
      customBackgroundColor,
      textColor,
      customTextColor
    } = attributes;
    const backgroundClass = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.getColorClassName)('background-color', backgroundColor);
    const textClass = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.getColorClassName)('color', textColor);
    const className = classnames__WEBPACK_IMPORTED_MODULE_1___default()({
      'has-background': backgroundColor || customBackgroundColor,
      'has-text-color': textColor || customTextColor,
      [backgroundClass]: backgroundClass,
      [textClass]: textClass,
      [`are-vertically-aligned-${verticalAlignment}`]: verticalAlignment
    });
    const style = {
      backgroundColor: backgroundClass ? undefined : customBackgroundColor,
      color: textClass ? undefined : customTextColor
    };
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: className ? className : undefined,
      style: style
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.InnerBlocks.Content, null));
  }

}, {
  attributes: {
    columns: {
      type: 'number',
      default: 2
    }
  },

  isEligible(attributes, innerBlocks) {
    // Since isEligible is called on every valid instance of the
    // Columns block and a deprecation is the unlikely case due to
    // its subsequent migration, optimize for the `false` condition
    // by performing a naive, inaccurate pass at inner blocks.
    const isFastPassEligible = innerBlocks.some(innerBlock => /layout-column-\d+/.test(innerBlock.originalContent));

    if (!isFastPassEligible) {
      return false;
    } // Only if the fast pass is considered eligible is the more
    // accurate, durable, slower condition performed.


    return innerBlocks.some(innerBlock => getDeprecatedLayoutColumn(innerBlock.originalContent) !== undefined);
  },

  migrate(attributes, innerBlocks) {
    const columns = innerBlocks.reduce((accumulator, innerBlock) => {
      const {
        originalContent
      } = innerBlock;
      let columnIndex = getDeprecatedLayoutColumn(originalContent);

      if (columnIndex === undefined) {
        columnIndex = 0;
      }

      if (!accumulator[columnIndex]) {
        accumulator[columnIndex] = [];
      }

      accumulator[columnIndex].push(innerBlock);
      return accumulator;
    }, []);
    const migratedInnerBlocks = columns.map(columnBlocks => (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.createBlock)('spice-blocks/spice-column', {}, columnBlocks));
    const {
      columns: ignoredColumns,
      ...restAttributes
    } = attributes;
    return [{ ...restAttributes
    }, migratedInnerBlocks];
  },

  save(_ref2) {
    let {
      attributes
    } = _ref2;
    const {
      columns
    } = attributes;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: `has-${columns}-columns`
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.InnerBlocks.Content, null));
  }

}, {
  attributes: {
    columns: {
      type: 'number',
      default: 2
    }
  },

  migrate(attributes, innerBlocks) {
    const {
      columns,
      ...restAttributes
    } = attributes;
    attributes = { ...restAttributes
    };
    return [attributes, innerBlocks];
  },

  save(_ref3) {
    let {
      attributes
    } = _ref3;
    const {
      verticalAlignment,
      columns
    } = attributes;
    const wrapperClasses = classnames__WEBPACK_IMPORTED_MODULE_1___default()(`has-${columns}-columns`, {
      [`are-vertically-aligned-${verticalAlignment}`]: verticalAlignment
    });
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: wrapperClasses
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.InnerBlocks.Content, null));
  }

}]);

/***/ }),

/***/ "./src/blocks/lib/icons.js":
/*!*********************************!*\
  !*** ./src/blocks/lib/icons.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "icons": () => (/* binding */ icons)
/* harmony export */ });
const icons = ["fa fa-address-book", "fa fa-address-book-o", "fa fa-address-card", "fa fa-address-card-o", "fa fa-adjust", "fa fa-adn", "fa fa-align-center", "fa fa-align-justify", "fa fa-align-left", "fa fa-align-right", "fa fa-amazon", "fa fa-ambulance", "fa fa-american-sign-language-interpreting", "fa fa-anchor", "fa fa-android", "fa fa-angellist", "fa fa-angle-double-down", "fa fa-angle-double-left", "fa fa-angle-double-right", "fa fa-angle-double-up", "fa fa-angle-down", "fa fa-angle-left", "fa fa-angle-right", "fa fa-angle-up", "fa fa-apple", "fa fa-archive", "fa fa-area-chart", "fa fa-arrow-circle-down", "fa fa-arrow-circle-left", "fa fa-arrow-circle-o-down", "fa fa-arrow-circle-o-left", "fa fa-arrow-circle-o-right", "fa fa-arrow-circle-o-up", "fa fa-arrow-circle-right", "fa fa-arrow-circle-up", "fa fa-arrow-down", "fa fa-arrow-left", "fa fa-arrow-right", "fa fa-arrow-up", "fa fa-arrows", "fa fa-arrows-alt", "fa fa-arrows-h", "fa fa-arrows-v", "fa fa-asl-interpreting", "fa fa-assistive-listening-systems", "fa fa-asterisk", "fa fa-at", "fa fa-audio-description", "fa fa-automobile", "fa fa-backward", "fa fa-balance-scale", "fa fa-ban", "fa fa-bandcamp", "fa fa-bank", "fa fa-bar-chart", "fa fa-bar-chart-o", "fa fa-barcode", "fa fa-bars", "fa fa-bath", "fa fa-bathtub", "fa fa-battery", "fa fa-battery-0", "fa fa-battery-1", "fa fa-battery-2", "fa fa-battery-3", "fa fa-battery-4", "fa fa-battery-empty", "fa fa-battery-full", "fa fa-battery-half", "fa fa-battery-quarter", "fa fa-battery-three-quarters", "fa fa-bed", "fa fa-beer", "fa fa-behance", "fa fa-behance-square", "fa fa-bell", "fa fa-bell-o", "fa fa-bell-slash", "fa fa-bell-slash-o", "fa fa-bicycle", "fa fa-binoculars", "fa fa-birthday-cake", "fa fa-bitbucket", "fa fa-bitbucket-square", "fa fa-bitcoin", "fa fa-black-tie", "fa fa-blind", "fa fa-bluetooth", "fa fa-bluetooth-b", "fa fa-bold", "fa fa-bolt", "fa fa-bomb", "fa fa-book", "fa fa-bookmark", "fa fa-bookmark-o", "fa fa-braille", "fa fa-briefcase", "fa fa-btc", "fa fa-bug", "fa fa-building", "fa fa-building-o", "fa fa-bullhorn", "fa fa-bullseye", "fa fa-bus", "fa fa-buysellads", "fa fa-cab", "fa fa-calculator", "fa fa-calendar", "fa fa-calendar-check-o", "fa fa-calendar-minus-o", "fa fa-calendar-o", "fa fa-calendar-plus-o", "fa fa-calendar-times-o", "fa fa-camera", "fa fa-camera-retro", "fa fa-car", "fa fa-caret-down", "fa fa-caret-left", "fa fa-caret-right", "fa fa-caret-square-o-down", "fa fa-caret-square-o-left", "fa fa-caret-square-o-right", "fa fa-caret-square-o-up", "fa fa-caret-up", "fa fa-cart-arrow-down", "fa fa-cart-plus", "fa fa-cc", "fa fa-cc-amex", "fa fa-cc-diners-club", "fa fa-cc-discover", "fa fa-cc-jcb", "fa fa-cc-mastercard", "fa fa-cc-paypal", "fa fa-cc-stripe", "fa fa-cc-visa", "fa fa-certificate", "fa fa-chain", "fa fa-chain-broken", "fa fa-check", "fa fa-check-circle", "fa fa-check-circle-o", "fa fa-check-square", "fa fa-check-square-o", "fa fa-chevron-circle-down", "fa fa-chevron-circle-left", "fa fa-chevron-circle-right", "fa fa-chevron-circle-up", "fa fa-chevron-down", "fa fa-chevron-left", "fa fa-chevron-right", "fa fa-chevron-up", "fa fa-child", "fa fa-chrome", "fa fa-circle", "fa fa-circle-o", "fa fa-circle-o-notch", "fa fa-circle-thin", "fa fa-clipboard", "fa fa-clock-o", "fa fa-clone", "fa fa-close", "fa fa-cloud", "fa fa-cloud-download", "fa fa-cloud-upload", "fa fa-cny", "fa fa-code", "fa fa-code-fork", "fa fa-codepen", "fa fa-codiepie", "fa fa-coffee", "fa fa-cog", "fa fa-cogs", "fa fa-columns", "fa fa-comment", "fa fa-comment-o", "fa fa-commenting", "fa fa-commenting-o", "fa fa-comments", "fa fa-comments-o", "fa fa-compass", "fa fa-compress", "fa fa-connectdevelop", "fa fa-contao", "fa fa-copy", "fa fa-copyright", "fa fa-creative-commons", "fa fa-credit-card", "fa fa-credit-card-alt", "fa fa-crop", "fa fa-crosshairs", "fa fa-css3", "fa fa-cube", "fa fa-cubes", "fa fa-cut", "fa fa-cutlery", "fa fa-dashboard", "fa fa-dashcube", "fa fa-database", "fa fa-deaf", "fa fa-deafness", "fa fa-dedent", "fa fa-delicious", "fa fa-desktop", "fa fa-deviantart", "fa fa-diamond", "fa fa-digg", "fa fa-dollar", "fa fa-dot-circle-o", "fa fa-download", "fa fa-dribbble", "fa fa-drivers-license", "fa fa-drivers-license-o", "fa fa-dropbox", "fa fa-drupal", "fa fa-edge", "fa fa-edit", "fa fa-eercast", "fa fa-eject", "fa fa-ellipsis-h", "fa fa-ellipsis-v", "fa fa-empire", "fa fa-envelope", "fa fa-envelope-o", "fa fa-envelope-open", "fa fa-envelope-open-o", "fa fa-envelope-square", "fa fa-envira", "fa fa-eraser", "fa fa-etsy", "fa fa-eur", "fa fa-euro", "fa fa-exchange", "fa fa-exclamation", "fa fa-exclamation-circle", "fa fa-exclamation-triangle", "fa fa-expand", "fa fa-expeditedssl", "fa fa-external-link", "fa fa-external-link-square", "fa fa-eye", "fa fa-eye-slash", "fa fa-eyedropper", "fa fa-fa", "fa fa-facebook", "fa fa-facebook-f", "fa fa-facebook-official", "fa fa-facebook-square", "fa fa-fast-backward", "fa fa-fast-forward", "fa fa-fax", "fa fa-feed", "fa fa-female", "fa fa-fighter-jet", "fa fa-file", "fa fa-file-archive-o", "fa fa-file-audio-o", "fa fa-file-code-o", "fa fa-file-excel-o", "fa fa-file-image-o", "fa fa-file-movie-o", "fa fa-file-o", "fa fa-file-pdf-o", "fa fa-file-photo-o", "fa fa-file-picture-o", "fa fa-file-powerpoint-o", "fa fa-file-sound-o", "fa fa-file-text", "fa fa-file-text-o", "fa fa-file-video-o", "fa fa-file-word-o", "fa fa-file-zip-o", "fa fa-files-o", "fa fa-film", "fa fa-filter", "fa fa-fire", "fa fa-fire-extinguisher", "fa fa-firefox", "fa fa-first-order", "fa fa-flag", "fa fa-flag-checkered", "fa fa-flag-o", "fa fa-flash", "fa fa-flask", "fa fa-flickr", "fa fa-floppy-o", "fa fa-folder", "fa fa-folder-o", "fa fa-folder-open", "fa fa-folder-open-o", "fa fa-font", "fa fa-font-awesome", "fa fa-fonticons", "fa fa-fort-awesome", "fa fa-forumbee", "fa fa-forward", "fa fa-foursquare", "fa fa-free-code-camp", "fa fa-frown-o", "fa fa-futbol-o", "fa fa-gamepad", "fa fa-gavel", "fa fa-gbp", "fa fa-ge", "fa fa-gear", "fa fa-gears", "fa fa-genderless", "fa fa-get-pocket", "fa fa-gg", "fa fa-gg-circle", "fa fa-gift", "fa fa-git", "fa fa-git-square", "fa fa-github", "fa fa-github-alt", "fa fa-github-square", "fa fa-gitlab", "fa fa-gittip", "fa fa-glass", "fa fa-glide", "fa fa-glide-g", "fa fa-globe", "fa fa-google", "fa fa-google-plus", "fa fa-google-plus-circle", "fa fa-google-plus-official", "fa fa-google-plus-square", "fa fa-google-wallet", "fa fa-graduation-cap", "fa fa-gratipay", "fa fa-grav", "fa fa-group", "fa fa-h-square", "fa fa-hacker-news", "fa fa-hand-grab-o", "fa fa-hand-lizard-o", "fa fa-hand-o-down", "fa fa-hand-o-left", "fa fa-hand-o-right", "fa fa-hand-o-up", "fa fa-hand-paper-o", "fa fa-hand-peace-o", "fa fa-hand-pointer-o", "fa fa-hand-rock-o", "fa fa-hand-scissors-o", "fa fa-hand-spock-o", "fa fa-hand-stop-o", "fa fa-handshake-o", "fa fa-hard-of-hearing", "fa fa-hashtag", "fa fa-hdd-o", "fa fa-header", "fa fa-headphones", "fa fa-heart", "fa fa-heart-o", "fa fa-heartbeat", "fa fa-history", "fa fa-home", "fa fa-hospital-o", "fa fa-hotel", "fa fa-hourglass", "fa fa-hourglass-1", "fa fa-hourglass-2", "fa fa-hourglass-3", "fa fa-hourglass-end", "fa fa-hourglass-half", "fa fa-hourglass-o", "fa fa-hourglass-start", "fa fa-houzz", "fa fa-html5", "fa fa-i-cursor", "fa fa-id-badge", "fa fa-id-card", "fa fa-id-card-o", "fa fa-ils", "fa fa-image", "fa fa-imdb", "fa fa-inbox", "fa fa-indent", "fa fa-industry", "fa fa-info", "fa fa-info-circle", "fa fa-inr", "fa fa-instagram", "fa fa-institution", "fa fa-internet-explorer", "fa fa-intersex", "fa fa-ioxhost", "fa fa-italic", "fa fa-joomla", "fa fa-jpy", "fa fa-jsfiddle", "fa fa-key", "fa fa-keyboard-o", "fa fa-krw", "fa fa-language", "fa fa-laptop", "fa fa-lastfm", "fa fa-lastfm-square", "fa fa-leaf", "fa fa-leanpub", "fa fa-legal", "fa fa-lemon-o", "fa fa-level-down", "fa fa-level-up", "fa fa-life-bouy", "fa fa-life-buoy", "fa fa-life-ring", "fa fa-life-saver", "fa fa-lightbulb-o", "fa fa-line-chart", "fa fa-link", "fa fa-linkedin", "fa fa-linkedin-square", "fa fa-linode", "fa fa-linux", "fa fa-list", "fa fa-list-alt", "fa fa-list-ol", "fa fa-list-ul", "fa fa-location-arrow", "fa fa-lock", "fa fa-long-arrow-down", "fa fa-long-arrow-left", "fa fa-long-arrow-right", "fa fa-long-arrow-up", "fa fa-low-vision", "fa fa-magic", "fa fa-magnet", "fa fa-mail-forward", "fa fa-mail-reply", "fa fa-mail-reply-all", "fa fa-male", "fa fa-map", "fa fa-map-marker", "fa fa-map-o", "fa fa-map-pin", "fa fa-map-signs", "fa fa-mars", "fa fa-mars-double", "fa fa-mars-stroke", "fa fa-mars-stroke-h", "fa fa-mars-stroke-v", "fa fa-maxcdn", "fa fa-meanpath", "fa fa-medium", "fa fa-medkit", "fa fa-meetup", "fa fa-meh-o", "fa fa-mercury", "fa fa-microchip", "fa fa-microphone", "fa fa-microphone-slash", "fa fa-minus", "fa fa-minus-circle", "fa fa-minus-square", "fa fa-minus-square-o", "fa fa-mixcloud", "fa fa-mobile", "fa fa-mobile-phone", "fa fa-modx", "fa fa-money", "fa fa-moon-o", "fa fa-mortar-board", "fa fa-motorcycle", "fa fa-mouse-pointer", "fa fa-music", "fa fa-navicon", "fa fa-neuter", "fa fa-newspaper-o", "fa fa-object-group", "fa fa-object-ungroup", "fa fa-odnoklassniki", "fa fa-odnoklassniki-square", "fa fa-opencart", "fa fa-openid", "fa fa-opera", "fa fa-optin-monster", "fa fa-outdent", "fa fa-pagelines", "fa fa-paint-brush", "fa fa-paper-plane", "fa fa-paper-plane-o", "fa fa-paperclip", "fa fa-paragraph", "fa fa-paste", "fa fa-pause", "fa fa-pause-circle", "fa fa-pause-circle-o", "fa fa-paw", "fa fa-paypal", "fa fa-pencil", "fa fa-pencil-square", "fa fa-pencil-square-o", "fa fa-percent", "fa fa-phone", "fa fa-phone-square", "fa fa-photo", "fa fa-picture-o", "fa fa-pie-chart", "fa fa-pied-piper", "fa fa-pied-piper-alt", "fa fa-pied-piper-pp", "fa fa-pinterest", "fa fa-pinterest-p", "fa fa-pinterest-square", "fa fa-plane", "fa fa-play", "fa fa-play-circle", "fa fa-play-circle-o", "fa fa-plug", "fa fa-plus", "fa fa-plus-circle", "fa fa-plus-square", "fa fa-plus-square-o", "fa fa-podcast", "fa fa-power-off", "fa fa-print", "fa fa-product-hunt", "fa fa-puzzle-piece", "fa fa-qq", "fa fa-qrcode", "fa fa-question", "fa fa-question-circle", "fa fa-question-circle-o", "fa fa-quora", "fa fa-quote-left", "fa fa-quote-right", "fa fa-ra", "fa fa-random", "fa fa-ravelry", "fa fa-rebel", "fa fa-recycle", "fa fa-reddit", "fa fa-reddit-alien", "fa fa-reddit-square", "fa fa-refresh", "fa fa-registered", "fa fa-remove", "fa fa-renren", "fa fa-reorder", "fa fa-repeat", "fa fa-reply", "fa fa-reply-all", "fa fa-resistance", "fa fa-retweet", "fa fa-rmb", "fa fa-road", "fa fa-rocket", "fa fa-rotate-left", "fa fa-rotate-right", "fa fa-rouble", "fa fa-rss", "fa fa-rss-square", "fa fa-rub", "fa fa-ruble", "fa fa-rupee", "fa fa-s15", "fa fa-safari", "fa fa-save", "fa fa-scissors", "fa fa-scribd", "fa fa-search", "fa fa-search-minus", "fa fa-search-plus", "fa fa-sellsy", "fa fa-send", "fa fa-send-o", "fa fa-server", "fa fa-share", "fa fa-share-alt", "fa fa-share-alt-square", "fa fa-share-square", "fa fa-share-square-o", "fa fa-shekel", "fa fa-sheqel", "fa fa-shield", "fa fa-ship", "fa fa-shirtsinbulk", "fa fa-shopping-bag", "fa fa-shopping-basket", "fa fa-shopping-cart", "fa fa-shower", "fa fa-sign-in", "fa fa-sign-language", "fa fa-sign-out", "fa fa-signal", "fa fa-signing", "fa fa-simplybuilt", "fa fa-sitemap", "fa fa-skyatlas", "fa fa-skype", "fa fa-slack", "fa fa-sliders", "fa fa-slideshare", "fa fa-smile-o", "fa fa-snapchat", "fa fa-snapchat-ghost", "fa fa-snapchat-square", "fa fa-snowflake-o", "fa fa-soccer-ball-o", "fa fa-sort", "fa fa-sort-alpha-asc", "fa fa-sort-alpha-desc", "fa fa-sort-amount-asc", "fa fa-sort-amount-desc", "fa fa-sort-asc", "fa fa-sort-desc", "fa fa-sort-down", "fa fa-sort-numeric-asc", "fa fa-sort-numeric-desc", "fa fa-sort-up", "fa fa-soundcloud", "fa fa-space-shuttle", "fa fa-spinner", "fa fa-spoon", "fa fa-spotify", "fa fa-square", "fa fa-square-o", "fa fa-stack-exchange", "fa fa-stack-overflow", "fa fa-star", "fa fa-star-half", "fa fa-star-half-empty", "fa fa-star-half-full", "fa fa-star-half-o", "fa fa-star-o", "fa fa-steam", "fa fa-steam-square", "fa fa-step-backward", "fa fa-step-forward", "fa fa-stethoscope", "fa fa-sticky-note", "fa fa-sticky-note-o", "fa fa-stop", "fa fa-stop-circle", "fa fa-stop-circle-o", "fa fa-street-view", "fa fa-strikethrough", "fa fa-stumbleupon", "fa fa-stumbleupon-circle", "fa fa-subscript", "fa fa-subway", "fa fa-suitcase", "fa fa-sun-o", "fa fa-superpowers", "fa fa-superscript", "fa fa-support", "fa fa-table", "fa fa-tablet", "fa fa-tachometer", "fa fa-tag", "fa fa-tags", "fa fa-tasks", "fa fa-taxi", "fa fa-telegram", "fa fa-television", "fa fa-tencent-weibo", "fa fa-terminal", "fa fa-text-height", "fa fa-text-width", "fa fa-th", "fa fa-th-large", "fa fa-th-list", "fa fa-themeisle", "fa fa-thermometer", "fa fa-thermometer-0", "fa fa-thermometer-1", "fa fa-thermometer-2", "fa fa-thermometer-3", "fa fa-thermometer-4", "fa fa-thermometer-empty", "fa fa-thermometer-full", "fa fa-thermometer-half", "fa fa-thermometer-quarter", "fa fa-thermometer-three-quarters", "fa fa-thumb-tack", "fa fa-thumbs-down", "fa fa-thumbs-o-down", "fa fa-thumbs-o-up", "fa fa-thumbs-up", "fa fa-ticket", "fa fa-times", "fa fa-times-circle", "fa fa-times-circle-o", "fa fa-times-rectangle", "fa fa-times-rectangle-o", "fa fa-tint", "fa fa-toggle-down", "fa fa-toggle-left", "fa fa-toggle-off", "fa fa-toggle-on", "fa fa-toggle-right", "fa fa-toggle-up", "fa fa-trademark", "fa fa-train", "fa fa-transgender", "fa fa-transgender-alt", "fa fa-trash", "fa fa-trash-o", "fa fa-tree", "fa fa-trello", "fa fa-tripadvisor", "fa fa-trophy", "fa fa-truck", "fa fa-try", "fa fa-tty", "fa fa-tumblr", "fa fa-tumblr-square", "fa fa-turkish-lira", "fa fa-tv", "fa fa-twitch", "fa fa-twitter", "fa fa-twitter-square", "fa fa-umbrella", "fa fa-underline", "fa fa-undo", "fa fa-universal-access", "fa fa-university", "fa fa-unlink", "fa fa-unlock", "fa fa-unlock-alt", "fa fa-unsorted", "fa fa-upload", "fa fa-usb", "fa fa-usd", "fa fa-user", "fa fa-user-circle", "fa fa-user-circle-o", "fa fa-user-md", "fa fa-user-o", "fa fa-user-plus", "fa fa-user-secret", "fa fa-user-times", "fa fa-users", "fa fa-vcard", "fa fa-vcard-o", "fa fa-venus", "fa fa-venus-double", "fa fa-venus-mars", "fa fa-viacoin", "fa fa-viadeo", "fa fa-viadeo-square", "fa fa-video-camera", "fa fa-vimeo", "fa fa-vimeo-square", "fa fa-vine", "fa fa-vk", "fa fa-volume-control-phone", "fa fa-volume-down", "fa fa-volume-off", "fa fa-volume-up", "fa fa-warning", "fa fa-wechat", "fa fa-weibo", "fa fa-weixin", "fa fa-whatsapp", "fa fa-wheelchair", "fa fa-wheelchair-alt", "fa fa-wifi", "fa fa-wikipedia-w", "fa fa-window-close", "fa fa-window-close-o", "fa fa-window-maximize", "fa fa-window-minimize", "fa fa-window-restore", "fa fa-windows", "fa fa-won", "fa fa-wordpress", "fa fa-wpbeginner", "fa fa-wpexplorer", "fa fa-wpforms", "fa fa-wrench", "fa fa-xing", "fa fa-xing-square", "fa fa-y-combinator", "fa fa-y-combinator-square", "fa fa-yahoo", "fa fa-yc", "fa fa-yc-square", "fa fa-yelp", "fa fa-yen", "fa fa-yoast", "fa fa-youtube", "fa fa-youtube-play", "fa fa-youtube-square", "fa-solid fa-1", "fa-regular fa-1", "fa-solid fa-2", "fa-regular fa-2", "fa-solid fa-3", "fa-regular fa-3", "fa-solid fa-4", "fa-regular fa-4", "fa-solid fa-5", "fa-regular fa-5", "fa-solid fa-6", "fa-regular fa-6", "fa-solid fa-7", "fa-regular fa-7", "fa-solid fa-8", "fa-regular fa-8", "fa-solid fa-9", "fa-regular fa-9", "fa-solid fa-0", "fa-regular fa-0"];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  icons
});

/***/ }),

/***/ "./src/blocks/lib/transforms.js":
/*!**************************************!*\
  !*** ./src/blocks/lib/transforms.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

const MAXIMUM_SELECTED_BLOCKS = 6;
const transforms = {
  from: [{
    type: 'block',
    isMultiBlock: true,
    blocks: ['*'],
    __experimentalConvert: blocks => {
      const columnWidth = +(100 / blocks.length).toFixed(2);
      const innerBlocksTemplate = blocks.map(_ref => {
        let {
          name,
          attributes,
          innerBlocks
        } = _ref;
        return ['spice-blocks/spice-column', {
          width: `${columnWidth}%`
        }, [[name, { ...attributes
        }, innerBlocks]]];
      });
      return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.createBlock)('spice-blocks/spice-section', {}, (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.createBlocksFromInnerBlocksTemplate)(innerBlocksTemplate));
    },
    isMatch: (_ref2, blocks) => {
      let {
        length: selectedBlocksLength
      } = _ref2;

      // If a user is trying to transform a single Columns block, skip
      // the transformation. Enabling this functiontionality creates
      // nested Columns blocks resulting in an unintuitive user experience.
      // Multiple Columns blocks can still be transformed.
      if (blocks.length === 1 && blocks[0].name === 'spice-blocks/spice-section') {
        return false;
      }

      return selectedBlocksLength && selectedBlocksLength <= MAXIMUM_SELECTED_BLOCKS;
    }
  }, {
    type: 'block',
    blocks: ['core/media-text'],
    priority: 1,
    transform: (attributes, innerBlocks) => {
      const {
        align,
        backgroundColor,
        textColor,
        style,
        mediaAlt: alt,
        mediaId: id,
        mediaPosition,
        mediaSizeSlug: sizeSlug,
        mediaType,
        mediaUrl: url,
        mediaWidth,
        verticalAlignment
      } = attributes;
      let media;

      if (mediaType === 'image' || !mediaType) {
        const imageAttrs = {
          id,
          alt,
          url,
          sizeSlug
        };
        const linkAttrs = {
          href: attributes.href,
          linkClass: attributes.linkClass,
          linkDestination: attributes.linkDestination,
          linkTarget: attributes.linkTarget,
          rel: attributes.rel
        };
        media = ['core/image', { ...imageAttrs,
          ...linkAttrs
        }];
      } else {
        media = ['core/video', {
          id,
          src: url
        }];
      }

      const innerBlocksTemplate = [['spice-blocks/spice-column', {
        width: `${mediaWidth}%`
      }, [media]], ['spice-blocks/spice-column', {
        width: `${100 - mediaWidth}%`
      }, innerBlocks]];

      if (mediaPosition === 'right') {
        innerBlocksTemplate.reverse();
      }

      return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.createBlock)('spice-blocks/spice-section', {
        align,
        backgroundColor,
        textColor,
        style,
        verticalAlignment
      }, (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.createBlocksFromInnerBlocksTemplate)(innerBlocksTemplate));
    }
  }]
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (transforms);

/***/ }),

/***/ "./src/blocks/lib/utils.js":
/*!*********************************!*\
  !*** ./src/blocks/lib/utils.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getColumnWidths": () => (/* binding */ getColumnWidths),
/* harmony export */   "getEffectiveColumnWidth": () => (/* binding */ getEffectiveColumnWidth),
/* harmony export */   "getMappedColumnWidths": () => (/* binding */ getMappedColumnWidths),
/* harmony export */   "getRedistributedColumnWidths": () => (/* binding */ getRedistributedColumnWidths),
/* harmony export */   "getTotalColumnsWidth": () => (/* binding */ getTotalColumnsWidth),
/* harmony export */   "getWidthWithUnit": () => (/* binding */ getWidthWithUnit),
/* harmony export */   "getWidths": () => (/* binding */ getWidths),
/* harmony export */   "hasExplicitPercentColumnWidths": () => (/* binding */ hasExplicitPercentColumnWidths),
/* harmony export */   "isPercentageUnit": () => (/* binding */ isPercentageUnit),
/* harmony export */   "toWidthPrecision": () => (/* binding */ toWidthPrecision)
/* harmony export */ });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/**
 * External dependencies
 */

/**
 * Returns a column width attribute value rounded to standard precision.
 * Returns `undefined` if the value is not a valid finite number.
 *
 * @param {?number} value Raw value.
 *
 * @return {number} Value rounded to standard precision.
 */

const toWidthPrecision = value => {
  const unitlessValue = parseFloat(value);
  return Number.isFinite(unitlessValue) ? parseFloat(unitlessValue.toFixed(2)) : undefined;
};
/**
 * Returns an effective width for a given block. An effective width is equal to
 * its attribute value if set, or a computed value assuming equal distribution.
 *
 * @param {WPBlock} block           Block object.
 * @param {number}  totalBlockCount Total number of blocks in Columns.
 *
 * @return {number} Effective column width.
 */

function getEffectiveColumnWidth(block, totalBlockCount) {
  const {
    width = 100 / totalBlockCount
  } = block.attributes;
  return toWidthPrecision(width);
}
/**
 * Returns the total width occupied by the given set of column blocks.
 *
 * @param {WPBlock[]} blocks          Block objects.
 * @param {?number}   totalBlockCount Total number of blocks in Columns.
 *                                    Defaults to number of blocks passed.
 *
 * @return {number} Total width occupied by blocks.
 */

function getTotalColumnsWidth(blocks) {
  let totalBlockCount = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : blocks.length;
  return blocks.reduce((sum, block) => sum + getEffectiveColumnWidth(block, totalBlockCount), 0);
}
/**
 * Returns an object of `clientId` → `width` of effective column widths.
 *
 * @param {WPBlock[]} blocks          Block objects.
 * @param {?number}   totalBlockCount Total number of blocks in Columns.
 *                                    Defaults to number of blocks passed.
 *
 * @return {Object<string,number>} Column widths.
 */

function getColumnWidths(blocks) {
  let totalBlockCount = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : blocks.length;
  return blocks.reduce((accumulator, block) => {
    const width = getEffectiveColumnWidth(block, totalBlockCount);
    return Object.assign(accumulator, {
      [block.clientId]: width
    });
  }, {});
}
/**
 * Returns an object of `clientId` → `width` of column widths as redistributed
 * proportional to their current widths, constrained or expanded to fit within
 * the given available width.
 *
 * @param {WPBlock[]} blocks          Block objects.
 * @param {number}    availableWidth  Maximum width to fit within.
 * @param {?number}   totalBlockCount Total number of blocks in Columns.
 *                                    Defaults to number of blocks passed.
 *
 * @return {Object<string,number>} Redistributed column widths.
 */

function getRedistributedColumnWidths(blocks, availableWidth) {
  let totalBlockCount = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : blocks.length;
  const totalWidth = getTotalColumnsWidth(blocks, totalBlockCount);
  return (0,lodash__WEBPACK_IMPORTED_MODULE_0__.mapValues)(getColumnWidths(blocks, totalBlockCount), width => {
    const newWidth = availableWidth * width / totalWidth;
    return toWidthPrecision(newWidth);
  });
}
/**
 * Returns true if column blocks within the provided set are assigned with
 * explicit widths, or false otherwise.
 *
 * @param {WPBlock[]} blocks Block objects.
 *
 * @return {boolean} Whether columns have explicit widths.
 */

function hasExplicitPercentColumnWidths(blocks) {
  return blocks.every(block => {
    var _blockWidth$endsWith;

    const blockWidth = block.attributes.width;
    return Number.isFinite(blockWidth !== null && blockWidth !== void 0 && (_blockWidth$endsWith = blockWidth.endsWith) !== null && _blockWidth$endsWith !== void 0 && _blockWidth$endsWith.call(blockWidth, '%') ? parseFloat(blockWidth) : blockWidth);
  });
}
/**
 * Returns a copy of the given set of blocks with new widths assigned from the
 * provided object of redistributed column widths.
 *
 * @param {WPBlock[]}             blocks Block objects.
 * @param {Object<string,number>} widths Redistributed column widths.
 *
 * @return {WPBlock[]} blocks Mapped block objects.
 */

function getMappedColumnWidths(blocks, widths) {
  return blocks.map(block => (0,lodash__WEBPACK_IMPORTED_MODULE_0__.merge)({}, block, {
    attributes: {
      width: `${widths[block.clientId]}%`
    }
  }));
}
/**
 * Returns an array with columns widths values, parsed or no depends on `withParsing` flag.
 *
 * @param {WPBlock[]} blocks      Block objects.
 * @param {?boolean}  withParsing Whether value has to be parsed.
 *
 * @return {Array<number,string>} Column widths.
 */

function getWidths(blocks) {
  let withParsing = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  return blocks.map(innerColumn => {
    const innerColumnWidth = innerColumn.attributes.width || 100 / blocks.length;
    return withParsing ? parseFloat(innerColumnWidth) : innerColumnWidth;
  });
}
/**
 * Returns a column width with unit.
 *
 * @param {string} width Column width.
 * @param {string} unit  Column width unit.
 *
 * @return {string} Column width with unit.
 */

function getWidthWithUnit(width, unit) {
  width = 0 > parseFloat(width) ? '0' : width;

  if (isPercentageUnit(unit)) {
    width = Math.min(width, 100);
  }

  return `${width}${unit}`;
}
/**
 * Returns a boolean whether passed unit is percentage
 *
 * @param {string} unit Column width unit.
 *
 * @return {boolean} 	Whether unit is '%'.
 */

function isPercentageUnit(unit) {
  return unit === '%';
}

/***/ }),

/***/ "./src/blocks/lib/variations.js":
/*!**************************************!*\
  !*** ./src/blocks/lib/variations.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


/** @typedef {import('@wordpress/blocks').WPBlockVariation} WPBlockVariation */

/**
 * Template option choices for predefined columns layouts.
 *
 * @type {WPBlockVariation[]}
 */

const variations = [{
  name: 'one-column-full',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('100', 'spice-blocks'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('One column', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "m39.0625 14h-30.0625v20.0938h30.0625zm-30.0625-2c-1.10457 0-2 .8954-2 2v20.0938c0 1.1045.89543 2 2 2h30.0625c1.1046 0 2-.8955 2-2v-20.0938c0-1.1046-.8954-2-2-2z"
  })),
  innerBlocks: [['spice-blocks/spice-column']],
  scope: ['block']
}, {
  name: 'two-columns-equal',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('50 / 50', 'spice-blocks'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Two columns; equal split', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M39 12C40.1046 12 41 12.8954 41 14V34C41 35.1046 40.1046 36 39 36H9C7.89543 36 7 35.1046 7 34V14C7 12.8954 7.89543 12 9 12H39ZM39 34V14H25V34H39ZM23 34H9V14H23V34Z"
  })),
  isDefault: true,
  innerBlocks: [['spice-blocks/spice-column'], ['spice-blocks/spice-column']],
  scope: ['block']
}, {
  name: 'two-columns-one-third-two-thirds',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('33 / 66', 'spice-blocks'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Two columns; one-third, two-thirds split', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M39 12C40.1046 12 41 12.8954 41 14V34C41 35.1046 40.1046 36 39 36H9C7.89543 36 7 35.1046 7 34V14C7 12.8954 7.89543 12 9 12H39ZM39 34V14H20V34H39ZM18 34H9V14H18V34Z"
  })),
  innerBlocks: [['spice-blocks/spice-column', {
    width: '33.33%'
  }], ['spice-blocks/spice-column', {
    width: '66.66%'
  }]],
  scope: ['block']
}, {
  name: 'two-columns-two-thirds-one-third',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('66 / 33', 'spice-blocks'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Two columns; two-thirds, one-third split', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M39 12C40.1046 12 41 12.8954 41 14V34C41 35.1046 40.1046 36 39 36H9C7.89543 36 7 35.1046 7 34V14C7 12.8954 7.89543 12 9 12H39ZM39 34V14H30V34H39ZM28 34H9V14H28V34Z"
  })),
  innerBlocks: [['spice-blocks/spice-column', {
    width: '66.66%'
  }], ['spice-blocks/spice-column', {
    width: '33.33%'
  }]],
  scope: ['block']
}, {
  name: 'three-columns-equal',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('33 / 33 / 33', 'spice-blocks'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Three columns; equal split', 'spice-blocks'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    d: "M41 14a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h30a2 2 0 0 0 2-2V14zM28.5 34h-9V14h9v20zm2 0V14H39v20h-8.5zm-13 0H9V14h8.5v20z"
  })),
  innerBlocks: [['spice-blocks/spice-column'], ['spice-blocks/spice-column'], ['spice-blocks/spice-column']],
  scope: ['block']
}, {
  name: 'three-columns-wider-center',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('25 / 50 / 25'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Three columns; wide center column'),
  icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
    fillRule: "evenodd",
    d: "M41 14a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h30a2 2 0 0 0 2-2V14zM31 34H17V14h14v20zm2 0V14h6v20h-6zm-18 0H9V14h6v20z"
  })),
  innerBlocks: [['spice-blocks/spice-column', {
    width: '25%'
  }], ['spice-blocks/spice-column', {
    width: '50%'
  }], ['spice-blocks/spice-column', {
    width: '25%'
  }]],
  scope: ['block']
}];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (variations);

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

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

/***/ "./node_modules/dom-helpers/esm/addClass.js":
/*!**************************************************!*\
  !*** ./node_modules/dom-helpers/esm/addClass.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ addClass)
/* harmony export */ });
/* harmony import */ var _hasClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./hasClass */ "./node_modules/dom-helpers/esm/hasClass.js");

/**
 * Adds a CSS class to a given element.
 * 
 * @param element the element
 * @param className the CSS class name
 */

function addClass(element, className) {
  if (element.classList) element.classList.add(className);else if (!(0,_hasClass__WEBPACK_IMPORTED_MODULE_0__["default"])(element, className)) if (typeof element.className === 'string') element.className = element.className + " " + className;else element.setAttribute('class', (element.className && element.className.baseVal || '') + " " + className);
}

/***/ }),

/***/ "./node_modules/dom-helpers/esm/hasClass.js":
/*!**************************************************!*\
  !*** ./node_modules/dom-helpers/esm/hasClass.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ hasClass)
/* harmony export */ });
/**
 * Checks if a given element has a CSS class.
 * 
 * @param element the element
 * @param className the CSS class name
 */
function hasClass(element, className) {
  if (element.classList) return !!className && element.classList.contains(className);
  return (" " + (element.className.baseVal || element.className) + " ").indexOf(" " + className + " ") !== -1;
}

/***/ }),

/***/ "./node_modules/dom-helpers/esm/removeClass.js":
/*!*****************************************************!*\
  !*** ./node_modules/dom-helpers/esm/removeClass.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ removeClass)
/* harmony export */ });
function replaceClassName(origClass, classToRemove) {
  return origClass.replace(new RegExp("(^|\\s)" + classToRemove + "(?:\\s|$)", 'g'), '$1').replace(/\s+/g, ' ').replace(/^\s*|\s*$/g, '');
}
/**
 * Removes a CSS class from a given element.
 * 
 * @param element the element
 * @param className the CSS class name
 */


function removeClass(element, className) {
  if (element.classList) {
    element.classList.remove(className);
  } else if (typeof element.className === 'string') {
    element.className = replaceClassName(element.className, className);
  } else {
    element.setAttribute('class', replaceClassName(element.className && element.className.baseVal || '', className));
  }
}

/***/ }),

/***/ "./node_modules/animate.css/animate.css":
/*!**********************************************!*\
  !*** ./node_modules/animate.css/animate.css ***!
  \**********************************************/
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

/***/ "./node_modules/react-transition-group/esm/CSSTransition.js":
/*!******************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/CSSTransition.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutPropertiesLoose */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");
/* harmony import */ var _babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inheritsLoose */ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var dom_helpers_addClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! dom-helpers/addClass */ "./node_modules/dom-helpers/esm/addClass.js");
/* harmony import */ var dom_helpers_removeClass__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! dom-helpers/removeClass */ "./node_modules/dom-helpers/esm/removeClass.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _Transition__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./Transition */ "./node_modules/react-transition-group/esm/Transition.js");
/* harmony import */ var _utils_PropTypes__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./utils/PropTypes */ "./node_modules/react-transition-group/esm/utils/PropTypes.js");
/* harmony import */ var _utils_reflow__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./utils/reflow */ "./node_modules/react-transition-group/esm/utils/reflow.js");











var _addClass = function addClass(node, classes) {
  return node && classes && classes.split(' ').forEach(function (c) {
    return (0,dom_helpers_addClass__WEBPACK_IMPORTED_MODULE_3__["default"])(node, c);
  });
};

var removeClass = function removeClass(node, classes) {
  return node && classes && classes.split(' ').forEach(function (c) {
    return (0,dom_helpers_removeClass__WEBPACK_IMPORTED_MODULE_4__["default"])(node, c);
  });
};
/**
 * A transition component inspired by the excellent
 * [ng-animate](https://docs.angularjs.org/api/ngAnimate) library, you should
 * use it if you're using CSS transitions or animations. It's built upon the
 * [`Transition`](https://reactcommunity.org/react-transition-group/transition)
 * component, so it inherits all of its props.
 *
 * `CSSTransition` applies a pair of class names during the `appear`, `enter`,
 * and `exit` states of the transition. The first class is applied and then a
 * second `*-active` class in order to activate the CSS transition. After the
 * transition, matching `*-done` class names are applied to persist the
 * transition state.
 *
 * ```jsx
 * function App() {
 *   const [inProp, setInProp] = useState(false);
 *   return (
 *     <div>
 *       <CSSTransition in={inProp} timeout={200} classNames="my-node">
 *         <div>
 *           {"I'll receive my-node-* classes"}
 *         </div>
 *       </CSSTransition>
 *       <button type="button" onClick={() => setInProp(true)}>
 *         Click to Enter
 *       </button>
 *     </div>
 *   );
 * }
 * ```
 *
 * When the `in` prop is set to `true`, the child component will first receive
 * the class `example-enter`, then the `example-enter-active` will be added in
 * the next tick. `CSSTransition` [forces a
 * reflow](https://github.com/reactjs/react-transition-group/blob/5007303e729a74be66a21c3e2205e4916821524b/src/CSSTransition.js#L208-L215)
 * between before adding the `example-enter-active`. This is an important trick
 * because it allows us to transition between `example-enter` and
 * `example-enter-active` even though they were added immediately one after
 * another. Most notably, this is what makes it possible for us to animate
 * _appearance_.
 *
 * ```css
 * .my-node-enter {
 *   opacity: 0;
 * }
 * .my-node-enter-active {
 *   opacity: 1;
 *   transition: opacity 200ms;
 * }
 * .my-node-exit {
 *   opacity: 1;
 * }
 * .my-node-exit-active {
 *   opacity: 0;
 *   transition: opacity 200ms;
 * }
 * ```
 *
 * `*-active` classes represent which styles you want to animate **to**, so it's
 * important to add `transition` declaration only to them, otherwise transitions
 * might not behave as intended! This might not be obvious when the transitions
 * are symmetrical, i.e. when `*-enter-active` is the same as `*-exit`, like in
 * the example above (minus `transition`), but it becomes apparent in more
 * complex transitions.
 *
 * **Note**: If you're using the
 * [`appear`](http://reactcommunity.org/react-transition-group/transition#Transition-prop-appear)
 * prop, make sure to define styles for `.appear-*` classes as well.
 */


var CSSTransition = /*#__PURE__*/function (_React$Component) {
  (0,_babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_2__["default"])(CSSTransition, _React$Component);

  function CSSTransition() {
    var _this;

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _React$Component.call.apply(_React$Component, [this].concat(args)) || this;
    _this.appliedClasses = {
      appear: {},
      enter: {},
      exit: {}
    };

    _this.onEnter = function (maybeNode, maybeAppearing) {
      var _this$resolveArgument = _this.resolveArguments(maybeNode, maybeAppearing),
          node = _this$resolveArgument[0],
          appearing = _this$resolveArgument[1];

      _this.removeClasses(node, 'exit');

      _this.addClass(node, appearing ? 'appear' : 'enter', 'base');

      if (_this.props.onEnter) {
        _this.props.onEnter(maybeNode, maybeAppearing);
      }
    };

    _this.onEntering = function (maybeNode, maybeAppearing) {
      var _this$resolveArgument2 = _this.resolveArguments(maybeNode, maybeAppearing),
          node = _this$resolveArgument2[0],
          appearing = _this$resolveArgument2[1];

      var type = appearing ? 'appear' : 'enter';

      _this.addClass(node, type, 'active');

      if (_this.props.onEntering) {
        _this.props.onEntering(maybeNode, maybeAppearing);
      }
    };

    _this.onEntered = function (maybeNode, maybeAppearing) {
      var _this$resolveArgument3 = _this.resolveArguments(maybeNode, maybeAppearing),
          node = _this$resolveArgument3[0],
          appearing = _this$resolveArgument3[1];

      var type = appearing ? 'appear' : 'enter';

      _this.removeClasses(node, type);

      _this.addClass(node, type, 'done');

      if (_this.props.onEntered) {
        _this.props.onEntered(maybeNode, maybeAppearing);
      }
    };

    _this.onExit = function (maybeNode) {
      var _this$resolveArgument4 = _this.resolveArguments(maybeNode),
          node = _this$resolveArgument4[0];

      _this.removeClasses(node, 'appear');

      _this.removeClasses(node, 'enter');

      _this.addClass(node, 'exit', 'base');

      if (_this.props.onExit) {
        _this.props.onExit(maybeNode);
      }
    };

    _this.onExiting = function (maybeNode) {
      var _this$resolveArgument5 = _this.resolveArguments(maybeNode),
          node = _this$resolveArgument5[0];

      _this.addClass(node, 'exit', 'active');

      if (_this.props.onExiting) {
        _this.props.onExiting(maybeNode);
      }
    };

    _this.onExited = function (maybeNode) {
      var _this$resolveArgument6 = _this.resolveArguments(maybeNode),
          node = _this$resolveArgument6[0];

      _this.removeClasses(node, 'exit');

      _this.addClass(node, 'exit', 'done');

      if (_this.props.onExited) {
        _this.props.onExited(maybeNode);
      }
    };

    _this.resolveArguments = function (maybeNode, maybeAppearing) {
      return _this.props.nodeRef ? [_this.props.nodeRef.current, maybeNode] // here `maybeNode` is actually `appearing`
      : [maybeNode, maybeAppearing];
    };

    _this.getClassNames = function (type) {
      var classNames = _this.props.classNames;
      var isStringClassNames = typeof classNames === 'string';
      var prefix = isStringClassNames && classNames ? classNames + "-" : '';
      var baseClassName = isStringClassNames ? "" + prefix + type : classNames[type];
      var activeClassName = isStringClassNames ? baseClassName + "-active" : classNames[type + "Active"];
      var doneClassName = isStringClassNames ? baseClassName + "-done" : classNames[type + "Done"];
      return {
        baseClassName: baseClassName,
        activeClassName: activeClassName,
        doneClassName: doneClassName
      };
    };

    return _this;
  }

  var _proto = CSSTransition.prototype;

  _proto.addClass = function addClass(node, type, phase) {
    var className = this.getClassNames(type)[phase + "ClassName"];

    var _this$getClassNames = this.getClassNames('enter'),
        doneClassName = _this$getClassNames.doneClassName;

    if (type === 'appear' && phase === 'done' && doneClassName) {
      className += " " + doneClassName;
    } // This is to force a repaint,
    // which is necessary in order to transition styles when adding a class name.


    if (phase === 'active') {
      if (node) (0,_utils_reflow__WEBPACK_IMPORTED_MODULE_6__.forceReflow)(node);
    }

    if (className) {
      this.appliedClasses[type][phase] = className;

      _addClass(node, className);
    }
  };

  _proto.removeClasses = function removeClasses(node, type) {
    var _this$appliedClasses$ = this.appliedClasses[type],
        baseClassName = _this$appliedClasses$.base,
        activeClassName = _this$appliedClasses$.active,
        doneClassName = _this$appliedClasses$.done;
    this.appliedClasses[type] = {};

    if (baseClassName) {
      removeClass(node, baseClassName);
    }

    if (activeClassName) {
      removeClass(node, activeClassName);
    }

    if (doneClassName) {
      removeClass(node, doneClassName);
    }
  };

  _proto.render = function render() {
    var _this$props = this.props,
        _ = _this$props.classNames,
        props = (0,_babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_1__["default"])(_this$props, ["classNames"]);

    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_5___default().createElement(_Transition__WEBPACK_IMPORTED_MODULE_7__["default"], (0,_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
      onEnter: this.onEnter,
      onEntered: this.onEntered,
      onEntering: this.onEntering,
      onExit: this.onExit,
      onExiting: this.onExiting,
      onExited: this.onExited
    }));
  };

  return CSSTransition;
}((react__WEBPACK_IMPORTED_MODULE_5___default().Component));

CSSTransition.defaultProps = {
  classNames: ''
};
CSSTransition.propTypes =  true ? (0,_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, _Transition__WEBPACK_IMPORTED_MODULE_7__["default"].propTypes, {
  /**
   * The animation classNames applied to the component as it appears, enters,
   * exits or has finished the transition. A single name can be provided, which
   * will be suffixed for each stage, e.g. `classNames="fade"` applies:
   *
   * - `fade-appear`, `fade-appear-active`, `fade-appear-done`
   * - `fade-enter`, `fade-enter-active`, `fade-enter-done`
   * - `fade-exit`, `fade-exit-active`, `fade-exit-done`
   *
   * A few details to note about how these classes are applied:
   *
   * 1. They are _joined_ with the ones that are already defined on the child
   *    component, so if you want to add some base styles, you can use
   *    `className` without worrying that it will be overridden.
   *
   * 2. If the transition component mounts with `in={false}`, no classes are
   *    applied yet. You might be expecting `*-exit-done`, but if you think
   *    about it, a component cannot finish exiting if it hasn't entered yet.
   *
   * 2. `fade-appear-done` and `fade-enter-done` will _both_ be applied. This
   *    allows you to define different behavior for when appearing is done and
   *    when regular entering is done, using selectors like
   *    `.fade-enter-done:not(.fade-appear-done)`. For example, you could apply
   *    an epic entrance animation when element first appears in the DOM using
   *    [Animate.css](https://daneden.github.io/animate.css/). Otherwise you can
   *    simply use `fade-enter-done` for defining both cases.
   *
   * Each individual classNames can also be specified independently like:
   *
   * ```js
   * classNames={{
   *  appear: 'my-appear',
   *  appearActive: 'my-active-appear',
   *  appearDone: 'my-done-appear',
   *  enter: 'my-enter',
   *  enterActive: 'my-active-enter',
   *  enterDone: 'my-done-enter',
   *  exit: 'my-exit',
   *  exitActive: 'my-active-exit',
   *  exitDone: 'my-done-exit',
   * }}
   * ```
   *
   * If you want to set these classes using CSS Modules:
   *
   * ```js
   * import styles from './styles.css';
   * ```
   *
   * you might want to use camelCase in your CSS file, that way could simply
   * spread them instead of listing them one by one:
   *
   * ```js
   * classNames={{ ...styles }}
   * ```
   *
   * @type {string | {
   *  appear?: string,
   *  appearActive?: string,
   *  appearDone?: string,
   *  enter?: string,
   *  enterActive?: string,
   *  enterDone?: string,
   *  exit?: string,
   *  exitActive?: string,
   *  exitDone?: string,
   * }}
   */
  classNames: _utils_PropTypes__WEBPACK_IMPORTED_MODULE_8__.classNamesShape,

  /**
   * A `<Transition>` callback fired immediately after the 'enter' or 'appear' class is
   * applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool)
   */
  onEnter: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func),

  /**
   * A `<Transition>` callback fired immediately after the 'enter-active' or
   * 'appear-active' class is applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool)
   */
  onEntering: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func),

  /**
   * A `<Transition>` callback fired immediately after the 'enter' or
   * 'appear' classes are **removed** and the `done` class is added to the DOM node.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool)
   */
  onEntered: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func),

  /**
   * A `<Transition>` callback fired immediately after the 'exit' class is
   * applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed
   *
   * @type Function(node: HtmlElement)
   */
  onExit: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func),

  /**
   * A `<Transition>` callback fired immediately after the 'exit-active' is applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed
   *
   * @type Function(node: HtmlElement)
   */
  onExiting: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func),

  /**
   * A `<Transition>` callback fired immediately after the 'exit' classes
   * are **removed** and the `exit-done` class is added to the DOM node.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed
   *
   * @type Function(node: HtmlElement)
   */
  onExited: (prop_types__WEBPACK_IMPORTED_MODULE_9___default().func)
}) : 0;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CSSTransition);

/***/ }),

/***/ "./node_modules/react-transition-group/esm/ReplaceTransition.js":
/*!**********************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/ReplaceTransition.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutPropertiesLoose */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");
/* harmony import */ var _babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inheritsLoose */ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _TransitionGroup__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./TransitionGroup */ "./node_modules/react-transition-group/esm/TransitionGroup.js");






/**
 * The `<ReplaceTransition>` component is a specialized `Transition` component
 * that animates between two children.
 *
 * ```jsx
 * <ReplaceTransition in>
 *   <Fade><div>I appear first</div></Fade>
 *   <Fade><div>I replace the above</div></Fade>
 * </ReplaceTransition>
 * ```
 */

var ReplaceTransition = /*#__PURE__*/function (_React$Component) {
  (0,_babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_1__["default"])(ReplaceTransition, _React$Component);

  function ReplaceTransition() {
    var _this;

    for (var _len = arguments.length, _args = new Array(_len), _key = 0; _key < _len; _key++) {
      _args[_key] = arguments[_key];
    }

    _this = _React$Component.call.apply(_React$Component, [this].concat(_args)) || this;

    _this.handleEnter = function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return _this.handleLifecycle('onEnter', 0, args);
    };

    _this.handleEntering = function () {
      for (var _len3 = arguments.length, args = new Array(_len3), _key3 = 0; _key3 < _len3; _key3++) {
        args[_key3] = arguments[_key3];
      }

      return _this.handleLifecycle('onEntering', 0, args);
    };

    _this.handleEntered = function () {
      for (var _len4 = arguments.length, args = new Array(_len4), _key4 = 0; _key4 < _len4; _key4++) {
        args[_key4] = arguments[_key4];
      }

      return _this.handleLifecycle('onEntered', 0, args);
    };

    _this.handleExit = function () {
      for (var _len5 = arguments.length, args = new Array(_len5), _key5 = 0; _key5 < _len5; _key5++) {
        args[_key5] = arguments[_key5];
      }

      return _this.handleLifecycle('onExit', 1, args);
    };

    _this.handleExiting = function () {
      for (var _len6 = arguments.length, args = new Array(_len6), _key6 = 0; _key6 < _len6; _key6++) {
        args[_key6] = arguments[_key6];
      }

      return _this.handleLifecycle('onExiting', 1, args);
    };

    _this.handleExited = function () {
      for (var _len7 = arguments.length, args = new Array(_len7), _key7 = 0; _key7 < _len7; _key7++) {
        args[_key7] = arguments[_key7];
      }

      return _this.handleLifecycle('onExited', 1, args);
    };

    return _this;
  }

  var _proto = ReplaceTransition.prototype;

  _proto.handleLifecycle = function handleLifecycle(handler, idx, originalArgs) {
    var _child$props;

    var children = this.props.children;
    var child = react__WEBPACK_IMPORTED_MODULE_2___default().Children.toArray(children)[idx];
    if (child.props[handler]) (_child$props = child.props)[handler].apply(_child$props, originalArgs);

    if (this.props[handler]) {
      var maybeNode = child.props.nodeRef ? undefined : react_dom__WEBPACK_IMPORTED_MODULE_3___default().findDOMNode(this);
      this.props[handler](maybeNode);
    }
  };

  _proto.render = function render() {
    var _this$props = this.props,
        children = _this$props.children,
        inProp = _this$props.in,
        props = (0,_babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__["default"])(_this$props, ["children", "in"]);

    var _React$Children$toArr = react__WEBPACK_IMPORTED_MODULE_2___default().Children.toArray(children),
        first = _React$Children$toArr[0],
        second = _React$Children$toArr[1];

    delete props.onEnter;
    delete props.onEntering;
    delete props.onEntered;
    delete props.onExit;
    delete props.onExiting;
    delete props.onExited;
    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_2___default().createElement(_TransitionGroup__WEBPACK_IMPORTED_MODULE_4__["default"], props, inProp ? react__WEBPACK_IMPORTED_MODULE_2___default().cloneElement(first, {
      key: 'first',
      onEnter: this.handleEnter,
      onEntering: this.handleEntering,
      onEntered: this.handleEntered
    }) : react__WEBPACK_IMPORTED_MODULE_2___default().cloneElement(second, {
      key: 'second',
      onEnter: this.handleExit,
      onEntering: this.handleExiting,
      onEntered: this.handleExited
    }));
  };

  return ReplaceTransition;
}((react__WEBPACK_IMPORTED_MODULE_2___default().Component));

ReplaceTransition.propTypes =  true ? {
  in: (prop_types__WEBPACK_IMPORTED_MODULE_5___default().bool.isRequired),
  children: function children(props, propName) {
    if (react__WEBPACK_IMPORTED_MODULE_2___default().Children.count(props[propName]) !== 2) return new Error("\"" + propName + "\" must be exactly two transition components.");
    return null;
  }
} : 0;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ReplaceTransition);

/***/ }),

/***/ "./node_modules/react-transition-group/esm/SwitchTransition.js":
/*!*********************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/SwitchTransition.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "modes": () => (/* binding */ modes)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inheritsLoose */ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _Transition__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Transition */ "./node_modules/react-transition-group/esm/Transition.js");
/* harmony import */ var _TransitionGroupContext__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./TransitionGroupContext */ "./node_modules/react-transition-group/esm/TransitionGroupContext.js");


var _leaveRenders, _enterRenders;






function areChildrenDifferent(oldChildren, newChildren) {
  if (oldChildren === newChildren) return false;

  if (react__WEBPACK_IMPORTED_MODULE_1___default().isValidElement(oldChildren) && react__WEBPACK_IMPORTED_MODULE_1___default().isValidElement(newChildren) && oldChildren.key != null && oldChildren.key === newChildren.key) {
    return false;
  }

  return true;
}
/**
 * Enum of modes for SwitchTransition component
 * @enum { string }
 */


var modes = {
  out: 'out-in',
  in: 'in-out'
};

var callHook = function callHook(element, name, cb) {
  return function () {
    var _element$props;

    element.props[name] && (_element$props = element.props)[name].apply(_element$props, arguments);
    cb();
  };
};

var leaveRenders = (_leaveRenders = {}, _leaveRenders[modes.out] = function (_ref) {
  var current = _ref.current,
      changeState = _ref.changeState;
  return react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(current, {
    in: false,
    onExited: callHook(current, 'onExited', function () {
      changeState(_Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERING, null);
    })
  });
}, _leaveRenders[modes.in] = function (_ref2) {
  var current = _ref2.current,
      changeState = _ref2.changeState,
      children = _ref2.children;
  return [current, react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(children, {
    in: true,
    onEntered: callHook(children, 'onEntered', function () {
      changeState(_Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERING);
    })
  })];
}, _leaveRenders);
var enterRenders = (_enterRenders = {}, _enterRenders[modes.out] = function (_ref3) {
  var children = _ref3.children,
      changeState = _ref3.changeState;
  return react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(children, {
    in: true,
    onEntered: callHook(children, 'onEntered', function () {
      changeState(_Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERED, react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(children, {
        in: true
      }));
    })
  });
}, _enterRenders[modes.in] = function (_ref4) {
  var current = _ref4.current,
      children = _ref4.children,
      changeState = _ref4.changeState;
  return [react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(current, {
    in: false,
    onExited: callHook(current, 'onExited', function () {
      changeState(_Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERED, react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(children, {
        in: true
      }));
    })
  }), react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(children, {
    in: true
  })];
}, _enterRenders);
/**
 * A transition component inspired by the [vue transition modes](https://vuejs.org/v2/guide/transitions.html#Transition-Modes).
 * You can use it when you want to control the render between state transitions.
 * Based on the selected mode and the child's key which is the `Transition` or `CSSTransition` component, the `SwitchTransition` makes a consistent transition between them.
 *
 * If the `out-in` mode is selected, the `SwitchTransition` waits until the old child leaves and then inserts a new child.
 * If the `in-out` mode is selected, the `SwitchTransition` inserts a new child first, waits for the new child to enter and then removes the old child.
 *
 * **Note**: If you want the animation to happen simultaneously
 * (that is, to have the old child removed and a new child inserted **at the same time**),
 * you should use
 * [`TransitionGroup`](https://reactcommunity.org/react-transition-group/transition-group)
 * instead.
 *
 * ```jsx
 * function App() {
 *  const [state, setState] = useState(false);
 *  return (
 *    <SwitchTransition>
 *      <CSSTransition
 *        key={state ? "Goodbye, world!" : "Hello, world!"}
 *        addEndListener={(node, done) => node.addEventListener("transitionend", done, false)}
 *        classNames='fade'
 *      >
 *        <button onClick={() => setState(state => !state)}>
 *          {state ? "Goodbye, world!" : "Hello, world!"}
 *        </button>
 *      </CSSTransition>
 *    </SwitchTransition>
 *  );
 * }
 * ```
 *
 * ```css
 * .fade-enter{
 *    opacity: 0;
 * }
 * .fade-exit{
 *    opacity: 1;
 * }
 * .fade-enter-active{
 *    opacity: 1;
 * }
 * .fade-exit-active{
 *    opacity: 0;
 * }
 * .fade-enter-active,
 * .fade-exit-active{
 *    transition: opacity 500ms;
 * }
 * ```
 */

var SwitchTransition = /*#__PURE__*/function (_React$Component) {
  (0,_babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_0__["default"])(SwitchTransition, _React$Component);

  function SwitchTransition() {
    var _this;

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _React$Component.call.apply(_React$Component, [this].concat(args)) || this;
    _this.state = {
      status: _Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERED,
      current: null
    };
    _this.appeared = false;

    _this.changeState = function (status, current) {
      if (current === void 0) {
        current = _this.state.current;
      }

      _this.setState({
        status: status,
        current: current
      });
    };

    return _this;
  }

  var _proto = SwitchTransition.prototype;

  _proto.componentDidMount = function componentDidMount() {
    this.appeared = true;
  };

  SwitchTransition.getDerivedStateFromProps = function getDerivedStateFromProps(props, state) {
    if (props.children == null) {
      return {
        current: null
      };
    }

    if (state.status === _Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERING && props.mode === modes.in) {
      return {
        status: _Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERING
      };
    }

    if (state.current && areChildrenDifferent(state.current, props.children)) {
      return {
        status: _Transition__WEBPACK_IMPORTED_MODULE_2__.EXITING
      };
    }

    return {
      current: react__WEBPACK_IMPORTED_MODULE_1___default().cloneElement(props.children, {
        in: true
      })
    };
  };

  _proto.render = function render() {
    var _this$props = this.props,
        children = _this$props.children,
        mode = _this$props.mode,
        _this$state = this.state,
        status = _this$state.status,
        current = _this$state.current;
    var data = {
      children: children,
      current: current,
      changeState: this.changeState,
      status: status
    };
    var component;

    switch (status) {
      case _Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERING:
        component = enterRenders[mode](data);
        break;

      case _Transition__WEBPACK_IMPORTED_MODULE_2__.EXITING:
        component = leaveRenders[mode](data);
        break;

      case _Transition__WEBPACK_IMPORTED_MODULE_2__.ENTERED:
        component = current;
    }

    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1___default().createElement(_TransitionGroupContext__WEBPACK_IMPORTED_MODULE_3__["default"].Provider, {
      value: {
        isMounting: !this.appeared
      }
    }, component);
  };

  return SwitchTransition;
}((react__WEBPACK_IMPORTED_MODULE_1___default().Component));

SwitchTransition.propTypes =  true ? {
  /**
   * Transition modes.
   * `out-in`: Current element transitions out first, then when complete, the new element transitions in.
   * `in-out`: New element transitions in first, then when complete, the current element transitions out.
   *
   * @type {'out-in'|'in-out'}
   */
  mode: prop_types__WEBPACK_IMPORTED_MODULE_4___default().oneOf([modes.in, modes.out]),

  /**
   * Any `Transition` or `CSSTransition` component.
   */
  children: prop_types__WEBPACK_IMPORTED_MODULE_4___default().oneOfType([(prop_types__WEBPACK_IMPORTED_MODULE_4___default().element.isRequired)])
} : 0;
SwitchTransition.defaultProps = {
  mode: modes.out
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SwitchTransition);

/***/ }),

/***/ "./node_modules/react-transition-group/esm/Transition.js":
/*!***************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/Transition.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ENTERED": () => (/* binding */ ENTERED),
/* harmony export */   "ENTERING": () => (/* binding */ ENTERING),
/* harmony export */   "EXITED": () => (/* binding */ EXITED),
/* harmony export */   "EXITING": () => (/* binding */ EXITING),
/* harmony export */   "UNMOUNTED": () => (/* binding */ UNMOUNTED),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutPropertiesLoose */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");
/* harmony import */ var _babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inheritsLoose */ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./config */ "./node_modules/react-transition-group/esm/config.js");
/* harmony import */ var _utils_PropTypes__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./utils/PropTypes */ "./node_modules/react-transition-group/esm/utils/PropTypes.js");
/* harmony import */ var _TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./TransitionGroupContext */ "./node_modules/react-transition-group/esm/TransitionGroupContext.js");
/* harmony import */ var _utils_reflow__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utils/reflow */ "./node_modules/react-transition-group/esm/utils/reflow.js");









var UNMOUNTED = 'unmounted';
var EXITED = 'exited';
var ENTERING = 'entering';
var ENTERED = 'entered';
var EXITING = 'exiting';
/**
 * The Transition component lets you describe a transition from one component
 * state to another _over time_ with a simple declarative API. Most commonly
 * it's used to animate the mounting and unmounting of a component, but can also
 * be used to describe in-place transition states as well.
 *
 * ---
 *
 * **Note**: `Transition` is a platform-agnostic base component. If you're using
 * transitions in CSS, you'll probably want to use
 * [`CSSTransition`](https://reactcommunity.org/react-transition-group/css-transition)
 * instead. It inherits all the features of `Transition`, but contains
 * additional features necessary to play nice with CSS transitions (hence the
 * name of the component).
 *
 * ---
 *
 * By default the `Transition` component does not alter the behavior of the
 * component it renders, it only tracks "enter" and "exit" states for the
 * components. It's up to you to give meaning and effect to those states. For
 * example we can add styles to a component when it enters or exits:
 *
 * ```jsx
 * import { Transition } from 'react-transition-group';
 *
 * const duration = 300;
 *
 * const defaultStyle = {
 *   transition: `opacity ${duration}ms ease-in-out`,
 *   opacity: 0,
 * }
 *
 * const transitionStyles = {
 *   entering: { opacity: 1 },
 *   entered:  { opacity: 1 },
 *   exiting:  { opacity: 0 },
 *   exited:  { opacity: 0 },
 * };
 *
 * const Fade = ({ in: inProp }) => (
 *   <Transition in={inProp} timeout={duration}>
 *     {state => (
 *       <div style={{
 *         ...defaultStyle,
 *         ...transitionStyles[state]
 *       }}>
 *         I'm a fade Transition!
 *       </div>
 *     )}
 *   </Transition>
 * );
 * ```
 *
 * There are 4 main states a Transition can be in:
 *  - `'entering'`
 *  - `'entered'`
 *  - `'exiting'`
 *  - `'exited'`
 *
 * Transition state is toggled via the `in` prop. When `true` the component
 * begins the "Enter" stage. During this stage, the component will shift from
 * its current transition state, to `'entering'` for the duration of the
 * transition and then to the `'entered'` stage once it's complete. Let's take
 * the following example (we'll use the
 * [useState](https://reactjs.org/docs/hooks-reference.html#usestate) hook):
 *
 * ```jsx
 * function App() {
 *   const [inProp, setInProp] = useState(false);
 *   return (
 *     <div>
 *       <Transition in={inProp} timeout={500}>
 *         {state => (
 *           // ...
 *         )}
 *       </Transition>
 *       <button onClick={() => setInProp(true)}>
 *         Click to Enter
 *       </button>
 *     </div>
 *   );
 * }
 * ```
 *
 * When the button is clicked the component will shift to the `'entering'` state
 * and stay there for 500ms (the value of `timeout`) before it finally switches
 * to `'entered'`.
 *
 * When `in` is `false` the same thing happens except the state moves from
 * `'exiting'` to `'exited'`.
 */

var Transition = /*#__PURE__*/function (_React$Component) {
  (0,_babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_1__["default"])(Transition, _React$Component);

  function Transition(props, context) {
    var _this;

    _this = _React$Component.call(this, props, context) || this;
    var parentGroup = context; // In the context of a TransitionGroup all enters are really appears

    var appear = parentGroup && !parentGroup.isMounting ? props.enter : props.appear;
    var initialStatus;
    _this.appearStatus = null;

    if (props.in) {
      if (appear) {
        initialStatus = EXITED;
        _this.appearStatus = ENTERING;
      } else {
        initialStatus = ENTERED;
      }
    } else {
      if (props.unmountOnExit || props.mountOnEnter) {
        initialStatus = UNMOUNTED;
      } else {
        initialStatus = EXITED;
      }
    }

    _this.state = {
      status: initialStatus
    };
    _this.nextCallback = null;
    return _this;
  }

  Transition.getDerivedStateFromProps = function getDerivedStateFromProps(_ref, prevState) {
    var nextIn = _ref.in;

    if (nextIn && prevState.status === UNMOUNTED) {
      return {
        status: EXITED
      };
    }

    return null;
  } // getSnapshotBeforeUpdate(prevProps) {
  //   let nextStatus = null
  //   if (prevProps !== this.props) {
  //     const { status } = this.state
  //     if (this.props.in) {
  //       if (status !== ENTERING && status !== ENTERED) {
  //         nextStatus = ENTERING
  //       }
  //     } else {
  //       if (status === ENTERING || status === ENTERED) {
  //         nextStatus = EXITING
  //       }
  //     }
  //   }
  //   return { nextStatus }
  // }
  ;

  var _proto = Transition.prototype;

  _proto.componentDidMount = function componentDidMount() {
    this.updateStatus(true, this.appearStatus);
  };

  _proto.componentDidUpdate = function componentDidUpdate(prevProps) {
    var nextStatus = null;

    if (prevProps !== this.props) {
      var status = this.state.status;

      if (this.props.in) {
        if (status !== ENTERING && status !== ENTERED) {
          nextStatus = ENTERING;
        }
      } else {
        if (status === ENTERING || status === ENTERED) {
          nextStatus = EXITING;
        }
      }
    }

    this.updateStatus(false, nextStatus);
  };

  _proto.componentWillUnmount = function componentWillUnmount() {
    this.cancelNextCallback();
  };

  _proto.getTimeouts = function getTimeouts() {
    var timeout = this.props.timeout;
    var exit, enter, appear;
    exit = enter = appear = timeout;

    if (timeout != null && typeof timeout !== 'number') {
      exit = timeout.exit;
      enter = timeout.enter; // TODO: remove fallback for next major

      appear = timeout.appear !== undefined ? timeout.appear : enter;
    }

    return {
      exit: exit,
      enter: enter,
      appear: appear
    };
  };

  _proto.updateStatus = function updateStatus(mounting, nextStatus) {
    if (mounting === void 0) {
      mounting = false;
    }

    if (nextStatus !== null) {
      // nextStatus will always be ENTERING or EXITING.
      this.cancelNextCallback();

      if (nextStatus === ENTERING) {
        if (this.props.unmountOnExit || this.props.mountOnEnter) {
          var node = this.props.nodeRef ? this.props.nodeRef.current : react_dom__WEBPACK_IMPORTED_MODULE_3___default().findDOMNode(this); // https://github.com/reactjs/react-transition-group/pull/749
          // With unmountOnExit or mountOnEnter, the enter animation should happen at the transition between `exited` and `entering`.
          // To make the animation happen,  we have to separate each rendering and avoid being processed as batched.

          if (node) (0,_utils_reflow__WEBPACK_IMPORTED_MODULE_4__.forceReflow)(node);
        }

        this.performEnter(mounting);
      } else {
        this.performExit();
      }
    } else if (this.props.unmountOnExit && this.state.status === EXITED) {
      this.setState({
        status: UNMOUNTED
      });
    }
  };

  _proto.performEnter = function performEnter(mounting) {
    var _this2 = this;

    var enter = this.props.enter;
    var appearing = this.context ? this.context.isMounting : mounting;

    var _ref2 = this.props.nodeRef ? [appearing] : [react_dom__WEBPACK_IMPORTED_MODULE_3___default().findDOMNode(this), appearing],
        maybeNode = _ref2[0],
        maybeAppearing = _ref2[1];

    var timeouts = this.getTimeouts();
    var enterTimeout = appearing ? timeouts.appear : timeouts.enter; // no enter animation skip right to ENTERED
    // if we are mounting and running this it means appear _must_ be set

    if (!mounting && !enter || _config__WEBPACK_IMPORTED_MODULE_5__["default"].disabled) {
      this.safeSetState({
        status: ENTERED
      }, function () {
        _this2.props.onEntered(maybeNode);
      });
      return;
    }

    this.props.onEnter(maybeNode, maybeAppearing);
    this.safeSetState({
      status: ENTERING
    }, function () {
      _this2.props.onEntering(maybeNode, maybeAppearing);

      _this2.onTransitionEnd(enterTimeout, function () {
        _this2.safeSetState({
          status: ENTERED
        }, function () {
          _this2.props.onEntered(maybeNode, maybeAppearing);
        });
      });
    });
  };

  _proto.performExit = function performExit() {
    var _this3 = this;

    var exit = this.props.exit;
    var timeouts = this.getTimeouts();
    var maybeNode = this.props.nodeRef ? undefined : react_dom__WEBPACK_IMPORTED_MODULE_3___default().findDOMNode(this); // no exit animation skip right to EXITED

    if (!exit || _config__WEBPACK_IMPORTED_MODULE_5__["default"].disabled) {
      this.safeSetState({
        status: EXITED
      }, function () {
        _this3.props.onExited(maybeNode);
      });
      return;
    }

    this.props.onExit(maybeNode);
    this.safeSetState({
      status: EXITING
    }, function () {
      _this3.props.onExiting(maybeNode);

      _this3.onTransitionEnd(timeouts.exit, function () {
        _this3.safeSetState({
          status: EXITED
        }, function () {
          _this3.props.onExited(maybeNode);
        });
      });
    });
  };

  _proto.cancelNextCallback = function cancelNextCallback() {
    if (this.nextCallback !== null) {
      this.nextCallback.cancel();
      this.nextCallback = null;
    }
  };

  _proto.safeSetState = function safeSetState(nextState, callback) {
    // This shouldn't be necessary, but there are weird race conditions with
    // setState callbacks and unmounting in testing, so always make sure that
    // we can cancel any pending setState callbacks after we unmount.
    callback = this.setNextCallback(callback);
    this.setState(nextState, callback);
  };

  _proto.setNextCallback = function setNextCallback(callback) {
    var _this4 = this;

    var active = true;

    this.nextCallback = function (event) {
      if (active) {
        active = false;
        _this4.nextCallback = null;
        callback(event);
      }
    };

    this.nextCallback.cancel = function () {
      active = false;
    };

    return this.nextCallback;
  };

  _proto.onTransitionEnd = function onTransitionEnd(timeout, handler) {
    this.setNextCallback(handler);
    var node = this.props.nodeRef ? this.props.nodeRef.current : react_dom__WEBPACK_IMPORTED_MODULE_3___default().findDOMNode(this);
    var doesNotHaveTimeoutOrListener = timeout == null && !this.props.addEndListener;

    if (!node || doesNotHaveTimeoutOrListener) {
      setTimeout(this.nextCallback, 0);
      return;
    }

    if (this.props.addEndListener) {
      var _ref3 = this.props.nodeRef ? [this.nextCallback] : [node, this.nextCallback],
          maybeNode = _ref3[0],
          maybeNextCallback = _ref3[1];

      this.props.addEndListener(maybeNode, maybeNextCallback);
    }

    if (timeout != null) {
      setTimeout(this.nextCallback, timeout);
    }
  };

  _proto.render = function render() {
    var status = this.state.status;

    if (status === UNMOUNTED) {
      return null;
    }

    var _this$props = this.props,
        children = _this$props.children,
        _in = _this$props.in,
        _mountOnEnter = _this$props.mountOnEnter,
        _unmountOnExit = _this$props.unmountOnExit,
        _appear = _this$props.appear,
        _enter = _this$props.enter,
        _exit = _this$props.exit,
        _timeout = _this$props.timeout,
        _addEndListener = _this$props.addEndListener,
        _onEnter = _this$props.onEnter,
        _onEntering = _this$props.onEntering,
        _onEntered = _this$props.onEntered,
        _onExit = _this$props.onExit,
        _onExiting = _this$props.onExiting,
        _onExited = _this$props.onExited,
        _nodeRef = _this$props.nodeRef,
        childProps = (0,_babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__["default"])(_this$props, ["children", "in", "mountOnEnter", "unmountOnExit", "appear", "enter", "exit", "timeout", "addEndListener", "onEnter", "onEntering", "onEntered", "onExit", "onExiting", "onExited", "nodeRef"]);

    return (
      /*#__PURE__*/
      // allows for nested Transitions
      react__WEBPACK_IMPORTED_MODULE_2___default().createElement(_TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__["default"].Provider, {
        value: null
      }, typeof children === 'function' ? children(status, childProps) : react__WEBPACK_IMPORTED_MODULE_2___default().cloneElement(react__WEBPACK_IMPORTED_MODULE_2___default().Children.only(children), childProps))
    );
  };

  return Transition;
}((react__WEBPACK_IMPORTED_MODULE_2___default().Component));

Transition.contextType = _TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__["default"];
Transition.propTypes =  true ? {
  /**
   * A React reference to DOM element that need to transition:
   * https://stackoverflow.com/a/51127130/4671932
   *
   *   - When `nodeRef` prop is used, `node` is not passed to callback functions
   *      (e.g. `onEnter`) because user already has direct access to the node.
   *   - When changing `key` prop of `Transition` in a `TransitionGroup` a new
   *     `nodeRef` need to be provided to `Transition` with changed `key` prop
   *     (see
   *     [test/CSSTransition-test.js](https://github.com/reactjs/react-transition-group/blob/13435f897b3ab71f6e19d724f145596f5910581c/test/CSSTransition-test.js#L362-L437)).
   */
  nodeRef: prop_types__WEBPACK_IMPORTED_MODULE_7___default().shape({
    current: typeof Element === 'undefined' ? (prop_types__WEBPACK_IMPORTED_MODULE_7___default().any) : function (propValue, key, componentName, location, propFullName, secret) {
      var value = propValue[key];
      return prop_types__WEBPACK_IMPORTED_MODULE_7___default().instanceOf(value && 'ownerDocument' in value ? value.ownerDocument.defaultView.Element : Element)(propValue, key, componentName, location, propFullName, secret);
    }
  }),

  /**
   * A `function` child can be used instead of a React element. This function is
   * called with the current transition status (`'entering'`, `'entered'`,
   * `'exiting'`, `'exited'`), which can be used to apply context
   * specific props to a component.
   *
   * ```jsx
   * <Transition in={this.state.in} timeout={150}>
   *   {state => (
   *     <MyComponent className={`fade fade-${state}`} />
   *   )}
   * </Transition>
   * ```
   */
  children: prop_types__WEBPACK_IMPORTED_MODULE_7___default().oneOfType([(prop_types__WEBPACK_IMPORTED_MODULE_7___default().func.isRequired), (prop_types__WEBPACK_IMPORTED_MODULE_7___default().element.isRequired)]).isRequired,

  /**
   * Show the component; triggers the enter or exit states
   */
  in: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * By default the child component is mounted immediately along with
   * the parent `Transition` component. If you want to "lazy mount" the component on the
   * first `in={true}` you can set `mountOnEnter`. After the first enter transition the component will stay
   * mounted, even on "exited", unless you also specify `unmountOnExit`.
   */
  mountOnEnter: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * By default the child component stays mounted after it reaches the `'exited'` state.
   * Set `unmountOnExit` if you'd prefer to unmount the component after it finishes exiting.
   */
  unmountOnExit: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * By default the child component does not perform the enter transition when
   * it first mounts, regardless of the value of `in`. If you want this
   * behavior, set both `appear` and `in` to `true`.
   *
   * > **Note**: there are no special appear states like `appearing`/`appeared`, this prop
   * > only adds an additional enter transition. However, in the
   * > `<CSSTransition>` component that first enter transition does result in
   * > additional `.appear-*` classes, that way you can choose to style it
   * > differently.
   */
  appear: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * Enable or disable enter transitions.
   */
  enter: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * Enable or disable exit transitions.
   */
  exit: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * The duration of the transition, in milliseconds.
   * Required unless `addEndListener` is provided.
   *
   * You may specify a single timeout for all transitions:
   *
   * ```jsx
   * timeout={500}
   * ```
   *
   * or individually:
   *
   * ```jsx
   * timeout={{
   *  appear: 500,
   *  enter: 300,
   *  exit: 500,
   * }}
   * ```
   *
   * - `appear` defaults to the value of `enter`
   * - `enter` defaults to `0`
   * - `exit` defaults to `0`
   *
   * @type {number | { enter?: number, exit?: number, appear?: number }}
   */
  timeout: function timeout(props) {
    var pt = _utils_PropTypes__WEBPACK_IMPORTED_MODULE_8__.timeoutsShape;
    if (!props.addEndListener) pt = pt.isRequired;

    for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      args[_key - 1] = arguments[_key];
    }

    return pt.apply(void 0, [props].concat(args));
  },

  /**
   * Add a custom transition end trigger. Called with the transitioning
   * DOM node and a `done` callback. Allows for more fine grained transition end
   * logic. Timeouts are still used as a fallback if provided.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * ```jsx
   * addEndListener={(node, done) => {
   *   // use the css transitionend event to mark the finish of a transition
   *   node.addEventListener('transitionend', done, false);
   * }}
   * ```
   */
  addEndListener: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired before the "entering" status is applied. An extra parameter
   * `isAppearing` is supplied to indicate if the enter stage is occurring on the initial mount
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool) -> void
   */
  onEnter: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired after the "entering" status is applied. An extra parameter
   * `isAppearing` is supplied to indicate if the enter stage is occurring on the initial mount
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool)
   */
  onEntering: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired after the "entered" status is applied. An extra parameter
   * `isAppearing` is supplied to indicate if the enter stage is occurring on the initial mount
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement, isAppearing: bool) -> void
   */
  onEntered: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired before the "exiting" status is applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement) -> void
   */
  onExit: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired after the "exiting" status is applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed.
   *
   * @type Function(node: HtmlElement) -> void
   */
  onExiting: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func),

  /**
   * Callback fired after the "exited" status is applied.
   *
   * **Note**: when `nodeRef` prop is passed, `node` is not passed
   *
   * @type Function(node: HtmlElement) -> void
   */
  onExited: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func)
} : 0; // Name the function so it is clearer in the documentation

function noop() {}

Transition.defaultProps = {
  in: false,
  mountOnEnter: false,
  unmountOnExit: false,
  appear: false,
  enter: true,
  exit: true,
  onEnter: noop,
  onEntering: noop,
  onEntered: noop,
  onExit: noop,
  onExiting: noop,
  onExited: noop
};
Transition.UNMOUNTED = UNMOUNTED;
Transition.EXITED = EXITED;
Transition.ENTERING = ENTERING;
Transition.ENTERED = ENTERED;
Transition.EXITING = EXITING;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Transition);

/***/ }),

/***/ "./node_modules/react-transition-group/esm/TransitionGroup.js":
/*!********************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/TransitionGroup.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutPropertiesLoose */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inheritsLoose */ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./TransitionGroupContext */ "./node_modules/react-transition-group/esm/TransitionGroupContext.js");
/* harmony import */ var _utils_ChildMapping__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./utils/ChildMapping */ "./node_modules/react-transition-group/esm/utils/ChildMapping.js");









var values = Object.values || function (obj) {
  return Object.keys(obj).map(function (k) {
    return obj[k];
  });
};

var defaultProps = {
  component: 'div',
  childFactory: function childFactory(child) {
    return child;
  }
};
/**
 * The `<TransitionGroup>` component manages a set of transition components
 * (`<Transition>` and `<CSSTransition>`) in a list. Like with the transition
 * components, `<TransitionGroup>` is a state machine for managing the mounting
 * and unmounting of components over time.
 *
 * Consider the example below. As items are removed or added to the TodoList the
 * `in` prop is toggled automatically by the `<TransitionGroup>`.
 *
 * Note that `<TransitionGroup>`  does not define any animation behavior!
 * Exactly _how_ a list item animates is up to the individual transition
 * component. This means you can mix and match animations across different list
 * items.
 */

var TransitionGroup = /*#__PURE__*/function (_React$Component) {
  (0,_babel_runtime_helpers_esm_inheritsLoose__WEBPACK_IMPORTED_MODULE_3__["default"])(TransitionGroup, _React$Component);

  function TransitionGroup(props, context) {
    var _this;

    _this = _React$Component.call(this, props, context) || this;

    var handleExited = _this.handleExited.bind((0,_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__["default"])(_this)); // Initial children should all be entering, dependent on appear


    _this.state = {
      contextValue: {
        isMounting: true
      },
      handleExited: handleExited,
      firstRender: true
    };
    return _this;
  }

  var _proto = TransitionGroup.prototype;

  _proto.componentDidMount = function componentDidMount() {
    this.mounted = true;
    this.setState({
      contextValue: {
        isMounting: false
      }
    });
  };

  _proto.componentWillUnmount = function componentWillUnmount() {
    this.mounted = false;
  };

  TransitionGroup.getDerivedStateFromProps = function getDerivedStateFromProps(nextProps, _ref) {
    var prevChildMapping = _ref.children,
        handleExited = _ref.handleExited,
        firstRender = _ref.firstRender;
    return {
      children: firstRender ? (0,_utils_ChildMapping__WEBPACK_IMPORTED_MODULE_5__.getInitialChildMapping)(nextProps, handleExited) : (0,_utils_ChildMapping__WEBPACK_IMPORTED_MODULE_5__.getNextChildMapping)(nextProps, prevChildMapping, handleExited),
      firstRender: false
    };
  } // node is `undefined` when user provided `nodeRef` prop
  ;

  _proto.handleExited = function handleExited(child, node) {
    var currentChildMapping = (0,_utils_ChildMapping__WEBPACK_IMPORTED_MODULE_5__.getChildMapping)(this.props.children);
    if (child.key in currentChildMapping) return;

    if (child.props.onExited) {
      child.props.onExited(node);
    }

    if (this.mounted) {
      this.setState(function (state) {
        var children = (0,_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_1__["default"])({}, state.children);

        delete children[child.key];
        return {
          children: children
        };
      });
    }
  };

  _proto.render = function render() {
    var _this$props = this.props,
        Component = _this$props.component,
        childFactory = _this$props.childFactory,
        props = (0,_babel_runtime_helpers_esm_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__["default"])(_this$props, ["component", "childFactory"]);

    var contextValue = this.state.contextValue;
    var children = values(this.state.children).map(childFactory);
    delete props.appear;
    delete props.enter;
    delete props.exit;

    if (Component === null) {
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default().createElement(_TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__["default"].Provider, {
        value: contextValue
      }, children);
    }

    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default().createElement(_TransitionGroupContext__WEBPACK_IMPORTED_MODULE_6__["default"].Provider, {
      value: contextValue
    }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default().createElement(Component, props, children));
  };

  return TransitionGroup;
}((react__WEBPACK_IMPORTED_MODULE_4___default().Component));

TransitionGroup.propTypes =  true ? {
  /**
   * `<TransitionGroup>` renders a `<div>` by default. You can change this
   * behavior by providing a `component` prop.
   * If you use React v16+ and would like to avoid a wrapping `<div>` element
   * you can pass in `component={null}`. This is useful if the wrapping div
   * borks your css styles.
   */
  component: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().any),

  /**
   * A set of `<Transition>` components, that are toggled `in` and out as they
   * leave. the `<TransitionGroup>` will inject specific transition props, so
   * remember to spread them through if you are wrapping the `<Transition>` as
   * with our `<Fade>` example.
   *
   * While this component is meant for multiple `Transition` or `CSSTransition`
   * children, sometimes you may want to have a single transition child with
   * content that you want to be transitioned out and in when you change it
   * (e.g. routes, images etc.) In that case you can change the `key` prop of
   * the transition child as you change its content, this will cause
   * `TransitionGroup` to transition the child out and back in.
   */
  children: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().node),

  /**
   * A convenience prop that enables or disables appear animations
   * for all children. Note that specifying this will override any defaults set
   * on individual children Transitions.
   */
  appear: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * A convenience prop that enables or disables enter animations
   * for all children. Note that specifying this will override any defaults set
   * on individual children Transitions.
   */
  enter: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * A convenience prop that enables or disables exit animations
   * for all children. Note that specifying this will override any defaults set
   * on individual children Transitions.
   */
  exit: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().bool),

  /**
   * You may need to apply reactive updates to a child as it is exiting.
   * This is generally done by using `cloneElement` however in the case of an exiting
   * child the element has already been removed and not accessible to the consumer.
   *
   * If you do need to update a child as it leaves you can provide a `childFactory`
   * to wrap every child, even the ones that are leaving.
   *
   * @type Function(child: ReactElement) -> ReactElement
   */
  childFactory: (prop_types__WEBPACK_IMPORTED_MODULE_7___default().func)
} : 0;
TransitionGroup.defaultProps = defaultProps;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TransitionGroup);

/***/ }),

/***/ "./node_modules/react-transition-group/esm/TransitionGroupContext.js":
/*!***************************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/TransitionGroupContext.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (react__WEBPACK_IMPORTED_MODULE_0___default().createContext(null));

/***/ }),

/***/ "./node_modules/react-transition-group/esm/config.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-transition-group/esm/config.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  disabled: false
});

/***/ }),

/***/ "./node_modules/react-transition-group/esm/index.js":
/*!**********************************************************!*\
  !*** ./node_modules/react-transition-group/esm/index.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CSSTransition": () => (/* reexport safe */ _CSSTransition__WEBPACK_IMPORTED_MODULE_0__["default"]),
/* harmony export */   "ReplaceTransition": () => (/* reexport safe */ _ReplaceTransition__WEBPACK_IMPORTED_MODULE_1__["default"]),
/* harmony export */   "SwitchTransition": () => (/* reexport safe */ _SwitchTransition__WEBPACK_IMPORTED_MODULE_2__["default"]),
/* harmony export */   "Transition": () => (/* reexport safe */ _Transition__WEBPACK_IMPORTED_MODULE_4__["default"]),
/* harmony export */   "TransitionGroup": () => (/* reexport safe */ _TransitionGroup__WEBPACK_IMPORTED_MODULE_3__["default"]),
/* harmony export */   "config": () => (/* reexport safe */ _config__WEBPACK_IMPORTED_MODULE_5__["default"])
/* harmony export */ });
/* harmony import */ var _CSSTransition__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CSSTransition */ "./node_modules/react-transition-group/esm/CSSTransition.js");
/* harmony import */ var _ReplaceTransition__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ReplaceTransition */ "./node_modules/react-transition-group/esm/ReplaceTransition.js");
/* harmony import */ var _SwitchTransition__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./SwitchTransition */ "./node_modules/react-transition-group/esm/SwitchTransition.js");
/* harmony import */ var _TransitionGroup__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./TransitionGroup */ "./node_modules/react-transition-group/esm/TransitionGroup.js");
/* harmony import */ var _Transition__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Transition */ "./node_modules/react-transition-group/esm/Transition.js");
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./config */ "./node_modules/react-transition-group/esm/config.js");







/***/ }),

/***/ "./node_modules/react-transition-group/esm/utils/ChildMapping.js":
/*!***********************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/utils/ChildMapping.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getChildMapping": () => (/* binding */ getChildMapping),
/* harmony export */   "getInitialChildMapping": () => (/* binding */ getInitialChildMapping),
/* harmony export */   "getNextChildMapping": () => (/* binding */ getNextChildMapping),
/* harmony export */   "mergeChildMappings": () => (/* binding */ mergeChildMappings)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

/**
 * Given `this.props.children`, return an object mapping key to child.
 *
 * @param {*} children `this.props.children`
 * @return {object} Mapping of key to child
 */

function getChildMapping(children, mapFn) {
  var mapper = function mapper(child) {
    return mapFn && (0,react__WEBPACK_IMPORTED_MODULE_0__.isValidElement)(child) ? mapFn(child) : child;
  };

  var result = Object.create(null);
  if (children) react__WEBPACK_IMPORTED_MODULE_0__.Children.map(children, function (c) {
    return c;
  }).forEach(function (child) {
    // run the map function here instead so that the key is the computed one
    result[child.key] = mapper(child);
  });
  return result;
}
/**
 * When you're adding or removing children some may be added or removed in the
 * same render pass. We want to show *both* since we want to simultaneously
 * animate elements in and out. This function takes a previous set of keys
 * and a new set of keys and merges them with its best guess of the correct
 * ordering. In the future we may expose some of the utilities in
 * ReactMultiChild to make this easy, but for now React itself does not
 * directly have this concept of the union of prevChildren and nextChildren
 * so we implement it here.
 *
 * @param {object} prev prev children as returned from
 * `ReactTransitionChildMapping.getChildMapping()`.
 * @param {object} next next children as returned from
 * `ReactTransitionChildMapping.getChildMapping()`.
 * @return {object} a key set that contains all keys in `prev` and all keys
 * in `next` in a reasonable order.
 */

function mergeChildMappings(prev, next) {
  prev = prev || {};
  next = next || {};

  function getValueForKey(key) {
    return key in next ? next[key] : prev[key];
  } // For each key of `next`, the list of keys to insert before that key in
  // the combined list


  var nextKeysPending = Object.create(null);
  var pendingKeys = [];

  for (var prevKey in prev) {
    if (prevKey in next) {
      if (pendingKeys.length) {
        nextKeysPending[prevKey] = pendingKeys;
        pendingKeys = [];
      }
    } else {
      pendingKeys.push(prevKey);
    }
  }

  var i;
  var childMapping = {};

  for (var nextKey in next) {
    if (nextKeysPending[nextKey]) {
      for (i = 0; i < nextKeysPending[nextKey].length; i++) {
        var pendingNextKey = nextKeysPending[nextKey][i];
        childMapping[nextKeysPending[nextKey][i]] = getValueForKey(pendingNextKey);
      }
    }

    childMapping[nextKey] = getValueForKey(nextKey);
  } // Finally, add the keys which didn't appear before any key in `next`


  for (i = 0; i < pendingKeys.length; i++) {
    childMapping[pendingKeys[i]] = getValueForKey(pendingKeys[i]);
  }

  return childMapping;
}

function getProp(child, prop, props) {
  return props[prop] != null ? props[prop] : child.props[prop];
}

function getInitialChildMapping(props, onExited) {
  return getChildMapping(props.children, function (child) {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(child, {
      onExited: onExited.bind(null, child),
      in: true,
      appear: getProp(child, 'appear', props),
      enter: getProp(child, 'enter', props),
      exit: getProp(child, 'exit', props)
    });
  });
}
function getNextChildMapping(nextProps, prevChildMapping, onExited) {
  var nextChildMapping = getChildMapping(nextProps.children);
  var children = mergeChildMappings(prevChildMapping, nextChildMapping);
  Object.keys(children).forEach(function (key) {
    var child = children[key];
    if (!(0,react__WEBPACK_IMPORTED_MODULE_0__.isValidElement)(child)) return;
    var hasPrev = (key in prevChildMapping);
    var hasNext = (key in nextChildMapping);
    var prevChild = prevChildMapping[key];
    var isLeaving = (0,react__WEBPACK_IMPORTED_MODULE_0__.isValidElement)(prevChild) && !prevChild.props.in; // item is new (entering)

    if (hasNext && (!hasPrev || isLeaving)) {
      // console.log('entering', key)
      children[key] = (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(child, {
        onExited: onExited.bind(null, child),
        in: true,
        exit: getProp(child, 'exit', nextProps),
        enter: getProp(child, 'enter', nextProps)
      });
    } else if (!hasNext && hasPrev && !isLeaving) {
      // item is old (exiting)
      // console.log('leaving', key)
      children[key] = (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(child, {
        in: false
      });
    } else if (hasNext && hasPrev && (0,react__WEBPACK_IMPORTED_MODULE_0__.isValidElement)(prevChild)) {
      // item hasn't changed transition states
      // copy over the last transition props;
      // console.log('unchanged', key)
      children[key] = (0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(child, {
        onExited: onExited.bind(null, child),
        in: prevChild.props.in,
        exit: getProp(child, 'exit', nextProps),
        enter: getProp(child, 'enter', nextProps)
      });
    }
  });
  return children;
}

/***/ }),

/***/ "./node_modules/react-transition-group/esm/utils/PropTypes.js":
/*!********************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/utils/PropTypes.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "classNamesShape": () => (/* binding */ classNamesShape),
/* harmony export */   "timeoutsShape": () => (/* binding */ timeoutsShape)
/* harmony export */ });
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);

var timeoutsShape =  true ? prop_types__WEBPACK_IMPORTED_MODULE_0___default().oneOfType([(prop_types__WEBPACK_IMPORTED_MODULE_0___default().number), prop_types__WEBPACK_IMPORTED_MODULE_0___default().shape({
  enter: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().number),
  exit: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().number),
  appear: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().number)
}).isRequired]) : 0;
var classNamesShape =  true ? prop_types__WEBPACK_IMPORTED_MODULE_0___default().oneOfType([(prop_types__WEBPACK_IMPORTED_MODULE_0___default().string), prop_types__WEBPACK_IMPORTED_MODULE_0___default().shape({
  enter: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  exit: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  active: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string)
}), prop_types__WEBPACK_IMPORTED_MODULE_0___default().shape({
  enter: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  enterDone: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  enterActive: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  exit: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  exitDone: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
  exitActive: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string)
})]) : 0;

/***/ }),

/***/ "./node_modules/react-transition-group/esm/utils/reflow.js":
/*!*****************************************************************!*\
  !*** ./node_modules/react-transition-group/esm/utils/reflow.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "forceReflow": () => (/* binding */ forceReflow)
/* harmony export */ });
var forceReflow = function forceReflow(node) {
  return node.scrollTop;
};

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

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/***/ ((module) => {

"use strict";
module.exports = window["lodash"];

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

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/keycodes":
/*!**********************************!*\
  !*** external ["wp","keycodes"] ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["keycodes"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js ***!
  \**************************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _assertThisInitialized)
/* harmony export */ });
function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _extends)
/* harmony export */ });
function _extends() {
  _extends = Object.assign ? Object.assign.bind() : function (target) {
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

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/inheritsLoose.js ***!
  \******************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _inheritsLoose)
/* harmony export */ });
/* harmony import */ var _setPrototypeOf_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js");

function _inheritsLoose(subClass, superClass) {
  subClass.prototype = Object.create(superClass.prototype);
  subClass.prototype.constructor = subClass;
  (0,_setPrototypeOf_js__WEBPACK_IMPORTED_MODULE_0__["default"])(subClass, superClass);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _objectWithoutPropertiesLoose)
/* harmony export */ });
function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _setPrototypeOf)
/* harmony export */ });
function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };
  return _setPrototypeOf(o, p);
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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_Spice_Heading__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/Spice_Heading */ "./src/blocks/Spice_Heading.js");
/* harmony import */ var _blocks_Spice_Editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/Spice_Editor */ "./src/blocks/Spice_Editor.js");
/* harmony import */ var _blocks_Spice_Divider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./blocks/Spice_Divider */ "./src/blocks/Spice_Divider.js");
/* harmony import */ var _blocks_Spice_Spacer__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/Spice_Spacer */ "./src/blocks/Spice_Spacer.js");
/* harmony import */ var _blocks_Spice_Button__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/Spice_Button */ "./src/blocks/Spice_Button.js");
/* harmony import */ var _blocks_Spice_Icon__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/Spice_Icon */ "./src/blocks/Spice_Icon.js");
/* harmony import */ var _blocks_Spice_Section__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/Spice_Section */ "./src/blocks/Spice_Section.js");
/* harmony import */ var _blocks_Spice_Column__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./blocks/Spice_Column */ "./src/blocks/Spice_Column.js");
/* harmony import */ var _blocks_Spice_Image__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./blocks/Spice_Image */ "./src/blocks/Spice_Image.js");
/* harmony import */ var _blocks_Spice_Blockquote__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./blocks/Spice_Blockquote */ "./src/blocks/Spice_Blockquote.js");
/* harmony import */ var _blocks_Spice_CTA__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./blocks/Spice_CTA */ "./src/blocks/Spice_CTA.js");











})();

/******/ })()
;
//# sourceMappingURL=index.js.map