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
		description,
		descriptionColor,
		url,
		id,
		alt,
		photoReversePosition,
		showProps,
		propsTitle,
		propsList,
		propsListColor,
		showCons,
		consTitle,
		consList,
		consListColor,
		btnLabel,
		btnLink,
		newTabTarget,
		color,
		bgColor,
		border,
		borderRadius,
	} = attributes;
	return (
		<div {...useBlockProps.save()}>
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
			<div
				className={`afpb__product_info ${
					photoReversePosition ? 'afpb__product_info--reverse' : ''
				}`}
				style={{
					border: `${boxBorder.width} ${boxBorder.style} ${boxBorder.color}`,
					borderRadius: `${boxBorderRadius}px`,
					backgroundColor: boxBg,
				}}
			>
				<div className="product_photo">
					{url && (
						<img src={url} alt={alt} className={`wp-image-${id}`} />
					)}
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
				<div className="product_content">
					<RichText.Content
						tagName={titleTag}
						value={title}
						style={{
							color: titleColor,
						}}
						className="title_tag"
					/>
					{showRating && (
						<div className="product_rating">
							<span className="rating_value">{rating}</span>
							<div
								className="review-rating"
								data-rate-value={rating}
							></div>
						</div>
					)}
					<div
						className="product_description"
						style={{
							color: descriptionColor,
						}}
					>
						<RichText.Content
							tagName="p"
							value={description}
							multiline="p"
						/>
					</div>
					<div className="afpb__props_cons">
						{showProps && (
							<div className="afpb__props_box">
								<div className="afpb__props_cons_title">
									{propsTitle}
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
						)}
						{showCons && (
							<div className="afpb__cons_box">
								<div className="afpb__props_cons_title">
									{consTitle}
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
						)}
					</div>
				</div>
			</div>
		</div>
	);
}
