/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
// import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		uniqueId,
		btnLabel,
		btnLink,
		newTabTarget,
		color,
		bgColor,
		border,
		borderRadius,
		btnAlign,
		makeFullWidthBtn,
	} = attributes;
	return (
		<div
			{...useBlockProps.save()}
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
	);
}
