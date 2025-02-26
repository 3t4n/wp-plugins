import { getAttributeValueDynamic, getDevice } from "../../../helper/globalFunctions";
import { BBImagePanel, CustomBoxControl, CustomButton, CustomButtonGroup, CustomColorPalette2, CustomIconPicker, CustomRadioControl, CustomRangeControl, CustomUnitControl, SelectControls } from "../custom_panel/panel";
const ALLOWED_MEDIA_TYPES = ['image/svg+xml'];

const Main = (props) => {
	return props.children
}


// const Selector = (props) => {
// 	const { attributes, setAttributes, attr_val } = props;
// 	return Object.keys(attr_val).map(attr => {
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

const Type = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) &&
			<CustomButtonGroup label="Icon">
				<CustomButton
					title="Icon"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_type")] === "icon"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "icon" });
					}}><i className="fas fa-volleyball-ball" /></CustomButton>
				<CustomButton
					title="Svg"
					variant={attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_type")] === "svg"}
					onClick={(new_value) => {
						setAttributes({ [attr]: "svg" });
					}}><i className="fas fa-cloud-upload-alt" /></CustomButton>
			</CustomButtonGroup>
	})
}

const Selector = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_type")] === "icon";
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
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_type")] === "svg";
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

const View = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="View"
			options={[
				{ value: "default", label: "Default" },
				{ value: "stacked", label: "Stacked" },
				{ value: "framed", label: "Framed" },
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
				switch (new_value) {
					case "default":
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_radius")]: { top: "0%", right: "0%", bottom: "0%", left: "0%", } });
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_color")]: "#6EC1E4" });
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_background_color")]: "rgba(255, 255, 255, 0)" });
						break;
					case "stacked":
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_color")]: "#ffffff" });
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_background_color")]: "#6EC1E4" });
						break;
					case "framed":
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_border")]: { top: "3px", right: "3px", bottom: "3px", left: "3px", } });
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_color")]: "#6EC1E4" });
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_background_color")]: "rgba(255, 255, 255, 0)" });
						break;
				}
			}}
		/>
	})
}

const Shape = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_view")] !== "default";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Shape"
			options={[
				{ value: "circle", label: "Circle" },
				{ value: "square", label: "Square" },
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
				switch (new_value) {
					case "circle":
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_radius")]: { top: "50%", right: "50%", bottom: "50%", left: "50%", } });
						break;
					case "square":
						setAttributes({ [getAttributeValueDynamic(attributes, attribute_name, "icon_radius")]: { top: "0%", right: "0%", bottom: "0%", left: "0%", } });
						break;
				}
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

const Size = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
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

const Padding = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_view")] !== "default";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomRangeControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Padding"
			min={0}
			max={100}
			step={0.1}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}



const Rotate = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Rotate"
			min="0"
			max="360"
			units={[{ value: "deg", label: "deg" }]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Border = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_view")] === "framed";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomBoxControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			// splitOnAxis={true}
			label="Border Width"
			withResponsive={false}
			withHover={false}
			units={[
				{ value: 'px', label: 'Px', default: 0 },
				{ value: '%', label: '%', default: 0 },
				{ value: 'em', label: 'EM', default: 0 },
				{ value: 'rem', label: 'REM', default: 0 }
			]}
			inputProps={{ min: 0, max: 1000 }}
			values={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Radius = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_view")] !== "default";
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomBoxControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Border Radius"
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
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
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

const Background_color = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_view")] !== "default";
	return name && Object.keys(attr_val).map(attr => {
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



const Icon = { Main, Type, Svg, Selector, View, Shape, Align, Size, Padding, Rotate, Border, Radius, Color, Background_color };
export default Icon;