import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomIconPicker, CustomLink, CustomNumberPanel, CustomRangeControl, CustomToggleControl, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ['image/svg+xml']

const Main = (props) => {
    return props.children
}

const Images = (props) => {
    const { attributes, setAttributes, attribute_name, attr_val } = props;
    return Object.keys(attr_val) && Object.keys(attr_val)?.map(attr => {
        const onSelectImages = newImages => {
            const images = newImages?.map(img => {
                return Object.assign(
                    {},
                    {
                        src: img.url,
                        id: img.id,
                        alt: img.alt,
                        caption: img.caption,
                        title: img.title,
                        description: img.description,
                        link: img.link
                    }
                )
            })
            setAttributes({ [attr]: images })
        }
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        // console.log("slider", attr_val, attributes[attr])
        return (attr.endsWith(device) || check) && <BBImagePanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Images"
            multiple
            gallery
            value={attributes[attr]?.map(img => img.id)}
            reset={true}
            src={attributes[attr]}
            onClick={() => setAttributes({ [attr]: [] })}
            onSelect={onSelectImages}
        />
    })
}

const Show = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Slides To Show"
            options={[
                { label: "1", value: "1" },
                { label: "2", value: "2" },
                { label: "3", value: "3" },
                { label: "4", value: "4" },
                { label: "5", value: "5" },
                { label: "6", value: "6" },
                { label: "7", value: "7" },
                { label: "8", value: "8" },
                { label: "9", value: "9" },
                { label: "10", value: "10" }
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

const Scroll = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")] !== "1";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Slides To Scroll"
            options={[
                { label: "1", value: "1" },
                { label: "2", value: "2" },
                { label: "3", value: "3" },
                { label: "4", value: "4" },
                { label: "5", value: "5" },
                { label: "6", value: "6" },
                { label: "7", value: "7" },
                { label: "8", value: "8" },
                { label: "9", value: "9" },
                { label: "10", value: "10" }
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
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Vertical Align">
                <CustomButton
                    title="Top"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_vertical_align")] === "start"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "start" });
                    }}><i className="fas fa-arrow-up" /></CustomButton>
                <CustomButton
                    title="Center"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_vertical_align")] === "center"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "center" });
                    }}><i className="fas fa-arrows-alt-v" /></CustomButton>
                <CustomButton
                    title="Bottom"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_vertical_align")] === "end"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "end" });
                    }}><i className="fas fa-arrow-down" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Image_stretch = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Image Stretch"
            options={[
                { label: "No", value: "auto" },
                { label: "yes", value: "100%" },
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

const Navigation = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Navigation"
            options={[
                { label: "Arrows and Dots", value: "" },
                { label: "Arrows", value: "arrows" },
                { label: "Dots", value: "dots" },
                { label: "none", value: "none" },
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

const Arrows_position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        return name && attr.endsWith(device) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Arrows Position"
            options={[
                { label: "Inside", value: "em-arrows-position-inside" },
                { label: "Outside", value: "em-arrows-position-outside" }
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

const Pagination_position = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "arrows" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        return name && attr.endsWith(device) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Pagination Position"
            options={[
                { label: "Inside", value: "em-pagination-position-inside" },
                { label: "Outside", value: "em-pagination-position-outside" }
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

const Pre_type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none"
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Prev Arrows">
                <CustomButton
                    title="Default"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "default"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "default" });
                    }}><i className="fas fa-angle-left" /></CustomButton>
                <CustomButton
                    title="Svg"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "svg"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "svg" });
                    }}><i className="fas fa-cloud-upload-alt" /></CustomButton>
                <CustomButton
                    title="Icon"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "icon"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "icon" });
                    }}><i className="fas fa-volleyball-ball" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Pre_icon = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "icon" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
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

const Pre_svg = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "svg";
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
            reset={true}
            src={attributes[attr]?.url}
            onSelect={({ id, url, caption }) =>
                props.setAttributes({
                    [attr]: { id, url, caption },
                })
            }
            onClick={() => setAttributes({ [attr]:"" })}
        />
    })
}

const Next_type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none"
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) &&
            <CustomButtonGroup label="Next Arrow">
                <CustomButton
                    title="Default"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "default"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "default" });
                    }}><i className="fas fa-angle-right" /></CustomButton>
                <CustomButton
                    title="Svg"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "svg"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "svg" });
                    }}><i className="fas fa-cloud-upload-alt" /></CustomButton>
                <CustomButton
                    title="Icon"
                    variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "icon"}
                    onClick={(new_value) => {
                        setAttributes({ [attr]: "icon" });
                    }}><i className="fas fa-volleyball-ball" /></CustomButton>
            </CustomButtonGroup>
    })
}

const Next_icon = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "icon";
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

const Next_svg = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "svg";
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
            reset={true}
            src={attributes[attr]?.url}
            onSelect={({ id, url, caption }) =>
                props.setAttributes({
                    [attr]: { id, url, caption },
                })
            }
            onClick={() => setAttributes({ [attr]: "" })}
        />
    })
}

const Arrow_size = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Arrow Size"
            min="20"
            max="60"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Arrow_color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomColorPalette2
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={"Arrow Color"}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Pagination_color = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "arrows" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomColorPalette2
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={"Pagination Color"}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Pagination_active = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "arrows" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomColorPalette2
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label={"Pagination active"}
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Link_type = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Link Type"
            options={[
                { label: "None", value: "none" },
                { label: "Media File", value: "media_file" },
                { label: "Custom Url", value: "custom_url" }
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

const Link = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "custom_url";
    return name && Object.keys(attr_val).map(attr => {
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

const Caption = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Caption"
            options={[
                { label: "None", value: "none" },
                // { label: "Title", value: "title" },
                { label: "Caption", value: "caption" },
                // { label: "Description", value: "description" }
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

const Lazy_load = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Lazyload"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Autoplay = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Autoplay"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Pause_on_hover = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Pause On Hover"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}
const Pause_on_interaction = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomToggleControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Pause On Interaction"
            checked={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Autoplay_speed = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay")];
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Autoplay Speed"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Infinite_loop = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
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

const Spacing = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")] !== "1";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Spacing"
            options={[
                { label: "Default", value: "0" },
                { label: "Custom", value: "custom_spacing" }
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

const Custom_spacing = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")] !== "1" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_spacing")] === "custom_spacing";
    return name && Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Custom Spacing"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({
                    [attr]: new_value,
                });
            }}
        />
    })
}

const Animation_speed = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomNumberPanel
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Animation Speed"
            value={attributes[attr]}
            onChange={(new_value) => {
                setAttributes({ [attr]: new_value });
            }}
        />
    })
}

const Direction = (props) => {
    const { attributes, setAttributes, attr_val, attribute_name } = props;
    return Object.keys(attr_val).map(attr => {
        let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
            attributes={attributes}
            setAttributes={setAttributes}
            attr_val={attr_val}
            name={props.attr}
            label="Direction"
            options={[
                { label: "Right to Left", value: "rtl" },
                { label: "Left to Right", value: "ltr" },
                // { label: "Top to Bottom", value: "ttb" }
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

const Slides = { Main, Images, Show, Scroll, Image_stretch, Arrows_position, Pagination_position, Navigation, Link_type, Vertical_align, Link, Caption, Lazy_load, Autoplay, Pause_on_hover, Pause_on_interaction, Autoplay_speed, Infinite_loop, Animation_speed, Direction, Spacing, Custom_spacing, Pre_type, Pre_icon, Pre_svg, Next_type, Next_icon, Next_svg, Arrow_size, Arrow_color, Pagination_color, Pagination_active }
export default Slides;