import { __ } from "@wordpress/i18n";
import { useState, useEffect } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import { getQueryArg } from "@wordpress/url";

import {
  Button,
  FormTokenField,
  SelectControl,
  Snackbar,
  TextControl,
  ToggleControl,
  __experimentalGrid as Grid,
} from "@wordpress/components";

const Tabs = (props) => {
  const ruleTypes = [
    { label: __("Choose rule type", "advanced-control-for-gutenberg"), value: "", disabled: true },
    { label: __("Post Type", "advanced-control-for-gutenberg"), value: "post_type" },
    { label: __("User Role", "advanced-control-for-gutenberg"), value: "user_role" },
    { label: __("User Name", "advanced-control-for-gutenberg"), value: "user_name" },
  ];

  const ruleOperands = [
    { label: __("Choose condition", "advanced-control-for-gutenberg"), value: "", disabled: true },
    { label: __("is one of", "advanced-control-for-gutenberg"), value: "is_one_of" },
    {
      label: __("is not one of", "advanced-control-for-gutenberg"),
      value: "is_not_one_of",
    },
  ];

  const ruleActions = [
    { label: __("Select an action", "advanced-control-for-gutenberg"), value: "", disabled: true },
    {
      label: __("Enable blocks", "advanced-control-for-gutenberg"),
      value: "enable_blocks",
    },
    {
      label: __("Disable blocks", "advanced-control-for-gutenberg"),
      value: "disable_blocks",
    },
    {
      label: __("Enable blocks by category", "advanced-control-for-gutenberg"),
      value: "enable_blocks_by_category",
    },
    {
      label: __("Disable blocks by category", "advanced-control-for-gutenberg"),
      value: __("disable_blocks_by_category", "advanced-control-for-gutenberg"),
    },
    {
      label: __("Enable settings", "advanced-control-for-gutenberg"),
      value: "enable_settings",
    },
    {
      label: __("Disable settings", "advanced-control-for-gutenberg"),
      value: "disable_settings",
    },
  ];

  const ruleSupportActions = [
    { label: __("Select an action", "advanced-control-for-gutenberg"), value: "", disabled: true },
    { label: __("Disable", "advanced-control-for-gutenberg"), value: "disable" },
    { label: __("Enable", "advanced-control-for-gutenberg"), value: "enable" },
  ];

  const defautlSettings = {
    rule_set: [
      {
        availableRuleTypes: [...ruleTypes],
        type: "", //rule.type,
        operand: "", //rule.operand,
        ruleValues: [], //,rule.ruleValues,
        ands: [],
      },
    ],
    blocks: [],
    categories: [],
    supports: [],
    rule_action: "",
    rule_support_action: "",
    rule_status: true,
  };

  const wpPostTypes = acfg_global
    ? acfg_global.post_types
    : [];

  const wpRoles = acfg_global
    ? acfg_global.roles
    : [];

  const wpBlocks = acfg_global
    ? acfg_global.blocks
    : [];

  const wpBlockCategories = acfg_global
    ? acfg_global.categories
    : [];


  const allSupports = acfg_global
    ? acfg_global.supports
    : [];

  const blocksWithoutRegisteredCategory = acfg_global
    ? acfg_global.blocks_without_registered_category
    : [];

  const [commonSupports, setCommonSupports] = useState([]);

  const [userNames, setUserNames] = useState([]);

  const indexArg = getQueryArg(document.location.href, "index");

  const userSettings =
    acfg_rules && typeof indexArg !== "undefined"
      ? acfg_rules[indexArg]
      : defautlSettings;

  const [searching, setSearching] = useState(false);
  const [loading, setLoading] = useState(false);
  const [ruleSetIndex, setRuleSetIndex] = useState(indexArg ? indexArg : 0);
  const [ruleAction, setRuleAction] = useState(userSettings.rule_action);

  const [ruleName, setRuleName] = useState(userSettings.rule_name);
  const [ruleStatus, setRuleStatus] = useState(
    userSettings.rule_status ? userSettings.rule_status : false
  );
  const [ruleSet, setRuleSet] = useState(userSettings.rule_set);
  const [blocks, setBlocks] = useState(userSettings.blocks);
  const [categories, setCategories] = useState(userSettings.categories);
  const [supports, setSupports] = useState(userSettings.supports);

  const [requestStatus, setRequestStatus] = useState(false);
  const [onSaveMessage, setOnSaveMessage] = useState("");

  useEffect(() => {
    getBlocksCommonSupports(blocks);
  },[]);

  useEffect(() => {
    const duplicateTitles = [];
    const seenTitles = new Set();

    wpBlocks.forEach(wpBlock => {
        const prevSize = seenTitles.size;
        seenTitles.add(wpBlock.title);

        if (seenTitles.size === prevSize) {
            // The title was already in the set, so it's a duplicate
            duplicateTitles.push(wpBlock.name);
        }
    });

    // Now loop through the duplicateTitles
    duplicateTitles.forEach(duplicateName => {
        wpBlocks.forEach(wpBlock => {
            if (wpBlock.name === duplicateName) {
              wpBlock.title = `${wpBlock.title} (${wpBlock.name})`;
            }
        });
    });

  }, [wpBlocks]);

  const setRuleType = (value, index, andIndex = null) => {
    const newRuleSet = [...ruleSet];
    
    let notAvailableTypes = newRuleSet[index].ands
      .filter(item => item.type && item.type.trim() !== '')
      .map(item => item.type);
    if(newRuleSet[index].type){
      notAvailableTypes.push(newRuleSet[index].type);
    }
    notAvailableTypes.push(value);

    let prevTypeValue;
    if (andIndex !== null) {
      prevTypeValue = newRuleSet[index].ands[andIndex].type;
      newRuleSet[index].ands[andIndex].type = value;
    } else {
      prevTypeValue = newRuleSet[index].type;
      newRuleSet[index].type = value;
    }

    if(prevTypeValue){
      notAvailableTypes = notAvailableTypes.filter(item => item !== prevTypeValue);
      if( prevTypeValue == 'post_type' ){
        setPostTypeValues([], index, andIndex) 
      }else if(prevTypeValue == 'user_role'){
        setRoleValues([], index, andIndex)
      }else if(prevTypeValue == 'user_name'){
        setUserNamesValues([], index, andIndex)
      }
    }
    const availableTypes = ruleTypes.map(type => {
      if (notAvailableTypes.includes(type.value)) {
          return { ...type, disabled: true };
      }
      return type;
    });
    newRuleSet[index].availableRuleTypes = availableTypes;

    setRuleSet(newRuleSet);
  };

  const setRuleOperand = (value, index, andIndex = null) => {
    const newRuleSet = [...ruleSet];
    if (andIndex !== null) {
      newRuleSet[index].ands[andIndex].operand = value;
    } else {
      newRuleSet[index].operand = value;
    }
    setRuleSet(newRuleSet);
  };

  const saveRuleSet = () => {
    setLoading(true);

    const data = {
      rule_name: ruleName,
      rule_status: ruleStatus,
      rule_set: ruleSet,
      rule_action: ruleAction,
      blocks: blocks,
      categories: categories,
      supports: supports,
      index: typeof ruleSetIndex !== "undefined" ? ruleSetIndex : false,
    };

    apiFetch({
      path: "/re_acfg/v1/save_settings",
      method: "POST",
      data: data,
    })
      .then((response) => {
        setLoading(false);
        setRequestStatus(response.success);
        setOnSaveMessage(response.message);
        if (response.success) {
          setRuleSetIndex(response.index);
        }
      })
      .catch((error) => {
        setLoading(false);
        console.log(error);
      });

    window.scrollTo(0, 0);
  };

  const setPostTypeValues = (values, index, andIndex = null) => {
    let newRuleSet = [...ruleSet];
    let ruleValues = [];

    if (andIndex !== null) {
      ruleValues = newRuleSet[index].ands[andIndex].ruleValues;
    } else {
      ruleValues = newRuleSet[index].ruleValues;
    }

    let newValue = ruleValues;
    if (values.length < ruleValues.length) {
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = values;
      } else {
        newRuleSet[index].ruleValues = values;
      }

      setRuleSet([...newRuleSet]);
    } else {
      Object.keys(wpPostTypes).forEach((key) => {
        values = values || [];
        values.forEach((value) => {
          if (value == wpPostTypes[key]) {
            newValue.push({
              id: key,
              value: wpPostTypes[key],
            });
          }
        });
      });
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = newValue;
      } else {
        newRuleSet[index].ruleValues = newValue;
      }
      setRuleSet([...newRuleSet]);
    }
  };

  const setRoleValues = (values, index, andIndex = null) => {
    let newRuleSet = [...ruleSet];
    let ruleValues = [];

    if (andIndex !== null) {
      ruleValues = newRuleSet[index].ands[andIndex].ruleValues;
    } else {
      ruleValues = newRuleSet[index].ruleValues;
    }

    let newValue = ruleValues;
    if (values.length < ruleValues.length) {
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = values;
      } else {
        newRuleSet[index].ruleValues = values;
      }

      setRuleSet([...newRuleSet]);
    } else {
      Object.keys(wpRoles).forEach((key) => {
        values = values || [];
        values.forEach((value) => {
          if (value == wpRoles[key]) {
            newValue.push({
              id: key,
              value: wpRoles[key],
            });
          }
        });
      });
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = newValue;
      } else {
        newRuleSet[index].ruleValues = newValue;
      }
      setRuleSet([...newRuleSet]);
    }
  };

  const setUserNamesValues = (values, index, andIndex = null) => {
    let newRuleSet = [...ruleSet];
    let ruleValues = [];

    if (andIndex !== null) {
      ruleValues = newRuleSet[index].ands[andIndex].ruleValues;
    } else {
      ruleValues = newRuleSet[index].ruleValues;
    }

    let newValue = ruleValues;
    if (values.length < ruleValues.length) {
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = values;
      } else {
        newRuleSet[index].ruleValues = values;
      }

      setRuleSet([...newRuleSet]);
    } else {
      Object.keys(userNames).forEach((key) => {
        values = values || [];
        values.forEach((value) => {
          if (value == userNames[key].display_name) {
            newValue.push({
              id: key,
              value: userNames[key].display_name,
            });
          }
        });
      });
      if (andIndex !== null) {
        newRuleSet[index].ands[andIndex].ruleValues = newValue;
      } else {
        newRuleSet[index].ruleValues = newValue;
      }
      setRuleSet([...newRuleSet]);
    }
  };

  const setBlockValues = (values) => {
    
    if (values.length < blocks.length) {
      setBlocks(values);
      getBlocksCommonSupports(values);
    } else {

      // check if `all` is selcted
      let newValue;
      let lastValue = values[values.length - 1];
      if(lastValue == 'All Blocks'){
        newValue = [{
          id: 'all',
          value: 'All Blocks',
        }];
        setBlocks(newValue);
        getBlocksCommonSupports(newValue);
        return;
      }
      if(values.length == 2 && values[0].id == 'all' ){
        return;
      }

      newValue = [...blocks];
      wpBlocks.forEach((wpBlock) => {
        values = values || [];
        values.forEach((value) => {
          if (value == wpBlock.title) {
            newValue.push({
              id: wpBlock.name,
              value: wpBlock.title,
            });
          }
        });
      });

      setBlocks(newValue);
      getBlocksCommonSupports(newValue);
    }
  };

  const setBlockCategoriesValues = (values) => {
    let newValue = categories;
    if (values.length < categories.length) {
      setCategories(values);
    } else {
      Object.keys(wpBlockCategories).forEach((key) => {
        values = values || [];
        values.forEach((value) => {
          if (value == wpBlockCategories[key]) {
            newValue.push({
              id: key,
              value: wpBlockCategories[key],
            });
          }
        });
      });

      setCategories(newValue);
    }
  };

  const setSupportValues = (values) => {
    let newValue = supports;
    if (values.length < supports.length) {
      setSupports(values);
    } else {
      Object.keys(commonSupports).forEach((key) => {
        values = values || [];
        values.forEach((value) => {
          if (value == commonSupports[key]) {
            newValue.push({
              id: key,
              value: commonSupports[key],
            });
          }
        });
      });

      setSupports(newValue);
    }
  };

  const addRuleToRuleSet = (rule = null, index = 0, condition = "") => {
    let newRuleSet = [...ruleSet];
    if (condition == "and") {
      let ands = newRuleSet[index].ands ? newRuleSet[index].ands : [];
      ands.push({
        type: "",
        operand: "",
        ruleValues: [],
      });
      newRuleSet[index].ands = ands;
    } else {
      newRuleSet.push({
        availableRuleTypes: [...ruleTypes],
        type: "", //rule.type,
        operand: "", //rule.operand,
        ruleValues: [], //,rule.ruleValues,
        ands: [],
      });
    }

    setRuleSet([...newRuleSet]);
  };

  const removeRuleSet = (index, andIndex = null) => {
    let newRuleSet = ruleSet;
    let typeValue;
    if (andIndex !== null) {
      typeValue = newRuleSet[index].ands[andIndex].type;
      newRuleSet[index].ands.splice(andIndex, 1);
    } else {
      typeValue = newRuleSet[index].type;
      newRuleSet.splice(index, 1);
    }
    
    const modifiedAvailableRuleTypes = newRuleSet[index].availableRuleTypes.map(rule => {
      if (rule.value === typeValue) {
          return { ...rule, disabled: false }; 
      }
      return rule;
    });
    newRuleSet[index].availableRuleTypes = modifiedAvailableRuleTypes;

    setRuleSet([...newRuleSet]);
  };

  // const getLabel = (type, value) => {
  //   if ( type === 'type') {
  //     ruleTypes.forEach((ruleType) => {
  //       if (ruleType.value === value) {
  //         return ruleType.label;
  //       }
  //     })
  //   }
  // }

  const searchUserNames = (query, index) => {
    if (query.length < 3) {
      return [];
    }
    setSearching(true);
    apiFetch({
      path: "/re_acfg/v1/search_users",
      method: "POST",
      data: {
        query: query,
      },
    })
      .then((response) => {
        setSearching(false);
        setRequestStatus(response.success);
        setUserNames(response);
      })
      .catch((error) => {
        setSearching(false);
        console.log(error);
      });
    window.scrollTo(0, 0);
  };

  const getBlocksCommonSupports = (blocks) => {
    let selectedBlocksSupports = {};
    if (blocks.length === 1 && blocks[0].id == 'all') {
      setCommonSupports(allSupports);
      return;
    }
  
    blocks.forEach(block => {
      const wpBlock = wpBlocks.find(wpBlock => wpBlock.name === block.id);
      if (!wpBlock) return;
  
      let supports = wpBlock.supports;
      if (!supports || Object.keys(supports).length === 0) return;
  
      let blockSupports = {};
      Object.keys(supports).forEach(slug => {
        let supportItem = {};
        let support = supports[slug];
        if (typeof support === 'object' && support !== null && !Array.isArray(support)) {
          Object.keys(support).forEach(key => {
            supportItem = { ...supportItem, ...processSupportValues(slug, key, support[key]) };
          });
        } else {
          supportItem = { [slug]: capitalizeFirstLetter(slug) };
        }
        blockSupports = { ...blockSupports, ...supportItem };
      });
  
      selectedBlocksSupports[wpBlock.name] = blockSupports;
    });
  
    const selectedBlocksSupportsArray = Object.values(selectedBlocksSupports);
    if (selectedBlocksSupportsArray.length === 0) return {};
    const firstBlock = selectedBlocksSupportsArray[0];
    const blocksCommonSupports = {};
  
    Object.keys(firstBlock).forEach(key => {
      if (selectedBlocksSupportsArray.every(obj => obj.hasOwnProperty(key) && obj[key] === firstBlock[key])) {
        blocksCommonSupports[key] = firstBlock[key];
      }
    });
  
    setCommonSupports(blocksCommonSupports);
  }
  
  const processSupportValues = (slug, key, values) => {
    let supportItem;
    if (typeof values === 'object' && values !== null && !Array.isArray(values)) {
      supportItem = {};
      Object.keys(values).forEach(vkey => {
        supportItem = { ...supportItem, ...processSupportValue(slug, key, vkey, values[vkey]) };
      });
    } else if (typeof key === 'number') {
      supportItem = { [`${slug}:v:${values}`]: `${capitalizeFirstLetter(slug)} ${capitalizeFirstLetter(values)}` };
    } else {
      supportItem = { [`${slug}:${key}`]: `${capitalizeFirstLetter(slug)} ${capitalizeFirstLetter(key)}` };
    }
  
    return supportItem;
  }
  
  const processSupportValue = (slug, key, vkey, value) => {
    let supportItem;
    if (typeof vkey === 'number') {
      supportItem = { [`${slug}:${key}:v:${value}`]: `${capitalizeFirstLetter(slug)} ${capitalizeFirstLetter(key)} ${capitalizeFirstLetter(value)}` };
    } else {
      supportItem = { [`${slug}:${key}:${vkey}`]: `${capitalizeFirstLetter(slug)} ${capitalizeFirstLetter(key)} ${capitalizeFirstLetter(vkey)}` };
    }
  
    return supportItem;
  }
  
  const capitalizeFirstLetter = (str) => {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }  

  return (
    <div className="refact-settings-tabs__contents">
      <div className="refact-settings-tabs" key="settings-tabs">
        {onSaveMessage && (
          <Snackbar
            className={
              "refact-snackbar refact-snackbar-settings" +
              (requestStatus
                ? " refact-snackbar-success"
                : " refact-snackbar-error")
            }
            explicitDismiss
            onDismiss={() => setOnSaveMessage("")}
            status={requestStatus ? "success" : "error"}
          >
            {onSaveMessage}
          </Snackbar>
        )}
        <div className="refact-settings-box">
          <div className="refact-tabs-headline">
            <h2>{typeof indexArg === "undefined" ? __("Add New Rule", "advanced-control-for-gutenberg") : __("Edit Rule", "advanced-control-for-gutenberg")}</h2>
            <p>
              {typeof indexArg === "undefined" ? __(
                "Add a rule or a group of rules for an action.",
                "acfg"
              ) : __(
                "Edit/Add a rule or a group of rules for an action.",
                "acfg"
              )}
            </p>
          </div>
          <div className="refact-tabs__content">
            <div
              className="refact-acfg-settings-rules"
              key="refact-acfg-settings"
            >
              <div className="refact-row">
                <div className="refact-col-6 refact-w-600">
                  <TextControl
                    help="Give your rule a name"
                    label="Rule name"
                    onChange={(value) => setRuleName(value)}
                    value={ruleName}
                  />
                </div>
                <div className="refact-col-6">
                  <div className="refact-form-toggle">
                    <ToggleControl
                      className="refact-acfg-settings-rule-status"
                      help={__(
                        "Make it active or inactive",
                        "acfg"
                      )}
                      label={__("Status", "advanced-control-for-gutenberg")}
                      onChange={() => setRuleStatus((state) => !state)}
                      checked={ruleStatus}
                    />
                  </div>
                </div>
              </div>
              <small className="refact-rule__text">
                {__("Apply this rules if", "advanced-control-for-gutenberg")}
              </small>
              {ruleSet.length === 0 ? (
                <Button
                  variant="secondary"
                  onClick={() => addRuleToRuleSet()}
                  isBusy={false}
                >
                  {__("Add Rule", "advanced-control-for-gutenberg")}
                </Button>
              ) : (
                <div className="refact-acfg-settings-rules-set">
                  {ruleSet.map((rule, index) => {
                    return (
                      <div
                        className="refact-acfg-settings-rule"
                        key={`refact-acfg-settings-rule-${index}`}
                      >
                        {index > 0 && (
                          <small className="refact-rule__text">OR</small>
                        )}
                        <div className="refact-settings-rule-row">
                            <SelectControl
                            // help="Select when you want to simplify the editor"
                            // label="When"
                            onChange={(value) => setRuleType(value, index)}
                            options={rule.availableRuleTypes}
                            value={rule.type}
                          />

                          <SelectControl
                            // help="Select your operand"
                            // label="Condition"
                            disabled={rule.type === ""}
                            onChange={(value) => setRuleOperand(value, index)}
                            options={ruleOperands}
                            value={rule.operand}
                          />

                          {("" == rule.type || "post_type" === rule.type) && (
                            <FormTokenField
                              disabled={rule.operand === ""}
                              __experimentalAutoSelectFirstMatch
                              __experimentalExpandOnFocus
                              __experimentalShowHowTo={false}
                              label={null}
                              __experimentalRenderItem={(value) => {
                                let newValue = value.item;
                                Object.keys(wpPostTypes).forEach((key) => {
                                  if (wpPostTypes[key] === value.item) {
                                    newValue = (
                                      <div>
                                        <strong>{wpPostTypes[key]}</strong>
                                        <small>{" " + key}</small>
                                      </div>
                                    );
                                  }
                                });

                                return newValue;
                              }}
                              placeholder={__(
                                "Click to select",
                                "acfg"
                              )}
                              onChange={(value) =>
                                setPostTypeValues(value, index)
                              }
                              suggestions={Object.keys(wpPostTypes).map(
                                (key) => {
                                  return wpPostTypes[key];
                                }
                              )}
                              value={rule.ruleValues}
                            />
                          )}

                          {"user_role" === rule.type && (
                            <FormTokenField
                              disabled={rule.operand === ""}
                              __experimentalAutoSelectFirstMatch
                              __experimentalExpandOnFocus
                              __experimentalShowHowTo={false}
                              label={null}
                              __experimentalRenderItem={(value) => {
                                let newValue = value.item;
                                Object.keys(wpRoles).forEach((key) => {
                                  if (wpRoles[key] === value.item) {
                                    newValue = (
                                      <div>
                                        <strong>{wpRoles[key]}</strong>
                                      </div>
                                    );
                                  }
                                });

                                return newValue;
                              }}
                              placeholder={__(
                                "Click to select",
                                "acfg"
                              )}
                              onChange={(value) => setRoleValues(value, index)}
                              suggestions={Object.keys(wpRoles).map((key) => {
                                return wpRoles[key];
                              })}
                              value={rule.ruleValues}
                            />
                          )}

                          {"user_name" === rule.type && (
                            <FormTokenField
                              disabled={rule.operand === ""}
                              __experimentalAutoSelectFirstMatch
                              __experimentalExpandOnFocus
                              __experimentalShowHowTo={false}
                              label={null}
                              onInputChange={(value) =>
                                searchUserNames(value, index)
                              }
                              __experimentalRenderItem={(value) => {
                                let newValue = value.item;
                                Object.keys(userNames).forEach((key) => {
                                  if (
                                    userNames[key].display_name === value.item
                                  ) {
                                    newValue = (
                                      <div>
                                        <strong>
                                          {userNames[key].display_name}
                                        </strong>
                                        <div>
                                          <small>
                                            {userNames[key].user_login}
                                          </small>
                                          {" / "}
                                          <small>
                                            {userNames[key].user_email}
                                          </small>
                                        </div>
                                      </div>
                                    );
                                  }
                                });

                                return newValue;
                              }}
                              placeholder={__(
                                "Type to search users",
                                "acfg"
                              )}
                              onChange={(value) =>
                                setUserNamesValues(value, index)
                              }
                              suggestions={Object.keys(userNames).map((key) => {
                                return userNames[key].display_name;
                              })}
                              value={rule.ruleValues}
                            />
                          )}
                          <div className="refact-acfg-settings-rules-actions">
                            <Button
                              variant="secondary"
                              onClick={() =>
                                addRuleToRuleSet(rule, index, "and")
                              }
                              isBusy={false}
                              className="refact-btn refact-btn--secondary"
                              // isSmall={true}
                            >
                              AND
                            </Button>
                            {ruleSet.length > 1 && (
                              <Button
                                className="refact-btn refact-btn-danger refact-acfg-settings-rules-delet"
                                onClick={() => removeRuleSet(index)}
                                isDestructive={true}
                              >
                                <svg
                                  width="17"
                                  viewBox="0 0 17 17"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <g fill="#002729">
                                    <path d="M2.5 14.5a2.006 2.006 0 0 0 2 2h8a2.006 2.006 0 0 0 2-2v-8h-12v8ZM15.5 3.5h-4v-2a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v2h-4a1 1 0 0 0 0 2h14a1 1 0 1 0 0-2Zm-8-1h2v1h-2v-1Z" />
                                  </g>
                                </svg>
                              </Button>
                            )}
                          </div>
                        </div>
                        <div className="refact-acfg-settings-rule-ands">
                          {rule.ands.map((ruleAnd, andIndex) => {
                            return (
                              <div className="refact-settings-rule-row ands">
                                <SelectControl
                                  // help="Select when you want to simplify the editor"
                                  // label="When"
                                  onChange={(value) =>
                                    setRuleType(value, index, andIndex)
                                  }
                                  options={rule.availableRuleTypes}
                                  value={ruleAnd.type}
                                />

                                <SelectControl
                                  // help="Select your operand"
                                  // label="Condition"
                                  disabled={ruleAnd.type === ""}
                                  onChange={(value) =>
                                    setRuleOperand(value, index, andIndex)
                                  }
                                  options={ruleOperands}
                                  value={ruleAnd.operand}
                                />
                                {("" == ruleAnd.type ||
                                  "post_type" === ruleAnd.type) && (
                                  <FormTokenField
                                    disabled={ruleAnd.operand === ""}
                                    __experimentalAutoSelectFirstMatch
                                    __experimentalExpandOnFocus
                                    __experimentalShowHowTo={false}
                                    // help="Select the post types you want"
                                    label={null}
                                    __experimentalRenderItem={(value) => {
                                      let newValue = value.item;
                                      Object.keys(wpPostTypes).forEach(
                                        (key) => {
                                          if (wpPostTypes[key] === value.item) {
                                            newValue = (
                                              <div>
                                                <strong>
                                                  {wpPostTypes[key]}
                                                </strong>
                                                <small>{" " + key}</small>
                                              </div>
                                            );
                                          }
                                        }
                                      );

                                      return newValue;
                                    }}
                                    onChange={(value) =>
                                      setPostTypeValues(value, index, andIndex)
                                    }
                                    suggestions={Object.keys(wpPostTypes).map(
                                      (key) => {
                                        return wpPostTypes[key];
                                      }
                                    )}
                                    placeholder={__(
                                      "Click to select",
                                      "acfg"
                                    )}
                                    value={ruleAnd.ruleValues}
                                  />
                                )}

                                {"user_role" === ruleAnd.type && (
                                  <FormTokenField
                                    disabled={ruleAnd.operand === ""}
                                    __experimentalAutoSelectFirstMatch
                                    __experimentalExpandOnFocus
                                    __experimentalShowHowTo={false}
                                    label={null}
                                    __experimentalRenderItem={(value) => {
                                      let newValue = value.item;
                                      Object.keys(wpRoles).forEach((key) => {
                                        if (wpRoles[key] === value.item) {
                                          newValue = (
                                            <div>
                                              <strong>{wpRoles[key]}</strong>
                                            </div>
                                          );
                                        }
                                      });

                                      return newValue;
                                    }}
                                    placeholder={__(
                                      "Click to select",
                                      "acfg"
                                    )}
                                    onChange={(value) =>
                                      setRoleValues(value, index, andIndex)
                                    }
                                    suggestions={Object.keys(wpRoles).map(
                                      (key) => {
                                        return wpRoles[key];
                                      }
                                    )}
                                    value={ruleAnd.ruleValues}
                                  />
                                )}

                                {"user_name" === ruleAnd.type && (
                                  <FormTokenField
                                    disabled={ruleAnd.operand === ""}
                                    __experimentalAutoSelectFirstMatch
                                    __experimentalExpandOnFocus
                                    __experimentalShowHowTo={false}
                                    label={null}
                                    onInputChange={(value) =>
                                      searchUserNames(value, index)
                                    }
                                    __experimentalRenderItem={(value) => {
                                      let newValue = value.item;
                                      Object.keys(userNames).forEach((key) => {
                                        if (
                                          userNames[key].display_name ===
                                          value.item
                                        ) {
                                          newValue = (
                                            <div>
                                              <strong>
                                                {userNames[key].display_name}
                                              </strong>
                                              <div>
                                                <small>
                                                  {userNames[key].user_login}
                                                </small>
                                                {" / "}
                                                <small>
                                                  {userNames[key].user_email}
                                                </small>
                                              </div>
                                            </div>
                                          );
                                        }
                                      });

                                      return newValue;
                                    }}
                                    placeholder={__(
                                      "Type to search users",
                                      "acfg"
                                    )}
                                    onChange={(value) =>
                                      setUserNamesValues(value, index, andIndex)
                                    }
                                    suggestions={Object.keys(userNames).map(
                                      (key) => {
                                        return userNames[key].display_name;
                                      }
                                    )}
                                    value={ruleAnd.ruleValues}
                                  />
                                )}
                                <div className="refact-acfg-settings-rules-actions">
                                  <Button
                                    variant="secondary"
                                    onClick={() =>
                                      addRuleToRuleSet(rule, index, "and")
                                    }
                                    isBusy={false}
                                    className="refact-btn refact-btn--secondary"
                                  >
                                    AND
                                  </Button>
                                  {ruleSet.length > 0 && (
                                    <Button
                                      onClick={() =>
                                        removeRuleSet(index, andIndex)
                                      }
                                      isDestructive={true}
                                      className="refact-btn refact-btn-danger refact-acfg-settings-rules-delet"
                                    >
                                      <svg
                                        width="17"
                                        viewBox="0 0 17 17"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                      >
                                        <g fill="#002729">
                                          <path d="M2.5 14.5a2.006 2.006 0 0 0 2 2h8a2.006 2.006 0 0 0 2-2v-8h-12v8ZM15.5 3.5h-4v-2a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v2h-4a1 1 0 0 0 0 2h14a1 1 0 1 0 0-2Zm-8-1h2v1h-2v-1Z" />
                                        </g>
                                      </svg>
                                    </Button>
                                  )}
                                </div>
                              </div>
                            );
                          })}
                        </div>
                      </div>
                    );
                  })}
                  <div className="refact-acfg-settings-rules-cta">
                    <small className="refact-rule__text">
                      {__("OR", "advanced-control-for-gutenberg")}
                    </small>
                    <Button
                      variant="secondary"
                      onClick={() => addRuleToRuleSet()}
                      isBusy={false}
                      className="refact-btn refact-btn--secondary is-btn-large"
                    >
                      {__("Add rule group", "advanced-control-for-gutenberg")}
                    </Button>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>

        {ruleSet.length > 0 && (
          <div className="refact-settings-box">
            <div className="refact-tabs-headline">
              <h2>{__("Action", "advanced-control-for-gutenberg")}</h2>
              <p>
                {__(
                  "What you want to do with the blocks that match the rules you set",
                  "acfg"
                )}
              </p>
            </div>
            <div className="refact-tabs__content">
              <div className="refact-acfg-settings-actions">
                <Grid
                  columns={
                    ruleAction == "enable_settings" ||
                    ruleAction == "disable_settings"
                      ? 3
                      : 2
                  }
                >
                  <SelectControl
                    help={__(
                      "Assign an action to your rules ",
                      "acfg"
                    )}
                    label={__("Action", "advanced-control-for-gutenberg")}
                    onChange={(value) => {
                      setRuleAction(value);
                      setBlockValues([]);
                      setBlockCategoriesValues([]);
                      setSupportValues([]);
                    }}
                    options={ruleActions}
                    value={ruleAction}
                  />

                  {typeof ruleAction !== "undefined" &&
                    ruleAction != "" &&
                    ruleAction != "enable_blocks_by_category" &&
                    ruleAction != "disable_blocks_by_category" && (
                      <FormTokenField
                        maxSuggestions={300}
                        __experimentalAutoSelectFirstMatch
                        __experimentalExpandOnFocus
                        help={__(
                          "Select blocks you want",
                          "acfg"
                        )}
                        label={__("Blocks", "advanced-control-for-gutenberg")}
                        __experimentalRenderItem={(value) => {
                          let newValue = value.item;
                          wpBlocks.forEach((wpBlock) => {
                            if (wpBlock.title === value.item) {
                              newValue = (
                                <div>
                                  <h2
                                    style={{
                                      marginTop: ".5em",
                                      marginBottom: ".5em",
                                      display: "flex",
                                      alignItems: "center",
                                    }}
                                  >
                                    <strong>{wpBlock.title}</strong>{" "}
                                    <small
                                      style={{
                                        fontSize: "11px",
                                        color: "#fff",
                                        backgroundColor: "#333",
                                        padding: "3px 7px",
                                        borderRadius: "3px",
                                        opacity: ".6",
                                        fontWeight: "normal",
                                        marginLeft: "1em",
                                      }}
                                    >
                                      {wpBlock.name}
                                    </small>
                                  </h2>
                                  <div style={{ paddingBottom: ".5em" }}>
                                    {wpBlock.description}
                                  </div>
                                </div>
                              );
                            }
                          });

                          return newValue;
                        }}
                        onChange={(value) => {
                            setBlockValues(value);
                            if(ruleAction == "enable_settings" || ruleAction == "disable_settings"){
                              setSupportValues([]);
                            }
                          }
                        }
                        suggestions={wpBlocks.map((wpBlock) => {
                          return wpBlock.title;
                        })}
                        value={blocks}
                      />
                    )}

                  {(ruleAction == "enable_blocks_by_category" ||
                    ruleAction == "disable_blocks_by_category") && (
                    <FormTokenField
                      __experimentalAutoSelectFirstMatch
                      __experimentalExpandOnFocus
                      help={__("Select blocks you want", "advanced-control-for-gutenberg")}
                      label={__("Categories", "advanced-control-for-gutenberg")}
                      __experimentalRenderItem={(value) => {
                        let newValue = value.item;
                        Object.keys(wpBlockCategories).forEach((key) => {
                          if (wpBlockCategories[key] === value.item) {
                            newValue = (
                              <div>
                                <strong>{wpBlockCategories[key]}</strong>
                              </div>
                            );
                          }
                        });

                        return newValue;
                      }}
                      onChange={(value) => setBlockCategoriesValues(value)}
                      suggestions={Object.keys(wpBlockCategories).map((key) => {
                        return wpBlockCategories[key];
                      })}
                      value={categories}
                    />
                  )}
                  {(ruleAction == "enable_settings" ||
                    ruleAction == "disable_settings") && (
                    <FormTokenField
                      maxSuggestions={300}
                      __experimentalAutoSelectFirstMatch
                      __experimentalExpandOnFocus
                      label={__("Settings", "advanced-control-for-gutenberg")}
                      __experimentalRenderItem={(value) => {
                        let newValue = value.item;
                        Object.keys(commonSupports).forEach((key) => {
                          if (commonSupports[key] === value.item) {
                            newValue = (
                              <div>
                                <strong>{commonSupports[key]}</strong>
                              </div>
                            );
                          }
                        });

                        return newValue;
                      }}
                      onChange={(value) => setSupportValues(value)}
                      suggestions={Object.keys(commonSupports).map((key) => {
                        return commonSupports[key];
                      })}
                      value={supports}
                    />
                  )}
                </Grid>
              </div>
              {(blocksWithoutRegisteredCategory.length > 0 && (ruleAction === "enable_blocks_by_category" || ruleAction === "disable_blocks_by_category")) && (
                <div>
                  <div style={{ marginTop: '13px'}}><span style={{ fontWeight: 'bold'}}>Note:</span> Disabling or enabling blocks by category may not affect the following ones:</div>
                  <ul>
                    {blocksWithoutRegisteredCategory.map((block, index) => (
                      <li key={index} style={{
                        display: 'inline-block',
                        margin: 0,
                        marginTop: '6px',
                        fontSize: '10px',
                        fontWeight: 400,
                        borderRadius: '48px',
                        background: '#f2f3f3',
                        textAlign: 'center',
                        padding: '2px 6px',
                        marginRight: '5px'
                      }}>
                        {block}
                      </li>
                    ))}
                  </ul>
                </div>
              )}
              <div className="refact-acfg-settings-cta">
                {ruleSet.length > 0 && (
                  <Button
                    style={{ marginTop: "1em" }}
                    variant="primary"
                    onClick={() => saveRuleSet()}
                    isBusy={loading}
                    className="refact-btn is-btn-large"
                  >
                    {__("Save Rule", "advanced-control-for-gutenberg")}
                  </Button>
                )}
              </div>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default Tabs;
