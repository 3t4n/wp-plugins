/* eslint-disable no-nested-ternary */
/* eslint-disable react/jsx-key */
// import React from 'react';
// eslint-disable-next-line import/no-unresolved
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

import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	ButtonGroup,
	Button,
	ColorPalette,
	TextareaControl,
	ToggleControl,
} from '@wordpress/components';
const { Fragment } = wp.element;

// editor style
import './editor.scss';

// colors
import colors from '../colors-palette';

export default function Edit({ attributes, setAttributes }) {
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
		<Fragment>
			<InspectorControls>
				<PanelBody
					title={__('Rating Options', 'advanced-rating-block')}
					initialOpen={true}
				>
					<div className="arb__panel">
						<p className="arb__label">
							{__('Rating Icon Type', 'advanced-rating-block')}
						</p>
						<ButtonGroup>
							<Button
								isPressed={ratingIcon === 'star'}
								onClick={() =>
									setAttributes({ ratingIcon: 'star' })
								}
								icon={<FontAwesomeIcon icon={faStar} />}
							/>
							<Button
								isPressed={ratingIcon === 'heart'}
								onClick={() =>
									setAttributes({ ratingIcon: 'heart' })
								}
								icon={<FontAwesomeIcon icon={faHeart} />}
							/>
							<Button
								isPressed={ratingIcon === 'circle'}
								onClick={() =>
									setAttributes({ ratingIcon: 'circle' })
								}
								icon={<FontAwesomeIcon icon={faCircle} />}
							/>
						</ButtonGroup>
					</div>
					<RangeControl
						label={__(
							'Set Maximum Rating',
							'advanced-rating-block'
						)}
						value={maxRating}
						onChange={(value) =>
							setAttributes({ maxRating: value })
						}
						min={5}
						max={10}
						step={5}
					/>

					<RangeControl
						label={__('Set Rating', 'advanced-rating-block')}
						value={rating}
						onChange={(value) => setAttributes({ rating: value })}
						min={0.5}
						max={maxRating}
						step={0.5}
					/>
				</PanelBody>
				<PanelBody
					title={__('Rating Style', 'advanced-rating-block')}
					initialOpen={false}
				>
					<div className="arb__panel">
						<p className="arb__label">
							{__('Alignment', 'advanced-rating-block')}
						</p>
						<ButtonGroup>
							<Button
								isPressed={ratingAlign === 'flex-start'}
								onClick={() =>
									setAttributes({ ratingAlign: 'flex-start' })
								}
								icon={'align-pull-left'}
							/>
							<Button
								isPressed={ratingAlign === 'center'}
								onClick={() =>
									setAttributes({ ratingAlign: 'center' })
								}
								icon={'align-center'}
							/>
							<Button
								isPressed={ratingAlign === 'flex-end'}
								onClick={() =>
									setAttributes({ ratingAlign: 'flex-end' })
								}
								icon={'align-pull-right'}
							/>
						</ButtonGroup>
					</div>
					<RangeControl
						label={__('Icon Size', 'advanced-rating-block')}
						value={ratingSize}
						onChange={(size) => setAttributes({ ratingSize: size })}
						min={1}
						max={100}
					/>
					<RangeControl
						label={__(
							'Icons Inner Spacing',
							'advanced-rating-block'
						)}
						value={ratingGap}
						onChange={(size) => setAttributes({ ratingGap: size })}
						min={0}
						max={100}
					/>
					<p className="arb__label">
						{__('Icon Color', 'advanced-rating-block')}
					</p>
					<ColorPalette
						colors={colors}
						value={ratingColor}
						onChange={(color) =>
							setAttributes({ ratingColor: color })
						}
					/>
				</PanelBody>
				<PanelBody
					title={__('Rating Label', 'advanced-rating-block')}
					initialOpen={false}
				>
					<ToggleControl
						label={__('Show Rating Label', 'advanced-rating-block')}
						help={
							showLabel
								? __(
										'Rating Label is visible',
										'advanced-rating-block'
								  )
								: __(
										'Rating Label is hidden',
										'advanced-rating-block'
								  )
						}
						checked={showLabel}
						onChange={() =>
							setAttributes({ showLabel: !showLabel })
						}
					/>
					{showLabel && (
						<Fragment>
							<div className="arb__panel">
								<p className="arb__label">
									{__(
										'Label Position',
										'advanced-rating-block'
									)}
								</p>
								<ButtonGroup>
									<Button
										isPressed={labelPosition === 'left'}
										onClick={() =>
											setAttributes({
												labelPosition: 'left',
											})
										}
										icon={
											<svg
												width="15px"
												height="15px"
												viewBox="0 0 15 15"
												fill="none"
											>
												<path
													fillRule="evenodd"
													clipRule="evenodd"
													d="M2.05005 13.5C2.05005 13.7485 2.25152 13.95 2.50005 13.95C2.74858 13.95 2.95005 13.7485 2.95005 13.5L2.95005 1.49995C2.95005 1.25142 2.74858 1.04995 2.50005 1.04995C2.25152 1.04995 2.05005 1.25142 2.05005 1.49995L2.05005 13.5ZM8.4317 11.0681C8.60743 11.2439 8.89236 11.2439 9.06809 11.0681C9.24383 10.8924 9.24383 10.6075 9.06809 10.4317L6.58629 7.94993L14.5 7.94993C14.7485 7.94993 14.95 7.74846 14.95 7.49993C14.95 7.2514 14.7485 7.04993 14.5 7.04993L6.58629 7.04993L9.06809 4.56813C9.24383 4.39239 9.24383 4.10746 9.06809 3.93173C8.89236 3.75599 8.60743 3.75599 8.4317 3.93173L5.1817 7.18173C5.00596 7.35746 5.00596 7.64239 5.1817 7.81812L8.4317 11.0681Z"
													fill="currentColor"
												/>
											</svg>
										}
										label={__(
											'Left',
											'advanced-rating-block'
										)}
									/>
									<Button
										isPressed={labelPosition === 'top'}
										onClick={() =>
											setAttributes({
												labelPosition: 'top',
											})
										}
										icon={
											<svg
												width="15px"
												height="15px"
												viewBox="0 0 15 15"
												fill="none"
											>
												<path
													fillRule="evenodd"
													clipRule="evenodd"
													d="M1.50005 1.05005C1.25152 1.05005 1.05005 1.25152 1.05005 1.50005C1.05005 1.74858 1.25152 1.95005 1.50005 1.95005L13.5 1.95005C13.7486 1.95005 13.95 1.74858 13.95 1.50005C13.95 1.25152 13.7486 1.05005 13.5 1.05005H1.50005ZM3.93188 7.43169C3.75614 7.60743 3.75614 7.89236 3.93188 8.06809C4.10761 8.24383 4.39254 8.24383 4.56827 8.06809L7.05007 5.58629V13.5C7.05007 13.7485 7.25155 13.95 7.50007 13.95C7.7486 13.95 7.95007 13.7485 7.95007 13.5L7.95007 5.58629L10.4319 8.06809C10.6076 8.24383 10.8925 8.24383 11.0683 8.06809C11.244 7.89235 11.244 7.60743 11.0683 7.43169L7.81827 4.18169C7.64254 4.00596 7.35761 4.00596 7.18188 4.18169L3.93188 7.43169Z"
													fill="currentColor"
												/>
											</svg>
										}
										label={__(
											'Top',
											'advanced-rating-block'
										)}
									/>
									<Button
										isPressed={labelPosition === 'right'}
										onClick={() =>
											setAttributes({
												labelPosition: 'right',
											})
										}
										icon={
											<svg
												width="15px"
												height="15px"
												viewBox="0 0 15 15"
												fill="none"
											>
												<path
													fillRule="evenodd"
													clipRule="evenodd"
													d="M12.95 1.50005C12.95 1.25152 12.7485 1.05005 12.5 1.05005C12.2514 1.05005 12.05 1.25152 12.05 1.50005L12.05 13.5C12.05 13.7486 12.2514 13.95 12.5 13.95C12.7485 13.95 12.95 13.7486 12.95 13.5L12.95 1.50005ZM6.5683 3.93188C6.39257 3.75614 6.10764 3.75614 5.93191 3.93188C5.75617 4.10761 5.75617 4.39254 5.93191 4.56827L8.41371 7.05007L0.499984 7.05007C0.251456 7.05007 0.0499847 7.25155 0.0499847 7.50007C0.0499846 7.7486 0.251457 7.95007 0.499984 7.95007L8.41371 7.95007L5.93191 10.4319C5.75617 10.6076 5.75617 10.8925 5.93191 11.0683C6.10764 11.244 6.39257 11.244 6.56831 11.0683L9.8183 7.81827C9.99404 7.64254 9.99404 7.35761 9.8183 7.18188L6.5683 3.93188Z"
													fill="currentColor"
												/>
											</svg>
										}
										label={__(
											'Right',
											'advanced-rating-block'
										)}
									/>
									<Button
										isPressed={labelPosition === 'bottom'}
										onClick={() =>
											setAttributes({
												labelPosition: 'bottom',
											})
										}
										icon={
											<svg
												width="15px"
												height="15px"
												viewBox="0 0 15 15"
												fill="none"
											>
												<path
													fillRule="evenodd"
													clipRule="evenodd"
													d="M13.5 13.95C13.7485 13.95 13.95 13.7485 13.95 13.5C13.95 13.2514 13.7485 13.05 13.5 13.05L1.49995 13.05C1.25142 13.05 1.04995 13.2514 1.04995 13.5C1.04995 13.7485 1.25142 13.95 1.49995 13.95L13.5 13.95ZM11.0681 7.5683C11.2439 7.39257 11.2439 7.10764 11.0681 6.93191C10.8924 6.75617 10.6075 6.75617 10.4317 6.93191L7.94993 9.41371L7.94993 1.49998C7.94993 1.25146 7.74846 1.04998 7.49993 1.04998C7.2514 1.04998 7.04993 1.25146 7.04993 1.49998L7.04993 9.41371L4.56813 6.93191C4.39239 6.75617 4.10746 6.75617 3.93173 6.93191C3.75599 7.10764 3.75599 7.39257 3.93173 7.5683L7.18173 10.8183C7.35746 10.994 7.64239 10.994 7.81812 10.8183L11.0681 7.5683Z"
													fill="currentColor"
												/>
											</svg>
										}
										label={__(
											'Bottom',
											'advanced-rating-block'
										)}
									/>
								</ButtonGroup>
							</div>
							<div className="arb__panel">
								<p className="arb__label">
									{__('Label Type', 'advanced-rating-block')}
								</p>
								<ButtonGroup>
									<Button
										isPressed={labelType === 'text'}
										onClick={() =>
											setAttributes({ labelType: 'text' })
										}
										icon={'editor-textcolor'}
										label={__(
											'Text',
											'advanced-rating-block'
										)}
									/>
									<Button
										isPressed={labelType === 'icon'}
										onClick={() =>
											setAttributes({ labelType: 'icon' })
										}
										icon={'admin-generic'}
										label={__(
											'Icon',
											'advanced-rating-block'
										)}
									/>
								</ButtonGroup>
							</div>
							{labelType === 'text' && (
								<Fragment>
									<TextareaControl
										label={__(
											'Label Text',
											'advanced-rating-block'
										)}
										value={label}
										onChange={(value) =>
											setAttributes({ label: value })
										}
									/>
								</Fragment>
							)}
							{labelType === 'icon' && (
								<Fragment>
									<div className="arb__icons_panel">
										<Button
											isPressed={
												labelIcon === 'thumbs-up'
											}
											onClick={() =>
												setAttributes({
													labelIcon: 'thumbs-up',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faThumbsUp}
													size="2x"
												/>
											}
											label={__(
												'thumbs-up',
												'advanced-rating-block'
											)}
										/>
										<Button
											isPressed={
												labelIcon === 'thumbs-down'
											}
											onClick={() =>
												setAttributes({
													labelIcon: 'thumbs-down',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faThumbsDown}
													size="2x"
												/>
											}
											label={__(
												'thumbs-down',
												'advanced-rating-block'
											)}
										/>
										<Button
											isPressed={labelIcon === 'comment'}
											onClick={() =>
												setAttributes({
													labelIcon: 'comment',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faComment}
													size="2x"
												/>
											}
											label={__(
												'Comment',
												'advanced-rating-block'
											)}
										/>
										<Button
											isPressed={
												labelIcon === 'comment-dots'
											}
											onClick={() =>
												setAttributes({
													labelIcon: 'comment-dots',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faCommentDots}
													size="2x"
												/>
											}
											label={__(
												'Comment Dots',
												'advanced-rating-block'
											)}
										/>
										<Button
											isPressed={labelIcon === 'message'}
											onClick={() =>
												setAttributes({
													labelIcon: 'message',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faMessage}
													size="2x"
												/>
											}
											label={__(
												'Message',
												'advanced-rating-block'
											)}
										/>
										<Button
											isPressed={labelIcon === 'face'}
											onClick={() =>
												setAttributes({
													labelIcon: 'face',
												})
											}
											icon={
												<FontAwesomeIcon
													icon={faFaceSmile}
													size="2x"
												/>
											}
											label={__(
												'Smile Face',
												'advanced-rating-block'
											)}
										/>
									</div>
								</Fragment>
							)}

							<RangeControl
								label={__(
									'Space Between Rating and Label',
									'advanced-rating-block'
								)}
								value={labelGap}
								onChange={(size) =>
									setAttributes({ labelGap: size })
								}
								min={0}
								max={100}
							/>
							<RangeControl
								label={__(
									'Label Size',
									'advanced-rating-block'
								)}
								value={labelSize}
								onChange={(size) =>
									setAttributes({ labelSize: size })
								}
								min={1}
								max={100}
							/>
							<p className="arb__label">
								{__('Label Color', 'advanced-rating-block')}
							</p>
							<ColorPalette
								colors={colors}
								value={labelColor}
								onChange={(color) =>
									setAttributes({ labelColor: color })
								}
							/>
						</Fragment>
					)}
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({
					className: `${
						showLabel ? `arb__label_${labelPosition}` : ''
					}`,
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
		</Fragment>
	);
}
