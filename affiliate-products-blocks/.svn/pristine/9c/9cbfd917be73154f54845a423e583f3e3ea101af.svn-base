/* eslint-disable @wordpress/no-unsafe-wp-apis */
/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	RichText,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ColorPalette,
	__experimentalBorderControl as BorderControl,
	RangeControl,
} from '@wordpress/components';
const { Fragment } = wp.element;

// editor style
import './editor.scss';

// colors
import colors from '../colors-palette';

export default function Edit({ attributes, setAttributes, clientId }) {
	const {
		uniqueId,
		propsBorder,
		propsBorderRadius,
		propsList,
		propsListColor,
		propsBg,
		propsIconColor,
		consBorder,
		consBorderRadius,
		consList,
		consListColor,
		consBg,
		consIconColor,
	} = attributes;

	// set uniqueId
	setAttributes({ uniqueId: clientId.slice(0, 8) });

	return (
		<Fragment>
			<style>
				{`#afpb__props_${uniqueId} li:before{ color: ${propsIconColor} !important;}`}
				{`#afpb__cons_${uniqueId} li:before{ color: ${consIconColor} !important;}`}
			</style>
			<InspectorControls>
				<PanelBody
					title={__('Props Settings', 'affiliaterg')}
					initialOpen={false}
				>
					<BorderControl
						colors={colors}
						label={__('Container Border', 'affiliaterg')}
						onChange={(value) =>
							setAttributes({ propsBorder: value })
						}
						value={propsBorder}
						withSlider={true}
					/>
					<div className="afpb__divider"></div>
					<RangeControl
						label={__('Border Radius', 'affiliaterg')}
						value={propsBorderRadius}
						onChange={(value) =>
							setState({ propsBorderRadius: value })
						}
						min={0}
						max={100}
					/>
					<div className="afpb__divider"></div>
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
						{__('List Color', 'affiliaterg')}
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
					<div className="afpb__divider"></div>
					<p className="afpb__label">
						{__('Container Background', 'affiliaterg')}
					</p>
					<ColorPalette
						value={propsBg}
						onChange={(v) =>
							setAttributes({
								propsBg: v,
							})
						}
						colors={colors}
						clearable={false}
					/>
				</PanelBody>
				<PanelBody
					title={__('Cons Settings', 'affiliaterg')}
					initialOpen={false}
				>
					<BorderControl
						colors={colors}
						label={__('Container Border', 'affiliaterg')}
						onChange={(value) =>
							setAttributes({ consBorder: value })
						}
						value={consBorder}
						withSlider={true}
					/>
					<div className="afpb__divider"></div>
					<RangeControl
						label={__('Border Radius', 'affiliaterg')}
						value={consBorderRadius}
						onChange={(value) =>
							setState({ consBorderRadius: value })
						}
						min={0}
						max={100}
					/>
					<div className="afpb__divider"></div>
					<p className="afpb__label">
						{__('Icon Color', 'affiliaterg')}
					</p>
					<ColorPalette
						value={consIconColor}
						onChange={(v) =>
							setAttributes({
								consIconColor: v,
							})
						}
						colors={colors}
						clearable={false}
					/>
					<p className="afpb__label">
						{__('List Color', 'affiliaterg')}
					</p>
					<ColorPalette
						value={consListColor}
						onChange={(v) =>
							setAttributes({
								consListColor: v,
							})
						}
						colors={colors}
						clearable={false}
					/>
					<div className="afpb__divider"></div>
					<p className="afpb__label">
						{__('Container Background', 'affiliaterg')}
					</p>
					<ColorPalette
						value={consBg}
						onChange={(v) =>
							setAttributes({
								consBg: v,
							})
						}
						colors={colors}
						clearable={false}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<div
					className="afpb__props_box"
					style={{
						borderRadius: propsBorderRadius + 'px',
						border: `${propsBorder.width} ${propsBorder.style} ${propsBorder.color}`,
						background: propsBg,
					}}
				>
					<div
						className="afpb__icon"
						style={{
							border: `${propsBorder.width} ${propsBorder.style} ${propsBorder.color}`,
						}}
					>
						<i
							className="fa-solid fa-thumbs-up"
							style={{
								color: propsBorder.color,
							}}
						></i>
					</div>
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
							placeholder={__('add props..', 'affiliaterg')}
						/>
					</div>
				</div>
				<div
					className="afpb__cons_box"
					style={{
						borderRadius: consBorderRadius + 'px',
						border: `${consBorder.width} ${consBorder.style} ${consBorder.color}`,
						background: consBg,
					}}
				>
					<div
						className="afpb__icon"
						style={{
							border: `${consBorder.width} ${consBorder.style} ${consBorder.color}`,
						}}
					>
						<i
							className="fa-solid fa-thumbs-down"
							style={{
								color: consBorder.color,
							}}
						></i>
					</div>
					<div
						className="afpb__cons_list"
						id={`afpb__cons_${uniqueId}`}
						style={{
							color: consListColor,
						}}
					>
						<RichText
							tagName="ul"
							multiline="li"
							value={consList}
							onChange={(content) =>
								setAttributes({ consList: content })
							}
							placeholder={__('add cons..', 'affiliaterg')}
						/>
					</div>
				</div>
			</div>
		</Fragment>
	);
}
