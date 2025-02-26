import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomButton, CustomButtonGroup, CustomIconPicker, CustomInputField, CustomLink, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ['image/svg+xml'];

const Main = (props) => {
	return props.children
}


const Field = (props) => {
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


const Type = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) &&
			<CustomButtonGroup label="Icon">
				<CustomButton
					title="Icon"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "text_type")] === "icon"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "icon" });
					}}><i className="fas fa-volleyball-ball" /></CustomButton>
				<CustomButton
					title="Svg"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "text_type")] === "svg"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "svg" });
					}}><i className="fas fa-cloud-upload-alt" /></CustomButton>
			</CustomButtonGroup>
	})
}

// const Icon = (props) => {
// 	const { attributes, setAttributes, attr_val, attribute_name } = props;
// 	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "text_type")] === "icon";
// 	return name && Object.keys(attr_val).map(attr => {
// 		let device = getDevice(props.attr.toLowerCase());
// 		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
// 		return (attr.endsWith(device) || check) && <CustomIconPicker
// 			attributes={attributes}
// 			setAttributes={setAttributes}
// 			attr_val={attr_val}
// 			name={props.attr}
// 			value={attributes[attr]}
// 			onChange={(new_value) => {
// 				setAttributes({ [attr]: new_value });
// 			}}
// 		/>
// 	})
// }
const Icon = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
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
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "text_type")] === "svg";
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
			src={attributes[attr]?.url}
			onSelect={({ id, url, caption }) =>
				props.setAttributes({
					[attr]: { id, url, caption },
				})
			}
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

const Tag = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Tags"
			options={[
				{ value: "h1", label: "H1" },
				{ value: "h2", label: "H2" },
				{ value: "h3", label: "H3" },
				{ value: "h4", label: "H4" },
				{ value: "h5", label: "H5" },
				{ value: "h6", label: "H6" },
				{ value: "p", label: "P" },
				{ value: "span", label: "Span" }
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



const Text = { Main, Field,Type,Svg, Icon, Link, Tag };
export default Text;