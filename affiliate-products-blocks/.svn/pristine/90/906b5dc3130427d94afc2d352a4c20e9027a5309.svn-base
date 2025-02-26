/* eslint-disable @wordpress/no-unsafe-wp-apis */
/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	BlockControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ColorPalette,
	TextControl,
	ToggleControl,
	__experimentalBorderControl as BorderControl,
	RangeControl,
	TabPanel,
	DropdownMenu,
	ToolbarGroup,
} from '@wordpress/components';
const { Fragment } = wp.element;

// editor style
import './editor.scss';

// colors
import colors from '../colors-palette';

export default function Edit({ attributes, setAttributes, clientId }) {
	const {
		uniqueId,
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
		btnAlign,
		makeFullWidthBtn,
	} = attributes;

	// set uniqueId
	setAttributes({ uniqueId: clientId.slice(0, 8) });

	return (
		<Fragment>
			<style>
				{`.afpb__btn_${uniqueId}:hover{ color: ${hoverColor} !important; background-color: ${hoverBgColor} !important; border-color: ${hoverBorderColor} !important; }`}
			</style>
			{makeFullWidthBtn !== true && (
				<BlockControls>
					<ToolbarGroup>
						<DropdownMenu
							icon={'editor-justify'}
							label={__('Alignment', 'affiliaterg')}
							controls={[
								{
									title: __('Left', 'affiliaterg'),
									icon: 'editor-alignleft',
									onClick: () =>
										setAttributes({
											btnAlign: 'left',
										}),
								},
								{
									title: __('Center', 'affiliaterg'),
									icon: 'editor-aligncenter',
									onClick: () =>
										setAttributes({
											btnAlign: 'center',
										}),
								},
								{
									title: __('Right', 'affiliaterg'),
									icon: 'editor-alignright',
									onClick: () =>
										setAttributes({
											btnAlign: 'right',
										}),
								},
							]}
						/>
					</ToolbarGroup>
				</BlockControls>
			)}

			<InspectorControls>
				<PanelBody
					title={__('General Settings', 'affiliaterg')}
					initialOpen={false}
				>
					<TextControl
						label={__('Label', 'affiliaterg')}
						onChange={(text) => setAttributes({ btnLabel: text })}
						value={btnLabel}
					/>
					<TextControl
						label={__('Link', 'affiliaterg')}
						onChange={(text) => setAttributes({ btnLink: text })}
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
					<ToggleControl
						label={__('Make it full with button', 'affiliaterg')}
						checked={makeFullWidthBtn}
						onChange={() =>
							setAttributes({
								makeFullWidthBtn: !makeFullWidthBtn,
							})
						}
					/>
				</PanelBody>
				<PanelBody
					title={__('Button Style', 'affiliaterg')}
					initialOpen={false}
				>
					<BorderControl
						colors={colors}
						label={__('Border', 'affiliaterg')}
						onChange={(value) => setAttributes({ border: value })}
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
											{__('Text Color', 'afpb-blocks')}
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
											{__('Text Color', 'afpb-blocks')}
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
											{__('Border Color', 'afpb-blocks')}
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
			<div
				{...useBlockProps()}
				style={{
					textAlign: btnAlign,
				}}
			>
				<a
					href={btnLink}
					target={newTabTarget ? '_blank' : '_self'}
					rel={newTabTarget ? 'noopener noreferrer' : 'noopener'}
					className={`afpb__btn_${uniqueId}`}
					style={{
						color,
						backgroundColor: bgColor,
						border: `${border.width} ${border.style} ${border.color}`,
						borderRadius: `${borderRadius}px`,
						display: makeFullWidthBtn ? 'block' : 'inline-block',
					}}
				>
					{btnLabel}
				</a>
			</div>
		</Fragment>
	);
}
