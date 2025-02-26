/* eslint-disable @wordpress/no-unsafe-wp-apis */
/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
import { __ } from '@wordpress/i18n';

import {
	useBlockProps,
	InspectorControls,
	InnerBlocks,
} from '@wordpress/block-editor';
import {
	PanelBody,
	__experimentalBorderControl as BorderControl,
} from '@wordpress/components';
const { Fragment } = wp.element;

// editor style
import './editor.scss';

// colors
import colors from '../colors-palette';

// child block
import './product-item';

export default function Edit({ attributes, setAttributes, clientId }) {
	const { uniqueId, boxBorder } = attributes;

	// set uniqueId
	setAttributes({ uniqueId: clientId.slice(0, 8) });

	return (
		<Fragment>
			<style>
				{`.afpb__table_${uniqueId} .wp-block-afpb-product-item{ border-bottom: ${boxBorder.width} ${boxBorder.style} ${boxBorder.color} !important;}`}
				{`.afpb__table_${uniqueId} .product_photo{border-right: ${boxBorder.width} ${boxBorder.style} ${boxBorder.color} !important;}`}
				{`.afpb__table_${uniqueId} .product_content{border-right: ${boxBorder.width} ${boxBorder.style} ${boxBorder.color} !important;}`}
			</style>
			<InspectorControls>
				<PanelBody
					title={__('Product Container', 'affiliaterg')}
					initialOpen={false}
				>
					<BorderControl
						colors={colors}
						label={__('Border', 'affiliaterg')}
						onChange={(value) =>
							setAttributes({ boxBorder: value })
						}
						value={boxBorder}
						withSlider={true}
					/>
				</PanelBody>
			</InspectorControls>
			<div
				{...useBlockProps({
					className: `afpb__table_${uniqueId}`,
				})}
				style={{
					borderTop: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
					borderLeft: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
					borderRight: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
				}}
			>
				<InnerBlocks
					allowedBlocks={['afpb/product-item']}
					template={[['afpb/product-item']]}
					renderAppender={() => <InnerBlocks.ButtonBlockAppender />}
				/>
			</div>
		</Fragment>
	);
}
