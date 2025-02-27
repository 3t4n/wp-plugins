/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/blocks/countdown/edit.js":
/*!********************************************!*\
  !*** ./assets/js/blocks/countdown/edit.js ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Edit; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "react");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const {
  ServerSideRender,
  PanelBody,
  SelectControl,
  Toolbar
} = wp.components;
const {
  __
} = wp.i18n;
const {
  Fragment,
  Component
} = wp.element;
const {
  InspectorControls,
  BlockControls
} = wp.blockEditor;
class Edit extends Component {
  constructor(_ref) {
    let {
      attributes,
      setAttributes
    } = _ref;
    super();
    this.state = {
      giveaways: []
    };
    this.props = {
      attributes,
      setAttributes
    };
    this.get_giveaways = this.get_giveaways.bind(this);
    this.startLibraries = this.startLibraries.bind(this);
  }

  componentDidMount() {
    this.get_giveaways();
  }

  get_giveaways() {
    var self = this;
    fetch(window.ajaxurl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
      },
      body: 'action=sg_get_available_giveaways',
      credentials: 'same-origin'
    }).then(function (res) {
      return res.json();
    }).then(function (res) {
      if (res.success) {
        self.setState({
          giveaways: res.data
        });
      }
    });
  }

  startLibraries() {
    let timeout = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1000;
    const self = this;
    setTimeout(function () {
      self.maybeStartCountdown();
    }, timeout);
  }
  /**
   * Maybe Start Countdown
   */


  maybeStartCountdown() {
    var $ = jQuery,
        $countdowns = $(".giveasap_countdown:not(.countdown-started)");

    if ($countdowns.length) {
      $countdowns.each(function () {
        var $timestamp = $(this).attr("data-end");
        $(this).countdown({
          until: new Date($timestamp * 1000),
          format: 'dHMS'
        });
      }).addClass('countdown-started');
    }
  }

  render() {
    let giveaways = [{
      label: __('Select a Giveaway'),
      value: 0
    }];
    const {
      attributes,
      setAttributes,
      isSelected
    } = this.props;
    let message = '';
    let blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('Please, select a giveaway to show'));
    const selectedID = parseInt(attributes.id);

    if (this.state.giveaways.length) {
      giveaways = giveaways.concat(this.state.giveaways.map(post => {
        return {
          label: post.post_title,
          value: post.ID
        };
      }));
    } else {
      giveaways = [];
    }

    if (0 === giveaways.length) {
      message = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('No Giveaways found.'));
    }

    if (parseInt(attributes.id) > 0) {
      if (typeof ServerSideRender !== 'undefined') {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ServerSideRender, {
          block: "simple-giveaways/countdown",
          attributes: attributes
        });
      } else {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(wp.serverSideRender, {
          block: "simple-giveaways/countdown",
          attributes: attributes
        });
      }

      this.startLibraries();
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('Display Options'),
      initialOpen: true
    }, giveaways.length > 1 && [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Giveaway'),
      value: selectedID,
      options: giveaways,
      onChange: id => {
        setAttributes({
          id: id
        });
        this.startLibraries();
      }
    })], message)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Toolbar, {
      controls: [{
        icon: `image-rotate`,
        title: `Reload countdown/slider if not started`,
        isActive: false,
        onClick: () => {
          this.startLibraries(100);
        }
      }]
    })), blockContent);
  }

}

/***/ }),

/***/ "./assets/js/blocks/countdown/index.js":
/*!*********************************************!*\
  !*** ./assets/js/blocks/countdown/index.js ***!
  \*********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _logo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../logo */ "./assets/js/blocks/logo.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./assets/js/blocks/countdown/edit.js");
const {
  registerBlockType
} = wp.blocks;
const {
  __
} = wp.i18n;


registerBlockType('simple-giveaways/countdown', {
  title: __('Countdown'),
  description: __('Show the giveaway countdown'),
  icon: _logo__WEBPACK_IMPORTED_MODULE_0__["default"],
  category: 'simple-giveaways',
  attributes: {
    id: {
      type: 'string',
      default: '0'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],

  save() {
    return null;
  }

});

/***/ }),

/***/ "./assets/js/blocks/giveaway/edit.js":
/*!*******************************************!*\
  !*** ./assets/js/blocks/giveaway/edit.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Edit; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "react");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const {
  RadioControl,
  ServerSideRender,
  PanelBody,
  SelectControl,
  Toolbar
} = wp.components;
const {
  __
} = wp.i18n;
const {
  Fragment,
  Component
} = wp.element;
const {
  InspectorControls,
  BlockControls
} = wp.blockEditor;
const apiFetch = wp.apiFetch;

function get_current_content_id() {
  // Remove ? and then construct an array of objects.
  const params = window.location.search.replace('?', '').split('&').map(param => {
    const args = param.split('=');
    return {
      tag: args[0],
      value: args[1]
    };
  });
  let id = 'current';

  if (params.length) {
    for (var querystring in params) {
      const object = params[querystring];

      if ('post' === object['tag']) {
        id = object['value'];
      }
    }
  }

  return id;
}

class Edit extends Component {
  constructor(_ref) {
    let {
      attributes,
      setAttributes
    } = _ref;
    super();
    this.state = {
      giveaways: []
    };
    this.props = {
      attributes,
      setAttributes
    };
    this.get_giveaways = this.get_giveaways.bind(this);
    this.maybeStartSlider = this.maybeStartSlider.bind(this);
    this.startLibraries = this.startLibraries.bind(this);
  }

  componentDidMount() {
    this.get_giveaways();
  }

  get_giveaways() {
    var self = this;
    fetch(window.ajaxurl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
      },
      body: 'action=sg_get_available_giveaways',
      credentials: 'same-origin'
    }).then(function (res) {
      return res.json();
    }).then(function (res) {
      if (res.success) {
        self.setState({
          giveaways: res.data
        });
      }
    });
  }

  startLibraries() {
    let timeout = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1000;
    const self = this;
    setTimeout(function () {
      self.maybeStartSlider();
      self.maybeStartCountdown();
    }, timeout);
  }
  /**
   * Maybe Start Countdown
   */


  maybeStartCountdown() {
    var $ = jQuery,
        $countdowns = $(".giveasap_countdown:not(.countdown-started)");

    if ($countdowns.length) {
      $countdowns.each(function () {
        var $timestamp = $(this).attr("data-end");
        $(this).countdown({
          until: new Date($timestamp * 1000),
          format: 'dHMS'
        });
      }).addClass('countdown-started');
    }
  }
  /**
   * Maybe Start the Slider
   */


  maybeStartSlider() {
    if (jQuery('.sg-giveaway-prizes-slider:not(.slick-started)').length) {
      jQuery(".sg-giveaway-prizes-slider:not(.slick-started)").slick({
        // normal options...
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true
      }).addClass('slick-started');
    }
  }

  render() {
    let giveaways = [{
      label: __('Select a Giveaway'),
      value: 0
    }];
    const {
      attributes,
      setAttributes
    } = this.props;
    let message = '';
    let blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('Please, select a giveaway to show'));
    const selectedID = parseInt(attributes.id);

    if (this.state.giveaways.length) {
      giveaways = giveaways.concat(this.state.giveaways.map(post => {
        return {
          label: post.post_title,
          value: post.ID
        };
      }));
    } else {
      giveaways = [];
    }

    if (0 === giveaways.length) {
      message = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('No Giveaways found.'));
    }

    if (parseInt(attributes.id) > 0) {
      if (typeof ServerSideRender !== 'undefined') {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ServerSideRender, {
          block: "simple-giveaways/giveaway",
          attributes: attributes
        });
      } else {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(wp.serverSideRender, {
          block: "simple-giveaways/giveaway",
          attributes: attributes
        });
      }

      this.startLibraries();
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('Display Options'),
      initialOpen: true
    }, giveaways.length > 1 && [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Giveaway'),
      value: selectedID,
      options: giveaways,
      onChange: id => {
        this.startLibraries();
        return setAttributes({
          id: id
        });
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Giveaway Title'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.title,
      onChange: title => {
        setAttributes({
          title: title
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Giveaway Content'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.content,
      onChange: value => {
        setAttributes({
          content: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Rules'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.rules,
      onChange: value => {
        setAttributes({
          rules: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Prizes'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.prizes,
      onChange: value => {
        setAttributes({
          prizes: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Total Entries'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.show_total_entries,
      onChange: value => {
        setAttributes({
          show_total_entries: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Show Your Entries'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.show_entries,
      onChange: value => {
        setAttributes({
          show_entries: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Countdown in Header'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.countdown_in_header,
      onChange: value => {
        setAttributes({
          countdown_in_header: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Hide Winners Number'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.hide_winners_number,
      onChange: value => {
        setAttributes({
          hide_winners_number: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Hide Prize Value'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.hide_prize_value,
      onChange: value => {
        setAttributes({
          hide_prize_value: value
        });
        this.startLibraries(2000);
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: __('Hide Prize Title'),
      options: [{
        value: '0',
        label: __('No')
      }, {
        value: '1',
        label: __('Yes')
      }],
      selected: attributes.hide_prize_title,
      onChange: value => {
        setAttributes({
          hide_prize_title: value
        });
        this.startLibraries(2000);
      }
    })], message)), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Toolbar, {
      controls: [{
        icon: `image-rotate`,
        title: `Reload countdown/slider if not started`,
        isActive: false,
        onClick: () => {
          this.startLibraries(100);
        }
      }]
    })), blockContent);
  }

}

/***/ }),

/***/ "./assets/js/blocks/giveaway/index.js":
/*!********************************************!*\
  !*** ./assets/js/blocks/giveaway/index.js ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _logo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../logo */ "./assets/js/blocks/logo.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./assets/js/blocks/giveaway/edit.js");
const {
  registerBlockType
} = wp.blocks;
const {
  __
} = wp.i18n;


registerBlockType('simple-giveaways/giveaway', {
  title: __('Giveaway'),
  description: __('Show a giveaway'),
  icon: _logo__WEBPACK_IMPORTED_MODULE_0__["default"],
  category: 'simple-giveaways',
  attributes: {
    id: {
      type: 'string',
      default: '0'
    },
    hide_link: {
      type: 'string',
      default: 'current'
    },
    title: {
      type: 'string',
      default: '0'
    },
    prizes: {
      type: 'string',
      default: '1'
    },
    show_total_entries: {
      type: 'string',
      default: '0'
    },
    show_entries: {
      type: 'string',
      default: '0'
    },
    countdown_in_header: {
      type: 'string',
      default: '0'
    },
    hide_winners_number: {
      type: 'string',
      default: '0'
    },
    hide_prize_value: {
      type: 'string',
      default: '0'
    },
    hide_prize_title: {
      type: 'string',
      default: '0'
    },
    content: {
      type: 'string',
      default: '0'
    },
    rules: {
      type: 'string',
      default: '0'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],

  save() {
    return null;
  }

});

/***/ }),

/***/ "./assets/js/blocks/logo.js":
/*!**********************************!*\
  !*** ./assets/js/blocks/logo.js ***!
  \**********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "react");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


function Icon() {
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    id: "sg-logo",
    xmlns: "http://www.w3.org/2000/svg",
    width: "20",
    height: "20",
    viewBox: "0 0 300 300"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    fill: "#a46497"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M108.592,263.672c0,0,23.812,5.895,29.47,7.309c5.659,1.416,15.088,0.474,15.325-10.845c0.236-11.317,0-35.129,0-42.438 c0-7.309,2.123-16.975,9.668-16.975c7.543,0,7.777,11.788,12.021,13.674c4.242,1.888,16.268,1.181,21.219-11.551 s3.771-33.244-6.838-39.138c-10.607-5.896-15.795,6.836-20.746,10.372c-4.949,3.537-14.852,1.416-15.795-11.315 c-0.943-12.732,0.707-37.251-3.3-44.56c-4.009-7.311-9.904-8.725-23.104-7.544c-13.202,1.18-27.114,4.715-27.114,4.715 L108.592,263.672z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M165.883,169.247c-2.594,1.415-4.715,0.354-4.715-7.663s0.236-30.413,0.236-37.486s4.479-16.268,16.502-12.968 s37.486,11.081,40.316,12.023c2.828,0.943,1.885,8.251,1.414,11.554c-0.473,3.301-8.959,91.712-8.959,94.776 c0,3.066-1.18,5.424-5.658,8.961c-4.48,3.536-33.008,24.99-36.309,26.877c-3.301,1.886-7.309,1.888-7.309-5.423 c0-7.309,0-43.381,0-46.683c0-3.299,0.234-7.073,3.063-2.122c2.83,4.951,8.725,13.438,22.869,8.96 c14.148-4.479,19.098-29.235,16.033-42.201c-3.063-12.967-13.203-23.341-22.635-21.219 C171.307,158.756,165.883,169.247,165.883,169.247z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M55.782,122.685l17.684,132.5c0,0-16.032-3.065-20.512-4.716c-4.48-1.65-8.488-8.487-10.847-17.918 s-4.479-18.627-5.659-23.813c-1.178-5.187,0.709-8.486,4.008-7.072c3.301,1.414,8.959,10.139,16.269,4.009 c7.31-6.131-0.707-35.365-6.603-37.959c-5.895-2.593-9.666,1.181-9.901,6.603c-0.236,5.422-5.894,5.895-8.017,4.243 c-2.121-1.65-4.951-12.023-7.309-22.162s-4.244-20.748-2.122-24.284c2.122-3.535,11.08-5.188,16.976-6.365 C45.642,124.571,55.782,122.685,55.782,122.685z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M95.625,110.66c0,0-4.008-1.65-3.299,7.073c0.707,8.724,10.608,150.417,10.608,150.417l-23.104-7.308 c0,0-17.447-125.663-18.39-132.736c-0.942-7.072-2.593-12.26,7.31-14.146S95.625,110.66,95.625,110.66z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M92.325,117.734c-0.378-4.663,0.592-6.351,1.576-6.923c-4.563,0.413-17.158,1.627-25.152,3.149 c-9.901,1.886-8.25,7.074-7.309,14.146c0.215,1.613,1.292,9.416,2.824,20.48c3.799-4.101,15.023-13.447,30.158-1.669 C93.325,131.38,92.51,120.011,92.325,117.734z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M93.9,110.811c1.089-0.097,1.726-0.15,1.726-0.15S94.758,110.314,93.9,110.811z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M79.831,260.843l23.104,7.308c0,0-0.152-2.191-0.423-6.042c-9.765-2.707-19.821-9.14-24.193-12.152 C79.258,256.724,79.831,260.843,79.831,260.843z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M131.816,102.821c0,0,27.407-1.415,36.249-1.061c8.842,0.354,17.15,2.299,17.15,2.299s36.957,0.354,62.42-6.188 s28.291-16.269,30.061-23.519s-1.77-13.438-7.957-18.389c-6.189-4.951-34.127-24.226-34.127-24.226s6.885,18.743-0.178,31.829 C224.648,83.548,193.881,95.748,131.816,102.821z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M131.993,98.754l22.986-4.42c0,0,44.207-45.443,74.973-35.188c0,0,6.014-25.108-9.193-30.59 C205.553,23.075,173.369,30.147,131.993,98.754z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M106.177,103.705c0,0-21.042-1.062-31.652-5.835c-10.608-4.774-16.091-13.438-13.792-27.763c0,0-9.195-7.603-24.225-7.426 c-15.03,0.177-11.141,26.523,0.531,36.603C48.709,109.364,72.403,112.016,106.177,103.705z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M65.991,92.006c-4.783-5.063-6.818-12.17-5.258-21.897c0,0-9.195-7.603-24.225-7.426 c-7.943,0.092-10.598,7.496-9.618,15.941C31.366,82.897,43.997,92.581,65.991,92.006z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M105.823,99.815c0,0-1.592-5.835,0.178-8.665c0,0-9.902-26.522-19.981-33.419c-10.079-6.896-29.589-5.895-46.21-0.942 C39.808,56.788,83.779,61.385,105.823,99.815z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M86.019,57.731c-10.079-6.896-29.589-5.895-46.21-0.942c0,0,20.557,2.155,40.605,15.801 c3.803,1.434,7.342,1.964,7.728,0.173c0.511-2.39-3.256-10.875,5.709-6.208C91.374,62.802,88.704,59.569,86.019,57.731z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M122.09,87.615c0,0-10.963-1.237-12.024,7.428c-1.062,8.664,2.829,9.372,2.829,9.372l13.969-0.708 c0,0,0.178-7.78,7.073-15.385C133.937,88.322,130.401,82.84,122.09,87.615z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M133.937,88.322c0,0-3.537-5.48-11.847-0.707c0,0-9.353-1.039-11.606,5.644c0.878,1.865,3.019,4.632,6.125,4.259 c4.356-0.522,8.022,2.031,12.19-1.272C129.843,93.826,131.45,91.064,133.937,88.322z"
  })));
}

/* harmony default export */ __webpack_exports__["default"] = (Icon);

/***/ }),

/***/ "./assets/js/blocks/winners/edit.js":
/*!******************************************!*\
  !*** ./assets/js/blocks/winners/edit.js ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Edit; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "react");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const {
  ServerSideRender,
  PanelBody,
  SelectControl
} = wp.components;
const {
  __
} = wp.i18n;
const {
  Fragment,
  Component
} = wp.element;
const {
  InspectorControls
} = wp.blockEditor;
class Edit extends Component {
  constructor(_ref) {
    let {
      attributes,
      setAttributes
    } = _ref;
    super();
    this.state = {
      giveaways: []
    };
    this.props = {
      attributes,
      setAttributes
    };
    this.get_giveaways = this.get_giveaways.bind(this);
  }

  componentDidMount() {
    this.get_giveaways();
  }

  get_giveaways() {
    var self = this;
    fetch(window.ajaxurl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
      },
      body: 'action=sg_get_available_giveaways',
      credentials: 'same-origin'
    }).then(function (res) {
      return res.json();
    }).then(function (res) {
      if (res.success) {
        self.setState({
          giveaways: res.data
        });
      }
    });
  }

  render() {
    let giveaways = [{
      label: __('Select a Giveaway'),
      value: 0
    }];
    const {
      attributes,
      setAttributes,
      isSelected
    } = this.props;
    let message = '';
    let blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('Please, select a giveaway to show'));
    const selectedID = parseInt(attributes.id);

    if (this.state.giveaways.length) {
      giveaways = giveaways.concat(this.state.giveaways.map(post => {
        return {
          label: post.post_title,
          value: post.ID
        };
      }));
    } else {
      giveaways = [];
    }

    if (0 === giveaways.length) {
      message = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, __('No Giveaways found.'));
    }

    if (parseInt(attributes.id) > 0) {
      if (typeof ServerSideRender !== 'undefined') {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ServerSideRender, {
          block: "simple-giveaways/winners",
          attributes: attributes
        });
      } else {
        blockContent = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(wp.serverSideRender, {
          block: "simple-giveaways/winners",
          attributes: attributes
        });
      }
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('Display Options'),
      initialOpen: true
    }, giveaways.length > 1 && [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Giveaway'),
      value: selectedID,
      options: giveaways,
      onChange: id => {
        setAttributes({
          id: id
        });
      }
    })], message)), blockContent);
  }

}

/***/ }),

/***/ "./assets/js/blocks/winners/index.js":
/*!*******************************************!*\
  !*** ./assets/js/blocks/winners/index.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _logo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../logo */ "./assets/js/blocks/logo.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./assets/js/blocks/winners/edit.js");
const {
  registerBlockType
} = wp.blocks;
const {
  __
} = wp.i18n;


registerBlockType('simple-giveaways/winners', {
  title: __('Winners'),
  description: __('Show the giveaway winners'),
  icon: _logo__WEBPACK_IMPORTED_MODULE_0__["default"],
  category: 'simple-giveaways',
  attributes: {
    id: {
      type: 'string',
      default: '0'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],

  save() {
    return null;
  }

});

/***/ }),

/***/ "./assets/js/jquery.countdown.min.js":
/*!*******************************************!*\
  !*** ./assets/js/jquery.countdown.min.js ***!
  \*******************************************/
/***/ (function() {

/* http://keith-wood.name/countdown.html
   Countdown for jQuery v2.0.2.
   Written by Keith Wood (kbwood{at}iinet.com.au) January 2008.
   Available under the MIT (http://keith-wood.name/licence.html) license. 
   Please attribute the author if you use it. */
(function ($) {
  var w = 'countdown';
  var Y = 0;
  var O = 1;
  var W = 2;
  var D = 3;
  var H = 4;
  var M = 5;
  var S = 6;
  $.JQPlugin.createPlugin({
    name: w,
    defaultOptions: {
      until: null,
      since: null,
      timezone: null,
      serverSync: null,
      format: 'dHMS',
      layout: '',
      compact: false,
      padZeroes: false,
      significant: 0,
      description: '',
      expiryUrl: '',
      expiryText: '',
      alwaysExpire: false,
      onExpiry: null,
      onTick: null,
      tickInterval: 1
    },
    regionalOptions: {
      '': {
        labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'],
        labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'],
        compactLabels: ['y', 'm', 'w', 'd'],
        whichLabels: null,
        digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
        timeSeparator: ':',
        isRTL: false
      }
    },
    _getters: ['getTimes'],
    _rtlClass: w + '-rtl',
    _sectionClass: w + '-section',
    _amountClass: w + '-amount',
    _periodClass: w + '-period',
    _rowClass: w + '-row',
    _holdingClass: w + '-holding',
    _showClass: w + '-show',
    _descrClass: w + '-descr',
    _timerElems: [],
    _init: function () {
      var c = this;

      this._super();

      this._serverSyncs = [];
      var d = typeof Date.now == 'function' ? Date.now : function () {
        return new Date().getTime();
      };
      var e = window.performance && typeof window.performance.now == 'function';

      function timerCallBack(a) {
        var b = a < 1e12 ? e ? performance.now() + performance.timing.navigationStart : d() : a || d();

        if (b - g >= 1000) {
          c._updateElems();

          g = b;
        }

        f(timerCallBack);
      }

      var f = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || null;
      var g = 0;

      if (!f || $.noRequestAnimationFrame) {
        $.noRequestAnimationFrame = null;
        setInterval(function () {
          c._updateElems();
        }, 980);
      } else {
        g = window.animationStartTime || window.webkitAnimationStartTime || window.mozAnimationStartTime || window.oAnimationStartTime || window.msAnimationStartTime || d();
        f(timerCallBack);
      }
    },
    UTCDate: function (a, b, c, e, f, g, h, i) {
      if (typeof b == 'object' && b.constructor == Date) {
        i = b.getMilliseconds();
        h = b.getSeconds();
        g = b.getMinutes();
        f = b.getHours();
        e = b.getDate();
        c = b.getMonth();
        b = b.getFullYear();
      }

      var d = new Date();
      d.setUTCFullYear(b);
      d.setUTCDate(1);
      d.setUTCMonth(c || 0);
      d.setUTCDate(e || 1);
      d.setUTCHours(f || 0);
      d.setUTCMinutes((g || 0) - (Math.abs(a) < 30 ? a * 60 : a));
      d.setUTCSeconds(h || 0);
      d.setUTCMilliseconds(i || 0);
      return d;
    },
    periodsToSeconds: function (a) {
      return a[0] * 31557600 + a[1] * 2629800 + a[2] * 604800 + a[3] * 86400 + a[4] * 3600 + a[5] * 60 + a[6];
    },
    resync: function () {
      var d = this;
      $('.' + this._getMarker()).each(function () {
        var a = $.data(this, d.name);

        if (a.options.serverSync) {
          var b = null;

          for (var i = 0; i < d._serverSyncs.length; i++) {
            if (d._serverSyncs[i][0] == a.options.serverSync) {
              b = d._serverSyncs[i];
              break;
            }
          }

          if (b[2] == null) {
            var c = $.isFunction(a.options.serverSync) ? a.options.serverSync.apply(this, []) : null;
            b[2] = (c ? new Date().getTime() - c.getTime() : 0) - b[1];
          }

          if (a._since) {
            a._since.setMilliseconds(a._since.getMilliseconds() + b[2]);
          }

          a._until.setMilliseconds(a._until.getMilliseconds() + b[2]);
        }
      });

      for (var i = 0; i < d._serverSyncs.length; i++) {
        if (d._serverSyncs[i][2] != null) {
          d._serverSyncs[i][1] += d._serverSyncs[i][2];
          delete d._serverSyncs[i][2];
        }
      }
    },
    _instSettings: function (a, b) {
      return {
        _periods: [0, 0, 0, 0, 0, 0, 0]
      };
    },
    _addElem: function (a) {
      if (!this._hasElem(a)) {
        this._timerElems.push(a);
      }
    },
    _hasElem: function (a) {
      return $.inArray(a, this._timerElems) > -1;
    },
    _removeElem: function (b) {
      this._timerElems = $.map(this._timerElems, function (a) {
        return a == b ? null : a;
      });
    },
    _updateElems: function () {
      for (var i = this._timerElems.length - 1; i >= 0; i--) {
        this._updateCountdown(this._timerElems[i]);
      }
    },
    _optionsChanged: function (a, b, c) {
      if (c.layout) {
        c.layout = c.layout.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
      }

      this._resetExtraLabels(b.options, c);

      var d = b.options.timezone != c.timezone;
      $.extend(b.options, c);

      this._adjustSettings(a, b, c.until != null || c.since != null || d);

      var e = new Date();

      if (b._since && b._since < e || b._until && b._until > e) {
        this._addElem(a[0]);
      }

      this._updateCountdown(a, b);
    },
    _updateCountdown: function (a, b) {
      a = a.jquery ? a : $(a);
      b = b || this._getInst(a);

      if (!b) {
        return;
      }

      a.html(this._generateHTML(b)).toggleClass(this._rtlClass, b.options.isRTL);

      if ($.isFunction(b.options.onTick)) {
        var c = b._hold != 'lap' ? b._periods : this._calculatePeriods(b, b._show, b.options.significant, new Date());

        if (b.options.tickInterval == 1 || this.periodsToSeconds(c) % b.options.tickInterval == 0) {
          b.options.onTick.apply(a[0], [c]);
        }
      }

      var d = b._hold != 'pause' && (b._since ? b._now.getTime() < b._since.getTime() : b._now.getTime() >= b._until.getTime());

      if (d && !b._expiring) {
        b._expiring = true;

        if (this._hasElem(a[0]) || b.options.alwaysExpire) {
          this._removeElem(a[0]);

          if ($.isFunction(b.options.onExpiry)) {
            b.options.onExpiry.apply(a[0], []);
          }

          if (b.options.expiryText) {
            var e = b.options.layout;
            b.options.layout = b.options.expiryText;

            this._updateCountdown(a[0], b);

            b.options.layout = e;
          }

          if (b.options.expiryUrl) {
            window.location = b.options.expiryUrl;
          }
        }

        b._expiring = false;
      } else if (b._hold == 'pause') {
        this._removeElem(a[0]);
      }
    },
    _resetExtraLabels: function (a, b) {
      for (var n in b) {
        if (n.match(/[Ll]abels[02-9]|compactLabels1/)) {
          a[n] = b[n];
        }
      }

      for (var n in a) {
        if (n.match(/[Ll]abels[02-9]|compactLabels1/) && typeof b[n] === 'undefined') {
          a[n] = null;
        }
      }
    },
    _adjustSettings: function (a, b, c) {
      var d = null;

      for (var i = 0; i < this._serverSyncs.length; i++) {
        if (this._serverSyncs[i][0] == b.options.serverSync) {
          d = this._serverSyncs[i][1];
          break;
        }
      }

      if (d != null) {
        var e = b.options.serverSync ? d : 0;
        var f = new Date();
      } else {
        var g = $.isFunction(b.options.serverSync) ? b.options.serverSync.apply(a[0], []) : null;
        var f = new Date();
        var e = g ? f.getTime() - g.getTime() : 0;

        this._serverSyncs.push([b.options.serverSync, e]);
      }

      var h = b.options.timezone;
      h = h == null ? -f.getTimezoneOffset() : h;

      if (c || !c && b._until == null && b._since == null) {
        b._since = b.options.since;

        if (b._since != null) {
          b._since = this.UTCDate(h, this._determineTime(b._since, null));

          if (b._since && e) {
            b._since.setMilliseconds(b._since.getMilliseconds() + e);
          }
        }

        b._until = this.UTCDate(h, this._determineTime(b.options.until, f));

        if (e) {
          b._until.setMilliseconds(b._until.getMilliseconds() + e);
        }
      }

      b._show = this._determineShow(b);
    },
    _preDestroy: function (a, b) {
      this._removeElem(a[0]);

      a.empty();
    },
    pause: function (a) {
      this._hold(a, 'pause');
    },
    lap: function (a) {
      this._hold(a, 'lap');
    },
    resume: function (a) {
      this._hold(a, null);
    },
    toggle: function (a) {
      var b = $.data(a, this.name) || {};
      this[!b._hold ? 'pause' : 'resume'](a);
    },
    toggleLap: function (a) {
      var b = $.data(a, this.name) || {};
      this[!b._hold ? 'lap' : 'resume'](a);
    },
    _hold: function (a, b) {
      var c = $.data(a, this.name);

      if (c) {
        if (c._hold == 'pause' && !b) {
          c._periods = c._savePeriods;
          var d = c._since ? '-' : '+';
          c[c._since ? '_since' : '_until'] = this._determineTime(d + c._periods[0] + 'y' + d + c._periods[1] + 'o' + d + c._periods[2] + 'w' + d + c._periods[3] + 'd' + d + c._periods[4] + 'h' + d + c._periods[5] + 'm' + d + c._periods[6] + 's');

          this._addElem(a);
        }

        c._hold = b;
        c._savePeriods = b == 'pause' ? c._periods : null;
        $.data(a, this.name, c);

        this._updateCountdown(a, c);
      }
    },
    getTimes: function (a) {
      var b = $.data(a, this.name);
      return !b ? null : b._hold == 'pause' ? b._savePeriods : !b._hold ? b._periods : this._calculatePeriods(b, b._show, b.options.significant, new Date());
    },
    _determineTime: function (k, l) {
      var m = this;

      var n = function (a) {
        var b = new Date();
        b.setTime(b.getTime() + a * 1000);
        return b;
      };

      var o = function (a) {
        a = a.toLowerCase();
        var b = new Date();
        var c = b.getFullYear();
        var d = b.getMonth();
        var e = b.getDate();
        var f = b.getHours();
        var g = b.getMinutes();
        var h = b.getSeconds();
        var i = /([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g;
        var j = i.exec(a);

        while (j) {
          switch (j[2] || 's') {
            case 's':
              h += parseInt(j[1], 10);
              break;

            case 'm':
              g += parseInt(j[1], 10);
              break;

            case 'h':
              f += parseInt(j[1], 10);
              break;

            case 'd':
              e += parseInt(j[1], 10);
              break;

            case 'w':
              e += parseInt(j[1], 10) * 7;
              break;

            case 'o':
              d += parseInt(j[1], 10);
              e = Math.min(e, m._getDaysInMonth(c, d));
              break;

            case 'y':
              c += parseInt(j[1], 10);
              e = Math.min(e, m._getDaysInMonth(c, d));
              break;
          }

          j = i.exec(a);
        }

        return new Date(c, d, e, f, g, h, 0);
      };

      var p = k == null ? l : typeof k == 'string' ? o(k) : typeof k == 'number' ? n(k) : k;
      if (p) p.setMilliseconds(0);
      return p;
    },
    _getDaysInMonth: function (a, b) {
      return 32 - new Date(a, b, 32).getDate();
    },
    _normalLabels: function (a) {
      return a;
    },
    _generateHTML: function (c) {
      var d = this;
      c._periods = c._hold ? c._periods : this._calculatePeriods(c, c._show, c.options.significant, new Date());
      var e = false;
      var f = 0;
      var g = c.options.significant;
      var h = $.extend({}, c._show);

      for (var i = Y; i <= S; i++) {
        e |= c._show[i] == '?' && c._periods[i] > 0;
        h[i] = c._show[i] == '?' && !e ? null : c._show[i];
        f += h[i] ? 1 : 0;
        g -= c._periods[i] > 0 ? 1 : 0;
      }

      var j = [false, false, false, false, false, false, false];

      for (var i = S; i >= Y; i--) {
        if (c._show[i]) {
          if (c._periods[i]) {
            j[i] = true;
          } else {
            j[i] = g > 0;
            g--;
          }
        }
      }

      var k = c.options.compact ? c.options.compactLabels : c.options.labels;
      var l = c.options.whichLabels || this._normalLabels;

      var m = function (a) {
        var b = c.options['compactLabels' + l(c._periods[a])];
        return h[a] ? d._translateDigits(c, c._periods[a]) + (b ? b[a] : k[a]) + ' ' : '';
      };

      var n = c.options.padZeroes ? 2 : 1;

      var o = function (a) {
        var b = c.options['labels' + l(c._periods[a])];
        return !c.options.significant && h[a] || c.options.significant && j[a] ? '<span class="' + d._sectionClass + '">' + '<span class="' + d._amountClass + '">' + d._minDigits(c, c._periods[a], n) + '</span>' + '<span class="' + d._periodClass + '">' + (b ? b[a] : k[a]) + '</span></span>' : '';
      };

      return c.options.layout ? this._buildLayout(c, h, c.options.layout, c.options.compact, c.options.significant, j) : (c.options.compact ? '<span class="' + this._rowClass + ' ' + this._amountClass + (c._hold ? ' ' + this._holdingClass : '') + '">' + m(Y) + m(O) + m(W) + m(D) + (h[H] ? this._minDigits(c, c._periods[H], 2) : '') + (h[M] ? (h[H] ? c.options.timeSeparator : '') + this._minDigits(c, c._periods[M], 2) : '') + (h[S] ? (h[H] || h[M] ? c.options.timeSeparator : '') + this._minDigits(c, c._periods[S], 2) : '') : '<span class="' + this._rowClass + ' ' + this._showClass + (c.options.significant || f) + (c._hold ? ' ' + this._holdingClass : '') + '">' + o(Y) + o(O) + o(W) + o(D) + o(H) + o(M) + o(S)) + '</span>' + (c.options.description ? '<span class="' + this._rowClass + ' ' + this._descrClass + '">' + c.options.description + '</span>' : '');
    },
    _buildLayout: function (c, d, e, f, g, h) {
      var j = c.options[f ? 'compactLabels' : 'labels'];
      var k = c.options.whichLabels || this._normalLabels;

      var l = function (a) {
        return (c.options[(f ? 'compactLabels' : 'labels') + k(c._periods[a])] || j)[a];
      };

      var m = function (a, b) {
        return c.options.digits[Math.floor(a / b) % 10];
      };

      var o = {
        desc: c.options.description,
        sep: c.options.timeSeparator,
        yl: l(Y),
        yn: this._minDigits(c, c._periods[Y], 1),
        ynn: this._minDigits(c, c._periods[Y], 2),
        ynnn: this._minDigits(c, c._periods[Y], 3),
        y1: m(c._periods[Y], 1),
        y10: m(c._periods[Y], 10),
        y100: m(c._periods[Y], 100),
        y1000: m(c._periods[Y], 1000),
        ol: l(O),
        on: this._minDigits(c, c._periods[O], 1),
        onn: this._minDigits(c, c._periods[O], 2),
        onnn: this._minDigits(c, c._periods[O], 3),
        o1: m(c._periods[O], 1),
        o10: m(c._periods[O], 10),
        o100: m(c._periods[O], 100),
        o1000: m(c._periods[O], 1000),
        wl: l(W),
        wn: this._minDigits(c, c._periods[W], 1),
        wnn: this._minDigits(c, c._periods[W], 2),
        wnnn: this._minDigits(c, c._periods[W], 3),
        w1: m(c._periods[W], 1),
        w10: m(c._periods[W], 10),
        w100: m(c._periods[W], 100),
        w1000: m(c._periods[W], 1000),
        dl: l(D),
        dn: this._minDigits(c, c._periods[D], 1),
        dnn: this._minDigits(c, c._periods[D], 2),
        dnnn: this._minDigits(c, c._periods[D], 3),
        d1: m(c._periods[D], 1),
        d10: m(c._periods[D], 10),
        d100: m(c._periods[D], 100),
        d1000: m(c._periods[D], 1000),
        hl: l(H),
        hn: this._minDigits(c, c._periods[H], 1),
        hnn: this._minDigits(c, c._periods[H], 2),
        hnnn: this._minDigits(c, c._periods[H], 3),
        h1: m(c._periods[H], 1),
        h10: m(c._periods[H], 10),
        h100: m(c._periods[H], 100),
        h1000: m(c._periods[H], 1000),
        ml: l(M),
        mn: this._minDigits(c, c._periods[M], 1),
        mnn: this._minDigits(c, c._periods[M], 2),
        mnnn: this._minDigits(c, c._periods[M], 3),
        m1: m(c._periods[M], 1),
        m10: m(c._periods[M], 10),
        m100: m(c._periods[M], 100),
        m1000: m(c._periods[M], 1000),
        sl: l(S),
        sn: this._minDigits(c, c._periods[S], 1),
        snn: this._minDigits(c, c._periods[S], 2),
        snnn: this._minDigits(c, c._periods[S], 3),
        s1: m(c._periods[S], 1),
        s10: m(c._periods[S], 10),
        s100: m(c._periods[S], 100),
        s1000: m(c._periods[S], 1000)
      };
      var p = e;

      for (var i = Y; i <= S; i++) {
        var q = 'yowdhms'.charAt(i);
        var r = new RegExp('\\{' + q + '<\\}([\\s\\S]*)\\{' + q + '>\\}', 'g');
        p = p.replace(r, !g && d[i] || g && h[i] ? '$1' : '');
      }

      $.each(o, function (n, v) {
        var a = new RegExp('\\{' + n + '\\}', 'g');
        p = p.replace(a, v);
      });
      return p;
    },
    _minDigits: function (a, b, c) {
      b = '' + b;

      if (b.length >= c) {
        return this._translateDigits(a, b);
      }

      b = '0000000000' + b;
      return this._translateDigits(a, b.substr(b.length - c));
    },
    _translateDigits: function (b, c) {
      return ('' + c).replace(/[0-9]/g, function (a) {
        return b.options.digits[a];
      });
    },
    _determineShow: function (a) {
      var b = a.options.format;
      var c = [];
      c[Y] = b.match('y') ? '?' : b.match('Y') ? '!' : null;
      c[O] = b.match('o') ? '?' : b.match('O') ? '!' : null;
      c[W] = b.match('w') ? '?' : b.match('W') ? '!' : null;
      c[D] = b.match('d') ? '?' : b.match('D') ? '!' : null;
      c[H] = b.match('h') ? '?' : b.match('H') ? '!' : null;
      c[M] = b.match('m') ? '?' : b.match('M') ? '!' : null;
      c[S] = b.match('s') ? '?' : b.match('S') ? '!' : null;
      return c;
    },
    _calculatePeriods: function (c, d, e, f) {
      c._now = f;

      c._now.setMilliseconds(0);

      var g = new Date(c._now.getTime());

      if (c._since) {
        if (f.getTime() < c._since.getTime()) {
          c._now = f = g;
        } else {
          f = c._since;
        }
      } else {
        g.setTime(c._until.getTime());

        if (f.getTime() > c._until.getTime()) {
          c._now = f = g;
        }
      }

      var h = [0, 0, 0, 0, 0, 0, 0];

      if (d[Y] || d[O]) {
        var i = this._getDaysInMonth(f.getFullYear(), f.getMonth());

        var j = this._getDaysInMonth(g.getFullYear(), g.getMonth());

        var k = g.getDate() == f.getDate() || g.getDate() >= Math.min(i, j) && f.getDate() >= Math.min(i, j);

        var l = function (a) {
          return (a.getHours() * 60 + a.getMinutes()) * 60 + a.getSeconds();
        };

        var m = Math.max(0, (g.getFullYear() - f.getFullYear()) * 12 + g.getMonth() - f.getMonth() + (g.getDate() < f.getDate() && !k || k && l(g) < l(f) ? -1 : 0));
        h[Y] = d[Y] ? Math.floor(m / 12) : 0;
        h[O] = d[O] ? m - h[Y] * 12 : 0;
        f = new Date(f.getTime());
        var n = f.getDate() == i;

        var o = this._getDaysInMonth(f.getFullYear() + h[Y], f.getMonth() + h[O]);

        if (f.getDate() > o) {
          f.setDate(o);
        }

        f.setFullYear(f.getFullYear() + h[Y]);
        f.setMonth(f.getMonth() + h[O]);

        if (n) {
          f.setDate(o);
        }
      }

      var p = Math.floor((g.getTime() - f.getTime()) / 1000);

      var q = function (a, b) {
        h[a] = d[a] ? Math.floor(p / b) : 0;
        p -= h[a] * b;
      };

      q(W, 604800);
      q(D, 86400);
      q(H, 3600);
      q(M, 60);
      q(S, 1);

      if (p > 0 && !c._since) {
        var r = [1, 12, 4.3482, 7, 24, 60, 60];
        var s = S;
        var t = 1;

        for (var u = S; u >= Y; u--) {
          if (d[u]) {
            if (h[s] >= t) {
              h[s] = 0;
              p = 1;
            }

            if (p > 0) {
              h[u]++;
              p = 0;
              s = u;
              t = 1;
            }
          }

          t *= r[u];
        }
      }

      if (e) {
        for (var u = Y; u <= S; u++) {
          if (e && h[u]) {
            e--;
          } else if (!e) {
            h[u] = 0;
          }
        }
      }

      return h;
    }
  });
})(jQuery);

/***/ }),

/***/ "./assets/js/jquery.plugin.min.js":
/*!****************************************!*\
  !*** ./assets/js/jquery.plugin.min.js ***!
  \****************************************/
/***/ (function() {

/** Abstract base class for collection plugins v1.0.1.
	Written by Keith Wood (kbwood{at}iinet.com.au) December 2013.
	Licensed under the MIT (http://keith-wood.name/licence.html) license. */
(function () {
  var j = false;

  window.JQClass = function () {};

  JQClass.classes = {};

  JQClass.extend = function extender(f) {
    var g = this.prototype;
    j = true;
    var h = new this();
    j = false;

    for (var i in f) {
      h[i] = typeof f[i] == 'function' && typeof g[i] == 'function' ? function (d, e) {
        return function () {
          var b = this._super;

          this._super = function (a) {
            return g[d].apply(this, a || []);
          };

          var c = e.apply(this, arguments);
          this._super = b;
          return c;
        };
      }(i, f[i]) : f[i];
    }

    function JQClass() {
      if (!j && this._init) {
        this._init.apply(this, arguments);
      }
    }

    JQClass.prototype = h;
    JQClass.prototype.constructor = JQClass;
    JQClass.extend = extender;
    return JQClass;
  };
})();

(function ($) {
  JQClass.classes.JQPlugin = JQClass.extend({
    name: 'plugin',
    defaultOptions: {},
    regionalOptions: {},
    _getters: [],
    _getMarker: function () {
      return 'is-' + this.name;
    },
    _init: function () {
      $.extend(this.defaultOptions, this.regionalOptions && this.regionalOptions[''] || {});
      var c = camelCase(this.name);
      $[c] = this;

      $.fn[c] = function (a) {
        var b = Array.prototype.slice.call(arguments, 1);

        if ($[c]._isNotChained(a, b)) {
          return $[c][a].apply($[c], [this[0]].concat(b));
        }

        return this.each(function () {
          if (typeof a === 'string') {
            if (a[0] === '_' || !$[c][a]) {
              throw 'Unknown method: ' + a;
            }

            $[c][a].apply($[c], [this].concat(b));
          } else {
            $[c]._attach(this, a);
          }
        });
      };
    },
    setDefaults: function (a) {
      $.extend(this.defaultOptions, a || {});
    },
    _isNotChained: function (a, b) {
      if (a === 'option' && (b.length === 0 || b.length === 1 && typeof b[0] === 'string')) {
        return true;
      }

      return $.inArray(a, this._getters) > -1;
    },
    _attach: function (a, b) {
      a = $(a);

      if (a.hasClass(this._getMarker())) {
        return;
      }

      a.addClass(this._getMarker());
      b = $.extend({}, this.defaultOptions, this._getMetadata(a), b || {});
      var c = $.extend({
        name: this.name,
        elem: a,
        options: b
      }, this._instSettings(a, b));
      a.data(this.name, c);

      this._postAttach(a, c);

      this.option(a, b);
    },
    _instSettings: function (a, b) {
      return {};
    },
    _postAttach: function (a, b) {},
    _getMetadata: function (d) {
      try {
        var f = d.data(this.name.toLowerCase()) || '';
        f = f.replace(/'/g, '"');
        f = f.replace(/([a-zA-Z0-9]+):/g, function (a, b, i) {
          var c = f.substring(0, i).match(/"/g);
          return !c || c.length % 2 === 0 ? '"' + b + '":' : b + ':';
        });
        f = $.parseJSON('{' + f + '}');

        for (var g in f) {
          var h = f[g];

          if (typeof h === 'string' && h.match(/^new Date\((.*)\)$/)) {
            f[g] = eval(h);
          }
        }

        return f;
      } catch (e) {
        return {};
      }
    },
    _getInst: function (a) {
      return $(a).data(this.name) || {};
    },
    option: function (a, b, c) {
      a = $(a);
      var d = a.data(this.name);

      if (!b || typeof b === 'string' && c == null) {
        var e = (d || {}).options;
        return e && b ? e[b] : e;
      }

      if (!a.hasClass(this._getMarker())) {
        return;
      }

      var e = b || {};

      if (typeof b === 'string') {
        e = {};
        e[b] = c;
      }

      this._optionsChanged(a, d, e);

      $.extend(d.options, e);
    },
    _optionsChanged: function (a, b, c) {},
    destroy: function (a) {
      a = $(a);

      if (!a.hasClass(this._getMarker())) {
        return;
      }

      this._preDestroy(a, this._getInst(a));

      a.removeData(this.name).removeClass(this._getMarker());
    },
    _preDestroy: function (a, b) {}
  });

  function camelCase(c) {
    return c.replace(/-([a-z])/g, function (a, b) {
      return b.toUpperCase();
    });
  }

  $.JQPlugin = {
    createPlugin: function (a, b) {
      if (typeof a === 'object') {
        b = a;
        a = 'JQPlugin';
      }

      a = camelCase(a);
      var c = camelCase(b.name);
      JQClass.classes[c] = JQClass.classes[a].extend(b);
      new JQClass.classes[c]();
    }
  };
})(jQuery);

/***/ }),

/***/ "./assets/js/slick.min.js":
/*!********************************!*\
  !*** ./assets/js/slick.min.js ***!
  \********************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;!function (i) {
  "use strict";

   true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "jquery")], __WEBPACK_AMD_DEFINE_FACTORY__ = (i),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(function (i) {
  "use strict";

  var e = window.Slick || {};
  (e = function () {
    var e = 0;
    return function (t, o) {
      var s,
          n = this;
      n.defaults = {
        accessibility: !0,
        adaptiveHeight: !1,
        appendArrows: i(t),
        appendDots: i(t),
        arrows: !0,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: !1,
        autoplaySpeed: 3e3,
        centerMode: !1,
        centerPadding: "50px",
        cssEase: "ease",
        customPaging: function (e, t) {
          return i('<button type="button" />').text(t + 1);
        },
        dots: !1,
        dotsClass: "slick-dots",
        draggable: !0,
        easing: "linear",
        edgeFriction: .35,
        fade: !1,
        focusOnSelect: !1,
        focusOnChange: !1,
        infinite: !0,
        initialSlide: 0,
        lazyLoad: "ondemand",
        mobileFirst: !1,
        pauseOnHover: !0,
        pauseOnFocus: !0,
        pauseOnDotsHover: !1,
        respondTo: "window",
        responsive: null,
        rows: 1,
        rtl: !1,
        slide: "",
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        swipe: !0,
        swipeToSlide: !1,
        touchMove: !0,
        touchThreshold: 5,
        useCSS: !0,
        useTransform: !0,
        variableWidth: !1,
        vertical: !1,
        verticalSwiping: !1,
        waitForAnimate: !0,
        zIndex: 1e3
      }, n.initials = {
        animating: !1,
        dragging: !1,
        autoPlayTimer: null,
        currentDirection: 0,
        currentLeft: null,
        currentSlide: 0,
        direction: 1,
        $dots: null,
        listWidth: null,
        listHeight: null,
        loadIndex: 0,
        $nextArrow: null,
        $prevArrow: null,
        scrolling: !1,
        slideCount: null,
        slideWidth: null,
        $slideTrack: null,
        $slides: null,
        sliding: !1,
        slideOffset: 0,
        swipeLeft: null,
        swiping: !1,
        $list: null,
        touchObject: {},
        transformsEnabled: !1,
        unslicked: !1
      }, i.extend(n, n.initials), n.activeBreakpoint = null, n.animType = null, n.animProp = null, n.breakpoints = [], n.breakpointSettings = [], n.cssTransitions = !1, n.focussed = !1, n.interrupted = !1, n.hidden = "hidden", n.paused = !0, n.positionProp = null, n.respondTo = null, n.rowCount = 1, n.shouldClick = !0, n.$slider = i(t), n.$slidesCache = null, n.transformType = null, n.transitionType = null, n.visibilityChange = "visibilitychange", n.windowWidth = 0, n.windowTimer = null, s = i(t).data("slick") || {}, n.options = i.extend({}, n.defaults, o, s), n.currentSlide = n.options.initialSlide, n.originalSettings = n.options, void 0 !== document.mozHidden ? (n.hidden = "mozHidden", n.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (n.hidden = "webkitHidden", n.visibilityChange = "webkitvisibilitychange"), n.autoPlay = i.proxy(n.autoPlay, n), n.autoPlayClear = i.proxy(n.autoPlayClear, n), n.autoPlayIterator = i.proxy(n.autoPlayIterator, n), n.changeSlide = i.proxy(n.changeSlide, n), n.clickHandler = i.proxy(n.clickHandler, n), n.selectHandler = i.proxy(n.selectHandler, n), n.setPosition = i.proxy(n.setPosition, n), n.swipeHandler = i.proxy(n.swipeHandler, n), n.dragHandler = i.proxy(n.dragHandler, n), n.keyHandler = i.proxy(n.keyHandler, n), n.instanceUid = e++, n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, n.registerBreakpoints(), n.init(!0);
    };
  }()).prototype.activateADA = function () {
    this.$slideTrack.find(".slick-active").attr({
      "aria-hidden": "false"
    }).find("a, input, button, select").attr({
      tabindex: "0"
    });
  }, e.prototype.addSlide = e.prototype.slickAdd = function (e, t, o) {
    var s = this;
    if ("boolean" == typeof t) o = t, t = null;else if (t < 0 || t >= s.slideCount) return !1;
    s.unload(), "number" == typeof t ? 0 === t && 0 === s.$slides.length ? i(e).appendTo(s.$slideTrack) : o ? i(e).insertBefore(s.$slides.eq(t)) : i(e).insertAfter(s.$slides.eq(t)) : !0 === o ? i(e).prependTo(s.$slideTrack) : i(e).appendTo(s.$slideTrack), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e);
    }), s.$slidesCache = s.$slides, s.reinit();
  }, e.prototype.animateHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.animate({
        height: e
      }, i.options.speed);
    }
  }, e.prototype.animateSlide = function (e, t) {
    var o = {},
        s = this;
    s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical && (e = -e), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s.$slideTrack.animate({
      left: e
    }, s.options.speed, s.options.easing, t) : s.$slideTrack.animate({
      top: e
    }, s.options.speed, s.options.easing, t) : !1 === s.cssTransitions ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft), i({
      animStart: s.currentLeft
    }).animate({
      animStart: e
    }, {
      duration: s.options.speed,
      easing: s.options.easing,
      step: function (i) {
        i = Math.ceil(i), !1 === s.options.vertical ? (o[s.animType] = "translate(" + i + "px, 0px)", s.$slideTrack.css(o)) : (o[s.animType] = "translate(0px," + i + "px)", s.$slideTrack.css(o));
      },
      complete: function () {
        t && t.call();
      }
    })) : (s.applyTransition(), e = Math.ceil(e), !1 === s.options.vertical ? o[s.animType] = "translate3d(" + e + "px, 0px, 0px)" : o[s.animType] = "translate3d(0px," + e + "px, 0px)", s.$slideTrack.css(o), t && setTimeout(function () {
      s.disableTransition(), t.call();
    }, s.options.speed));
  }, e.prototype.getNavTarget = function () {
    var e = this,
        t = e.options.asNavFor;
    return t && null !== t && (t = i(t).not(e.$slider)), t;
  }, e.prototype.asNavFor = function (e) {
    var t = this.getNavTarget();
    null !== t && "object" == typeof t && t.each(function () {
      var t = i(this).slick("getSlick");
      t.unslicked || t.slideHandler(e, !0);
    });
  }, e.prototype.applyTransition = function (i) {
    var e = this,
        t = {};
    !1 === e.options.fade ? t[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : t[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.autoPlay = function () {
    var i = this;
    i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i.autoPlayTimer = setInterval(i.autoPlayIterator, i.options.autoplaySpeed));
  }, e.prototype.autoPlayClear = function () {
    var i = this;
    i.autoPlayTimer && clearInterval(i.autoPlayTimer);
  }, e.prototype.autoPlayIterator = function () {
    var i = this,
        e = i.currentSlide + i.options.slidesToScroll;
    i.paused || i.interrupted || i.focussed || (!1 === i.options.infinite && (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? i.direction = 0 : 0 === i.direction && (e = i.currentSlide - i.options.slidesToScroll, i.currentSlide - 1 == 0 && (i.direction = 1))), i.slideHandler(e));
  }, e.prototype.buildArrows = function () {
    var e = this;
    !0 === e.options.arrows && (e.$prevArrow = i(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = i(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
      "aria-disabled": "true",
      tabindex: "-1"
    }));
  }, e.prototype.buildDots = function () {
    var e,
        t,
        o = this;

    if (!0 === o.options.dots) {
      for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) t.append(i("<li />").append(o.options.customPaging.call(this, o, e)));

      o.$dots = t.appendTo(o.options.appendDots), o.$dots.find("li").first().addClass("slick-active");
    }
  }, e.prototype.buildOut = function () {
    var e = this;
    e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e).data("originalStyling", i(t).attr("style") || "");
    }), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e.slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1), i("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e.options.draggable && e.$list.addClass("draggable");
  }, e.prototype.buildRows = function () {
    var i,
        e,
        t,
        o,
        s,
        n,
        r,
        l = this;

    if (o = document.createDocumentFragment(), n = l.$slider.children(), l.options.rows > 1) {
      for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n.length / r), i = 0; i < s; i++) {
        var d = document.createElement("div");

        for (e = 0; e < l.options.rows; e++) {
          var a = document.createElement("div");

          for (t = 0; t < l.options.slidesPerRow; t++) {
            var c = i * r + (e * l.options.slidesPerRow + t);
            n.get(c) && a.appendChild(n.get(c));
          }

          d.appendChild(a);
        }

        o.appendChild(d);
      }

      l.$slider.empty().append(o), l.$slider.children().children().children().css({
        width: 100 / l.options.slidesPerRow + "%",
        display: "inline-block"
      });
    }
  }, e.prototype.checkResponsive = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = !1,
        d = r.$slider.width(),
        a = window.innerWidth || i(window).width();

    if ("window" === r.respondTo ? n = a : "slider" === r.respondTo ? n = d : "min" === r.respondTo && (n = Math.min(a, d)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive) {
      s = null;

      for (o in r.breakpoints) r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));

      null !== s ? null !== r.activeBreakpoint ? (s !== r.activeBreakpoint || t) && (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : null !== r.activeBreakpoint && (r.activeBreakpoint = null, r.options = r.originalSettings, !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), l = s), e || !1 === l || r.$slider.trigger("breakpoint", [r, l]);
    }
  }, e.prototype.changeSlide = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = i(e.currentTarget);

    switch (l.is("a") && e.preventDefault(), l.is("li") || (l = l.closest("li")), n = r.slideCount % r.options.slidesToScroll != 0, o = n ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll, e.data.message) {
      case "previous":
        s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide - s, !1, t);
        break;

      case "next":
        s = 0 === o ? r.options.slidesToScroll : o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide + s, !1, t);
        break;

      case "index":
        var d = 0 === e.data.index ? 0 : e.data.index || l.index() * r.options.slidesToScroll;
        r.slideHandler(r.checkNavigable(d), !1, t), l.children().trigger("focus");
        break;

      default:
        return;
    }
  }, e.prototype.checkNavigable = function (i) {
    var e, t;
    if (e = this.getNavigableIndexes(), t = 0, i > e[e.length - 1]) i = e[e.length - 1];else for (var o in e) {
      if (i < e[o]) {
        i = t;
        break;
      }

      t = e[o];
    }
    return i;
  }, e.prototype.cleanUpEvents = function () {
    var e = this;
    e.options.dots && null !== e.$dots && (i("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e.interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt, e, !1)), !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)), e.$slider.off("focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), i(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().off("click.slick", e.selectHandler), i(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), i(window).off("resize.slick.slick-" + e.instanceUid, e.resize), i("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), i(window).off("load.slick.slick-" + e.instanceUid, e.setPosition);
  }, e.prototype.cleanUpSlideEvents = function () {
    var e = this;
    e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.cleanUpRows = function () {
    var i,
        e = this;
    e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr("style"), e.$slider.empty().append(i));
  }, e.prototype.clickHandler = function (i) {
    !1 === this.shouldClick && (i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault());
  }, e.prototype.destroy = function (e) {
    var t = this;
    t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), i(".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t.$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t.$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t.$slides && (t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
      i(this).attr("style", i(this).data("originalStyling"));
    }), t.$slideTrack.children(this.options.slide).detach(), t.$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider.removeClass("slick-initialized"), t.$slider.removeClass("slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy", [t]);
  }, e.prototype.disableTransition = function (i) {
    var e = this,
        t = {};
    t[e.transitionType] = "", !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.fadeSlide = function (i, e) {
    var t = this;
    !1 === t.cssTransitions ? (t.$slides.eq(i).css({
      zIndex: t.options.zIndex
    }), t.$slides.eq(i).animate({
      opacity: 1
    }, t.options.speed, t.options.easing, e)) : (t.applyTransition(i), t.$slides.eq(i).css({
      opacity: 1,
      zIndex: t.options.zIndex
    }), e && setTimeout(function () {
      t.disableTransition(i), e.call();
    }, t.options.speed));
  }, e.prototype.fadeSlideOut = function (i) {
    var e = this;
    !1 === e.cssTransitions ? e.$slides.eq(i).animate({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }, e.options.speed, e.options.easing) : (e.applyTransition(i), e.$slides.eq(i).css({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }));
  }, e.prototype.filterSlides = e.prototype.slickFilter = function (i) {
    var e = this;
    null !== i && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(i).appendTo(e.$slideTrack), e.reinit());
  }, e.prototype.focusHandler = function () {
    var e = this;
    e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (t) {
      t.stopImmediatePropagation();
      var o = i(this);
      setTimeout(function () {
        e.options.pauseOnFocus && (e.focussed = o.is(":focus"), e.autoPlay());
      }, 0);
    });
  }, e.prototype.getCurrent = e.prototype.slickCurrentSlide = function () {
    return this.currentSlide;
  }, e.prototype.getDotCount = function () {
    var i = this,
        e = 0,
        t = 0,
        o = 0;
    if (!0 === i.options.infinite) {
      if (i.slideCount <= i.options.slidesToShow) ++o;else for (; e < i.slideCount;) ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;
    } else if (!0 === i.options.centerMode) o = i.slideCount;else if (i.options.asNavFor) for (; e < i.slideCount;) ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i.options.slidesToScroll);
    return o - 1;
  }, e.prototype.getLeft = function (i) {
    var e,
        t,
        o,
        s,
        n = this,
        r = 0;
    return n.slideOffset = 0, t = n.$slides.first().outerHeight(!0), !0 === n.options.infinite ? (n.slideCount > n.options.slidesToShow && (n.slideOffset = n.slideWidth * n.options.slidesToShow * -1, s = -1, !0 === n.options.vertical && !0 === n.options.centerMode && (2 === n.options.slidesToShow ? s = -1.5 : 1 === n.options.slidesToShow && (s = -2)), r = t * n.options.slidesToShow * s), n.slideCount % n.options.slidesToScroll != 0 && i + n.options.slidesToScroll > n.slideCount && n.slideCount > n.options.slidesToShow && (i > n.slideCount ? (n.slideOffset = (n.options.slidesToShow - (i - n.slideCount)) * n.slideWidth * -1, r = (n.options.slidesToShow - (i - n.slideCount)) * t * -1) : (n.slideOffset = n.slideCount % n.options.slidesToScroll * n.slideWidth * -1, r = n.slideCount % n.options.slidesToScroll * t * -1))) : i + n.options.slidesToShow > n.slideCount && (n.slideOffset = (i + n.options.slidesToShow - n.slideCount) * n.slideWidth, r = (i + n.options.slidesToShow - n.slideCount) * t), n.slideCount <= n.options.slidesToShow && (n.slideOffset = 0, r = 0), !0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow ? n.slideOffset = n.slideWidth * Math.floor(n.options.slidesToShow) / 2 - n.slideWidth * n.slideCount / 2 : !0 === n.options.centerMode && !0 === n.options.infinite ? n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2) - n.slideWidth : !0 === n.options.centerMode && (n.slideOffset = 0, n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2)), e = !1 === n.options.vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r, !0 === n.options.variableWidth && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, !0 === n.options.centerMode && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow + 1), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, e += (n.$list.width() - o.outerWidth()) / 2)), e;
  }, e.prototype.getOption = e.prototype.slickGetOption = function (i) {
    return this.options[i];
  }, e.prototype.getNavigableIndexes = function () {
    var i,
        e = this,
        t = 0,
        o = 0,
        s = [];

    for (!1 === e.options.infinite ? i = e.slideCount : (t = -1 * e.options.slidesToScroll, o = -1 * e.options.slidesToScroll, i = 2 * e.slideCount); t < i;) s.push(t), t = o + e.options.slidesToScroll, o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;

    return s;
  }, e.prototype.getSlick = function () {
    return this;
  }, e.prototype.getSlideCount = function () {
    var e,
        t,
        o = this;
    return t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each(function (s, n) {
      if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft) return e = n, !1;
    }), Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll;
  }, e.prototype.goTo = e.prototype.slickGoTo = function (i, e) {
    this.changeSlide({
      data: {
        message: "index",
        index: parseInt(i)
      }
    }, e);
  }, e.prototype.init = function (e) {
    var t = this;
    i(t.$slider).hasClass("slick-initialized") || (i(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()), e && t.$slider.trigger("init", [t]), !0 === t.options.accessibility && t.initADA(), t.options.autoplay && (t.paused = !1, t.autoPlay());
  }, e.prototype.initADA = function () {
    var e = this,
        t = Math.ceil(e.slideCount / e.options.slidesToShow),
        o = e.getNavigableIndexes().filter(function (i) {
      return i >= 0 && i < e.slideCount;
    });
    e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
      "aria-hidden": "true",
      tabindex: "-1"
    }).find("a, input, button, select").attr({
      tabindex: "-1"
    }), null !== e.$dots && (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
      var s = o.indexOf(t);
      i(this).attr({
        role: "tabpanel",
        id: "slick-slide" + e.instanceUid + t,
        tabindex: -1
      }), -1 !== s && i(this).attr({
        "aria-describedby": "slick-slide-control" + e.instanceUid + s
      });
    }), e.$dots.attr("role", "tablist").find("li").each(function (s) {
      var n = o[s];
      i(this).attr({
        role: "presentation"
      }), i(this).find("button").first().attr({
        role: "tab",
        id: "slick-slide-control" + e.instanceUid + s,
        "aria-controls": "slick-slide" + e.instanceUid + n,
        "aria-label": s + 1 + " of " + t,
        "aria-selected": null,
        tabindex: "-1"
      });
    }).eq(e.currentSlide).find("button").attr({
      "aria-selected": "true",
      tabindex: "0"
    }).end());

    for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++) e.$slides.eq(s).attr("tabindex", 0);

    e.activateADA();
  }, e.prototype.initArrowEvents = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.off("click.slick").on("click.slick", {
      message: "previous"
    }, i.changeSlide), i.$nextArrow.off("click.slick").on("click.slick", {
      message: "next"
    }, i.changeSlide), !0 === i.options.accessibility && (i.$prevArrow.on("keydown.slick", i.keyHandler), i.$nextArrow.on("keydown.slick", i.keyHandler)));
  }, e.prototype.initDotEvents = function () {
    var e = this;
    !0 === e.options.dots && (i("li", e.$dots).on("click.slick", {
      message: "index"
    }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)), !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i.proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.initSlideEvents = function () {
    var e = this;
    e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e.interrupt, e, !1)));
  }, e.prototype.initializeEvents = function () {
    var e = this;
    e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
      action: "start"
    }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
      action: "move"
    }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), i(document).on(e.visibilityChange, i.proxy(e.visibility, e)), !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), i(window).on("orientationchange.slick.slick-" + e.instanceUid, i.proxy(e.orientationChange, e)), i(window).on("resize.slick.slick-" + e.instanceUid, i.proxy(e.resize, e)), i("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), i(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), i(e.setPosition);
  }, e.prototype.initUI = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.show();
  }, e.prototype.keyHandler = function (i) {
    var e = this;
    i.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === i.keyCode && !0 === e.options.accessibility ? e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "next" : "previous"
      }
    }) : 39 === i.keyCode && !0 === e.options.accessibility && e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "previous" : "next"
      }
    }));
  }, e.prototype.lazyLoad = function () {
    function e(e) {
      i("img[data-lazy]", e).each(function () {
        var e = i(this),
            t = i(this).attr("data-lazy"),
            o = i(this).attr("data-srcset"),
            s = i(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
            r = document.createElement("img");
        r.onload = function () {
          e.animate({
            opacity: 0
          }, 100, function () {
            o && (e.attr("srcset", o), s && e.attr("sizes", s)), e.attr("src", t).animate({
              opacity: 1
            }, 200, function () {
              e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
            }), n.$slider.trigger("lazyLoaded", [n, e, t]);
          });
        }, r.onerror = function () {
          e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t]);
        }, r.src = t;
      });
    }

    var t,
        o,
        s,
        n = this;
    if (!0 === n.options.centerMode ? !0 === n.options.infinite ? s = (o = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2 : (o = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1)), s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide) : (o = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide, s = Math.ceil(o + n.options.slidesToShow), !0 === n.options.fade && (o > 0 && o--, s <= n.slideCount && s++)), t = n.$slider.find(".slick-slide").slice(o, s), "anticipated" === n.options.lazyLoad) for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) r < 0 && (r = n.slideCount - 1), t = (t = t.add(d.eq(r))).add(d.eq(l)), r--, l++;
    e(t), n.slideCount <= n.options.slidesToShow ? e(n.$slider.find(".slick-slide")) : n.currentSlide >= n.slideCount - n.options.slidesToShow ? e(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) : 0 === n.currentSlide && e(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow));
  }, e.prototype.loadSlider = function () {
    var i = this;
    i.setPosition(), i.$slideTrack.css({
      opacity: 1
    }), i.$slider.removeClass("slick-loading"), i.initUI(), "progressive" === i.options.lazyLoad && i.progressiveLazyLoad();
  }, e.prototype.next = e.prototype.slickNext = function () {
    this.changeSlide({
      data: {
        message: "next"
      }
    });
  }, e.prototype.orientationChange = function () {
    var i = this;
    i.checkResponsive(), i.setPosition();
  }, e.prototype.pause = e.prototype.slickPause = function () {
    var i = this;
    i.autoPlayClear(), i.paused = !0;
  }, e.prototype.play = e.prototype.slickPlay = function () {
    var i = this;
    i.autoPlay(), i.options.autoplay = !0, i.paused = !1, i.focussed = !1, i.interrupted = !1;
  }, e.prototype.postSlide = function (e) {
    var t = this;
    t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t.animating = !1, t.slideCount > t.options.slidesToShow && t.setPosition(), t.swipeLeft = null, t.options.autoplay && t.autoPlay(), !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()));
  }, e.prototype.prev = e.prototype.slickPrev = function () {
    this.changeSlide({
      data: {
        message: "previous"
      }
    });
  }, e.prototype.preventDefault = function (i) {
    i.preventDefault();
  }, e.prototype.progressiveLazyLoad = function (e) {
    e = e || 1;
    var t,
        o,
        s,
        n,
        r,
        l = this,
        d = i("img[data-lazy]", l.$slider);
    d.length ? (t = d.first(), o = t.attr("data-lazy"), s = t.attr("data-srcset"), n = t.attr("data-sizes") || l.$slider.attr("data-sizes"), (r = document.createElement("img")).onload = function () {
      s && (t.attr("srcset", s), n && t.attr("sizes", n)), t.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === l.options.adaptiveHeight && l.setPosition(), l.$slider.trigger("lazyLoaded", [l, t, o]), l.progressiveLazyLoad();
    }, r.onerror = function () {
      e < 3 ? setTimeout(function () {
        l.progressiveLazyLoad(e + 1);
      }, 500) : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), l.$slider.trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad());
    }, r.src = o) : l.$slider.trigger("allImagesLoaded", [l]);
  }, e.prototype.refresh = function (e) {
    var t,
        o,
        s = this;
    o = s.slideCount - s.options.slidesToShow, !s.options.infinite && s.currentSlide > o && (s.currentSlide = o), s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0), t = s.currentSlide, s.destroy(!0), i.extend(s, s.initials, {
      currentSlide: t
    }), s.init(), e || s.changeSlide({
      data: {
        message: "index",
        index: t
      }
    }, !1);
  }, e.prototype.registerBreakpoints = function () {
    var e,
        t,
        o,
        s = this,
        n = s.options.responsive || null;

    if ("array" === i.type(n) && n.length) {
      s.respondTo = s.options.respondTo || "window";

      for (e in n) if (o = s.breakpoints.length - 1, n.hasOwnProperty(e)) {
        for (t = n[e].breakpoint; o >= 0;) s.breakpoints[o] && s.breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;

        s.breakpoints.push(t), s.breakpointSettings[t] = n[e].settings;
      }

      s.breakpoints.sort(function (i, e) {
        return s.options.mobileFirst ? i - e : e - i;
      });
    }
  }, e.prototype.reinit = function () {
    var e = this;
    e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e]);
  }, e.prototype.resize = function () {
    var e = this;
    i(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function () {
      e.windowWidth = i(window).width(), e.checkResponsive(), e.unslicked || e.setPosition();
    }, 50));
  }, e.prototype.removeSlide = e.prototype.slickRemove = function (i, e, t) {
    var o = this;
    if (i = "boolean" == typeof i ? !0 === (e = i) ? 0 : o.slideCount - 1 : !0 === e ? --i : i, o.slideCount < 1 || i < 0 || i > o.slideCount - 1) return !1;
    o.unload(), !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(i).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit();
  }, e.prototype.setCSS = function (i) {
    var e,
        t,
        o = this,
        s = {};
    !0 === o.options.rtl && (i = -i), e = "left" == o.positionProp ? Math.ceil(i) + "px" : "0px", t = "top" == o.positionProp ? Math.ceil(i) + "px" : "0px", s[o.positionProp] = i, !1 === o.transformsEnabled ? o.$slideTrack.css(s) : (s = {}, !1 === o.cssTransitions ? (s[o.animType] = "translate(" + e + ", " + t + ")", o.$slideTrack.css(s)) : (s[o.animType] = "translate3d(" + e + ", " + t + ", 0px)", o.$slideTrack.css(s)));
  }, e.prototype.setDimensions = function () {
    var i = this;
    !1 === i.options.vertical ? !0 === i.options.centerMode && i.$list.css({
      padding: "0px " + i.options.centerPadding
    }) : (i.$list.height(i.$slides.first().outerHeight(!0) * i.options.slidesToShow), !0 === i.options.centerMode && i.$list.css({
      padding: i.options.centerPadding + " 0px"
    })), i.listWidth = i.$list.width(), i.listHeight = i.$list.height(), !1 === i.options.vertical && !1 === i.options.variableWidth ? (i.slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow), i.$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(".slick-slide").length))) : !0 === i.options.variableWidth ? i.$slideTrack.width(5e3 * i.slideCount) : (i.slideWidth = Math.ceil(i.listWidth), i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0) * i.$slideTrack.children(".slick-slide").length)));
    var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
    !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide").width(i.slideWidth - e);
  }, e.prototype.setFade = function () {
    var e,
        t = this;
    t.$slides.each(function (o, s) {
      e = t.slideWidth * o * -1, !0 === t.options.rtl ? i(s).css({
        position: "relative",
        right: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      }) : i(s).css({
        position: "relative",
        left: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      });
    }), t.$slides.eq(t.currentSlide).css({
      zIndex: t.options.zIndex - 1,
      opacity: 1
    });
  }, e.prototype.setHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.css("height", e);
    }
  }, e.prototype.setOption = e.prototype.slickSetOption = function () {
    var e,
        t,
        o,
        s,
        n,
        r = this,
        l = !1;
    if ("object" === i.type(arguments[0]) ? (o = arguments[0], l = arguments[1], n = "multiple") : "string" === i.type(arguments[0]) && (o = arguments[0], s = arguments[1], l = arguments[2], "responsive" === arguments[0] && "array" === i.type(arguments[1]) ? n = "responsive" : void 0 !== arguments[1] && (n = "single")), "single" === n) r.options[o] = s;else if ("multiple" === n) i.each(o, function (i, e) {
      r.options[i] = e;
    });else if ("responsive" === n) for (t in s) if ("array" !== i.type(r.options.responsive)) r.options.responsive = [s[t]];else {
      for (e = r.options.responsive.length - 1; e >= 0;) r.options.responsive[e].breakpoint === s[t].breakpoint && r.options.responsive.splice(e, 1), e--;

      r.options.responsive.push(s[t]);
    }
    l && (r.unload(), r.reinit());
  }, e.prototype.setPosition = function () {
    var i = this;
    i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i.getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger("setPosition", [i]);
  }, e.prototype.setProps = function () {
    var i = this,
        e = document.body.style;
    i.positionProp = !0 === i.options.vertical ? "top" : "left", "top" === i.positionProp ? i.$slider.addClass("slick-vertical") : i.$slider.removeClass("slick-vertical"), void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === i.options.useCSS && (i.cssTransitions = !0), i.options.fade && ("number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i.options.zIndex = 3) : i.options.zIndex = i.defaults.zIndex), void 0 !== e.OTransform && (i.animType = "OTransform", i.transformType = "-o-transform", i.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.MozTransform && (i.animType = "MozTransform", i.transformType = "-moz-transform", i.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (i.animType = !1)), void 0 !== e.webkitTransform && (i.animType = "webkitTransform", i.transformType = "-webkit-transform", i.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.msTransform && (i.animType = "msTransform", i.transformType = "-ms-transform", i.transitionType = "msTransition", void 0 === e.msTransform && (i.animType = !1)), void 0 !== e.transform && !1 !== i.animType && (i.animType = "transform", i.transformType = "transform", i.transitionType = "transition"), i.transformsEnabled = i.options.useTransform && null !== i.animType && !1 !== i.animType;
  }, e.prototype.setSlideClasses = function (i) {
    var e,
        t,
        o,
        s,
        n = this;

    if (t = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), n.$slides.eq(i).addClass("slick-current"), !0 === n.options.centerMode) {
      var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
      e = Math.floor(n.options.slidesToShow / 2), !0 === n.options.infinite && (i >= e && i <= n.slideCount - 1 - e ? n.$slides.slice(i - e + r, i + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (o = n.options.slidesToShow + i, t.slice(o - e + 1 + r, o + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === i ? t.eq(t.length - 1 - n.options.slidesToShow).addClass("slick-center") : i === n.slideCount - 1 && t.eq(n.options.slidesToShow).addClass("slick-center")), n.$slides.eq(i).addClass("slick-center");
    } else i >= 0 && i <= n.slideCount - n.options.slidesToShow ? n.$slides.slice(i, i + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : t.length <= n.options.slidesToShow ? t.addClass("slick-active").attr("aria-hidden", "false") : (s = n.slideCount % n.options.slidesToShow, o = !0 === n.options.infinite ? n.options.slidesToShow + i : i, n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - i < n.options.slidesToShow ? t.slice(o - (n.options.slidesToShow - s), o + s).addClass("slick-active").attr("aria-hidden", "false") : t.slice(o, o + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));

    "ondemand" !== n.options.lazyLoad && "anticipated" !== n.options.lazyLoad || n.lazyLoad();
  }, e.prototype.setupInfinite = function () {
    var e,
        t,
        o,
        s = this;

    if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && (t = null, s.slideCount > s.options.slidesToShow)) {
      for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1) t = e - 1, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t - s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");

      for (e = 0; e < o + s.slideCount; e += 1) t = e, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t + s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");

      s.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
        i(this).attr("id", "");
      });
    }
  }, e.prototype.interrupt = function (i) {
    var e = this;
    i || e.autoPlay(), e.interrupted = i;
  }, e.prototype.selectHandler = function (e) {
    var t = this,
        o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target).parents(".slick-slide"),
        s = parseInt(o.attr("data-slick-index"));
    s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s, !1, !0) : t.slideHandler(s);
  }, e.prototype.slideHandler = function (i, e, t) {
    var o,
        s,
        n,
        r,
        l,
        d = null,
        a = this;
    if (e = e || !1, !(!0 === a.animating && !0 === a.options.waitForAnimate || !0 === a.options.fade && a.currentSlide === i)) if (!1 === e && a.asNavFor(i), o = i, d = a.getLeft(o), r = a.getLeft(a.currentSlide), a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft, !1 === a.options.infinite && !1 === a.options.centerMode && (i < 0 || i > a.getDotCount() * a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else if (!1 === a.options.infinite && !0 === a.options.centerMode && (i < 0 || i > a.slideCount - a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else {
      if (a.options.autoplay && clearInterval(a.autoPlayTimer), s = o < 0 ? a.slideCount % a.options.slidesToScroll != 0 ? a.slideCount - a.slideCount % a.options.slidesToScroll : a.slideCount + o : o >= a.slideCount ? a.slideCount % a.options.slidesToScroll != 0 ? 0 : o - a.slideCount : o, a.animating = !0, a.$slider.trigger("beforeChange", [a, a.currentSlide, s]), n = a.currentSlide, a.currentSlide = s, a.setSlideClasses(a.currentSlide), a.options.asNavFor && (l = (l = a.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(a.currentSlide), a.updateDots(), a.updateArrows(), !0 === a.options.fade) return !0 !== t ? (a.fadeSlideOut(n), a.fadeSlide(s, function () {
        a.postSlide(s);
      })) : a.postSlide(s), void a.animateHeight();
      !0 !== t ? a.animateSlide(d, function () {
        a.postSlide(s);
      }) : a.postSlide(s);
    }
  }, e.prototype.startLoad = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.hide(), i.$nextArrow.hide()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.hide(), i.$slider.addClass("slick-loading");
  }, e.prototype.swipeDirection = function () {
    var i,
        e,
        t,
        o,
        s = this;
    return i = s.touchObject.startX - s.touchObject.curX, e = s.touchObject.startY - s.touchObject.curY, t = Math.atan2(e, i), (o = Math.round(180 * t / Math.PI)) < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >= 0 ? !1 === s.options.rtl ? "left" : "right" : o <= 360 && o >= 315 ? !1 === s.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 === s.options.rtl ? "right" : "left" : !0 === s.options.verticalSwiping ? o >= 35 && o <= 135 ? "down" : "up" : "vertical";
  }, e.prototype.swipeEnd = function (i) {
    var e,
        t,
        o = this;
    if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !1, !1;
    if (o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength > 10), void 0 === o.touchObject.curX) return !1;

    if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
      switch (t = o.swipeDirection()) {
        case "left":
        case "down":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
          break;

        case "right":
        case "up":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1;
      }

      "vertical" != t && (o.slideHandler(e), o.touchObject = {}, o.$slider.trigger("swipe", [o, t]));
    } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {});
  }, e.prototype.swipeHandler = function (i) {
    var e = this;
    if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== i.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = i.originalEvent && void 0 !== i.originalEvent.touches ? i.originalEvent.touches.length : 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), i.data.action) {
      case "start":
        e.swipeStart(i);
        break;

      case "move":
        e.swipeMove(i);
        break;

      case "end":
        e.swipeEnd(i);
    }
  }, e.prototype.swipeMove = function (i) {
    var e,
        t,
        o,
        s,
        n,
        r,
        l = this;
    return n = void 0 !== i.originalEvent ? i.originalEvent.touches : null, !(!l.dragging || l.scrolling || n && 1 !== n.length) && (e = l.getLeft(l.currentSlide), l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX, l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY, l.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(l.touchObject.curX - l.touchObject.startX, 2))), r = Math.round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY, 2))), !l.options.verticalSwiping && !l.swiping && r > 4 ? (l.scrolling = !0, !1) : (!0 === l.options.verticalSwiping && (l.touchObject.swipeLength = r), t = l.swipeDirection(), void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && (l.swiping = !0, i.preventDefault()), s = (!1 === l.options.rtl ? 1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1), !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l.touchObject.startY ? 1 : -1), o = l.touchObject.swipeLength, l.touchObject.edgeHit = !1, !1 === l.options.infinite && (0 === l.currentSlide && "right" === t || l.currentSlide >= l.getDotCount() && "left" === t) && (o = l.touchObject.swipeLength * l.options.edgeFriction, l.touchObject.edgeHit = !0), !1 === l.options.vertical ? l.swipeLeft = e + o * s : l.swipeLeft = e + o * (l.$list.height() / l.listWidth) * s, !0 === l.options.verticalSwiping && (l.swipeLeft = e + o * s), !0 !== l.options.fade && !1 !== l.options.touchMove && (!0 === l.animating ? (l.swipeLeft = null, !1) : void l.setCSS(l.swipeLeft))));
  }, e.prototype.swipeStart = function (i) {
    var e,
        t = this;
    if (t.interrupted = !0, 1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow) return t.touchObject = {}, !1;
    void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e = i.originalEvent.touches[0]), t.touchObject.startX = t.touchObject.curX = void 0 !== e ? e.pageX : i.clientX, t.touchObject.startY = t.touchObject.curY = void 0 !== e ? e.pageY : i.clientY, t.dragging = !0;
  }, e.prototype.unfilterSlides = e.prototype.slickUnfilter = function () {
    var i = this;
    null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this.options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack), i.reinit());
  }, e.prototype.unload = function () {
    var e = this;
    i(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
  }, e.prototype.unslick = function (i) {
    var e = this;
    e.$slider.trigger("unslick", [e, i]), e.destroy();
  }, e.prototype.updateArrows = function () {
    var i = this;
    Math.floor(i.options.slidesToShow / 2), !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && !i.options.infinite && (i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === i.currentSlide ? (i.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - i.options.slidesToShow && !1 === i.options.centerMode ? (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - 1 && !0 === i.options.centerMode && (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
  }, e.prototype.updateDots = function () {
    var i = this;
    null !== i.$dots && (i.$dots.find("li").removeClass("slick-active").end(), i.$dots.find("li").eq(Math.floor(i.currentSlide / i.options.slidesToScroll)).addClass("slick-active"));
  }, e.prototype.visibility = function () {
    var i = this;
    i.options.autoplay && (document[i.hidden] ? i.interrupted = !0 : i.interrupted = !1);
  }, i.fn.slick = function () {
    var i,
        t,
        o = this,
        s = arguments[0],
        n = Array.prototype.slice.call(arguments, 1),
        r = o.length;

    for (i = 0; i < r; i++) if ("object" == typeof s || void 0 === s ? o[i].slick = new e(o[i], s) : t = o[i].slick[s].apply(o[i].slick, n), void 0 !== t) return t;

    return o;
  };
});

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ (function(module) {

"use strict";
module.exports = React;

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

"use strict";
module.exports = jQuery;

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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!*****************************!*\
  !*** ./assets/js/blocks.js ***!
  \*****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _slick_min_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slick.min.js */ "./assets/js/slick.min.js");
/* harmony import */ var _slick_min_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_slick_min_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _jquery_plugin_min_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./jquery.plugin.min.js */ "./assets/js/jquery.plugin.min.js");
/* harmony import */ var _jquery_plugin_min_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_jquery_plugin_min_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _jquery_countdown_min_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./jquery.countdown.min.js */ "./assets/js/jquery.countdown.min.js");
/* harmony import */ var _jquery_countdown_min_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_jquery_countdown_min_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _blocks_giveaway_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/giveaway/index */ "./assets/js/blocks/giveaway/index.js");
/* harmony import */ var _blocks_countdown_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/countdown/index */ "./assets/js/blocks/countdown/index.js");
/* harmony import */ var _blocks_winners_index__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/winners/index */ "./assets/js/blocks/winners/index.js");






}();
/******/ })()
;
//# sourceMappingURL=gutenberg.js.map