var WPEG = (function(
  exports,
  store,
  mobx,
  reactBeautifulDnd,
  reactClickOutside,
  stringStripHtml,
  reactHotKeys,
  reactRouterDom,
  fuse,
  fileSaver,
  react,
  styledComponents,
  mobxReact,
  server,
  dropzone,
  reactDom
) {
  'use strict';

  store = store && store.hasOwnProperty('default') ? store['default'] : store;
  mobx = mobx && mobx.hasOwnProperty('default') ? mobx['default'] : mobx;
  reactBeautifulDnd =
    reactBeautifulDnd && reactBeautifulDnd.hasOwnProperty('default')
      ? reactBeautifulDnd['default']
      : reactBeautifulDnd;
  reactClickOutside =
    reactClickOutside && reactClickOutside.hasOwnProperty('default')
      ? reactClickOutside['default']
      : reactClickOutside;
  stringStripHtml =
    stringStripHtml && stringStripHtml.hasOwnProperty('default')
      ? stringStripHtml['default']
      : stringStripHtml;
  reactHotKeys =
    reactHotKeys && reactHotKeys.hasOwnProperty('default')
      ? reactHotKeys['default']
      : reactHotKeys;
  reactRouterDom =
    reactRouterDom && reactRouterDom.hasOwnProperty('default')
      ? reactRouterDom['default']
      : reactRouterDom;
  fuse = fuse && fuse.hasOwnProperty('default') ? fuse['default'] : fuse;
  fileSaver =
    fileSaver && fileSaver.hasOwnProperty('default')
      ? fileSaver['default']
      : fileSaver;
  react = react && react.hasOwnProperty('default') ? react['default'] : react;
  styledComponents =
    styledComponents && styledComponents.hasOwnProperty('default')
      ? styledComponents['default']
      : styledComponents;
  mobxReact =
    mobxReact && mobxReact.hasOwnProperty('default')
      ? mobxReact['default']
      : mobxReact;
  server =
    server && server.hasOwnProperty('default') ? server['default'] : server;
  dropzone =
    dropzone && dropzone.hasOwnProperty('default')
      ? dropzone['default']
      : dropzone;
  reactDom =
    reactDom && reactDom.hasOwnProperty('default')
      ? reactDom['default']
      : reactDom;

  function unwrapExports(x) {
    return x &&
      x.__esModule &&
      Object.prototype.hasOwnProperty.call(x, 'default')
      ? x.default
      : x;
  }

  function createCommonjsModule(fn, module) {
    return (
      (module = { exports: {} }), fn(module, module.exports), module.exports
    );
  }

  var dashboard = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _class,
      _descriptor,
      _descriptor2,
      _descriptor3,
      _descriptor4,
      _descriptor5,
      _descriptor6,
      _descriptor7,
      _descriptor8; /* global wpeg */

    function _initDefineProp(target, property, descriptor, context) {
      if (!descriptor) return;
      Object.defineProperty(target, property, {
        enumerable: descriptor.enumerable,
        configurable: descriptor.configurable,
        writable: descriptor.writable,
        value: descriptor.initializer
          ? descriptor.initializer.call(context)
          : void 0
      });
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _applyDecoratedDescriptor(
      target,
      property,
      decorators,
      descriptor,
      context
    ) {
      var desc = {};
      Object['ke' + 'ys'](descriptor).forEach(function(key) {
        desc[key] = descriptor[key];
      });
      desc.enumerable = !!desc.enumerable;
      desc.configurable = !!desc.configurable;

      if ('value' in desc || desc.initializer) {
        desc.writable = true;
      }

      desc = decorators
        .slice()
        .reverse()
        .reduce(function(desc, decorator) {
          return decorator(target, property, desc) || desc;
        }, desc);

      if (context && desc.initializer !== void 0) {
        desc.value = desc.initializer ? desc.initializer.call(context) : void 0;
        desc.initializer = undefined;
      }

      if (desc.initializer === void 0) {
        Object['define' + 'Property'](target, property, desc);
        desc = null;
      }

      return desc;
    }

    var Store = ((_class = (function() {
      function Store(rootStore) {
        _classCallCheck(this, Store);

        _initDefineProp(this, 'list', _descriptor, this);

        _initDefineProp(this, 'createdGuide', _descriptor2, this);

        _initDefineProp(this, 'current', _descriptor3, this);

        _initDefineProp(this, 'popupConfirmInfo', _descriptor4, this);

        _initDefineProp(this, 'displayPref', _descriptor5, this);

        _initDefineProp(this, 'editGuide', _descriptor6, this);

        _initDefineProp(this, 'editStep', _descriptor7, this);

        _initDefineProp(this, 'deletePopup', _descriptor8, this);

        this.rootStore = rootStore;
      }

      /**
       * Guide List.
       */

      _createClass(Store, [
        {
          key: 'getList',

          /**
           * Get guide list fetcher.
           */
          value: function getList() {
            var _this = this;

            return fetch(wpeg.restUrl + '/list')
              .then(function(response) {
                return response.json();
              })
              .then(function(data) {
                _this.list = data.map(function(item) {
                  item.active = JSON.parse(item.active);
                  return item;
                });
                return data;
              });
          }

          /**
           * Created guide data.
           */
        },
        {
          key: 'create',

          /**
           * Create guide.
           * @param {Object} guideData
           */
          value: function create(guideData) {
            var _this2 = this;

            return fetch(wpeg.restUrl + '/guide', {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(guideData)
            })
              .then(function(response) {
                return response.json();
              })
              .then(function(data) {
                _this2.createdGuide = Object.assign(
                  {
                    ID: data.id.toString(),
                    active: true
                  },
                  guideData
                );
                _this2.list.push(_this2.createdGuide);
              })
              .then(function() {
                _this2.createdGuide = null;
              });
          }

          /**
           * Current active guide.
           */
        },
        {
          key: 'get',

          /**
           * Get Guide ID.
           * @param {Number} id
           */
          value: function get(id) {
            var _this3 = this;

            if (!id) {
              throw new Error('Undefined ID');
            }

            return fetch(wpeg.restUrl + '/list/' + id)
              .then(function(response) {
                return response.json();
              })
              .then(function(data) {
                data.active = JSON.parse(data.active);
                _this3.current = data;
                return data;
              });
          }

          /**
           * Update guide
           * @param {Number} id
           * @param {Object} newData
           */
        },
        {
          key: 'update',
          value: function update(id, newData) {
            var _this4 = this;

            if (!id) {
              throw new Error('Undefined ID');
            }

            fetch(wpeg.restUrl + '/guide/' + id, {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(newData)
            })
              .then(function(response) {
                return response.json();
              })
              .then(function() {
                _this4.list = _this4.list.map(function(item) {
                  if (item.ID === id) {
                    return Object.assign(item, newData);
                  }

                  return item;
                });
                _this4.current = Object.assign(_this4.current, newData);
              });
          }

          /**
           * Delete guide by ID
           * @param {Number} id
           */
        },
        {
          key: 'delete',
          value: function _delete(id) {
            var _this5 = this;

            return fetch(wpeg.restUrl + '/guide/' + id, {
              method: 'DELETE'
            })
              .then(function(response) {
                return response.json();
              })
              .then(function() {
                var currentIndex = void 0;
                _this5.list.forEach(function(item, index) {
                  if (item.ID === id) {
                    currentIndex = index;
                  }
                });

                _this5.list = _this5.list.filter(function(item) {
                  return item.ID !== id;
                });

                if (_this5.list.length > 0) {
                  var nextList = void 0;

                  if (_this5.list[currentIndex]) {
                    nextList = _this5.list[currentIndex];
                  } else if (_this5.list[currentIndex - 1]) {
                    nextList = _this5.list[currentIndex - 1];
                  } else {
                    nextList = _this5.list[0];
                  }

                  window.location.hash = '#/guide/' + nextList.ID;
                } else {
                  window.location.hash = '#/';
                }
              });
          }

          /**
           * Update Step
           * @param {Number} id
           * @param {Object} newData
           */
        },
        {
          key: 'updateStep',
          value: function updateStep(id, newData) {
            if (!id) {
              throw new Error('Undefined ID');
            }

            fetch(wpeg.restUrl + '/update_step/' + id, {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(newData)
            });
          }

          /**
           * Popup Confirm Info
           */
        },
        {
          key: 'setPopupConfirmInfo',

          /**
           * Set Popup Confirm Info.
           * @param {Object} confirmData
           */
          value: function setPopupConfirmInfo(ConfirmLabel) {
            this.popupConfirmInfo = Object.assign(ConfirmLabel);
          }

          /**
           * Delete Step by Step ID
           * @param {Number} id
           */
        },
        {
          key: 'deleteStep',
          value: function deleteStep(id) {
            var _this6 = this;

            return fetch(wpeg.restUrl + '/delete_step/' + id, {
              method: 'DELETE'
            })
              .then(function(response) {
                return response.json();
              })
              .then(function() {
                _this6.current.steps = _this6.current.steps.filter(function(
                  item
                ) {
                  return item.ID !== id;
                });
              });
          }

          /**
           * Reordering Drag and Drop Step
           * @param {Number} srcId
           * @param {Number} dstId
           */
        },
        {
          key: 'reorderStep',
          value: function reorderStep(srcId, dstId) {
            if (!srcId) {
              throw new Error('Undefined Source ID');
            }

            if (!dstId) {
              throw new Error('Undefined Target ID');
            }

            return fetch(wpeg.restUrl + '/reorder_step', {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                from_id: parseInt(srcId, 10),
                to_id: parseInt(dstId, 10)
              })
            }).then(function(response) {
              return response.json();
            });
          }

          /**
           * Show Preference box
           */
        },
        {
          key: 'togglePref',

          /**
           * Toggle Preference box
           */
          value: function togglePref() {
            this.displayPref = !this.displayPref;
          }

          /**
           * Show Preference box
           */
        },
        {
          key: 'showPref',
          value: function showPref() {
            this.displayPref = true;
          }

          /**
           * Hide Preference box
           */
        },
        {
          key: 'hidePref',
          value: function hidePref() {
            this.displayPref = false;
          }

          /**
           * Is guide in edit mode or not
           */
        },
        {
          key: 'editMode',

          /**
           * Edit mode
           */
          value: function editMode() {
            this.editGuide = true;
          }

          /**
           * Back to normal mode
           */
        },
        {
          key: 'normalMode',
          value: function normalMode() {
            this.editGuide = false;
          }

          /**
           * Is there is any step editable, unless not null it indicates there is edit step
           * @type {Number|Null}
           */
        },
        {
          key: 'editStepMode',

          /**
           * Edit step with current id
           * @param {Number} stepId
           */
          value: function editStepMode(stepId) {
            this.editStep = this.current.steps.find(function(item) {
              return item.ID === stepId;
            });
          }

          /**
           * View Step with current id
           * @param {Number} stepId
           */
        },
        {
          key: 'viewStep',
          value: function viewStep(stepId) {
            this.rootStore.tool.viewStep(
              this.current,
              stepId,
              stores.viewSourceTypes.DASHBOARD
            );
          }

          /**
           * Make all step back to normal mode
           */
        },
        {
          key: 'cancelEditStep',
          value: function cancelEditStep() {
            this.editStep = null;
          }

          /**
           * Show / hide delete popup
           */
        },
        {
          key: 'toggleDeletePopup',

          /**
           * Toggle delete popup
           */
          value: function toggleDeletePopup() {
            this.deletePopup = !this.deletePopup;
          }

          /**
           * Hide deelete popup
           */
        },
        {
          key: 'hideDeletePopup',
          value: function hideDeletePopup() {
            this.deletePopup = false;
          }

          /**
           * Display deelete popup
           */
        },
        {
          key: 'showDeletePopup',
          value: function showDeletePopup() {
            this.deletePopup = true;
          }
        },
        {
          key: 'isAddStep',
          get: function get() {
            return (
              this.rootStore.tool.currentGuide &&
              (this.rootStore.tool.displayBottomBar ||
                this.rootStore.tool.highlightMode)
            );
          }
        }
      ]);

      return Store;
    })()),
    ((_descriptor = _applyDecoratedDescriptor(
      _class.prototype,
      'list',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return [];
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'getList',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'getList'),
      _class.prototype
    ),
    (_descriptor2 = _applyDecoratedDescriptor(
      _class.prototype,
      'createdGuide',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'create',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'create'),
      _class.prototype
    ),
    (_descriptor3 = _applyDecoratedDescriptor(
      _class.prototype,
      'current',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'get',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'get'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'update',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'update'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'delete',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'delete'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'updateStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'updateStep'),
      _class.prototype
    ),
    (_descriptor4 = _applyDecoratedDescriptor(
      _class.prototype,
      'popupConfirmInfo',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return {
            confirmMessage: 'Are you sure to delete ?',
            confirmLabel: 'Delete Guide',
            onCancel: null,
            onConfirm: null
          };
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'setPopupConfirmInfo',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'setPopupConfirmInfo'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'deleteStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'deleteStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'reorderStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'reorderStep'),
      _class.prototype
    ),
    (_descriptor5 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayPref',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'togglePref',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'togglePref'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showPref',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showPref'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hidePref',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hidePref'),
      _class.prototype
    ),
    (_descriptor6 = _applyDecoratedDescriptor(
      _class.prototype,
      'editGuide',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'editMode',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'editMode'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'normalMode',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'normalMode'),
      _class.prototype
    ),
    (_descriptor7 = _applyDecoratedDescriptor(
      _class.prototype,
      'editStep',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'editStepMode',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'editStepMode'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'viewStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'viewStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'cancelEditStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'cancelEditStep'),
      _class.prototype
    ),
    (_descriptor8 = _applyDecoratedDescriptor(
      _class.prototype,
      'deletePopup',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'toggleDeletePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'toggleDeletePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideDeletePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideDeletePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showDeletePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showDeletePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isAddStep',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isAddStep'),
      _class.prototype
    )),
    _class);
    exports.default = Store;
  });

  unwrapExports(dashboard);

  var tool = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _slicedToArray = (function() {
      function sliceIterator(arr, i) {
        var _arr = [];
        var _n = true;
        var _d = false;
        var _e = undefined;
        try {
          for (
            var _i = arr[Symbol.iterator](), _s;
            !(_n = (_s = _i.next()).done);
            _n = true
          ) {
            _arr.push(_s.value);
            if (i && _arr.length === i) break;
          }
        } catch (err) {
          _d = true;
          _e = err;
        } finally {
          try {
            if (!_n && _i['return']) _i['return']();
          } finally {
            if (_d) throw _e;
          }
        }
        return _arr;
      }
      return function(arr, i) {
        if (Array.isArray(arr)) {
          return arr;
        } else if (Symbol.iterator in Object(arr)) {
          return sliceIterator(arr, i);
        } else {
          throw new TypeError(
            'Invalid attempt to destructure non-iterable instance'
          );
        }
      };
    })();

    var _typeof =
      typeof Symbol === 'function' && typeof Symbol.iterator === 'symbol'
        ? function(obj) {
            return typeof obj;
          }
        : function(obj) {
            return obj &&
              typeof Symbol === 'function' &&
              obj.constructor === Symbol &&
              obj !== Symbol.prototype
              ? 'symbol'
              : typeof obj;
          };

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _class,
      _descriptor,
      _descriptor2,
      _descriptor3,
      _descriptor4,
      _descriptor5,
      _descriptor6,
      _descriptor7,
      _descriptor8,
      _descriptor9,
      _descriptor10,
      _descriptor11,
      _descriptor12,
      _descriptor13,
      _descriptor14,
      _descriptor15,
      _descriptor16,
      _descriptor17,
      _descriptor18,
      _descriptor19,
      _descriptor20,
      _descriptor21,
      _descriptor22,
      _descriptor23,
      _descriptor24,
      _descriptor25,
      _descriptor26,
      _descriptor27,
      _descriptor28; /* global wpeg */

    var _store2 = _interopRequireDefault(store);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _toConsumableArray(arr) {
      if (Array.isArray(arr)) {
        for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) {
          arr2[i] = arr[i];
        }
        return arr2;
      } else {
        return Array.from(arr);
      }
    }

    function _initDefineProp(target, property, descriptor, context) {
      if (!descriptor) return;
      Object.defineProperty(target, property, {
        enumerable: descriptor.enumerable,
        configurable: descriptor.configurable,
        writable: descriptor.writable,
        value: descriptor.initializer
          ? descriptor.initializer.call(context)
          : void 0
      });
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _applyDecoratedDescriptor(
      target,
      property,
      decorators,
      descriptor,
      context
    ) {
      var desc = {};
      Object['ke' + 'ys'](descriptor).forEach(function(key) {
        desc[key] = descriptor[key];
      });
      desc.enumerable = !!desc.enumerable;
      desc.configurable = !!desc.configurable;

      if ('value' in desc || desc.initializer) {
        desc.writable = true;
      }

      desc = decorators
        .slice()
        .reverse()
        .reduce(function(desc, decorator) {
          return decorator(target, property, desc) || desc;
        }, desc);

      if (context && desc.initializer !== void 0) {
        desc.value = desc.initializer ? desc.initializer.call(context) : void 0;
        desc.initializer = undefined;
      }

      if (desc.initializer === void 0) {
        Object['define' + 'Property'](target, property, desc);
        desc = null;
      }

      return desc;
    }

    var Store = ((_class = (function() {
      function Store(rootStore) {
        var _this = this;

        _classCallCheck(this, Store);

        _initDefineProp(this, 'displayBottomBar', _descriptor, this);

        _initDefineProp(this, 'displayMsgBtn', _descriptor2, this);

        _initDefineProp(this, 'displayList', _descriptor3, this);

        _initDefineProp(this, 'displayDeletePopup', _descriptor4, this);

        _initDefineProp(this, 'displayNewGuidePopup', _descriptor5, this);

        _initDefineProp(this, 'displayConfirmation', _descriptor6, this);

        _initDefineProp(this, 'displayStepSelector', _descriptor7, this);

        _initDefineProp(this, 'currentGuide', _descriptor8, this);

        _initDefineProp(this, 'currentStep', _descriptor9, this);

        _initDefineProp(this, 'lastStep', _descriptor10, this);

        _initDefineProp(this, 'highlightMode', _descriptor11, this);

        _initDefineProp(this, 'highlightBounds', _descriptor12, this);

        _initDefineProp(this, 'highlightElement', _descriptor13, this);

        _initDefineProp(this, 'highlightSelectorTree', _descriptor14, this);

        _initDefineProp(this, 'listNotification', _descriptor15, this);

        _initDefineProp(this, 'state', _descriptor16, this);

        _initDefineProp(this, 'prevState', _descriptor17, this);

        _initDefineProp(this, 'deleteItem', _descriptor18, this);

        _initDefineProp(this, 'selectedType', _descriptor19, this);

        _initDefineProp(this, 'reselectElementMode', _descriptor20, this);

        _initDefineProp(this, 'reselectedElement', _descriptor21, this);

        _initDefineProp(this, 'isNextStepEnabled', _descriptor22, this);

        _initDefineProp(this, 'directView', _descriptor23, this);

        _initDefineProp(this, 'guideSrc', _descriptor24, this);

        _initDefineProp(this, 'afterLoginGuideViewed', _descriptor25, this);

        _initDefineProp(this, 'forceHoverData', _descriptor26, this);

        this.querySelector = function(path) {
          return document.evaluate(
            path,
            document,
            null,
            window.XPathResult.FIRST_ORDERED_NODE_TYPE,
            null
          ).singleNodeValue;
        };

        this.getElementPath = function(element) {
          var idx = function idx(sib, name) {
            return sib
              ? idx(sib.previousElementSibling, name || sib.localName) +
                  (sib.localName === name)
              : 1;
          };

          var segs = function segs(elm) {
            return !elm || elm.nodeType !== 1
              ? ['']
              : elm.id && document.querySelector('#' + elm.id) === elm
              ? ['id("' + elm.id + '")']
              : [].concat(_toConsumableArray(segs(elm.parentNode)), [
                  elm.localName.toLowerCase() + '[' + idx(elm) + ']'
                ]);
          };

          return segs(element).join('/');
        };

        this.hasParent = function(parent, child) {
          var node = child.parentNode;
          while (node !== null) {
            if (node === parent) {
              return true;
            }
            node = node.parentNode;
          }
          return false;
        };

        this.windowScroll = function() {
          if (_this.highlightElement) {
            _this.highlightBounds = _this.highlightElement.getBoundingClientRect();
          }
        };

        this.inspectCallback = function(event) {
          var element = void 0;
          if (
            _this.selectedType === stores.selectorTypes.INPUT ||
            _this.selectedType === stores.selectorTypes.TOOLTIP
          ) {
            var inputTypes = [
              'text',
              'password',
              'number',
              'email',
              'url',
              'search',
              null
            ];

            var tagName = event.target.tagName.toLowerCase();
            if (['input', 'textarea'].includes(tagName)) {
              if (tagName === 'input') {
                if (inputTypes.includes(event.target.getAttribute('type'))) {
                  element = event.target;
                }
              } else {
                element = event.target;
              }
            }

            if (
              event.target.contentDocument &&
              'body' in event.target.contentDocument
            ) {
              if (
                event.target.contentDocument.body.getAttribute('id') ===
                'tinymce'
              ) {
                element = event.target;
              }
            }

            if (
              event.target.getAttribute('contenteditable') === 'true' &&
              event.target.getAttribute('id') !== 'tinymce'
            ) {
              element = event.target;
            }
          }

          if (_this.selectedType !== stores.selectorTypes.INPUT) {
            var _tagName = event.target.tagName.toLowerCase();
            if (!['iframe', 'html', 'body', 'p'].includes(_tagName)) {
              element = event.target;
            }
          }

          if (element) {
            _this.highlightElement = element;
            _this.highlightBounds = _this.highlightElement.getBoundingClientRect();
          }
        };

        this.forceHover = function(_ref) {
          var element = _ref.element,
            target = _ref.target,
            hoverClass = _ref.hoverClass;

          var hoverElement = element.closest(target);

          if (hoverElement) {
            var reqAnim = void 0;
            var forceAddClass = function forceAddClass() {
              hoverElement.classList.add(hoverClass);
              reqAnim = window.requestAnimationFrame(forceAddClass);
            };

            forceAddClass();
            _this.forceHoverData = {
              target: target,
              hoverClass: hoverClass
            };

            setTimeout(function() {
              if (hoverElement.classList.contains(hoverClass)) {
                window.cancelAnimationFrame(reqAnim);
              }
            }, 1000);
          }
        };

        this.cancelForceHover = function() {
          if (!_this.forceHoverData) {
            return;
          }

          var _forceHoverData = _this.forceHoverData,
            target = _forceHoverData.target,
            hoverClass = _forceHoverData.hoverClass;

          var hoveredElements = document.querySelectorAll(target);
          if (!hoveredElements) {
            return;
          }

          hoveredElements.forEach(function(element) {
            if (element.classList.contains(hoverClass)) {
              element.classList.remove(hoverClass);
            }
          });

          _this.forceHoverData = null;
        };

        this.selectElement = function(event) {
          // Prevents Click.
          event.preventDefault();
          event.stopPropagation();
          event.target._onclick = event.target.onclick;
          event.target.onclick = null;
          event.target._onchange = event.target.onchange;
          event.target.onchange = null;

          if (event.target.tagName.toLowerCase() === 'select') {
            event.target.blur();
          } else {
            event.target.focus();
          }

          // Remove events early.
          document.body.removeEventListener(
            'mouseover',
            _this.inspectCallback,
            true
          );
          document.body.removeEventListener('click', _this.selectElement, true);

          document.querySelectorAll('iframe').forEach(function(iframe) {
            var ifrdocument = iframe.contentDocument;
            if (
              ifrdocument &&
              'body' in ifrdocument &&
              ifrdocument.body.getAttribute('id') === 'tinymce'
            ) {
              ifrdocument.removeEventListener(
                'mouseover',
                _this.inspectCallback,
                true
              );
              ifrdocument.removeEventListener(
                'click',
                _this.selectElement,
                true
              );
            }
          });

          // Disable inspector tool.
          document.body.classList.remove('wpeg-inspector');
          event.target.onclick = event.target._onclick;
          event.target.onchange = event.target._onchange;

          // Force sidebar and adminbar submenu to hover state.
          var forcefulMenus = [
            {
              target: '.wp-has-submenu',
              hoverClass: 'opensub'
            },
            {
              target: 'li.menupop',
              hoverClass: 'hover'
            }
          ];

          forcefulMenus.forEach(function(_ref2) {
            var target = _ref2.target,
              hoverClass = _ref2.hoverClass;

            _this.forceHover({
              element: event.target,
              target: target,
              hoverClass: hoverClass
            });
          });

          // Get element.
          _this.highlightBounds = _this.highlightElement.getBoundingClientRect();
          _this.highlightSelectorTree = _this.getElementPath(
            _this.highlightElement
          );
          _this.highlightMode = false;

          if (!_this.currentStep) {
            _this.setStepState(stores.stateTypes.CREATE);
          } else {
            var data = _this.currentStep;
            data.selector = _this.highlightSelectorTree;
            data.uri = window.location.href;
            _this.updateStep(data);
          }
        };

        this.waitElement = function(element) {
          return new Promise(function(resolve) {
            var reqAnimation = void 0;
            var lastBounds = {};
            var count = 0;

            var check = function check() {
              var qs = _this.querySelector(element);

              if (qs) {
                var bounds = qs.getBoundingClientRect();

                if (
                  count > 10 &&
                  lastBounds.top === bounds.top &&
                  lastBounds.left === bounds.left &&
                  lastBounds.right === bounds.right &&
                  lastBounds.bottom === bounds.bottom &&
                  lastBounds.width === bounds.width &&
                  lastBounds.height === bounds.height
                ) {
                  resolve(qs);
                  window.cancelAnimationFrame(reqAnimation);
                  return;
                }

                lastBounds = bounds;
              }

              count++;
              reqAnimation = window.requestAnimationFrame(check);
            };

            check();
          });
        };

        this.proceedClick = function(event) {
          var done = function done() {
            event.target.removeEventListener('click', _this.proceedClick, true);
          };

          if (_this.nextStep) {
            _this.viewStep(null, _this.nextStep.ID, _this.viewFrom);
            done();
          } else {
            done();
            _this.cancelAddStep();
          }
        };

        _initDefineProp(this, 'proceedInput', _descriptor27, this);

        _initDefineProp(this, 'proceedInputKeyDown', _descriptor28, this);

        this.checkURI = function(data) {
          var uri = null;

          if (_this.selectedType !== stores.selectorTypes.MODAL) {
            var child = _this.querySelector(data.selector);
            var menuParent = document.querySelector('#adminmenumain');
            var adminBar = document.querySelector('#wpadminbar');

            if (
              !_this.hasParent(menuParent, child) &&
              !_this.hasParent(adminBar, child)
            ) {
              uri = data.uri;
            }
          }

          data.uri = uri;
          return data;
        };

        this.getUrlObject = function(url) {
          var a = document.createElement('a');
          a.href = url;
          return a;
        };

        this.redirectToStep = function(url) {
          if (url !== null) {
            var urlObj = _this.getUrlObject(url);
            if (
              window.location.href !== url &&
              urlObj &&
              urlObj.hash.length === 0
            ) {
              _this.directView = false;
              window.location.href = url;
            }
          }
        };

        this.rootStore = rootStore;
      }

      _createClass(Store, [
        {
          key: 'sync',
          value: function sync() {
            var _this2 = this;

            setTimeout(
              _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee() {
                  var bottomBar,
                    currentGuide,
                    listNotification,
                    currentStep,
                    state,
                    prevState,
                    afterLoginGuideViewed;
                  return regeneratorRuntime.wrap(
                    function _callee$(_context) {
                      while (1) {
                        switch ((_context.prev = _context.next)) {
                          case 0:
                            bottomBar = _store2.default.get(
                              stores.dbKeys.BOTTOMBAR
                            );

                            if (typeof bottomBar !== 'undefined') {
                              _this2.displayBottomBar = bottomBar;
                            }

                            currentGuide = _store2.default.get(
                              stores.dbKeys.CURRENT_GUIDE
                            );

                            if (typeof currentGuide !== 'undefined') {
                              _this2.currentGuide = currentGuide;
                            }

                            listNotification = _store2.default.get(
                              stores.dbKeys.LIST_NOTIFY
                            );

                            if (typeof listNotification !== 'undefined') {
                              _this2.listNotification = listNotification;
                            }

                            currentStep = _store2.default.get(
                              stores.dbKeys.CURRENT_STEP
                            );

                            if (typeof currentStep !== 'undefined') {
                              _this2.setCurrentStep(currentStep);
                            }

                            state = _store2.default.get(stores.dbKeys.STATE);

                            if (typeof state !== 'undefined') {
                              _this2.state = state;

                              if (
                                [
                                  stores.stateTypes.CREATE,
                                  stores.stateTypes.PIN
                                ].includes(state)
                              ) {
                                _this2.showBottomBar();
                                _this2.cancelAddStep();
                              }
                            }

                            prevState = _store2.default.get(
                              stores.dbKeys.PREV_STATE
                            );

                            if (typeof prevState !== 'undefined') {
                              _this2.prevState = prevState;
                            }

                            afterLoginGuideViewed = _store2.default.get(
                              stores.dbKeys.AFTER_LOGIN_GUIDE
                            );

                            if (typeof afterLoginGuideViewed !== 'undefined') {
                              _this2.afterLoginGuideViewed = afterLoginGuideViewed;
                            }

                            if (
                              JSON.parse(wpeg.afterLogin) &&
                              !afterLoginGuideViewed
                            ) {
                              _this2.setAfterLoginGuideViewed(true);
                              _this2.viewStep(
                                wpeg.afterLoginUrl,
                                null,
                                stores.viewSourceTypes.ADMIN_BAR
                              );
                            }

                          case 15:
                          case 'end':
                            return _context.stop();
                        }
                      }
                    },
                    _callee,
                    _this2
                  );
                })
              ),
              200
            );
          }
        },
        {
          key: 'toggleBottomBar',
          value: function toggleBottomBar() {
            this.displayBottomBar = !this.displayBottomBar;
            _store2.default.set(stores.dbKeys.BOTTOMBAR, this.displayBottomBar);
            if (!this.displayBottomBar) {
              _store2.default.set(stores.dbKeys.CURRENT_GUIDE, null);
            }
          }
        },
        {
          key: 'hideBottomBar',
          value: function hideBottomBar() {
            this.displayBottomBar = false;
            _store2.default.set(stores.dbKeys.BOTTOMBAR, this.displayBottomBar);
          }
        },
        {
          key: 'showBottomBar',
          value: function showBottomBar() {
            this.displayBottomBar = true;
            _store2.default.set(stores.dbKeys.BOTTOMBAR, this.displayBottomBar);
          }
        },
        {
          key: 'setCurrentGuide',
          value: function setCurrentGuide(data) {
            this.currentGuide = data;
            _store2.default.set(stores.dbKeys.CURRENT_GUIDE, data);
          }
        },
        {
          key: 'clearGuide',
          value: function clearGuide() {
            this.currentGuide = null;
            _store2.default.remove(stores.dbKeys.CURRENT_GUIDE);
          }
        },
        {
          key: 'showListNotification',
          value: function showListNotification() {
            this.listNotification = true;
            _store2.default.set(
              stores.dbKeys.LIST_NOTIFY,
              this.listNotification
            );
          }
        },
        {
          key: 'hideListNotification',
          value: function hideListNotification() {
            this.listNotification = false;
            _store2.default.set(
              stores.dbKeys.LIST_NOTIFY,
              this.listNotification
            );
          }
        },
        {
          key: 'inspectMode',
          value: function inspectMode() {
            if (this.selectedType === stores.selectorTypes.MODAL) {
              this.setStepState(stores.stateTypes.CREATE);
            } else {
              document.body.classList.add('wpeg-inspector');
              window.addEventListener('scroll', this.windowScroll);
            }

            this.highlightMode =
              this.selectedType !== stores.selectorTypes.MODAL;
            this.hideBottomBar();
            this.hideStepSelector();
            this.hideList();
          }
        },
        {
          key: 'inspectElement',
          value: function inspectElement(_ref4) {
            var _this3 = this;

            var ID = _ref4.ID,
              type = _ref4.type,
              _ref4$reselect = _ref4.reselect,
              reselect = _ref4$reselect === undefined ? false : _ref4$reselect;

            if (ID) {
              var _step = this.currentGuide.steps.find(function(item) {
                return item.ID === ID;
              });

              if (_step) {
                type = _step.type;
                this.setCurrentStep(_step);
              }
            }

            this.selectedType = type;
            this.reselectElementMode = reselect;
            this.inspectMode();

            if (this.selectedType !== stores.selectorTypes.MODAL) {
              document.body.addEventListener(
                'mouseover',
                this.inspectCallback,
                true
              );
              document.body.addEventListener('click', this.selectElement, true);

              document.querySelectorAll('iframe').forEach(function(iframe) {
                var ifrdocument = iframe.contentDocument;
                if (
                  ifrdocument &&
                  'body' in ifrdocument &&
                  ifrdocument.body.getAttribute('id') === 'tinymce'
                ) {
                  ifrdocument.addEventListener(
                    'mouseover',
                    _this3.inspectCallback,
                    true
                  );
                  ifrdocument.addEventListener(
                    'click',
                    _this3.selectElement,
                    true
                  );
                }
              });
            }
          }
        },
        {
          key: 'inspectEditStep',
          value: function inspectEditStep() {
            if (!this.currentStep) {
              return;
            }

            if (this.isSelectedTypeModal) {
              this.hideBottomBar();
              this.hideList();
            }

            if (this.currentStep.selector) {
              var element = this.querySelector(this.currentStep.selector);
              if (element) {
                this.highlightElement = element;
                this.highlightBounds = element.getBoundingClientRect();
                this.highlightMode =
                  this.selectedType !== stores.selectorTypes.MODAL;
                window.addEventListener('scroll', this.windowScroll);
                this.hideBottomBar();
                this.hideStepSelector();
                this.hideList();
              }
            }
          }
        },
        {
          key: 'proceedHandler',
          value: function proceedHandler() {
            var _this4 = this;

            if (!this.currentStep) {
              return;
            }

            var element = this.highlightElement;
            var beforeunload = function beforeunload() {
              _this4.clearHighlight();
              _this4.directView = false;
            };

            if (element) {
              if (
                element.contentDocument &&
                'body' in element.contentDocument &&
                element.contentDocument.body.getAttribute('id') === 'tinymce'
              ) {
                element = element.contentDocument.body;
              }

              switch (this.currentStep.type) {
                case stores.selectorTypes.CLICK:
                  window.removeEventListener('beforeunload', beforeunload);
                  window.addEventListener('beforeunload', beforeunload);
                  element.removeEventListener('click', this.proceedClick, true);
                  element.addEventListener('click', this.proceedClick, true);
                  break;

                case stores.selectorTypes.INPUT:
                  element.focus();
                  this.isNextStepEnabled = false;
                  this.proceedInput({ target: element });
                  element.removeEventListener(
                    'keydown',
                    this.proceedInputKeyDown,
                    true
                  );
                  element.removeEventListener('input', this.proceedInput, true);
                  element.addEventListener(
                    'keydown',
                    this.proceedInputKeyDown,
                    true
                  );
                  element.addEventListener('input', this.proceedInput, true);
                  break;

                default:
                  break;
              }
            }
          }
        },
        {
          key: 'cancelAddStep',
          value: function cancelAddStep() {
            var _this5 = this;

            if (this.isViewFromDashboard || this.isViewFromAdminBar) {
              this.finish(this.isViewFromDashboard);
            } else {
              this.exitHighlightMode();
            }

            this.cancelForceHover();
            this.reselectElementMode = false;
            this.selectedType = null;
            setTimeout(function() {
              _this5.reselectedElement = false;
            }, 1500);
          }
        },
        {
          key: 'clearHighlight',
          value: function clearHighlight() {
            this.highlightMode = false;
            this.highlightBounds = {};
            this.highlightElement = null;
            this.highlightSelectorTree = null;
          }
        },
        {
          key: 'exitHighlightMode',
          value: function exitHighlightMode() {
            // Remove events early.
            document.body.removeEventListener(
              'mouseover',
              this.inspectCallback,
              true
            );
            document.body.removeEventListener(
              'click',
              this.selectElement,
              true
            );
            document.body.classList.remove('wpeg-inspector');
            window.removeEventListener('scroll', this.windowScroll);
            this.clearHighlight();
            this.clearStep();
            this.setStepState(null);
            this.showBottomBar();
          }
        },
        {
          key: 'addStep',
          value: function addStep(data) {
            var _this6 = this;

            if (data.title.trim() === '') {
              data.title = 'Untitled Step';
            }

            if (data.description.trim() === '') {
              data.description = 'No Description';
            }

            if (this.forceHoverData) {
              data.action = JSON.stringify({
                hover: this.forceHoverData
              });
            }

            data.guide_id = this.currentGuide.ID;
            data.type = this.selectedType;
            data = this.checkURI(data);

            fetch(wpeg.restUrl + '/create_step', {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(data)
            })
              .then(function(response) {
                return response.json();
              })
              .then(function(_ref5) {
                var ID = _ref5.id;

                _this6.currentGuide.steps.push(Object.assign({ ID: ID }, data));
                if (
                  _this6.rootStore.dashboard.current &&
                  _this6.rootStore.dashboard.current.ID
                ) {
                  _this6.rootStore.dashboard.current = _this6.currentGuide;
                }
                _this6.setCurrentGuide(_this6.currentGuide);
                _this6.showListNotification();
                _this6.cancelAddStep();
              });
          }
        },
        {
          key: 'setStepState',
          value: function setStepState(state) {
            var viewSource =
              arguments.length > 1 && arguments[1] !== undefined
                ? arguments[1]
                : stores.viewSourceTypes.BOTTOM_BAR;

            var currentState = _store2.default.get(stores.dbKeys.STATE);

            this.prevState = currentState;
            this.state = state;

            if (!state) {
              _store2.default.remove(stores.dbKeys.STATE);
              _store2.default.remove(stores.dbKeys.PREV_STATE);
              _store2.default.remove(stores.dbKeys.VIEW_SOURCE);
            } else {
              _store2.default.set(stores.dbKeys.PREV_STATE, currentState);
              _store2.default.set(stores.dbKeys.STATE, state);
              _store2.default.set(stores.dbKeys.VIEW_SOURCE, viewSource);
            }
          }

          /**
           * Crossbrowser-way to detect url
           */
        },
        {
          key: 'setAfterLoginGuideViewed',
          value: function setAfterLoginGuideViewed(value) {
            this.afterLoginGuideViewed = value;
            _store2.default.set(
              stores.dbKeys.AFTER_LOGIN_GUIDE,
              this.afterLoginGuideViewed
            );
          }
        },
        {
          key: 'gotoNextStep',
          value: function gotoNextStep() {
            this.nextStepID &&
              this.viewStep(null, this.nextStepID, this.viewFrom);
          }
        },
        {
          key: 'gotoPrevStep',
          value: function gotoPrevStep() {
            this.prevStepID &&
              this.viewStep(null, this.prevStepID, this.viewFrom);
          }
        },
        {
          key: 'setCurrentStep',
          value: function setCurrentStep(data) {
            this.selectedType = data.type;
            this.currentStep = data;
            _store2.default.set(stores.dbKeys.CURRENT_STEP, this.currentStep);
          }
        },
        {
          key: 'clearStep',
          value: function clearStep() {
            this.currentStep = null;
            _store2.default.remove(stores.dbKeys.CURRENT_STEP);
          }
        },
        {
          key: 'editStep',
          value: function editStep(id) {
            var step = this.currentGuide.steps.find(function(item) {
              return item.ID === id;
            });
            if (!step) {
              throw new Error('There is not step with ID ' + id);
            }

            this.setCurrentStep(step);
            this.setStepState(stores.stateTypes.UPDATE);
            this.redirectToStep(step.uri);
          }
        },
        {
          key: 'updateStep',
          value: function updateStep(data) {
            var _this7 = this;

            data = this.checkURI(data);

            fetch(wpeg.restUrl + '/update_step/' + data.ID, {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(data)
            })
              .then(function(response) {
                return response.json();
              })
              .then(function() {
                _this7.currentStep.title = data.title;
                _this7.currentStep.description = data.description;
                _this7.currentStep.action = data.action;
                _this7.setCurrentStep(_this7.currentStep);
                _this7.currentGuide.steps = _this7.currentGuide.steps.map(
                  function(item) {
                    if (
                      item.ID.toString() === _this7.currentStep.ID.toString()
                    ) {
                      item = _this7.currentStep;
                    }
                    return item;
                  }
                );
                _this7.setCurrentGuide(_this7.currentGuide);

                if (_this7.reselectElementMode) {
                  _this7.reselectedElement = true;
                }

                _this7.cancelAddStep();
              });
          }
        },
        {
          key: 'viewStep',
          value: (function() {
            var _ref6 = _asyncToGenerator(
              /*#__PURE__*/ regeneratorRuntime.mark(function _callee3(
                guide,
                stepID
              ) {
                var _this8 = this;

                var viewSource =
                  arguments.length > 2 && arguments[2] !== undefined
                    ? arguments[2]
                    : stores.viewSourceTypes.BOTTOM_BAR;

                var fetchGuide,
                  stringRegx,
                  matched,
                  _matched,
                  _matched2,
                  _,
                  type,
                  name,
                  _guide,
                  json,
                  step,
                  _action,
                  _action$hover,
                  target,
                  hoverClass,
                  element,
                  _element,
                  url,
                  sameLocation,
                  samePath;

                return regeneratorRuntime.wrap(
                  function _callee3$(_context3) {
                    while (1) {
                      switch ((_context3.prev = _context3.next)) {
                        case 0:
                          if (!guide) {
                            _context3.next = 27;
                            break;
                          }

                          fetchGuide = (function() {
                            var _ref7 = _asyncToGenerator(
                              /*#__PURE__*/ regeneratorRuntime.mark(
                                function _callee2() {
                                  var response, json;
                                  return regeneratorRuntime.wrap(
                                    function _callee2$(_context2) {
                                      while (1) {
                                        switch (
                                          (_context2.prev = _context2.next)
                                        ) {
                                          case 0:
                                            _context2.prev = 0;
                                            _context2.next = 3;
                                            return fetch(
                                              wpeg.restUrl + '/list/' + guide
                                            );

                                          case 3:
                                            response = _context2.sent;
                                            _context2.next = 6;
                                            return response.json();

                                          case 6:
                                            json = _context2.sent;

                                            _this8.setCurrentGuide(json);
                                            _context2.next = 13;
                                            break;

                                          case 10:
                                            _context2.prev = 10;
                                            _context2.t0 = _context2['catch'](
                                              0
                                            );
                                            throw _context2.t0;

                                          case 13:
                                          case 'end':
                                            return _context2.stop();
                                        }
                                      }
                                    },
                                    _callee2,
                                    _this8,
                                    [[0, 10]]
                                  );
                                }
                              )
                            );

                            return function fetchGuide() {
                              return _ref7.apply(this, arguments);
                            };
                          })();

                          stringRegx = /^(plugin|theme)\/(.*)\/(.*)/;
                          matched = void 0;
                          _context3.t0 =
                            typeof guide === 'undefined'
                              ? 'undefined'
                              : _typeof(guide);
                          _context3.next =
                            _context3.t0 === 'string'
                              ? 7
                              : _context3.t0 === 'number'
                              ? 22
                              : 25;
                          break;

                        case 7:
                          matched = guide.match(stringRegx);
                          // matched[1] is type, plugin / theme
                          // matched[2] is slug, plugin slug / theme slug

                          if (!(matched[1] && matched[2] && matched[3])) {
                            _context3.next = 19;
                            break;
                          }

                          (_matched = matched),
                            (_matched2 = _slicedToArray(_matched, 4)),
                            (_ = _matched2[0]),
                            (type = _matched2[1]),
                            (name = _matched2[2]),
                            (_guide = _matched2[3]); // eslint-disable-line no-unused-vars

                          if (name in wpeg.guides[type]) {
                            _context3.next = 12;
                            break;
                          }

                          throw new Error(name + ' not exists.');

                        case 12:
                          if (_guide in wpeg.guides[type][name]) {
                            _context3.next = 14;
                            break;
                          }

                          throw new Error('Guide not exists.');

                        case 14:
                          json = wpeg.guides[type][name][_guide];

                          this.guideSrc = type + '/' + name + '/' + _guide;
                          this.setCurrentGuide(json);
                          _context3.next = 21;
                          break;

                        case 19:
                          _context3.next = 21;
                          return fetchGuide();

                        case 21:
                          return _context3.abrupt('break', 27);

                        case 22:
                          _context3.next = 24;
                          return fetchGuide();

                        case 24:
                          return _context3.abrupt('break', 27);

                        case 25:
                          this.setCurrentGuide(Object.assign({}, guide));
                          return _context3.abrupt('break', 27);

                        case 27:
                          if (this.currentGuide) {
                            _context3.next = 29;
                            break;
                          }

                          throw new Error('Guide not exists');

                        case 29:
                          step = void 0;

                          if (stepID) {
                            step = this.currentGuide.steps.find(function(item) {
                              return item.ID === stepID;
                            });
                          } else {
                            step = this.currentGuide.steps[0];
                          }

                          if (step) {
                            _context3.next = 33;
                            break;
                          }

                          throw new Error(
                            'There is not step with ID ' + stepID
                          );

                        case 33:
                          this.clearHighlight();

                          // Force hover in sidebar and adminbar submenu.
                          try {
                            _action = JSON.parse(step.action);

                            if (_action.hover) {
                              (_action$hover = _action.hover),
                                (target = _action$hover.target),
                                (hoverClass = _action$hover.hoverClass);
                              element = this.querySelector(step.selector);

                              this.forceHover({
                                element: element,
                                target: target,
                                hoverClass: hoverClass
                              });
                            }
                          } catch (err) {
                            // Skip
                          }

                          if (
                            !// has previous step
                            (
                              this.currentStep &&
                              // is previous step not the same with current/next step
                              this.currentStep.ID !== step.ID &&
                              // if has selector
                              step.selector &&
                              // and it's not a modal
                              step.type !== stores.selectorTypes.MODAL
                            )
                          ) {
                            _context3.next = 49;
                            break;
                          }

                          _element = void 0;

                          // has uri and
                          // is on the same screen.

                          if (!step.uri) {
                            _context3.next = 47;
                            break;
                          }

                          url = this.getUrlObject(step.uri);
                          sameLocation = step.uri === window.location.href;
                          samePath =
                            '' + url.pathname + url.search ===
                            '' +
                              window.location.pathname +
                              window.location.search;

                          if (
                            !(sameLocation || (samePath && url.hash.length > 0))
                          ) {
                            _context3.next = 45;
                            break;
                          }

                          _context3.next = 44;
                          return this.waitElement(step.selector);

                        case 44:
                          _element = _context3.sent;

                        case 45:
                          _context3.next = 48;
                          break;

                        case 47:
                          // Doesn't have uri but have selector,
                          // especially on menu
                          _element = this.querySelector(step.selector);

                        case 48:
                          if (_element) {
                            this.highlightElement = _element;
                            this.highlightBounds = _element.getBoundingClientRect();
                            this.highlightMode = true;
                          }

                        case 49:
                          this.setCurrentStep(step);
                          this.proceedHandler();
                          this.hideList();
                          this.hideBottomBar();
                          this.setStepState(stores.stateTypes.VIEW, viewSource);
                          this.redirectToStep(step.uri);

                        case 55:
                        case 'end':
                          return _context3.stop();
                      }
                    }
                  },
                  _callee3,
                  this
                );
              })
            );

            function viewStep(_x2, _x3) {
              return _ref6.apply(this, arguments);
            }

            return viewStep;
          })()
        },
        {
          key: 'showDeletePopup',
          value: function showDeletePopup(item) {
            this.deleteItem = item;
            this.displayDeletePopup = true;
          }
        },
        {
          key: 'hideDeletePopup',
          value: function hideDeletePopup() {
            this.deleteItem = null;
            this.displayDeletePopup = false;
          }
        },
        {
          key: 'deleteStep',
          value: function deleteStep() {
            var _this9 = this;

            if (this.deleteItem) {
              var guide = Object.assign({}, this.currentGuide);
              var filteredStep = function filteredStep(item) {
                return item.ID.toString() !== _this9.deleteItem.ID.toString();
              };

              fetch(wpeg.restUrl + '/delete_step/' + this.deleteItem.ID, {
                method: 'DELETE'
              }).then(function() {
                guide.steps = guide.steps.filter(filteredStep);
                if (_this9.rootStore.dashboard.current) {
                  _this9.rootStore.dashboard.current.steps = _this9.rootStore.dashboard.current.steps.filter(
                    filteredStep
                  );
                }
                _this9.setCurrentGuide(guide);
                _this9.hideDeletePopup();
                _this9.cancelAddStep();
              });
            }
          }
        },
        {
          key: 'toggleList',
          value: function toggleList() {
            this.displayList = !this.displayList;
            if (this.displayList) {
              this.hideListNotification();
            }
          }
        },
        {
          key: 'hideList',
          value: function hideList() {
            this.displayList = false;
          }
        },
        {
          key: 'showList',
          value: function showList() {
            this.displayList = true;
            if (this.displayList) {
              this.hideListNotification();
            }
          }
        },
        {
          key: 'finish',
          value: function finish() {
            var _this10 = this;

            var redirect =
              arguments.length > 0 && arguments[0] !== undefined
                ? arguments[0]
                : true;
            var guideId = this.currentGuide.ID;

            this.hideBottomBar();
            this.hideListNotification();
            this.setStepState(null);
            this.clearHighlight();
            setTimeout(function() {
              _this10.clearStep();
              _this10.clearGuide();

              if (redirect) {
                window.location.href =
                  'admin.php?page=wpeg%2Fmanages#/guide/' + guideId;
              }
            }, 200);
          }
        },
        {
          key: 'showNewGuidePopup',
          value: function showNewGuidePopup() {
            this.displayNewGuidePopup = true;
          }
        },
        {
          key: 'hideNewGuidePopup',
          value: function hideNewGuidePopup() {
            this.displayNewGuidePopup = false;
          }
        },
        {
          key: 'showConfirmation',
          value: function showConfirmation() {
            this.displayConfirmation = true;
          }
        },
        {
          key: 'hideConfirmation',
          value: function hideConfirmation() {
            this.displayConfirmation = false;
          }

          /**
           * Create guide.
           * @param {Object} guideData
           */
        },
        {
          key: 'createNewGuide',
          value: function createNewGuide(guideData) {
            var _this11 = this;

            return fetch(wpeg.restUrl + '/guide', {
              method: 'POST',
              headers: {
                Accept: 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(guideData)
            })
              .then(function(response) {
                return response.json();
              })
              .then(function(data) {
                _this11.displayNewGuidePopup = false;
                var guide = Object.assign(
                  {
                    ID: data.id.toString(),
                    active: true,
                    steps: []
                  },
                  guideData
                );

                _this11.rootStore.dashboard.list.push(guide);
                _this11.setCurrentGuide(guide);
                _this11.showBottomBar();
              });
          }
        },
        {
          key: 'showStepSelector',
          value: function showStepSelector() {
            this.displayStepSelector = true;
          }
        },
        {
          key: 'hideStepSelector',
          value: function hideStepSelector() {
            this.displayStepSelector = false;
          }
        },
        {
          key: 'isCreateState',
          get: function get() {
            return (
              this.directView &&
              this.state === stores.stateTypes.CREATE &&
              (this.selectedType === stores.selectorTypes.MODAL ||
                this.state === stores.stateTypes.CREATE)
            );
          }
        },
        {
          key: 'isSelectedTypeModal',
          get: function get() {
            return this.selectedType === stores.selectorTypes.MODAL;
          }
        },
        {
          key: 'isCurrentUrl',
          get: function get() {
            var url = this.getUrlObject(this.currentStep.uri);
            if (url.hash.length > 0) {
              return true;
            }

            return this.currentStep.uri === window.location.href;
          }
        },
        {
          key: 'hasUri',
          get: function get() {
            return this.currentStep.uri !== null;
          }
        },
        {
          key: 'hasSelector',
          get: function get() {
            return this.currentStep.selector !== null;
          }
        },
        {
          key: 'isEditState',
          get: function get() {
            return (
              this.directView &&
              this.state === stores.stateTypes.UPDATE &&
              (this.isCurrentUrl || !this.hasUri)
            );
          }
        },
        {
          key: 'isErrorFlow',
          get: function get() {
            if (
              this.directView &&
              this.state === stores.stateTypes.VIEW &&
              !this.isSelectedTypeModal &&
              this.hasUri
            ) {
              var url = this.getUrlObject(this.currentStep.uri);
              if (url.hash.length > 0) {
                return false;
              }
              return !this.isCurrentUrl;
            }

            return false;
          }
        },
        {
          key: 'isErrorElementNotFound',
          get: function get() {
            if (!this.isSelectedTypeModal) {
              var isVisible = false;
              if (
                this.currentStep &&
                this.hasSelector &&
                (this.isCurrentUrl || !this.hasUri)
              ) {
                var qs = this.querySelector(this.currentStep.selector);

                if (qs) {
                  var computedStyle = window.getComputedStyle(qs);
                  isVisible = computedStyle.visibility !== 'hidden';
                }
              }

              return (
                this.directView &&
                this.state === stores.stateTypes.VIEW &&
                !isVisible
              );
            }

            return false;
          }
        },
        {
          key: 'isPreviewState',
          get: function get() {
            return this.state === stores.stateTypes.PREVIEW;
          }
        },
        {
          key: 'isViewState',
          get: function get() {
            var isModal =
              this.state === stores.stateTypes.VIEW &&
              this.selectedType === stores.selectorTypes.MODAL;
            var isDefault =
              this.state === stores.stateTypes.VIEW &&
              (this.isCurrentUrl || !this.hasUri);

            return this.directView && (isModal || isDefault);
          }
        },
        {
          key: 'viewFrom',
          get: function get() {
            return (
              _store2.default.get(stores.dbKeys.VIEW_SOURCE) ||
              stores.viewSourceTypes.BOTTOM_BAR
            );
          }
        },
        {
          key: 'isViewFromDashboard',
          get: function get() {
            return (
              _store2.default.get(stores.dbKeys.VIEW_SOURCE) ===
              stores.viewSourceTypes.DASHBOARD
            );
          }
        },
        {
          key: 'isViewFromAdminBar',
          get: function get() {
            return (
              _store2.default.get(stores.dbKeys.VIEW_SOURCE) ===
              stores.viewSourceTypes.ADMIN_BAR
            );
          }
        },
        {
          key: 'isViewFromBottomBar',
          get: function get() {
            return (
              _store2.default.get(stores.dbKeys.VIEW_SOURCE) ===
              stores.viewSourceTypes.BOTTOM_BAR
            );
          }
        },
        {
          key: 'isCurrentStepFirstStep',
          get: function get() {
            if (this.currentStep) {
              return this.currentStep.ID === this.currentGuide.steps[0].ID;
            }

            return false;
          }
        },
        {
          key: 'isCurrentStepLastStep',
          get: function get() {
            if (this.currentStep) {
              return (
                this.currentStep.ID ===
                this.currentGuide.steps[this.currentGuide.steps.length - 1].ID
              );
            }

            return false;
          }
        },
        {
          key: 'getProgressBarPercent',
          get: function get() {
            var _this12 = this;

            var index = 0;
            var length = 0;
            var progress = 0;
            if (this.currentStep) {
              index = this.currentGuide.steps.findIndex(function(item) {
                return item.ID === _this12.currentStep.ID;
              });
              length = this.currentGuide.steps.length;
              progress = ((index + 1) / length) * 100;
            }

            return progress + '%';
          }
        },
        {
          key: 'prevStep',
          get: function get() {
            var _this13 = this;

            if (this.currentStep) {
              var currentIndex = this.currentGuide.steps.findIndex(function(
                item
              ) {
                return item.ID === _this13.currentStep.ID;
              });
              var prevIndex = currentIndex - 1;

              if (prevIndex >= 0) {
                return this.currentGuide.steps[prevIndex];
              }
            }

            return false;
          }
        },
        {
          key: 'nextStep',
          get: function get() {
            var _this14 = this;

            if (this.currentStep) {
              var currentIndex = this.currentGuide.steps.findIndex(function(
                item
              ) {
                return item.ID === _this14.currentStep.ID;
              });
              var nextIndex = currentIndex + 1;

              if (nextIndex <= this.currentGuide.steps.length) {
                return this.currentGuide.steps[nextIndex];
              }
            }

            return false;
          }
        },
        {
          key: 'prevStepID',
          get: function get() {
            if (this.prevStep && !this.isCurrentStepFirstStep) {
              return this.prevStep.ID;
            }

            return false;
          }
        },
        {
          key: 'nextStepID',
          get: function get() {
            if (this.nextStep && !this.isCurrentStepLastStep) {
              return this.nextStep.ID;
            }

            return false;
          }
        },
        {
          key: 'isBouncingBottomBar',
          get: function get() {
            return (
              this.highlightMode &&
              this.isViewFromBottomBar &&
              this.state !== stores.stateTypes.VIEW
            );
          }
        }
      ]);

      return Store;
    })()),
    ((_descriptor = _applyDecoratedDescriptor(
      _class.prototype,
      'displayBottomBar',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor2 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayMsgBtn',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor3 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayList',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor4 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayDeletePopup',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor5 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayNewGuidePopup',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor6 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayConfirmation',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor7 = _applyDecoratedDescriptor(
      _class.prototype,
      'displayStepSelector',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor8 = _applyDecoratedDescriptor(
      _class.prototype,
      'currentGuide',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor9 = _applyDecoratedDescriptor(
      _class.prototype,
      'currentStep',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor10 = _applyDecoratedDescriptor(
      _class.prototype,
      'lastStep',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor11 = _applyDecoratedDescriptor(
      _class.prototype,
      'highlightMode',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor12 = _applyDecoratedDescriptor(
      _class.prototype,
      'highlightBounds',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return {};
        }
      }
    )),
    (_descriptor13 = _applyDecoratedDescriptor(
      _class.prototype,
      'highlightElement',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor14 = _applyDecoratedDescriptor(
      _class.prototype,
      'highlightSelectorTree',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return '';
        }
      }
    )),
    (_descriptor15 = _applyDecoratedDescriptor(
      _class.prototype,
      'listNotification',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor16 = _applyDecoratedDescriptor(
      _class.prototype,
      'state',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor17 = _applyDecoratedDescriptor(
      _class.prototype,
      'prevState',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor18 = _applyDecoratedDescriptor(
      _class.prototype,
      'deleteItem',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor19 = _applyDecoratedDescriptor(
      _class.prototype,
      'selectedType',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    (_descriptor20 = _applyDecoratedDescriptor(
      _class.prototype,
      'reselectElementMode',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor21 = _applyDecoratedDescriptor(
      _class.prototype,
      'reselectedElement',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor22 = _applyDecoratedDescriptor(
      _class.prototype,
      'isNextStepEnabled',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return true;
        }
      }
    )),
    (_descriptor23 = _applyDecoratedDescriptor(
      _class.prototype,
      'directView',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return true;
        }
      }
    )),
    (_descriptor24 = _applyDecoratedDescriptor(
      _class.prototype,
      'guideSrc',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return '';
        }
      }
    )),
    (_descriptor25 = _applyDecoratedDescriptor(
      _class.prototype,
      'afterLoginGuideViewed',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return false;
        }
      }
    )),
    (_descriptor26 = _applyDecoratedDescriptor(
      _class.prototype,
      'forceHoverData',
      [mobx.observable],
      {
        enumerable: true,
        initializer: function initializer() {
          return null;
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'sync',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'sync'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'toggleBottomBar',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'toggleBottomBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideBottomBar',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideBottomBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showBottomBar',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showBottomBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'setCurrentGuide',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'setCurrentGuide'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'clearGuide',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'clearGuide'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showListNotification',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showListNotification'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideListNotification',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideListNotification'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'inspectMode',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'inspectMode'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'inspectElement',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'inspectElement'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'inspectEditStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'inspectEditStep'),
      _class.prototype
    ),
    (_descriptor27 = _applyDecoratedDescriptor(
      _class.prototype,
      'proceedInput',
      [mobx.action],
      {
        enumerable: true,
        initializer: function initializer() {
          var _this15 = this;

          return function(event) {
            var elementValue = void 0;
            var minLength = 1;

            if ('value' in event.target) {
              elementValue = event.target.value;
            }

            if (event.target.innerText) {
              elementValue = event.target.innerText;
              minLength = 2;
            }

            if (elementValue) {
              _this15.isNextStepEnabled =
                elementValue !== '' && elementValue.length >= minLength;
            }
          };
        }
      }
    )),
    (_descriptor28 = _applyDecoratedDescriptor(
      _class.prototype,
      'proceedInputKeyDown',
      [mobx.action],
      {
        enumerable: true,
        initializer: function initializer() {
          var _this16 = this;

          return function(event) {
            var elementValue = void 0;
            var minLength = 2;
            var isBackSpace = event.which === 8;
            var isDelete = event.which === 46;
            var isCut = event.metaKey && event.which === 88;
            var isPaste = event.metaKey && event.which === 86;

            if ('value' in event.target) {
              elementValue = event.target.value;
            }

            if (event.target.innerText) {
              elementValue = event.target.innerText;
              minLength = 3;
            }

            if (elementValue) {
              if (isBackSpace || isDelete || isCut) {
                var pos = 0;
                var posEnd = 0;

                if ('selectionStart' in event.target) {
                  pos = event.target.selectionStart;
                  posEnd = event.target.selectionEnd;
                } else if ('selection' in document) {
                  event.target.focus();
                  var Sel = document.selection.createRange();
                  var SelLength = document.selection.createRange().text.length;
                  Sel.moveStart('character', -elementValue.length);
                  pos = Sel.text.length - SelLength;
                  posEnd = Sel.text.length;
                }

                var deleted = '';
                if (isBackSpace || isCut) {
                  if (pos === posEnd) {
                    if (pos === 0) {
                      deleted = '';
                    } else {
                      deleted = elementValue.substr(pos - 1, 1);
                    }
                  } else {
                    deleted = elementValue.substring(pos, posEnd);
                  }
                }

                if (isDelete) {
                  if (pos === posEnd) {
                    if (pos === elementValue.length) {
                      deleted = '';
                    } else {
                      deleted = elementValue.substr(pos, 1);
                    }
                  } else {
                    deleted = elementValue.substring(pos, posEnd);
                  }
                }

                var value = elementValue.replace(deleted, '');
                _this16.isNextStepEnabled =
                  value !== '' && value.length >= minLength;
              }

              if (isPaste) {
                _this16.isNextStepEnabled =
                  elementValue !== '' && elementValue.length >= minLength;
              }
            }
          };
        }
      }
    )),
    _applyDecoratedDescriptor(
      _class.prototype,
      'proceedHandler',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'proceedHandler'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'cancelAddStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'cancelAddStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'clearHighlight',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'clearHighlight'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'exitHighlightMode',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'exitHighlightMode'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'addStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'addStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'setStepState',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'setStepState'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'setAfterLoginGuideViewed',
      [mobx.action],
      Object.getOwnPropertyDescriptor(
        _class.prototype,
        'setAfterLoginGuideViewed'
      ),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isCreateState',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isCreateState'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isSelectedTypeModal',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isSelectedTypeModal'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isCurrentUrl',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isCurrentUrl'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hasUri',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hasUri'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hasSelector',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hasSelector'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isEditState',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isEditState'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isErrorFlow',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isErrorFlow'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isErrorElementNotFound',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(
        _class.prototype,
        'isErrorElementNotFound'
      ),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isPreviewState',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isPreviewState'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isViewState',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isViewState'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'viewFrom',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'viewFrom'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isViewFromDashboard',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isViewFromDashboard'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isViewFromAdminBar',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isViewFromAdminBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isViewFromBottomBar',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isViewFromBottomBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isCurrentStepFirstStep',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(
        _class.prototype,
        'isCurrentStepFirstStep'
      ),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isCurrentStepLastStep',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(
        _class.prototype,
        'isCurrentStepLastStep'
      ),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'getProgressBarPercent',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(
        _class.prototype,
        'getProgressBarPercent'
      ),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'prevStep',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'prevStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'nextStep',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'nextStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'prevStepID',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'prevStepID'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'nextStepID',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'nextStepID'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'isBouncingBottomBar',
      [mobx.computed],
      Object.getOwnPropertyDescriptor(_class.prototype, 'isBouncingBottomBar'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'gotoNextStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'gotoNextStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'gotoPrevStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'gotoPrevStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'setCurrentStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'setCurrentStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'clearStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'clearStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'editStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'editStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'updateStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'updateStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'viewStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'viewStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showDeletePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showDeletePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideDeletePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideDeletePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'deleteStep',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'deleteStep'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'toggleList',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'toggleList'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideList',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideList'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showList',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showList'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'finish',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'finish'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showNewGuidePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showNewGuidePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideNewGuidePopup',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideNewGuidePopup'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showConfirmation',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showConfirmation'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideConfirmation',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideConfirmation'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'createNewGuide',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'createNewGuide'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'showStepSelector',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'showStepSelector'),
      _class.prototype
    ),
    _applyDecoratedDescriptor(
      _class.prototype,
      'hideStepSelector',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'hideStepSelector'),
      _class.prototype
    )),
    _class);
    exports.default = Store;
  });

  unwrapExports(tool);

  var exportImport = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _class; /* global wpeg */

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _applyDecoratedDescriptor(
      target,
      property,
      decorators,
      descriptor,
      context
    ) {
      var desc = {};
      Object['ke' + 'ys'](descriptor).forEach(function(key) {
        desc[key] = descriptor[key];
      });
      desc.enumerable = !!desc.enumerable;
      desc.configurable = !!desc.configurable;

      if ('value' in desc || desc.initializer) {
        desc.writable = true;
      }

      desc = decorators
        .slice()
        .reverse()
        .reduce(function(desc, decorator) {
          return decorator(target, property, desc) || desc;
        }, desc);

      if (context && desc.initializer !== void 0) {
        desc.value = desc.initializer ? desc.initializer.call(context) : void 0;
        desc.initializer = undefined;
      }

      if (desc.initializer === void 0) {
        Object['define' + 'Property'](target, property, desc);
        desc = null;
      }

      return desc;
    }

    var Store = ((_class = (function() {
      function Store(rootStore) {
        _classCallCheck(this, Store);

        this.rootStore = rootStore;
      }

      _createClass(Store, [
        {
          key: 'import',
          value: function _import(data) {
            try {
              if (data) {
                return fetch(wpeg.restUrl + '/import', {
                  method: 'POST',
                  headers: {
                    Accept: 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(data)
                })
                  .then(function(response) {
                    return response.json();
                  })
                  .then(function(data) {
                    return data;
                  });
              }
            } catch (err) {
              throw new Error('Invalid File.');
            }
          }
        }
      ]);

      return Store;
    })()),
    _applyDecoratedDescriptor(
      _class.prototype,
      'import',
      [mobx.action],
      Object.getOwnPropertyDescriptor(_class.prototype, 'import'),
      _class.prototype
    ),
    _class);
    exports.default = Store;
  });

  unwrapExports(exportImport);

  var stores = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.dbKeys = exports.viewSourceTypes = exports.selectorTypes = exports.stateTypes = undefined;

    var _dashboard2 = _interopRequireDefault(dashboard);

    var _tool2 = _interopRequireDefault(tool);

    var _exportImport2 = _interopRequireDefault(exportImport);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    } /* global wpeg */

    var Store = function Store() {
      _classCallCheck(this, Store);

      this.dashboard = new _dashboard2.default(this);
      this.tool = new _tool2.default(this);
      this.exportImport = new _exportImport2.default(this);
    };

    var stateTypes = (exports.stateTypes = {
      CREATE: 'create',
      UPDATE: 'update',
      VIEW: 'view'
    });

    var selectorTypes = (exports.selectorTypes = {
      CLICK: 'click',
      TOOLTIP: 'tooltip',
      INPUT: 'input',
      MODAL: 'modal'
    });

    var viewSourceTypes = (exports.viewSourceTypes = {
      DASHBOARD: 'dashboard',
      ADMIN_BAR: 'admin-bar',
      BOTTOM_BAR: 'bottom-bar'
    });

    var dbKeys = (exports.dbKeys = {
      BOTTOMBAR: 'wpeg-bottom-bar-' + wpeg.siteId,
      CURRENT_GUIDE: 'wpeg-current-guide-' + wpeg.siteId,
      CURRENT_STEP: 'wpeg-current-step-' + wpeg.siteId,
      LIST_NOTIFY: 'wpeg-list-notify-' + wpeg.siteId,
      STATE: 'wpeg-state-' + wpeg.siteId,
      PREV_STATE: 'wpeg-prev-state-' + wpeg.siteId,
      POPUP_EXIT_HINT: 'wpeg-popup-exit-hint-' + wpeg.siteId,
      VIEW_SOURCE: 'wpeg-view-source-' + wpeg.siteId,
      AFTER_LOGIN_GUIDE: 'wpeg-after-login-guide-' + wpeg.siteId
    });

    exports.default = function() {
      return new Store();
    };
  });

  unwrapExports(stores);
  var stores_1 = stores.dbKeys;
  var stores_2 = stores.viewSourceTypes;
  var stores_3 = stores.selectorTypes;
  var stores_4 = stores.stateTypes;

  var sad = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Sad = function Sad(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.54-4.54a5 5 0 0 1 7.08 0 1 1 0 0 1-1.42 1.42 3 3 0 0 0-4.24 0 1 1 0 0 1-1.42-1.42zM9 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm6 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'
        })
      );
    };

    exports.default = Sad;
  });

  unwrapExports(sad);

  var emptyWrapper = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _templateObject = _taggedTemplateLiteral(
      [
        '\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  flex-direction: column;\n  flex-grow: 1;\n  font-size: 16px;\n  color: var(--gray);\n  height: 100%;\n  text-align: center;\n  padding: 32px;\n  line-height: 1.5;\n\n  &.no-full {\n    padding: 0;\n    height: 100%;\n    flex-grow: 1;\n  }\n\n  &.no-padding {\n    padding: 8px;\n    font-size: 14px;\n  }\n\n  svg {\n    &.so-sad {\n      width: 200px;\n      height: auto;\n      margin-bottom: 8px;\n      fill: var(--graylight);\n    }\n  }\n'
      ],
      [
        '\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  flex-direction: column;\n  flex-grow: 1;\n  font-size: 16px;\n  color: var(--gray);\n  height: 100%;\n  text-align: center;\n  padding: 32px;\n  line-height: 1.5;\n\n  &.no-full {\n    padding: 0;\n    height: 100%;\n    flex-grow: 1;\n  }\n\n  &.no-padding {\n    padding: 8px;\n    font-size: 14px;\n  }\n\n  svg {\n    &.so-sad {\n      width: 200px;\n      height: auto;\n      margin-bottom: 8px;\n      fill: var(--graylight);\n    }\n  }\n'
      ]
    );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var Empty = _styledComponents2.default.div(_templateObject);

    exports.default = function(props) {
      if (props.list && props.list.length > 0) {
        return props.children;
      }

      return _react2.default.createElement(
        Empty,
        props,
        props.image,
        props.message
      );
    };
  });

  unwrapExports(emptyWrapper);

  var emptyGuide = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class; /* global wpeg */

    var _react2 = _interopRequireDefault(react);

    var _sad2 = _interopRequireDefault(sad);

    var _emptyWrapper2 = _interopRequireDefault(emptyWrapper);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    var EmptyGuidePage = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(EmptyGuidePage, _Component);

            function EmptyGuidePage() {
              _classCallCheck(this, EmptyGuidePage);

              return _possibleConstructorReturn(
                this,
                (
                  EmptyGuidePage.__proto__ ||
                  Object.getPrototypeOf(EmptyGuidePage)
                ).apply(this, arguments)
              );
            }

            _createClass(EmptyGuidePage, [
              {
                key: 'render',
                value: function render() {
                  return this.props.$store.dashboard.list &&
                    this.props.$store.dashboard.list.length === 0
                    ? _react2.default.createElement(_emptyWrapper2.default, {
                        image: _react2.default.createElement(_sad2.default, {
                          className: 'so-sad'
                        }),
                        message: wpeg.lang.NO_ADD_STEP_WHEN_EMPTY,
                        className: 'no-full'
                      })
                    : _react2.default.createElement(_emptyWrapper2.default, {
                        message: wpeg.lang.PLEASE_SELECT_GUIDE
                      });
                }
              }
            ]);

            return EmptyGuidePage;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = EmptyGuidePage;
  });

  unwrapExports(emptyGuide);

  var menu = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Menu = function Menu(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z'
        })
      );
    };

    exports.default = Menu;
  });

  unwrapExports(menu);

  var pencil = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Pencil = function Pencil(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('title', null, props.title),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z'
        })
      );
    };

    exports.default = Pencil;
  });

  unwrapExports(pencil);

  var trash = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Trash = function Trash(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('title', null, props.title),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z'
        })
      );
    };

    exports.default = Trash;
  });

  unwrapExports(trash);

  var view = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var View = function View(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z'
        })
      );
    };

    exports.default = View;
  });

  unwrapExports(view);

  var fields = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.ContentEditor = exports.Dropdown = exports.Text = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  flex-direction: column;\n  margin-bottom: 16px;\n'
        ],
        [
          '\n  display: flex;\n  flex-direction: column;\n  margin-bottom: 16px;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          "\n  display: flex;\n  flex-direction: column;\n  color: var(--gray3);\n  outline: none;\n  box-shadow: none;\n  width: 100%;\n\n  &:before {\n    content: '",
          "';\n    font-size: 13px;\n    margin-bottom: 4px;\n  }\n"
        ],
        [
          "\n  display: flex;\n  flex-direction: column;\n  color: var(--gray3);\n  outline: none;\n  box-shadow: none;\n  width: 100%;\n\n  &:before {\n    content: '",
          "';\n    font-size: 13px;\n    margin-bottom: 4px;\n  }\n"
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          '\n  color: var(--gray3);\n  font-size: 12px;\n  margin-bottom: 4px;\n  cursor: default;\n'
        ],
        [
          '\n  color: var(--gray3);\n  font-size: 12px;\n  margin-bottom: 4px;\n  cursor: default;\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        ['\n  display: ', ';\n'],
        ['\n  display: ', ';\n']
      ),
      _templateObject5 = _taggedTemplateLiteral(
        ['\n  height: 100px;\n'],
        ['\n  height: 100px;\n']
      ),
      _templateObject6 = _taggedTemplateLiteral(
        ['\n  min-width: 150px;\n'],
        ['\n  min-width: 150px;\n']
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wp */

    var InputWrapper = _styledComponents2.default.div(_templateObject);

    var Input = _styledComponents2.default.input(_templateObject2, function(
      props
    ) {
      return props.label;
    });

    var Label = _styledComponents2.default.label(_templateObject3);

    var TextareaWrapper = _styledComponents2.default.div(
      _templateObject4,
      function(props) {
        return props.show ? 'block' : 'none';
      }
    );

    var Textarea = Input.extend(_templateObject5).withComponent('textarea');

    var SelectBox = _styledComponents2.default.select(_templateObject6);

    /**
     * Input Text
     */

    var Text = (exports.Text = (function(_Component) {
      _inherits(Text, _Component);

      function Text(props) {
        _classCallCheck(this, Text);

        var _this = _possibleConstructorReturn(
          this,
          (Text.__proto__ || Object.getPrototypeOf(Text)).call(this, props)
        );

        _this._onUpdate = function() {
          _this.props.onUpdate && _this.props.onUpdate(_this.input.value);
        };

        _this.input = _react2.default.createRef();
        return _this;
      }

      _createClass(Text, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            if (this.props.value) {
              this.input.value = this.props.value;
            }
            this._onUpdate(this.input.value);
          }
        },
        {
          key: 'render',
          value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
              InputWrapper,
              null,
              _react2.default.createElement(Label, null, this.props.label),
              _react2.default.createElement(Input, {
                innerRef: function innerRef(component) {
                  return (_this2.input = component);
                },
                onInput: this._onUpdate
              })
            );
          }
        }
      ]);

      return Text;
    })(react.Component));

    /**
     * <select> Dropdown
     */

    var Dropdown = (exports.Dropdown = (function(_Component2) {
      _inherits(Dropdown, _Component2);

      function Dropdown(props) {
        _classCallCheck(this, Dropdown);

        var _this3 = _possibleConstructorReturn(
          this,
          (Dropdown.__proto__ || Object.getPrototypeOf(Dropdown)).call(
            this,
            props
          )
        );

        _this3._selected = function() {
          var index =
            _this3.input.selectedIndex < 0 ? 0 : _this3.input.selectedIndex;
          var value = _this3.input[index].value;

          return {
            index: index,
            value: value
          };
        };

        _this3._onUpdate = function() {
          _this3.props.onUpdate && _this3.props.onUpdate(_this3._selected());
        };

        _this3.input = _react2.default.createRef();
        return _this3;
      }

      _createClass(Dropdown, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            if (this.props.value) {
              this.input.value = this.props.value;
            }
            this._onUpdate(this._selected());
          }
        },
        {
          key: 'render',
          value: function render() {
            var _this4 = this;

            return _react2.default.createElement(
              InputWrapper,
              null,
              _react2.default.createElement(Label, null, this.props.label),
              _react2.default.createElement(
                SelectBox,
                {
                  innerRef: function innerRef(component) {
                    return (_this4.input = component);
                  },
                  onChange: this._onUpdate
                },
                this.props.options.map(function(item, key) {
                  return _react2.default.createElement(
                    'option',
                    { key: key, value: item.value, selected: item.selected },
                    item.label
                  );
                })
              )
            );
          }
        }
      ]);

      return Dropdown;
    })(react.Component));

    /**
     * TinyMCE Editor
     */

    var ContentEditor = (exports.ContentEditor = (function(_Component3) {
      _inherits(ContentEditor, _Component3);

      function ContentEditor(props) {
        _classCallCheck(this, ContentEditor);

        var _this5 = _possibleConstructorReturn(
          this,
          (
            ContentEditor.__proto__ || Object.getPrototypeOf(ContentEditor)
          ).call(this, props)
        );

        _this5.state = {
          mounted: false,
          editor: null
        };

        _this5._onUpdate = function(value) {
          _this5.props.onUpdate && _this5.props.onUpdate(value);
        };

        _this5.tinyMCE = _react2.default.createRef();
        _this5.editorId = 'wpeg-tinymce-' + Date.now();
        return _this5;
      }

      _createClass(ContentEditor, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            var _this6 = this;

            if (this.props.value) {
              this.tinyMCE.value = this.props.value;
            }

            var tinyMCE = wp.oldEditor || wp.editor;
            if (tinyMCE) {
              tinyMCE.initialize(this.editorId, {
                tinymce: {
                  forced_root_block: '',
                  height: 100,
                  setup: function setup(editor) {
                    editor.on('init', function() {
                      var style = editor.dom.doc.createElement('style');
                      style.innerHTML =
                        '\n              body {\n                font-size: 14px;\n                font-family: sans-serif;\n                line-height: 1.2;\n                color: #666;\n              }';
                      editor.dom.doc.querySelector('head').appendChild(style);
                    });

                    editor.on('Change', function() {
                      _this6._onUpdate(editor.getContent());
                    });
                  },
                  init_instance_callback: function init_instance_callback(
                    editor
                  ) {
                    _this6._onUpdate(editor.getContent());
                    _this6.setState({
                      mounted: true,
                      editor: editor
                    });
                  }
                }
              });
            }
          }
        },
        {
          key: 'render',
          value: function render() {
            var _this7 = this;

            return _react2.default.createElement(
              InputWrapper,
              null,
              this.props.label &&
                _react2.default.createElement(Label, null, this.props.label),
              _react2.default.createElement(
                TextareaWrapper,
                { show: this.state.mounted },
                _react2.default.createElement(Textarea, {
                  innerRef: function innerRef(component) {
                    return (_this7.tinyMCE = component);
                  },
                  id: this.editorId
                })
              )
            );
          }
        }
      ]);

      return ContentEditor;
    })(react.Component));
  });

  unwrapExports(fields);
  var fields_1 = fields.ContentEditor;
  var fields_2 = fields.Dropdown;
  var fields_3 = fields.Text;

  var stepList = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class;

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  padding: 32px;\n  display: flex;\n  flex-direction: column;\n  flex-grow: 1;\n'
        ],
        [
          '\n  padding: 32px;\n  display: flex;\n  flex-direction: column;\n  flex-grow: 1;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        ['\n  display: flex;\n  margin-bottom: 24px;\n'],
        ['\n  display: flex;\n  margin-bottom: 24px;\n']
      ),
      _templateObject3 = _taggedTemplateLiteral(
        ['\n  font-size: 18px;\n  font-weight: 600;\n'],
        ['\n  font-size: 18px;\n  font-weight: 600;\n']
      ),
      _templateObject4 = _taggedTemplateLiteral(
        ['\n  line-height: 2em;\n'],
        ['\n  line-height: 2em;\n']
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  margin-left: auto !important;\n  display: flex;\n  align-items: center;\n  \n  &:before {\n    font-family: dashicons;\n    content: ',
          ';\n    vertical-align: middle;\n    margin-right: 4px;\n  }\n'
        ],
        [
          '\n  margin-left: auto !important;\n  display: flex;\n  align-items: center;\n  \n  &:before {\n    font-family: dashicons;\n    content: ',
          ';\n    vertical-align: middle;\n    margin-right: 4px;\n  }\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        [
          '\n  overflow-y: scroll;\n  max-height: calc(100vh - 375px);\n\n  .wpeg-dashboard__item {\n    opacity: ',
          '\n  }\n'
        ],
        [
          '\n  overflow-y: scroll;\n  max-height: calc(100vh - 375px);\n\n  .wpeg-dashboard__item {\n    opacity: ',
          '\n  }\n'
        ]
      ),
      _templateObject7 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  align-items: center;\n  background: var(--graylight3);\n  min-height: 100px;\n  width: 100%;\n  padding: 16px 32px;\n  margin-bottom: 16px;\n  box-sizing: border-box;\n  border: ',
          ';\n  opacity: ',
          ';\n\n  &:last-child {\n    margin: 0;\n  }\n'
        ],
        [
          '\n  display: flex;\n  align-items: center;\n  background: var(--graylight3);\n  min-height: 100px;\n  width: 100%;\n  padding: 16px 32px;\n  margin-bottom: 16px;\n  box-sizing: border-box;\n  border: ',
          ';\n  opacity: ',
          ';\n\n  &:last-child {\n    margin: 0;\n  }\n'
        ]
      ),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  flex-direction: column;\n  margin-left: 48px;\n  width: 400px;\n'
        ],
        [
          '\n  display: flex;\n  flex-direction: column;\n  margin-left: 48px;\n  width: 400px;\n'
        ]
      ),
      _templateObject9 = _taggedTemplateLiteral(
        [
          '\n  font-size: 18px;\n  font-weight: 600;\n  line-height: 1.5;\n  margin-bottom: 4px;\n'
        ],
        [
          '\n  font-size: 18px;\n  font-weight: 600;\n  line-height: 1.5;\n  margin-bottom: 4px;\n'
        ]
      ),
      _templateObject10 = _taggedTemplateLiteral(
        [
          '\n  line-height: 1.5;\n  font-size: 14px;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  color: var(--graylight2);\n'
        ],
        [
          '\n  line-height: 1.5;\n  font-size: 14px;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  color: var(--graylight2);\n'
        ]
      ),
      _templateObject11 = _taggedTemplateLiteral(
        [
          '\n  margin-left: auto;\n  display: flex;\n\n  svg {\n    width: 20px;\n    fill: var(--graylight2);\n  }\n'
        ],
        [
          '\n  margin-left: auto;\n  display: flex;\n\n  svg {\n    width: 20px;\n    fill: var(--graylight2);\n  }\n'
        ]
      ),
      _templateObject12 = _taggedTemplateLiteral(
        [
          '\n  cursor: pointer;\n  margin-right: 8px;\n  svg {\n    &:hover {\n      fill: var(--blue);\n    }\n  }\n'
        ],
        [
          '\n  cursor: pointer;\n  margin-right: 8px;\n  svg {\n    &:hover {\n      fill: var(--blue);\n    }\n  }\n'
        ]
      ),
      _templateObject13 = _taggedTemplateLiteral(
        [
          '\n  cursor: pointer;\n  svg {\n    &:hover {\n      fill: var(--red);\n    }\n  }\n'
        ],
        [
          '\n  cursor: pointer;\n  svg {\n    &:hover {\n      fill: var(--red);\n    }\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _stringStripHtml2 = _interopRequireDefault(stringStripHtml);

    var _menu2 = _interopRequireDefault(menu);

    var _pencil2 = _interopRequireDefault(pencil);

    var _trash2 = _interopRequireDefault(trash);

    var _view2 = _interopRequireDefault(view);

    var _emptyWrapper2 = _interopRequireDefault(emptyWrapper);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Wrapper = _styledComponents2.default.div(_templateObject);

    var Header = _styledComponents2.default.div(_templateObject2);

    var Title = _styledComponents2.default.div(_templateObject3);
    var SaveCancelWrapper = _styledComponents2.default.div(_templateObject4);
    var AddStepButton = _styledComponents2.default.button(
      _templateObject5,
      function(props) {
        return props.hasStep ? '"\f203"' : '"\f132"';
      }
    );

    var List = _styledComponents2.default.div(_templateObject6, function(
      props
    ) {
      return props.drag ? '0.35' : '1';
    });

    var ListItem = _styledComponents2.default.div(
      _templateObject7,
      function(props) {
        return props.drag ? '1px solid var(--graylight2)' : 'none';
      },
      function(props) {
        return props.drag ? '1 !important' : 'inherit';
      }
    );

    var ListContainer = _styledComponents2.default.div(_templateObject8);

    var ListTitle = _styledComponents2.default.div(_templateObject9);

    var ListDesc = _styledComponents2.default.div(_templateObject10);

    var ListTool = _styledComponents2.default.div(_templateObject11);

    var Edit = _styledComponents2.default.div(_templateObject12);

    var View = _styledComponents2.default.div(_templateObject12);

    var Delete = _styledComponents2.default.div(_templateObject13);

    var StepList = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(StepList, _Component);

            function StepList(props) {
              var _this2 = this;

              _classCallCheck(this, StepList);

              var _this = _possibleConstructorReturn(
                this,
                (StepList.__proto__ || Object.getPrototypeOf(StepList)).call(
                  this,
                  props
                )
              );

              _this.state = {
                list: [],
                editStepValue: {
                  title: '',
                  description: ''
                }
              };

              _this.arrayMove = function(arr, old_index, new_index) {
                if (new_index >= arr.length) {
                  var k = new_index - arr.length + 1;
                  while (k--) {
                    arr.push(undefined);
                  }
                }

                arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
                return arr;
              };

              _this._onDragEnd = (function() {
                var _ref = _asyncToGenerator(
                  /*#__PURE__*/ regeneratorRuntime.mark(function _callee(
                    result
                  ) {
                    var source, destination, state, srcId, dstId;
                    return regeneratorRuntime.wrap(
                      function _callee$(_context) {
                        while (1) {
                          switch ((_context.prev = _context.next)) {
                            case 0:
                              if (result.destination) {
                                _context.next = 2;
                                break;
                              }

                              return _context.abrupt('return');

                            case 2:
                              (source = result.source),
                                (destination = result.destination);
                              state = Object.assign({}, _this.state);
                              srcId = _this.state.list[source.index].ID;
                              dstId = _this.state.list[destination.index].ID;

                              _this.arrayMove(
                                state.list,
                                source.index,
                                destination.index
                              );
                              _context.next = 9;
                              return _this.setState(_extends({}, state));

                            case 9:
                              _this.props.$store.dashboard.reorderStep(
                                srcId,
                                dstId
                              );

                            case 10:
                            case 'end':
                              return _context.stop();
                          }
                        }
                      },
                      _callee,
                      _this2
                    );
                  })
                );

                return function(_x) {
                  return _ref.apply(this, arguments);
                };
              })();

              _this._edit = (function() {
                var _ref2 = _asyncToGenerator(
                  /*#__PURE__*/ regeneratorRuntime.mark(function _callee2(
                    stepId
                  ) {
                    return regeneratorRuntime.wrap(
                      function _callee2$(_context2) {
                        while (1) {
                          switch ((_context2.prev = _context2.next)) {
                            case 0:
                              _context2.next = 2;
                              return _this.props.$store.dashboard.editStepMode(
                                stepId
                              );

                            case 2:
                            case 'end':
                              return _context2.stop();
                          }
                        }
                      },
                      _callee2,
                      _this2
                    );
                  })
                );

                return function(_x2) {
                  return _ref2.apply(this, arguments);
                };
              })();

              _this._view = (function() {
                var _ref3 = _asyncToGenerator(
                  /*#__PURE__*/ regeneratorRuntime.mark(function _callee3(
                    stepId
                  ) {
                    return regeneratorRuntime.wrap(
                      function _callee3$(_context3) {
                        while (1) {
                          switch ((_context3.prev = _context3.next)) {
                            case 0:
                              _context3.next = 2;
                              return _this.props.$store.dashboard.viewStep(
                                stepId
                              );

                            case 2:
                            case 'end':
                              return _context3.stop();
                          }
                        }
                      },
                      _callee3,
                      _this2
                    );
                  })
                );

                return function(_x3) {
                  return _ref3.apply(this, arguments);
                };
              })();

              _this._updateStepValue = function(newValue) {
                var state = Object.assign({}, _this.state);

                for (var key in newValue) {
                  if (key in state.editStepValue) {
                    state.editStepValue[key] = newValue[key];
                  }
                }

                _this.setState(_extends({}, state));
              };

              _this._save = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee4() {
                  return regeneratorRuntime.wrap(
                    function _callee4$(_context4) {
                      while (1) {
                        switch ((_context4.prev = _context4.next)) {
                          case 0:
                            _this.props.list.slice().map(function(item) {
                              if (
                                item.ID ===
                                _this.props.$store.dashboard.editStep.ID
                              ) {
                                item.title = _this.state.editStepValue.title;
                                item.description =
                                  _this.state.editStepValue.description;
                              }
                              return item;
                            });

                            _context4.next = 3;
                            return _this.props.$store.dashboard.updateStep(
                              _this.props.$store.dashboard.editStep.ID,
                              {
                                title: _this.state.editStepValue.title,
                                description:
                                  _this.state.editStepValue.description
                              }
                            );

                          case 3:
                            _this.props.$store.dashboard.cancelEditStep();

                          case 4:
                          case 'end':
                            return _context4.stop();
                        }
                      }
                    },
                    _callee4,
                    _this2
                  );
                })
              );

              _this._cancelEdit = function(event) {
                event.preventDefault();
                _this.props.$store.dashboard.cancelEditStep();
              };

              _this._confirmDelete = function(stepId) {
                var currentStep = Object.assign(
                  {},
                  _this.props.list.find(function(item) {
                    return item.ID === stepId;
                  })
                );
                _this.selectedStep = currentStep;
                _this.props.$store.dashboard.setPopupConfirmInfo({
                  confirmMessage: currentStep.title,
                  confirmLabel: wpeg.lang.DELETE_STEP,
                  onCancel: _this._cancelDeleteStep,
                  onConfirm: _this._deleteStep
                });
                _this.props.$store.dashboard.hidePref();
                _this.props.$store.dashboard.normalMode();
                _this.props.$store.dashboard.showDeletePopup();
              };

              _this._cancelDeleteStep = function() {
                _this.props.$store.dashboard.hideDeletePopup();
              };

              _this._deleteStep = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee5() {
                  return regeneratorRuntime.wrap(
                    function _callee5$(_context5) {
                      while (1) {
                        switch ((_context5.prev = _context5.next)) {
                          case 0:
                            _context5.next = 2;
                            return _this.props.$store.dashboard.deleteStep(
                              _this.selectedStep.ID
                            );

                          case 2:
                            _this.props.$store.dashboard.normalMode();
                            _this.props.$store.dashboard.hidePref();
                            _this.props.$store.dashboard.hideDeletePopup();

                          case 5:
                          case 'end':
                            return _context5.stop();
                        }
                      }
                    },
                    _callee5,
                    _this2
                  );
                })
              );

              _this._addStep = function() {
                _this.props.$store.tool.toggleBottomBar();
                _this.props.$store.tool.setCurrentGuide(
                  _this.props.$store.dashboard.current
                );
              };

              _this.inputTitle = _react2.default.createRef();
              _this.inputDesc = _react2.default.createRef();
              _this.selectedStep = null;
              return _this;
            }

            _createClass(StepList, [
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  var state = Object.assign({}, this.state);

                  state.list = this.props.list;
                  this.setState(_extends({}, state));
                }
              },
              {
                key: 'UNSAFE_componentWillReceiveProps',
                value: function UNSAFE_componentWillReceiveProps(props) {
                  var state = Object.assign({}, this.state);

                  state.list = props.list;
                  this.setState(_extends({}, state));
                }
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  var list = this.state.list;
                  var isAddStepDisabled =
                    this.props.$store.tool.displayBottomBar ||
                    this.props.disableStepManager;
                  var hasStep = list.length > 0;

                  return _react2.default.createElement(
                    react.Fragment,
                    null,
                    _react2.default.createElement(
                      Wrapper,
                      null,
                      _react2.default.createElement(
                        Header,
                        null,
                        _react2.default.createElement(
                          Title,
                          { editStep: this.props.$store.dashboard.editStep },
                          wpeg.lang.STEP_LISTS
                        ),
                        _react2.default.createElement(
                          AddStepButton,
                          {
                            className:
                              'wpeg-dashboard__button-step-manager button',
                            onClick: this._addStep,
                            disabled: isAddStepDisabled,
                            hasStep: hasStep
                          },
                          hasStep ? wpeg.lang.STEP_MANAGER : wpeg.lang.NEW_STEP
                        )
                      ),
                      _react2.default.createElement(
                        _emptyWrapper2.default,
                        { list: list, message: wpeg.lang.NO_STEP },
                        _react2.default.createElement(
                          reactBeautifulDnd.DragDropContext,
                          { onDragEnd: this._onDragEnd },
                          _react2.default.createElement(
                            reactBeautifulDnd.Droppable,
                            {
                              droppableId: 'droppable',
                              isDropDisabled: this.props.onEdit
                            },
                            function(provided, snapshot) {
                              return _react2.default.createElement(
                                List,
                                {
                                  innerRef: provided.innerRef,
                                  drag: snapshot.isDraggingOver
                                },
                                list.map(function(item, key) {
                                  return _react2.default.createElement(
                                    reactBeautifulDnd.Draggable,
                                    {
                                      key: key,
                                      draggableId: item.ID,
                                      index: key,
                                      isDragDisabled: _this3.props.onEdit
                                    },
                                    function(provided, snapshot) {
                                      return _react2.default.createElement(
                                        ListItem,
                                        _extends(
                                          {
                                            className: 'wpeg-dashboard__item',
                                            innerRef: provided.innerRef,
                                            drag: snapshot.isDragging,
                                            style: _extends(
                                              {},
                                              provided.draggableProps.style
                                            )
                                          },
                                          provided.draggableProps
                                        ),
                                        _react2.default.createElement(
                                          _menu2.default,
                                          provided.dragHandleProps
                                        ),
                                        _react2.default.createElement(
                                          ListContainer,
                                          null,
                                          _this3.props.$store.dashboard
                                            .editStep &&
                                            _this3.props.$store.dashboard
                                              .editStep.ID === item.ID
                                            ? _react2.default.createElement(
                                                react.Fragment,
                                                null,
                                                _react2.default.createElement(
                                                  fields.Text,
                                                  {
                                                    ref: function ref(
                                                      component
                                                    ) {
                                                      return (_this3.inputTitle = component);
                                                    },
                                                    value:
                                                      _this3.props.$store
                                                        .dashboard.editStep
                                                        .title,
                                                    onUpdate: function onUpdate(
                                                      value
                                                    ) {
                                                      return _this3._updateStepValue(
                                                        { title: value }
                                                      );
                                                    }
                                                  }
                                                ),
                                                _react2.default.createElement(
                                                  fields.ContentEditor,
                                                  {
                                                    ref: function ref(
                                                      component
                                                    ) {
                                                      return (_this3.inputDesc = component);
                                                    },
                                                    value:
                                                      _this3.props.$store
                                                        .dashboard.editStep
                                                        .description,
                                                    onUpdate: function onUpdate(
                                                      value
                                                    ) {
                                                      return _this3._updateStepValue(
                                                        { description: value }
                                                      );
                                                    }
                                                  }
                                                ),
                                                _react2.default.createElement(
                                                  SaveCancelWrapper,
                                                  null,
                                                  _react2.default.createElement(
                                                    'button',
                                                    {
                                                      className: 'button',
                                                      onClick: _this3._save
                                                    },
                                                    wpeg.lang.SAVE
                                                  ),
                                                  ' ',
                                                  wpeg.lang.OR,
                                                  ' ',
                                                  _react2.default.createElement(
                                                    'a',
                                                    {
                                                      className: 'no-underline',
                                                      href: '',
                                                      onClick:
                                                        _this3._cancelEdit
                                                    },
                                                    wpeg.lang.CANCEL
                                                  )
                                                )
                                              )
                                            : _react2.default.createElement(
                                                react.Fragment,
                                                null,
                                                _react2.default.createElement(
                                                  ListTitle,
                                                  null,
                                                  item.title
                                                ),
                                                _react2.default.createElement(
                                                  ListDesc,
                                                  null,
                                                  (0,
                                                  _stringStripHtml2.default)(
                                                    item.description
                                                  )
                                                )
                                              )
                                        ),
                                        !_this3.props.onEdit &&
                                          _react2.default.createElement(
                                            ListTool,
                                            null,
                                            !_this3.props.$store.dashboard
                                              .isAddStep &&
                                              _react2.default.createElement(
                                                View,
                                                {
                                                  onClick: function onClick() {
                                                    return _this3._view(
                                                      item.ID
                                                    );
                                                  }
                                                },
                                                _react2.default.createElement(
                                                  _view2.default,
                                                  null
                                                )
                                              ),
                                            _react2.default.createElement(
                                              Edit,
                                              {
                                                onClick: function onClick() {
                                                  return _this3._edit(item.ID);
                                                }
                                              },
                                              _react2.default.createElement(
                                                _pencil2.default,
                                                null
                                              )
                                            ),
                                            _react2.default.createElement(
                                              Delete,
                                              {
                                                onClick: function onClick() {
                                                  return _this3._confirmDelete(
                                                    item.ID
                                                  );
                                                }
                                              },
                                              _react2.default.createElement(
                                                _trash2.default,
                                                null
                                              )
                                            )
                                          )
                                      );
                                    }
                                  );
                                }),
                                provided.placeholder
                              );
                            }
                          )
                        )
                      )
                    )
                  );
                }
              }
            ]);

            return StepList;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = StepList;
  });

  unwrapExports(stepList);

  var gear = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var IconCog = function IconCog(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z'
        })
      );
    };

    exports.default = IconCog;
  });

  unwrapExports(gear);

  var toggle = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Toggle = function Toggle(props) {
      return _react2.default.createElement(
        'svg',
        _extends(
          {
            width: 24,
            height: 24,
            viewBox: '0 0 24 24',
            fill: 'none',
            stroke: 'currentColor',
            strokeWidth: 2,
            strokeLinecap: 'round',
            strokeLinejoin: 'round',
            className: 'feather feather-toggle-left'
          },
          props
        ),
        _react2.default.createElement('rect', {
          x: 1,
          y: 5,
          width: 22,
          height: 14,
          rx: 7,
          ry: 7
        }),
        _react2.default.createElement('circle', { cx: 8, cy: 12, r: 3 })
      );
    };

    exports.default = Toggle;
  });

  unwrapExports(toggle);

  var loader = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Loader = function Loader(props) {
      return _react2.default.createElement(
        'svg',
        _extends(
          {
            width: 43,
            height: 43,
            viewBox: '0 0 100 100',
            preserveAspectRatio: 'xMidYMid',
            className: 'lds-bars',
            style: { background: '0 0' }
          },
          props
        ),
        _react2.default.createElement(
          'path',
          { fill: '#1d3f72', d: 'M15 30h10v40H15z' },
          _react2.default.createElement('animate', {
            attributeName: 'opacity',
            calcMode: 'spline',
            values: '1;0.2;1',
            keyTimes: '0;0.5;1',
            dur: 1,
            keySplines: '0.5 0 0.5 1;0.5 0 0.5 1',
            begin: '-0.6s',
            repeatCount: 'indefinite'
          })
        ),
        _react2.default.createElement(
          'path',
          { fill: '#5699d2', d: 'M35 30h10v40H35z' },
          _react2.default.createElement('animate', {
            attributeName: 'opacity',
            calcMode: 'spline',
            values: '1;0.2;1',
            keyTimes: '0;0.5;1',
            dur: 1,
            keySplines: '0.5 0 0.5 1;0.5 0 0.5 1',
            begin: '-0.4s',
            repeatCount: 'indefinite'
          })
        ),
        _react2.default.createElement(
          'path',
          { fill: '#d8ebf9', d: 'M55 30h10v40H55z' },
          _react2.default.createElement('animate', {
            attributeName: 'opacity',
            calcMode: 'spline',
            values: '1;0.2;1',
            keyTimes: '0;0.5;1',
            dur: 1,
            keySplines: '0.5 0 0.5 1;0.5 0 0.5 1',
            begin: '-0.2s',
            repeatCount: 'indefinite'
          })
        ),
        _react2.default.createElement(
          'path',
          { fill: '#71c2cc', d: 'M75 30h10v40H75z' },
          _react2.default.createElement('animate', {
            attributeName: 'opacity',
            calcMode: 'spline',
            values: '1;0.2;1',
            keyTimes: '0;0.5;1',
            dur: 1,
            keySplines: '0.5 0 0.5 1;0.5 0 0.5 1',
            begin: '0s',
            repeatCount: 'indefinite'
          })
        )
      );
    };

    exports.default = Loader;
  });

  unwrapExports(loader);

  var loader$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _templateObject = _taggedTemplateLiteral(
      [
        '\n    width: 100%;\n    height: 100%;\n    background-color: var(--white);\n    opacity: 0.8;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n'
      ],
      [
        '\n    width: 100%;\n    height: 100%;\n    background-color: var(--white);\n    opacity: 0.8;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n'
      ]
    );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _loader2 = _interopRequireDefault(loader);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var Overlay = _styledComponents2.default.div(_templateObject);

    exports.default = function() {
      return _react2.default.createElement(
        Overlay,
        null,
        _react2.default.createElement(_loader2.default, null)
      );
    };
  });

  unwrapExports(loader$2);

  var wrapper = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _class, _temp;

    var _templateObject = _taggedTemplateLiteral(
      [
        '\n  box-sizing: content-box;\n  box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.3);\n  background: var(--white);\n  border-radius: 5px;\n  z-index: 999999;\n  overflow: hidden;\n  transition: opacity 300ms, top 100ms, left 100ms;\n'
      ],
      [
        '\n  box-sizing: content-box;\n  box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.3);\n  background: var(--white);\n  border-radius: 5px;\n  z-index: 999999;\n  overflow: hidden;\n  transition: opacity 300ms, top 100ms, left 100ms;\n'
      ]
    );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var WrapperEl = _styledComponents2.default.div.attrs({
      style: function style(props) {
        var hasPos = typeof props.position !== 'undefined';
        var hasTopPos = hasPos && typeof props.position.top !== 'undefined';
        var hasLeftPos = hasPos && typeof props.position.left !== 'undefined';

        return {
          width: props.width ? props.width + 'px' : 400 + 'px',
          height: props.height ? props.height + 'px' : 'auto',
          position: hasPos ? 'fixed' : 'relative',
          top: hasTopPos ? props.position.top + 'px' : 'inherit',
          left: hasLeftPos ? props.position.left + 'px' : 'inherit',
          opacity: props.isCenter ? 1 : hasTopPos && hasLeftPos ? 1 : 0,
          visibility: props.isCenter
            ? 'visible'
            : hasTopPos && hasLeftPos
            ? 'visible'
            : 'hidden'
        };
      }
    })(_templateObject);

    var Wrapper = ((_temp = _class = (function(_Component) {
      _inherits(Wrapper, _Component);

      function Wrapper(props) {
        _classCallCheck(this, Wrapper);

        var _this = _possibleConstructorReturn(
          this,
          (Wrapper.__proto__ || Object.getPrototypeOf(Wrapper)).call(
            this,
            props
          )
        );

        _this.state = {
          scrolled: false,
          title: '',
          type: undefined,
          mounted: false
        };

        _this.element = _react2.default.createRef();
        return _this;
      }

      _createClass(
        Wrapper,
        [
          {
            key: 'componentDidMount',
            value: function componentDidMount() {
              this.props.onMount();
            }
          },
          {
            key: 'render',
            value: function render() {
              return _react2.default.createElement(
                WrapperEl,
                _extends(
                  {
                    innerRef: this.element
                  },
                  this.props
                )
              );
            }
          }
        ],
        [
          {
            key: 'getDerivedStateFromProps',
            value: function getDerivedStateFromProps(props, state) {
              if (props.position) {
                var scroll = function scroll() {
                  var element = props.element.current.element;
                  var top = props.position.top;
                  var _window = window,
                    windowHeight = _window.innerHeight;
                  var popupHeight = element.current.clientHeight;

                  var popupY = top + popupHeight;
                  var isOffScreen = top < 0 || popupY > windowHeight;

                  if (isOffScreen) {
                    setTimeout(function() {
                      window.scrollTo({ top: top, behavior: 'smooth' });
                    }, 100);
                  }

                  state.scrolled = true;
                };

                if (props.title !== state.title) {
                  state.scrolled = false;
                }

                if (props.type !== state.type) {
                  state.scrolled = false;
                }

                if (!state.scrolled) {
                  scroll();
                }

                state.title = props.title;
                state.type = props.type;
              }

              return state;
            }
          }
        ]
      );

      return Wrapper;
    })(react.Component)),
    (_class.defaultProps = {
      onMount: function onMount() {}
    }),
    _temp);
    exports.default = Wrapper;
  });

  unwrapExports(wrapper);

  var close = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Close = function Close(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z'
        })
      );
    };

    exports.default = Close;
  });

  unwrapExports(close);

  var popup = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = exports.Footer = exports.Content = exports.Title = exports.Overlay = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  justify-content: center;\n  align-items: center;\n  background-color: rgba(0, 0, 0, ',
          ');\n  z-index: 9999999;\n  display: flex;\n  pointer-events: ',
          ';\n'
        ],
        [
          '\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  justify-content: center;\n  align-items: center;\n  background-color: rgba(0, 0, 0, ',
          ');\n  z-index: 9999999;\n  display: flex;\n  pointer-events: ',
          ';\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  position: absolute;\n  top: 16px;\n  right: 16px;\n  cursor: pointer !important;\n'
        ],
        [
          '\n  position: absolute;\n  top: 16px;\n  right: 16px;\n  cursor: pointer !important;\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        ['\n  position: fixed;\n  z-index: 99999;\n  background: ', ';\n'],
        ['\n  position: fixed;\n  z-index: 99999;\n  background: ', ';\n']
      ),
      _templateObject4 = _taggedTemplateLiteral(
        ['\n  font-size: 16px;\n  line-height: 1.5;\n'],
        ['\n  font-size: 16px;\n  line-height: 1.5;\n']
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  font-weight: 600;\n  display: flex;\n  align-items: center;\n  line-height: normal;\n  padding: 24px 24px 0;\n\n  svg {\n    margin-right: 8px;\n    height: 18px;\n    width: auto;\n\n  }\n\n  svg.close {\n    margin-left: auto;\n    margin-right: 0;\n    width: auto;\n    height: 24px;\n  }\n'
        ],
        [
          '\n  font-weight: 600;\n  display: flex;\n  align-items: center;\n  line-height: normal;\n  padding: 24px 24px 0;\n\n  svg {\n    margin-right: 8px;\n    height: 18px;\n    width: auto;\n\n  }\n\n  svg.close {\n    margin-left: auto;\n    margin-right: 0;\n    width: auto;\n    height: 24px;\n  }\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        ['\n  padding: 36px 24px 24px 24px;\n'],
        ['\n  padding: 36px 24px 24px 24px;\n']
      ),
      _templateObject7 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  justify-content: space-between;\n  padding: 22px 24px;\n  background-color: var(--graylight4);\n  text-align: ',
          ';\n  .button {\n    margin-right: 8px;\n  }\n'
        ],
        [
          '\n  display: flex;\n  justify-content: space-between;\n  padding: 22px 24px;\n  background-color: var(--graylight4);\n  text-align: ',
          ';\n  .button {\n    margin-right: 8px;\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _wrapper2 = _interopRequireDefault(wrapper);

    var _close2 = _interopRequireDefault(close);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var Overlay = (exports.Overlay = _styledComponents2.default.div(
      _templateObject,
      function(props) {
        return props.disabled ? 0 : 0.4;
      },
      function(props) {
        return props.disabled ? 'none' : 'all';
      }
    ));

    var Close = _styledComponents2.default.div(_templateObject2);

    var ClipOverlay = _styledComponents2.default.div.attrs({
      style: function style(props) {
        return {
          top: props.top + 'px',
          left: props.left + 'px',
          width: '' + props.width,
          height: '' + props.height,
          bottom: props.bottom !== undefined ? '' + props.bottom : null
        };
      }
    })(_templateObject3, function(props) {
      return props.transparent ? null : 'rgba(0, 0, 0, 0.2)';
    });

    var ContentStyle = _styledComponents2.default.div(_templateObject4);
    var Title = (exports.Title = ContentStyle.extend(_templateObject5));

    var Content = (exports.Content = ContentStyle.extend(_templateObject6));

    var Footer = (exports.Footer = _styledComponents2.default.div(
      _templateObject7,
      function(props) {
        return props.align ? props.align : 'center';
      }
    ));

    var positionTypes = {
      TOP: 'top',
      RIGHT: 'right',
      BOTTOM: 'bottom',
      LEFT: 'left',
      MIDDLE: 'middle',
      CENTER: 'center',
      INNERTOP: 'in-top',
      INNERBOTTOM: 'in-bottom',
      INNERRIGHT: 'in-right',
      INNERLEFT: 'in-left'
    };

    var Popup = (function(_Component) {
      _inherits(Popup, _Component);

      function Popup(props) {
        _classCallCheck(this, Popup);

        var _this = _possibleConstructorReturn(
          this,
          (Popup.__proto__ || Object.getPrototypeOf(Popup)).call(this, props)
        );

        _this.state = {
          isWrapperMounted: false
        };

        _this._getPosition = function() {
          if (_this.props.stickTo && _this.wrapper.current) {
            var withMargin = function withMargin(val) {
              var substract =
                arguments.length > 1 && arguments[1] !== undefined
                  ? arguments[1]
                  : false;

              var margin = 16;
              return substract ? val - margin : val + margin;
            };

            var element = _this.wrapper.current.element;
            var _window = window,
              windowWidth = _window.innerWidth,
              windowHeight = _window.innerHeight;
            var _element$current = element.current,
              popupWidth = _element$current.clientWidth,
              popupHeight = _element$current.clientHeight;
            var _this$props$stickTo = _this.props.stickTo,
              x = _this$props$stickTo.left,
              y = _this$props$stickTo.top,
              elementWidth = _this$props$stickTo.width,
              elementHeight = _this$props$stickTo.height;

            var halfElementWidth = elementWidth / 2;
            var halfElementHeight = elementHeight / 2;
            var halfPopupHeight = popupHeight / 2;
            var halfPopupWidth = popupWidth / 2;

            var posY = positionTypes.MIDDLE;
            var posX = positionTypes.RIGHT;
            var top = void 0;
            var left = void 0;

            // Off screens
            var offScreenTop = withMargin(y - popupHeight, true) <= 0;
            var offScreenBottom =
              withMargin(y + elementHeight + popupHeight) >= windowHeight;
            var offScreenLeft = withMargin(x - popupWidth, true) <= 0;
            var offScreenRight =
              withMargin(x + elementWidth + popupWidth) >= windowWidth;

            // Off screen top
            if (offScreenTop) {
              posY = positionTypes.INNERTOP;
            }

            // Off screen bottom
            if (offScreenBottom) {
              posY = positionTypes.INNERBOTTOM;
            }

            // Off screen left
            if (offScreenLeft) {
              posX = positionTypes.RIGHT;
            }

            // Off screen right
            if (offScreenRight) {
              posX = positionTypes.LEFT;
            }

            // Off screen nor right / left
            if (offScreenLeft && offScreenRight) {
              posX = positionTypes.CENTER;

              // if (offScreenTop) {
              //   posY = positionTypes.BOTTOM
              // }

              // if (offScreenBottom) {
              //   posY = positionTypes.TOP
              // }
            }

            // Off screen nor top / bottom
            if (offScreenTop && offScreenBottom) {
              posY = positionTypes.MIDDLE;

              // if (offScreenRight) {
              //   posX = positionTypes.LEFT
              // }

              // if (offScreenLeft) {
              //   posX = positionTypes.RIGHT
              // }
            }

            // Calculate `y` position
            switch (posY) {
              case positionTypes.TOP:
                top = withMargin(y - popupHeight, true);
                break;

              case positionTypes.INNERTOP:
                top = y;
                break;

              case positionTypes.BOTTOM:
                top = withMargin(y + elementHeight);
                break;

              case positionTypes.INNERBOTTOM:
                top = y + elementHeight - popupHeight;
                break;

              case positionTypes.MIDDLE:
                top = y - halfPopupHeight + halfElementHeight;
                break;

              default:
                break;
            }

            // Calculate `x` position
            switch (posX) {
              case positionTypes.LEFT:
                left = withMargin(x - popupWidth, true);
                break;

              case positionTypes.INNERLEFT:
                left = x;
                break;

              case positionTypes.RIGHT:
                left = withMargin(x + elementWidth);
                break;

              case positionTypes.INNERRIGHT:
                left = x + elementWidth - popupWidth;
                break;

              case positionTypes.CENTER:
                left = x + halfElementWidth - halfPopupWidth;
                break;

              default:
                break;
            }

            return {
              top: top,
              left: left
            };
          }
        };

        _this.onWrapperMount = function() {
          setTimeout(function() {
            _this.setState({
              isWrapperMounted: true
            });
          }, 200);
        };

        _this.wrapper = _react2.default.createRef();
        return _this;
      }

      // The only way force update of wrapper's height
      // By passing random props, at this case is `isWrapperMounted`

      _createClass(Popup, [
        {
          key: 'render',
          value: function render() {
            var _this2 = this;

            var PopupWrapper = function PopupWrapper() {
              var isCenter =
                arguments.length > 0 && arguments[0] !== undefined
                  ? arguments[0]
                  : false;
              return _react2.default.createElement(
                _wrapper2.default,
                {
                  ref: _this2.wrapper,
                  position: _this2._getPosition(),
                  onMount: _this2.onWrapperMount,
                  mounted: _this2.state.isWrapperMounted,
                  isCenter: isCenter,
                  className: _this2.props.className,
                  element: _this2.wrapper,
                  type: _this2.props.type,
                  title: _this2.props.titleId
                },
                _react2.default.createElement(
                  Close,
                  { onClick: _this2.props.onClose },
                  _react2.default.createElement(_close2.default, {
                    className: 'close'
                  })
                ),
                _this2.props.title &&
                  _react2.default.createElement(
                    Title,
                    null,
                    _this2.props.titleIcon,
                    _react2.default.createElement(
                      'span',
                      { className: 'text' },
                      _this2.props.title
                    )
                  ),
                _this2.props.children
              );
            };

            if (this.props.stickTo) {
              return _react2.default.createElement(
                react.Fragment,
                null,
                typeof this.props.stickTo.top !== 'undefined' &&
                  typeof this.props.stickTo.left !== 'undefined' &&
                  this.props.stickTo.top === 0 &&
                  _react2.default.createElement(ClipOverlay, {
                    width: '100%',
                    height: '100%',
                    left: 0,
                    top: 0
                  }),
                this.props.stickTo.top &&
                  _react2.default.createElement(ClipOverlay, {
                    width: '100%',
                    height: this.props.stickTo.top + 'px',
                    left: 0,
                    top: 0
                  }),
                this.props.stickTo.top &&
                  this.props.stickTo.right &&
                  _react2.default.createElement(ClipOverlay, {
                    width: '100%',
                    height: this.props.stickTo.height + 'px',
                    top: this.props.stickTo.top,
                    left: this.props.stickTo.right
                  }),
                this.props.stickTo.top &&
                  this.props.stickTo.height &&
                  _react2.default.createElement(ClipOverlay, {
                    width: '100%',
                    bottom: 0,
                    top: this.props.stickTo.top + this.props.stickTo.height,
                    left: 0
                  }),
                this.props.stickTo.top &&
                  this.props.stickTo.left &&
                  _react2.default.createElement(ClipOverlay, {
                    width: this.props.stickTo.left + 'px',
                    height: this.props.stickTo.height + 'px',
                    top: this.props.stickTo.top,
                    left: 0
                  }),
                this.props.stickTo.top &&
                  this.props.stickTo.left &&
                  typeof this.props.forceHover !== 'undefined' &&
                  _react2.default.createElement(ClipOverlay, {
                    transparent: true,
                    width: this.props.stickTo.width + 'px',
                    height: this.props.stickTo.height + 'px',
                    top: this.props.stickTo.top,
                    left: this.props.stickTo.left
                  }),
                PopupWrapper()
              );
            }

            return _react2.default.createElement(
              react.Fragment,
              null,
              _react2.default.createElement(
                Overlay,
                { disabled: !this.props.isOverlay || null },
                PopupWrapper(true)
              )
            );
          }
        }
      ]);

      return Popup;
    })(react.Component);

    exports.default = Popup;
  });

  unwrapExports(popup);
  var popup_1 = popup.Footer;
  var popup_2 = popup.Content;
  var popup_3 = popup.Title;
  var popup_4 = popup.Overlay;

  var _delete = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    var _2 = _interopRequireDefault(popup);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    /* global wpeg */
    exports.default = function(props) {
      return _react2.default.createElement(
        _2.default,
        { isOverlay: true, onClose: props.onCancel },
        _react2.default.createElement(popup.Content, null, props.children),
        _react2.default.createElement(
          popup.Footer,
          null,
          _react2.default.createElement(
            'button',
            { className: 'button button-danger', onClick: props.onConfirm },
            props.confirmLabel || wpeg.lang.YES
          ),
          _react2.default.createElement(
            'button',
            { className: 'button', onClick: props.onCancel },
            wpeg.lang.NOT_NOW
          )
        )
      );
    };
  });

  unwrapExports(_delete);

  var editGuide = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = exports.Preferences = exports.Form = exports.InputDesc = exports.InputTitle = exports.Header = exports.Container = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class;

    var _templateObject = _taggedTemplateLiteral(
        ['\n  display: flex;\n  flex-direction: column;\n  height: 100%;\n'],
        ['\n  display: flex;\n  flex-direction: column;\n  height: 100%;\n']
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  border-bottom: 1px solid var(--graylight);\n  padding: 32px 32px 16px;\n  display: flex;\n  align-items: flex-start;\n'
        ],
        [
          '\n  border-bottom: 1px solid var(--graylight);\n  padding: 32px 32px 16px;\n  display: flex;\n  align-items: flex-start;\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        ['\n  font-size: 24px;\n  font-weight: 600;\n  line-height: 1.5;\n'],
        ['\n  font-size: 24px;\n  font-weight: 600;\n  line-height: 1.5;\n']
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  font-size: 16px;\n  color: var(--graylight2);\n  line-height: 1.5;\n'
        ],
        [
          '\n  font-size: 16px;\n  color: var(--graylight2);\n  line-height: 1.5;\n'
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  font-size: 24px;\n  font-weight: 600;\n  padding: 4px 16px;\n  border: 1px solid var(--gray);\n  width: 85%;\n  color: var(--gray2);\n  margin-bottom: 8px;\n\n  &::placeholder {\n    font-weight: 400;\n    font-style: italic;\n    color: var(--gray);\n  }\n'
        ],
        [
          '\n  font-size: 24px;\n  font-weight: 600;\n  padding: 4px 16px;\n  border: 1px solid var(--gray);\n  width: 85%;\n  color: var(--gray2);\n  margin-bottom: 8px;\n\n  &::placeholder {\n    font-weight: 400;\n    font-style: italic;\n    color: var(--gray);\n  }\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        ['\n  font-size: 16px;\n  font-weight: 400px;\n  margin: 0 8px 0 0;\n'],
        ['\n  font-size: 16px;\n  font-weight: 400px;\n  margin: 0 8px 0 0;\n']
      ),
      _templateObject7 = _taggedTemplateLiteral(
        ['\n  display: flex;\n  flex-direction: column;\n  flex-basis: 65%;\n'],
        ['\n  display: flex;\n  flex-direction: column;\n  flex-basis: 65%;\n']
      ),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\n  position: relative;\n  align-items: center;\n  margin-left: auto;\n  margin-top: 5px;\n'
        ],
        [
          '\n  position: relative;\n  align-items: center;\n  margin-left: auto;\n  margin-top: 5px;\n'
        ]
      ),
      _templateObject9 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  color: var(--blue);\n  display: flex;\n  cursor: pointer;\n  font-size: 16px;\n  font-weight: bold;\n  align-items: center;\n\n  &:hover {\n    color: var(--blue);\n  }\n\n  svg {\n    fill: var(--blue);\n    margin-right: 5px;\n  }\n\n  &.gray {\n    color: var(--graylight2);\n\n    svg {\n      fill: var(--graylight2);\n    }\n  }\n'
        ],
        [
          '\n  display: flex;\n  color: var(--blue);\n  display: flex;\n  cursor: pointer;\n  font-size: 16px;\n  font-weight: bold;\n  align-items: center;\n\n  &:hover {\n    color: var(--blue);\n  }\n\n  svg {\n    fill: var(--blue);\n    margin-right: 5px;\n  }\n\n  &.gray {\n    color: var(--graylight2);\n\n    svg {\n      fill: var(--graylight2);\n    }\n  }\n'
        ]
      ),
      _templateObject10 = _taggedTemplateLiteral(
        [
          '\n  border-radius: 2px;\n  background: var(--white);\n  box-shadow: 1px 3px 12px 0 rgba(0,0,0,0.2);\n  position: absolute;\n  margin-top: 10px;\n  right: 0;\n  padding: 16px 24px;\n  width: 200px;\n'
        ],
        [
          '\n  border-radius: 2px;\n  background: var(--white);\n  box-shadow: 1px 3px 12px 0 rgba(0,0,0,0.2);\n  position: absolute;\n  margin-top: 10px;\n  right: 0;\n  padding: 16px 24px;\n  width: 200px;\n'
        ]
      ),
      _templateObject11 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  margin-bottom: 16px;\n  font-size: 16px;\n  cursor: pointer;\n  align-items: center;\n  color: inherit;\n\n  &:last-child {\n    margin: 0;\n  }\n\n  &.disabled {\n    color: var(--gray);\n    cursor: default;\n\n    path {\n      fill: var(--gray);\n    }\n  }\n\n  &:hover {\n    svg {\n      fill: var(--blue);\n    }\n\n    &.toggle {\n      circle, rect {\n        fill: none;\n      }\n    }\n  }\n\n  &.toggle {\n    circle {\n      transition: cx 0.1s linear;\n    }\n\n    &.enable {\n      circle, rect {\n        color: var(--gray2);\n      }\n\n      circle {\n        fill: var(--gray2);\n        cx: 16px;\n      }\n    }\n    &.disable {\n      circle, rect {\n        color: var(--blue);\n      }\n\n      circle {\n        fill: var(--blue);\n      }\n    }\n  }\n\n  &.delete {\n    color: var(--red);\n\n    svg {\n      fill: var(--red);\n    }\n  }\n\n  svg {\n    margin-right: 5px;\n  }\n'
        ],
        [
          '\n  display: flex;\n  margin-bottom: 16px;\n  font-size: 16px;\n  cursor: pointer;\n  align-items: center;\n  color: inherit;\n\n  &:last-child {\n    margin: 0;\n  }\n\n  &.disabled {\n    color: var(--gray);\n    cursor: default;\n\n    path {\n      fill: var(--gray);\n    }\n  }\n\n  &:hover {\n    svg {\n      fill: var(--blue);\n    }\n\n    &.toggle {\n      circle, rect {\n        fill: none;\n      }\n    }\n  }\n\n  &.toggle {\n    circle {\n      transition: cx 0.1s linear;\n    }\n\n    &.enable {\n      circle, rect {\n        color: var(--gray2);\n      }\n\n      circle {\n        fill: var(--gray2);\n        cx: 16px;\n      }\n    }\n    &.disable {\n      circle, rect {\n        color: var(--blue);\n      }\n\n      circle {\n        fill: var(--blue);\n      }\n    }\n  }\n\n  &.delete {\n    color: var(--red);\n\n    svg {\n      fill: var(--red);\n    }\n  }\n\n  svg {\n    margin-right: 5px;\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _reactClickOutside2 = _interopRequireDefault(reactClickOutside);

    var _stepList2 = _interopRequireDefault(stepList);

    var _gear2 = _interopRequireDefault(gear);

    var _toggle2 = _interopRequireDefault(toggle);

    var _view2 = _interopRequireDefault(view);

    var _pencil2 = _interopRequireDefault(pencil);

    var _trash2 = _interopRequireDefault(trash);

    var _loader2 = _interopRequireDefault(loader$2);

    var _delete2 = _interopRequireDefault(_delete);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Container = (exports.Container = _styledComponents2.default.div(
      _templateObject
    ));

    var Header = (exports.Header = _styledComponents2.default.div(
      _templateObject2
    ));

    var Title = _styledComponents2.default.div(_templateObject3);

    var Desc = _styledComponents2.default.div(_templateObject4);

    var InputTitle = (exports.InputTitle = _styledComponents2.default.input(
      _templateObject5
    ));

    var InputDesc = (exports.InputDesc = InputTitle.extend(_templateObject6));

    var Form = (exports.Form = _styledComponents2.default.div(
      _templateObject7
    ));

    var PreferenceWrapper = _styledComponents2.default.div(_templateObject8);

    var Preference = _styledComponents2.default.a(_templateObject9);

    var Preferences = (exports.Preferences = function Preferences(props) {
      return _react2.default.createElement(
        Preference,
        props,
        _react2.default.createElement(_gear2.default, null),
        'Preference'
      );
    });

    var PrefBox = _styledComponents2.default.div(_templateObject10);

    var PrefMenu = _styledComponents2.default.a(_templateObject11);

    var EditGuidePage = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(EditGuidePage, _Component);

            function EditGuidePage(props) {
              var _this2 = this;

              _classCallCheck(this, EditGuidePage);

              var _this = _possibleConstructorReturn(
                this,
                (
                  EditGuidePage.__proto__ ||
                  Object.getPrototypeOf(EditGuidePage)
                ).call(this, props)
              );

              _this._getDetail = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee() {
                  var list,
                    item,
                    _item$getBoundingClie,
                    itemPosY,
                    _list$getBoundingClie,
                    listPosY;

                  return regeneratorRuntime.wrap(
                    function _callee$(_context) {
                      while (1) {
                        switch ((_context.prev = _context.next)) {
                          case 0:
                            _context.next = 2;
                            return _this.props.$store.dashboard.get(
                              _this.props.match.params.id
                            );

                          case 2:
                            _this.props.$store.dashboard.hidePref();
                            _this.props.$store.dashboard.normalMode();

                            list = document.querySelector('.list');

                            if (list) {
                              _context.next = 7;
                              break;
                            }

                            return _context.abrupt('return');

                          case 7:
                            item = list.querySelector(
                              '.list-item[data-id="' +
                                _this.props.match.params.id +
                                '"]'
                            );

                            if (item) {
                              _context.next = 10;
                              break;
                            }

                            return _context.abrupt('return');

                          case 10:
                            (_item$getBoundingClie = item.getBoundingClientRect()),
                              (itemPosY = _item$getBoundingClie.top);
                            (_list$getBoundingClie = list.getBoundingClientRect()),
                              (listPosY = _list$getBoundingClie.top);

                            list.scrollTo({
                              top: itemPosY - listPosY,
                              behavior: 'smooth'
                            });

                          case 13:
                          case 'end':
                            return _context.stop();
                        }
                      }
                    },
                    _callee,
                    _this2
                  );
                })
              );

              _this._togglePref = function() {
                _this.props.$store.dashboard.togglePref();
              };

              _this._closePref = function() {
                _this.props.$store.dashboard.hidePref();
              };

              _this._toggleGuide = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee2() {
                  return regeneratorRuntime.wrap(
                    function _callee2$(_context2) {
                      while (1) {
                        switch ((_context2.prev = _context2.next)) {
                          case 0:
                            _context2.next = 2;
                            return _this.props.$store.dashboard.update(
                              _this.props.$store.dashboard.current.ID,
                              {
                                active: !JSON.parse(
                                  _this.props.$store.dashboard.current.active
                                )
                              }
                            );

                          case 2:
                          case 'end':
                            return _context2.stop();
                        }
                      }
                    },
                    _callee2,
                    _this2
                  );
                })
              );
              _this._previewGuide = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee3() {
                  return regeneratorRuntime.wrap(
                    function _callee3$(_context3) {
                      while (1) {
                        switch ((_context3.prev = _context3.next)) {
                          case 0:
                            if (
                              !(
                                _this.props.$store.dashboard.current &&
                                _this.props.$store.dashboard.current.steps &&
                                _this.props.$store.dashboard.current.steps
                                  .length > 0
                              )
                            ) {
                              _context3.next = 3;
                              break;
                            }

                            _context3.next = 3;
                            return _this.props.$store.tool.viewStep(
                              _this.props.$store.dashboard.current,
                              null,
                              stores.viewSourceTypes.DASHBOARD
                            );

                          case 3:
                          case 'end':
                            return _context3.stop();
                        }
                      }
                    },
                    _callee3,
                    _this2
                  );
                })
              );
              _this._editMode = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee4() {
                  return regeneratorRuntime.wrap(
                    function _callee4$(_context4) {
                      while (1) {
                        switch ((_context4.prev = _context4.next)) {
                          case 0:
                            _context4.next = 2;
                            return _this.props.$store.dashboard.editMode();

                          case 2:
                            _this.inputTitle.value =
                              _this.props.$store.dashboard.current.title;
                            _this.inputDesc.value =
                              _this.props.$store.dashboard.current.description;
                            _this.inputTitle.focus();
                            _this.props.$store.dashboard.hidePref();

                          case 6:
                          case 'end':
                            return _context4.stop();
                        }
                      }
                    },
                    _callee4,
                    _this2
                  );
                })
              );
              _this._save = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee5() {
                  return regeneratorRuntime.wrap(
                    function _callee5$(_context5) {
                      while (1) {
                        switch ((_context5.prev = _context5.next)) {
                          case 0:
                            _context5.next = 2;
                            return _this.props.$store.dashboard.update(
                              _this.props.$store.dashboard.current.ID,
                              {
                                title: _this.inputTitle.value,
                                description: _this.inputDesc.value
                              }
                            );

                          case 2:
                            _this.props.$store.dashboard.normalMode();

                          case 3:
                          case 'end':
                            return _context5.stop();
                        }
                      }
                    },
                    _callee5,
                    _this2
                  );
                })
              );

              _this._cancelEdit = function(event) {
                event.preventDefault();
                _this.props.$store.dashboard.normalMode();
                _this.props.$store.dashboard.hidePref();
              };

              _this._cancelDelete = function() {
                _this.props.$store.dashboard.hideDeletePopup();
                _this.props.$store.dashboard.showPref();
              };

              _this._showDeletePopup = function() {
                _this.props.$store.dashboard.setPopupConfirmInfo({
                  confirmMessage: _this.props.$store.dashboard.current.title,
                  confirmLabel: wpeg.lang.DELETE_GUIDE,
                  onCancel: _this._cancelDelete,
                  onConfirm: _this._deleteGuide
                });

                _this.props.$store.dashboard.hidePref();
                _this.props.$store.dashboard.normalMode();
                _this.props.$store.dashboard.showDeletePopup();
              };

              _this._deleteGuide = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee6() {
                  return regeneratorRuntime.wrap(
                    function _callee6$(_context6) {
                      while (1) {
                        switch ((_context6.prev = _context6.next)) {
                          case 0:
                            _context6.next = 2;
                            return _this.props.$store.dashboard.delete(
                              _this.props.$store.dashboard.current.ID
                            );

                          case 2:
                            _this.props.$store.dashboard.normalMode();
                            _this.props.$store.dashboard.hidePref();
                            _this.props.$store.dashboard.hideDeletePopup();

                          case 5:
                          case 'end':
                            return _context6.stop();
                        }
                      }
                    },
                    _callee6,
                    _this2
                  );
                })
              );

              _this.inputTitle = _react2.default.createRef();
              _this.inputDesc = _react2.default.createRef();
              return _this;
            }

            _createClass(EditGuidePage, [
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  this._getDetail();
                }
              },
              {
                key: 'componentDidUpdate',
                value: function componentDidUpdate(prevProps) {
                  if (this.props.location !== prevProps.location) {
                    this.onRouteChanged();
                  }
                }
              },
              {
                key: 'onRouteChanged',
                value: function onRouteChanged() {
                  this._getDetail();
                }
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  var onEdit =
                    this.props.$store.tool.displayBottomBar &&
                    this.props.$store.dashboard.current &&
                    this.props.$store.tool.currentGuide &&
                    this.props.$store.dashboard.current.ID ===
                      this.props.$store.tool.currentGuide.ID;

                  var prefMenus = [
                    {
                      id: 'toggle',
                      label: wpeg.lang.DISABLE_ENABLE_GUIDE,
                      icon: _react2.default.createElement(
                        _toggle2.default,
                        null
                      ),
                      className: [
                        this.props.$store.dashboard.current &&
                          (this.props.$store.dashboard.current.active
                            ? 'disable'
                            : 'enable')
                      ],
                      hide: onEdit,
                      click: this._toggleGuide
                    },
                    {
                      id: 'view',
                      label: wpeg.lang.PREVIEW_GUIDE,
                      icon: _react2.default.createElement(_view2.default, {
                        className: 'view'
                      }),
                      className: [
                        this.props.$store.dashboard.current &&
                          this.props.$store.dashboard.current.steps &&
                          (this.props.$store.dashboard.current.steps.length > 0
                            ? ''
                            : 'disabled')
                      ],
                      click: this._previewGuide
                    },
                    {
                      id: 'edit',
                      label: wpeg.lang.EDIT_GUIDE,
                      icon: _react2.default.createElement(_pencil2.default, {
                        className: 'edit'
                      }),
                      hide: this.props.$store.dashboard.editGuide || onEdit,
                      click: this._editMode
                    },
                    {
                      id: 'delete',
                      label: wpeg.lang.DELETE,
                      icon: _react2.default.createElement(
                        _trash2.default,
                        null
                      ),
                      hide: onEdit,
                      click: this._showDeletePopup
                    }
                  ];

                  return _react2.default.createElement(
                    react.Fragment,
                    null,
                    this.props.$store.dashboard.deletePopup &&
                      _react2.default.createElement(
                        _delete2.default,
                        {
                          confirmLabel: this.props.$store.dashboard
                            .popupConfirmInfo.confirmLabel,
                          onConfirm: this.props.$store.dashboard
                            .popupConfirmInfo.onConfirm,
                          onCancel: this.props.$store.dashboard.popupConfirmInfo
                            .onCancel
                        },
                        wpeg.lang.DELETE_CONFIRMATION,
                        ' "',
                        _react2.default.createElement(
                          'strong',
                          null,
                          this.props.$store.dashboard.popupConfirmInfo
                            .confirmMessage,
                          '"'
                        ),
                        '?',
                        _react2.default.createElement('br', null),
                        wpeg.lang.ACTION_NOT_CANCELABLE
                      ),
                    this.props.$store.dashboard.current
                      ? _react2.default.createElement(
                          Container,
                          null,
                          _react2.default.createElement(
                            Header,
                            null,
                            _react2.default.createElement(
                              Form,
                              null,
                              this.props.$store.dashboard.editGuide
                                ? _react2.default.createElement(
                                    react.Fragment,
                                    null,
                                    _react2.default.createElement(InputTitle, {
                                      placeholder: wpeg.lang.NEW_GUIDE,
                                      innerRef: function innerRef(component) {
                                        return (_this3.inputTitle = component);
                                      }
                                    }),
                                    _react2.default.createElement(
                                      'div',
                                      null,
                                      _react2.default.createElement(InputDesc, {
                                        placeholder:
                                          wpeg.lang
                                            .GUIDE_DESCRIPTION_PLACEHOLDER,
                                        innerRef: function innerRef(component) {
                                          return (_this3.inputDesc = component);
                                        }
                                      }),
                                      _react2.default.createElement(
                                        'button',
                                        {
                                          className: 'button',
                                          onClick: this._save
                                        },
                                        wpeg.lang.SAVE
                                      ),
                                      ' ',
                                      wpeg.lang.OR,
                                      ' ',
                                      _react2.default.createElement(
                                        'a',
                                        {
                                          className: 'no-underline',
                                          href: '',
                                          onClick: this._cancelEdit
                                        },
                                        wpeg.lang.CANCEL
                                      )
                                    )
                                  )
                                : _react2.default.createElement(
                                    react.Fragment,
                                    null,
                                    _react2.default.createElement(
                                      Title,
                                      null,
                                      this.props.$store.dashboard.current.title
                                    ),
                                    _react2.default.createElement(
                                      'div',
                                      null,
                                      _react2.default.createElement(
                                        Desc,
                                        null,
                                        this.props.$store.dashboard.current
                                          .description
                                      )
                                    )
                                  )
                            ),
                            _react2.default.createElement(
                              PreferenceWrapper,
                              null,
                              _react2.default.createElement(
                                _reactClickOutside2.default,
                                { onClickOutside: this._closePref },
                                _react2.default.createElement(Preferences, {
                                  onClick: this._togglePref
                                }),
                                this.props.$store.dashboard.displayPref &&
                                  _react2.default.createElement(
                                    PrefBox,
                                    null,
                                    prefMenus.map(function(item, key) {
                                      if (item.hide) {
                                        return null;
                                      }

                                      var className = [item.id];

                                      if (item.className) {
                                        className = className.concat(
                                          item.className
                                        );
                                      }

                                      return _react2.default.createElement(
                                        PrefMenu,
                                        {
                                          key: key,
                                          className: className.join(' '),
                                          onClick: !item.disabled && item.click
                                        },
                                        item.icon,
                                        ' ',
                                        item.label
                                      );
                                    })
                                  )
                              )
                            )
                          ),
                          _react2.default.createElement(_stepList2.default, {
                            list: this.props.$store.dashboard.current.steps,
                            onEdit: onEdit
                          })
                        )
                      : _react2.default.createElement(_loader2.default, null)
                  );
                }
              }
            ]);

            return EditGuidePage;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = EditGuidePage;
  });

  unwrapExports(editGuide);
  var editGuide_1 = editGuide.Preferences;
  var editGuide_2 = editGuide.Form;
  var editGuide_3 = editGuide.InputDesc;
  var editGuide_4 = editGuide.InputTitle;
  var editGuide_5 = editGuide.Header;
  var editGuide_6 = editGuide.Container;

  var newGuide = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class; /* global wpeg */

    var _react2 = _interopRequireDefault(react);

    var _stepList2 = _interopRequireDefault(stepList);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    var NewGuidePage = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(NewGuidePage, _Component);

            function NewGuidePage(props) {
              _classCallCheck(this, NewGuidePage);

              var _this = _possibleConstructorReturn(
                this,
                (
                  NewGuidePage.__proto__ || Object.getPrototypeOf(NewGuidePage)
                ).call(this, props)
              );

              _this._create = function() {
                _this.props.$store.dashboard.create({
                  title: _this.inputTitle.value,
                  description: _this.inputDesc.value
                });
              };

              _this._cancel = function(event) {
                event.preventDefault();
                _this.props.history.goBack();
              };

              _this.inputTitle = _react2.default.createRef();
              _this.inputDesc = _react2.default.createRef();
              return _this;
            }

            _createClass(NewGuidePage, [
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  this.inputTitle.focus();
                }
              },
              {
                key: 'render',
                value: function render() {
                  var _this2 = this;

                  if (this.props.$store.dashboard.createdGuide) {
                    return _react2.default.createElement(
                      reactRouterDom.Redirect,
                      {
                        to:
                          'guide/' + this.props.$store.dashboard.createdGuide.ID
                      }
                    );
                  }

                  return _react2.default.createElement(
                    editGuide.Container,
                    null,
                    _react2.default.createElement(
                      editGuide.Header,
                      null,
                      _react2.default.createElement(
                        editGuide.Form,
                        null,
                        _react2.default.createElement(editGuide.InputTitle, {
                          placeholder: wpeg.lang.NEW_GUIDE,
                          innerRef: function innerRef(component) {
                            return (_this2.inputTitle = component);
                          }
                        }),
                        _react2.default.createElement(
                          'div',
                          null,
                          _react2.default.createElement(editGuide.InputDesc, {
                            placeholder:
                              wpeg.lang.GUIDE_DESCRIPTION_PLACEHOLDER,
                            innerRef: function innerRef(component) {
                              return (_this2.inputDesc = component);
                            }
                          }),
                          _react2.default.createElement(
                            'button',
                            { className: 'button', onClick: this._create },
                            wpeg.lang.SAVE
                          ),
                          ' ',
                          wpeg.lang.OR,
                          ' ',
                          _react2.default.createElement(
                            'a',
                            { href: '#cancel-add-step', onClick: this._cancel },
                            wpeg.lang.CANCEL
                          )
                        )
                      )
                    ),
                    _react2.default.createElement(_stepList2.default, {
                      list: [],
                      disableStepManager: true
                    })
                  );
                }
              }
            ]);

            return NewGuidePage;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = NewGuidePage;
  });

  unwrapExports(newGuide);

  var routers = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _emptyGuide2 = _interopRequireDefault(emptyGuide);

    var _newGuide2 = _interopRequireDefault(newGuide);

    var _editGuide2 = _interopRequireDefault(editGuide);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    exports.default = [
      {
        path: '/',
        exact: true,
        component: _emptyGuide2.default
      },
      {
        path: '/create',
        exact: true,
        component: _newGuide2.default
      },
      {
        path: '/guide/:id',
        component: _editGuide2.default
      }
    ];
  });

  unwrapExports(routers);

  var search = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Search = function Search(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z'
        })
      );
    };

    exports.default = Search;
  });

  unwrapExports(search);

  var eyeOff = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var EyeOff = function EyeOff(props) {
      return _react2.default.createElement(
        'svg',
        _extends(
          {
            width: 24,
            height: 24,
            viewBox: '0 0 24 24',
            fill: 'none',
            stroke: 'currentColor',
            strokeWidth: 2,
            strokeLinecap: 'round',
            strokeLinejoin: 'round',
            className: 'feather feather-eye-off'
          },
          props
        ),
        _react2.default.createElement('path', {
          d:
            'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22'
        })
      );
    };

    exports.default = EyeOff;
  });

  unwrapExports(eyeOff);

  var dashboard$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class;

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  background: var(--white);\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  display: flex;\n  margin: 25px 0 0;\n'
        ],
        [
          '\n  background: var(--white);\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  display: flex;\n  margin: 25px 0 0;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  width: 325px;\n  min-height: 80vh;\n  border-right: 1px solid var(--graylight);\n  display: flex;\n  flex-direction: column;\n'
        ],
        [
          '\n  width: 325px;\n  min-height: 80vh;\n  border-right: 1px solid var(--graylight);\n  display: flex;\n  flex-direction: column;\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          '\n  position: relative;\n  border-bottom: 1px solid var(--graylight);\n\n  svg {\n    fill: var(--gray);\n    pointer-events: none;\n    position: absolute;\n    right: 10px;\n    top: 15px;\n  }\n'
        ],
        [
          '\n  position: relative;\n  border-bottom: 1px solid var(--graylight);\n\n  svg {\n    fill: var(--gray);\n    pointer-events: none;\n    position: absolute;\n    right: 10px;\n    top: 15px;\n  }\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  font-size: 16px;\n  font-style: italic;\n  outline: none;\n  border: none;\n  padding: 16px 47px 16px 27px;\n  width: 100%;\n  color: var(--gray2);\n  background: rgba(0,0,0,0);\n\n  &::placeholder {\n    color: var(--gray);\n  }\n'
        ],
        [
          '\n  font-size: 16px;\n  font-style: italic;\n  outline: none;\n  border: none;\n  padding: 16px 47px 16px 27px;\n  width: 100%;\n  color: var(--gray2);\n  background: rgba(0,0,0,0);\n\n  &::placeholder {\n    color: var(--gray);\n  }\n'
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  flex-direction: column;\n  flex-grow: 1;\n  height: calc(70vh - 115px);\n  overflow: scroll;\n  padding-bottom: 10px;\n  \n  a {\n    color: inherit;\n    text-decoration: none;\n  }\n'
        ],
        [
          '\n  display: flex;\n  flex-direction: column;\n  flex-grow: 1;\n  height: calc(70vh - 115px);\n  overflow: scroll;\n  padding-bottom: 10px;\n  \n  a {\n    color: inherit;\n    text-decoration: none;\n  }\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        [
          '\n  background: ',
          ';\n  border-left: ',
          ';\n  position: relative;\n  \n  a {\n    padding: 16px;\n    display: block;\n    box-shadow: none;\n  }\n\n  &:hover {\n    background: var(--graylight);\n  }\n\n  svg {\n    width: 14px;\n    height: auto;\n    position: absolute;\n    right: 16px;\n    bottom: 18px;\n  }\n'
        ],
        [
          '\n  background: ',
          ';\n  border-left: ',
          ';\n  position: relative;\n  \n  a {\n    padding: 16px;\n    display: block;\n    box-shadow: none;\n  }\n\n  &:hover {\n    background: var(--graylight);\n  }\n\n  svg {\n    width: 14px;\n    height: auto;\n    position: absolute;\n    right: 16px;\n    bottom: 18px;\n  }\n'
        ]
      ),
      _templateObject7 = _taggedTemplateLiteral(
        ['\n  font-size: 16px;\n  font-weight: 600;\n'],
        ['\n  font-size: 16px;\n  font-weight: 600;\n']
      ),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\n  margin-top: 4px;\n  color: var(--graylight2);\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  margin-right: 16px;\n'
        ],
        [
          '\n  margin-top: 4px;\n  color: var(--graylight2);\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  margin-right: 16px;\n'
        ]
      ),
      _templateObject9 = _taggedTemplateLiteral(
        [
          "\n  border-bottom: 1px solid var(--graylight);\n  padding: 8px 27px;\n  position: relative;\n\n  &:before {\n    content: '';\n    position: absolute;\n    left: 0;\n    top: -30px;\n    width: 100%;\n    height: 30px;\n    background: linear-gradient(\n      rgba(255, 255, 255, 0.1),\n      white\n    );\n    border-bottom: 2px solid var(--graylight);\n    pointer-events: none;\n  }\n\n  a {\n    width: 100%;\n    text-align: center;\n  }\n"
        ],
        [
          "\n  border-bottom: 1px solid var(--graylight);\n  padding: 8px 27px;\n  position: relative;\n\n  &:before {\n    content: '';\n    position: absolute;\n    left: 0;\n    top: -30px;\n    width: 100%;\n    height: 30px;\n    background: linear-gradient(\n      rgba(255, 255, 255, 0.1),\n      white\n    );\n    border-bottom: 2px solid var(--graylight);\n    pointer-events: none;\n  }\n\n  a {\n    width: 100%;\n    text-align: center;\n  }\n"
        ]
      ),
      _templateObject10 = _taggedTemplateLiteral(
        ['\n  flex-grow: 1;\n'],
        ['\n  flex-grow: 1;\n']
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _fuse2 = _interopRequireDefault(fuse);

    var _routers2 = _interopRequireDefault(routers);

    var _search2 = _interopRequireDefault(search);

    var _eyeOff2 = _interopRequireDefault(eyeOff);

    var _emptyWrapper2 = _interopRequireDefault(emptyWrapper);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Wrapper = _styledComponents2.default.div(_templateObject);

    var Sidebar = _styledComponents2.default.div(_templateObject2);

    var Search = _styledComponents2.default.div(_templateObject3);

    var SearchInput = _styledComponents2.default.input(_templateObject4);

    var List = _styledComponents2.default.div(_templateObject5);

    var ListItem = _styledComponents2.default.div(
      _templateObject6,
      function(props) {
        return props.active ? 'var(--graylight)' : 'none';
      },
      function(props) {
        return props.active ? '3px solid var(--blue)' : 'none';
      }
    );

    var ListTitle = _styledComponents2.default.div(_templateObject7);

    var ListDesc = _styledComponents2.default.div(_templateObject8);

    var NewWrapper = _styledComponents2.default.div(_templateObject9);

    var Container = _styledComponents2.default.div(_templateObject10);

    var Dashboard = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(Dashboard, _Component);

            function Dashboard(props) {
              var _this2 = this;

              _classCallCheck(this, Dashboard);

              var _this = _possibleConstructorReturn(
                this,
                (Dashboard.__proto__ || Object.getPrototypeOf(Dashboard)).call(
                  this,
                  props
                )
              );

              _this.state = {
                search: ''
              };

              _this._searchResult = function() {
                var fuzzy = new _fuse2.default(
                  _this.props.$store.dashboard.list,
                  {
                    minMatchCharLength: 1,
                    threshold: 0.4,
                    shouldSort: true,
                    keys: ['title', 'description']
                  }
                );
                return fuzzy.search(_this.state.search);
              };

              _this._searching = (function() {
                var _ref = _asyncToGenerator(
                  /*#__PURE__*/ regeneratorRuntime.mark(function _callee(
                    event
                  ) {
                    return regeneratorRuntime.wrap(
                      function _callee$(_context) {
                        while (1) {
                          switch ((_context.prev = _context.next)) {
                            case 0:
                              event.preventDefault();
                              _this.setState({
                                search: _this.searchInput.value
                              });

                            case 2:
                            case 'end':
                              return _context.stop();
                          }
                        }
                      },
                      _callee,
                      _this2
                    );
                  })
                );

                return function(_x) {
                  return _ref.apply(this, arguments);
                };
              })();

              _this.searchInput = _react2.default.createRef();
              _this.fuzzySearch = null;
              return _this;
            }

            _createClass(Dashboard, [
              {
                key: 'componentDidMount',
                value: (function() {
                  var _ref2 = _asyncToGenerator(
                    /*#__PURE__*/ regeneratorRuntime.mark(function _callee2() {
                      var list;
                      return regeneratorRuntime.wrap(
                        function _callee2$(_context2) {
                          while (1) {
                            switch ((_context2.prev = _context2.next)) {
                              case 0:
                                _context2.next = 2;
                                return this.props.$store.dashboard.getList();

                              case 2:
                                list = _context2.sent;

                                if (
                                  list.length > 0 &&
                                  !/guide\/([0-9])/.test(window.location.hash)
                                ) {
                                  window.location.hash =
                                    '#/guide/' + list[0].ID;
                                }
                                this.searchInput.focus();

                              case 5:
                              case 'end':
                                return _context2.stop();
                            }
                          }
                        },
                        _callee2,
                        this
                      );
                    })
                  );

                  function componentDidMount() {
                    return _ref2.apply(this, arguments);
                  }

                  return componentDidMount;
                })()
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  var onEdit =
                    this.props.$store.tool.displayBottomBar &&
                    this.props.$store.dashboard.current &&
                    this.props.$store.tool.currentGuide &&
                    this.props.$store.dashboard.current.ID ===
                      this.props.$store.tool.currentGuide.ID;

                  var list = this.props.$store.dashboard.list;

                  if (this.state.search.length > 0) {
                    list = this._searchResult();
                  }

                  return _react2.default.createElement(
                    reactRouterDom.HashRouter,
                    null,
                    _react2.default.createElement(
                      Wrapper,
                      null,
                      _react2.default.createElement(
                        Sidebar,
                        null,
                        _react2.default.createElement(
                          Search,
                          null,
                          _react2.default.createElement(SearchInput, {
                            placeholder: wpeg.lang.SEARCH_GUIDES,
                            innerRef: function innerRef(component) {
                              return (_this3.searchInput = component);
                            },
                            onKeyUp: this._searching
                          }),
                          _react2.default.createElement(_search2.default, null)
                        ),
                        _react2.default.createElement(
                          _emptyWrapper2.default,
                          { list: list, message: wpeg.lang.NO_GUIDE },
                          _react2.default.createElement(
                            List,
                            { className: 'list' },
                            list.map(function(item, key) {
                              var itemID = onEdit
                                ? _this3.props.$store.dashboard.current.ID
                                : item.ID;
                              return _react2.default.createElement(
                                ListItem,
                                {
                                  key: key,
                                  active:
                                    _this3.props.$store.dashboard.current &&
                                    _this3.props.$store.dashboard.current.ID ===
                                      item.ID
                                },
                                _react2.default.createElement(
                                  reactRouterDom.Link,
                                  {
                                    to: '/guide/' + itemID,
                                    'data-id': item.ID,
                                    className: 'list-item'
                                  },
                                  _react2.default.createElement(
                                    ListTitle,
                                    null,
                                    item.title
                                  ),
                                  _react2.default.createElement(
                                    ListDesc,
                                    null,
                                    item.description
                                  ),
                                  !item.active &&
                                    _react2.default.createElement(
                                      _eyeOff2.default,
                                      null
                                    )
                                )
                              );
                            })
                          )
                        ),
                        _react2.default.createElement(
                          NewWrapper,
                          null,
                          _react2.default.createElement(
                            reactRouterDom.Link,
                            {
                              to: '/create',
                              className:
                                'wpeg-dashboard__add-new-guide button button-primary button-hero'
                            },
                            wpeg.lang.NEW_GUIDE
                          )
                        )
                      ),
                      _react2.default.createElement(
                        Container,
                        null,
                        _routers2.default.map(function(props, key) {
                          return _react2.default.createElement(
                            reactRouterDom.Route,
                            _extends({ key: key }, props)
                          );
                        })
                      )
                    )
                  );
                }
              }
            ]);

            return Dashboard;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = Dashboard;
  });

  unwrapExports(dashboard$2);

  var check = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Check = function Check(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 512 512' }, props),
        _react2.default.createElement('path', {
          d:
            'M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z'
        })
      );
    };

    exports.default = Check;
  });

  unwrapExports(check);

  var list = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var List = function List(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 512 512' }, props),
        _react2.default.createElement('path', {
          d:
            'M96 96c0 26.51-21.49 48-48 48S0 122.51 0 96s21.49-48 48-48 48 21.49 48 48zM48 208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm0 160c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm96-236h352c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z'
        })
      );
    };

    exports.default = List;
  });

  unwrapExports(list);

  var target = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Target = function Target(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 20 20' }, props),
        _react2.default.createElement('title', null, props.title),
        _react2.default.createElement('path', {
          d:
            'M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z'
        })
      );
    };

    exports.default = Target;
  });

  unwrapExports(target);

  var newGuide$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _react2 = _interopRequireDefault(react);

    var _2 = _interopRequireDefault(popup);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    } /* global wpeg */

    var NewGuidePopup = (function(_Component) {
      _inherits(NewGuidePopup, _Component);

      function NewGuidePopup(props) {
        _classCallCheck(this, NewGuidePopup);

        var _this = _possibleConstructorReturn(
          this,
          (
            NewGuidePopup.__proto__ || Object.getPrototypeOf(NewGuidePopup)
          ).call(this, props)
        );

        _this.guideTitle = _react2.default.createRef();
        _this.guideDesc = _react2.default.createRef();
        return _this;
      }

      _createClass(NewGuidePopup, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            this.props.onMount && this.props.onMount();
            this.guideTitle.input.focus();
          }
        },
        {
          key: 'render',
          value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
              _2.default,
              {
                title: this.props.title || wpeg.lang.ADD_NEW_GUIDE,
                isOverlay: true,
                stickTo: this.props.stickTo,
                onClose: this.props.onClose
              },
              _react2.default.createElement(
                popup.Content,
                null,
                _react2.default.createElement(fields.Text, {
                  label: 'Title',
                  value: this.props.fields && this.props.fields.title,
                  ref: function ref(component) {
                    return (_this2.guideTitle = component);
                  },
                  onUpdate: function onUpdate(value) {
                    return (
                      _this2.props.onUpdate &&
                      _this2.props.onUpdate({ title: value })
                    );
                  }
                }),
                _react2.default.createElement(fields.ContentEditor, {
                  label: 'Description',
                  value: this.props.fields && this.props.fields.description,
                  ref: function ref(component) {
                    return (_this2.guideDesc = component);
                  },
                  onUpdate: function onUpdate(value) {
                    return (
                      _this2.props.onUpdate &&
                      _this2.props.onUpdate({ description: value })
                    );
                  }
                })
              ),
              _react2.default.createElement(
                popup.Footer,
                { align: 'right' },
                _react2.default.createElement(
                  'button',
                  {
                    className: 'button button-primary',
                    onClick: this.props.onSave
                  },
                  this.props.saveLabel || wpeg.lang.ADD_NEW_GUIDE
                )
              )
            );
          }
        }
      ]);

      return NewGuidePopup;
    })(react.Component);

    exports.default = NewGuidePopup;
  });

  unwrapExports(newGuide$2);

  var confirmation = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    var _2 = _interopRequireDefault(popup);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    /* global wpeg */
    exports.default = function(props) {
      return _react2.default.createElement(
        _2.default,
        { isOverlay: true, onClose: props.onCancel },
        _react2.default.createElement(popup.Content, null, props.children),
        _react2.default.createElement(
          popup.Footer,
          null,
          _react2.default.createElement(
            'button',
            { className: 'button button-danger', onClick: props.onConfirm },
            props.confirmLabel || wpeg.lang.YES
          ),
          _react2.default.createElement(
            'button',
            { className: 'button', onClick: props.onCancel },
            props.cancelLabel || wpeg.lang.CANCEL
          )
        )
      );
    };
  });

  unwrapExports(confirmation);

  var selectorInput = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var SelectorInput = function SelectorInput() {
      return _react2.default.createElement(
        'svg',
        {
          width: '466',
          height: '307',
          viewBox: '0 0 466 307',
          xmlns: 'http://www.w3.org/2000/svg',
          xmlnsXlink: 'http://www.w3.org/1999/xlink'
        },
        _react2.default.createElement(
          'defs',
          null,
          _react2.default.createElement('rect', {
            id: 'input-path-1',
            x: '0.968',
            y: '0.054',
            width: '190',
            height: '24'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-2.6%',
              y: '-20.8%',
              width: '110.5%',
              height: '183.3%',
              filterUnits: 'objectBoundingBox',
              id: 'input-filter-2'
            },
            _react2.default.createElement('feOffset', {
              dx: '8',
              dy: '8',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '1',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feComposite', {
              in: 'shadowBlurOuter1',
              in2: 'SourceAlpha',
              operator: 'out',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0',
              in: 'shadowBlurOuter1'
            })
          ),
          _react2.default.createElement('rect', {
            id: 'input-path-3',
            x: '190',
            width: '44.032',
            height: '24'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-11.4%',
              y: '-20.8%',
              width: '145.4%',
              height: '183.3%',
              filterUnits: 'objectBoundingBox',
              id: 'input-filter-4'
            },
            _react2.default.createElement('feOffset', {
              dx: '8',
              dy: '8',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '1',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feComposite', {
              in: 'shadowBlurOuter1',
              in2: 'SourceAlpha',
              operator: 'out',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0',
              in: 'shadowBlurOuter1'
            })
          ),
          _react2.default.createElement('rect', {
            id: 'input-path-5',
            width: '146',
            height: '91',
            rx: '4'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-14.4%',
              y: '-16.5%',
              width: '128.8%',
              height: '146.2%',
              filterUnits: 'objectBoundingBox',
              id: 'input-filter-7'
            },
            _react2.default.createElement('feOffset', {
              dy: '6',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '6',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0',
              in: 'shadowBlurOuter1'
            })
          )
        ),
        _react2.default.createElement(
          'g',
          { id: 'Input-Page-1', fill: 'none', fillRule: 'evenodd' },
          _react2.default.createElement(
            'g',
            { id: 'Input-Desktop-HD', transform: 'translate(-911 -548)' },
            _react2.default.createElement(
              'g',
              { id: 'Input', transform: 'translate(911 548)' },
              _react2.default.createElement(
                'g',
                { id: 'Browser-Template-Contentacle-Color', fill: '#FFF' },
                _react2.default.createElement('rect', {
                  id: 'Input-Rectangle-39',
                  stroke: '#E4E7E9',
                  fill: '#F1F4F7',
                  x: '0.5',
                  y: '0.5',
                  width: '464',
                  height: '306'
                }),
                _react2.default.createElement('rect', {
                  id: 'Input-Rectangle-39-Copy',
                  stroke: '#E4E7E9',
                  x: '0.5',
                  y: '21.314',
                  width: '464',
                  height: '285.186'
                }),
                _react2.default.createElement('path', {
                  d: 'M0.775,20.5040107 L464.741667,20.5040107',
                  id: 'Line',
                  stroke: '#E4E7E9',
                  fill: 'none',
                  strokeLinecap: 'square'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97',
                  fill: '#F45F5F',
                  cx: '11.108',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy',
                  fill: '#FFCC2B',
                  cx: '24.025',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy-2',
                  fill: '#7ED321',
                  cx: '36.942',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Input-Group-10', transform: 'translate(0 19)' },
                _react2.default.createElement(
                  'g',
                  {
                    id: 'Input-Group-4',
                    transform: 'translate(136.032 24.946)'
                  },
                  _react2.default.createElement(
                    'g',
                    { id: 'Input-Rectangle-15' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#input-filter-2)',
                      xlinkHref: '#input-path-1'
                    }),
                    _react2.default.createElement('rect', {
                      stroke: '#E3E3E3',
                      strokeLinejoin: 'square',
                      fill: '#FFF',
                      x: '1.468',
                      y: '0.554',
                      width: '189',
                      height: '23'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Input-Rectangle-15-Copy' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#input-filter-4)',
                      xlinkHref: '#input-path-3'
                    }),
                    _react2.default.createElement('rect', {
                      stroke: '#E3E3E3',
                      strokeLinejoin: 'square',
                      fill: '#E3E3E3',
                      x: '190.5',
                      y: '0.5',
                      width: '43.032',
                      height: '23'
                    })
                  ),
                  _react2.default.createElement('rect', {
                    id: 'Input-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.587',
                    y: '11.378',
                    width: '77.933',
                    height: '3.892'
                  })
                )
              ),
              _react2.default.createElement(
                'g',
                { id: 'Input-Group-Copy-2', transform: 'translate(180 51)' },
                _react2.default.createElement(
                  'g',
                  {
                    id: 'Onboarding-buble-Copy-4',
                    transform: 'translate(0 26)'
                  },
                  _react2.default.createElement(
                    'mask',
                    { id: 'mask-6', fill: '#fff' },
                    _react2.default.createElement('use', {
                      xlinkHref: '#input-path-5'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Input-Rectangle-9' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#input-filter-7)',
                      xlinkHref: '#input-path-5'
                    }),
                    _react2.default.createElement('use', {
                      fill: '#354145',
                      xlinkHref: '#input-path-5'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    {
                      id: 'Input-Group',
                      mask: 'url(#mask-6)',
                      fill: '#F8F9F9'
                    },
                    _react2.default.createElement(
                      'g',
                      { transform: 'translate(8 24)' },
                      _react2.default.createElement('rect', {
                        id: 'Input-Rectangle-3',
                        width: '77',
                        height: '7'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Input-Rectangle-3-Copy',
                        y: '15',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Input-Rectangle-3-Copy-2',
                        y: '23',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Input-Rectangle-3-Copy-3',
                        y: '31',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Input-Rectangle-3-Copy-4',
                        y: '39',
                        width: '130',
                        height: '4'
                      })
                    )
                  )
                ),
                _react2.default.createElement(
                  'g',
                  {
                    id: 'input-search',
                    transform: 'translate(163)',
                    fill: '#354145',
                    fillRule: 'nonzero'
                  },
                  _react2.default.createElement('path', {
                    d:
                      'M6.61904762,6.81904762 C5.03046072,8.05309261 2.75617513,7.83933328 1.42535339,6.33089406 C0.0945316545,4.82245483 0.165877563,2.53926019 1.58828316,1.11685459 C3.01068876,-0.305551008 5.2938834,-0.376896917 6.80232263,0.953924819 C8.31076185,2.28474656 8.52452118,4.55903215 7.29047619,6.14761905 L9.83809524,8.68571429 L9.16190476,9.36190476 L6.62380952,6.81904762 L6.61904762,6.81904762 Z M4.28571429,6.66666667 C5.30647312,6.66666668 6.24969319,6.12209833 6.76007262,5.23809525 C7.27045204,4.35409217 7.27045204,3.26495545 6.76007262,2.38095237 C6.24969319,1.49694929 5.30647312,0.952380937 4.28571429,0.952380952 C2.70775787,0.952380976 1.42857147,2.2315674 1.42857147,3.80952381 C1.42857147,5.38748022 2.70775787,6.66666664 4.28571429,6.66666667 Z',
                    id: 'Input-Shape'
                  })
                )
              ),
              _react2.default.createElement(
                'g',
                {
                  id: 'input-arrows',
                  transform: 'translate(149 68)',
                  fill: '#354145',
                  fillRule: 'nonzero'
                },
                _react2.default.createElement('path', {
                  d:
                    'M17.8191761,15.1536813 L14.1456744,11.4804568 L16.7664433,9.96684492 C16.9712346,9.84858234 17.0903803,9.62380265 17.0733506,9.38796108 C17.0563209,9.15205738 16.906037,8.94666703 16.6863914,8.85910425 L4.999864,4.19783096 C4.77077125,4.10635302 4.50917293,4.16023303 4.3347119,4.33461285 C4.16025086,4.50911697 4.10636497,4.77062455 4.19779075,4.99969227 L8.85882768,16.6863097 C8.94646219,16.9059313 9.15187498,17.0562609 9.38780447,17.0732887 C9.62373396,17.0904408 9.84860037,16.9712461 9.96681373,16.766415 L11.4804667,14.1459325 L15.1537198,17.8191571 C15.2694471,17.9349338 15.4265677,18 15.5902143,18 C15.7539851,18 15.9109814,17.9349338 16.0267087,17.8191571 L17.8192383,16.0265748 C18.0602643,15.785513 18.0602643,15.3947431 17.8191761,15.1536813 Z',
                  id: 'Input-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M2.50438006,1.57661959 C2.24820553,1.320647 1.83300336,1.32058096 1.57669675,1.57661959 C1.32058826,1.8327903 1.32058826,2.24811837 1.57669675,2.50428907 L3.03416403,3.96173463 C3.16221828,4.08978697 3.33002943,4.15384615 3.49797267,4.15384615 C3.66578382,4.15384615 3.83366102,4.08978697 3.96171526,3.96173463 C4.21788979,3.70556393 4.21788979,3.2903019 3.96171526,3.03413119 L2.50438006,1.57661959 Z',
                  id: 'Input-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M2.76923077,6.23073438 C2.76923077,5.84849271 2.528124,5.53846154 2.23068489,5.53846154 L0.538545877,5.53846154 C0.241160985,5.53846154 0,5.84842301 0,6.23073438 C0,6.61304575 0.241106767,6.92307692 0.538545877,6.92307692 L2.23068489,6.92307692 C2.528124,6.92300722 2.76923077,6.61304575 2.76923077,6.23073438 Z',
                  id: 'Input-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M3.03424413,7.80738424 L1.57668301,9.26492712 C1.32059284,9.52109172 1.32059284,9.93640989 1.57668301,10.1925084 C1.70479412,10.3205577 1.87265931,10.3846154 2.04045846,10.3846154 C2.20825761,10.3846154 2.37618883,10.3205577 2.50423391,10.1925084 L3.961729,8.7350316 C4.2178852,8.478867 4.2178852,8.06354884 3.961729,7.80738424 C3.70563884,7.55141776 3.29053241,7.55135172 3.03424413,7.80738424 Z',
                  id: 'Input-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M6.23073438,2.76923077 C6.61304575,2.76923077 6.92307692,2.52813344 6.92307692,2.23070598 L6.92307692,0.538470574 C6.92307692,0.241097326 6.61311545,0 6.23073438,0 C5.84849271,0 5.53846154,0.241043111 5.53846154,0.538470574 L5.53846154,2.23076019 C5.53846154,2.52813344 5.84842301,2.76923077 6.23073438,2.76923077 Z',
                  id: 'Input-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M8.27131241,4.15384615 C8.43925265,4.15384615 8.6070608,4.08978754 8.73511275,3.96173635 L10.1924879,2.50430382 C10.4486579,2.24813541 10.4486579,1.83281105 10.1924879,1.57664264 C9.93631798,1.3206063 9.52099115,1.3206063 9.26488725,1.57664264 L7.80751207,3.03414121 C7.55134213,3.29030962 7.55134213,3.70563398 7.80751207,3.96173635 C7.93563006,4.08978754 8.10343822,4.15384615 8.27131241,4.15384615 Z',
                  id: 'Input-Shape'
                })
              )
            )
          )
        )
      );
    };

    exports.default = SelectorInput;
  });

  unwrapExports(selectorInput);

  var selectorModal = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var SelectorModal = function SelectorModal() {
      return _react2.default.createElement(
        'svg',
        {
          width: '466',
          height: '307',
          viewBox: '0 0 466 307',
          xmlns: 'http://www.w3.org/2000/svg',
          xmlnsXlink: 'http://www.w3.org/1999/xlink'
        },
        _react2.default.createElement(
          'defs',
          null,
          _react2.default.createElement('rect', {
            id: 'modal-path-1',
            width: '146',
            height: '114',
            rx: '4'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-14.4%',
              y: '-13.2%',
              width: '128.8%',
              height: '136.8%',
              filterUnits: 'objectBoundingBox',
              id: 'modal-filter-3'
            },
            _react2.default.createElement('feOffset', {
              dy: '6',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '6',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0',
              in: 'shadowBlurOuter1'
            })
          )
        ),
        _react2.default.createElement(
          'g',
          { id: 'Modal-Page-1', fill: 'none', fillRule: 'evenodd' },
          _react2.default.createElement(
            'g',
            { id: 'Modal-Desktop-HD', transform: 'translate(-911 -203)' },
            _react2.default.createElement(
              'g',
              { id: 'Modal', transform: 'translate(911 203)' },
              _react2.default.createElement(
                'g',
                { id: 'Browser-Template-Contentacle-Color', fill: '#FFF' },
                _react2.default.createElement('rect', {
                  id: 'Modal-Rectangle-39',
                  stroke: '#E4E7E9',
                  fill: '#F1F4F7',
                  x: '0.5',
                  y: '0.5',
                  width: '464',
                  height: '306'
                }),
                _react2.default.createElement('rect', {
                  id: 'Modal-Rectangle-39-Copy',
                  stroke: '#E4E7E9',
                  x: '0.5',
                  y: '21.314',
                  width: '464',
                  height: '285.186'
                }),
                _react2.default.createElement('path', {
                  d: 'M0.775,20.5040107 L464.741667,20.5040107',
                  id: 'Line',
                  stroke: '#E4E7E9',
                  fill: 'none',
                  strokeLinecap: 'square'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97',
                  fill: '#F45F5F',
                  cx: '11.108',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy',
                  fill: '#FFCC2B',
                  cx: '24.025',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy-2',
                  fill: '#7ED321',
                  cx: '36.942',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Modal-Group-Copy-2', transform: 'translate(160 97)' },
                _react2.default.createElement(
                  'g',
                  { id: 'Onboarding-buble-Copy-4' },
                  _react2.default.createElement(
                    'mask',
                    { id: 'modal-mask-2', fill: '#fff' },
                    _react2.default.createElement('use', {
                      xlinkHref: '#modal-path-1'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Modal-Rectangle-9' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#modal-filter-3)',
                      xlinkHref: '#modal-path-1'
                    }),
                    _react2.default.createElement('use', {
                      fill: '#354145',
                      xlinkHref: '#modal-path-1'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    {
                      id: 'Modal-Group',
                      mask: 'url(#mask-2)',
                      fill: '#F8F9F9'
                    },
                    _react2.default.createElement(
                      'g',
                      { transform: 'translate(8 23)' },
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-3',
                        x: '27',
                        width: '77',
                        height: '7'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-3-Copy',
                        y: '15',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-3-Copy-2',
                        y: '23',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-3-Copy-3',
                        y: '31',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-3-Copy-4',
                        y: '39',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Modal-Rectangle-Copy',
                        x: '35',
                        y: '59',
                        width: '60',
                        height: '16',
                        rx: '8'
                      })
                    )
                  )
                )
              )
            )
          )
        )
      );
    };

    exports.default = SelectorModal;
  });

  unwrapExports(selectorModal);

  var selectorTooltip = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var SelectorTooltip = function SelectorTooltip() {
      return _react2.default.createElement(
        'svg',
        {
          width: '466',
          height: '307',
          viewBox: '0 0 466 307',
          xmlns: 'http://www.w3.org/2000/svg',
          xmlnsXlink: 'http://www.w3.org/1999/xlink'
        },
        _react2.default.createElement(
          'defs',
          null,
          _react2.default.createElement('rect', {
            id: 'tooltip-path-1',
            width: '111.054',
            height: '287'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-4.5%',
              y: '-1.7%',
              width: '118%',
              height: '107%',
              filterUnits: 'objectBoundingBox',
              id: 'tooltip-filter-2'
            },
            _react2.default.createElement('feOffset', {
              dx: '8',
              dy: '8',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '1',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feComposite', {
              in: 'shadowBlurOuter1',
              in2: 'SourceAlpha',
              operator: 'out',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0',
              in: 'shadowBlurOuter1'
            })
          ),
          _react2.default.createElement('rect', {
            id: 'tooltip-path-3',
            width: '146',
            height: '114',
            rx: '4'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-14.4%',
              y: '-13.2%',
              width: '128.8%',
              height: '136.8%',
              filterUnits: 'objectBoundingBox',
              id: 'tooltip-filter-5'
            },
            _react2.default.createElement('feOffset', {
              dy: '6',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '6',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0',
              in: 'shadowBlurOuter1'
            })
          )
        ),
        _react2.default.createElement(
          'g',
          { id: 'Tooltip-Page-1', fill: 'none', fillRule: 'evenodd' },
          _react2.default.createElement(
            'g',
            { id: 'Tooltip-Desktop-HD', transform: 'translate(-340 -203)' },
            _react2.default.createElement(
              'g',
              { id: 'Tooltip', transform: 'translate(340 203)' },
              _react2.default.createElement(
                'g',
                { id: 'Browser-Template-Contentacle-Color', fill: '#FFF' },
                _react2.default.createElement('rect', {
                  id: 'Tooltip-Rectangle-39',
                  stroke: '#E4E7E9',
                  fill: '#F1F4F7',
                  x: '0.5',
                  y: '0.5',
                  width: '464',
                  height: '306'
                }),
                _react2.default.createElement('rect', {
                  id: 'Tooltip-Rectangle-39-Copy',
                  stroke: '#E4E7E9',
                  x: '0.5',
                  y: '21.314',
                  width: '464',
                  height: '285.186'
                }),
                _react2.default.createElement('path', {
                  d: 'M0.775,20.5040107 L464.741667,20.5040107',
                  id: 'Line',
                  stroke: '#E4E7E9',
                  fill: 'none',
                  strokeLinecap: 'square'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Tooltip-Oval-97',
                  fill: '#F45F5F',
                  cx: '11.108',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Tooltip-Oval-97-Copy',
                  fill: '#FFCC2B',
                  cx: '24.025',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Tooltip-Oval-97-Copy-2',
                  fill: '#7ED321',
                  cx: '36.942',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Tooltip-Group-10', transform: 'translate(0 19)' },
                _react2.default.createElement(
                  'g',
                  { id: 'tooltip-sidebar', transform: 'translate(0 1)' },
                  _react2.default.createElement(
                    'g',
                    { id: 'Tooltip-Rectangle-2' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#tooltip-filter-2)',
                      xlinkHref: '#tooltip-path-1'
                    }),
                    _react2.default.createElement('rect', {
                      stroke: '#E3E3E3',
                      strokeLinejoin: 'square',
                      fill: '#FFF',
                      x: '0.5',
                      y: '0.5',
                      width: '110.054',
                      height: '286'
                    })
                  ),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '30.784',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '51.541',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '72.297',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '93.054',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '113.811',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '134.568',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '155.324',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Tooltip-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '176.081',
                    width: '77.933',
                    height: '3.892'
                  })
                ),
                _react2.default.createElement('rect', {
                  id: 'tooltip-hightlight',
                  stroke: '#0085BA',
                  strokeWidth: '3',
                  transform: 'matrix(-1 0 0 1 111.5 0)',
                  x: '14.5',
                  y: '71',
                  width: '82.5',
                  height: '8',
                  rx: '1'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Tooltip-modal', transform: 'translate(120 42)' },
                _react2.default.createElement(
                  'g',
                  { id: 'Tooltip-Onboarding-buble-Copy-4' },
                  _react2.default.createElement(
                    'mask',
                    { id: 'tooltip-mask-4', fill: '#fff' },
                    _react2.default.createElement('use', {
                      xlinkHref: '#tooltip-path-3'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Tooltip-Rectangle-9' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#tooltip-filter-5)',
                      xlinkHref: '#tooltip-path-3'
                    }),
                    _react2.default.createElement('use', {
                      fill: '#354145',
                      xlinkHref: '#tooltip-path-3'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Tooltip-Group', mask: 'url(#tooltip-mask-4)' },
                    _react2.default.createElement(
                      'g',
                      { transform: 'translate(8 23)' },
                      _react2.default.createElement('rect', {
                        id: 'Tooltip-Rectangle-3',
                        fill: '#F8F9F9',
                        width: '77',
                        height: '7'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Tooltip-Rectangle-3-Copy',
                        fill: '#F8F9F9',
                        y: '15',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Tooltip-Rectangle-3-Copy-2',
                        fill: '#F8F9F9',
                        y: '23',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Tooltip-Rectangle-3-Copy-3',
                        fill: '#F8F9F9',
                        y: '31',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Tooltip-Rectangle-3-Copy-4',
                        fill: '#F8F9F9',
                        y: '39',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement(
                        'g',
                        {
                          id: 'tooltip-icon-cheveron-left',
                          transform: 'translate(0 59)'
                        },
                        _react2.default.createElement('path', {
                          d:
                            'M5.68585716,8.20001049 C5.98444738,8.59813079 5.94485589,9.15522532 5.59296394,9.50711727 C5.24107198,9.85900923 4.68397746,9.89860072 4.28585716,9.60001049 L0.285857157,5.60001049 C-0.095285719,5.21116698 -0.095285719,4.588854 0.285857157,4.20001049 L4.28585716,0.200010493 C4.68397746,-0.098579733 5.24107198,-0.0589882442 5.59296394,0.292903712 C5.94485589,0.644795668 5.98444738,1.20189019 5.68585716,1.60001049 L2.40585716,4.90001049 L5.70585716,8.20001049 L5.68585716,8.20001049 Z',
                          id: 'Tooltip-Shape',
                          fill: '#F8F9F9',
                          fillRule: 'nonzero'
                        })
                      ),
                      _react2.default.createElement(
                        'g',
                        {
                          id: 'tooltip-icon-cheveron-right',
                          transform: 'translate(124 59)'
                        },
                        _react2.default.createElement('path', {
                          d:
                            'M0.3,1.7 C0.00140977404,1.3018797 0.0410012629,0.744785175 0.392893219,0.392893219 C0.744785175,0.0410012629 1.3018797,0.00140977404 1.7,0.3 L5.7,4.3 C6.08114288,4.68884351 6.08114288,5.31115649 5.7,5.7 L1.7,9.7 C1.3018797,9.99859023 0.744785175,9.95899874 0.392893219,9.60710678 C0.0410012629,9.25521483 0.00140977404,8.6981203 0.3,8.3 L3.59,5 L0.29,1.7 L0.3,1.7 Z',
                          id: 'Tooltip-Shape',
                          fill: '#F8F9F9',
                          fillRule: 'nonzero'
                        })
                      )
                    )
                  )
                )
              )
            )
          )
        )
      );
    };

    exports.default = SelectorTooltip;
  });

  unwrapExports(selectorTooltip);

  var selectorClick = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var SelectorClick = function SelectorClick() {
      return _react2.default.createElement(
        'svg',
        {
          width: '466',
          height: '308',
          viewBox: '0 0 466 308',
          xmlns: 'http://www.w3.org/2000/svg',
          xmlnsXlink: 'http://www.w3.org/1999/xlink'
        },
        _react2.default.createElement(
          'defs',
          null,
          _react2.default.createElement('rect', {
            id: 'click-path-1',
            width: '111.054',
            height: '287'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-4.5%',
              y: '-1.7%',
              width: '118%',
              height: '107%',
              filterUnits: 'objectBoundingBox',
              id: 'click-filter-2'
            },
            _react2.default.createElement('feOffset', {
              dx: '8',
              dy: '8',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '1',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feComposite', {
              in: 'shadowBlurOuter1',
              in2: 'SourceAlpha',
              operator: 'out',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0',
              in: 'shadowBlurOuter1'
            })
          ),
          _react2.default.createElement('rect', {
            id: 'click-path-3',
            width: '146',
            height: '91',
            rx: '4'
          }),
          _react2.default.createElement(
            'filter',
            {
              x: '-14.4%',
              y: '-16.5%',
              width: '128.8%',
              height: '146.2%',
              filterUnits: 'objectBoundingBox',
              id: 'click-filter-5'
            },
            _react2.default.createElement('feOffset', {
              dy: '6',
              in: 'SourceAlpha',
              result: 'shadowOffsetOuter1'
            }),
            _react2.default.createElement('feGaussianBlur', {
              stdDeviation: '6',
              in: 'shadowOffsetOuter1',
              result: 'shadowBlurOuter1'
            }),
            _react2.default.createElement('feColorMatrix', {
              values: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0',
              in: 'shadowBlurOuter1'
            })
          )
        ),
        _react2.default.createElement(
          'g',
          { id: 'Click-Page-1', fill: 'none', fillRule: 'evenodd' },
          _react2.default.createElement(
            'g',
            { id: 'Click-Desktop-HD', transform: 'translate(-350 -551)' },
            _react2.default.createElement(
              'g',
              { id: 'Click', transform: 'translate(350.024 551.508)' },
              _react2.default.createElement(
                'g',
                { id: 'Browser-Template-Contentacle-Color', fill: '#FFF' },
                _react2.default.createElement('rect', {
                  id: 'Click-Rectangle-39',
                  stroke: '#E4E7E9',
                  fill: '#F1F4F7',
                  x: '0.5',
                  y: '0.5',
                  width: '464',
                  height: '306'
                }),
                _react2.default.createElement('rect', {
                  id: 'Click-Rectangle-39-Copy',
                  stroke: '#E4E7E9',
                  x: '0.5',
                  y: '21.314',
                  width: '464',
                  height: '285.186'
                }),
                _react2.default.createElement('path', {
                  d: 'M0.775,20.5040107 L464.741667,20.5040107',
                  id: 'Line',
                  stroke: '#E4E7E9',
                  fill: 'none',
                  strokeLinecap: 'square'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97',
                  fill: '#F45F5F',
                  cx: '11.108',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy',
                  fill: '#FFCC2B',
                  cx: '24.025',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                }),
                _react2.default.createElement('ellipse', {
                  id: 'Oval-97-Copy-2',
                  fill: '#7ED321',
                  cx: '36.942',
                  cy: '10.392',
                  rx: '3.875',
                  ry: '4.213'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Click-Group-10', transform: 'translate(0 19)' },
                _react2.default.createElement(
                  'g',
                  { id: 'Click-Group-6', transform: 'translate(0 1)' },
                  _react2.default.createElement(
                    'g',
                    { id: 'Click-Rectangle-2' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#click-filter-2)',
                      xlinkHref: '#click-path-1'
                    }),
                    _react2.default.createElement('rect', {
                      stroke: '#E3E3E3',
                      strokeLinejoin: 'square',
                      fill: '#FFF',
                      x: '0.5',
                      y: '0.5',
                      width: '110.054',
                      height: '286'
                    })
                  ),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '30.784',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '51.541',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '72.297',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '93.054',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '113.811',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '134.568',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '155.324',
                    width: '77.933',
                    height: '3.892'
                  }),
                  _react2.default.createElement('rect', {
                    id: 'Click-Rectangle-3',
                    fill: '#E3E3E3',
                    x: '16.885',
                    y: '176.081',
                    width: '77.933',
                    height: '3.892'
                  })
                ),
                _react2.default.createElement('rect', {
                  id: 'click-highlight',
                  stroke: '#0085BA',
                  strokeWidth: '3',
                  transform: 'matrix(-1 0 0 1 111.5 0)',
                  x: '14.5',
                  y: '71',
                  width: '82.5',
                  height: '8',
                  rx: '1'
                })
              ),
              _react2.default.createElement(
                'g',
                { id: 'Click-Group-Copy-2', transform: 'translate(120 99)' },
                _react2.default.createElement(
                  'g',
                  { id: 'Onboarding-buble-Copy-4' },
                  _react2.default.createElement(
                    'mask',
                    { id: 'click-mask-4', fill: '#fff' },
                    _react2.default.createElement('use', {
                      xlinkHref: '#click-path-3'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    { id: 'Click-Rectangle-9' },
                    _react2.default.createElement('use', {
                      fill: '#000',
                      filter: 'url(#click-filter-5)',
                      xlinkHref: '#click-path-3'
                    }),
                    _react2.default.createElement('use', {
                      fill: '#354145',
                      xlinkHref: '#click-path-3'
                    })
                  ),
                  _react2.default.createElement(
                    'g',
                    {
                      id: 'Click-Group',
                      mask: 'url(#mask-4)',
                      fill: '#F8F9F9'
                    },
                    _react2.default.createElement(
                      'g',
                      { transform: 'translate(8 24)' },
                      _react2.default.createElement('rect', {
                        id: 'Click-Rectangle-3',
                        width: '77',
                        height: '7'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Click-Rectangle-3-Copy',
                        y: '15',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Click-Rectangle-3-Copy-2',
                        y: '23',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Click-Rectangle-3-Copy-3',
                        y: '31',
                        width: '130',
                        height: '4'
                      }),
                      _react2.default.createElement('rect', {
                        id: 'Click-Rectangle-3-Copy-4',
                        y: '39',
                        width: '130',
                        height: '4'
                      })
                    )
                  )
                )
              ),
              _react2.default.createElement(
                'g',
                {
                  id: 'click-arrows',
                  transform: 'translate(84.976 99.492)',
                  fill: '#354145',
                  fillRule: 'nonzero'
                },
                _react2.default.createElement('path', {
                  d:
                    'M17.8191761,15.1536813 L14.1456744,11.4804568 L16.7664433,9.96684492 C16.9712346,9.84858234 17.0903803,9.62380265 17.0733506,9.38796108 C17.0563209,9.15205738 16.906037,8.94666703 16.6863914,8.85910425 L4.999864,4.19783096 C4.77077125,4.10635302 4.50917293,4.16023303 4.3347119,4.33461285 C4.16025086,4.50911697 4.10636497,4.77062455 4.19779075,4.99969227 L8.85882768,16.6863097 C8.94646219,16.9059313 9.15187498,17.0562609 9.38780447,17.0732887 C9.62373396,17.0904408 9.84860037,16.9712461 9.96681373,16.766415 L11.4804667,14.1459325 L15.1537198,17.8191571 C15.2694471,17.9349338 15.4265677,18 15.5902143,18 C15.7539851,18 15.9109814,17.9349338 16.0267087,17.8191571 L17.8192383,16.0265748 C18.0602643,15.785513 18.0602643,15.3947431 17.8191761,15.1536813 Z',
                  id: 'Click-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M2.50438006,1.57661959 C2.24820553,1.320647 1.83300336,1.32058096 1.57669675,1.57661959 C1.32058826,1.8327903 1.32058826,2.24811837 1.57669675,2.50428907 L3.03416403,3.96173463 C3.16221828,4.08978697 3.33002943,4.15384615 3.49797267,4.15384615 C3.66578382,4.15384615 3.83366102,4.08978697 3.96171526,3.96173463 C4.21788979,3.70556393 4.21788979,3.2903019 3.96171526,3.03413119 L2.50438006,1.57661959 Z',
                  id: 'Click-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M2.76923077,6.23073438 C2.76923077,5.84849271 2.528124,5.53846154 2.23068489,5.53846154 L0.538545877,5.53846154 C0.241160985,5.53846154 0,5.84842301 0,6.23073438 C0,6.61304575 0.241106767,6.92307692 0.538545877,6.92307692 L2.23068489,6.92307692 C2.528124,6.92300722 2.76923077,6.61304575 2.76923077,6.23073438 Z',
                  id: 'Click-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M3.03424413,7.80738424 L1.57668301,9.26492712 C1.32059284,9.52109172 1.32059284,9.93640989 1.57668301,10.1925084 C1.70479412,10.3205577 1.87265931,10.3846154 2.04045846,10.3846154 C2.20825761,10.3846154 2.37618883,10.3205577 2.50423391,10.1925084 L3.961729,8.7350316 C4.2178852,8.478867 4.2178852,8.06354884 3.961729,7.80738424 C3.70563884,7.55141776 3.29053241,7.55135172 3.03424413,7.80738424 Z',
                  id: 'Click-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M6.23073438,2.76923077 C6.61304575,2.76923077 6.92307692,2.52813344 6.92307692,2.23070598 L6.92307692,0.538470574 C6.92307692,0.241097326 6.61311545,0 6.23073438,0 C5.84849271,0 5.53846154,0.241043111 5.53846154,0.538470574 L5.53846154,2.23076019 C5.53846154,2.52813344 5.84842301,2.76923077 6.23073438,2.76923077 Z',
                  id: 'Click-Shape'
                }),
                _react2.default.createElement('path', {
                  d:
                    'M8.27131241,4.15384615 C8.43925265,4.15384615 8.6070608,4.08978754 8.73511275,3.96173635 L10.1924879,2.50430382 C10.4486579,2.24813541 10.4486579,1.83281105 10.1924879,1.57664264 C9.93631798,1.3206063 9.52099115,1.3206063 9.26488725,1.57664264 L7.80751207,3.03414121 C7.55134213,3.29030962 7.55134213,3.70563398 7.80751207,3.96173635 C7.93563006,4.08978754 8.10343822,4.15384615 8.27131241,4.15384615 Z',
                  id: 'Click-Shape'
                })
              )
            )
          )
        )
      );
    };

    exports.default = SelectorClick;
  });

  unwrapExports(selectorClick);

  var stepSelector = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  position: relative;\n  display: inline-block;\n  vertical-align: top;\n  border-radius: 50%;\n  width: 50px;\n  height: 50px;\n  background-color: var(--white);\n  transition: border 500ms ease-out;\n'
        ],
        [
          '\n  position: relative;\n  display: inline-block;\n  vertical-align: top;\n  border-radius: 50%;\n  width: 50px;\n  height: 50px;\n  background-color: var(--white);\n  transition: border 500ms ease-out;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  0% {\n    height: 0;\n    width: 0;\n    opacity: 1;\n  }\n  20% {\n    height: 0;\n    width: 10px;\n    opacity: 1;\n  }\n  100% {\n    height: 20px;\n    width: 10px;\n    opacity: 1;\n  }\n'
        ],
        [
          '\n  0% {\n    height: 0;\n    width: 0;\n    opacity: 1;\n  }\n  20% {\n    height: 0;\n    width: 10px;\n    opacity: 1;\n  }\n  100% {\n    height: 20px;\n    width: 10px;\n    opacity: 1;\n  }\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          "\n  &:after {\n    opacity: 1;\n    height: 20px;\n    width: 10px;\n    transform-origin: left top;\n    border-right: 3px solid var(--blue);\n    border-top: 3px solid var(--blue);\n    content: '';\n    left: 13px;\n    top: 26px;\n    position: absolute;\n    animation-duration: 0.5s;\n    animation-timing-function: ease;\n    animation-name: ",
          ';\n    transform: scaleX(-1) rotate(135deg);\n  }\n'
        ],
        [
          "\n  &:after {\n    opacity: 1;\n    height: 20px;\n    width: 10px;\n    transform-origin: left top;\n    border-right: 3px solid var(--blue);\n    border-top: 3px solid var(--blue);\n    content: '';\n    left: 13px;\n    top: 26px;\n    position: absolute;\n    animation-duration: 0.5s;\n    animation-timing-function: ease;\n    animation-name: ",
          ';\n    transform: scaleX(-1) rotate(135deg);\n  }\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  width: 664px;\n  align-item: space-between;\n  justify-content: space-between;\n  flex-wrap: wrap;\n'
        ],
        [
          '\n  display: flex;\n  width: 664px;\n  align-item: space-between;\n  justify-content: space-between;\n  flex-wrap: wrap;\n'
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n0% {\n  opacity: 0;\n  transform: scale3D(0,0,0);\n}\n\n30% {\n  transform: scale3D(0,0,0);\n}\n\n100% {\n  opacity: 1;\n  transform: scale3D(1.0);\n}\n'
        ],
        [
          '\n0% {\n  opacity: 0;\n  transform: scale3D(0,0,0);\n}\n\n30% {\n  transform: scale3D(0,0,0);\n}\n\n100% {\n  opacity: 1;\n  transform: scale3D(1.0);\n}\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        [
          '\n  background-color: var(--white);\n  position: relative;\n  padding: 24px;\n  margin-bottom: 40px;\n  display: flex;\n  flex-direction: column;\n  text-align: center;\n  font-size: 18px;\n  font-weight: 700;\n  cursor: pointer;\n  box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);\n  border-radius: 4px;\n  animation-name: ',
          ';\n  animation-duration: 0.85s;\n\n  svg {\n    width: 264px;\n    margin-bottom: 16px;\n    height: auto;\n  }\n\n  &.clicked > div,\n  &:hover > div {\n    opacity: 1;\n    transition: opacity 200ms;\n  }\n'
        ],
        [
          '\n  background-color: var(--white);\n  position: relative;\n  padding: 24px;\n  margin-bottom: 40px;\n  display: flex;\n  flex-direction: column;\n  text-align: center;\n  font-size: 18px;\n  font-weight: 700;\n  cursor: pointer;\n  box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);\n  border-radius: 4px;\n  animation-name: ',
          ';\n  animation-duration: 0.85s;\n\n  svg {\n    width: 264px;\n    margin-bottom: 16px;\n    height: auto;\n  }\n\n  &.clicked > div,\n  &:hover > div {\n    opacity: 1;\n    transition: opacity 200ms;\n  }\n'
        ]
      ),
      _templateObject7 = _taggedTemplateLiteral(
        [
          "\n  opacity: 0;\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  display: flex;\n  pointer-events: none;\n  justify-content: center;\n  align-items: center;\n\n  &:before {\n    opacity: 0.6;\n    position: absolute;\n    content: ' ';\n    background-color: var(--blue);\n    width: 100%;\n    height: 100%;\n  }\n"
        ],
        [
          "\n  opacity: 0;\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  display: flex;\n  pointer-events: none;\n  justify-content: center;\n  align-items: center;\n\n  &:before {\n    opacity: 0.6;\n    position: absolute;\n    content: ' ';\n    background-color: var(--blue);\n    width: 100%;\n    height: 100%;\n  }\n"
        ]
      ),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\n  color: var(--white);\n  font-size: 14px;\n  text-align: center;\n  width: 100%;\n\n  code {\n    font-family: monospace;\n    text-transform: uppercase;\n    letter-spacing: 1px;\n    font-size: 12px;\n    padding: 2px 4px;\n    color: var(--dark);\n    background-color: var(--gray);\n    border-radius: 4px;\n    margin: 0 4px;\n  }\n'
        ],
        [
          '\n  color: var(--white);\n  font-size: 14px;\n  text-align: center;\n  width: 100%;\n\n  code {\n    font-family: monospace;\n    text-transform: uppercase;\n    letter-spacing: 1px;\n    font-size: 12px;\n    padding: 2px 4px;\n    color: var(--dark);\n    background-color: var(--gray);\n    border-radius: 4px;\n    margin: 0 4px;\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _selectorInput2 = _interopRequireDefault(selectorInput);

    var _selectorModal2 = _interopRequireDefault(selectorModal);

    var _selectorTooltip2 = _interopRequireDefault(selectorTooltip);

    var _selectorClick2 = _interopRequireDefault(selectorClick);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Circle = _styledComponents2.default.div(_templateObject);
    var CheckmarkAnimation = (0, styledComponents.keyframes)(_templateObject2);

    var Checkmark = _styledComponents2.default.div(
      _templateObject3,
      CheckmarkAnimation
    );

    var Wrapper = _styledComponents2.default.div(_templateObject4);

    var ZoomIn = (0, styledComponents.keyframes)(_templateObject5);
    var Box = _styledComponents2.default.div.attrs({
      className: function className(props) {
        return 'wpeg-tool__type-' + props.selectorType;
      }
    })(_templateObject6, ZoomIn);

    var BoxOverlay = _styledComponents2.default.div(_templateObject7);

    var Hint = _styledComponents2.default.div(_templateObject8);
    var Check = function Check() {
      return _react2.default.createElement(
        Circle,
        null,
        _react2.default.createElement(Checkmark, null)
      );
    };

    var StepSelector = (function(_Component) {
      _inherits(StepSelector, _Component);

      function StepSelector(props) {
        var _this2 = this;

        _classCallCheck(this, StepSelector);

        var _this = _possibleConstructorReturn(
          this,
          (StepSelector.__proto__ || Object.getPrototypeOf(StepSelector)).call(
            this,
            props
          )
        );

        _this.state = {
          clicked: false,
          index: 0
        };

        _this._onClick = (function() {
          var _ref = _asyncToGenerator(
            /*#__PURE__*/ regeneratorRuntime.mark(function _callee(
              type,
              index
            ) {
              return regeneratorRuntime.wrap(
                function _callee$(_context) {
                  while (1) {
                    switch ((_context.prev = _context.next)) {
                      case 0:
                        _context.next = 2;
                        return _this.setState({
                          clicked: true,
                          index: index
                        });

                      case 2:
                        setTimeout(function() {
                          switch (type) {
                            case stores.selectorTypes.CLICK:
                              _this.props.onClick && _this.props.onClick();
                              break;

                            case stores.selectorTypes.TOOLTIP:
                              _this.props.onTooltipClick &&
                                _this.props.onTooltipClick();
                              break;

                            case stores.selectorTypes.INPUT:
                              _this.props.onInputClick &&
                                _this.props.onInputClick();
                              break;

                            case stores.selectorTypes.MODAL:
                              _this.props.onModalClick &&
                                _this.props.onModalClick();
                              break;

                            default:
                              break;
                          }
                        }, 700);

                      case 3:
                      case 'end':
                        return _context.stop();
                    }
                  }
                },
                _callee,
                _this2
              );
            })
          );

          return function(_x, _x2) {
            return _ref.apply(this, arguments);
          };
        })();

        _this.box = [
          {
            component: _react2.default.createElement(
              _selectorClick2.default,
              null
            ),
            type: stores.selectorTypes.CLICK,
            label: wpeg.lang.SELECTOR_CLICK,
            enable: wpeg.stepEnable.CLICK
          },
          {
            component: _react2.default.createElement(
              _selectorTooltip2.default,
              null
            ),
            type: stores.selectorTypes.TOOLTIP,
            label: wpeg.lang.SELECTOR_TOOLTIP,
            enable: wpeg.stepEnable.TOOLTIP
          },
          {
            component: _react2.default.createElement(
              _selectorInput2.default,
              null
            ),
            type: stores.selectorTypes.INPUT,
            label: wpeg.lang.SELECTOR_INPUT,
            enable: wpeg.stepEnable.INPUT
          },
          {
            component: _react2.default.createElement(
              _selectorModal2.default,
              null
            ),
            type: stores.selectorTypes.MODAL,
            label: wpeg.lang.SELECTOR_MODAL,
            enable: wpeg.stepEnable.MODAL
          }
        ];
        return _this;
      }

      _createClass(StepSelector, [
        {
          key: 'render',
          value: function render() {
            var _this3 = this;

            return _react2.default.createElement(
              popup.Overlay,
              null,
              _react2.default.createElement(
                Wrapper,
                null,
                this.box.map(function(item, key) {
                  if (item.enable) {
                    var isClicked =
                      _this3.state.clicked && _this3.state.index === key;
                    return _react2.default.createElement(
                      Box,
                      {
                        key: key,
                        onClick: function onClick() {
                          return _this3._onClick(item.type, key);
                        },
                        className: isClicked ? 'clicked' : null,
                        selectorType: item.type
                      },
                      item.component,
                      item.label,
                      !_this3.state.clicked &&
                        _react2.default.createElement(BoxOverlay, null),
                      isClicked &&
                        _react2.default.createElement(
                          BoxOverlay,
                          null,
                          _react2.default.createElement(Check, null)
                        )
                    );
                  } else {
                    return null;
                  }
                }),
                _react2.default.createElement(
                  Hint,
                  null,
                  'Press ',
                  _react2.default.createElement('code', null, 'esc'),
                  ' to cancel selection step. '
                )
              )
            );
          }
        }
      ]);

      return StepSelector;
    })(react.Component);

    exports.default = StepSelector;
  });

  unwrapExports(stepSelector);

  var book = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _extends =
      Object.assign ||
      function(target) {
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

    var _react2 = _interopRequireDefault(react);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    var Book = function Book(props) {
      return _react2.default.createElement(
        'svg',
        _extends({ viewBox: '0 0 24 24', width: 24, height: 24 }, props),
        _react2.default.createElement('path', {
          className: 'heroicon-ui',
          d:
            'M7 5H5v14h14V5h-2v10a1 1 0 0 1-1.45.9L12 14.11l-3.55 1.77A1 1 0 0 1 7 15V5zM5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm4 2v8.38l2.55-1.27a1 1 0 0 1 .9 0L15 13.38V5H9z'
        })
      );
    };

    exports.default = Book;
  });

  unwrapExports(book);

  var stepEditor = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _react2 = _interopRequireDefault(react);

    var _book2 = _interopRequireDefault(book);

    var _2 = _interopRequireDefault(popup);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    } /* global wpeg */

    var StepPopup = (function(_Component) {
      _inherits(StepPopup, _Component);

      function StepPopup(props) {
        _classCallCheck(this, StepPopup);

        var _this = _possibleConstructorReturn(
          this,
          (StepPopup.__proto__ || Object.getPrototypeOf(StepPopup)).call(
            this,
            props
          )
        );

        _this.stepTitle = _react2.default.createRef();
        _this.stepDesc = _react2.default.createRef();
        return _this;
      }

      _createClass(StepPopup, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            var _this2 = this;

            this.props.onMount && this.props.onMount();
            setTimeout(function() {
              return _this2.stepTitle.input.focus();
            }, 200);
          }
        },
        {
          key: 'render',
          value: function render() {
            var _this3 = this;

            return _react2.default.createElement(
              _2.default,
              {
                title: this.props.title || wpeg.lang.ADD_STEP,
                titleIcon: _react2.default.createElement(_book2.default, null),
                isOverlay: true,
                stickTo: this.props.stickTo,
                onClose: this.props.onClose,
                forceHover: this.props.forceHover,
                className: 'wpeg-tool__step-editor'
              },
              _react2.default.createElement(
                popup.Content,
                null,
                _react2.default.createElement(fields.Text, {
                  label: wpeg.lang.TITLE,
                  value: this.props.fields && this.props.fields.title,
                  ref: function ref(component) {
                    return (_this3.stepTitle = component);
                  },
                  onUpdate: function onUpdate(value) {
                    return (
                      _this3.props.onUpdate &&
                      _this3.props.onUpdate({ title: value })
                    );
                  }
                }),
                _react2.default.createElement(fields.ContentEditor, {
                  label: wpeg.lang.DESCRIPTION,
                  value: this.props.fields && this.props.fields.description,
                  ref: function ref(component) {
                    return (_this3.stepDesc = component);
                  },
                  onUpdate: function onUpdate(value) {
                    return (
                      _this3.props.onUpdate &&
                      _this3.props.onUpdate({ description: value })
                    );
                  }
                })
              ),
              _react2.default.createElement(
                popup.Footer,
                { align: 'right' },
                _react2.default.createElement(
                  'button',
                  {
                    className: 'button button-primary',
                    onClick: this.props.onSave
                  },
                  this.props.saveLabel || wpeg.lang.ADD_TO_LIST
                )
              )
            );
          }
        }
      ]);

      return StepPopup;
    })(react.Component);

    exports.default = StepPopup;
  });

  unwrapExports(stepEditor);

  var progressBar = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n    width: ',
          ';\n    height: 14px;\n    background-color: var(--graylight5);\n'
        ],
        [
          '\n    width: ',
          ';\n    height: 14px;\n    background-color: var(--graylight5);\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n    height: 100%\n    width: ',
          ';\n    background-color: var(--green2);\n'
        ],
        [
          '\n    height: 100%\n    width: ',
          ';\n    background-color: var(--green2);\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var Bar = _styledComponents2.default.div(_templateObject, function(props) {
      return props.width || '100px';
    });
    var Active = _styledComponents2.default.div(_templateObject2, function(
      props
    ) {
      return props.width || '0%';
    });

    var ProgressBar = (function(_Component) {
      _inherits(ProgressBar, _Component);

      function ProgressBar() {
        _classCallCheck(this, ProgressBar);

        return _possibleConstructorReturn(
          this,
          (ProgressBar.__proto__ || Object.getPrototypeOf(ProgressBar)).apply(
            this,
            arguments
          )
        );
      }

      _createClass(ProgressBar, [
        {
          key: 'render',
          value: function render() {
            return _react2.default.createElement(
              Bar,
              { width: this.props.width },
              _react2.default.createElement(Active, {
                width: this.props.progress
              })
            );
          }
        }
      ]);

      return ProgressBar;
    })(react.Component);

    exports.default = ProgressBar;
  });

  unwrapExports(progressBar);

  var stepViewer = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class;

    var _templateObject = _taggedTemplateLiteral(
        ['\n  &.modal { \n    text-align: center;\n  }\n'],
        ['\n  &.modal { \n    text-align: center;\n  }\n']
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  font-size: 16px;\n  font-weight: bold;\n  margin-bottom: 16px;\n  '
        ],
        [
          '\n  font-size: 16px;\n  font-weight: bold;\n  margin-bottom: 16px;\n  '
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          '\n  font-size: 12px;\n  color: var(--graylight2);\n  line-height: 1.5;\n\n  ul { \n    list-style-type: disc; \n    margin-left: 2em;\n  }\n'
        ],
        [
          '\n  font-size: 12px;\n  color: var(--graylight2);\n  line-height: 1.5;\n\n  ul { \n    list-style-type: disc; \n    margin-left: 2em;\n  }\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  justify-content: space-between;\n  padding: 0 24px 24px;\n'
        ],
        [
          '\n  display: flex;\n  justify-content: space-between;\n  padding: 0 24px 24px;\n'
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  text-transform: uppercase;\n  font-weight: bold;\n  color: var(--',
          ');\n  cursor: ',
          ';\n'
        ],
        [
          '\n  text-transform: uppercase;\n  font-weight: bold;\n  color: var(--',
          ');\n  cursor: ',
          ';\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(['\n'], ['\n']);

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _2 = _interopRequireDefault(src_1);

    var _progressBar2 = _interopRequireDefault(progressBar);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var ContentViewer = src_1.Content.extend(_templateObject);
    var Title = _styledComponents2.default.div(_templateObject2);

    var Desc = _styledComponents2.default.div(_templateObject3);
    var Navigation = _styledComponents2.default.div(_templateObject4);
    var Button = _styledComponents2.default.div(
      _templateObject5,
      function(props) {
        return props.isEnabled ? 'blue' : 'gray';
      },
      function(props) {
        return props.isEnabled ? 'pointer' : 'default';
      }
    );

    var Message = _styledComponents2.default.div(_templateObject6);

    var StepPopup = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(StepPopup, _Component);

            function StepPopup() {
              var _ref;

              var _temp, _this, _ret;

              _classCallCheck(this, StepPopup);

              for (
                var _len = arguments.length, args = Array(_len), _key = 0;
                _key < _len;
                _key++
              ) {
                args[_key] = arguments[_key];
              }

              return (
                (_ret = ((_temp = ((_this = _possibleConstructorReturn(
                  this,
                  (_ref =
                    StepPopup.__proto__ ||
                    Object.getPrototypeOf(StepPopup)).call.apply(
                    _ref,
                    [this].concat(args)
                  )
                )),
                _this)),
                (_this.getProgressBarPercent = function() {
                  return _this.props.$store.tool.getProgressBarPercent;
                }),
                (_this.nextStep = function() {
                  if (_this.props.$store.tool.isNextStepEnabled) {
                    _this.props.$store.tool.gotoNextStep();
                  }
                }),
                (_this.prevStep = function() {
                  if (!_this.props.$store.tool.isCurrentStepFirstStep) {
                    _this.props.$store.tool.gotoPrevStep();
                  }
                }),
                (_this.doneStep = function() {
                  if (
                    _this.props.$store.tool.isCurrentStepLastStep &&
                    _this.props.$store.tool.isNextStepEnabled
                  ) {
                    _this.props.$store.tool.cancelAddStep();
                  }
                }),
                _temp)),
                _possibleConstructorReturn(_this, _ret)
              );
            }

            _createClass(StepPopup, [
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  this.props.onMount && this.props.onMount();
                }
              },
              {
                key: 'render',
                value: function render() {
                  var proceedMessage = void 0;
                  switch (this.props.$store.tool.currentStep.type) {
                    case stores.selectorTypes.CLICK:
                      proceedMessage = wpeg.lang.CLICK_PROCEED;
                      break;
                    case stores.selectorTypes.INPUT:
                      proceedMessage = wpeg.lang.FILL_PROCEED;
                      break;
                    default:
                      break;
                  }

                  return _react2.default.createElement(
                    _2.default,
                    {
                      isOverlay: true,
                      stickTo: this.props.stickTo,
                      onClose: this.props.onClose,
                      titleId: this.props.title,
                      type: this.props.$store.tool.currentStep.type,
                      forceHover: this.props.forceHover,
                      className: 'wpeg-tool__step-viewer'
                    },
                    _react2.default.createElement(
                      ContentViewer,
                      { className: this.props.$store.tool.currentStep.type },
                      _react2.default.createElement(
                        Title,
                        null,
                        this.props.title
                      ),
                      _react2.default.createElement(Desc, {
                        dangerouslySetInnerHTML: {
                          __html: this.props.description
                        }
                      })
                    ),
                    this.props.$store.tool.currentStep.type !==
                      stores.selectorTypes.CLICK &&
                      _react2.default.createElement(
                        Navigation,
                        null,
                        _react2.default.createElement(
                          Button,
                          {
                            isEnabled: !this.props.$store.tool
                              .isCurrentStepFirstStep,
                            onClick: this.prevStep
                          },
                          wpeg.lang.PREVIOUS
                        ),
                        !this.props.$store.tool.isCurrentStepLastStep &&
                          _react2.default.createElement(
                            Button,
                            {
                              isEnabled: this.props.$store.tool
                                .isNextStepEnabled,
                              onClick: this.nextStep
                            },
                            wpeg.lang.NEXT
                          ),
                        this.props.$store.tool.isCurrentStepLastStep &&
                          _react2.default.createElement(
                            Button,
                            {
                              isEnabled: this.props.$store.tool
                                .isNextStepEnabled,
                              onClick: this.doneStep
                            },
                            wpeg.lang.DONE
                          )
                      ),
                    _react2.default.createElement(
                      src_1.Footer,
                      { align: 'right' },
                      _react2.default.createElement(_progressBar2.default, {
                        progress: this.getProgressBarPercent()
                      }),
                      _react2.default.createElement(
                        Message,
                        null,
                        proceedMessage
                      )
                    )
                  );
                }
              }
            ]);

            return StepPopup;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = StepPopup;
  });

  unwrapExports(stepViewer);

  var errors = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _templateObject = _taggedTemplateLiteral(
      ['\n  justify-content: center;\n'],
      ['\n  justify-content: center;\n']
    );

    var _react2 = _interopRequireDefault(react);

    var _2 = _interopRequireDefault(popup);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var PopupFooter = popup.Footer.extend(_templateObject);

    exports.default = function(props) {
      return _react2.default.createElement(
        _2.default,
        { isOverlay: true, onClose: props.onClose },
        _react2.default.createElement(popup.Content, null, props.children),
        _react2.default.createElement(
          PopupFooter,
          null,
          _react2.default.createElement(
            'button',
            { className: 'button button-danger', onClick: props.onClose },
            props.buttonLabel || wpeg.lang.OK
          )
        )
      );
    };
  });

  unwrapExports(errors);

  var ripple = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _templateObject = _taggedTemplateLiteral(
      [
        "\n  pointer-events: none;\n  position: absolute;\n\n  &:before {\n    content:' ';\n    position: absolute;\n    z-index:2;\n    left:0;\n    top:0;\n    width:10px;\n    height:10px;\n    background-color: var(--",
        ");\n    border-radius: 50%;\n  }\n\n  &:after {\n    content:' ';\n    position: absolute;\n    z-index:1;\n    width:10px;\n    height:10px;\n    background-color: var(--",
        ");\n    border-radius: 50%;\n    box-shadow: 0 0 10px rgba(0, 0, 0, .3) inset;\n    animation-name: 'wpeg-ripple';\n    animation-duration: 1s;\n    animation-timing-function: ease;\n    animation-delay: 0s;\n    animation-iteration-count: infinite;\n    animation-direction: normal;\n  }\n"
      ],
      [
        "\n  pointer-events: none;\n  position: absolute;\n\n  &:before {\n    content:' ';\n    position: absolute;\n    z-index:2;\n    left:0;\n    top:0;\n    width:10px;\n    height:10px;\n    background-color: var(--",
        ");\n    border-radius: 50%;\n  }\n\n  &:after {\n    content:' ';\n    position: absolute;\n    z-index:1;\n    width:10px;\n    height:10px;\n    background-color: var(--",
        ");\n    border-radius: 50%;\n    box-shadow: 0 0 10px rgba(0, 0, 0, .3) inset;\n    animation-name: 'wpeg-ripple';\n    animation-duration: 1s;\n    animation-timing-function: ease;\n    animation-delay: 0s;\n    animation-iteration-count: infinite;\n    animation-direction: normal;\n  }\n"
      ]
    );

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    exports.default = _styledComponents2.default.div.attrs({
      style: function style(props) {
        return {
          top: props.top,
          left: props.left
        };
      }
    })(
      _templateObject,
      function(props) {
        return props.color ? props.color : 'red';
      },
      function(props) {
        return props.color ? props.color : 'red';
      }
    );
  });

  unwrapExports(ripple);

  var tool$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _createClass = (function() {
      function defineProperties(target$$1, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target$$1, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class;

    var _templateObject = _taggedTemplateLiteral(
        [
          '\nposition: fixed;\nbottom: 0;\nleft: 50%;\ntransform: translateX(-50%);\nwidth: 960px;\ndisplay: flex;\njustify-content: center;\nz-index: ',
          ';\n'
        ],
        [
          '\nposition: fixed;\nbottom: 0;\nleft: 50%;\ntransform: translateX(-50%);\nwidth: 960px;\ndisplay: flex;\njustify-content: center;\nz-index: ',
          ';\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  0% {\n    transform: translateY(0%);\n  }\n\n  60% {\n    transform: translateY(-50%);\n  }\n\n  100% {\n    transform: translateY(100%);\n  }\n'
        ],
        [
          '\n  0% {\n    transform: translateY(0%);\n  }\n\n  60% {\n    transform: translateY(-50%);\n  }\n\n  100% {\n    transform: translateY(100%);\n  }\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  align-items: center;\n  width: 100%;\n  background: var(--dark);\n  transform: translateY(',
          ');\n  transition: transform 125ms ease;\n  will-change: transform;\n  padding: 24px 32px;\n  animation-name: ',
          ';\n  animation-duration: 0.35s;\n  animation-fill-mode: both;\n  animation-timing-function: ease;\n  pointer-events: all;\n'
        ],
        [
          '\n  display: flex;\n  align-items: center;\n  width: 100%;\n  background: var(--dark);\n  transform: translateY(',
          ');\n  transition: transform 125ms ease;\n  will-change: transform;\n  padding: 24px 32px;\n  animation-name: ',
          ';\n  animation-duration: 0.35s;\n  animation-fill-mode: both;\n  animation-timing-function: ease;\n  pointer-events: all;\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          "\n  font-size: 16px;\n  color: var(--white);\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  max-width: 350px;\n  \n  &:before {\n    display: block;\n    content: '",
          "';\n    font-size: 12px;\n    color: var(--gray);\n  }\n"
        ],
        [
          "\n  font-size: 16px;\n  color: var(--white);\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  max-width: 350px;\n  \n  &:before {\n    display: block;\n    content: '",
          "';\n    font-size: 12px;\n    color: var(--gray);\n  }\n"
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  padding: 9px 16px !important;\n  height: auto !important;\n  outline: none !important;\n  box-shadow: none !important;\n  width: 100%;\n  position: relative;\n  line-height: normal !important;\n  cursor: pointer;\n'
        ],
        [
          '\n  padding: 9px 16px !important;\n  height: auto !important;\n  outline: none !important;\n  box-shadow: none !important;\n  width: 100%;\n  position: relative;\n  line-height: normal !important;\n  cursor: pointer;\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        [
          '\n  margin-left: 24px;\n  margin-right: 48px;\n  position: relative;\n  cursor: pointer;\n'
        ],
        [
          '\n  margin-left: 24px;\n  margin-right: 48px;\n  position: relative;\n  cursor: pointer;\n'
        ]
      ),
      _templateObject7 = _taggedTemplateLiteral(
        [
          '\ndisplay: flex;\nflex-direction: column;\nposition: absolute;\nleft: 0;\ntop: -275px;\nwidth: 195%;\nheight: 250px;\nbackground: var(--white);\nbox-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.3);\n'
        ],
        [
          '\ndisplay: flex;\nflex-direction: column;\nposition: absolute;\nleft: 0;\ntop: -275px;\nwidth: 195%;\nheight: 250px;\nbackground: var(--white);\nbox-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.3);\n'
        ]
      ),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\nborder: 1px solid var(--gray2);\nborder-radius: 3px;\npadding: 9px 32px;\ncolor: var(--gray2);\nbox-shadow: none;\noutline: none;\ndisplay: flex;\nalign-items: center;\nbackground: none;\nwidth: 170px;\n\n&:hover {\n  border-color: var(--gray);\n  color: var(--gray);\n\n  svg {\n    fill: var(--gray);\n  }\n}\n\nsvg {\n  width: 16px;\n  fill: var(--gray2);\n  margin-right: 6px;\n}\n'
        ],
        [
          '\nborder: 1px solid var(--gray2);\nborder-radius: 3px;\npadding: 9px 32px;\ncolor: var(--gray2);\nbox-shadow: none;\noutline: none;\ndisplay: flex;\nalign-items: center;\nbackground: none;\nwidth: 170px;\n\n&:hover {\n  border-color: var(--gray);\n  color: var(--gray);\n\n  svg {\n    fill: var(--gray);\n  }\n}\n\nsvg {\n  width: 16px;\n  fill: var(--gray2);\n  margin-right: 6px;\n}\n'
        ]
      ),
      _templateObject9 = _taggedTemplateLiteral(
        [
          '\ntext-overflow: ellipsis;\noverflow: hidden;\nwhite-space: nowrap;\n'
        ],
        [
          '\ntext-overflow: ellipsis;\noverflow: hidden;\nwhite-space: nowrap;\n'
        ]
      ),
      _templateObject10 = _taggedTemplateLiteral(
        [
          '\ncolor: var(--gray);\nbackground: var(--dark);\npadding: 8px 16px;\ntext-align: left;\ndisplay: flex;\nalign-items: center;\n\nsvg {\n  width: 20px;\n  margin-left: auto;\n  margin-right: 0;\n  fill: var(--gray)\n}\n'
        ],
        [
          '\ncolor: var(--gray);\nbackground: var(--dark);\npadding: 8px 16px;\ntext-align: left;\ndisplay: flex;\nalign-items: center;\n\nsvg {\n  width: 20px;\n  margin-left: auto;\n  margin-right: 0;\n  fill: var(--gray)\n}\n'
        ]
      ),
      _templateObject11 = _taggedTemplateLiteral(
        ['\nheight: 100%;\noverflow-y: scroll;\n'],
        ['\nheight: 100%;\noverflow-y: scroll;\n']
      ),
      _templateObject12 = _taggedTemplateLiteral(
        [
          '\n  padding: 16px;\n  color: var(--dark);\n  font-size: 10px;\n  display: flex;\n  align-items: center;\n  cursor: default;\n\n  &:hover {\n    background: var(--graylight);\n  }\n'
        ],
        [
          '\n  padding: 16px;\n  color: var(--dark);\n  font-size: 10px;\n  display: flex;\n  align-items: center;\n  cursor: default;\n\n  &:hover {\n    background: var(--graylight);\n  }\n'
        ]
      ),
      _templateObject13 = _taggedTemplateLiteral(
        ['\ntext-align: left;\npointer-events: none;\n'],
        ['\ntext-align: left;\npointer-events: none;\n']
      ),
      _templateObject14 = _taggedTemplateLiteral(
        ['\nfont-size: 16px;\nfont-weight: 600;\nmargin-bottom: 4px;\n'],
        ['\nfont-size: 16px;\nfont-weight: 600;\nmargin-bottom: 4px;\n']
      ),
      _templateObject15 = _taggedTemplateLiteral(
        [
          '\n  font-size: 14px;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  max-width: 250px;\n'
        ],
        [
          '\n  font-size: 14px;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  white-space: nowrap;\n  max-width: 250px;\n'
        ]
      ),
      _templateObject16 = _taggedTemplateLiteral(
        [
          '\n  margin-left: auto;\n  display: flex;\n  align-items: center;\n\n  svg {\n    width: 14px;\n    height: auto;\n    cursor: pointer;\n    opacity: 0.8;\n    margin-right: 4px;\n\n    &:hover {\n      opacity: 1;\n    }\n\n    &.edit, &.target {\n      fill: var(--gray3);\n\n      &:hover {\n        fill: var(--blue);\n      }\n    }\n\n    &.target { \n      width: 12px;\n    }\n\n    &.delete {\n      fill: var(--red);\n      margin-right: 0;\n    }\n  }\n'
        ],
        [
          '\n  margin-left: auto;\n  display: flex;\n  align-items: center;\n\n  svg {\n    width: 14px;\n    height: auto;\n    cursor: pointer;\n    opacity: 0.8;\n    margin-right: 4px;\n\n    &:hover {\n      opacity: 1;\n    }\n\n    &.edit, &.target {\n      fill: var(--gray3);\n\n      &:hover {\n        fill: var(--blue);\n      }\n    }\n\n    &.target { \n      width: 12px;\n    }\n\n    &.delete {\n      fill: var(--red);\n      margin-right: 0;\n    }\n  }\n'
        ]
      ),
      _templateObject17 = _taggedTemplateLiteral(
        ['\n  position: relative;\n  display: flex;\n  margin-left: auto;\n'],
        ['\n  position: relative;\n  display: flex;\n  margin-left: auto;\n']
      ),
      _templateObject18 = _taggedTemplateLiteral(
        [
          '\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  background: var(--dark);\n  opacity: 0.3;\n  z-index: 99;\n'
        ],
        [
          '\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  background: var(--dark);\n  opacity: 0.3;\n  z-index: 99;\n'
        ]
      ),
      _templateObject19 = _taggedTemplateLiteral(
        [
          '\n  background: var(--green);\n  border-radius: 3px;\n  border: none;\n  cursor: pointer;\n  padding: 8px 32px;\n  outline: none;\n  box-shadow: none;\n\n  svg {\n    width: 16px;\n    height: auto;\n    fill: var(--white);\n  }\n'
        ],
        [
          '\n  background: var(--green);\n  border-radius: 3px;\n  border: none;\n  cursor: pointer;\n  padding: 8px 32px;\n  outline: none;\n  box-shadow: none;\n\n  svg {\n    width: 16px;\n    height: auto;\n    fill: var(--white);\n  }\n'
        ]
      ),
      _templateObject20 = _taggedTemplateLiteral(
        [
          '\n  position: fixed;\n  outline: 3px solid var(--blue2);\n  pointer-events: none;\n  z-index: 999999;\n'
        ],
        [
          '\n  position: fixed;\n  outline: 3px solid var(--blue2);\n  pointer-events: none;\n  z-index: 999999;\n'
        ]
      ),
      _templateObject21 = _taggedTemplateLiteral(
        [
          '\n  font-size: 14px;\n  color: var(--white);\n  background: var(--blue);\n  box-shadow: 0 2px 5px 0px rgba(0, 0, 0, 0.16);\n  padding: 8px 16px;\n  position: fixed;\n  z-index: 9999999;\n  pointer-events: none;\n  border-radius: 1px;\n  display: flex;\n  justify-content: center;\n  align-items: center;\n\n  &:before {\n    font-family: dashicons;\n    content: "\f147";\n    margin-right: 10px;\n  }\n'
        ],
        [
          '\n  font-size: 14px;\n  color: var(--white);\n  background: var(--blue);\n  box-shadow: 0 2px 5px 0px rgba(0, 0, 0, 0.16);\n  padding: 8px 16px;\n  position: fixed;\n  z-index: 9999999;\n  pointer-events: none;\n  border-radius: 1px;\n  display: flex;\n  justify-content: center;\n  align-items: center;\n\n  &:before {\n    font-family: dashicons;\n    content: "\\f147";\n    margin-right: 10px;\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _stringStripHtml2 = _interopRequireDefault(stringStripHtml);

    var _reactHotKeys2 = _interopRequireDefault(reactHotKeys);

    var _check2 = _interopRequireDefault(check);

    var _list2 = _interopRequireDefault(list);

    var _close2 = _interopRequireDefault(close);

    var _pencil2 = _interopRequireDefault(pencil);

    var _trash2 = _interopRequireDefault(trash);

    var _target2 = _interopRequireDefault(target);

    var _delete2 = _interopRequireDefault(_delete);

    var _newGuide2 = _interopRequireDefault(newGuide$2);

    var _confirmation2 = _interopRequireDefault(confirmation);

    var _emptyWrapper2 = _interopRequireDefault(emptyWrapper);

    var _stepSelector2 = _interopRequireDefault(stepSelector);

    var _stepEditor2 = _interopRequireDefault(stepEditor);

    var _stepViewer2 = _interopRequireDefault(stepViewer);

    var _errors2 = _interopRequireDefault(errors);

    var _ripple2 = _interopRequireDefault(ripple);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Wrapper = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__wrapper'
    })(_templateObject, function(props) {
      return props.hightlight ? 99999 : 998;
    });

    var BouncingAnim = (0, styledComponents.keyframes)(_templateObject2);

    var BottomBar = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__bottombar'
    })(
      _templateObject3,
      function(props) {
        return props.active || props.bouncing ? '0%' : '100%';
      },
      function(props) {
        return props.bouncing ? BouncingAnim : '';
      }
    );

    var Status = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__guide-title'
    })(_templateObject4, function(props) {
      return props.label;
    });

    var PinStepButton = _styledComponents2.default.button.attrs({
      className: 'wpeg-tool__btn-pin-step'
    })(_templateObject5);

    var StepList = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-lists'
    })(_templateObject6);

    var StepListWrapper = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-panel'
    })(_templateObject7);

    var StepListButton = _styledComponents2.default.button.attrs({
      className: 'wpeg-tool__step-list-button'
    })(_templateObject8);

    var StepListCount = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-count'
    })(_templateObject9);

    var StepListTitle = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-title'
    })(_templateObject10);

    var StepListContainer = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-container'
    })(_templateObject11);

    var StepListContent = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-item'
    })(_templateObject12);

    var StepListItem = _styledComponents2.default.div(_templateObject13);

    var StepListItemTitle = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-item__title'
    })(_templateObject14);

    var StepListItemDesc = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-item__desc'
    })(_templateObject15);

    var StepListTool = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__step-list-item__tools'
    })(_templateObject16);

    var ButtonWrapper = _styledComponents2.default.div.attrs({
      className: 'wpeg-tool__button-wrapper'
    })(_templateObject17);

    var ButtonOverlay = _styledComponents2.default.div(_templateObject18);

    var FinishButton = _styledComponents2.default.button.attrs({
      className: 'wpeg-tool__finish-button'
    })(_templateObject19);

    var Selector = _styledComponents2.default.div.attrs({
      style: function style(props) {
        return {
          width: props.isHighlight ? props.rect.width + 'px' : 0,
          height: props.isHighlight ? props.rect.height + 'px' : 0,
          top: props.isHighlight ? props.rect.top + 'px' : 0,
          left: props.isHighlight ? props.rect.left + 'px' : 0,
          pointerEvents: props.isHighlight ? 'none' : 'all'
        };
      },
      className: 'wpeg-tool__selector'
    })(_templateObject20);

    var Notification = _styledComponents2.default.div.attrs({
      style: function style(props) {
        var margin = 16;
        var top = props.stickTo.top;
        var left = props.stickTo.left;

        left += props.stickTo.width + margin;

        return {
          top: top + 'px',
          left: left + 'px'
        };
      }
    })(_templateObject21);

    var Tool = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(Tool, _Component);

            function Tool() {
              var _ref,
                _this2 = this;

              var _temp, _this, _ret;

              _classCallCheck(this, Tool);

              for (
                var _len = arguments.length, args = Array(_len), _key = 0;
                _key < _len;
                _key++
              ) {
                args[_key] = arguments[_key];
              }

              return (
                (_ret = ((_temp = ((_this = _possibleConstructorReturn(
                  this,
                  (_ref =
                    Tool.__proto__ || Object.getPrototypeOf(Tool)).call.apply(
                    _ref,
                    [this].concat(args)
                  )
                )),
                _this)),
                (_this.state = {
                  step: {
                    title: null,
                    description: null
                  },
                  guide: {
                    title: null,
                    description: null
                  },
                  value: {}
                }),
                (_this._updateGuideValue = function(newValue) {
                  var guide = _this.state.guide;

                  for (var key in newValue) {
                    if (key in guide) {
                      guide[key] = newValue[key];
                    }
                  }

                  _this.setState({
                    guide: guide
                  });
                }),
                (_this.newGuide = function() {
                  if (_this.props.$store.tool.displayBottomBar) {
                    _this.props.$store.tool.showConfirmation();
                  } else {
                    _this.props.$store.tool.showNewGuidePopup();
                  }
                }),
                (_this.viewGuide = function(guideID) {
                  var viewSource = stores.viewSourceTypes.ADMIN_BAR;
                  if (
                    _this.props.$store.tool.currentGuide &&
                    parseInt(_this.props.$store.tool.currentGuide.ID, 10) ===
                      guideID
                  ) {
                    viewSource = stores.viewSourceTypes.BOTTOM_BAR;
                  }
                  _this.props.$store.tool.viewStep(guideID, null, viewSource);
                }),
                (_this._cancelConfirmation = function() {
                  _this.props.$store.tool.hideConfirmation();
                }),
                (_this._confirmConfirmation = function() {
                  _this.props.$store.tool.hideConfirmation();
                  _this.props.$store.tool.showNewGuidePopup();
                }),
                (_this._createNewGuide = function() {
                  _this.props.$store.tool.createNewGuide(_this.state.guide);
                }),
                (_this._cancelNewGuide = function() {
                  _this.props.$store.tool.hideNewGuidePopup();
                }),
                (_this._finish = function() {
                  _this.props.$store.tool.finish();
                }),
                (_this._reselectElement = function(_ref2) {
                  var ID = _ref2.ID;

                  _this.props.$store.tool.inspectElement({
                    ID: ID,
                    reselect: true
                  });
                }),
                (_this._inspectElement = function() {
                  _this.props.$store.tool.inspectElement();
                }),
                (_this._showStepSelector = function() {
                  _this.props.$store.tool.showStepSelector();
                }),
                (_this._inspectViewEdit = _asyncToGenerator(
                  /*#__PURE__*/ regeneratorRuntime.mark(function _callee() {
                    return regeneratorRuntime.wrap(
                      function _callee$(_context) {
                        while (1) {
                          switch ((_context.prev = _context.next)) {
                            case 0:
                              if (!_this.props.$store.tool.isEditState) {
                                _context.next = 3;
                                break;
                              }

                              _context.next = 3;
                              return _this.setState({
                                step: Object.assign(
                                  {},
                                  _this.props.$store.tool.currentStep
                                )
                              });

                            case 3:
                              _this.props.$store.tool.inspectEditStep();

                              // Handle event on click / input.
                              if (_this.props.$store.tool.isViewState) {
                                _this.props.$store.tool.proceedHandler();
                              }

                            case 5:
                            case 'end':
                              return _context.stop();
                          }
                        }
                      },
                      _callee,
                      _this2
                    );
                  })
                )),
                (_this._cancelAddStep = function() {
                  _this.props.$store.tool.cancelAddStep();
                }),
                (_this._updateStepValue = function(newValue) {
                  var step = _this.state.step;

                  for (var key in newValue) {
                    if (key in step) {
                      step[key] = newValue[key];
                    }
                  }

                  _this.setState({
                    step: step
                  });
                }),
                (_this._addStep = function() {
                  _this.props.$store.tool.addStep(
                    Object.assign(
                      {
                        selector: _this.props.$store.tool.highlightSelectorTree,
                        uri: window.location.href
                      },
                      _this.state.step
                    )
                  );
                }),
                (_this._editStep = function(_ref4) {
                  var ID = _ref4.ID,
                    title = _ref4.title,
                    description = _ref4.description,
                    action = _ref4.action,
                    type = _ref4.type;

                  _this.setState({
                    value: {
                      ID: ID,
                      title: title,
                      description: description,
                      action: action,
                      type: type
                    }
                  });
                  _this.props.$store.tool.editStep(ID);
                }),
                (_this._updateStep = function() {
                  _this.props.$store.tool.updateStep(
                    Object.assign({}, _this.state.step)
                  );
                }),
                (_this._confirmDelete = function(item) {
                  _this.props.$store.tool.showDeletePopup(item);
                }),
                (_this._deleteStep = function() {
                  _this.props.$store.tool.deleteStep();
                }),
                (_this._cancelDeleteStep = function() {
                  _this.props.$store.tool.hideDeletePopup();
                }),
                (_this._toggleList = function() {
                  _this.props.$store.tool.toggleList();
                }),
                (_this._viewStep = function(_ref5) {
                  var ID = _ref5.ID;

                  _this.props.$store.tool.viewStep(null, ID);
                }),
                (_this._captureKeyboard = function() {
                  if (
                    _this.props.$store.tool.highlightMode ||
                    _this.props.$store.tool.isCreateState ||
                    _this.props.$store.tool.isViewState ||
                    _this.props.$store.tool.isEditState
                  ) {
                    _this.props.$store.tool.cancelAddStep();
                  }

                  if (_this.props.$store.tool.displayStepSelector) {
                    _this.props.$store.tool.hideStepSelector();
                  }
                }),
                (_this._hidePopupHint = function(isHidePopup) {
                  _this.props.$store.tool.hidePinStepPopupHint(isHidePopup);
                  _this.props.$store.tool.inspectElement();
                }),
                (_this.onSelectorClick = function(type) {
                  _this.props.$store.tool.inspectElement({ type: type });
                }),
                _temp)),
                _possibleConstructorReturn(_this, _ret)
              );
            }

            _createClass(Tool, [
              {
                key: 'UNSAFE_componentWillMount',
                value: function UNSAFE_componentWillMount() {
                  this.props.$store.tool.sync();
                }
              },
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  window.WPEG = this;
                }
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  var isHighlight =
                    this.props.$store.tool.highlightMode ||
                    this.props.$store.tool.isCreateState ||
                    this.props.$store.tool.isEditState ||
                    (this.props.$store.tool.isViewState &&
                      !this.props.$store.tool.isSelectedTypeModal);

                  return _react2.default.createElement(
                    react.Fragment,
                    null,
                    _react2.default.createElement(_reactHotKeys2.default, {
                      keyName: 'esc',
                      onKeyUp: this._captureKeyboard
                    }),
                    isHighlight &&
                      _react2.default.createElement(Selector, {
                        isHighlight: isHighlight,
                        rect: this.props.$store.tool.highlightBounds
                      }),
                    this.props.$store.tool.reselectedElement &&
                      _react2.default.createElement(
                        Notification,
                        { stickTo: this.props.$store.tool.highlightBounds },
                        wpeg.lang.ELEMENT_UPDATED
                      ),
                    this.props.$store.tool.isCreateState &&
                      _react2.default.createElement(_stepEditor2.default, {
                        forceHover: this.props.$store.tool.forceHoverData,
                        stickTo: this.props.$store.tool.isSelectedTypeModal
                          ? null
                          : this.props.$store.tool.highlightBounds,
                        onUpdate: this._updateStepValue,
                        onClose: this._cancelAddStep,
                        onSave: this._addStep
                      }),
                    this.props.$store.tool.displayConfirmation &&
                      _react2.default.createElement(
                        _confirmation2.default,
                        {
                          onCancel: this._cancelConfirmation,
                          onConfirm: this._confirmConfirmation
                        },
                        wpeg.lang.CONFIRM_NEW_GUIDE
                      ),
                    this.props.$store.tool.displayNewGuidePopup &&
                      _react2.default.createElement(_newGuide2.default, {
                        title: wpeg.lang.ADD_GUIDE,
                        onUpdate: this._updateGuideValue,
                        onClose: this._cancelNewGuide,
                        onSave: this._createNewGuide
                      }),
                    this.props.$store.tool.isEditState &&
                      _react2.default.createElement(_stepEditor2.default, {
                        forceHover: this.props.$store.tool.forceHoverData,
                        stickTo: this.props.$store.tool.isSelectedTypeModal
                          ? null
                          : this.props.$store.tool.highlightBounds,
                        onMount: this._inspectViewEdit,
                        onUpdate: this._updateStepValue,
                        onClose: this._cancelAddStep,
                        onSave: this._updateStep,
                        title: wpeg.lang.EDIT_STEP,
                        saveLabel: wpeg.lang.SAVE_CHANGES,
                        fields: this.props.$store.tool.currentStep
                      }),
                    !this.props.$store.tool.isErrorFlow &&
                      this.props.$store.tool.isViewState &&
                      _react2.default.createElement(_stepViewer2.default, {
                        forceHover: this.props.$store.tool.forceHoverData,
                        title: this.props.$store.tool.currentStep.title,
                        description: this.props.$store.tool.currentStep
                          .description,
                        onMount: this._inspectViewEdit,
                        stickTo: this.props.$store.tool.isSelectedTypeModal
                          ? null
                          : this.props.$store.tool.highlightBounds,
                        onClose: this._cancelAddStep
                      }),
                    this.props.$store.tool.isErrorFlow &&
                      _react2.default.createElement(
                        _errors2.default,
                        { onClose: this._cancelAddStep },
                        _react2.default.createElement(
                          'strong',
                          null,
                          wpeg.lang.ERROR_FLOW
                        ),
                        _react2.default.createElement('br', null),
                        _react2.default.createElement(
                          'p',
                          null,
                          wpeg.lang.EXPECTED_URL,
                          ':',
                          _react2.default.createElement('br', null),
                          _react2.default.createElement(
                            'code',
                            null,
                            this.props.$store.tool.currentStep.uri
                          )
                        ),
                        _react2.default.createElement(
                          'p',
                          null,
                          wpeg.lang.CURRENT_URL,
                          ':',
                          _react2.default.createElement('br', null),
                          _react2.default.createElement(
                            'code',
                            null,
                            window.location.href
                          )
                        ),
                        _react2.default.createElement(
                          'p',
                          null,
                          wpeg.lang.ACTION,
                          ':',
                          _react2.default.createElement('br', null),
                          _react2.default.createElement(
                            'a',
                            { href: this.props.$store.tool.currentStep.uri },
                            wpeg.lang.REDIRECT_ORIGINAL_URL
                          )
                        )
                      ),
                    !this.props.$store.tool.isErrorFlow &&
                      this.props.$store.tool.isErrorElementNotFound &&
                      _react2.default.createElement(
                        _errors2.default,
                        { onClose: this._cancelAddStep },
                        _react2.default.createElement(
                          'strong',
                          null,
                          wpeg.lang.ERROR_FLOW
                        ),
                        _react2.default.createElement('br', null),
                        _react2.default.createElement(
                          'p',
                          null,
                          wpeg.lang.ERROR_ELEMENT_NOT_FOUND
                        )
                      ),
                    this.props.$store.tool.displayDeletePopup &&
                      _react2.default.createElement(
                        _delete2.default,
                        {
                          confirmLabel: 'Delete step',
                          onConfirm: this._deleteStep,
                          onCancel: this._cancelDeleteStep
                        },
                        'Delete "',
                        _react2.default.createElement(
                          'strong',
                          null,
                          this.props.$store.tool.deleteItem.title
                        ),
                        '" step.',
                        _react2.default.createElement('br', null),
                        wpeg.lang.ACTION_NOT_CANCELABLE
                      ),
                    this.props.$store.tool.displayStepSelector &&
                      _react2.default.createElement(_stepSelector2.default, {
                        onClick: function onClick() {
                          return _this3.onSelectorClick(
                            stores.selectorTypes.CLICK
                          );
                        },
                        onTooltipClick: function onTooltipClick() {
                          return _this3.onSelectorClick(
                            stores.selectorTypes.TOOLTIP
                          );
                        },
                        onInputClick: function onInputClick() {
                          return _this3.onSelectorClick(
                            stores.selectorTypes.INPUT
                          );
                        },
                        onModalClick: function onModalClick() {
                          return _this3.onSelectorClick(
                            stores.selectorTypes.MODAL
                          );
                        }
                      }),
                    _react2.default.createElement(
                      Wrapper,
                      { hightlight: this.props.$store.tool.highlightMode },
                      _react2.default.createElement(
                        BottomBar,
                        {
                          active:
                            this.props.$store.tool.displayBottomBar &&
                            this.props.$store.tool.currentGuide,
                          bouncing: this.props.$store.tool.isBouncingBottomBar
                        },
                        this.props.$store.tool.currentGuide &&
                          _react2.default.createElement(
                            react.Fragment,
                            null,
                            _react2.default.createElement(
                              Status,
                              { label: wpeg.lang.CURRENT_GUIDE },
                              this.props.$store.tool.currentGuide.title
                            ),
                            _react2.default.createElement(
                              ButtonWrapper,
                              null,
                              this.props.$store.tool.highlightMode &&
                                _react2.default.createElement(
                                  ButtonOverlay,
                                  null
                                ),
                              _react2.default.createElement(
                                PinStepButton,
                                {
                                  className: 'button button-primary',
                                  toggle: this.props.$store.tool.displayMsgBtn,
                                  onClick: this._showStepSelector
                                },
                                wpeg.lang.ADD_STEP
                              ),
                              _react2.default.createElement(
                                StepList,
                                null,
                                this.props.$store.tool.displayList &&
                                  _react2.default.createElement(
                                    StepListWrapper,
                                    null,
                                    _react2.default.createElement(
                                      StepListTitle,
                                      null,
                                      this.props.$store.tool.currentGuide.steps
                                        .length,
                                      ' ',
                                      wpeg.lang.STEPS,
                                      ' ',
                                      _react2.default.createElement(
                                        _close2.default,
                                        { onClick: this._toggleList }
                                      )
                                    ),
                                    _react2.default.createElement(
                                      StepListContainer,
                                      null,
                                      _react2.default.createElement(
                                        _emptyWrapper2.default,
                                        {
                                          list: this.props.$store.tool
                                            .currentGuide.steps,
                                          className: 'no-padding',
                                          message: wpeg.lang.NO_STEP_BAR
                                        },
                                        this.props.$store.tool.currentGuide.steps.map(
                                          function(item, key) {
                                            return _react2.default.createElement(
                                              StepListContent,
                                              {
                                                key: key,
                                                onClick: function onClick(
                                                  event
                                                ) {
                                                  return (
                                                    event.target ===
                                                      event.currentTarget &&
                                                    _this3._viewStep(item)
                                                  );
                                                }
                                              },
                                              _react2.default.createElement(
                                                StepListItem,
                                                null,
                                                _react2.default.createElement(
                                                  StepListItemTitle,
                                                  null,
                                                  item.title
                                                ),
                                                _react2.default.createElement(
                                                  StepListItemDesc,
                                                  null,
                                                  (0,
                                                  _stringStripHtml2.default)(
                                                    item.description
                                                  )
                                                )
                                              ),
                                              _react2.default.createElement(
                                                StepListTool,
                                                null,
                                                _react2.default.createElement(
                                                  _pencil2.default,
                                                  {
                                                    className: 'edit',
                                                    title: wpeg.lang.EDIT_STEP,
                                                    onClick: function onClick() {
                                                      return _this3._editStep(
                                                        item
                                                      );
                                                    }
                                                  }
                                                ),
                                                item.type !==
                                                  stores.selectorTypes.MODAL &&
                                                  _react2.default.createElement(
                                                    _target2.default,
                                                    {
                                                      className: 'target',
                                                      title:
                                                        wpeg.lang
                                                          .RESELECT_ELEMENT,
                                                      onClick: function onClick(
                                                        event
                                                      ) {
                                                        return _this3._reselectElement(
                                                          item,
                                                          event
                                                        );
                                                      }
                                                    }
                                                  ),
                                                _react2.default.createElement(
                                                  _trash2.default,
                                                  {
                                                    className: 'delete',
                                                    title:
                                                      wpeg.lang.DELETE_STEP,
                                                    onClick: function onClick() {
                                                      return _this3._confirmDelete(
                                                        item
                                                      );
                                                    }
                                                  }
                                                )
                                              )
                                            );
                                          }
                                        )
                                      )
                                    )
                                  ),
                                _react2.default.createElement(
                                  StepListButton,
                                  { onClick: this._toggleList },
                                  _react2.default.createElement(
                                    _list2.default,
                                    null
                                  ),
                                  _react2.default.createElement(
                                    StepListCount,
                                    null,
                                    this.props.$store.tool.currentGuide.steps
                                      .length,
                                    ' ',
                                    wpeg.lang.STEP_LISTS
                                  ),
                                  this.props.$store.tool.listNotification &&
                                    _react2.default.createElement(
                                      _ripple2.default,
                                      { top: '10%', left: '90%' }
                                    )
                                )
                              ),
                              _react2.default.createElement(
                                FinishButton,
                                { onClick: this._finish },
                                _react2.default.createElement(
                                  _check2.default,
                                  null
                                )
                              )
                            )
                          )
                      )
                    )
                  );
                }
              }
            ]);

            return Tool;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = Tool;
  });

  unwrapExports(tool$2);

  var guidePicker = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  font-size: 16px;\n  font-weight: 600;\n  color: var(--gray3);\n  margin: 0 0 5px;\n'
        ],
        [
          '\n  font-size: 16px;\n  font-weight: 600;\n  color: var(--gray3);\n  margin: 0 0 5px;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        ['\n  font-size: 14px;\n'],
        ['\n  font-size: 14px;\n']
      ),
      _templateObject3 = _taggedTemplateLiteral(
        [
          '\n  background: var(--white);\n  border: 1px solid var(--gray);\n  width: 400px;\n  height: 350px;\n  position: relative;\n  margin-top: 25px;\n  overflow: hidden;\n  margin-bottom: 24px !important;\n'
        ],
        [
          '\n  background: var(--white);\n  border: 1px solid var(--gray);\n  width: 400px;\n  height: 350px;\n  position: relative;\n  margin-top: 25px;\n  overflow: hidden;\n  margin-bottom: 24px !important;\n'
        ]
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  padding: 16px 24px;\n  background: var(--graylight3);\n'
        ],
        [
          '\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  padding: 16px 24px;\n  background: var(--graylight3);\n'
        ]
      ),
      _templateObject5 = _taggedTemplateLiteral(
        [
          '\n  margin-top: 50px;\n  padding: 16px 24px;\n  display: flex;\n  flex-direction: column;\n  height: 75%;\n\n  label {\n    margin-bottom: 16px;\n    color: var(--gray3);\n  }\n'
        ],
        [
          '\n  margin-top: 50px;\n  padding: 16px 24px;\n  display: flex;\n  flex-direction: column;\n  height: 75%;\n\n  label {\n    margin-bottom: 16px;\n    color: var(--gray3);\n  }\n'
        ]
      ),
      _templateObject6 = _taggedTemplateLiteral(
        [
          "\n  color: var(--graylight2);\n  &:after {\n    margin-left: 16px;\n    font-size: 16px;\n    content: '",
          "'\n  }\n"
        ],
        [
          "\n  color: var(--graylight2);\n  &:after {\n    margin-left: 16px;\n    font-size: 16px;\n    content: '",
          "'\n  }\n"
        ]
      ),
      _templateObject7 = _taggedTemplateLiteral([''], ['']),
      _templateObject8 = _taggedTemplateLiteral(
        [
          '\n  margin-bottom: 16px;\n  font-size: 16px;\n  outline: none;\n  border: 1px solid var(--gray);\n  padding: 8px;\n  width: 100%;\n  color: var(--gray2);\n  background: rgba(0,0,0,0);\n\n  &::placeholder {\n    color: var(--gray);\n  }\n'
        ],
        [
          '\n  margin-bottom: 16px;\n  font-size: 16px;\n  outline: none;\n  border: 1px solid var(--gray);\n  padding: 8px;\n  width: 100%;\n  color: var(--gray2);\n  background: rgba(0,0,0,0);\n\n  &::placeholder {\n    color: var(--gray);\n  }\n'
        ]
      ),
      _templateObject9 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  flex-direction: column;\n  overflow: scroll;\n'
        ],
        ['\n  display: flex;\n  flex-direction: column;\n  overflow: scroll;\n']
      ),
      _templateObject10 = _taggedTemplateLiteral(
        [
          '\n  width: 150px;\n  margin-bottom: 82px !important;\n  margin: 0 4px 0 0 !important;\n'
        ],
        [
          '\n  width: 150px;\n  margin-bottom: 82px !important;\n  margin: 0 4px 0 0 !important;\n'
        ]
      ),
      _templateObject11 = _taggedTemplateLiteral(
        ['\n  display: flex;\n  align-items: center;\n'],
        ['\n  display: flex;\n  align-items: center;\n']
      ),
      _templateObject12 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  justify-content: space-between;\n  width: 400px;\n'
        ],
        [
          '\n  display: flex;\n  justify-content: space-between;\n  width: 400px;\n'
        ]
      ),
      _templateObject13 = _taggedTemplateLiteral(
        ['\n  color: ', ';\n'],
        ['\n  color: ', ';\n']
      ),
      _templateObject14 = _taggedTemplateLiteral(
        ['\n  margin-left: 4px;\n  text-decoration: underline;\n'],
        ['\n  margin-left: 4px;\n  text-decoration: underline;\n']
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _fuse2 = _interopRequireDefault(fuse);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg */

    var Title = _styledComponents2.default.h2(_templateObject);

    var Desc = _styledComponents2.default.p(_templateObject2);

    var Box = _styledComponents2.default.div(_templateObject3);

    var BoxHeader = _styledComponents2.default.div(_templateObject4);

    var BoxContainer = _styledComponents2.default.div(_templateObject5);

    var Label = _styledComponents2.default.label(_templateObject6, function(
      props
    ) {
      return props.text;
    });

    var Checker = _styledComponents2.default.input.attrs({
      type: 'checkbox'
    })(_templateObject7);

    var SearchBox = _styledComponents2.default.input.attrs({
      type: 'search'
    })(_templateObject8);

    var List = _styledComponents2.default.div(_templateObject9);

    var Button = _styledComponents2.default.button.attrs({
      className: 'button button-primary'
    })(_templateObject10);
    var ButtonWrapper = _styledComponents2.default.div(_templateObject11);

    var ActionableWrapper = _styledComponents2.default.div(_templateObject12);

    var Message = _styledComponents2.default.div(_templateObject13, function(
      props
    ) {
      return props.success ? 'green' : 'red';
    });

    var CancelButton = _styledComponents2.default.a.attrs({
      href: ''
    })(_templateObject14);

    var GuidePicker = (function(_Component) {
      _inherits(GuidePicker, _Component);

      function GuidePicker(props) {
        var _this2 = this;

        _classCallCheck(this, GuidePicker);

        var _this = _possibleConstructorReturn(
          this,
          (GuidePicker.__proto__ || Object.getPrototypeOf(GuidePicker)).call(
            this,
            props
          )
        );

        _this.state = {
          selected: {},
          search: '',
          hasChecked: false,
          allChecked: false,
          loading: false,
          success: false,
          message: null
        };

        _this._checkAll = function(event) {
          var state = Object.assign({}, _this.state);

          for (var key in state.selected) {
            if (state.selected[key]) {
              state.selected[key].checked = event.target.checked;
            }
          }

          state.hasChecked = event.target.checked;
          state.allChecked = event.target.checked;
          _this.setState(_extends({}, state));
        };

        _this._check = function(event, key) {
          var state = Object.assign({}, _this.state);
          state.selected[key].checked = event.target.checked;

          var hasChecked = false;
          var checkedTotal = 0;
          for (var _key in state.selected) {
            if (state.selected[_key].checked) {
              hasChecked = true;
              checkedTotal++;
            }
          }

          state.allChecked =
            checkedTotal === Object.keys(state.selected).length;
          state.hasChecked = hasChecked;
          _this.setState(_extends({}, state));
        };

        _this._searchResult = function() {
          var fuzzy = new _fuse2.default(_this.props.list, {
            minMatchCharLength: 1,
            threshold: 0.4,
            shouldSort: true,
            keys: ['title', 'description']
          });
          return fuzzy.search(_this.state.search);
        };

        _this._searching = (function() {
          var _ref = _asyncToGenerator(
            /*#__PURE__*/ regeneratorRuntime.mark(function _callee(event) {
              var state;
              return regeneratorRuntime.wrap(
                function _callee$(_context) {
                  while (1) {
                    switch ((_context.prev = _context.next)) {
                      case 0:
                        event.preventDefault();
                        state = Object.assign({}, _this.state);

                        state.search = _this.searchInput.value;

                        _this.setState(_extends({}, state));

                      case 4:
                      case 'end':
                        return _context.stop();
                    }
                  }
                },
                _callee,
                _this2
              );
            })
          );

          return function(_x) {
            return _ref.apply(this, arguments);
          };
        })();

        _this._onClick = _asyncToGenerator(
          /*#__PURE__*/ regeneratorRuntime.mark(function _callee2() {
            var state, key;
            return regeneratorRuntime.wrap(
              function _callee2$(_context2) {
                while (1) {
                  switch ((_context2.prev = _context2.next)) {
                    case 0:
                      state = Object.assign({}, _this.state);

                      state.loading = true;
                      _this.setState(_extends({}, state));

                      if (!_this.props.onClick) {
                        _context2.next = 10;
                        break;
                      }

                      if (!_this.props.await) {
                        _context2.next = 9;
                        break;
                      }

                      _context2.next = 7;
                      return _this.props.onClick();

                    case 7:
                      _context2.next = 10;
                      break;

                    case 9:
                      _this.props.onClick();

                    case 10:
                      state.loading = false;
                      state.hasChecked = false;
                      state.allChecked = false;

                      for (key in state.selected) {
                        state.selected[key].checked = false;
                      }

                      _this.setState(_extends({}, state));

                    case 15:
                    case 'end':
                      return _context2.stop();
                  }
                }
              },
              _callee2,
              _this2
            );
          })
        );

        _this._cancelSelect = function(e) {
          e.preventDefault();
          _this.props.onCancel && _this.props.onCancel();
        };

        _this.searchInput = _react2.default.createRef();
        return _this;
      }

      _createClass(GuidePicker, [
        {
          key: 'componentDidMount',
          value: function componentDidMount() {
            var state = Object.assign({}, this.state);
            if (this.props.list.length > 0) {
              this.props.list.forEach(function(item) {
                state.selected[item.ID] = {
                  checked: false,
                  ID: item.ID.toString()
                };
              });
            }

            this.setState(_extends({}, state));
          }
        },
        {
          key: 'UNSAFE_componentWillReceiveProps',
          value: (function() {
            var _ref3 = _asyncToGenerator(
              /*#__PURE__*/ regeneratorRuntime.mark(function _callee3(props) {
                var state;
                return regeneratorRuntime.wrap(
                  function _callee3$(_context3) {
                    while (1) {
                      switch ((_context3.prev = _context3.next)) {
                        case 0:
                          state = Object.assign({}, this.state);

                          if (props.list) {
                            props.list.forEach(function(item) {
                              state.selected[item.ID] = {
                                checked: false,
                                ID: item.ID.toString()
                              };
                            });
                          }

                          if (props.message) {
                            state.message = props.message;
                          }

                          if (props.success) {
                            state.success = props.success;
                          }

                          this.setState(_extends({}, state));

                        case 5:
                        case 'end':
                          return _context3.stop();
                      }
                    }
                  },
                  _callee3,
                  this
                );
              })
            );

            function UNSAFE_componentWillReceiveProps(_x2) {
              return _ref3.apply(this, arguments);
            }

            return UNSAFE_componentWillReceiveProps;
          })()
        },
        {
          key: 'render',
          value: function render() {
            var _this3 = this;

            var list = this.props.list;

            if (this.state.search.length > 0) {
              list = this._searchResult();
            }

            return _react2.default.createElement(
              react.Fragment,
              null,
              _react2.default.createElement(Title, null, this.props.title),
              _react2.default.createElement(
                Desc,
                { className: 'description' },
                this.props.desc
              ),
              _react2.default.createElement(
                Box,
                null,
                _react2.default.createElement(
                  BoxHeader,
                  null,
                  _react2.default.createElement(
                    Label,
                    { text: wpeg.lang.CHECK_ALL_GUIDE },
                    _react2.default.createElement(Checker, {
                      onChange: this._checkAll,
                      checked: this.state.allChecked
                    })
                  )
                ),
                _react2.default.createElement(
                  BoxContainer,
                  null,
                  _react2.default.createElement(SearchBox, {
                    innerRef: function innerRef(component) {
                      return (_this3.searchInput = component);
                    },
                    onChange: this._searching,
                    placeholder: wpeg.lang.SEARCH_GUIDES
                  }),
                  _react2.default.createElement(
                    List,
                    null,
                    list.map(function(item, key) {
                      return _react2.default.createElement(
                        Label,
                        { text: item.title, key: key },
                        _this3.state.selected[item.ID] &&
                          _react2.default.createElement(Checker, {
                            checked: _this3.state.selected[item.ID].checked,
                            onChange: function onChange(e) {
                              return _this3._check(e, item.ID);
                            }
                          })
                      );
                    })
                  )
                )
              ),
              _react2.default.createElement(
                ActionableWrapper,
                null,
                _react2.default.createElement(
                  ButtonWrapper,
                  null,
                  _react2.default.createElement(
                    Button,
                    {
                      onClick: this._onClick,
                      disabled: this.state.loading || !this.state.hasChecked
                    },
                    this.state.loading
                      ? this.props.buttonTitleProgress
                      : this.props.buttonTitle
                  ),
                  this.props.cancel &&
                    _react2.default.createElement(
                      react.Fragment,
                      null,
                      wpeg.lang.OR,
                      ' ',
                      _react2.default.createElement(
                        CancelButton,
                        { onClick: this._cancelSelect },
                        wpeg.lang.CANCEL
                      )
                    )
                ),
                this.state.message &&
                  _react2.default.createElement(
                    Message,
                    { success: this.state.success },
                    this.state.message
                  )
              )
            );
          }
        }
      ]);

      return GuidePicker;
    })(react.Component);

    exports.default = GuidePicker;
  });

  unwrapExports(guidePicker);

  var _export = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class; /* global wpeg, Blob */

    var _react2 = _interopRequireDefault(react);

    var _guidePicker2 = _interopRequireDefault(guidePicker);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    var ExportPage = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(ExportPage, _Component);

            function ExportPage(props) {
              var _this2 = this;

              _classCallCheck(this, ExportPage);

              var _this = _possibleConstructorReturn(
                this,
                (
                  ExportPage.__proto__ || Object.getPrototypeOf(ExportPage)
                ).call(this, props)
              );

              _this._export = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee2() {
                  var selectedIndex, key;
                  return regeneratorRuntime.wrap(
                    function _callee2$(_context2) {
                      while (1) {
                        switch ((_context2.prev = _context2.next)) {
                          case 0:
                            selectedIndex = [];

                            for (key in _this.guidePicker.state.selected) {
                              if (
                                _this.guidePicker.state.selected[key] &&
                                _this.guidePicker.state.selected[key].checked
                              ) {
                                selectedIndex.push(
                                  _this.guidePicker.state.selected[key].ID
                                );
                              }
                            }

                            return _context2.abrupt(
                              'return',
                              Promise.all(
                                selectedIndex.map(function(item) {
                                  return new Promise(
                                    (function() {
                                      var _ref2 = _asyncToGenerator(
                                        /*#__PURE__*/ regeneratorRuntime.mark(
                                          function _callee(resolve, reject) {
                                            var guide;
                                            return regeneratorRuntime.wrap(
                                              function _callee$(_context) {
                                                while (1) {
                                                  switch (
                                                    (_context.prev =
                                                      _context.next)
                                                  ) {
                                                    case 0:
                                                      _context.prev = 0;
                                                      _context.next = 3;
                                                      return _this.props.$store.dashboard.get(
                                                        item
                                                      );

                                                    case 3:
                                                      guide = _context.sent;

                                                      guide.siteOrigin =
                                                        wpeg.siteUrl;
                                                      resolve(guide);
                                                      _context.next = 11;
                                                      break;

                                                    case 8:
                                                      _context.prev = 8;
                                                      _context.t0 = _context[
                                                        'catch'
                                                      ](0);

                                                      reject(_context.t0);

                                                    case 11:
                                                    case 'end':
                                                      return _context.stop();
                                                  }
                                                }
                                              },
                                              _callee,
                                              _this2,
                                              [[0, 8]]
                                            );
                                          }
                                        )
                                      );

                                      return function(_x, _x2) {
                                        return _ref2.apply(this, arguments);
                                      };
                                    })()
                                  );
                                })
                              ).then(function(data) {
                                if (data.length === 1) {
                                  data = data[0];
                                }
                                var exportData = JSON.stringify(data, null, 2);
                                (0,
                                fileSaver.saveAs)(new Blob([exportData]), 'exported-' + Date.now() + '.wpeg');
                              })
                            );

                          case 3:
                          case 'end':
                            return _context2.stop();
                        }
                      }
                    },
                    _callee2,
                    _this2
                  );
                })
              );

              _this.guidePicker = _react2.default.createRef();
              return _this;
            }

            _createClass(ExportPage, [
              {
                key: 'componentDidMount',
                value: (function() {
                  var _ref3 = _asyncToGenerator(
                    /*#__PURE__*/ regeneratorRuntime.mark(function _callee3() {
                      return regeneratorRuntime.wrap(
                        function _callee3$(_context3) {
                          while (1) {
                            switch ((_context3.prev = _context3.next)) {
                              case 0:
                                _context3.next = 2;
                                return this.props.$store.dashboard.getList();

                              case 2:
                              case 'end':
                                return _context3.stop();
                            }
                          }
                        },
                        _callee3,
                        this
                      );
                    })
                  );

                  function componentDidMount() {
                    return _ref3.apply(this, arguments);
                  }

                  return componentDidMount;
                })()
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  return _react2.default.createElement(_guidePicker2.default, {
                    title: wpeg.lang.CHOOSE_GUIDE_EXPORT,
                    desc: wpeg.lang.EXPORTED_FILE_EXT,
                    buttonTitle: wpeg.lang.EXPORT,
                    buttonTitleProgress: wpeg.lang.DOWNLOADING,
                    onClick: this._export,
                    await: true,
                    list: this.props.$store.dashboard.list,
                    ref: function ref(self) {
                      return (_this3.guidePicker = self);
                    }
                  });
                }
              }
            ]);

            return ExportPage;
          })(react.Component))
        ) || _class)
    ) || _class);
    exports.default = ExportPage;
  });

  unwrapExports(_export);

  var _import = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _typeof =
      typeof Symbol === 'function' && typeof Symbol.iterator === 'symbol'
        ? function(obj) {
            return typeof obj;
          }
        : function(obj) {
            return obj &&
              typeof Symbol === 'function' &&
              obj.constructor === Symbol &&
              obj !== Symbol.prototype
              ? 'symbol'
              : typeof obj;
          };

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _dec, _class, _dec2, _class3;

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  flex-direction: column;\n  justify-content: center;\n  align-items: center;\n  padding: 32px;\n  border: 2px dashed var(--gray) !important;\n  width: 100% !important;\n  height: auto !important;\n  text-align: center;\n  box-sizing: border-box;\n\n  &.dz-drag-hover {\n    background: var(--graylight);\n  }\n'
        ],
        [
          '\n  display: flex;\n  flex-direction: column;\n  justify-content: center;\n  align-items: center;\n  padding: 32px;\n  border: 2px dashed var(--gray) !important;\n  width: 100% !important;\n  height: auto !important;\n  text-align: center;\n  box-sizing: border-box;\n\n  &.dz-drag-hover {\n    background: var(--graylight);\n  }\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  width: 240px;\n  font-size: 16px;\n  font-weight: normal;\n  line-height: 1.2;\n  color: var(--gray2);\n  margin-bottom: 8px;\n'
        ],
        [
          '\n  width: 240px;\n  font-size: 16px;\n  font-weight: normal;\n  line-height: 1.2;\n  color: var(--gray2);\n  margin-bottom: 8px;\n'
        ]
      ),
      _templateObject3 = _taggedTemplateLiteral(
        ['\n  margin-top: 8px !important;\n'],
        ['\n  margin-top: 8px !important;\n']
      ),
      _templateObject4 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  justify-content: center;\n  align-items: center;\n'
        ],
        [
          '\n  display: flex;\n  justify-content: center;\n  align-items: center;\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _server2 = _interopRequireDefault(server);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _dropzone2 = _interopRequireDefault(dropzone);

    var _loader2 = _interopRequireDefault(loader);

    var _guidePicker2 = _interopRequireDefault(guidePicker);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _asyncToGenerator(fn) {
      return function() {
        var gen = fn.apply(this, arguments);
        return new Promise(function(resolve, reject) {
          function step(key, arg) {
            try {
              var info = gen[key](arg);
              var value = info.value;
            } catch (error) {
              reject(error);
              return;
            }
            if (info.done) {
              resolve(value);
            } else {
              return Promise.resolve(value).then(
                function(value) {
                  step('next', value);
                },
                function(err) {
                  step('throw', err);
                }
              );
            }
          }
          return step('next');
        });
      };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    } /* global wpeg, FileReader */

    var Uploader = _styledComponents2.default.div(_templateObject);

    var ImportLabel = _styledComponents2.default.div(_templateObject2);

    var Button = _styledComponents2.default.button(_templateObject3);

    var LoadingWrapper = _styledComponents2.default.div(_templateObject4);

    var BoxUploader = ((_dec = (0, mobxReact.inject)('$store')),
    _dec(
      (_class =
        (0, mobxReact.observer)(
          (_class = (function(_Component) {
            _inherits(BoxUploader, _Component);

            function BoxUploader(props) {
              _classCallCheck(this, BoxUploader);

              var _this = _possibleConstructorReturn(
                this,
                (
                  BoxUploader.__proto__ || Object.getPrototypeOf(BoxUploader)
                ).call(this, props)
              );

              _this.state = {
                loading: false
              };

              _this._openUploader = function() {
                _this.dropzoneEl.click();
              };

              _this.dropzoneEl = _react2.default.createRef();
              _this.dropzone = null;
              return _this;
            }

            _createClass(BoxUploader, [
              {
                key: 'componentDidMount',
                value: function componentDidMount() {
                  var _this2 = this;

                  var dropzone$$1 = new _dropzone2.default(this.dropzoneEl, {
                    url: 'no-url',
                    autoProcessQueue: false,
                    acceptedFiles: '.wpeg',
                    previewTemplate: _server2.default.renderToString(
                      _react2.default.createElement('div', null)
                    )
                  });

                  dropzone$$1.on('addedfile', function() {
                    for (
                      var _len = arguments.length,
                        files = Array(_len),
                        _key = 0;
                      _key < _len;
                      _key++
                    ) {
                      files[_key] = arguments[_key];
                    }

                    files.forEach(function(file) {
                      var reader = new FileReader();
                      var state = Object.assign({}, _this2.state);

                      state.loading = true;
                      _this2.setState(_extends({}, state));

                      reader.onload = function(event) {
                        _this2.props.onUpload &&
                          _this2.props.onUpload(
                            JSON.parse(event.target.result)
                          );
                      };
                      reader.readAsText(file);
                    });
                  });

                  this.dropzone = dropzone$$1;
                }
              },
              {
                key: 'render',
                value: function render() {
                  var _this3 = this;

                  return _react2.default.createElement(
                    Uploader,
                    {
                      innerRef: function innerRef(component) {
                        return (_this3.dropzoneEl = component);
                      }
                    },
                    !this.state.loading
                      ? _react2.default.createElement(
                          react.Fragment,
                          null,
                          _react2.default.createElement(
                            ImportLabel,
                            null,
                            wpeg.lang.IMPORT_FILE_EXT
                          ),
                          _react2.default.createElement(
                            'span',
                            null,
                            wpeg.lang.OR
                          ),
                          _react2.default.createElement(
                            Button,
                            {
                              className: 'button',
                              onClick: this._openUploader
                            },
                            wpeg.lang.SELECT_FILE
                          )
                        )
                      : _react2.default.createElement(
                          LoadingWrapper,
                          null,
                          _react2.default.createElement(_loader2.default, null)
                        )
                  );
                }
              }
            ]);

            return BoxUploader;
          })(react.Component))
        ) || _class)
    ) || _class);
    var ImportPage = ((_dec2 = (0, mobxReact.inject)('$store')),
    _dec2(
      (_class3 =
        (0, mobxReact.observer)(
          (_class3 = (function(_Component2) {
            _inherits(ImportPage, _Component2);

            function ImportPage(props) {
              var _this5 = this;

              _classCallCheck(this, ImportPage);

              var _this4 = _possibleConstructorReturn(
                this,
                (
                  ImportPage.__proto__ || Object.getPrototypeOf(ImportPage)
                ).call(this, props)
              );

              _this4.state = {
                displayUploader: true,
                list: [],
                message: null,
                success: false
              };

              _this4._onUpload = function(data) {
                var state = Object.assign({}, _this4.state);

                if (
                  (typeof data === 'undefined'
                    ? 'undefined'
                    : _typeof(data)) === 'object' &&
                  !Array.isArray(data)
                ) {
                  data = [data];
                }

                setTimeout(function() {
                  state.displayUploader = false;
                  state.list = data;
                  state.loading = false;
                  _this4.setState(_extends({}, state));
                }, 500);
              };

              _this4._import = _asyncToGenerator(
                /*#__PURE__*/ regeneratorRuntime.mark(function _callee() {
                  var state, list, importData, _loop, key, importResult;

                  return regeneratorRuntime.wrap(
                    function _callee$(_context) {
                      while (1) {
                        switch ((_context.prev = _context.next)) {
                          case 0:
                            state = Object.assign({}, _this4.state);
                            list = _this4.guidePicker.state.selected;
                            importData = [];

                            _loop = function _loop(key) {
                              if (list[key].checked) {
                                importData.push(
                                  state.list.find(function(item) {
                                    return item.ID === list[key].ID;
                                  })
                                );
                              }
                            };

                            for (key in list) {
                              _loop(key);
                            }

                            if (!(importData.length > 0)) {
                              _context.next = 11;
                              break;
                            }

                            _context.next = 8;
                            return _this4.props.$store.exportImport.import(
                              importData
                            );

                          case 8:
                            importResult = _context.sent;

                            if (importResult) {
                              state.success =
                                importResult.status &&
                                importResult.status === 200;
                              state.message = importResult.message;
                            }
                            _this4.setState(_extends({}, state));

                          case 11:
                          case 'end':
                            return _context.stop();
                        }
                      }
                    },
                    _callee,
                    _this5
                  );
                })
              );

              _this4._onCancel = function() {
                var state = Object.assign({}, _this4.state);
                state.displayUploader = true;
                _this4.setState(_extends({}, state));
              };

              _this4.guidePicker = _react2.default.createRef();
              return _this4;
            }

            _createClass(ImportPage, [
              {
                key: 'render',
                value: function render() {
                  var _this6 = this;

                  if (!this.state.displayUploader) {
                    return _react2.default.createElement(
                      _guidePicker2.default,
                      {
                        title: wpeg.lang.CHOOSE_GUIDE_IMPORT,
                        desc: wpeg.lang.SELECTED_IMPORTED,
                        buttonTitle: wpeg.lang.IMPORT,
                        buttonTitleProgress: wpeg.lang.IMPORTING,
                        onClick: this._import,
                        list: this.state.list,
                        message: this.state.message,
                        success: this.state.success,
                        cancel: true,
                        onCancel: this._onCancel,
                        ref: function ref(self) {
                          return (_this6.guidePicker = self);
                        }
                      }
                    );
                  }

                  return _react2.default.createElement(BoxUploader, {
                    onUpload: this._onUpload
                  });
                }
              }
            ]);

            return ImportPage;
          })(react.Component))
        ) || _class3)
    ) || _class3);
    exports.default = ImportPage;
  });

  unwrapExports(_import);

  var routers$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });

    var _export2 = _interopRequireDefault(_export);

    var _import2 = _interopRequireDefault(_import);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    exports.default = [
      {
        path: '/',
        exact: true,
        component: _export2.default
      },
      {
        path: '/import',
        exact: true,
        component: _import2.default
      }
    ];
  });

  unwrapExports(routers$2);

  var exportImport$2 = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = undefined;

    var _extends =
      Object.assign ||
      function(target) {
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

    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _templateObject = _taggedTemplateLiteral(
        [
          '\n  background: var(--white);\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  display: flex;\n  flex-direction: column;\n  margin: 25px 0 0;\n  padding: 24px;\n'
        ],
        [
          '\n  background: var(--white);\n  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);\n  display: flex;\n  flex-direction: column;\n  margin: 25px 0 0;\n  padding: 24px;\n'
        ]
      ),
      _templateObject2 = _taggedTemplateLiteral(
        [
          '\n  display: flex;\n  margin-bottom: 32px;\n\n  a {\n    padding: 0 0 10px;\n    color: var(--gray3);\n    margin-right: 32px;\n    font-size: 16px;\n    text-decoration: none;\n    box-shadow: none;\n    outline: none;\n    border-bottom: 3px solid transparent;\n\n    &.active {\n      border-bottom-color: var(--gray3);\n    }\n  }\n'
        ],
        [
          '\n  display: flex;\n  margin-bottom: 32px;\n\n  a {\n    padding: 0 0 10px;\n    color: var(--gray3);\n    margin-right: 32px;\n    font-size: 16px;\n    text-decoration: none;\n    box-shadow: none;\n    outline: none;\n    border-bottom: 3px solid transparent;\n\n    &.active {\n      border-bottom-color: var(--gray3);\n    }\n  }\n'
        ]
      );

    var _react2 = _interopRequireDefault(react);

    var _styledComponents2 = _interopRequireDefault(styledComponents);

    var _routers2 = _interopRequireDefault(routers$2);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    function _taggedTemplateLiteral(strings, raw) {
      return Object.freeze(
        Object.defineProperties(strings, { raw: { value: Object.freeze(raw) } })
      );
    }

    var Wrapper = _styledComponents2.default.div(_templateObject);

    var Tabs = _styledComponents2.default.div(_templateObject2);

    var TabsComponent = (0, reactRouterDom.withRouter)(function(props) {
      var tabs = [
        {
          label: 'Export',
          link: '/'
        },
        {
          label: 'Import',
          link: '/import'
        }
      ];

      return _react2.default.createElement(
        Tabs,
        null,
        tabs.map(function(item, key) {
          var className = props.location.pathname === item.link ? 'active' : '';
          return _react2.default.createElement(
            reactRouterDom.Link,
            { to: item.link, key: key, className: className },
            item.label
          );
        })
      );
    });

    var ExportImport = (function(_Component) {
      _inherits(ExportImport, _Component);

      function ExportImport() {
        _classCallCheck(this, ExportImport);

        return _possibleConstructorReturn(
          this,
          (ExportImport.__proto__ || Object.getPrototypeOf(ExportImport)).apply(
            this,
            arguments
          )
        );
      }

      _createClass(ExportImport, [
        {
          key: 'render',
          value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
              reactRouterDom.HashRouter,
              null,
              _react2.default.createElement(
                Wrapper,
                null,
                _react2.default.createElement(TabsComponent, null),
                _routers2.default.map(function(props, key) {
                  return _react2.default.createElement(
                    reactRouterDom.Route,
                    _extends({ key: key }, props, {
                      ref: function ref(component) {
                        return (_this2.page = component);
                      }
                    })
                  );
                })
              )
            );
          }
        }
      ]);

      return ExportImport;
    })(react.Component);

    exports.default = ExportImport;
  });

  unwrapExports(exportImport$2);

  var registerServiceWorker = createCommonjsModule(function(module, exports) {
    Object.defineProperty(exports, '__esModule', {
      value: true
    });
    exports.default = register;
    exports.unregister = unregister;
    /* eslint-disable no-console */
    // In production, we register a service worker to serve assets from local cache.

    // This lets the app load faster on subsequent visits in production, and gives
    // it offline capabilities. However, it also means that developers (and users)
    // will only see deployed updates on the "N+1" visit to a page, since previously
    // cached resources are updated in the background.

    // To learn more about the benefits of this model, read https://goo.gl/KwvDNy.
    // This link also includes instructions on opting out of this behavior.

    var isLocalhost = Boolean(
      window.location.hostname === 'localhost' ||
        // [::1] is the IPv6 localhost address.
        window.location.hostname === '[::1]' ||
        // 127.0.0.1/8 is considered localhost for IPv4.
        window.location.hostname.match(
          /^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/
        )
    );

    function register() {
      if (
        process.env.NODE_ENV === 'production' &&
        'serviceWorker' in navigator
      ) {
        // The URL constructor is available in all browsers that support SW.
        var publicUrl = new URL(process.env.PUBLIC_URL, window.location);
        if (publicUrl.origin !== window.location.origin) {
          // Our service worker won't work if PUBLIC_URL is on a different origin
          // from what our page is served on. This might happen if a CDN is used to
          // serve assets; see https://github.com/facebookincubator/create-react-app/issues/2374
          return;
        }

        window.addEventListener('load', function() {
          var swUrl = process.env.PUBLIC_URL + '/service-worker.js';

          if (isLocalhost) {
            // This is running on localhost. Lets check if a service worker still exists or not.
            checkValidServiceWorker(swUrl);

            // Add some additional logging to localhost, pointing developers to the
            // service worker/PWA documentation.
            navigator.serviceWorker.ready.then(function() {
              console.log(
                'This web app is being served cache-first by a service ' +
                  'worker. To learn more, visit https://goo.gl/SC7cgQ'
              );
            });
          } else {
            // Is not local host. Just register service worker
            registerValidSW(swUrl);
          }
        });
      }
    }

    function registerValidSW(swUrl) {
      navigator.serviceWorker
        .register(swUrl)
        .then(function(registration) {
          registration.onupdatefound = function() {
            var installingWorker = registration.installing;
            installingWorker.onstatechange = function() {
              if (installingWorker.state === 'installed') {
                if (navigator.serviceWorker.controller) {
                  // At this point, the old content will have been purged and
                  // the fresh content will have been added to the cache.
                  // It's the perfect time to display a "New content is
                  // available; please refresh." message in your web app.
                  console.log('New content is available; please refresh.');
                } else {
                  // At this point, everything has been precached.
                  // It's the perfect time to display a
                  // "Content is cached for offline use." message.
                  console.log('Content is cached for offline use.');
                }
              }
            };
          };
        })
        .catch(function(error) {
          console.error('Error during service worker registration:', error);
        });
    }

    function checkValidServiceWorker(swUrl) {
      // Check if the service worker can be found. If it can't reload the page.
      fetch(swUrl)
        .then(function(response) {
          // Ensure service worker exists, and that we really are getting a JS file.
          if (
            response.status === 404 ||
            response.headers.get('content-type').indexOf('javascript') === -1
          ) {
            // No service worker found. Probably a different app. Reload the page.
            navigator.serviceWorker.ready.then(function(registration) {
              registration.unregister().then(function() {
                window.location.reload();
              });
            });
          } else {
            // Service worker found. Proceed as normal.
            registerValidSW(swUrl);
          }
        })
        .catch(function() {
          console.log(
            'No internet connection found. App is running in offline mode.'
          );
        });
    }

    function unregister() {
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.ready.then(function(registration) {
          registration.unregister();
        });
      }
    }
  });

  unwrapExports(registerServiceWorker);
  var registerServiceWorker_1 = registerServiceWorker.unregister;

  var src = createCommonjsModule(function(module) {
    var _createClass = (function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;
          if ('value' in descriptor) descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }
      return function(Constructor, protoProps, staticProps) {
        if (protoProps) defineProperties(Constructor.prototype, protoProps);
        if (staticProps) defineProperties(Constructor, staticProps);
        return Constructor;
      };
    })();

    var _class;

    var _react2 = _interopRequireDefault(react);

    var _reactDom2 = _interopRequireDefault(reactDom);

    var _stores2 = _interopRequireDefault(stores);

    var _dashboard2 = _interopRequireDefault(dashboard$2);

    var _tool2 = _interopRequireDefault(tool$2);

    var _exportImport2 = _interopRequireDefault(exportImport$2);

    var _registerServiceWorker2 = _interopRequireDefault(registerServiceWorker);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : { default: obj };
    }

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError('Cannot call a class as a function');
      }
    }

    function _possibleConstructorReturn(self, call) {
      if (!self) {
        throw new ReferenceError(
          "this hasn't been initialised - super() hasn't been called"
        );
      }
      return call && (typeof call === 'object' || typeof call === 'function')
        ? call
        : self;
    }

    function _inherits(subClass, superClass) {
      if (typeof superClass !== 'function' && superClass !== null) {
        throw new TypeError(
          'Super expression must either be null or a function, not ' +
            typeof superClass
        );
      }
      subClass.prototype = Object.create(superClass && superClass.prototype, {
        constructor: {
          value: subClass,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
      if (superClass)
        Object.setPrototypeOf
          ? Object.setPrototypeOf(subClass, superClass)
          : (subClass.__proto__ = superClass);
    }

    var dashboardElement = document.querySelector('#wpeg-dashboard');
    var toolElement = document.querySelector('#wpeg-tool');
    var exportImportElement = document.querySelector('#wpeg-export-import');

    var App =
      (0, mobxReact.observer)(
        (_class = (function(_Component) {
          _inherits(App, _Component);

          function App(props) {
            _classCallCheck(this, App);

            var _this = _possibleConstructorReturn(
              this,
              (App.__proto__ || Object.getPrototypeOf(App)).call(this, props)
            );

            _this.dashboard = dashboardElement;
            _this.tool = toolElement;
            _this.exportImport = exportImportElement;
            _this.store = (0, _stores2.default)();
            return _this;
          }

          _createClass(App, [
            {
              key: 'render',
              value: function render() {
                return _react2.default.createElement(
                  mobxReact.Provider,
                  { $store: this.store },
                  _react2.default.createElement(
                    react.Fragment,
                    null,
                    this.dashboard &&
                      _react2.default.createElement(
                        react.Fragment,
                        null,
                        _react2.default.createElement(_dashboard2.default, null)
                      ),
                    this.exportImport &&
                      _react2.default.createElement(
                        react.Fragment,
                        null,
                        _react2.default.createElement(
                          _exportImport2.default,
                          null
                        )
                      ),
                    this.tool &&
                      _react2.default.createElement(_tool2.default, null)
                  )
                );
              }
            }
          ]);

          return App;
        })(react.Component))
      ) || _class;

    window.onload = function() {
      if (dashboardElement || exportImportElement || toolElement) {
        _reactDom2.default.render(
          _react2.default.createElement(App, null),
          dashboardElement || exportImportElement || toolElement
        );
        (0, _registerServiceWorker2.default)();
      }
    };
  });

  var index$5 = unwrapExports(src);
  var src_1 = src.__moduleExports;

  exports.default = index$5;
  exports.__moduleExports = src_1;

  return exports;
})(
  {},
  store,
  mobx,
  reactBeautifulDnd,
  reactClickOutside,
  stringStripHtml,
  reactHotKeys,
  reactRouterDom,
  fuse,
  fileSaver,
  react,
  styledComponents,
  mobxReact,
  server,
  dropzone,
  reactDom
);
