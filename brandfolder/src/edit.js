/**
 * Component used when in edit mode on the Wordpress editor. It gives the user the ability to:
 * - pick an image from their Brandfolder account
 * - resize and align the image inside the context of the Wordpress post
 * - transform to other block types, such as Cover and Gallery
 * - assign a link to the image
 */
import { isBlobURL } from "@wordpress/blob";
import {
	BlockControls,
	__experimentalBlock as Block,
	useBlockProps,
} from "@wordpress/block-editor";
import {
	Button,
	Modal,
	Placeholder,
	ToolbarButton,
	ToolbarGroup,
	withNotices,
} from "@wordpress/components";
import { useCallback, useEffect, useRef, useState } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
import { icon } from "./icon";
import classnames from "classnames";
import {
	ALLOWED_AUDIO_FILES,
	ALLOWED_IMAGE_FILES,
	ALLOWED_VIDEO_FILES,
	APP_NAME,
	BF_INTEGRATION_PANEL_ORIGIN,
} from "../config";
import "./editor.scss";
import { Image } from "./image";
import { isAudioUrl, isImageUrl, isVideoUrl } from "./util";

export function Edit({
	attributes,
	className,
	setAttributes,
	isSelected,
	insertBlocksAfter,
	onReplace,
}) {
	const containerRef = useRef();
	const { height, sizeSlug, url, width } = attributes;
	const [showModal, setShowModal] = useState(false);
	const closeModal = useCallback(() => setShowModal(false));
	const openModal = useCallback(() => setShowModal(true));
	const onRequestCloseHandler = useCallback((e) => {
		// Need to ignore blur events for now because they are triggered when interacting with the iframe.
		// TODO: only ignore blur events that are triggered from clicking inside the iframe
		if (e.type === "blur") return;
		closeModal();
	});

	useEffect(setAttachmentSelectedHandler, [isSelected]);

	function setAttachmentSelectedHandler() {
		const handler = (event) => {
			if (event.origin !== BF_INTEGRATION_PANEL_ORIGIN) return;
			if (!isSelected) return;
			if (event.data.event === "selectedAttachment") {
				const payload = event.data.payload;
				setAttributes({
					url: getUrl(payload),
					filename: payload.filename,
				});
				closeModal();
			}
		};

		window.addEventListener("message", handler);
		return () => window.removeEventListener("message", handler);
	}

	function getUrl(payload) {
		// this function was built to ensure that https properly recognized for Brandfolder clients
		// that utilized vanity CDN urls. at the time of addition, there was no guarantee that a client
		// vanity cdn url would return properly formatted from Brandfolder
		if (payload.cdn_url) {
			if (!payload.cdn_url.startsWith("https://")) {
				if (payload.cdn_url.startsWith("http://")) {
					return payload.cdn_url.replace("http://", "https://");
				} else {
					return "https://" + payload.cdn_url;
				}
			}
			return payload.cdn_url;
		}
		return payload.url;
	}

	const placeholder = (
		<Placeholder
			className="image-placeholder"
			icon={icon}
			label={__("Brandfolder")}
			instructions={__("Pick an asset from your Brandfolder library.")}
		>
			<Button isPrimary onClick={openModal}>
				Pick Asset
			</Button>
		</Placeholder>
	);

	const renderMedia = function (url) {
		if (isImageUrl(url)) {
			return (
				<Image
					attributes={attributes}
					setAttributes={setAttributes}
					isSelected={isSelected}
					insertBlocksAfter={insertBlocksAfter}
					onReplace={onReplace}
					containerRef={containerRef}
				/>
			);
		} else if (isVideoUrl(url)) {
			return (
				<video controls src={url}>
					<track />
				</video>
			);
		} else if (isAudioUrl(url)) {
			return <audio controls src={url} />;
		} else {
			return placeholder;
		}
	};

	const classes = classnames(className, {
		"is-transient": isBlobURL(url),
		"is-resized": !!width || !!height,
		"is-focused": isSelected,
		[`size-${sizeSlug}`]: sizeSlug,
	});

	const allowedExtensions = [
		...ALLOWED_AUDIO_FILES,
		...ALLOWED_IMAGE_FILES,
		...ALLOWED_VIDEO_FILES,
	].join(",");

	const blockControls = (
		<BlockControls>
			{url && (
				<ToolbarGroup>
					<ToolbarButton onClick={openModal}>Pick another asset</ToolbarButton>
				</ToolbarGroup>
			)}
		</BlockControls>
	);

	return (
		<>
			{useBlockProps ? (
				<div {...useBlockProps()}>
					{blockControls}
					<div className={classes} ref={containerRef}>
						{renderMedia(url)}
					</div>
				</div>
			) : (
				<>
					{blockControls}
					<Block.figure className={classes} ref={containerRef}>
						{renderMedia(url)}
					</Block.figure>
				</>
			)}

			{showModal && (
				<Modal
					className="brandfolder-integration-image-selector-modal"
					title={__("Pick an asset")}
					onRequestClose={onRequestCloseHandler}
				>
					<iframe
						id="bfi-image-selector-iframe"
						style={{ width: '100%' }}
						src={`${BF_INTEGRATION_PANEL_ORIGIN}?origin=${location.origin}&allowedExtensions=${allowedExtensions}&appName=${APP_NAME}`}
					/>
				</Modal>
			)}
		</>
	);
}

export default withNotices(Edit);
