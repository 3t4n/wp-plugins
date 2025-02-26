import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomInputField, CustomLink, CustomRadioControl, CustomRangeControl, CustomUnitControl, SelectControls } from "../custom_panel/panel";

const Main = (props) => {
	return props.children
}


const Image = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <BBImagePanel
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Image"
			value={attributes[attr]?.id}
			src={!!attributes[attr]?.url ? attributes[attr]?.url : "http://localhost/wordpress/wp-content/plugins/elementor/assets/images/placeholder.png"}
			onSelect={({ id, url, caption }) =>
				props.setAttributes({
					[attr]: { id, url, caption },
				})
			}
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
				{ label: 'Left', value: 'left' },
				{ label: 'Center', value: 'center' },
				{ label: 'Right', value: 'right' }
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}} />
	})
}

const Caption = (props) => {
	const { attributes, setAttributes, attr_val } = props;
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
				{ value: "", label: "Default" },
				{ value: "attachment_caption", label: "Attachment Caption" },
				{ value: "custom_caption", label: "Custom Caption" },
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

const Custom_caption = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "media_caption")] === "custom_caption";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomInputField
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Custom Caption"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Link_type = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Link"
			options={[
				{ value: "none", label: "None" },
				{ value: "media_file", label: "Media File" },
				{ value: "custom_url", label: "Custom URL" },
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

const Lightbox = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "media_link_type")] === "media_file";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Lightbox"
			options={[
				{ value: "", label: "Default" },
				{ value: "yes", label: "Yes" },
				{ value: "no", label: "No" },
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

const Custom_url = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "media_link_type")] === "custom_url";
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

const Width = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Width"
			min={1}
			max={attributes[attr]?.endsWith("px") ? 1000 : 100}
			units={[
				{ value: "px", label: "Px" },
				{ value: "%", label: "%" },
				{ value: "vw", label: "vw" },
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

const Max_width = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Max Width"
			min={1}
			max={!!attributes[attr]?.endsWith("px") ? 1000 : 100}
			units={[
				{ value: "px", label: "Px" },
				{ value: "%", label: "%" },
				{ value: "vw", label: "vw" },
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

const Height = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Height"
			min={1}
			max={attributes[attr]?.endsWith("px") ? 1000 : 100}
			units={[
				{ value: "px", label: "Px" },
				{ value: "vw", label: "vw" },
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

const Object_fit = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = !!attributes[getAttributeValueDynamic(attributes, attribute_name, "media_height")]
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Object Fit"
			options={[
				{ value: "", label: "Default" },
				{ value: "fill", label: "Fill" },
				{ value: "cover", label: "Cover" },
				{ value: "contain", label: "contain" },
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

const Opacity = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomRangeControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Opecity"
			step="0.01"
			min="0"
			max="1"
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Media = { Main, Image, Align, Width, Max_width, Height, Object_fit, Opacity, Caption, Custom_caption, Link_type, Lightbox, Custom_url };
export default Media;