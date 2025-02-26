import { __ } from '@wordpress/i18n';
import {useBlockProps, RichText, MediaUpload, InspectorControls} from '@wordpress/block-editor';
import { Button, Panel, PanelBody, PanelRow } from "@wordpress/components";

/**
 * Internal dependencies
 */
import Inspector from "./inspector";
import './editor.scss';

export default function Edit(props) {

	const { attributes, setAttributes, isSelected } = props;
	const {imageUrl,
		imageId,
		title, content,
		button, imagePadding, contentWidth, contentPadding,
		contentBgColor = contentBgColor ? contentBgColor : '#000',
		contentPosition,
		titleColor,
		descriptionColor,
		buttonColor,
		buttonBgColor,
		titleFontSize,
		showButton,
		buttonLink,
		contentAlignment,
	} = attributes;

	// Change content position
	if (contentPosition === "top") {
		var contentPositionClass = 'fb-position-top-center';
	} else if (contentPosition === "bottom") {
		var contentPositionClass = 'fb-position-bottom-center';
	} else if (contentPosition === "left") {
		var contentPositionClass = 'fb-position-center-left';
	} else if (contentPosition === "right") {
		var contentPositionClass = 'fb-position-center-right';
	}

	const contentStyle = {
		width: contentWidth+ '%',
		minWidth: contentWidth+ '%',
		padding: contentPadding+ 'px',
		background: contentBgColor,
		textAlign: contentAlignment,
	};
	const titleStyle = {
		color: titleColor,
		fontSize: titleFontSize,
	};
	const descriptionStyle = {
		color: descriptionColor,
	};
	const buttonStyle = {
		color: buttonColor,
		background: buttonBgColor,
	};
	const buttonWrapperStyle = {
		display: showButton ? 'block' : 'none',
	};

	return ([
		isSelected && <Inspector {...props} />,

		<div { ...useBlockProps() }>

			<div className="fb-featured-box fb-featured-box-default">
				<div className="fb-feature-image" style={{padding: imagePadding + 'px'}}>
					<div className="fb-position-relative media">
						{
							imageUrl ?
								<img src={imageUrl} />
								:
								<MediaUpload
									onSelect={(media) =>
										setAttributes({ imageUrl: media.url, imageId: media.id })
									}
									type="image"
									value={imageId}
									render={({ open }) =>
										!imageUrl && (
											<Button
												className="fb-media-image"
												label={__("Upload Image")}
												icon="format-image"
												onClick={open}
											/>
										)
									}
								/>
						}
					</div>
				</div>

				<div className={`fb-feature-content ${contentPositionClass}`} style={contentStyle}>
					<h3 className="fb-feature-title">
						<RichText
							className="aaa"
							style={titleStyle}
							tagName="span"
							keepPlaceholderOnFocus
							value={ title }
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
							onChange={ ( title ) => setAttributes( { title } ) }
							placeholder={ __( 'Add Title Here...' ) }
						/>
					</h3>

					<RichText
						className="fb-feature-description"
						style={descriptionStyle}
						tagName="div"
						keepPlaceholderOnFocus
						value={ content }
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
						onChange={ ( content ) => setAttributes( { content } ) }
						placeholder={ __( 'Add Content Here...' ) }
					/>


					<div className="fb-feature-button" style={buttonWrapperStyle}>
						<RichText
							className="fb-feature-readmore fb-display-inline-block"
							style={buttonStyle}
							tagName="a"
							href={buttonLink}
							keepPlaceholderOnFocus
							value={ button }
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
							onChange={ ( button ) => setAttributes( { button } ) }
							placeholder={ __( 'Add Buttion Label Here...' ) }
						/>
					</div>
				</div>
			</div>
		</div>
	]);
}
