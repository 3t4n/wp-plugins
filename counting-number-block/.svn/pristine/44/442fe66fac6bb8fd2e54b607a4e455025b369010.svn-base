/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";

/**
 * Internal dependencies
 */
import edit from "./edit";
import save from "./save";
import { ReactComponent as BlockIcon } from "./assets/block-icon.svg";
import metadata from "./block.json";
import deprecated from "./deprecated";

/**
 * Front end style
 */
import "./style.scss";

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata, {
  icon: BlockIcon,
  example: {
    attributes: {
      content: "100",
    },
  },
  edit,
  save,
  deprecated,
});
