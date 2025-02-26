import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomIconPicker, CustomInputField, CustomNumberPanel, CustomToggleControl, CustomUnitControl, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ["video"];
const ALLOWED_SVG_TYPES = ['image/svg+xml']


const Main = (props) => {
	return props.children
}

const Source = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Source"
			options={[
				{ label: "Youtube", value: "youtube" },
				{ label: "Vimeo", value: "vimeo" },
				{ label: "Dailymotion", value: "dailymotion" },
				{ label: "Self Hosted", value: "self-hosted" },
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

const Aspect_ratio = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Aspect Ratio"
			options={[
				{ label: "1:1", value: "100%" },
				{ label: "3:2", value: "66.66%" },
				{ label: "4:3", value: "75%" },
				{ label: "16:9", value: "56.25%" },
				{ label: "21:9", value: "42.8571%" },
				{ label: "9:16", value: "177.8%" }
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


const Youtube_link = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomInputField
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Youtube Link"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Vimeo_link = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomInputField
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Vimeo Link"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Dailymotion_link = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomInputField
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Dailymotion Link"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Link_toggle = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Link Toggle"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Selfhosted_video = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = !attributes[getAttributeValueDynamic(attributes, attribute_name, "video_link_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <BBImagePanel
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			allowedTypes={ALLOWED_MEDIA_TYPES}
			label="Choose File"
			type="video"
			value={attributes[attr]?.id}
			src={attributes[attr]?.url}
			onSelect={({ id, url, caption }) =>
				props.setAttributes({
					[attr]: { id, url, caption },
				})
			}
		/>
	})
}

const Selfhosted_link = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_link_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomInputField
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Selfhosted Link"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Start_time = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
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
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube" || attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
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

const Autoplay = (props) => {
	const { attributes, setAttributes, attr_val } = props;
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

const Play_on_mob = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_autoplay")]
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

const Mute = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Mute"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Loop = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] !== "dailymotion"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Loop"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Player_controls = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] !== "vimeo"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Player Controls"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}
const Modest_branding = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube" && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_autoplay")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Modest Branding"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}
const Privacy_mode = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Privacy Mode"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Lazy_load = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
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

const Download_button = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Download Button"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Poster = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <BBImagePanel
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Poster"
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
			} />
	})
}

const Intro_title = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Intro Title"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Intro_portrail = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Intro Portail"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}
const Intro_byline = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Intro Byline"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Video_info = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Video Info"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Logo = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Logo"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Control_color = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion" || attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomColorPalette2
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label={"Control Color"}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Overlay_toggle = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Overly Toggle"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Overlay_image = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <BBImagePanel
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Overlay Image"
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

const Play_icon = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Play Icon"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Icon_type = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) &&
			<CustomButtonGroup label="Icon">
				<CustomButton
					title="Default"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "default"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "default" });
					}}><i className="fas fa-stop-circle" /></CustomButton>
				<CustomButton
					title="Svg"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "svg"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "svg" });
					}}><i className="fas fa-cloud-upload-alt" /></CustomButton>
				<CustomButton
					title="Icon"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "icon"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "icon" });
					}}><i className="fas fa-volleyball-ball" /></CustomButton>
			</CustomButtonGroup>
	})
}


const Selector = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "icon";
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
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "svg";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <BBImagePanel
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="SVG"
			allowedTypes={ALLOWED_SVG_TYPES}
			value={attributes[attr]?.id}
			src={attributes[attr]?.url}
			reset={true}
			onSelect={({ id, url, caption }) =>
				props.setAttributes({
					[attr]: { id, url, caption },
				})
			}
			onClick={() =>
				setAttributes({
					[attr]: "",
				})}
		/>
	})
}

const Icon_color = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomColorPalette2
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label={"Control Color"}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Icon_size = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Size"
			min="6"
			max="300"
			units={[{ value: "px", label: "Px" }]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Video = { Main, Source, Overlay_toggle, Overlay_image, Play_icon, Icon_type, Selector, Svg, Icon_color, Icon_size, Selfhosted_video, Download_button, Poster, Link_toggle, Youtube_link, Vimeo_link, Dailymotion_link, Selfhosted_link, Start_time, End_time, Autoplay, Play_on_mob, Mute, Loop, Player_controls, Modest_branding, Privacy_mode, Lazy_load, Intro_title, Intro_portrail, Intro_byline, Video_info, Control_color, Logo, Aspect_ratio }
export default Video;