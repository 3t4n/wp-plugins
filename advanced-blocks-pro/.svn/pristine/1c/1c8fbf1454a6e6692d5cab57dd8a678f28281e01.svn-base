import React from 'react'
import { CustomRangeControl, CustomUnitControl, SelectControls } from '../custom_panel/panel';
import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";

const Main = (props) => {
    return props.children
}

const Content_width = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Content Width"
            options={[
                { label: "Full Width", value: "" },
                { label: "Boxed", value: "boxed"  }
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Custom_width = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "section_content_width")] === "boxed";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            min={500}
            max={1600}
            label="Custom Width"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Columns_gap = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return  Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Columns Gap"
            options={[
                { label: "Default", value: "10px" },
                { label: "No Gap", value: "0px" },
                { label: "Narrow", value: "5px" },
                { label: "Extended", value: "15px" },
                { label: "Wide", value: "20px" },
                { label: "Wider", value: "30px" },
                { label: "Custom", value: "custom" },
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Custom_columns_gap = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "section_columns_gap")] === "custom";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            min={0}
            max={attributes[attr].endsWith("px") ? 500: 100}
            units={[
                { value: "px", label: "px", default: 0 },
                { value: "%", label: "%", default: 10 },
                { value: "vh", label: "vh", default: 0 },
                { value: "vw", label: "vw", default: 0 },
            ]}
            label="Custom Columns Gap" 
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Height_type = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return  Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Height"
            options={[
                { label: "Default", value: "default" },
                { label: "Fit To Screen", value: "fit-to-screen" },
                { label: "Min Height", value: "min-height" }
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Min_height = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "section_height_type")] === "min-height";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Minimum Height" 
            min={0}
            max={attributes[attr].endsWith("px")? 1440 : 100}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}
 
const Column_position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "section_height_type")] !== "default";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Column Position"
            options={[
                { label: "Stretch", value: "stretch" },
                { label: "Top", value: "flex-start" },
                { label: "Middle", value: "center" },
                { label: "Bottom", value: "flex-end" }
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Vertical_align = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return  Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Vertical Align"
            options={[
                { label: "Top", value: "flex-start" },
                { label: "Middle", value: "center" },
                { label: "Bottom", value: "flex-end" },
                { label: "Space Between", value: "space-between" },
                { label: "Space Around", value: "space-around" },
                { label: "Space Evenly", value: "space-evenly" }
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Overflow = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return  Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Overflow"
            options={[
                { label: "Default", value: "visible" },
                { label: "Hidden", value: "hidden" } 
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Html_tag = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return  Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="HTML Tag"
            options={[
                { label: "Section", value: "section" }, 
                { label: "Div", value: "div" }, 
                { label: "Header", value: "header" }, 
                { label: "Footer", value: "footer" }, 
                { label: "Main", value: "main" }, 
                { label: "Artical", value: "artical" }, 
                { label: "Aside", value: "aside" }, 
                { label: "Nav", value: "nav" }, 
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Section = { Main, Content_width, Custom_width, Columns_gap, Custom_columns_gap, Height_type, Min_height, Column_position, Vertical_align, Overflow, Html_tag };
export default Section;
