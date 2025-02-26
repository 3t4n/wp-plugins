import React, { useState } from 'react'
import { __ } from '@wordpress/i18n';
import { getAttributeValueDynamic } from "../../helper/globalFunctions";
const { useBlockProps, RichText } = wp.blockEditor;
import getVideoId from "get-video-id";
import preset from "jss-preset-default";
import jss from 'jss'
import SVG from 'react-inlinesvg';
import { Splide, SplideSlide, SplideTrack } from "@splidejs/react-splide";
import { buttonStyle, fontStyle, iconStyle, imageStyle, textalign, wrapperStyle } from "./cssFunc";
import "./style.scss";
import "./globleCss/style.scss";
import "@splidejs/react-splide/css";
jss.setup(preset());

export const generateClass = name => `em-${name}`;

const bgImgClass = (attributes, attribute_name) => {
	return `${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_blendmode")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_position")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_repeat")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_size")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_attachment")]}`
}
const overlayImgClasses = (attributes, attribute_name) => {
	return `${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_blendmode")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_position")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_repeat")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_size")]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_attachment")]}`
}

export const MediaParent = (props) => {
	const { attributes, className, attribute_name, tagName, edit } = props;
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				...wrapperStyle(attributes, attribute_name, ""),
				["&:hover"]: {
					...wrapperStyle(attributes, attribute_name, "_hover"),
				},
				'& >.em-overlay': {
					opacity: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_opacity")],
					background: {
						color: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_color")],
						image: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "gradient" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `overlay_gradient`)] : attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] && `url(${attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")]?.url})`,
						position: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_position")] : "" : "",
						repeat: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_repeat")] : "" : "",
						size: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_size")] : "" : "",
						attachment: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_type")] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_image")] ? attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_attachment")] : "" : "",
					},
					borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, "border_radius")]?.top,
					borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, "border_radius")]?.right,
					borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, "border_radius")]?.bottom,
					borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, "border_radius")]?.left,
					mixBlendMode: attributes[getAttributeValueDynamic(attributes, attribute_name, "overlay_blendmode")],
				},
				'@media (max-width: 768px)': {
					...wrapperStyle(attributes, attribute_name, "_tablet"),
					["&:hover"]: {
						...wrapperStyle(attributes, attribute_name, "_tablet_hover"),
					},
					// [`& .em-wrapper-${attributes.blockId}`]: fontStyle(attributes, attribute_name, "_tablet")
				},
				'@media (max-width: 600px)': {
					...wrapperStyle(attributes, attribute_name, "_mobile"),
					["&:hover"]: {
						...wrapperStyle(attributes, attribute_name, "_mobile_hover"),
					},
					// [`& .em-wrapper-${attributes.blockId}`]: fontStyle(attributes, attribute_name, "_mobile")
				},
			}
		}
	})

	let videoLink = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_video_link")]
	let source = getVideoId(videoLink);
	let privacy_mode = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_privacy_mode")] ? "-nocookie" : "";
	let youtubeLink = "https://www." + source?.service + privacy_mode + ".com/embed/" + source?.id + "?";
	let vimeoLink = "https://player." + source?.service + ".com/video/" + source?.id + "?";
	let loop = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_play_once")] ? "&loop=0" : "&loop=1";
	let start_time = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_start_time")] ? `&start=${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_start_time")]}` : "";
	let start_time_vimeo = attributes[getAttributeValueDynamic(attributes, attribute_name, "background_start_time")] ? `#t=${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_start_time")]}s` : "";
	let end_time = !!attributes[getAttributeValueDynamic(attributes, attribute_name, "background_end_time")] ? `&end=${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_end_time")]}` : "";

	let youtube = youtubeLink + "&autoplay=1" + start_time + end_time + loop + "&playsinline=0&mute=1&playlist=" + source?.id + "&modestbranding=1&controls=0&rel=0"
	let vimeo = vimeoLink + "&muted=1&autoplay=1" + loop + "&transparent=0&background=1&app_id=122963" + start_time_vimeo;
	let mainUrl = source?.service === "youtube"
		? youtube
		: source?.service === "vimeo"
		&& vimeo

	const blockProps = edit ? useBlockProps() : useBlockProps.save();
	const Tag = !!tagName ? tagName : "div";
	const content = <div className={`em-element em-wrapper-${attributes.blockId} ${!!className ? className : ""}`} style={props.style}>
		{attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "video" &&
			<div className={`em-background-video-container ${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_play_on_mob")] ? "" : "em-hidden-mobile"}`}>
				{/* <div className='em-video-inner'> */}
				{mainUrl && <iframe className="em-background-video-embed" frameborder="0" allowfullscreen="" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="Video Placeholder"
					src={mainUrl} width="560" height="315"></iframe>}
				<video class="em-background-video-hosted em-html5-video" autoplay muted playsinline loop></video>
				{/* </div> */}
			</div>
		}
		{attributes[getAttributeValueDynamic(attributes, attribute_name, "background_type")] === "slider" &&
			<div className="em-background-slideshow">
				{attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider")] && props.edit ?
					<Splide options={{
						perMove: 1,
						rewindByDrag: true,
						type: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_infinite_loop")] ? "loop" : "slide",
						lazyLoad: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_lazy_load")] ? 'nearby' : "sequential",
						autoplay: true,
						perPage: 1,
						pagination: false,
						arrows: false,
						direction: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_transition")],
						heightRatio: 1.1,
						wheel: true,
						releaseWheel: true,
						speed: parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "background_transition_duration")])
					}}
					>
						{attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider")]?.map((img) => {
							return <SplideSlide data-splide-interval={parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "background_duration")])}>
								<div className="em-background-slideshow__slide__image" style={{ backgroundImage: `url(${img.src})`, backgroundSize: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider_size")], backgroundPosition: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider_position")] }} />
							</SplideSlide>
						}
						)}
					</Splide>
					:
					<div className="splide"
						// {...props}
						data-splide={`{
						"perMove": 1,
						"autoplay": true,
						"perPage": 1,
						"pagination": false,
						"arrows": false,
						"heightRatio": 1.1,
						"wheel": true,
						"releaseWheel": true,
						"type": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_infinite_loop")] ? "loop" : "slide"}",
						"direction": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_transition")]}",
						"lazyLoad": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "background_lazy_load")] ? 'nearby' : 'sequential'}",
						"speed": ${parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "background_transition_duration")])}
					}`}
						id={`slider-${props.sliderId}`}
					>
						<div class="splide__track">
							<ul class="splide__list">
								{attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider")]?.map((img) => {
									return <li className="splide__slide" data-splide-interval={parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "background_duration")])}>
										<div className="em-background-slideshow__slide__image" style={{ backgroundImage: `url(${img.src})`, backgroundSize: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider_size")], backgroundPosition: attributes[getAttributeValueDynamic(attributes, attribute_name, "background_slider_position")] }} />
									</li>
								})}
							</ul>
						</div>
					</div>}
			</div>
		}
		<div className="em-background-overlay em-overlay"></div>
		{props.children}
		<style>{sheet.toString()}</style>
	</div>;

	return props.innerblock
		? content
		: <Tag {...blockProps}>
			{content}
		</Tag>
}

export const Col = (props) => {
	const { attribute_name, tagName, className, attributes } = props;
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				["& .em-col-element"]: {
					...wrapperStyle(attributes, attribute_name, ""),
					'@media (max-width: 768px)': {
						...wrapperStyle(attributes, attribute_name, "_tablet"),
						[`& .em-wrapper-${attributes.blockId}`]: fontStyle(attributes, attribute_name, "_tablet")
					},
					'@media (max-width: 600px)': {
						...wrapperStyle(attributes, attribute_name, "_mobile"),
						[`& .em-wrapper-${attributes.blockId}`]: fontStyle(attributes, attribute_name, "_mobile")
					},
				}
			}
		}
	})

	const Tag = !!tagName ? tagName : "div";
	return <Tag className={`em-col-element ${className}`} style={props.style} >
		{props.children}
		<style> {sheet.toString()} </style>
	</Tag>
}

// text fields
export const EMTitle = (props) => {
	const { type } = props;
	switch (type) {
		case "rich":
			return <RichTxt {...props} />;
		case "text":
			return <Paragraph {...props} />;
		case "icon-list":
			return <IconList {...props} />;
		default:
			return <p {...props}>Hello</p>;
	}
};

export const RichTxt = (props) => {
	const { edit, attributes, setAttributes, attribute_name, tagName } = props;
	const attr = getAttributeValueDynamic(attributes, attribute_name, "text_field")
	const link = attributes[getAttributeValueDynamic(attributes, attribute_name, "text_link")]
	// console.log("rich", link ? link : "saad")
	const Tag = !!tagName ? tagName : "h2";
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				[`& .${generateClass(!!props.className ? props.className : "title")}`]: {
					...fontStyle(attributes, attribute_name, ""),
					...textalign(attributes, attribute_name, ""),
					"&:hover": {
						color: `${attributes[getAttributeValueDynamic(attributes, attribute_name, 'font_color_hover')]} !important`,
						"& a": {
							color: `${attributes[getAttributeValueDynamic(attributes, attribute_name, 'font_color_hover')]} !important`,
						}
					},
					"& a": {
						color: `${attributes[getAttributeValueDynamic(attributes, attribute_name, 'font_color')]} !important`,
					}
				},
				'@media (max-width: 768px)': {
					[`& .${generateClass(!!props.className ? props.className : "title")}`]: {
						...fontStyle(attributes, attribute_name, "_tablet"),
						...textalign(attributes, attribute_name, "_tablet"),
						"& a": {
							color: `${attributes[getAttributeValueDynamic(attributes, attribute_name, 'font_color_tablet')]} !important`,
						}
					}
				},
				'@media (max-width: 600px)': {
					[`& .${generateClass(!!props.className ? props.className : "title")}`]: {
						...fontStyle(attributes, attribute_name, "_mobile"),
						...textalign(attributes, attribute_name, "_mobile"),
						"& a": {
							color: `${attributes[getAttributeValueDynamic(attributes, attribute_name, 'font_color_mobile')]} !important`,
						}
					}
				},
			}
		}
	})
	return <>{link ? <Tag className={`em-heading-title  ${generateClass(!!props.className ? props.className : "title")}`}>
		{edit ? <RichText
			placeholder={__("Add Your Text Here ...", 'advanced-blocks-pro')}
			tagName="a"
			href={link}
			value={__(attributes[attr], 'advanced-blocks-pro')}
			onChange={(e) =>
				setAttributes({ [attr]: e })
			}
		/>
			:
			<RichText.Content
				href={link}
				tagName="a"
				value={__(attributes[attr], 'advanced-blocks-pro')}
			/>}
	</Tag> : edit ? <RichText
		className={`em-heading-title  ${generateClass(!!props.className ? props.className : "title")}`}
		placeholder={__("Add Your Text Here ...", 'advanced-blocks-pro')}
		tagName={Tag}
		value={__(attributes[attr], 'advanced-blocks-pro')}
		onChange={(e) =>
			setAttributes({ [attr]: e })
		}
	/>
		:
		<RichText.Content
			className={`em-heading-title  ${generateClass(!!props.className ? props.className : "title")}`}
			tagName={Tag}
			value={__(attributes[attr], 'advanced-blocks-pro')}
		/>}
		<style>{sheet.toString()}</style>
	</>
}

export const Paragraph = (props) => {
	const { attributes, attribute_name, tagName } = props;
	const attr = getAttributeValueDynamic(attributes, attribute_name, "text_field");
	const Tag = !!tagName ? tagName : "p";

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				[`& .${generateClass("text")}`]: {
					...fontStyle(attributes, attribute_name, ""),
					...textalign(attributes, attribute_name, "")
				},
				'@media (max-width: 768px)': {
					[`& .${generateClass("text")}`]: {
						[`& .${generateClass("title")}`]: {
							...fontStyle(attributes, attribute_name, "_tablet"),
							...textalign(attributes, attribute_name, "_tablet")
						}
					}
				},
				'@media (max-width: 600px)': {
					[`& .${generateClass("text")}`]: {
						[`& .${generateClass("title")}`]: {
							...fontStyle(attributes, attribute_name, "_mobile"),
							...textalign(attributes, attribute_name, "_mobile")
						}
					}
				}
			}
		}
	})
	return <><Tag className={`${generateClass("text")}`}>
		{__(attributes[attr], 'advanced-blocks-pro')}
	</Tag>
		<style>{sheet.toString()}</style>
	</>
}

const IconList = (props) => {
	const { attributes, attribute_name, tagName, setAttributes, edit, className } = props;
	const Tag = !!tagName ? tagName : "div";
	const attr = getAttributeValueDynamic(attributes, attribute_name, "text_field")
	const blockProps = edit ? useBlockProps({ className: `em-icon-list-item em-widget-${attribute_name} ${!!className ? className : ""}` }) : useBlockProps.save({ className: `em-icon-list-item em-widget-${attribute_name} ${!!className ? className : ""}` });
	const icon = <span className="em-icon-list-icon em-svg-icon">{attributes[getAttributeValueDynamic(attributes, attribute_name, "text_type")] === "icon" ? <i aria-hidden="true" className={attributes[getAttributeValueDynamic(attributes, attribute_name, "text_icon")]} /> : <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "text_svg")]?.url} />}</span>
	const text = props.richtext ? edit ? <RichText
		className="em-icon-list-text"
		placeholder="Add Your Text Here ..."
		tagName={"span"}
		value={__(attributes[attr], 'advanced-blocks-pro')}
		onChange={(e) =>
			setAttributes({ [attr]: e })
		}
	/> : <RichText.Content
		className="em-icon-list-text"
		placeholder="Add Your Text Here ..."
		tagName={"span"}
		value={__(attributes[attr], 'advanced-blocks-pro')}
	/> : <span className="em-icon-list-text">{attributes[getAttributeValueDynamic(attributes, attribute_name, "text_field")]}</span>

	return <Tag {...blockProps}>
		{attributes[getAttributeValueDynamic(attributes, attribute_name, "text_link")]
			? <a href={attributes[getAttributeValueDynamic(attributes, attribute_name, "text_link")]}>{icon} {text}</a>
			: <>{icon} {text}</>}
	</Tag>
}

export const EmButton = (props) => {
	const { attributes, attribute_name, button } = props;
	const iconType = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_type")];
	const icon = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_selector")];
	const svg = attributes[getAttributeValueDynamic(attributes, attribute_name, "button_svg")];
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				'& .em-button-wrapper': {
					...textalign(attributes, attribute_name, ""),
					[`& .${generateClass("button")}`]: {
						display: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align")] === "justify" ? "block" : ""}`,
						width: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align")] === "justify" ? "100%" : ""}`,
						...fontStyle(attributes, attribute_name, ""), ...buttonStyle(attributes, attribute_name, ""),
						"&:hover": {
							...fontStyle(attributes, attribute_name, "_hover"), ...buttonStyle(attributes, attribute_name, "_hover")
						},
						'@media (max-width: 768px)': {
							display: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align_tablet")] === "justify" ? "block" : ""}`,
							width: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align_tablet")] === "justify" ? "100%" : ""}`,
							...fontStyle(attributes, attribute_name, "_tablet"), ...buttonStyle(attributes, attribute_name, "_tablet"),
							"&:hover": {
								...fontStyle(attributes, attribute_name, "_tablet_hover"), ...buttonStyle(attributes, attribute_name, "_tablet_hover")
							}
						},
						'@media (max-width: 600px)': {
							display: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align_mobile")] === "justify" ? "block" : ""}`,
							width: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "font_align_mobile")] === "justify" ? "100%" : ""}`,
							...fontStyle(attributes, attribute_name, "_mobile"), ...buttonStyle(attributes, attribute_name, "_mobile"),
							"&:hover": {
								...fontStyle(attributes, attribute_name, "_mobile_hover"), ...buttonStyle(attributes, attribute_name, "_mobile_hover")
							}
						}
					},
					'@media (max-width: 768px)': {
						...textalign(attributes, attribute_name, "_tablet")
					},
					'@media (max-width: 600px)': {
						...textalign(attributes, attribute_name, "_mobile")
					}

				}
			}
		}
	})
	const Tag = button ? "button" : "a"
	return <><div className={`em-button-wrapper`}>
		<Tag type={button && "submit"} href={!button && attributes[getAttributeValueDynamic(attributes, attribute_name, "button_link")]} className={`${[generateClass("button")]}`}>
			<span className="em-button-content">
				{attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_position")] === "before" && iconType !== "none" && <span className="em-button-icon em-svg-icon" style={{ marginRight: attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_spacing")] }}>{iconType === "icon" ? <i aria-hidden="true" className={icon} /> : iconType === "svg" && <SVG src={svg?.url} />}</span>}
				<span className="em-button-text">{__(attributes[getAttributeValueDynamic(attributes, attribute_name, "button_text")], 'advanced-blocks-pro')}</span>
				{attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_position")] === "after" && iconType !== "none" && <span className="em-button-icon em-svg-icon" style={{ marginLeft: attributes[getAttributeValueDynamic(attributes, attribute_name, "button_icon_spacing")] }}>{iconType === "icon" ? <i aria-hidden="true" className={icon} /> : iconType === "svg" && <SVG src={svg?.url} />}</span>}
			</span>
		</Tag>
	</div>
		<style>{sheet.toString()}</style>
	</>
}

// Media Fields
export const EMMedia = (props) => {
	const { type } = props;
	switch (type) {
		case "image":
			return <Image {...props} />;
		case "slider":
			return <Slider {...props} />;
		case "video":
			return <Video {...props} />;
		case "icon":
			return <Icon {...props} />;
		default:
			return <p {...props}>Hello</p>;
	}
};

const Video = (props) => {
	const { attributes, setAttributes, attribute_name, tagName, className, blockId } = props;
	let link = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
		? attributes[getAttributeValueDynamic(attributes, attribute_name, "video_youtube_link")]
		: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
			? attributes[getAttributeValueDynamic(attributes, attribute_name, "video_vimeo_link")]
			: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
				? attributes[getAttributeValueDynamic(attributes, attribute_name, "video_dailymotion_link")] : ""
	let source = getVideoId(link);
	let privacy_mode = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_privacy_mode")] ? "-nocookie" : "";
	let youtubeLink = "https://www." + source?.service + privacy_mode + ".com/embed/" + source?.id + "?";
	let vimeoLink = "https://player." + source?.service + ".com/video/" + source?.id + "?";
	let dailymotionLink = "https://" + source?.service + ".com/embed/video/" + source?.id + "?";
	let selfHostedLink = `${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_link_toggle")] ? attributes[getAttributeValueDynamic(attributes, attribute_name, "video_selfhosted_link")] : attributes[getAttributeValueDynamic(attributes, attribute_name, "video_selfhosted_video")]?.url}`
	let poster = `${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_poster")].url}`
	let mainUrl = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
		? youtubeLink
		: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
			? vimeoLink
			: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
				? dailymotionLink
				: selfHostedLink;

	let start_time = !!attributes[getAttributeValueDynamic(attributes, attribute_name, "video_start_time")] ? `&start=${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_start_time")]}` : "";
	let start_time_vimeo = `#t=${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_start_time")]}s`;
	let start_time_local = `#t=${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_start_time")]}`;
	let end_time = !!attributes[getAttributeValueDynamic(attributes, attribute_name, "video_end_time")] ? `&end=${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_end_time")]}` : "";
	let end_time_local = `,${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_end_time")]}`;
	let autoplay = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_autoplay")] ? "&autoplay=1" : "&autoplay=0";
	let play_on_mobile = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_on_mob")] ? "&playsinline=1" : "&playsinline=0";
	let mute = `${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_mute")] ? "&mute=1" : "&mute=0"}`;
	let muted = `${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_mute")] ? "&muted=1" : "&muted=0"}`;
	let loop = `${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_loop")] ? `&loop=1&playlist=${source.id}` : ""}`;
	let player_controls = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_player_controls")] ? "&controls=1" : "&controls=0";
	let modest_branding = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_modest_branding")] ? "&modestbranding=1" : "&modestbranding=0";
	//
	let lazy_load = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_lazy_load")] ? "cc_load_policy=1" : "";
	let intro_title = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_intro_title")] ? "&title=1" : "&title=0";
	let intro_portrail = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_intro_portrail")] ? "&portrait=1" : "&portrait=0";
	let intro_byline = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_intro_byline")] ? "&byline=1" : "&byline=0";
	let vimeo_color = `&color=${lodash.last(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_control_color")]?.split("#"))}`;
	let dailymotion_color = `&ui-highlight=${lodash.last(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_control_color")]?.split("#"))}`;
	let video_info = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_video_info")] ? "&ui-start-screen-info=1" : "&ui-start-screen-info=0";
	let logo = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_logo")] ? "&ui-logo=1" : "&ui-logo=0";

	let youtube = mainUrl + start_time + end_time + autoplay + play_on_mobile + mute + loop + modest_branding + player_controls + "&rel=0" + lazy_load;
	let vimeo = mainUrl + autoplay + play_on_mobile + muted + loop + intro_title + vimeo_color + intro_portrail + intro_byline + start_time_vimeo;
	let dailymotion = mainUrl + start_time + autoplay + play_on_mobile + muted + player_controls + dailymotion_color + video_info + logo;
	let selfHosted = mainUrl + start_time_local + end_time_local;

	let iframesrc = attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "youtube"
		? youtube
		: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "vimeo"
			? vimeo
			: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "dailymotion"
				? dailymotion
				: selfHosted;

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				'& .em-custom-embed-play': {
					"& i": {
						fontSize: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")],
						color: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_color")]
					},
					"& svg": {
						width: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")],
						fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_color")]
					}
				},
				'@media (max-width: 768px)': {
					'& .em-custom-embed-play': {
						"& i": {
							fontSize: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")]
						},
						"& svg": {
							fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")]
						}
					},
				},
				'@media (max-width: 600px)': {
					'& .em-custom-embed-play': {
						"& i": {
							fontSize: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")]
						},
						"& svg": {
							fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_size")]
						}
					},
				}
			}
		}
	})

	// function myFunction() {
	// 	document.addEventListener("click", function(){
	// 		document.getElementById("em-image-overlay").remove();
	// 	  })
	//   }
	// let Iddd = document.getElementById("em-image-overlay")
	// Iddd?.addEventListener('click', (event) => {
	// 	Iddd?.remove();
	// });
	// const [state , setState] = useState(true)
	// const handleClick = () => {
	// 	console.log('this is:', state);
	// 	setState(false)
	//   };

	return <div className="em-video"
		style={{ paddingBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_aspect_ratio")] }}
	>
		{attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")] === "self-hosted"
			? <video className="em-video-fram"
				src={iframesrc}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_autoplay")]
					? { autoPlay: true }
					: {})}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_loop")] ? { loop: true } : {})}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_player_controls")]
					? { controls: true }
					: {})}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_mute")] ? { muted: true } : {})}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_on_mobile")]
					? { playsinline: true }
					: {})}
				{...(attributes[getAttributeValueDynamic(attributes, attribute_name, "video_download_button")]
					? ""
					: { controlslist: "nodownload" })}
				poster={poster}
			/> :
			<iframe
				className="em-video-fram"
				allowFullScreen
				title={__(`${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_source")]} Video Player`, "advanced-blocks-pro")}
				width="640"
				height="360"
				src={iframesrc}
			/>}

		{attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_toggle")] && attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_image")]?.url && (
			<div id="em-image-overlay" className="em-image-overlay"
				style={{ backgroundImage: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_image")]?.url && `url(${attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_image")].url})` }}
			>
				{attributes[getAttributeValueDynamic(attributes, attribute_name, "video_overlay_image")]?.url && (
					attributes[getAttributeValueDynamic(attributes, attribute_name, "video_play_icon")] && (
						<div className="em-custom-embed-play em-svg-icon" role="button">
							{attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "icon"
								? <i aria-hidden="true" className={attributes[getAttributeValueDynamic(attributes, attribute_name, "video_selector")]}></i>
								: attributes[getAttributeValueDynamic(attributes, attribute_name, "video_icon_type")] === "svg"
									? <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "video_svg")]?.url} />
									: <i aria-hidden="true" className="far fa-play-circle"></i>}

						</div>
					)
				)}
			</div>
		)}
		<style> {sheet.toString()} </style>
	</div>
}

export const Image = (props) => {
	const { attributes, attribute_name, tagName, className, blockId } = props;
	const Tag = !!tagName ? tagName : "figure";
	const attr = getAttributeValueDynamic(attributes, attribute_name, "media_image");
	const image = <img src={!!attributes[attr]?.url ? attributes[attr]?.url : "http://localhost/wordpress/wp-content/plugins/elementor/assets/images/placeholder.png"} style={props.style} className="em-image" />;

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				["& .em-image-wrapper"]: {
					textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "media_align")],
					["& .em-image"]: {
						...imageStyle(attributes, attribute_name, ""),
						borderStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, "border_style")],
						"&:hover": {
							opacity: attributes[getAttributeValueDynamic(attributes, attribute_name, "media_opacity_hover")],
						}
					},
					["& .em-caption-text"]: {
						...fontStyle(attributes, attribute_name, ""), ...textalign(attributes, attribute_name, "")
					},
					'@media (max-width: 768px)': {
						["& .em-image"]: {
							...imageStyle(attributes, attribute_name, "_tablet"),
						},
						["& .em-caption-text"]: {
							...fontStyle(attributes, attribute_name, "_tablet"), ...textalign(attributes, attribute_name, "_tablet")
						}
					},
					'@media (max-width: 600px)': {
						["& .em-image"]: {
							...imageStyle(attributes, attribute_name, "_mobile")
						},
						["& .em-caption-text"]: {
							...fontStyle(attributes, attribute_name, "_mobile"), ...textalign(attributes, attribute_name, "_mobile")
						}
					}
				},
				'@media (max-width: 768px)': {
					["& .em-image-wrapper"]: {
						textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "media_align_tablet")],
					}
				},
				'@media (max-width: 600px)': {
					["& .em-image-wrapper"]: {
						textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "media_align_mobile")],
					}
				}
			}
		}
	})

	return <><Tag style={props.style} className={!!className ? className : `em-image-wrapper`}>
		{(attributes[getAttributeValueDynamic(attributes, attribute_name, "media_link_type")] === "custom_url" && !!attributes[getAttributeValueDynamic(attributes, attribute_name, "media_custom_url")]) &&
			<a href={attributes[getAttributeValueDynamic(attributes, attribute_name, "media_custom_url")]} >
				{image}
			</a>}
		{attributes[getAttributeValueDynamic(attributes, attribute_name, "media_link_type")] === "media_file" &&
			<a href={attributes[attr]?.url} >
				{image}
			</a>
		}
		{(attributes[getAttributeValueDynamic(attributes, attribute_name, "media_link_type")] === "none" || !attributes[getAttributeValueDynamic(attributes, attribute_name, "media_custom_url")]) &&
			image
		}
		{!!attributes[getAttributeValueDynamic(attributes, attribute_name, "media_caption")] &&
			<figcaption className={`em-caption-text`}>{__(attributes[getAttributeValueDynamic(attributes, attribute_name, "media_caption")] === "attachment_caption" ? attributes[attr]?.caption : attributes[getAttributeValueDynamic(attributes, attribute_name, "media_custom_caption")], "advanced-blocks-pro")} </figcaption>}
	</Tag>
		<style>{sheet.toString()}</style>
	</>
}

export const Slider = (props) => {
	const { attributes, attribute_name, tagName, className, blockId, edit } = props;
	const Tag = !!tagName ? tagName : "figure";
	const slides = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_images")];

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				"& .splide__arrow": {
					background: "none",
					fontSize: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrow_size")]}px`,
					"& i,svg": {
						color: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrow_color")],
						fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrow_color")],
						fontSize: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrow_size")]}px`,
						width: `${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrow_size")]}px`
					}
				},
				"& .splide__pagination__page": {
					backgroundColor: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pagination_color")],
				},
				"& .splide__pagination__page.is-active": {
					backgroundColor: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pagination_active")],
				},
				"& .splide__list": {
					alignItems: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_vertical_align")]
				},
				"& .em-slider-wrapper": {
					width: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_image_stretch")],
					"& .em-image": {
						...imageStyle(attributes, attribute_name, ""),
						width: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_image_stretch")],
						"&:hover": {
							opacity: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_opacity_hover")],
						}
					},
					"& .em-caption-text": {
						...fontStyle(attributes, attribute_name, ""), ...textalign(attributes, attribute_name, "")
					},
					'@media (max-width: 768px)': {
						"& .em-image": {
							...imageStyle(attributes, attribute_name, "_tablet"),
						},
						"& .em-caption-text": {
							...fontStyle(attributes, attribute_name, "_tablet"), ...textalign(attributes, attribute_name, "_tablet")
						}
					},
					'@media (max-width: 600px)': {
						"& .em-image": {
							...imageStyle(attributes, attribute_name, "_mobile")
						},
						"& .em-caption-text": {
							...fontStyle(attributes, attribute_name, "_mobile"), ...textalign(attributes, attribute_name, "_mobile")
						}
					}
				}
			}
		}
	})
	const dots_pos = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "arrows" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pagination_position")] : "";
	const arrows_pos = attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "dots" && attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] !== "none" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_arrows_position")] : "";
	return <>
		{slides
			? edit
				? <Splide options={{
					resetProgress: false,
					perMove: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")] === "1" ? 1 : parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_scroll")]),
					gap: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_spacing")] === "custom_spacing" ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_spacing")]}px` : 0,
					pauseOnHover: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pause_on_hover")],
					resetProgress: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pause_on_interaction")],
					type: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_infinite_loop")] ? "loop" : "slide",
					lazyLoad: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_lazy_load")] ? 'nearby' : "sequential",
					autoplay: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay")],
					perPage: parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")]),
					pagination: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "arrows" || attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "none" ? false : true,
					arrows: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "dots" || attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "none" ? false : true,
					direction: attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_direction")],
					speed: parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay_speed")]),
					breakpoints: {
						640: {
							perPage: 1,
						},
					}
				}}
					className={`em-slider`}
					hasTrack={false}
					role="group"
				>
					<SplideTrack className={`${arrows_pos} ${dots_pos}`}>
						{slides?.map((img) => {
							return <SplideSlide data-splide-interval={parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_animation_speed")])}>
								<Tag className={!!className ? className : `em-slider-wrapper`}>
									{(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "custom_url" && !!attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]) &&
										<a href={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]} >
											<img src={img.src} className="em-image" />
										</a>}
									{/* {attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "media_file" &&
										<a href={img.src} >
											<img src={img.src} className="em-image" />
										</a>
									} */}
									{(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "none" || !attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]) &&
										<img src={img.src} className="em-image" />
									}
									{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_caption")] !== "none" &&
										<figcaption className={`em-caption-text`}>
											{__(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_caption")] === "caption" ? img.caption : "", "advanced-blocks-pro")}
										</figcaption>}
								</Tag>
							</SplideSlide>
						}
						)}
					</SplideTrack>

					<div className="splide__arrows">
						<button className="splide__arrow splide__arrow--prev em-svg-icon">
							{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] !== "svg"
								? <i aria-hidden="true" className={`${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "icon" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_icon")] : "fas fa-chevron-left"}`} ></i>
								: <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_svg")]?.url} />}
						</button>
						<button className="splide__arrow splide__arrow--next em-svg-icon">
							{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] !== "svg"
								? <i aria-hidden="true" className={`${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "icon" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_icon")] : "fas fa-chevron-right"}`} ></i>
								: <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_svg")]?.url} />}
						</button>
					</div>

					{/* <div className="splide__progress">
						<div className="splide__progress__bar" />
					</div> */}

				</Splide>
				: <div className={`splide splider em-slider`}
					{...props}
					data-splide={`{
					"pauseOnHover":${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pause_on_hover")]},
					"resetProgress":${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pause_on_interaction")]},
					"perMove": ${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")] === "1" ? 1 : attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_scroll")]},
					"autoplay": ${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay")]},
					"gap": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_spacing")] === "custom_spacing" ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_spacing")]}px` : "0px"}" ,
					"perPage": ${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_show")]},
					"pagination": ${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "arrows" || attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "none" ? false : true},
					"arrows": ${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "dots" || attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_navigation")] === "none" ? false : true},
					"type": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_infinite_loop")] ? "loop" : "slide"}",
					"direction": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_direction")]}",
					"lazyLoad": "${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_lazy_load")] ? 'nearby' : 'sequential'}",
					"speed": ${parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_autoplay_speed")])},
					"resetProgress": false,
					"rewind":false
				}`}
					id="splide2"
					role="group"
					hasTrack={false}
				>
					<div class={`splide__track ${arrows_pos} ${dots_pos}`}>
						<ul class="splide__list">
							{slides?.map((img) => {
								return <li className="splide__slide" data-splide-interval={parseInt(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_animation_speed")])}>
									<Tag className={!!className ? className : `em-slider-wrapper`}>
										{(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "custom_url" && !!attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]) &&
											<a href={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]} >
												<img src={img.src} className="em-image" />
											</a>}
										{/* {attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "media_file" &&
											<a href={img.src} >
												<img src={img.src} className="em-image" />
											</a>
										} */}
										{(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_link_type")] === "none" || !attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_custom_url")]) &&
											<img src={img.src} className="em-image" />
										}
										{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_caption")] !== "none" &&
											<figcaption className={`em-caption-text`}>
												{__(attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_caption")] === "caption" ? img.caption : "", "advanced-blocks-pro")}
											</figcaption>}
									</Tag>
								</li>
							})}
						</ul>
					</div>
					<div className="splide__arrows">
						<button className="splide__arrow splide__arrow--prev em-svg-icon-prev">
							{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] !== "svg"
								? <i aria-hidden="true" className={`${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_type")] === "icon" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_icon")] : "fas fa-chevron-left"}`} ></i>
								: <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_pre_svg")]?.url} />}
						</button>
						<button className="splide__arrow splide__arrow--next em-svg-icon-next">
							{attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] !== "svg"
								? <i aria-hidden="true" className={`${attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_type")] === "icon" ? attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_icon")] : "fas fa-chevron-right"}`} ></i>
								: <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "slides_next_svg")]?.url} />}
						</button>
					</div>
					{/* <div className="splide__progress">
						<div className="splide__progress__bar" />
					</div> */}

				</div>
			: <div style={{ height: "30px", textAlign: "center" }}> <span className="dashicons dashicons-slides" style={{ fontSize: "30px" }}></span></div>}

		<style>{sheet.toString()}</style>
	</>
}

export const Icon = (props) => {
	const { attributes, attribute_name } = props;
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				"& .em-icon-wrapper": {
					textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_align")],
					"& .em-icon": {
						...iconStyle(attributes, attribute_name, ""),
						"& i,svg": {
							fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_color")],
							transform: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate")] && `rotate( ${attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate")]})`
						},
						"&:hover": {
							...iconStyle(attributes, attribute_name, "_hover"),
							"& svg": {
								fill: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_color_hover")]
							}
						}
					}
				},
				'@media (max-width: 768px)': {
					"& .em-icon-wrapper": {
						textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_align_tablet")],
						"& .em-icon": {
							...iconStyle(attributes, attribute_name, "_tablet"),
							"& i,svg": {
								transform: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate_tablet")] && `rotate( ${attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate_tablet")]})`
							},
							"&:hover": {
								...iconStyle(attributes, attribute_name, "_tablet_hover")
							}
						}
					},
				},
				'@media (max-width: 600px)': {
					"& .em-icon-wrapper": {
						textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_align_mobile")],
						"& .em-icon": {
							...iconStyle(attributes, attribute_name, "_mobile"),
							"& i,svg": {
								transform: attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate_mobile")] && `rotate( ${attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_rotate_mobile")]})`
							},
							"&:hover": {
								...iconStyle(attributes, attribute_name, "_mobile_hover")
							}
						}
					}

				}
			}
		}
	})
	return <><div className="em-icon-wrapper">
		<div className="em-icon em-svg-icon">
			{attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_type")] === "icon" ? <i aria-hidden="true" className={attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_selector")]} /> : <SVG src={attributes[getAttributeValueDynamic(attributes, attribute_name, "icon_svg")]?.url} />}
		</div>
	</div>
		<style>{sheet.toString()}</style>
	</>
}