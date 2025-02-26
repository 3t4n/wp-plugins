import { getAttributeValueDynamic, getDevice } from '../../../helper/globalFunctions';
import { CustomColorPalette2, CustomToggleControl, CustomUnitControl, SelectControls } from "../custom_panel/panel";

const Main = (props) => {
	return (<>
		{props.children}
	</>)
}

const Has = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Horizontal = (props) => {
	const { attributes, setAttributes, attribute_name, attr_val } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Horizontal"
			min={-100}
			max={100}
			units={[
				{ value: "px", label: "Px", default: 0 },
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

const Vertical = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Vertical"
			min={-100}
			max={100}
			units={[
				{ value: "px", label: "Px", default: 0 },
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

const Blur = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Blur"
			min={0}
			max={100}
			units={[
				{ value: "px", label: "Px", default: 0 },
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

const Spread = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Spread"
			min={-100}
			max={100}
			units={[
				{ value: "px", label: "Px", default: 0 },
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

const Type = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
	return name && Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Type"
			options={[
				{ value: " ", label: "Outside" },
				{ value: "inset", label: "Inside" },
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

const Color = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	const name = attributes[getAttributeValueDynamic(attributes, attribute_name, "shadow_has")];
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

const Shadow = { Main, Has, Horizontal, Vertical, Blur, Spread, Type, Color };
export default Shadow;


