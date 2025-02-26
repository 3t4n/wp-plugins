import { __ } from '@wordpress/i18n';
import { MediaParent, EMMedia, EMTitle, EmButton, Col } from '../../filters/frontend_components';
import { getAttributeValueDynamic } from '../../helper/globalFunctions';
import { InnerBlocks } from '@wordpress/block-editor';
import jss from 'jss'

export default function save(props) {
	const { attributes } = props;
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				display: attributes.img_pos !== "center" ? "flex" : "",
				flexDirection: attributes.img_pos === "right" ? "row-reverse" : "",
				alignItems: attributes.img_pos !== "center" ? attributes.vertical_align : "",
				textAlign: attributes.align,
				[`& .em-infobox-banner`]: {
					width: attributes.type !== "icon" && attributes.width && `${attributes.width}%`,
					marginBottom: attributes.img_pos === "center" ? `${attributes.image_spacing}px` : "",
					marginRight: attributes.img_pos === "left" ? `${attributes.image_spacing}px` : "",
					marginLeft: attributes.img_pos === "right" ? `${attributes.image_spacing}px` : "",
				},
				["& .em-infobox-content"]: {
					WebkitBoxFlex: attributes.img_pos !== "center" ? 1 : "",
					flexGrow: attributes.img_pos !== "center" ? 1 : "",
					["& .em-icon-list-items"]: {
						marginBottom: `${attributes.icon_list_spacing}px`,
						["& .em-icon-list-item"]: {
							justifyContent: attributes.align
						}
					}
				}
			}
		}
	})
	return <MediaParent sliderId={7} attribute_name="wrapper"
		style={{
			display: attributes.img_pos !== "center" ? "flex" : "",
			flexDirection: attributes.img_pos === "right" ? "row-reverse" : "",
			alignItems: attributes.img_pos !== "center" ? attributes.vertical_align : "",
			textAlign: attributes.align
		}}
		{...props}>
			<style>{sheet.toString()}</style>
		{attributes.media &&
			<Col className="em-infobox-banner"
				style={{
					width: attributes.type !== "icon" && attributes.width && `${attributes.width}%`,
					marginBottom: attributes.img_pos === "center" ? `${attributes.spacing}px` : "",
					marginRight: attributes.img_pos === "left" ? `${attributes.spacing}px` : "",
					marginLeft: attributes.img_pos === "right" ? `${attributes.spacing}px` : ""
				}}
				{...props}
			>
				<EMMedia
					style={{ height: attributes[getAttributeValueDynamic(attributes, "choose", "media_height")] }}
					className={`em-image-wrapper`}
					type={attributes.type}
					attribute_name="choose"
					{...props} />
			</Col>}
		<Col
			className="em-infobox-content"
			style={{
				WebkitBoxFlex: attributes.img_pos !== "center" ? 1 : "",
				flexGrow: attributes.img_pos !== "center" ? 1 : "",
			}} {...props}>
			{attributes.title &&
				<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "title", "text_tag")]} attribute_name="title" {...props} />
			}
			{attributes.subTitle &&
				<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "subTitle", "text_tag")]} className="subTitle" attribute_name="subTitle" {...props} />
			}
			{attributes.icon_list &&
				<InnerBlocks.Content />
			}
			{attributes.button &&
				<EmButton attribute_name="button" {...props} />}
		</Col>
	</MediaParent>
}
