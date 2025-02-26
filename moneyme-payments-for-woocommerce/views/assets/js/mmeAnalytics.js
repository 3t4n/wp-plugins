(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = exports.IterativelyPlugin = void 0;
  
  var _uuid = require("uuid");
  
  var _sdk = require("@itly/sdk");
  
  var __extends = void 0 && (void 0).__extends || function () {
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
  
    return function (d, b) {
      extendStatics(d, b);
  
      function __() {
        this.constructor = d;
      }
  
      d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
  }();
  
  var __assign = void 0 && (void 0).__assign || function () {
    __assign = Object.assign || function (t) {
      for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
  
        for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
      }
  
      return t;
    };
  
    return __assign.apply(this, arguments);
  };
  
  var __awaiter = void 0 && (void 0).__awaiter || function (thisArg, _arguments, P, generator) {
    function adopt(value) {
      return value instanceof P ? value : new P(function (resolve) {
        resolve(value);
      });
    }
  
    return new (P || (P = Promise))(function (resolve, reject) {
      function fulfilled(value) {
        try {
          step(generator.next(value));
        } catch (e) {
          reject(e);
        }
      }
  
      function rejected(value) {
        try {
          step(generator["throw"](value));
        } catch (e) {
          reject(e);
        }
      }
  
      function step(result) {
        result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected);
      }
  
      step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
  };
  
  var __generator = void 0 && (void 0).__generator || function (thisArg, body) {
    var _ = {
      label: 0,
      sent: function () {
        if (t[0] & 1) throw t[1];
        return t[1];
      },
      trys: [],
      ops: []
    },
        f,
        y,
        t,
        g;
    return g = {
      next: verb(0),
      "throw": verb(1),
      "return": verb(2)
    }, typeof Symbol === "function" && (g[Symbol.iterator] = function () {
      return this;
    }), g;
  
    function verb(n) {
      return function (v) {
        return step([n, v]);
      };
    }
  
    function step(op) {
      if (f) throw new TypeError("Generator is already executing.");
  
      while (_) try {
        if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
        if (y = 0, t) op = [op[0] & 2, t.value];
  
        switch (op[0]) {
          case 0:
          case 1:
            t = op;
            break;
  
          case 4:
            _.label++;
            return {
              value: op[1],
              done: false
            };
  
          case 5:
            _.label++;
            y = op[1];
            op = [0];
            continue;
  
          case 7:
            op = _.ops.pop();
  
            _.trys.pop();
  
            continue;
  
          default:
            if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) {
              _ = 0;
              continue;
            }
  
            if (op[0] === 3 && (!t || op[1] > t[0] && op[1] < t[3])) {
              _.label = op[1];
              break;
            }
  
            if (op[0] === 6 && _.label < t[1]) {
              _.label = t[1];
              t = op;
              break;
            }
  
            if (t && _.label < t[2]) {
              _.label = t[2];
  
              _.ops.push(op);
  
              break;
            }
  
            if (t[2]) _.ops.pop();
  
            _.trys.pop();
  
            continue;
        }
  
        op = body.call(thisArg, _);
      } catch (e) {
        op = [6, e];
        y = 0;
      } finally {
        f = t = 0;
      }
  
      if (op[0] & 5) throw op[1];
      return {
        value: op[0] ? op[1] : void 0,
        done: true
      };
    }
  };
  /* eslint-disable no-unused-vars, class-methods-use-this, no-constant-condition, no-await-in-loop, no-bitwise, no-mixed-operators */
  
  
  var TrackType;
  
  (function (TrackType) {
    TrackType["track"] = "track";
    TrackType["group"] = "group";
    TrackType["identify"] = "identify";
    TrackType["page"] = "page";
  })(TrackType || (TrackType = {}));
  /**
   * Iteratively Browser Plugin for Iteratively SDK
   */
  
  
  var IterativelyPlugin = function (_super) {
    __extends(IterativelyPlugin, _super);
  
    function IterativelyPlugin(apiKey, iterativelyOptions) {
      var _this = _super.call(this, 'iteratively') || this;
  
      _this.apiKey = apiKey;
      _this.buffer = [];
      _this.timer = null;
      _this.config = {
        url: 'https://data.us-east-2.iterative.ly/t',
        omitValues: false,
        batchSize: 100,
        flushAt: 10,
        flushInterval: 1000
      }; // allows consumer to override any config value
  
      _this.config = __assign(__assign({}, _this.config), iterativelyOptions);
      return _this;
    } // overrides Plugin.load
  
  
    IterativelyPlugin.prototype.load = function (options) {
      _super.prototype.load.call(this, options); // adjusts config values in accordance with provided environment value
  
  
      if (this.config.disabled === undefined && (options === null || options === void 0 ? void 0 : options.environment) === 'production') {
        this.config.disabled = true;
      }
    }; // overrides Plugin.postIdentify
  
  
    IterativelyPlugin.prototype.postIdentify = function (userId, properties, validationResponses) {
      this.push(this.toTrackModel(TrackType.identify, undefined, properties, validationResponses));
    }; // overrides Plugin.postGroup
  
  
    IterativelyPlugin.prototype.postGroup = function (userId, groupId, properties, validationResponses) {
      this.push(this.toTrackModel(TrackType.group, undefined, properties, validationResponses));
    }; // overrides Plugin.postPage
  
  
    IterativelyPlugin.prototype.postPage = function (userId, category, name, properties, validationResponses) {
      this.push(this.toTrackModel(TrackType.page, undefined, properties, validationResponses));
    }; // overrides Plugin.postTrack
  
  
    IterativelyPlugin.prototype.postTrack = function (userId, event, validationResponses) {
      this.push(this.toTrackModel(TrackType.track, event, event.properties, validationResponses));
    };
  
    IterativelyPlugin.prototype.toTrackModel = function (type, event, properties, validationResponses) {
      var model = {
        type: type,
        messageId: this.getNewMessageId(),
        dateSent: new Date().toISOString(),
        eventId: event ? event.id : undefined,
        eventSchemaVersion: event ? event.version : undefined,
        eventName: event ? event.name : undefined,
        properties: {},
        valid: true,
        validation: {
          details: ''
        }
      };
  
      if (properties) {
        if (this.config.omitValues) {
          model.properties = Object.keys(properties).reduce(function (o, key) {
            var _a;
  
            return __assign(__assign({}, o), (_a = {}, _a[key] = null, _a));
          }, {});
        } else {
          model.properties = properties;
        }
      }
  
      if (validationResponses) {
        var invalidResult = validationResponses.find(function (vr) {
          return !vr.valid;
        });
        model.valid = !invalidResult;
  
        if (!this.config.omitValues) {
          model.validation.details = (invalidResult === null || invalidResult === void 0 ? void 0 : invalidResult.message) || '';
        }
      }
  
      return model;
    };
  
    IterativelyPlugin.prototype.flush = function () {
      return __awaiter(this, void 0, void 0, function () {
        var objects, responseLogger, response, responseBody, e_1;
        return __generator(this, function (_a) {
          switch (_a.label) {
            case 0:
              if (this.config.disabled) {
                return [2
                /*return*/
                ];
              }
  
              if (this.timer) {
                clearTimeout(this.timer);
              }
  
              _a.label = 1;
  
            case 1:
              if (!(this.buffer.length > 0)) return [3
              /*break*/
              , 9];
              objects = this.buffer.splice(0, this.config.batchSize);
              responseLogger = this.logger.logRequest('flush', objects.length + " objects");
              _a.label = 2;
  
            case 2:
              _a.trys.push([2, 7,, 8]);
  
              return [4
              /*yield*/
              , fetch(this.config.url, {
                method: 'post',
                headers: {
                  authorization: "Bearer " + this.apiKey,
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  trackingPlanVersion: this.config.version,
                  branchName: this.config.branch,
                  objects: objects
                })
              })];
  
            case 3:
              response = _a.sent();
              if (!(response.status < 300)) return [3
              /*break*/
              , 4];
              responseLogger.success("" + response.status);
              return [3
              /*break*/
              , 6];
  
            case 4:
              return [4
              /*yield*/
              , response.text()];
  
            case 5:
              responseBody = _a.sent();
              responseLogger.error("unexpected status: " + response.status + ". " + responseBody);
              _a.label = 6;
  
            case 6:
              return [3
              /*break*/
              , 8];
  
            case 7:
              e_1 = _a.sent();
              responseLogger.error(e_1.toString());
              return [3
              /*break*/
              , 8];
  
            case 8:
              return [3
              /*break*/
              , 1];
  
            case 9:
              this.timer = null;
              return [2
              /*return*/
              ];
          }
        });
      });
    };
  
    IterativelyPlugin.prototype.push = function (model) {
      if (this.config.disabled) {
        return;
      }
  
      this.logger.debug(this.id + ": push(): " + JSON.stringify(model));
      this.buffer.push(model);
  
      if (this.buffer.length >= this.config.flushAt) {
        this.flush();
        return;
      }
  
      if (!this.timer && this.config.flushInterval) {
        this.timer = setTimeout(this.flush.bind(this), this.config.flushInterval);
      }
    };
  
    IterativelyPlugin.prototype.getNewMessageId = function () {
      return (0, _uuid.v4)();
    };
  
    return IterativelyPlugin;
  }(_sdk.RequestLoggerPlugin);
  
  exports.IterativelyPlugin = IterativelyPlugin;
  var _default = IterativelyPlugin;
  exports.default = _default;
  
  },{"@itly/sdk":4,"uuid":17}],2:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = exports.SchemaValidatorPlugin = void 0;
  
  var _jsonschema = require("jsonschema");
  
  var _sdk = require("@itly/sdk");
  
  var __extends = void 0 && (void 0).__extends || function () {
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
  
    return function (d, b) {
      extendStatics(d, b);
  
      function __() {
        this.constructor = d;
      }
  
      d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
  }();
  /* eslint-disable no-unused-vars, class-methods-use-this */
  
  
  var SYSTEM_EVENTS = ['identify', 'context', 'group', 'page'];
  
  function isSystemEvent(name) {
    return SYSTEM_EVENTS.includes(name);
  }
  
  function isEmpty(obj) {
    return obj === undefined || Object.keys(obj).length === 0;
  }
  /**
   * Schema Validator Plugin for Iteratively SDK
   */
  
  
  var SchemaValidatorPlugin = function (_super) {
    __extends(SchemaValidatorPlugin, _super);
  
    function SchemaValidatorPlugin(schemas) {
      var _this = _super.call(this, 'schema-validator') || this;
  
      _this.schemas = schemas;
      return _this;
    } // overrides Plugin.load
  
  
    SchemaValidatorPlugin.prototype.load = function () {
      this.validator = new _jsonschema.Validator();
    }; // overrides Plugin.validate
  
  
    SchemaValidatorPlugin.prototype.validate = function (event) {
      var _a;
  
      var schemaKey = this.getSchemaKey(event);
      var schema = this.schemas[schemaKey]; // Check that we have a schema for this event
  
      if (!schema) {
        if (isSystemEvent(schemaKey)) {
          // pass system events by default
          if (isEmpty(event.properties)) {
            return {
              valid: true,
              pluginId: this.id
            };
          }
  
          return {
            valid: false,
            message: "'" + event.name + "' schema is empty but properties were found. properties=" + JSON.stringify(event.properties),
            pluginId: this.id
          };
        }
  
        return {
          valid: false,
          message: "Event " + event.name + " not found in tracking plan.",
          pluginId: this.id
        };
      }
  
      var result = this.validator.validate((_a = event.properties) !== null && _a !== void 0 ? _a : {}, schema);
  
      if (!result.valid) {
        var errorMessage = result.errors.length > 0 ? result.errors.map(function (e) {
          return "`" + e.property.replace(/\binstance/, 'properties') + "` " + e.message + ".";
        }).join(' ') : 'An unknown error occurred during validation.';
        return {
          valid: false,
          message: "Passed in " + event.name + " properties did not validate against your tracking plan. " + errorMessage,
          pluginId: this.id
        };
      }
  
      return {
        valid: true,
        pluginId: this.id
      };
    };
  
    SchemaValidatorPlugin.prototype.getSchemaKey = function (event) {
      return event.name;
    };
  
    return SchemaValidatorPlugin;
  }(_sdk.Plugin);
  
  exports.SchemaValidatorPlugin = SchemaValidatorPlugin;
  var _default = SchemaValidatorPlugin;
  exports.default = _default;
  
  },{"@itly/sdk":4,"jsonschema":8}],3:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = exports.Itly = exports.Loggers = exports.Plugin = exports.Validation = void 0;
  
  /* eslint-disable no-unused-vars, class-methods-use-this, max-classes-per-file */
  var __assign = void 0 && (void 0).__assign || function () {
    __assign = Object.assign || function (t) {
      for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
  
        for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
      }
  
      return t;
    };
  
    return __assign.apply(this, arguments);
  };
  
  var __awaiter = void 0 && (void 0).__awaiter || function (thisArg, _arguments, P, generator) {
    function adopt(value) {
      return value instanceof P ? value : new P(function (resolve) {
        resolve(value);
      });
    }
  
    return new (P || (P = Promise))(function (resolve, reject) {
      function fulfilled(value) {
        try {
          step(generator.next(value));
        } catch (e) {
          reject(e);
        }
      }
  
      function rejected(value) {
        try {
          step(generator["throw"](value));
        } catch (e) {
          reject(e);
        }
      }
  
      function step(result) {
        result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected);
      }
  
      step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
  };
  
  var __generator = void 0 && (void 0).__generator || function (thisArg, body) {
    var _ = {
      label: 0,
      sent: function () {
        if (t[0] & 1) throw t[1];
        return t[1];
      },
      trys: [],
      ops: []
    },
        f,
        y,
        t,
        g;
    return g = {
      next: verb(0),
      "throw": verb(1),
      "return": verb(2)
    }, typeof Symbol === "function" && (g[Symbol.iterator] = function () {
      return this;
    }), g;
  
    function verb(n) {
      return function (v) {
        return step([n, v]);
      };
    }
  
    function step(op) {
      if (f) throw new TypeError("Generator is already executing.");
  
      while (_) try {
        if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
        if (y = 0, t) op = [op[0] & 2, t.value];
  
        switch (op[0]) {
          case 0:
          case 1:
            t = op;
            break;
  
          case 4:
            _.label++;
            return {
              value: op[1],
              done: false
            };
  
          case 5:
            _.label++;
            y = op[1];
            op = [0];
            continue;
  
          case 7:
            op = _.ops.pop();
  
            _.trys.pop();
  
            continue;
  
          default:
            if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) {
              _ = 0;
              continue;
            }
  
            if (op[0] === 3 && (!t || op[1] > t[0] && op[1] < t[3])) {
              _.label = op[1];
              break;
            }
  
            if (op[0] === 6 && _.label < t[1]) {
              _.label = t[1];
              t = op;
              break;
            }
  
            if (t && _.label < t[2]) {
              _.label = t[2];
  
              _.ops.push(op);
  
              break;
            }
  
            if (t[2]) _.ops.pop();
  
            _.trys.pop();
  
            continue;
        }
  
        op = body.call(thisArg, _);
      } catch (e) {
        op = [6, e];
        y = 0;
      } finally {
        f = t = 0;
      }
  
      if (op[0] & 5) throw op[1];
      return {
        value: op[0] ? op[1] : void 0,
        done: true
      };
    }
  };
  
  var __rest = void 0 && (void 0).__rest || function (s, e) {
    var t = {};
  
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0) t[p] = s[p];
  
    if (s != null && typeof Object.getOwnPropertySymbols === "function") for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
      if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i])) t[p[i]] = s[p[i]];
    }
    return t;
  };
  
  var __spreadArrays = void 0 && (void 0).__spreadArrays || function () {
    for (var s = 0, i = 0, il = arguments.length; i < il; i++) s += arguments[i].length;
  
    for (var r = Array(s), k = 0, i = 0; i < il; i++) for (var a = arguments[i], j = 0, jl = a.length; j < jl; j++, k++) r[k] = a[j];
  
    return r;
  };
  
  var Validation;
  exports.Validation = Validation;
  
  (function (Validation) {
    Validation[Validation["Disabled"] = 0] = "Disabled";
    Validation[Validation["TrackOnInvalid"] = 1] = "TrackOnInvalid";
    Validation[Validation["ErrorOnInvalid"] = 2] = "ErrorOnInvalid";
    Validation[Validation["SkipOnInvalid"] = 3] = "SkipOnInvalid";
  })(Validation || (exports.Validation = Validation = {}));
  
  var Plugin = function () {
    function Plugin(id) {
      this.id = id;
      this.id = id;
    }
  
    Plugin.prototype.load = function (options) {}; // validation methods
  
  
    Plugin.prototype.validate = function (event) {
      return {
        valid: true
      };
    };
  
    Plugin.prototype.alias = function (userId, previousId, options) {};
  
    Plugin.prototype.identify = function (userId, properties, options) {};
  
    Plugin.prototype.postIdentify = function (userId, properties, validationResponses) {};
  
    Plugin.prototype.group = function (userId, groupId, properties, options) {};
  
    Plugin.prototype.postGroup = function (userId, groupId, properties, validationResponses) {};
  
    Plugin.prototype.page = function (userId, category, name, properties, options) {};
  
    Plugin.prototype.postPage = function (userId, category, name, properties, validationResponses) {};
  
    Plugin.prototype.track = function (userId, event, options) {};
  
    Plugin.prototype.postTrack = function (userId, event, validationResponses) {};
  
    Plugin.prototype.reset = function () {};
  
    Plugin.prototype.flush = function () {
      return Promise.resolve();
    };
  
    return Plugin;
  }();
  
  exports.Plugin = Plugin;
  var Loggers = Object.freeze({
    None: {
      debug: function (message) {},
      info: function (message) {},
      warn: function (message) {},
      error: function (message) {}
    },
    Console: {
      // eslint-disable-next-line no-console
      debug: function (message) {
        console.debug(message);
      },
      // eslint-disable-next-line no-console
      info: function (message) {
        console.info(message);
      },
      // eslint-disable-next-line no-console
      warn: function (message) {
        console.warn(message);
      },
      // eslint-disable-next-line no-console
      error: function (message) {
        console.error(message);
      }
    }
  });
  exports.Loggers = Loggers;
  var DEFAULT_DEV_OPTIONS = {
    environment: 'development',
    plugins: [],
    validation: Validation.ErrorOnInvalid,
    disabled: false,
    logger: Loggers.None
  };
  
  var DEFAULT_PROD_OPTIONS = __assign(__assign({}, DEFAULT_DEV_OPTIONS), {
    environment: 'production',
    validation: Validation.TrackOnInvalid
  });
  
  var Itly = function () {
    function Itly() {
      this.options = undefined;
      this.plugins = DEFAULT_DEV_OPTIONS.plugins;
      this.validation = DEFAULT_DEV_OPTIONS.validation;
      this.logger = Loggers.None;
      this.context = undefined;
    }
    /**
     * Initialize the Itly SDK. Call once when your application starts.
     * @param loadOptions Configuration options to initialize the Itly SDK with.
     */
  
  
    Itly.prototype.load = function (loadOptions) {
      var _this = this;
  
      if (loadOptions === void 0) {
        loadOptions = {};
      }
  
      if (this.options) {
        throw new Error('Itly is already initialized.');
      }
  
      var context = loadOptions.context,
          options = __rest(loadOptions, ["context"]);
  
      this.options = __assign(__assign({}, (options === null || options === void 0 ? void 0 : options.environment) === 'production' ? DEFAULT_PROD_OPTIONS : DEFAULT_DEV_OPTIONS), options);
  
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      this.logger = this.options.logger || this.logger;
      this.plugins = this.options.plugins;
      this.validation = this.options.validation;
      this.context = context; // invoke load() on every plugin
  
      this.runOnAllPlugins('load', function (p) {
        return p.load({
          environment: _this.options.environment,
          logger: _this.logger
        });
      });
    };
    /**
     * Alias a user ID to another user ID.
     * @param userId The user's new ID.
     * @param previousId The user's previous ID.
     * @param options Options for this alias call.
     */
  
  
    Itly.prototype.alias = function (userId, previousId, options) {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      this.runOnAllPlugins('alias', function (p) {
        return p.alias(userId, previousId, options === null || options === void 0 ? void 0 : options[p.id]);
      });
    };
    /**
     * Identify a user and set or update that user's properties.
     * @param userId The user's ID.
     * @param identifyProperties The user's properties.
     * @param options Options for this identify call.
     */
  
  
    Itly.prototype.identify = function (userId, identifyProperties, options) {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      var identifyEvent = {
        name: 'identify',
        properties: identifyProperties || {},
        id: 'identify',
        version: '0-0-0'
      };
      this.validateAndRunOnAllPlugins('identify', identifyEvent, function (p, e) {
        return p.identify(userId, identifyProperties, options === null || options === void 0 ? void 0 : options[p.id]);
      }, function (p, e, validationResponses) {
        return p.postIdentify(userId, identifyProperties, validationResponses);
      });
    };
    /**
     * Associate a user with a group and set or update that group's properties.
     * @param userId The user's ID.
     * @param groupId The group's ID.
     * @param groupProperties The group's properties.
     * @param options Options for this group call.
     */
  
  
    Itly.prototype.group = function (userId, groupId, groupProperties, options) {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      var groupEvent = {
        name: 'group',
        properties: groupProperties || {},
        id: 'group',
        version: '0-0-0'
      };
      this.validateAndRunOnAllPlugins('group', groupEvent, function (p, e) {
        return p.group(userId, groupId, groupProperties, options === null || options === void 0 ? void 0 : options[p.id]);
      }, function (p, e, validationResponses) {
        return p.postGroup(userId, groupId, groupProperties, validationResponses);
      });
    };
    /**
     * Track a page view.
     * @param userId The user's ID.
     * @param category The page's category.
     * @param name The page's name.
     * @param pageProperties The page's properties.
     * @param options Options for this page call.
     */
  
  
    Itly.prototype.page = function (userId, category, name, pageProperties, options) {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      var pageEvent = {
        name: 'page',
        properties: pageProperties || {},
        id: 'page',
        version: '0-0-0'
      };
      this.validateAndRunOnAllPlugins('page', pageEvent, function (p, e) {
        return p.page(userId, category, name, pageProperties, options === null || options === void 0 ? void 0 : options[p.id]);
      }, function (p, e, validationResponses) {
        return p.postPage(userId, category, name, pageProperties, validationResponses);
      });
    };
    /**
     * Track any event.
     * @param userId The user's ID.
     * @param event The event.
     * @param event.name The event's name.
     * @param event.properties The event's properties.
     * @param event.id The event's ID.
     * @param event.version The event's version.
     * @param options Options for this track call.
     */
  
  
    Itly.prototype.track = function (userId, event, options) {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      var mergedEvent = this.mergeContext(event, this.context);
      this.validateAndRunOnAllPlugins('track', event, function (p, e) {
        return p.track(userId, mergedEvent, options === null || options === void 0 ? void 0 : options[p.id]);
      }, function (p, e, validationResponses) {
        return p.postTrack(userId, mergedEvent, validationResponses);
      }, this.context);
    };
    /**
     * Reset (e.g. on logout) all analytics state for the current user and group.
     */
  
  
    Itly.prototype.reset = function () {
      if (!this.isInitializedAndEnabled()) {
        return;
      }
  
      this.runOnAllPlugins('reset', function (p) {
        return p.reset();
      });
    };
  
    Itly.prototype.flush = function () {
      return __awaiter(this, void 0, void 0, function () {
        var flushPromises;
  
        var _this = this;
  
        return __generator(this, function (_a) {
          switch (_a.label) {
            case 0:
              if (!this.isInitializedAndEnabled()) {
                return [2
                /*return*/
                ];
              }
  
              flushPromises = this.plugins.map(function (plugin) {
                return __awaiter(_this, void 0, void 0, function () {
                  var e_1;
                  return __generator(this, function (_a) {
                    switch (_a.label) {
                      case 0:
                        _a.trys.push([0, 2,, 3]);
  
                        return [4
                        /*yield*/
                        , plugin.flush()];
  
                      case 1:
                        _a.sent();
  
                        return [3
                        /*break*/
                        , 3];
  
                      case 2:
                        e_1 = _a.sent();
                        this.logger.error("Error in " + plugin.id + ".flush(). " + e_1.message + ".");
                        return [3
                        /*break*/
                        , 3];
  
                      case 3:
                        return [2
                        /*return*/
                        ];
                    }
                  });
                });
              });
              return [4
              /*yield*/
              , Promise.all(flushPromises)];
  
            case 1:
              _a.sent();
  
              return [2
              /*return*/
              ];
          }
        });
      });
    };
  
    Itly.prototype.validate = function (event) {
      var pluginId = 'sdk-core';
      var validationResponses = [];
  
      try {
        validationResponses.push.apply(validationResponses, this.plugins.map(function (p) {
          return __assign(__assign({}, p.validate(event)), {
            pluginId: p.id
          });
        }));
      } catch (e) {
        this.logger.error("Error validating '" + event.name + "'. " + e.message); // catch errors in validate() method
  
        validationResponses.push({
          valid: false,
          pluginId: pluginId,
          message: e.message
        });
      }
  
      return validationResponses;
    };
  
    Itly.prototype.isInitializedAndEnabled = function () {
      if (!this.options) {
        throw new Error('Itly is not yet initialized. Have you called `itly.load()` on app start?');
      }
  
      return !this.options.disabled;
    };
  
    Itly.prototype.validateAndRunOnAllPlugins = function (op, event, method, postMethod, context) {
      var _this = this; // #1 validation phase
  
  
      var shouldRun = true; // invoke validate() on every plugin if required
  
      var validationResponses = [];
  
      if (this.validation !== Validation.Disabled) {
        validationResponses = __spreadArrays(this.validate(event), context ? this.validate(this.getContextEvent(context)) : []);
        shouldRun = this.validation === Validation.TrackOnInvalid || validationResponses.every(function (vr) {
          return vr.valid;
        });
      } // #2 track phase
      // invoke track(), group(), identify(), page() on every plugin if allowed
  
  
      if (shouldRun) {
        this.runOnAllPlugins(op, function (p) {
          if (_this.canRunEventOnPlugin(event, p)) {
            method(p, event);
          }
        });
      } // invoke postTrack(), postGroup(), postIdentify(), postPage() on every plugin
  
  
      this.runOnAllPlugins("post" + this.capitalize(op), function (p) {
        if (_this.canRunEventOnPlugin(event, p)) {
          postMethod(p, event, validationResponses);
        }
      }); // #3 response phase
  
      if (this.validation === Validation.ErrorOnInvalid) {
        var invalidResult = validationResponses.find(function (vr) {
          return !vr.valid;
        });
  
        if (invalidResult) {
          throw new Error("Validation Error: " + invalidResult.message);
        }
      }
    };
  
    Itly.prototype.canRunEventOnPlugin = function (event, plugin) {
      var _a;
  
      return !event.plugins || ((_a = event.plugins[plugin.id]) !== null && _a !== void 0 ? _a : true);
    };
  
    Itly.prototype.mergeContext = function (event, context) {
      return context ? Object.assign(Object.create(Object.getPrototypeOf(event)), event, {
        properties: __assign(__assign({}, context), event.properties)
      }) : event;
    };
  
    Itly.prototype.getContextEvent = function (context) {
      return {
        name: 'context',
        properties: context || {},
        id: 'context',
        version: '0-0-0'
      };
    };
  
    Itly.prototype.runOnAllPlugins = function (op, method) {
      var _this = this;
  
      this.plugins.forEach(function (plugin) {
        try {
          method(plugin);
        } catch (e) {
          _this.logger.error("Error in " + plugin.id + "." + op + "(). " + e.message + ".");
        }
      });
    };
  
    Itly.prototype.capitalize = function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    };
  
    return Itly;
  }();
  
  exports.Itly = Itly;
  var _default = Itly;
  exports.default = _default;
  
  },{}],4:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  Object.defineProperty(exports, "Loggers", {
    enumerable: true,
    get: function () {
      return _base.Loggers;
    }
  });
  Object.defineProperty(exports, "Plugin", {
    enumerable: true,
    get: function () {
      return _base.Plugin;
    }
  });
  Object.defineProperty(exports, "Validation", {
    enumerable: true,
    get: function () {
      return _base.Validation;
    }
  });
  Object.defineProperty(exports, "RequestLoggerPlugin", {
    enumerable: true,
    get: function () {
      return _RequestLogger.RequestLoggerPlugin;
    }
  });
  Object.defineProperty(exports, "RequestLogger", {
    enumerable: true,
    get: function () {
      return _RequestLogger.RequestLogger;
    }
  });
  exports.default = exports.ItlyBrowser = exports.Itly = void 0;
  
  var _base = require("./base");
  
  var _RequestLogger = require("./internal/RequestLogger");
  
  /* eslint-disable no-unused-vars, class-methods-use-this, import/extensions, import/no-unresolved */
  // Itly Browser SDK
  var Itly = function () {
    function Itly() {
      var _this = this;
      /**
       * Initialize the Itly SDK. Call once when your application starts.
       * @param loadOptions Configuration options to initialize the Itly SDK with.
       */
  
  
      this.load = function (loadOptions) {
        if (loadOptions === void 0) {
          loadOptions = {};
        }
  
        return _this.itly.load(loadOptions);
      };
      /**
       * Alias a user ID to another user ID.
       * @param userId The user's new ID.
       * @param previousId The user's previous ID.
       * @param options Options for this alias call.
       */
  
  
      this.alias = function (userId, previousId, options) {
        return _this.itly.alias(userId, previousId, options);
      };
      /**
       * Identify a user and set or update that user's properties.
       * @param userId The user's ID.
       * @param identifyProperties The user's properties.
       * @param options Options for this identify call.
       */
  
  
      this.identify = function (userId, identifyProperties, options) {
        if (userId != null && typeof userId === 'object') {
          // eslint-disable-next-line no-param-reassign
          options = identifyProperties; // eslint-disable-next-line no-param-reassign
  
          identifyProperties = userId; // eslint-disable-next-line no-param-reassign
  
          userId = undefined;
        }
  
        _this.itly.identify(userId, identifyProperties, options);
      };
      /**
       * Associate the current user with a group and set or update that group's properties.
       * @param groupId The group's ID.
       * @param groupProperties The group's properties.
       * @param options Options for this group call.
       */
  
  
      this.group = function (groupId, groupProperties, options) {
        return _this.itly.group(undefined, groupId, groupProperties, options);
      };
      /**
       * Track a page view.
       * @param category The page's category.
       * @param name The page's name.
       * @param pageProperties The page's properties.
       * @param options Options for this page call.
       */
  
  
      this.page = function (category, name, pageProperties, options) {
        return _this.itly.page(undefined, category, name, pageProperties, options);
      };
      /**
       * Track any event.
       * @param event The event.
       * @param event.name The event's name.
       * @param event.properties The event's properties.
       * @param event.id The event's ID.
       * @param event.version The event's version.
       * @param options Options for this track call.
       */
  
  
      this.track = function (event, options) {
        return _this.itly.track(undefined, event, options);
      };
      /**
       * Reset (e.g. on logout) all analytics state for the current user and group.
       */
  
  
      this.reset = function () {
        return _this.itly.reset();
      };
      /**
       * Flush pending events.
       */
  
  
      this.flush = function () {
        return _this.itly.flush();
      };
  
      this.itly = new _base.Itly();
    }
  
    return Itly;
  }();
  
  exports.ItlyBrowser = exports.Itly = Itly;
  var _default = Itly;
  exports.default = _default;
  
  },{"./base":3,"./internal/RequestLogger":5}],5:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.RequestLoggerPlugin = exports.RequestLogger = void 0;
  
  var _base = require("../base");
  
  var __extends = void 0 && (void 0).__extends || function () {
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
  
    return function (d, b) {
      extendStatics(d, b);
  
      function __() {
        this.constructor = d;
      }
  
      d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
  }();
  /* eslint-disable no-unused-vars, max-classes-per-file, import/no-unresolved */
  
  
  var RequestLogger = function () {
    // eslint-disable-next-line no-useless-constructor
    function RequestLogger(plugin, logger) {
      this.plugin = plugin;
      this.logger = logger;
    }
  
    RequestLogger.prototype.logRequest = function (action, requestData) {
      var _a = this,
          logger = _a.logger,
          id = _a.plugin.id;
  
      var requestId = +new Date();
      logger.debug(id + ": " + action + "(request) " + requestId + ": " + (requestData || ''));
      return {
        success: function (data) {
          return logger.debug(id + ": " + action + "(response) " + requestId + ": " + (data || ''));
        },
        error: function (data) {
          return logger.error(id + ": " + action + "(response) " + requestId + ": " + (data || ''));
        }
      };
    };
  
    RequestLogger.prototype.debug = function (message) {
      this.logger.debug(message);
    };
  
    RequestLogger.prototype.error = function (message) {
      this.logger.error(message);
    };
  
    RequestLogger.prototype.info = function (message) {
      this.logger.info(message);
    };
  
    RequestLogger.prototype.warn = function (message) {
      this.logger.warn(message);
    };
  
    return RequestLogger;
  }();
  
  exports.RequestLogger = RequestLogger;
  
  /**
   * Base class for Plugin's that need request/response logging
   */
  var RequestLoggerPlugin = function (_super) {
    __extends(RequestLoggerPlugin, _super);
  
    function RequestLoggerPlugin() {
      return _super !== null && _super.apply(this, arguments) || this;
    }
  
    Object.defineProperty(RequestLoggerPlugin.prototype, "logger", {
      get: function () {
        return this.requestLogger;
      },
      enumerable: false,
      configurable: true
    });
  
    RequestLoggerPlugin.prototype.load = function (options) {
      this.requestLogger = new RequestLogger(this, options.logger);
    };
  
    return RequestLoggerPlugin;
  }(_base.Plugin);
  
  exports.RequestLoggerPlugin = RequestLoggerPlugin;
  
  },{"../base":3}],6:[function(require,module,exports){
  'use strict';
  
  var helpers = require('./helpers');
  
  /** @type ValidatorResult */
  var ValidatorResult = helpers.ValidatorResult;
  /** @type SchemaError */
  var SchemaError = helpers.SchemaError;
  
  var attribute = {};
  
  attribute.ignoreProperties = {
    // informative properties
    'id': true,
    'default': true,
    'description': true,
    'title': true,
    // arguments to other properties
    'additionalItems': true,
    'then': true,
    'else': true,
    // special-handled properties
    '$schema': true,
    '$ref': true,
    'extends': true,
  };
  
  /**
   * @name validators
   */
  var validators = attribute.validators = {};
  
  /**
   * Validates whether the instance if of a certain type
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {ValidatorResult|null}
   */
  validators.type = function validateType (instance, schema, options, ctx) {
    // Ignore undefined instances
    if (instance === undefined) {
      return null;
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    var types = Array.isArray(schema.type) ? schema.type : [schema.type];
    if (!types.some(this.testType.bind(this, instance, schema, options, ctx))) {
      var list = types.map(function (v) {
        if(!v) return;
        var id = v.$id || v.id;
        return id ? ('<' + id + '>') : (v+'');
      });
      result.addError({
        name: 'type',
        argument: list,
        message: "is not of a type(s) " + list,
      });
    }
    return result;
  };
  
  function testSchemaNoThrow(instance, options, ctx, callback, schema){
    var throwError = options.throwError;
    var throwAll = options.throwAll;
    options.throwError = false;
    options.throwAll = false;
    var res = this.validateSchema(instance, schema, options, ctx);
    options.throwError = throwError;
    options.throwAll = throwAll;
  
    if (!res.valid && callback instanceof Function) {
      callback(res);
    }
    return res.valid;
  }
  
  /**
   * Validates whether the instance matches some of the given schemas
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {ValidatorResult|null}
   */
  validators.anyOf = function validateAnyOf (instance, schema, options, ctx) {
    // Ignore undefined instances
    if (instance === undefined) {
      return null;
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    var inner = new ValidatorResult(instance, schema, options, ctx);
    if (!Array.isArray(schema.anyOf)){
      throw new SchemaError("anyOf must be an array");
    }
    if (!schema.anyOf.some(
      testSchemaNoThrow.bind(
        this, instance, options, ctx, function(res){inner.importErrors(res);}
      ))) {
      var list = schema.anyOf.map(function (v, i) {
        var id = v.$id || v.id;
        if(id) return '<' + id + '>';
        return(v.title && JSON.stringify(v.title)) || (v['$ref'] && ('<' + v['$ref'] + '>')) || '[subschema '+i+']';
      });
      if (options.nestedErrors) {
        result.importErrors(inner);
      }
      result.addError({
        name: 'anyOf',
        argument: list,
        message: "is not any of " + list.join(','),
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance matches every given schema
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null}
   */
  validators.allOf = function validateAllOf (instance, schema, options, ctx) {
    // Ignore undefined instances
    if (instance === undefined) {
      return null;
    }
    if (!Array.isArray(schema.allOf)){
      throw new SchemaError("allOf must be an array");
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    var self = this;
    schema.allOf.forEach(function(v, i){
      var valid = self.validateSchema(instance, v, options, ctx);
      if(!valid.valid){
        var id = v.$id || v.id;
        var msg = id || (v.title && JSON.stringify(v.title)) || (v['$ref'] && ('<' + v['$ref'] + '>')) || '[subschema '+i+']';
        result.addError({
          name: 'allOf',
          argument: { id: msg, length: valid.errors.length, valid: valid },
          message: 'does not match allOf schema ' + msg + ' with ' + valid.errors.length + ' error[s]:',
        });
        result.importErrors(valid);
      }
    });
    return result;
  };
  
  /**
   * Validates whether the instance matches exactly one of the given schemas
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null}
   */
  validators.oneOf = function validateOneOf (instance, schema, options, ctx) {
    // Ignore undefined instances
    if (instance === undefined) {
      return null;
    }
    if (!Array.isArray(schema.oneOf)){
      throw new SchemaError("oneOf must be an array");
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    var inner = new ValidatorResult(instance, schema, options, ctx);
    var count = schema.oneOf.filter(
      testSchemaNoThrow.bind(
        this, instance, options, ctx, function(res) {inner.importErrors(res);}
      ) ).length;
    var list = schema.oneOf.map(function (v, i) {
      var id = v.$id || v.id;
      return id || (v.title && JSON.stringify(v.title)) || (v['$ref'] && ('<' + v['$ref'] + '>')) || '[subschema '+i+']';
    });
    if (count!==1) {
      if (options.nestedErrors) {
        result.importErrors(inner);
      }
      result.addError({
        name: 'oneOf',
        argument: list,
        message: "is not exactly one from " + list.join(','),
      });
    }
    return result;
  };
  
  /**
   * Validates "then" or "else" depending on the result of validating "if"
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null}
   */
  validators.if = function validateIf (instance, schema, options, ctx) {
    // Ignore undefined instances
    if (instance === undefined) return null;
    if (!helpers.isSchema(schema.if)) throw new Error('Expected "if" keyword to be a schema');
    var ifValid = testSchemaNoThrow.call(this, instance, options, ctx, null, schema.if);
    var result = new ValidatorResult(instance, schema, options, ctx);
    var res;
    if(ifValid){
      if (schema.then === undefined) return;
      if (!helpers.isSchema(schema.then)) throw new Error('Expected "then" keyword to be a schema');
      res = this.validateSchema(instance, schema.then, options, ctx.makeChild(schema.then));
      result.importErrors(res);
    }else{
      if (schema.else === undefined) return;
      if (!helpers.isSchema(schema.else)) throw new Error('Expected "else" keyword to be a schema');
      res = this.validateSchema(instance, schema.else, options, ctx.makeChild(schema.else));
      result.importErrors(res);
    }
    return result;
  };
  
  function getEnumerableProperty(object, key){
    // Determine if `key` shows up in `for(var key in object)`
    // First test Object.hasOwnProperty.call as an optimization: that guarantees it does
    if(Object.hasOwnProperty.call(object, key)) return object[key];
    // Test `key in object` as an optimization; false means it won't
    if(!(key in object)) return;
    while( (object = Object.getPrototypeOf(object)) ){
      if(Object.propertyIsEnumerable.call(object, key)) return object[key];
    }
  }
  
  /**
   * Validates propertyNames
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null|ValidatorResult}
   */
  validators.propertyNames = function validatePropertyNames (instance, schema, options, ctx) {
    if(!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var subschema = schema.propertyNames!==undefined ? schema.propertyNames : {};
    if(!helpers.isSchema(subschema)) throw new SchemaError('Expected "propertyNames" to be a schema (object or boolean)');
  
    for (var property in instance) {
      if(getEnumerableProperty(instance, property) !== undefined){
        var res = this.validateSchema(property, subschema, options, ctx.makeChild(subschema));
        result.importErrors(res);
      }
    }
  
    return result;
  };
  
  /**
   * Validates properties
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null|ValidatorResult}
   */
  validators.properties = function validateProperties (instance, schema, options, ctx) {
    if(!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var properties = schema.properties || {};
    for (var property in properties) {
      var subschema = properties[property];
      if(subschema===undefined){
        continue;
      }else if(subschema===null){
        throw new SchemaError('Unexpected null, expected schema in "properties"');
      }
      if (typeof options.preValidateProperty == 'function') {
        options.preValidateProperty(instance, property, subschema, options, ctx);
      }
      var prop = getEnumerableProperty(instance, property);
      var res = this.validateSchema(prop, subschema, options, ctx.makeChild(subschema, property));
      if(res.instance !== result.instance[property]) result.instance[property] = res.instance;
      result.importErrors(res);
    }
    return result;
  };
  
  /**
   * Test a specific property within in instance against the additionalProperties schema attribute
   * This ignores properties with definitions in the properties schema attribute, but no other attributes.
   * If too many more types of property-existence tests pop up they may need their own class of tests (like `type` has)
   * @private
   * @return {boolean}
   */
  function testAdditionalProperty (instance, schema, options, ctx, property, result) {
    if(!this.types.object(instance)) return;
    if (schema.properties && schema.properties[property] !== undefined) {
      return;
    }
    if (schema.additionalProperties === false) {
      result.addError({
        name: 'additionalProperties',
        argument: property,
        message: "is not allowed to have the additional property " + JSON.stringify(property),
      });
    } else {
      var additionalProperties = schema.additionalProperties || {};
  
      if (typeof options.preValidateProperty == 'function') {
        options.preValidateProperty(instance, property, additionalProperties, options, ctx);
      }
  
      var res = this.validateSchema(instance[property], additionalProperties, options, ctx.makeChild(additionalProperties, property));
      if(res.instance !== result.instance[property]) result.instance[property] = res.instance;
      result.importErrors(res);
    }
  }
  
  /**
   * Validates patternProperties
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null|ValidatorResult}
   */
  validators.patternProperties = function validatePatternProperties (instance, schema, options, ctx) {
    if(!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var patternProperties = schema.patternProperties || {};
  
    for (var property in instance) {
      var test = true;
      for (var pattern in patternProperties) {
        var subschema = patternProperties[pattern];
        if(subschema===undefined){
          continue;
        }else if(subschema===null){
          throw new SchemaError('Unexpected null, expected schema in "patternProperties"');
        }
        try {
          var regexp = new RegExp(pattern, 'u');
        } catch(_e) {
          // In the event the stricter handling causes an error, fall back on the forgiving handling
          // DEPRECATED
          regexp = new RegExp(pattern);
        }
        if (!regexp.test(property)) {
          continue;
        }
        test = false;
  
        if (typeof options.preValidateProperty == 'function') {
          options.preValidateProperty(instance, property, subschema, options, ctx);
        }
  
        var res = this.validateSchema(instance[property], subschema, options, ctx.makeChild(subschema, property));
        if(res.instance !== result.instance[property]) result.instance[property] = res.instance;
        result.importErrors(res);
      }
      if (test) {
        testAdditionalProperty.call(this, instance, schema, options, ctx, property, result);
      }
    }
  
    return result;
  };
  
  /**
   * Validates additionalProperties
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null|ValidatorResult}
   */
  validators.additionalProperties = function validateAdditionalProperties (instance, schema, options, ctx) {
    if(!this.types.object(instance)) return;
    // if patternProperties is defined then we'll test when that one is called instead
    if (schema.patternProperties) {
      return null;
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    for (var property in instance) {
      testAdditionalProperty.call(this, instance, schema, options, ctx, property, result);
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is at least of a certain length, when the instance value is a string.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.minProperties = function validateMinProperties (instance, schema, options, ctx) {
    if (!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var keys = Object.keys(instance);
    if (!(keys.length >= schema.minProperties)) {
      result.addError({
        name: 'minProperties',
        argument: schema.minProperties,
        message: "does not meet minimum property length of " + schema.minProperties,
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is at most of a certain length, when the instance value is a string.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.maxProperties = function validateMaxProperties (instance, schema, options, ctx) {
    if (!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var keys = Object.keys(instance);
    if (!(keys.length <= schema.maxProperties)) {
      result.addError({
        name: 'maxProperties',
        argument: schema.maxProperties,
        message: "does not meet maximum property length of " + schema.maxProperties,
      });
    }
    return result;
  };
  
  /**
   * Validates items when instance is an array
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {String|null|ValidatorResult}
   */
  validators.items = function validateItems (instance, schema, options, ctx) {
    var self = this;
    if (!this.types.array(instance)) return;
    if (!schema.items) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    instance.every(function (value, i) {
      var items = Array.isArray(schema.items) ? (schema.items[i] || schema.additionalItems) : schema.items;
      if (items === undefined) {
        return true;
      }
      if (items === false) {
        result.addError({
          name: 'items',
          message: "additionalItems not permitted",
        });
        return false;
      }
      var res = self.validateSchema(value, items, options, ctx.makeChild(items, i));
      if(res.instance !== result.instance[i]) result.instance[i] = res.instance;
      result.importErrors(res);
      return true;
    });
    return result;
  };
  
  /**
   * Validates minimum and exclusiveMinimum when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.minimum = function validateMinimum (instance, schema, options, ctx) {
    if (!this.types.number(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (schema.exclusiveMinimum && schema.exclusiveMinimum === true) {
      if(!(instance > schema.minimum)){
        result.addError({
          name: 'minimum',
          argument: schema.minimum,
          message: "must be greater than " + schema.minimum,
        });
      }
    } else {
      if(!(instance >= schema.minimum)){
        result.addError({
          name: 'minimum',
          argument: schema.minimum,
          message: "must be greater than or equal to " + schema.minimum,
        });
      }
    }
    return result;
  };
  
  /**
   * Validates maximum and exclusiveMaximum when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.maximum = function validateMaximum (instance, schema, options, ctx) {
    if (!this.types.number(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (schema.exclusiveMaximum && schema.exclusiveMaximum === true) {
      if(!(instance < schema.maximum)){
        result.addError({
          name: 'maximum',
          argument: schema.maximum,
          message: "must be less than " + schema.maximum,
        });
      }
    } else {
      if(!(instance <= schema.maximum)){
        result.addError({
          name: 'maximum',
          argument: schema.maximum,
          message: "must be less than or equal to " + schema.maximum,
        });
      }
    }
    return result;
  };
  
  /**
   * Validates the number form of exclusiveMinimum when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.exclusiveMinimum = function validateExclusiveMinimum (instance, schema, options, ctx) {
    // Support the boolean form of exclusiveMinimum, which is handled by the "minimum" keyword.
    if(typeof schema.exclusiveMaximum === 'boolean') return;
    if (!this.types.number(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var valid = instance > schema.exclusiveMinimum;
    if (!valid) {
      result.addError({
        name: 'exclusiveMinimum',
        argument: schema.exclusiveMinimum,
        message: "must be strictly greater than " + schema.exclusiveMinimum,
      });
    }
    return result;
  };
  
  /**
   * Validates the number form of exclusiveMaximum when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.exclusiveMaximum = function validateExclusiveMaximum (instance, schema, options, ctx) {
    // Support the boolean form of exclusiveMaximum, which is handled by the "maximum" keyword.
    if(typeof schema.exclusiveMaximum === 'boolean') return;
    if (!this.types.number(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var valid = instance < schema.exclusiveMaximum;
    if (!valid) {
      result.addError({
        name: 'exclusiveMaximum',
        argument: schema.exclusiveMaximum,
        message: "must be strictly less than " + schema.exclusiveMaximum,
      });
    }
    return result;
  };
  
  /**
   * Perform validation for multipleOf and divisibleBy, which are essentially the same.
   * @param instance
   * @param schema
   * @param validationType
   * @param errorMessage
   * @returns {String|null}
   */
  var validateMultipleOfOrDivisbleBy = function validateMultipleOfOrDivisbleBy (instance, schema, options, ctx, validationType, errorMessage) {
    if (!this.types.number(instance)) return;
  
    var validationArgument = schema[validationType];
    if (validationArgument == 0) {
      throw new SchemaError(validationType + " cannot be zero");
    }
  
    var result = new ValidatorResult(instance, schema, options, ctx);
  
    var instanceDecimals = helpers.getDecimalPlaces(instance);
    var divisorDecimals = helpers.getDecimalPlaces(validationArgument);
  
    var maxDecimals = Math.max(instanceDecimals , divisorDecimals);
    var multiplier = Math.pow(10, maxDecimals);
  
    if (Math.round(instance * multiplier) % Math.round(validationArgument * multiplier) !== 0) {
      result.addError({
        name: validationType,
        argument:  validationArgument,
        message: errorMessage + JSON.stringify(validationArgument),
      });
    }
  
    return result;
  };
  
  /**
   * Validates divisibleBy when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.multipleOf = function validateMultipleOf (instance, schema, options, ctx) {
    return validateMultipleOfOrDivisbleBy.call(this, instance, schema, options, ctx, "multipleOf", "is not a multiple of (divisible by) ");
  };
  
  /**
   * Validates multipleOf when the type of the instance value is a number.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.divisibleBy = function validateDivisibleBy (instance, schema, options, ctx) {
    return validateMultipleOfOrDivisbleBy.call(this, instance, schema, options, ctx, "divisibleBy", "is not divisible by (multiple of) ");
  };
  
  /**
   * Validates whether the instance value is present.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.required = function validateRequired (instance, schema, options, ctx) {
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (instance === undefined && schema.required === true) {
      // A boolean form is implemented for reverse-compatibility with schemas written against older drafts
      result.addError({
        name: 'required',
        message: "is required",
      });
    } else if (this.types.object(instance) && Array.isArray(schema.required)) {
      schema.required.forEach(function(n){
        if(getEnumerableProperty(instance, n)===undefined){
          result.addError({
            name: 'required',
            argument: n,
            message: "requires property " + JSON.stringify(n),
          });
        }
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance value matches the regular expression, when the instance value is a string.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.pattern = function validatePattern (instance, schema, options, ctx) {
    if (!this.types.string(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var pattern = schema.pattern;
    try {
      var regexp = new RegExp(pattern, 'u');
    } catch(_e) {
      // In the event the stricter handling causes an error, fall back on the forgiving handling
      // DEPRECATED
      regexp = new RegExp(pattern);
    }
    if (!instance.match(regexp)) {
      result.addError({
        name: 'pattern',
        argument: schema.pattern,
        message: "does not match pattern " + JSON.stringify(schema.pattern.toString()),
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is of a certain defined format or a custom
   * format.
   * The following formats are supported for string types:
   *   - date-time
   *   - date
   *   - time
   *   - ip-address
   *   - ipv6
   *   - uri
   *   - color
   *   - host-name
   *   - alpha
   *   - alpha-numeric
   *   - utc-millisec
   * @param instance
   * @param schema
   * @param [options]
   * @param [ctx]
   * @return {String|null}
   */
  validators.format = function validateFormat (instance, schema, options, ctx) {
    if (instance===undefined) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!result.disableFormat && !helpers.isFormat(instance, schema.format, this)) {
      result.addError({
        name: 'format',
        argument: schema.format,
        message: "does not conform to the " + JSON.stringify(schema.format) + " format",
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is at least of a certain length, when the instance value is a string.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.minLength = function validateMinLength (instance, schema, options, ctx) {
    if (!this.types.string(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var hsp = instance.match(/[\uDC00-\uDFFF]/g);
    var length = instance.length - (hsp ? hsp.length : 0);
    if (!(length >= schema.minLength)) {
      result.addError({
        name: 'minLength',
        argument: schema.minLength,
        message: "does not meet minimum length of " + schema.minLength,
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is at most of a certain length, when the instance value is a string.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.maxLength = function validateMaxLength (instance, schema, options, ctx) {
    if (!this.types.string(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    // TODO if this was already computed in "minLength", use that value instead of re-computing
    var hsp = instance.match(/[\uDC00-\uDFFF]/g);
    var length = instance.length - (hsp ? hsp.length : 0);
    if (!(length <= schema.maxLength)) {
      result.addError({
        name: 'maxLength',
        argument: schema.maxLength,
        message: "does not meet maximum length of " + schema.maxLength,
      });
    }
    return result;
  };
  
  /**
   * Validates whether instance contains at least a minimum number of items, when the instance is an Array.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.minItems = function validateMinItems (instance, schema, options, ctx) {
    if (!this.types.array(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!(instance.length >= schema.minItems)) {
      result.addError({
        name: 'minItems',
        argument: schema.minItems,
        message: "does not meet minimum length of " + schema.minItems,
      });
    }
    return result;
  };
  
  /**
   * Validates whether instance contains no more than a maximum number of items, when the instance is an Array.
   * @param instance
   * @param schema
   * @return {String|null}
   */
  validators.maxItems = function validateMaxItems (instance, schema, options, ctx) {
    if (!this.types.array(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!(instance.length <= schema.maxItems)) {
      result.addError({
        name: 'maxItems',
        argument: schema.maxItems,
        message: "does not meet maximum length of " + schema.maxItems,
      });
    }
    return result;
  };
  
  /**
   * Deep compares arrays for duplicates
   * @param v
   * @param i
   * @param a
   * @private
   * @return {boolean}
   */
  function testArrays (v, i, a) {
    var j, len = a.length;
    for (j = i + 1, len; j < len; j++) {
      if (helpers.deepCompareStrict(v, a[j])) {
        return false;
      }
    }
    return true;
  }
  
  /**
   * Validates whether there are no duplicates, when the instance is an Array.
   * @param instance
   * @return {String|null}
   */
  validators.uniqueItems = function validateUniqueItems (instance, schema, options, ctx) {
    if (schema.uniqueItems!==true) return;
    if (!this.types.array(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!instance.every(testArrays)) {
      result.addError({
        name: 'uniqueItems',
        message: "contains duplicate item",
      });
    }
    return result;
  };
  
  /**
   * Validate for the presence of dependency properties, if the instance is an object.
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {null|ValidatorResult}
   */
  validators.dependencies = function validateDependencies (instance, schema, options, ctx) {
    if (!this.types.object(instance)) return;
    var result = new ValidatorResult(instance, schema, options, ctx);
    for (var property in schema.dependencies) {
      if (instance[property] === undefined) {
        continue;
      }
      var dep = schema.dependencies[property];
      var childContext = ctx.makeChild(dep, property);
      if (typeof dep == 'string') {
        dep = [dep];
      }
      if (Array.isArray(dep)) {
        dep.forEach(function (prop) {
          if (instance[prop] === undefined) {
            result.addError({
              // FIXME there's two different "dependencies" errors here with slightly different outputs
              // Can we make these the same? Or should we create different error types?
              name: 'dependencies',
              argument: childContext.propertyPath,
              message: "property " + prop + " not found, required by " + childContext.propertyPath,
            });
          }
        });
      } else {
        var res = this.validateSchema(instance, dep, options, childContext);
        if(result.instance !== res.instance) result.instance = res.instance;
        if (res && res.errors.length) {
          result.addError({
            name: 'dependencies',
            argument: childContext.propertyPath,
            message: "does not meet dependency required by " + childContext.propertyPath,
          });
          result.importErrors(res);
        }
      }
    }
    return result;
  };
  
  /**
   * Validates whether the instance value is one of the enumerated values.
   *
   * @param instance
   * @param schema
   * @return {ValidatorResult|null}
   */
  validators['enum'] = function validateEnum (instance, schema, options, ctx) {
    if (instance === undefined) {
      return null;
    }
    if (!Array.isArray(schema['enum'])) {
      throw new SchemaError("enum expects an array", schema);
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!schema['enum'].some(helpers.deepCompareStrict.bind(null, instance))) {
      result.addError({
        name: 'enum',
        argument: schema['enum'],
        message: "is not one of enum values: " + schema['enum'].map(String).join(','),
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance exactly matches a given value
   *
   * @param instance
   * @param schema
   * @return {ValidatorResult|null}
   */
  validators['const'] = function validateEnum (instance, schema, options, ctx) {
    if (instance === undefined) {
      return null;
    }
    var result = new ValidatorResult(instance, schema, options, ctx);
    if (!helpers.deepCompareStrict(schema['const'], instance)) {
      result.addError({
        name: 'const',
        argument: schema['const'],
        message: "does not exactly match expected constant: " + schema['const'],
      });
    }
    return result;
  };
  
  /**
   * Validates whether the instance if of a prohibited type.
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @return {null|ValidatorResult}
   */
  validators.not = validators.disallow = function validateNot (instance, schema, options, ctx) {
    var self = this;
    if(instance===undefined) return null;
    var result = new ValidatorResult(instance, schema, options, ctx);
    var notTypes = schema.not || schema.disallow;
    if(!notTypes) return null;
    if(!Array.isArray(notTypes)) notTypes=[notTypes];
    notTypes.forEach(function (type) {
      if (self.testType(instance, schema, options, ctx, type)) {
        var id = type && (type.$id || type.id);
        var schemaId = id || type;
        result.addError({
          name: 'not',
          argument: schemaId,
          message: "is of prohibited type " + schemaId,
        });
      }
    });
    return result;
  };
  
  module.exports = attribute;
  
  },{"./helpers":7}],7:[function(require,module,exports){
  'use strict';
  
  var uri = require('url');
  
  var ValidationError = exports.ValidationError = function ValidationError (message, instance, schema, path, name, argument) {
    if(Array.isArray(path)){
      this.path = path;
      this.property = path.reduce(function(sum, item){
        return sum + makeSuffix(item);
      }, 'instance');
    }else if(path !== undefined){
      this.property = path;
    }
    if (message) {
      this.message = message;
    }
    if (schema) {
      var id = schema.$id || schema.id;
      this.schema = id || schema;
    }
    if (instance !== undefined) {
      this.instance = instance;
    }
    this.name = name;
    this.argument = argument;
    this.stack = this.toString();
  };
  
  ValidationError.prototype.toString = function toString() {
    return this.property + ' ' + this.message;
  };
  
  var ValidatorResult = exports.ValidatorResult = function ValidatorResult(instance, schema, options, ctx) {
    this.instance = instance;
    this.schema = schema;
    this.options = options;
    this.path = ctx.path;
    this.propertyPath = ctx.propertyPath;
    this.errors = [];
    this.throwError = options && options.throwError;
    this.throwFirst = options && options.throwFirst;
    this.throwAll = options && options.throwAll;
    this.disableFormat = options && options.disableFormat === true;
  };
  
  ValidatorResult.prototype.addError = function addError(detail) {
    var err;
    if (typeof detail == 'string') {
      err = new ValidationError(detail, this.instance, this.schema, this.path);
    } else {
      if (!detail) throw new Error('Missing error detail');
      if (!detail.message) throw new Error('Missing error message');
      if (!detail.name) throw new Error('Missing validator type');
      err = new ValidationError(detail.message, this.instance, this.schema, this.path, detail.name, detail.argument);
    }
  
    this.errors.push(err);
    if (this.throwFirst) {
      throw new ValidatorResultError(this);
    }else if(this.throwError){
      throw err;
    }
    return err;
  };
  
  ValidatorResult.prototype.importErrors = function importErrors(res) {
    if (typeof res == 'string' || (res && res.validatorType)) {
      this.addError(res);
    } else if (res && res.errors) {
      Array.prototype.push.apply(this.errors, res.errors);
    }
  };
  
  function stringizer (v,i){
    return i+': '+v.toString()+'\n';
  }
  ValidatorResult.prototype.toString = function toString(res) {
    return this.errors.map(stringizer).join('');
  };
  
  Object.defineProperty(ValidatorResult.prototype, "valid", { get: function() {
    return !this.errors.length;
  } });
  
  module.exports.ValidatorResultError = ValidatorResultError;
  function ValidatorResultError(result) {
    if(Error.captureStackTrace){
      Error.captureStackTrace(this, ValidatorResultError);
    }
    this.instance = result.instance;
    this.schema = result.schema;
    this.options = result.options;
    this.errors = result.errors;
  }
  ValidatorResultError.prototype = new Error();
  ValidatorResultError.prototype.constructor = ValidatorResultError;
  ValidatorResultError.prototype.name = "Validation Error";
  
  /**
   * Describes a problem with a Schema which prevents validation of an instance
   * @name SchemaError
   * @constructor
   */
  var SchemaError = exports.SchemaError = function SchemaError (msg, schema) {
    this.message = msg;
    this.schema = schema;
    Error.call(this, msg);
    Error.captureStackTrace(this, SchemaError);
  };
  SchemaError.prototype = Object.create(Error.prototype,
    {
      constructor: {value: SchemaError, enumerable: false},
      name: {value: 'SchemaError', enumerable: false},
    });
  
  var SchemaContext = exports.SchemaContext = function SchemaContext (schema, options, path, base, schemas) {
    this.schema = schema;
    this.options = options;
    if(Array.isArray(path)){
      this.path = path;
      this.propertyPath = path.reduce(function(sum, item){
        return sum + makeSuffix(item);
      }, 'instance');
    }else{
      this.propertyPath = path;
    }
    this.base = base;
    this.schemas = schemas;
  };
  
  SchemaContext.prototype.resolve = function resolve (target) {
    return uri.resolve(this.base, target);
  };
  
  SchemaContext.prototype.makeChild = function makeChild(schema, propertyName){
    var path = (propertyName===undefined) ? this.path : this.path.concat([propertyName]);
    var id = schema.$id || schema.id;
    var base = uri.resolve(this.base, id||'');
    var ctx = new SchemaContext(schema, this.options, path, base, Object.create(this.schemas));
    if(id && !ctx.schemas[base]){
      ctx.schemas[base] = schema;
    }
    return ctx;
  };
  
  var FORMAT_REGEXPS = exports.FORMAT_REGEXPS = {
    'date-time': /^\d{4}-(?:0[0-9]{1}|1[0-2]{1})-(3[01]|0[1-9]|[12][0-9])[tT ](2[0-4]|[01][0-9]):([0-5][0-9]):(60|[0-5][0-9])(\.\d+)?([zZ]|[+-]([0-5][0-9]):(60|[0-5][0-9]))$/,
    'date': /^\d{4}-(?:0[0-9]{1}|1[0-2]{1})-(3[01]|0[1-9]|[12][0-9])$/,
    'time': /^(2[0-4]|[01][0-9]):([0-5][0-9]):(60|[0-5][0-9])$/,
  
    'email': /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/,
    'ip-address': /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/,
    'ipv6': /^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/,
  
    // TODO: A more accurate regular expression for "uri" goes:
    // [A-Za-z][+\-.0-9A-Za-z]*:((/(/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)(:\d*)?)?)?#(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|(/(/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)(:\d*)?[/?]|[!$&-.0-;=?-Z_a-z~])|/?%[0-9A-Fa-f]{2}|[!$&-.0-;=?-Z_a-z~])(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*(#(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*)?|/(/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+(:\d*)?|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?:\d*|\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)?)?
    'uri': /^[a-zA-Z][a-zA-Z0-9+-.]*:[^\s]*$/,
    'uri-reference': /^(((([A-Za-z][+\-.0-9A-Za-z]*(:%[0-9A-Fa-f]{2}|:[!$&-.0-;=?-Z_a-z~]|[/?])|\?)(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|([A-Za-z][+\-.0-9A-Za-z]*:?)?)|([A-Za-z][+\-.0-9A-Za-z]*:)?\/((%[0-9A-Fa-f]{2}|\/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)(:\d*)?[/?]|[!$&-.0-;=?-Z_a-z~])(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|(\/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)(:\d*)?)?))#(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|(([A-Za-z][+\-.0-9A-Za-z]*)?%[0-9A-Fa-f]{2}|[!$&-.0-9;=@_~]|[A-Za-z][+\-.0-9A-Za-z]*[!$&-*,;=@_~])(%[0-9A-Fa-f]{2}|[!$&-.0-9;=@-Z_a-z~])*((([/?](%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*)?#|[/?])(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*)?|([A-Za-z][+\-.0-9A-Za-z]*(:%[0-9A-Fa-f]{2}|:[!$&-.0-;=?-Z_a-z~]|[/?])|\?)(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|([A-Za-z][+\-.0-9A-Za-z]*:)?\/((%[0-9A-Fa-f]{2}|\/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)(:\d*)?[/?]|[!$&-.0-;=?-Z_a-z~])(%[0-9A-Fa-f]{2}|[!$&-;=?-Z_a-z~])*|\/((%[0-9A-Fa-f]{2}|[!$&-.0-9;=A-Z_a-z~])+(:\d*)?|(\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?:\d*|\[(([Vv][0-9A-Fa-f]+\.[!$&-.0-;=A-Z_a-z~]+)?|[.0-:A-Fa-f]+)\])?)?|[A-Za-z][+\-.0-9A-Za-z]*:?)?$/,
  
    'color': /^(#?([0-9A-Fa-f]{3}){1,2}\b|aqua|black|blue|fuchsia|gray|green|lime|maroon|navy|olive|orange|purple|red|silver|teal|white|yellow|(rgb\(\s*\b([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\b\s*,\s*\b([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\b\s*,\s*\b([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\b\s*\))|(rgb\(\s*(\d?\d%|100%)+\s*,\s*(\d?\d%|100%)+\s*,\s*(\d?\d%|100%)+\s*\)))$/,
  
    // hostname regex from: http://stackoverflow.com/a/1420225/5628
    'hostname': /^(?=.{1,255}$)[0-9A-Za-z](?:(?:[0-9A-Za-z]|-){0,61}[0-9A-Za-z])?(?:\.[0-9A-Za-z](?:(?:[0-9A-Za-z]|-){0,61}[0-9A-Za-z])?)*\.?$/,
    'host-name': /^(?=.{1,255}$)[0-9A-Za-z](?:(?:[0-9A-Za-z]|-){0,61}[0-9A-Za-z])?(?:\.[0-9A-Za-z](?:(?:[0-9A-Za-z]|-){0,61}[0-9A-Za-z])?)*\.?$/,
  
    'alpha': /^[a-zA-Z]+$/,
    'alphanumeric': /^[a-zA-Z0-9]+$/,
    'utc-millisec': function (input) {
      return (typeof input === 'string') && parseFloat(input) === parseInt(input, 10) && !isNaN(input);
    },
    'regex': function (input) {
      var result = true;
      try {
        new RegExp(input);
      } catch (e) {
        result = false;
      }
      return result;
    },
    'style': /\s*(.+?):\s*([^;]+);?/,
    'phone': /^\+(?:[0-9] ?){6,14}[0-9]$/,
  };
  
  FORMAT_REGEXPS.regexp = FORMAT_REGEXPS.regex;
  FORMAT_REGEXPS.pattern = FORMAT_REGEXPS.regex;
  FORMAT_REGEXPS.ipv4 = FORMAT_REGEXPS['ip-address'];
  
  exports.isFormat = function isFormat (input, format, validator) {
    if (typeof input === 'string' && FORMAT_REGEXPS[format] !== undefined) {
      if (FORMAT_REGEXPS[format] instanceof RegExp) {
        return FORMAT_REGEXPS[format].test(input);
      }
      if (typeof FORMAT_REGEXPS[format] === 'function') {
        return FORMAT_REGEXPS[format](input);
      }
    } else if (validator && validator.customFormats &&
        typeof validator.customFormats[format] === 'function') {
      return validator.customFormats[format](input);
    }
    return true;
  };
  
  var makeSuffix = exports.makeSuffix = function makeSuffix (key) {
    key = key.toString();
    // This function could be capable of outputting valid a ECMAScript string, but the
    // resulting code for testing which form to use would be tens of thousands of characters long
    // That means this will use the name form for some illegal forms
    if (!key.match(/[.\s\[\]]/) && !key.match(/^[\d]/)) {
      return '.' + key;
    }
    if (key.match(/^\d+$/)) {
      return '[' + key + ']';
    }
    return '[' + JSON.stringify(key) + ']';
  };
  
  exports.deepCompareStrict = function deepCompareStrict (a, b) {
    if (typeof a !== typeof b) {
      return false;
    }
    if (Array.isArray(a)) {
      if (!Array.isArray(b)) {
        return false;
      }
      if (a.length !== b.length) {
        return false;
      }
      return a.every(function (v, i) {
        return deepCompareStrict(a[i], b[i]);
      });
    }
    if (typeof a === 'object') {
      if (!a || !b) {
        return a === b;
      }
      var aKeys = Object.keys(a);
      var bKeys = Object.keys(b);
      if (aKeys.length !== bKeys.length) {
        return false;
      }
      return aKeys.every(function (v) {
        return deepCompareStrict(a[v], b[v]);
      });
    }
    return a === b;
  };
  
  function deepMerger (target, dst, e, i) {
    if (typeof e === 'object') {
      dst[i] = deepMerge(target[i], e);
    } else {
      if (target.indexOf(e) === -1) {
        dst.push(e);
      }
    }
  }
  
  function copyist (src, dst, key) {
    dst[key] = src[key];
  }
  
  function copyistWithDeepMerge (target, src, dst, key) {
    if (typeof src[key] !== 'object' || !src[key]) {
      dst[key] = src[key];
    }
    else {
      if (!target[key]) {
        dst[key] = src[key];
      } else {
        dst[key] = deepMerge(target[key], src[key]);
      }
    }
  }
  
  function deepMerge (target, src) {
    var array = Array.isArray(src);
    var dst = array && [] || {};
  
    if (array) {
      target = target || [];
      dst = dst.concat(target);
      src.forEach(deepMerger.bind(null, target, dst));
    } else {
      if (target && typeof target === 'object') {
        Object.keys(target).forEach(copyist.bind(null, target, dst));
      }
      Object.keys(src).forEach(copyistWithDeepMerge.bind(null, target, src, dst));
    }
  
    return dst;
  }
  
  module.exports.deepMerge = deepMerge;
  
  /**
   * Validates instance against the provided schema
   * Implements URI+JSON Pointer encoding, e.g. "%7e"="~0"=>"~", "~1"="%2f"=>"/"
   * @param o
   * @param s The path to walk o along
   * @return any
   */
  exports.objectGetPath = function objectGetPath(o, s) {
    var parts = s.split('/').slice(1);
    var k;
    while (typeof (k=parts.shift()) == 'string') {
      var n = decodeURIComponent(k.replace(/~0/,'~').replace(/~1/g,'/'));
      if (!(n in o)) return;
      o = o[n];
    }
    return o;
  };
  
  function pathEncoder (v) {
    return '/'+encodeURIComponent(v).replace(/~/g,'%7E');
  }
  /**
   * Accept an Array of property names and return a JSON Pointer URI fragment
   * @param Array a
   * @return {String}
   */
  exports.encodePath = function encodePointer(a){
    // ~ must be encoded explicitly because hacks
    // the slash is encoded by encodeURIComponent
    return a.map(pathEncoder).join('');
  };
  
  
  /**
   * Calculate the number of decimal places a number uses
   * We need this to get correct results out of multipleOf and divisibleBy
   * when either figure is has decimal places, due to IEEE-754 float issues.
   * @param number
   * @returns {number}
   */
  exports.getDecimalPlaces = function getDecimalPlaces(number) {
  
    var decimalPlaces = 0;
    if (isNaN(number)) return decimalPlaces;
  
    if (typeof number !== 'number') {
      number = Number(number);
    }
  
    var parts = number.toString().split('e');
    if (parts.length === 2) {
      if (parts[1][0] !== '-') {
        return decimalPlaces;
      } else {
        decimalPlaces = Number(parts[1].slice(1));
      }
    }
  
    var decimalParts = parts[0].split('.');
    if (decimalParts.length === 2) {
      decimalPlaces += decimalParts[1].length;
    }
  
    return decimalPlaces;
  };
  
  exports.isSchema = function isSchema(val){
    return (typeof val === 'object' && val) || (typeof val === 'boolean');
  };
  
  
  },{"url":15}],8:[function(require,module,exports){
  'use strict';
  
  var Validator = module.exports.Validator = require('./validator');
  
  module.exports.ValidatorResult = require('./helpers').ValidatorResult;
  module.exports.ValidatorResultError = require('./helpers').ValidatorResultError;
  module.exports.ValidationError = require('./helpers').ValidationError;
  module.exports.SchemaError = require('./helpers').SchemaError;
  module.exports.SchemaScanResult = require('./scan').SchemaScanResult;
  module.exports.scan = require('./scan').scan;
  
  module.exports.validate = function (instance, schema, options) {
    var v = new Validator();
    return v.validate(instance, schema, options);
  };
  
  },{"./helpers":7,"./scan":9,"./validator":10}],9:[function(require,module,exports){
  "use strict";
  
  var urilib = require('url');
  var helpers = require('./helpers');
  
  module.exports.SchemaScanResult = SchemaScanResult;
  function SchemaScanResult(found, ref){
    this.id = found;
    this.ref = ref;
  }
  
  /**
   * Adds a schema with a certain urn to the Validator instance.
   * @param string uri
   * @param object schema
   * @return {Object}
   */
  module.exports.scan = function scan(base, schema){
    function scanSchema(baseuri, schema){
      if(!schema || typeof schema!='object') return;
      // Mark all referenced schemas so we can tell later which schemas are referred to, but never defined
      if(schema.$ref){
        var resolvedUri = urilib.resolve(baseuri, schema.$ref);
        ref[resolvedUri] = ref[resolvedUri] ? ref[resolvedUri]+1 : 0;
        return;
      }
      var id = schema.$id || schema.id;
      var ourBase = id ? urilib.resolve(baseuri, id) : baseuri;
      if (ourBase) {
        // If there's no fragment, append an empty one
        if(ourBase.indexOf('#')<0) ourBase += '#';
        if(found[ourBase]){
          if(!helpers.deepCompareStrict(found[ourBase], schema)){
            throw new Error('Schema <'+ourBase+'> already exists with different definition');
          }
          return found[ourBase];
        }
        found[ourBase] = schema;
        // strip trailing fragment
        if(ourBase[ourBase.length-1]=='#'){
          found[ourBase.substring(0, ourBase.length-1)] = schema;
        }
      }
      scanArray(ourBase+'/items', (Array.isArray(schema.items)?schema.items:[schema.items]));
      scanArray(ourBase+'/extends', (Array.isArray(schema.extends)?schema.extends:[schema.extends]));
      scanSchema(ourBase+'/additionalItems', schema.additionalItems);
      scanObject(ourBase+'/properties', schema.properties);
      scanSchema(ourBase+'/additionalProperties', schema.additionalProperties);
      scanObject(ourBase+'/definitions', schema.definitions);
      scanObject(ourBase+'/patternProperties', schema.patternProperties);
      scanObject(ourBase+'/dependencies', schema.dependencies);
      scanArray(ourBase+'/disallow', schema.disallow);
      scanArray(ourBase+'/allOf', schema.allOf);
      scanArray(ourBase+'/anyOf', schema.anyOf);
      scanArray(ourBase+'/oneOf', schema.oneOf);
      scanSchema(ourBase+'/not', schema.not);
    }
    function scanArray(baseuri, schemas){
      if(!Array.isArray(schemas)) return;
      for(var i=0; i<schemas.length; i++){
        scanSchema(baseuri+'/'+i, schemas[i]);
      }
    }
    function scanObject(baseuri, schemas){
      if(!schemas || typeof schemas!='object') return;
      for(var p in schemas){
        scanSchema(baseuri+'/'+p, schemas[p]);
      }
    }
  
    var found = {};
    var ref = {};
    scanSchema(base, schema);
    return new SchemaScanResult(found, ref);
  };
  
  },{"./helpers":7,"url":15}],10:[function(require,module,exports){
  'use strict';
  
  var urilib = require('url');
  
  var attribute = require('./attribute');
  var helpers = require('./helpers');
  var scanSchema = require('./scan').scan;
  var ValidatorResult = helpers.ValidatorResult;
  var ValidatorResultError = helpers.ValidatorResultError;
  var SchemaError = helpers.SchemaError;
  var SchemaContext = helpers.SchemaContext;
  //var anonymousBase = 'vnd.jsonschema:///';
  var anonymousBase = '/';
  
  /**
   * Creates a new Validator object
   * @name Validator
   * @constructor
   */
  var Validator = function Validator () {
    // Allow a validator instance to override global custom formats or to have their
    // own custom formats.
    this.customFormats = Object.create(Validator.prototype.customFormats);
    this.schemas = {};
    this.unresolvedRefs = [];
  
    // Use Object.create to make this extensible without Validator instances stepping on each other's toes.
    this.types = Object.create(types);
    this.attributes = Object.create(attribute.validators);
  };
  
  // Allow formats to be registered globally.
  Validator.prototype.customFormats = {};
  
  // Hint at the presence of a property
  Validator.prototype.schemas = null;
  Validator.prototype.types = null;
  Validator.prototype.attributes = null;
  Validator.prototype.unresolvedRefs = null;
  
  /**
   * Adds a schema with a certain urn to the Validator instance.
   * @param schema
   * @param urn
   * @return {Object}
   */
  Validator.prototype.addSchema = function addSchema (schema, base) {
    var self = this;
    if (!schema) {
      return null;
    }
    var scan = scanSchema(base||anonymousBase, schema);
    var ourUri = base || schema.$id || schema.id;
    for(var uri in scan.id){
      this.schemas[uri] = scan.id[uri];
    }
    for(var uri in scan.ref){
      // If this schema is already defined, it will be filtered out by the next step
      this.unresolvedRefs.push(uri);
    }
    // Remove newly defined schemas from unresolvedRefs
    this.unresolvedRefs = this.unresolvedRefs.filter(function(uri){
      return typeof self.schemas[uri]==='undefined';
    });
    return this.schemas[ourUri];
  };
  
  Validator.prototype.addSubSchemaArray = function addSubSchemaArray(baseuri, schemas) {
    if(!Array.isArray(schemas)) return;
    for(var i=0; i<schemas.length; i++){
      this.addSubSchema(baseuri, schemas[i]);
    }
  };
  
  Validator.prototype.addSubSchemaObject = function addSubSchemaArray(baseuri, schemas) {
    if(!schemas || typeof schemas!='object') return;
    for(var p in schemas){
      this.addSubSchema(baseuri, schemas[p]);
    }
  };
  
  
  
  /**
   * Sets all the schemas of the Validator instance.
   * @param schemas
   */
  Validator.prototype.setSchemas = function setSchemas (schemas) {
    this.schemas = schemas;
  };
  
  /**
   * Returns the schema of a certain urn
   * @param urn
   */
  Validator.prototype.getSchema = function getSchema (urn) {
    return this.schemas[urn];
  };
  
  /**
   * Validates instance against the provided schema
   * @param instance
   * @param schema
   * @param [options]
   * @param [ctx]
   * @return {Array}
   */
  Validator.prototype.validate = function validate (instance, schema, options, ctx) {
    if((typeof schema !== 'boolean' && typeof schema !== 'object') || schema === null){
      throw new SchemaError('Expected `schema` to be an object or boolean');
    }
    if (!options) {
      options = {};
    }
    // This section indexes subschemas in the provided schema, so they don't need to be added with Validator#addSchema
    // This will work so long as the function at uri.resolve() will resolve a relative URI to a relative URI
    var id = schema.$id || schema.id;
    var base = urilib.resolve(options.base||anonymousBase, id||'');
    if(!ctx){
      ctx = new SchemaContext(schema, options, [], base, Object.create(this.schemas));
      if (!ctx.schemas[base]) {
        ctx.schemas[base] = schema;
      }
      var found = scanSchema(base, schema);
      for(var n in found.id){
        var sch = found.id[n];
        ctx.schemas[n] = sch;
      }
    }
    if(options.required && instance===undefined){
      var result = new ValidatorResult(instance, schema, options, ctx);
      result.addError('is required, but is undefined');
      return result;
    }
    var result = this.validateSchema(instance, schema, options, ctx);
    if (!result) {
      throw new Error('Result undefined');
    }else if(options.throwAll && result.errors.length){
      throw new ValidatorResultError(result);
    }
    return result;
  };
  
  /**
  * @param Object schema
  * @return mixed schema uri or false
  */
  function shouldResolve(schema) {
    var ref = (typeof schema === 'string') ? schema : schema.$ref;
    if (typeof ref=='string') return ref;
    return false;
  }
  
  /**
   * Validates an instance against the schema (the actual work horse)
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @private
   * @return {ValidatorResult}
   */
  Validator.prototype.validateSchema = function validateSchema (instance, schema, options, ctx) {
    var result = new ValidatorResult(instance, schema, options, ctx);
  
    // Support for the true/false schemas
    if(typeof schema==='boolean') {
      if(schema===true){
        // `true` is always valid
        schema = {};
      }else if(schema===false){
        // `false` is always invalid
        schema = {type: []};
      }
    }else if(!schema){
      // This might be a string
      throw new Error("schema is undefined");
    }
  
    if (schema['extends']) {
      if (Array.isArray(schema['extends'])) {
        var schemaobj = {schema: schema, ctx: ctx};
        schema['extends'].forEach(this.schemaTraverser.bind(this, schemaobj));
        schema = schemaobj.schema;
        schemaobj.schema = null;
        schemaobj.ctx = null;
        schemaobj = null;
      } else {
        schema = helpers.deepMerge(schema, this.superResolve(schema['extends'], ctx));
      }
    }
  
    // If passed a string argument, load that schema URI
    var switchSchema = shouldResolve(schema);
    if (switchSchema) {
      var resolved = this.resolve(schema, switchSchema, ctx);
      var subctx = new SchemaContext(resolved.subschema, options, ctx.path, resolved.switchSchema, ctx.schemas);
      return this.validateSchema(instance, resolved.subschema, options, subctx);
    }
  
    var skipAttributes = options && options.skipAttributes || [];
    // Validate each schema attribute against the instance
    for (var key in schema) {
      if (!attribute.ignoreProperties[key] && skipAttributes.indexOf(key) < 0) {
        var validatorErr = null;
        var validator = this.attributes[key];
        if (validator) {
          validatorErr = validator.call(this, instance, schema, options, ctx);
        } else if (options.allowUnknownAttributes === false) {
          // This represents an error with the schema itself, not an invalid instance
          throw new SchemaError("Unsupported attribute: " + key, schema);
        }
        if (validatorErr) {
          result.importErrors(validatorErr);
        }
      }
    }
  
    if (typeof options.rewrite == 'function') {
      var value = options.rewrite.call(this, instance, schema, options, ctx);
      result.instance = value;
    }
    return result;
  };
  
  /**
  * @private
  * @param Object schema
  * @param SchemaContext ctx
  * @returns Object schema or resolved schema
  */
  Validator.prototype.schemaTraverser = function schemaTraverser (schemaobj, s) {
    schemaobj.schema = helpers.deepMerge(schemaobj.schema, this.superResolve(s, schemaobj.ctx));
  };
  
  /**
  * @private
  * @param Object schema
  * @param SchemaContext ctx
  * @returns Object schema or resolved schema
  */
  Validator.prototype.superResolve = function superResolve (schema, ctx) {
    var ref = shouldResolve(schema);
    if(ref) {
      return this.resolve(schema, ref, ctx).subschema;
    }
    return schema;
  };
  
  /**
  * @private
  * @param Object schema
  * @param Object switchSchema
  * @param SchemaContext ctx
  * @return Object resolved schemas {subschema:String, switchSchema: String}
  * @throws SchemaError
  */
  Validator.prototype.resolve = function resolve (schema, switchSchema, ctx) {
    switchSchema = ctx.resolve(switchSchema);
    // First see if the schema exists under the provided URI
    if (ctx.schemas[switchSchema]) {
      return {subschema: ctx.schemas[switchSchema], switchSchema: switchSchema};
    }
    // Else try walking the property pointer
    var parsed = urilib.parse(switchSchema);
    var fragment = parsed && parsed.hash;
    var document = fragment && fragment.length && switchSchema.substr(0, switchSchema.length - fragment.length);
    if (!document || !ctx.schemas[document]) {
      throw new SchemaError("no such schema <" + switchSchema + ">", schema);
    }
    var subschema = helpers.objectGetPath(ctx.schemas[document], fragment.substr(1));
    if(subschema===undefined){
      throw new SchemaError("no such schema " + fragment + " located in <" + document + ">", schema);
    }
    return {subschema: subschema, switchSchema: switchSchema};
  };
  
  /**
   * Tests whether the instance if of a certain type.
   * @private
   * @param instance
   * @param schema
   * @param options
   * @param ctx
   * @param type
   * @return {boolean}
   */
  Validator.prototype.testType = function validateType (instance, schema, options, ctx, type) {
    if(type===undefined){
      return;
    }else if(type===null){
      throw new SchemaError('Unexpected null in "type" keyword');
    }
    if (typeof this.types[type] == 'function') {
      return this.types[type].call(this, instance);
    }
    if (type && typeof type == 'object') {
      var res = this.validateSchema(instance, type, options, ctx);
      return res === undefined || !(res && res.errors.length);
    }
    // Undefined or properties not on the list are acceptable, same as not being defined
    return true;
  };
  
  var types = Validator.prototype.types = {};
  types.string = function testString (instance) {
    return typeof instance == 'string';
  };
  types.number = function testNumber (instance) {
    // isFinite returns false for NaN, Infinity, and -Infinity
    return typeof instance == 'number' && isFinite(instance);
  };
  types.integer = function testInteger (instance) {
    return (typeof instance == 'number') && instance % 1 === 0;
  };
  types.boolean = function testBoolean (instance) {
    return typeof instance == 'boolean';
  };
  types.array = function testArray (instance) {
    return Array.isArray(instance);
  };
  types['null'] = function testNull (instance) {
    return instance === null;
  };
  types.date = function testDate (instance) {
    return instance instanceof Date;
  };
  types.any = function testAny (instance) {
    return true;
  };
  types.object = function testObject (instance) {
    // TODO: fix this - see #15
    return instance && (typeof instance === 'object') && !(Array.isArray(instance)) && !(instance instanceof Date);
  };
  
  module.exports = Validator;
  
  },{"./attribute":6,"./helpers":7,"./scan":9,"url":15}],11:[function(require,module,exports){
  (function (global){(function (){
  /*! https://mths.be/punycode v1.3.2 by @mathias */
  ;(function(root) {
  
    /** Detect free variables */
    var freeExports = typeof exports == 'object' && exports &&
      !exports.nodeType && exports;
    var freeModule = typeof module == 'object' && module &&
      !module.nodeType && module;
    var freeGlobal = typeof global == 'object' && global;
    if (
      freeGlobal.global === freeGlobal ||
      freeGlobal.window === freeGlobal ||
      freeGlobal.self === freeGlobal
    ) {
      root = freeGlobal;
    }
  
    /**
     * The `punycode` object.
     * @name punycode
     * @type Object
     */
    var punycode,
  
    /** Highest positive signed 32-bit float value */
    maxInt = 2147483647, // aka. 0x7FFFFFFF or 2^31-1
  
    /** Bootstring parameters */
    base = 36,
    tMin = 1,
    tMax = 26,
    skew = 38,
    damp = 700,
    initialBias = 72,
    initialN = 128, // 0x80
    delimiter = '-', // '\x2D'
  
    /** Regular expressions */
    regexPunycode = /^xn--/,
    regexNonASCII = /[^\x20-\x7E]/, // unprintable ASCII chars + non-ASCII chars
    regexSeparators = /[\x2E\u3002\uFF0E\uFF61]/g, // RFC 3490 separators
  
    /** Error messages */
    errors = {
      'overflow': 'Overflow: input needs wider integers to process',
      'not-basic': 'Illegal input >= 0x80 (not a basic code point)',
      'invalid-input': 'Invalid input'
    },
  
    /** Convenience shortcuts */
    baseMinusTMin = base - tMin,
    floor = Math.floor,
    stringFromCharCode = String.fromCharCode,
  
    /** Temporary variable */
    key;
  
    /*--------------------------------------------------------------------------*/
  
    /**
     * A generic error utility function.
     * @private
     * @param {String} type The error type.
     * @returns {Error} Throws a `RangeError` with the applicable error message.
     */
    function error(type) {
      throw RangeError(errors[type]);
    }
  
    /**
     * A generic `Array#map` utility function.
     * @private
     * @param {Array} array The array to iterate over.
     * @param {Function} callback The function that gets called for every array
     * item.
     * @returns {Array} A new array of values returned by the callback function.
     */
    function map(array, fn) {
      var length = array.length;
      var result = [];
      while (length--) {
        result[length] = fn(array[length]);
      }
      return result;
    }
  
    /**
     * A simple `Array#map`-like wrapper to work with domain name strings or email
     * addresses.
     * @private
     * @param {String} domain The domain name or email address.
     * @param {Function} callback The function that gets called for every
     * character.
     * @returns {Array} A new string of characters returned by the callback
     * function.
     */
    function mapDomain(string, fn) {
      var parts = string.split('@');
      var result = '';
      if (parts.length > 1) {
        // In email addresses, only the domain name should be punycoded. Leave
        // the local part (i.e. everything up to `@`) intact.
        result = parts[0] + '@';
        string = parts[1];
      }
      // Avoid `split(regex)` for IE8 compatibility. See #17.
      string = string.replace(regexSeparators, '\x2E');
      var labels = string.split('.');
      var encoded = map(labels, fn).join('.');
      return result + encoded;
    }
  
    /**
     * Creates an array containing the numeric code points of each Unicode
     * character in the string. While JavaScript uses UCS-2 internally,
     * this function will convert a pair of surrogate halves (each of which
     * UCS-2 exposes as separate characters) into a single code point,
     * matching UTF-16.
     * @see `punycode.ucs2.encode`
     * @see <https://mathiasbynens.be/notes/javascript-encoding>
     * @memberOf punycode.ucs2
     * @name decode
     * @param {String} string The Unicode input string (UCS-2).
     * @returns {Array} The new array of code points.
     */
    function ucs2decode(string) {
      var output = [],
          counter = 0,
          length = string.length,
          value,
          extra;
      while (counter < length) {
        value = string.charCodeAt(counter++);
        if (value >= 0xD800 && value <= 0xDBFF && counter < length) {
          // high surrogate, and there is a next character
          extra = string.charCodeAt(counter++);
          if ((extra & 0xFC00) == 0xDC00) { // low surrogate
            output.push(((value & 0x3FF) << 10) + (extra & 0x3FF) + 0x10000);
          } else {
            // unmatched surrogate; only append this code unit, in case the next
            // code unit is the high surrogate of a surrogate pair
            output.push(value);
            counter--;
          }
        } else {
          output.push(value);
        }
      }
      return output;
    }
  
    /**
     * Creates a string based on an array of numeric code points.
     * @see `punycode.ucs2.decode`
     * @memberOf punycode.ucs2
     * @name encode
     * @param {Array} codePoints The array of numeric code points.
     * @returns {String} The new Unicode string (UCS-2).
     */
    function ucs2encode(array) {
      return map(array, function(value) {
        var output = '';
        if (value > 0xFFFF) {
          value -= 0x10000;
          output += stringFromCharCode(value >>> 10 & 0x3FF | 0xD800);
          value = 0xDC00 | value & 0x3FF;
        }
        output += stringFromCharCode(value);
        return output;
      }).join('');
    }
  
    /**
     * Converts a basic code point into a digit/integer.
     * @see `digitToBasic()`
     * @private
     * @param {Number} codePoint The basic numeric code point value.
     * @returns {Number} The numeric value of a basic code point (for use in
     * representing integers) in the range `0` to `base - 1`, or `base` if
     * the code point does not represent a value.
     */
    function basicToDigit(codePoint) {
      if (codePoint - 48 < 10) {
        return codePoint - 22;
      }
      if (codePoint - 65 < 26) {
        return codePoint - 65;
      }
      if (codePoint - 97 < 26) {
        return codePoint - 97;
      }
      return base;
    }
  
    /**
     * Converts a digit/integer into a basic code point.
     * @see `basicToDigit()`
     * @private
     * @param {Number} digit The numeric value of a basic code point.
     * @returns {Number} The basic code point whose value (when used for
     * representing integers) is `digit`, which needs to be in the range
     * `0` to `base - 1`. If `flag` is non-zero, the uppercase form is
     * used; else, the lowercase form is used. The behavior is undefined
     * if `flag` is non-zero and `digit` has no uppercase form.
     */
    function digitToBasic(digit, flag) {
      //  0..25 map to ASCII a..z or A..Z
      // 26..35 map to ASCII 0..9
      return digit + 22 + 75 * (digit < 26) - ((flag != 0) << 5);
    }
  
    /**
     * Bias adaptation function as per section 3.4 of RFC 3492.
     * http://tools.ietf.org/html/rfc3492#section-3.4
     * @private
     */
    function adapt(delta, numPoints, firstTime) {
      var k = 0;
      delta = firstTime ? floor(delta / damp) : delta >> 1;
      delta += floor(delta / numPoints);
      for (/* no initialization */; delta > baseMinusTMin * tMax >> 1; k += base) {
        delta = floor(delta / baseMinusTMin);
      }
      return floor(k + (baseMinusTMin + 1) * delta / (delta + skew));
    }
  
    /**
     * Converts a Punycode string of ASCII-only symbols to a string of Unicode
     * symbols.
     * @memberOf punycode
     * @param {String} input The Punycode string of ASCII-only symbols.
     * @returns {String} The resulting string of Unicode symbols.
     */
    function decode(input) {
      // Don't use UCS-2
      var output = [],
          inputLength = input.length,
          out,
          i = 0,
          n = initialN,
          bias = initialBias,
          basic,
          j,
          index,
          oldi,
          w,
          k,
          digit,
          t,
          /** Cached calculation results */
          baseMinusT;
  
      // Handle the basic code points: let `basic` be the number of input code
      // points before the last delimiter, or `0` if there is none, then copy
      // the first basic code points to the output.
  
      basic = input.lastIndexOf(delimiter);
      if (basic < 0) {
        basic = 0;
      }
  
      for (j = 0; j < basic; ++j) {
        // if it's not a basic code point
        if (input.charCodeAt(j) >= 0x80) {
          error('not-basic');
        }
        output.push(input.charCodeAt(j));
      }
  
      // Main decoding loop: start just after the last delimiter if any basic code
      // points were copied; start at the beginning otherwise.
  
      for (index = basic > 0 ? basic + 1 : 0; index < inputLength; /* no final expression */) {
  
        // `index` is the index of the next character to be consumed.
        // Decode a generalized variable-length integer into `delta`,
        // which gets added to `i`. The overflow checking is easier
        // if we increase `i` as we go, then subtract off its starting
        // value at the end to obtain `delta`.
        for (oldi = i, w = 1, k = base; /* no condition */; k += base) {
  
          if (index >= inputLength) {
            error('invalid-input');
          }
  
          digit = basicToDigit(input.charCodeAt(index++));
  
          if (digit >= base || digit > floor((maxInt - i) / w)) {
            error('overflow');
          }
  
          i += digit * w;
          t = k <= bias ? tMin : (k >= bias + tMax ? tMax : k - bias);
  
          if (digit < t) {
            break;
          }
  
          baseMinusT = base - t;
          if (w > floor(maxInt / baseMinusT)) {
            error('overflow');
          }
  
          w *= baseMinusT;
  
        }
  
        out = output.length + 1;
        bias = adapt(i - oldi, out, oldi == 0);
  
        // `i` was supposed to wrap around from `out` to `0`,
        // incrementing `n` each time, so we'll fix that now:
        if (floor(i / out) > maxInt - n) {
          error('overflow');
        }
  
        n += floor(i / out);
        i %= out;
  
        // Insert `n` at position `i` of the output
        output.splice(i++, 0, n);
  
      }
  
      return ucs2encode(output);
    }
  
    /**
     * Converts a string of Unicode symbols (e.g. a domain name label) to a
     * Punycode string of ASCII-only symbols.
     * @memberOf punycode
     * @param {String} input The string of Unicode symbols.
     * @returns {String} The resulting Punycode string of ASCII-only symbols.
     */
    function encode(input) {
      var n,
          delta,
          handledCPCount,
          basicLength,
          bias,
          j,
          m,
          q,
          k,
          t,
          currentValue,
          output = [],
          /** `inputLength` will hold the number of code points in `input`. */
          inputLength,
          /** Cached calculation results */
          handledCPCountPlusOne,
          baseMinusT,
          qMinusT;
  
      // Convert the input in UCS-2 to Unicode
      input = ucs2decode(input);
  
      // Cache the length
      inputLength = input.length;
  
      // Initialize the state
      n = initialN;
      delta = 0;
      bias = initialBias;
  
      // Handle the basic code points
      for (j = 0; j < inputLength; ++j) {
        currentValue = input[j];
        if (currentValue < 0x80) {
          output.push(stringFromCharCode(currentValue));
        }
      }
  
      handledCPCount = basicLength = output.length;
  
      // `handledCPCount` is the number of code points that have been handled;
      // `basicLength` is the number of basic code points.
  
      // Finish the basic string - if it is not empty - with a delimiter
      if (basicLength) {
        output.push(delimiter);
      }
  
      // Main encoding loop:
      while (handledCPCount < inputLength) {
  
        // All non-basic code points < n have been handled already. Find the next
        // larger one:
        for (m = maxInt, j = 0; j < inputLength; ++j) {
          currentValue = input[j];
          if (currentValue >= n && currentValue < m) {
            m = currentValue;
          }
        }
  
        // Increase `delta` enough to advance the decoder's <n,i> state to <m,0>,
        // but guard against overflow
        handledCPCountPlusOne = handledCPCount + 1;
        if (m - n > floor((maxInt - delta) / handledCPCountPlusOne)) {
          error('overflow');
        }
  
        delta += (m - n) * handledCPCountPlusOne;
        n = m;
  
        for (j = 0; j < inputLength; ++j) {
          currentValue = input[j];
  
          if (currentValue < n && ++delta > maxInt) {
            error('overflow');
          }
  
          if (currentValue == n) {
            // Represent delta as a generalized variable-length integer
            for (q = delta, k = base; /* no condition */; k += base) {
              t = k <= bias ? tMin : (k >= bias + tMax ? tMax : k - bias);
              if (q < t) {
                break;
              }
              qMinusT = q - t;
              baseMinusT = base - t;
              output.push(
                stringFromCharCode(digitToBasic(t + qMinusT % baseMinusT, 0))
              );
              q = floor(qMinusT / baseMinusT);
            }
  
            output.push(stringFromCharCode(digitToBasic(q, 0)));
            bias = adapt(delta, handledCPCountPlusOne, handledCPCount == basicLength);
            delta = 0;
            ++handledCPCount;
          }
        }
  
        ++delta;
        ++n;
  
      }
      return output.join('');
    }
  
    /**
     * Converts a Punycode string representing a domain name or an email address
     * to Unicode. Only the Punycoded parts of the input will be converted, i.e.
     * it doesn't matter if you call it on a string that has already been
     * converted to Unicode.
     * @memberOf punycode
     * @param {String} input The Punycoded domain name or email address to
     * convert to Unicode.
     * @returns {String} The Unicode representation of the given Punycode
     * string.
     */
    function toUnicode(input) {
      return mapDomain(input, function(string) {
        return regexPunycode.test(string)
          ? decode(string.slice(4).toLowerCase())
          : string;
      });
    }
  
    /**
     * Converts a Unicode string representing a domain name or an email address to
     * Punycode. Only the non-ASCII parts of the domain name will be converted,
     * i.e. it doesn't matter if you call it with a domain that's already in
     * ASCII.
     * @memberOf punycode
     * @param {String} input The domain name or email address to convert, as a
     * Unicode string.
     * @returns {String} The Punycode representation of the given domain name or
     * email address.
     */
    function toASCII(input) {
      return mapDomain(input, function(string) {
        return regexNonASCII.test(string)
          ? 'xn--' + encode(string)
          : string;
      });
    }
  
    /*--------------------------------------------------------------------------*/
  
    /** Define the public API */
    punycode = {
      /**
       * A string representing the current Punycode.js version number.
       * @memberOf punycode
       * @type String
       */
      'version': '1.3.2',
      /**
       * An object of methods to convert from JavaScript's internal character
       * representation (UCS-2) to Unicode code points, and back.
       * @see <https://mathiasbynens.be/notes/javascript-encoding>
       * @memberOf punycode
       * @type Object
       */
      'ucs2': {
        'decode': ucs2decode,
        'encode': ucs2encode
      },
      'decode': decode,
      'encode': encode,
      'toASCII': toASCII,
      'toUnicode': toUnicode
    };
  
    /** Expose `punycode` */
    // Some AMD build optimizers, like r.js, check for specific condition patterns
    // like the following:
    if (
      typeof define == 'function' &&
      typeof define.amd == 'object' &&
      define.amd
    ) {
      define('punycode', function() {
        return punycode;
      });
    } else if (freeExports && freeModule) {
      if (module.exports == freeExports) { // in Node.js or RingoJS v0.8.0+
        freeModule.exports = punycode;
      } else { // in Narwhal or RingoJS v0.7.0-
        for (key in punycode) {
          punycode.hasOwnProperty(key) && (freeExports[key] = punycode[key]);
        }
      }
    } else { // in Rhino or a web browser
      root.punycode = punycode;
    }
  
  }(this));
  
  }).call(this)}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
  },{}],12:[function(require,module,exports){
  // Copyright Joyent, Inc. and other Node contributors.
  //
  // Permission is hereby granted, free of charge, to any person obtaining a
  // copy of this software and associated documentation files (the
  // "Software"), to deal in the Software without restriction, including
  // without limitation the rights to use, copy, modify, merge, publish,
  // distribute, sublicense, and/or sell copies of the Software, and to permit
  // persons to whom the Software is furnished to do so, subject to the
  // following conditions:
  //
  // The above copyright notice and this permission notice shall be included
  // in all copies or substantial portions of the Software.
  //
  // THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
  // OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
  // MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
  // NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
  // DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
  // OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
  // USE OR OTHER DEALINGS IN THE SOFTWARE.
  
  'use strict';
  
  // If obj.hasOwnProperty has been overridden, then calling
  // obj.hasOwnProperty(prop) will break.
  // See: https://github.com/joyent/node/issues/1707
  function hasOwnProperty(obj, prop) {
    return Object.prototype.hasOwnProperty.call(obj, prop);
  }
  
  module.exports = function(qs, sep, eq, options) {
    sep = sep || '&';
    eq = eq || '=';
    var obj = {};
  
    if (typeof qs !== 'string' || qs.length === 0) {
      return obj;
    }
  
    var regexp = /\+/g;
    qs = qs.split(sep);
  
    var maxKeys = 1000;
    if (options && typeof options.maxKeys === 'number') {
      maxKeys = options.maxKeys;
    }
  
    var len = qs.length;
    // maxKeys <= 0 means that we should not limit keys count
    if (maxKeys > 0 && len > maxKeys) {
      len = maxKeys;
    }
  
    for (var i = 0; i < len; ++i) {
      var x = qs[i].replace(regexp, '%20'),
          idx = x.indexOf(eq),
          kstr, vstr, k, v;
  
      if (idx >= 0) {
        kstr = x.substr(0, idx);
        vstr = x.substr(idx + 1);
      } else {
        kstr = x;
        vstr = '';
      }
  
      k = decodeURIComponent(kstr);
      v = decodeURIComponent(vstr);
  
      if (!hasOwnProperty(obj, k)) {
        obj[k] = v;
      } else if (isArray(obj[k])) {
        obj[k].push(v);
      } else {
        obj[k] = [obj[k], v];
      }
    }
  
    return obj;
  };
  
  var isArray = Array.isArray || function (xs) {
    return Object.prototype.toString.call(xs) === '[object Array]';
  };
  
  },{}],13:[function(require,module,exports){
  // Copyright Joyent, Inc. and other Node contributors.
  //
  // Permission is hereby granted, free of charge, to any person obtaining a
  // copy of this software and associated documentation files (the
  // "Software"), to deal in the Software without restriction, including
  // without limitation the rights to use, copy, modify, merge, publish,
  // distribute, sublicense, and/or sell copies of the Software, and to permit
  // persons to whom the Software is furnished to do so, subject to the
  // following conditions:
  //
  // The above copyright notice and this permission notice shall be included
  // in all copies or substantial portions of the Software.
  //
  // THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
  // OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
  // MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
  // NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
  // DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
  // OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
  // USE OR OTHER DEALINGS IN THE SOFTWARE.
  
  'use strict';
  
  var stringifyPrimitive = function(v) {
    switch (typeof v) {
      case 'string':
        return v;
  
      case 'boolean':
        return v ? 'true' : 'false';
  
      case 'number':
        return isFinite(v) ? v : '';
  
      default:
        return '';
    }
  };
  
  module.exports = function(obj, sep, eq, name) {
    sep = sep || '&';
    eq = eq || '=';
    if (obj === null) {
      obj = undefined;
    }
  
    if (typeof obj === 'object') {
      return map(objectKeys(obj), function(k) {
        var ks = encodeURIComponent(stringifyPrimitive(k)) + eq;
        if (isArray(obj[k])) {
          return map(obj[k], function(v) {
            return ks + encodeURIComponent(stringifyPrimitive(v));
          }).join(sep);
        } else {
          return ks + encodeURIComponent(stringifyPrimitive(obj[k]));
        }
      }).join(sep);
  
    }
  
    if (!name) return '';
    return encodeURIComponent(stringifyPrimitive(name)) + eq +
           encodeURIComponent(stringifyPrimitive(obj));
  };
  
  var isArray = Array.isArray || function (xs) {
    return Object.prototype.toString.call(xs) === '[object Array]';
  };
  
  function map (xs, f) {
    if (xs.map) return xs.map(f);
    var res = [];
    for (var i = 0; i < xs.length; i++) {
      res.push(f(xs[i], i));
    }
    return res;
  }
  
  var objectKeys = Object.keys || function (obj) {
    var res = [];
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) res.push(key);
    }
    return res;
  };
  
  },{}],14:[function(require,module,exports){
  'use strict';
  
  exports.decode = exports.parse = require('./decode');
  exports.encode = exports.stringify = require('./encode');
  
  },{"./decode":12,"./encode":13}],15:[function(require,module,exports){
  // Copyright Joyent, Inc. and other Node contributors.
  //
  // Permission is hereby granted, free of charge, to any person obtaining a
  // copy of this software and associated documentation files (the
  // "Software"), to deal in the Software without restriction, including
  // without limitation the rights to use, copy, modify, merge, publish,
  // distribute, sublicense, and/or sell copies of the Software, and to permit
  // persons to whom the Software is furnished to do so, subject to the
  // following conditions:
  //
  // The above copyright notice and this permission notice shall be included
  // in all copies or substantial portions of the Software.
  //
  // THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
  // OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
  // MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
  // NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
  // DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
  // OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
  // USE OR OTHER DEALINGS IN THE SOFTWARE.
  
  'use strict';
  
  var punycode = require('punycode');
  var util = require('./util');
  
  exports.parse = urlParse;
  exports.resolve = urlResolve;
  exports.resolveObject = urlResolveObject;
  exports.format = urlFormat;
  
  exports.Url = Url;
  
  function Url() {
    this.protocol = null;
    this.slashes = null;
    this.auth = null;
    this.host = null;
    this.port = null;
    this.hostname = null;
    this.hash = null;
    this.search = null;
    this.query = null;
    this.pathname = null;
    this.path = null;
    this.href = null;
  }
  
  // Reference: RFC 3986, RFC 1808, RFC 2396
  
  // define these here so at least they only have to be
  // compiled once on the first module load.
  var protocolPattern = /^([a-z0-9.+-]+:)/i,
      portPattern = /:[0-9]*$/,
  
      // Special case for a simple path URL
      simplePathPattern = /^(\/\/?(?!\/)[^\?\s]*)(\?[^\s]*)?$/,
  
      // RFC 2396: characters reserved for delimiting URLs.
      // We actually just auto-escape these.
      delims = ['<', '>', '"', '`', ' ', '\r', '\n', '\t'],
  
      // RFC 2396: characters not allowed for various reasons.
      unwise = ['{', '}', '|', '\\', '^', '`'].concat(delims),
  
      // Allowed by RFCs, but cause of XSS attacks.  Always escape these.
      autoEscape = ['\''].concat(unwise),
      // Characters that are never ever allowed in a hostname.
      // Note that any invalid chars are also handled, but these
      // are the ones that are *expected* to be seen, so we fast-path
      // them.
      nonHostChars = ['%', '/', '?', ';', '#'].concat(autoEscape),
      hostEndingChars = ['/', '?', '#'],
      hostnameMaxLen = 255,
      hostnamePartPattern = /^[+a-z0-9A-Z_-]{0,63}$/,
      hostnamePartStart = /^([+a-z0-9A-Z_-]{0,63})(.*)$/,
      // protocols that can allow "unsafe" and "unwise" chars.
      unsafeProtocol = {
        'javascript': true,
        'javascript:': true
      },
      // protocols that never have a hostname.
      hostlessProtocol = {
        'javascript': true,
        'javascript:': true
      },
      // protocols that always contain a // bit.
      slashedProtocol = {
        'http': true,
        'https': true,
        'ftp': true,
        'gopher': true,
        'file': true,
        'http:': true,
        'https:': true,
        'ftp:': true,
        'gopher:': true,
        'file:': true
      },
      querystring = require('querystring');
  
  function urlParse(url, parseQueryString, slashesDenoteHost) {
    if (url && util.isObject(url) && url instanceof Url) return url;
  
    var u = new Url;
    u.parse(url, parseQueryString, slashesDenoteHost);
    return u;
  }
  
  Url.prototype.parse = function(url, parseQueryString, slashesDenoteHost) {
    if (!util.isString(url)) {
      throw new TypeError("Parameter 'url' must be a string, not " + typeof url);
    }
  
    // Copy chrome, IE, opera backslash-handling behavior.
    // Back slashes before the query string get converted to forward slashes
    // See: https://code.google.com/p/chromium/issues/detail?id=25916
    var queryIndex = url.indexOf('?'),
        splitter =
            (queryIndex !== -1 && queryIndex < url.indexOf('#')) ? '?' : '#',
        uSplit = url.split(splitter),
        slashRegex = /\\/g;
    uSplit[0] = uSplit[0].replace(slashRegex, '/');
    url = uSplit.join(splitter);
  
    var rest = url;
  
    // trim before proceeding.
    // This is to support parse stuff like "  http://foo.com  \n"
    rest = rest.trim();
  
    if (!slashesDenoteHost && url.split('#').length === 1) {
      // Try fast path regexp
      var simplePath = simplePathPattern.exec(rest);
      if (simplePath) {
        this.path = rest;
        this.href = rest;
        this.pathname = simplePath[1];
        if (simplePath[2]) {
          this.search = simplePath[2];
          if (parseQueryString) {
            this.query = querystring.parse(this.search.substr(1));
          } else {
            this.query = this.search.substr(1);
          }
        } else if (parseQueryString) {
          this.search = '';
          this.query = {};
        }
        return this;
      }
    }
  
    var proto = protocolPattern.exec(rest);
    if (proto) {
      proto = proto[0];
      var lowerProto = proto.toLowerCase();
      this.protocol = lowerProto;
      rest = rest.substr(proto.length);
    }
  
    // figure out if it's got a host
    // user@server is *always* interpreted as a hostname, and url
    // resolution will treat //foo/bar as host=foo,path=bar because that's
    // how the browser resolves relative URLs.
    if (slashesDenoteHost || proto || rest.match(/^\/\/[^@\/]+@[^@\/]+/)) {
      var slashes = rest.substr(0, 2) === '//';
      if (slashes && !(proto && hostlessProtocol[proto])) {
        rest = rest.substr(2);
        this.slashes = true;
      }
    }
  
    if (!hostlessProtocol[proto] &&
        (slashes || (proto && !slashedProtocol[proto]))) {
  
      // there's a hostname.
      // the first instance of /, ?, ;, or # ends the host.
      //
      // If there is an @ in the hostname, then non-host chars *are* allowed
      // to the left of the last @ sign, unless some host-ending character
      // comes *before* the @-sign.
      // URLs are obnoxious.
      //
      // ex:
      // http://a@b@c/ => user:a@b host:c
      // http://a@b?@c => user:a host:c path:/?@c
  
      // v0.12 TODO(isaacs): This is not quite how Chrome does things.
      // Review our test case against browsers more comprehensively.
  
      // find the first instance of any hostEndingChars
      var hostEnd = -1;
      for (var i = 0; i < hostEndingChars.length; i++) {
        var hec = rest.indexOf(hostEndingChars[i]);
        if (hec !== -1 && (hostEnd === -1 || hec < hostEnd))
          hostEnd = hec;
      }
  
      // at this point, either we have an explicit point where the
      // auth portion cannot go past, or the last @ char is the decider.
      var auth, atSign;
      if (hostEnd === -1) {
        // atSign can be anywhere.
        atSign = rest.lastIndexOf('@');
      } else {
        // atSign must be in auth portion.
        // http://a@b/c@d => host:b auth:a path:/c@d
        atSign = rest.lastIndexOf('@', hostEnd);
      }
  
      // Now we have a portion which is definitely the auth.
      // Pull that off.
      if (atSign !== -1) {
        auth = rest.slice(0, atSign);
        rest = rest.slice(atSign + 1);
        this.auth = decodeURIComponent(auth);
      }
  
      // the host is the remaining to the left of the first non-host char
      hostEnd = -1;
      for (var i = 0; i < nonHostChars.length; i++) {
        var hec = rest.indexOf(nonHostChars[i]);
        if (hec !== -1 && (hostEnd === -1 || hec < hostEnd))
          hostEnd = hec;
      }
      // if we still have not hit it, then the entire thing is a host.
      if (hostEnd === -1)
        hostEnd = rest.length;
  
      this.host = rest.slice(0, hostEnd);
      rest = rest.slice(hostEnd);
  
      // pull out port.
      this.parseHost();
  
      // we've indicated that there is a hostname,
      // so even if it's empty, it has to be present.
      this.hostname = this.hostname || '';
  
      // if hostname begins with [ and ends with ]
      // assume that it's an IPv6 address.
      var ipv6Hostname = this.hostname[0] === '[' &&
          this.hostname[this.hostname.length - 1] === ']';
  
      // validate a little.
      if (!ipv6Hostname) {
        var hostparts = this.hostname.split(/\./);
        for (var i = 0, l = hostparts.length; i < l; i++) {
          var part = hostparts[i];
          if (!part) continue;
          if (!part.match(hostnamePartPattern)) {
            var newpart = '';
            for (var j = 0, k = part.length; j < k; j++) {
              if (part.charCodeAt(j) > 127) {
                // we replace non-ASCII char with a temporary placeholder
                // we need this to make sure size of hostname is not
                // broken by replacing non-ASCII by nothing
                newpart += 'x';
              } else {
                newpart += part[j];
              }
            }
            // we test again with ASCII char only
            if (!newpart.match(hostnamePartPattern)) {
              var validParts = hostparts.slice(0, i);
              var notHost = hostparts.slice(i + 1);
              var bit = part.match(hostnamePartStart);
              if (bit) {
                validParts.push(bit[1]);
                notHost.unshift(bit[2]);
              }
              if (notHost.length) {
                rest = '/' + notHost.join('.') + rest;
              }
              this.hostname = validParts.join('.');
              break;
            }
          }
        }
      }
  
      if (this.hostname.length > hostnameMaxLen) {
        this.hostname = '';
      } else {
        // hostnames are always lower case.
        this.hostname = this.hostname.toLowerCase();
      }
  
      if (!ipv6Hostname) {
        // IDNA Support: Returns a punycoded representation of "domain".
        // It only converts parts of the domain name that
        // have non-ASCII characters, i.e. it doesn't matter if
        // you call it with a domain that already is ASCII-only.
        this.hostname = punycode.toASCII(this.hostname);
      }
  
      var p = this.port ? ':' + this.port : '';
      var h = this.hostname || '';
      this.host = h + p;
      this.href += this.host;
  
      // strip [ and ] from the hostname
      // the host field still retains them, though
      if (ipv6Hostname) {
        this.hostname = this.hostname.substr(1, this.hostname.length - 2);
        if (rest[0] !== '/') {
          rest = '/' + rest;
        }
      }
    }
  
    // now rest is set to the post-host stuff.
    // chop off any delim chars.
    if (!unsafeProtocol[lowerProto]) {
  
      // First, make 100% sure that any "autoEscape" chars get
      // escaped, even if encodeURIComponent doesn't think they
      // need to be.
      for (var i = 0, l = autoEscape.length; i < l; i++) {
        var ae = autoEscape[i];
        if (rest.indexOf(ae) === -1)
          continue;
        var esc = encodeURIComponent(ae);
        if (esc === ae) {
          esc = escape(ae);
        }
        rest = rest.split(ae).join(esc);
      }
    }
  
  
    // chop off from the tail first.
    var hash = rest.indexOf('#');
    if (hash !== -1) {
      // got a fragment string.
      this.hash = rest.substr(hash);
      rest = rest.slice(0, hash);
    }
    var qm = rest.indexOf('?');
    if (qm !== -1) {
      this.search = rest.substr(qm);
      this.query = rest.substr(qm + 1);
      if (parseQueryString) {
        this.query = querystring.parse(this.query);
      }
      rest = rest.slice(0, qm);
    } else if (parseQueryString) {
      // no query string, but parseQueryString still requested
      this.search = '';
      this.query = {};
    }
    if (rest) this.pathname = rest;
    if (slashedProtocol[lowerProto] &&
        this.hostname && !this.pathname) {
      this.pathname = '/';
    }
  
    //to support http.request
    if (this.pathname || this.search) {
      var p = this.pathname || '';
      var s = this.search || '';
      this.path = p + s;
    }
  
    // finally, reconstruct the href based on what has been validated.
    this.href = this.format();
    return this;
  };
  
  // format a parsed object into a url string
  function urlFormat(obj) {
    // ensure it's an object, and not a string url.
    // If it's an obj, this is a no-op.
    // this way, you can call url_format() on strings
    // to clean up potentially wonky urls.
    if (util.isString(obj)) obj = urlParse(obj);
    if (!(obj instanceof Url)) return Url.prototype.format.call(obj);
    return obj.format();
  }
  
  Url.prototype.format = function() {
    var auth = this.auth || '';
    if (auth) {
      auth = encodeURIComponent(auth);
      auth = auth.replace(/%3A/i, ':');
      auth += '@';
    }
  
    var protocol = this.protocol || '',
        pathname = this.pathname || '',
        hash = this.hash || '',
        host = false,
        query = '';
  
    if (this.host) {
      host = auth + this.host;
    } else if (this.hostname) {
      host = auth + (this.hostname.indexOf(':') === -1 ?
          this.hostname :
          '[' + this.hostname + ']');
      if (this.port) {
        host += ':' + this.port;
      }
    }
  
    if (this.query &&
        util.isObject(this.query) &&
        Object.keys(this.query).length) {
      query = querystring.stringify(this.query);
    }
  
    var search = this.search || (query && ('?' + query)) || '';
  
    if (protocol && protocol.substr(-1) !== ':') protocol += ':';
  
    // only the slashedProtocols get the //.  Not mailto:, xmpp:, etc.
    // unless they had them to begin with.
    if (this.slashes ||
        (!protocol || slashedProtocol[protocol]) && host !== false) {
      host = '//' + (host || '');
      if (pathname && pathname.charAt(0) !== '/') pathname = '/' + pathname;
    } else if (!host) {
      host = '';
    }
  
    if (hash && hash.charAt(0) !== '#') hash = '#' + hash;
    if (search && search.charAt(0) !== '?') search = '?' + search;
  
    pathname = pathname.replace(/[?#]/g, function(match) {
      return encodeURIComponent(match);
    });
    search = search.replace('#', '%23');
  
    return protocol + host + pathname + search + hash;
  };
  
  function urlResolve(source, relative) {
    return urlParse(source, false, true).resolve(relative);
  }
  
  Url.prototype.resolve = function(relative) {
    return this.resolveObject(urlParse(relative, false, true)).format();
  };
  
  function urlResolveObject(source, relative) {
    if (!source) return relative;
    return urlParse(source, false, true).resolveObject(relative);
  }
  
  Url.prototype.resolveObject = function(relative) {
    if (util.isString(relative)) {
      var rel = new Url();
      rel.parse(relative, false, true);
      relative = rel;
    }
  
    var result = new Url();
    var tkeys = Object.keys(this);
    for (var tk = 0; tk < tkeys.length; tk++) {
      var tkey = tkeys[tk];
      result[tkey] = this[tkey];
    }
  
    // hash is always overridden, no matter what.
    // even href="" will remove it.
    result.hash = relative.hash;
  
    // if the relative url is empty, then there's nothing left to do here.
    if (relative.href === '') {
      result.href = result.format();
      return result;
    }
  
    // hrefs like //foo/bar always cut to the protocol.
    if (relative.slashes && !relative.protocol) {
      // take everything except the protocol from relative
      var rkeys = Object.keys(relative);
      for (var rk = 0; rk < rkeys.length; rk++) {
        var rkey = rkeys[rk];
        if (rkey !== 'protocol')
          result[rkey] = relative[rkey];
      }
  
      //urlParse appends trailing / to urls like http://www.example.com
      if (slashedProtocol[result.protocol] &&
          result.hostname && !result.pathname) {
        result.path = result.pathname = '/';
      }
  
      result.href = result.format();
      return result;
    }
  
    if (relative.protocol && relative.protocol !== result.protocol) {
      // if it's a known url protocol, then changing
      // the protocol does weird things
      // first, if it's not file:, then we MUST have a host,
      // and if there was a path
      // to begin with, then we MUST have a path.
      // if it is file:, then the host is dropped,
      // because that's known to be hostless.
      // anything else is assumed to be absolute.
      if (!slashedProtocol[relative.protocol]) {
        var keys = Object.keys(relative);
        for (var v = 0; v < keys.length; v++) {
          var k = keys[v];
          result[k] = relative[k];
        }
        result.href = result.format();
        return result;
      }
  
      result.protocol = relative.protocol;
      if (!relative.host && !hostlessProtocol[relative.protocol]) {
        var relPath = (relative.pathname || '').split('/');
        while (relPath.length && !(relative.host = relPath.shift()));
        if (!relative.host) relative.host = '';
        if (!relative.hostname) relative.hostname = '';
        if (relPath[0] !== '') relPath.unshift('');
        if (relPath.length < 2) relPath.unshift('');
        result.pathname = relPath.join('/');
      } else {
        result.pathname = relative.pathname;
      }
      result.search = relative.search;
      result.query = relative.query;
      result.host = relative.host || '';
      result.auth = relative.auth;
      result.hostname = relative.hostname || relative.host;
      result.port = relative.port;
      // to support http.request
      if (result.pathname || result.search) {
        var p = result.pathname || '';
        var s = result.search || '';
        result.path = p + s;
      }
      result.slashes = result.slashes || relative.slashes;
      result.href = result.format();
      return result;
    }
  
    var isSourceAbs = (result.pathname && result.pathname.charAt(0) === '/'),
        isRelAbs = (
            relative.host ||
            relative.pathname && relative.pathname.charAt(0) === '/'
        ),
        mustEndAbs = (isRelAbs || isSourceAbs ||
                      (result.host && relative.pathname)),
        removeAllDots = mustEndAbs,
        srcPath = result.pathname && result.pathname.split('/') || [],
        relPath = relative.pathname && relative.pathname.split('/') || [],
        psychotic = result.protocol && !slashedProtocol[result.protocol];
  
    // if the url is a non-slashed url, then relative
    // links like ../.. should be able
    // to crawl up to the hostname, as well.  This is strange.
    // result.protocol has already been set by now.
    // Later on, put the first path part into the host field.
    if (psychotic) {
      result.hostname = '';
      result.port = null;
      if (result.host) {
        if (srcPath[0] === '') srcPath[0] = result.host;
        else srcPath.unshift(result.host);
      }
      result.host = '';
      if (relative.protocol) {
        relative.hostname = null;
        relative.port = null;
        if (relative.host) {
          if (relPath[0] === '') relPath[0] = relative.host;
          else relPath.unshift(relative.host);
        }
        relative.host = null;
      }
      mustEndAbs = mustEndAbs && (relPath[0] === '' || srcPath[0] === '');
    }
  
    if (isRelAbs) {
      // it's absolute.
      result.host = (relative.host || relative.host === '') ?
                    relative.host : result.host;
      result.hostname = (relative.hostname || relative.hostname === '') ?
                        relative.hostname : result.hostname;
      result.search = relative.search;
      result.query = relative.query;
      srcPath = relPath;
      // fall through to the dot-handling below.
    } else if (relPath.length) {
      // it's relative
      // throw away the existing file, and take the new path instead.
      if (!srcPath) srcPath = [];
      srcPath.pop();
      srcPath = srcPath.concat(relPath);
      result.search = relative.search;
      result.query = relative.query;
    } else if (!util.isNullOrUndefined(relative.search)) {
      // just pull out the search.
      // like href='?foo'.
      // Put this after the other two cases because it simplifies the booleans
      if (psychotic) {
        result.hostname = result.host = srcPath.shift();
        //occationaly the auth can get stuck only in host
        //this especially happens in cases like
        //url.resolveObject('mailto:local1@domain1', 'local2@domain2')
        var authInHost = result.host && result.host.indexOf('@') > 0 ?
                         result.host.split('@') : false;
        if (authInHost) {
          result.auth = authInHost.shift();
          result.host = result.hostname = authInHost.shift();
        }
      }
      result.search = relative.search;
      result.query = relative.query;
      //to support http.request
      if (!util.isNull(result.pathname) || !util.isNull(result.search)) {
        result.path = (result.pathname ? result.pathname : '') +
                      (result.search ? result.search : '');
      }
      result.href = result.format();
      return result;
    }
  
    if (!srcPath.length) {
      // no path at all.  easy.
      // we've already handled the other stuff above.
      result.pathname = null;
      //to support http.request
      if (result.search) {
        result.path = '/' + result.search;
      } else {
        result.path = null;
      }
      result.href = result.format();
      return result;
    }
  
    // if a url ENDs in . or .., then it must get a trailing slash.
    // however, if it ends in anything else non-slashy,
    // then it must NOT get a trailing slash.
    var last = srcPath.slice(-1)[0];
    var hasTrailingSlash = (
        (result.host || relative.host || srcPath.length > 1) &&
        (last === '.' || last === '..') || last === '');
  
    // strip single dots, resolve double dots to parent dir
    // if the path tries to go above the root, `up` ends up > 0
    var up = 0;
    for (var i = srcPath.length; i >= 0; i--) {
      last = srcPath[i];
      if (last === '.') {
        srcPath.splice(i, 1);
      } else if (last === '..') {
        srcPath.splice(i, 1);
        up++;
      } else if (up) {
        srcPath.splice(i, 1);
        up--;
      }
    }
  
    // if the path is allowed to go above the root, restore leading ..s
    if (!mustEndAbs && !removeAllDots) {
      for (; up--; up) {
        srcPath.unshift('..');
      }
    }
  
    if (mustEndAbs && srcPath[0] !== '' &&
        (!srcPath[0] || srcPath[0].charAt(0) !== '/')) {
      srcPath.unshift('');
    }
  
    if (hasTrailingSlash && (srcPath.join('/').substr(-1) !== '/')) {
      srcPath.push('');
    }
  
    var isAbsolute = srcPath[0] === '' ||
        (srcPath[0] && srcPath[0].charAt(0) === '/');
  
    // put the host back
    if (psychotic) {
      result.hostname = result.host = isAbsolute ? '' :
                                      srcPath.length ? srcPath.shift() : '';
      //occationaly the auth can get stuck only in host
      //this especially happens in cases like
      //url.resolveObject('mailto:local1@domain1', 'local2@domain2')
      var authInHost = result.host && result.host.indexOf('@') > 0 ?
                       result.host.split('@') : false;
      if (authInHost) {
        result.auth = authInHost.shift();
        result.host = result.hostname = authInHost.shift();
      }
    }
  
    mustEndAbs = mustEndAbs || (result.host && srcPath.length);
  
    if (mustEndAbs && !isAbsolute) {
      srcPath.unshift('');
    }
  
    if (!srcPath.length) {
      result.pathname = null;
      result.path = null;
    } else {
      result.pathname = srcPath.join('/');
    }
  
    //to support request.http
    if (!util.isNull(result.pathname) || !util.isNull(result.search)) {
      result.path = (result.pathname ? result.pathname : '') +
                    (result.search ? result.search : '');
    }
    result.auth = relative.auth || result.auth;
    result.slashes = result.slashes || relative.slashes;
    result.href = result.format();
    return result;
  };
  
  Url.prototype.parseHost = function() {
    var host = this.host;
    var port = portPattern.exec(host);
    if (port) {
      port = port[0];
      if (port !== ':') {
        this.port = port.substr(1);
      }
      host = host.substr(0, host.length - port.length);
    }
    if (host) this.hostname = host;
  };
  
  },{"./util":16,"punycode":11,"querystring":14}],16:[function(require,module,exports){
  'use strict';
  
  module.exports = {
    isString: function(arg) {
      return typeof(arg) === 'string';
    },
    isObject: function(arg) {
      return typeof(arg) === 'object' && arg !== null;
    },
    isNull: function(arg) {
      return arg === null;
    },
    isNullOrUndefined: function(arg) {
      return arg == null;
    }
  };
  
  },{}],17:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  Object.defineProperty(exports, "v1", {
    enumerable: true,
    get: function () {
      return _v.default;
    }
  });
  Object.defineProperty(exports, "v3", {
    enumerable: true,
    get: function () {
      return _v2.default;
    }
  });
  Object.defineProperty(exports, "v4", {
    enumerable: true,
    get: function () {
      return _v3.default;
    }
  });
  Object.defineProperty(exports, "v5", {
    enumerable: true,
    get: function () {
      return _v4.default;
    }
  });
  Object.defineProperty(exports, "NIL", {
    enumerable: true,
    get: function () {
      return _nil.default;
    }
  });
  Object.defineProperty(exports, "version", {
    enumerable: true,
    get: function () {
      return _version.default;
    }
  });
  Object.defineProperty(exports, "validate", {
    enumerable: true,
    get: function () {
      return _validate.default;
    }
  });
  Object.defineProperty(exports, "stringify", {
    enumerable: true,
    get: function () {
      return _stringify.default;
    }
  });
  Object.defineProperty(exports, "parse", {
    enumerable: true,
    get: function () {
      return _parse.default;
    }
  });
  
  var _v = _interopRequireDefault(require("./v1.js"));
  
  var _v2 = _interopRequireDefault(require("./v3.js"));
  
  var _v3 = _interopRequireDefault(require("./v4.js"));
  
  var _v4 = _interopRequireDefault(require("./v5.js"));
  
  var _nil = _interopRequireDefault(require("./nil.js"));
  
  var _version = _interopRequireDefault(require("./version.js"));
  
  var _validate = _interopRequireDefault(require("./validate.js"));
  
  var _stringify = _interopRequireDefault(require("./stringify.js"));
  
  var _parse = _interopRequireDefault(require("./parse.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  },{"./nil.js":19,"./parse.js":20,"./stringify.js":24,"./v1.js":25,"./v3.js":26,"./v4.js":28,"./v5.js":29,"./validate.js":30,"./version.js":31}],18:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  /*
   * Browser-compatible JavaScript MD5
   *
   * Modification of JavaScript MD5
   * https://github.com/blueimp/JavaScript-MD5
   *
   * Copyright 2011, Sebastian Tschan
   * https://blueimp.net
   *
   * Licensed under the MIT license:
   * https://opensource.org/licenses/MIT
   *
   * Based on
   * A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
   * Digest Algorithm, as defined in RFC 1321.
   * Version 2.2 Copyright (C) Paul Johnston 1999 - 2009
   * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
   * Distributed under the BSD License
   * See http://pajhome.org.uk/crypt/md5 for more info.
   */
  function md5(bytes) {
    if (typeof bytes === 'string') {
      const msg = unescape(encodeURIComponent(bytes)); // UTF8 escape
  
      bytes = new Uint8Array(msg.length);
  
      for (let i = 0; i < msg.length; ++i) {
        bytes[i] = msg.charCodeAt(i);
      }
    }
  
    return md5ToHexEncodedArray(wordsToMd5(bytesToWords(bytes), bytes.length * 8));
  }
  /*
   * Convert an array of little-endian words to an array of bytes
   */
  
  
  function md5ToHexEncodedArray(input) {
    const output = [];
    const length32 = input.length * 32;
    const hexTab = '0123456789abcdef';
  
    for (let i = 0; i < length32; i += 8) {
      const x = input[i >> 5] >>> i % 32 & 0xff;
      const hex = parseInt(hexTab.charAt(x >>> 4 & 0x0f) + hexTab.charAt(x & 0x0f), 16);
      output.push(hex);
    }
  
    return output;
  }
  /**
   * Calculate output length with padding and bit length
   */
  
  
  function getOutputLength(inputLength8) {
    return (inputLength8 + 64 >>> 9 << 4) + 14 + 1;
  }
  /*
   * Calculate the MD5 of an array of little-endian words, and a bit length.
   */
  
  
  function wordsToMd5(x, len) {
    /* append padding */
    x[len >> 5] |= 0x80 << len % 32;
    x[getOutputLength(len) - 1] = len;
    let a = 1732584193;
    let b = -271733879;
    let c = -1732584194;
    let d = 271733878;
  
    for (let i = 0; i < x.length; i += 16) {
      const olda = a;
      const oldb = b;
      const oldc = c;
      const oldd = d;
      a = md5ff(a, b, c, d, x[i], 7, -680876936);
      d = md5ff(d, a, b, c, x[i + 1], 12, -389564586);
      c = md5ff(c, d, a, b, x[i + 2], 17, 606105819);
      b = md5ff(b, c, d, a, x[i + 3], 22, -1044525330);
      a = md5ff(a, b, c, d, x[i + 4], 7, -176418897);
      d = md5ff(d, a, b, c, x[i + 5], 12, 1200080426);
      c = md5ff(c, d, a, b, x[i + 6], 17, -1473231341);
      b = md5ff(b, c, d, a, x[i + 7], 22, -45705983);
      a = md5ff(a, b, c, d, x[i + 8], 7, 1770035416);
      d = md5ff(d, a, b, c, x[i + 9], 12, -1958414417);
      c = md5ff(c, d, a, b, x[i + 10], 17, -42063);
      b = md5ff(b, c, d, a, x[i + 11], 22, -1990404162);
      a = md5ff(a, b, c, d, x[i + 12], 7, 1804603682);
      d = md5ff(d, a, b, c, x[i + 13], 12, -40341101);
      c = md5ff(c, d, a, b, x[i + 14], 17, -1502002290);
      b = md5ff(b, c, d, a, x[i + 15], 22, 1236535329);
      a = md5gg(a, b, c, d, x[i + 1], 5, -165796510);
      d = md5gg(d, a, b, c, x[i + 6], 9, -1069501632);
      c = md5gg(c, d, a, b, x[i + 11], 14, 643717713);
      b = md5gg(b, c, d, a, x[i], 20, -373897302);
      a = md5gg(a, b, c, d, x[i + 5], 5, -701558691);
      d = md5gg(d, a, b, c, x[i + 10], 9, 38016083);
      c = md5gg(c, d, a, b, x[i + 15], 14, -660478335);
      b = md5gg(b, c, d, a, x[i + 4], 20, -405537848);
      a = md5gg(a, b, c, d, x[i + 9], 5, 568446438);
      d = md5gg(d, a, b, c, x[i + 14], 9, -1019803690);
      c = md5gg(c, d, a, b, x[i + 3], 14, -187363961);
      b = md5gg(b, c, d, a, x[i + 8], 20, 1163531501);
      a = md5gg(a, b, c, d, x[i + 13], 5, -1444681467);
      d = md5gg(d, a, b, c, x[i + 2], 9, -51403784);
      c = md5gg(c, d, a, b, x[i + 7], 14, 1735328473);
      b = md5gg(b, c, d, a, x[i + 12], 20, -1926607734);
      a = md5hh(a, b, c, d, x[i + 5], 4, -378558);
      d = md5hh(d, a, b, c, x[i + 8], 11, -2022574463);
      c = md5hh(c, d, a, b, x[i + 11], 16, 1839030562);
      b = md5hh(b, c, d, a, x[i + 14], 23, -35309556);
      a = md5hh(a, b, c, d, x[i + 1], 4, -1530992060);
      d = md5hh(d, a, b, c, x[i + 4], 11, 1272893353);
      c = md5hh(c, d, a, b, x[i + 7], 16, -155497632);
      b = md5hh(b, c, d, a, x[i + 10], 23, -1094730640);
      a = md5hh(a, b, c, d, x[i + 13], 4, 681279174);
      d = md5hh(d, a, b, c, x[i], 11, -358537222);
      c = md5hh(c, d, a, b, x[i + 3], 16, -722521979);
      b = md5hh(b, c, d, a, x[i + 6], 23, 76029189);
      a = md5hh(a, b, c, d, x[i + 9], 4, -640364487);
      d = md5hh(d, a, b, c, x[i + 12], 11, -421815835);
      c = md5hh(c, d, a, b, x[i + 15], 16, 530742520);
      b = md5hh(b, c, d, a, x[i + 2], 23, -995338651);
      a = md5ii(a, b, c, d, x[i], 6, -198630844);
      d = md5ii(d, a, b, c, x[i + 7], 10, 1126891415);
      c = md5ii(c, d, a, b, x[i + 14], 15, -1416354905);
      b = md5ii(b, c, d, a, x[i + 5], 21, -57434055);
      a = md5ii(a, b, c, d, x[i + 12], 6, 1700485571);
      d = md5ii(d, a, b, c, x[i + 3], 10, -1894986606);
      c = md5ii(c, d, a, b, x[i + 10], 15, -1051523);
      b = md5ii(b, c, d, a, x[i + 1], 21, -2054922799);
      a = md5ii(a, b, c, d, x[i + 8], 6, 1873313359);
      d = md5ii(d, a, b, c, x[i + 15], 10, -30611744);
      c = md5ii(c, d, a, b, x[i + 6], 15, -1560198380);
      b = md5ii(b, c, d, a, x[i + 13], 21, 1309151649);
      a = md5ii(a, b, c, d, x[i + 4], 6, -145523070);
      d = md5ii(d, a, b, c, x[i + 11], 10, -1120210379);
      c = md5ii(c, d, a, b, x[i + 2], 15, 718787259);
      b = md5ii(b, c, d, a, x[i + 9], 21, -343485551);
      a = safeAdd(a, olda);
      b = safeAdd(b, oldb);
      c = safeAdd(c, oldc);
      d = safeAdd(d, oldd);
    }
  
    return [a, b, c, d];
  }
  /*
   * Convert an array bytes to an array of little-endian words
   * Characters >255 have their high-byte silently ignored.
   */
  
  
  function bytesToWords(input) {
    if (input.length === 0) {
      return [];
    }
  
    const length8 = input.length * 8;
    const output = new Uint32Array(getOutputLength(length8));
  
    for (let i = 0; i < length8; i += 8) {
      output[i >> 5] |= (input[i / 8] & 0xff) << i % 32;
    }
  
    return output;
  }
  /*
   * Add integers, wrapping at 2^32. This uses 16-bit operations internally
   * to work around bugs in some JS interpreters.
   */
  
  
  function safeAdd(x, y) {
    const lsw = (x & 0xffff) + (y & 0xffff);
    const msw = (x >> 16) + (y >> 16) + (lsw >> 16);
    return msw << 16 | lsw & 0xffff;
  }
  /*
   * Bitwise rotate a 32-bit number to the left.
   */
  
  
  function bitRotateLeft(num, cnt) {
    return num << cnt | num >>> 32 - cnt;
  }
  /*
   * These functions implement the four basic operations the algorithm uses.
   */
  
  
  function md5cmn(q, a, b, x, s, t) {
    return safeAdd(bitRotateLeft(safeAdd(safeAdd(a, q), safeAdd(x, t)), s), b);
  }
  
  function md5ff(a, b, c, d, x, s, t) {
    return md5cmn(b & c | ~b & d, a, b, x, s, t);
  }
  
  function md5gg(a, b, c, d, x, s, t) {
    return md5cmn(b & d | c & ~d, a, b, x, s, t);
  }
  
  function md5hh(a, b, c, d, x, s, t) {
    return md5cmn(b ^ c ^ d, a, b, x, s, t);
  }
  
  function md5ii(a, b, c, d, x, s, t) {
    return md5cmn(c ^ (b | ~d), a, b, x, s, t);
  }
  
  var _default = md5;
  exports.default = _default;
  },{}],19:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  var _default = '00000000-0000-0000-0000-000000000000';
  exports.default = _default;
  },{}],20:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _validate = _interopRequireDefault(require("./validate.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  function parse(uuid) {
    if (!(0, _validate.default)(uuid)) {
      throw TypeError('Invalid UUID');
    }
  
    let v;
    const arr = new Uint8Array(16); // Parse ########-....-....-....-............
  
    arr[0] = (v = parseInt(uuid.slice(0, 8), 16)) >>> 24;
    arr[1] = v >>> 16 & 0xff;
    arr[2] = v >>> 8 & 0xff;
    arr[3] = v & 0xff; // Parse ........-####-....-....-............
  
    arr[4] = (v = parseInt(uuid.slice(9, 13), 16)) >>> 8;
    arr[5] = v & 0xff; // Parse ........-....-####-....-............
  
    arr[6] = (v = parseInt(uuid.slice(14, 18), 16)) >>> 8;
    arr[7] = v & 0xff; // Parse ........-....-....-####-............
  
    arr[8] = (v = parseInt(uuid.slice(19, 23), 16)) >>> 8;
    arr[9] = v & 0xff; // Parse ........-....-....-....-############
    // (Use "/" to avoid 32-bit truncation when bit-shifting high-order bytes)
  
    arr[10] = (v = parseInt(uuid.slice(24, 36), 16)) / 0x10000000000 & 0xff;
    arr[11] = v / 0x100000000 & 0xff;
    arr[12] = v >>> 24 & 0xff;
    arr[13] = v >>> 16 & 0xff;
    arr[14] = v >>> 8 & 0xff;
    arr[15] = v & 0xff;
    return arr;
  }
  
  var _default = parse;
  exports.default = _default;
  },{"./validate.js":30}],21:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  var _default = /^(?:[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}|00000000-0000-0000-0000-000000000000)$/i;
  exports.default = _default;
  },{}],22:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = rng;
  // Unique ID creation requires a high quality random # generator. In the browser we therefore
  // require the crypto API and do not support built-in fallback to lower quality random number
  // generators (like Math.random()).
  let getRandomValues;
  const rnds8 = new Uint8Array(16);
  
  function rng() {
    // lazy load so that environments that need to polyfill have a chance to do so
    if (!getRandomValues) {
      // getRandomValues needs to be invoked in a context where "this" is a Crypto implementation. Also,
      // find the complete implementation of crypto (msCrypto) on IE11.
      getRandomValues = typeof crypto !== 'undefined' && crypto.getRandomValues && crypto.getRandomValues.bind(crypto) || typeof msCrypto !== 'undefined' && typeof msCrypto.getRandomValues === 'function' && msCrypto.getRandomValues.bind(msCrypto);
  
      if (!getRandomValues) {
        throw new Error('crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported');
      }
    }
  
    return getRandomValues(rnds8);
  }
  },{}],23:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  // Adapted from Chris Veness' SHA1 code at
  // http://www.movable-type.co.uk/scripts/sha1.html
  function f(s, x, y, z) {
    switch (s) {
      case 0:
        return x & y ^ ~x & z;
  
      case 1:
        return x ^ y ^ z;
  
      case 2:
        return x & y ^ x & z ^ y & z;
  
      case 3:
        return x ^ y ^ z;
    }
  }
  
  function ROTL(x, n) {
    return x << n | x >>> 32 - n;
  }
  
  function sha1(bytes) {
    const K = [0x5a827999, 0x6ed9eba1, 0x8f1bbcdc, 0xca62c1d6];
    const H = [0x67452301, 0xefcdab89, 0x98badcfe, 0x10325476, 0xc3d2e1f0];
  
    if (typeof bytes === 'string') {
      const msg = unescape(encodeURIComponent(bytes)); // UTF8 escape
  
      bytes = [];
  
      for (let i = 0; i < msg.length; ++i) {
        bytes.push(msg.charCodeAt(i));
      }
    } else if (!Array.isArray(bytes)) {
      // Convert Array-like to Array
      bytes = Array.prototype.slice.call(bytes);
    }
  
    bytes.push(0x80);
    const l = bytes.length / 4 + 2;
    const N = Math.ceil(l / 16);
    const M = new Array(N);
  
    for (let i = 0; i < N; ++i) {
      const arr = new Uint32Array(16);
  
      for (let j = 0; j < 16; ++j) {
        arr[j] = bytes[i * 64 + j * 4] << 24 | bytes[i * 64 + j * 4 + 1] << 16 | bytes[i * 64 + j * 4 + 2] << 8 | bytes[i * 64 + j * 4 + 3];
      }
  
      M[i] = arr;
    }
  
    M[N - 1][14] = (bytes.length - 1) * 8 / Math.pow(2, 32);
    M[N - 1][14] = Math.floor(M[N - 1][14]);
    M[N - 1][15] = (bytes.length - 1) * 8 & 0xffffffff;
  
    for (let i = 0; i < N; ++i) {
      const W = new Uint32Array(80);
  
      for (let t = 0; t < 16; ++t) {
        W[t] = M[i][t];
      }
  
      for (let t = 16; t < 80; ++t) {
        W[t] = ROTL(W[t - 3] ^ W[t - 8] ^ W[t - 14] ^ W[t - 16], 1);
      }
  
      let a = H[0];
      let b = H[1];
      let c = H[2];
      let d = H[3];
      let e = H[4];
  
      for (let t = 0; t < 80; ++t) {
        const s = Math.floor(t / 20);
        const T = ROTL(a, 5) + f(s, b, c, d) + e + K[s] + W[t] >>> 0;
        e = d;
        d = c;
        c = ROTL(b, 30) >>> 0;
        b = a;
        a = T;
      }
  
      H[0] = H[0] + a >>> 0;
      H[1] = H[1] + b >>> 0;
      H[2] = H[2] + c >>> 0;
      H[3] = H[3] + d >>> 0;
      H[4] = H[4] + e >>> 0;
    }
  
    return [H[0] >> 24 & 0xff, H[0] >> 16 & 0xff, H[0] >> 8 & 0xff, H[0] & 0xff, H[1] >> 24 & 0xff, H[1] >> 16 & 0xff, H[1] >> 8 & 0xff, H[1] & 0xff, H[2] >> 24 & 0xff, H[2] >> 16 & 0xff, H[2] >> 8 & 0xff, H[2] & 0xff, H[3] >> 24 & 0xff, H[3] >> 16 & 0xff, H[3] >> 8 & 0xff, H[3] & 0xff, H[4] >> 24 & 0xff, H[4] >> 16 & 0xff, H[4] >> 8 & 0xff, H[4] & 0xff];
  }
  
  var _default = sha1;
  exports.default = _default;
  },{}],24:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _validate = _interopRequireDefault(require("./validate.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  /**
   * Convert array of 16 byte values to UUID string format of the form:
   * XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX
   */
  const byteToHex = [];
  
  for (let i = 0; i < 256; ++i) {
    byteToHex.push((i + 0x100).toString(16).substr(1));
  }
  
  function stringify(arr, offset = 0) {
    // Note: Be careful editing this code!  It's been tuned for performance
    // and works in ways you may not expect. See https://github.com/uuidjs/uuid/pull/434
    const uuid = (byteToHex[arr[offset + 0]] + byteToHex[arr[offset + 1]] + byteToHex[arr[offset + 2]] + byteToHex[arr[offset + 3]] + '-' + byteToHex[arr[offset + 4]] + byteToHex[arr[offset + 5]] + '-' + byteToHex[arr[offset + 6]] + byteToHex[arr[offset + 7]] + '-' + byteToHex[arr[offset + 8]] + byteToHex[arr[offset + 9]] + '-' + byteToHex[arr[offset + 10]] + byteToHex[arr[offset + 11]] + byteToHex[arr[offset + 12]] + byteToHex[arr[offset + 13]] + byteToHex[arr[offset + 14]] + byteToHex[arr[offset + 15]]).toLowerCase(); // Consistency check for valid UUID.  If this throws, it's likely due to one
    // of the following:
    // - One or more input array values don't map to a hex octet (leading to
    // "undefined" in the uuid)
    // - Invalid input values for the RFC `version` or `variant` fields
  
    if (!(0, _validate.default)(uuid)) {
      throw TypeError('Stringified UUID is invalid');
    }
  
    return uuid;
  }
  
  var _default = stringify;
  exports.default = _default;
  },{"./validate.js":30}],25:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _rng = _interopRequireDefault(require("./rng.js"));
  
  var _stringify = _interopRequireDefault(require("./stringify.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  // **`v1()` - Generate time-based UUID**
  //
  // Inspired by https://github.com/LiosK/UUID.js
  // and http://docs.python.org/library/uuid.html
  let _nodeId;
  
  let _clockseq; // Previous uuid creation time
  
  
  let _lastMSecs = 0;
  let _lastNSecs = 0; // See https://github.com/uuidjs/uuid for API details
  
  function v1(options, buf, offset) {
    let i = buf && offset || 0;
    const b = buf || new Array(16);
    options = options || {};
    let node = options.node || _nodeId;
    let clockseq = options.clockseq !== undefined ? options.clockseq : _clockseq; // node and clockseq need to be initialized to random values if they're not
    // specified.  We do this lazily to minimize issues related to insufficient
    // system entropy.  See #189
  
    if (node == null || clockseq == null) {
      const seedBytes = options.random || (options.rng || _rng.default)();
  
      if (node == null) {
        // Per 4.5, create and 48-bit node id, (47 random bits + multicast bit = 1)
        node = _nodeId = [seedBytes[0] | 0x01, seedBytes[1], seedBytes[2], seedBytes[3], seedBytes[4], seedBytes[5]];
      }
  
      if (clockseq == null) {
        // Per 4.2.2, randomize (14 bit) clockseq
        clockseq = _clockseq = (seedBytes[6] << 8 | seedBytes[7]) & 0x3fff;
      }
    } // UUID timestamps are 100 nano-second units since the Gregorian epoch,
    // (1582-10-15 00:00).  JSNumbers aren't precise enough for this, so
    // time is handled internally as 'msecs' (integer milliseconds) and 'nsecs'
    // (100-nanoseconds offset from msecs) since unix epoch, 1970-01-01 00:00.
  
  
    let msecs = options.msecs !== undefined ? options.msecs : Date.now(); // Per 4.2.1.2, use count of uuid's generated during the current clock
    // cycle to simulate higher resolution clock
  
    let nsecs = options.nsecs !== undefined ? options.nsecs : _lastNSecs + 1; // Time since last uuid creation (in msecs)
  
    const dt = msecs - _lastMSecs + (nsecs - _lastNSecs) / 10000; // Per 4.2.1.2, Bump clockseq on clock regression
  
    if (dt < 0 && options.clockseq === undefined) {
      clockseq = clockseq + 1 & 0x3fff;
    } // Reset nsecs if clock regresses (new clockseq) or we've moved onto a new
    // time interval
  
  
    if ((dt < 0 || msecs > _lastMSecs) && options.nsecs === undefined) {
      nsecs = 0;
    } // Per 4.2.1.2 Throw error if too many uuids are requested
  
  
    if (nsecs >= 10000) {
      throw new Error("uuid.v1(): Can't create more than 10M uuids/sec");
    }
  
    _lastMSecs = msecs;
    _lastNSecs = nsecs;
    _clockseq = clockseq; // Per 4.1.4 - Convert from unix epoch to Gregorian epoch
  
    msecs += 12219292800000; // `time_low`
  
    const tl = ((msecs & 0xfffffff) * 10000 + nsecs) % 0x100000000;
    b[i++] = tl >>> 24 & 0xff;
    b[i++] = tl >>> 16 & 0xff;
    b[i++] = tl >>> 8 & 0xff;
    b[i++] = tl & 0xff; // `time_mid`
  
    const tmh = msecs / 0x100000000 * 10000 & 0xfffffff;
    b[i++] = tmh >>> 8 & 0xff;
    b[i++] = tmh & 0xff; // `time_high_and_version`
  
    b[i++] = tmh >>> 24 & 0xf | 0x10; // include version
  
    b[i++] = tmh >>> 16 & 0xff; // `clock_seq_hi_and_reserved` (Per 4.2.2 - include variant)
  
    b[i++] = clockseq >>> 8 | 0x80; // `clock_seq_low`
  
    b[i++] = clockseq & 0xff; // `node`
  
    for (let n = 0; n < 6; ++n) {
      b[i + n] = node[n];
    }
  
    return buf || (0, _stringify.default)(b);
  }
  
  var _default = v1;
  exports.default = _default;
  },{"./rng.js":22,"./stringify.js":24}],26:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _v = _interopRequireDefault(require("./v35.js"));
  
  var _md = _interopRequireDefault(require("./md5.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  const v3 = (0, _v.default)('v3', 0x30, _md.default);
  var _default = v3;
  exports.default = _default;
  },{"./md5.js":18,"./v35.js":27}],27:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = _default;
  exports.URL = exports.DNS = void 0;
  
  var _stringify = _interopRequireDefault(require("./stringify.js"));
  
  var _parse = _interopRequireDefault(require("./parse.js"));
  
  function _interopRequireDefault(obj) {
    return obj && obj.__esModule ? obj : {
      default: obj
    };
  }
  
  function stringToBytes(str) {
    str = unescape(encodeURIComponent(str)); // UTF8 escape
  
    const bytes = [];
  
    for (let i = 0; i < str.length; ++i) {
      bytes.push(str.charCodeAt(i));
    }
  
    return bytes;
  }
  
  const DNS = '6ba7b810-9dad-11d1-80b4-00c04fd430c8';
  exports.DNS = DNS;
  const URL = '6ba7b811-9dad-11d1-80b4-00c04fd430c8';
  exports.URL = URL;
  
  function _default(name, version, hashfunc) {
    function generateUUID(value, namespace, buf, offset) {
      if (typeof value === 'string') {
        value = stringToBytes(value);
      }
  
      if (typeof namespace === 'string') {
        namespace = (0, _parse.default)(namespace);
      }
  
      if (namespace.length !== 16) {
        throw TypeError('Namespace must be array-like (16 iterable integer values, 0-255)');
      } // Compute hash of namespace and value, Per 4.3
      // Future: Use spread syntax when supported on all platforms, e.g. `bytes =
      // hashfunc([...namespace, ... value])`
  
  
      let bytes = new Uint8Array(16 + value.length);
      bytes.set(namespace);
      bytes.set(value, namespace.length);
      bytes = hashfunc(bytes);
      bytes[6] = bytes[6] & 0x0f | version;
      bytes[8] = bytes[8] & 0x3f | 0x80;
  
      if (buf) {
        offset = offset || 0;
  
        for (let i = 0; i < 16; ++i) {
          buf[offset + i] = bytes[i];
        }
  
        return buf;
      }
  
      return (0, _stringify.default)(bytes);
    } // Function#name is not settable on some platforms (#270)
  
  
    try {
      generateUUID.name = name; // eslint-disable-next-line no-empty
    } catch (err) {} // For CommonJS default export support
  
  
    generateUUID.DNS = DNS;
    generateUUID.URL = URL;
    return generateUUID;
  }
  
  },{"./parse.js":20,"./stringify.js":24}],28:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _rng = _interopRequireDefault(require("./rng.js"));
  
  var _stringify = _interopRequireDefault(require("./stringify.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  function v4(options, buf, offset) {
    options = options || {};
  
    const rnds = options.random || (options.rng || _rng.default)(); // Per 4.4, set bits for version and `clock_seq_hi_and_reserved`
  
  
    rnds[6] = rnds[6] & 0x0f | 0x40;
    rnds[8] = rnds[8] & 0x3f | 0x80; // Copy bytes to buffer, if provided
  
    if (buf) {
      offset = offset || 0;
  
      for (let i = 0; i < 16; ++i) {
        buf[offset + i] = rnds[i];
      }
  
      return buf;
    }
  
    return (0, _stringify.default)(rnds);
  }
  
  var _default = v4;
  exports.default = _default;
  },{"./rng.js":22,"./stringify.js":24}],29:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _v = _interopRequireDefault(require("./v35.js"));
  
  var _sha = _interopRequireDefault(require("./sha1.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  const v5 = (0, _v.default)('v5', 0x50, _sha.default);
  var _default = v5;
  exports.default = _default;
  },{"./sha1.js":23,"./v35.js":27}],30:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _regex = _interopRequireDefault(require("./regex.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  function validate(uuid) {
    return typeof uuid === 'string' && _regex.default.test(uuid);
  }
  
  var _default = validate;
  exports.default = _default;
  },{"./regex.js":21}],31:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  exports.default = void 0;
  
  var _validate = _interopRequireDefault(require("./validate.js"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  function version(uuid) {
    if (!(0, _validate.default)(uuid)) {
      throw TypeError('Invalid UUID');
    }
  
    return parseInt(uuid.substr(14, 1), 16);
  }
  
  var _default = version;
  exports.default = _default;
  },{"./validate.js":30}],32:[function(require,module,exports){
  "use strict";
  
  var itly = _interopRequireWildcard(require("./itly"));
  
  function _getRequireWildcardCache(nodeInterop) { if (typeof WeakMap !== "function") return null; var cacheBabelInterop = new WeakMap(); var cacheNodeInterop = new WeakMap(); return (_getRequireWildcardCache = function (nodeInterop) { return nodeInterop ? cacheNodeInterop : cacheBabelInterop; })(nodeInterop); }
  
  function _interopRequireWildcard(obj, nodeInterop) { if (!nodeInterop && obj && obj.__esModule) { return obj; } if (obj === null || typeof obj !== "object" && typeof obj !== "function") { return { default: obj }; } var cache = _getRequireWildcardCache(nodeInterop); if (cache && cache.has(obj)) { return cache.get(obj); } var newObj = {}; var hasPropertyDescriptor = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var key in obj) { if (key !== "default" && Object.prototype.hasOwnProperty.call(obj, key)) { var desc = hasPropertyDescriptor ? Object.getOwnPropertyDescriptor(obj, key) : null; if (desc && (desc.get || desc.set)) { Object.defineProperty(newObj, key, desc); } else { newObj[key] = obj[key]; } } } newObj.default = obj; if (cache) { cache.set(obj, newObj); } return newObj; }
  
  window.mmeAnalytics = itly.default;
  window.ItlySdk = itly;
  
  },{"./itly":33}],33:[function(require,module,exports){
  "use strict";
  
  Object.defineProperty(exports, "__esModule", {
    value: true
  });
  Object.defineProperty(exports, "Loggers", {
    enumerable: true,
    get: function () {
      return _sdk.Loggers;
    }
  });
  Object.defineProperty(exports, "Plugin", {
    enumerable: true,
    get: function () {
      return _sdk.Plugin;
    }
  });
  Object.defineProperty(exports, "Validation", {
    enumerable: true,
    get: function () {
      return _sdk.Validation;
    }
  });
  exports.UserLogInRequested = exports.NavigationElementClicked = exports.ModalLayerDisplayed = exports.CsvExported = exports.ApplicationStarted = exports.ActionElementClicked = exports.default = void 0;
  
  var _sdk = require("@itly/sdk");
  
  var _pluginSchemaValidator = _interopRequireDefault(require("@itly/plugin-schema-validator"));
  
  var _pluginIteratively = _interopRequireDefault(require("@itly/plugin-iteratively"));
  
  function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
  
  /**
   * This file is auto-generated by Iteratively.
   * To update run 'itly pull web'
   *
   * Works with versions ^2.0.8 of @itly/sdk and @itly/plugin's
   * https://www.npmjs.com/search?q=%40itly
   */
  
  /* eslint-disable */
  
  /**
   * @typedef {Object} AliasOptions
   */
  
  /**
   * @typedef {Object} IdentifyOptions
   */
  
  /**
   * @typedef {Object} GroupOptions
   */
  
  /**
   * @typedef {Object} PageOptions
   */
  
  /**
   * @typedef {Object} TrackOptions
   */
  class ActionElementClicked {
    constructor(properties) {
      this.name = 'Action Element Clicked';
      this.id = '4b11b664-0563-4104-a36b-38bbb276be91';
      this.version = '5.0.0';
      this.properties = properties;
    }
  
  }
  
  exports.ActionElementClicked = ActionElementClicked;
  
  class ApplicationStarted {
    constructor(properties) {
      this.name = 'Application Started';
      this.id = '180b1dcf-9601-4466-8410-629a11b3d7a6';
      this.version = '4.0.0';
      this.properties = properties;
    }
  
  }
  
  exports.ApplicationStarted = ApplicationStarted;
  
  class CsvExported {
    constructor(properties) {
      this.name = 'CSV Exported';
      this.id = '93424f9e-247e-4b32-aebc-d13e9ca2c4c4';
      this.version = '3.0.0';
      this.properties = properties;
    }
  
  }
  
  exports.CsvExported = CsvExported;
  
  class ModalLayerDisplayed {
    constructor(properties) {
      this.name = 'Modal Layer Displayed';
      this.id = '07733d1d-1489-4890-bcd3-8bece3d8ce8c';
      this.version = '2.0.0';
      this.properties = properties;
    }
  
  }
  
  exports.ModalLayerDisplayed = ModalLayerDisplayed;
  
  class NavigationElementClicked {
    constructor(properties) {
      this.name = 'Navigation Element Clicked';
      this.id = '2c02391e-f4a7-4088-99fd-9c9576d33d45';
      this.version = '3.0.0';
      this.properties = properties;
    }
  
  }
  
  exports.NavigationElementClicked = NavigationElementClicked;
  
  class UserLogInRequested {
    constructor(properties) {
      this.name = 'User Log In Requested';
      this.id = '08098535-3785-4555-9874-a4fd7caad145';
      this.version = '5.0.0';
      this.properties = properties;
    }
  
  } // prettier-ignore
  
  
  exports.UserLogInRequested = UserLogInRequested;
  
  class Itly {
    constructor() {
      this.itly = new _sdk.ItlyBrowser();
    }
    /**
     * Initialize the Itly SDK. Call once when your application starts.
     * @param {Object} [loadOptions] Configuration options to initialize the Itly SDK with.
     */
  
  
    load(loadOptions) {
      loadOptions = loadOptions || {};
      const {
        destinations = {},
        plugins = [],
        ...options
      } = loadOptions;
      const destinationPlugins = destinations.all && destinations.all.disabled ? [] : [new _pluginIteratively.default(options.environment === 'production' ? '0e0wV1ai85wVnbeF-hP6Ce7VSiI4FRa-' : 'yossqaaBbtmMw9VMsZ-qHk2BbDnrpwqU', {
        url: 'https://api.iterative.ly/t/version/aa6237c4-0c92-48fa-8418-0791e00010da',
        environment: options.environment || 'development',
        ...destinations.iteratively
      })];
      this.itly.load({ ...options,
        plugins: [new _pluginSchemaValidator.default({
          'identify': {
            "type": "object",
            "properties": {
              "brand": {
                "enum": ["money-me-plus", "autopay", "listready", "freestyle", "pl", "rentready"]
              },
              "userType": {
                "enum": ["partner", "customer", "system", "horizonuser"]
              },
              "leadsource": {
                "type": "string"
              },
              "name": {
                "type": "string"
              },
              "leadSourceDateCreated": {
                "type": "string"
              },
              "accountCreated": {
                "type": "string"
              },
              "email": {
                "type": "string"
              }
            },
            "additionalProperties": false,
            "required": ["brand", "userType"]
          },
          'page': {
            "type": "object",
            "properties": {
              "userType": {
                "enum": ["partner", "customer", "system", "horizonuser"]
              },
              "brand": {
                "enum": ["money-me-plus", "autopay", "listready", "freestyle", "pl", "rentready"]
              }
            },
            "additionalProperties": false,
            "required": []
          },
          'Action Element Clicked': {
            "type": "object",
            "properties": {
              "objectContext": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "elementName": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "elementValues": {
                "type": "object"
              },
              "userType": {
                "type": "string"
              },
              "platform": {
                "type": "string"
              },
              "actionName": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "objectContextId": {
                "type": "string"
              },
              "brand": {
                "type": "string"
              }
            },
            "additionalProperties": false,
            "required": ["userType", "platform", "actionName", "brand"]
          },
          'Application Started': {
            "type": "object",
            "properties": {
              "brand": {
                "enum": ["money-me-plus", "autopay", "rentready", "listready", "freestyle", "pl"]
              },
              "userType": {
                "enum": ["customer", "partner", "system", "horizonuser"]
              },
              "locationOfAction": {
                "type": "string"
              },
              "pageName": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "platform": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "integrationProvider": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              }
            },
            "additionalProperties": false,
            "required": ["brand", "userType", "locationOfAction", "pageName", "platform", "integrationProvider"]
          },
          'CSV Exported': {
            "type": "object",
            "properties": {
              "brand": {
                "enum": ["money-me-plus", "autopay", "rentready", "listready", "freestyle", "pl"]
              },
              "userType": {
                "enum": ["customer", "partner", "system", "horizonuser"]
              },
              "locationOfAction": {
                "type": "string"
              },
              "platform": {
                "type": "string"
              }
            },
            "additionalProperties": false,
            "required": ["brand", "userType", "locationOfAction", "platform"]
          },
          'Modal Layer Displayed': {
            "type": "object",
            "properties": {
              "platform": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "modalName": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "locationOfAction": {
                "type": "string"
              }
            },
            "additionalProperties": false,
            "required": ["platform", "modalName", "locationOfAction"]
          },
          'Navigation Element Clicked': {
            "type": "object",
            "properties": {
              "brand": {
                "enum": ["money-me-plus", "autopay", "rentready", "listready", "freestyle", "pl"]
              },
              "userType": {
                "enum": ["customer", "partner", "system", "horizonuser"]
              },
              "linkName": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              },
              "platform": {
                "type": "string",
                "pattern": "^$|^[a-z]+(-[a-z]+)*$"
              }
            },
            "additionalProperties": false,
            "required": ["brand", "userType", "linkName", "platform"]
          },
          'User Log In Requested': {
            "type": "object",
            "properties": {
              "brand": {
                "enum": ["money-me-plus", "autopay", "rentready", "listready", "freestyle", "pl"]
              },
              "userType": {
                "enum": ["customer", "partner", "system", "horizonuser"]
              },
              "userName": {
                "type": "string"
              },
              "integrationProvider": {
                "type": "string"
              },
              "platform": {
                "type": "string"
              }
            },
            "additionalProperties": false,
            "required": ["brand", "userType", "userName", "integrationProvider", "platform"]
          }
        }), ...destinationPlugins, ...plugins]
      });
    }
    /**
     * Alias a user ID to another user ID.
     * @param {string} userId The user's new ID.
     * @param {string} previousId The user's previous ID.
     * @param {AliasOptions} [options] Options for this alias call.
     */
  
  
    alias(userId, previousId, options) {
      this.itly.alias(userId, previousId, options);
    }
    /**
     * Identify a user and set or update that user's properties.
     * @param {string} [userId] The user's ID.
     * @param {Object} properties The user's properties.
     * @param {string} properties.brand The brands that the user belongs to.
     * @param {string} properties.userType userType value most recently observed for this user.
     * @param {string} [properties.leadsource] user's leadsource
     * @param {string} [properties.name] current user's fullname
     * @param {string} [properties.leadSourceDateCreated] lead source date created
     * @param {string} [properties.accountCreated] user account date and time created
     * @param {string} [properties.email] current user's email or username in email format
     * @param {IdentifyOptions} [options] Options for this identify call.
     */
  
  
    identify(userId, properties, options) {
      this.itly.identify(userId, properties, options);
    }
    /**
     * Associate the current user with a group.
     * @param {string} groupId The group's ID.
     * @param {GroupOptions} [options] Options for this group call.
     */
  
  
    group(groupId, options) {
      this.itly.group(groupId, undefined, options);
    }
    /**
     * Track a page view with a set of page properties.
     * @param {string} category The page's category.
     * @param {string} name The page's name.
     * @param {Object} [properties] Additional page properties.
     * @param {string} [properties.userType] Property has no description in tracking plan.
     * @param {string} [properties.brand] Property has no description in tracking plan.
     * @param {PageOptions} [options] Options for this page call.
     */
  
  
    page(category, name, properties, options) {
      this.itly.page(category, name, properties, options);
    }
    /**
     * Generic event for any actions done on front end
     * 
     * Owner: Shaun Alonzo
     * @param {Object} properties The event's properties.
     * @param {string} [properties.objectContext] Property has no description in tracking plan.
     * @param {string} [properties.elementName] Property has no description in tracking plan.
     * @param {Object} [properties.elementValues] Property has no description in tracking plan.
     * @param {string} properties.userType Property has no description in tracking plan.
     * @param {string} properties.platform Property has no description in tracking plan.
     * @param {string} properties.actionName Property has no description in tracking plan.
     * @param {string} [properties.objectContextId] Property has no description in tracking plan.
     * @param {string} properties.brand Property has no description in tracking plan.
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    actionElementClicked(properties, options) {
      this.itly.track(new ActionElementClicked(properties), options);
    }
    /**
     * Create payment request, request new payment, request more, etc can be clicked by a partner user.
     * 
     * Owner: Steven Lucas
     * @param {Object} properties The event's properties.
     * @param {string} properties.brand MoneyMe+, ListReady, RentReady, AutoPay, Freestyle, PL the brand related to when  account was created.
     * @param {string} properties.userType partner, customer, system
     * @param {string} properties.locationOfAction Where did this event begin; "MME+ Partner Portal Dashboard", "
     * @param {string} properties.pageName Page object name value.
     * @param {string} properties.platform Users can login on the web, mobile, ecommerce.
     * @param {string} properties.integrationProvider Integrations can be any thirdparty that we've built an integration with. Shopify, WooCommerce, Magento, RealTimeAgent, VaultRE, Digikit, etc
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    applicationStarted(properties, options) {
      this.itly.track(new ApplicationStarted(properties), options);
    }
    /**
     * Users downloading CSV files.
     * 
     * Owner: Steven Lucas
     * @param {Object} properties The event's properties.
     * @param {string} properties.brand MoneyMe+, ListReady, RentReady, AutoPay, Freestyle, PL the brand related to when  account was created.
     * @param {string} properties.userType partner, customer, system
     * @param {string} properties.locationOfAction Property has no description in tracking plan.
     * @param {string} properties.platform platform where event was triggered from. \[web, mobile, system\]
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    csvExported(properties, options) {
      this.itly.track(new CsvExported(properties), options);
    }
    /**
     * Tracking modals that get presented to users in the mobile or web.
     * 
     * Owner: Steven Lucas
     * @param {Object} properties The event's properties.
     * @param {string} properties.platform platform where event was triggered from. \[web, mobile, system, eCommerce\]
     * @param {string} properties.modalName Name or label of modal
     * @param {string} properties.locationOfAction Page or screen name
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    modalLayerDisplayed(properties, options) {
      this.itly.track(new ModalLayerDisplayed(properties), options);
    }
    /**
     * Menu items that are a hyperlink clicked by user.
     * 
     * Owner: Steven Lucas
     * @param {Object} properties The event's properties.
     * @param {string} properties.brand MoneyMe+, ListReady, RentReady, AutoPay, Freestyle, PL the brand related to when  account was created.
     * @param {string} properties.userType partner, customer, system
     * @param {string} properties.linkName Property has no description in tracking plan.
     * @param {string} properties.platform web, mobile
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    navigationElementClicked(properties, options) {
      this.itly.track(new NavigationElementClicked(properties), options);
    }
    /**
     * Event for when a user attempts any login process
     * 
     * Owner: Shaun Alonzo
     * @param {Object} properties The event's properties.
     * @param {string} properties.brand MoneyMe+, ListReady, RentReady, AutoPay, Freestyle, PL the brand related to when  account was created.
     * @param {string} properties.userType partner, customer, system
     * @param {string} properties.userName Property has no description in tracking plan.
     * @param {string} properties.integrationProvider Integrations can be any thirdparty that we've built an integration with. Shopify, WooCommerce, Magento, RealTimeAgent, VaultRE, Digikit, etc
     * @param {string} properties.platform Users can login on the web, mobile, ecommerce.
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    userLogInRequested(properties, options) {
      this.itly.track(new UserLogInRequested(properties), options);
    }
    /**
     * Track any event.
     * @param {Object} event The event.
     * @param {string} event.name The event's name.
     * @param {string} [event.properties] The event's properties.
     * @param {string} [event.id] The event's ID.
     * @param {string} [event.version] The event's version.
     * @param {TrackOptions} [options] Options for this track call.
     */
  
  
    track(event, options) {
      this.itly.track(event, options);
    }
    /**
     * Reset (e.g. on logout) all analytics state for the current user and group.
     */
  
  
    reset() {
      this.itly.reset();
    }
  
    flush() {
      return this.itly.flush();
    }
  
  }
  
  const itlySdk = new Itly();
  var _default = itlySdk;
  exports.default = _default;
  
  },{"@itly/plugin-iteratively":1,"@itly/plugin-schema-validator":2,"@itly/sdk":4}]},{},[32]);
  