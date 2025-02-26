import React from 'react'
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomGradientColorPalette, CustomInputField, CustomNumberPanel, CustomToggleControl, SelectControls } from '../custom_panel/panel';
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
            <CustomButtonGroup label="Background">
                <CustomButton
					title="Solid"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid"}
                    onClick={() => {
                        setAttributes({ [attr]: "solid" });
                    }}><i className="fas fa-paint-brush" /></CustomButton>
                <CustomButton
					title="Gradient"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "gradient"}
                    isSecondary onClick={(new_value) => {
                        setAttributes({ [attr]: "gradient" });
                        console.log("btn", new_value);
                    }}><i className="fas fa-palette" /></CustomButton>
                <CustomButton
					title="Video"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video"}
                    isSecondary onClick={() => {
                        setAttributes({ [attr]: "video" });
                    }}><i className="fas fa-video" /></CustomButton>
                <CustomButton
					title="Slider"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider"}
                    isSecondary onClick={() => {
                        setAttributes({ [attr]: "slider" });
                    }}><i className="fas fa-sliders-h" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid";
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


// const Blendmode = (props) => {
//     const { attributes, setAttributes, attr_val } = props;
//     return  Object.keys(attr_val).map(attr => {
//         let device = getDevice(props.attr.toLowerCase());
//         let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
//         return (attr.endsWith(device) || check) && <SelectControls
//             attributes={attributes}
//             setAttributes={setAttributes}
//             attr_val={attr_val}
//             name={props.attr}
//             label="Blend Mood"
//             options={[
// 				{ value: "", label: "Default" },
// 				{ value: "normal", label: "Normal" },
// 				{ value: "multiply", label: "Multiply" },
// 				{ value: "screen", label: "Screen" },
// 				{ value: "overlay", label: "Overlay" },
// 				{ value: "darken", label: "Darken" },
// 				{ value: "lighten", label: "Lighten" },
// 				{ value: "color-dodge", label: "Color Sodge" },
// 				{ value: "saturation", label: "Saturation" },
// 				{ value: "color", label: "Color" },
// 				{ value: "difference", label: "Difference" },
// 				{ value: "exclusion", label: "Exclusion" },
// 				{ value: "hue", label: "Hue" },
// 				{ value: "luminosity", label: "Luminosity" },
// 			]}
//             value={attributes[attr]}
//             onChange={(new_value) => {
//                 setAttributes({
//                     [attr]: new_value,
//                 });
//             }}
//         />
//     })
// }

const Image = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid";
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
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_image")];
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
                { label: "Center Center", value: "center center"  },
                { label: "Center Left", value: "center left" },
                { label: "Center Right", value: "center right" },
                { label: "Top Center", value: "top center" },
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
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_image")];
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
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_image")];
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
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "solid" && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_image")];
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
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "gradient";
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

// const Video = (props) => {
//     const { attributes, setAttributes, attr_val, attribute_name } = props;
//     const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
//     return Object.keys(attr_val).map(attr => {
//         let device = getDevice(props.attr.toLowerCase());
//         return name && attr.endsWith(device) && <BBImagePanel
//             attributes={attributes}
//             setAttributes={setAttributes}
//             attr_val={attr_val}
//             name={props.attr}
//             label="Video"
// 			allowedTypes={ALLOWED_MEDIA_TYPES}
//             type="video"
//             value={attributes[attr]?.id}
//             src={attributes[attr]?.url}
//             onSelect={({ id, url, caption }) =>
//                 props.setAttributes({
//                     [attr]: { id, url, caption },
//                 })
//             }
//         />
//     })
// }

const Video_link = (props) => {
    const { attributes, setAttributes, attribute_name, attr_val } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <>
            <CustomInputField
                attributes={attributes}
                setAttributes={setAttributes}
                attr_val={attr_val}
                name={props.attr}
                label="Video Link"
                helper="YouTube/Vimeo link, or link to video file (mp4 is recommended)."
                value={attributes[attr]}
                onChange={(new_value) => {
                    setAttributes({ [attr]: new_value });
                }}
            />
        </>
    })
}

const Start_time = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Start Time"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const End_time = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="End Time"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Play_once = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Play Once"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Play_on_mob = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Play On Mobile"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Privacy_mode = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Privacy Mode"
            helper="Only works for YouTube videos."
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Bg_fallback = (props) => {
    const { attributes, setAttributes, attribute_name, attr_val } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <BBImagePanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Background Fallback"
            value={attributes[attr]?.id}
            reset={true}
            src={attributes[attr]?.url}
            onSelect={({ id, url, caption }) =>
                props.setAttributes({
                    [attr]: { id, url, caption },
                })
            }
            onClick={() =>
                setAttributes({
                    [attr]: "",
                })} />
    })
}

const Slider = (props) => {
    const { attributes, setAttributes, attribute_name, attr_val } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val)?.map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        const onSelectImages = newImages => {
            const images = newImages?.map(img => {
                console.log(img)
                return Object.assign(
                    {},
                    {
                        src: img.url,
                        id: img.id,
                        alt: img.alt,
                        caption: img.caption,
                        link: img.link
                    }
                )
            })
            setAttributes({ [attr]: images })
        }
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <BBImagePanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Slider"
            multiple
            gallery
            value={attributes[attr]?.map(img => img.id)}
            reset={true}
            src={attributes[attr]}
            onSelect={onSelectImages}
            onClick={() =>
                setAttributes({
                    [attr]: [],
                })} />
    })
}

const Infinite_loop = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Infinite Loop"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Duration = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    const [slideRender, setSlideRender] = React.useState(true)
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Duration"
            value={attributes[attr]}
            onChange={(new_value) => {
                setSlideRender(false)
                setAttributes({ [attr]: new_value });
                setTimeout(() => setSlideRender(true), 150)
            }}
        />
    })
}

const Transition = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Transition"
            options={[
                { label: "Right to Left", value: "rtl" },
                { label: "Left to Right", value: "ltr" },
                { label: "Top to Bottom", value: "ttb" }
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

const Transition_duration = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Duration"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Lazy_load = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Lazy Load"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Effect = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Ken burns Effect"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Effect_type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider" && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_effect")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Direction"
            options={[
                { label: "In", value: " " },
                { label: "Out", value: "em-ken-burns--out" }
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

const Slider_size = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Slider Size"
            options={[
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

const Slider_position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Slider Position"
            options={[
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


const Background = { Main, Type, Color, Image, Position, Repeat, Attachment, Size, Gradient, Video_link, Start_time, End_time, Play_once, Play_on_mob, Privacy_mode, Bg_fallback, Slider, Infinite_loop, Duration, Transition, Transition_duration, Lazy_load, Slider_size, Slider_position, Effect, Effect_type };
export default Background;
