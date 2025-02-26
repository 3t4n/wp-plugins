import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomIconPicker, CustomInputField, CustomLink, CustomUnitControl, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ['image/svg+xml']

const Main = (props) => {
    return props.children
}

const Type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Type"
            options={[
                { value: "", label: "Default" },
                { value: "info", label: "Info" },
                { value: "success", label: "Success" },
                { value: "warning", label: "Warning" },
                { value: "danger", label: "Danger" },
            ]}
            value={attributes[attr]}
            onChange={(value) => {
                setAttributes({ [attr]: value, });
                switch (value) {
                    case "info":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "button_background_color")]: "#5bc0de" });
                        break
                    case "success":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "button_background_color")]: "#61CE70" });
                        break
                    case "warning":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "button_background_color")]: "#f0ad4e" });
                        break
                    case "danger":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "button_background_color")]: "#d9534f" });
                        break
                }
            }}
        />
    })
}

const Text = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomInputField
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Link = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomLink
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Link"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Size = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Size"
            options={[
                { value: "xs", label: "Extra Small" },
                { value: "sm", label: "Small" },
                { value: "md", label: "Medium" },
                { value: "lg", label: "Large" },
                { value: "xl", label: "Extra Large" },
            ]}
            value={attributes[attr]}
            onChange={(value) => {
                setAttributes({ [attr]: value });
                switch (value) {
                    case "xs":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "font_size")]: "13px" });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "spacing_padding")]: { top: '10px', right: '20px', bottom: '10px', left: '20px' } });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "border_radius")]: { top: '2px', right: '2px', bottom: '2px', left: '2px' } })
                        break
                    case "sm":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "font_size")]: "15px" });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "spacing_padding")]: { top: '12px', right: '24px', bottom: '12px', left: '24px' } });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "border_radius")]: { top: '3px', left: '3px', right: '3px', bottom: '3px' } })
                        break
                    case "md":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "font_size")]: "16px" });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "spacing_padding")]: { top: '15px', right: '30px', bottom: '15px', left: '30px' } });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "border_radius")]: { top: '4px', left: '4px', right: '4px', bottom: '4px' } })
                        break
                    case "lg":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "font_size")]: "18px" });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "spacing_padding")]: { top: '20px', right: '40px', bottom: '20px', left: '40px' } });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "border_radius")]: { top: '5px', left: '5px', right: '5px', bottom: '5px' } })
                        break
                    case "xl":
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "font_size")]: "20px" });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "spacing_padding")]: { top: '25px', right: '50px', bottom: '25px', left: '50px' } });
                        setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "border_radius")]: { top: '6px', left: '6px', right: '6px', bottom: '6px' } })
                        break
                }
            }}
        />
    })
}

const Icon_type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Icon">
                <CustomButton
					title="None"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] === "none"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "none" });
                    }}><i className="fas fa-stop-circle" /></CustomButton>
                <CustomButton
					title="Svg"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] === "svg"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "svg" });
                    }}><i className="fas fa-cloud-upload-alt" /></CustomButton>
                <CustomButton
					title="Icon"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] === "icon"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "icon" });
                    }}><i className="fas fa-volleyball-ball" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Selector = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] === "icon";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomIconPicker
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Svg = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] === "svg";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <BBImagePanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="SVG"
            allowedTypes={ALLOWED_MEDIA_TYPES}
            value={attributes[attr]?.id}
            src={!!attributes[attr]?.url ? attributes[attr]?.url : "https://images.assetsdelivery.com/compings_v2/yehorlisnyi/yehorlisnyi2104/yehorlisnyi210400016.jpg"}
            onSelect={({ id, url, caption }) =>
                props.setAttributes({
                    [attr]: { id, url, caption },
                })
            }
        />
    })
}

const Icon_position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Icon Position"
            options={[
                { value: "before", label: "Before" },
                { value: "after", label: "After" }
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

const Icon_spacing = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Icon Spacing"
            min="0"
            max="50"
            units={[
                { value: "px", label: "Px" }
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

const Background_color = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomColorPalette2
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={"Background Color"}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}


const Button = { Main, Type, Text, Link, Size, Icon_type, Selector, Svg, Icon_position, Icon_spacing, Background_color };
export default Button;