import { MediaParent, } from '../../filters/frontend_components';
const { useBlockProps, InnerBlocks } = wp.blockEditor;
import jss from 'jss'
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function save(props) {
	const { attributes } = props;

	
	let IconMarginLeft = `0 calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")]} * 0.25) 0 0`;
	let IconMarginCenter = `0 calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")]} * 0.125)`;
	let IconMarginRight = `0 0 0 calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")]} * 0.25)`;
	let svgMargin = `${attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_align")] === "left" ? IconMarginLeft : attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_align")] === "right" ? IconMarginRight : IconMarginCenter }`
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				["& .em-icon-list-items.em-inline-items"]: {
					justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align")],
					marginRight: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
					marginLeft: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
					["& .em-icon-list-item"]: {
						marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
						marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
					},
					["& .em-icon-list-item:not(:last-child)"]: {
						marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
						marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`,
						["&:after"]: {
							borderLeftStyle: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, "icon_List", "list_style")],
							borderLeftWidth: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && `${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_weight")]}px`,
							// content: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && ` `,
							right: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2) !important`,
							height: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, "icon_List", "list_height")],
							borderColor: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, "icon_List", "list_color")],
						},
						'@media (max-width: 768px)': {
							marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
							marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
							["&:after"]: {
								right: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2) !important`,
							},
						},
						'@media (max-width: 600px)': {
							marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
							marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
							["&:after"]: {
								right: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2) !important`,
							},
						}
					},
					'@media (max-width: 768px)': {
						justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align_tablet")],
						marginRight: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
						marginLeft: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
						["& .em-icon-list-item"]: {
							marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
							marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`,
						},
					},
					'@media (max-width: 600px)': {
						justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align_mobile")],
						marginRight: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`,
						marginLeft: `calc(-${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`,
						["& .em-icon-list-item"]: {
							marginRight: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`,
							marginLeft: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`,
						}
					},
				},
				["& .em-icon-list-items"]: {
					["&:not(.em-inline-items)"]: {
						["& .em-icon-list-item:not(:first-child)"]: {
							marginTop: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`
						},
						["& .em-icon-list-item:not(:last-child)"]: {
							paddingBottom: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between")]}px / 2)`
							, ["&:after"]: {
								borderTopStyle: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, "icon_List", "list_style")],
								borderTopWidth: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_layout")] === "block" ? attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && `${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_weight")]}px` : "",
								// content: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && ` `,
								width: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && `${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_width")]}%`,
								borderColor: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_divider_toggle")] && attributes[getAttributeValueDynamic(attributes, "icon_List", "list_color")],
							}
						},
						'@media (max-width: 768px)': {
							["&:not(.em-inline-items)"]: {
								["& .em-icon-list-item:not(:first-child)"]: {
									marginTop: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`
								},
								["& .em-icon-list-item:not(:last-child)"]: {
									paddingBottom: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`
								}
							}
						},
						'@media (max-width: 600px)': {
							["&:not(.em-inline-items)"]: {
								["& .em-icon-list-item:not(:first-child)"]: {
									marginTop: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`
								},
								["& .em-icon-list-item:not(:last-child)"]: {
									paddingBottom: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`
								}
							}
						},
					},
					["& .em-icon-list-item , .em-icon-list-item a"]: {
						justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align")],
						["& .em-icon-list-icon"]: {
							textAlign: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_align")],
							fontSize: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")],
							color: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_color")],
							["& i,svg"]: {
								display: !attributes[getAttributeValueDynamic(attributes, "icon_List", "list_icon")] && "none"
							},
							["& svg"]: {
								margin:svgMargin,
								width: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")],
								height: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size")],
								fill: attributes[getAttributeValueDynamic(attributes, "icon_List", 'icon_color')],
							}
						},
						["& .em-icon-list-text"]: {
							...fontStyle(attributes, "icon_List", ""),
							marginLeft: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_icon")] ? `${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_text_indent")]}px` : 0,
						},
						["&:hover"]: {
							["& .em-icon-list-icon"]: {
								color: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_color_hover")],
								["& svg"]:{
								fill: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_color_hover")]
								}
							},
							["& .em-icon-list-text"]: {
								color: attributes[getAttributeValueDynamic(attributes, "icon_List", "font_color_hover")]
							}
						},
						'@media (max-width: 768px)': {
							justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align_tablet")],
							["& .em-icon-list-icon"]: {
								textAlign: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_align_tablet")],
								fontSize: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size_tablet")],
							},
							["& .em-icon-list-text"]: {
								...fontStyle(attributes, "icon_List", "_tablet"),
							}
						},
						'@media (max-width: 600px)': {
							justifyContent: attributes[getAttributeValueDynamic(attributes, "icon_List", "list_align_mobile")],
							["& .em-icon-list-icon"]: {
								textAlign: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_align_mobile")],
								fontSize: attributes[getAttributeValueDynamic(attributes, "icon_List", "icon_size_mobile")],
							},
							["& .em-icon-list-text"]: {
								...fontStyle(attributes, "icon_List", "_mobile"),
							}
						},
					},
					'@media (max-width: 768px)': {
						["&:not(.em-inline-items)"]: {
							["& .em-icon-list-item:not(:first-child)"]: {
								marginTop: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`
							},
							["& .em-icon-list-item:not(:last-child)"]: {
								paddingBottom: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_tablet")]}px / 2)`
							}
						}
					},
					'@media (max-width: 600px)': {
						["&:not(.em-inline-items)"]: {
							["& .em-icon-list-item:not(:first-child)"]: {
								marginTop: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`
							},
							["& .em-icon-list-item:not(:last-child)"]: {
								paddingBottom: `calc(${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_space_between_mobile")]}px / 2)`
							}
						}
					},
				}
			}
		}
	})

	return (
		<div {...useBlockProps.save()}>
			<MediaParent sliderId={5} attribute_name="wrapper" {...props} innerblock={true} >
				<ul className={`em-icon-list-items${attributes[getAttributeValueDynamic(attributes, "icon_List", "list_layout")] === "inline" ? " em-inline-items" : ""}`}>
					<InnerBlocks.Content />
				</ul>
				<style>{sheet.toString()}</style>
			</MediaParent>
		</div>
	);
}
