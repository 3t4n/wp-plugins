import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { icon } from './icon';
import metadata from "./block.json";
import Edit from "./edit";
import Save from "./save";
import "./style.scss";
import { transforms } from "./transforms";

const { attributes, category, description, name, supports, title } = metadata;

registerBlockType(name, {
	title: __(title, "brandfolder-integration"),
	description: __(description, "brandfolder-integration"),
	category,
	icon,
	supports,
	getEditWrapperProps(attributes) {
		return {
			"data-align": attributes.url && attributes.align,
		};
	},
	edit: Edit,
	save: Save,
	attributes,
	transforms,
});
