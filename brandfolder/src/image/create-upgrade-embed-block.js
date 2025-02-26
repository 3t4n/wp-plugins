/**
 * This is a copy of @wordpress/block-library/src/embed/util.js that has been modified to be used with this plugin.
 * Wordpress is distributed under the GNU General Public License: https://www.gnu.org/licenses/gpl-3.0.en.html
 */

import {
	createBlock,
	getBlockType,
	getBlockVariations,
} from "@wordpress/blocks";

const DEFAULT_EMBED_BLOCK = "core/embed";
const WP_EMBED_TYPE = "wp-embed";

const findMoreSuitableBlock = (url) =>
	getBlockVariations(DEFAULT_EMBED_BLOCK)?.find(({ patterns }) =>
		matchesPatterns(url, patterns)
	);

const isFromWordPress = (html) =>
	html && html.includes('class="wp-embedded-content"');

export const matchesPatterns = (url, patterns = []) =>
	patterns.some((pattern) => url.match(pattern));

/**
 * Creates a more suitable embed block based on the passed in props
 * and attributes generated from an embed block's preview.
 *
 * We require `attributesFromPreview` to be generated from the latest attributes
 * and preview, and because of the way the react lifecycle operates, we can't
 * guarantee that the attributes contained in the block's props are the latest
 * versions, so we require that these are generated separately.
 * See `getAttributesFromPreview` in the generated embed edit component.
 *
 * @param {Object} props                  The block's props.
 * @param {Object} [attributesFromPreview]  Attributes generated from the block's most up to date preview.
 * @return {Object|undefined} A more suitable embed block if one exists.
 */
export const createUpgradedEmbedBlock = (props, attributesFromPreview = {}) => {
	const { preview, attributes: { url, providerNameSlug, type } = {} } = props;

	if (!url || !getBlockType(DEFAULT_EMBED_BLOCK)) return;

	const matchedBlock = findMoreSuitableBlock(url);

	// WordPress blocks can work on multiple sites, and so don't have patterns,
	// so if we're in a WordPress block, assume the user has chosen it for a WordPress URL.
	const isCurrentBlockWP =
		providerNameSlug === "wordpress" || type === WP_EMBED_TYPE;
	// if current block is not WordPress and a more suitable block found
	// that is different from the current one, create the new matched block
	const shouldCreateNewBlock =
		!isCurrentBlockWP &&
		matchedBlock &&
		(matchedBlock.attributes.providerNameSlug !== providerNameSlug ||
			!providerNameSlug);
	if (shouldCreateNewBlock) {
		return createBlock(DEFAULT_EMBED_BLOCK, {
			url,
			...matchedBlock.attributes,
		});
	}

	const wpVariation = getBlockVariations(DEFAULT_EMBED_BLOCK)?.find(
		({ name }) => name === "wordpress"
	);

	// We can't match the URL for WordPress embeds, we have to check the HTML instead.
	if (
		!wpVariation ||
		!preview ||
		!isFromWordPress(preview.html) ||
		isCurrentBlockWP
	) {
		return;
	}

	// This is not the WordPress embed block so transform it into one.
	return createBlock(DEFAULT_EMBED_BLOCK, {
		url,
		...wpVariation.attributes,
		// By now we have the preview, but when the new block first renders, it
		// won't have had all the attributes set, and so won't get the correct
		// type and it won't render correctly. So, we pass through the current attributes
		// here so that the initial render works when we switch to the WordPress
		// block. This only affects the WordPress block because it can't be
		// rendered in the usual Sandbox (it has a sandbox of its own) and it
		// relies on the preview to set the correct render type.
		...attributesFromPreview,
	});
};
