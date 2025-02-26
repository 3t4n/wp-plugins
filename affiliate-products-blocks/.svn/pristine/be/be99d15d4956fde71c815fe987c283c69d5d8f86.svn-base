/* eslint-disable react/jsx-no-target-blank */
/* eslint-disable no-undef */
// import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		uniqueId,
		boxBorder,
		boxBorderRadius,
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
		btnLabel,
		btnLink,
		newTabTarget,
		color,
		bgColor,
		border,
		borderRadius,
	} = attributes;
	return (
		<div
			{...useBlockProps.save()}
			style={{
				border: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
				borderRadius: `${boxBorderRadius}px`,
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
					<img src={url} alt={alt} className={`wp-image-${id}`} />
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
						rel={newTabTarget ? 'noopener noreferrer' : 'noopener'}
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
	);
}
