/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/************************************************************************/
var __webpack_exports__ = {};

;// CONCATENATED MODULE: external ["wp","element"]
const external_wp_element_namespaceObject = window["wp"]["element"];
;// CONCATENATED MODULE: external "React"
const external_React_namespaceObject = window["React"];
var external_React_default = /*#__PURE__*/__webpack_require__.n(external_React_namespaceObject);
;// CONCATENATED MODULE: external ["wp","blockEditor"]
const external_wp_blockEditor_namespaceObject = window["wp"]["blockEditor"];
;// CONCATENATED MODULE: external ["wp","components"]
const external_wp_components_namespaceObject = window["wp"]["components"];
;// CONCATENATED MODULE: external ["wp","richText"]
const external_wp_richText_namespaceObject = window["wp"]["richText"];
;// CONCATENATED MODULE: external ["wp","i18n"]
const external_wp_i18n_namespaceObject = window["wp"]["i18n"];
;// CONCATENATED MODULE: ./plugin/img/icons/citation.svg
var _path, _path2, _path3, _path4;
function _extends() { _extends = Object.assign ? Object.assign.bind() : function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

var SvgCitation = function SvgCitation(props) {
  return /*#__PURE__*/external_React_namespaceObject.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 1200 1200"
  }, props), _path || (_path = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M788 975H188c-21 0-38-17-38-37v-75a38 38 0 0 0-75 0v75c0 62 50 112 113 112h600a38 38 0 0 0 0-75z"
  })), _path2 || (_path2 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M675 863v150a38 38 0 0 0 75 0V863a38 38 0 0 0-75 0zM225 188v675a38 38 0 0 0 75 0V188a38 38 0 0 0-75 0z"
  })), _path3 || (_path3 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M750 825V674a38 38 0 0 1 75 0v189c0 20-17 37-37 37H113c-21 0-38-17-38-37V263c0-63 50-113 113-113h225a38 38 0 0 1 0 75H188c-21 0-38 17-38 38v562zm139-337h-27c-20 0-37-17-37-38V300c0-21 17-37 37-37h225c21 0 38 16 38 37v153c-1 96-48 135-86 174-7 7-17 11-27 11H900a38 38 0 0 1-36-47l25-103zm161-40V337H900v75h38a38 38 0 0 1 36 47l-26 104h49c25-25 53-53 53-113v-2z"
  })), _path4 || (_path4 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M514 488h-27c-20 0-37-17-37-38V300c0-21 17-37 37-37h225c21 0 38 16 38 37v153c-1 96-48 135-86 174-7 7-17 11-27 11H525a38 38 0 0 1-36-47l25-103zm161-40V337H525v75h38a38 38 0 0 1 36 47l-26 104h49c25-25 53-53 53-113v-2z"
  })));
};
/* harmony default export */ const citation = (SvgCitation);
;// CONCATENATED MODULE: ./plugin/admin/src/js/rich-text-formats/cite.js


/**
 * WordPress dependencies.
 */






const CiteFormatButton = props => {
  var _activeAttributes$cit, _nextAttributes$citeT;
  const {
    isActive,
    onChange,
    value,
    contentRef,
    activeAttributes
  } = props;
  const anchor = (0,external_wp_richText_namespaceObject.useAnchor)({
    editableContentElement: contentRef.current,
    value,
    settings
  });
  const [popoverOpen, setPopoverOpen] = (0,external_wp_element_namespaceObject.useState)(false);
  const [popoverHasFocus, setPopoverHasFocus] = (0,external_wp_element_namespaceObject.useState)(false);
  const [nextAttributes, setNextAttributes] = (0,external_wp_element_namespaceObject.useState)();
  const [isEditing, setIsEditing] = (0,external_wp_element_namespaceObject.useState)(false);

  // Control the open state of the popover.
  (0,external_wp_element_namespaceObject.useEffect)(() => {
    if (isActive) {
      setPopoverOpen(true);
    } else if (!isActive && !popoverHasFocus) {
      setPopoverOpen(false);
      setIsEditing(false);
    }
  }, [isActive, popoverHasFocus]);

  // Update the attributes when another format is selected.
  (0,external_wp_element_namespaceObject.useEffect)(() => {
    setNextAttributes(activeAttributes);
    setIsEditing(false);
  }, [activeAttributes]);
  const updateAttributes = () => {
    const attributes = {
      ...activeAttributes,
      ...nextAttributes
    };
    const newValue = (0,external_wp_richText_namespaceObject.applyFormat)(value, {
      type: settings.name,
      attributes
    });
    onChange(newValue);
  };
  return /*#__PURE__*/external_React_default().createElement((external_React_default()).Fragment, null, /*#__PURE__*/external_React_default().createElement(external_wp_blockEditor_namespaceObject.RichTextToolbarButton, {
    title: (0,external_wp_i18n_namespaceObject.__)('Cite', 'citations'),
    icon: citation,
    onClick: () => {
      onChange((0,external_wp_richText_namespaceObject.toggleFormat)(value, {
        type: settings.name
      }));
      setIsEditing(true);
    },
    isActive: isActive
  }), popoverOpen && /*#__PURE__*/external_React_default().createElement(external_wp_components_namespaceObject.Popover, {
    anchor: anchor,
    focusOnMount: false,
    noArrow: false,
    position: "bottom center",
    onFocus: () => {
      setPopoverHasFocus(true);
    },
    offset: 8,
    onBlur: () => {
      setPopoverHasFocus(false);
    }
  }, /*#__PURE__*/external_React_default().createElement("div", {
    className: "block-editor-cite-control"
  }, /*#__PURE__*/external_React_default().createElement("div", {
    className: "block-editor-cite-control__field"
  }, !isEditing && /*#__PURE__*/external_React_default().createElement("div", {
    className: "block-editor-cite-control__preview"
  }, /*#__PURE__*/external_React_default().createElement("div", {
    className: "block-editor-cite-control__preview-text"
  }, (_activeAttributes$cit = activeAttributes.citeText) !== null && _activeAttributes$cit !== void 0 ? _activeAttributes$cit : /*#__PURE__*/external_React_default().createElement("span", {
    className: "no-cite-text"
  }, (0,external_wp_i18n_namespaceObject.__)('Please set a citation', 'citations'))), /*#__PURE__*/external_React_default().createElement(external_wp_components_namespaceObject.Button, {
    variant: "link",
    icon: "edit",
    onClick: () => {
      setIsEditing(true);
    }
  })), isEditing && /*#__PURE__*/external_React_default().createElement("div", {
    className: "block-editor-cite-control__edit"
  }, /*#__PURE__*/external_React_default().createElement(external_wp_components_namespaceObject.TextControl, {
    value: (_nextAttributes$citeT = nextAttributes.citeText) !== null && _nextAttributes$citeT !== void 0 ? _nextAttributes$citeT : '',
    onChange: citeText => {
      setNextAttributes({
        ...nextAttributes,
        citeText
      });
    }
  }), /*#__PURE__*/external_React_default().createElement(external_wp_components_namespaceObject.Button, {
    variant: "primary",
    icon: "editor-break",
    onClick: () => {
      updateAttributes();
      setIsEditing(false);
    }
  }))))));
};
const settings = {
  name: 'wpm-format/cite',
  title: (0,external_wp_i18n_namespaceObject.__)('Cite', 'citations'),
  keywords: [(0,external_wp_i18n_namespaceObject.__)('bibliography'), (0,external_wp_i18n_namespaceObject.__)('source')],
  tagName: 'span',
  className: 'js--wpm-format-cite',
  attributes: {
    citeText: 'data-cite-text'
  },
  edit: CiteFormatButton
};
(0,external_wp_richText_namespaceObject.registerFormatType)(settings.name, settings);
;// CONCATENATED MODULE: ./plugin/admin/src/js/blocks-helper.js

/******/ })()
;