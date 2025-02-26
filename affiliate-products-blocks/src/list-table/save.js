/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
// import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { uniqueId, boxBorder } = attributes;
	return (
		<div
			{...useBlockProps.save({
				className: `afpb__table_${uniqueId}`,
			})}
			style={{
				borderTop: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
				borderLeft: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
				borderRight: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
			}}
		>
			<InnerBlocks.Content />
		</div>
	);
}
