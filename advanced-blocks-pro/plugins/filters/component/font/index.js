import all_font_families from "../../../helper/font_family.json"
import { CustomColorPalette2, CustomRadioControl, CustomUnitControl, FontPicker, SelectControls } from "../custom_panel/panel";
import { apply_font_style, getDevice } from '../../../helper/globalFunctions';
const {useEffect} = wp.element;
const Main = (props) => {
	return (<>
		{props.children}
	</>)
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
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}} />
	})
}

const Spacing = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Spacing"
			min={0}
			max={300}
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
		return (attr.endsWith(device) || check) && <FontPicker
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Family = (props) => {
	const { attributes, setAttributes, attr_val } = props;


	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())

		useEffect(() => {
			apply_font_style(attributes[attr])
		}, []);

		return (attr.endsWith(device) || check) &&
			<SelectControls
				label="Family"
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={props.attr}
				options={all_font_families}
				value={attributes[attr]}
				onChange={(new_value) => {
					setAttributes({
						[attr]: new_value,
					});
					apply_font_style(new_value);
				}}
			/>
	})
}

const Weight = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Weight"
			options={[
				{ value: "", label: "Default" },
				{ value: "100", label: "100" },
				{ value: "200", label: "200" },
				{ value: "300", label: "300" },
				{ value: "400", label: "400" },
				{ value: "500", label: "500" },
				{ value: "600", label: "600" },
				{ value: "700", label: "700" },
				{ value: "800", label: "800" },
				{ value: "900", label: "900" },
				{ value: "normal", label: "normal" },
				{ value: "bold", label: "Bold" },
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

const Text_transform = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Transform"
			options={[
				{ value: "", label: "Default" },
				{ value: "uppercase", label: "Uppercase" },
				{ value: "lowercase", label: "Lowercase" },
				{ value: "capitalize", label: "Capitalize" },
				{ value: "normal", label: "Normal" },
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
				{ value: "", label: "default" },
				{ value: "normal", label: "Normal" },
				{ value: "italic", label: "Italic" },
				{ value: "oblique", label: "Oblique" },
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

const Text_decoration = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Decoration"
			options={[
				{ value: "", label: "default" },
				{ value: "underline", label: "underline" },
				{ value: "overline", label: "overline" },
				{ value: "line-through", label: "Line Through" },
				{ value: "none", label: "None" },
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

const Line_height = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Line Height"
			max={300}
			units={[
				{ value: "px", label: "Px", default: 0 },
				{ value: "vh", label: "vh", default: 10 },
				{ value: "vw", label: "vw", default: 0 },
				{ value: "rem", label: "Rem", default: 0 },
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

const Letter_spacing = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label={"Letter Spacing"}
			max={300}
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

const Word_spacing = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Word Spacing"
			max={100}
			units={[
				{ value: "px", label: "Px", default: 0 },
				{ value: "vh", label: "vh", default: 10 },
				{ value: "vw", label: "vw", default: 0 },
				{ value: "rem", label: "Rem", default: 0 },
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

const Stroke_width = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomUnitControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Stroke Width"
			max={12}
			units={[
				{ value: "px", label: "Px", default: 0 },
				{ value: "em", label: "em", default: 0 },
				{ value: "rem", label: "Rem", default: 0 },
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

const Stroke_color = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomColorPalette2
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label={"Stroke Color"}
			value={attributes[attr]}
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
			clearable={ true }
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Blendmode = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Blend Mode"
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

const Font = { Main, Align, Spacing, Size, Family, Weight, Style, Text_transform, Text_decoration, Line_height, Word_spacing, Letter_spacing, Stroke_width, Stroke_color, Color, Blendmode };
export default Font;