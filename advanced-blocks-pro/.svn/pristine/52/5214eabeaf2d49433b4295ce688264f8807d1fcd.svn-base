import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { CustomButton, CustomButtonGroup, CustomColorPalette2, CustomRadioControl, CustomRangeControl, CustomToggleControl, CustomUnitControl, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ['image/svg+xml']

const Main = (props) => {
    return props.children
}

const Layout = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Layout">
                <CustomButton
					title="Default"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "list_layout")] === "block"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "block" });
                    }}><i className="fas fa-ellipsis-h" /></CustomButton>
                <CustomButton
					title="Inline"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "list_layout")] === "inline"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "inline" });
                    }}><i className="fas fa-list-ul" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Space_between  = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Space Between"
            min="0"
            max="50"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Icon = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={`Icon ${attributes[attr] ? "Show" : "Hide"}`}
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Text_indent = (props) => {
    const { attributes, setAttributes, attr_val ,attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_icon")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Text Indent"
            min="0"
            max="50"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Align = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRadioControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            options={[
                { label: 'Left', value: 'start' },
                { label: 'Center', value: 'center' },
                { label: 'Right', value: 'end' }
            ]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }} />
    })
}

const Divider_toggle = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Divider"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Style = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_divider_toggle")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Style"
            options={[
                { value: "solid", label: "Solid" },
                { value: "double", label: "Double" },
                { value: "dotted", label: "Dotted" },
                { value: "dashed", label: "Dashed" }
            ]}
            value={attributes[attr]}
            onChange={(value) => {
                setAttributes({ [attr]: value, })
            }}
        />
    })
}

const Weight = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_divider_toggle")]
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Weight"
            min="1"
            max="20"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Width = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "list_layout")] === "block";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="width"
            min="0"
            max="100"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Height = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "list_layout")] === "inline";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Height"
            min="1"
            max="100"
            unit={[{ value: "px", label: "Px" }, { value: "%", label: "%" }]}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "list_divider_toggle")]
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomColorPalette2
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={"Color"}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}


const List = { Main, Layout,Icon, Space_between, Text_indent, Align, Divider_toggle, Style, Weight, Width, Height, Color };
export default List;