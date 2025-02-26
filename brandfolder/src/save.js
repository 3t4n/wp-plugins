/**
 * Component used when displaying the image on a Wordpress post.
 *
 * This is a copy of @wordpress/block-library/src/image/save.js that has been modified to be used with this plugin.
 * Wordpress is distributed under the GNU General Public License: https://www.gnu.org/licenses/gpl-3.0.en.html
 */

import { RichText } from "@wordpress/block-editor";
import classnames from "classnames";
import { isEmpty } from "lodash";
import { isAudioUrl, isImageUrl, isVideoUrl } from "./util";

export default function save({ attributes }) {
	const {
		align,
		url,
		alt,
		caption,
		href,
		rel,
		linkClass,
		width,
		height,
		id,
		linkTarget,
		sizeSlug,
		title,
	} = attributes;

	const newRel = isEmpty(rel) ? undefined : rel;

	const classes = classnames({
		[`align${align}`]: align,
		[`size-${sizeSlug}`]: sizeSlug,
		"is-resized": width || height,
	});

	const renderMedia = function (url) {
		const image = (
			<img
				src={url}
				alt={alt}
				className={id ? `wp-image-${id}` : null}
				width={width}
				height={height}
				title={title}
			/>
		);

		if (isImageUrl(url)) {
			return href ? (
				<a className={linkClass} href={href} target={linkTarget} rel={newRel}>
					{image}
				</a>
			) : (
				image
			);
		} else if (isVideoUrl(url)) {
			return <video controls src={url} />;
		} else if (isAudioUrl(url)) {
			return <audio controls src={url} />;
		}
	};

	const figure = (
		<>
			{renderMedia(url)}
			{!RichText.isEmpty(caption) && (
				<RichText.Content tagName="figcaption" value={caption} />
			)}
		</>
	);

	return <figure className={classes}>{figure}</figure>;
}
