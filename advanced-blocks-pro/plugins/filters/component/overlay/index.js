import React from 'react'
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomGradientColorPalette, CustomRangeControl, SelectControls } from '../custom_panel/panel';
const ALLOWED_MEDIA_TYPE = ["image"];

import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";

const Main = (props) => {
    return props.children
}

const Type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Background Overlay">
                <CustomButton
                    title="Solid"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "solid" });
                    }}><i className="fas fa-paint-brush" /></CustomButton>
                <CustomButton
                    title="Gradient"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "gradient"}
                    isSecondary onClick={(new_value) => {
                        setAttributes({ [attr]: "gradient" });
                        console.log("btn", new_value);
                    }}><i className="fas fa-palette" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid";
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


const Blendmode = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_color")] || attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] || attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_gradient")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Blend Mood"
            options={[
                { value: "", label: "Default" },
                { value: "normal", label: "Normal" },
                { value: "multiply", label: "Multiply" },
                { value: "screen", label: "Screen" },
                { value: "overlay", label: "Overlay" },
                { value: "darken", label: "Darken" },
                { value: "lighten", label: "Lighten" },
                { value: "color-dodge", label: "Color Sodge" },
                { value: "saturation", label: "Saturation" },
                { value: "color", label: "Color" },
                { value: "difference", label: "Difference" },
                { value: "exclusion", label: "Exclusion" },
                { value: "hue", label: "Hue" },
                { value: "luminosity", label: "Luminosity" },
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

const Image = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <BBImagePanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            allowedTypes={ALLOWED_MEDIA_TYPE}
            label="Image"
            reset={true}
            value={attributes[attr]?.id}
            src={attributes[attr]?.url}
            onSelect={({ id, url, caption }) =>
                setAttributes({
                    [attr]: { id, url, caption },
                })
            }
            onClick={() =>
                setAttributes({
                    [attr]: "",
                })
            }
        />
    })
}

const Position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Position"
            options={[
                { label: "Default", value: "" },
                { label: "Center Center", value: "center" },
                { label: "Center Left", value: "left" },
                { label: "Center Right", value: "right" },
                { label: "Top Center", value: "top" },
                { label: "Top Left", value: "left top" },
                { label: "Top Right", value: "right top" },
                { label: "Bottom Center", value: "bottom center" },
                { label: "Bottom Left", value: "left bottom" },
                { label: "Bottom right", value: "right bottom" },
                // { label: "Custom", value: "initial" },
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

const Attachment = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Attachment"
            options={[
                { label: "Default", value: "" },
                { label: "Scroll", value: "scroll" },
                { label: "Fixed", value: "fixed" },
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

const Repeat = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Repeat"
            options={[
                { label: "Default", value: "" },
                { label: "No Repeat", value: "no-repeat" },
                { label: "Repeat", value: "repeat" },
                { label: "Repeat-x", value: "repeat-x" },
                { label: "Repeat-y", value: "repeat-y" },
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

const Size = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Size"
            options={[
                { label: "Default", value: "" },
                { label: "Auto", value: "auto" },
                { label: "Cover", value: "cover" },
                { label: "Contain", value: "contain" },
                // { label: "Custom", value: "custom" },
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

const Gradient = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "gradient";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomGradientColorPalette
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Gradient"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Opacity = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_color")] || attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] || attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_gradient")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Opacity"
            min={0}
            max={1}
            step={0.01}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Overlay = { Main, Type, Color, Image, Blendmode, Opacity, Position, Repeat, Attachment, Size, Gradient };
export default Overlay;
