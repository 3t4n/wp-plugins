(() => {
  var __defProp = Object.defineProperty;
  var __export = (target, all) => {
    for (var name in all)
      __defProp(target, name, { get: all[name], enumerable: true });
  };

  // assets/src/admin/js/Common/Utilities/index.js
  var Utilities_exports = {};
  __export(Utilities_exports, {
    GenieHelpers: () => GenieHelpers
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

  // assets/src/admin/js/Common/Utilities/index.js
  var Helpers = class {
    storeTimeout = {};
    callStoreApi(name, data) {
      if (!window.genieImage.blogWizardData?.post_id) {
        return;
      }
      if (window.genieImage.config.saveData) {
        window.genieImage.config.saveData(name, data);
      } else {
        const url = EndPoints_exports.storeApiUrl + "/" + name + "/";
        fetch(url, {
          method: "POST",
          body: JSON.stringify(data),
          headers: {
            "Content-type": "application/json; charset=UTF-8",
            "X-WP-Nonce": window.genieImage.config?.restNonce || ""
          }
        });
      }
    }
    storeData = (name) => {
      if (this.storeTimeout[name]) {
        clearTimeout(this.storeTimeout[name]);
      }
      this.storeTimeout[name] = setTimeout(() => {
        const inputs = wp.data.select("genieimage").getInputs();
        this.callStoreApi(name, inputs[name] || "");
      }, 3e3);
    };
    copyToClipboard(copyAbleText) {
      if (navigator?.clipboard && window?.isSecureContext) {
        return navigator.clipboard.writeText(copyAbleText);
      } else {
        let textArea = document.createElement("textarea");
        textArea.value = copyAbleText;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        return new Promise((resolve, reject) => {
          document.execCommand("copy") ? resolve() : reject();
          textArea.remove();
        });
      }
    }
    formatLargeNumber(n) {
      if (n < 1e3)
        return n;
      if (n >= 1e3 && n < 1e6)
        return +(n / 1e3).toFixed(1) + "K";
      if (n >= 1e6 && n < 1e9)
        return +(n / 1e6).toFixed(1) + "M";
      if (n >= 1e9 && n < 1e12)
        return +(n / 1e9).toFixed(1) + "B";
      if (n >= 1e12)
        return +(n / 1e12).toFixed(1) + "T";
    }
    getDomainName(url) {
      try {
        const parsedUrl = new URL(url);
        return parsedUrl.hostname.split(".").slice(-2).join(".");
      } catch (e) {
        return "";
      }
    }
    saveSidebarControllerOption(key, value) {
      if (!key || !value) {
        return;
      }
      localStorage.setItem(key, JSON.stringify(value));
      if (key == "genieimagelanguage") {
        wp.data.dispatch("genieimage").setSidebar({
          currentLanguage: value
        });
      }
    }
    snakeToTitleCase = (str) => {
      let initial = str.replace(/^[_]*(.)/, (_, char) => char.toUpperCase());
      let result = initial.replace(/[_]+(.)/g, (_, char) => " " + char.toUpperCase());
      return result;
    };
    camelCaseToTitleCase(text) {
      const result = text.replace(/([A-Z])/g, " $1").trim();
      const finalResult = result.charAt(0).toUpperCase() + result.slice(1).toLowerCase();
      return finalResult;
    }
    hyphenatedToCamelCase(text) {
      return text.replace(/-([a-z])/g, (g) => {
        return g[1].toUpperCase();
      });
    }
    joinArray(values, separator = "-") {
      if (values && values.length > 1) {
        return values.join(separator);
      }
      return "";
    }
    sortObjArray(a, b) {
      if (a.last_nom < b.last_nom) {
        return -1;
      }
      if (a.last_nom > b.last_nom) {
        return 1;
      }
      return 0;
    }
    convertToSlug(text) {
      return text?.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-");
    }
  };
  var GenieHelpers = new Helpers();

  // assets/src/admin/js/Common/Libs/index.js
  var Libs_exports = {};
  __export(Libs_exports, {
    Button: () => Button_default,
    Card: () => Card_default,
    Collapse: () => Collapse_default,
    ConfirmModal: () => ConfirmModal_default,
    DrawerFooter: () => DrawerFooter_default,
    DrawerHeader: () => DrawerHeader_default,
    DrawerWrapper: () => DrawerWrapper_default,
    ErrorModal: () => ErrorModal_default,
    Input: () => Input_default,
    Loading: () => Loading_default,
    Modal: () => GenieAiModal_default,
    Navbar: () => Navbar_default,
    Notification: () => Notification_default,
    NumberInput: () => NumberInput_default,
    Popover: () => GenieAiPopover_default,
    Select: () => Select_default,
    SkeletonCard: () => SkeletonCard_default,
    SkeletonSingle: () => SkeletonSingle_default,
    Slider: () => Slider_default,
    Switch: () => GenieAiSwitch_default,
    Table: () => GenieAiTable_default,
    Textarea: () => Textarea_default,
    Tooltip: () => InfoTooltip_default
  });

  // assets/src/admin/js/Common/Libs/Button.js
  var { Form, Button } = window.antd;
  var GenieButton = ({ children, onClick, loading = false, ...props }) => {
    return /* @__PURE__ */ React.createElement(Form.Item, null, /* @__PURE__ */ React.createElement(Button, {
      onClick,
      loading,
      ...props
    }, children));
  };
  var Button_default = GenieButton;

  // assets/src/admin/js/Common/Libs/GenieAiModal.js
  var { Modal: Modal2 } = window.antd;
  var GenieModal = ({ children, className, centered, closeIcon, footer, isModalVisible, setIsModalVisible, title = "", closable = true, onClose = (close) => "" }) => {
    const handleOk = () => {
      setIsModalVisible(false);
    };
    const handleCancel = () => {
      setIsModalVisible(false);
      onClose();
    };
    return /* @__PURE__ */ React.createElement(React.Fragment, null, /* @__PURE__ */ React.createElement(Modal2, {
      className,
      title,
      open: isModalVisible,
      closeIcon: closeIcon ? closeIcon : /* @__PURE__ */ React.createElement("span", {
        className: "getgenie-icon-close1"
      }),
      closable,
      zIndex: 9999,
      onOk: handleOk,
      onCancel: handleCancel,
      centered,
      footer
    }, children));
  };
  var GenieAiModal_default = GenieModal;

  // assets/src/admin/js/Common/Libs/InfoTooltip.js
  var { Tooltip } = window.antd;
  var InfoTooltip = ({ title, placement, className = "", color, ...props }) => {
    return /* @__PURE__ */ React.createElement(Tooltip, {
      className: "genieimagetooltip-icon genieimageicon-alert-circle",
      color,
      overlayStyle: { paddingLeft: "8px" },
      placement,
      ...props,
      title,
      overlayClassName: className,
      zIndex: 9999
    });
  };
  var InfoTooltip_default = InfoTooltip;

  // assets/src/admin/js/Common/Libs/Loading.js
  var Loading = ({ size = 25 }) => {
    return /* @__PURE__ */ React.createElement("div", {
      style: { width: `${size}px`, height: `${size}px` },
      className: "loading-icon"
    });
  };
  var Loading_default = Loading;

  // assets/src/admin/js/Common/Libs/Select.js
  var { ComposeComponents } = window.genieImage.Components.Common.ReduxManager;
  var { Select, Form: Form2 } = window.antd;
  var { Option } = Select;
  var { useEffect } = window.React;
  var GenieSelect = ComposeComponents(({ options, setInput, sidebar, getInputs, except = [], disableList = [], name = "", defaultValue = "", label = "", placeholder = "", className = "", handleOnChange = () => "", onSearch = () => {
  }, ...props }) => {
    let list = options;
    const handleChange = (value) => {
      handleOnChange(value);
      setInput(name, value);
    };
    let updatedValue = getInputs[name] || defaultValue || null;
    useEffect(() => {
      setInput(name, updatedValue);
    }, [sidebar.currentTemplate]);
    if (except && except.length > 0) {
      list = options.filter((option) => !except.includes(option.value));
      if (except.includes(updatedValue)) {
        updatedValue = list?.[0]?.value;
      }
    }
    return /* @__PURE__ */ React.createElement(Form2.Item, {
      label,
      className
    }, /* @__PURE__ */ React.createElement(Select, {
      showSearch: true,
      value: updatedValue,
      placeholder,
      name,
      notFoundContent: props?.loading ? /* @__PURE__ */ React.createElement(Loading_default, {
        width: 25
      }) : null,
      suffixIcon: /* @__PURE__ */ React.createElement("span", {
        className: "genieimageicon-arrow_down"
      }),
      onChange: handleChange,
      onSearch,
      onKeyDown: (e) => e.stopPropagation(),
      filterOption: (input, option) => {
        return option.children.toLowerCase().indexOf(input.toLowerCase()) >= 0;
      },
      getPopupContainer: (node) => node.parentNode,
      ...props
    }, list.map((option, key) => /* @__PURE__ */ React.createElement(Option, {
      key,
      disabled: disableList.includes(option.value),
      value: option.value
    }, option.label))));
  }, ["setInput", "getInputs", "sidebar"]);
  var Select_default = GenieSelect;

  // assets/src/admin/js/Common/Libs/Textarea.js
  var { ComposeComponents: ComposeComponents2 } = window.genieImage.Components.Common.ReduxManager;
  var { Input, Form: Form3 } = window.antd;
  var { useEffect: useEffect2 } = window.React;
  var GenieTextarea = ComposeComponents2(({ name = "", setInput, sidebar, getInputs, className = "", label = "", defaultValue = "", errorMessage = "", ...props }) => {
    const handleChange = (e) => {
      setInput(name, e.target.value);
    };
    useEffect2(() => {
      setInput(name, getInputs[name] || defaultValue);
    }, []);
    let updatedValue = getInputs[name] || defaultValue;
    return /* @__PURE__ */ React.createElement(Form3.Item, {
      label,
      key: name,
      className: `genie-input ${className}`
    }, /* @__PURE__ */ React.createElement(Input.TextArea, {
      value: updatedValue,
      onChange: handleChange,
      onKeyDown: (e) => e.stopPropagation(),
      ...props
    }));
  }, ["setInput", "getInputs", "sidebar"]);
  var Textarea_default = GenieTextarea;

  // assets/src/admin/js/Common/Libs/Card.js
  var { Row, Col, Card } = window.antd;
  var { ComposeComponents: ComposeComponents3 } = window.genieImage.Components.Common.ReduxManager;
  var { useState, useEffect: useEffect3 } = window.React;
  var GenieCard = ComposeComponents3(({ list, children, column = 1, handleClick, sidebar, setSidebar, skeleton: Skeleton3 = null, showActiveItem = false, loading = false, value = "", ...props }) => {
    const [card, setCard] = useState(null);
    let cols = 24 / column;
    if (column > 2) {
      cols = 24 / (column - 2);
    } else if (column > 1) {
      cols = 24 / (column - 1);
    }
    useEffect3(() => {
      if (showActiveItem && value) {
        const content2 = list.findIndex((item) => item.title === value);
        if (content2 !== -1) {
          setCard(content2 + "-selected");
        }
      }
    }, [value]);
    const handleCard = (e, item, index) => {
      setCard(index + "-selected");
      if (handleClick) {
        handleClick(e, item);
      }
    };
    useEffect3(() => {
      if (list.length === 0) {
        setCard(null);
      }
    }, [list]);
    if (Skeleton3) {
      return /* @__PURE__ */ React.createElement(Skeleton3, null);
    }
    return /* @__PURE__ */ React.createElement("div", {
      className: "genieimagecard"
    }, /* @__PURE__ */ React.createElement(Row, {
      gutter: 16
    }, list.map(
      (item, index) => /* @__PURE__ */ React.createElement(Col, {
        xs: 24,
        sm: cols,
        xl: 24 / column,
        key: index
      }, /* @__PURE__ */ React.createElement(Card, {
        className: card && card === index + "-selected" ? "active" : "",
        key: index,
        onClick: (e) => handleCard(e, item, index),
        ...props
      }, children(item)))
    )));
  }, ["sidebar", "setSidebar"]);
  var Card_default = GenieCard;

  // assets/src/admin/js/Common/Libs/DrawerFooter.js
  var { Button: Button2 } = window.antd;
  var { ComposeComponents: ComposeComponents4 } = window.genieImage.Components.Common.ReduxManager;
  var DrawerFooter = ComposeComponents4(({ prevScreen = true, nextScreen = true, enableNextBtn = false, handleNext = () => "", handlePrev = () => "", insertBtn = "" }) => {
    return /* @__PURE__ */ React.createElement("div", {
      className: `genieimagesidebar-footer ${prevScreen && "genieimagesidebar-footer-grid"}`
    }, prevScreen && /* @__PURE__ */ React.createElement(Button2, {
      type: "primary",
      onClick: handlePrev,
      className: "prevBtn"
    }, /* @__PURE__ */ React.createElement("span", {
      className: "genieimageicon-arrow"
    })), /* @__PURE__ */ React.createElement("div", {
      className: "btnGrp"
    }, insertBtn, nextScreen && /* @__PURE__ */ React.createElement(Button2, {
      type: "primary",
      onClick: handleNext,
      disabled: !enableNextBtn,
      className: "nextBtn"
    }, "Next")));
  }, []);
  var DrawerFooter_default = DrawerFooter;

  // assets/src/admin/js/Common/Libs/GenieAiPopover.js
  var { Popover } = window.antd;
  var { useState: useState2 } = window.React;
  var GenieAiPopover = ({ children, placement = "top", title = "", content: content2 = "", isVisible = false, overlayStyle = {} }) => {
    const [visible, setVisible] = useState2(isVisible);
    const handleVisibleChange = (visible2) => {
      setVisible(visible2);
    };
    return /* @__PURE__ */ React.createElement(Popover, {
      content: content2,
      overlayStyle,
      title,
      trigger: "click",
      placement,
      open: visible,
      onOpenChange: handleVisibleChange,
      zIndex: 9999
    }, children);
  };
  var GenieAiPopover_default = GenieAiPopover;

  // assets/src/admin/js/Common/Libs/Input.js
  var { ComposeComponents: ComposeComponents5 } = window.genieImage.Components.Common.ReduxManager;
  var { Input: Input2, Form: Form4 } = window.antd;
  var { useEffect: useEffect4, useState: useState3 } = window.React;
  var GenieInput = ComposeComponents5(({ name, sidebar, setInput, getInputs, autoComplete = "off", className = "", defaultValue = "", label = "", required = false, errorMessage = "", ...props }) => {
    const [error, setError] = useState3(false);
    const handleChange = (e) => {
      const value = e.target.value;
      setInput(name, value);
      if (!value.length) {
        setError(true);
      } else {
        setError(false);
      }
    };
    useEffect4(() => {
      setInput(name, getInputs[name] || defaultValue);
    }, []);
    let updatedValue = getInputs[name] || defaultValue;
    return /* @__PURE__ */ React.createElement(Form4.Item, {
      className: `genie-input ${className} ${required && error && !updatedValue && "ant-form-item-has-error"}`,
      label
    }, /* @__PURE__ */ React.createElement(Input2, {
      value: updatedValue,
      name,
      ...props,
      onChange: handleChange,
      onKeyDown: (e) => e.stopPropagation()
    }), required && error && !updatedValue ? /* @__PURE__ */ React.createElement("p", {
      className: "ant-form-item-explain-error"
    }, errorMessage) : "");
  }, ["setInput", "getInputs", "sidebar"]);
  var Input_default = GenieInput;

  // assets/src/admin/js/Common/Libs/Collapse.js
  var { Collapse } = window.antd;
  var { Panel } = Collapse;
  var GenieCollapse = ({ children, ...props }) => {
    return /* @__PURE__ */ React.createElement(Collapse, {
      ...props,
      expandIconPosition: "right",
      expandIcon: (panelProps) => /* @__PURE__ */ React.createElement("span", {
        className: "genieimageicon-arrow_down"
      })
    }, children);
  };
  GenieCollapse.Panel = ({ children, ...props }) => {
    return /* @__PURE__ */ React.createElement(Panel, {
      ...props
    }, children);
  };
  var Collapse_default = GenieCollapse;

  // assets/src/admin/js/Common/Libs/DrawerHeader.js
  var { Button: Button3, Col: Col2, Row: Row2 } = window.antd;
  var { ComposeComponents: ComposeComponents6 } = window.genieImage.Components.Common.ReduxManager;
  var sidebarConfig = window.genieImage.config?.sidebar;
  var DrawerHeader = ComposeComponents6(({ sidebar, setSidebar, getInputs, setInput, screenName = "" }) => {
    const { imageUrl } = sidebar;
    const seoData = getInputs["searchVolume"];
    const seoEnabled = getInputs["seoEnabled"];
    const handleClickSeoBtn = () => {
      setInput("seoEnabled", !seoEnabled);
    };
    const closeSidebar = () => {
      setSidebar({
        open: false
      });
    };
    return /* @__PURE__ */ React.createElement("div", {
      className: "genieimagesidebar-header"
    }, /* @__PURE__ */ React.createElement(Row2, null, /* @__PURE__ */ React.createElement(Col2, {
      span: 20
    }, /* @__PURE__ */ React.createElement("img", {
      className: "main-logo",
      src: `${imageUrl}/logo_black.svg`,
      alt: "logo"
    }), ["introScreen", "outlineScreen", "paragraphScreen"].includes(screenName) && seoData ? /* @__PURE__ */ React.createElement(Button3, {
      onClick: handleClickSeoBtn,
      shape: "round",
      className: "genieimagesidebar-header-seoBtn"
    }, /* @__PURE__ */ React.createElement("img", {
      src: `${imageUrl}/badge.png`,
      alt: "logo"
    }), "SEO ", seoEnabled ? "Enabled" : "Disabled") : /* @__PURE__ */ React.createElement("div", {
      className: "empty-btn-space"
    })), /* @__PURE__ */ React.createElement(Col2, {
      span: 4,
      className: "genieimageclose-btn"
    }, /* @__PURE__ */ React.createElement("span", {
      onClick: closeSidebar
    }, /* @__PURE__ */ React.createElement("svg", {
      width: "10",
      height: "10",
      viewBox: "0 0 10 10",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, /* @__PURE__ */ React.createElement("path", {
      d: "M10 1.00714L8.99286 0L5 3.99286L1.00714 0L0 1.00714L3.99286 5L0 8.99286L1.00714 10L5 6.00714L8.99286 10L10 8.99286L6.00714 5L10 1.00714Z",
      fill: "#323232"
    }))))));
  }, ["setSidebar", "sidebar", "getInputs", "setInput"]);
  var DrawerHeader_default = DrawerHeader;

  // assets/src/admin/js/Common/Libs/GenieAiSwitch.js
  var { Col: Col3, Row: Row3, Switch } = window.antd;
  var { ComposeComponents: ComposeComponents7 } = window.genieImage.Components.Common.ReduxManager;
  var { useEffect: useEffect5 } = window.React;
  var GenieAiSwitch = ComposeComponents7(({ getInputs, setInput, defaultChecked = false, className = "", name = "", label = "", ...props }) => {
    const handleChange = (value) => {
      setInput(name, value);
    };
    let updatedValue = getInputs[name] || defaultChecked;
    useEffect5(() => {
      setInput(name, updatedValue);
    }, []);
    return /* @__PURE__ */ React.createElement(Row3, {
      justify: "space-between",
      className: `genieimageswitch ${className}`
    }, /* @__PURE__ */ React.createElement(Col3, {
      span: 18,
      className: "label"
    }, label), /* @__PURE__ */ React.createElement(Col3, {
      span: 6,
      className: "switch"
    }, /* @__PURE__ */ React.createElement(Switch, {
      name,
      checked: updatedValue,
      ...props,
      onChange: handleChange
    })));
  }, ["setInput", "getInputs"]);
  var GenieAiSwitch_default = GenieAiSwitch;

  // assets/src/admin/js/Common/Libs/SkeletonSingle.js
  var { Skeleton } = window.antd;
  var SkeletonSingle = ({ count = 2 }) => {
    return [...Array(count)].map((item, key) => /* @__PURE__ */ React.createElement(Skeleton.Button, {
      key,
      className: "genieimagesingle-skeleton",
      active: true,
      block: true,
      shape: "default"
    }));
  };
  var SkeletonSingle_default = SkeletonSingle;

  // assets/src/admin/js/Common/Libs/SkeletonCard.js
  var { Card: Card2, Skeleton: Skeleton2 } = window.antd;
  var SkeletonCard = ({ count = 3 }) => {
    return /* @__PURE__ */ React.createElement("div", {
      className: "genieimagecard-skeleton"
    }, [...Array(count)].map(
      (item, key) => /* @__PURE__ */ React.createElement(Card2, {
        key,
        className: "genieimagegenerated-outlines-card"
      }, /* @__PURE__ */ React.createElement(Skeleton2, {
        active: true
      }))
    ));
  };
  var SkeletonCard_default = SkeletonCard;

  // assets/src/admin/js/Common/Libs/ConfirmModal.js
  var { Modal: Modal3 } = window.antd;
  var ConfirmModal = (title = "", content2 = "", onYes = () => "", onCancel = () => "") => {
    const styles = {
      getgenieIconAlert: {
        float: "left",
        fontSize: "24px",
        marginBottom: "17px"
      }
    };
    let sidebarContainer = "";
    let genieClass = "";
    if (window.getGenie.config) {
      sidebarContainer = wp.data.select("getgenie");
      genieClass = "getgenie-icon-alert";
    } else {
      sidebarContainer = wp.data.select("genieimage");
      genieClass = "genieimageicon-alert";
    }
    const sidebar = sidebarContainer.sidebar();
    Modal3.confirm({
      title,
      icon: /* @__PURE__ */ React.createElement("span", {
        className: "anticon"
      }, /* @__PURE__ */ React.createElement("span", {
        className: genieClass,
        style: styles.getgenieIconAlert
      })),
      content: content2,
      okText: "Yes",
      cancelText: "No",
      className: "genieimageconfirm-modal",
      zIndex: 999999,
      getContainer: () => sidebar.rootContainer,
      onOk() {
        onYes();
      },
      onCancel() {
        onCancel();
      }
    });
  };
  var ConfirmModal_default = ConfirmModal;

  // assets/src/admin/js/Common/Libs/ErrorModal.js
  var { Modal: Modal4 } = window.antd;
  var ErrorModal = ({ title, content: content2 }) => {
    const sidebar = wp.data.select("genieimage").sidebar();
    Modal4.error({
      title,
      content: content2,
      className: "genieimageconfirm-modal",
      getContainer: () => sidebar.rootContainer,
      zIndex: 999999
    });
  };
  var ErrorModal_default = ErrorModal;

  // assets/src/admin/js/Common/Libs/DrawerWrapper.js
  var { useState: useState4, useEffect: useEffect6, useCallback } = window.React;
  var { Drawer } = window.antd;
  var { ComposeComponents: ComposeComponents8 } = window.genieImage.Components.Common.ReduxManager;
  var isResizing = null;
  var sidebarConfig2 = window.genieImage.config?.sidebar || {};
  var mainWidth = sidebarConfig2?.width || 380;
  var width = {
    main: mainWidth,
    generatedOutlines: 280,
    analyzeKeywordScreen: 330,
    keywordHeatMap: 860,
    paragraphEditorScreen: 350
  };
  delete sidebarConfig2?.width;
  var DrawerWrapper = ComposeComponents8(({ children, sidebar, setSidebar, getInputs }) => {
    const [drawerWidth, setDrawerWidth] = useState4(width.main);
    const { open, generatedOutlines, analyzeKeyword } = sidebar;
    const headToHead = getInputs["headTohead"] || false;
    const cbHandleMouseMove = useCallback(handleMousemove, []);
    const cbHandleMouseUp = useCallback(handleMouseup, []);
    useEffect6(() => {
      setSidebar({ width: drawerWidth });
    }, [drawerWidth]);
    function handleMouseup(e) {
      if (!isResizing) {
        return;
      }
      isResizing = false;
      document.removeEventListener("mousemove", cbHandleMouseMove);
      document.removeEventListener("mouseup", cbHandleMouseUp);
    }
    function handleMousedown(e) {
      e.stopPropagation();
      e.preventDefault();
      document.addEventListener("mousemove", cbHandleMouseMove);
      document.addEventListener("mouseup", cbHandleMouseUp);
      isResizing = true;
    }
    function handleMousemove(e) {
      let offsetRight = document.body.offsetWidth - (e.clientX - document.body.offsetLeft);
      let minWidth = 380;
      let maxWidth = window.innerWidth * 0.8;
      if (offsetRight > minWidth && offsetRight < maxWidth) {
        setDrawerWidth(offsetRight);
      }
    }
    const closeSidebar = () => {
      setSidebar({
        open: false
      });
    };
    useEffect6(() => {
      if (analyzeKeyword.open && !generatedOutlines.open) {
        setDrawerWidth(width.main + width.analyzeKeywordScreen);
      }
      if (generatedOutlines.open && !analyzeKeyword.open) {
        setDrawerWidth(width.main + width.generatedOutlines);
      }
      if (generatedOutlines.open && analyzeKeyword.open) {
        setDrawerWidth(width.main + width.generatedOutlines + width.analyzeKeywordScreen);
      }
      if (!generatedOutlines.open && !analyzeKeyword.open) {
        setDrawerWidth(width.main);
      }
      if (sidebar.paragraphEditorScreen.open && analyzeKeyword.open) {
        setDrawerWidth(width.main + width.analyzeKeywordScreen + width.paragraphEditorScreen);
      }
      if (sidebar.paragraphEditorScreen.open && !analyzeKeyword.open) {
        setDrawerWidth(width.main + width.paragraphEditorScreen);
      }
      if (headToHead) {
        setSidebar({
          analyzeKeyword: {
            open: false
          },
          generatedOutlines: {
            ...sidebar.generatedOutlines,
            open: false
          }
        });
        setDrawerWidth(width.main + width.keywordHeatMap);
      }
    }, [sidebar.analyzeKeyword.open, sidebar.generatedOutlines.open, sidebar.paragraphEditorScreen.open, headToHead]);
    let updatedWidth = drawerWidth;
    return /* @__PURE__ */ React.createElement(Drawer, {
      className: "genieimagedrawer",
      width: updatedWidth,
      onClose: closeSidebar,
      open,
      closable: false,
      ...sidebarConfig2,
      zIndex: 1200
    }, children(updatedWidth, width), /* @__PURE__ */ React.createElement("div", {
      className: "genieimagesidebar-draggable",
      onMouseDown: handleMousedown
    }));
  }, ["sidebar", "setSidebar", "getInputs"]);
  var DrawerWrapper_default = DrawerWrapper;

  // assets/src/admin/js/Common/Libs/GenieAiTable.js
  var { Table } = window.antd;
  var GenieAiTable = ({ columns, dataSource, pagination = false, rowData = () => {
  } }) => {
    return /* @__PURE__ */ React.createElement(Table, {
      sticky: true,
      dataSource,
      columns,
      pagination,
      bordered: true,
      onRow: rowData
    });
  };
  var GenieAiTable_default = GenieAiTable;

  // assets/src/admin/js/Common/Libs/NumberInput.js
  var { ComposeComponents: ComposeComponents9 } = window.genieImage.Components.Common.ReduxManager;
  var { Input: Input3, Form: Form5 } = window.antd;
  var { useEffect: useEffect7 } = window.React;
  var GenieNumberInput = ComposeComponents9(({ name, setInput, getInputs, sidebar, handleOnChange = () => "", defaultValue = 1, max = null, label = "", placeholder = "", type = "text", required = false, errorMessage = "", className = "", ...props }) => {
    let updatedValue = getInputs[name] || defaultValue;
    const handleChange = (value) => {
      if (isNaN(value)) {
        return;
      }
      if (max && value > max) {
        return;
      }
      handleOnChange(value);
      setInput(name, value);
    };
    useEffect7(() => {
      handleChange(getInputs[name] || updatedValue);
    }, [sidebar.currentTemplate]);
    const updateValue = (num) => {
      if (props?.disabled) {
        return;
      }
      if (updatedValue === 1 && num === -1) {
        return;
      }
      let value = parseInt(updatedValue) + parseInt(num);
      if (max && value > max) {
        return;
      }
      handleOnChange(value);
      setInput(name, value);
    };
    return /* @__PURE__ */ React.createElement(Form5.Item, {
      initialValue: updatedValue,
      className: `NumberInput ${className}`,
      label,
      name,
      rules: [{ required, message: errorMessage }]
    }, /* @__PURE__ */ React.createElement("span", {
      className: "genieimageicon-minus icon",
      onClick: () => updateValue(-1)
    }), /* @__PURE__ */ React.createElement(Input3, {
      ...props,
      type,
      placeholder,
      value: updatedValue,
      defaultValue: updatedValue,
      onChange: (e) => handleChange(e.target.value)
    }), /* @__PURE__ */ React.createElement("span", {
      className: "genieimageicon-plus icon",
      onClick: () => updateValue(1)
    }));
  }, ["setInput", "getInputs", "sidebar"]);
  var NumberInput_default = GenieNumberInput;

  // assets/src/admin/js/Common/Libs/Slider.js
  var { Slider, Form: Form6, Badge } = window.antd;
  var { ComposeComponents: ComposeComponents10 } = window.genieImage.Components.Common.ReduxManager;
  var { useEffect: useEffect8 } = window.React;
  var GenieSlider = ComposeComponents10(({ label, name, setInput, getInputs, sidebar, defaultValue, message, handleOnChange = () => "", className = "", ...props }) => {
    let max = props.max || 5, min = props.min || 1;
    const handleChange = (value) => {
      handleOnChange(value);
      setInput(name, value);
    };
    useEffect8(() => {
      setInput(name, getInputs[name] || defaultValue);
    }, [sidebar.currentTemplate]);
    let updatedValue = getInputs[name] || defaultValue;
    return /* @__PURE__ */ React.createElement(Form6.Item, {
      label,
      className: "genieimageslider " + className,
      name
    }, /* @__PURE__ */ React.createElement(Badge, {
      count: `${updatedValue || min}/${max}`
    }), /* @__PURE__ */ React.createElement(Slider, {
      min,
      max,
      ...props,
      defaultValue: updatedValue,
      onChange: handleChange,
      tooltip: (value) => /* @__PURE__ */ React.createElement("span", null, `${value}/${max}`)
    }));
  }, ["getInputs", "setInput", "sidebar"]);
  var Slider_default = GenieSlider;

  // assets/src/admin/js/Common/Libs/Navbar.js
  var { Tabs } = window.antd;
  var { TabPane } = Tabs;
  var GenieNavbar = ({ tabPaneList = [], handleActiveKey = () => "", activeKey = "", destroyInactiveTabPane = true, className = "", ...props }) => {
    return /* @__PURE__ */ React.createElement("div", {
      className: `genieimagenavbar ${className}`
    }, /* @__PURE__ */ React.createElement(Tabs, {
      onChange: handleActiveKey,
      destroyInactiveTabPane,
      activeKey,
      items: tabPaneList
    }));
  };
  var Navbar_default = GenieNavbar;

  // assets/src/admin/js/AdminPages/Partials/index.js
  var { Affix, Row: Row4, Col: Col4, Popover: Popover2, Button: Button4 } = window.antd;
  var { __ } = wp.i18n;
  var rowLayout = { gutter: 32 };
  var { useState: useState5 } = window.React;
  var content = /* @__PURE__ */ React.createElement("div", {
    className: "genieimageadmin-header-menu"
  }, /* @__PURE__ */ React.createElement("a", {
    target: "_blank",
    href: "https://getgenie.ai/docs/"
  }, /* @__PURE__ */ React.createElement("span", {
    className: "genieimageicon-copy_02"
  }), __(" Documentation", "genie-image-ai")), /* @__PURE__ */ React.createElement("a", {
    target: "_blank",
    href: "https://getgenie.ai/support-ticket/"
  }, /* @__PURE__ */ React.createElement("span", {
    className: "genieimageicon-chat"
  }), __(" Help & Support", "genie-image-ai")));
  function HeaderAdminPage() {
    const [open, setOpen] = useState5(false);
    return /* @__PURE__ */ React.createElement("header", null, /* @__PURE__ */ React.createElement(Affix, {
      offsetTop: 32,
      className: "genieimageplugin-header"
    }, /* @__PURE__ */ React.createElement("div", {
      className: "genieimagedashboard-header"
    }, /* @__PURE__ */ React.createElement(Row4, {
      className: "genieimageheader-row",
      ...rowLayout
    }, /* @__PURE__ */ React.createElement(Col4, {
      sm: 10,
      xs: 24
    }, /* @__PURE__ */ React.createElement("span", {
      className: "genieimagedashboard-header-tooltip"
    }, "V" + window.genieImage.config.version || "1.0"), /* @__PURE__ */ React.createElement("img", {
      className: "genieimagedashboard-header-image",
      src: `${window.genieImage.config.assetsUrl}/dist/admin/images/logo_black.svg`,
      alt: "Genie Image"
    }))))));
  }

  // assets/src/admin/js/AdminPages/LicenseAdminPage/index.js
  var { __: __2 } = wp.i18n;
  var { useState: useState6, useEffect: useEffect9 } = window.React;
  var { Button: Button5, Divider, Form: Form7, Typography } = window.antd;
  var { HandleFetch, HandleResponse } = window.genieImage.Components.Common.RequestManager;
  var { ComposeComponents: ComposeComponents11 } = window.genieImage.Components.Common.ReduxManager;
  var LicenseAdminPage = ComposeComponents11(({ getInputs, header = true, classPrefix = "genieimage", setSidebar }) => {
    const [loading, setLoading] = useState6(false);
    const [status, setStatus] = useState6(!!window.genieImage.config.siteToken);
    const inActiveLicenseText = /* @__PURE__ */ React.createElement("p", null, " Still can't find your license key? ", /* @__PURE__ */ React.createElement("a", {
      href: "https://getgenie.ai/support-ticket/",
      target: "_blank"
    }, " Knock us here!  "), " ");
    const [statusText, setStatusText] = useState6(inActiveLicenseText);
    useEffect9(() => {
      if (status) {
        setStatusText("Your License Is Activated");
      }
    }, []);
    const onSubmitKey = () => {
      let data = { license: getInputs["licenseKey"] };
      setLoading(true);
      HandleFetch((res) => {
        HandleResponse(res, () => {
          window.location.reload();
        });
        setLoading(false);
      }, "getLicenseToken", data);
    };
    const removeLicenseKeyProcessor = () => {
      setLoading(true);
      HandleFetch((res) => {
        HandleResponse(res, () => {
          window.location.reload();
        });
        setLoading(false);
      }, "removeLicenseToken");
    };
    const onRemoveKey = () => {
      Libs_exports.ConfirmModal(
        "Are you sure to remove license from this site?",
        "",
        removeLicenseKeyProcessor
      );
    };
    return /* @__PURE__ */ React.createElement(React.Fragment, null, header ? /* @__PURE__ */ React.createElement(HeaderAdminPage, null) : "", /* @__PURE__ */ React.createElement("div", {
      className: classPrefix + "info-wrapper"
    }, /* @__PURE__ */ React.createElement("div", {
      className: `${classPrefix}license-page ${status}`
    }, /* @__PURE__ */ React.createElement(Typography.Title, {
      level: 2
    }, __2("Genie Image License Settings", "genie-image-ai")), !status && /* @__PURE__ */ React.createElement(React.Fragment, null, /* @__PURE__ */ React.createElement(Typography.Text, {
      strong: true,
      level: 2
    }, __2("You'll need a license to use both the free and pro version of GetGenie AI.", "genie-image-ai"), /* @__PURE__ */ React.createElement(Button5, {
      style: { boxShadow: "none" },
      ghost: true,
      type: "link",
      href: "https://app.getgenie.ai/license/?product=free-trial",
      target: "_blank"
    }, __2("Claim your license here", "genie-image-ai"), " \u2192")), /* @__PURE__ */ React.createElement(Divider, null), /* @__PURE__ */ React.createElement("h3", null, __2("If you have the license key, paste the code below and activate your subscription.", "genie-image-ai")), /* @__PURE__ */ React.createElement("p", null, __2("Or, follow the steps below to activate the Genie AI plugin", "genie-image-ai"), ":"), /* @__PURE__ */ React.createElement("ul", {
      className: classPrefix + "license-page__steps"
    }, /* @__PURE__ */ React.createElement("li", null, __2("Log in to your GetGenie account.", "genie-image-ai")), /* @__PURE__ */ React.createElement("li", null, __2("Generate a license key from Product Licenses then Manage Licenses.", "genie-image-ai")), /* @__PURE__ */ React.createElement("li", null, __2("Copy the license key text and paste it inside the input box below.", "genie-image-ai")))), /* @__PURE__ */ React.createElement(Form7, {
      className: classPrefix + "license-form",
      layout: "vertical",
      onFinish: onSubmitKey
    }, !status && /* @__PURE__ */ React.createElement(Libs_exports.Input, {
      name: "licenseKey",
      required: true,
      maxLength: window.genieImage.config?.licenseKeyLength,
      errorMessage: "Your key is empty!",
      label: "Your License Key",
      placeholder: "Please insert your license key here"
    }), /* @__PURE__ */ React.createElement("div", {
      className: `${classPrefix}license-page--status ${status ? "valid" : "invalid"}`
    }, " ", statusText, " "), !status && /* @__PURE__ */ React.createElement(Libs_exports.Button, {
      className: classPrefix + "license-active",
      loading,
      icon: /* @__PURE__ */ React.createElement("span", {
        className: classPrefix + "icon-check"
      }),
      type: "primary",
      htmlType: "submit",
      disabled: (getInputs["licenseKey"] || "").length != window.genieImage.config?.licenseKeyLength,
      size: "large"
    }, " ", __2("ACTIVATE NOW", "genie-image-ai"))), status && /* @__PURE__ */ React.createElement(React.Fragment, null, /* @__PURE__ */ React.createElement("div", {
      className: classPrefix + "license-page-button-container"
    }, /* @__PURE__ */ React.createElement(Libs_exports.Button, {
      onClick: () => {
        setSidebar({ isUsageModalOpen: true });
      },
      type: "primary",
      size: "large"
    }, " ", __2("Usage details", "genie-image-ai"), " "), /* @__PURE__ */ React.createElement(Libs_exports.Button, {
      loading,
      onClick: onRemoveKey,
      type: "primary",
      danger: true,
      size: "large"
    }, " ", __2("Remove license from this domain", "genie-image-ai"), " ")), /* @__PURE__ */ React.createElement("p", null, " ", __2("See documentation", "genie-image-ai"), " ", /* @__PURE__ */ React.createElement("a", {
      href: "https://getgenie.ai/docs/getting-started/license-settings/",
      target: "_blank"
    }, " here "), " ")))));
  }, ["getInputs", "limitUsage", "setLimitUsage", "setSidebar"]);
  var LicenseAdminPage_default = LicenseAdminPage;

  // assets/src/admin/js/common-scripts.js
  window.genieImage.Components = {
    ...window.genieImage.Components,
    AdminPages: {
      LicenseAdminPage: LicenseAdminPage_default
    },
    Common: {
      ...window.genieImage.Components.Common || {},
      Libs: Libs_exports,
      Utilities: Utilities_exports
    }
  };
})();
