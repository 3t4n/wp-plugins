import React from 'react'
import { getDevice, getAttributeValueDynamic } from '../../../helper/globalFunctions';
import { CustomBoxControl, CustomColorPalette2, SelectControls } from '../custom_panel/panel';

const Main = (props) => {
    return (<>
        {props.children}
    </>)
}

const Style = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Style"
            options={[
                { value: "none", label: "None" },
                { value: "solid", label: "Solid" },
                { value: "double", label: "Double" },
                { value: "dotted", label: "Dotted" },
                { value: "dashed", label: "Dashed" },
                { value: "groove", label: "Groove" }
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

const Width = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "border_style")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomBoxControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            // splitOnAxis={true}
            label="Width"
            withResponsive={false}
            withHover={false}
            units={[
                { value: 'px', label: 'Px', default: 0 },
                { value: '%', label: '%', default: 0 },
                { value: 'em', label: 'EM', default: 0 },
                { value: 'rem', label: 'REM', default: 0 }
            ]}
            inputProps={{ min: -10000, max: 10000 }}
            values={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Radius = (props) => {
    const { attributes, setAttributes, attr_val } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomBoxControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Radius"
            units={[
                { value: 'px', label: 'Px', default: 0 },
                { value: '%', label: '%', default: 0 },
                { value: 'em', label: 'EM', default: 0 },
                { value: 'rem', label: 'REM', default: 0 }
            ]}
            inputProps={{ min: -10000, max: 10000 }}
            values={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "border_style")] !== "none";
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

const Border = { Main, Style, Width, Radius, Color };
export default Border;