/* eslint-disable no-nested-ternary */
/* eslint-disable react/jsx-key */
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {
	faStar,
	faStarHalfAlt,
	faHeart,
	faHeartBroken,
	faCircle,
	faCircleHalfStroke,
	faCircleNotch,
	faThumbsUp,
	faThumbsDown,
	faMessage,
	faComment,
	faCommentDots,
	faFaceSmile,
} from '@fortawesome/free-solid-svg-icons';
import {
	faStar as faStarEmpty,
	faHeart as faHeartEmpty,
} from '@fortawesome/free-regular-svg-icons';

import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		showLabel,
		labelType,
		labelPosition,
		labelColor,
		labelSize,
		labelGap,
		label,
		labelIcon,
		maxRating,
		rating,
		ratingIcon,
		ratingColor,
		ratingSize,
		ratingGap,
		ratingAlign,
	} = attributes;

	const full = Math.floor(rating);
	const half = rating % 1 === 0 ? 0 : 1;
	const empty = maxRating - (half + full);

	let selectLabelIcon;
	switch (labelIcon) {
		case 'thumbs-up':
			selectLabelIcon = faThumbsUp;
			break;
		case 'thumbs-down':
			selectLabelIcon = faThumbsDown;
			break;
		case 'comment':
			selectLabelIcon = faComment;
			break;
		case 'comment-dots':
			selectLabelIcon = faCommentDots;
			break;
		case 'message':
			selectLabelIcon = faMessage;
			break;
		default:
			selectLabelIcon = faFaceSmile;
	}

	return (
		<div
			{...useBlockProps.save({
				className: `${showLabel ? `arb__label_${labelPosition}` : ''}`,
			})}
			style={{
				gap: `${labelGap}px`,
				justifyContent: `${
					showLabel &&
					(labelPosition === 'left' || labelPosition === 'right')
						? ratingAlign
						: 'auto'
				}`,
				alignItems: `${
					showLabel &&
					(labelPosition === 'top' || labelPosition === 'bottom')
						? ratingAlign
						: 'auto'
				}`,
			}}
		>
			{showLabel && (
				<div className="arb__rating_label">
					{labelType === 'text' ? (
						<div
							className="arb__rating_label_text"
							style={{
								fontSize: `${labelSize}px`,
								color: labelColor,
							}}
						>
							{label}
						</div>
					) : (
						<FontAwesomeIcon
							icon={selectLabelIcon}
							color={labelColor}
							style={{
								fontSize: `${labelSize}px`,
								width: labelSize,
								height: labelSize,
							}}
						/>
					)}
				</div>
			)}
			<div
				className="arb__rating_icons"
				style={{
					gap: `${ratingGap}px`,
				}}
			>
				{full
					? [...Array(full).keys()].map(() => (
							<FontAwesomeIcon
								icon={
									ratingIcon === 'star'
										? faStar
										: ratingIcon === 'heart'
										? faHeart
										: faCircle
								}
								color={ratingColor}
								style={{
									fontSize: ratingSize,
									width: ratingSize,
									height: ratingSize,
								}}
							/>
					  ))
					: null}
				{half ? (
					<FontAwesomeIcon
						icon={
							ratingIcon === 'star'
								? faStarHalfAlt
								: ratingIcon === 'heart'
								? faHeartBroken
								: faCircleHalfStroke
						}
						color={ratingColor}
						style={{
							fontSize: ratingSize,
							width: ratingSize,
							height: ratingSize,
						}}
					/>
				) : null}
				{empty
					? [...Array(empty).keys()].map(() => (
							<FontAwesomeIcon
								icon={
									ratingIcon === 'star'
										? faStarEmpty
										: ratingIcon === 'heart'
										? faHeartEmpty
										: faCircleNotch
								}
								color={ratingColor}
								style={{
									fontSize: ratingSize,
									width: ratingSize,
									height: ratingSize,
								}}
							/>
					  ))
					: null}
			</div>
		</div>
	);
}
