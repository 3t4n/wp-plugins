/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
// import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		uniqueId,
		propsBorder,
		propsBorderRadius,
		propsList,
		propsListColor,
		propsBg,
		consBorder,
		consBorderRadius,
		consList,
		consListColor,
		consBg,
	} = attributes;
	return (
		<div {...useBlockProps.save()}>
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
					<RichText.Content
						tagName="ul"
						multiline="li"
						value={propsList}
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
					<RichText.Content
						tagName="ul"
						multiline="li"
						value={consList}
					/>
				</div>
			</div>
		</div>
	);
}
