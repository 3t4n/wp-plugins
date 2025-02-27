"use strict";

// Import necessary WordPress packages
var registerBlockType = wp.blocks.registerBlockType;
var _ref = wp.blockEditor || wp.editor,
  InspectorControls = _ref.InspectorControls;
var _wp$components = wp.components,
  PanelBody = _wp$components.PanelBody,
  TextControl = _wp$components.TextControl;
var Fragment = wp.element.Fragment;

// Register the block
registerBlockType('custom/facebook-like-box', {
  title: 'Facebook Like Box',
  description: 'Embed a Facebook Like Box',
  category: 'widgets',
  icon: 'facebook',
  attributes: {
    pageUrl: {
      type: 'string',
      "default": ''
    }
  },
  edit: function edit(_ref2) {
    var attributes = _ref2.attributes,
      setAttributes = _ref2.setAttributes;
    var pageUrl = attributes.pageUrl;
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
      title: "Settings"
    }, /*#__PURE__*/React.createElement(TextControl, {
      label: "Facebook Page URL",
      value: pageUrl,
      onChange: function onChange(value) {
        return setAttributes({
          pageUrl: value
        });
      }
    }))), /*#__PURE__*/React.createElement("div", {
      className: "facebook-like-box"
    }, pageUrl ? /*#__PURE__*/React.createElement("iframe", {
      src: "https://www.facebook.com/plugins/page.php?href=".concat(encodeURIComponent(pageUrl), "&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"),
      width: "340",
      height: "500",
      style: {
        border: 'none',
        overflow: 'hidden'
      },
      scrolling: "no",
      frameBorder: "0",
      allowFullScreen: true,
      allow: "autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
    }) : /*#__PURE__*/React.createElement("p", null, "Please enter a Facebook Page URL in the block settings."))));
  },
  save: function save(_ref3) {
    var attributes = _ref3.attributes;
    var pageUrl = attributes.pageUrl;
    return /*#__PURE__*/React.createElement("div", {
      className: "facebook-like-box"
    }, pageUrl ? /*#__PURE__*/React.createElement("iframe", {
      src: "https://www.facebook.com/plugins/page.php?href=".concat(encodeURIComponent(pageUrl), "&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"),
      width: "340",
      height: "500",
      style: {
        border: 'none',
        overflow: 'hidden'
      },
      scrolling: "no",
      frameBorder: "0",
      allowFullScreen: true,
      allow: "autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
    }) : /*#__PURE__*/React.createElement("p", null, "Please enter a Facebook Page URL in the block settings."));
  }
});
