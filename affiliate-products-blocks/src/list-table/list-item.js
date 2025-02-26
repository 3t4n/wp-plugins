/* eslint-disable @wordpress/no-unsafe-wp-apis */
/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Rater from 'react-rater';
import {
	useBlockProps,
	InspectorControls,
	BlockControls,
	MediaPlaceholder,
	MediaUpload,
	MediaUploadCheck,
	RichText,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ColorPalette,
	TextControl,
	ToggleControl,
	__experimentalBorderControl as BorderControl,
	RangeControl,
	TabPanel,
	ToolbarGroup,
	SelectControl,
	ToolbarButton,
} from '@wordpress/components';

const { Fragment } = wp.element;

// colors
import colors from '../colors-palette';
/**
 * Block Registration
 */
registerBlockType('afpb/list-item', {
	title: __('List Item', 'affiliaterg'),
	description: __('Acts as Child block for List Table', 'affiliaterg'),
	icon: 'minus',
	category: 'affiliaterg',
	parent: ['afpb/list-table'],
	attributes: {
		uniqueId: {
			type: 'string',
		},
		boxBg: {
			type: 'string',
			default: '#ffffff',
		},
		showBadge: {
			type: 'boolean',
			default: false,
		},
		badgeText: {
			type: 'string',
			default: 'FEATURED',
		},
		badgeColor: {
			type: 'string',
			default: '#ffffff',
		},
		badgeBg: {
			type: 'string',
			default: '#d7b837',
		},
		showRating: {
			type: 'boolean',
			default: true,
		},
		rating: {
			type: 'number',
			default: 5,
		},
		title: {
			type: 'string',
		},
		titleTag: {
			type: 'string',
			default: 'h2',
		},
		titleColor: {
			type: 'string',
			default: '#333333',
		},
		description: {
			type: 'string',
		},
		descriptionColor: {
			type: 'string',
			default: '#333333',
		},
		url: {
			type: 'string',
		},
		id: {
			type: 'number',
		},
		alt: {
			type: 'string',
		},
		propsList: {
			type: 'string',
		},
		propsListColor: {
			type: 'string',
			default: '#333333',
		},
		propsIconColor: {
			type: 'string',
			default: '#027000',
		},
		btnLabel: {
			type: 'string',
			default: 'Buy Now',
		},
		btnLink: {
			type: 'string',
			default: '#',
		},
		newTabTarget: {
			type: 'boolean',
			default: false,
		},
		color: {
			type: 'string',
			default: '#ffffff',
		},
		bgColor: {
			type: 'string',
			default: '#d59215',
		},
		hoverColor: {
			type: 'string',
			default: '#ffffff',
		},
		hoverBgColor: {
			type: 'string',
			default: '#000000',
		},
		border: {
			type: 'object',
			default: {
				width: '0px',
				style: 'solid',
				color: '#d59215',
			},
		},
		hoverBorderColor: {
			type: 'string',
			default: '#d59215',
		},
		borderRadius: {
			type: 'number',
			default: 5,
		},
	},
	edit: ({ attributes, setAttributes, clientId }) => {
		const {
			uniqueId,
			boxBg,
			showBadge,
			badgeText,
			badgeColor,
			badgeBg,
			showRating,
			rating,
			title,
			titleTag,
			titleColor,
			url,
			id,
			alt,
			propsList,
			propsListColor,
			propsIconColor,
			btnLabel,
			btnLink,
			newTabTarget,
			color,
			bgColor,
			hoverColor,
			hoverBgColor,
			border,
			hoverBorderColor,
			borderRadius,
		} = attributes;

		// set uniqueId
		setAttributes({ uniqueId: clientId.slice(0, 8) });

		const blockProps = useBlockProps({
			className: `wp-block-afpb-list-item`,
		});

		return (
			<Fragment>
				<style>
					{`.afpb__btn_${uniqueId}:hover{ color: ${hoverColor} !important; background-color: ${hoverBgColor} !important; border-color: ${hoverBorderColor} !important; }`}
					{`#afpb__props_${uniqueId} li:before{ color: ${propsIconColor} !important;}`}
				</style>
				<InspectorControls>
					<PanelBody
						title={__('Product Container', 'affiliaterg')}
						initialOpen={false}
					>
						<p className="afpb__label">
							{__('Background Color', 'afpb-blocks')}
						</p>
						<ColorPalette
							value={boxBg}
							onChange={(v) =>
								setAttributes({
									boxBg: v,
								})
							}
							colors={colors}
							clearable={false}
						/>
					</PanelBody>
					<PanelBody
						title={__('Product Ribbon', 'affiliaterg')}
						initialOpen={false}
					>
						<ToggleControl
							label={__('Show Ribbon', 'affiliaterg')}
							checked={showBadge}
							onChange={() =>
								setAttributes({
									showBadge: !showBadge,
								})
							}
						/>
						{showBadge && (
							<Fragment>
								<div className="afpb__divider"></div>
								<TextControl
									label={__('Ribbon Text', 'affiliaterg')}
									onChange={(value) =>
										setAttributes({ badgeText: value })
									}
									value={badgeText}
									placeholder={__(
										'Ribbon Text',
										'affiliaterg'
									)}
								/>
								<p className="afpb__label">
									{__('Color', 'afpb-blocks')}
								</p>
								<ColorPalette
									value={badgeColor}
									onChange={(v) =>
										setAttributes({
											badgeColor: v,
										})
									}
									colors={colors}
									clearable={false}
								/>
								<p className="afpb__label">
									{__('Background', 'afpb-blocks')}
								</p>
								<ColorPalette
									value={badgeBg}
									onChange={(v) =>
										setAttributes({
											badgeBg: v,
										})
									}
									colors={colors}
									clearable={false}
								/>
							</Fragment>
						)}
					</PanelBody>
					<PanelBody
						title={__('Product Content', 'affiliaterg')}
						initialOpen={false}
					>
						<div className="afpb__divider_bar">
							{__('Product Title', 'affiliaterg')}
						</div>
						<SelectControl
							label={__('Tittle Tag', 'affiliaterg')}
							options={[
								{ label: 'h1', value: 'h1' },
								{ label: 'h2', value: 'h2' },
								{ label: 'h3', value: 'h3' },
								{ label: 'h4', value: 'h4' },
								{ label: 'h5', value: 'h5' },
								{ label: 'h6', value: 'h6' },
							]}
							onChange={(value) => {
								setAttributes({ titleTag: value });
							}}
							value={titleTag}
						/>
						<div className="afpb__divider"></div>
						<p className="afpb__label">
							{__('Color', 'afpb-blocks')}
						</p>
						<ColorPalette
							value={titleColor}
							onChange={(v) =>
								setAttributes({
									titleColor: v,
								})
							}
							colors={colors}
							clearable={false}
						/>
					</PanelBody>
					<PanelBody
						title={__('Product Rating', 'affiliaterg')}
						initialOpen={false}
					>
						<ToggleControl
							label={__('Show Rating', 'affiliaterg')}
							checked={showRating}
							onChange={() =>
								setAttributes({
									showRating: !showRating,
								})
							}
						/>
						{showRating && (
							<RangeControl
								label={__('Set Rating Value', 'affiliaterg')}
								value={rating}
								onChange={(value) =>
									setAttributes({ rating: value })
								}
								min={0}
								max={5}
								step={0.1}
							/>
						)}
					</PanelBody>
					<PanelBody
						title={__('Product Features', 'affiliaterg')}
						initialOpen={false}
					>
						<p className="afpb__label">
							{__('Icon Color', 'affiliaterg')}
						</p>
						<ColorPalette
							value={propsIconColor}
							onChange={(v) =>
								setAttributes({
									propsIconColor: v,
								})
							}
							colors={colors}
							clearable={false}
						/>
						<p className="afpb__label">
							{__('Feature List Color', 'affiliaterg')}
						</p>
						<ColorPalette
							value={propsListColor}
							onChange={(v) =>
								setAttributes({
									propsListColor: v,
								})
							}
							colors={colors}
							clearable={false}
						/>
					</PanelBody>
					<PanelBody
						title={__('Button Settings', 'affiliaterg')}
						initialOpen={false}
					>
						<TextControl
							label={__('Label', 'affiliaterg')}
							onChange={(text) =>
								setAttributes({ btnLabel: text })
							}
							value={btnLabel}
						/>
						<TextControl
							label={__('Link', 'affiliaterg')}
							onChange={(text) =>
								setAttributes({ btnLink: text })
							}
							value={btnLink}
						/>
						<ToggleControl
							label={__('Open in new tab', 'affiliaterg')}
							checked={newTabTarget}
							onChange={() =>
								setAttributes({
									newTabTarget: !newTabTarget,
								})
							}
						/>
						<div className="afpb__divider_bar">
							{__('Button Style', 'affiliaterg')}
						</div>
						<BorderControl
							colors={colors}
							label={__('Border', 'affiliaterg')}
							onChange={(value) =>
								setAttributes({ border: value })
							}
							value={border}
							withSlider={true}
						/>
						<div className="afpb__divider"></div>
						<RangeControl
							label={__('Border Radius', 'affiliaterg')}
							value={borderRadius}
							onChange={(value) =>
								setAttributes({ borderRadius: value })
							}
							min={0}
							max={100}
						/>
						<div className="afpb__tabs_panel">
							<TabPanel
								activeClass="active-tab"
								tabs={[
									{
										name: 'normal',
										title: __('Normal', 'afpb-blocks'),
										className: 'afpb__tab',
									},
									{
										name: 'hover',
										title: __('Hover', 'afpb-blocks'),
										className: 'afpb__tab',
									},
								]}
							>
								{(panel) =>
									panel.name === 'normal' ? (
										<Fragment>
											<p className="afpb__label">
												{__(
													'Text Color',
													'afpb-blocks'
												)}
											</p>
											<ColorPalette
												value={color}
												onChange={(v) =>
													setAttributes({
														color: v,
													})
												}
												colors={colors}
												clearable={false}
											/>
											<p className="afpb__label">
												{__(
													'Background Color',
													'afpb-blocks'
												)}
											</p>
											<ColorPalette
												value={bgColor}
												onChange={(v) =>
													setAttributes({
														bgColor: v,
													})
												}
												colors={colors}
												clearable={false}
											/>
										</Fragment>
									) : (
										<Fragment>
											<p className="afpb__label">
												{__(
													'Text Color',
													'afpb-blocks'
												)}
											</p>
											<ColorPalette
												value={hoverColor}
												onChange={(v) =>
													setAttributes({
														hoverColor: v,
													})
												}
												colors={colors}
												clearable={false}
											/>
											<p className="afpb__label">
												{__(
													'Background Color',
													'afpb-blocks'
												)}
											</p>
											<ColorPalette
												value={hoverBgColor}
												onChange={(v) =>
													setAttributes({
														hoverBgColor: v,
													})
												}
												colors={colors}
												clearable={false}
											/>
											<p className="afpb__label">
												{__(
													'Border Color',
													'afpb-blocks'
												)}
											</p>
											<ColorPalette
												value={hoverBorderColor}
												onChange={(v) =>
													setAttributes({
														hoverBorderColor: v,
													})
												}
												colors={colors}
												clearable={false}
											/>
										</Fragment>
									)
								}
							</TabPanel>
						</div>
					</PanelBody>
				</InspectorControls>
				{id && (
					<BlockControls>
						<ToolbarGroup>
							<MediaUploadCheck>
								<MediaUpload
									onSelect={(media) =>
										setAttributes({
											url: media.url,
											alt: media.alt,
											id: media.id,
										})
									}
									allowedTypes={['image']}
									value={id}
									render={({ open }) => {
										return (
											<ToolbarButton
												label={__(
													'Edit Image',
													'affiliaterg'
												)}
												onClick={open}
												icon="edit"
											/>
										);
									}}
								/>
							</MediaUploadCheck>
						</ToolbarGroup>
					</BlockControls>
				)}
				<div
					{...blockProps}
					style={{
						backgroundColor: boxBg,
					}}
				>
					{showBadge && (
						<div
							className={`afpb__badge`}
							style={{
								color: badgeColor,
								backgroundColor: badgeBg,
							}}
						>
							{badgeText}
						</div>
					)}
					<div className="product_photo">
						{url ? (
							<img
								src={url}
								alt={alt}
								className={`wp-image-${id}`}
							/>
						) : (
							<MediaPlaceholder
								onSelect={(media) =>
									setAttributes({
										url: media.url,
										alt: media.alt,
										id: media.id,
									})
								}
								onFilesPreUpload={(media) =>
									setAttributes({
										url: media.url,
										alt: media.alt,
										id: media.id,
									})
								}
								onSelectURL={false}
								allowedTypes={['image']}
								labels={{
									title: __(
										'Add Product Image',
										'affiliaterg'
									),
								}}
							/>
						)}
					</div>
					<div className="product_content">
						<RichText
							tagName={titleTag}
							value={title}
							onChange={(content) =>
								setAttributes({ title: content })
							}
							className="title_tag"
							placeholder={__('Product Title..', 'affiliaterg')}
							style={{
								color: titleColor,
							}}
						/>
						<div
							className={`afpb__props_list`}
							id={`afpb__props_${uniqueId}`}
							style={{
								color: propsListColor,
							}}
						>
							<RichText
								tagName="ul"
								multiline="li"
								value={propsList}
								onChange={(content) =>
									setAttributes({ propsList: content })
								}
								placeholder={__(
									'add features..',
									'affiliaterg'
								)}
							/>
						</div>
					</div>
					<div className="product__action_area">
						{showRating && (
							<div className="product_rating">
								<span className="rating_value">{rating}</span>
								<Rater
									total={5}
									rating={rating}
									interactive={false}
								/>
							</div>
						)}
						<div className="product__btn">
							<a
								href={btnLink}
								target={newTabTarget ? '_blank' : '_self'}
								rel={
									newTabTarget
										? 'noopener noreferrer'
										: 'noopener'
								}
								className={`afpb__btn afpb__btn_${uniqueId}`}
								style={{
									color,
									backgroundColor: bgColor,
									border: `${border.width} ${border.style} ${border.color}`,
									borderRadius: `${borderRadius}px`,
								}}
							>
								{btnLabel}
							</a>
						</div>
					</div>
				</div>
			</Fragment>
		);
	},
	save: ({ attributes }) => {
		const {
			uniqueId,
			boxBg,
			showBadge,
			badgeText,
			badgeColor,
			badgeBg,
			showRating,
			rating,
			title,
			titleTag,
			titleColor,
			url,
			id,
			alt,
			propsList,
			propsListColor,
			propsIconColor,
			btnLabel,
			btnLink,
			newTabTarget,
			color,
			bgColor,
			hoverColor,
			hoverBgColor,
			border,
			hoverBorderColor,
			borderRadius,
		} = attributes;

		return (
			<Fragment>
				<style>
					{`.afpb__btn_${uniqueId}:hover{ color: ${hoverColor} !important; background-color: ${hoverBgColor} !important; border-color: ${hoverBorderColor} !important; }`}
					{`#afpb__props_${uniqueId} li:before{ color: ${propsIconColor} !important;}`}
				</style>
				<div
					{...useBlockProps.save()}
					style={{
						backgroundColor: boxBg,
					}}
				>
					{showBadge && (
						<div
							className={`afpb__badge`}
							style={{
								color: badgeColor,
								backgroundColor: badgeBg,
							}}
						>
							{badgeText}
						</div>
					)}
					<div className="product_photo">
						{url && (
							<img
								src={url}
								alt={alt}
								className={`wp-image-${id}`}
							/>
						)}
					</div>
					<div className="product_content">
						<RichText.Content
							tagName={titleTag}
							value={title}
							className="title_tag"
							style={{
								color: titleColor,
							}}
						/>
						<div
							className={`afpb__props_list`}
							id={`afpb__props_${uniqueId}`}
							style={{
								color: propsListColor,
							}}
						>
							<RichText.Content
								tagName="ul"
								multiline="li"
								value={propsList}
							/>
						</div>
					</div>
					<div className="product__action_area">
						{showRating && (
							<div className="product_rating">
								<span className="rating_value">{rating}</span>
								<div
									className="review-rating"
									data-rate-value={rating}
								></div>
							</div>
						)}
						<div className="product__btn">
							<a
								href={btnLink}
								target={newTabTarget ? '_blank' : '_self'}
								rel={
									newTabTarget
										? 'noopener noreferrer'
										: 'noopener'
								}
								className={`afpb__btn afpb__btn_${uniqueId}`}
								style={{
									color,
									backgroundColor: bgColor,
									border: `${border.width} ${border.style} ${border.color}`,
									borderRadius: `${borderRadius}px`,
								}}
							>
								{btnLabel}
							</a>
						</div>
					</div>
				</div>
			</Fragment>
		);
	},
});
