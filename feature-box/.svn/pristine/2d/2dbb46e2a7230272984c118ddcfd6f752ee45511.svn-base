
import { __ } from '@wordpress/i18n';
import {RichText, useBlockProps} from '@wordpress/block-editor';

export default function save({ attributes }) {

	const {imagePadding, contentWidth, contentPadding,
		contentBgColor = contentBgColor ? contentBgColor : '#000',
		contentPosition,
		titleColor,
		descriptionColor,
		buttonColor,
		buttonBgColor,
		titleFontSize,
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

	return (
		<div { ...useBlockProps.save() }>
			<div className="fb-featured-box fb-featured-box-default">
				<div className="fb-feature-image" style={{padding: imagePadding + 'px'}}>
					<div className="fb-position-relative">
						<img src={attributes.imageUrl} />
					</div>
				</div>

				<div className={`fb-feature-content ${contentPositionClass}`} style={contentStyle}>
					<h3 className="fb-feature-title">
						<RichText.Content className="aaa" style={titleStyle} tagName="span" value={ attributes.title } />
					</h3>

					<RichText.Content className="fb-feature-description" style={descriptionStyle} tagName="div" value={ attributes.content } />

					<div className="fb-feature-button">
						<RichText.Content className="fb-feature-readmore fb-display-inline-block" style={buttonStyle}tagName="a" value={ attributes.button } href={buttonLink} />
					</div>
				</div>
			</div>
		</div>
	);
}
