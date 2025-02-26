/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import {
	InspectorControls,
	PanelColorSettings,
	MediaUpload,
} from "@wordpress/block-editor";
import {
	PanelBody,
	PanelRow,
	SelectControl,
	ButtonGroup,
	Button,
	BaseControl,
	RangeControl,
	TextControl,
	Dropdown,
	FontSizePicker,
	ToggleControl,
} from "@wordpress/components";

/**
 * Internal Dependencies
 */
import {
	POSITIONS,
	CONTENT_ALIGN
} from "./constants";

function Inspector(props) {
	const { attributes, setAttributes } = props;

	const {imageUrl,
		imageId,
		imagePadding,
		contentPosition,
		contentWidth, contentPadding, contentBgColor,
		titleColor,
		descriptionColor,
		buttonColor,
		buttonBgColor,
		titleFontSize,
		showButton,
		buttonLink,
		contentAlignment
	} = attributes;

	return (
		<InspectorControls key="controls">
			<PanelBody title={__("Image Settings")} initialOpen={false}>
				<BaseControl
					id="sum-content-position"
					label={__('Background Image')}
				>
					<MediaUpload
						label={__('Background Image')}
						onSelect={(media) =>
							setAttributes({ imageUrl: media.url, imageId: media.id })
						}
						type="image"
						value={imageId}
						render={({ open }) => {
							return (
								<Button
									className="fb-media-image"
									label={__("Upload Image")}
									icon="format-image"
									onClick={open}
								/>
							);
						}}
					/>
				</BaseControl>

				<RangeControl
					label={__('Padding (PX)')}
					value={ imagePadding }
					onChange={ ( imagePadding ) => setAttributes( { imagePadding } ) }
					min={ 20 }
					max={ 200 }
				/>
			</PanelBody>
			<PanelBody title={__("Content Settings")} initialOpen={false}>
				<BaseControl
					id="sum-content-position"
					label={__('Content Position')}
				>
					<ButtonGroup>
						{POSITIONS.map((position) => (
							<Button
								isLarge
								isSecondary={contentPosition !== position.value}
								isPrimary={contentPosition === position.value}
								onClick={() => setAttributes({ contentPosition: position.value })}
							>
								{position.label}
							</Button>
						))}
					</ButtonGroup>
				</BaseControl>

				<RangeControl
					label="Width (%)"
					value={ contentWidth }
					onChange={ ( contentWidth ) => setAttributes( { contentWidth } ) }
					min={ 20 }
					max={ 50 }
				/>
				<RangeControl
					label="Padding (PX)"
					value={ contentPadding }
					onChange={ ( contentPadding ) => setAttributes( { contentPadding } ) }
					min={ 20 }
					max={ 200 }
				/>

				<BaseControl
					id="sum-content-alignment"
					label={__('Inner Text Alignment')}
				>
					<ButtonGroup>
						{CONTENT_ALIGN.map((alignment) => (
							<Button
								isLarge
								isSecondary={contentAlignment !== alignment.value}
								isPrimary={contentAlignment === alignment.value}
								onClick={() => setAttributes({ contentAlignment: alignment.value })}
							>
								{alignment.label}
							</Button>
						))}
					</ButtonGroup>
				</BaseControl>

				<PanelRow>
					<label>{__("Title font")}</label>
					<FontSizePicker
						value={ titleFontSize }
						fallbackFontSize={ 12 }
						onChange={ ( titleFontSize ) => setAttributes({ titleFontSize })}
					/>
				</PanelRow>

				<ToggleControl
					label={__("Show Button")}
					checked={showButton}
					onChange={(showButton) => setAttributes({ showButton })}
				/>

				{showButton && (
					<PanelBody title={__("Button Settings")}>

						<TextControl
							label={__("Link URL")}
							placeholder="https://your-link.com"
							value={buttonLink}
							onChange={(link) => setAttributes({ buttonLink: link })}
						/>

					</PanelBody>
				)}
			</PanelBody>
			<PanelColorSettings
				title={__("Color Settings")}
				initialOpen={false}
				colorSettings={[
					{
						value: contentBgColor,
						onChange: (contentBgColor) => setAttributes({ contentBgColor }),
						label: __("Background Color"),
					},
					{
						value: titleColor,
						onChange: (titleColor) => setAttributes({ titleColor }),
						label: __("Title Color"),
					},
					{
						value: descriptionColor,
						onChange: (descriptionColor) => setAttributes({ descriptionColor }),
						label: __("Description Color"),
					},
					{
						value: buttonBgColor,
						onChange: (buttonBgColor) => setAttributes({ buttonBgColor }),
						label: __("Button Background Color"),
					},
					{
						value: buttonColor,
						onChange: (buttonColor) => setAttributes({ buttonColor }),
						label: __("Button Color"),
					},
				]}
			>
			</PanelColorSettings>
		</InspectorControls>
	);
}

export default Inspector;

