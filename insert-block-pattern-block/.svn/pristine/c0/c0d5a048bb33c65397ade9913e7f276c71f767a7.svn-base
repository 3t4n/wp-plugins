/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Internal dependencies
 */

import { InsertBlockPatternBlockEdit as edit } from "./edit";
import save from "./save";

const attributes = [];

export const registerInsertBlockPatternBlock = () => {
	registerBlockType("ibpb/insert-block-pattern", {
		title: __("Insert Block Pattern", "ibpb"),
		description: __("Block for inserting a Block Pattern", "ibpb"),
		icon: "screenoptions",
		keywords: [__("Block Pattern", "ibpb")],
		category: "ibpb",
		attributes,
		supports: {
			className: false,
			anchor: false,
			align: false
		},
		edit,
		save
	});
};
