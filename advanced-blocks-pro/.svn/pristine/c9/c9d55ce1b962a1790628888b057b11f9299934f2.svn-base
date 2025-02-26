import React from "react";
import gradient_colors from "../../../helper/gradient_colors";
import color_palette from "../../../helper/color_palette";
import { colord } from "colord";
import font_sizes from "../../../helper/font_sizes";
import { ResponsiveButtonGroup } from "../../../helper/globalFunctions";
const {
	FontSizePicker,
	CheckboxControl,
	PanelBody,
	SelectControl,
	PanelRow,
	TextControl,
	TextareaControl,
	__experimentalInputControl,
	__experimentalNumberControl,
	Button,
	Flex,
	FlexItem,
	FlexBlock,
	__experimentalUnitControl,
	RangeControl,
	Popover,
	ColorPicker,
	ColorPalette,
	ColorIndicator,
	ToggleControl,
	Placeholder,
	ButtonGroup,
	RadioControl,
	__experimentalBoxControl
} = wp.components;
const BoxControl = __experimentalBoxControl;
const { __experimentalColorGradientControl, MediaUpload, MediaUploadCheck } =
	wp.blockEditor;
const { useState } = wp.element;
const { __ } = wp.i18n; // Import __() from wp.i18n
const ColorGradientControl = __experimentalColorGradientControl;
const InputControl = __experimentalInputControl;
const UnitControl = __experimentalUnitControl;
const NumberControl = __experimentalNumberControl
import IconPicker from "../../../helper/icon-picker";
import "../../../helper/icon-picker/style.scss"
const { dispatch, useSelect } = wp.data
import '../editor.scss'

export const FontPicker = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<>
			<div className="em-font-picker">
				<ResponsiveButtonGroup
					attributes={attributes}
					setAttributes={setAttributes}
					attr_val={attr_val}
					name={name}
				/>
				<FontSizePicker
					label={!!props.label ? props.label : "Font Size"}
					fontSizes={font_sizes}
					onChange={onChange}
					value={value}
				/>
			</div>
		</>
	);
};

export const CustomInputField = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<>
			<PanelRow className="em-custom-input-field">
				<h4>{!!props.label ? props.label : "Text"}</h4>
				<div className="em-input-field">
					{attributes && <ResponsiveButtonGroup
						attributes={attributes}
						setAttributes={setAttributes}
						attr_val={attr_val}
						name={name}
					/>}
					<InputControl
						value={value}
						style={props.style}
						type={!!props.type ? props.type : "text"}
						onChange={onChange}
					/>
				</div>
				{props.helper && <i className="em-panel-helper">{props.helper}</i>}
			</PanelRow>
		</>
	);
};

export const TextArea = (props) => {
	let { value, onChange } = props;

	return (
		<>
			<TextareaControl
				label={!!props.label ? props.label : "Description"}
				rows={!!props.row ? props.row : 4}
				value={
					!!props.value
						? props.value
						: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia sem suscipit faucibus sollicitudin. Nam gravida lectus vitae elit vestibulum aliquam vitae ac nunc."
				}
				onChange={!!props.onChange ? props.onChange : (e) => console.log(e)}
			/>
		</>
	);
};

export const CustomNumberPanel = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<>
			<PanelRow className="em-custom-input-field">
				<h4>{!!props.label ? props.label : "Number"}</h4>
				<div className="em-input-field">
					{attributes &&
						<ResponsiveButtonGroup
							attributes={attributes}
							setAttributes={setAttributes}
							attr_val={attr_val}
							name={name}
						/>}
					{/* <InputControl
						value={value}
						type={!!props.type ? props.type : "text"}
						onChange={onChange}
					/> */}
					<NumberControl
						onChange={onChange}
						isDragEnabled
						isShiftStepEnabled
						shiftStep={!!props.shiftStep ? props.shiftStep : 10}
						step={!!props.step ? props.step : 1}
						value={value}
					/>
				</div>
				{props.helper && <i className="em-panel-helper">{props.helper}</i>}
			</PanelRow>
		</>
	);
};

export const CustomLink = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	const [open, setOpen] = useState(false);
	const toggleVisibleTab = () => {
		setOpen((state) => !state);
	};

	return (
		<PanelRow className="em-custom-input-field">
			<h4>{!!props.label ? props.label : "Text"}</h4>
			<div className="em-input-field">
				<ResponsiveButtonGroup
					attributes={attributes}
					setAttributes={setAttributes}
					attr_val={attr_val}
					name={name}
				/>
				<div style={{ display: "flex", alignItems: "end", width: "165px" }}>
					<div style={{ width: "85%" }}>
						<TextControl
							value={value}
							onChange={onChange}
							type="text"
						/>
					</div>
					<div
						style={{
							width: "15%",
							border: "1px solid black",
							height: "31px",
							textAlign: "center",
							lineHeight: "29px",
							cursor: "pointer",
							marginBottom: "8px"
						}}
						onClick={toggleVisibleTab}
					>
						<i class="eicon-cog" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</PanelRow>)
}

export const Link = (props) => {
	const [open, setOpen] = useState(false);
	const toggleVisibleTab = () => {
		setOpen((state) => !state);
	};
	let panel = (<>
		<div style={{ display: "flex", alignItems: "end" }}>
			<div style={{ width: "85%" }}>
				<TextControl
					label={"Link"}
					value={props.attributes[`${props.prefixAttribute}_link`]}
					onChange={(new_value) => {
						// console.log(new_value);
						props.setAttributes({
							[`${props.prefixAttribute}_link`]: new_value,
						});
					}}
					type="text"
				/>
			</div>
			<div
				style={{
					width: "15%",
					border: "1px solid black",
					height: "31px",
					textAlign: "center",
					lineHeight: "29px",
					cursor: "pointer",
					marginBottom: "8px"
				}}
				onClick={toggleVisibleTab}
			>
				<i class="eicon-cog" aria-hidden="true"></i>
			</div>
		</div>
		{open && (
			<div>
				<CheckboxControl
					label="Open in new tab"
					checked={props.attributes[`${props.prefixAttribute}_newTab`]}
					onChange={(new_value) => {
						// console.log(new_value);
						props.setAttributes({
							[`${props.prefixAttribute}_newTab`]: new_value,
						});
					}}
				/>
			</div>
		)}
	</>)
	return (
		<>
			{props.panelBody ? <PanelBody title={!!props.label ? props.label + " Link" : "Link"} initialOpen={false}>
				{panel}
			</PanelBody> : <>{panel}</>}
		</>
	);
};

export const CustomBoxControl = (props) => {
	let { values, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<div className="custom-box-control">
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>
			<BoxControl
				label={props.label}
				splitOnAxis={props.splitOnAxis}
				units={props.units}
				inputProps={props.inputProps}
				values={values}
				onChange={onChange}
			/>
		</div>
	)
}

export const SelectControls = (props) => {
	let { value, onChange, attr_val, attributes, setAttributes, name } = props;
	return (
		<div className="em-select-panel">
			<PanelRow>
				<h4>{!!props.label ? props.label : "Select"}</h4>
				<div>
					{attributes &&
						<ResponsiveButtonGroup
							attributes={attributes}
							setAttributes={setAttributes}
							attr_val={attr_val}
							name={name}
						/>}
					<SelectControl
						style={{ width: "120px", margin: "0px important" }}
						{...(!!props.options
							? { options: props.options }
							: {
								options: [
									{ value: "yes", label: "Yes" },
									{ value: "no", label: "No" },
								],
							})}
						onChange={onChange}
						value={value}
					/>
				</div>

			</PanelRow>
		</div>
	);
};

export const CustomColorPalette = (props) => {
	const [isVisible, setIsVisible] = useState(false);
	const toggleVisible = () => {
		setIsVisible((state) => !state);
	};

	return (
		<>
			<Flex style={{ margin: "18px 0" }} className="bb-color">
				<FlexItem>
					<label> {!!props.label ? props.label : "Selected Color"}{" "}</label>
					<ColorIndicator colorValue={props.value} />
					<ColorPalette
						enableAlpha
						disableCustomColors
						colors={color_palette}
						value={props.value}
						onChange={props.onChange}
					/>
					<Button
						variant="secondary"
						style={{ marginTop: "-24px", display: "block" }}
						isSmall
						onClick={toggleVisible}
					>
						Custom Color
						{isVisible && (
							<Popover>
								<div style={{ padding: "16px" }}>
									<ColorPicker
										onChangeComplete={(e) => {
											props.onChange(colord(e.rgb).toRgbString());
											// setIsVisible(false)
										}}
										enableAlpha
										color={props.value}
									/>
								</div>
							</Popover>
						)}
					</Button>
				</FlexItem>
			</Flex>
		</>
	);
};

export const CustomColorPalette2 = (props) => {
	let { value, onChange, attr_val, attributes, setAttributes, name } = props;
	return <div className="em-custom-color-picker">
		{attributes &&
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>}
		<ColorGradientControl
			{...props}
			colors={color_palette}
			colorValue={value}
			onColorChange={onChange}
			gradients={[]}
			disableCustomGradients={true}
			enableAlpha
		// disableAlpha={false}
		/>
	</div>
};
export const CustomGradientColorPalette = (props) => {
	let { value, onChange, attr_val, attributes, setAttributes, name } = props;
	return <div className="em-custom-color-picker">
		<ResponsiveButtonGroup
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={name}
		/>
		<ColorGradientControl
			{...props}
			gradients={gradient_colors}
			gradientValue={value}
			onGradientChange={onChange}
			disableCustomColors={true}
			enableAlpha
		/>
	</div>
}

export const CustomToggleControl = (props) => {
	let { checked, label, help, onChange, attr_val, attributes, setAttributes, name } = props;
	return <div className="em-custom-toggle">
		<ToggleControl
			label={!!label ? label : "Toggle"}
			help={help}
			checked={checked}
			onChange={onChange}
		/>
		{attributes &&
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>}
		{props.helper && <i className="em-panel-helper em-mt-1">{props.helper}</i>}
	</div>
};

// Custom Range

export const CustomRangeControl = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<div className="em-custom-range">
			{attributes && <ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>}
			<RangeControl
				style={props.style}
				label={props.label}
				max={props.max}
				min={props.min}
				step={!!props.step ? props.step : 1}
				value={value}
				onChange={onChange}
			/>
		</div>
	)
}

export const CustomUnitControl1 = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return <div className="em-custom-unit-control-1">
		<h4>{!!props.label ? props.label : "Range"}</h4>
		<div>
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>
			<UnitControl
				min={!!props.min ? props.min : 0}
				max={!!props.max ? props.max : 1600}
				step={props.step}
				{...(!!props.units
					? { units: props.units }
					: {
						units: [
							{ value: "px", label: "px", default: 0 },
							{ value: "%", label: "%", default: 10 },
							{ value: "em", label: "em", default: 0 },
							{ value: "rem", label: "rem", default: 0 },
						],
					})}
				onChange={onChange}
				value={value}
			/>
		</div>
	</div>
};

// unit control
function customattribute(str) {
	const regex = /(\d+)(\D+)/gm;
	const subst = `$1:$2`;

	// The substituted value will be contained in the result variable
	const result = str?.replace(regex, subst);
	return result?.split(":");
}
export const CustomUnitControl = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	// console.log(lodash.first(/(\D+)/gm.exec(value)))
	// console.log(value);
	let parseValue = customattribute(value || "50px");
	let unit = parseValue[1];
	return <div className="em-custom-unit-control">
		<h4>{!!props.label ? props.label : "Range"}</h4>
		{attributes && <ResponsiveButtonGroup
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={name}
		/>}
		<RangeControl
			min={!!props.min ? props.min : 0}
			max={!!props.max ? props.max : 1600}
			// value={Number(value.replaceAll(/\D+/gm,""))}
			value={parseFloat((parseValue[0]))}
			step={!!props.step ? props.step : 1}
			withInputField={false}
			onChange={(e) => {
				let x = e + unit;
				onChange(x);
			}}
		/>
		<UnitControl
			min={!!props.min ? props.min : 0}
			max={!!props.max ? props.max : 1600}
			step={!!props.step ? props.step : 1}
			{...(!!props.units
				? { units: props.units }
				: {
					units: [
						{ value: "px", label: "px", default: 0 },
						{ value: "%", label: "%", default: 10 },
						{ value: "em", label: "em", default: 0 },
						{ value: "rem", label: "rem", default: 0 },
					],
				})}
			onChange={onChange}
			value={value}
		/>
	</div>
};

export const CustomIconPicker = (props) => {
	let { value, onChange, attr_val, setAttributes, attributes, name } = props;
	return (
		<div className="em-custom-icon-picker">
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>
			<IconPicker
				allowReset={!!props.reset ? props.reset : false}
				value={value}
				onChange={onChange}
			/>
		</div>
	);
};

export const CustomButtonGroup = (props) => {
	return (
		<PanelRow className="em-custom-group-btn">
			<h4>{!!props.label ? props.label : "Type"}</h4>
			<ButtonGroup>{props.children}</ButtonGroup>
		</PanelRow>
	);
};
ButtonGroup

export const CustomButton = (props) => {
	let { onClick } = props;
	return (<Button {...props}
		variant={props.variant ? 'primary' : 'dark'}
		className="em-custom-btn"
		title={props.title}
		isPressed={props.variant}
		isSecondary={!props.variant}
		isPrimary={props.variant}
		onClick={onClick}>{props.children}</Button>
	);
};

// IMAGE UPLOAD

export const CustomRadioControl = (props) => {
	let { value, onChange, label, attr_val, setAttributes, attributes, name } = props;
	return <div className="em-custom-radio-control">
		<ResponsiveButtonGroup
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={name}
		/>
		<RadioControl
			label={!!label ? label : "Align"}
			help="Choose an alignment."
			selected={value}
			{...(!!props.options
				? { options: props.options }
				: {
					options: [
						{ label: 'Left', value: 'left' },
						{ label: 'Center', value: 'center' },
						{ label: 'Right', value: 'right' },
						{ label: 'Justify', value: 'justify' }
					],
				})}
			onChange={onChange}
		/>
	</div>
}

export const BBImagePanel = (props) => {
	let { attributes, setAttributes, attr_val, name } = props;
	return (
		<div className="em-custom-media-panel">
			<ResponsiveButtonGroup
				attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={name}
			/>
			<MediaUploadCheck>
				<MediaUpload
					{...props}
					render={({ open }) => (
						<>
							<Placeholder
								icon={!!props.icon ? props.icon : "format-image"}
								label={!!props.label ? props.label : "Media"}
								className={"em-image-panel"}
								instructions="Select an image to remove this placeholder"
								isColumnLayout //element is flex if this is not used
							>
								{props?.src && props.reset && <button className="em-image-reset-btn" onClick={props.onClick}><i className="fas fa-trash" /></button>}
								<div className="em-image">
									{props?.src && props.type === "video" ?
										<video className="em-image-select" src={props.src} autoplay loop controls />
										: props.multiple
											? <div className="em-image-select em-slider">{props?.src?.map(img => {
												return <img className="em-slider-images" src={img?.src} />
											})}</div>
											: <img className="em-image-select" src={props?.src} />
									}
									<Button
										className="em-image-select-btn"
										onClick={open}
										isSecondary
									>
										{!!props.label ? "Choose " + props.label : "Choose Media"}
									</Button>
								</div>
							</Placeholder>
						</>
					)}
				/>
			</MediaUploadCheck>
		</div>
	);
};

export const BBSvgPanel = (props) => {
	return (
		<>
			<PanelRow>
				<Button
					style={{
						paddingLeft: 7,
						paddingRight: 7,
					}}
					icon={!!props.icon || "image-rotate"}
				/>

				<MediaUploadCheck>
					<MediaUpload
						{...props}
						render={({ open }) => (
							<React.Fragment>
								{__("Chose Svg", "block-bakery")}
								<Button icon="edit" onClick={open} />
							</React.Fragment>
						)}
					/>
				</MediaUploadCheck>
			</PanelRow>
		</>
	);
};