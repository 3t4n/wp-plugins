(() => {
  var __defProp = Object.defineProperty;
  var __export = (target, all) => {
    for (var name in all)
      __defProp(target, name, { get: all[name], enumerable: true });
  };

  // assets/src/admin/js/ReduxManager/StateProps.js
  var { withSelect, withDispatch } = wp.data;
  var namespace = "genieimage";
  var StateProps = {
    sidebar: withSelect((select) => {
      return {
        sidebar: select(namespace).sidebar()
      };
    }),
    limitUsage: withSelect((select) => {
      return {
        limitUsage: select(namespace).limitUsage()
      };
    }),
    setLimitUsage: withDispatch((dispatch) => {
      return {
        setLimitUsage(value) {
          dispatch(namespace).setLimitUsage(value);
        }
      };
    }),
    setSidebar: withDispatch((dispatch) => {
      return {
        setSidebar(value) {
          dispatch(namespace).setSidebar(value);
        }
      };
    }),
    getTemplateInputs: withSelect((select) => {
      return {
        getTemplateInputs: select(namespace).getTemplateInputs()
      };
    }),
    getInputs: withSelect((select) => {
      return {
        getInputs: select(namespace).getInputs()
      };
    }),
    setInput: withDispatch((dispatch) => {
      return {
        setInput(name, value) {
          dispatch(namespace).setInput(name, value);
        }
      };
    }),
    resetSidebar: withDispatch((dispatch) => {
      return {
        resetSidebar(name, value) {
          dispatch(namespace).resetSidebar();
        }
      };
    }),
    resetTemplateInputs: withDispatch((dispatch) => {
      return {
        resetTemplateInputs(value) {
          dispatch(namespace).resetTemplateInputs(value);
        }
      };
    })
  };
  var StateProps_default = StateProps;

  // assets/src/admin/js/ReduxManager/index.js
  var { compose } = wp.compose;
  var ComposeComponents = (Component, action_list = []) => {
    if (!action_list.length) {
      return Component;
    }
    let combineAction = [];
    action_list.forEach((key) => {
      let ac = StateProps_default[key];
      if (ac) {
        combineAction.push(ac);
      }
    });
    return compose(combineAction)(Component);
  };

  // assets/src/admin/js/ReduxManager/RegisterStore.js
  var { createReduxStore, register } = wp.data;
  var DEFAULT_STATE = {
    inputs: {},
    sidebar: {
      isWpModalOpen: false,
      imageUrl: `${window.genieImage.config.assetsUrl}dist/admin/images`,
      rootContainer: document.getElementById("genieimagecontainer") || "",
      requestId: ""
    },
    limitUsage: {
      usagePercentage: {},
      subscriptionUsagesLimit: {},
      siteUsagesLimit: {}
    }
  };
  var actions = {
    setSidebar(value) {
      return {
        type: "SET_SIDEBAR",
        value
      };
    },
    setInput(name, value) {
      return {
        type: "SET_INPUT",
        name,
        value
      };
    },
    setLimitUsage(value) {
      return {
        type: "SET_LIMIT_USAGE",
        value
      };
    },
    resetSidebar(value) {
      return {
        type: "RESET_SIDEBAR",
        value
      };
    },
    resetTemplateInputs(value) {
      return {
        type: "RESET_TEMPLATE_INPUTS",
        value
      };
    }
  };
  var store = createReduxStore("genieimage", {
    reducer(state = DEFAULT_STATE, action) {
      switch (action.type) {
        case "SET_SIDEBAR":
          return {
            ...state,
            sidebar: {
              ...state.sidebar,
              ...action.value
            }
          };
        case "SET_INPUT":
          return {
            ...state,
            inputs: {
              ...state.inputs,
              [state.sidebar.currentTemplate]: {
                ...state.inputs[state.sidebar.currentTemplate] || {},
                [action.name]: action.value
              }
            }
          };
        case "SET_LIMIT_USAGE":
          return {
            ...state,
            limitUsage: {
              ...state.limitUsage,
              ...action.value
            }
          };
        case "RESET_SIDEBAR":
          return {
            ...state,
            sidebar: DEFAULT_STATE.sidebar
          };
        case "RESET_TEMPLATE_INPUTS":
          let inputs = { ...state.inputs };
          delete inputs[action.value];
          return {
            ...state,
            inputs
          };
      }
      return state;
    },
    actions,
    selectors: {
      sidebar(state) {
        return state.sidebar;
      },
      getInputs(state) {
        return state.inputs[state.sidebar.currentTemplate] || {};
      },
      getTemplateInputs(state) {
        return state.inputs;
      },
      limitUsage(state) {
        return state.limitUsage;
      }
    }
  });
  register(store);

  // assets/src/admin/js/RequestManager/index.js
  var RequestManager_exports = {};
  __export(RequestManager_exports, {
    EndPoints: () => EndPoints_exports,
    HandleFetch: () => HandleFetch,
    HandleResponse: () => HandleResponse_default
  });

  // assets/src/admin/js/RequestManager/EndPoints.js
  var EndPoints_exports = {};
  __export(EndPoints_exports, {
    clearHistoryUrl: () => clearHistoryUrl,
    createHistoryUrl: () => createHistoryUrl,
    genieImage: () => genieImage,
    genieImageSave: () => genieImageSave,
    getLicenseToken: () => getLicenseToken,
    historyData: () => historyData,
    limitUsage: () => limitUsage,
    removeLicenseToken: () => removeLicenseToken,
    storeApiUrl: () => storeApiUrl,
    updateUsageUrl: () => updateUsageUrl
  });
  var allUrls = window.genieImage.config;
  var parserApiUrl = allUrls.parserApi;
  var licenseApiUrl = allUrls.licenseApi;
  var historyData = allUrls.historyApi + "list";
  var createHistoryUrl = allUrls.historyApi + "create";
  var clearHistoryUrl = allUrls.historyApi + "clear";
  var updateUsageUrl = allUrls.baseApi + "user_usage_log";
  var storeApiUrl = allUrls.storeApi + window.genieImage.blogWizardData?.post_id;
  var getLicenseToken = licenseApiUrl + "get-token";
  var removeLicenseToken = licenseApiUrl + "remove-token";
  var limitUsage = allUrls.usageLimitStatsApi;
  var genieImage = parserApiUrl + "genie-image/generate-image";
  var genieImageSave = allUrls.baseApi + "genie-image/upload";

  // assets/src/admin/js/Common/Libs/Notification.js
  var { notification } = window.antd;
  var Notification = (type, title, message = "", placement = "top") => {
    const sidebar = wp.data.select("genieimage").sidebar();
    notification.config({
      getContainer: () => sidebar.rootContainer,
      placement
    });
    notification[type]({
      message: title,
      description: message,
      duration: 5,
      zIndex: 999999
    });
  };
  var Notification_default = Notification;

  // assets/src/admin/js/RequestManager/HandleResponse.js
  var { Modal } = window.antd;
  var HandleResponse = (res, callback) => {
    const sidebar = wp.data.select("genieimage").sidebar();
    const message = res?.message || [];
    const traceCode = res?.traceCode;
    if (res?.networkErr) {
      Notification_default("error", "Something went wrong!", message.join(" "), "topRight");
    } else {
      if (res?.status === "success") {
        wp.data.dispatch("genieimage").setSidebar({ requestId: res?.requestId });
        if (res?.statistics) {
          wp.data.dispatch("genieimage").setLimitUsage({
            ...res?.statistics
          });
        }
        callback();
      } else {
        if (!window.genieImage.config?.siteToken || message.join("").toLowerCase().includes("access denied")) {
          wp.data.dispatch("genieimage").setSidebar({ open: false });
          Modal.error({
            title: "Failed!",
            content: message.join(" "),
            className: "genieimageconfirm-modal",
            getContainer: () => sidebar.rootContainer,
            zIndex: 999999
          });
        } else {
          Notification_default("error", "Failed!", message.join(" "), "topRight");
        }
      }
    }
  };
  var HandleResponse_default = HandleResponse;

  // assets/src/admin/js/RequestManager/index.js
  var callApi = async (url, result, data = {}) => {
    const { config } = window.genieImage;
    if (!config?.authToken || config?.authToken === "access_denied") {
      result({ message: ["Access Denied!"] });
      return;
    }
    let params = {
      method: "POST",
      headers: {
        "Content-type": "application/json; charset=UTF-8",
        "Site-Token": config?.siteToken || "",
        "Auth-Token": config?.authToken || "",
        "X-WP-Nonce": config?.restNonce || "",
        "Plugin-Version": config?.version,
        "Plugin-Name": "genie-image"
      }
    };
    const allInputs = wp.data.select("genieimage").getInputs();
    const { numberOfResult, creativity, selectedLanguage, selectedTone } = allInputs;
    const body = { selectedLanguage, creativity, selectedTone, numberOfResult, ...data };
    if (data && typeof data === "object") {
      params.body = JSON.stringify(body);
    }
    const response = await fetch(url, params).catch((err) => result({ networkErr: true, message: [err?.message] }));
    if (!response) {
      result({});
      return;
    }
    if (!response.ok) {
      const err = await response.text();
      result({ networkErr: true, error: err });
      return;
    }
    const res = await response.json();
    result(res);
  };
  var HandleFetch = (callback, urlKey, params, query = "") => {
    let updatedUrl = EndPoints_exports[urlKey];
    if (query) {
      updatedUrl += query;
    }
    callApi(
      updatedUrl,
      (result) => {
        callback(result);
      },
      params
    );
  };

  // assets/src/admin/js/app-handler.js
  var RenderElement = (element, container) => {
    if (React.version >= "18.0.0") {
      ReactDOM.createRoot(container).render(element);
    } else {
      ReactDOM.render(element, container);
    }
  };
  window.genieImage.Components = {
    Common: {
      ReduxManager: { ComposeComponents },
      RequestManager: RequestManager_exports,
      RenderElement
    }
  };
})();
